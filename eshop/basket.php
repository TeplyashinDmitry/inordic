
<?php 

session_start(); 


require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

//достаю уникальный айди товаров из сессии
$arr_id = [];
foreach($_SESSION['basket'] as $key => $value) {
    //собираю айди товаров
    $arr_id[] = $key;
}


//формируем строку из массива
$id_str = implode(',',$arr_id);

$request = "SELECT * FROM " . Good::TABLE_NAME . " WHERE id IN($id_str) ";


$results = mysqli_query(Connect::getConnection(),$request);
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop</title>
    <link rel="icon" href="img/icons/icon.png" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/script.js" defer></script>
    
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="nav-menu">
                <div class="nav">
                    <div class="nav-logo">
                        <a href="index.php" class="nav-logo-a"><img class="logo" src="img/icons/logo.jpg" style="widht:42px"> </a>
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

<?php   
      require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
      $goods = new Good();
      $result = $goods->getAllLines();
      
?> 

<div class="Basket-up">
    <div class="basket-up-title">
    Ваша корзина
    </div>
    <div class="basket-up-description">
    Товары резервируются на ограниченное время
    </div>
</div>
<div class="center-basket">
    <div class="center-basket-title">
        <div class="center-basket-title-left">
            <div class="cbtl">Фото</div>
            <div class="cbtl">Наименование</div>
        </div>
        <div class="center-basket-title-right">
            <div class="cbtr">Размер</div>
            <div class="cbtr">Количество</div>
            <div class="cbtr">Стоимость</div>
            <div class="cbtr">Удалить</div>
        </div>
    </div>
    <hr>
    
    <?php 
    if($results){
        $total_price = 0;
    while($line = mysqli_fetch_assoc($results)) {
        $total_price = $total_price + ($_SESSION['basket'])[$line['id']] * $line['price'];?>
        <div class="center-basket-out">
                <div class="cbo-title">
                    <div class="center-bas-photo">
                        <div class="center-bas-photo-img" style="url('<?= $line['photos'] ?>')center center/contain no-repeat"></div>
                    </div>
                    <div class="center-bas-title">
                        <div class=""><?=$line['title']?></div>
                        <div class=""><?=$line['articul']?></div>
                    </div>
                    <div class="center-bas-size card-flex-box">39</div>
                    <div class="center-bas-quantity card-flex-box"><?=($_SESSION['basket'])[$line['id']];?></div>
                    <div class="center-bas-price card-flex-box"><?=($_SESSION['basket'])[$line['id']] * $line['price']?></div>
                    <div class="center-bas-delete card-flex-box"><a  href="http://f0418950.xsph.ru/eshop/system/controllers/basket/from_basket.php?id=<?=$line['id']?>">x</a></div>
                    <div class="center-bas-delete card-flex-box"><a href="http://f0418950.xsph.ru/eshop/system/controllers/basket/clear_basket.php">очистить all</a></div>
                </div>
        
    
</div>

<?php } }
?>
    
    
    
    <div class="center-basket-total">
            Итого: <span><?= $total_price ?> руб.</span>
    </div>
</div>

<div class="basket-separator">
    <div class="">
        <img src="img/icons/Shape_1_copy_5.png">
    </div>
</div>

<form class="form-thick">
        <div class="DELIVERY">
                                <div class="delivery-h1">АДРЕС ДОСТАВКИ</div>
                                <div class="delivery-p">Все поля обязательны для заполнения</div>
                                

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="inputState">Выберите вариант доставки</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Курьерская служба - 500 руб</option>
                                    <option>В пункте выдачи  - 200 руб</option>
                                    <option>Самовывоз</option>
                                </select>
                                </div>
                                </div>

                                <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="inputName">* Имя</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputName">* Фамилия</label>
                                            <input type="text" class="form-control">
                                        </div>

                                </div>

                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">* Улица</label>
                                            <input type="text" class="form-control" id="inputAddress" placeholder="ул.Саляма Адиля">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">* Квартира</label>
                                            <input type="text" class="form-control" id="inputAddress2" placeholder="15">
                                        </div>
                            </div>

                           
                            <div class="form-row">
                
                                <div class="form-group col-md-6">
                                <label for="inputCity">* Город</label>
                                <input type="text" class="form-control" id="inputCity"placeholder="Москва">
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputZip">* Индекс</label>
                                <input type="text" class="form-control" id="inputZip"placeholder="100001">
                                </div>
                               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputEmail4">* Email</label>
                                <input type="email" class="form-control" id="inputEmail4">
                                </div>

                                <div class="form-group col-md-6">
                                <label for="inputPhine">* Телефон</label>
                                <input type="tel"class="form-control" id="inputPhone">
                                </div>

                            </div>
                           
                            
        </div>

<div class="basket-separator">
    <div class="">
        <img src="img/icons/Shape_1_copy_5.png">
    </div>
</div>

<div class="PAY">
                                <div class="delivery-h1">ВАРИАНТЫ ОПЛАТЫ</div>
                                <div class="delivery-p">* Все поля обязательны для заполнения</div>
                                <div class="price-all">Стоимость: 12500&nbsp;руб </div>
                                <div class="price-all">Доставка:  500&nbsp;руб </div>
                                <div class="price-all">Итого:  13000&nbsp;руб </div>

                                            <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <label for="inputState">Выберите способ оплаты</label>
                                            <select id="inputState" class="form-control">
                                                <option selected> Картой на сайте</option>
                                                <option>QIWI</option>
                                                <option>ЮMoney</option>
                                                <option>PayPal</option>
                                            </select>
                                            </div>
                                            </div>
                            
                                

        </div>
        <button type="submit" class="btn btn-primary order-button">ЗАКАЗАТЬ</button>
        </form>




















<?php require('components/footer/index.php')?>