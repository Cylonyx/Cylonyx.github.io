<?php

//user info
$payInfo = Get_Addr_For_Specific_Nft_Sale(17358,158248,1,7);

if (array_key_exists("paymentAddress",$payInfo) == true) {
	$pmtAddr = $payInfo["paymentAddress"];
	} else {
	$pmtAddr = "Sorry, this is sold out.";
}

function env() {
	$env = array("apikey" => "d951cc16219a40c989fccbc0b0d422cb",
	"baseURL" => "https://api.nft-maker.io/");
	return $env;
}

function Get_Addr_For_Specific_Nft_Sale($projID,$nftID,$nftCt,$adaCost) {
	$adaCost = $adaCost * 1000000;
	$env = env();
	$apikey=$env["apikey"];
	$baseURL=$env["baseURL"];
	$url = $baseURL."GetAddressForSpecificNftSale/".$apikey."/".$projID."/".$nftID. "/1/".$adaCost;
	$data = curlURL($url);
	return $data;
}

function curlURL($urlInput) {
	//  Initiate curl
	$ch = curl_init();
	// Will return the response, if false it print the response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Set the url
	curl_setopt($ch, CURLOPT_URL,$urlInput);
	$result=curl_exec($ch);
	curl_close($ch);
	$jsonArr = json_decode($result, true);
	
	return $jsonArr;
}

?>
