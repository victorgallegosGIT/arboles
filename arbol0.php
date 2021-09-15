<?php
// *********************************************************************************************************** //
// Se define un árbol en PHP y se lo muestra con una función recursiva. Se ve sin indentar
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
// var_export($simpleData);






// ********************************************************************************** // 
function mostrarArbol($nodoActual)
{

	echo $nodoActual['text'] . "<br>";

	//Si tiene nodos descendientes iterar para mostrarlos
	if(is_array($nodoActual['nodes']))
	{
		foreach ($nodoActual['nodes'] as $subArbol) 
		{
			mostrarArbol($subArbol);
		}
	}	

}


// ********************************************************************************** // 
mostrarArbol($simpleData[0]);

?>