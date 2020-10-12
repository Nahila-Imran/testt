<?php 
include("header.php"); 
include("config.php");
$errors = array();
$message ='';

if(isset($_POST['submit'])) {
	$username = isset($_POST['username'])?$_POST['username']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';
	$repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
	$email = isset($_POST['email'])?$_POST['email']:'';

	$ql1 =  "SELECT * FROM users WHERE username='".$username."'";
	$ql2 = "SELECT * FROM users WHERE  email='".$email."'";

	$res1 = $conn->query($ql1);
	$res2 = $conn->query($ql2);

	$cnt1 = mysqli_num_rows($res1);
	$cnt2 = mysqli_num_rows($res2);

	if($cnt1 == 1 || $cnt2 == 1){
		echo '<script>alert("Already Registerd Record !!!")</script>';
	//	echo '<script>return</script>';
	}
	if($cnt1 == 0 && $cnt2 == 0)
	{
		if($password != $repassword) {
			$errors[] = array('input'=>'password','msg'=>'Password doesnt match');
		}
		if(sizeof($errors) == 0)
		{
			$sql = "INSERT INTO users (`username`, `password`, `email`) VALUES ('".$username."', '".$password."', '".$email."')";
			if ($conn->query($sql) === TRUE)
			{
				echo '<script>alert("User Registerd Successfully !!!")</script>';
			} else {
 				$errors[] = array('input'=>'form', 'msg'=>$conn->error);
			}
		$conn->close();
		}
	}
}
?>
	<div id="message">
		<?php echo $message; ?>
	</div>
	<div id= "errors">
		<?php if(sizeof($errors)>0) : ?>
			<ul>
			<?php foreach($errors as $err): ?>
				<li><?php echo $err['msg']; ?></li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	
	<div id="wrapper">
		<div id="signup-form">
		
			<h1>Sign Up</h1>
			<form action="contact.php" method="POST">
				<p>
					 <label for="username" class="lab">Username: <input type="text" name="username" required id="inp"></label>
				</p>
				<p>
					<label for="password" class="lab">Password: <input type="password" name="password" required id="inp"></label>
				</p>
				<p>
					<label for="repassword" class="lab">Re-Password: <input type="password" name="repassword" required id="inp1"></label>
				</p>
				<p>
					<label for="email" class="lab">Email: <input type="email" name="email" required id="inp2"></label>
				</p>
				<p>
					<input type="submit" name="submit" value="Submit">
					
				</p>
			</form>
		</div>


<?php include("footer.php"); ?>