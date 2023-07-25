<?php
require_once('db/dbHeper.php');


$CategoryName = '';
$CategorySort = '';
$Id = '';
$edit_state = false;



//define total number of results you want per page  
$results_per_page = 5;  
  
$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');
//find the total number of results stored in the database  
$query = "select * from productcategory";  
$result = mysqli_query($db, $query);  
$number_of_result = mysqli_num_rows($result);  

//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT *FROM productcategory LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($db, $query);  




if (isset($_POST['save'])) {
    $CategoryName = $_POST['CategoryName'];
    $CategorySort = $_POST['CategorySort'];

    $query = "insert into productcategory(CategoryName, CategorySort) values ('$CategoryName', '$CategorySort')";
    execute($query);
    $_SESSION['msg'] = "Insert successfully";
    header('location: productCategory.php');
}

if (isset($_POST['update'])) {
    $Id = $_POST['Id'];
    $CategoryName = $_POST['CategoryName'];
    $CategorySort = $_POST['CategorySort'];
    $updateRecord =  "UPDATE productcategory SET CategoryName='$CategoryName', CategorySort='$CategorySort' WHERE Id=$Id";
    execute($updateRecord);

    $_SESSION['msg'] = "Update successfully";
    header('location: productCategory.php');
}


if (isset($_GET['del'])) {
    $id = $_GET['del'];

        $delete =  "delete from productcategory where Id = $id";
        execute($delete);
        $_SESSION['msg'] = "Delete successfully";
        header('location: productCategory.php');
}
