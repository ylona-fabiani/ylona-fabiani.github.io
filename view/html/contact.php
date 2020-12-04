<form action="index.php" method="get">
    <div>
        <div>
            <label>Nom <em>*</em> :</label>
            <input type="text" name="nom" required pattern="[a-zA-Z -']*" placeholder=" Ex : Dupont">
        </div>

        <div>
            <label>Prénom <em>*</em> :</label>
            <input type="text" name="prenom" required pattern="[a-zA-Z -']*" placeholder=" Ex : Robert">
        </div>

        <div>
            <label>Adresse<img src="./amongUS/img/vertLight.png" id="vertClair" onclick="tuerVertClair()" style="width: 5%;height: 5%">mail <em>*</em> :</label>
            <input type="email" name="email" required pattern="[a-zA-Z0-9._-]+@[a-z0-9.-]+\.[a-z]{2-4}" placeholder=" Ex : robertdupont@gmail.com">
        </div>

        <div>
            <label>Code postal <em>*</em> :</label>
            <input type="text" name="codep" required pattern="[0-9]*" placeholder=" Ex : 34000">
        </div>

        <div>
            <label>Pays :</label>
            <select>
                <option value="" disabled selected>Choisissez..</option>
                <option value="Al">Allemagne</option>
                <option value="Be">Belgique</option>
                <option value="Es">Espagne</option>
                <option value="Fr">France</option>
                <option value="It">Italie</option>
                <option value="Su">Suisse</option>
            </select>
        </div>

        <div>
            <label>Date à laquelle vous souhaitez être recontacté <em>*</em> :</label>
            <input type="date" name="date" required>
        </div>

        <div>
            <label>Vous avez entendu parler de nous via... ?</label>
            <select>
                <option value="" disabled selected>Choisissez...</option>
                <option value="reseaux">Les réseaux sociaux (Facebook, Twitter, Instagram...)</option>
                <option value="ami">Un ami, la famille</option>
                <option value="pub">Une publicité sur internet, à la télé, dans un magazine</option>
                <option value="autre">Autre</option>
            </select>
        </div>

        <div>
            <label>Besoin de nous laisser plus de renseignements ?</label>
            <textarea name="msg_user" placeholder="Ecrivez votre message ici..." maxlength="180" rows="4" cols="50"></textarea>
        </div>

        <p><em>*</em> Ce champ est requis.</p>

        <div>
            <input type="hidden" name="controller" value="contact">
            <input type="hidden" name="action" value="redirection">
            <input type="submit" value="Envoyer" class="button">
        </div>
    </div>
</form>
