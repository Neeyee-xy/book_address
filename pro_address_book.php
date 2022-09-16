<?php
include('conn_book.php');
$insert_family = new DB_con();

// if(isset($_SESSION['cat']))
// {
//   header('location:loggin.php');
// }
      $Errfristname=$Errlastname=$Erremail=$Errgender=$Errcat=$Errpassword=$Errconpassword="";
      $firstname=$lastname=$email=$gender=$cat=$password=$conpassword=$url=$text=$msg="";


  if($_SERVER["REQUEST_METHOD"]=="POST"){

     if(empty($_POST["firstname"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('firstname is required ')
             
                );

    
        }
        else{
          $firstname=clean($_POST["firstname"]);
          if(empty($_POST["lastname"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('lastname is required ')
                );

    
        }
        else{
          $lastname=clean($_POST["lastname"]);
          if(empty($_POST["dob"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('Date of brith is required ')
                );

    
        }
        else{
           $dob=clean($_POST["dob"]);
          // $dob= date("m/d/Y", strtotime($dob1));
          if(empty($_POST["gender"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('gender is required ')
                );

    
        }
        else{
          $gender=clean($_POST["gender"]);
          if(empty($_POST["street"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('street is required ')
                );

    
        }
        else{
          $street=clean($_POST["street"]);

          if(empty($_POST["house_number"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('House number is required ')
                );

    
        }
        else{
          $house_number=clean($_POST["house_number"]);
          if(empty($_POST["zip_code"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('Zip code is required ')
                );

    
        }
        else{
          $zip_code=clean($_POST["zip_code"]);
          if(empty($_POST["city"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('city is required ')
                );

    
        }
        else{
          $city=clean($_POST["city"]);
          if(empty($_POST["country"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('country is required ')
                );

    
        }
        else{
          $country=clean($_POST["country"]);
          if(empty($_POST["mobile_number"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('Mobile number is required ')
                );

    
        }
        else{
          $mobile_number=clean($_POST["mobile_number"]);
          if(empty($_POST["phone_number"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('Phone number is required ')
                );

    
        }
        else{
          $phone_number=clean($_POST["phone_number"]);
          if(empty($_POST["email"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('Email is required ')
                );

    
        }
        else{
          $email=clean($_POST["email"]);
          if(empty($_POST["instant_id"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('instant message Id is required ')
                );

    
        }
        else{
          $instant_id=clean($_POST["instant_id"]);
          if(empty($_POST["fam"])){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('Do you have a family is required ')
                );

    
        }
        else{
          $fam=clean($_POST["fam"]);
          if(empty($_POST["family_unit"]) and $fam=="Yes" ){

             $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg('family name  is required ')
                );

    
        }
        else{
          $family_unit=clean($_POST["family_unit"]);
          // var_dump($family_unit);


          $test_insert_family=$insert_family->insert_address($firstname,$lastname,$dob,$gender,$street,$house_number,$zip_code,$city,$country,$mobile_number,$phone_number,$email,$instant_id,$family_unit,$fam,$connect);
         if ($test_insert_family=="Okay")   {
          $response = array(
                "type" => $insert_family->set_msg_type_and_msg('success'),
                "message" => $insert_family->set_msg_type_and_msg('Data  successfully inserted  ')
                );
          
            }else{
               $response = array(
                "type" => $insert_family->set_msg_type_and_msg('error'),
                "message" => $insert_family->set_msg_type_and_msg($test_insert_family)
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