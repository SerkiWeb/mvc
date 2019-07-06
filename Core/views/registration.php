<div class="row">
	<div class="col-md-4 offset-md-4">
		<p class="text-danger">
			Formulaire d'inscription tous les champs sont obligatoires
		</p>
		<?php if (!empty($user)) 
			{ echo('
				<p class="text-success">
					utilisateur ajoutez
				</p>
			  '); 
			}
		?>
		<form action="index.php?action=registration" method="post" class="registration">
			<div class="form-group">
		    	<label for="nom">nom<span class="etoile">&nbsp;*</span></label>
		    	<input type="text" name="nom" class="form-control" id="nom" placeholder="nom" required>
		  	</div>
		  	<div class="form-group">
		  		<label for="password">Password<span class="etoile">&nbsp;*</span></label>
		    	<input type="password" name="password" class="form-control" id="password" placeholder="Password"required>
		  	</div>
		  	<div class="form-group">
		  		<label for="conf_password">Confirmer<span class="etoile">&nbsp;*</span></label>
		  		<input type="password" name="conf_password" class="form-control" id="conf_password" placeholder="Password" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="email">Email<span class="etoile">&nbsp;*</span></label>
		    	<input type="email" name="email" class="form-control" id="email" required>
		  	</div>
		  	<div class="form-group">
		    	<label for="nom">Envoyez un courrier de confirmation<span class="etoile">&nbsp;*</span></label>
		    	<input type="checkbox" name="email_confirmation" class="form-control" id="email_confirmation" required>
		  	</div>
			 <button id="bt_registration" type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>