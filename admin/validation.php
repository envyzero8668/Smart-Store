<?php
session_start();
$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'project001');

$name = '';
$password = '';
if(isset($_POST['login'])){

    $name = $_POST['user'];
    $password = $_POST['password'];
    $hashed_password = sha1($password);
    
    $s = "select * from admin where Username = '$name' && PasswordHash = '$hashed_password'";
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result); 
    if ($num == 1) {
        
        $_SESSION['username'] = $name; 
        header('location:product.php');
    } else {
        $_SESSION['msg'] = "This account doen't exist, please try again!";
        header('location:index.php');
    }
}

?>
