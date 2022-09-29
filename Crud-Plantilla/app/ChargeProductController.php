<?php
class ChargeProductController{
    public function chargeProducts($token){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            // Aqui va el bearer toker
            "Authorization: Bearer $token"
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response,true);
        return $response["data"];
        }
    }

?>