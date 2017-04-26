<?php
class ClearPar{
	
	public function build ($string){
		$par = "()";
		$cadena = NULL;
		$i = 0;
		$napariciones = substr_count($string, $par);
		
		while($i < $napariciones){
			$cadena.=$par;
			$i++;	
		}
		
		return $cadena;
	}
}

$input =   "(​()()()()(()))))())((()​)"; 
$ClassClearPar = new ClearPar;
$ouput = $ClassClearPar->build($input);
echo "input &nbsp;&nbsp;=> ".$input;
echo "<br>output => ".$ouput;
?>