<?php
include('conn_book.php');
$list_family_unit = new DB_con();
$list_address_book_out=$list_family_unit->list_address_book_print_layout($connect);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Address Book</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
  <!-- overlayScrollbars -->
  
  <script src="js/jquery.js"></script>
  <style type="text/css">
  	
  	body{
  		background: white !important;
  	}

  	
  </style>
</head>
<body>



	
<?php
          echo $list_address_book_out;



?>



</body>
</html>