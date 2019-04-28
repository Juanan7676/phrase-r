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

$doms = array("Engineering,Manufact and Const Technologies" => "ENG","Maritime Navigation" => "MRN","Applied Sciences" => "APS");
$subdoms = array("Aerospace engineering" => array("AER_ENG","AER_PAS"),"Wind Energy" => array("ENE_WIN"),"Marine Engineering"=>array("MAR_MEJ"),
                 "Ocean Engineering"=>array("OCE_OCE"),"Robotics"=>array("ROB_ROJ"),"Naval engineering"=>array("NAV_ENG"),"Navigation"=>array("NAT_JNA"),
                 "Shipping and Ports"=>array("NAT_JNP"),"Maritime Policy and Management"=>array("NAT_MPM"),"Ship Transportation Science"=>array("NAT_JNR"),
                 "Applied Physics"=>array("PH_ADM"),"Marine and Fresh Water Biology"=>array("MFB_MPB"),"Meteorology and Atmospheric Sciences"=>array("MAS_WF"),
                 "Oceanography"=>array("OCE_AM"),"Astronomy and Astrophysics"=>array("AST_P"));

if (!isset($_POST["phrase"]) || $_POST["phrase"]=="")
{
	echo getErrMsg('Petition was malformed or incorrect! Try again.<br><a href="search_basic.php">Back to search</a>');
	die();
}
else {
    
    $domf = (isset($_POST["domv"])) ? $doms[$_POST["domv"]] : null;
    $subdomf = (isset($_POST["subdomv"])) ? $subdoms[$_POST["subdomv"]] : null;
    
	$conn = new SQLConnection();
    
    $sql = "SELECT * FROM texts WHERE Route1_CLAWS IS NOT NULL";
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
		echo getErrMsg('No results! Try again later.<br><a href="search_advanced.php">Back to search</a>');
	else
	{
		$textos = array();
		while ($row = $result->fetch_assoc())
		{
			$partes = array("Abstract","Introduction","Method","Result","Analysis","Discussion/Conclusion");
			for ($k = 1; $k <= 6; $k++)
			{
				if ($row["Route".$k]!=NULL && $row["Route".$k]!="NULL")
				{
					$ocurrencias = searchWords($row["Route".$k],$_POST["phrase"]);
					for ($i = 0; $i < $ocurrencias[0]; $i++)
						array_push($textos,array(
						"Domain"=>$row["Domain"],
						"Name"=>$row["Name"],
						"Author"=>$row["Author"],
						"Subdomain"=>$row["Subdomain"],
						"Part"=>$partes[$k-1],
						"Context"=>getColorizedContext(tokenize($row["Route".$k."_CLAWS"],$_POST["phrase"]),$i,5),
						"Link"=>"<a href='javascript:void(0)'>Go</a>")); // TODO
				}
			}
		}
	}
	$conn->close();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body class="default">
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

</body>
</html>
