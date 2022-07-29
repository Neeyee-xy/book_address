<?php
include('conn_book.php');
$update_family = new DB_con();
      
if (isset($_GET['otp'])) {
   $uid=clean($_GET['otp']);

$make_family_rep=$update_family->make_family_rep($connect,$uid);
if ($make_family_rep) {
   header('location:book_index.php');
   // code...
}else{
   echo"operation failed";
}

}
function clean($details){
      $details=trim($details);
      $details=stripcslashes($details);
      $details=htmlspecialchars($details);
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