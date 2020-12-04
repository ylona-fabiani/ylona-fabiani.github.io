//var personne = prompt("entrez votre nom")
//alert("bonjour "+ personne +" Tu dois trouver l'imposteur");
setCookie("violet",0,2);
setCookie("bleu",0,2);
setCookie("blanc",0,2);
setCookie("rose",0,2);
setCookie("noir",0,2);
setCookie("marron",0,2);
setCookie("jaune",0,2);
setCookie("vertClair",0,2);
setCookie("bleuClair",0,2);
setCookie("vert",0,2);

setCookie("start", 0, 1);


    if (getCookie("start") === "0") {
        var prenom = prompt('Entrez votre prénom');
        var nom = prompt('Entrez votre nom');
        var result = prenom +" "+ nom;
        alert("Bienvenue "+ result +" sur BioSurfers !!! \n Je vous souhaite une bonne navigation.\n Un imposteur est caché à toi de le trouver attention à ne pas tuer tout les innocents." );
        var valCookie = getCookie("start") + 1;
        document.cookie = `start=${valCookie}`;


        // compteur = compteur +1;
    //alert(test);
    //var image = document.createElement('img');
    //image.src = "amongus.png";
   // var maDiv = document.getElementById("bleu");

   // maDiv.innerHTML = '';

    //maDiv.appendChild(image);

}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function getCookie(name){
    if(document.cookie.length == 0)
        return null;

    var regSepCookie = new RegExp('(; )', 'g');
    var cookies = document.cookie.split(regSepCookie);

    for(var i = 0; i < cookies.length; i++){
        var regInfo = new RegExp('=', 'g');
        var infos = cookies[i].split(regInfo);
        if(infos[0] == name){
            return unescape(infos[1]);
        }
    }
    return null;
}

function tuerRose() {
    var image = document.getElementById('rose');

    if (getCookie("rose") === "0") {

        var valCookie = getCookie("rose") + 1;
        document.cookie = `rose=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Vous avez zigouillez un platiste, malheureusement c'etait un collègue")
    }else alert("Tu as deja tué cette personne");
}
function tuerViolet() {
    var image = document.getElementById('violet');

    if (getCookie("violet") === "0") {

        var valCookie = getCookie("violet") + 1;
        document.cookie = `violet=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Vous avez desingué l'homme sencé")
    }else alert("Tu as deja tué cette personne");
}
function tuerVert() {
    var image = document.getElementById('vert');

    if (getCookie("vert") === "0") {

        var valCookie = getCookie("vert") + 1;
        document.cookie = `vert=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Tu as tuez le gentil petit E.T qui s'echapait de la zone51")
    }else alert("Tu as deja tué cette personne");
}

function tuerBlanc() {
    var image = document.getElementById('blanc');

    if (getCookie("blanc") === "0") {

        var valCookie = getCookie("blanc") + 1;
        document.cookie = `blanc=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Vous avez tuez la pauvre Mme LeBlanc dans le salon avec la cle anglaise")
    }else alert("Tu as deja tué cette personne");
}
function tuerJaune() {
    var image = document.getElementById('jaune');

    if (getCookie("jaune") === "0") {

        var valCookie = getCookie("jaune") + 1;
        document.cookie = `jaune=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Un reptilien est mort, c'etait un colleguos")
    }else alert("Tu as deja tué cette personne");
}

function tuerBleu() {
    var image = document.getElementById('bleu');

    if (getCookie("bleu") === "0") {

        var valCookie = getCookie("bleu") + 1;
        document.cookie = `bleu=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Ho no! Pourquoi avez vous tué le Chris Cosmique AKA Le grand Monarque ?")
    }else alert("Tu as deja tué cette personne");
}


function tuerMarron() {
    var image = document.getElementById('marron');

    if (getCookie("marron") === "0") {

        var valCookie = getCookie("marron") + 1;
        document.cookie = `marron=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Marron rime avec Franc Maçon. Un Innocent est décédé")
    }else alert("Tu as deja tué cette personne");
}


function tuerBleuClair() {
    var image = document.getElementById('bleuClair');

    if (getCookie("bleuClair") === "0") {

        var valCookie = getCookie("bleuClair") + 1;
        document.cookie = `bleuClair=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Bleu c'est le ciel, vous voyez, c'est comme si vous aviez tuez le ciel, le monde va nous tomber sur la tête, a cause de VOUS. Bref, tout ça pour dire vous avez tuez un innocent illuminati ")
    }else alert("Tu as deja tué cette personne");
}

function tuerVertClair() {
    var image = document.getElementById('vertClair');

    if (getCookie("vertClair") === "0") {

        var valCookie = getCookie("vertClair") + 1;
        document.cookie = `vertClair=${valCookie}`;

        image.src = "./amongUS/img/fantome.png";
        alert("Je vais faire chez Paul de la zone 51 ! Ha zut je l'ai tué !!!")
    }else alert("Tu as deja tué cette personne");
}

    function calculerMort(){
        var compteur = 0;
        if (getCookie("violet") !== "0") compteur+=1;
        if (getCookie("vert") !== "0") compteur+=1;
        if (getCookie("rose") !== "0") compteur+=1;
        if (getCookie("blanc") !== "0") compteur+=1;
        if (getCookie("jaune") !== "0") compteur+=1;
        if (getCookie("bleu") !== "0") compteur+=1;
        if (getCookie("marron") !== "0") compteur+=1;
        if (getCookie("bleuClair") !== "0") compteur+=1;
        if (getCookie("vertClair") !== "0") compteur+=1;
        return compteur;


    }

