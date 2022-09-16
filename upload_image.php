<?php
include('conn_book.php');
$list_individaul = new DB_con();
if($_SERVER["REQUEST_METHOD"]=="POST"){



$uid=clean($_POST['id']);
$result_family=$list_individaul->list_individual_data($uid,$connect);
foreach ($result_family  as $row) {
  $firstname1=$row['firstname'];
        $lastname1=$row['lastname'];
         $dob=$row['dob'];
          $gender=$row['gender'];
           $street=$row['street'];
            $house_number=$row['house_number'];
            $zip_code=$row['zip_code'];
              $city=$row['city'];
               $country=$row['country'];
                $mobile_number=$row['mobile_number'];
                 $phone_number=$row['phone_number'];
                  $email=$row['email'];
                  $instant_id=$row['instant_id'];
                  $pic=$row['pic'];
                  $del_image=$row['pic'];
                  $family_unit=$row['family_id'];
}
$change_dob=str_replace("-", '_', $dob);
 $name=$change_dob."_".$firstname1."_".$lastname1;
}

 function clean($details){
      $details=trim($details);
      $details=stripcslashes($details);
      $details=htmlspecialchars($details);
      $details=ucwords($details);
       return $details;



}

if ($pic=="") {
  $pic='image/male.png';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Address book </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
 
  <link rel="stylesheet" href="css/style2.css">
  <!-- overlayScrollbars -->
  
  <script src="js/jquery.js"></script>
</head>

<script>


$(document).ready(function(){

$(".btn-right").click(function(){
  $(".modal").hide();
  
    });
$("#fam").change(function(){
   var fam_input=$("#fam").val();
   if (fam_input=="Yes") {
     $("#family_form").show();  
   }else{
     $("#family_form").hide(); 
   }


       });










$("#add_product").click(function(){
   $("#out1_upload").hide();    
 $("#process_upload").show();
  $("#add_product").hide();


       });


var cid=<?php  echo json_encode($uid);?>;

   $('form[name="upload_image"]').on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "pro_upload_pic.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){

$("#process_upload").hide();
$("#out1_upload").html(data);
  $("#out1_upload").show();
   $("#add_product").show();
  var input=$('#set').val();
  // alert(data);
 if (input=="success") {
  window.location.href="book_index.php"

}

},
error: function(){
    
    $("#process_upload").hide();
     $("#add_product").show();
    alert('Connection Time Out:Network Error,Check Your Network Connection And Try Again..');
}           
});
}));
 // $("#add_product1").click(function(){
 // $('#modal-xl').modal({ show: true });
 //    });
  
  });


var pic_image = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('pic');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

<script>







</script>

<style type="text/css">
#family_form{
    display: none;
  } 
#process_upload{
    display: none;

   }
#out1_upload{
  display: none;
}
.responsive_img {
  width: 100%;
  max-width: 400px;
  height: auto;
}

</style>
 
<body >


  <!-- Navbar -->




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        
        <div class="row">
  









<div class="modal fadeIn" id="update_address" >
        <div class="modal-dialog fadeIn">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title">Update Address</h4> -->
              <h4> Update Address Book: <?php echo $firstname1." ".$lastname1;  ?> </h4>
       
       
              <div id="accessg"></div>
              <button type="button" class="btn btn-right " id="startexam" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="closetab">Close</span>
              </button>
            </div>
            <hr>
             <form method="post" name="upload_image">
            <div class="modal-body">
              <div class="card-body">
                        <div class="row">
                <div class="col-md-12 col-sm-12  " >
                  <div class="form-group">
                   <div id="pic_label">  
                   	<input type="text" name="name" value="<?php echo $name?>" hidden>
                   	  	<input type="text" name="uid" value="<?php echo $uid?>" hidden>
                   		<input type="text" name="del_image" value="<?php echo $del_image?>" hidden>
       <img id="pic"  src="<?php echo $pic;  ?>" class="responsive" alt="select image" >
    </div>
<input type="file" accept="image/*" name="pic" id="testm" onchange="pic_image(event)">
                  </div>
                </div>
                 
               

               

</div>

                  
  <br>
  <div class=" bg-warning">

<div id="process_upload">
  <img src="image/loader.gif" width="50px" height="50px">


</div>
  <div id="out1_upload"></div>

</div>
<br>

<input type=submit id="add_product" class="btn btn-success_submit" name="add_product" value="Add" style="width:100%;">


       </div>

                  </div>


                 </form>
                </div>
              
            
            
            <div class="modal-footer justify-content-between">
             <!--  <button type="button" class="btn btn-outline-light" id="startexam" data-dismiss="modal">Close</button> -->
             <!--  <button type="button" class="btn btn-outline-light">Save changes</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->





            
       










              <!-- /.card-header -->
              <!-- form start -->
          
               
<?php
// include('pro.php');


?>
         
          
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->


</body>
</html>
