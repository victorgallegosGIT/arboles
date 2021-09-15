<?php
// *********************************************************************************************************** //
// Se define un árbol en PHP y se lo muestra con una función recursiva. 
// Primero se recorre para determinar más de un VALOR acumulado de los descendientes de cada nodo pero sin mostrar resultados ( acción en recorrido POST-Orden )
// Luego Se muestra el árbol con esos VALORES acumulados al lado de cada nodo 
// *********************************************************************************************************** //

$simpleData = array(
	array(
		'text'=>'Raíz',
		'monto'=>0,
		'unidades'=>0,
		'gastos'=>1,
	  'nodes'=>array(
			array(
				'text'=>'Padre 1',
				'monto'=>1000,
				'unidades'=>10,
			  'nodes'=>array(
			  	array(
				  	'text'=>'Hijo 1',
						'monto'=>1000,
						'unidades'=>10,
				    'nodes'=>array(
				    	array(
				    		'text'=>'Nieto 1',
								'monto'=>1000,
								'unidades'=>10,
								'gastos'=>1,
				    		'nodes'=>array()
				    	),
				    	array(
				    		'text'=>'Nieto 2',
								'monto'=>1000,
								'unidades'=>10,
				    		'nodes'=>array()
				    	)
				    )
			  	),
			  	array(
					'text'=>'Hijo 2',
					'monto'=>1000,
					'unidades'=>10,
		  		'nodes'=>array()
					)
			  )
			),
			array(
				'text'=>'Padre 2',
				'monto'=>1000,
				'unidades'=>10,
				'gastos'=>1,
				'nodes'=>array()
			),	
			array(
				'text'=>'Padre 3',
				'monto'=>1000,
				'unidades'=>10,
				'nodes'=>array()
			),	
			array(
				'text'=>'Padre 4',
				'monto'=>1000,
				'unidades'=>10,
				'nodes'=>array(
			  	array(
				  	'text'=>'Hijo 3',
						'monto'=>1000,
						'unidades'=>10,
		    		'nodes'=>array()
				  )
			  )
			),	
			array(
				'text'=>'Padre 5',
				'monto'=>1000,
				'unidades'=>10,
				'gastos'=>1,
				'nodes'=>array()
			)
		)
	)
);

// ********************************************************************************** // 
function recorrerArbol(&$nodoActual)
{
	$nodoActual['monto_descendientes'] = 0;
	$nodoActual['unidades_descendientes'] = 0;
	$nodoActual['descendientes'] = 0;
	$nodoActual['gastos_descendientes'] = 0;

	//Si tiene nodos descendientes iterar para recorrerlos
	if(is_array($nodoActual['nodes']))
	{
		foreach ($nodoActual['nodes'] as &$subArbol) 
		{
			$arr_ret = recorrerArbol($subArbol);

			$nodoActual['descendientes'] = $nodoActual['descendientes'] + $arr_ret['descendientes'];
			$nodoActual['monto_descendientes'] = $nodoActual['monto_descendientes'] + $arr_ret['monto_descendientes'];
			$nodoActual['unidades_descendientes'] = $nodoActual['unidades_descendientes'] + $arr_ret['unidades_descendientes'];
			$nodoActual['gastos_descendientes'] = $nodoActual['gastos_descendientes'] + $arr_ret['gastos_descendientes'];
		}
	}	

	return array( 'descendientes'=>$nodoActual['descendientes'] + 1, 
								'monto_descendientes'=>$nodoActual['monto_descendientes'] + $nodoActual['monto'], 
								'unidades_descendientes'=>$nodoActual['unidades_descendientes'] + $nodoActual['unidades'],
								'gastos_descendientes'=>$nodoActual['gastos_descendientes'] + $nodoActual['gastos']
							);
}

// ********************************************************************************** // 
function mostrarArbol($nodoActual, $prof = 0)
{

	//Mostrar el nombre del nodo
	//Agregar espacios para representar la profundidad
	echo str_repeat("&emsp;", $prof);
	//Ahora el text
	echo $nodoActual['text'] . " <b>(" . $nodoActual['descendientes'] . ")</b> ";
	echo " - <b>M.Prop</b> " . $nodoActual['monto'];
	echo " - <b>U.Prop</b> " . $nodoActual['unidades'];
	echo " - <b>G.Prop</b> " . ($nodoActual['gastos']*1);
	echo " - <b>M.Desc</b> " . $nodoActual['monto_descendientes'];
	echo " - <b>U.Desc</b> " . $nodoActual['unidades_descendientes'];
	echo " - <b>G.Desc</b> " . $nodoActual['gastos_descendientes'];
	echo " - <b>G.RAMA</b> " . (($nodoActual['gastos']*1) + $nodoActual['gastos_descendientes']);
	echo"<br>";
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