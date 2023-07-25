<!DOCTYPE html>
<html>
<?php
include('header.php');

$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');

$results_per_page = 12;    
$query = "SELECT * FROM product WHERE Active = 1 ORDER BY Id DESC";  
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

if(isset($_POST['search'])){ 
    $keywords = $_POST['search'];
    // $keywords = preg_replace("#[^0-9a-z]#i", "", $keywords);
    $sql = "SELECT * FROM product WHERE Active = 1 AND Name LIKE '%$keywords%'";
    $result = mysqli_query($db, $sql);  
}

?>
<style>
    /* .first-span:first-child{
        display: none;
    } */
    .form-control-1{
        width: 360px;
        /* height: 54px; */
        font-size: 1.8rem;
        padding: 0 15px;
        border-radius: 5px 0 0 5px;
        outline: none;
        border: 3px solid rgb(197 151 106);
    }
    .form-search-product{    
        margin-top: 50px;
        justify-content: center;
        display: flex;
    }
    .first-span {
        padding: 10px;
    }

    .overlay {
        overflow: hidden;
    }
    
    .arrival .box-container .box .info h3 {
        overflow: hidden;
    }
    .arrival .box-container .box{
        flex: 0 1 30rem;
    }
    .pagination1{
        margin: 30px 0;
        text-align: end;
    }
    .pagination1 a{
        font-size: 22px;
        padding: 0px 10px;
        background: rgb(176, 131, 86);
        border: 1px solid rgb(176, 131, 86);
        color: white;
        margin: 0 10px;
    }
    .btn-search{
        border-radius: 0 5px 5px 0;
    }
    .keyword-result{
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        color: rgb(199 147 95);
        margin-top: 40px;
    }


</style>
<section class="home" id="home">

        <div class="home-slider owl-carousel">
            <div class="item">
                <img src="res/img/banner/01.jpg" alt="">
            </div>
            <div class="item">
                <img src="res/img/banner/02.png" alt="">
            </div>
            <div class="item">
                <img src="res/img/banner/03.jpg" alt="">
            </div>
            <div class="item">
                <img src="res/img/banner/04.png" alt="">
            </div>
        </div>

    </section>
<section class="arrival" id="home">

    <h1 class="heading"> <span>All Product</span> </h1>

    <form action="" method="POST" class="form-search-product">
        <input type="text" name="search" class="form-control-1" placeholder="Search by product name" value="">
        <button class="btn btn-search" type="submit">Search</button>
    </form>
    <?php if(isset($keywords)){ ?>
        <div class="text-center keyword-result">Result of keywords: <?php echo $keywords?> </div>
    <?php }?>
    
    
    <div class="box-container">

        <?php
        foreach ($result as $item) {
        ?>
            <div class="box">
                <div class="image">
                    <a href=""></a>
                    <?php echo "<img src='/project1/admin/images/stored/products/" . $item['Image'] . "' class='img' >"; ?>
                </div>
                <div class="info">
                    <h3><?php echo $item['Name'];  ?></h3>
                    <div class="subInfo">
                        <div class="stars">
                            <?php
                            $star = $item['Star'];
                            for ($i = 1; $i <= $star; $i++) {
                                echo '<i class="fas fa-star"></i>';
                            }
                            ?> 
                        </div>
                    </div>
                </div>
                <div class="overlay">
                    <p>
                        <?php
                        foreach (explode('-', $item['Description']) as $ing) { ?>
                            <span class="first-span">
                                <?php
                                $output =  "- ";
                                $output .= ucfirst($ing);
                                echo $output;
                                ?>
                            </span> <br>
                        <?php }  ?>
                    </p>

                    <a href="productDetail.php?id=<?php echo $item['Id']; ?>" style="--i:3;" class="fas fa-search"></a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    
    <div class="container pagination1">
        <?php if(! isset($keywords)){ ?>
            <span style="font-size: 20px;">Current page: <?php echo $page; ?></span>
        <?php }?>
        <?php
        if(! isset($keywords)){
            for ($page = 1; $page <= $number_of_page; $page++) {
                echo '<a href = "home.php?page=' . $page . '">' . $page . ' </a>';
            }
        }
        ?>
    </div>
</section>


<section class="deal" id="deal">

    <h1 class="heading"> <span> best deals </span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="res/img/deal01.jpg" alt="">
            <div class="content">
                <!-- <h3>latest laptop</h3>
                    <p>upto 25% off on first purchase</p>
                    <a href="#"><button class="btn">explore</button></a> -->
            </div>
        </div>

        <div class="box">
            <img src="res/img/deal02.jpg" alt="">
            <div class="content">
                <!-- <h3>new headphone</h3>
                    <p>upto 25% off on first purchase</p>
                    <a href="#"><button class="btn">explore</button></a> -->
            </div>
        </div>

    </div>

    <div class="icons-container">

        <div class="icons">
            <i class="fas fa-shipping-fast"></i>
            <h3>fast delivery</h3>
        </div>

        <div class="icons">
            <i class="fas fa-user-clock"></i>
            <h3>24 x 7 support</h3>
        </div>

        <div class="icons">
            <i class="fas fa-money-check-alt"></i>
            <h3>easy payments</h3>
            <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p> -->
        </div>

        <div class="icons">
            <i class="fas fa-box"></i>
            <h3>10 days replacements</h3>
            <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p> -->
        </div>

    </div>

</section>


<?php include('footer.php'); ?>

</html>