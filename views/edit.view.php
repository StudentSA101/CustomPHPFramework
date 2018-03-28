<?php include 'includes/nav-inc.php' ?>

	<?php foreach ($user as $data) : ?> 
		
	<div class = "col-md-6 m-auto">
	<form method="POST" action="create" class="ajax" >
	  <div class="form-group">
	    <label for="firstname">First Name</label>
	    <input type="text" name="first_name" class="form-control" id="firstname" value="<?= $data->first_name ?>"  placeholder="<?= $data->first_name ?>">
	  </div>	
	  <div class="form-group">
	    <label for="lastname">Last Name</label>
	    <input type="text" name="surname" class="form-control" id="lastname" value="<?= $data->surname ?>" placeholder="<?= $data->surname ?>" required>
	  </div>		
	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" name ="email" class="form-control" id="email" value ="<?= $data->email ?>"  placeholder="<?= $data->email ?>" required>
	  </div>
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" name="username" class="form-control" id="username" value="<?= $data->username ?>"  placeholder="<?= $data->username ?>" required>
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" name="password" class="form-control" id="password" value="<?= $data->password ?>" placeholder="<?= $data->password ?>" required >
	  </div>
	  <button type="submit" id="button" class ="btn btn-success btn-lg float-right rounded col-3">Submit</button>
	</form>
	<?php endforeach?>

	<?php if($update === TRUE) :?>
		<br>
		<br>
		<br>
	<div class="alert alert-success" role="alert">
 	 <h4 class ="h4">The data has been edited successfully</h4>
	</div>
	<?php endif?>
<?php include 'includes/footer-inc.php' ?>


