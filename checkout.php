<?php 
    include("config.php");
    include("header.php"); 
    session_start();

    $grandtotal=0;
    foreach($_SESSION['shopping_cart'] as $key => $value)
    {
        $grandtotal = (int)$grandtotal + ((int)$value["price"] * (int)$value["quantity"]);
        
    }	
    $date = date('F d, Y, g: i a');
    $josndata = json_encode($_SESSION['shopping_cart']);

    $sql = "INSERT INTO orders (cartdata, datetime, carttotal) VALUES ('$josndata','$date', '$grandtotal')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Inserted your order-summary successfully!!!")</script>';
    } 
      
?>  <div style ="margin-top: 8%;">
        <div style ="text-align: center;">
            <h1 style="color: #4CAF50;">Your Order Has Been Placed</h1>
                <p style="color: #3e9cbf ;">Thank you !!! for ordering with us, we'll contact you by email with your order details.</p>
                <div style ="margin-top: 3%;">  
                    <h4 style="color: gray;"><b>Delivery Charge :</b>Free</h6>
                    <h3 style="color: gray;"><b>Amount Payable : </b>$<?php echo $grandtotal?>.00</h5>
                </div>
            </div>
            <div style ="margin-left: 30%;">  
		        <div id="signup-form">
                    <h1>Cart Details</h1>
                        <form action="action.php" method="POST">
                            <p>
                                <label for="username" class="lab">Username: <input type="text" name="username" required id="inp"></label>
                            </p>
                            <p>
                                <label for="email" class="lab">Email: <input type="email" name="email" required id="inp2"></label>
                            </p>
                            <p style="margin-top: 15px;">
                                <input type="submit" name="submit" value="Confirm Order">
                            </p>
                        </form>
                    </div>
                </div>
<?php include("footer.php"); ?>
                
            
                        
                