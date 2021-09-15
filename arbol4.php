<?php
// *********************************************************************************************************** //
// Se define un árbol en PHP y se lo muestra con una función recursiva. 
// Primero se recorre para determinar un VALOR acumulado de los descendientes de cada nodo pero sin mostrar resultados ( acción en recorrido POST-Orden )
// Luego Se muestra el árbol con ese VALOR acumulado al lado de cada nodo 
// *********************************************************************************************************** //

$simpleData = array(
	array(
		'text'=>'Raíz',
		'valor'=>0,
	  'nodes'=>array(
			array(
				'text'=>'Padre 1',
				'valor'=>10,
			  'nodes'=>array(
			  	array(
				  	'text'=>'Hijo 1',
						'valor'=>10,
				    'nodes'=>array(
				    	array(
				    		'text'=>'Nieto 1',
								'valor'=>10,
				    		'nodes'=>array()
				    	),
				    	array(
				    		'text'=>'Nieto 2',
								'valor'=>10,
				    		'nodes'=>array()
				    	)
				    )
			  	),
			  	array(
					'text'=>'Hijo 2',
					'valor'=>10,
		  		'nodes'=>array()
					)
			  )
			),
			array(
				'text'=>'Padre 2',
				'valor'=>10,
				'nodes'=>array()
			),	
			array(
				'text'=>'Padre 3',
				'valor'=>10,
				'nodes'=>array()
			),	
			array(
				'text'=>'Padre 4',
				'valor'=>10,
				'nodes'=>array(
			  	array(
				  	'text'=>'Hijo 3',
						'valor'=>10,
		    		'nodes'=>array()
				  )
			  )
			),	
			array(
				'text'=>'Padre 5',
				'valor'=>10,
				'nodes'=>array()
			)
		)
	)
);

// ********************************************************************************** // 
function recorrerArbol(&$nodoActual)
{
	$valor_acum = 0;
	
	//Si tiene nodos descendientes iterar para recorrerlos
	if(is_array($nodoActual['nodes']))
	{
		foreach ($nodoActual['nodes'] as &$subArbol) 
		{
			$valor_acum += recorrerArbol($subArbol);
		}
	}	

	$yo = $nodoActual['valor'];
	$nodoActual['valor_acum'] = $valor_acum + $yo;

	return $valor_acum + $yo;

}

// ********************************************************************************** // 
function mostrarArbol($nodoActual, $prof = 0)
{

	//Mostrar el nombre del nodo
	//Agregar espacios para representar la profundidad
	echo str_repeat("&emsp;", $prof);
	//Ahora el text
	echo $nodoActual['text'] . " (" . $nodoActual['valor_acum'] . ")<br>";
	//FIN Mostrar el nombre del nodo

	//Si tiene nodos descendientes iterar para mostrarlos
	if(is_array($nodoActual['nodes']))
	{
		foreach ($nodoActual['nodes'] as $subArbol) 
		{
			mostrarArbol($subArbol, $prof + 1);
		}
	}	

}

// ********************************************************************************** // 
recorrerArbol($simpleData[0]);
mostrarArbol($simpleData[0]);

?>
