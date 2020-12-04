<form method="GET" action="index.php">
        <legend>Connexion  :</legend>
        <div>
            <label for="login_id">Login <em>*</em> :</label>
            <input type="text" name="login" id="login_id" required/>
        </div>
        <div>
            <label for="mdp_id">Mot de passe <em>*</em> :</label>
            <input type="password" name="mdp" id="mdp_id" required/>
        </div>
        <p><em>*</em> Ce champ est requis.</p>
        <input type="hidden" name="controller" value="utilisateur">
        <input type="hidden" name="action" value="connected">
        <input type="submit" value="Envoyer" class="button" />
</form>