<?php
// 1. Clase "Banco"
class CuentaBancaria {
    private $titular;
    private $saldo;
    private $tipoDeCuenta;

    public function __construct($titular, $saldoInicial, $tipoDeCuenta) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
        $this->tipoDeCuenta = $tipoDeCuenta;
    }

    public function depositar($cantidad) {
        $this->saldo += $cantidad;
    }

    public function retirar($cantidad) {
        if ($cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
        } else {
            echo "Fondos insuficientes.<br>";
        }
    }

    public function mostrarInfo() {
        echo "Titular: {$this->titular}<br>";
        echo "Tipo de cuenta: {$this->tipoDeCuenta}<br>";
        echo "Saldo actual: {$this->saldo}€<br><br>";
    }
}

//  Simulación "Banco"
echo "<h3>Cuenta Bancaria</h3>";
$cuenta = new CuentaBancaria("María López", 1500, "Corriente");
$cuenta->depositar(300);
$cuenta->retirar(500);
$cuenta->mostrarInfo();


// 2. Clase "Gestor de Tareas"
class Tarea {
    private $nombre;
    private $descripcion;
    private $fechaLimite;
    private $estado;

    public function __construct($nombre, $descripcion, $fechaLimite) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaLimite = $fechaLimite;
        $this->estado = "pendiente";
    }

    public function marcarComoCompletada() {
        $this->estado = "completada";
    }

    public function editarDescripcion($nuevaDescripcion) {
        $this->descripcion = $nuevaDescripcion;
    }

    public function mostrarTarea() {
        echo "Nombre: {$this->nombre}<br>";
        echo "Descripción: {$this->descripcion}<br>";
        echo "Fecha límite: {$this->fechaLimite}<br>";
        echo "Estado: {$this->estado}<br><br>";
    }
}

// Simulación "Gestor de Tareas"
echo "<h3>Gestor de Tareas</h3>";
$tareas = [
    new Tarea("Comprar material", "Ir a la tienda de informática", "2025-02-10"),
    new Tarea("Entregar proyecto", "Finalizar y enviar el trabajo final", "2025-02-20"),
];
$tareas[0]->marcarComoCompletada();
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
}


// 3. Clase "Empleado" y "Consultor"
class Empleado {
    protected $nombre;
    protected $sueldo;
    protected $aniosExperiencia;

    public function __construct($nombre, $sueldo, $aniosExperiencia) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->aniosExperiencia = $aniosExperiencia;
    }

    public function calcularBonus() {
        return ($this->sueldo * 0.05) * floor($this->aniosExperiencia / 2);
    }

    public function mostrarDetalles() {
        echo "Nombre: {$this->nombre}<br>";
        echo "Sueldo: {$this->sueldo}€<br>";
        echo "Años de experiencia: {$this->aniosExperiencia}<br>";
        echo "Bonus: {$this->calcularBonus()}€<br><br>";
    }
}

class Consultor extends Empleado {
    private $horasPorProyecto;

    public function __construct($nombre, $sueldo, $aniosExperiencia, $horasPorProyecto) {
        parent::__construct($nombre, $sueldo, $aniosExperiencia);
        $this->horasPorProyecto = $horasPorProyecto;
    }

    public function calcularBonus() {
        $bonus = parent::calcularBonus();
        if ($this->horasPorProyecto > 100) {
            $bonus += 500;
        }
        return $bonus;
    }
}

// Simulación "Empleado y Consultor"
echo "<h3>Empleado y Consultor</h3>";
$empleado = new Empleado("Ana Torres", 2500, 4);
$consultor = new Consultor("Luis García", 3000, 5, 120);
$empleado->mostrarDetalles();
$consultor->mostrarDetalles();


// 4. Clase "Carrito de Compras"
class Carrito {
    private $productos = [];

    public function agregarProducto($nombre, $precio, $cantidad) {
        $this->productos[$nombre] = [
            "precio" => $precio,
            "cantidad" => $cantidad,
        ];
    }

    public function quitarProducto($nombre) {
        unset($this->productos[$nombre]);
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto["precio"] * $producto["cantidad"];
        }
        return $total;
    }

    public function mostrarDetalleCarrito() {
        foreach ($this->productos as $nombre => $detalle) {
            echo "Producto: $nombre, Precio: {$detalle['precio']}€, Cantidad: {$detalle['cantidad']}<br>";
        }
        echo "<br>";
    }
}

// Simulación "Carrito de Compras"
echo "<h3>Carrito de Compras</h3>";
$carrito = new Carrito();
$carrito->agregarProducto("Camiseta", 20, 2);
$carrito->agregarProducto("Zapatos", 50, 1);
$carrito->mostrarDetalleCarrito();
echo "Total del carrito: " . $carrito->calcularTotal() . "€<br><br>";


// 5. Clase "Juego de Rol"
class Personaje {
    private $nombre;
    private $nivel;
    private $puntosVida;
    private $puntosAtaque;

    public function __construct($nombre, $nivel, $puntosVida, $puntosAtaque) {
        $this->nombre = $nombre;
        $this->nivel = $nivel;
        $this->puntosVida = $puntosVida;
        $this->puntosAtaque = $puntosAtaque;
    }

    public function atacar(Personaje $objetivo) {
        $objetivo->puntosVida -= $this->puntosAtaque;
        if ($objetivo->puntosVida < 0) $objetivo->puntosVida = 0;
    }

    public function curarse() {
        $this->puntosVida += 20;
    }

    public function subirNivel() {
        $this->nivel++;
        $this->puntosAtaque += 5;
        $this->puntosVida += 10;
    }

    public function mostrarEstado() {
        echo "Nombre: {$this->nombre}, Nivel: {$this->nivel}, Vida: {$this->puntosVida}, Ataque: {$this->puntosAtaque}<br>";
    }
}

// Simulación "Juego de Rol"
echo "<h3>Juego de Rol</h3>";
$heroe = new Personaje("Héroe", 1, 100, 15);
$villano = new Personaje("Villano", 1, 80, 10);
$heroe->atacar($villano);
$villano->curarse();
$heroe->subirNivel();
$heroe->mostrarEstado();
$villano->mostrarEstado();
?>
