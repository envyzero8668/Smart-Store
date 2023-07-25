<?php
require_once('db/dbHeper.php');


$BrandName = '';
$Image = '';
$Id = '';
$edit_state = false;


$results_per_page = 5;  
  
$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');
$query = "select * from brand";  
$result = mysqli_query($db, $query);  
$number_of_result = mysqli_num_rows($result);  

$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

$page_first_result = ($page-1) * $results_per_page;  

$query = "SELECT *FROM brand LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($db, $query);  



if (isset($_POST['save'])) {
    $BrandName = $_POST['BrandName'];
    $Image = $_FILES['Image']['name'];
    // Get text


    $query = "insert into brand(BrandName, Image) values ('$BrandName', '$Image')";
    execute($query);

    $target = "images/stored/brands/" . basename($Image);
    if (move_uploaded_file($_FILES['Image']['tmp_name'], $target)) {
        $_SESSION['msg'] = "Insert successfully";
        header('location: brand.php');
    } else {
        $msg = "Failed to upload image";
    }
}

if (isset($_POST['update'])) {

    $BrandName = $_POST['BrandName'];
    $Image = $_FILES['Image']['name'];
    $Id = $_POST['Id'];
    $updateRecord =  "UPDATE brand SET BrandName='$BrandName', Image='$Image' WHERE Id=$Id";
    execute($updateRecord);


    $target = "images/stored/brands/" . basename($Image);
    if (move_uploaded_file($_FILES['Image']['tmp_name'], $target)) {
        header('location: brand.php');
    } else {
        $msg = "Failed to upload image";
    }

    $_SESSION['msg'] = "Update successfully";
    header('location: brand.php');
}


if (isset($_GET['del'])) {
    $id = $_GET['del'];

    // $check = "select * from product where BrandId = $id";
    // $resCheck = executeResult($check);
    // if(isset($resCheck)){
    //     $_SESSION['msg'] = "This brand in use";
    //     header('location: brand.php');

    // } 
    // else{
        $delete =  "delete from brand where Id = $id";
        execute($delete);
        $_SESSION['msg'] = "Delete successfully";
        header('location: brand.php');
    // }
    
}
?>
