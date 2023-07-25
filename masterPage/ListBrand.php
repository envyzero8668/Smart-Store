<!DOCTYPE html>
<html>
<?php
include('header.php');
require_once('db/dbHeper.php'); 

$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');


$id = $_GET['brandid'];
$results_per_page = 100;    
$query = "SELECT * FROM product WHERE Active = 1 AND BrandId = $id";  

$result = mysqli_query($db, $query);   
$number_of_result = mysqli_num_rows($result);  

$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page'])) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}   
  
$page_first_result = ($page-1) * $results_per_page;  

$query = "SELECT * FROM product WHERE Active = 1 AND BrandId = $id LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($db, $query);  


$v = "SELECT * FROM brand";
$allBrand = executeResult($v);
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
        <span> Brand:  
        <?php 
            $resBrand = "select BrandName from brand where Id = $id";
            $q =  executeResult($resBrand, true);  
            if(isset($q)){
                echo $q['BrandName'];
            }
        ?> 
    </span> 
    </h1>

    <ul class="controls">
            <?php
                foreach ($allBrand as $branditem) { ?>
                <li class="btn ex-width">
                    <a class="a-white" href="ListBrand.php?brandid=<?php echo $branditem['Id']?>">
                        <?php echo $branditem['BrandName']?>
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
            if($result == null){
                echo '<div class="text-center h2">Sorry we are updating</div>';
            }
        ?>
    </div>
</section>

<?php include('footer.php'); ?>

</html>