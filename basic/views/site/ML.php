
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.mercadolivre.com/oauth/token',
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS =>10,
    CURLOPT_TIMEOUT =>0,
    CURLOPT_FOLLOWLOCATION => TRUE,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST =>'POST',
    CURLOPT_POSTFIELDS => '{
        "grant_type":"authorization_code",
        "client_id":'.$client_id.',
        "client_secret":'.$client_secret.',
        "code":'.$_GET['code'].',
        "redirect_uri": "http://localhost/PecaAgora/basic/ML.php",
        "accept":"application/json",
        "content-type: "application/x-www-form-urlencoded"
    
    }'
    

));

$response = curl_exec($curl);
$resultado = json_decode($response);
dd();
$query = "update tokenmercado SET code = '".$resultado->refresh_token."',access_token = '".$resultado->access_token."' where id='1'";

curl_close($curl);
?>