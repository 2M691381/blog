<?php $this->title = 'Inscription et Connexion au blog'; ?>

<?php
    //ENREGISTREMENT DU TOKEN
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
?>


<!-- Inscription et connexion admin et utilisateur . -->
<div class="container" id="viewConnectRegist">
	<div class="row"> 
		<h3>Venez faire vivre mon blog en vous inscrivant pour pouvoir laisser des commentaires</h3>
		<div class=" col-sm-6 col-md-6 col-lg-6">
			<form class="formregist" method="POST" action="index.php?action=addUser"> 
				<div class="form-group">
					<h1>INSCRIPTION</h1>
			    </div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Pseudo</label>
				    <input type="" class="form-control" id="exampleInputEmail1" name="login" placeholder="Pseudo" required>
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input type="" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Mot de passe</label>
				    <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Mot de passe" required>
				</div>
				<input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
				<button type="submit" class="btn btn-primary" id=btnregist>S'inscrire</button>
			</form>
		</div>
	    
	    <div class="col-sm-6 col-md-6 col-lg-6">
			<form class="formconnect" method="POST" action="index.php?action=authUser">
				<div class="form-group">
			      <h1>CONNEXION</h1>
			    </div>
				<div class="form-group">
				     <label for="exampleInputEmail1">Pseudo</label>
				     <input type="text" class="form-control" id="exampleInputEmail1" name="login" placeholder="Pseudo" required>
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input type="" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
				     <label for="exampleInputEmail1">Mot de passe</label>
				     <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Mot de passe" required>
				</div>
				<input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
				<button type="submit" class="btn btn-primary" id=btnconnect>Se connecter</button>
			</form>
	    </div>
	</div>
</div>