<?php
/**
 * NOTE: cette page n'est utilisée que dans le cas d'une expérience utilisateur SANS JavaScript
 * @todo
 */
$objJsonMess = array(
    "retPositive" => "Bonne réponse!",
    "retNegative" => "Mauvaise réponse!",
    "explicationsQ1" => "L’arme de précision AWM est la seule qui s’obtient grâce aux boites qui se font parachuter, tandis que les autres armes, sks, vss, kar98k peuvent se trouver n’importe où.",
    "explicationsQ2" => "L’arme ayant le plus d’emplacement est le M416 avec 5 emplacement tandis que M16A4 en possède 3, le SCAR-L en possède 4 et le GROZA en possède 3.",
    "explicationsQ3" => "La dernière arme à avoir été intégrer dans le jeu avec la mise à jour de Septembre 2017 est le tommy gun. Les trois autres armes sont dans le jeu depuis la sortie de la version beta.",
    "reponseQ1" => "1",
    "reponseQ2" => "3",
    "reponseQ3" => "2",
    "repondue" => "Valider mon choix",
    "pasDeReponse" => "Vous n'avez pas choisi de réponse!",
    "pointage" => "Votre position sur trois : ",
    "resultatsDebut" => "Vous avez vaincu",
    "resultatsFin" => " % des questions!"
);

$reponse = array(false, false, false);
$reponseValide = 0;
$lienRecommencer = null;

$strMessRetroQ1 = null;
$strMessRetroQ2 = null;
$strMessRetroQ3 = null;

$strMessDescQ1 = null;
$strMessDescQ2 = null;
$strMessDescQ3 = null;

$strQ1Vide = null;
$strQ2Vide = null;
$strQ3Vide = null;



if(isset($_GET['Q1']) || isset($_GET['Q2']) || isset($_GET['Q3']) ){

  if(isset($_GET['Q1'])){
      $Q1 = $_GET["Q1"];
      if($Q1 == $objJsonMess["reponseQ1"]){
          $strMessRetroQ1 = '<h3>'.$objJsonMess["retPositive"];
          $strMessDescQ1 = $objJsonMess["explicationsQ1"];
          $reponse[0] = true;
      }else{
          $strMessRetroQ1 = $objJsonMess["retNegative"];
          $strMessDescQ1 = $objJsonMess["explicationsQ1"];

      }
  }else{
      $strQ1Vide = $objJsonMess["pasDeReponse"];
  }

  if(isset($_GET['Q2'])){
      $Q2 = $_GET['Q2'];
      if($Q2 == $objJsonMess["reponseQ2"]){
          $strMessRetroQ2 = $objJsonMess["retPositive"];
          $strMessDescQ2 = $objJsonMess["explicationsQ2"];
          $reponse[1] = true;
      }else{
          $strMessRetroQ2 = $objJsonMess["retNegative"];
          $strMessDescQ2 = $objJsonMess["explicationsQ2"];

      }
  }else{
      $strQ2Vide = $objJsonMess["pasDeReponse"];
  }

  if(isset($_GET['Q3'])){
      $Q3 = $_GET['Q3'];
      if($Q3 == $objJsonMess["reponseQ3"]){
          $strMessRetroQ3 = $objJsonMess["retPositive"];
          $strMessDescQ3 = $objJsonMess["explicationsQ3"];
          $reponse[2] = true;
      }else{
          $strMessRetroQ3 = $objJsonMess["retNegative"];
          $strMessDescQ3 = $objJsonMess["explicationsQ3"];

      }
  }else{
      $strQ3Vide = $objJsonMess["pasDeReponse"];
  }

}else{
  $strQ1Vide = $objJsonMess["pasDeReponse"];
  $strQ2Vide = $objJsonMess["pasDeReponse"];
  $strQ3Vide = $objJsonMess["pasDeReponse"];
}

if(isset($_GET['validerQuiz'])) {
    // si tout est OK on affiche les résultats du Quiz
    // et un bouton (un lien en fait) pour recommencer
    foreach($reponse as $bonneReponse){
        if($bonneReponse == true){
            $reponseValide ++;
        }
    }

    $lienRecommencer = '<a href="index.html">Recommencer le quiz</a>';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/app-icones/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/app-icones/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/app-icones/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/app-icones/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/app-icones/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/app-icones/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/app-icones/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/app-icones/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/app-icones/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-36x36.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-48x48.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-72x72.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-96x96.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-144x144.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-256x256.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/app-icones/android-icon-512x512.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/app-icones/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/app-icones/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/app-icones/favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/app-icones/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  <title>Quiz Pubg - résultat</title>
  <title>PlayerUnkown’s Battleground Quiz</title>

  <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="bower_components/animate.css/animate.min.css">
</head>

<body id="resultatPhp">
<header id="header" class="conteneur" role="banner ">
    <img id="img_header_mobile"
         srcset="assets/images/img_header/map_header_w320.png 1x,
               assets/images/img_header/map_header_w640.png 2x"
         src="assets/images/img_header/map_header_w320.png"
         alt="La carte du jeu,">
    <img id="img_header_table"
         srcset="assets/images/img_header/map_header_w1000.png 1x,
               assets/images/img_header/map_header_w2000.png 2x"
         src="assets/images/img_header/map_header_w1000.png"
         alt="La carte du jeu,">
    <h1 class="titre_mobile">Pubg Quiz</h1>
    <h1 class="titre_table"><a href="index.html">PlayerUnkowns Battleground Quiz</a></h1>
    <span>Un contre tous et tous contre un!</span>
</header>
<main class="conteneur">
    <section id="sectionResultat">
        <h2 id="noQuestion">
            <?php
            if($reponseValide != 0){
                if($reponseValide == 1){
                    echo 'Vous n\'avez qu\'une seule bonne réponse. Meilleure chance la prochaine fois!';
                }
                if($reponseValide == 2){
                    echo 'Il ne manque qu\'une seule réponse à avoir pour avoir le score parfait! Tentez votre chance de nouveau!';
                }
                if($reponseValide == 3){
                    echo 'Vous connaissez parfaitement le jeu PlayerUnknow\'s Battleground. Félicitation!';
                }

            }else{
                echo 'Vous n\'avez aucune bonne réponse, tenter votre chance de nouveau pour réussir le quiz!';
            }
            ?>
        </h2>
        <h2 id="pointage">
            <?php

            if($reponseValide == 0){
                echo 'Vous avez obtenu 0% a votre quiz!';
            }
            if($reponseValide == 1){
                echo 'Vous avez obtenu 33% a votre quiz!';
            }
            if($reponseValide == 2){
                echo 'Vous avez obtenu 66% a votre quiz!';
            }
            if($reponseValide == 3){
                echo 'Vous avez obtenu 100% a votre quiz!';
            }

            ?>
        </h2>
        <?php if($reponseValide == 3){ ?>
        <div class="img winner animated infinite tada">
            <img class="img_table"
                 src="assets/images/img_question/winner_w500.png"
                 alt="Le poulet de la victoire!">
            <img class="img_mobile"
                 src="assets/images/img_question/winner_w250.png"
                 alt="Le poulet de la victoire!">
        </div>
        <?php } ?>
    </section>
    <section id="Q1" class="animated zoomIn">
          <fieldset >
                <legend>
                      <h3>Dans les choix de réponses suivants, lequel de ces fusils peut être trouver
                      lorsqu’il se fait parachuter dans une boite rouge?</h3>
                </legend>
              <?php if(isset($_GET['Q1'])){ ?>
                <div class="img">
                  <img class="img_table"
                       srcset="assets/images/arme_table/awm_w250.png 1x,
                           assets/images/arme_table/awm_w500.png 2x"
                       src="assets/images/arme_table/awm_w250.png"
                       alt="L'arme de précision AWM">
                  <img class="img_mobile"
                       src="assets/images/arme_mobile/awm.png"
                       alt="L'arme de précision AWM">
                  <legend>AWM</legend>
                </div>
              <?php } ?>
                <div id="contenuInteractifQ1">
                    <?php
                    echo '<h3>'.$strMessRetroQ1.'</h3>';
                    echo '<p>'.$strMessDescQ1.'</p>';
                    if($strQ1Vide != null){
                        echo '<p>'.$strQ1Vide.'</p>';
                    }
                    ?>
                </div>
          </fieldset>
    </section>
    <section id="Q2" class="animated zoomIn">
          <fieldset>
                <legend>
                      <h3>Dans les choix de réponses suivants, lequel de ces fusils peut avoir le plus
                      d’emplacements de modification?</h3>
                </legend>
              <?php if(isset($_GET['Q2'])){ ?>
                <div class="img">
                  <img class="img_table"
                       srcset="assets/images/arme_table/m416_w250.png 1x,
                           assets/images/arme_table/m416_w500.png 2x"
                       src="assets/images/arme_table/m416_w250.png"
                       alt="L'arme de précision M416">
                  <img class="img_mobile"
                       src="assets/images/arme_mobile/m416.png"
                       alt="L'arme de précision M416">
                  <legend>M416</legend>
                </div>
              <?php } ?>
                <div id="contenuInteractifQ2">
                    <?php
                    echo '<h3>'.$strMessRetroQ2.'</h3>';
                    echo '<p>'.$strMessDescQ2.'</p>';
                    if($strQ2Vide != null){
                        echo '<p>'.$strQ2Vide.'</p>';
                    }
                    ?>
                </div>
          </fieldset>
    </section>
    <section id="Q3" class="animated zoomIn">
          <fieldset>
                <legend>
                      <h3>Dans les choix de réponses suivants, lequel de ces fusils a été instaurer en dernier
                        dans le jeu?</h3>
                </legend>
              <?php if(isset($_GET['Q3'])){ ?>
                <div class="img">
                  <img class="img_table"
                       srcset="assets/images/arme_table/tommy_gun_w250.png 1x,
                              assets/images/arme_table/tommy_gun_w500.png 2x"
                       src="assets/images/arme_table/tommy_gun_w250.png"
                       alt="L'arme de précision TOMMY GUN">
                  <img class="img_mobile"
                       src="assets/images/arme_mobile/tommy_gun.png"
                       alt="L'arme de précision TOMMY GUN">
                  <legend>TOMMY GUN</legend>
                </div>
              <?php } ?>
                <div id="contenuInteractifQ3">
                    <?php
                    echo '<h3>'.$strMessRetroQ3.'</h3>';
                    echo '<p>'.$strMessDescQ3.'</p>';
                    if($strQ3Vide != null){
                        echo '<p>'.$strQ3Vide.'</p>';
                    }
                    ?>
                </div>
          </fieldset>
    </section>
    <p class="animated infinite pulse">
        <a href="index.html" role="button" >Recommencer le quiz</a>
    </p>
</main>
<footer id="footer" class="conteneur" role="contentinfo">
    <small>Maxime Champagne, © droits d'auteur sur le matériel utilisé, 2017</small>
</footer>
<!--<script src="script.js"></script>-->
<script>
    // Let's register our serviceworker
    navigator.serviceWorker.register('sw.js', {
        // The scope cannot be parent to the script url
        scope: './'
    });
</script>
<script src="logging.js"></script>
</body>
</html>