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

    echo str_repeat("&emsp;", $prof);     //Escribir tantos espacios como la profundidad actual para generar indentqción visual

    echo $this->valor . "<br>";           //Imprimir el valor actual

    //Si tiene nodos descendientes iterar para mostrarlos
    foreach ($this->hijos as $subArbol) 
    {
      $subArbol->mostrar($prof+1);        //Llamada recursiva
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
$root = new Nodo('A');
$A1 = new Nodo('A1');
$a12 = new Nodo('A12');
$a13 = new Nodo('A13');
$a14 = new Nodo('A14');
$a15 = new Nodo('A15');
$a16 = new Nodo('A16');
$A1->agregarHijo($a12);
$A1->agregarHijo($a13);
$A1->agregarHijo($a14);
$A1->agregarHijo($a15);
$A1->agregarHijo($a16);
$root->agregarHijo($A1);

$A2 = new Nodo('A2');
$root->agregarHijo($A2);

$a21 = new Nodo('A21');
$a22 = new Nodo('A22');
$a23 = new Nodo('A23');
$a24 = new Nodo('A24');
$a25 = new Nodo('A25');
$A2->agregarHijo($a21);
$A2->agregarHijo($a22);
$A2->agregarHijo($a23);
$A2->agregarHijo($a24);
$A2->agregarHijo($a25);
$a221 = new Nodo('A221');
$a222 = new Nodo('A222');
$a223 = new Nodo('A223');
$a24 = new Nodo('A22');
$a22->agregarHijo($a221);
$a22->agregarHijo($a222);
$a22->agregarHijo($a223);
$a22->agregarHijo($a24);



$A3 = new Nodo('A3');

$root->agregarHijo($A3);


$A31 = new Nodo('A31');

$A3->agregarHijo($A31);

$a311 = new Nodo('A311');
$a312 = new Nodo('A312');
$a313 = new Nodo('A313');
$a314 = new Nodo('A314');
$a315 = new Nodo('A315');
$A31->agregarHijo($a311);
$A31->agregarHijo($a312);
$A31->agregarHijo($a313);
$A31->agregarHijo($a314);
$A31->agregarHijo($a315);




$root->mostrar();


// ******************************* //
// Otro árbol generado con la estrategia de primero crear todos los nodos descendientes y luego agregar cada nodo al padre que le corresponde 

echo "<br/>----------------<br/>";
$z2 = new Nodo('Árbol 2');
$z2 = new Nodo('Árbol 2');
$z2_1 = new Nodo('Árbol 2.1');
$z2_1_1 = new Nodo('Árbol 2.1.1');
$z2_1_2 = new Nodo('Árbol 2.1.2');
$z2_2 = new Nodo('Árbol 2.2');
$z2_3 = new Nodo('Árbol 2.3');

$z2->agregarHijo($z2_1);
$z2->agregarHijo($z2_2);
$z2->agregarHijo($z2_3);
$z2_1->agregarHijo($z2_1_1);
$z2_1->agregarHijo($z2_1_2);

$z2->mostrar();


// ******************************* //
// Inserción audaz del primer árbol en el nodo 2.2 del segundo árbol
echo "<br/>----------------<br/>";
//$z2_2->agregarHijo($root);
$z2->mostrar();


?>






