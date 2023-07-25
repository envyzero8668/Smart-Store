<?php

include('brandAction.php');
require_once('db/dbHeper.php');

$edit_state = false;

$query3 = "SELECT * FROM brand";
$result3 = executeResult($query3);

if (isset($_GET['edit'])) {

    $Id = $_GET['edit']; //get id  from tag a 
    $edit_state = true;
    $rec = executeResult('select BrandName, Image, Id from brand where id = ' . $Id, true);
    $BrandName = $rec['BrandName'];
    $Image = $rec['Image'];
    $Id = $rec['Id'];
}
?>
<!DOCTYPE html>
 
<html lang="en">
<?php
include 'layouts/header.php';

?>

<style>
    .img-brand {
        width: 100%;
        max-height: 150px;
        object-fit: cover;
        max-width: 200px;

    }
</style>
<section class="all" style="width: 84%;
    margin-top: 100px;
    margin-left: auto;">
    <div class="col-lg-12">
        <a href="brand.php">Add new</a>
        <table class="table" style="border-style: solid;
    border-color: rgb(176, 132, 88);">
            <thead style="border-bottom: solid;
    border-color: rgb(176, 132, 88);">
                <tr>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Brand Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($result as $item) {
                ?>
                    <tr id="<?php echo $item['Id'] ?>">
                        <td scope="row"><?php echo $item['BrandName']; ?></td>
                        <td><?php echo "<img src='images/stored/brands/" . $item['Image'] . "' class='img img-brand' >"; ?></td>
                        <td><a href="brand.php?edit=<?php echo $item['Id']; ?>" class="edit_btn">Edit</a></td>
                        <td>
                        <input type="button" class="del_btn remove" name="Delete" value="Delete"
                            onclick="deleteBrand(<?php echo $item['Id']; ?>)">
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="pagination1 col-6 text-center" style="margin-top: 30px; margin-bottom: 30px; margin-left: 20rem;">
        <span>Current Page: <?php echo $page; ?></span>
            <?php
            for ($page = 1; $page <= $number_of_page; $page++) {
                echo '<a href = "brand.php?page=' . $page . '">' . $page . ' </a>';
            }
            ?>
        </div>

        <div class="col-lg-12" style="border-style: solid; border-color: rgb(176, 132, 88);">
            <form method="POST" action="brandAction.php" enctype="multipart/form-data">
                <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                <div class="row" style="margin-top: 10px;">
                    <label class="col-2">BrandName</label>
                    <div class="col-3"><input required="required" type="text" name="BrandName" placeholder="Enter Brand name" value="<?php echo $BrandName; ?>"></div>
                </div>
                <div class="row" style="margin-top: 5px;">
                    <label class="col-2">Brand Image</label>
                    <input required="required" type="hidden" name="size" value="100000">
                    <div class="col-3">
                        <input required="required" type="file" name="Image">
                        <?php echo "<img src='images/stored/brands/" . $Image . "' class='img img-brand' >"; ?>
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
    <?php
    include 'layouts/footer.php';
    ?>
</section> 

<script type="text/javascript">
    function deleteBrand(catId){
        if(confirm("Do you want to delete?")){
            window.location.href='brandAction.php?del=' + catId + '';
            return true;
        }

    }
</script>