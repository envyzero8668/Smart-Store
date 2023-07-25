<!DOCTYPE html>
<html>
<?php
include('header.php');

$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');

$Id = $_GET['id'];

$rec = mysqli_query($db, "select * from product where Id =$Id");
$item = mysqli_fetch_array($rec);
$brandId = $item['BrandId'];
$brand = mysqli_query($db, "select BrandName from brand where Id =$brandId");
$item2 = mysqli_fetch_array($brand);

$catId = $item['ProductCategoryId'];
// $query = mysqli_query($db, "select * from product where ProductCategoryId = $catId LIMIT 0,10");
$sql = "SELECT * FROM product WHERE Active = 1 AND ProductCategoryId = $catId AND Id <> $Id ORDER BY RAND() LIMIT 4 ";
$relateProducts = mysqli_query($db, $sql);

?>
<style>
    .img-relative {
        width: 150px;
        height: 150px;
    }

    .relate-row {
        margin-bottom: 30px;
    }
    .title-relate{
        margin: 50px 0;
    }
    .pro-watch-more{
        background: rgb(176, 132, 88);
        color: white;
        padding: 6px 10px;
        transition: all .3s;
    }
    .pro-watch-more:hover{
        background: white;
        color:rgb(176, 132, 88);
        border: 2px solid brown;
    }
    .pb-2{
        padding-bottom: 20px;
    }
    .order{
        padding-top: 40px;
    }
    .order a{
        text-transform: uppercase;
        background: rgb(176, 132, 88);
        color: white;
        padding: 10px 20px;
        font-size: 1.25rem;
        border: 2px solid white;
        font-weight: 700;
        transition: ease-in-out .3s;
    }
    .order:hover a{
        background: white;
        border: 2px solid  rgb(176, 132, 88);
        color: rgb(176, 132, 88);
    }
</style>
<section class="product-detail">
    <div class="container">  
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <a href="<?php echo "/project1/admin/images/stored/products/" . $item['Image'];  ?>" data-fancybox="product">
                    <?php echo "<img src='/project1/admin/images/stored/products/" . $item['Image'] . "' class='img-product' >"; ?>
                </a>

            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <p class="name"><?php echo $item['Name']; ?>
                    <span class="stars">
                        <?php
                        $star = $item['Star'];
                        for ($i = 1; $i <= $star; $i++) {
                            echo '<i class="fas fa-star"></i>';
                        }
                        ?>
                    </span>
                </p>

                <p> <span class="bold">Size:</span> <?php echo $item['Size']; ?></p>
                <p> <span class="bold">Material:</span> <?php echo $item['Material']; ?></p>
                <p> <span class="bold">BrandName:</span> <?php echo $item2['BrandName']; ?></p>
                <p>
                <b>Description: </b><br> 
                    <?php
                    foreach (explode('-', $item['Description']) as $ing) { ?>
                        <span class="first-span"  style="padding-bottom: 10px">
                            <?php
                            $output =  "- ";
                            $output .= ucfirst($ing);
                            echo $output;
                            ?>
                        </span> <br>

                    <?php }  ?>
                </p>

                <div class="order"><a href="contact.php">Contact me to order</a></div>
            </div>
        </div>
        <h2 class="text-center title-relate">Relate product</h2>
        <?php
        if (isset($relateProducts)) {
            foreach ($relateProducts as $pro) { ?>
                <div class="row relate-row">
                    <div class="col-lg-4 col-md-4 col-12 text-center">
                        <?php
                        echo "<img src='/project1/admin/images/stored/products/" . $pro['Image'] . "' class='img-relative' >";
                        ?>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                    <span class="stars">
                        <?php 
                        $star = $pro['Star'];
                        for ($i = 1; $i <= $star; $i++) {
                            echo '<i class="fas fa-star"></i>';
                        }
                        ?>
                    </span>
                        <p><b>Product name</b> <?php echo $pro['Name'] ?></p>
                        <p> <b>Brand name:</b>
                            <?php
                            $brandId = $pro['BrandId'];
                            $brandname = mysqli_query($db, "select BrandName from brand where Id =$brandId");
                            $nameOfbrand = mysqli_fetch_array($brandname);
                            if (isset($nameOfbrand)) {
                                echo $nameOfbrand['BrandName'];
                            }

                            ?>
                        </p>
                        <p class="pb-2"><b>Product category:</b>
                            <?php
                            $idcat = $pro['ProductCategoryId'];
                            $query = mysqli_query($db, "select CategoryName from productcategory where Id =$idcat");
                            $catname = mysqli_fetch_array($query);
                            if (isset($catname)) { 
                                echo $catname['CategoryName'];
                            }

                            ?>
                        </p>
                        <a class="pro-watch-more" href="productDetail.php?id=<?php echo $pro['Id']; ?>">Watch more</a>
                    </div>
                </div>
        <?php
            }
        } ?>
    </div>
</section>


<?php include('footer.php'); ?>

</html>