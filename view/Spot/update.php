<form method="GET" action="index.php">
    <fieldset>
        <legend>Formulaire de création de Compte rendu :</legend>
        <p>
            <label for="id_spot">Id Spot </label> :
            <input type="number" value="<?php echo $_GET['id_spot'] ?>" name="id_spot" id="id_spot" readonly/>
        </p>
        <p>
            <label for="nom">Spot</label> :
            <input type="text" placeholder="Ex : Bonne espérence" name="nom" id="nom" required/>
        </p>
        <p>
            <label for="commune">Commune</label> :
            <input type="text" placeholder="Ex : Jerusalem" name="commune" id="commune" required/>
        </p>
        <p>
            <input type='hidden' name='action' value='updated'>
            <input type='hidden' name='controller' value='spot'>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
