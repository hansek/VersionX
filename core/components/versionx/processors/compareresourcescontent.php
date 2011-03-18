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
 * @subpackage processors
 */
 
	// Include the MODx object 
	require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/config.core.php';
	require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
	require_once MODX_CONNECTORS_PATH.'index.php';

	$modx->getService('lexicon','modLexicon');
	$modx->lexicon->load('versionx:default', 'default');
	
	// Find revisions from the $_POST data
	$revNew = (is_numeric($_REQUEST['new'])) ? $_REQUEST['new'] : '';
	$revOld = (is_numeric($_REQUEST['old'])) ? $_REQUEST['old'] : '';
	if (($revNew == '') || ($revOld == '')) { 
		$err = array(
			'total' => 1,
			'results' => array(
				0 => array(
					'change' => 'ERROR',
					'oldvalue' => $modx->lexicon('versionx.error.revsnotfound')))); 
		die(json_encode($err));
	}
	
	// If the script got here, let's load up Versionx..
	$path = MODX_CORE_PATH . 'components/versionx/model/';
	$fetchModel = $modx->addPackage('versionx', $path, 'extra_');
	if (!$fetchModel) {
	  $modx->log(modX::LOG_LEVEL_ERROR, $modx->lexicon('versionx.error.packagenotfound')); 
		die(json_encode(array(
			'total' => 0,
			'error' => $modx->lexicon('versionx.error.packagenotfound'))
		));
	}
	
	// Get the two objects for the new and old revision
	$revNewObj = $modx->getObject('Versionx', $revNew);
	if (!$revNewObj) { 		
		$err = array(
			'total' => 1,
			'results' => array(
				0 => array(
					'change' => 'ERROR',
					'oldvalue' => $modx->lexicon('versionx.error.revobjectnotfound')))); 
		die(json_encode($err));
	} 
	$revOldObj = $modx->getObject('Versionx', $revOld);
	if (!$revOldObj) { 		
		$err = array(
			'total' => 1,
			'results' => array(
				0 => array(
					'change' => 'ERROR',
					'oldvalue' =>  $modx->lexicon('versionx.error.revobjectnotfound')))); 
		die(json_encode($err));
	}
	
	// Check if the IDs match.. if they don't, comparing is quite useless.
	$revNewArr = array(); $revOldArr = array();
	$revNewArr['id'] = $revNewObj->get('id');
	$revOldArr['id'] = $revOldObj->get('id');
	if ($revNewArr['id'] !== $revOldArr['id']) { 
		$err = array(
			'total' => 1,
			'results' => array(
				0 => array(
					'change' => 'ERROR',
					'oldvalue' => $modx->lexicon('versionx.error.revsdontmatch')))); 
		die(json_encode($err));
	}

	// If the script got down here, let's compare the content.
	$c1 = $revNewObj->get('contentField');
	$c2 = $revOldObj->get('contentField');
	
	$c1n = explode("\n",htmlentities(trim($c1)));
	$c2n = explode("\n",htmlentities(trim($c2))); 

	// Include the diff class by Paul Butler (© 2007)
	include_once ('diff.class.php');
	// Fetch the changes by calling the diff class
	$changed = diff($c2n,$c1n);
	// Instantiate a simple line counter
	$chline = 0;
	
	foreach($changed as $k){
	    $chline++;
		if(is_array($k))
			$ret[] = array('line' => $chline,'body' => (!empty($k['d'])?"<del>".implode(' ',$k['d'])."</del> ":'').
				(!empty($k['i'])?"<ins>".implode(' ',$k['i'])."</ins> ":''));
		// @TODO: Make the below a setting wether or not to display the non-changed lines.
		//else $ret[] = array('line' => $chline,'body' => $k);
	}
	
	$result = array (
		'total' => count($ret),
		'results' => $ret,
		'xpdoresult' => $rl[0]);
	echo json_encode($result);
	
?>