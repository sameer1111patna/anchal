<?php
session_start();

include "../functions/functions.php";

$prefix='a';
$cookie_field_names=array("username","password");
$fetch_field_names=array("id","username","password");

if($classhelper->checklogin($cookieadminname1,$cookieadminname2,'admin_tb',$cookie_field_names,$fetch_field_names,$prefix)==true){

    $classhelper->checklogin($cookieadminname1,$cookieadminname2,'admin_tb',$cookie_field_names,$fetch_field_names,$prefix);

$validLogin = $classhelper->logout($cookieadminname1,$cookieadminname2);

if($validLogin)
{

    $_SESSION['logout']='1';

header("location: $admin_base_url/login/");

}
else {
   

header("location: $admin_base_url/");



}

}else{

header("location: $admin_base_url/");

}






?>