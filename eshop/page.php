<?php
        require('components/header/index.php'); //подключаем на страницу верстку header
        require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');  // подключаем общий файл доступа к БД
        
      
        $result = Section::getAllLines();
?>

<? session_start()?>

<? if ($_SESSION['id'] > 0) { ?>
<h1>Привет! Ты зарегался =))))))</h1>
	<a href="exit.php">Что бы выйти нажмите по ссылке.</a>

<? } ?>



<?php

require('components/footer/index.php');

?>