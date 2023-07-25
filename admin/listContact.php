<?php

require_once('productCatAction.php');
require_once('db/dbHeper.php');

$edit_state = false;

$results_per_page = 5;  
$db = mysqli_connect('localhost', 'root', '', 'project001');
mysqli_set_charset($db, 'utf8');

$query = "select * from contact";  
$result = mysqli_query($db, $query);  
$number_of_result = mysqli_num_rows($result);  

$number_of_page = ceil ($number_of_result / $results_per_page);  

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  
  
$page_first_result = ($page-1) * $results_per_page;  

$query = "SELECT *FROM contact LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($db, $query);  

?>
<!DOCTYPE html>

<html lang="en">
<?php
include 'layouts/header.php';
?>
<section class="all" style="width: 84%;
    margin-top: 100px;
    margin-left: auto;">

    <div class="col-lg-12"> 
        <table class="table" style="border-style: solid;
                    border-color: rgb(176, 132, 88);">
            <thead style="border-bottom: solid; border-color: rgb(176, 132, 88);">
                <tr>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Content</th>
                    <th scope="col">Create Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $item) {
                ?>
                    <tr id="<?php echo $item['Id'] ?>"> 
                        <td scope="row"><?php echo $item['Fullname']; ?></td>
                        <td><?php echo $item['Email']; ?></td>
                        <td><?php echo $item['Mobile']; ?></td>
                        <td><?php echo $item['Content']; ?></td>
                        <td><?php echo $item['CreateDate']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination1 col-6 " style="margin-top: 30px; margin-bottom: 30px; margin-left: 20rem;">
        <span>Current Page: <?php echo $page; ?></span>
            <?php
            for ($page = 1; $page <= $number_of_page; $page++) {
                echo '<a href = "listcontact.php?page=' . $page . '">' . $page . ' </a>';
            }
            ?>
        </div>
    </div>
    <?php
    include 'layouts/footer.php';
    ?>
</section>
