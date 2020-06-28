<?php 
include 'fakename.php';
function generateRandomString($length = 4) {
    return substr(str_shuffle(str_repeat($x='123456789abcde', ceil($length/strlen($x)) )),1,$length);
}

//echo  generateRandomString();
  // OR: generateRandomString(24)
$string = generateRandomString();



function curl($url, $data = null, $headers = null) {
	$ch = curl_init();
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		//CURLOPT_PROXY => '185.142.212.152:3128',
	);
	if ($data != "") {
		$options[CURLOPT_POST] = true;
		$options[CURLOPT_POSTFIELDS] = $data;
	}
	if ($headers != "") {
		$options[CURLOPT_HTTPHEADER] = $headers;
	}

	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
function number($length) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
echo "       ==================================
    |             Rastacode Coded          |
      ===================================".PHP_EOL;
echo    'Masukan Domain Email without @: ';
$emails = trim(fgets(STDIN));
echo "Default Password : ";
$password = trim(fgets(STDIN));

echo 'buat berpa banyak: ';
$berpa = trim(fgets(STDIN));
$x = 1;
for ($x = 0; $x <= $berpa; $x++) {
$email= $nama[mt_rand(0,sizeof($nama)-1)].rand(211,200)."@".$emails;
echo $email.'|'.$password. PHP_EOL;

// Headers
$headers = array();
$headers[] = 'X-LIBRARY: okhttp+network-api';
$headers[] = 'Authorization: Basic dGhlc2FpbnRzYnY6ZGdDVnlhcXZCeGdN';
$headers[] = 'User-Agent: Booking.App/22.9 Android/7.1.2; Type: tablet; AppStore: google; Brand: OnePlus; Model: A5010;';
$headers[] = 'X-Booking-API-Version: 1';
$headers[] = 'Content-Encoding: gzip';
$headers[] = 'Content-Type: application/x-gzip; contains="application/json"; charset=utf-8';
$headers[] = 'Host: iphone-xml.booking.com';
$headers[] = 'Accept-Encoding: gzip, deflate';

$hotel = array('3326463', '4984319');
// URL
$regis_url = 'https://iphone-xml.booking.com/json/mobile.createUserAccount?&user_os=7.1.2&user_version=22.9-android&device_id=aa7bf591-'.$string.'-419a-8a4f-29e762d8948a&network_type=wifi&languagecode=en-us&display=large_mdpi&affiliate_id=3378'.rand(10,99);
$wishlist_url = 'https://iphone-xml.booking.com/json/mobile.Wishlist?&user_os=7.1.2&user_version=22.9-android&device_id=aa7bf591-e6dd-'.$string.'-8a4f-29e762d8948a&network_type=wifi&languagecode=en-us&display=large_mdpi&affiliate_id=3378'.rand(10,99);

// Register
$regis_data = json_encode(array("email" => $email, "password" => $password, "return_auth_token" => 1));
$register = curl($regis_url, $regis_data, $headers);
// Wishlist
$regis_deco=json_decode($register,true);
//print($register);
file_put_contents('akun.txt', $email.'|'.$password . PHP_EOL, FILE_APPEND);
$create_wishlist = json_encode(array("wishlist_action" => "create_new_wishlist", "name" => "Jakarta", "hotel_id" => "28250", "auth_token" => $regis_deco["auth_token"]));
$create = curl($wishlist_url, $create_wishlist, $headers);
$wil_dec=json_decode($create,true);
if($wil_dec['success'] == '1'){
	echo "Berhasil membuat Wishlist".PHP_EOL;
	echo "Menambah Wishlist".PHP_EOL;
	foreach ($hotel as $hotel_id) {
		$add_wishlist = json_encode(array("wishlist_action" => "save_hotel_to_wishlists", "new_states" => 1, "list_ids" => $wil_dec["id"], "hotel_id" => $hotel_id, "list_dest_id" => "city%3A%3A-2679652", "update_list_search_config" => 1, "checkin" => "2020-07-27", "checkout" => "2020-07-28", "num_rooms" => 1, "num_adults" => 2, "num_children" => 0, "auth_token" => $regis_deco["auth_token"]));
		$add = json_decode(curl($wishlist_url, $add_wishlist, $headers), true);
	}
	if($add['gta_add_three_items_campaign_status']['status'] != 'not_yet_reached_wishlist_threshold'){
		echo $add['gta_add_three_items_campaign_status']['modal_body_text'].PHP_EOL;
	}
}else{
	echo "Gagal membuat wishlist".PHP_EOL;
}

} 

?>
