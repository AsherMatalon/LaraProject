<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class payment extends Model {

    public static function payIt() {

        $payInfo = Session::get('orderId')->toArray();
        $payInfoDe = json_decode($payInfo['content']);
        $payInfoDe = json_decode(json_encode($payInfoDe), true);
        $payInfoDe = array_shift($payInfoDe);


        $payUserInfo = json_encode($payInfoDe);
        $r = json_decode($payUserInfo);



$curl = curl_init();
$url = "127.0.0.1:8080";
$items = [
    "Quantity" => $payInfoDe['quantity'],
    "UnitPrice" => $payInfoDe['price'],
    "Description" => json_encode($payInfoDe),
];

$data = [
    "GroupPrivateToken" => "167a2e10-5081-4997-90e9-57ba8400245c",
    "Items" => [
        $items
    ],

    "RedirectURL" => "http://localhost/PHP_COURSE_FILES/projact%20in%20Laravel/laravel/public/"
];

$dataEn = json_encode($data);

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://testicredit.rivhit.co.il/API/PaymentPageRequest.svc/GetUrl",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "$dataEn",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "cache-control: no-cache",
    ),
    $url
));

$response = curl_exec($curl);
$dataDe = json_decode($response);
header("Location: $dataDe->URL");
//echo '<pre>';
print_r($dataDe->URL);die;
curl_close($curl);
}

};

