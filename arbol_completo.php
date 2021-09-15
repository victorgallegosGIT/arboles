<?php

// Implementación de un árbol en una clase Nodo
class Nodo {

	public $valor;
	public $hijos;

	public function __construct($valor) {
  
    $this->valor = $valor;
    $this->hijos = array();
    $this->padre = null;

  }		

  public function setNodoPadre(&$nodo) {
  	$this->padre = $nodo;
  }

  public function getNodoPadre() {
    return $this->padre;
  }

  public function agregarHijo(&$nodo) {
    $nodo->setNodoPadre($this);
    $this->hijos[] = $nodo;
  }

  public function gethijos() {
    return $this->hijos;
  }

  public function eliminarHijos() {
    $this->hijos = array();
  }

  public function mostrar($prof = 0) {

		echo str_repeat("&emsp;", $prof);			//Escribir tantos espacios como la profundidad actual para generar indentqción visual

		echo $this->valor . "<br>";						//Imprimir el valor actual

		//Si tiene nodos descendientes iterar para mostrarlos
		foreach ($this->hijos as $subArbol) 
		{
			$subArbol->mostrar($prof+1);				//Llamada recursiva
		}

  }
}
// Fin CLase


// ************************************************************************************************************************************* //
//EJEMPLOS DE USO

/*
Estructura a generar:

Raíz
|-Padre 1
| |-Hijo 1
| | |-Nieto 1
| | |-Nieto 2
| |-Hijo 2
|-Padre 2
|-Padre 3
|-Padre 4
| |-Hijo 3
|-Padre 5
*/

// ******************************* //
// Rellenado recorriendo recursivamente con la estrategia de crear un nodo. Para cada hijo generar su subárbol y luego agregar el nodo actual a su padre 
echo "----------------<br/>";
$root = new Nodo('Raíz');
$p1 = new Nodo('Padre 1');
$h1 = new Nodo('Hijo 1');
$n1 = new Nodo('Nieto 1');
$h1->agregarHijo($n1);
$n2 = new Nodo('Nieto 2');
$h1->agregarHijo($n2);
$p1->agregarHijo($h1);
$h2 = new Nodo('Hijo 2');
$p1->agregarHijo($h2);
$root->agregarHijo($p1);
$p2 = new Nodo('Padre 2');
$root->agregarHijo($p2);
$p3 = new Nodo('Padre 3');
$root->agregarHijo($p3);
$p4 = new Nodo('Padre 4');
$h3 = new Nodo('Hijo 3');
$p4->agregarHijo($h3);
$root->agregarHijo($p4);
$p5 = new Nodo('Padre 5');
$root->agregarHijo($p5);
$root->mostrar();

// ******************************* //
// Otro árbol generado con la estrategia de primero crear todos los nodos descendientes y luego agregar cada nodo al padre que le corresponde 

echo "<br/>----------------<br/>";
$a2 = new Nodo('Árbol 2');
$a2_1 = new Nodo('Árbol 2.1');
$a2_1_1 = new Nodo('Árbol 2.1.1');
$a2_1_2 = new Nodo('Árbol 2.1.2');
$a2_2 = new Nodo('Árbol 2.2');
$a2_3 = new Nodo('Árbol 2.3');

$a2->agregarHijo($a2_1);
$a2->agregarHijo($a2_2);
$a2->agregarHijo($a2_3);
$a2_1->agregarHijo($a2_1_1);
$a2_1->agregarHijo($a2_1_2);

$a2->mostrar();


// ******************************* //
// Inserción audaz del primer árbol en el nodo 2.2 del segundo árbol
echo "<br/>----------------<br/>";
$a2_2->agregarHijo($root);
$a2->mostrar();


?>