<div>
	<h1 class="bg-info">Utilisateurs</h1>
	<p class="text-info">
		Tableau des utilisateurs du site de démonstration ...
	</p> 
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nom</th>
			<th>password</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user) { ?>
		<tr>
			<td><?php echo($user['nom']); ?></td>
			<td><?php echo($user['password']); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>