<?php

session_start();
require_once('productAction.php');
require_once('db/dbHeper.php');

$edit_state = false;


if (isset($_GET['edit'])) {
    $Id = $_GET['edit']; //get id  from tag a 
    $edit_state = true;
    $rec = executeResult('select * from product where id = ' . $Id, true);
    $Star = $rec['Star'];
    $Size = $rec['Size'];
    $ProductCategoryId = $rec['ProductCategoryId'];
    $Name = $rec['Name'];
    $Material = $rec['Material'];
    $Image = $rec['Image'];
    $Id = $rec['Id'];
    $Description = $rec['Description'];
    $BrandId = $rec['BrandId'];
    $Active = $rec['Active'];

}

?>
<!DOCTYPE html>

<html lang="en">
<?php include('layouts/header.php'); ?>


<style>
    .img1 {
        width: 100% !important;

    }

    .img-active,
    .unactive {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }
</style>

<section class="all" style="width: 84%;
    margin-top: 100px;
    margin-left: auto;">

<a href="product.php">Add new</a>    <br>
    <div class="container" style="border-style: solid; border-color: rgb(176, 132, 88);">
    
    <div class="row" style="font-weight: bold; margin-bottom: 10px; border-bottom: solid; border-color: rgb(176, 132, 88);">
            <div class="col-3">Name</div>
            <div class="col-2">Brand</div>
            <div class="col-2">ProductCategory</div>
            <div class="col-2">Image</div>
            <div class="col-1">Active</div>
            <div class="col-1">Edit</div>
            <div class="col-1">Delete</div>
        </div>
        <div class="row">
            <?php
            foreach ($result as $item) {
            ?>
                <tr id="<?php echo $item['Id'] ?>">
                    <div class="col-3"><?php echo $item['Name']; ?></div>
                    <div class="col-2">
                        <?php
                        $_id = $item['BrandId'];
                        $_brandName = executeResult('select BrandName from brand where id = ' . $_id, true);
                        if (isset($_brandName)) {
                            echo $_brandName['BrandName'];
                        } else {
                            echo 'Something has gone wrong';
                        }
                        ?>
                    </div>
                    <div class="col-2">
                        <?php
                        $_catId = $item['ProductCategoryId'];
                        $_catName = executeResult('select CategoryName from productcategory where Id = ' . $_catId, true);
                        if (isset($_catName)) {
                            echo $_catName['CategoryName'];
                        } else {
                            echo 'Something has gone wrong';
                        }
                        ?>
                    </div>
                    <div class="col-2"><?php echo "<img src='images/stored/products/" . $item['Image'] . "' class='img1' >"; ?></div>
                    <div class="col-1">
                        <?php
                        if ($item['Active'] == 1) {
                            echo "<img src='img/active.png' class='img-active'>";
                        } else {
                            echo "<img src='img/unactive.jpg' class='unactive'>";
                        }
                        ?>
                    </div>
                    <div class="col-1"><a href="product.php?edit=<?php echo $item['Id']; ?>" class="edit_btn">Edit</a></div>
                    <div class="col-1"> 
                    <input type="button" class="del_btn remove" name="Delete" value="Delete"
                             onclick="deletePro(<?php echo $item['Id']; ?>)"> 
                    </div>
                </tr>

            <?php } ?>
        </div>
    </div>
    
    <div class="pagination1 col-6" style="margin-top: 30px; margin-bottom: 30px; margin-left: 20rem;">
        <span>Current Page: <?php echo $page; ?></span>
        <?php
        for ($page = 1; $page <= $number_of_page; $page++) {
            echo '<a href = "product.php?page=' . $page . '">' . $page . ' </a>';
        }
        ?>
    </div>

    <div class="container" style="border-style: solid; border-color: rgb(176, 132, 88); ">
        <form method="POST" action="productAction.php" enctype="multipart/form-data">
            <input type="hidden" name="Id" value="<?php echo $Id; ?>">
            <div class="row" style="margin-top: 5px;">
                <label class="col-2">Name</label>
                <div class="col-3" style="margin-bottom: 5px;"><input required="required" type="text" name="Name" placeholder="Enter product name" value="<?php echo $Name; ?>"></div>
            </div>
            <div class="row">
                <label class="col-2">Brand</label>
                <div class="col-3"><select name="BrandId" style="width: 205px;">
                        <?php
                        while ($rows = $dropdownBrand->fetch_assoc()) {
                            $brandname =  $rows['BrandName'];
                            $brandId =  $rows['Id'];
                            if ($BrandId == $brandId) {
                                echo "<option value='$brandId' selected='selected'>$brandname</option>";
                            } else {
                                echo "<option value='$brandId'>$brandname</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <label class="col-2">Category name</label>
                <div class="col-3"><select name="ProductCategoryId" style="width: 205px;">
                        <?php
                        while ($rows = $dropdownProductCat->fetch_assoc()) {
                            $CategoryName =  $rows['CategoryName'];
                            $catId =  $rows['Id'];
                            if ($ProductCategoryId == $catId) {
                                echo "<option value='$catId' selected='selected'>$CategoryName</option>";
                            } else {
                                echo "<option value='$catId'>$CategoryName</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <label class="col-2">Active</label>
                <div class="col-3">
                    Active &nbsp;<input type="checkbox" checked="checked" value="1" name="Active" id="active">
                    Inactive &nbsp;<input type="checkbox" value="0" name="InActive" id="inactive">
                </div>
            </div>
            <div class="row">
                <label class="col-2">Material</label>
                <div class="col-3"><input required="required" type="text" name="Material" placeholder="Enter material" value="<?php echo $Material; ?>"></div>
            </div>
            <div class="row">
                <label class="col-2">Size</label>
                <div class="col-3" style="margin-top: 5px; margin-bottom: 5px;"><input required="required" type="text" name="Size" placeholder="Enter size" value="<?php echo $Size; ?>"></div>
            </div>
            <div class="row">
                <label class="col-2">Star</label>
                <div class="col-3" style="margin-bottom: 5px;"><input style="width: 205px;" required="required" type="number" min="1" max="5" name="Star" placeholder="Enter star" value="<?php echo $Star; ?>"></div>
            </div>
            <div class="row">
                <label class="col-2">Description</label>
                
                ​<div class="col-3">
                    <textarea id="txtArea" required="required" type="text" name="Description" placeholder="Enter description" rows="3" cols="30">
                    <?php echo $Description; ?>
                    </textarea>
                    
                </div>
            </div>

            <div class="row">
                <label class="col-2">Image</label>
                <input required="required" type="hidden" name="size" value="100000">
                <div class="col-3">
                    <input required="required" type="file" name="Image">
                    <?php echo "<img src='images/stored/products/" . $Image . "' class='img img-fluid' >"; ?>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <?php if ($edit_state == false) : ?>
                    <div class="col-6 text-center"><button style="background-color:rgb(237, 210, 183);" class="btn" type="submit" name="save">Add new</button></div>
                <?php else : ?>
                    <div class="col-6 text-center"><button style="background-color:rgb(237, 210, 183);" class="btn" type="submit" name="update">Update</button></div>
            </div>
        <?php endif ?>
        </form>
    </div>
    <?php if (isset($_SESSION['msg'])) : ?>
        <div class="msg">
            <?php
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif ?>
    </div>

</section>

<script type="text/javascript">
    window.onload = function() {
        var active = document.getElementById('active');
        var inactive = document.getElementById('inactive');
  
        if (active.checked == false) {
            inactive.checked = false;
        }
    }
 
    function deletePro(id){
        if(confirm("Do you want to delete?")){
            window.location.href='productAction.php?del=' + id + '';
            return true;
        }

    }
</script>
<?php include('layouts/footer.php'); ?>