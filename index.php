<!DOCTYPE html>
<html lang="zxx">

<head>
<?php include "inc/link.php"; ?>
</head>
<body>

<?php include "inc/header.php"; ?>


<div class="banner-area-two three">
<div class="banner-slider owl-theme owl-carousel">
    
<?php

$stmt = $classhelper->db_con->prepare("SELECT * FROM `slider_tb` order by id desc");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {

		extract($row);
                           $portfolioid=$id;
                           $portfoliotitle=$title;
                           $portfolioimage=$image;
                           $sub_title=$sub_title;
                          
                          $blogdate=$date;
                          
				
                          
                          ?>
                    

<div class="banner-slider-item" style='background-image: url("admin/upload/<?php echo $portfolioimage; ?>");' >
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="banner-content">
<h1><?php echo $portfoliotitle; ?></h1>
<p><?php echo $sub_title; ?>
</p>
<div class="banner-btn-area">
<a class="common-btn banner-btn" href="<?php echo $base_url; ?>/contact.php">Contact Us</a>
<a class="common-btn" href="<?php echo $base_url; ?>/donation.php">Donate Now</a>
</div>
</div>
</div>
</div>
</div>
</div>
<?php

}
?>

</div>
</div>

<?php


$stmt = $classhelper->db_con->prepare("SELECT * FROM `aboutus_tb` order by id desc");

$stmt->execute();


		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row);
                           $portfolioid=$id;
                           $content=$content;
                           $image=$image;
                        
                          
                          
				}
				
                          
                          ?>


<div class="about-area pt-100 pb-70">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="about-img">
<img src="admin/upload/<?php echo $image;?>" alt="About">
</div>
</div>
<div class="col-lg-6">
<div class="about-content">
<div class="section-title">
<span class="sub-title">About us</span>
<h2>About Anchal</h2>
</div>
<p>
    <?php echo $content; ?>
</p>
<div class="about-btn-area">
<a class="common-btn about-btn" href="<?php echo $base_url; ?>/contact.php">Contact Us</a>
<a class="common-btn" href="<?php echo $base_url; ?>/about.php">Read More</a>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="benefit-area three pt-100">
<div class="container">
<div class="section-title">
<span class="sub-title">Core features</span>
<h2>Our goals and missions</h2>
<p>We are a non-profitable charitable institution serving social enterprises, communities, or individual citizens in times of dire need.</p>
</div>
<div class="row">
<div class="col-sm-6 col-lg-3">
<div class="benefit-item">
<i class="flaticon-house"></i>
<h3>Build home</h3>
<p>Through crowdfunding, we were able to build a roof over several people and thus ensuring their safety.</p>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="benefit-item two">
<i class="flaticon-hospital"></i>
<h3>Medical facilities</h3>
<p>We help people to generate funds for any kind of medical emergencies.</p>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="benefit-item three">
<i class="flaticon-fast-food"></i>
<h3>Food & water</h3>
<p>Our volunteers work tirelessly in times of crisis to feed people in need. Not only the people, but we also try to look after stray animals. 
</p>
</div>
</div>
<div class="col-sm-6 col-lg-3">
<div class="benefit-item four">
<i class="flaticon-graduation-cap"></i>
<h3>Education facilities</h3>
<p>No one should remain illiterate. And thus, we generate funds for securing proper education for both children and adults.</p>
</div>
</div>
</div>
</div>
</div>


<section class="donations-area three pt-100 pb-70">
<div class="container">

<div class="section-title">
<span class="sub-title">Causes to care</span>
<h2>We care for you and your surroundings</h2>
<p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.</p>
</div>
<div class="row">





<?php


$stmt = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` WHERE status='1'");
$stmt->execute();
$users = $stmt->fetchAll();
    foreach($users as $user)
    {

    ?>

<div class="col-sm-6 col-lg-4">
<div class="donation-item">
<div class="top">
<!--a class="tags" href="#">#Medical</a-->
<h3>
<a href="<?php echo $base_url; ?>/donation"><?php echo $user['title']; ?>
</a>
</h3>
<p><?php  echo $user['description']; ?></p>
</div>
<div class="img">
<img src="admin/upload/<?php echo $user['image'];; ?>" alt="Donation">
<!--a class="common-btn" href="donation-details.html">Donate Now</a-->
</div>
<div class="inner">
<div class="bottom">
<div class="skill">
<div class="skill-bar skill1 wow fadeInLeftBig">
<!--span class="skill-count1">85%</span-->
</div>
</div>
<!--ul>
<li>Raised: $5,500.00</li>
<li>Goal: $7,000.00</li>
</ul>
<h4>Donated by <span>60 people</span></h4-->
</div>
</div>
</div>
</div>

<?php }?>











</div>
</div>
</section>


<!--section class="event-area pt-100 pb-70">
<div class="container">
<div class="section-title">
<span class="sub-title">Our events</span>
<h2>Upcoming events near you</h2>
</div>
<div class="row align-items-center">
<div class="col-lg-6">
<div class="event-item">
<img src="assets/img/event/event3.jpg" alt="Event">
<div class="inner">
<h4>10 <span>Jan</span></h4>
<h3>
<a href="event-details.html">Relief giving - Providing relief</a>
</h3>
<ul>
<li>
<i class="icofont-stopwatch"></i>
<span>3.00pm - 4.00pm</span>
</li>
<li>
<i class="icofont-location-pin"></i>
<span>USA</span>
</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="event-item-right">
<h4>06 <span>Jan</span></h4>
<h3>
<a href="event-details.html">Challenge is right for you</a>
</h3>
 <ul>
<li>
<i class="icofont-stopwatch"></i>
<span>10.00am - 11.00am</span>
</li>
<li>
<i class="icofont-location-pin"></i>
<span>UK</span>
</li>
</ul>
</div>
<div class="event-item-right">
<h4>07 <span>Jan</span></h4>
<h3>
<a href="event-details.html">Fundraising is going</a>
</h3>
<ul>
<li>
<i class="icofont-stopwatch"></i>
<span>11.00am - 12.00pm</span>
</li>
<li>
<i class="icofont-location-pin"></i>
<span>France</span>
</li>
</ul>
</div>
<div class="event-item-right">
<h4>08 <span>Jan</span></h4>
<h3>
<a href="event-details.html">Bowling for a cause</a>
</h3>
<ul>
<li>
<i class="icofont-stopwatch"></i>
<span>1.00pm - 1.30pm</span>
</li>
<li>
<i class="icofont-location-pin"></i>
<span>Spain</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</section-->


<!--div class="counter-area pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-6 col-sm-6 col-lg-3">
<div class="counter-item">
<i class="flaticon-index"></i>
<h3>
<span class="odometer" data-count="30">00</span>
<span class="target">M</span>
</h3>
<p>Total fund raised</p>
</div>
</div>
<div class="col-6 col-sm-6 col-lg-3">
<div class="counter-item">
<i class="flaticon-event"></i>
<h3>
<span class="odometer" data-count="250">00</span>
<span class="target">+</span>
</h3>
<p>Successful events</p>
</div>
</div>
<div class="col-6 col-sm-6 col-lg-3">
<div class="counter-item">
<i class="flaticon-charity"></i>
<h3>
<span class="odometer" data-count="550">00</span>
<span class="target">+</span>
</h3>
<p>Worldwide volunteers</p>
</div>
</div>
<div class="col-6 col-sm-6 col-lg-3">
<div class="counter-item">
<i class="flaticon-helping-hand"></i>
<h3>
<span class="odometer" data-count="500">00</span>
 <span class="target">+</span>
</h3>
<p>Our donner</p>
</div>
</div>
</div>
</div>
</div-->


<!--<section class="work-area pt-100 pb-70">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="work-content">
<div class="section-title">
<span class="sub-title">How we work</span>
<h2>We exist for non-profits, social enterprises, community groups</h2>
</div>
<ul>
<li>
<h3><span>01</span>Raise money from different sources</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse animi temporibus iusto at dolorum</p>
</li>
<li>
<h3><span>02</span>Giving relief in rural area all over the world</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse animi temporibus iusto at dolorum</p>
</li>
<li>
<h3><span>03</span>Gather all the money and giving relief in need</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse animi temporibus iusto at dolorum</p>
</li>
<li>
<h3><span>04</span>Go to the country that really needs help</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, pariatur esse animi temporibus iusto at dolorum</p>
</li>
</ul>
</div>
</div>
<div class="col-lg-6">
<div class="work-img">
<img src="assets/img/work/work1.jpg" alt="Work">
<img src="assets/img/work/work2.jpg" alt="Work">
</div>
</div>
</div>
</div>
</section>-->


<section class="gallery-area two pb-70">
<div class="container-fluid">
<div class="section-title">
<span class="sub-title">Our gallery</span>
<h2>Discover the best things we do</h2>
<p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.</p>
</div>
<div class="gallery-slider owl-theme owl-carousel">
    <?php

$stmt1 = $classhelper->db_con->prepare("SELECT * FROM `gallery_tb` order by id desc");


	$stmt1->execute();


		while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row1);
                           $portfolioid=$id;
                          
                           $portfolioimage=$image;
                          
                          
                          $blogdate=$date;
                          
				
                          
                          ?>
<div class="gallery-item">
<a href="admin/upload/<?php echo $portfolioimage; ?>" data-lightbox="roadtrip">
<img src="admin/upload/<?php echo $portfolioimage; ?>" alt="Gallery" style="height:230px;width:330px;object-fit:cover">
<i class="icofont-eye"></i>
</a>
</div>
<?php

}
?>

</div>
</div>
</section>

<?php

$stmt2 = $classhelper->db_con->prepare("SELECT * FROM `team_tb`");


	$stmt2->execute();
		$count2=$stmt2->rowcount();
	
	if($count2>0){

?>
<section class="team-area pb-70">
<div class="container">
<div class="section-title">
<span class="sub-title">Team</span>
<h2>Meet our Awesome Team Memebers</h2>
<!--<p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.</p>-->
</div>
<div class="row">
        <?php


		while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row2);
                           $teamid=$id;
                           $teamname=$name;
                           $teamimage=$image;
                           $teamdesignation=$designation;
                          
                          $blogdate=$date;
                          
				
                          
                          ?>
<div class="col-sm-6 col-lg-4">
<div class="team-item">
<div class="top">
<img src="admin/upload/<?php echo $teamimage; ?>" style="height:620px;object-fit:cover;" alt="Team">

</div>
<div class="bottom">
<h3><?php echo $teamname; ?></h3>
<span><?php echo $teamdesignation; ?></span>
</div>
</div>
</div>
<?php
}
?>

</div>
</div>
</section>
<?php
}
?>


<!--<section class="testimonial-area ptb-100">
<div class="container">
<div class="section-title">
<span class="sub-title">Testimonials</span>
<h2>Review from our clients</h2>
</div>
<div class="testimonial-slider owl-theme owl-carousel">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="testimonial-img">
<img src="assets/img/testimonial/testimonial1.jpg" alt="Testimonial">
<h3>Jac Jacson</h3>
<span>CEO & Abanda</span>
</div>
</div>
<div class="col-lg-6">
<div class="testimonial-content">
<ul>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
 </li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
</ul>
<p>My first-time experience with Anchal was extraordinary. The team goes out of the way to help people in dire need. With the help of the team, we were able to deliver groceries and other goods to many affected people.</p>
<i class="icofont-quote-left quote"></i>
</div>
</div>
</div>
<div class="row align-items-center">
<div class="col-lg-6">
<div class="testimonial-img">
<img src="assets/img/testimonial/testimonial2.jpg" alt="Testimonial">
<h3>Tom Henry</h3>
<span>Manager</span>
</div>
</div>
<div class="col-lg-6">
<div class="testimonial-content">
<ul>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
</ul>
<p>Pairing up with Anchal helped me understand the social picture and also gained social consciousness. I would love to partner with them in their future pursuits. </p>
<i class="icofont-quote-left quote"></i>
</div>
</div>
</div>
<div class="row align-items-center">
<div class="col-lg-6">
<div class="testimonial-img">
<img src="assets/img/testimonial/testimonial3.jpg" alt="Testimonial">
<h3>Micheal Shon</h3>
<span>Director</span>
</div>
</div>
<div class="col-lg-6">
<div class="testimonial-content">
<ul>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
 </li>
</ul>
<p>Answering nature’s call, and helping to make the community a better place to abide helped me understand the environmental picture. </p>
<i class="icofont-quote-left quote"></i>
</div>
</div>
</div>
<div class="row align-items-center">
<div class="col-lg-6">
<div class="testimonial-img">
<img src="assets/img/testimonial/testimonial3.jpg" alt="Testimonial">
<h3>Micheal Shon</h3>
<span>Director</span>
</div>
</div>
<div class="col-lg-6">
<div class="testimonial-content">
<ul>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
</li>
<li>
<i class="icofont-star checked"></i>
 </li>
</ul>
<p>Fundraising with Anchal helped me to connect with the world and generate adequate funds that helped us to feed families for several weeks.  </p>
<i class="icofont-quote-left quote"></i>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="blog-area three pt-100 pb-70">
<div class="container">
<div class="section-title">
<span class="sub-title">Latest news & blog</span>
<h2>Latest charity blog</h2>
<p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.</p>
</div>
<div class="row">
<div class="col-sm-6 col-lg-4">
<div class="blog-item">
<div class="top">
<a href="blog-details.html">
<img src="assets/img/blog/blog1.jpg" alt="Blog">
</a>
</div>
<div class="bottom">
<ul>
<li>
<i class="icofont-calendar"></i>
<span>21 Jan, 2020</span>
</li>
<li>
<i class="icofont-user-alt-3"></i>
<span>By:</span>
<a href="#">Admin</a>
</li>
</ul>
<h3>
<a href="blog-details.html">Donate for nutration less poor people</a>
</h3>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet cupiditate sit ducimus dolor laudantium distinction</p>
<a class="blog-btn" href="blog-details.html">Read More</a>
</div>
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="blog-item">
<div class="top">
<a href="blog-details.html">
<img src="assets/img/blog/blog2.jpg" alt="Blog">
</a>
</div>
<div class="bottom">
<ul>
<li>
<i class="icofont-calendar"></i>
<span>22 Jan, 2020</span>
</li>
<li>
<i class="icofont-user-alt-3"></i>
<span>By:</span>
<a href="#">Admin</a>
</li>
</ul>
<h3>
<a href="blog-details.html">Charity meetup in Berline next year</a>
</h3>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet cupiditate sit ducimus dolor laudantium distinction</p>
<a class="blog-btn" href="blog-details.html">Read More</a>
</div>
</div>
</div>
<div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
<div class="blog-item">
<div class="top">
<a href="blog-details.html">
<img src="assets/img/blog/blog3.jpg" alt="Blog">
</a>
</div>
<div class="bottom">
<ul>
<li>
<i class="icofont-calendar"></i>
<span>23 Jan, 2020</span>
</li>
<li>
<i class="icofont-user-alt-3"></i>
<span>By:</span>
<a href="#">Admin</a>
</li>
</ul>
<h3>
<a href="blog-details.html">Donate for the poor people to help them</a>
</h3>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet cupiditate sit ducimus dolor laudantium distinction</p>
<a class="blog-btn" href="blog-details.html">Read More</a>
</div>
</div>
</div>
</div>
</div>
</section-->


<?php include "inc/footer.php"; ?>