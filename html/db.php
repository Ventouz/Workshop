<?php

	/* DEBUT D'INITIALISATION DE LA CONNEXION DB */
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=berceuse', "pi", "framboise666"); 
		$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}
	catch(PDOException $e)
	{
		echo "Impossible de se connecter";
		die();
	}
	/* FIN D'INITIALISATION DE LA CONNEXION DB */
	$config = array();
	$contact = array();
	$enfant = array();
	$event = array();

	$configIndex = array("ip","volume","longeurSon","etat");
	$contactIndex = array("nom","prenom","adresse","telephone","mail",);
	$enfantIndex = array("id","nom","prenom",);
	$eventIndex = array("id","idEnfant","debut","fin","duree","type","date",);
	$Pi = array('config'=>$config,'contact'=>$contact,'enfant'=>$enfant,'event'=>$event);
	$PiIndex = array(
		'config' => $configIndex,
		'contact' => $contactIndex,
		'enfant' => $enfantIndex,
		'event' => $eventIndex,
	);
	$i = 0;$o = 0;

	foreach ($PiIndex as $order => $index) {

		foreach ($index as $key => $value) {

		$req ='SELECT `'.$value.'` FROM `'.$order.'`';

		$reqResult = $bdd->query($req);
		$CHECK = $reqResult->fetch();
		$Pi[$order][$index[$o]] = $CHECK->$value;

		$o++;
		}
	$i++;
	$o = 0;
	}


?>