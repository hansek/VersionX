<?php
/*
 * VersionX
 *
 * Copyright 2010-2011 by Mark Hamstra (contact via www.markhamstra.nl)
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
 * @subpackage lexicon-nl
 * @author Mark Hamstra 
 * @date 2011-03-01
 * 
*/

$vxp = 'versionx.'; // I'm lazy, I know.

// Global 
$_lang[$vxp.'versionx'] = 'VersionX';

// Manager: Component menu
$_lang[$vxp.'menuDesc'] = 'Een eenvoudig revisie systeem.';

// CMP: Overview
$_lang[$vxp.'overviewTitle'] = 'Overzicht';
$_lang[$vxp.'overviewDescription'] = 'VersionX houd veranderingen aan resources, chunks en snippets in de gaten en bied daarnaast de optie om met een klik een oude revisie terug te zetten. Bekijk de relevante tabbladen voor meer informatie.';
$_lang[$vxp.'devTitle'] = 'Ontwikkeling';
$_lang[$vxp.'devDescription'] = 'VersionX is ontwikkeld door <a href="http://www.markhamstra.nl" title="Mark Hamstra">Mark Hamstra</a> als een eenvoudig revisiesysteem voor <a href="http://www.modx.com" title="MODx: Content Management Framework">MODx CMF</a>. 
	Rapporteer fouten, onvolkomendheden of onverwachte resultaten op <a href="https://github.com/Mark-H/VersionX" title="VersionX op Github">Github</a>.';
	
// CMP: Resources
$_lang[$vxp.'resourcesTitle'] = 'Resources';
$_lang[$vxp.'resourcesDescription'] = 'VersionX houd je belangrijkste bezit in de gaten: je inhoud.';

//// Resource detail window
$_lang[$vxp.'detailwindow.title'] = 'Resource Revisie ';
$_lang[$vxp.'detailwindow.basictab'] = 'Standaard velden';
$_lang[$vxp.'detailwindow.settingstab'] = 'Instellingen';
$_lang[$vxp.'detailwindow.contenttab'] = 'Inhoud';

//// Resource compare window
$_lang[$vxp.'comparewindow.fieldstab'] = 'Velden &amp; Instellingen'; 
$_lang[$vxp.'comparewindow.contenttab'] = 'Inhoud';
$_lang[$vxp.'comparewindow.fields.field'] = 'Veld';
$_lang[$vxp.'comparewindow.fields.old'] = 'Oud';
$_lang[$vxp.'comparewindow.fields.new'] = 'Nieuw';
$_lang[$vxp.'comparewindow.fields.change'] = 'Verandering';
$_lang[$vxp.'added'] = 'toegevoegd';
$_lang[$vxp.'removed'] = 'verwijderd';


// CMP: Chunks
$_lang[$vxp.'chunksTitle'] = 'Chunks';
$_lang[$vxp.'chunksDescription']  = 'Objecten welke globaal gebruikt kunnen worden. VersionX houdt ook deze in de gaten en kan de verschillen tussen de revisies laten zien.';

// CMP: Snippets
$_lang[$vxp.'snippetsTitle'] = 'Snippets';
$_lang[$vxp.'snippetsDescription'] = 'Ooit een werkende snippet veranderd, waarna deze het niet meer deed? VersionX geeft de optie om de oude versie terug te zetten.';

// CMP: Grid headings
$_lang[$vxp.'grid.revNum'] = '#';
$_lang[$vxp.'grid.docID'] = 'Res. ID';
$_lang[$vxp.'grid.mode'] = 'Modus';
$_lang[$vxp.'grid.mode.upd'] = 'veranderd';
$_lang[$vxp.'grid.mode.new'] = 'aangemaakt';
$_lang[$vxp.'grid.mode.rev'] = 'teruggezet';
$_lang[$vxp.'grid.fromRev'] = 'Voorheen';
$_lang[$vxp.'grid.class'] = 'Class';
$_lang[$vxp.'grid.time'] = 'Tijd';
$_lang[$vxp.'grid.editor'] = 'Gebruiker';

// CMP: Grid context menu
$_lang[$vxp.'grid.details'] = 'Bekijk details';
$_lang[$vxp.'grid.compare'] = 'Vergelijk';
$_lang[$vxp.'grid.restore'] = 'Terugzetten';
$_lang[$vxp.'grid.restoreTitle'] = 'Revisie terugzetten';
$_lang[$vxp.'grid.restoreMsg'] = 'Weet je zeker dat je deze resouce terug wilt zetten naar de geselecteerd revisie?';
$_lang[$vxp.'grid.restore.done'] = 'De geselecteerde revisie is teruggezet.';

// CMP: Error messages 
$_lang[$vxp.'error.idnotfound'] = 'Revisie ID kan niet worden gevonden. Mogelijk is je revisie tabel corrupt.';
$_lang[$vxp.'error.requestfailed'] = 'Het laden van de data is niet gelukt. Controleer je verbinding.';
$_lang[$vxp.'error.packagenotfound'] = 'Kritieke fout: VersionX pakket kan niet worden geregistreerd.';
$_lang[$vxp.'error.revsnotfound'] = 'Kritieke fout: geen revisie nummers gespecificeerd.';
$_lang[$vxp.'error.revobjectnotfound'] = 'Kritieke fout: kan het revisie object niet laden.';
$_lang[$vxp.'error.revsdontmatch'] = 'Kritieke fout: de geselecteerde revisies behoren niet tot dezelfde resource.';
$_lang[$vxp.'error.nochangesfound'] = 'Geen verandering gevonden.';

// (Hopefully) temporary error for xpdorevisioncontrol error for php > 5.3.0
$_lang[$vxp.'error.splitdepreciated'] = 'Excuses. Deze functie werkt nog niet met php > 5.3.0';

?>