<html>

<head>
	<title>Projet UndOA - acceuil</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="uoa-style.css">
</head>
<body>
	<h1>Projet UndOA</h1>
	<h2>Understand Other Accent</h2>
    <hr>
	<br><br>
	<p id="description">Ce projet a pour but d'observer l'influence des accents "autres" sur la comprehension.
	Sur ce site vous aurez accès à des extraits sonore produits en Anglais et en Français par des locuteurs non-natifs.</p>
	
	<div class="nav">
		<nav>
			<ul>
				<li><a href="ecoute.php">écouter un enregistrement</a></li>
				<li><a href="statistiques.php">statistiques du projet</a></li>
                <li><a href="index.php">retour au choix de langue</a></li>
			</ul>
		</nav>
	</div>
	<br/><br/>
    
	<?php
    
    //initialisatyion des variables
    $nbFichiers = 0;
    $listeFichiers = array();
    $aleatoire = 0;
    $nomFichier = "";
    
    //parcours des fichiers sons
        //ouvrir et lire les fichiers audios
    if ($soundfolder = opendir('./extraits/soundfiles')) {
        //dossier trouvé
        while (false !== ($soundFile = readdir($soundfolder))) {
            //les extrait sonores sont lus corectement
            if ($soundFile != '.' && $soundFile != '..' && $soundFile != 'index.php') {
                //fichier lu n'est pas un dossier ni la page index
                $nbFichiers ++;
                array_push($listeFichiers, $soundFile);
                
            }
        }        
    } else {
        print('error : dossier manquant');
    }
    
    $aleatoire = rand(0, ($nbFichiers-1));    
    $nomFichier = $listeFichiers[$aleatoire];
        
    //affichage sur page web
    print('enregistrement : '.$nomFichier."<br><br>");
    print('<audio controls="true"><source src="extraits/soundfiles/'.$nomFichier.'"></audio>');
    
	?>
    
    <br><br>
    <p>Pour écouter un autre enregistrement, rechargez la page</p>
    <div>
         <div id="div-notabene">
             LIENS UTILES<br>
             cours moodle du projet<br>
             <a href="https://cours.univ-grenoble-alpes.fr/course/view.php?id=8498">UndOA</a><br><br>
             EMAILS<br>
             stagiaire responsable du site web<br>
             <a href="mailto:anays.micolod@gmail.com">A.Micolod</a><br>
             gérante du projet<br>
             <a href="mailto:alice.henderson@univ-grenoble-alpes.fr">A.Henderson</a>
        </div>        
    </div>
</body>

</html>