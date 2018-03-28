<?php include 'includes/nav-inc.php' ?>

	<div class = "col-md-6 m-auto">
	<form action ="create" method="post" class = "ajax">
	  <div class="form-group">
	    <label for="firstname">First Name</label>
	    <input type="text" name="first_name" class="form-control" id="firstname"  placeholder="First Name">
	  </div>	
	  <div class="form-group">
	    <label for="lastname">Last Name</label>
	    <input type="text" name="surname" class="form-control" id="lastname" placeholder="Last Name" required>
	  </div>	
	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" name ="email" class="form-control" id="email" placeholder="Enter email" required>
	  </div>
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" name="username" class="form-control" id="username"  placeholder="Username" required>
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required >
	  </div>
	  <button type="submit" id="button" class ="btn btn-success btn-lg float-right">Submit</button>
	</form>

	<br>
	<br>
	<br>
	
	<?php if($insert === TRUE) :?>
	<div class="alert alert-success" role="alert">
 	 <h4 class ="h4">The data has been submitted successfully</h4>
	</div>
	<?php endif?>
<?php include 'includes/footer-inc.php' ?>


