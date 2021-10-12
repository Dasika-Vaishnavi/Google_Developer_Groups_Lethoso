<?php

  $servername = "localhost";
  $username  = "root";
  $password = "";
  $database = "pheha_db";

  //create the database connection
  $conn =  mysqli_connect($servername,$username,$password,$database);
// start session_start
session_start();
  //check if the connection has succeeded
  if ($conn->connect_error)
  {
    die("connection failed : " . $conn->connection_error);
  }

  if(!empty($_POST)){

    //********************************************************/
    // for selecting from events
if ($_POST['action']=='view_events'){

 $query = "SELECT * FROM `event`";

$result = mysqli_query($conn,$query);

$output =  '';
if(!$result){
  die(mysqli_error($conn));
}

while ($row=mysqli_fetch_array($result)){
  $output .='<div class="box">
  <img src="data:image/jpeg;base64,'.base64_encode($row['EVENT_IMAGE'] ).'" alt="">
  <div class="content">
      <div class="icons">
          <a href="#"> <i class="fas fa-map-marker-alt"></i>'.$row['EVENT_LOCATION'].'</a>
          <a href="#"> <i class="fas fa-calendar"></i>'.$row['EVENT_DATE'].'</a>
      </div>
      <h3>Event Description</h3>
      <p>'.$row['EVENT_DESCRIPTION'].'</p>
      <a href="#" class="btn">read more</a>
  </div>
</div>';
}
echo $output;
}

   // for selecting from products
   if ($_POST['action']=='view_products'){
    $query = "SELECT * FROM product";

$result = mysqli_query($conn,$query);

$output =  '';
if(!$result){
  die(mysqli_error($conn));
}

while ($row=mysqli_fetch_array($result)){


  if($row['PRODUCT_OnSale']==0){
  $output .='<div class="swiper-slide box" id="product_div">
  <img src="data:image/jpeg;base64,'.base64_encode($row['PRODUCT_IMAGE'] ).'" alt="">
  <h3>'.$row['PRODUCT_NAME'].'</h3>
  <p>'.$row['DESCRIPTION'].'</p>
  <div class="price">Price: <span style=";">'.$row['PRODUCT_PRICE'].'</span></div>
  <div class="stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star-half-alt"></i>
  </div>
  <a href="#" class="btn" id="add_to_cart">add to cart</a>
</div>';
 }
else{
  $output .='<div class="swiper-slide box">
  <img src="data:image/jpeg;base64,'.base64_encode($row['PRODUCT_IMAGE'] ).'" alt="">
  <h3>'.$row['PRODUCT_NAME'].'</h3>
  <p>'.$row['DESCRIPTION'].'</p>
  <div class="price">Price: <span style=";">'.$row['PRODUCT_PRICE'].'</span></div>
  <div class="price">Now: <span>'.$row['PRODUCT_NEW_PRICE'].'</span></div>
  <div class="stars">
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star"></i>
      <i class="fas fa-star-half-alt"></i>
  </div>
  <a href="#" class="btn">add to cart</a>
</div>';
}
echo $output;
}
  }
   // for selecting from categories
   if ($_POST['action']=='view_categories'){

    $query = "SELECT * FROM category";

   $result = mysqli_query($conn,$query);

   $output =  '';
   if(!$result){
     die(mysqli_error($conn));
   }

   while ($row=mysqli_fetch_array($result)){
     $output .='<div class="box">
     <img src="data:image/jpeg;base64,'.base64_encode($row['CATEGORY_IMAGE'] ).'" alt="">
     <h3>'.$row['CATEGORY_NAME'].'</h3>
     <a href="#" class="btn">shop now</a>
 </div>';
   }
   echo $output;
   }
// FOR LOG IN;
if ($_POST['action']=='btnlogin'){

  $users = $_POST['USER_EMAIL'];
  $upass = $_POST['USER_PASSWORD'];

  // $hashedPassword = password_hash($upass,PASSWORD_BCRYPT,["cost"=>8,"salt"=>"#dnVXo(?N0&bnmMawdnfP~`_+kmdn/?.^#to|,vnfjnza}{+*@commdfgb#"]);
//create some sql statement
        $sql = "SELECT * FROM  users WHERE `USER_PASSWORD`='$upass' && `USER_EMAIL`='$users' limit 1";

         $result = mysqli_query($conn,$sql);
        if(!$result){
         die(mysqli_error($conn));
       }
        $numrows= mysqli_num_rows($result);
        if($numrows>0){
          while($row=mysqli_fetch_array($result))
          {
          if($row['JOB_TYPE']=='manager'){
            $_SESSION["manager_name"] = $row['FIRST_NAME'];
    	    	$_SESSION["manager_lastname"] = $row["LAST_NAME"];
            $output = 1;
            echo $output;
          }
          elseif($row['JOB_TYPE']=='community'){
            $_SESSION["user_id"] = $row['USER_ID'];
              $_SESSION["user_name"] = $row['FIRST_NAME'];
      	    	$_SESSION["user_lastname"] = $row["LAST_NAME"];
            $output = 2;
            echo $output;
          }
         }
        }
        else {
          $output = 0;
          echo $output;
        }
}
// FOR REGISTRATION

if ($_POST['action']=='btnregister'){


  $name = trim($_POST['FIRST_NAME']);
  $sname = trim($_POST['LAST_NAME']);
  $location = trim($_POST['USER_LOCATION']);
  $phone = trim($_POST['USER_PHONE']);
  $gender = trim($_POST['USER_GENDER']);
  $upass = trim($_POST['USER_PASSWORD']);
  $role = trim($_POST['JOB_TYPE']);
  $mail = trim($_POST['USER_EMAIL']);

  // $hashedPassword = password_hash($upass,PASSWORD_BCRYPT,["cost"=>8,"salt"=>"#dnVXo(?N0&bnmMawdnfP~`_+kmdn/?.^#to|,vnfjnza}{+*@commdfgb#"]);

  $sql = "INSERT INTO `users`(`FIRST_NAME`, `LAST_NAME`, `USER_GENDER`, `USER_EMAIL`, `JOB_TYPE`, `USER_LOCATION`, `USER_PASSWORD`, `USER_PHONE`)
   VALUES ('$name','$sname','$gender','$mail','$role','$location','$upass','$phone')";

        $result = mysqli_query($conn,$sql);

        if(!$result){
          die(mysqli_error($conn));
       }
       else {
       echo 1;
       }
  }

}

?>
