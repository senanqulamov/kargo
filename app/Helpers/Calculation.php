<?php

class Calculation{
	public function countries($country){
		$json = '[
		  {
			"code": "3",
			"country": "Azerbaijan"
		  },
		  {
			"code": "15",
			"country": "Arjantin"
		  },
		  {
			"code": "45",
			"country": "Arnavutluk"
		  },
		  {
			"code": "22",
			"country": "Russia"
		  }
		]';
		
		$arr = json_decode($json,true);
		
		$find_val = $country;
		
		$code = "";
		
		foreach ($arr as $key => $value) {
		   if($value['country'] == $find_val)
		   {
			return $code = $value['code'];
		   }
		}
	}
	
	public function total($weight, $width, $height, $length){
		return $calc=round($weight, ($width*$height*$length)/5000);
	}
}

?>