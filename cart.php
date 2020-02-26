<?php

ob_start();

$url = "https://www.presto-pizza.ro/api/v2/add_product_api";

$data = array(
    "product" => array (
        "id" => "5656edb3-9193-11e6-9d4c-000c29207189",
        "name" => "Pizza diavollo",
        "internal_name" => "Pizza diavollo",
        "full_name" => "Pizza diavollo",
        "description" => "sos rosii, mozzarella, salam chorizo, peperoncino", 
        "prices" => array (
			"0" => array (
				"id" => "5656edb3-9193-11e6-9d4c-000c29207189",
				"base_price" => "34",
				"display_price" => "34",
				"min_price" => "34",
				"discount_price" => "34"
			),
		),
		"vat_rate" => array (
			"id" => "530388f6-1240-11e6-b8d0-000c29207189",
			"name" => "Mancare",
			"rate" => "9",
			"cash_register_group_index" => "2"
		),
		"send_to_kitchen_display" => "false",
        "quantity" => "2",
        "category" => array(
			"id" => "3419f4ec-02b9-11e6-8d7f-ad7f74c99383"
		)
    )
);

$postdata = json_encode($data);


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
$ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('REMOTE_ADDR: $ip', 'HTTP_X_FORWARDED_FOR: $ip', 'applicationclient: prestoPizzaWebApp', 'authorization: 36fe5d1f-5887-11ea-bcba-00505691c3f7', 'Content-Type: application/json', 'restaurant: f3d1af15-bfef-11e7-898d-005056913825'));
$result = curl_exec($curl);
curl_close($curl);
print_r ($result);

				

ob_end_flush();

?>