<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Store</title>
    <link rel="shortcut icon" href="res/img/logo/logo-title.png">
    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!-- custom css file link  -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="res/bootstrap.min.css">
    
    <link rel="stylesheet" href="res/style.css">
</head>

<body> 
<?php
    require_once('db/dbHeper.php'); 
    $listBrand = executeResult('select Id, BrandName from brand');
    $listCat = executeResult('select Id, CategoryName from productcategory');

?> 
<!-- header section starts  -->
    <header>
        <div class="header-2">
            <div id="menu" class="fas fa-bars fa-times"></div>

            <nav class="navbar nav-toggle">
                <ul >
                    <li><a href="home.php"><img src="res/img/logo/logo.png" class="logo1"></p></li>
                    <div class="bars">
                        <li><a class="active" href="home.php">Home</a></li>
                        <li><a href="aboutUs.php">About Us</a></li>
                        <li><div class="dropdown"><button class="dropbtn">Product
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-content">
                            <?php
                                if(isset($listCat)){ 
                                    foreach ($listCat as $itemCat) { ?>
                                        <a href="CategoryProduct.php?catid=<?php echo $itemCat['Id']?>">
                                            <?php echo $itemCat['CategoryName']?>
                                        </a>
                                <?php }
                             } ?>
                          </div>
                        </li>
                        <li><div class="dropdown"><button class="dropbtn">Brand
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-content">
                            <?php
                                if(isset($listBrand)){
                                    foreach ($listBrand as $itemBrand) { ?>
                                        <a href="ListBrand.php?brandid=<?php echo $itemBrand['Id']?>">
                                            <?php echo $itemBrand['BrandName']?>
                                        </a>
                                <?php }
                             } ?> 
                          </div>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
    
 
    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- owl carousel js file cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- custom js file link  -->
    <!-- <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script> -->
    <script src="res/main.js"></script>
<!-- header section ends -->