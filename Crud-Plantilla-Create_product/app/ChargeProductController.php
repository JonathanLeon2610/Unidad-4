<?php
session_start();
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'create':
			$name=strip_tags($_POST['name']);
            $slug=strip_tags($_POST['slug']);
            $description=strip_tags($_POST['description']);
            $features=strip_tags($_POST['features']);
            $brand_id=strip_tags($_POST['brand_id']);

            $productController=new ChargeProductController();
            $productController->createProduct($name,$slug,$description,$features,$brand_id);
            
		break; 
	}
}

class ChargeProductController{

    public function createProduct($name,$slug,$description,$features,$brand_id){
        // Insertar codigo de postman

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => 'playear azul','slug' => 'playera-azul-21-forever-3','description' => 'hermosa playera de color azul de la marca 21 forever','features' => 'La lavadora cuenta con capacidad de lavado de 18 kg, diseño exterior de color gris, su funcionamiento integra tecnología air bubble 4d, sistema de lavado por pulsador, 5 ciclos de lavado mas ciclo ariel , tina de acero inoxidable, 9 niveles de agua y 3 niveles de temperatura. Ofrece llenado con cascada de agua waterrfall, timer para inicio retardado y manija de apertura ez soft','brand_id' => '1','cover'=> ''),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 181|AGU3TWb0mFhEqyjwVZ2YNqVmdWLKLlrhXtBkun3M'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
        $response=json_decode($response);

    }
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