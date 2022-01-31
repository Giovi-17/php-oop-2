<?php 

    /*

    Oggi pomeriggio provate ad immaginare 
    quali sono le classi necessarie per 
    creare uno shop online; ad esempio, 
    ci saranno sicuramente dei prodotti 
    da acquistare e degli utenti che 
    fanno shopping.
    Strutturare le classi gestendo 
    l'ereditarietà dove necessario; 
    ad esempio ci potrebbero essere degli 
    utenti premium che hanno diritto a 
    degli sconti esclusivi, oppure 
    diverse tipologie di prodotti.
    Provate a stampare in pagina come 
    visto questa mattina i prodotti 
    scelti dall'utente.

    */

    include_once __DIR__ . "/User.php";
    include_once __DIR__ . "/PremiumUser.php";
    include_once __DIR__ . "/PC.php";
    include_once __DIR__ . "/Smartphone.php";
    include_once __DIR__ . "/Console.php";
    include_once __DIR__ . "/Fridge.php";

    $asus = new PC("Asus", "X555", 16);
    $asus->display = "2560x1440";
    $asus->rom = 2000;
    $asus->price = 2000;

    $iphone13 = new Smartphone("Apple", "iPhone 13", 6);
    $iphone13->display = "1920x1080";
    $iphone13->rom = 256;
    $iphone13->price = 1300;

    $playstation5 = new Console("Sony", "Playstation 5", 16);
    $playstation5->display = "none";
    $playstation5->rom = 1000;
    $playstation5->price = 500;

    $fridge = new Console("LG", "MegaCold", 4);
    $fridge->display = "500x500";
    $fridge->rom = 2;
    $fridge->price = 1000;

    $luca = new PremiumUser("Luca", "Rossi", "luca@rossi.it");

    $luca->getAddProduct($asus);
    $luca->getAddProduct($iphone13);
    $luca->getAddProduct($playstation5);
    $luca->getAddProduct($fridge);

    $lucaBasket = $luca->getBasket();

/*     var_dump($luca); */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon</title>
</head>
<body>

<style>

    *{

        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    body{

        font-family: 'Architects Daughter', cursive;
        font-family: 'Roboto', sans-serif;

    }

    h1, .user{

        text-align: center;

    }

    .user{

        margin: 20px 0;

    }

    .productContainer{

        margin: 50px 0;

        display: flex;
        justify-content: center;

        flex-wrap: wrap;

    }

    .product{

        margin: 0 20px;
        padding: 15px 15px;

        background-color: lightcoral;
        border-radius: 10px;

    }

    .pricePremium{

        color: red;
        text-decoration: line-through;

    }

    .price{

        color: green;

    }

</style>

    <h1>Amazon</h1>
    <h2 class="user">Benvenuto: <?php echo $luca->getFullName(); ?></h2>
    
    <div class="productContainer">
        <?php foreach( $lucaBasket as $basket ){ ?>

            <div class="product">

                <h2>Marca: <?php echo $basket->brand ?></h2>
                <h3>Modello: <?php echo $basket->model ?></h3>
                <div>Display: <?php echo $basket->display ?></div>
                <div>Ram: <?php echo $basket->ram ?>GB</div>
                <div>Rom: <?php echo $basket->rom ?>GB</div>
                
                <?php if(isset($luca->discount)){ ?>

                    <?php $normalPrice = $basket->price; ?>
                    <?php $discount = $luca->discount; ?>
                    <?php $discountPrice = ( $normalPrice * $discount ) / 100 ; ?>

                    <?php $premiumPrice = $normalPrice - $discountPrice ; ?>

                    <div>Price: <span class="pricePremium"><?php echo $basket->price ?>€</span> -> <span class="price"><?php echo $premiumPrice ?>€</span></div>

                <?php } else{ ?>

                    <div>Price: <span class="price"><?php echo $basket->price ?>€</span></div>

                <?php } ?>

            </div>

        <?php } ?>
    </div>

</body>
</html>