<!-- <?php
    require_once('db/dbHeper.php'); 
    $listBrand = executeResult('select Id, BrandName from brand');
    $listCat = executeResult('select Id, CategoryName from productcategory');

?>  -->
<footer>
<section class="newsletter">

        <h1>Smart Store</h1>
        <p>get in touch for latest discounts and updates</p>
        <div class="image">
            <img src="res/img/logo/logo (1).png" alt="" style="width: 15rem;">
        </div>
    </section>    
<section class="footer">

<div class="box-container">
    <div class="row">
        <div class="col-md-3 text-center ">
            <div class="box">
                <h3>Product</h3>
                <?php
                    if(isset($listCat)){ 
                        foreach ($listCat as $itemCat) { ?>
                            <a href="<?php echo $itemCat['Id']?>">
                                <?php echo $itemCat['CategoryName']?>
                            </a>
                    <?php }
                } ?>
            </div>
        </div>
        <div class="col-md-3 text-center ">
            <div class="box">
                <h3>Brand</h3>
                <?php
                    if(isset($listBrand)){
                        foreach ($listBrand as $itemBrand) { ?>
                            <a href="<?php echo $itemBrand['Id']?>">
                                <?php echo $itemBrand['BrandName']?>
                            </a>
                    <?php }
                } ?>
            </div>
        </div>
        <div class="col-md-2 text-center">
            <div class="box">
                <h3>links</h3>
                <a href="home.php"><p>Home</p></a>
                <a href="aboutUs.php"><p>About Us</p></a>
                <a href="#"><p>Product</p></a>
                <a href="#"><p>Brand</p></a>
                <a href="contact.php"><p>Contact</p></a>
            </div>
        </div>

        <div class="col-md-4" >
        <div class="box" style="text-align: center;">
                <h3 >Contact Details</h3>
                <p > <i class="fas fa-home"></i>
                5/55 Prindiville Drive Wangara, Perth.
                </p>
                <p > <i class="fas fa-phone"></i>
                    08 9409 6706
                </p>
                <p > <i class="fas fa-globe"></i>
                    smartstore.com
                </p>
            </div>
        </div>        
    </div>
</div>

<h1 class="credit"> Copyright © <span>Smart Store</span>, 2021  | all rights reserved. </h1>

</section>
</footer>
</body>
