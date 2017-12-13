<?php
/**
  * Tekhelet - The look of the Kisow Foundation Wiki.
  * Matthew R. Kisow, D.Sc. <matthew.kisow@kisow.org>
  * Copyright, Kisow Foundation, Inc. 2015-2017.
  *
  * The Tekhelet theme is based in part on the Tyrian theme by Alex Legler.
 **/

class TekheletTemplate extends BaseTemplate {
	function execute() {
		wfSuppressWarnings();

		$this->html( 'headelement' );

		$this->header();
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="content" class="mw-body" role="main">
						<a id="top"></a>
						<?php if ( $this->data['sitenotice'] ) { ?>
							<div id="siteNotice"><?php $this->html( 'sitenotice' ) ?></div>
						<?php	}	?>

						<h1 id="firstHeading" class="first-header" lang="<?php $this->data['pageLanguage'] = $this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode(); $this->text( 'pageLanguage' );	?>">
							<span dir="auto"><?php $this->html( 'title' ) ?></span>
						</h1>

						<div id="bodyContent" class="mw-body-content">
							<div id="siteSub"><?php $this->msg( 'tagline' ) ?></div>
							<div id="contentSub"<?php	$this->html( 'userlangattributes' ) ?>>
								<?php $this->html( 'subtitle' )	?>
							</div>
							<?php if ( $this->data['undelete'] ) { ?>
								<div id="contentSub2"><?php $this->html( 'undelete' ) ?></div>
							<?php } ?>
							<?php	if ( $this->data['newtalk'] ) {	?>
								<div class="usermessage"><?php $this->html( 'newtalk' ) ?></div>
							<?php	}	?>
							<div id="jump-to-nav" class="mw-jump">
								<?php	$this->msg( 'jumpto' ) ?>
								<a href="#column-one"><?php	$this->msg( 'jumptonavigation' ) ?></a><?php $this->msg( 'comma-separator' ) ?>
								<a href="#searchInput"><?php $this->msg( 'jumptosearch' )	?></a>
							</div>

							<!-- start content -->
							<?php $this->html( 'bodytext' ) ?>
							<?php	if ( $this->data['catlinks'] ) { ?>
								<?php $this->html( 'catlinks' ); ?>
							<?php }	?>
							<!-- end content -->

							<?php	if ( $this->data['dataAfterContent'] ) {
								$this->html( 'dataAfterContent'	);
							}	?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $this->footer(); ?>

		<script>
			window.RLQ = window.RLQ || []; window.RLQ.push( function () {
				$.getScript("https://assets.kisow.org/tekhelet/bootstrap.min.js");
			} );
		</script>
		<?php
		$this->printTrail();
		echo Html::closeElement( 'body' );
		echo Html::closeElement( 'html' );
		wfRestoreWarnings();
	} // end of execute() method

	/*************************************************************************************************/

	function header() {
	?>
	<div class="mw-jump sr-only">
		<?php	$this->msg( 'jumpto' ) ?>
		<a href="#top">content</a>
	</div>
	<header>
		<div class="site-title">
			<div class="container">
				<div class="row">
					<div class="site-title-buttons">
						<div class="btn-group btn-group-sm">
							<div class="btn-group btn-group-sm">
								<a class="btn kisow-org-sites dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
									<span class="fa fa-fw fa-map-o"></span> <span class="hidden-xs">kisow.org sites</span> <span class="caret"></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="https://www.kisow.org/" title="Main Foundation Website"><span class="fa fa-home fa-fw"></span> kisow.org</a></li>
									<li><a href="https://wiki.kisow.org/" title="Find and contribute documentation"><span class="fa fa-file-text-o fa-fw"></span> Wiki</a></li>
									<!-- <li class="divider"></li> -->
								</ul>
							</div>
						</div>
					</div>
					<div class="logo">
						<a href="/" title="Back to the homepage" class="site-logo"><object data="https://assets.kisow.org/tekhelet/site-logo.svg" type="image/svg+xml">
							<img src="https://assets.kisow.org/tekhelet/site-logo.png" alt="Kisow Foundation Logo">
						</object></a>
						<span class="site-label">Wiki</span>
					</div>
				</div>
			</div>
		</div>
		<nav class="tekhelet-navbar" role="navigation">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse navbar-main-collapse">
						<ul class="nav navbar-nav">
							<?php
							$this->renderPortals( $this->data['sidebar'] );
							?>
						</ul>
						<ul class="nav navbar-nav navbar-right hidden-xs">
							<?php
							$this->toolbox();
							$this->personaltools();
							?>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<?php $this->cactions(); ?>
	</header>
	<?php
	}

	function footer() {
		$validFooterIcons = $this->getFooterIcons( "icononly" );
		$validFooterLinks = $this->getFooterLinks( "flat" ); // Additional footer links
	?>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-offset-2 col-md-7">
					<?php if ( count( $validFooterLinks ) > 0 ) { ?>
						<div class="spacer"></div>
						<ul id="f-list">
							<?php foreach ( $validFooterLinks as $aLink ) { ?>
								<?php if ($aLink === 'copyright') continue; ?>
								<li id="<?php echo $aLink ?>"><?php $this->html( $aLink ) ?></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
				<div class="col-xs-12 col-md-3">
					<!-- No questions or comments, the Wiki has enough information on how to contact us. -->
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3 col-md-2">
					<ul class="footerlinks three-icons">
						<li><a href="https://twitter.com/kisow" title="@Kisow on Twitter"><span class="fa fa-twitter fa-fw"></span></a></li>
						<li><a href="https://www.facebook.com/kisow.org" title="Kisow on Facebook"><span class="fa fa-facebook fa-fw"></span></a></li>
					</ul>
				</div>
				<div class="col-xs-9 col-md-9">
					<strong>&copy; 2015&ndash;2017 Kisow Foundation, Inc.</strong><br />
					<small>
						The Kisow Foundation&reg; is a registered trademark of the Kisow Foundation, Inc.
						The contents of this document, unless otherwise expressly stated, are licensed under the
						<a href="https://creativecommons.org/licenses/by-sa/3.0/" rel="license">CC-BY-SA-3.0</a> license.
						The <a href="https://wiki.kisow.org/wiki/Foundation:Copyright">Kisow Foundation Name and Logo Usage Guidelines</a> apply.
					</small>
				</div>
			</div>
		</div>
	</footer>
	<?php
		echo $footerEnd;
	}

	/**
	 * @param array $sidebar
	 **/
	protected function renderPortals( $sidebar ) {
		// These are already rendered elsewhere
		$sidebar['SEARCH'] = false;
		$sidebar['TOOLBOX'] = false;
		$sidebar['LANGUAGES'] = false;

		foreach ( $sidebar as $boxName => $content ) {
			if ( $content === false ) {
				continue;
			}

			$this->customBox( $boxName, $content );
		}
	}

	function searchBox() {
		?>
		<form action="<?php $this->text( 'wgScript' ) ?>" id="searchform" class="navbar-form navbar-right" role="search">
			<input type='hidden' name="title" value="<?php $this->text( 'searchtitle' ) ?>"/>

				<div class="input-group">
					<?php echo $this->makeSearchInput( array( "id" => "searchInput", "class" => "form-control", "placeholder" => $this->getMsg( 'search' )->escaped() ) ); ?>
					<div class="input-group-btn"><?php
						echo $this->makeSearchButton(
						"go",
						array( "id" => "searchGoButton", "class" => "searchButton btn btn-default" )
					);

					echo $this->makeSearchButton(
						"fulltext",
						array( "id" => "mw-searchButton", "class" => "searchButton btn btn-default" )
					);
				?></div>
				</div>
		</form>
	<?php
	}

	function cactions() {
		$context_actions = array();
		$primary_actions = array();
		$secondary_actions = array();

		foreach ( $this->data['content_actions'] as $key => $tab ) {
			if ( isset($tab['primary']) && $tab['primary'] == '1' || $key == 'form_edit' ) {
				if ( isset($tab['context']) ) {
					$context_actions[$key] = $tab;

					if ( strpos( $tab['class'], 'selected' ) !== false ) {
						$context_actions[$key]['class'] .= ' active';
					}
				} else {
					$primary_actions[$key] = $tab;

					if ( strpos( $tab['class'], 'selected' ) !== false ) {
						$primary_actions[$key]['class'] .= ' active';
					}
				}
			} else {
				$secondary_actions[$key] = $tab;

				if ( strpos( $tab['class'], 'selected' ) !== false ) {
					$secondary_actions[$key]['class'] .= ' active';
				}
			}
		}
		?>

		<nav class="navbar navbar-grey navbar-stick" id="wiki-actions" role="navigation">
			<div class="container"><div class="row">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gw-toolbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="gw-toolbar">
					<ul class="nav navbar-nav">
					<?php
						foreach ( $context_actions as $key => $tab ) {
							echo $this->makeListItem( $key, $tab );
						}
					?>
					</ul>
					<?php
						$this->searchBox();
					?>
					<ul class="nav navbar-nav navbar-right hidden-xs">
					<?php
						foreach ( $primary_actions as $key => $tab ) {
							echo $this->makeListItem( $key, $tab );
						}
					?><li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">more <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
					<?php
						foreach ( $secondary_actions as $key => $tab ) {
							echo $this->makeListItem( $key, $tab );
						}
					?>
							</ul>
						</li>
					</ul>
				</div>
			</div></div>
		</nav>
	<?php
	}

	/*************************************************************************************************/
	function toolbox() {
		?>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cog"></i> <?php $this->msg( 'toolbox' ) ?> <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<?php
					foreach ( $this->getToolbox() as $key => $tbitem) {
						echo $this->makeListItem( $key, $tbitem );
					}

					wfRunHooks( 'MonoBookTemplateToolboxEnd', array( &$this ) );
					wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this, true ) );
				?>
			</ul>
		</li>
	<?php
	}

	/*************************************************************************************************/
	function personaltools() {
		$personal_tools = $this->getPersonalTools();
		$notifications_message_tool = NULL;
		$notifications_alert_tool = NULL;

		?>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				<span class="glyphicon glyphicon-user" aria-label="<?php $this->msg( 'personaltools' ) ?>"></span>
				<?php
					if (isset($personal_tools['userpage'])) {
						echo $personal_tools['userpage']['links'][0]['text'];
					} else {
						$this->msg( 'listfiles_user' );
					} ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<?php
					foreach ( $personal_tools as $key => $item ) {
						if ($key === 'notifications-alert') {
							$notifications_alert_tool = $item;
						} else if ($key === 'notifications-message') {
							$notifications_message_tool = $item;
						} else {
							echo $this->makeListItem( $key, $item );
						}
					}
				?>
			</ul>
		</li>
		<?php

		if (!is_null($notifications_message_tool)) {
			echo $this->makeListItem('notifications-message', $notifications_message_tool);
		}

		if (!is_null($notifications_alert_tool)) {
			echo $this->makeListItem('notifications-alert', $notifications_alert_tool);
		}
	}

	/*************************************************************************************************/
	function languageBox() {
		if ( $this->data['language_urls'] !== false ) {
			?>
			<div id="p-lang" class="portlet" role="navigation">
				<h3<?php $this->html( 'userlangattributes' ) ?>><?php $this->msg( 'otherlanguages' ) ?></h3>

				<div class="pBody">
					<ul>
						<?php foreach ( $this->data['language_urls'] as $key => $langlink ) { ?>
							<?php echo $this->makeListItem( $key, $langlink ); ?>
						<?php
							}
						?>
					</ul>

					<?php $this->renderAfterPortlet( 'lang' ); ?>
				</div>
			</div>
		<?php
		}
	}

	/*************************************************************************************************/
	/**
	 * @param string $bar
	 * @param array|string $cont
	 **/
	function customBox( $bar, $cont ) {
		$msgObj = wfMessage( $bar );

		if ( $bar !== 'navigation' ) { ?>
			<li class="dropdown">
				<a href="/wiki/Kisow_Wiki:Menu-<?php echo htmlspecialchars( $bar ) ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo htmlspecialchars( $msgObj->exists() ? $msgObj->text() : $bar ); ?> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
		<?php }

		if ( is_array ( $cont ) ) {
			foreach ( $cont as $key => $val ) {
				if ( $val['text'] === '---' ) {
					echo '<li role="presentation" class="divider"></li>';
				} elseif ( substr( $val['text'], 0, 7 ) === 'header:' ) {
					echo '<li role="presentation" class="dropdown-header">' . htmlspecialchars( substr( $val['text'], 7 ) ) . '</li>';
				} else {
					echo $this->makeListItem( $key, $val );
				}
			}
		} else {
			echo "<!-- This would have been a box, but it contains custom HTML which is not supported. -->";
		}

		if ( $bar !== 'navigation' ) { ?>
				</ul>
			</li>
		<?php }
	}
}
