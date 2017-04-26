<?php
class ChangeString{
	var $abecedario = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
	
	public function build($string){
		$cadena = NULL;
		$i = 0;
		$string = utf8_decode($string);
		 
		while($i < strlen($string)){
			$abecedario = $this->abecedario;
			$character = substr($string, $i, 1);
			$character_comparison = utf8_encode(strtolower($character));
			
			if(in_array($character_comparison, $abecedario)){
				$pos_letra_find = array_search(utf8_encode($character), $abecedario);
				$mayuscula = false;
				
				if (false === $pos_letra_find){
					$pos_letra_find = array_search($character_comparison, $abecedario);	
					$mayuscula = true;
				}
				
				$pos_letra_reemplazo = $pos_letra_find + 1;
				if($pos_letra_reemplazo >= count($abecedario)) $pos_letra_reemplazo = 0;
				
				$nueva_letra = $abecedario[$pos_letra_reemplazo];
				$nueva_letra = ($mayuscula) ? mb_strtoupper($nueva_letra) : $nueva_letra;

			}else
				$nueva_letra = $character;
			
			$cadena.=$nueva_letra;
			$i++;
		}
		
		return $cadena;
	}
}

//$input = "123 abcd*3"; 
//$input = "**Casa 52";
//$input = "**Casa 52Z";
$input = "**Casa 52ZñNñl";//extra
$ClassChange = new ChangeString;
$ouput = $ClassChange->build($input);
echo "input &nbsp;&nbsp;=> ".$input;
echo "<br>output => ".$ouput;
?>