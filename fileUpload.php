<?php
//--------------------------------------------------------------------------//
//	Projet 		: Task Manager								  				//
//	Fichier 	: fileUpload.php 							  				//
//  Description : Page utilisée en iframe pour upload de fichiers via AJAX 	//
//	Auteur 		: Hervé Bordeau								  				//
// 	Date 		: 18/03/2013							      				//
//--------------------------------------------------------------------------//
//Dernière modif le 18/03/2013 par HB
	
	header('Content-Type: text/html; charset=iso-8859-1');

	//Si fichier envoyé
	if(isset($_FILES['OpenBtn']))
	{ 
		$dossier = 'resources/files/';
		$fichier = 'temp.png';
		//On le déplace dans resources/statuts avec le nom approprié
		move_uploaded_file($_FILES['OpenBtn']['tmp_name'], $dossier . $fichier);
	}
	
	//Fermeture connexion
	closeConnection($c);
?>