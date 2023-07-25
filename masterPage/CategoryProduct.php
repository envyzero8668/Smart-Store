<!DOCTYPE html>
<html>
<?php
include('header.php');
require_once('db/dbHeper.php'); 

$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');


$id = $_GET['catid'];
$results_per_page = 100;    
$query = "SELECT * FROM product WHERE Active = 1 AND ProductCategoryId = $id";  



$result = mysqli_query($db, $query);   
$number_of_result = mysqli_num_rows($result);  

$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page'])) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}   
  
$page_first_result = ($page-1) * $results_per_page;  

$query = "SELECT * FROM product WHERE Active = 1 AND ProductCategoryId = $id LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($db, $query);  


$v = "SELECT * FROM productcategory ORDER BY CategorySort";
$allCat = executeResult($v);
?>


<style>
    .ex-width{
        width: max-content;
    }
    .a-white{
        color: white;
    }
</style>

<section class="gallery" id="gallery">

    <h1 class="heading"> 
        <span>Product category :
        <?php 
            $resBrand = "select CategoryName from productcategory where Id = $id";
            $q =  executeResult($resBrand, true);  
            if(isset($q)){
                echo $q['CategoryName'];
            }
        ?> 
        </span> 
    </h1>

    <ul class="controls">
            <?php
                foreach ($allCat as $cat) { ?>
                <li class="btn ex-width">
                    <a class="a-white" href="CategoryProduct.php?catid=<?php echo $cat['Id']?>">
                        <?php echo $cat['CategoryName']?>
                    </a>
                </li>
            <?php }?>
    </ul>

    <div class="image-container">
        <?php foreach($result as $item){ ?>
            <div class="box drawers1"> 
                <div class="zoom image">
                    <a href="productDetail.php?id=<?php echo $item['Id']?>">
                        <?php echo "<img src='/project1/admin/images/stored/products/" . $item['Image'] . "'>"; ?>
                    </a> 
                </div>
                <div class="info">
                    <h3><?php echo $item['Name']?></h3>
                </div>
            </div>
        <?php } ?>
        
        <?php
            if(!isset($result)){
                echo '<div class="text-center h2">Sorry we are updating</div>';
            }
        ?>
    </div>
</section>
<?php include('footer.php'); ?>

</html>