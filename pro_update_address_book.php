<?php
include('conn_book.php');
$update_family = new DB_con();


      $Errfristname=$Errlastname=$Erremail=$Errgender=$Errcat=$Errpassword=$Errconpassword="";
      $firstname=$lastname=$email=$gender=$cat=$password=$conpassword=$url=$text=$msg="";


  if($_SERVER["REQUEST_METHOD"]=="POST"){
$uid=clean($_POST["uid"]);
     if(empty($_POST["firstname"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('firstname is required ')
                );

    
        }
        else{
          $firstname=clean($_POST["firstname"]);
          if(empty($_POST["lastname"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('lastname is required ')
                );

    
        }
        else{
          $lastname=clean($_POST["lastname"]);
          if(empty($_POST["dob"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Date of brith is required ')
                );

    
        }
        else{
            $dob=clean($_POST["dob"]);
            // var_dump($dob1);
            // die();
          // $dob= date("m/d/Y", strtotime($dob1));
          if(empty($_POST["gender"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('gender is required ')
                );

    
        }
        else{
          $gender=clean($_POST["gender"]);
          if(empty($_POST["street"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('street is required ')
                );

    
        }
        else{
          $street=clean($_POST["street"]);

          if(empty($_POST["house_number"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('House number is required ')
                );

    
        }
        else{
          $house_number=clean($_POST["house_number"]);
          if(empty($_POST["zip_code"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Zip code is required ')
                );

    
        }
        else{
          $zip_code=clean($_POST["zip_code"]);
          if(empty($_POST["city"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('city is required ')
                );

    
        }
        else{
          $city=clean($_POST["city"]);
          if ($_POST["country"]=="" and  $_POST["country_edit"]=="") {
           // code...
          $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Country is required ')
                );
        }else{

          

// var_dump($country);


          if(empty($_POST["mobile_number"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Mobile number is required ')
                );

    
        }
        else{
          $mobile_number=clean($_POST["mobile_number"]);
          if(empty($_POST["phone_number"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Phone number is required ')
                );

    
        }
        else{
          $phone_number=clean($_POST["phone_number"]);
          if(empty($_POST["email"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Email is required ')
                );

    
        }
        else{
          $email=clean($_POST["email"]);
          if(empty($_POST["instant_id"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('instant message Id is required ')
                );

    
        }
        else{
          $instant_id=clean($_POST["instant_id"]);
          if(empty($_POST["fam"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Do you have a family is required ')
                );

    
        }
        else{
          $fam=clean($_POST["fam"]);
          if(empty($_POST["family_unit"])){

             $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('family name  is required ')
                );

    
        }
        else{
          $family_unit=clean($_POST["family_unit"]);
          if ($_POST["country"]=="") {
            $country=clean($_POST["country_edit"]);
          }else{
            $country=clean($_POST["country"]);
          }


$check_family_rep=$update_family->check_family_if_family_rep_exist($connect,$uid);

if ($check_family_rep==true) {
  $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg('Can\'t assign individual, Individual is a family rep with family members assigned to them. De-assign the family members first')
                );
}else{
    $test_update_family=$update_family->update_address($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$family_unit,$uid,$connect);



         
         if ($test_update_family=="Okay")   {
          $response = array(
                "type" => $update_family->set_msg_type_and_msg('success'),
                "message" => $update_family->set_msg_type_and_msg('Data  successfully updated  ')
                );
          
            }else{
               $response = array(
                "type" => $update_family->set_msg_type_and_msg('error'),
                "message" => $update_family->set_msg_type_and_msg($test_update_family)
                ); 
            }


        }


        }


        }


        }


        }


        }


        }


        }


        }


        }


        }


        }


        }


        }


        }
  }



}
      function clean($details){
      $details=trim($details);
      $details=stripcslashes($details);
      $details=htmlspecialchars($details);
      // $details=ucwords($details);

      //  $details=ucwords($details);
      // $details = str_replace("'", '', $details);
  
    //        $specChars = array(
    //        '!' => '',    '"' => '',
    //     '#' => '',    '$' => '',    '%' => '',
    //     '&amp;' => '',    '\'' => '',   
    //        '*' => '',    '+' => '',
    //         '₹' => '',    
    //     '/-' => '',        ';' => '',
    //        '=' => '',    
    //     '?' => '',       '[' => '',
    //     '\\' => '',   ']' => '',    '^' => '',
    //     '_' => '',    '`' => '',    '{' => '',
    //     '|' => '',    '}' => '',    '~' => '',
    //     '-----' => '-',    '----' => '-',    '---' => '-',
    //     '/' => '',    '--' => '-',   '/_' => '-', 
         
    // );
 
    // foreach ($specChars as $k => $v) {
    //     $details = str_replace($k, $v, $details);
    // }
       return $details;


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