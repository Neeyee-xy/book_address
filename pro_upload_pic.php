<?php
include('conn_book.php');
$upload_image=new DB_con();
function clean($details){
      $details=trim($details);
      $details=stripcslashes($details);
      $details=htmlspecialchars($details);
      // $details=ucwords($details);
       return $details;



}
if ($_SERVER["REQUEST_METHOD"]=="POST") {


$uid=clean($_POST['uid']);
$name=clean($_POST['name']);
$del_image=clean($_POST['del_image']);
$target_dir="image/profile/";
$filename = $target_dir. basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
$pic = $target_dir. $name.".".$imageFileType;
	if (! file_exists($_FILES["pic"]["tmp_name"])) {
		// code...

		$response = array(
                "type" => $upload_image->set_msg_type_and_msg('error'),
                "message" => $upload_image->set_msg_type_and_msg('image is required')
                );
		 $uploadOk = 0;
	}else{

		if($_FILES["pic"]["size"] > 1000000 OR $_FILES["pic"]["size"] < 10000){
		 $response = array(
                "type" => $upload_image->set_msg_type_and_msg('error'),
                "message" => $upload_image->set_msg_type_and_msg('image is less 10kb or greater than 1mb ')
                );
		 $uploadOk = 0;

	}else{

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"){
    	 $response = array(
                "type" => $upload_image->set_msg_type_and_msg('error'),
                "message" => $upload_image->set_msg_type_and_msg('Sorry, only JPG, JPEG, PNG & GIF files are allowed. ')
                );
		 $uploadOk = 0;

	}else{
		if( $uploadOk ==0){
$response = array(
                "type" => $upload_image->set_msg_type_and_msg('error'),
                "message" => $upload_image->set_msg_type_and_msg('Sorry, your file was not uploaded')
                );
	}else{
		$test_upload_image=$upload_image->upload_image($name,$pic,$uid,$connect,$del_image);



         
         if ($test_upload_image=="Okay")   {
         	if (file_exists($_FILES["pic"]["tmp_name"])) {
       move_uploaded_file($_FILES["pic"]["tmp_name"], $pic);
   }
          $response = array(
                "type" => $upload_image->set_msg_type_and_msg('success'),
                "message" => $upload_image->set_msg_type_and_msg('Data  successfully updated  ')
                );
          
            }else{
               $response = array(
                "type" => $upload_image->set_msg_type_and_msg('error'),
                "message" => $upload_image->set_msg_type_and_msg($test_upload_image)
                ); 
            }
	}
}
}
}
}


?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title></title>
</head>
<body>
 <?php if(!empty($response)) { ?>
  <input type='TEXT' id='set' name='set' value='<?php echo $response["type"]; ?>' style='display:none'>
<div class="response <?php echo $response["type"]; ?>
    ">
    <?php echo $response["message"]; ?>
</div>
<?php }?>
  
</body>
</html>