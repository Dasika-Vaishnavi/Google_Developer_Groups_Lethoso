<?php

$servername = "localhost";
$username  = "root";
$password = "";
$database = "pheha_db";

  //create the database connection
  $conn =  mysqli_connect($servername,$username,$password,$database);

  //check if the connection has succeeded
  if ($conn->connect_error)
  {
    die("connection failed : " . $conn->connection_error);
  }

 if(!empty($_POST)){

if ($_POST['action']=='record_plastic') {

      $mass = mysqli_escape_string($conn,$_POST['mass']);
      $plastic_price = mysqli_escape_string($conn,$_POST['price']);
      $location = mysqli_escape_string($conn,$_POST['location']);

        $query = "INSERT INTO `plastic`(`PLASTIC_PRICE`, `LOCATION`,`PLASTIC_MASS`)
        VALUES ('$plastic_price','$location','$mass')";

          $result = mysqli_query($conn,$query);
          if(!$result){
          die(mysqli_error($conn));
          echo 1;
    }
 }
 // for inserting category
 elseif ($_POST['action']=='insert_category') {

   $category_name = mysqli_escape_string($conn,$_POST['category_name']);
   $file = addslashes(file_get_contents($_FILES["category_image"]["tmp_name"]));

   $query ="INSERT INTO `category`(`CATEGORY_NAME`, `CATEGORY_IMAGE`) VALUES ('$category_name','$file')";

   $result = mysqli_query($conn,$query);
   if(!$result){
   die(mysqli_error($conn));
    }
    echo "category successfully entered";
   }
 // for inserting product
 elseif ($_POST['action']=='insert_product') {

   $name = mysqli_escape_string($conn,$_POST['Product_name']);
   $price = mysqli_escape_string($conn,$_POST['price']);
   $description = mysqli_escape_string($conn,$_POST['Product_description']);
   $quantity = mysqli_escape_string($conn,$_POST['quantity']);
   $category_id = mysqli_escape_string($conn,$_POST['category_list']);
   $file = addslashes(file_get_contents($_FILES["product_image"]["tmp_name"]));

   $query ="INSERT INTO `product`( `PRODUCT_NAME`, `DESCRIPTION`, `PRODUCT_PRICE`, `CATEGORY_ID`, `PRODUCT_OnSale`, `PRODUCT_AVALIABILITY`, `PRODUCT_QUANTITY`, `PRODUCT_IMAGE`) VALUES
    ('$name','$description','$price','$category_id','0','yes','$quantity','$file')";

   $result = mysqli_query($conn,$query);
   if(!$result){
   die(mysqli_error($conn));
    }
    echo "product successfully entered";
   }
 // for inserting event
 elseif ($_POST['action']=='insert_event') {

   $date = mysqli_escape_string($conn,$_POST['event_date']);
   $description = mysqli_escape_string($conn,$_POST['event_description']);
   $location = mysqli_escape_string($conn,$_POST['event_location']);
   $file = addslashes(file_get_contents($_FILES["event_image"]["tmp_name"]));

   $query ="INSERT INTO `event`(`EVENT_DESCRIPTION`, `EVENT_DATE`, `EVENT_LOCATION`,`EVENT_IMAGE`) VALUES
           ('$description','$date','$location','$file')";

   $result = mysqli_query($conn,$query);
   if(!$result){
   die(mysqli_error($conn));
    }
    echo "event successfully entered";
   }

   // **********************************************************************************//
   // get platics sales from the database
   elseif($_POST['action']=='fetch_plastic_sales')
   {
    $output = '';
    $query ="SELECT * FROM `plastic`";
    $result = mysqli_query($conn,$query);
    if(!$result){
     die(mysqli_error($conn));
    }
   while($row=mysqli_fetch_array($result)){
   $output.='
     <tr>
       <td>'.$row['DATE'].'</td>
       <td>'.$row['PLASTIC_MASS'].'</td>
       <td>'.$row['PLASTIC_PRICE'].'</td>
       <td>'.$row['LOCATION'].'</td>
     </tr';

    }

      echo $output;
    }
    // **********************************************************************************//
    // **********************************************************************************//
    // get platics sales from the database
    elseif($_POST['action']=='fetch_events')
    {
     $output = '';
     $query ="SELECT * FROM `event`";
     $result = mysqli_query($conn,$query);
     if(!$result){
      die(mysqli_error($conn));
     }
    while($row=mysqli_fetch_array($result)){
    $output.="
      <tr style='border-bottom: 1px solid lightgrey;'>
        <td><image src='data:image/jpeg;base64,".base64_encode($row['EVENT_IMAGE'] )."'  height='60px' width='60px'></td>
        <td>".$row['EVENT_DESCRIPTION']."</td>
        <td>".$row['EVENT_DATE']."</td>
        <td>".$row['EVENT_LOCATION']."</td>
      <td><a  href='#' class='btn btn-default btn-outline-secondary' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
         <i class='fa fa-ellipsis-v'></i>
      </a>
        <ul class='dropdown-menu' id='more_drop_down'>
          <li><a class='dropdown-item edit_event'  id='".$row['EVENT_ID']."'>
                  <i class='fa fa-edit'></i> Edit product
          </a></li>
          <li><a class='dropdown-item delete_event' id='".$row['EVENT_ID']."'>
             <i class='fa fa-trash'></i> Delete product</a>
          </li>
        </ul>
    </td>
      </tr>";

     }
       echo $output;
     }

     elseif($_POST['action']=='fetch_total_mass')
     {

      $query = "SELECT SUM(PLASTIC_MASS) AS `total` FROM `plastic`";

      $result = mysqli_query($conn,$query);

      if(!$result){
        die(mysqli_error($conn));
      }
      while($row=mysqli_fetch_array($result)){
       $data=$row['total'];
      }
      echo $data;
     }

    elseif($_POST['action']=='fetch_total_price')
    {

     $query = "SELECT SUM(PLASTIC_PRICE) AS `total` FROM `plastic`";

     $result = mysqli_query($conn,$query);

     if(!$result){
       die(mysqli_error($conn));
     }
     while($row=mysqli_fetch_array($result)){
      $data=$row['total'];
     }
     echo $data;
    }
    // get number followers from the database
    elseif($_POST['action']=='fetch_total_uploads')
    {

    $query = "SELECT * FROM `product`";

    $result = mysqli_query($conn,$query);

    if(!$result){
     die(mysqli_error($conn));
    }
       $num_of_rows = mysqli_num_rows($result);
       echo $num_of_rows;
    }
   // __________________________________________________________________________________//

    // get number ads from the database
    elseif($_POST['action']=='fetch_number_of_ads')
    {

     $businessName=$_POST['businessName'];

     $query ="SELECT * FROM `ad` WHERE `businessName`='$businessName'";
     $result = mysqli_query($conn,$query);
     if(!$result){
      die(mysqli_error($conn));
     }
        $num_of_rows = mysqli_num_rows($result);

         echo $num_of_rows;
     }
     //__________________________________________________________________________________//
     // get number followers from the database
     elseif($_POST['action']=='fetch_number_of_followers')
     {
       $businessName = $_POST['businessName'];

      $query = "SELECT * FROM `business` WHERE `businessName`='$businessName'";

      $result = mysqli_query($conn,$query);

      if(!$result){
        die(mysqli_error($conn));
      }
      while($row=mysqli_fetch_array($result)){
       $data=$row['followers'];
      }
      echo $data;
     }
     //__________________________________________________________________________________//
     // get number orders from the database
     elseif($_POST['action']=='fetch_number_of_orders')
     {

       $businessName=$_POST['businessName'];

       $query ="SELECT * FROM `orders` WHERE `businessName`='$businessName'";
       $result = mysqli_query($conn,$query);
       if(!$result){
        die(mysqli_error($conn));
       }
          $num_of_rows = mysqli_num_rows($result);
          echo $num_of_rows;
     }
 //*************************************************************************************//
 //code for FETCHING inserted categories
if($_POST['action']=='fetchCategories'){
    $query = "SELECT * FROM `category` ";
    $result = mysqli_query($conn,$query);

    $output = "";
    $categories = "";
    $products = "";

    while ($row=mysqli_fetch_array($result)){
      $output .="
        <tr style='border-bottom: 1px solid lightgrey;' id='category_tr'>
          <td><image src='data:image/jpeg;base64,".base64_encode($row['CATEGORY_IMAGE'] )."' class='border'  height='60px' width='60px'></td>
          <td>".$row['CATEGORY_NAME']."</td>
        <td><a  href='' class='btn btn-default btn-outline-secondary' id='".$row['CATEGORY_ID']."'>
            <i class='fa fa-trash' id='".$row['CATEGORY_ID']."'></i></a>
        </td>
        </tr>";
      $categories .= "<option value ='".$row['CATEGORY_ID']."'>".$row['CATEGORY_NAME']."</option>";
              }
        $data =  json_encode(array('products'=>$products,'options'=>$categories,'categories'=>$output));
        echo $data;
        }
        //code for FETCHING inserted categories
 if($_POST['action']=='fetch_products'){
     $query = "SELECT * FROM `product` left JOIN `category`
     ON `category`.CATEGORY_ID = `product`.CATEGORY_ID";
     $result = mysqli_query($conn,$query);

     $products = "";

     while ($row=mysqli_fetch_array($result)){
             $products.="
             <tr id='A".$row['PRODUCT_ID']."'>
             <td data-label='View'><a id='zoom_image'><img src='data:image/jpeg;base64,".base64_encode($row['PRODUCT_IMAGE'] )."' alt='...' class='px-3' height='50px' id='".$row['PRODUCT_ID']."' title='view'/></a></td>
                 <td data-label='Name'>".$row['PRODUCT_NAME']."</td>
                 <td data-label='Description'>".$row['DESCRIPTION']."</td>
                 <td data-label='Price'>".$row['PRODUCT_PRICE']."</td>
                 <td data-label='Quantity'>".$row['PRODUCT_QUANTITY']."</td>
                 <td data-label='Quantity'>".$row['CATEGORY_NAME']."</td>
               <td><a  href='#' class='btn btn-default btn-outline-secondary' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  <i class='fa fa-ellipsis-v'></i>
               </a>
                 <ul class='dropdown-menu' id='more_drop_down'>
                   <li><a class='dropdown-item edit_product'  id='".$row['PRODUCT_ID']."'>
                           <i class='fa fa-edit'></i> Edit product
                   </a></li>
                   <li><a class='dropdown-item delete_product' id='".$row['PRODUCT_ID']."'>
                      <i class='fa fa-trash'></i> Delete product</a>
                   </li>
                 </ul>
             </td>
             </tr>";
                     }
               echo $products;
               }
// delete category
 elseif ($_POST['action']=='delete_category') {

        $id = $_POST['category_id'];

       $query ="DELETE FROM `category` WHERE `CATEGORY_ID`= '$id'";

       $result = mysqli_query($conn,$query);
       if(!$result){
       die(mysqli_error($conn));
       }
       echo 'Successfully deleted category and its products';

       }
       // delete category
    elseif ($_POST['action']=='deleteProduct') {

           $id = $_POST['productId'];

          $query ="DELETE FROM `product` WHERE `PRODUCT_ID`= '$id'";

          $result = mysqli_query($conn,$query);
          if(!$result){
          die(mysqli_error($conn));
          }
          echo 'Successfully deleted a product';

          }
 //for getting...
 //FOR FETCHING PRODUCTS UNDER A CERTAIN CATEGORY
if($_POST['action']=='getProducts'){
  $businessName = $_POST['businessName'];
  $productcategoryID = $_POST['category'];
  $businesscategory = $_POST['businesscategory'];

  $query = "";

$result = mysqli_query($conn,$query);

$output =  '';
if(!$result){
  die(mysqli_error($conn));
}

while ($row=mysqli_fetch_array($result)){
  $output .="
  <tr id='A".$row['barCode']."'>
  >
    <th>View</th>
    <th>Name</th>
   <th>Description</th>
   <th>Price</th>
    <th>Quantity</th>
      <th></th>
  <td data-label='View'><a id='zoom_image'><img src='data:image/jpeg;base64,".base64_encode($row['PRODUCT_IMAGE'] )."' alt='...' class='px-3' height='50px' id='".$row['PRODUCT_ID']."' title='view'/></a></td>
      <td data-label='Name'>".$row['PRODUCT_NAME']."</td>
      <td data-label='Description'>".$row['DESCRIPTION']."</td>
      <td data-label='Price'>".$row['PRODUCT_PRICE']."</td>
      <td data-label='Quantity'>".$row['PRODUCT_QUANTITY']."</td>
    <td><a  href='#' class='btn btn-default btn-outline-secondary' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
       <i class='fa fa-ellipsis-v'></i>
    </a>
      <ul class='dropdown-menu' id='more_drop_down'>
        <li><a class='dropdown-item edit_product'  id='".$row['PRODUCT_ID']."'>
                <i class='fa fa-edit'></i> Edit product
        </a></li>
        <li><a class='dropdown-item sale_product' id='".$row['PRODUCT_ID']."'>
            <i class='fa fa-gift'></i> Put on sale</a>
        </li>
        <li><a class='dropdown-item delete_product' id='".$row['PRODUCT_ID']."'>
           <i class='fa fa-trash'></i> Delete product</a>
        </li>
      </ul>
  </td>
  </tr>";
   }
 }


 }
 ?>
