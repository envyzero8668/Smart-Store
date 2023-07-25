<?php
 
require_once('productCatAction.php');
require_once('db/dbHeper.php');
 
$edit_state = false;

$query3 = "SELECT * FROM productcategory";
$result3 = executeResult($query3);

if (isset($_GET['edit'])) {

    $Id = $_GET['edit']; //get id  from tag a 
    $edit_state = true;
    $rec = executeResult('select CategoryName, CategorySort, Id from productcategory where Id = ' . $Id, true);
    $CategoryName = $rec['CategoryName'];
    $CategorySort = $rec['CategorySort'];
}
?>
<!DOCTYPE html>

<html lang="en">
<?php
include 'layouts/header.php';
?>
<section class="all" style="width: 84%;
    margin-top: 100px;
    margin-left: auto;">
     <a href="productCategory.php">Add new</a>    
    <div class="col-lg-12" >
    <table class="table" style="border-style: solid;
    border-color: rgb(176, 132, 88);">
  <thead style="border-bottom: solid;
    border-color: rgb(176, 132, 88);">
    <tr>
      <th scope="col">Category Name</th>
      <th scope="col">Category Sort</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      foreach($result as $item) {
      ?>
    <tr id="<?php echo $item['Id'] ?>">
      <td scope="row"><?php echo $item['CategoryName']; ?></td>
      <td><?php echo $item['CategorySort']; ?></td>
      <td><a href="productCategory.php?edit=<?php echo $item['Id']; ?>" class="edit_btn">Edit</a></td>
      <td>
          <input type="button" class="del_btn remove" name="Delete" value="Delete"
          onclick="deleteCat(<?php echo $item['Id']; ?>)">
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    <div class="pagination1 col-6 " style="margin-top: 30px; margin-bottom: 30px; margin-left: 20rem;">
        <span>Current Page: <?php echo $page; ?></span>
            <?php
            for ($page = 1; $page <= $number_of_page; $page++) {
                echo '<a href = "productCategory.php?page=' . $page . '">' . $page . ' </a>';
            }
            ?>
        </div>

        <div class="col-lg-12" style="border-style: solid; border-color: rgb(176, 132, 88);">
            <form method="POST" action="productCatAction.php">
                <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                <div class="row" style="margin-top: 10px;">
                    <label class="col-2">Category Name</label>
                    <div class="col-3"><input required="required" type="text" name="CategoryName" placeholder="Enter Category name" value="<?php echo $CategoryName; ?>"></div>
                </div>
                <div class="row" style="margin-top:5px;">
                    <label class="col-2">Category Sort</label>
                    <diV class="col-3"><input required="required" type="number" min="1" max="1000" name="CategorySort" placeholder="Sort" value="<?php echo $CategorySort; ?>"></diV>
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
    function deleteCat(catId){
        if(confirm("Do you want to delete?")){
            window.location.href='productCatAction.php?del=' + catId + '';
            return true;
        }

    }
</script>