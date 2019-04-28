<?php

require_once "core/util.php";

$msg = $_POST["msg"];
$title = $_POST["title"];
$author = $_POST["author"];

$number = rand(0,2147483647);

system("mkdir ".dirname(__FILE__)."/tmp/".$number);
$dirname = dirname(__FILE__)."/tmp/".$number."/";

$tex = fopen($dirname.$number.".tex","w");

fwrite($tex,'\documentclass[11pt]{article}
\usepackage[utf8]{inputenc}
\usepackage[margin={2.5cm,2cm}]{geometry}
\title{'.$title.'}
\author{'.$author.'}
\begin{document}
\maketitle
'.$msg.'
\end{document}');
fclose($tex);

system("pdflatex -interaction=nonstopmode -output-directory=".$dirname." ".$dirname.$number.".tex");

redirect("./tmp/".$number."/".$number.".pdf");

?>