<?php
// session_start();
// define('DB_SERVER','localhost');
// define('DB_USER','root');
// define('DB_PASS' ,'');
// define('DB_NAME', 'address_book');
// define('charset', 'utf8mb4');

$connect_first = new PDO("mysql:host=localhost;charset=utf8mb4", "maxihea6_invoice_user", "z*V5308yH0I^");

					try { 
					$connect_first->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					    // echo "Connected successfully"; 
					    }
					catch(PDOException $e)
					    {
					    echo "Connection failed: " . $e->getMessage();

					    }


// setting set up a database automatcally
					    	$qry="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'maxihea6_invoice'";
					    	$sta=$connect_first->prepare($qry);
  
  							$sta->execute();
  
    						$result_database_count = $sta->fetchAll();
    						$count_resuit_database=count($result_database_count);
    						if ($count_resuit_database>0) {
    							$connect = new PDO("mysql:host=localhost;dbname=maxihea6_invoice;charset=utf8mb4", "maxihea6_invoice_user", "z*V5308yH0I^");

											try { 
											$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											    // echo "Connected successfully"; 
											    }
											catch(PDOException $e)
											    {
											    echo "Connection failed: " . $e->getMessage();

											    }

											    $qry = "CREATE TABLE IF NOT EXISTS admin (
															    `id` int(11) NOT NULL AUTO_INCREMENT,
															  `firstname` varchar(255) DEFAULT NULL,
															 
															  `email` varchar(255) DEFAULT NULL,
															 
															  `cat` varchar(255) DEFAULT 'admin',
															  
															  `password` varchar(255) DEFAULT NULL,  PRIMARY KEY (`id`)
															 
															  )";


 															$sta=$connect->prepare($qry);
						  									$sta->execute();
$qry="SELECT*from admin";
$sta=$connect->prepare($qry);
$sta->execute();	
$result_admin_table = $sta->fetchAll();
 $count_admin_table=count($result_admin_table);
 	if ($count_admin_table>0) {

 	}else{
			$qry = "INSERT INTO `admin` ( `firstname`, `email`,  `cat`,  `password`) VALUES
			( 'Akee',  'Neeyee@gmail.com',  'admin',  '\$2y\$10\$ODqLv7ggLoDZKCxNQ3WQ7.6HeLr36FkixspFgU3UYGBdq942PWKe.')";
			$sta=$connect->prepare($qry);
			$sta->execute();
	}
 $qry = "CREATE TABLE IF NOT EXISTS book_sheet (

  `uid` int(11) NOT NULL AUTO_INCREMENT,
	`firstname` varchar(255) DEFAULT NULL,
	`lastname` varchar(255) DEFAULT NULL,
	
	`dob` varchar(255) DEFAULT NULL,
	`gender` varchar(255) DEFAULT NULL,	
	`street` varchar(255) DEFAULT NULL,	
	`house_number` varchar(255) DEFAULT NULL,	
	`zip_code` varchar(255) DEFAULT NULL,
	`city` varchar(255) DEFAULT NULL,
	`country` varchar(255) DEFAULT NULL,
	`mobile_number` varchar(255) DEFAULT NULL,	
	`phone_number` varchar(255) DEFAULT NULL,	 
	`email` varchar(255) DEFAULT NULL,
	`instant_id` varchar(255) DEFAULT NULL,					 
	`family_id` varchar(255) DEFAULT null,														  
	`family_rep` varchar(255) DEFAULT NULL,
	`upload_set` varchar(255) DEFAULT NULL,
	`year` int(11) DEFAULT NULL,  PRIMARY KEY (`uid`)
											)";
 $sta=$connect->prepare($qry);
$sta->execute();

 $qry = "CREATE TABLE IF NOT EXISTS family (

  `family_id` int(11) NOT NULL AUTO_INCREMENT,
	`family_rep` int(11) DEFAULT NULL,
	`family_name` varchar(255) DEFAULT NULL,
	`email_rep` varchar(255) DEFAULT NULL,
					 
															  
	  PRIMARY KEY (`family_id`)
	)";
 $sta=$connect->prepare($qry);
$sta->execute();

// setting set up a database automatcally ended




											    
class DB_con
{
	public $message_type;
	public $connect;
	public $output;
	public $count_rep;

// error msg 

	function set_count($count) {
    $this->count = $count;
  }
  	public  function set_msg_type_and_msg($message_type) {
    		 $this->message_type = $message_type;
    		 return $this->message_type;
  						}
  	 				

	public function log_in($email,$password,$connect)
	{

		$qry="SELECT*from admin where email=:email";
		$sta=$connect->prepare($qry);
		$sta->bindParam(":email",$email);
		$sta->execute();	
		$result_login_table = $sta->fetchAll();
		$count_login_table=count($result_login_table);

		if ($count_login_table>0) {
			
 				

				    foreach($result_login_table as $row)
				    {
			
				      if(password_verify($password, $row["password"]))
					      {

$_SESSION['userid']=$row["id"];
$_SESSION["cat"]="admin";


					      		return true;
					      }else{


					      		return false;
					      }

				  	}

								}else{

									return false;
								}
	}

	public function reset_password_in($hash,$id,$connect)
	{
		
		$qry = "UPDATE admin  set password=:hash where id=:id";

        $sta=$connect->prepare($qry);
         $sta->bindParam(":id",$id);
         $sta->bindParam(":hash",$hash);
         $sta->execute();
         if($sta->execute())
					      {
					      		return true;
					      }else{


					      		return false;
					      }

	}

	public function list_family($connect)
	{
		
		$qry="SELECT *from family ";
		$sta=$connect->prepare($qry);
		
		$sta->execute();	
		$result_family_table = $sta->fetchAll();
		$count_family_table=count($result_family_table);
		if ($count_family_table>0) {
			// code...
			return $result_family_table;
		}else{
			return false;
		}

	}



	public function insert_address($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$family_unit,$fam,$connect)
	{

		
		$qry="SELECT * from book_sheet where firstname=:firstname and lastname=:lastname";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":firstname",$firstname);
         $sta->bindParam(":lastname",$lastname);
		$sta->execute();	
		$result_name = $sta->fetchAll();
		$count_name=count($result_name);
		if ($count_name>0) {
			// code...
			$output="Name already exists";
		}else{
			$qry="SELECT * from book_sheet where email=:email";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":email",$email);
        
		$sta->execute();	
		$result_email = $sta->fetchAll();
		$count_email=count($result_email);
		if ($count_name>0) {
			$output="Email already exists";
		}else{
			$qry="INSERT INTO book_sheet (firstname,lastname,dob,gender,street,house_number,zip_code,city,country,mobile_number,phone_number,email,instant_id) VALUES(:firstname,:lastname,:dob,:gender,:street,:house_number,:zip_code,:city,:country,:mobile_number,:phone_number,:email,:instant_id)";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":firstname",$firstname);
         $sta->bindParam(":lastname",$lastname);
         $sta->bindParam(":dob",$dob);
          $sta->bindParam(":gender",$gender);
           $sta->bindParam(":street",$street);
            $sta->bindParam(":house_number",$house_number);
             $sta->bindParam(":zip_code",$zip_code);
              $sta->bindParam(":city",$city);
               $sta->bindParam(":country",$country);
                $sta->bindParam(":mobile_number",$mobile_number);
                 $sta->bindParam(":phone_number",$phone_number);
                  $sta->bindParam(":email",$email);
                   $sta->bindParam(":instant_id",$instant_id);
                   if ($sta->execute()) {
                   	$last_id = $connect->lastInsertId();

$family_name=$lastname." ".$firstname;
// var_dump($family_unit==""and $fam=="NO");
// die();
                   	if ($family_unit==""and $fam=="NO") {
                   		$qry = "UPDATE book_sheet  set family_id=:family_id where uid=:id";

					        $sta=$connect->prepare($qry);
					         $sta->bindParam(":id",$last_id);
					         $sta->bindParam(":family_id",$last_id);
					         $sta->execute();
                   		// code...
                   		$qry="INSERT INTO family (family_name,family_rep) VALUES(:family_name,:family_rep)";
						$sta=$connect->prepare($qry);
						 $sta->bindParam(":family_name",$family_name);
				         $sta->bindParam(":family_rep",$last_id);
				         $sta->execute();
				         $output="Okay";
                   	}else{
                   	if ($family_unit=="Not Present") {
                   		$qry = "UPDATE book_sheet  set family_id=:family_id where uid=:id";

					        $sta=$connect->prepare($qry);
					         $sta->bindParam(":id",$last_id);
					         $sta->bindParam(":family_id",$last_id);
					         $sta->execute();
                   		
                   		$qry="INSERT INTO family (family_name,family_rep) VALUES(:family_name,:family_rep)";
						$sta=$connect->prepare($qry);
						 $sta->bindParam(":family_name",$family_name);
				         $sta->bindParam(":family_rep",$last_id);
				         $sta->execute();
				         $output="Okay";
                   	
                   	}else{

$qry = "UPDATE book_sheet  set family_id=:family_id where uid=:uid";
  $sta=$connect->prepare($qry);
$sta->bindParam(":uid",$last_id);
$sta->bindParam(":family_id",$family_unit);
$sta->execute();
   $output="Okay";
// $family_rep=$firstname." ".$lastname;
// $qry="INSERT INTO family (`family_rep`,`family_id`) VALUES(':family_rep',':family_id')";
// $sta=$connect->prepare($qry);
// $sta->bindParam(":family_rep",$family_rep);
// $sta->bindParam(":family_id",$last_id);
// $sta->execute();
                   	}
                   }

									                  }else{

									                   }
		
		}
		}
		return $output;


	}



 

public function arrange_book_sheet($connect)
	{
		
		$qry="SELECT *from book_sheet where upload_set='1' order by year ASC";
		$sta=$connect->prepare($qry);
		
		$sta->execute();	
		$result_family_table = $sta->fetchAll();
		$count_family_table=count($result_family_table);
		if ($count_family_table>0) {
			// code...


			foreach ($result_family_table as $row) {
				// code...
$uid[]=$row['uid'];
$house_number[]=$row['house_number'];


	
	

			}

			$join_result=array_combine($uid,$house_number);
			$result_fianl=array_unique($join_result);

			// var_dump($result_fianl);
			// die();
			 foreach ($result_fianl as $key => $value) {
			 	$qry="SELECT *from book_sheet where house_number=:house_number  and uid=:uid and upload_set='1'";
		$sta=$connect->prepare($qry);
		$sta->bindParam(":uid",$key);
         $sta->bindParam(":house_number",$value);
		$sta->execute();	
		$result_family_table = $sta->fetchAll();
		foreach ($result_family_table as $row) {

			$family_name= $row['lastname']." ".$row['firstname'];



			$qry="INSERT INTO family (family_name,family_rep) VALUES(:family_name,:family_rep)";
						$sta=$connect->prepare($qry);
						 $sta->bindParam(":family_name",$family_name);
				         $sta->bindParam(":family_rep",$row['uid']);
				         $sta->execute();
				         $qry = "UPDATE book_sheet  set upload_set='',family_id=:family_id where street=:street and  house_number=:house_number and upload_set='1'";
  $sta=$connect->prepare($qry);
$sta->bindParam(":street",$row['street']);
$sta->bindParam(":family_id",$row['uid']);
 $sta->bindParam(":house_number",$row['house_number']);
$sta->execute();


//   $qry = "UPDATE book_sheet  set upload_set='' where  upload_set='1'";
//   $sta=$connect->prepare($qry);

// $sta->execute();

				
			}	

			
         


			 }

			// return $result_family_table;
		}else{
			return false;
		}

	}

  





public function upload_excel_file($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$dob_year,$upload_set,$connect)
	{

		
		$qry="SELECT * from book_sheet where firstname=:firstname and lastname=:lastname";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":firstname",$firstname);
         $sta->bindParam(":lastname",$lastname);
		$sta->execute();	
		$result_name = $sta->fetchAll();
		$count_name=count($result_name);
		if ($count_name>0) {
			// code...
			$output="Name already exists ".$firstname." ".$lastname."";
		}else{
			$qry="SELECT * from book_sheet where email=:email";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":email",$email);
        
		$sta->execute();	
		$result_email = $sta->fetchAll();
		$count_email=count($result_email);
		if ($count_name>0) {
			$output="Email already exists ".$email."";
		}else{
			$qry="INSERT INTO book_sheet (firstname,lastname,dob,gender,street,house_number,zip_code,city,country,mobile_number,phone_number,email,instant_id,upload_set,year) VALUES(:firstname,:lastname,:dob,:gender,:street,:house_number,:zip_code,:city,:country,:mobile_number,:phone_number,:email,:instant_id,:upload_set,:year)";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":firstname",$firstname);
         $sta->bindParam(":lastname",$lastname);
         $sta->bindParam(":dob",$dob);
          $sta->bindParam(":gender",$gender);
           $sta->bindParam(":street",$street);
            $sta->bindParam(":house_number",$house_number);
             $sta->bindParam(":zip_code",$zip_code);
              $sta->bindParam(":city",$city);
               $sta->bindParam(":country",$country);
                $sta->bindParam(":mobile_number",$mobile_number);
                 $sta->bindParam(":phone_number",$phone_number);
                  $sta->bindParam(":email",$email);
                   $sta->bindParam(":instant_id",$instant_id);
                    $sta->bindParam(":upload_set",$upload_set);
                     $sta->bindParam(":year",$dob_year);
                   $sta->execute();
	$last_id = $connect->lastInsertId();
                   $qry = "UPDATE book_sheet  set family_id=:family_id where uid=:uid";
  $sta=$connect->prepare($qry);
$sta->bindParam(":uid",$last_id);
$sta->bindParam(":family_id",$last_id);
$sta->execute();


$family_name= $lastname." ".$firstname;



			$qry="INSERT INTO family (family_name,family_rep,email_rep) VALUES(:family_name,:family_rep,:email)";
						$sta=$connect->prepare($qry);
						 $sta->bindParam(":family_name",$family_name);
				         $sta->bindParam(":family_rep",$last_id);
				          $sta->bindParam(":email",$email);
				         $sta->execute();
                   
				         $output="Okay";
				     }

						
		
		}
		return $output;

		}


public function check_data_exist($connect,$email)
	{
		
		$qry="SELECT *from book_sheet where email=:email";
		$sta=$connect->prepare($qry);
		$sta->bindParam(":email",$email);
		$sta->execute();	
		$result_family_table = $sta->fetchAll();
		$count_family_table=count($result_family_table);
		if ($count_family_table>0) {
			// code...
return true;


}else{
	return false;
}
}



public function upload_excel_existing_family_rep($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$dob_year,$upload_set,$uid,$connect)
	{

		
		
$family_name=$lastname." ".$firstname;


			$qry="INSERT INTO family (family_name,family_rep,email_rep) VALUES(:family_name,:family_rep,:email)";
						$sta=$connect->prepare($qry);
						 $sta->bindParam(":family_name",$family_name);
				         $sta->bindParam(":family_rep",$uid);
				          $sta->bindParam(":email",$email);
				         $sta->execute();
                   
				         $output="Okay";
				     

						
		
		
		return $output;

		}





		public function upload_family_table($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$dob_year,$key,$connect)
	{

	// var_dump('jjj');	
		
$qry="INSERT INTO book_sheet (firstname,lastname,dob,gender,street,house_number,zip_code,city,country,mobile_number,phone_number,email,instant_id,family_id,year) VALUES(:firstname,:lastname,:dob,:gender,:street,:house_number,:zip_code,:city,:country,:mobile_number,:phone_number,:email,:instant_id,:family_id,:year)";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":firstname",$firstname);
         $sta->bindParam(":lastname",$lastname);
         $sta->bindParam(":dob",$dob);
          $sta->bindParam(":gender",$gender);
           $sta->bindParam(":street",$street);
            $sta->bindParam(":house_number",$house_number);
             $sta->bindParam(":zip_code",$zip_code);
              $sta->bindParam(":city",$city);
               $sta->bindParam(":country",$country);
                $sta->bindParam(":mobile_number",$mobile_number);
                 $sta->bindParam(":phone_number",$phone_number);
                  $sta->bindParam(":email",$email);
                   $sta->bindParam(":instant_id",$instant_id);
                    $sta->bindParam(":family_id",$key);
                     $sta->bindParam(":year",$dob_year);
                   $sta->execute();
                    $output="Okay1";
                    return $output;
                    // var_dump($output);


		}
		

	







public function list_address_book($connect,$end,$start)
	{


 $end_end=$end-$start;
$qry="SELECT * from book_sheet INNER JOIN family  where book_sheet.family_id=family.family_rep   ";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep1=$stat->rowCount();



$qry="SELECT * from book_sheet INNER JOIN family  where family.family_rep=book_sheet.family_id  order by  family.family_name ASC,book_sheet.year DESC  limit ".$start." , ".$end_end."";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep=$stat->rowCount();

if ($count_rep > 0) {
  $resu=$stat->fetchall();
  $resu_in=array_unshift($resu,$count_rep1);

  
  

 // return $count_rep;
 return $resu;
}else{
return false;
}

// $apple->set_count($count_rep);
// function get_count($count) {
//     return $this->count;
//   }
}



public function list_address_book_print_layout($connect)
	{



$qry="SELECT * from book_sheet INNER JOIN family  where book_sheet.family_id=family.family_rep   ";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep1=$stat->rowCount();



$qry="SELECT * from family  order by family_name  ASC";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep=$stat->rowCount();

if ($count_rep > 0) {
	$no=0;
  $resu=$stat->fetchall();
  foreach ($resu as $row) {
  	
  	$qry="SELECT * from book_sheet where family_id=:family_rep order by year DESC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family=$sta->fetchall();
$count_trap_line=count($result_family);
echo'<div class="content-wrapper">




';

foreach ($result_family as $row1) {
// <h5>". $no .". &nbsp; &nbsp;".$row1['lastname']." ".$row1['firstname']."
	$no++;
	
		echo "
<div  class='lay_out' >
		<div class='other_row1'>
<img src='image/pic.jpg' class='icon1' >
		
		

		
		<div class='text_div'><h5>".$row1['lastname']." ".$row1['firstname']."
					<br>
					".$row1['dob']."</h5></div>
					</div>

					<div class='other_row1'>

<img src='image/home.png' class='icon' ><div class='text_div'><h5> ".$row1['house_number'].",".$row1['street'].",".$row1['zip_code'].",".$row1['city'].",".$row1['country']."
					</h5></div>
					</div>


					<div class='other_row1'>

<img src='image/email.png' class='icon' ><div class='text_div'><h5> ".$row1['email']."
					</h5></div>
					</div>

					<div class='other_row1'>

<img src='image/messager.png' class='icon' ><div class='text_div'><h5> ".$row1['instant_id']."
					</h5></div>
					</div>
</div>
		";
		
		if ($no==$count_trap_line) {
			echo"<hr>";
			$no=0;
		}
// 	}else{

// echo "
// <div  class='lay_out' style='border-bottom:1px solid black;'>
// 		<div class='other_row1'>
// <img src='image/pic.jpg' class='icon1' >
		
		

		
// 		<div class='text_div'><h5>".$row1['lastname']." ".$row1['firstname']."
// 					<br>
// 					".$row1['dob']."</h5></div>
// 					</div>

// 					<div class='other_row1'>

// <img src='image/home.png' class='icon' ><div class='text_div'><h5> ".$row1['house_number'].",".$row1['street'].",".$row1['zip_code'].",".$row1['city'].",".$row1['country']."
// 					</h5></div>
// 					</div>


// 					<div class='other_row1'>

// <img src='image/email.png' class='icon' ><div class='text_div'><h5> ".$row1['email']."
// 					</h5></div>
// 					</div>

// 					<div class='other_row1'>

// <img src='image/messager.png' class='icon' ><div class='text_div'><h5> ".$row1['instant_id']."
// 					</h5></div>
// 					</div>
// </div>
// 		";
// 	}
	
}

  }

  
  

 // return $count_rep;
 // return $resu;
}else{
return false;
}
echo'</div>';
// $apple->set_count($count_rep);
// function get_count($count) {
//     return $this->count;
//   }
}

public function csv_family_rep($connect)
	{
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=family_rep.csv');
$qry="SELECT firstname,lastname,dob,gender,street,house_number,zip_code,city,country,mobile_number,phone_number,email,instant_id,uid from book_sheet INNER JOIN family  where family.family_rep=book_sheet.family_id   GROUP by book_sheet.family_id  order by family.family_id, book_sheet.lastname,book_sheet.year ";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep=$stat->rowCount();

if ($count_rep > 0) {
  // $resu=$stat->fetchall(PDO::FETCH_ASSOC);
  $fp = fopen('php://output', 'w');

// first set
$first_row = $stat->fetchall(PDO::FETCH_ASSOC);

// var_dump($first_row[0]);
// die(PDO::FETCH_ASSOC);

$headers = ['First name.','Last name', 'Date of brith', 'Gender','Street',' House number','Zip code','City','Country','Mobile number','Phone Number','Email','Instant message ID','Key(DO NOT EDIT)'];

fputcsv($fp, $headers); // put the headers

for ($i=0; $i < $count_rep; $i++) { 
	// code...
	$tt=array_values($first_row[$i]);
	fputcsv($fp, $tt); // put the first row
}
fclose($fp);

  
  

 // return $count_rep;
 
}else{
return false;
}
}



public function csv_family($connect)
	{
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=family.csv');
$qry="SELECT firstname,lastname,dob,gender,street,house_number,zip_code,city,country,mobile_number,phone_number,email,instant_id,book_sheet.family_id from book_sheet INNER JOIN family  where family.family_rep=book_sheet.family_id     order by  family.family_id,book_sheet.lastname,book_sheet.year ";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep=$stat->rowCount();

if ($count_rep > 0) {
  // $resu=$stat->fetchall(PDO::FETCH_ASSOC);
  $fp = fopen('php://output', 'w');

// first set
$first_row = $stat->fetchall(PDO::FETCH_ASSOC);

// var_dump($first_row[0]);
// die(PDO::FETCH_ASSOC);

$headers = ['First name.','Last name', 'Date of brith', 'Gender','Street',' House number','Zip code','City','Country','Mobile number','Phone Number','Email','Instant message ID','Key(DO NOT EDIT)'];

fputcsv($fp, $headers); // put the headers

for ($i=0; $i < $count_rep; $i++) { 
	// code...
	$tt=array_values($first_row[$i]);
	fputcsv($fp, $tt); // put the first row
}
fclose($fp);

  
  

 // return $count_rep;
 
}else{
return false;
}
}




	public function list_individual_data($uid,$connect)
	{

		
		$qry="SELECT * from book_sheet where uid=:uid";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":uid",$uid);
        
		$sta->execute();	
		$result_name = $sta->fetchAll();
		$count_name=count($result_name);
		// var_dump($result_name);
		// die();
		if ($count_name>0) {
return $result_name;


			}
		}








		public function update_address($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$family_unit,$uid,$connect)
	{
			$qry="UPDATE book_sheet set firstname=:firstname,lastname=:lastname,dob=:dob,gender=:gender,street=:street,house_number=:house_number,zip_code=:zip_code,city=:city,country=:country,mobile_number=:mobile_number,phone_number=:phone_number,email=:email,instant_id=:instant_id where uid=:uid";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":firstname",$firstname);
         $sta->bindParam(":lastname",$lastname);
         $sta->bindParam(":dob",$dob);
          $sta->bindParam(":gender",$gender);
           $sta->bindParam(":street",$street);
            $sta->bindParam(":house_number",$house_number);
             $sta->bindParam(":zip_code",$zip_code);
              $sta->bindParam(":city",$city);
               $sta->bindParam(":country",$country);
                $sta->bindParam(":mobile_number",$mobile_number);
                 $sta->bindParam(":phone_number",$phone_number);
                  $sta->bindParam(":email",$email);
                   $sta->bindParam(":instant_id",$instant_id);
                   $sta->bindParam(":uid",$uid);
                   if ($sta->execute()) {
                   	
                   	if ($family_unit=="Not Present") {
                   		$qry = "UPDATE book_sheet  set family_id=:family_id where uid=:id";

					        $sta=$connect->prepare($qry);
					         $sta->bindParam(":id",$uid);
					         $sta->bindParam(":family_id",$uid);
					         $sta->execute();
					         $qry="SELECT * from family  where family_rep=:family_rep  ";
$stat=$connect->prepare($qry);
$stat->bindParam(":family_rep",$uid);
$stat->execute();
$count=$stat->rowCount();
if ($count > 0) {
                     $output="Okay";		
				     }else{
				     $family_name=$firstname." ".$lastname;
                   		$qry="INSERT INTO family (family_name,family_rep) VALUES(:family_name,:family_rep)";
						$sta=$connect->prepare($qry);
						 $sta->bindParam(":family_name",$family_name);
				         $sta->bindParam(":family_rep",$uid);
				         $sta->execute();
				         $output="Okay";	
				     }
                   	
                   	}else{

$qry = "UPDATE book_sheet  set family_id=:family_id where uid=:uid";
  $sta=$connect->prepare($qry);
$sta->bindParam(":uid",$uid);
$sta->bindParam(":family_id",$family_unit);
$sta->execute();

$qry="SELECT * from family  where family_rep=:family_rep  ";
$stat=$connect->prepare($qry);
$stat->bindParam(":family_rep",$uid);
$stat->execute();
$count=$stat->rowCount();

if ($count > 0) {
$qry="DELETE from family where family_rep=:family_rep";

					        $stat=$connect->prepare($qry);
					       
					         $stat->bindParam(":family_rep",$uid);
					         $stat->execute();

	}else{

  
	}
	 $output="Okay";

// $family_rep=$firstname." ".$lastname;
// $qry="INSERT INTO family (`family_rep`,`family_id`) VALUES(':family_rep',':family_id')";
// $sta=$connect->prepare($qry);
// $sta->bindParam(":family_rep",$family_rep);
// $sta->bindParam(":family_id",$last_id);
// $sta->execute();
                   	}

									                  }else{

									                   }
		
		
		
		return $output;


	}
}



						    						}else{
						    							$qry="CREATE DATABASE IF NOT EXISTS address_book;";
											    		$sta=$connect_first->prepare($qry);
						  
						  								$sta->execute();
						  								header('location:log_in.php');
						  								
						  								
						    						}
					    



	
?>