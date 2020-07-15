<?php
$num = 1000000.122;
$num1 = 100000000.2315412485;
echo numberToCurrency($num).'<br />'.numberToCurrency($num1);

function numberToCurrency($num)
{
    $explrestunits = "" ;
	$float_number = '';
	
    $find_str = strpos($num, '.');
    
	if($find_str > 0){
        $num_array = explode('.',$num);
		$num = $num_array[0];
		$float_number = $num_array[1];
    }
	
	if(strlen($num)>3){
		$lastthree = substr($num, strlen($num)-3, strlen($num));
		$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
		$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
		$expunit = str_split($restunits, 2);
		for($i=0; $i<sizeof($expunit); $i++){
			// creates each of the 2's group and adds a comma to the end
			if($i==0)
			{
				$explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
			}else{
				$explrestunits .= $expunit[$i].",";
			}
		}
		$thecash = $explrestunits.$lastthree;
	}else {
		$thecash = $num;
	}
	
	if(!empty($float_number)){
		if(strlen($float_number) > 5){
			$float_number = substr($float_number,0,5);
		}
		
		$thecash .= '.'.$float_number;
	}
	
	return $thecash;
}