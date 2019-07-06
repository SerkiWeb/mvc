<div>
	<h1 class="bg-info">Mon profil</h1>
	<p class="text-info">
		vos informations personnelles
	</p> 
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
			<th>password</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo($user['nom']); ?></td>
			<td><?php echo($user['password']); ?></td>
		</tr>
	</tbody>
</table>
</div>