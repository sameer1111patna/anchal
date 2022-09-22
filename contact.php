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
   .title-bg-eight {
    background-image:url(admin/upload/<?php echo $contact_banner; ?>)!important;
}
</style>

    <?php
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `contactdetails_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $portfolioid=$id;
    ?>
<div class="page-title-area title-bg-eight">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2>Contact</h2>
<ul>
<li>
<a href="<?php echo $base_url; ?>">Home</a>
</li>
<li>
<span>Contact</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="contact-info-area pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-sm-6 col-lg-4">
<div class="contact-info">
<i class="icofont-location-pin"></i>
<span>Location:</span>
<a href="#"><?php echo $address; ?></a>
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="contact-info">
<i class="icofont-ui-call"></i>
<span>Phone:</span>
<a href="tel:8327468420"><?php echo $phone; ?></a>
</div>
</div>
<div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
<div class="contact-info">
<i class="icofont-ui-email"></i>
<span>Email:</span>
<a href="mailto:anchalngomemari@gmail.com"><?php echo $email; ?></a>
</div>
</div>
</div>
</div>
</div>


<div class="contact-area pb-70">
<div class="container">
   
<form action="" method="post" id="contactForm">
<h2>Let's talk...!</h2>
<p>Feel free to contact us today</p>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-user-alt-3"></i>
</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-ui-email"></i>
</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Email" required data-error="Please enter your email">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-ui-call"></i>
</label>
<input type="text" name="phone" id="phone_number" placeholder="Phone" required data-error="Please enter your number" class="form-control">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-notepad"></i>
</label>
<input type="text" name="subject" id="msg_subject" class="form-control" placeholder="Subject" required data-error="Please enter your subject">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>
<i class="icofont-comment"></i>
</label>
<textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Write message" required data-error="Write your message"></textarea>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-12">
<button type="submit" name="addbtn" class="btn common-btn">
Send Message
</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>


<div class="map-area">
    <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7335.3545978735865!2d88.08974983488774!3d23.181975100000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f85755dcb39d13%3A0xf51314b6299e545f!2sMEMARI-I%20B.D.O.%20OFFICE%2C%20PURBA%20BARDHAMAN.!5e0!3m2!1sen!2sin!4v1615632012265!5m2!1sen!2sin" style="border:0;" tabindex="0" allowfullscreen="" loading="lazy"></iframe>
</div>

<?php include "inc/footer.php"; ?>
<script src="<?php echo $base_url; ?>/assets/js/form-validator.min.js"></script>

<script src="<?php echo $base_url; ?>/assets/js/contact-form-script.js"></script>