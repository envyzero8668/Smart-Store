<?php
require_once('db/dbHeper.php');

$Name = '';
$BrandId = ''; 
$ProductCategoryId = '';
$Active = '';
$Material = '';
$Size = '';
$Star = '';
$Description = '';
$Image = '';
// $Id = '';
$edit_state = false;
  
$results_per_page = 5;  
  
$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');

$dropdownBrand = mysqli_query($db,"select Id, BrandName from brand");
$dropdownProductCat = mysqli_query($db,"select Id, CategoryName from productcategory");

$query = "SELECT * FROM product ORDER BY Id DESC";  
$result = mysqli_query($db, $query);   
$number_of_result = mysqli_num_rows($result);  

$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page'])) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  
  
$page_first_result = ($page-1) * $results_per_page;  

$query = "SELECT * FROM product LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($db, $query);  


if (isset($_POST['save'])) {

    $Name = $_POST['Name'];
    $BrandId = $_POST['BrandId'];
    $ProductCategoryId = $_POST['ProductCategoryId'];
    $Active = $_POST['Active'];
    $Material = $_POST['Material'];
    $Size = $_POST['Size'];
    $Star = $_POST['Star'];
    $Description =  $_POST['Description'];
    $Image = $_FILES['Image']['name'];
    // Get text 
   
    $query3 = "INSERT INTO product 
    (Name, Size ,Material, Description, Image, Active, ProductCategoryId, BrandId, Star)VALUES 
  ('$Name','$Size', '$Material','$Description','$Image',b'$Active',$ProductCategoryId,$BrandId,$Star)";
    execute($query3); 
  
    $target = "images/stored/products/" . basename($Image);
    if (move_uploaded_file($_FILES['Image']['tmp_name'], $target)) {
        $_SESSION['msg'] = "Insert successfully";
        header('location: product.php');
    } else {
        $msg = "Failed to upload image";
    }
}

if (isset($_POST['update'])) {
    $Id = $_POST['Id'];
    $Name = $_POST['Name'];
    $BrandId = $_POST['BrandId'];
    $ProductCategoryId = $_POST['ProductCategoryId'];
    $Active = $_POST['Active'];
    $Material = $_POST['Material'];
    $Size = $_POST['Size'];
    $Star = $_POST['Star'];
    $Description =  $_POST['Description'];
    $Image = $_FILES['Image']['name'];
      
//     $query3 = "INSERT INTO product 
//     (Name, Size ,Material, Description, Image, Active, ProductCategoryId, BrandId, Star)VALUES 
//   ('$Name','$Size', '$Material','$Description','$Image',b'$Active',$ProductCategoryId,$BrandId,$Star)";
    $updateRecord =  "UPDATE product SET 
    Name='$Name', Size='$Size', Material='$Material'
    , Description='$Description', Image='$Image'
    , Active='$Active', ProductCategoryId='$ProductCategoryId'
    , BrandId='$BrandId', Star='$Star'
      WHERE Id=$Id";
    execute($updateRecord);

 
    $target = "images/stored/products/" . basename($Image);
    if (move_uploaded_file($_FILES['Image']['tmp_name'], $target)) {
        header('location: brand.php');
    } else {
        $msg = "Failed to upload image";
    }

    $_SESSION['msg'] = "Update successfully";
    header('location: product.php');
}


if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $delete =  "delete from product where Id = $id";
    execute($delete);
    $_SESSION['msg'] = "Delete successfully";
    header('location: product.php');
}