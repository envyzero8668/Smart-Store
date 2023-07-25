<?php 

require_once('db/dbHeper.php');
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (isset($_POST["save"])) {
    $Fullname = $_POST['Fullname']; 
    $Email = $_POST['Email'];
    $Mobile = $_POST['Mobile'];
    $Content = $_POST['Content'];
    $CreateDate = date('Y/m/d  h:i:s');
    
    // $thisTime =  date("d-m-y h:i:s", strtotime(date("d-m-y h:i:s", strtotime($CreateDate)) . " + 730 day"));

    $query = "INSERT INTO contact(Fullname, Email, Mobile, Content, CreateDate) VALUES 
    ('$Fullname', '$Email','$Mobile', '$Content', '$CreateDate')";
    execute($query);

    if ($query) {
         header('location: contact.php');
    } else {
        header('location: home.php');
    }
}
?>
<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<!-- Contact start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <div class="post-intro text-center">
                    <p align="left" style="margin-top: 30px;">
                        <font size="7" color="b08458"><strong>Contact Us</strong></font>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p align="left">&nbsp;</p>
                <p align="left">
                    <font size="4">Normal Trading Hours Are:</font>
                </p><br>
                <p align="left">
                    <font size="4">Monday - Friday: 9am - 4pm.</font>
                </p><br>
                <p align="left">
                    <font size="4">Saturday: 9am to 12pm.</font>
                </p><br>
                <p align="left">
                    <font size="4"> Sundays &amp; Public Holidays: Closed</font>
                </p><br>
                    <h4><strong>Please call:</strong><br></h4>
                <p align="left">
                    <font size="4">Phone: <a href="tel:0894096706" target="new">08 9409 6706</a></font>
                </p>
                <p align="left">
                    <font size="4">Email: <a href="mailto:sales@wardrobeman.com.au"
                                target="new">sales@smartstore.com.au</a></font>
                </p>
                <p>&nbsp;</p>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3391.2521708044133!2d115.82328161445196!3d-31.7908767216449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32ad0a560ac2f9%3A0xe1648d836ce4110c!2s5%2F55%20Prindiville%20Dr%2C%20Wangara%20WA%206065%2C%20%C3%9Ac!5e0!3m2!1svi!2s!4v1622603411784!5m2!1svi!2s" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                </div>
            </div>
        </div>
    </section>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <div class="container" style="max-width: 1140px;">
        <div class="row">
            <div class="col-md-12">
            <!-- Submitt Form Start. -->
                <div id="wrapper">
                    <div id="subscribeBox">
                        <div class="jumbotron jumbotronOuter">
                            <div class="jumbotronInner">
                                <h2 align="center" style="font-family: montserrat;
                                font-weight: 600;
                                color: rgb(237, 210, 183);
                                font-size: 46px;"><img src="res/img/logo/logo.png" 
                                        alt="Smart Store"></h2>
                                <h2 align="center" style="color: rgb(176, 132, 88);">Contact The Smart Store</h2>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" required="required" name="Fullname" class="form-control" placeholder="Fullname">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" required="required" name="Email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" required="required" min="0" name="Mobile" class="form-control" placeholder="Mobile">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" name="Content" placeholder="Content"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn" type="submit" name="save">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact end -->



<?php include('footer.php'); ?>
</html>