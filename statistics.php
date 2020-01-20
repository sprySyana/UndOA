<html>
    

<head>
	<title>Projet UndOA - stats</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="uoa-style.css">
</head>
<body>
	<h1>UndOA Project</h1>
	<h2>Understand Other Accent</h2>
	<p id="description">This project has for goal to observe the influence of "other accents" on comprehension of speech.
	On this website you can acces sound files recorded for the project extraits.
	These recordings are made in English and in French by non-nativespeakers.</p>
	
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
	
		// variables used to calculate stats
	$fnbTotal = 0; // total number of sound files
	$fnbEn = 0; // number of sound files recorded in English
	$fnbFr = 0; // number of sound files recorded in French
		// initialise array empty
            //key = country of birth (2 letters)
            //value = number of soundfiles
	$countries = array();
		
		//read filenames and increment variables accordingly
	if ($soundFolder = opendir('./extraits/soundfiles')) {
        // sound files folder exist 
		while (false !== ($soundFile = readdir($soundFolder))) {
            // sound files are read correctly
			if($soundFile != '.' && $soundFile != '..' && $soundFile != 'index.php') {
                //file read is neither a folder not the index page
                $fnbTotal++;
				// we use regex on the file names
				$patternEn = "/_en_/";
				$patternFr = "/_fr_/";
				if (preg_match($patternEn, $soundFile)) {
                    $fnbEn++; //english sound file found
				}
				if (preg_match($patternFr, $soundFile)) {
					$fnbFr++; //french sound file found
				}
				$patternCountry = "/-([a-z]{2})-/";
				preg_match($patternCountry, $soundFile, $matches);
				$countryFound = $matches[1];
		//		print("pays trouvé! abbrev : ".$countryFound."<br>");
				if (array_key_exists($countryFound, $countries)) {
					// countryFound is already a key in countries array => increment value
					$countries[$countryFound] ++;
		//			print("incrementation pour le pays ".$countryFound."<br>");
				}else {
					// add new country into key add initialise value at 1
					$countries[$countryFound] = 1;
		//			print("nouveau pays ajouté : ".$countryFound."<br>");
				}
            }
        }
        //sort array in descending order by value
		arsort($countries);
    }else{
        print("error : folder missing | dossier manquant");
    }
		
	//display results
	print('<p> The UndOA project contains <span class="notabene">'.$fnbTotal.'</span> sound files ');
	print('of which <span class="notabene">'.$fnbEn.'</span> are in English and <span class="notabene">'.$fnbFr.'</span> in French.<br/>');
	print('<p> The nationalities in order of representativeness :</p>');
    print('<ol>');
    foreach ($countries as $key => $val) {
        print("<li>".$key." : ".$val." soundfiles</li>");
    }
    print('</ol>')
	
	?>
    
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