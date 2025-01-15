<?php

// Ejercicio 1: Contador de Palabras
echo "\n--- Ejercicio 1: Contador de Palabras ---\n";
$frase = readline("Ingresa una frase: "); // Leer entrada del usuario
$contadorPalabras = 0;

for ($i = 0; $i < strlen($frase); $i++) {
    if ($frase[$i] === ' ') {
        $contadorPalabras++;
    }
}
$contadorPalabras++; // Contar la última palabra
echo "El número de palabras es: $contadorPalabras\n";

// Ejercicio 2: Ordenamiento de Array
echo "\n--- Ejercicio 2: Ordenamiento de Array ---\n";
echo "Ingresa los números separados por comas (ejemplo: 5,2,9,1): ";
$input = readline();
$array = array_map('intval', explode(',', $input)); // Convertir la entrada en un array de números

echo "Array original: " . implode(", ", $array) . "\n";

// Algoritmo de burbuja
for ($i = 0; $i < count($array) - 1; $i++) {
    for ($j = 0; $j < count($array) - $i - 1; $j++) {
        if ($array[$j] > $array[$j + 1]) {
            // Intercambiar elementos
            $temp = $array[$j];
            $array[$j] = $array[$j + 1];
            $array[$j + 1] = $temp;
        }
    }
}

echo "Array ordenado: " . implode(", ", $array) . "\n";

// Ejercicio 3: Validación de Contraseña
echo "\n--- Ejercicio 3: Validación de Contraseña ---\n";
$password = readline("Ingresa una contraseña: ");

// Verificar longitud
$longitud = strlen($password) >= 8;

// Verificar otros criterios con expresiones regulares
$mayuscula = preg_match('/[A-Z]/', $password);
$minuscula = preg_match('/[a-z]/', $password);
$numero = preg_match('/[0-9]/', $password);

if ($longitud && $mayuscula && $minuscula && $numero) {
    echo "Contraseña válida.\n";
} else {
    echo "La contraseña no cumple con los criterios:\n";
    if (!$longitud) echo "- Debe tener al menos 8 caracteres.\n";
    if (!$mayuscula) echo "- Debe contener al menos una letra mayúscula.\n";
    if (!$minuscula) echo "- Debe contener al menos una letra minúscula.\n";
    if (!$numero) echo "- Debe contener al menos un número.\n";
}

// Ejercicio 4: Generador de Nombres Aleatorios
echo "\n--- Ejercicio 4: Generador de Nombres Aleatorios ---\n";
$nombres = ["Carlos", "María", "Luis", "Ana", "Jorge"];
$apellidos = ["García", "Pérez", "López", "Martínez", "Rodríguez"];

echo "Generando un nombre aleatorio...\n";
$nombreAleatorio = $nombres[rand(0, count($nombres) - 1)];
$apellidoAleatorio = $apellidos[rand(0, count($apellidos) - 1)];

echo "Nombre generado: $nombreAleatorio $apellidoAleatorio\n";

// Ejercicio 5: Simulador de Dado
echo "\n--- Ejercicio 5: Simulador de Dado ---\n";
readline("Presiona Enter para lanzar el dado...");
$resultado = rand(1, 6);
echo "El resultado del lanzamiento del dado es: $resultado\n";

?>
