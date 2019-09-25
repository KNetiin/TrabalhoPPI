<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- TITLE -->
        <title>Imobiliária F&F</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!-- ICONS - FONTAWESOME -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <!-- FONT - MONTSERRAT -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <!-- CSS FILES -->
        <link rel="stylesheet" href="css/main.css">

        <!-- JS FILES -->
        <script src="script/main.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <?php include __DIR__ . "/layouts/header.php"; ?>
        
            <!-- PUBLIC -->
            <div class="myPage" id="page-public-home"> <?php include __DIR__ . "/pages/public/home.php"; ?> </div>
            <div class="myPage" id="page-public-properties"> <?php include __DIR__ . "/pages/public/properties.php"; ?> </div>
            
            <!-- PRIVATE -->
            <div class="myPage" id="page-private-clientsList"> <?php include __DIR__ . "/pages/private/clients/clientsList.php"; ?> </div>


            <?php include __DIR__ . "/layouts/footer.php"; ?>
        </div>
    </body>
</html>