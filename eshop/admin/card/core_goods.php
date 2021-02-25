<?php 

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
if (isset($_GET['id'])) {
    $good = new Good();

    $fileName = 'update.php';} else {
        $fileName = 'create.php';
    }




?>


<form action="http://f0418950.xsph.ru/eshop/system/controllers/<?=$fileName?>" method="POST">
<div class="">
<input type="hidden" name="class_name" value="Good">
<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
</div>
        <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input name="title" type="text" value="<?= isset($_GET['id']) ? $good->getField('title') : ''?> " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Артикул</label>
            <input name="articul" type="text" value="<?= isset($_GET['id']) ? $good->getField('articul') : ''?> " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Цена</label>
            <input name="price" type="number" value="<?= isset($_GET['id']) ? $good->getField('price') : ''?>" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea name="description"  class="form-control" id="exampleFormControlTextarea1" rows="3"><?= isset($_GET['id']) ? $good->getField('description') : ''?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить в БД</button>
    </form>