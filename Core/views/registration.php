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
		<form enctype="multipart/form-data" action="index.php?action=registration" method="post" class="registration">
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
		    	<label for="newsletter">Envoyez un courrier de confirmation</label>
		    	<input type="checkbox" name="newsletter" class="form-control" id="newsletter">
		  	</div>
		  	<div class="form-group">
		    	<label for="photo">photo de profil<span class="etoile">&nbsp;*</span></label>
		    	<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
		    	<input id="photo" name="photo" type="file">
		  	</div>
			 <button id="bt_registration" type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>