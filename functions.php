<?php

function priceFormat($price){
  $price = number_format($price, 0, ',', ' ');
  return $price . ' <b class="rub">р</b>';
}

function include_template($file_path, $variables = []){
  $template = '';
  
  if(file_exists($file_path)){
    extract($variables);
    ob_start();
    include $file_path;
    $template = ob_get_clean();
  }

  return $template;
}

function timer($date){
  $date_ts = strtotime($date) - time();
  
  $hours = floor(($date_ts%86400)/3600);
	$minutes = floor(($date_ts%3600)/60); 

  return $hours . ':' . $minutes;
}