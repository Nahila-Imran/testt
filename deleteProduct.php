<?php include("config.php");
session_start();

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION['shopping_cart'] as $key => $value)
		{
			if($value["id"] == $_GET["id"])
			{
				unset($_SESSION['shopping_cart'][$key]);
				echo '<script>alert("Product Deleted Successfully!!!")</script>';
				echo '<script>window.location="add-to-cart.php"</script>';
			}
		}
    }
}