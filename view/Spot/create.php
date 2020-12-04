<form method="GET" action="index.php">
	<div>
		<legend>Formulaire de création de spot :</legend>
		<div>
			<label for="id_spot">Identifiant du Spot <em>*</em> : </label>
			<input type="number" placeholder="Ex : 12" name="id_spot" id="id_spot" required/>
		</div>
		<div>
			<label for="nom"> Nom <em>*</em> :</label>
			<input type="text" placeholder="Ex : Grammond" name="nom" id="nom" required/>
		</div>
		<div>
			<label for="commune"> Commune <em>*</em> :</label>
			<input type="text" placeholder="Ex : Grigny" name="commune" id="commune" required/>
		</div>
        <p><em>*</em> Ce champ est requis.<img src="./amongUS/img/bleu.png" id="bleu" class="amongUS" onclick="tuerBleu()" style="height: 3%; width: 3%"></p>
		<div>
			<input type='hidden' name='action' value='created'>
            <input type='hidden' name='controller' value='spot'>
			<input type="submit" value="Envoyer" class="button" />
		</div>
	</div>
</form>