<?php
include('conn_book.php');
$list_individaul = new DB_con();


  if (isset($_GET['otp'])) {

$uid=clean($_GET['otp']);
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
                  $family_unit=$row['family_id'];
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


$("#fam").change(function(){
   var fam_input=$("#fam").val();
   if (fam_input=="Yes") {
     $("#family_form").show();  
   }else{
     $("#family_form").hide(); 
   }


       });










$("#add_product").click(function(){
   $("#out1").hide();    
 $("#process").show();
  $("#add_product").hide();


       });


var cid=<?php  echo json_encode($uid);?>;

    $("form").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "pro_update_address_book.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){

$("#process").hide();
$("#out1").html(data);
  $("#out1").show();
   $("#add_product").show();
  var input=$('#set').val();
  // alert(data);
 if (input=="set") {
  window.location.href="update_address_book.php?otp="+cid

}

},
error: function(){
    
    $("#process").hide();
     $("#add_product").show();
    alert('Connection Time Out:Network Error,Check Your Network Connection And Try Again..');
}           
});
}));
 $("#add_product1").click(function(){
 $('#modal-xl').modal({ show: true });
    });
  
  });
</script>

<script>
var gender1=<?php  echo json_encode($gender);?>;
function gender() {

  document.getElementById('gender').value=gender1;
}
var family_unit1=<?php  echo json_encode($family_unit);?>;
function family_unit() {

  document.getElementById('family_unit').value=family_unit1;
}




</script>

<style type="text/css">
#family_form{
    display: none;
  } 
#process{
    display: none;

   }
#out1{
  display: none;
}
.responsive_img {
  width: 100%;
  max-width: 400px;
  height: auto;
}

</style>
 
<body  onload="gender(), family_unit()">
<div class="header">
   <li ><a href="book_index.php">Home</a></li>
              
</div>

  <!-- Navbar -->




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <center><h4> Update Address Book:<?php echo $firstname1." ".$lastname1;  ?> </h4></center>
        <hr>
        <a href="book_index.php" class="btn btn-success" style="width: 20%"> Back To Address Book</a>
        <div class="row">
  













<div class="content-wrapper">
            <form method="post">
            <div class="modal-body">
              <div class="card-body">
                        <div class="row">
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="firstname" value="<?php echo $firstname1;?>" >
                  </div>
                </div>
                 
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="lastname" value="<?php echo $lastname1;?>">
                  </div>
                </div>
               
                

                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth</label>
                    <input type="Date" class="form-control" id="exampleInputEmail1" name="dob" value="<?php echo  $dob;?>">
                  </div>
                </div>
                 


                 <div class="col-md-6 col-sm-12  ">
                  
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                                      <option value="">---select gender---</option>
                                      <option value="Male"> Male</option>
                                      <option value="Female"> Female</option>
                                      <option value="Other"> Other</option>

                                    </select>
                    
                  </div>


                 

                
                </div>

               
                  


                

               

                 <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Street</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="street"value="<?php echo $street;?>" >
                  </div>
                </div>

               

               
                


  

                 <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">House Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="house_number"value="<?php echo $house_number;?>" >
                  </div>
                </div>




<div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Zip Code</label>
                    <input type="TEXT" class="form-control" id="exampleInputEmail1" name="zip_code" value="<?php echo $zip_code;?>" >
                  </div>
                </div>


                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">City.</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="city"  value="<?php echo $city;?>" >
                  </div>
                </div>

                 <div class="col-md-6 col-sm-12  ">
                  
                  
                   
                   
                   <div class="form-group"  >
                      <label for="exampleInputEmail1">Country</label>
                     <select name="country" class="form-control">
         <option value="">Please Select Country</option>
<?php echo '<option value="'.$country.'" selected>'.$country.'</option>'?>
         <option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bonaire">Bonaire</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island (Bouvetoya)">Bouvet Island (Bouvetoya)</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory (Chagos Archipelago)">British Indian Ocean Territory (Chagos Archipelago)</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Canada">Canada</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote d&#39;Ivoire">Cote d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curaçao">Curaçao</option><option value="Cyprus">Cyprus</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea">Korea</option><option value="Korea">Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyz Republic">Kyrgyz Republic</option><option value="Lao People&#39;s Democratic Republic">Lao People's Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestinian Territory">Palestinian Territory</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Islands">Pitcairn Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Barthelemy">Saint Barthelemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Martin">Saint Martin</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Sint Maarten (Netherlands)">Sint Maarten (Netherlands)</option><option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Sudan">South Sudan</option><option value="South Georgia &amp; S. Sandwich Islands">South Georgia &amp; S. Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard &amp; Jan Mayen Islands">Svalbard &amp; Jan Mayen Islands</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="U.S. Virgin Islands">U.S. Virgin Islands</option><option value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
</select>
                    
                  
                </div>


                 

                
                </div>


                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_number" value="<?php echo $mobile_number;?>">
                  </div>
                </div>


                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone_number" value="<?php echo $phone_number;?>">
                  </div>
                </div>

                 <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $email;?>">
                  </div>
                </div>
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instant Message Id </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="instant_id" value="<?php echo $instant_id;?>" >
                     <input type="text" class="form-control" id="exampleInputEmail1" name="uid" value="<?php echo $uid;?>" style="display: none;">
                  </div>
                </div>

                  <div class="col-md-6 col-sm-12  ">
                  
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Do Have A Family</label>
                    <select class="form-control"  name="fam" id="fam">
                                      <option value="">---select---</option>
                                      <option value="Yes"> Yes</option>
                                      <option value="NO"> NO</option>
                                     

                                    </select>
                    
                  </div>


                 

                
                </div>

                <div class="col-md-12 col-sm-12  " id="family_form">
                  
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Select Your Famliy Name</label>
                    <select class="form-control" id="family_unit" name="family_unit">
                                      <option value="">---select---</option>
                                      <option value="Not Present">Family name not present</option>
                                      <?php
$family_results=$list_individaul->list_family($connect);
if ($family_results) {
 foreach ($family_results as $row) {
   echo' <option value="'.$row['family_rep'].'">'.ucfirst($row['family_name']).'</option>';
 }
}else{

}

                                     ?>
                                      </select>
                                     
                                     

                                    
                    
                  </div>


                 

                
                </div>

</div>

                  
  <br>
  <div class=" bg-warning">

<div id="process">
  <img src="image/loader.gif" width="50px" height="50px">


</div>
  <div id="out1"></div>

</div>
<br>

<input type=submit id="add_product" class="btn btn-success_submit" name="add_product" value="Add" style="width:100%;">


       </div>

                  </div>


                 
                </div>
              </form>
            
    
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
         
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
  
    </section>
  </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php
include('footer.php');
  ?>
</div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->


</body>
</html>
