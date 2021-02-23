<?php include "layouts/header.php"; ?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  .container {
    margin-top: 5%;
    width: 50%;
    background-color: #26262b9e;
    padding-top:2%;
    padding-bottom:2%;
  }
  .btn-primary {
    background-color: #673AB7;
  }
</style>

<?php
  include "config.php";

	if($_POST)
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$sql1 = "INSERT INTO `register`(`name`, `email`, `password`) VALUES ('".$name."','".$email."','".$password."')";
		$sql2 = "SELECT * FROM `register` where `email` = '".$email."' or `name` = '".$name."'";

		$query2 = mysqli_query($conn, $sql2);

		if(mysqli_num_rows($query2) == 0)
		{
			$query1 = mysqli_query($conn, $sql1);

			if($query1){
				session_start();
				$_SESSION['name'] = $name;
				header('Location: index.php');
			}
			else{
				echo "<script> alert('Somenthing went wrong.'); </script>";
			}
		}
		else
		{
			echo "<script> alert('Username or Email already exits.'); </script>";
		}
		
	}
?>

<div class="container">

  <center><h2>Registration</h2></center></br>

  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="name">Name:</label>
	  
      <div class="col-sm-5">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
      </div>
    </div>

	  <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="email">Email:</label>
	  
      <div class="col-sm-5">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-2" for="pwd">Password:</label>
      <div class="col-sm-5">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-7">
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </div>
    </div>
  </form>
</div>
