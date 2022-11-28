<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include_once("wp-config.php");



    if(isset($_POST["Save"])){
        
        $sku=$_POST["sku"];
        $name= $_POST["name"];
        $price= $_POST["price"];
        $type=$_POST["productType"];
        $size= $_POST["size"];
        $height= $_POST["height"];
        $width= $_POST["width"];
        $length= $_POST["length"];
        $weight= $_POST["weight"];
    
        
        

        // insert query
      $sql= "INSERT INTO `add_and_delete` (`sku`,`name`,`price`,`type`,`size`,`height`,`width`,`length`,`weight`) VALUES ('$sku','$name','$price','$type','$size','$height','$width','$length','$weight')";
      
       $result = mysqli_query($connection,$sql);
        if ($result) {
            header("Location: index.php");
            return mysqli_affected_rows($connection);        
        } else {
            echo "error";
        }
    };

    
    // if(isset($_POST['Save'])){
    //     $save = $_POST['Save'];
    //     $dvd=$_POST['Furniture'];
    //     if(empty($dvd)) {
    //         echo 'You have left size feild empty. You much enter a size.';
    //         }
        
    //     };
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="junior_dev_test_product_add_styles.css" rel="stylesheet">
  <title>Product Add</title>

</head>
<script>
// function validateForm() {
//   var x = document.forms["product_form"]["Furniture"].value;
//   if (x == "" || x == null) {
//     alert("Name must be filled out");
//     return false;
//   }
// }
// </script>

<body>
    <nav class = "navbar">
        <div class ="container">
            <h1>Product Add</h1>
        </div>

        <div class= "container_buttons" >
            <form name="product_form" method="post" id="product_form" action = "" enctype="multipart/form-data" onsubmit="return validateForm()">
                
                <button type="submit" name="Save">Save</button>
                <button type="submit" name="Cancel">Cancel</button>

        </div>
        <hr>

       <div class="main_body">
                <div class="text_lable_input">
                    <lable for="sku" class="text">SKU</lable>
                    <input type="text" id="sku" name="sku" >

                </div>
                <br>
                <div>
                    <lable for="name" class="text">Name</lable>
                    <input type="text" id="name" name="name">

                </div>
                <br>
                <div>
                    <lable for="price" class="text">Price ($)</lable>
                    <input type="text" id="price" name="price">

                </div>
                <br><br>



                <div class = "text_lable_input">
                    <lable for="productType" >Type</lable>
                    <select name="productType" id="productType">

                        <option value=" " selected>-Select product type</option>
                        <option value="dvd">DVD</option>
                        <option value="furniture">Furniture</option>
                        <option value="book">Book</option>

                    </select><br><br>
                </div>

                <div class="type_container" id="DVD">
                    <p>Please insert the size in megabytes of the dvd.</p>
                    <lable for="size" class="text" id="DVD">Size (MB)</lable>
                    <input name="size" id="size" type="number"  placeholder = "Size MB">
                </div><br>

                <div class="type_container" id="Furniture">
                    <p>Please insert the dimensions HxWxL in centimeters (cm).</p>
                    <lable for="height" class="text" id="furniture">Height (CM)</lable>
                    <input name="height" id="height" type="number" placeholder = "Height">
                    <br>
                    <lable for="width" class ="text" id="furniture" >Width (CM)</lable>
                    <input name="width" id="width" type="number" placeholder = "Width">
                    <br>
                    <lable for="length" class="text" id="furniture">Length (CM)</lable>
                    <input name="length" type="number" id="length"  placeholder = "Length">
                    <br>

                </div><br>
                <div class="type_container" id="Book">
                    <p>Please insert the weight in kilograms (kg).</p>
                    <lable for="weight" class ="text" id="Book">Weight (KG)</lable>
                    <input name="weight" id = "weight" type="number" placeholder = "weight">
                </div>



            

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">
        </script>
       
        <script>

            $(document).ready(function(){

                $("#productType").on('change', function(){
                    if($(this).val() == "dvd"){
                        $('#DVD').show();
                        $('#Furniture').hide();
                        $('#Book').hide();

                    }else if ($(this).val() == "furniture") {
                        $('#Furniture').show();
                        $('#DVD').hide();
                        $('#Book').hide();
                    } else {
                        $('#Book').show();
                        $('#DVD').hide();
                        $('#Furniture').hide();
                    }
                });

            });


        </script>
            </form>
</body>
</html>
