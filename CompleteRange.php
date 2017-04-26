<?php
class CompleteRange{
	
	public function build ($enteros = []){
		$i = 0;
		$ndigitos = count($enteros);
		$nueva_coleccion = [];
		
		while($i < $ndigitos){
			$number = $enteros[$i];
			$pos_next_number = $i + 1;

			if($pos_next_number >= $ndigitos){
				array_push($nueva_coleccion, $number);
				break;
			}
			
			$next_number = $enteros[$pos_next_number];
			$ini = $number;
			while($ini < $next_number) array_push($nueva_coleccion, $ini++);					
			
			$i++;
		}
		
		return $nueva_coleccion;
	}
}

//$input = [4, 6, 7, 10];
//$input = [1, 2, 4, 5];
//$input = [2, 4, 9];
//$input = [55, 58, 60];
$input = [15, 24, 40]; //extra
//$input = [2, 14, 20]; //extra
//$input = [2, 5, 6]; //extra
//$input = [1, 4, 5, 7, 8]; //extra

$ClassCompleteRange = new CompleteRange;
$ouput = $ClassCompleteRange->build($input);

echo "entrada : ";
foreach($input as $reg)  echo $reg.", ";

echo "<br>salida   &nbsp;&nbsp;: ";
foreach($ouput as $reg)  echo $reg.", ";
?>