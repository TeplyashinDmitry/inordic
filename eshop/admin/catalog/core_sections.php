<thead>
            <tr>
              <th>#id</th>
              <th>Title</th>
              <th>Title2</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
              <?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');


$result = Section::getAllLines();

?>
<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<?php while ($line = mysqli_fetch_assoc($result)) { ?>
            <tr>
            
              <td>
                <a href="?template=card&table=<?=$_GET['table']?>&class_name=Section&id=<?= $line['id'] ?>">
                  <?= $line['id'] ?>
                </a>
              </td>
              
              <td><?= $line['title'] ?></td>
              <td><?= $line['title2'] ?></td>
              <td><?= $line['description'] ?></td>
              <td><a href="http://f0418950.xsph.ru/eshop/system/controllers/delete.php?class_name=Section&id=<?=$line['id']?>">x</td>
            </tr>
            
<?php } ?>
            
          </tbody>