<?php

class Token{
	public $word;
	public $tag;	
	
	function __construct($w,$t)
	{
		$this->word = $w;
		$this->tag = $t;
	}
}

function tokenize($file)
{
	$tokens = array();
	while (!feof($file))
	{
		$word = "";
		$tag = "";
		while (($c=fgetc($file))!='_')
		{
			if (feof($file)) return $tokens;
			if ($c == '\n') return $tokens;
			$word .= $c;
		}
		while (($c=fgetc($file))!=' ')
			$tag .= $c;
		array_push($tokens,new Token($word,$tag));
	}
	return $tokens;
}

function getTextString($tokens)
{
	$text = "";
	$k = 0;
	foreach ($tokens as $t)
	{
		if ($t->tag != "REMOVED")
			$text .= $t->word . " ";
		else $text .= '<input type="text" name="word'.$k.'" size="15">';
		$k++;
	}
	return $text;
}
?>