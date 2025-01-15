<?php
// -----------------------
// Ejercicio 1: Calculadora con Manejo de Errores
// -----------------------
function calculadora($num1, $num2, $operador) {
    try {
        switch ($operador) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                if ($num2 == 0) {
                    throw new Exception("Error: No se puede dividir entre cero.");
                }
                return $num1 / $num2;
            default:
                throw new Exception("Error: Operador inválido.");
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Pruebas del Ejercicio 1
echo "Ejercicio 1: Calculadora\n";
echo calculadora(10, 0, '/') . "\n"; // Error: No se puede dividir entre cero.
echo calculadora(10, 5, '+') . "\n"; // Resultado: 15

// -----------------------
// Ejercicio 2: Validación de Email
// -----------------------
function validarEmail($email) {
    $archivoErrores = "errores.log";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Válido";
    } else {
        $mensajeError = "Error: Dirección de correo inválida.\n";
        file_put_contents($archivoErrores, $mensajeError, FILE_APPEND);
        return "Error registrado en errores.log";
    }
}

// Pruebas del Ejercicio 2
echo "\nEjercicio 2: Validación de Email\n";
echo validarEmail("correo@ejemplo.com") . "\n"; // Válido
echo validarEmail("correo_invalido") . "\n"; // Error registrado en errores.log

// -----------------------
// Ejercicio 3: Buscar Elemento en un Array
// -----------------------
function buscarElemento($array, $valor) {
    try {
        $indice = array_search($valor, $array);
        if ($indice === false) {
            throw new Exception("Error: El elemento no se encuentra en el array.");
        }
        return $indice;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Pruebas del Ejercicio 3
echo "\nEjercicio 3: Buscar Elemento en un Array\n";
$array = ["manzana", "naranja", "pera"];
echo buscarElemento($array, "pera") . "\n"; // Resultado: 2
echo buscarElemento($array, "plátano") . "\n"; // Error: El elemento no se encuentra en el array.

// -----------------------
// Ejercicio 4: Tabla de Multiplicar con Validación
// -----------------------
function tablaMultiplicar($numero) {
    try {
        if (!is_int($numero) || $numero < 0) {
            throw new Exception("Error: El número debe ser un entero positivo.");
        }
        for ($i = 1; $i <= 10; $i++) {
            echo "$numero x $i = " . ($numero * $i) . "\n";
        }
    } catch (Exception $e) {
        echo $e->getMessage() . "\n";
    }
}

// Pruebas del Ejercicio 4
echo "\nEjercicio 4: Tabla de Multiplicar\n";
tablaMultiplicar(5); // 5 x 1 = 5 ... 5 x 10 = 50
tablaMultiplicar(-2); // Error: El número debe ser un entero positivo.

// -----------------------
// Ejercicio 5: Conversión de Temperaturas
// -----------------------
function convertirTemperatura($valor, $unidad) {
    $archivoErrores = "errores.log";
    try {
        if ($unidad == "C") {
            return ($valor - 32) * 5 / 9;
        } elseif ($unidad == "F") {
            return ($valor * 9 / 5) + 32;
        } else {
            throw new Exception("Error: Unidad de conversión inválida.");
        }
    } catch (Exception $e) {
        file_put_contents($archivoErrores, $e->getMessage() . "\n", FILE_APPEND);
        return "Error registrado en errores.log";
    }
}

// Pruebas del Ejercicio 5
echo "\nEjercicio 5: Conversión de Temperaturas\n";
echo convertirTemperatura(100, "C") . "\n"; // Resultado: 37.78
echo convertirTemperatura(0, "F") . "\n";   // Resultado: 32
echo convertirTemperatura(25, "X") . "\n";  // Error registrado en errores.log
?>
