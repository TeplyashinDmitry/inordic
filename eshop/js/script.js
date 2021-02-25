$(document).ready(function() {
   $('.hamburger').click(function() {
       $('.hamburger').toggleClass('open-menu');
       $('.nav-menu').toggleClass('open-menu');
   });
});

//  $( document ).ready(function(){
   // 	  $( ".hamburger" ).click(function(){ // задаем функцию при нажатиии на элемент <button>
   // 	    $( ".nav-menu:active" ).click(); // вызываем событие click на элементе <div>
   // 	  });
   // 	  $( "div" ).click(function(){ // задаем функцию при нажатиии на элемент <div>
   // 	    $( "div" ).toggle(); // отображаем, или скрываем элемент
   // 	  });
   // 	});
     $('.to-basket').click(function() {
         
      getBasketGoods(getParams()['id']);

     });
//аналог гет в пхп
     function getParams() {
         let getStr = window.location.search.replace( '?', '');
         let pars = getStr.split('&')
         let pars_assoc = {};
         for (i=0; i<pars.length; i++) {
            let parts = pars[i].split('=');
            pars_assoc[parts[0]] = parts[1];
         }
         return pars_assoc;
     }

     function getBasketGoods(id) {
        //отправить запрос в тубаскетпхп и передать айди товара
      $.ajaxSetup({async : false});
            let response = $.get('http://f0418950.xsph.ru/eshop/system/controllers/basket/to_basket.php?id='+id);

            //получить ответ от тубаскетпхп и вставить его на страницу

            //находим и обновляем цифру товара
            $('#basket-goods').html(response.responseText)
     }

     getBasketGoods(0);

     
     