

function is_in_range_inclusive($value,$min,$max){

	return ($value <= $max && $value >= $min);
}

function is_str_length_in_range_inclusive($value,$min,$max){

	return (strlen($value) <= $max && strlen($value) >= $min)

}




function is_lat($value){
	return (is_numeric((float)$value) && is_in_range_inclusive(float($value),-90,90));
}

function is_long($value){
	return (is_numeric((float)$value) && is_in_range_inclusive(float($value),-180,180));
}

function is_parking_cost($value){
	return (is_numeric((float)$value) && is_in_range_inclusive(float($value),0,100));
}

function is_trail_length($value){
	return (is_numeric((float)$value) && is_in_range_inclusive(float($value),0,1000));
}
		
