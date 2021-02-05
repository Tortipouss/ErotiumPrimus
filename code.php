<?php
if (isset($_POST['bntValider'])) {

    //Mot de passe pour valider le formulaire
    //PAS DE CARACTERE SPECIAUX DANS LE MOT DE PASSE !
    $motDePasse = 'Admlocal1';

    $nbrCharactMotDePasse = strlen($motDePasse);

    // Affichera si le code est le bon ou pas
    $_POST['texteEchecReussite'] = '';

    // Filtre l'input de l'utilisateur pour la sécurité
    $codeFinal = filter_var($_POST['code'], FILTER_SANITIZE_STRING);
    $codeFinal = htmlspecialchars($codeFinal);
    if (strlen($codeFinal) > $nbrCharactMotDePasse) {
        $codeFinal = "";
    }

    if ($_POST['bntValider'] === 'Valider' || $_POST['bntValider'] === 'Submit ') {

        if ($codeFinal === $motDePasse) {
            $_POST['marginTopReponse'] = '50px';
            require_once 'index.php'; ?>

            
            <script>
                conteneurTexteEchecReussite.style.color = "green";
                instructions.style.visibility = 'hidden';
                DivconteneurTexteEchecReussite.style.visibility = 'visible';
                cacher.style.display = 'none';
                mainImage.src = 'img/logoVert.gif';
                btnRejoindreBas.setAttribute('onclick', '');
                btnRejoindreHaut.setAttribute('onclick', '');
                if(screen.width > 1472){
                    DivconteneurTexteEchecReussite.innerHTML += "<iframe class=\"widgetDiscord\" src=\"https://discordapp.com/widget?id=704421573226004530&theme=dark\" width=\"350\" height=\"300\" allowtransparency=\"true\"></iframe>";
                } else{
                    DivconteneurTexteEchecReussite.innerHTML += '<h3><a href="https://discord.gg/bTGMhfK">https://discord.gg/bTGMhfK<a></h3>';
                }
            </script>

        <?php } else {
            $_POST['texteEchecReussite'] = "Wrong code";
            $_POST['marginTopReponse'] = '430px';
            require_once 'index.php'; ?>

            <script>
                conteneurTexteEchecReussite.style.color = "red";
                instructions.style.visibility = 'visible';
                instructions.style.height = 'auto';
                mainImage.src = 'img/logoRouge.gif';
                btnRejoindreBas.setAttribute('onclick', '');
                btnRejoindreHaut.setAttribute('onclick', '');
            </script>

        <?php }
    }
}else{
    ?>
    <script>
        window.location.replace("https://erotium-primus.com/");
    </script>
<?php
} ?>