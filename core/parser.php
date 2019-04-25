<?php
;

class Token{
	public $word;
	public $tag;	
	
	function __construct($w,$t)
	{
		$this->word = $w;
		$this->tag = $t;
	}
}

function tokenize($path, $token=NULL)
{
	$tokens = array();
	$file = fopen("texts/".$path,"r");
	
	$tokenWords=($token==NULL) ? NULL : explode(" ",$token);
	
	while (!feof($file))
	{
		$word = "";
		$tag = "";
		while (($c=fgetc($file))!="_")
		{
			if (feof($file)) return $tokens;
			if ($c == "\n") continue;
			$word .= $c;
		}
		
		while (($c=fgetc($file))!=" ")
			$tag .= $c;
		if ($tokenWords!=NULL && in_array($word,$tokenWords))
			$tag .= "!";
		array_push($tokens,new Token($word,$tag));
	}
	fclose($file);
	return $tokens;
}

// Introducir la ruta del archivo (desde la carpeta text) y la palabra a ser buscada
// Devolverá un array con el número de ocurrencias y un array con la posición de cada palabra en el fichero (en bytes), FALSE si ocurrió un error.
function searchWords($path,$word)
{
	$file = fopen("texts/".$path,"r");
	$tam = strlen($word);
	$result = array(0,array());
	if (!$file) return FALSE;
	else
	{
		while(!feof($file))
		{
			$found = false;
			if (fgetc($file)==" ")
			{
				for($k=0; fgetc($file)==$word[$k]; $k++)
				{
					if ($k==$tam-1)
					{
						$found=true;
						break;
					}
				}
				if ($found)
				{
					$char = fgetc($file);
					if ($char==' ' || $char==',' || $char=='.')
					{
						$result[0]++;
						array_push($result[1],ftell($file)-strlen($word)-1);
					}
				}
			}
		}
		fclose($file);
		return $result;
	}
}

function getColorizedContext($tokens, $offset, $wordRadius)
{
	include dirname(dirname(__FILE__)).'/config/colors.php';
	$str = "";
	
	$palabra = 1;
	$offs = 0;
	foreach($tokens as $t)
	{
		if (substr($t->tag, -1) == '!') 
		{
			if ($offs < $offset) 
				$offs++;
			else
			{
				$t->tag = substr($t->tag,0,strlen($t->tag)-1);
				break;
			}
		}
		$palabra++;
	}
	$k = 0;
	if ($palabra-$wordRadius > 0) $str .= "...";
	
	foreach($tokens as $t)
	{
		$k++;
		if (abs($palabra-$k) > $wordRadius)
		{
			continue;
		}
		
		if (array_key_exists($t->tag,$colores))
		{
			if ($k == $palabra) $str .= "<font color=\"".$colores[$t->tag]."\"><b>".$t->word."</b></font> ";
			else $str .= "<font color=\"".$colores[$t->tag]."\">".$t->word."</font> ";
		}
		else
		{
			if ($k == $palabra) $str .= "<b>" . $t->word . "</b> ";
			else $str .= $t->word . " ";
		}
	}
	return $str;
}

function returnPhrases($path)
{
	$file = fopen("texts/".$path,"r");
	$frases = array();
	$curr = "";
	$currTag = "";
	while (feof($file)==0)
	{
		$c = fgetc($file);
		
		if ($c == '<')
		{
			$tag = "";
			if (($c = fgetc($file))!='/')
			{
				while ($c != '>')
				{
					$tag .= $c;
					$c = fgetc($file);
				}
				$currTag = $tag;
			}
			else while (fgetc($file) != '>' && feof($file)==0);
		}
		
		else if ($c == '.')
		{
			if (($tmp=fgetc($file))==" ")
			{
				array_push($frases,array($curr .= $c,$currTag));
				$curr="";
			}
			else if ($tmp=="<")
			{
				fseek($file,-1,SEEK_CUR);
				continue;
			}
			else $curr .= $c . $tmp;
		}
		else $curr .= $c;
	}
	array_push($frases,array($curr,$currTag));
	
	fclose($file);
	return $frases;
}

?>