<?php
    include_once("wp-config.php");

    // fetch data from the database
    $sql = "SELECT * FROM add_and_delete;";
    $result = mysqli_query($connection,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="junior_dev_test_styles.css" rel="stylesheet">
  <title>Product</title>
 </head>
<body>

        <nav class = "navbar">
            <div class= "containers">
                <h1> Product List</h1>
                <div class="containers_1">
                    <hr>
                </div>
            </div>
            <div class= "container_buttons" >

                <a href="./junior_dev_test_product_page.php">

                    <button type="submit" name="add">ADD</button>

                </a>

                <form method="post">
                <div >
                    <button type="submit" name="delete"  id="#delete-product-btn" value="delete selected">MASS DELETE</button>
                </div>
                




            </div>



        </nav>



<?php
if($result){
    // displaying results from the database
    while ($row = mysqli_fetch_assoc($result))  {

?>


        <div class="Listed-products">
            <div class="Listed-products_container">
                <div class="Text-container">

                    <input type="checkbox" class="delete-checkbox" name="chk_id[]" value="<?php echo $row["id"]?>">
                    <p class = "sku"> <?php  echo $row["sku"]; ?></p>
                    <p class = "name"><?php  echo $row["name"]; ?></p>
                    <p class = "price"><?php  echo $row["price"];?> $</p>

                    <?php
                    if($row['size'] > 0) {
                        echo "Size: " . $row['size'] . "MB";
                    }
                    if ($row['weight'] > 0){
                        echo "Weight: " . $row['weight'] . "KG";
                    }
                    if ($row['height'] > 0) {
                        echo "Dimension: " . $row['height'] . "X" . $row['width'] . "X" . $row['length'];
                    }
                    ?>
                </div>
                
            </div>
        </div>
<?php

    };
}
?>

 

<?php
 //delete
if(isset($_POST['delete'])) {

     $box = $_POST['chk_id'];
     foreach ($box as $key=> $val)
     {
         mysqli_query($connection, "DELETE FROM add_and_delete WHERE id=$val");
     }


?>
<script type="text/javascript">
    window.location.href=window.location.href;
</script>

<?php
}
?>
                </form>


<div class="footer">
    <hr>
    <h4> Scandiweb Test Assesment</h4>
</div>
</body>
</html>
