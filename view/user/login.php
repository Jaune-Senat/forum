<h1 class="center-text">
    Connectez-vous !!
</h1>
<form class="uk-form-stacked" action="?ctrl=security&action=login" method="post">
    <p>
        <label for="mail">Votre email : </label><br>
        <input type="email" name="email" id="email" required>
    </p>
    <p>
        <label for="pass">Votre mot de passe : </label><br>
        <input type="password" name="password" id="pass" required>
    </p>
    <p>
        <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
        <input class="uk-button uk-button-primary"  type="submit" name="submit" value="CONNEXION">
    </p>
</form>