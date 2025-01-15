<?php
// Ejercicio 1 
$num1 = readline("Ingrese el primer número: ");
$num2 = readline("Ingrese el segundo número: ");
$operacion = readline("Elija una operación (+, -, *, /): ");

if ($operacion == "+") {
    echo "Resultado: " . ($num1 + $num2) . "\n";
} elseif ($operacion == "-") {
    echo "Resultado: " . ($num1 - $num2) . "\n";
} elseif ($operacion == "*") {
    echo "Resultado: " . ($num1 * $num2) . "\n";
} elseif ($operacion == "/") {
    if ($num2 != 0) {
        echo "Resultado: " . ($num1 / $num2) . "\n";
    } else {
        echo "No se puede dividir por cero.\n";
    }
} else {
    echo "Operación no válida.\n";
}
// Ejercicio 2
$numero = readline("Ingrese un número para ver su tabla de multiplicar: ");

for ($i = 1; $i <= 10; $i++) {
    echo "$numero x $i = " . ($numero * $i) . "\n";
}
// Ejercicio 3
$numero = readline("Ingrese un número: ");
$esPrimo = true;

if ($numero <= 1) {
    $esPrimo = false;
} else {
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $esPrimo = false;
            break;
        }
    }
}

if ($esPrimo) {
    echo "$numero es primo.\n";
} else {
    echo "$numero no es primo.\n";
}
// Ejercicio 4 
$numeroSecreto = rand(1, 10);
echo "Adivina el número (entre 1 y 10): ";

do {
    $intento = readline("Tu intento: ");
    if ($intento < $numeroSecreto) {
        echo "El número es mayor.\n";
    } elseif ($intento > $numeroSecreto) {
        echo "El número es menor.\n";
    } else {
        echo "¡Correcto! El número era $numeroSecreto.\n";
    }
} while ($intento != $numeroSecreto);

//Ejercicio 5
$altura = readline("Ingrese la altura de la pirámide: ");

for ($i = 1; $i <= $altura; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "\n";
}
?>