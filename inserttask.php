<?php
//---------------------------------------------------------------//
//	Projet 		: Task Manager									 //
//	Fichier 	: inserttask.php 							 	 //
//  Description : Page d'ajout d'une tâche					     //
//	Auteur 		: Hervé Bordeau									 //
// 	Date 		: 08/03/2013							     	 //
//---------------------------------------------------------------//
//Dernière modif le 08/03/2013 par HB
	
	header('Content-Type: text/html; charset=iso-8859-1');
	//- la définition des constantes de l'ensemble de l'application
	include("include/cst.php");
	//- la gestion de la couche d'accès aux données
	include("include/dal.php");
	//- les fonctions outil
	include("include/tools.php");
	//- la classe de gestion des commentaires
	require "include/classComment.php";
	
	//Ouverture connexion à la DB
	$c = openConnection();
	