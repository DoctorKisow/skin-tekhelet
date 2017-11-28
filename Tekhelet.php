<?php
/**
  * Tekhelet - The look of the Kisow Foundation Wiki.
  * Matthew R. Kisow, D.Sc. <matthew.kisow@kisow.org>
  * Copyright, Kisow Foundation, Inc. 2015-2017.
  *
  * The Tekhelet theme is based in part on the Tyrian theme by Alex Legler.
 **/

$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'name' => 'Tekhelet',
	'namemsg' => 'skinname-tekhelet',
	'descriptionmsg' => 'tekhelet-desc',
	'url' => 'https://github.com/DoctorKisow/skin-tekhelet.git',
	'author' => array('Matthew R. Kisow, D.Sc.'),
	'license-name' => 'GPLv3',
);

// Register Files.
$wgAutoloadClasses['SkinTekhelet'] = __DIR__ . '/SkinTekhelet.php';
$wgAutoloadClasses['TekheletTemplate'] = __DIR__ . '/TekheletTemplate.php';
$wgMessagesDirs['Tekhelet'] = __DIR__ . '/i18n';

// Register Skin.
$wgValidSkinNames['tekhelet'] = 'Tekhelet';

// Register Modules.
$wgResourceModules['skins.tekhelet.styles'] = array(
	'position' => 'top',
	'styles' => array(
		'main.css' => array('media' => 'screen'),
	),
	'remoteSkinPath' => 'Tekhelet',
	'localBasePath' => __DIR__,
);

$wgHooks['OutputPageBeforeHTML'][] = 'injectMetaTags';

function injectMetaTags($out) {
	$out->addMeta('viewport', 'width=device-width, initial-scale=1.0');
	$out->addMeta('theme-color', '#4421B7');
	return true;
}
