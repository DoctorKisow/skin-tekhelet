<?php
/**
  * Tekhelet - The look of the Kisow Foundation Wiki.
  * Matthew R. Kisow, D.Sc. <matthew.kisow@kisow.org>
  * Copyright, Kisow Foundation, Inc. 2015-2017.
  *
  * The Tekhelet theme is based in part on the Tyrian theme by Alex Legler.
 **/

/**
  * Inherit main code from SkinTemplate, set the CSS and template filter.
  * @ingroup Skins
 **/

class SkinTekhelet extends SkinTemplate {
	public $skinname  = 'tekhelet';
	public $stylename = 'Tekhelet';
	public $template  = 'TekheletTemplate';

	private $output;

	const CDN_URL = 'https://assets.kisow.org/tekhelet/';

	function setupSkinUserCss(OutputPage $out) {
		$this->output = $out;

		parent::setupSkinUserCss($out);

		$out->addStyle(SkinTekhelet::CDN_URL . 'bootstrap.min.css');
		$out->addStyle(SkinTekhelet::CDN_URL . 'tekhelet.min.css');

		$out->addModuleStyles(array(
			'mediawiki.skinning.interface',
			'mediawiki.skinning.content.externallinks',
			'skins.tekhelet.styles'
		));
	}
}
