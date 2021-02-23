<?php
	session_start();
	if(isset($_SESSION['name']))
	{
		include "layouts/header2.php"; 
		include "config.php"; 
		
		$sql="SELECT * FROM `chat`";

		$query = mysqli_query($conn,$sql);

		$data = null;
?>
	<html> 
	<head> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
		
		<script>
			$(document).ready(function(){
				$("#button").click(function(){
					var msg = document.getElementById("msg").value;

					if(msg == "get all employee details"){
						var div1 = document.createElement("div");
						div1.style.backgroundColor = "#d11d53";
						div1.style.color = "white";
						div1.style.borderRadius = "5px";
						div1.style.padding = "5px";
						div1.style.marginBottom = "3%";

						var div2 = document.createElement("div");
						div2.style.backgroundColor = "#431c53";
						div2.style.color = "white";
						div2.style.borderRadius = "5px";
						div2.style.padding = "5px";
						div2.style.marginBottom = "3%";

						$.getJSON( "http://localhost:9000/employee", { name: "John", time: "2pm" } )
						.done(function(data) {
							var n =  data.length;

							div1.innerHTML = "NAME___DEPARTMENT___LOCATION <br/>";

							for(var i = 0; i < n; i++){
								div1.innerHTML +=  data[i].name + "___" + data[i].dept + "___" + data[i].location + "<br/>";
							}
						});
						div2.innerHTML = "get all employee details";

						$("#chat").append(div2);
						setTimeout(function noting(){$("#chat").append(div1);},1000);
					}

					else if(msg.slice(0, 13) == "add employee "){
						var div1 = document.createElement("div");
						div1.style.backgroundColor = "#d11d53";
						div1.style.color = "white";
						div1.style.borderRadius = "5px";
						div1.style.padding = "5px";
						div1.style.marginBottom = "3%";

						var div2 = document.createElement("div");
						div2.style.backgroundColor = "#431c53";
						div2.style.color = "white";
						div2.style.borderRadius = "5px";
						div2.style.padding = "5px";
						div2.style.marginBottom = "3%";
						var detail = msg.slice(13);

						var obj = JSON.parse(detail);
						
						$.ajax({
							type: "POST",
							url: "http://localhost:9000/employee",
							contentType: "application/json",
							data: JSON.stringify(obj)
						});

						div1.innerHTML = "Employee with the name " + obj.name + " has been added.";
						div2.innerHTML = msg;
						$("#chat").append(div2);
						setTimeout(function noting(){$("#chat").append(div1);},1000);
					}

					else if(msg.slice(0, 32) == "get details of employee with id "){
						var div1 = document.createElement("div");
						div1.style.backgroundColor = "#d11d53";
						div1.style.color = "white";
						div1.style.borderRadius = "5px";
						div1.style.padding = "5px";
						div1.style.marginBottom = "3%";

						var div2 = document.createElement("div");
						div2.style.backgroundColor = "#431c53";
						div2.style.color = "white";
						div2.style.borderRadius = "5px";
						div2.style.padding = "5px";
						div2.style.marginBottom = "3%";
						var detail = msg.slice(32);

						$.getJSON( "http://localhost:9000/employee/" + detail, { name: "John", time: "2pm" } )
						.done(function(data) {
							div1.innerHTML = "NAME___DEPARTMENT___LOCATION <br/>";
							div1.innerHTML +=  data.name + "___" + data.dept + "___" + data.location + "<br/>";
						});

						div2.innerHTML = msg;
						$("#chat").append(div2);
						setTimeout(function noting(){$("#chat").append(div1);},1000);
					}
				});
			});
		</script>		
	</head>

	<style>
		h2{
			color:white;
		}
		label{
			color:white;
		}
		span{
			font-weight:bold;
		}
		.container {
			margin-top: 3%;
			width: 75%;
			background-color: #26262b9e;
			padding-right:10%;
			padding-left:10%;
		}
		.btn-primary {
			background-color: #d11d53;
			border-color: #d11d53;
		}
		.display-chat{
			height:400px;
			width:500px;
			background-color:white;
			margin-top:2%;
			margin-bottom:2%;
			overflow:auto;
			padding:15px;
		}
		.message1{
			background-color: #d11d53;
			color: white;
			border-radius: 5px;
			padding: 5px;
			margin-bottom: 3%;
		}
		.message2{
			background-color: #431c53;
			color: white;
			border-radius: 5px;
			padding: 5px;
			margin-bottom: 3%;
		}
	</style>

	<div class="container">
		<div class="display-chat" id="chat">
			<div class="message1">
				<p>
					<?php echo 'Hi ' ,$_SESSION['name']; ?>
				</p>
			</div>

			<div class="message1">
				<p>
					<?php echo 'How can i help u?'; ?>
				</p>
			</div>
		</div>

		<div class="col-sm-10">          
				<textarea id="msg" class="form-control" placeholder="Type your message here..."></textarea>
		</div>

		<div class="col-sm-2">
			<button id="button" class="btn btn-primary">Send</button>
		</div>
	</div>

<?php
	}
	else
	{
		header('location:index.php');
	}
?>