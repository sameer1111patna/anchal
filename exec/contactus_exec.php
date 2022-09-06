  <?php
  
  include "../admin/functions/functions.php"; 
  $classhelper->config();

                        if($_POST){


  try{
  
  $name=htmlspecialchars($_POST['name']);
  $email=htmlspecialchars($_POST['email']);
  $phone=htmlspecialchars($_POST['phone']);
  $subject=htmlspecialchars($_POST['subject']);
  $message=htmlspecialchars($_POST['message']);
  
  $today= date('Y-m-d H:i:s');
  
  $stmt = $classhelper->db_con->prepare("INSERT INTO `contactus_tb`(`name`, `email`, `phone`, `subject`, `message`, `date`) VALUES  (:name,:email,:phone,:subject,:message,'$today')");
  
  $stmt->bindParam(":name",$name);
  $stmt->bindParam(":email",$email);
  $stmt->bindParam(":phone",$phone);
  $stmt->bindParam(":subject",$subject);
  $stmt->bindParam(":message",$message);
  
  
  
  
  if($stmt->execute()){
  
 echo 'success';
  
  }else{
  
  
  echo 'failed';
  
  }
  
  }
  catch(PDOException $ex){
  
  echo $ex->getMessage();

  
  
  }
  
  }
  
  ?>