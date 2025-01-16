<?php
// Clase "Libro": Permite representar un libro con titulo, autor y numero de paginas.
class Libro {
    public $titulo;
    public $autor;
    public $numeroPaginas;

    public function __construct($titulo, $autor, $numeroPaginas) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->numeroPaginas = $numeroPaginas;
    }

    public function mostrarInfo() {
        echo "Titulo: $this->titulo, Autor: $this->autor, Paginas: $this->numeroPaginas\n";
    }
}

$libro1 = new Libro("La Odisea", "Homero", 541);
$libro1->mostrarInfo();

// ----------------------------------------------

// Clase "Circulo": Representa un circulo y permite calcular su area.
class Circulo {
    public $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return pi() * pow($this->radio, 2);
    }
}

$circulo = new Circulo(7);
echo "Area del circulo: " . $circulo->calcularArea() . "\n";

$otroCirculo = new Circulo(12);
echo "Area del otro circulo: " . $otroCirculo->calcularArea() . "\n";

// ----------------------------------------------

// Clase "Vehiculo": Clase base que representa un vehiculo con una marca.
class Vehiculo {
    public $marca;

    public function __construct($marca) {
        $this->marca = $marca;
    }

    public function encender() {
        echo "El vehiculo de marca $this->marca esta encendido.\n";
    }
}

// Clase "Coche": Hereda de Vehiculo y agrega la propiedad modelo.
class Coche extends Vehiculo {
    public $modelo;

    public function __construct($marca, $modelo) {
        parent::__construct($marca);
        $this->modelo = $modelo;
    }

    public function mostrarDetalles() {
        echo "Marca: $this->marca, Modelo: $this->modelo\n";
    }
}

$coche = new Coche("Toyota", "Corolla");
$coche->encender();
$coche->mostrarDetalles();

// ----------------------------------------------

// Clase "Empleado": Representa un empleado con nombre y sueldo.
class Empleado {
    public $nombre;
    public $sueldo;

    public function __construct($nombre, $sueldo) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function mostrarDetalles() {
        echo "Empleado: $this->nombre, Sueldo: $this->sueldo\n";
    }
}

// Clase "Gerente": Hereda de Empleado y agrega la propiedad departamento.
class Gerente extends Empleado {
    public $departamento;

    public function __construct($nombre, $sueldo, $departamento) {
        parent::__construct($nombre, $sueldo);
        $this->departamento = $departamento;
    }

    public function mostrarDetalles() {
        echo "Gerente: $this->nombre, Sueldo: $this->sueldo, Departamento: $this->departamento\n";
    }
}

$empleado = new Empleado("Carlos", 3000);
$gerente = new Gerente("Ana", 6000, "Finanzas");

$empleado->mostrarDetalles();
$gerente->mostrarDetalles();

// ----------------------------------------------

// Clase "Calculadora": Permite realizar operaciones matematicas basicas.
class Calculadora {
    public function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        if ($b == 0) {
            return "Error: Division por cero no permitida.";
        }
        return $a / $b;
    }
}

$calculadora = new Calculadora();
echo "Suma: " . $calculadora->sumar(8, 10) . "\n";
echo "Resta: " . $calculadora->restar(20, 5) . "\n";
echo "Multiplicacion: " . $calculadora->multiplicar(3, 4) . "\n";
echo "Division: " . $calculadora->dividir(16, 4) . "\n";
?>







?>
