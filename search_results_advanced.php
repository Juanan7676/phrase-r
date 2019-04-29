<?php
require 'core/SQL.php';
require 'core/util.php';
require 'core/parser.php';

function parseCorpusCode($str)
{
	$res = "";
	for ($k=0; $str[$k]!=']'; $k++)
		$res .= $str[$k];
	return $res;
}

function echoTable($title,$rows)
{
	if (sizeof($rows)==0) return;
	echo '<div style="font-size:24px; font-weight:bold" align="center">'.$title.' Corpus</div>';
	echo '<table width="100%"><tr>
    	<td width="10%" align="center"><b>Name</b></td>
        <td width="10%" align="center"><b>Section</b></td>
        <td width="80%" align="center"><b>Context</b></td>
    </tr>';
	for ($k = 0; $k < sizeof($rows); $k++)
	{
		echo '<tr bgcolor="'.(($k%2==0)?"#C8EBF9":"E7F9FE").'">
		<td align="center">'.$rows[$k]["Name"].'</td>
		<td align="center">'.$rows[$k]["Part"].'</td>
		<td align="center">'.$rows[$k]["Context"].'</td>
		</tr>
		';
	}
	echo '</table>';
}


$subdoms = array("AEN" => array("AEN","AER_PAS"),"WE" => array("ENE_WIN"),"ME"=>array("MAR_MEJ"),
                 "OE"=>array("OCE_OCE"),"RBT"=>array("ROB_ROJ"),"NE"=>array("NAV_ENG"),"NVT"=>array("NAT_JNA"),
                 "SHP"=>array("NAT_JNP"),"MPM"=>array("NAT_MPM"),"STS"=>array("NAT_JNR"),
                 "APH"=>array("PH_ADM"),"MFB"=>array("MFB_MPB"),"MAS"=>array("MAS_WF"),
                 "OCE"=>array("OCE_AM"),"AA"=>array("AST_P"));

$tags = array("Introduction" => "intr","Background" => "state","Aim" => "aim","Aim+Ref" => "aim2","Aim+Methodology" => "aim3","Methodology"=>"meth","Methodology+Conclusion" => "meth2","Analysis" => "analysis", "Conclusion" => "concl");

    $domf = (isset($_POST["domv"]) && $_POST["domv"]!="") ? $_POST["domv"] : null;
    $subdomf = (isset($_POST["subdomv"]) && $_POST["subdomv"]!="ALL") ? $subdoms[$_POST["subdomv"]] : null;
    $abs = (isset($_POST["abs"]) && $_POST["abs"]!="") ? $tags[$_POST["abs"]] : null;
    
	$conn = new SQLConnection();
    
    $sql = "SELECT * FROM texts WHERE Route1_ANN IS NOT NULL";
    if ($domf != null)
        $sql .= " AND Domain='$domf'";
    if ($subdomf != null)
    {
        $sql .= " AND (";
        $first = true;
        foreach($subdomf as $subdom)
        {
            $sql .= ($first) ? "Subdomain='$subdom'" : " OR Subdomain='$subdom'";
            $first = false;
        }
        $sql .= ")";
    }
    
	$result = $conn->pquery($sql)->get_result();
	if ($result->num_rows == 0)
		echo getErrMsg('No results! Try again later.');
	else
	{
		$textos = array();
		while ($row = $result->fetch_assoc())
		{
			$partes = array("Abstract","Introduction","Method","Result","Analysis","Discussion/Conclusion");
			for ($k = 1; $k <= 6; $k++)
			{
				if ($row["Route".$k."_ANN"]!=NULL && $row["Route".$k."_ANN"]!="NULL")
				{
                    $frases = returnPhrases($row["Route".$k."_ANN"]);
                    $phr = array();
                    $len = 0;
                    foreach($frases as $f)
                    {
                        if ($f[1]==$abs || $abs==null)
                        {
                            $len++;
                            array_push($phr,$f[0]);
                        }
                    }
					for ($i = 0; $i < $len; $i++)
                    {
						array_push($textos,array(
						"Domain"=>$row["Domain"],
						"Name"=>$row["Name"],
						"Author"=>$row["Author"],
						"Subdomain"=>$row["Subdomain"],
						"Part"=>$partes[$k-1],
						"Context"=>$phr[$i],
						"Link"=>"<a href='javascript:void(0)'>Go</a>")); // TODO
                    }
                }
			}
		}
	}
	$conn->close();
?>

<?php
if (isset($textos))
{
	$textos1 = array();
	$textos2 = array();
	$textos3 = array();
	foreach($textos as $text)
	{
		if ($text["Domain"]=="MN")
			array_push($textos1,$text);
		else if ($text["Domain"]=="AS")
			array_push($textos2,$text);
		else if ($text["Domain"]=="ENG")
			array_push($textos3,$text);
	}
	echoTable("STAR-ABENG",$textos3);
	echoTable("STAR-ABAS",$textos2);
	echoTable("STAR-ABMN",$textos1);
}
?>
