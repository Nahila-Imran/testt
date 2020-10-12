<?php
include("header.php"); 
include("config.php");
session_start();
//$total = 0;
$amount = '';


if(isset($_POST["add-to-cart"]))
{
	if(isset($_SESSION['shopping_cart']))
	{
		$item_name = array_column($_SESSION["shopping_cart"] , "name");
		if(in_array($_POST["pname"] , $item_name))
		{
			echo '<script>alert("Product already exists in your cart!!!")</script>';
			//echo '<script>window.location="manageproducts.php"</script>';
		}
	
		else
		{
			$count = count($_SESSION["shopping_cart"]);
			$id= $_POST["pid"];
			$image = $_POST["pimage"];
			$name = $_POST["pname"];
			$price = $_POST["pprice"];
			$quantity = $_POST["quantity"];
			$code = $_POST["pcode"];
			$cart = array("id" => $id, "image"=>$image , "name"=>$name , "price"=>$price, "quantity"=>$quantity , "code"=>$code);
			$_SESSION['shopping_cart'][$count] = $cart;	
		}
	}
	else
	{		
		$id= $_POST["pid"];
		$image = $_POST["pimage"];
		$name = $_POST["pname"];
		$price = $_POST["pprice"];
		$quantity = $_POST["quantity"];
		$code = $_POST["pcode"];
		$cart = array("id" => $id, "image"=>$image , "name"=>$name , "price"=>$price, "quantity"=>$quantity , "code"=>$code);
		$_SESSION['shopping_cart'][0] = $cart;
	}
}
?>


<?php echo "<br>"; ?>	

	<div style="margin: 25px 0 0 60px;">
		<table>
			<tr style="text-align: left;">
				<th>Product ID</th>
				<th>Product</th>
				<th>Product Quantity</th>
				<th>Total Price</th>
				<th>Action</th>
			</tr>
			<?php
				foreach($_SESSION['shopping_cart'] as $key => $value)
				{
					$total = (int)$total + ((int)$value["price"] * (int)$value["quantity"]);
			  	
			?>		
					<tr padding-top: 50%;>
						<td><?php echo $value['id'];?></td>
						<td>
							<img src="<?php echo $value["image"];?>" width="105px" , height="105px">
							<h3 class="title"><?php echo $value["name"];?></h3>
							<span>Price: $<?php echo $value["price"];?>.00</span>
						</td>
					
						<td><?php echo $value["quantity"];?></td>
						<td>$<?php echo (((int)$value["price"]) * ((int)$value["quantity"]));?>.00</td> 
						
                        <td><a href="deleteProduct.php?action=delete&id=<?php echo $value['id'];?>"><span>Delete</span></a></td>
					</tr>
				<?php	$amount = 'Total Amount :$'.$total.'.00'?>;
				
<?php           }     ?>
			
		</table>
	</div>	
</div>	

<p  style="margin: 20px 0 30px 250px;"><b><?php echo '<br>'; echo $amount; echo '<br>'; ?></p>

<div style="margin: 20px 350px 20px 250px;">
	<p style="float: left;"><a href="index.php"  id= "conti" ><input type="button" name="button" value="Continue Shopping"></a></p>
	<p style="float: right;"><a href="checkout.php" id= "check"><input type="button" name="button" id= "check"value="Checkout"></a></p>
</div>
<br>
<?php include ("footer.php"); ?>
