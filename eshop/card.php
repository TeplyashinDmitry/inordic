<?php


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
   require('components/header/index.php');
   require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
    
?>


<?php
 if (isset($_GET['category']) && $_GET['category'] == 1) {
    echo 'Женщинам';
 } elseif (isset($_GET['category']) && $_GET['category'] == 2) {
    echo 'Мужчинам';
 } elseif (isset($_GET['category']) && $_GET['category'] == 3) {
    echo 'Детям';
 } else {
    echo 'Все товары';
 }
    $good = new Good();
    
?>


<?php $line = $good->getInfo() ?>
      <div class="123">
         <div class="ggood good1 flex-box">
             <div class="ggood-photo" style="background:url('<?= $line['photo'] ?>')center center/contain no-repeat">
             </div>
         </div>
         <div class="ggood">
            <div class="ggood-title">
                <?= $line['title'] ?>
            </div>
            <div class="ggood-articul">
            Артикул:&nbsp; <?= $line['articul'] ?>
            </div>
            <div class="ggood-price">
            <?= $line['price'] ?>&nbsp;руб.
            </div>
            <div class="ggood-description">
            <?= $line['description'] ?>
            </div>
         </div>
      </div>   

      <div class="card-ggood">
         <div class="card-ggood-size">
            Размер
         </div>
         <div class="card-size">
            <div class="card-sizes card-tabs card-flex-box">38</div>
            <div class="card-sizes card-tabs card-flex-box">39</div>
            <div class="card-sizes card-tabs card-flex-box">40</div>
            <div class="card-sizes card-tabs card-flex-box">41</div>
            <div class="card-sizes card-tabs card-flex-box">42</div>
         </div>
         
         <div class="card-basket to-basket">
            Добавить в корзину
         </div>
         
      </div>
      


<?php require('components/footer/index.php'); ?>