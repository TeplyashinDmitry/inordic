<?php 

require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
if (isset($_GET['id'])) {
    $section = new Section();

    $fileName = 'update.php';} else {
        $fileName = 'create.php';
    };




?>



<form action="http://f0418950.xsph.ru/eshop/system/controllers/<?=$fileName?>" method="POST">
<div class="">
    <input type="hidden" name="class_name" value="Section">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
</div>
        <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input name="title" value="<?= isset($_GET['id']) ? $section->getField('title') : ''; ?> " type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Доп название</label>
            <input name="title2" value="<?= isset($_GET['id']) ? $section->getField('title2') : ''; ?> " type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание +</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= isset($_GET['id']) ? $section->getField('description') : ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить в БД</button>
    </form>