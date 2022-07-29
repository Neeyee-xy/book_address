<?php
include('conn_book.php');
$upload = new DB_con();

  

include 'vendor/autoload.php';

$message="";

if($_FILES["import_csv"]["name"] != '')
{


 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_csv"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_csv']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
 

  class FirstRowFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function readCell($column, $row, $worksheetName = '') {
        //  Return true for rows after first row
        if ($row>1) {
          return true;
        }
        return false;
    }
}
$filterRow = new FirstRowFilter();
 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
$reader->setReadFilter($filterRow);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();
  // var_dump($data);

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
	$check_for_empty=array_search(null,$error_trap,true);

	$check_date=strstr($data[$i][2],'/');



 if ($check_date!==false) {
 $date = str_replace('/', '-', $data[$i][2]);
	 $dob= date("Y-m-d", strtotime( $date));

 }else{
 	$dob= date("Y-m-d", strtotime( $data[$i][2]));
 }
 
	 	$brk_year=explode("-",$dob);
	$dob_year=$brk_year[0];

	
	if ($check_for_empty!==false) {

 $response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Empty value in column '.check_colume($check_for_empty).' row '.$row.' ')
                );
		// var_dump($check_for_empty);
		break;
		
	}else{
		// var_dump($check_date);
		if ($check_date==false) {
			// code...
$response = array(
                "type" => $upload->set_msg_type_and_msg('error'),
                "message" => $upload->set_msg_type_and_msg('Date value in column C row '.$row.' is not well formed,it contains '.$data[$i][2].' ,acceptable format(mm/dd/yy) ')
                );
			break;
		}else{
			          $upload_address=$upload->upload_csv_file($data[$i][0],$data[$i][1],$dob,$data[$i][3],$data[$i][4],$data[$i][5],$data[$i][6],$data[$i][7],$data[$i][8],$data[$i][9],$data[$i][10],$data[$i][11],$data[$i][12],$dob_year,'1',$connect);

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
                "message" => $upload->set_msg_type_and_msg('select an csv file')
                );
}

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
</head>
<body>
 <?php


  if(!empty($response)) { ?>
 	<input type='TEXT' id='set' name='set' value='<?php echo $response["type"]; ?>' style='display:none'>
<div class="response <?php echo $response["type"]; ?>
    ">
    <?php echo $response["message"]; ?>
</div>
<?php }?>
  
</body>
</html>