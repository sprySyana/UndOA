<html>
    

<head>
	<title>Projet UndOA - stats</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="uoa-style.css">
</head>
<body>
	<h1>UndOA Project</h1>
	<h2>Understand Other Accent</h2>
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
	
		// variables utiles au calcul des stats
	$fnbTotal = 0; // nombre total de fichiers son
	$fnbEn = 0; // nomber de fichiers enregistres en anglais
	$fnbFr = 0; // nomber de fichiers enregistres en francais
		// initialisation d'un array vide
            //cle = pays de naissance (2 lettres)
            //valeur = nomber d'enregistrements
	$countries = array();
		
		//lit les nom des fichiers et incremente les variables
	if ($soundFolder = opendir('./extraits/soundfiles')) {
        // le dossier existe
		while (false !== ($soundFile = readdir($soundFolder))) {
            // les fichiers sont lus correctement
			if($soundFile != '.' && $soundFile != '..' && $soundFile != 'index.php') {
                //le fichier lu n'est ni un dossier ni la page index
                $fnbTotal++;
				// utilisation dres regex sur les noms des fichiers
				$patternEn = "/_en_/";
				$patternFr = "/_fr_/";
				if (preg_match($patternEn, $soundFile)) {
                    $fnbEn++; //enregistrement anglophone trouvé
				}
				if (preg_match($patternFr, $soundFile)) {
					$fnbFr++; //enregistrement francophone trouvé
				}
				$patternCountry = "/-([a-z]{2})-/";
				preg_match($patternCountry, $soundFile, $matches);
				$countryFound = $matches[1];
		//		print("pays trouvé! abbrev : ".$countryFound."<br>");
				if (array_key_exists($countryFound, $countries)) {
					// si countryFound existe déjà dans les clés de countries  => incrementation des occurences
					$countries[$countryFound] ++;
		//			print("incrementation pour le pays ".$countryFound."<br>");
				}else {
					// ajout du nouveau pays en clé et initialisation du nb d'occurences à 1
					$countries[$countryFound] = 1;
		//			print("nouveau pays ajouté : ".$countryFound."<br>");
				}
            }
        }
        //tri decroissant de array selon les occurences
		arsort($countries);
    }else{
        print("erreur : dossier manquant");
    }
		
	//affichage des resultats
	print('<p> Le projet UndOA contient <span class="notabene">'.$fnbTotal.'</span> fichiers sonores ');
	print('dont <span class="notabene">'.$fnbEn.'</span> sont anglophones et <span class="notabene">'.$fnbFr.'</span> sont francophones.<br/>');
	print('<p> Les nationalités par ordre de representativité :</p>');
    print('<ol>');
    foreach ($countries as $key => $val) {
        print("<li>".$key." : ".$val." enregistrements</li>");
    }
    print('</ol>')
	
	?>
    
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