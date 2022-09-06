<?php

$path = str_replace('\\','/',dirname(__DIR__));

require_once($path.'/config/webconfig.php');
	
class Main {

	public $db_con;
	  // db connection config vars
	  private $user = databaseuser;
	  private $pass = databasepass;
	  private $dbName = databasename;
	  private $dbHost = databasehost;

	  
	public function config(){
	
		//PHP PDO Connections
try{$this->db_con = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}",$this->user,$this->pass);
$this->db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){die($ex->getMessage());}



	}

/*****Login*****/

public  function login($u_username, $u_password,$tbname,$coookiename1,$cookiename2,$cookie_name)
{

	$this->config();
		
$stmt = $this->db_con->prepare("SELECT * FROM `$tbname` where `$cookie_name[0]`=:u_username and `$cookie_name[1]`=:u_password");
 $stmt->bindParam(":u_username",$u_username);
 $stmt->bindParam(":u_password",$u_password);
    $stmt->execute();
        $count = $stmt->rowCount();

		//user doesnot exist or wrong username or password
		if($count==0){
		return false;
		}else{

		//user exist login success
		//Fetching rows
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {

		//Extract data
            extract($row);

		    $id=$id;
			$username=$row[$cookie_name[0]];
			$password=$row[$cookie_name[1]];

		}


		$username=base64_encode($username);
		$password=base64_encode($password);



$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
        setcookie($coookiename1,$username,time()+31556926,'/', $domain, FALSE, TRUE);
        setcookie($cookiename2,$password,time()+31556926,'/', $domain, FALSE, TRUE);



			return true;




		}





}


//***User Login */


public  function userlogin($values,$tbname,$cookiename1,$cookiename2){

$this->config();

	

$totl=count($values);
$query='';
for($i=0;$i<$totl;$i++){

	if($i=='0'){

		$z=$i+1;
		$query="(`key_name`=:key_name$z AND `key_value`=:key_value$z)";
	}

}




	$stmt = $this->db_con->prepare("SELECT * FROM `$tbname` where $query");
	$j='1';
	foreach($values as $key=>$value)
		{

			if($j=='1'){
			$stmt->bindParam(":key_name$j",$key);
			$stmt->bindParam(":key_value$j",$value);

			}

			elseif($j=='2'){

				$passordx=$value;
				$xkeyname=$key;
			}

			$j++;

		}
	$stmt->execute();
	
	$count = $stmt->rowCount();

	//user doesnot exist or wrong username or password
	if($count==0){
	return false;
	}else{


		
	//user exist login success
	//Fetching rows
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

	//Extract data
		extract($row);

		$id=$id;
$userid=$userid;


		$valid= checkpass($xkeyname,$passordx,$userid);

		

		if($valid){




			foreach($values as $key=>$value)
		{
	
			$val[]=$key=base64_encode($value);
		}




$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;

	setcookie($cookiename1,$val[0],time()+31556926,'/', $domain, FALSE, TRUE);
	setcookie($cookiename2,$val[1],time()+31556926,'/', $domain, FALSE, TRUE);

	return true;

		}else{

			return false;
		}
		

	}


	




		




	}


}

/***ADmin Check Login */



public  function checklogin($cookiename1,$cookiename2,$tbname,$cookie_name,$fetch_names,$prefix){


	
	$total=count($fetch_names);
	$temp='';
	for($i=0;$i<$total;$i++)
	{
	$temp=$prefix.$fetch_names[$i];
	global $$temp;
	
	}
		$this->config();

	
	
		 @$username=base64_decode($_COOKIE[$cookiename1]);
			@$password=base64_decode($_COOKIE[$cookiename2]);

		
	
			$admin1 = $this->db_con->prepare("SELECT * FROM `$tbname` where `$cookie_name[0]`=:u_username and `$cookie_name[1]`=:u_password");
			 $admin1->bindParam(":u_username",$username);
	 $admin1->bindParam(":u_password",$password);
			$admin1->execute();
			$count1 = $admin1->rowCount();
	
				if($count1==0){
			return false;
			}else{
			while($row1=$admin1->fetch(PDO::FETCH_ASSOC))
	
		   {
		   //Extract data
			extract($row1);
	
			global $prefix;
			for($i1=0;$i1<$total;$i1++)
			{
				
			 
			$temp1=$prefix.$fetch_names[$i1];
 
			$$temp1=$row1[$fetch_names[$i1]];

			
			 
			
			}

			
	
		   }
		  
		   
	
	return true;
		}
	}



/***User Check Login */



public  function uchecklogin($cookiename1,$cookiename2,$tbname,$prefixx){

		
	
$this->config();

	
	
	
		 @$username=base64_decode($_COOKIE[$cookiename1]);
			@$password=base64_decode($_COOKIE[$cookiename2]);


			$stmt2 = $this->db_con->prepare("SELECT * FROM userform_tb where `login`='1'");
			
			$stmt2->execute();
			$count2 = $stmt2->rowCount();
			
			$i=1;
			$queryx='';
			$temp='';
			while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
			
			{
			//Extract data
			@extract($row2);
			@$locationid=$id;
	
   $userformname[]=$name;


   if($i=='1'){

	$queryx="(`key_name`='$userformname[0]' AND `key_value`=:key_value".$i.")";

}


$i++;

			}

	
		
			$admin2 = $this->db_con->prepare("SELECT * FROM `$tbname` where $queryx");
			 $admin2->bindParam(":key_value1",$username);
	 


			$admin2->execute();
			$count1 = $admin2->rowCount();
	
			
				if($count1==0){
			return false;
			}else{
			while($row1=$admin2->fetch(PDO::FETCH_ASSOC))
	
		   {
		   //Extract data
			extract($row1);

			$userid=$userid;

		   }

		   
			
		   $valid= checkpass($userformname[1],$password,$userid);

		   if($valid){

			$stmt3 = $this->db_con->prepare("SELECT * FROM `$tbname` where `userid`=:userid");
			$stmt3->bindParam(":userid",$userid);
			$stmt3->execute();
			$count3 = $stmt3->rowCount();
			
			$p=1;
			$temp3=$prefixx.'_fullname';
			global $$temp3;
			$$temp3='';

			while($row3=$stmt3->fetch(PDO::FETCH_ASSOC))
			
			{
			//Extract data
			@extract($row3);

			 $temp1=$prefixx.'userid';
			 global $$temp1;

			 $$temp1=$userid;
			
			$temp=$prefixx.$key_name;
			global $$temp;
			
			$$temp=$key_value;

		
				
				
			if(strpos(strtolower($key_name), 'saluatation') !== false) {
			
			
   
				$$temp3=$$temp3.' '.$key_value;
			
				
			

		   }

			if (strpos(strtolower($key_name), 'name') !== false) {

			

				if($p=='1'){
				$temp2=$prefixx.'username';
				global $$temp2;
   
				$$temp2=$key_value;

				$p++;

				}
			
				$$temp3=$$temp3.' '.$key_value;
				
				
			}
			if (strpos(strtolower($key_name), 'org') !== false) {

			

				
				$temp4=$prefixx.'organization';
				global $$temp4;
   
				$$temp4=$key_value;

				
				
				
			}

			
		}
		
		   return true;
		   
			 
		   }else{

			return false;
		   }

			
		
			
		}
	}





/*****Logout For Admin*****/

public  function logout($cookiename1,$cookiename2)

{







$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
        setcookie($cookiename1,"",-1,'/', $domain, FALSE, FALSE);
        setcookie($cookiename2,"",-1,'/', $domain, FALSE, FALSE);



return true;


}


public  function deletecontent($img,$tbname,$sourceid,$field_name=Null)

{

	$this->config();
	$tbname=base64_decode($tbname);
	$sourceid=base64_decode($sourceid);

	if($img=='1'){


	
		$stmt5 = $this->db_con->prepare("SELECT * FROM $tbname where id=:sourceid");
		$stmt5->bindParam(":sourceid",$sourceid);
								$stmt5->execute();
		
								 while($row5=$stmt5->fetch(PDO::FETCH_ASSOC))
										 {
		
													extract($row5);
		
													$image=$$field_name;
		
		
												//Delete image from disk
											 //fetch image file
		
													$imgfile1=  basename($image);
		
		
													//echo $imgfile;
												 //fetch image folder
												 $folder1= end(explode('/',dirname($image)));
		
												 //echo $folder;
												//delete image from image folder
		
		
		
		
		
		
										 }
		
		
		
		
		
		unlink($path.'/exec/'.$folder1.'/'.$imgfile1);
		}

	$stmtx = $this->db_con->prepare("DELETE FROM `$tbname` WHERE `id`=:sourceid");


    
	$stmtx->bindParam(":sourceid",$sourceid);
		 
	
	
	
	if($stmtx->execute()){



		return true;
	}else{

return false;
	}





}
public function getcategory($sourceid,$tablename)

{

	$this->config();


	$stmtx = $this->db_con->prepare("SELECT * FROM `$tablename` WHERE `id`=:sourceid");


    
	$stmtx->bindParam(":sourceid",$sourceid);
		 
	
	
	
	if($stmtx->execute()){

		

		while($row5=$stmtx->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row5);

						   $cattitle=$title;



				}

if(empty($cattitle)){

	$cattitle='';
}
		return $cattitle;
	}else{

return false;
	}





}




// Compress image
public  function compressedImage($source, $path, $quality) {

	$info = getimagesize($source);

	if ($info['mime'] == 'image/jpeg') 
		$image = imagecreatefromjpeg($source);

	elseif ($info['mime'] == 'image/gif') 
		$image = imagecreatefromgif($source);

	elseif ($info['mime'] == 'image/png') 
		$image = imagecreatefrompng($source);

	imagejpeg($image, $path, $quality);

}

/**Remove Get Parameter */

 public  function removeParam($url, $param) {
	$url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*$/', '', $url);
	$url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*&/', '$1', $url);
	return $url;
  }
  
 public  function redirect($status=null){
  
	$url1=$_SERVER['HTTP_REFERER'];
  
  $actual_url=$this->removeParam($url1,'status');
  
  
  
  if($status==null){
  
	$lastst='';
  }else{
  
	$lastst='status='.$status;
  }
  
  $actual_url .= (parse_url($actual_url, PHP_URL_QUERY) ? '&' : '?') . $lastst;
  
  
	
  header('location:'.$actual_url);
  exit();
  
  }

// public  function to get the client IP address
public  function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
//convert timestamp to days hour, seconds
public  function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


//**Stars */

public  function starRating($rating){

	$starNumber =$rating;

	if($starNumber=='0'){

		echo '<div class="rating" style="font-size: 16px;margin-left: 0px;float: unset;"><label>';
		for( $x1 = 0; $x1 < 5; $x1++ )
		{

			echo '<li><span class="icon"><i class="fas fa-star"></i></span></li>';
		}
		echo '</label></div>';

	}else{
    //Rating should be from 1-10. This public  function will produce a 5 star rating with half-stars
	for( $x = 0; $x < 5; $x++ )
	{
		if( floor( $starNumber )-$x >= 1 )
		{ echo '<li><i class="fas fa-star"></i></li>'; }
		elseif( $starNumber-$x > 0 )
		{ echo '<li><i class="fas fa-star-half"></i></li>'; }
		else
		{ echo '<li><i class="fas fa-star"></i></li>'; }
	}

}
}

//**Delete image */

public  function delimage($imageid,$typex,$tbname,$fieldname){

	global $imgreturn;


$this->config();

	


	$stmt5 = $this->db_con->prepare("SELECT * FROM $tbname where id=:sourceid");
	$stmt5->bindParam(":sourceid",$imageid);
							$stmt5->execute();

							 while($row5=$stmt5->fetch(PDO::FETCH_ASSOC))
									 {

												extract($row5);

                                                $content=$$fieldname;
                                               
											//Delete image from disk
										 //fetch image file

												$contentx=  basename($content);
												
											

												//echo $imgfile;
											 //fetch image folder
											
											 
												//echo $imgfile;
											 //fetch image folder
											 @$folder1= end(explode('/',dirname($content)));
                                            
											 //echo $folder;
											//delete image from image folder





									 }

									 if($typex=='empty'){

										$imgreturn=$content;
										return true;

										echo 'yes';
									
									}else{
														unlink($path.'/exec/'.$folder1.'/'.$contentx);
														return true;
									
									}
}
//**Delete image */



public function filter ( $request, $columns, &$bindings )

  
{

   

	$globalSearch = array();
	$columnSearch = array();
	$dtColumns = $this->pluck( $columns, 'dt' );

	if ( isset($request['search']) && $request['search']['value'] != '' ) {
		$str = $request['search']['value'];

		for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
			$requestColumn = $request['columns'][$i];
			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
			$column = $columns[ $columnIdx ];

			if ( $requestColumn['searchable'] == 'true' ) {
				if(!empty($column['db'])){
					$binding = $this->bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
					$globalSearch[] = "`".$column['db']."` LIKE ".$binding;
				}
			}
		}
	}

	// Individual column filtering
	if ( isset( $request['columns'] ) ) {
		for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
			$requestColumn = $request['columns'][$i];
			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
			$column = $columns[ $columnIdx ];

			$str = $requestColumn['search']['value'];

			if ( $requestColumn['searchable'] == 'true' &&
			 $str != '' ) {
				if(!empty($column['db'])){
					$binding = $this->bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
					$columnSearch[] = "`".$column['db']."` LIKE ".$binding;
				}
			}
		}
	}

	// Combine the filters into a single string
	$where = '';

	if ( count( $globalSearch ) ) {
		$where = '('.implode(' OR ', $globalSearch).')';
	}

	if ( count( $columnSearch ) ) {
		$where = $where === '' ?
			implode(' AND ', $columnSearch) :
			$where .' AND '. implode(' AND ', $columnSearch);
	}

	if ( $where !== '' ) {
		$where = 'WHERE '.$where;
	}

	return $where;
}




public function bind ( &$a, $val, $type )
{
	$key = ':binding_'.count( $a );

	$a[] = array(
		'key' => $key,
		'val' => $val,
		'type' => $type
	);

	return $key;
}



public function pluck ( $a, $prop )
{
	$out = array();

	for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
		 if ( empty($a[$i][$prop]) && $a[$i][$prop] !== 0 ) {
			continue;
		}

		//removing the $out array index confuses the filter method in doing proper binding,
		//adding it ensures that the array data are mapped correctly
		$out[$i] = $a[$i][$prop];
	}

	return $out;
}


public function _flatten ( $a, $join = ' AND ' )
{
	if ( ! $a ) {
		return '';
	}
	else if ( $a && is_array($a) ) {
		return implode( $join, $a );
	}
	return $a;
}

public  function fetchdata($request,$primaryKey,$query,$table,$columns,$draw,$querywhere=null,$blob_column_name=null){


$this->config();

	
$bindings = array();

$where=$this->filter($request,$columns,$bindings);

if($querywhere!=null){

$initialwherequery='Where'.$querywhere;


if(!empty($where)){

	$initialwherequery2='AND'.$querywhere;
}else{

	$initialwherequery2='Where'.$querywhere;

}


}else{

$initialwherequery='';
$initialwherequery2='';

}




             $stmt5d = $this->db_con->prepare("SELECT COUNT(`$primaryKey`) As recordsTotal  FROM  $table $initialwherequery  $query ");
              $stmt5d->execute();
              $number_of_rows = $stmt5d->fetchColumn(); 



              

		$row5=$this->sql_exec( $this->db_con, $bindings,"SELECT `".implode("`, `", $this->pluck($columns, 'db'))."`  FROM  `$table` $where $initialwherequery2 $query ",$blob_column_name);
             
	

		$resFilterLength = $this->sql_exec( $this->db_con, $bindings,
			"SELECT COUNT(`{$primaryKey}`)
			 FROM  `$table` $where $initialwherequery2 $query"
		);
		$recordsFiltered = $resFilterLength[0][0];
/*
               while($row5=$stmt5->fetch(PDO::FETCH_ASSOC))
                   {

                        extract($row5);
                        $data = array();

                       for($j=0;$j<count($columns);$j++){
                        
                        

                        $data[]=$row5[$columns[$j]['db']];

					   }
					   
					  
                        
                         $row[]=$data;
                        

                        
                         

				   }
				   
				    */


                




                  return json_encode(array(
    "draw"            => isset ( $draw ) ?
        intval( $draw ) :
        0,
    "recordsTotal"    => intval( $number_of_rows ),
    "recordsFiltered" => intval( $recordsFiltered ),
    "data"            => $this->data_output ( $columns, $row5 )
));



}

public function sql_exec ( $db, $bindings, $sql=null,$blob=null )
{

	$this->config();
	// Argument shifting
	if ( $sql === null ) {
		$sql = $bindings;
	}

	$stmt = $this->db_con->prepare( $sql );
	//echo $sql;

	// Bind parameters
	if ( is_array( $bindings ) ) {
		for ( $i=0, $ien=count($bindings) ; $i<$ien ; $i++ ) {
			$binding = $bindings[$i];
			$stmt->bindValue( $binding['key'], $binding['val'], $binding['type'] );
		}
	}

	// Execute
	try {
		$stmt->execute();
	}
	catch (PDOException $e) {
		echo( "An SQL error occurred: ".$e->getMessage() );
	}

	// Return all
	$rowsx= $stmt->fetchAll( PDO::FETCH_BOTH );

	
	for ( $i=0; $i<count($rowsx); $i++ ) {
	

		@$rowsx[$i][$blob]=base64_encode($rowsx[$i][$blob]);
	}


									

	return $rowsx;
}

public function data_output ( $columns, $data )
	{
		$out = array();

		for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
			$row = array();

			for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
				$column = $columns[$j];

				// Is there a formatter?
				if ( isset( $column['formatter'] ) ) {
                    if(empty($column['db'])){
                        $row[ $column['dt'] ] = $column['formatter']( $data[$i] );
                    }
                    else{
                        $row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
                    }
				}
				else {
                    if(!empty($column['db'])){
                        $row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
                    }
                    else{
                        $row[ $column['dt'] ] = "";
                    }
				}
			}

			$out[] = $row;
		}

		return $out;
	}


//***Clean String special chars and spaces */

public  function clean($string) {
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 }



 //**User Register */

 public  function userreg($values,$tbname){


$this->config();

	

$totl=count($values);
	

$today= date('Y-m-d H:i:s');


$stmt2r = $this->db_con->prepare("SELECT * FROM `$tbname` where `key_name`='userid' order by id desc limit 1");

$stmt2r->execute();
$count2r = $stmt2r->rowCount();

if($count2r>'0'){
while($row2r=$stmt2r->fetch(PDO::FETCH_ASSOC))

{
//Extract data
@extract($row2r);
@$lastuserid=$userid;

}

}else{

	$lastuserid='0';
}

$lastuserid++;


$stmt = $this->db_con->prepare("INSERT INTO `$tbname`(`userid`, `key_name`, `key_value`, `date`) VALUES ('$lastuserid', 'userid', '', '$today')");


if($stmt->execute()){

	$lid = $lastuserid;

	if($totl>'0'){
		foreach($values as $key=>$value)
		{

			

			$stmt2 = $this->db_con->prepare("SELECT * FROM `userform_tb` where `name`=:key");
			$stmt2->bindParam(":key",$key);

			$stmt2->execute();
			$count2 = $stmt2->rowCount();
			while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
			
			{
			//Extract data
			@extract($row2);
			@$locationid=$id;
	
   $duplicate=$duplicate;


			}

			if($duplicate=='1'){

				$stmt2x = $this->db_con->prepare("SELECT * FROM `$tbname` where `key_name`=:key and `key_value`=:value");
				$stmt2x->bindParam(":key",$key);
				$stmt2x->bindParam(":value",$value);
	
				$stmt2x->execute();
				$count2x = $stmt2x->rowCount();

				if($count2x>'0'){

					return $key.'exists';
				}


			}


			$stmt1 = $this->db_con->prepare("INSERT INTO `$tbname`(`userid`, `key_name`, `key_value`, `date`) VALUES (:lid, :key, :value, '$today')");

			$stmt1->bindParam(":key",$key);
			$stmt1->bindParam(":value",$value);
			$stmt1->bindParam(":lid",$lid);

			$stmt1->execute();

				

			
}

return true;

	}else{

		return false;
	}



}else{

	return false;
}



 }


 public  function checkpass($field_key,$value,$userid){

$this->config();

	


$today= date('Y-m-d H:i:s');



$stmt2 = $this->db_con->prepare("SELECT * FROM `user_tb` where `key_name`=:field_key AND `key_value`=:value AND `userid`=:userid");
$stmt2->bindParam(":value",$value);
$stmt2->bindParam(":field_key",$field_key);
$stmt2->bindParam(":userid",$userid);

$stmt2->execute();
$count2 = $stmt2->rowCount();

if($count2>'0'){

	return true;
}else{

	return false;
}



 }

 public  function rrmdir($dir) {
	if (is_dir($dir)) {
	  $objects = scandir($dir);
	  foreach ($objects as $object) {
		if ($object != "." && $object != "..") {
		  if (filetype($dir."/".$object) == "dir") 
			 rrmdir($dir."/".$object); 
		  else unlink   ($dir."/".$object);
		}
	  }
	  reset($objects);
	  rmdir($dir);
	}
   }


   //***Paypal Payment Gateway */


   public  function fetchpaypal()

{
    $path = str_replace('\\','/',dirname(__DIR__));

	
    
global $paypalemail;
global $paypalsandbox;
global $currency;
global $return_url;
global $cancel_url;
global $notify_url;

	$stmty = $this->db_con->prepare("SELECT * FROM paypal_tb");
$stmty->execute();
$county = $stmty->rowCount();

while($rowy=$stmty->fetch(PDO::FETCH_ASSOC))

{
//Extract data
@extract($rowy);
@$sourceid=$id;
$paypalemail=$email;
$sandbox=$sandbox;
$currency=$currency;
$return_url=$return_url;
$cancel_url=$cancel_url;
$notify_url=$notify_url;



if($sandbox=='0'){

    $paypalsandbox='false';
}
elseif($sandbox=='1'){

    $paypalsandbox='true';
}

}





/* 
 * PayPal and database configuration 
 */ 
  
  //customerservice@britex.com
 
  if(@$paypalsandbox=='0'){
      
	@$paypal='false';
}elseif(@$paypalsandbox=='1'){
	
	 @$paypal='true';
}
// PayPal configuration 
define('PAYPAL_ID', @$paypalemail); //insert paypal buisness email
define('PAYPAL_SANDBOX', @$paypal); //TRUE or FALSE 

define('PAYPAL_RETURN_URL', @$return_url); 
define('PAYPAL_CANCEL_URL', @$cancel_url); 
define('PAYPAL_NOTIFY_URL', @$notify_url); 
define('PAYPAL_CURRENCY', @$currency); 




// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

return true;

}


public  function geninfo(){

$this->config();

	

	$stmt21 = $this->db_con->prepare("SELECT * FROM `info_tb`");


$stmt21->execute();

while($row21=$stmt21->fetch(PDO::FETCH_ASSOC))

{
//Extract data
@extract(@$row21);
 @$secid2=@$id;

 global $$field_name;
@$$field_name=@$field_value;

}

return true;

}

public  function genorg(){

	global $adminemail;
	global $adminwebmail;
	global $adminmarketingmail;
	global $adminphone;
	global $adminaddress;
	global $adminpost_code;
	global $admincity;
	global $admincountry;

$this->config();

	

	$stmt21 = $this->db_con->prepare("SELECT * FROM `organizer_tb`");


$stmt21->execute();

while($row21=$stmt21->fetch(PDO::FETCH_ASSOC))

{
//Extract data
@extract(@$row21);
 @$secid2=@$id;

@$adminemail=@$email;
$adminwebmail=$webmail;
$adminmarketingmail=$marketingmail;
$adminphone=$phone;
$adminaddress=$address;
$adminpost_code=$post_code;
$admincity=$city;
$admincountry=$country;


}

return true;

}

//***convert to st,nd */

public  function ordinal($number) {
	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
	if ((($number % 100) >= 11) && (($number%100) <= 13))
		return $number. 'th';
	else
		return $number. $ends[$number % 10];
}


public  function gallery($img_url,$img_caption){

$this->config();

	

	$abpathy=str_replace('/admin', '', $path);

	// Assume this URL for $download_image from your CSV
$download_image = $img_url;
$image_id = $img_caption;

// Store the original filename
$original_name = basename($download_image); // "img1.jpg"
// Original extension by string manipulation
$original_extension = substr($original_name, strrpos($original_name, '.')); // ".jpg"

// An array to match mime types from finfo_file() with extensions
// Use of finfo_file() is recommended if you can't trust the input
// filename's extension
$types = array(
  'image/jpeg' => '.jpg',
  'image/png' => '.png',
  'image/gif' => '.gif'
  // Other types as needed...
);

// Get the file and save it
$img = file_get_contents($download_image);
$stored_name = $abpathy.'/gallery/' . $image_id . $original_extension;
if ($img) {
  file_put_contents($stored_name, $img);

  // Get the filesize if needed
  $size = filesize($stored_name);

  // If you don't care about validating the mime type, skip all of this...
  // Check the file information
  $finfo = finfo_open(FILEINFO_MIME_TYPE);
  $mimetype = finfo_file($finfo, $stored_name);

  // Lookup the type in your array to get the extension
  if (isset($types[$mimetype])) {
    // if the reported type doesn't match the original extension, rename the file
    if ($types[$mimetype] != $original_extension) {
      rename($stored_name, $abpathy.'/gallery/' . $image_id . $types[$mimetype]);
    }
  }
  else {
    return false;
  }
  finfo_close($finfo);

  return true;
}
else {
  
	return false;
}
}

public  function roundstatus($r_name,$sec_id,$club_id){

$this->config();

	
global $roundname;
global $r_status;
	$stmt21 = $this->db_con->prepare("SELECT * FROM `round_tb` Where `round_name` LIKE '%$r_name%' and `section`='$sec_id' and `club`='$club_id'");


$stmt21->execute();

while($row21=$stmt21->fetch(PDO::FETCH_ASSOC))

{
//Extract data
@extract(@$row21);
 @$rid2=@$id;

 $roundname=$round_name;
@$r_status=@$status;

}

return true;

}


}


$classhelper=new Main();


?>