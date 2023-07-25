<!DOCTYPE html>
<html>
<?php
include('header.php');

$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');

?>
<style>
    /* .first-span:first-child{
        display: none;
    } */
    .first-span {
        padding: 10px;
    }

    .overlay {
        overflow: hidden;
    }
</style>
<section class="arrival" id="home">

    <h1 class="heading"> <span>new arrivals</span> </h1>

    <div class="box-container">

        <?php
        $result = mysqli_query($db, "select * from product where Active = 1");

        foreach ($result as $item) {
        ?>
            <div class="box">
                <div class="image">
                    <a href=""></a>
                    <?php echo "<img src='/admin/images/stored/products/" . $item['Image'] . "' class='img' >"; ?>
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

</section>

<!-- arrival section ends -->
<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <h1 class="heading"> <span> Category </span> </h1>

    <ul class="controls">
        <li class="btn button-active" data-filter="all">all</li>
        <li class="btn" data-filter="drawers1">1 Drawer</li>
        <li class="btn" data-filter="drawers2">2 Drawer</li>
        <li class="btn" data-filter="drawers3">3 Drawer</li>
        <li class="btn" data-filter="drawers4">4 Drawer</li>
        <li class="btn" data-filter="drawers5">5 Drawer</li>
    </ul>

    <div class="image-container">

        <div class="box drawers1">
            <div class="zoom image">
                <img src="res/img/drawer/1drawer/1-Drawer-01.jpg" alt="">
            </div>
            <div class="info">
                <h3>1 Ngăn 01</h3>
                <!-- <div class="subInfo">                                                
                    </div> -->
            </div>
        </div>

        <div class="box drawers1">
            <div class="zoom image">
                <img src="res/img/drawer/1drawer/1-Drawer-02.jpg" alt="">
            </div>
            <div class="info">
                <h3>1 Drawer Push to Open 01</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>


        <div class="box drawers1">
            <div class="zoom image">
                <img src="res/img/drawer/1drawer/1-Drawer-03.jpg" alt="">
            </div>
            <div class="info">
                <h3>1 Drawer Push to Open 02</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers2">
            <div class="zoom image">
                <img src="res/img/drawer/2drawer/2-Blum-Drawerbox-01.jpg" alt="">
            </div>
            <div class="info">
                <h3>2 Blum Drawer Box Florentine Walnut Full Extension Bottom Drawer</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers2">
            <div class="zoom image">
                <img src="res/img/drawer/2drawer/2D-Blum-Drawerbox-02.jpg" alt="">
            </div>
            <div class="info">
                <h3>2D Blum Drawer Box Florentine Walnut 01</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers2">
            <div class="zoom image">
                <img src="res/img/drawer/2drawer/2-Drawer Brushed -03.jpg" alt="">
            </div>
            <div class="info">
                <h3>2 Drawer Brushed Silver 01</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers2">
            <div class="zoom image">
                <img src="res/img/drawer/2drawer/2-Drawer-Graphite-04.jpg" alt="">
            </div>
            <div class="info">
                <h3>2 Drawer Graphite</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers3">
            <div class="zoom image">
                <img src="res/img/drawer/3drawer/3-Drawer-Soft-05.jpg" alt="">
            </div>
            <div class="info">
                <h3>3 Drawer Soft Close Ravine Soft Walnut</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers3">
            <div class="zoom image">
                <img src="res/img/drawer/3drawer/3-Darwer-Florentine-02.jpg" alt="">
            </div>
            <div class="info">
                <h3>3 Drawer Florentine Walnut Push to open 02</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers3">
            <div class="zoom image">
                <img src="res/img/drawer/3drawer/3-Darwer-Florentine-03.jpg" alt="">
            </div>
            <div class="info">
                <h3>3 Drawer Florentine Walnut Push to open 03</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers3">
            <div class="zoom image">
                <img src="res/img/drawer/3drawer/3-Drawer-Natural-04.jpg" alt="">
            </div>
            <div class="info">
                <h3>3 Drawer Natural Oak</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers4">
            <div class="zoom image">
                <img src="res/img/drawer/4drawer/4-Drawer Unit-01.jpg" alt="">
            </div>
            <div class="info">
                <h3>4 Drawer Unit Brushed Silver 01</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers4">
            <div class="zoom image">
                <img src="res/img/drawer/4drawer/4-Drawer Unit-02.jpg" alt="">
            </div>
            <div class="info">
                <h3>4 Drawer Unit Brushed Silver 02</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers5">
            <div class="zoom image">
                <img src="res/img/drawer/5drawer/5-Drawer-Box-Meana-01.jpg" alt="">
            </div>
            <div class="info">
                <h3>5 Drawer Box Meana Handles</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

        <div class="box drawers5">
            <div class="zoom image">
                <img src="res/img/drawer/5drawer/5-Drawer-Natural-02.jpg" alt="">
            </div>
            <div class="info">
                <h3>5 Drawer Natural Oak</h3>
                <!-- <div class="subInfo">
                    </div> -->
            </div>
        </div>

    </div>

</section>

<!-- gallery section ends -->

<!-- deal section starts  -->

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
            <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p> -->
        </div>

        <div class="icons">
            <i class="fas fa-user-clock"></i>
            <h3>24 x 7 support</h3>
            <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, molestiae?</p> -->
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