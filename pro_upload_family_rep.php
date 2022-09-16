<?php
include('conn_book.php');
$upload = new DB_con();
// if(!isset($_SESSION["cat"]))
// {
//   header('location:log-in.php');
// }elseif ($_SESSION["cat"]!=="admin") {
//     header('location:logout.php');
//   }else{
//     // echo  session($connect,$_SESSION["cat"],$_SESSION["userid"]); 
    
//   }
//import.php
  

// include 'vendor/autoload.php';

$message="";
 if ($_SERVER["REQUEST_METHOD"]=="POST") {

  	if (empty($_POST['purpose'])) {
  		// code...
  		 $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('select purpose')
                );
  	}else{
$purpose=clean($_POST['purpose']);
if($_FILES["import_csv_family_rep"]["name"] != '' )
{
// $title=$_SESSION['exname'];
// $user=$_SESSION['cat'];

 $allowed_extension = array('csv');
 $file_array = explode(".", $_FILES["import_csv_family_rep"]["name"]);
 $file_extension = end($file_array);
// var_dump(in_array($file_extension, $allowed_extension));
 if(in_array($file_extension, $allowed_extension))
 {
//   $file_name = time() . '.' . $file_extension;
//   move_uploaded_file($_FILES['import_csv_family_rep']['tmp_name'], $file_name);
//   $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
 

//   class FirstRowFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
// {
//     public function readCell($column, $row, $worksheetName = '') {
//         //  Return true for rows after first row
//         if ($row>1) {
//           return true;
//         }
//         return false;
//     }
// }
// $file = fopen($_FILES["import_csv_family_rep"]["tmp_name"], "r");

   // unset($data[1]);
   // var_dump($data);
   if ($purpose=="Upload CSV File(Existing Family Rep )") {
   	// code...
//    $filterRow = new FirstRowFilter();
//  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
// $reader->setReadFilter($filterRow);

//   $spreadsheet = $reader->load($file_name);

//   unlink($file_name);

//   $data = $spreadsheet->getActiveSheet()->toArray();
//   var_dump($data);

// die();











// $lengthArray = array();
    
//         $row = 1;
        if (($fp = fopen($_FILES["import_csv_family_rep"]["tmp_name"], "r")) !== FALSE) {
            while (($data_in = fgetcsv($fp, 3000, ",")) !== FALSE) {
                       
            //       var_dump($data);
            //     $lengthArray[] = count($data);
                 
            $data[]=$data_in;
            //     $iNum = count($data);
            // $sResult = $data;

            // $sCSVData = implode(",", $sResult);

            // $data[] = explode(",", $sCSVData);
           
               // unset($data[0][0]);
            // $sColumn0g[] = $data[0];//Values of first column in excel sheet
            // $sColumn1g[] = $data[1];//Values of second column in excel sheet
            //    $sColumn2g[] = $data[2];
            //    $sColumn3g[] = $data[3];
            //    $sColumn4g[] = $data[4];
            //    $sColumn5g[] = $data[5];
            //    $sColumn6g[] = $data[6];
            //    $sColumn7g[] = $data[7];
            //    $sColumn8g[] = $data[8];
            //    $sColumn9g[] = $data[9];
            //    $sColumn10g[] = $data[10];
            //    $sColumn11g[] = $data[11];
            //    $sColumn12g[] = $data[12];
            //    $sColumn13g[] = $data[13];
              
              
             
             

               


            }
            fclose($fp);
            

  }



 unset($data[0]);
     // var_dump($data);
// die();
  // $result = array();
// foreach ($data as $row1) {
// 	 // var_dump($row1);
//  $firstname[]=$row1[0];
//  $lastname[]= $row1[1];

//  $dob[]=$row1[2];
 
//  $gender[]=$row1[3];
//  $street[]=$row1[4];
//  $house_number[]=$row1[5];

//  $zip_code[]=$row1[6];
//  $city[]=$row1[7];
//  $country[]=$row1[8];
//  $mobile_number[]=$row1[9];
//  $phone_number[]=$row1[10];
//  $email[]=$row1[11];
//  $instant_id[]=$row1[12];
//  $result_key_out_out[]=$row1[13];

 


// }

$count=count($data)+1;
function check_colume($check_for_empty){
	// $column;

	if ($check_for_empty==0) {
		$column="A";
	}
	if ($check_for_empty==1) {
		$column="B";
	}
	if ($check_for_empty==2) {
		$column="C";
	}
	if ($check_for_empty==3) {
		$column="D";
	}
	if ($check_for_empty==4) {
		$column="E";
	}
	if ($check_for_empty==5) {
		$column="F";
	}
	if ($check_for_empty==6) {
		$column="G";
	}
	if ($check_for_empty==7) {
		$column="H";
	}
	if ($check_for_empty==8) {
		$column="I";
	}
	if ($check_for_empty==9) {
		$column="J";
	}
	if ($check_for_empty==10) {
		$column="K";
	}
	if ($check_for_empty==11) {
		$column="L";
	}
	if ($check_for_empty==12) {
		$column="M";
	}
return $column;
}
$error_trap="";
for ($i=1; $i <$count ; $i++) { 
	 $row=$i+1;
	$error_trap=$data[$i];
	$check_for_empty=array_search('',$error_trap,true);
	// var_dump($error_trap);
	// var_dump($check_for_empty);
	// echo$check_for_empty;
	$check_date=strstr($data[$i][2],'/');



 if ($check_date!==false) {
 $date = str_replace('/', '-', $data[$i][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data[$i][2]));
 }
 
	 	$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];
$upload_address_check_email=$upload->check_data_exist_family_rep($connect,$data[$i][11]);
if ($check_for_empty>=0) {
	// code...
	break;
}

if ($upload_address_check_email) {
	// code...
	break;
}
}
	

	
	 // var_dump($dob);
	 // die();
	if ($check_for_empty!==false) {

 $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Empty value in column '.check_colume($check_for_empty).' row '.$row.' ')
                );
		// var_dump($check_for_empty);
		
		
	}else{
		// var_dump($check_date);
// 		if ($check_date==false) {
// 			// code...
// $response = array(
//                 "type" => $upload->set_msg_type_and_msg('error'),
//                 "message" => $upload->set_msg_type_and_msg('Date value in column C row '.$row.' is not well formed,it contains '.$data[$i][2].' ,acceptable format(mm/dd/yy) ')
//                 );
// 			break;
// 		}else{

			

			if ($upload_address_check_email==true) {
			// code...
$response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Date value in column L row '.$row.' Already exist on the database,it contains "'.$data[$i][11].' "')
              );
			
		}else{
			          

for ($i=1; $i <$count ; $i++) { 
	 $row=$i+1;
	
	// var_dump($error_trap);
	// var_dump($check_for_empty);
	// echo$check_for_empty;
	$check_date=strstr($data[$i][2],'/');



 if ($check_date!==false) {
 $date = str_replace('/', '-', $data[$i][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data[$i][2]));
 }
 
	 	$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];
	// var_dump($data[$i][13]);
			          $upload_address=$upload->upload_csv_existing_family_rep(clean($data[$i][0]),clean($data[$i][1]),clean($dob),clean($data[$i][3]),clean($data[$i][4]),clean($data[$i][5]),clean($data[$i][6]),clean($data[$i][7]),clean($data[$i][8]),clean($data[$i][9]),clean($data[$i][10]),clean($data[$i][11]),clean($data[$i][12]),clean($dob_year),'1',clean($data[$i][13]),$connect);
			      }

         if ($upload_address=="Okay")   {

          $response = array(
                "type" => $upload->set_msg_type_and_msg('success'),
                "message" => $upload->set_msg_type_and_msg('Data  successfully inserted  ')
                );
          
            }else{
               $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg($upload_address)
                ); 
            }

		


	
	

}

}

}elseif ($purpose=="Upload CSV File(Family Table)") {

if (($fp = fopen($_FILES["import_csv_family_rep"]["tmp_name"], "r")) !== FALSE) {
            while (($data_in = fgetcsv($fp, 3000, ",")) !== FALSE) {
                       
            //       var_dump($data);
            //     $lengthArray[] = count($data);
                 
            $data[]=$data_in;
            $data_control[]=$data_in;
            //     $iNum = count($data);
            // $sResult = $data;

            // $sCSVData = implode(",", $sResult);

            // $data[] = explode(",", $sCSVData);
           
               // unset($data[0][0]);
            // $sColumn0g[] = $data[0];//Values of first column in excel sheet
            // $sColumn1g[] = $data[1];//Values of second column in excel sheet
            //    $sColumn2g[] = $data[2];
            //    $sColumn3g[] = $data[3];
            //    $sColumn4g[] = $data[4];
            //    $sColumn5g[] = $data[5];
            //    $sColumn6g[] = $data[6];
            //    $sColumn7g[] = $data[7];
            //    $sColumn8g[] = $data[8];
            //    $sColumn9g[] = $data[9];
            //    $sColumn10g[] = $data[10];
            //    $sColumn11g[] = $data[11];
            //    $sColumn12g[] = $data[12];
            //    $sColumn13g[] = $data[13];
              
              
             
             

               


            }
            fclose($fp);
            

  }
  // var_dump($data);
 
   unset($data[0]);
    unset($data_control[0]);
   // unset($data[1]);


   $qry="SELECT * from family ";
		$sta=$connect->prepare($qry);
		
		$sta->execute();	
		$result_name = $sta->fetchAll();
		$count_name=count($result_name);
		if ($count_name>0) {
			// code...
			foreach ($result_name as $row) {

				$email_data[]=$row['email_rep'];
				$family_rep[]=$row['family_rep'];
				}
			
				
foreach ($data as $row1) {
 $firstname[]=$row1[0];
 $lastname[]= $row1[1];
 $dob[]=$row1[2];
 $gender[]=$row1[3];
 $street[]=$row1[4];
 $house_number[]=$row1[5];
 $zip_code[]=$row1[6];
 $city[]=$row1[7];
 $country[]=$row1[8];
 $mobile_number[]=$row1[9];
 $phone_number[]=$row1[10];
 $email[]=$row1[11];
 $instant_id[]=$row1[12];
 $key[]=$row1[13];
}

  // var_dump($email);
  // var_dump($email_data);
$check_diff=array_diff($email, $email_data);

foreach ($check_diff as $key => $value) {
	$key_in=$key+1;

unset($data[$key_in]);

}
foreach ($data as $key => $value) {
	// code...
	$data_key[]=$key;
}

foreach ($data_control as $key => $value) {

$test_true=array_search($key, $data_key, true) ;
	if ($test_true!==false) {
		unset($data_control[$key]);
	}
		
}

$count=count($data_control);
function check_colume($check_for_empty){
	// $column;

	if ($check_for_empty==0) {
		$column="A";
	}
	if ($check_for_empty==1) {
		$column="B";
	}
	if ($check_for_empty==2) {
		$column="C";
	}
	if ($check_for_empty==3) {
		$column="D";
	}
	if ($check_for_empty==4) {
		$column="E";
	}
	if ($check_for_empty==5) {
		$column="F";
	}
	if ($check_for_empty==6) {
		$column="G";
	}
	if ($check_for_empty==7) {
		$column="H";
	}
	if ($check_for_empty==8) {
		$column="I";
	}
	if ($check_for_empty==9) {
		$column="J";
	}
	if ($check_for_empty==10) {
		$column="K";
	}
	if ($check_for_empty==11) {
		$column="L";
	}
	if ($check_for_empty==12) {
		$column="M";
	}
	if ($check_for_empty==13) {
		$column="N";
	}
return $column;
}
$error_trap="";

foreach ($data_control as $key => $value) {
	// code...

	$row=$key;
	$error_trap=$data_control[$key];
	$check_for_empty=array_search('',$error_trap,true);

	$check_date=strstr($data_control[$key][2],'/');

 if ($check_date!==false) {
 $date = str_replace('/', '-', $data_control[$key][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data_control[$key][2]));
 }
 
	 	$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];
	$upload_address_check_email=$upload->check_data_exist($connect,$data_control[$key][11]);

	if($upload_address_check_email){
		break;
	}
	if ($check_for_empty>=0) {
		// code...
		break;
	}
	}
	if ($check_for_empty!==false) {

 $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Empty value in column '.check_colume($check_for_empty).' row '.$row.' ')
                );
		// var_dump($check_for_empty);
		
		
	}else{
		// var_dump($check_date);
	

					if ($upload_address_check_email==true) {
			// code...
$response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Date value in column L row '.$row.' Already exist on the database,it contains "'.$data_control[$key][11].' "')
              );
		
		}else{


			foreach ($data_control as $key => $value) {
	// code...

	$row=$key;
	$error_trap=$data_control[$key];
	$check_for_empty=array_search(null,$error_trap,true);

	$check_date=strstr($data_control[$key][2],'/');





 if ($check_date!==false) {
 $date = str_replace('/', '-', $data_control[$key][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data_control[$key][2]));
 }
 
	 	$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];
 $upload_address=$upload->upload_family_table(clean($data_control[$key][0]),clean($data_control[$key][1]),clean($dob),clean($data_control[$key][3]),clean($data_control[$key][4]),clean($data_control[$key][5]),clean($data_control[$key][6]),clean($data_control[$key][7]),clean($data_control[$key][8]),clean($data_control[$key][9]),clean($data_control[$key][10]),clean($data_control[$key][11]),clean($data_control[$key][12]),clean($dob_year),clean($data_control[$key][13]),$connect);
			   }       

			           if ($upload_address=="Okay1")   {

          $response = array(
                "type" => $upload->set_msg_type_and_msg('success'),
                "message" => $upload->set_msg_type_and_msg('Data  successfully inserted  ')
                );
          
            }else{
               $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg($upload_address)
                ); 
            }

			         

     }   
		// }


	
	

}



}else{



foreach ($data as $row1) {
 $firstname[]=$row1[0];
 $lastname[]= $row1[1];

 $dob[]=$row1[2];
 
 $gender[]=$row1[3];
 $street[]=$row1[4];
 $house_number[]=$row1[5];
 $zip_code[]=$row1[6];
 $city[]=$row1[7];
 $country[]=$row1[8];
 $mobile_number[]=$row1[9];
 $phone_number[]=$row1[10];
 $email[]=$row1[11];
 $instant_id[]=$row1[12];
 $key[]=$row1[13];

 


}

$count=count($data)+1;
function check_colume($check_for_empty){
	// $column;

	if ($check_for_empty==0) {
		$column="A";
	}
	if ($check_for_empty==1) {
		$column="B";
	}
	if ($check_for_empty==2) {
		$column="C";
	}
	if ($check_for_empty==3) {
		$column="D";
	}
	if ($check_for_empty==4) {
		$column="E";
	}
	if ($check_for_empty==5) {
		$column="F";
	}
	if ($check_for_empty==6) {
		$column="G";
	}
	if ($check_for_empty==7) {
		$column="H";
	}
	if ($check_for_empty==8) {
		$column="I";
	}
	if ($check_for_empty==9) {
		$column="J";
	}
	if ($check_for_empty==10) {
		$column="K";
	}
	if ($check_for_empty==11) {
		$column="L";
	}
	if ($check_for_empty==12) {
		$column="M";
	}
return $column;
}
$error_trap="";
for ($i=1; $i <$count ; $i++) { 
	 $row=$i+1;
	$error_trap=$data[$i];
	$check_for_empty=array_search('',$error_trap,true);
	// var_dump($error_trap);
	// var_dump($check_for_empty);
	// echo$check_for_empty;
	$check_date=strstr($data[$i][2],'/');



 if ($check_date!==false) {
 $date = str_replace('/', '-', $data[$i][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data[$i][2]));
 }
 
	 	$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];
	$upload_address_check_email=$upload->check_data_exist($connect,$data[$i][11]);
	if($upload_address_check_email){
		break;
	}
	if ($check_for_empty>=0) {
		// code...
		break;
	}
}
	
	 // var_dump($dob);
	 // die();
	if ($check_for_empty!==false) {

 $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Empty value in column '.check_colume($check_for_empty).' row '.$row.' ')
                );
		// var_dump($check_for_empty);

		
	}else{
		// var_dump($check_date);
// 		if ($check_date==false) {
// 			// code...
// $response = array(
//                 "type" => $upload->set_msg_type_and_msg('error'),
//                 "message" => $upload->set_msg_type_and_msg('Date value in column C row '.$row.' is not well formed,it contains '.$data[$i][2].' ,acceptable format(mm/dd/yy) ')
//                 );
// 			break;
// 		}else{

			

			if ($upload_address_check_email==true) {
			// code...
$response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Date value in column L row '.$row.' Already exist on the database,it contains "'.$data[$i][11].' "')
              );
	
		}else{


			for ($i=1; $i <$count ; $i++) { 
	 $row=$i+1;

	// var_dump($error_trap);
	// var_dump($check_for_empty);
	// echo$check_for_empty;
	$check_date=strstr($data[$i][2],'/');



 if ($check_date!==false) {
 $date = str_replace('/', '-', $data[$i][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data[$i][2]));
 }
 
	 	$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];
			            $upload_address=$upload->upload_family_table(clean($data[$i][0]),clean($data[$i][1]),clean($dob),clean($data[$i][3]),clean($data[$i][4]),clean($data[$i][5]),clean($data[$i][6]),clean($data[$i][7]),clean($data[$i][8]),clean($data[$i][9]),clean($data[$i][10]),clean($data[$i][11]),clean($data[$i][12]),clean($dob_year),clean($data[$i][13]),$connect);
}
         if ($upload_address=="Okay1")   {

          $response = array(
                "type" => $upload->set_msg_type_and_msg('success'),
                "message" => $upload->set_msg_type_and_msg('Data  successfully inserted  ')
                );
          
            }else{
               $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg($upload_address)
                ); 
            }

		


	}
	



}

}




}elseif($purpose=="Upload CSV File(New Family Rep)"){


if (($fp = fopen($_FILES["import_csv_family_rep"]["tmp_name"], "r")) !== FALSE) {
            while (($data_in = fgetcsv($fp, 3000, ",")) !== FALSE) {
                       
                  // var_dump($data_in);
            //     $lengthArray[] = count($data);
                 
            $data[]=$data_in;
            $data_control[]=$data_in;
            //     $iNum = count($data);
            // $sResult = $data;

            // $sCSVData = implode(",", $sResult);

            // $data[] = explode(",", $sCSVData);
           
               // unset($data[0][0]);
            // $sColumn0g[] = $data[0];//Values of first column in excel sheet
            // $sColumn1g[] = $data[1];//Values of second column in excel sheet
            //    $sColumn2g[] = $data[2];
            //    $sColumn3g[] = $data[3];
            //    $sColumn4g[] = $data[4];
            //    $sColumn5g[] = $data[5];
            //    $sColumn6g[] = $data[6];
            //    $sColumn7g[] = $data[7];
            //    $sColumn8g[] = $data[8];
            //    $sColumn9g[] = $data[9];
            //    $sColumn10g[] = $data[10];
            //    $sColumn11g[] = $data[11];
            //    $sColumn12g[] = $data[12];
            //    $sColumn13g[] = $data[13];
              
              
             
             

               


            }
            fclose($fp);
            

  }


   unset($data[0]);
   // unset($data[1]);
   // var_dump($data);
foreach ($data as $row1) {
 $firstname[]=$row1[0];
 $lastname[]= $row1[1];

 $dob[]=$row1[2];
 
 $gender[]=$row1[3];
 $street[]=$row1[4];
 $house_number[]=$row1[5];
 $zip_code[]=$row1[6];
 $city[]=$row1[7];
 $country[]=$row1[8];
 $mobile_number[]=$row1[9];
 $phone_number[]=$row1[10];
 $email[]=$row1[11];
 $instant_id[]=$row1[12];

 


}

$count=count($data)+1;
function check_colume($check_for_empty){
	// $column;

	if ($check_for_empty==0) {
		$column="A";
	}
	if ($check_for_empty==1) {
		$column="B";
	}
	if ($check_for_empty==2) {
		$column="C";
	}
	if ($check_for_empty==3) {
		$column="D";
	}
	if ($check_for_empty==4) {
		$column="E";
	}
	if ($check_for_empty==5) {
		$column="F";
	}
	if ($check_for_empty==6) {
		$column="G";
	}
	if ($check_for_empty==7) {
		$column="H";
	}
	if ($check_for_empty==8) {
		$column="I";
	}
	if ($check_for_empty==9) {
		$column="J";
	}
	if ($check_for_empty==10) {
		$column="K";
	}
	if ($check_for_empty==11) {
		$column="L";
	}
	if ($check_for_empty==12) {
		$column="M";
	}
return $column;
}
$error_trap="";
for ($i=1; $i <$count ; $i++) { 
	 $row=$i+1;
	$error_trap=$data[$i];
	// var_dump($data[1]);
	//  var_dump(array_search('',$error_trap,true));
 //  die();
	$check_for_empty=array_search('',$error_trap,true);
	


	$check_date=strstr($data[$i][2],'/');



 if ($check_date!==false) {
 $date = str_replace('/', '-', $data[$i][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data[$i][2]));
 }
 
	if ($check_for_empty>=0) {
		// code...
		break;
	}
	//  var_dump($check_for_empty);
	// die();
 }




	 	
// die();
		if ($check_for_empty!==false) {

 $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Empty value in column '.check_colume($check_for_empty).' row '.$row.' ')
                );
		// var_dump($check_for_empty);
		
		
	}else{
		// var_dump($check_date);
		if ($check_date==false) {
			// code...
$response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Date value in column C row '.$row.' is not well formed,it contains '.$data[$i][2].' ,acceptable format(mm/dd/yy) ')
                );
			
		}else{



for ($i=1; $i <$count ; $i++) { 
	 $row=$i+1;
	

	$check_date=strstr($data[$i][2],'/');



 if ($check_date!==false) {
 $date = str_replace('/', '-', $data[$i][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data[$i][2]));
 }

$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];
 $upload_address=$upload->upload_csv_file(clean($data[$i][0]),clean($data[$i][1]),clean($dob),clean($data[$i][3]),clean($data[$i][4]),clean($data[$i][5]),clean($data[$i][6]),clean($data[$i][7]),clean($data[$i][8]),clean($data[$i][9]),clean($data[$i][10]),clean($data[$i][11]),clean($data[$i][12]),clean($dob_year),'1',$connect);
 }

			          

         if ($upload_address=="Okay")   {

          $response = array(
                "type" => $upload->set_msg_type_and_msg('success'),
                "message" => $upload->set_msg_type_and_msg('Data  successfully inserted  ')
                );
          
            }else{
               $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg($upload_address)
                ); 
            }

		}


	}






}
}

}else{
	 $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('select a csv file  ')
                );
}
}
}

function clean($details){
      $details=trim($details);
      $details=stripcslashes($details);
      $details=htmlspecialchars($details);
      $details=ucwords($details);
       return $details;



}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
</head>
<body>
 <?php
 // $arrange=$upload->arrange_book_sheet($connect);

  if(!empty($response)) { ?>
 	<input type='TEXT' id='set' name='set' value='<?php echo $response["type"]; ?>' style='display:none'>
<div class="response <?php echo $response["type"]; ?>
    ">
    <?php echo $response["message"]; ?>
</div>
<?php }?>
  
</body>
</html>