<footer class="footer-area pt-100">
<div class="container">
<div class="row">
<div class="col-sm-6 col-lg-3">
<div class="footer-item">
<div class="footer-logo">
<a class="logo" href="index.php">
<img src="<?php echo $base_url; ?>/anchal-logo-1.png" alt="Logo">

<?php
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `footer_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $portfolioid=$id;
    ?>
</a>
<p><?php echo $description1; ?></p>
<ul>
<li>
<a href="https://www.facebook.com/TeamAnchal" target="_blank">
<i class="icofont-facebook"></i>
</a>
</li>
<!--<li>
<a href="#" target="_blank">
<i class="icofont-twitter"></i>
</a>
</li>
<li>
<a href="#" target="_blank">
<i class="icofont-youtube-play"></i>
</a>
</li>
<li>
<a href="#" target="_blank">
<i class="icofont-instagram"></i>
</a>
</li>-->
</ul>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="footer-item">
<div class="footer-causes">
<h3>Recent Activity</h3>
 <?php

$stmttech = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` order by id desc  limit 2");


$stmttech->execute();
while($rowtech=$stmttech->fetch(PDO::FETCH_ASSOC))
            {

                       extract($rowtech);
                       $technewsid=$id;
                       $technewstitle=$title;
                       $technewsimage=$image;
                       $technewsdescription=$description;
                    
                     
                       $techdate=$date;
                      
                      

                       ?>
<div class="cause-inner">
<ul class="align-items-center">
<li>
<img src="admin/upload/<?php echo $technewsimage ; ?>" style="width:77px;height:77px;object-fit:cover;" alt="Cause">
</li>
<li>
 <h3>
<a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $technewsid; ?>"><?php echo $technewstitle; ?></a>
</h3>
</li>
</ul>
</div>
<?php

}
?>

</div>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="footer-item">
<div class="footer-links">
<h3>Quick links</h3>
<ul>
<li>
<a href="<?php echo $base_url; ?>/about.php">
<i class="icofont-simple-right"></i>
About
</a>
</li>
<li>
<a href="<?php echo $base_url; ?>/blog.php">
<i class="icofont-simple-right"></i>
Activity
</a>
</li>
<li>
<a href="<?php echo $base_url; ?>/donation.php">
<i class="icofont-simple-right"></i>
Donation
</a>
</li>
<li>
<a href="<?php echo $base_url; ?>/contact.php">
<i class="icofont-simple-right"></i>
Contact us
</a>
</li>
</ul>
</div>
</div>
</div>


<div class="col-sm-6 col-lg-3">
<div class="footer-item">
<div class="footer-contact">
<h3>Contact info</h3>
<div class="contact-inner">
<ul>
<li>
<?php
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `contactdetails_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $portfolioid=$id;
    ?>
<i class="icofont-location-pin"></i>
<a href="#"><?php echo $address; ?></a>
</li>
<li>
<i class="icofont-ui-call"></i>
<a href="tel:8327468420"><?php echo $phone; ?></a>
</li>
</ul>
</div>

</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-lg-3">
<div class="footer-item">

</div>
</div>


<div class="col-sm-6 col-lg-6">
<div class="footer-item">
<?php echo $description2 ?>
</div>
</div>


<div class="col-sm-6 col-lg-3">
<div class="footer-item">
<?php echo $description3 ?>
</div>
</div>
</div>

</div>



<div class="copyright-area">
<p>Copyright ©2021 Anchal. Designed By <a href="https://www.vedastechnocrats.com/" target="_blank">Vedas Technocrats PVT LTD</a></p>
</div>
</div>
</footer>


<div class="go-top">
<i class="icofont-arrow-up"></i>
<i class="icofont-arrow-up"></i>
</div>


<script src="<?php echo $base_url; ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo $base_url; ?>/assets/js/popper.min.js"></script>
<script src="<?php echo $base_url; ?>/assets/js/bootstrap.min.js"></script>



<script src="<?php echo $base_url; ?>/assets/js/jquery.ajaxchimp.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/jquery.meanmenu.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/jquery-modal-video.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/wow.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/lightbox.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/owl.carousel.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/odometer.min.js"></script>
<script src="<?php echo $base_url; ?>/assets/js/jquery.appear.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/jquery.nice-select.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/custom.js"></script>
 <script type="text/javascript">

function myFunction(form){

    var item = document.getElementById("txtse").value;

var formact= "<?php echo $base_url; ?>/blog-search/" + item+"/";

window.location.href = formact;
}

   if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
     }
</script>
</body>

</html>