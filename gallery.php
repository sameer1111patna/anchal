<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include "inc/link.php"; ?>
</head>



<body>

    <?php include "inc/header.php"; ?>

<?php
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `banner_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        
?>
<style>
   .title-bg-nine {
    background-image:url(admin/upload/<?php echo $galley_banner; ?>)!important;
}
</style>
<style>
    .title-bg-nine {
    background-image: url(assets/img/81786506_2659081867656015_7141842915969466368_o.jpg);
}
.gallery-item img {
    width: 100%;
    border-radius: 30px 30px 0 30px;
    -webkit-transition: .5s all ease;
    transition: .5s all ease;
    width: 416px;
    height: 311px;
    object-fit: cover;
}
</style>

<div class="page-title-area title-bg-nine">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2>Gallery</h2>
<ul>
<li>
<a href="<?php echo $base_url; ?>">Home</a>
</li>
<li>
<span>Gallery</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="gallery-area ptb-100">
<div class="container">
<div class="row">
<?php
   $stmtx = $classhelper->db_con->prepare("SELECT * FROM `gallery_tb` order by id desc ");


   $stmtx->execute();

       

       while($row5=$stmtx->fetch(PDO::FETCH_ASSOC))
               {

                          extract($row5);
                          $galid=$id;
                          $galtitle=$title;
                          $galimage=$image;



               ?>
<div class="col-sm-6 col-lg-4">
<div class="gallery-item">
<a href="admin/upload/<?php echo $galimage; ?>" data-lightbox="roadtrip">
<img src="admin/upload/<?php echo $galimage; ?>" alt="Gallery">
<i class="icofont-eye"></i>
</a>
</div>
</div>
<?php

               }
               ?>

</div>

</div>
</div>

<?php include "inc/footer.php"; ?>