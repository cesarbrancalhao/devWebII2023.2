<?php

$numeros = range(0, 100);

$ini = 0;
if(isset($_GET['numIni']))
	$ini = $_GET['numIni'];

$fim = count($numeros);
if(isset($_GET['numFim']))
	$fim = $_GET['numFim'];

for($i=$ini; $i<=$fim; $i++) {
	echo $numeros[$i] . "<br>";
}


