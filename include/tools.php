<?php
//------------------------------------------------------------//
//	Projet 		: Task Manager								  //
//	Fichier 	: tools.php	 								  //
//  Description : Bo�te � outils							  //
//	Auteur 		: Herv� Bordeau								  //
// 	Date 		: 04/03/2013							      //
//------------------------------------------------------------//
//Derni�re modif le 04/03/2013 par HB

//Prend en param�tre une date au format AAAA-MM-JJ et la renvoie au format JJ/MM/AAAA
function formatDate($date)
{
	$toReturn = substr($date, 8, 2);
	$toReturn .= '/';
	$toReturn .= substr($date, 5, 2);
	$toReturn .= '/';
	$toReturn .= substr($date, 0, 4);
	
	return $toReturn;
}

//Prend en param�tre un timestamp au format AAAA-MM-JJ-HH.MM.SS.CCCCCC et renvoie l'heure au format HH:MM:SS
function formatTime($datetime)
{
	$toReturn = substr($datetime, 11, 2);
	$toReturn .= ':';
	$toReturn .= substr($datetime, 14, 2);
	$toReturn .= ':';
	$toReturn .= substr($datetime, 17, 2);
	
	return $toReturn;
}

//Prend en param�tre une date et une heure au format AAAA-MM-JJ-HH.MM.SS.CCCCCC et la renvoie au format JJ/MM/AAAA HH:MM:SS
function formatDateTime($datetime)
{
	$toReturn = formatDate($datetime);
	$toReturn .= ' ';
	$toReturn .= formatTime($datetime);
	
	return $toReturn;
}

//Compare deux commentaires d'apr�s leurs infos en base, selon la t�che qu'ils concernent, l'utilisateur, le type de commentaire et le timestamp � la minute
function commentEquals($a, $b)
{
	$isEquals = true;
	if (odbc_result($a, 'CODTASK') != odbc_result($b, 'CODTASK'))
	{
		$isEquals = false;
	}
	elseif (odbc_result($a, 'CODUSER') != odbc_result($b, 'CODUSER'))
	{
		$iEquals = false;
	}
	elseif (odbc_result($a, 'CODTYPC') != odbc_result($b, 'CODTYPC'))
	{
		$isEquals = false;
	}
	elseif ((strtotime(formatDateTime(odbc_result($a, 'TSTPCOM'))) - strtotime(formatDateTime(odbc_result($b, 'TSTPCOM')))) > 60)
	{
		$isEquals = false;
	}
	return $isEquals;
}
?>
<script>

	function insertSort(divArray)
	{
		for (var i = 1 ; i < divArray.length ; i++)
		{
			var x = divArray[i];
			var j = i;
			while (j > 0 && divArray[j-1].offsetTop > x.offsetTop)
			{
				divArray[j] = divArray[j-1];
				j = j-1;
			}
			divArray[j] = x;
		}
		return divArray;
	}

	function displayToolTip()
	{
		$( document ).tooltip();
	}
</script>