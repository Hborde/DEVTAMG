<?php
//--------------------------------------------------------------------------//
//	Projet 		: Task Manager								  				//
//	Fichier 	: fileUpload.php 							  				//
//  Description : Page utilis�e en iframe pour upload de fichiers via AJAX 	//
//	Auteur 		: Herv� Bordeau								  				//
// 	Date 		: 18/03/2013							      				//
//--------------------------------------------------------------------------//
//Derni�re modif le 18/03/2013 par HB
	
	header('Content-Type: text/html; charset=iso-8859-1');

	//Si fichier envoy�
	if(isset($_FILES['OpenBtn']))
	{ 
		$dossier = 'resources/files/';
		$fichier = 'temp.png';
		//On le d�place dans resources/statuts avec le nom appropri�
		move_uploaded_file($_FILES['OpenBtn']['tmp_name'], $dossier . $fichier);
	}
	
	//Fermeture connexion
	closeConnection($c);
?>