<div class="container-fluid mt-5">
    <div class="card mx-auto text-center" style="width: 50%;">
        <div class="card-header">
            Authentification
        </div>
        <form action="index.php?ctl=connexion&action=veriflogin" method="post">
            <!-- Vertical -->
            <div class="form-group">
                <input type="text" name="myEmail" class="form-control" placeholder="Email">
                <input type="text" name="myPassword" class="form-control" placeholder="Password">
                <button type="submit" class="mt-1 btn btn-primary pb-2">Connecter</button>
            </div>
        </form>
		<hr>

<form action="index.php?ctl=connexion&action=forgotpassword" method="post">
	<div class="form-group">
		<input type="text" name="recoverEmail" class="form-control" placeholder="Email pour récupérer le mot de passe" required>
		<button type="submit" class="mt-1 btn btn-secondary pb-2">Mot de passe oublié ?</button>
	</div>
    <div class="container">
    <!-- Texte cliquable avec une marge en haut -->
    <a href="#" class="mt-3 d-block text-decoration-none text-primary">
      Cliquez ici pour changer votre mot de passe 
    </a>
  </div>
</form>
    </div>

    <?php
    if (isset($_GET['msgPwd'])) {
        echo $_GET['msgPwd'];
    }
    ?>
</div>

