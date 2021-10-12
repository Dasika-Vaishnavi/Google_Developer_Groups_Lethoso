
let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
}

document.querySelector('#go-login').onclick = () =>{
    loginForm.classList.toggle('active');
    regForm.classList.remove('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
}

let regForm = document.querySelector('.register-form');

document.querySelector('#reg_button').onclick = () =>{
    regForm.classList.toggle('active');
    loginForm.classList.remove('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

var swiper = new Swiper(".product-slider", {
    loop:true,
    spaceBetween: 20,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
});

var swiper = new Swiper(".review-slider", {
    loop:true,
    spaceBetween: 20,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
});






// for inserting login details

$('#submit_register').click(function(e){
    e.preventDefault();
   //bind parsley to login entry form

     $('.register-form').parsley();

   //after form has been successfully validated

     if($('.register-form').parsley().isValid())
     {
     var name1 = $('#name').val();
     var sname = $('#sname').val();
     var mail = $('#email').val();
     var location = $('#loc').val();
     var phone_number = $('#phone').val();
     var gender = $('#gender').val();
     var pass = $('#pas').val();
     var role_type = $('#role').val();




     var action="btnregister";
          $.ajax({
          url:'homeBackend.php',
          method:'post',
          data:{"action":action,"FIRST_NAME":name1,"LAST_NAME":sname,"USER_LOCATION":location,"USER_EMAIL":mail,"USER_PHONE":phone_number,"USER_GENDER":gender,"USER_PASSWORD":pass,"JOB_TYPE":role_type},
        success: function(data){
             Swal.fire({
             icon: 'success',
             title: 'Success...',
             text: 'you have registered successfully, you can now login...!'
           })
           let regForm = document.querySelector('.register-form');
            regForm.classList.remove('active');
         }
     })

     $('#name').val('');
     $('#sname').val('');
      $('#email').val('');
     $('#loc').val('');
     $('#phone').val('');
      $('#gender').val('');
     $('#pas').val('');
      $('#role').val('');
   }
   })

   // for inserting login details

   $('#submit_login').click(function(e){
       e.preventDefault();
      //bind parsley to login entry form

        $('.login-form').parsley();

      //after form has been successfully validated

        if($('.login-form').parsley().isValid())
        {
        var mail = $('#user').val();
        var password = $('#password').val();
        alert(mail+' '+password)
        var action="btnlogin";
             $.ajax({

             url:'homeBackend.php',
             method:'post',
             data:{"action":action,"USER_EMAIL":mail,"USER_PASSWORD":password},
             success: function(data){
             alert(data)
            if(data==1){
              location.href ='admin.php';
               }
            if(data==2){
              location.href ='index.php';
               }
               else {
                   Swal.fire({
                   icon: 'error',
                   title: 'Ooops...',
                   text: 'register and try again...!'
                 })

               }
            }

        })
      }
      })

      // for fetching the categories
      // ***********************************************************************//
      function fetch_categories(){
          var action = 'view_categories';
          $.ajax({

            url:"homeBackend.php",
            method:"post",
            data:{'action':action},
            success:function(data){
              $("#cat_div").append(data);
           }
      })
      }
    fetch_categories();
      // for fetching the products
      // ***********************************************************************//
      function fetch_products(){
          var action = 'view_products';
          $.ajax({

            url:"homeBackend.php",
            method:"post",
            data:{'action':action},
            success:function(data){
              $("#prod_div").append(data);
              var btn = document.querySelectorAll('#add_to_cart');
              btn.forEach((product) => {
                product.addEventListener('click',function() {
                  alert('added');
                })
              });


            }
      })
      }
      fetch_products();
      // for fetching the events
      // ***********************************************************************//
      function fetch_events(){
          var action = 'view_events';
          $.ajax({

            url:"homeBackend.php",
            method:"post",
            data:{'action':action},
            success:function(data){
              $("#events").append(data);
      }
      })
      }
 fetch_events();
