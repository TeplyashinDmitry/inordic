<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>
    <link rel="icon" href="img/icons/icon.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
    <script src="js/script.js" defer></script>
    
    
</head>
<body>
    <div class="wrapper">
        <header>
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
                        <a href="" class="nav-input-in-a">Войти</a>
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
                        
        <div class="container mt-4">
		<div class="row">
			<div class="col">
				<h1>Форма<br> регистрации</h1>
				<form  action="check.php" method="post" id="reg">
					<input type="text" name="login" class="form-control" id="login" placeholder="Логин"><br>
					<input type="password" name="password" class="form-control" id="password" placeholder="Пароль" v-on:input="checkPassword"><br>
					<input type="password" name="password" class="form-control" id="passwordagain" placeholder="Подтвердите пароль" v-on:input="checkPassword"><br>
					<button disabled class="btn btn-success button-dim">Зарегистрироваться</button><br>
				</form> 
			</div>
			
			<div class="col login-into">
				<h1>Форма<br> входа</h1>
				<form action="auth.php" method="post">
					<input type="text" name="login" class="form-control" id="login" placeholder="Логин"><br>
					<input type="password" name="password" class="form-control" id="password" placeholder="Пароль"><br>
                    <input type="password" name="password" class="form-control" id="passwordagain" placeholder="Подтвердите пароль" v-on:input="checkPassword"><br>
					<button class="btn btn-success">Авторизоваться</button><br>
				</form> 
			</div>

		</div>
	</div>


    </main>
        
        <div class="wrapper" style="box-sizing:border-box">
            <footer id="foot" style="display: flex">
                
                <div class="footer-collection">
                    <div class="footer-title">Коллекции</div>
                    <a href="catalog.php?category=1" class="footer-collection-a">Женщинам</a>
                    <a href="catalog.php?category=2" class="footer-collection-a">Мужчинам</a>
                    <a href="catalog.php?category=3" class="footer-collection-a">Детям</a>
                    <a href="catalog.php?category=4" class="footer-collection-a">Новинки</a>
                </div>
                <div class="footer-shop">
                    <div class="footer-title">Магазин</div>
                    <a href="catalog.php?category=1" class="footer-shop-a">О нас</a>
                    <a href="catalog.php?category=2" class="footer-shop-a">Доставка</a>
                    <a href="catalog.php?category=3" class="footer-shop-a">Работай с нами</a>
                    <a href="catalog.php?category=4" class="footer-shop-a">контакты</a>
                </div>
                <div class="footer-social">
                    <div class="footer-title">Мы в социальных сетях</div>
                    <a href="catalog.php?category=1" class="footer-social-a">Сайт разработан в inordic.ru</a>
                    <a href="catalog.php?category=2" class="footer-social-a">2020 © Все права защищены</a>
                    <div class="footer-social-fa">
                    <i class="fa fa-twitter fa-2x" style="border: 1px solid black; cursor:pointer;padding:2px" aria-hidden="true"></i>
                    <i class="fa fa-facebook fa-2x" style="border: 1px solid black; cursor:pointer;padding:2px" aria-hidden="true"></i>
                    <i class="fa fa-instagram fa-2x" style="border: 1px solid black; cursor:pointer;padding:2px" aria-hidden="true"></i>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://use.fontawesome.com/988dbafeb9.js"></script>
    <script src="https://unpkg.com/vue"></script>
    <script>
    new Vue ({
        el : '#reg',
        methods : {
            checkPassword : function() {
                if(document.querySelector('#password').value == document.querySelector('#passwordagain').value) {
                    document.querySelector('.button-dim').disabled = false;
                } else {
                    document.querySelector('.button-dim').disabled = true;
                }
            }
        }
    })
    </script>
   
</body>
</html>