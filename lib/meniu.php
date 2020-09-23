<?php

ob_start();

ini_set('memory_limit', '256M');

$url = "https://www.presto-pizza.ro/api/get_category/pizza";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
$ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
$content = curl_exec($curl);
curl_close($curl);

$data = json_decode($content,true);

//print_r($data);

for( $i = 0; $i < count($data['category']['category_has_products']); $i++ ) {
	
	$pizza = $data['category']['category_has_products'][$i];
	$pizzaID = $pizza['product']['id'];
	$pizzaName = $pizza['product']['name'];
	$pizzaInternalName = $pizza['product']['internal_name'];
	$pizzaFullName = $pizza['product']['full_name'];
	$pizzaDescription = $pizza['product']['description'];
	$pizzaIMG = $pizza['product']['icon']['urls']['product_list_url'];
	$pizzaPrice = $pizza['product']['prices']['0']['base_price'];	
	
	echo 'Pizza: ' . $pizzaName . ' cu ingredientele: ' . $pizzaDescription . ' costa: ' . $pizzaPrice . '<br /> ID intern: ' . $pizzaID . '<br /><br />';
	
	
}

				

ob_end_flush();

?>
