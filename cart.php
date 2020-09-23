<?php

ob_start();

$url = "https://www.presto-pizza.ro/api/v2/add_product_api";

$data = array(
    "product" => array (
        "id" => "441b6aa1-a7b5-11e9-8bd6-00505691c3f7",
        "name" => "30 cm",
        "internal_name" => "Pizza hot cheese 30 cm",
        "full_name" => "Pizza hot cheese 30 cm",
        "description" => "mozzarella, gorgonzola, emmentaler, parmezan, peperoncino", 
        "prices" => array (
			"0" => array (
				"id" => "441b8883-a7b5-11e9-8bd6-00505691c3f7",
				"base_price" => "36",
				"display_price" => "36",
				"min_price" => "36",
				"discount_price" => "36"
			),
		),
		"vat_rate" => array (
			"id" => "530388f6-1240-11e6-b8d0-000c29207189",
			"name" => "Mancare",
			"rate" => "9",
			"cash_register_group_index" => "2"
		),
		"send_to_kitchen_display" => "false",
        "quantity" => "1",
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

$headers = [
    'REMOTE_ADDR: '.$ip.'',
    'HTTP_X_FORWARDED_FOR: '.$ip.'',
	'accept: application/json, text/plain, */*',
	'applicationclient: prestoPizzaWebApp',
	'appversion: 2.0',
	'authorization: 08fa8b30-58e1-11ea-bcba-00505691c3f7',
	'content-type: application/json',
	'origin: https://www.presto-pizza.ro',
	'referer: https://www.presto-pizza.ro/personalizeaza/pizza/pizza-hot-cheese/6ed53da0-a7b9-11e9-8bd6-00505691c3f7',
	'restaurant: f3d1af15-bfef-11e7-898d-005056913825',
	'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36',
];

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($curl);
curl_close($curl);
print_r ($result);

				

ob_end_flush();

?>
