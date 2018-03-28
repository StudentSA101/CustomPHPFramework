	<?php include 'includes/nav-inc.php' ?>
		<table class="table table-striped col-12">
			<thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">First Name</th>
			      <th scope="col">Last Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">username</th>
			      <th scope="col">password</th>
			      <th scope="col"></th>
			      <th scope="col"></th>
			    </tr>
			</thead>

			<tbody>

			  <?php foreach ($users as $user) : ?>	
			    <tr>
			      <th><?= $user->id?></th>
			      <td><?= $user->first_name?></td>
			      <td><?= $user->surname?></td>
			      <td><?= $user->email?></td>
			      <td><?= $user->username?></td>
			      <td><?= $user->password?></td> 
			      <td><span><a href=" <?php  echo 'edit/' . $user->id?>" class="btn btn-success">Edit</a><button type="submit" id="button" name=<?=$user->id?> class ="btn btn-danger delete_ajax">Delete</button></span><td>
			    </tr>
			  <?php endforeach ?>  
			</tbody>
		</table>
	<?php if($delete === TRUE) :?>
		<br>
		<br>
	<div class="alert alert-danger" role="alert">
 	 <h4 class ="h4">The data has been edited successfully</h4>
	</div>
	<?php endif?>
		
	<?php include 'includes/footer-inc.php' ?>