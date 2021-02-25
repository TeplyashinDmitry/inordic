<?php
        require('components/header/index.php'); //подключаем на страницу верстку header
        require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');  // подключаем общий файл доступа к БД
        
      
        $result = Section::getAllLines();
?>
<div class="">
    <div class="center-title">
    Новые поступления весны
    </div>
    <div class="center-description">
    Мы подготовили для Вас лучшие новинки сезона
    </div>
    <div class="center-btn">
    <a href="catalog.php?category=1" class="center-btn-a">посмореть новинки</a>
    </div>
</div>

<div class="main-collage flex-box">
    <?php $i = 1; ?>
            <!-- бежим в цикле по всем строка которые достали -->
                <?php while ($line = mysqli_fetch_assoc($result)) { ?>
                    <a href="catalog.php" class="main-goood-photo-a">
                        <div class="main-goood">
                            <div class="main-goood-photo <?php if ($i == 1 || $i == 10) { echo "big-toll";}?>" style="background:url('<?= $line['cover_photo'] ?>')center center/cover no-repeat">
                                
                                    <div class="goood-icon">
                                        <?= $line['icon'] ?>
                                    </div>
                                    <div class="goood-title">
                                        <?= $line['title'] ?>
                                    </div>
                                    <div class="goood-title2">
                                        <?= $line['title2'] ?>
                                    </div>
                                    <div class="goood-price">
                                        <?= $line['description'] ?>
                                    </div>
                            </div>
                        
                        </div>
                    </a>
       
     <?php $i++; } ?>
</div>

<div class="">
    <div class="after-center-title">
        будь всегда в курсе выгодных предложений
    </div>
    <div class="after-center-description">
        подписывайся и следи за новинками и выгодными предложениями.
    </div>
    <div class="after-center-btn">
        <input type="email" placeholder="e-mail" class="after-center-btn-email">
        <input type="submit" value="записаться" class="after-center-btn-submit">
       
    </div>
</div>





















<?php

require('components/footer/index.php');

?>