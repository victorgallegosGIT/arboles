<?php
// *********************************************************************************************************** //
// Se define un árbol en PHP y se lo muestra con una función recursiva. 
// Se ve indentado
// *********************************************************************************************************** //

$simpleData = array(
	array(
		'text'=>'Raíz',
	  'nodes'=>array(

			array(
				'text'=>'Padre 1',
			  'nodes'=>array(
			  	array(
				  	'text'=>'Hijo 1',
				    'nodes'=>array(
				    	array(
				    		'text'=>'Nieto 1',
				    		'nodes'=>array()
				    	),
				    	array(
				    		'text'=>'Nieto 2',
				    		'nodes'=>array()
				    	)
				    )
			  	),
			  	array(
					'text'=>'Hijo 2',
		  		'nodes'=>array()
					)
			  )
			),
			array(
				'text'=>'Padre 2',
				'nodes'=>array()
			),	
			array(
				'text'=>'Padre 3',
				'nodes'=>array()
			),	
			array(
				'text'=>'Padre 4',
				'nodes'=>array(
			  	array(
				  	'text'=>'Hijo 3',
		    		'nodes'=>array()
				  )
			  )
			),	
			array(
				'text'=>'Padre 5',
				'nodes'=>array()
			)
		)
	)
);

// ********************************************************************************** // 
function mostrarArbol($nodoActual, $prof = 0)
{

	//Mostrar el nombre del nodo
	//Agregar espacios para representar la profundidad
	echo str_repeat("&emsp;", $prof);
	//Ahora el text
	echo $nodoActual['text'] . "<br>";
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
mostrarArbol($simpleData[0]);

?>
