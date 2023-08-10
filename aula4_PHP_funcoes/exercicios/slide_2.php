<?php

define("PI", 3.14);

function area_circulo($raio) {
    $area = PI * $raio * $raio;
    return $area;
}

function circuferencia_circulo($raio) {
    $circunf = 2 * PI * $raio;
    return $circunf;
}

//Execução
echo "<h2>Exercício 2 - Funções</h2>";

//Círculo 1
$raio = 20;
echo "Raio do círculo: " . $raio . " cm <br>";
echo "Área do círculo: " . area_circulo($raio) . " cm² <br>";
echo "Circunferência do círculo: " . circuferencia_circulo($raio) . " cm <br>";

echo "<br><br>";

//Círculo 2
$raio = 8;
echo "Raio do círculo: " . $raio . " cm <br>";
echo "Área do círculo: " . area_circulo($raio) . " cm² <br>";
echo "Circunferência do círculo: " . circuferencia_circulo($raio) . " cm <br>";

echo "<br><br>";

//Círculo 3
$raio = 32;
echo "Raio do círculo: " . $raio . " cm <br>";
echo "Área do círculo: " . area_circulo($raio) . " cm² <br>";
echo "Circunferência do círculo: " . circuferencia_circulo($raio) . " cm <br>";