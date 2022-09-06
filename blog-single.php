<!DOCTYPE html>
<html lang="zxx">

<head>
<?php include "inc/link.php"; ?>
</head>
<body>

<div class="loader">
<div class="d-table">
<div class="d-table-cell">
<div class="pre-box-one">
<div class="pre-box-two"></div>
</div>
</div>
</div>
</div>


<?php include "inc/header.php"; ?>


<?php

$blogid=basename(htmlspecialchars($_GET['url']), ".php");

echo $blogid;
$stmt = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` where `pagename`=:blogid");

$stmt->bindParam(":blogid",$blogid);
$stmt->execute();


    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {

                       extract($row);
                       $portfolioid=$id;
                       $portfoliotitle=$title;
                       $portfolioimage=$image;
                       $portfoliodescription=$description;
                    
                       $portfoliodate=$date;




}

                                                          ?>
                                                          

<div class="page-title-area title-bg-seven">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2><?php echo $portfoliotitle; ?></h2>
<ul>
<li>
<a href="<?php echo $base_url; ?>">Home</a>
</li>
<li>
<span><?php echo $portfoliotitle; ?></span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="blog-details-area ptb-100">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="details-item">
<div class="details-img">
<img src="data:image/jpeg;base64,<?php echo base64_encode($portfolioimage); ?>"  alt="Details">
<ul>
<li>
<i class="icofont-calendar"></i>
<?php echo date('j F, Y', strtotime($portfoliodate)); ?>
</li>
<li>
<i class="icofont-user-alt-3"></i>
By - <a href="#">Admin</a>
</li>
</ul>
<h2><?php echo $portfoliotitle; ?></h2>
<p><?php echo $portfoliodescription; ?></p>

<!--<div class="img-area">
<div class="row">
<div class="col-sm-6 col-lg-6">
<img src="assets/img/blog/blog1.jpg" alt="Details">
</div>
<div class="col-sm-6 col-lg-6">
<img src="assets/img/blog/blog2.jpg" alt="Details">
</div>
</div>
</div>-->
</div>
<div class="details-share">
<div class="row">
<div class="col-sm-6 col-lg-6">
<div class="left">
<ul>
<li>
<span>Share:</span>
</li>
<li>
<a href="#" target="_blank">
<i class="icofont-facebook"></i>
</a>
</li>
<li>
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
</li>
</ul>
</div>
</div>
<div class="col-sm-6 col-lg-6">
<div class="right">

</div>
</div>
</div>
</div>
<!--<div class="details-comment">
<h3>Comments (02)</h3>
<ul>
<li>
<img src="assets/img/blog/blog-comment1.jpg" alt="Details">
<h4>Marcel Proust</h4>
<span>04 July, 2020</span>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis, saepe veniam id quo repellat consectetur architecto iste eius, voluptas ad velit atque. Voluptate quas labore sapiente praesentium, autem ullam esse.</p>
<a href="#">Reply</a>
</li>
<li>
<img src="assets/img/blog/blog-comment2.jpg" alt="Details">
<h4>Jac Jacson</h4>
<span>05 July, 2020</span>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis, saepe veniam id quo repellat consectetur architecto iste eius, voluptas ad velit atque. Voluptate quas labore sapiente.</p>
<a href="#">Reply</a>
</li>
</ul>
</div>
<div class="details-post">
<h3>Your comment</h3>
<form>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-user-alt-3"></i>
</label>
<input type="text" class="form-control" placeholder="name">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-ui-email"></i>
</label>
<input type="email" class="form-control" placeholder="Email">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>
<i class="icofont-comment"></i>
</label>
<textarea name="your-comment" rows="8" class="form-control" placeholder="Write comment"></textarea>
</div>
</div>
<div class="col-lg-12">
<button type="submit" class="btn common-btn">Post A Comment</button>
</div>
</div>
</form>
</div>-->
</div>
</div>
<div class="col-lg-4">
<div class="widget-area">
<div class="search widget-item">
<form action="javascript:;" onsubmit="myFunction(this)">
<input type="text" name="search" id="txtse" class="form-control" placeholder="Search...">
<button type="submit" class="btn">
<i class="icofont-search-1"></i>
</button>
</form>
</div>
<div class="admin widget-item">
<img src="<?php echo $base_url; ?>/assets/img/user-512.png" style="height: 50px;object-fit:cover;" alt="Admin">
<h4>Administator</h4>
<span>Admin</span>
<ul>
<li>
<a href="#" target="_blank">
<i class="icofont-facebook"></i>
</a>
</li>
<li>
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
</li>
</ul>
</div>
<div class="post widget-item">
<h3>Popular Post</h3>

 <?php

$stmttech = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` where `pagename`<>:blogid");

$stmttech->bindParam(":blogid",$blogid);

$stmttech->execute();
while($rowtech=$stmttech->fetch(PDO::FETCH_ASSOC))
            {

                       extract($rowtech);
                       $technewsid=$id;
                       $technewstitle=$title;
                       $technewsimage=$image;
                       $technewsdescription=$description;
                    
                     
                       $techdate=$date;
                       $technewspagename=$pagename;
                      

                       ?>
<div class="post-inner">
<ul class="align-items-center">
<li>
<img src="data:image/jpeg;base64,<?php echo base64_encode($technewsimage); ?>" style="height:103px;object-fit:cover;" alt="Details">
</li>
<li>
<h4>
<a href="<?php echo $base_url; ?>/blog-single/<?php echo $technewspagename; ?>/"><?php echo $technewstitle; ?></a>
</h4>
<p>By - <a href="#">Admin</a></p>
</li>
</ul>
</div>

<?php

}
?>

</div>
<!--<div class="common-right-content widget-item">
<h3>Categories</h3>
<ul>
<li>
<a href="#">Education (10)</a>
</li>
<li>
<a href="#">Medical (25)</a>
</li>
<li>
<a href="#">Food & Water (14)</a>
</li>
<li>
<a href="#">National Charity (2)</a>
</li>
<li>
<a href="#">Cloth (4)</a>
</li>
</ul>
</div>-->
<!--<div class="instagram widget-item">
<h3>Instagram post</h3>
<div class="row m-0">
<div class="col-4 col-sm-3 col-lg-4 p-0">
<div class="instagram-item">
<img src="assets/img/blog/instagram1.jpg" alt="Instagram">
<a href="#">
<i class="icofont-instagram"></i>
</a>
</div>
</div>
<div class="col-4 col-sm-3 col-lg-4 p-0">
<div class="instagram-item">
<img src="assets/img/blog/instagram2.jpg" alt="Instagram">
<a href="#">
<i class="icofont-instagram"></i>
</a>
</div>
</div>
<div class="col-4 col-sm-3 col-lg-4 p-0">
<div class="instagram-item">
 <img src="assets/img/blog/instagram3.jpg" alt="Instagram">
<a href="#">
<i class="icofont-instagram"></i>
</a>
</div>
</div>
<div class="col-4 col-sm-3 col-lg-4 p-0">
<div class="instagram-item">
<img src="assets/img/blog/instagram4.jpg" alt="Instagram">
<a href="#">
<i class="icofont-instagram"></i>
</a>
</div>
</div>
<div class="col-4 col-sm-3 col-lg-4 p-0">
<div class="instagram-item">
<img src="assets/img/blog/instagram5.jpg" alt="Instagram">
<a href="#">
<i class="icofont-instagram"></i>
</a>
</div>
</div>
<div class="col-4 col-sm-3 col-lg-4 p-0">
<div class="instagram-item">
<img src="assets/img/blog/instagram6.jpg" alt="Instagram">
<a href="#">
<i class="icofont-instagram"></i>
</a>
</div>
</div>
</div>
</div>-->
</div>
</div>
</div>
</div>
</div>

<?php include "inc/footer.php"; ?>