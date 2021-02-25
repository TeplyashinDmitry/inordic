<?php require('components/header/index.php');  
      require_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
      
      
      $result2 = Good::getAllLines();
      
?> 

<?php
if (isset($_GET['category']) && $_GET['category'] == 1) {
   echo 'ГЛАВНАЯ / ЖЕНЩИНАМ';
} elseif (isset($_GET['category']) && $_GET['category'] == 2) {
   echo 'ГЛАВНАЯ / МУЖЧИНАМ';
} elseif (isset($_GET['category']) && $_GET['category'] == 3) {
   echo 'ГЛАВНАЯ / ДЕТЯМ';
} else {
   echo 'ГЛАВНАЯ / ВСЕ ТОВАРЫ';
}

?>

<div class="select-menu">
<select id="select_menu_cat" class=" select-menu-br" onchange="fill('select_menu_size', select_menu_sizes[this.selectedIndex])">Категория</select>


<select id="select_menu_size" class="select-menu-br" style="width: 100px;">Размер</select>


<select id="select_menu_price" class="select-menu-br">
    <option value="hide">Стоимость</option>
    <option value="january">0-1000 руб</option>
    <option value="february">1000-2000 руб</option>
    <option value="march">2000-3000 руб</option>
    <option value="april">3000-4000 руб</option>
    <option value="may">4000-5000 руб</option>
    
</select> 
</div>
<div class="flex-box bgwidth">
          <!-- бежим в цикле по всем строка которые достали -->
      <?php 
         
         
         while ($line = mysqli_fetch_assoc($result2)) { 
            // echo $line['categorys']." - ". $_GET['category']. '<br>' ;
            
            if($_GET['category'] == $line['categorys']) { ?>
               <div class="bingo-good">
         
               <div class="good">
               <a href="card.php?id=<?=$line['id']?>">
                  <div class="good-photo" style="background:url('<?= $line['photo'] ?>')center center/contain no-repeat"> 
                  </div>
                  </a>
               </div>
               
               <div class="bingo-good-title">
                  <div class="good-title">
                     <?= $line['title'] ?>
                  </div>
                  <div class="good-price">
                  <?= $line['price'] ?> руб.
                  </div>
               </div>
               
          </div>
   
     <?php } }?>
</div>
<?php 

 
// $link = mysqli_connect('localhost','f0418950_sonik134','','f0418950_eshop');
// mysqli_set_charset($link,'utf8');
// $perPage = 8;
// if (!isset($_GET['page'])) {
// 	$currPage = $_GET['category'];
// } else {
// 	$currPage = $_GET['page'];
// }

// $start = ($currPage - 1 )*$perPage; 

// //сформировали текст запроса
// $sqlText = "SELECT * FROM core_goods LIMIT $start,$perPage";
// $result = mysqli_query($link,$sqlText);

// $sqlText = "SELECT COUNT(id) as amount FROM core_goods ";
// $result = mysqli_query($link,$sqlText);
// $res = mysqli_fetch_assoc($result);


// $page_amount = ceil($res['amount']/$perPage); 

?>

<div class="catalog-down-tab">
   <?php
   for ($i=1; $i <= $page_amount; $i++) { ?>
      <?if ($i == $currPage) { ?>
      
            <span class="pagin">
               <?=$i ?>     
            </span>
            
         <? }else { ?>
         
            <a class="pagin-a" href="?page=<?=$i ?>"> 
               <?=$i ?>     
            </a>
      
      <? } ?>
   <? } ?> 
</div>
<script>
   const select_menu_cats = ['Джинсы', 'Пуловер', 'Кроссовки', 'Куртки'];
   const select_menu_sizes = [
                     ['S','M','L','XL','XXL','XXXL'],
                     ['S','M','L','XL','XXL','XXXL'],
                     ['39', '40','41','42','43','44'],
                     ['XS','S','M','L','XL','XXL','XXXL'],
                  ];
   const fill = (id, options) => {
   const sel = document.getElementById(id), def = 0;
   sel.innerHTML = '';
   for (let i = 0; i < options.length; i++) {
      const opt = document.createElement('option');
      opt.value = i;
      opt.innerHTML = options[i];
      if (i === def) {
         opt.selectedIndex = i;
      }
      sel.appendChild(opt);
   }

   return def;
   };

fill('select_menu_size', select_menu_sizes[fill('select_menu_cat', select_menu_cats)]);





</script>

<?php require('components/footer/index.php'); ?>