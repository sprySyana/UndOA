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
	<p id="description">This project has for goal to help you improve your understanding of 'strangers' accents.<br>
	On this page you can listen to a recording either in French or in English done by a non-native speaker.</p>
	
	<div class="nav">
		<nav>
			<ul>
                <li><a href="listen.php">listen to a recording</a></li>
				<li><a href="statistics.php">project's statistics</a></li>
                <li><a href="index.php">go back to language selection</a></li>
			</ul>
		</nav>
	</div>
	<br/><br/>
    
	<?php
    
    //initialisatyion des variables
    $filesNb = 0;
    $lisFiles = array();
    $random = 0;
    $fileName = "";
    
    //browse soundfiles
        //open and read audio files
    if ($soundfolder = opendir('./extraits/soundfiles')) {
        //folder found
        while (false !== ($soundFile = readdir($soundfolder))) {
            //les extrait sonores sont lus corectement
            if ($soundFile != '.' && $soundFile != '..' && $soundFile != 'index.php') {
                //read file is neither a foldernor index page
                $filesNb ++;
                array_push($lisFiles, $soundFile);
                
            }
        }        
    } else {
        print('error : dossier manquant');
    }
    
    $random = rand(0, ($filesNb-1));    
    $fileName = $lisFiles[$random];
        
    //affichage sur page web
    print('enregistrement : '.$fileName."<br><br>");
    print('<audio controls="true"><source src="extraits/soundfiles/'.$fileName.'"></audio>');
    
	?>
    
    <br><br>
    <p>To listen to another recording, refresh the page</p>
    <div>
         <div id="div-notabene">
             USEFUL LINKS<br>
             project's moodle course<br>
             <a href="https://cours.univ-grenoble-alpes.fr/course/view.php?id=8498">UndOA</a><br><br>
             EMAILS<br>
             web site author intern<br>
             <a href="mailto:anays.micolod@gmail.com">A.Micolod</a><br>
             project head<br>
             <a href="mailto:alice.henderson@univ-grenoble-alpes.fr">A.Henderson</a>
        </div>        
    </div>
</body>

</html>