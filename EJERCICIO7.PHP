<?php
// Ejercicio 1: Clase "Persona"
class Persona {
    public $nombre;
    public $edad;
    public $genero;

    public function __construct($nombre, $edad, $genero) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->genero = $genero;
    }

    public function presentar() {
        echo "Hola, soy {$this->nombre}, tengo {$this->edad} anos y soy {$this->genero}.<br>";
    }
}

$persona = new Persona("Juan", 25, "hombre");
$persona->presentar();

// Ejercicio 2: Clase "Rectangulo"
class Rectangulo {
    public $base;
    public $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

$rectangulo = new Rectangulo(10, 5);
echo "El area del rectangulo es: " . $rectangulo->calcularArea() . "<br>";

// Ejercicio 3: Herencia - Clase "Animal" y "Perro"
class Animal {
    public $especie;

    public function __construct($especie) {
        $this->especie = $especie;
    }

    public function emitirSonido() {
        echo "El {$this->especie} emite un sonido.<br>";
    }
}

class Perro extends Animal {
    public $raza;

    public function __construct($especie, $raza) {
        parent::__construct($especie);
        $this->raza = $raza;
    }

    public function emitirSonido() {
        echo "El perro de raza {$this->raza} ladra: ¡Guau Guau!<br>";
    }
}

$perro = new Perro("perro", "Labrador");
$perro->emitirSonido();

// Ejercicio 4: Herencia - Clase "Producto" y "Electrodomestico"
class Producto {
    public $nombre;
    public $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function mostrarDetalles() {
        echo "Producto: {$this->nombre}, Precio: {$this->precio}€<br>";
    }
}

class Electrodomestico extends Producto {
    public $consumo;

    public function __construct($nombre, $precio, $consumo) {
        parent::__construct($nombre, $precio);
        $this->consumo = $consumo;
    }

    public function mostrarDetalles() {
        echo "Electrodomestico: {$this->nombre}, Precio: {$this->precio}€, Consumo: {$this->consumo} kWh<br>";
    }
}

$producto = new Producto("Mesa", 50);
$producto->mostrarDetalles();

$electrodomestico = new Electrodomestico("Lavadora", 300, 0.5);
$electrodomestico->mostrarDetalles();

// Ejercicio 5: Clase "ConversorMoneda"
class ConversorMoneda {
    private $factorDolarEuro = 0.92; // Ejemplo: 1 USD = 0.92 EUR

    public function convertirDolaresAEuros($dolares) {
        return $dolares * $this->factorDolarEuro;
    }

    public function convertirEurosADolares($euros) {
        return $euros / $this->factorDolarEuro;
    }
}

$conversor = new ConversorMoneda();
echo "100 dolares son " . $conversor->convertirDolaresAEuros(100) . " euros.<br>";
echo "100 euros son " . $conversor->convertirEurosADolares(100) . " dolares.<br>";
?>
