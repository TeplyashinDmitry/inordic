<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>
    <link rel="icon" href="img/icons/icon.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/script.js" defer></script>
    
    
    
</head>
<body>
    <div class="wrapper">
        <header class="header-nav">
            <div class="nav-menu">
                <div class="nav">
                    <div class="nav-logo">
                        <a href="index.php" class="nav-logo-a"><img class="logo" src="img/icons/logo.jpg" style="min-widht:42px"> </a>
                    </div>
                    <div class="nav-type">
                        <a href="catalog.php?category=1" class="nav-type-a">Женщинам</a>
                        <a href="catalog.php?category=2" class="nav-type-a">Мужчинам</a>
                        <a href="catalog.php?category=3" class="nav-type-a">Детям</a>
                        <a href="catalog.php?category=4" class="nav-type-a">Новинки</a>
                        <a href="#foot" class="nav-type-a">О нас</a>
                    </div>
                </div>
                <div class="nav-input">
                    <div class="nav-input-in">
                        <img class="nav-input-in-logo" src="img/icons/account.png" style="widht:11px">
                        <a href="login.php" class="nav-input-in-a">Войти</a>
                    </div>
                    <div class="nav-input-bascet">
                        <img class="nav-input-bascet-logo" src="img/icons/bascet.png" style="widht:18px">
                        <a href="basket.php" class="nav-input-bascet-a">Корзина(<span id="basket-goods"><?= isset($_SESSION['basket']) ? count($_SESSION['basket']) : '0' ?></span>)</a>
                    </div>
                    
                </div>
            </div>
             <div class="hamburger">
                 <span></span>
             </div>
            
        </header>
        <hr>
        <main>
        


        