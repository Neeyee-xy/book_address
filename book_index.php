<?php
include('conn_book.php');
$list_family_unit = new DB_con();

 


if (isset($_GET['end'])) {

 $end=clean($_GET['end']);
$end_in_in=$end;
$end=$end*10;
$start=$end-10;

}else{
  $end=1;
  $end_in_in=$end;
$end=$end*10;
$start=$end-10;

}

$qry="SELECT * from book_sheet INNER JOIN family  where book_sheet.family_id=family.family_rep   ";
$stat=$connect->prepare($qry);
$stat->execute();
$count_rep=$stat->rowCount();


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
  
</style>
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





       
    


   $('form[name="individual"]').on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "pro_address_book.php",
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
  // alert(input);
 if (input=="success") {
  window.location.href="book_index.php"

}else if(input=="set1") {
  window.location.href="book_index.php"

}

},
error: function(){
    
    $("#process").hide();
     $("#add_product").show();
    alert('Connection Time Out:Network Error,Check Your Network Connection And Try Again..');
}           
});
}));

   $("#upload_csv_in").click(function(){
   $("#out2").hide();    
 $("#process2").show();
  $("#upload_csv_in").hide();


       });

    $('form[name="upload_csv"]').on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "pro_upload.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){

$("#process2").hide();
$("#out2").html(data);
  $("#out2").show();
   $("#upload_csv_in").show();
  var input=$('#set').val();
  // alert(input);
 if (input=="success") {
  window.location.href="book_index.php"

}else if(input=="set1") {
  window.location.href="book_index.php"

}

},
error: function(){
    
    $("#process2").hide();
     $("#upload_csv_in").show();
    alert('Connection Time Out:Network Error,Check Your Network Connection And Try Again..');
}           
});
}));





    $("#upload_csv_in_3").click(function(){
   $("#out3").hide();    
 $("#process3").show();
  $("#upload_csv_in_3").hide();


       });

    $('form[name="upload_csv_family"]').on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "pro_upload_family.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){

$("#process3").hide();
$("#out3").html(data);
  $("#out3").show();
   $("#upload_csv_in_3").show();
  var input=$('#set').val();
  // alert(input);
 if (input=="success") {
  window.location.href="book_index.php"

}else if(input=="set1") {
  window.location.href="book_index.php"

}

},
error: function(){
    
    $("#process3").hide();
     $("#upload_csv_in_3").show();
    alert('Connection Time Out:Network Error,Check Your Network Connection And Try Again..');
}           
});
}));






    $("#upload_csv_in_4").click(function(){
   $("#out4").hide();    
 $("#process4").show();
  $("#upload_csv_in_4").hide();


       });

    $('form[name="upload_csv_family_rep"]').on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "pro_upload_family_rep.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){

$("#process4").hide();
$("#out4").html(data);
  $("#out4").show();
   $("#upload_csv_in_4").show();
  var input=$('#set').val();
  // alert(input);
 if (input=="success") {
  window.location.href="book_index.php"

}else if(input=="set1") {
  window.location.href="book_index.php"

}

},
error: function(){
    
    $("#process4").hide();
     $("#upload_csv_in_4").show();
    alert('Connection Time Out:Network Error,Check Your Network Connection And Try Again..');
}           
});
}));


 $("#add_product1").click(function(){
$("#modal-xl_1").show();
    });

 $("#add_product2").click(function(){
  $("#modal-xl_2").show();
    });

 $("#add_product3").click(function(){
  $("#modal-xl_3").show();
    });

  $("#add_product4").click(function(){
  $("#modal-xl_4").show();
    });

 $(".btn-right").click(function(){
  $(".modal").hide();
    });


  
  });
</script>

<script>


</script>

<style type="text/css">

  
</style>
 
<body>
<div class="header">
   <li ><a href="book_index.php">Home</a></li>
              
</div>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <center><h4>Address Book List</h4></center>
        <hr>
        
        <div class="row">
          <button type=submit id="add_product1" class=" btn btn-success" name="login" value=""  >
            Add  Address
          </button>
          <input type=submit id="add_product2" class="btn btn-success" name="login" value="Upload CSV File(New Family Rep)" >

          <input type=submit id="add_product4" class="btn btn-success" name="login" value="Upload CSV File(Existing Family Rep )" >

          <input type=submit id="add_product3" class="btn btn-success" name="login" value="Upload CSV File(Family Table)" >
           <a class='link  btn-success' href='export_csv.php'>Download CSV File(Family Rep)</a>
            <a class='link  btn-success' href='export_csv_family.php'>Download CSV File(Family)</a>
            <a class='link  btn-success' href='print_layout.php' target="_blank" >View Print layout</a>

        </div>
        <p>Total record: <?php echo $count_rep?>,  showing  <?php echo $start?> to <?php echo $end?>  </p>
<div class="table_wrapper" >

          <?php
 echo "<table id='example1' class='table table-bordered table-striped'>
  <thead> 
  <tr>
  <th style='width:100px;'>Action </th>
  <th>First name</th>
  <th>Last name</th>
  <th>Family Rep</th>
  <th>Date of brith</th>
  <th>Gender</th>
  <th>Street</th>
  <th>House name</th>
  <th>Zip code</th>
  <th>City</th>
  <th>Country</th>
  <th>Mobile number</th>
  <th>Phone number</th>
  <th>Email</th>
  <th>Instant message ID</th>

 
  
  
  

  </tr>

</thead> 
<tbody> 
  ";


  // code...
  // var_dump($list_address_book_out);






$list_address_book_out=$list_family_unit->list_address_book($connect,$end,$start);
echo "</tbody> </table>";



?>
</div>
<div>
<center>
<?php
if ($count_rep==0) {
  echo "No Item Found";
}
$page=$count_rep/10;
$pn=$end_in_in;
  $end_end= ceil($page) ;
$end_end_in=$end_in_in-1;
 $endd="book_index.php?start=0&end=".$end_end_in."";
  $begin="book_index.php?start=0&end=1";
$active="";

if (($end_end > 1) && ($pn > 1)) {
echo "<a  href='book_index.php?start=0&end=".$end_end_in."'style='background:red;color:white;height:30px;padding:10px;margin:5px;margin-top:70px;position:relative;'>&#10094; Previous</a>";

}




// var_dump($pn);

if (($pn - 1) > 1) {
    echo "
    <a href='book_index.php?start=0&end=1' style='background:red;color:white;height:30px;padding:10px;margin:5px;margin-top:70px;position:relative;'>1</a>
                <a style='background:red;color:white;height:30px;padding:10px;margin:5px;margin-top:70px;position:relative;'>...</a>";

}
for ($i = ($pn - 1); $i <= ($pn + 1); $i ++) {
    if ($i < 1)
        continue;
    if ($i > $end_end)
        break;
    if ($i == $pn) {
        $active="active11";
    } else {
        $active="";
    }

echo '



<a  href="book_index.php?start=0&end='.$i.'" style="background:red;color:white;height:30px;padding:10px;margin:5px;margin-top:70px;position:relative;"class="'.$active.'">'.$i.'</a>





';
}
if (($end_end - ($pn + 1)) >= 1) {
  
    echo "<a style='background:red;color:white;height:30px;padding:10px;margin:5px;margin-top:70px;position:relative;'>...</a>";

}

if (($end_end - ($pn + 1)) > 0) {
    if ($pn == $end_end) {
         $active="active11";
    } else {
        $active="";
    }
    echo '
    <a href="book_index.php?start=0&end='.$end_end.'">
    <a class="'. $active.'" style="background:red;color:white;height:30px;padding:10px;margin:5px;margin-top:70px;position:relative;">'.$end_end.'</a></a> 
    ';
}
if (($end_end > 1) && ($pn < $end_end)) {
  $tt=$pn+1;
       echo '<a href="book_index.php?start=0&end='.$tt.'" style="background:red;color:white;height:30px;padding:10px;margin:5px;margin-top:70px;position:relative;">Next &#10095;</a>';
        
    }

        ?>
</div>

</center>
<div class="content-wrapper" >


 <div class="modal fadeIn" id="modal-xl_1" >
        <div class="modal-dialog fadeIn">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Address</h4>
              <div id="accessg"></div>
              <button type="button" class="btn btn-right " id="startexam" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="closetab">Close</span>
              </button>
            </div>
            <hr>
            <form method="post" name="individual">
            <div class="modal-body">
              <div class="card-body">
                        <div class="row">
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="firstname" >
                  </div>
                </div>
                 
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="lastname" >
                  </div>
                </div>
               
                

                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth</label>
                    <input type="Date" class="form-control" id="exampleInputEmail1" name="dob" >
                  </div>
                </div>
                 


                 <div class="col-md-6 col-sm-12  ">
                  
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Gender</label>
                    <select class="form-control" id="exampleInputEmail1" name="gender">
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
                    <input type="Text" class="form-control" id="exampleInputEmail1" name="street" >
                  </div>
                </div>

               

               
                


  

                 <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">House Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="house_number" >
                  </div>
                </div>




<div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Zip Code</label>
                    <input type="TEXT" class="form-control" id="exampleInputEmail1" name="zip_code" >
                  </div>
                </div>


                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">City.</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="city"  >
                  </div>
                </div>

                 <div class="col-md-6 col-sm-12  ">
                  
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Country</label>
                     <select id="country_name" name="country" class="form-control">
         <option value="">Please Select</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bonaire">Bonaire</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island (Bouvetoya)">Bouvet Island (Bouvetoya)</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory (Chagos Archipelago)">British Indian Ocean Territory (Chagos Archipelago)</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Canada">Canada</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Cote d&#39;Ivoire">Cote d'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curaçao">Curaçao</option><option value="Cyprus">Cyprus</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea">Korea</option><option value="Korea">Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyz Republic">Kyrgyz Republic</option><option value="Lao People&#39;s Democratic Republic">Lao People's Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestinian Territory">Palestinian Territory</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Islands">Pitcairn Islands</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Barthelemy">Saint Barthelemy</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Martin">Saint Martin</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Sint Maarten (Netherlands)">Sint Maarten (Netherlands)</option><option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Sudan">South Sudan</option><option value="South Georgia &amp; S. Sandwich Islands">South Georgia &amp; S. Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard &amp; Jan Mayen Islands">Svalbard &amp; Jan Mayen Islands</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="U.S. Virgin Islands">U.S. Virgin Islands</option><option value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>
</select>
                    
                  </div>


                 

                
                </div>


                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_number" >
                  </div>
                </div>


                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone_number" >
                  </div>
                </div>

                 <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instant Message Id </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="instant_id" >
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
$family_results=$list_family_unit->list_family($connect);
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
  <div class="col-md-12 col-sm-12 col-12 bg-warning">

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
            <div class="modal-footer justify-content-between">
             <!--  <button type="button" class="btn btn-outline-light" id="startexam" data-dismiss="modal">Close</button> -->
             <!--  <button type="button" class="btn btn-outline-light">Save changes</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </div>






      <div class="modal fadeIn" id="modal-xl_2" >
        <div class="modal-dialog fadeIn">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Address(Family Rep)</h4>
              <div id="accessg"></div>
              <button type="button" class="btn btn-right " id="startexam" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="closetab">Close</span>
              </button>
            </div>
            <hr>
            <form method="post" name="upload_csv">
            <div class="modal-body">
              <div class="card-body">
                        <div class="row">
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">CSV File</label>
                    <input type="File" class="form-control" id="exampleInputEmail1" name="import_csv" >
                  </div>
                </div>
              
</div>

                  
  <br>
  <div class="col-md-12 col-sm-12 col-12 bg-warning">

<div id="process2">
  <img src="image/loader.gif" width="50px" height="50px">


</div>
  <div id="out2"></div>

</div>
<br>

<input type=submit id="upload_csv_in" class="btn btn-success_submit" name="add_product" value="Add" style="width:100%;">


       </div>

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
      </div>






<div class="modal fadeIn" id="modal-xl_3" >
        <div class="modal-dialog fadeIn">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Address(Family Table)</h4>
              <div id="accessg"></div>
              <button type="button" class="btn btn-right " id="startexam" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="closetab">Close</span>
              </button>
            </div>
            <hr>
            <form method="post" name="upload_csv_family">
            <div class="modal-body">
              <div class="card-body">
                        <div class="row">
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">CSV File</label>
                    <input type="File" class="form-control" id="exampleInputEmail1" name="import_csv_family" >
                  </div>
                </div>
              
</div>

                  
  <br>
  <div class="col-md-12 col-sm-12 col-12 bg-warning">

<div id="process3">
  <img src="image/loader.gif" width="50px" height="50px">


</div>
  <div id="out3"></div>

</div>
<br>

<input type=submit id="upload_csv_in_3" class="btn btn-success_submit" name="add_product" value="Add" style="width:100%;">


       </div>

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
      </div>






<div class="modal fadeIn" id="modal-xl_4" >
        <div class="modal-dialog fadeIn">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Address(Existing Family Rep)</h4>
              <div id="accessg"></div>
              <button type="button" class="btn btn-right " id="startexam" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" id="closetab">Close</span>
              </button>
            </div>
            <hr>
            <form method="post" name="upload_csv_family_rep">
            <div class="modal-body">
              <div class="card-body">
                        <div class="row">
                <div class="col-md-6 col-sm-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">CSV File</label>
                    <input type="File" class="form-control" id="exampleInputEmail1" name="import_csv_family_rep" >
                  </div>
                </div>
              
</div>

                  
  <br>
  <div class="col-md-12 col-sm-12 col-12 bg-warning">

<div id="process4">
  <img src="image/loader.gif" width="50px" height="50px">


</div>
  <div id="out4"></div>

</div>
<br>

<input type=submit id="upload_csv_in_4" class="btn btn-success" name="add_product" value="Add" style="width:100%;">


       </div>

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
      </div>










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
  
  <?php
include('footer.php');
  ?>
</div>



</body>
</html>