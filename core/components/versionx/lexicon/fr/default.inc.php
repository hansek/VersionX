<?php
/*
 * VersionX
 *
 * Copyright 2010-2011 by Mark Hamstra (contact via www.markhamstra.nl)
 * Credit for french translation to rtripault
 *
 * This file is part of VersionX, a basic versioning addon for MODx CMF.
 *
 * VersionX is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * VersionX is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * VersionX; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package versionx
 * @subpackage lexicon-fr
 * @author rtripault
 * @date 2011-01-04
 *
*/

$vxp = 'versionx.'; // I'm lazy, I know.

// Global 
$_lang[$vxp.'versionx'] = 'VersionX';

// Manager: Component menu
$_lang[$vxp.'menuDesc'] = 'Un composant de versioning.';

// CMP: Overview
$_lang[$vxp.'overviewTitle'] = 'Panorama';
$_lang[$vxp.'overviewDescription'] = 'VersionX enregistre toutes les modifications de ressources, chunks et snippets et offre la possibilité de restaurer une ancienne version en un clic. Allez sur les onglets relatifs pour plus d\'informations et d\'options.';
$_lang[$vxp.'devTitle'] = 'Développement';
$_lang[$vxp.'devDescription'] = 'VersionX a été développé par <a href="http://www.markhamstra.nl" title="Mark Hamstra">Mark Hamstra</a> comme composant de versioning pour <a href="http://www.modx.com" title="MODx: Content Management Framework">MODx CMF</a>.<br />
Veuillez repporter les bugs ou bizarreries sur <a href="https://github.com/Mark-H/VersionX" title="VersionX on Github">Github</a>.';
	
// CMP: Resources
$_lang[$vxp.'resourcesTitle'] = 'Ressources';
$_lang[$vxp.'resourcesDescription'] = 'VersionX prend soin de votre bien le plus précieux - votre contenu.';

//// Resource detail window
$_lang[$vxp.'detailwindow.title'] = 'Version de la ressource';
$_lang[$vxp.'detailwindow.basictab'] = 'Champs basics';
$_lang[$vxp.'detailwindow.settingstab'] = 'Propriétés';
$_lang[$vxp.'detailwindow.contenttab'] = 'Contenu';

//// Resource compare window
//$_lang[$vxp.'resources.comparewindow.title'] = ''; 
$_lang[$vxp.'comparewindow.fieldstab'] = 'Champs &amp; propriétés'; 
$_lang[$vxp.'comparewindow.contenttab'] = 'Contenu';
$_lang[$vxp.'comparewindow.fields.field'] = 'Champ';
$_lang[$vxp.'comparewindow.fields.old'] = 'Ancien';
$_lang[$vxp.'comparewindow.fields.new'] = 'Nouveau';
$_lang[$vxp.'comparewindow.fields.change'] = 'Changement';
$_lang[$vxp.'added'] = 'ajouté';
$_lang[$vxp.'removed'] = 'supprimé';

// CMP: Chunks
$_lang[$vxp.'chunksTitle'] = 'Chunks';
$_lang[$vxp.'chunksDescription']  = 'Objects which can be used globally are better watched after. VersionX does that, and can show you the differences between different revisions.';

// CMP: Snippets
$_lang[$vxp.'snippetsTitle'] = 'Snippets';
$_lang[$vxp.'snippetsDescription'] = 'Déjà eu un snippet qui ne fonctionnait plus après avoir effectué un changement? Retournez facilement à la version précédente avec VersionX.';

// CMP: Grid headings
$_lang[$vxp.'grid.revNum'] = '#';
$_lang[$vxp.'grid.docID'] = 'Res. ID';
$_lang[$vxp.'grid.mode'] = 'État';
$_lang[$vxp.'grid.mode.upd'] = 'modifié';
$_lang[$vxp.'grid.mode.new'] = 'créé';
$_lang[$vxp.'grid.mode.rev'] = 'restoré';
$_lang[$vxp.'grid.fromRev'] = 'Avant';
$_lang[$vxp.'grid.class'] = 'Classe';
$_lang[$vxp.'grid.time'] = 'Date';
$_lang[$vxp.'grid.editor'] = 'Édité par';

// CMP: Grid context menu
$_lang[$vxp.'grid.details'] = 'Voir les détails';
$_lang[$vxp.'grid.compare'] = 'Comparer';
$_lang[$vxp.'grid.restore'] = 'Restorer';
$_lang[$vxp.'grid.restoreTitle'] = 'Restorer la version';
$_lang[$vxp.'grid.restoreMsg'] = 'Êtes-vous sûr de vouloir remplacer la ressource par la version sélectionnée?';
$_lang[$vxp.'grid.restore.done'] = 'La version a été restorée.';

// CMP: Error messages
$_lang[$vxp.'error.idnotfound'] = 'Impossible de trouver la révision. Votre table de révisions doit être corrompue.';
$_lang[$vxp.'error.requestfailed'] = 'Chargement des données requises échoué. Veuillez vérifier votre connection.';
$_lang[$vxp.'error.packagenotfound'] = 'Erreur fatale: impossible d\'enregistrer le paquet VersionX.';
$_lang[$vxp.'error.revsnotfound'] = 'Erreur fatale: pas de numéro de version indiqué.';
$_lang[$vxp.'error.revobjectnotfound'] = 'Erreur fatale: impossible de récupérer la version de l\'objet.';
$_lang[$vxp.'error.revsdontmatch'] = 'Erreur fatale: les versions indiquées ne correspondent pas à la même ressource.';
$_lang[$vxp.'error.nochangesfound'] = 'Aucune modification trouvée.';

// (Hopefully) temporary error for xpdorevisioncontrol error for php > 5.3.0
$_lang[$vxp.'error.splitdepreciated'] = 'Désolé, incompatible avec PHP supérieur à 5.3.0 :(';
?>