<?php
$connect_first = new PDO("mysql:host=localhost;charset=utf8mb4", "root", "");

					try { 
					$connect_first->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					    // echo "Connected successfully"; 
					    }
					catch(PDOException $e)
					    {
					    echo "Connection failed: " . $e->getMessage();

					    }



// setting set up a database automatcally
// default datbase user is root, NO password 
					    	$qry="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'address_book'";
					    	$sta=$connect_first->prepare($qry);
  
  							$sta->execute();
  
    						$result_database_count = $sta->fetchAll();
    						$count_resuit_database=count($result_database_count);
    						if ($count_resuit_database>0) {
    							$connect = new PDO("mysql:host=localhost;dbname=address_book;charset=utf8mb4", "root", "");

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
			( 'Akee',  'kunleneeyee.@gmail.com',  'admin',  '\$2y\$10\$ODqLv7ggLoDZKCxNQ3WQ7.6HeLr36FkixspFgU3UYGBdq942PWKe.')";
			$sta=$connect->prepare($qry);
			$sta->execute();
	}
 $qry = "CREATE TABLE IF NOT EXISTS book_sheet (

  `uid` int(11) NOT NULL AUTO_INCREMENT,
	`firstname` varchar(255) DEFAULT NULL,
	`lastname` varchar(255) DEFAULT NULL,
	
	`dob` DATE NULL DEFAULT NULL,
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
	`pic` LONGTEXT  DEFAULT NULL,
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
  	 				

// This list family rep in the manual method of adding individual
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


// this insert individaul data into address boook
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

                   	}
                   }

									                  }else{

									                   }
		
		}
		}
		return $output;


	}



 public function upload_image($name,$pic,$uid,$connect,$del_image)
	{
		$output="";
$qry="SELECT * from book_sheet where uid=:uid";
		$sta=$connect->prepare($qry);
		 $sta->bindParam(":uid",$uid);
      
		$sta->execute();	
		$result_name = $sta->fetchAll();
		$count_name=count($result_name);
		if ($count_name>0) {
$qry = "UPDATE book_sheet  set pic=:pic where uid=:uid";
  $sta=$connect->prepare($qry);
$sta->bindParam(":uid",$uid);
$sta->bindParam(":pic",$pic);
$sta->execute();

if ($del_image!=="") {
	// code...
	unlink($del_image);
}
$output="Okay";
		}else{

		}
return $output;

	}


  


// this upload family rep csv file 


public function upload_csv_file($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$dob_year,$upload_set,$connect)
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




// this upload existing family rep csv file 

public function upload_csv_existing_family_rep($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$dob_year,$upload_set,$uid,$connect)
	{

		
		
$family_name=$lastname." ".$firstname;

// echo $uid."<br>";
			$qry="INSERT INTO family (family_name,family_rep,email_rep) VALUES(:family_name,:family_rep,:email)";
						$sta=$connect->prepare($qry);
						 $sta->bindParam(":family_name",$family_name);
				      $sta->bindParam(":family_rep",$uid);
				       $sta->bindParam(":email",$email);
				       $sta->execute();
                   
				         $output="Okay";
				     

						
		
		
		return $output;

		}





// this check for existing data when uploading  family table 

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


public function check_data_exist_family_rep($connect,$email)
	{
		
		$qry="SELECT *from family where email_rep=:email";
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


// this check for existing data when uploading  family rep 
public function check_family_if_family_rep_exist($connect,$uid){

	$qry="SELECT * FROM book_sheet where uid=:uid";
	$stat=$connect->prepare($qry);
	$stat->bindParam(":uid",$uid);
	$stat->execute();
	$resu_fam_rep=$stat->fetchAll();
	$count_resu_rep_fam=count($resu_fam_rep);

foreach ($resu_fam_rep as $row) {

	$family_id=$row['family_id'];
	$email=$row['email'];
	// code...
}


$qry="SELECT * FROM book_sheet where family_id=:family_id";
$stat=$connect->prepare($qry);
$stat->bindParam("family_id",$family_id);
$stat->execute();
$result_family_unit=$stat->fetchall();
$result_family_unit_count=count($result_family_unit);


	if ($result_family_unit_count>1) {

		$qry="SELECT * FROM family where family_rep=:family_id";
		$stat=$connect->prepare($qry);
		$stat->bindParam("family_id",$family_id);
		$stat->execute();
		$result_family_rep=$stat->fetchall();
		$result_family_rep_count=count($result_family_rep);
		if ($result_family_rep_count>0) {

			foreach ($result_family_rep as $row) {

				$email_rep=$row['email_rep'];


			}


			if ($email==$email_rep) {
				// code...
				return true;
			}else{
				return false;
			}
			// code...
			
		}else{
			return false;
		}

		
		// code...
	}else{
		return false;
	}

}


// this upload familyn table 

		public function upload_family_table($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$dob_year,$key,$connect)
	{


		
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
		

	






// this list and arrange family table with family rep starting each family 
public function list_address_book($connect,$end,$start)
	{

 $end_end=$end-$start;
$qry="SELECT * from book_sheet INNER JOIN family  where book_sheet.family_id=family.family_rep   ";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep1=$stat->rowCount();

// fetching family reps 
$qry="SELECT * from family  order by family_name  ASC limit ".$start." , ".$end_end."";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep=$stat->rowCount();

if ($count_rep > 0) {
	$no=0;
  $resu=$stat->fetchall();
  foreach ($resu as $row) {
  	
// looking for family reps inside book sheet 


  	$qry="SELECT * from book_sheet where family_id=:family_rep  order by dob DESC  ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family=$sta->fetchall();
// checking if family rep has family member 
$count_trap_line=count($result_family);
// this shows ending line 
$count_trap_lock=$count_trap_line-1;

if ($count_trap_line>1) {

	// if greater than 1 that means the family rep has family member 
	// code...
// lising family rep first 
	$qry="SELECT * from book_sheet where family_id=:family_rep  and uid=:family_rep order by dob ASC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family=$sta->fetchall();
$count_trap_line=count($result_family);
	
foreach ($result_family as $row1) {
if ($row1['pic']=="") {
  $pic='image/male.png';
}else{
	 $pic=$row1['pic'];
}

	   echo  "<tr>
<td> <div class='btn-group-horizontal'>
 <button class='link btn-success update'style='display:inline-block;' value='".$row1['uid']."'>Update</button>
 <button class='link btn-success upload_image'style='display:inline-block;' value='".$row1['uid']."'>Add image</button>
  </div>
                      </td>
<td><div class='img_wrapper_table'>
<img src='".$pic."' class='img_table'>
</div></td>
 <td>".$row1['firstname']."</td>
         <td>".$row1['lastname']."</td>
         <td>".$row['family_name']."</td>
         <td>".$row1['dob']."</td>
          <td>".$row1['gender']."</td>
           <td>".$row1['street']."</td>
            <td>".$row1['house_number']."</td>
            <td>".$row1['zip_code']."</td>
              <td>".$row1['city']."</td>
               <td>".$row1['country']."</td>
                <td>".$row1['mobile_number']."</td>
                 <td>".$row1['phone_number']."</td>
                  <td>".$row1['email']."</td>
                   <td>".$row1['instant_id']."</td>








  </tr>";

  // lising family members under the family reps 
$qry="SELECT * from book_sheet where family_id=:family_rep  and uid!=:family_rep order by dob ASC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family1=$sta->fetchall();
$count_trap_line=count($result_family);
	
foreach ($result_family1 as $row2) {
if ($row2['pic']=="") {
  $pic='image/male.png';
}else{
	 $pic=$row2['pic'];
}
	   echo  "<tr>
<td> <div class='btn-group-horizontal'>
                         <button class='link btn-success update'style='display:inline-block;' value='".$row2['uid']."'>Update</button>
                         <button class='link btn-success upload_image'style='display:inline-block;' value='".$row2['uid']."'>Add image</button>

                        <a class='link btn-success'style='display:inline-block;' href='pro_make_family_rep.php?otp=".$row2['uid']."'>Make Family Rep</a>
                      </div>
                      </td>
<td><div class='img_wrapper_table'>
<img src='".$pic."' class='img_table'>
</div></td>
 <td>".$row2['firstname']."</td>
         <td>".$row2['lastname']."</td>
         <td>".$row['family_name']."</td>
         <td>".$row2['dob']."</td>
          <td>".$row2['gender']."</td>
           <td>".$row2['street']."</td>
            <td>".$row2['house_number']."</td>
            <td>".$row2['zip_code']."</td>
              <td>".$row2['city']."</td>
               <td>".$row2['country']."</td>
                <td>".$row2['mobile_number']."</td>
                 <td>".$row2['phone_number']."</td>
                  <td>".$row2['email']."</td>
                   <td>".$row2['instant_id']."</td>








  </tr>";
		

}
}

}else{

	// if less than or equal to one that means the family rep has no family 
	$qry="SELECT * from book_sheet where family_id=:family_rep  and uid=:family_rep order by dob ASC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family=$sta->fetchall();
$count_trap_line=count($result_family);

foreach ($result_family as $row1) {

if ($row1['pic']=="") {
  $pic='image/male.png';
}else{
	 $pic=$row1['pic'];
}
	   echo  "<tr>
<td> <div class='btn-group-horizontal'>
                            
                        

                        <button class='link btn-success update'style='display:inline-block;' value='".$row1['uid']."'>Update</button>
                        <button class='link btn-success upload_image'style='display:inline-block;' value='".$row1['uid']."'>Add image</button>

                         
                      </div>
                      </td>
<td><div class='img_wrapper_table'>
<img src='".$pic."' class='img_table'>
</div></td>
 <td>".$row1['firstname']."</td>
         <td>".$row1['lastname']."</td>
         <td>".$row['family_name']."</td>
         <td>".$row1['dob']."</td>
          <td>".$row1['gender']."</td>
           <td>".$row1['street']."</td>
            <td>".$row1['house_number']."</td>
            <td>".$row1['zip_code']."</td>
              <td>".$row1['city']."</td>
               <td>".$row1['country']."</td>
                <td>".$row1['mobile_number']."</td>
                 <td>".$row1['phone_number']."</td>
                  <td>".$row1['email']."</td>
                   <td>".$row1['instant_id']."</td>








  </tr>";

}
}

  }
}else{
return false;
}

}



// this make a family member family rep after making he or she a family member 
public function make_family_rep($connect,$uid){
	
	$qry="SELECT * FROM book_sheet where uid=:uid";
	$stat=$connect->prepare($qry);
		$stat->bindParam(":uid",$uid);
	$stat->execute();
	 $resu=$stat->fetchall();
	 $count_value=count($resu);



	 if ($count_value>0) {
	 foreach ($resu as $row) {
				 	$full_name=$row['lastname']." ".$row['firstname'];
				 	$email=$row['email'];

				 	$qry="INSERT INTO family (family_rep,family_name,email_rep) VALUES(:uid,:full_name,:email)";
				 	$stat=$connect->prepare($qry);
				 	$stat->bindParam(":uid",$uid);
				 	$stat->bindParam(":full_name",$full_name);
				 	$stat->bindParam(":email",$email);
						 if ($stat->execute()) {
						 		$last_id = $connect->lastInsertId();
$qry="UPDATE book_sheet set family_id=:uid where uid=:uid";
$stat=$connect->prepare($qry);
// $stat->bindParam(":last_id",$last_id);
$stat->bindParam(":uid",$uid);
$stat->execute();

						 	return true;
						 }else{
						 	return false;
						 }


	 }




	 }



}

 // this list and arrange family table with family rep starting each family on the print layout 
public function list_address_book_print_layout($connect)
	{


       $pic="";
$qry="SELECT * from book_sheet INNER JOIN family  where book_sheet.family_id=family.family_rep   ";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep1=$stat->rowCount();



$qry="SELECT * from family  order by family_name  ASC";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep=$stat->rowCount();

$brk_page=round($count_rep/12);
$page_brk_holder=array();
for ($i=1; $i <$brk_page ; $i++) { 
	// code...
	$page_brk_holder[]=12*$i;
}

if ($count_rep > 0) {
  $no=0;
  $no_brk=0;
  $no_brk1=0;
  $no_brk2=0;
  $resu=$stat->fetchall();
  foreach ($resu as $row) {
    
$no_brk++;



    $qry="SELECT * from book_sheet where family_id=:family_rep  order by dob DESC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family=$sta->fetchall();
$count_trap_line=count($result_family);
$count_trap_lock=$count_trap_line-1;
if ($count_trap_line>1) {
  // code...

  $qry="SELECT * from book_sheet where family_id=:family_rep  and uid=:family_rep order by dob ASC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family=$sta->fetchall();
$count_trap_line=count($result_family);
  echo' 




';

foreach ($result_family as $row1) {
	
	
	
 $no_brk=$no_brk+$count_trap_line;
 
if($row1['pic']==""){
$pic='image/male.png';
}else{
  $pic=$row1['pic'];
}

  
    echo "
<div class='entry'>
<div class='entry__column entry__column--person'>
                <figure class='entry__image-box'>
                  <img src='".$pic."' alt='Entry profile picture' class='entry__image'>
                </figure>
                <div class='entry__name-box'>
                  <span class='text--3 text--bold line-height--2'>".$row1['lastname']." ".$row1['firstname']."</span>
               
                  <span class='text--2 line-height--1 gray'>".str_replace('-','.',$row1['dob'])."</span>
                </div>
              </div>

              <div class='entry__column entry__column--phone'>
                <span class='entry__phone entry__phone--mobile text--2 line-height--3'>".$row1['phone_number']."</span><span class='entry__phone entry__phone--mobile text--2 line-height--3'>".$row1['mobile_number']."</span>
               
              </div>

              <div class='entry__column entry__column--mail'>
                <span class='entry__email text--2 line-height--3'>".$row1['email']."</span>
                <span class='entry__im text--2 line-height--3'>".$row1['instant_id']."</span>
              </div>

              <div class='entry__column entry__column--address'>
                <p class='entry__address text--2 line-height--3'>
                 ".$row1['house_number']." ".$row1['street']."<br>".$row1['zip_code'].",  ".$row1['city']."
                </p>
              </div>
            </div>
          


    ";
    


$qry="SELECT * from book_sheet where family_id=:family_rep  and uid!=:family_rep order by dob ASC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family1=$sta->fetchall();
$count_trap_line=count($result_family);
  

foreach ($result_family1 as $row2) {
// <h5>". $no .". &nbsp; &nbsp;".$row2['lastname']." ".$row2['firstname']."
  $no++;
  
    if($row2['pic']==""){
$pic='image/male.png';
}else{
  $pic=$row2['pic'];
}

  $no_brk=$no_brk+$count_trap_line;
    echo "
<div class='entry'>
<div class='entry__column entry__column--person'>
                <figure class='entry__image-box'>
                  <img src='".$pic."' alt='Entry profile picture' class='entry__image'>
                </figure>
                <div class='entry__name-box'>
                  <span class='text--3 text--bold line-height--2'>".$row2['lastname']." ".$row2['firstname']."</span>
               
                  <span class='text--2 line-height--1 gray'>".str_replace('-','.',$row2['dob'])."</span>
                </div>
              </div>

              <div class='entry__column entry__column--phone'>
                <span class='entry__phone entry__phone--mobile text--2 line-height--3'>".$row2['phone_number']."</span>
                <span class='entry__phone entry__phone--mobile text--2 line-height--3'>".$row2['mobile_number']."</span>
                
              </div>

              <div class='entry__column entry__column--mail'>
                <span class='entry__email text--2 line-height--3'>".$row2['email']."</span>
                <span class='entry__im text--2 line-height--3'>".$row2['instant_id']."</span>
              </div>

              <div class='entry__column entry__column--address'>
                <p class='entry__address text--2 line-height--3'>
                 ".$row2['house_number']." ".$row2['street']."<br>".$row2['zip_code'].",  ".$row2['city']."
                </p>
              </div>
            </div>
           

    ";
    if ($no==$count_trap_lock) {
      echo"<hr class='separator--x'>";
      $no=0;
    }

}
}

    
    

  
}else{
  $qry="SELECT * from book_sheet where family_id=:family_rep  and uid=:family_rep order by dob ASC ";
$sta=$connect->prepare($qry);
 $sta->bindParam(":family_rep",$row['family_rep']);
$sta->execute();
$result_family=$sta->fetchall();
$count_trap_line=count($result_family);
  

foreach ($result_family as $row1) {

// <h5>". $no .". &nbsp; &nbsp;".$row1['lastname']." ".$row1['firstname']."
  $no++;
  
    if($row1['pic']==""){
$pic='image/male.png';
}else{
  $pic=$row1['pic'];
}

  
    echo "
<div class='entry'>
<div class='entry__column entry__column--person'>
                <figure class='entry__image-box'>
                  <img src='".$pic."' alt='Entry profile picture' class='entry__image'>
                </figure>
                <div class='entry__name-box'>
                  <span class='text--3 text--bold line-height--2'>".$row1['lastname']." ".$row1['firstname']."</span>
               
                  <span class='text--2 line-height--1 gray'>".str_replace('-','.',$row1['dob'])."</span>
                </div>
              </div>

              <div class='entry__column entry__column--phone'>
                <span class='entry__phone entry__phone--mobile text--2 line-height--3'>".$row1['phone_number']."</span>
                <span class='entry__phone entry__phone--mobile text--2 line-height--3'>".$row1['mobile_number']."</span>
               
              </div>

              <div class='entry__column entry__column--mail'>
                <span class='entry__email text--2 line-height--3'>".$row1['email']."</span>
                <span class='entry__im text--2 line-height--3'>".$row1['instant_id']."</span>
              </div>

              <div class='entry__column entry__column--address'>
                <p class='entry__address text--2 line-height--3'>
                 ".$row1['house_number']." ".$row1['street']."<br>".$row1['zip_code'].",  ".$row1['city']."
                </p>
              </div>
            </div>
           


    ";
  
    if ($no==$count_trap_line) {
      echo"<hr class='separator--x'>";
      $no=0;
    }

}
}
if (in_array($no_brk, $page_brk_holder)) {
      echo"<div class='separator--x_brk'></div>";
     
    }
  }

  
}else{
return false;
}
echo'</div>';

}


 // this press family rep to csv file 

public function csv_family_rep($connect)
	{
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=family_rep.csv');


$qry="SELECT * from family  order by family_name  ASC";
$stat=$connect->prepare($qry);

$stat->execute();
$count_rep=$stat->rowCount();

if ($count_rep > 0) {
	$no=0;
  $resu=$stat->fetchall();
 $fp = fopen('php://output', 'w');

$headers = ['First name.','Last name', 'Date of brith', 'Gender','Street',' House number','Zip code','City','Country','Mobile number','Phone Number','Email','Instant message ID','Key(DO NOT EDIT)'];

fputcsv($fp, $headers);
$i=0;
  		foreach ($resu as $row) {
  				$i++;

  	$qry="SELECT firstname,lastname,dob,gender,street,house_number,zip_code,city,country,mobile_number,phone_number,email,instant_id,uid from book_sheet where family_id=:family_rep and email=:email  order by lastname DESC ";
$stat=$connect->prepare($qry);
 $stat->bindParam(":family_rep",$row['family_rep']);
  $stat->bindParam(":email",$row['email_rep']);
$stat->execute();
$result_family=$stat->fetchall();

foreach ($result_family as $row1) {
$tt=[$row1['firstname'],$row1['lastname'],$row1['dob'],$row1['gender'],$row1['street'],$row1['house_number'],$row1['zip_code'],$row1['city'],$row1['country'],$row1['mobile_number'],$row1['phone_number'],$row1['email'],$row1['instant_id'],$row['family_rep']];
	fputcsv($fp, $tt);

}
}
fclose($fp);

 



}



}



 // this press family table to csv file 

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


 // this fetch individal data during update 

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





// this update individual data

		public function update_address($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$family_unit,$uid,$connect,$fam)
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
      //              	if ($family_unit==""and $fam=="NO") {
      //              		$qry = "UPDATE book_sheet  set family_id=:family_id where uid=:id";

					 //        $sta=$connect->prepare($qry);
					 //         $sta->bindParam(":id",$last_id);
					 //         $sta->bindParam(":family_id",$last_id);
					 //         $sta->execute();
      //              		// code...
      // //              		$qry="INSERT INTO family (family_name,family_rep) VALUES(:family_name,:family_rep)";
						// // $sta=$connect->prepare($qry);
						// //  $sta->bindParam(":family_name",$family_name);
				  // //        $sta->bindParam(":family_rep",$last_id);
				  // //        $sta->execute();
				  //        $output="Okay";
      //              	}else{
                   	
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
// var_dump($uid);
// die();
if ($count > 0 and $fam=="Yes") {
$qry="DELETE from family where family_rep=:family_rep";

					        $stat=$connect->prepare($qry);
					       
					         $stat->bindParam(":family_rep",$uid);
					         $stat->execute();

	}else{

  
	}
	 $output="Okay";


                   	}
                   // }

									                  }else{

									                   }
		
		
		
		return $output;


	}
}



						    						}else{
						    							$qry="CREATE DATABASE IF NOT EXISTS address_book;";
											    		$sta=$connect_first->prepare($qry);
						  
						  								$sta->execute();
						  								header('location:book_index.php');
						  								
						  								
						    						}
					    



	
?>
