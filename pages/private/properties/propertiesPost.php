<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $uploadDiretory = '../images/properties';

        $propertieId = uniqid();
        $propertieType = $_POST['type']; // Pode receber os valores 'casa' ou 'apartamento'
        // Aqui em baixo vamos obter todas as informações comuns para os imóveis
        $interest = $_POST['interest']; // Pode receber os valores 'venda' ou 'locacal'
        $availability = $_POST['availability']; // Pode receber os valores '0' ou '1'
        $description = $_POST['description'];
        $bedrooms = $_POST['bedrooms'];
        $suites = $_POST['suites'];
        $livingroom = $_POST['livingRoom'];
        $diningroom = $_POST['diningRoom'];
        $garageVacancies = $_POST['garageVacancies'];
        $inbuiltCabinet = $_POST['inbuiltCabinet']; // Pode receber os valores '0' ou '1'
        $price = $_POST['price'];

        // Informações de localização
        $state = $_POST['state'];
        $city = $_POST['city'];
        $district = $_POST['district'];
        $address = $_POST['address'];
        $addressNumber = $_POST['number'];

        // Abaixo, obteremos as fotos que foram enviadas
        

    }
?>