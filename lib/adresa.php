<?php

ob_start();

$url = "https://www.presto-pizza.ro/api/v2/address";

$data = array(
	"app" => "3", //apartament
    "bloc" => "1", //bloc
	"city" => "62688ad7-c13f-11e7-898d-005056913825", //Popesti Leordeni
	"etaj" => "0", //etaj
	"info" => "acesta este un test", //informatii aditionale adresa
	"interfon" => "03", //interfon
	"latitude" => "44.3637484", //latitudine gmaps
	"longitude" => "26.1484904", //longitudine gmaps
	"number" => "20", //numarul strazii
	"scara" => "A", //scara
	"sector" => null, //sector daca exista
	"street" => "Strada Popesti Vest", //strada
	"valid" => true,
);

$postdata = json_encode($data);


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
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
	'referer: https://www.presto-pizza.ro/customer/addresses/add-address',
	'restaurant: f3d1af15-bfef-11e7-898d-005056913825',
	'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36',
];

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($curl);
curl_close($curl);
print_r ($result);

				

ob_end_flush();

?>
