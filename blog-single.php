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
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `banner_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        
    ?>
<style>
   .title-bg-seven {
    background-image:url(admin/upload/<?php echo $acivity_banner; ?>)!important;
}
</style>
<?php

$blogid=$_GET['id'];

echo $blogid;
$stmt = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` where `id`=:blogid");

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
<img src="admin/upload/<?php echo $portfolioimage; ?>"  alt="Details">
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

$stmttech = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` where `id`<>:blogid");

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
                      
                      

                       ?>
<div class="post-inner">
<ul class="align-items-center">
<li>
<img src="admin/upload/<?php echo $technewsimage; ?>" style="height:103px;object-fit:cover;" alt="Details">
</li>
<li>
<h4>
<a href="<?php echo $base_url; ?>/blog-single/<?php echo $technewsid; ?>/"><?php echo $technewstitle; ?></a>
</h4>
<p>By - <a href="#">Admin</a></p>
</li>
</ul>
</div>

<?php

}
?>

</div>

</div>
</div>


</div>
</div>
</div>

<?php include "inc/footer.php"; ?>