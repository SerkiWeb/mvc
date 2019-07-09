<div class="user">
	<h1 class="bg-info">Mon profil</h1>
	<p class="text-info">
		vos informations personnelles
	</p> 
<table class="table">
	<tbody>
		<tr>
			<td>nom</td>
			<td><input class="form-control" type="text" name="nom" value="<?php echo($user['nom']); ?>" readonly></td>		
		</tr>
		<tr>
			<td class="col-md-2">password</td>
			<td class="col-md-9">
				<input class="form-control" type="password" name="password" value="<?php echo($user['password']); ?>" readonly>
			</td>
		</tr>
		<tr>
			<td>photo</td>
			<td><img src="uploads/"<?php echo($user['nom_photo']) ?> ></td>
		</tr>
	</tbody>
</table>
</div>