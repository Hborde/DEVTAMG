<?php
//------------------------------------------------------------//
//	Projet 		: Task Manager								  //
//	Fichier 	: dragdrop.php	 							  //
//  Description : Gère les fonctions de Drag & Drop			  //
//	Auteur 		: Hervé Bordeau								  //
// 	Date 		: 11/03/2013							      //
//------------------------------------------------------------//
//Dernière modif le 11/03/2013 par HB


?>
<script>
//variables-------------------------------------------------------------
var div = new Object();
var coorT = 0;
var index = 1;
var maxOffsetTop = 9999;

function reattribColors()
{
	var tasks = new Array();
	var lines = document.getElementsByClassName('headertaskpair');
	for (var i = 0 ; i < lines.length ; i++)
	{
		tasks[i] = lines[i];
	}

	tasklength = tasks.length;
	
	lines = document.getElementsByClassName('headertaskimpair');
	for (var i = 0 ; i < lines.length ; i++)
	{
		tasks[i+tasklength] = lines[i];
	}
	tasks = insertSort(tasks);
	for (var i = 0 ; i < tasks.length ; i++)
	{
		if (i % 2 == 1)
		{
			tasks[i].className = 'headertaskpair';
		}
		else
		{
			tasks[i].className = 'headertaskimpair';
		}
	}
	
}

//fonction pour la non selection du texte--------------------------------
function ffalse()
{
	return false;
}

function ftrue()
{
	return true;
}

document.onselectstart = new Function ("return false");

if (window.sidebar)
{
	document.onmousedown = ffalse;
	document.onclick = ftrue;
}

//selection d'une div + coordonnées-------------------------------------
function selectImage(e)
{
	$(function() 
		{
			$('div[id$="div"]').draggable(
				{
					cursor: 'move',     	 // Change le curseur en croix de déplacement
					axis: 'y',           	 // Autorise le drag and drop uniquement sur l'axe vertical
					drag: function (event, ui)
					{
						if (this.offsetTop < maxOffsetTop)
						{
							$( this ).css({
								top : maxOffsetTop
							});
						}
					},
					stop: function( event, ui ) 
					{
						$('div[id$="div"]').draggable("destroy");
						reattribColors();
					}
				}
			);
		}
	);
}

//fonctions de mouvement-------------------------------------------------
function move(e)
{
		var y = (!document.all) ? e.clientY : event.y;
		div.style.top = y - coorT +'px';
}

//stop mouvement---------------------------------------------------------
function dragDropEnd()
{
	document.onmousemove = "";
	$('div[id$="div"]').draggable();
	$('div[id$="div"]').draggable("destroy");
	reattribColors();
	div=null;
}

//fonction d'initiation des objets---------------------------------------
function init()
{
	var  allGrafs=document.getElementsByTagName("div");
	for(i=0;i<allGrafs.length;i++){
		if (allGrafs[i].className == 'headertaskimpair' || allGrafs[i].className == 'headertaskpair')
		{
			if (allGrafs[i].id != '')
			{
				index++;
				if (allGrafs[i].offsetTop < maxOffsetTop)
				{
					maxOffsetTop = allGrafs[i].offsetTop;
				}
				allGrafs[i].style.zIndex=index;
				var button = allGrafs[i].getElementsByTagName('div');
				for (j = 0; j < button.length ; j++)
				{
					if (button[j].className == 'headerelementmove')
					{
						button[j].onmousedown = selectImage;
					}
				}
			}
		}
	}
	document.onmouseup = dragDropEnd;
}

//initiation des evenements de base-----------------------------
window.onload = init;
</script>