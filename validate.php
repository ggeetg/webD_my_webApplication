<?php

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function validate_for_numeric_input($input_value) {
	$input_value = htmlspecialchars($input_value, ENT_QUOTES);
	if(strlen($input_value)>0)
	{
		if(false == is_numeric($input_value))
			return false;
	}
	else
		return false;
	return true;
}

function validate_email($email) {
	$email = htmlspecialchars($email, ENT_QUOTES);
	return eregi("^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$", $email);
}

function validate_maxlen($input_value,$max_len) {
	$input_value = htmlspecialchars($input_value, ENT_QUOTES);
	if(isset($input_value) )
	{
		$input_length = strlen($input_value);
		if($input_length > $max_len)
			return false;
	}
	return true;
}

function validate_minlen($input_value,$min_len) {
	$input_value = htmlspecialchars($input_value, ENT_QUOTES);
	if(isset($input_value) )
	{
		$input_length = strlen($input_value);
		if($input_length < $min_len)
			return false;
	}
	return true;
}

function validate_req($input_value) {
  	if(!isset($input_value) || strlen($input_value) <=0)
	{
		return true;
	}	
  return false;	
}

function validate_alphanumeric($input_value)
{
	if(preg_match("[^A-Za-z0-9]",$input_value))
	{
		return false;
	}
	return true;
}

function validate_numeric($input_value)
{
	if(preg_match("[^0-9]",$input_value))
	{
		return true;
	}
	return false;
}

function validate_numeric_d($input_value)
{
	if(preg_match("[^0-9.-]",$input_value))
	{
		return false;
	}
	return true;
}

function validate_alpha($input_value)
{
	if(preg_match("[^A-Za-z]",$input_value))
	{
		return false;
	}
	return true;
}

?>