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
 * @subpackage lexicon-sv
 * @author Fredrik Frodlund 
 * @date 2011-03-11
 * 
*/

$vxp = 'versionx.'; // I'm lazy, I know.

// Global 
$_lang[$vxp.'versionx'] = 'VersionX';

// Manager: Component menu
$_lang[$vxp.'menuDesc'] = 'En enkel versionshanteringskomponent.';

// CMP: Overview
$_lang[$vxp.'overviewTitle'] = 'Översikt';
$_lang[$vxp.'overviewDescription'] = 'VersionX registrerar alla ändringar i resurser, chunks och snippets och erbjuder möjligheten att återställa äldre revisioner med ett klick. Besök de närliggande flikarna för mer information.';
$_lang[$vxp.'devTitle'] = 'Utveckling';
$_lang[$vxp.'devDescription'] = 'VersionX har utvecklats av <a href="http://www.markhamstra.nl" title="Mark Hamstra">Mark Hamstra</a> som en enkel versionshanteringsaddon för <a href="http://www.modxcms.com" title="MODx: Content Management Framework">MODx CMF</a>. 
	Var vänlig och rapportera eventuella buggar på <a href="https://github.com/Mark-H/VersionX" title="VersionX on Github">Github</a>.';
	
// CMP: Resources
$_lang[$vxp.'resourcesTitle'] = 'Resurser';
$_lang[$vxp.'resourcesDescription'] = 'VersionX håller koll på dina mest värdefulla tillgångar – ditt innehåll.';

//// Resource detail window
$_lang[$vxp.'detailwindow.title'] = 'Resursversion ';
$_lang[$vxp.'detailwindow.basictab'] = 'Grundläggande fält';
$_lang[$vxp.'detailwindow.settingstab'] = 'Inställningar';
$_lang[$vxp.'detailwindow.contenttab'] = 'Innehåll'; // New 14/1/2011

//// Resource compare window
$_lang[$vxp.'comparewindow.fieldstab'] = 'Fält &amp; inställningar'; 
$_lang[$vxp.'comparewindow.contenttab'] = 'Innehåll';
$_lang[$vxp.'comparewindow.fields.field'] = 'Fält';
$_lang[$vxp.'comparewindow.fields.old'] = 'Gammal';
$_lang[$vxp.'comparewindow.fields.new'] = 'Ny';
$_lang[$vxp.'comparewindow.fields.change'] = 'Ändra';
$_lang[$vxp.'added'] = 'tillagd';
$_lang[$vxp.'removed'] = 'borttagen';


// CMP: Chunks
$_lang[$vxp.'chunksTitle'] = 'Chunks';
$_lang[$vxp.'chunksDescription']  = 'Objekt som kan användas globalt hålls bättre koll på. VersionX gör detta åt dig och kan visa dig skillnaderna mellan olika versioner.';

// CMP: Snippets
$_lang[$vxp.'snippetsTitle'] = 'Snippets';
$_lang[$vxp.'snippetsDescription'] = 'Har du någonsin haft en fungerande snippet slutat fungera efter en ändring? Återställ enkelt med VersionX.';

// CMP: Grid headings
$_lang[$vxp.'grid.revNum'] = '#';
$_lang[$vxp.'grid.docID'] = 'Resurs-ID';
$_lang[$vxp.'grid.mode'] = 'Läge';
$_lang[$vxp.'grid.mode.upd'] = 'ändrad';
$_lang[$vxp.'grid.mode.new'] = 'skapad';
$_lang[$vxp.'grid.mode.rev'] = 'återställd';
$_lang[$vxp.'grid.fromRev'] = 'Föregående';
$_lang[$vxp.'grid.class'] = 'Klass';
$_lang[$vxp.'grid.time'] = 'Tid';
$_lang[$vxp.'grid.editor'] = 'Editor';

// CMP: Grid context menu
$_lang[$vxp.'grid.details'] = 'Visa detaljer';
$_lang[$vxp.'grid.compare'] = 'Jämför';
$_lang[$vxp.'grid.restore'] = 'Återställ';
$_lang[$vxp.'grid.restoreTitle'] = 'Återställ version';
$_lang[$vxp.'grid.restoreMsg'] = 'Är du säker på att du vill återställa resursen till den valda versionen?';
$_lang[$vxp.'grid.restore.done'] = 'Den valda versionen har återställts.';

// CMP: Error messages (New 14/1/2011)
$_lang[$vxp.'error.idnotfound'] = 'Kunde inte hitta versions-ID. Din versionstabell kan vara korrupt.';
$_lang[$vxp.'error.requestfailed'] = 'Kunde inte ladda nödvändig information. Var vänlig kontrollera din anslutning.';
$_lang[$vxp.'error.packagenotfound'] = 'Allvarligt fel: kunde inte registrera VersionX-paketet.';
$_lang[$vxp.'error.revsnotfound'] = 'Allvarligt fel: inga versionsnummer angivna.';
$_lang[$vxp.'error.revobjectnotfound'] = 'Allvarligt fel: kunde inte hämta versionsobjektet.';
$_lang[$vxp.'error.revsdontmatch'] = 'Allvarligt fel: de två angivna versionerna tillhör inte samma resurs.';
$_lang[$vxp.'error.nochangesfound'] = 'Inga ändringar funna.';

// (Hopefully) temporary error for xpdorevisioncontrol error for php > 5.3.0
$_lang[$vxp.'error.splitdepreciated'] = 'Tyvärr inte kompatibelt med PHP över version 5.3.0 :(';

?>