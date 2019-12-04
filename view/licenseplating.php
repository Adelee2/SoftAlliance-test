<?php	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Web Licencing App</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="pos-f-t">
		  <!-- <div class="collapse" id="navbarToggleExternalContent"> -->
		    <div class="bg-dark p-4">
		    	<a class="btn btn-primary" href="../model/Logout.php" role="button">reset</a>
		    	<a class="btn btn-primary" href="reportpage.php" role="button">View Log</a>
		    </div>
		    
		  <!-- </div> -->
		</div><hr>
		<h2 style="margin-top: 20px; margin-bottom: 30px;">Welcome to Licence plate generator</h2>
	  	<form class="form-inline" action="../model/Lgenerator.php" method="post">
			<!-- <div class="form-group mb-2">
			    <label for="" class="sr-only">Enter local government</label>
			    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
			  </div> -->
			  <!-- <div class="form-group mx-sm-3 mb-2">
			    <label for="" class="sr-only">Enter LG</label>
			    <input type="text" class="form-control" id="input" placeholder="Enter LG" name="localgov" required="required">
			</div> -->
			<div class="form-group mx-sm-3 mb-2">
                <span class="slct-bx">
                    <span><select class="form-control" name="localgov" required="required">
                                <option value=""> Select Localgovernment</option>
                                <option value="ALI">Alimosho</option>
                                <option value="MUS">Mushin</option>
                            </select></span>
                    </span>
            </div>
			<div class="form-group mx-sm-3 mb-2">
			    <label for="" class="sr-only">Number of plate num</label>
			    <input type="number" class="form-control" id="input" placeholder="Number of plate needed" name="platenum" required="required">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Generate!</button>

		</form>
		<?php if(isset($_GET['q'])) {
			$val = $_GET['q'];
		?>
		<div class="alert alert-success" role="alert">
		  <h4 class="alert-heading">Well done!</h4>
		  <p>Your licence plate number is/are <?php echo $val; ?></p>
		</div>
		<?php
		}
		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>