<?php

$profs = array("Daniel", "Ana Paula", "Humberto", "Julio", "Juliana");
$times = array("Grêmio", "Flamengo", "Palmeiras", "Cruzeiro", "Botafogo");
$frutas = array("Maça", "Uva", "Laranja", "Limão", "Pera");
$animais = array("Cachorro", "Gato", "Cavalo", "Aranha", "Urso");

echo "<table border=1>";

echo "<tr>";
foreach($profs as $prof)
    echo "<td>" . $prof . "</td>";
echo "</tr>";

echo "<tr>";
foreach($times as $t)
    echo "<td>" . $t . "</td>";
echo "</tr>";

echo "<tr>";
foreach($frutas as $f)
    echo "<td>" . $f . "</td>";
echo "</tr>";

echo "<tr>";
foreach($animais as $a)
    echo "<td>" . $a . "</td>";
echo "</tr>";


echo "</table>";

