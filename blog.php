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
   .title-bg-six {
    background-image:url(admin/upload/<?php echo $acivity_banner; ?>)!important;
}
</style>
<div class="page-title-area title-bg-six">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2>Activities</h2>
<ul>
<li>
<a href="<?php echo $base_url; ?>">Home</a>
</li>
<li>
<span>Activities</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>

  <?php 



 if(isset($_GET['category']) && empty($_GET['keyword'])){

     $cat= basename(htmlspecialchars($_GET['category']), ".php");
    
    
     $query="Where category='$cat'";
 }
 elseif(empty($_GET['category'])  && isset($_GET['keyword'])){

     $cat= basename(htmlspecialchars(@$_GET['category']), ".php");
     $keyword=basename(htmlspecialchars(@$_GET['keyword']), ".php");;
   
    
     $query="Where `title` LIKE '%$keyword%'";
 }
 elseif(isset($_GET['category']) && isset($_GET['keyword'])){

     $cat= basename(htmlspecialchars($_GET['category']), ".php");
     $keyword=htmlspecialchars($_GET['keyword']);
   
    
     $query="Where category='$cat' AND `title` LIKE '%$keyword%'";
 }
 else{
     $query='';

 }
 $results_per_page='6';
 $stmtxd = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` $query");
       $stmtxd->execute();
       $counter=$stmtxd->rowcount();
$counter=$counter/6;
$counter=ceil($counter);



if (!isset ($_GET['page']) ) {  
$page = 1;  
} else {  
$page = basename($_GET['page'],".php");  
}  



$page_first_result = ($page-1) * $results_per_page; 
?>

<section class="blog-area three ptb-100">
<div class="container">
<div class="row">
    

   <?php

$stmt = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` $query LIMIT " . $page_first_result . ',' . $results_per_page);


	$stmt->execute();

    $j=1;

		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row);
                           $portfolioid=$id;
                           $portfoliotitle=$title;
                           $portfolioimage=$image;
                           $portfoliodescription=$description;
                          
                          

                           $blogdate=$date;




                                                

                                                              ?>    
    
<div class="col-sm-6 col-lg-4">
<div class="blog-item">
<div class="top">
<a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $portfolioid; ?>/">
<img src="admin/upload/<?php echo $portfolioimage; ?>" style="height:368px;object-fit:cover;" alt="Blog">
</a>
</div>
<div class="bottom">
<ul>
<li>
<i class="icofont-calendar"></i>
<span><?php echo date('j F, Y', strtotime($blogdate)); ?></span>
</li>
<li>
<i class="icofont-user-alt-3"></i>
<span>By:</span>
<a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $portfolioid; ?>">Admin</a>
</li>
</ul>
<h3>
<a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $portfolioid; ?>"><?php echo $portfoliotitle; ?></a>
</h3>
<p><?php echo substr(strip_tags($portfoliodescription),0,50); ?></p>
<a class="blog-btn" href="<?php echo $base_url;?>/blog-single.php?id=<?php echo $portfolioid; ?>">Read More</a>
</div>
</div>
</div>
<?php


}
?>

</div>
<div class="pagination-area">
<ul>
    
    
<?php if($counter>1){ if($page>'1'){ ?><li><a href="<?php echo $base_url; ?>/<?php if(isset($_GET['keyword'])){ ?>blog-search/keyword/<?php echo $keyword.'/'; }else{ ?>blog/<?php if(isset($_GET['category'])){ ?>category/<?php echo $cat;?>/<?php } } ?>page/<?php echo $page-1; ?>/">Prev</a></li><?php } } ?>

 <?php
     for($z='1'; $z<=$counter; $z++){ ?>
     <li><a href="<?php echo $base_url; ?>/<?php if(isset($_GET['keyword'])){ ?>blog-search/keyword/<?php echo $keyword.'/'; }else{ ?>blog/<?php if(isset($_GET['category'])){ ?>category/<?php echo $cat;?>/<?php } } ?>page/<?php echo $z; ?>/" <?php if($page==$z){ ?>class="active" <?php } ?>><?php echo str_pad($z, 2, '0', STR_PAD_LEFT); ?></a></li>
     <?php
     }
     ?>


<?php if($page<$counter){ ?><li><a href="<?php echo $base_url; ?>/<?php if(isset($_GET['keyword'])){ ?>blog-search/keyword/<?php echo $keyword.'/'; }else{ ?>blog/<?php if(isset($_GET['category'])){ ?>category/<?php echo $cat;?>/<?php } } ?>page/<?php echo $page+1; ?>/">Next</a></li><?php } ?>

</ul>
</div>
</div>
</section>

<?php include "inc/footer.php"; ?>