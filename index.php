<?php
include("header.php"); 
include("config.php");
?>

<div id="main">
<div id="message"></div>
	<div id="products">
	
    <?php
        $sql =  "SELECT * FROM products ORDER BY id ASC";
	    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
  ?>
           
		
	    <div class="product">
			<img src="<?php echo $row["image"];?>">
			<h3 class="title"><a href="#"><?php echo $row["product_name"];?></a></h3>
			<span>Price: $<?php echo $row["price"];?>.00</span>
		
			<form  method = "POST" action = "add-to-cart.php?action=add&id=<?php echo $row["id"];?>">

				<p style = "margin-left: 75px;">Quantity:<input type="text" name = "quantity"  value="1" class= "input"/></p>
				<input type	= "hidden" name="pid" value= "<?php echo $row["id"];?>"/>	
				<input type	= "hidden" name="pname" value= "<?php echo $row["product_name"];?>"/>
				<input type= "hidden" name="pprice" value= "<?php echo $row["price"];?>"/>
				<input type= "hidden" name="pimage" value= "<?php echo $row["image"];?>"/>
				<input type= "hidden" name="pcode" value= "<?php echo $row["product_code"];?>"/>
		
				<input type= "submit" class="add-to-cart" name = "add-to-cart" value= "Add To Cart">
			</form>	
		</div>
<?php	}
	}
?>
	</form>	
	</div>
</div>

<?php include("footer.php"); ?>	
