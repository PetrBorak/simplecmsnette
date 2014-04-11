<?php //netteCache[01]000425a:2:{s:4:"time";s:21:"0.13210300 1397065214";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:102:"C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\@layout.latte";i:2;i:1396113817;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'b00gj1f7lk')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb8b937fba6d_title')) { function _lb8b937fba6d_title($_l, $_args) { extract($_args)
?>Nette Application Skeleton<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb8fbb20c465_head')) { function _lb8fbb20c465_head($_l, $_args) { extract($_args)
;
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/screen.css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/print.css" />
        <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap.css" />
        <link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap-theme.css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.livequery.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/nette.ajax.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/tinymce.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/application.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.form.js"></script>
<?php if (isset($_l->blocks["additional"])): Nette\Latte\Macros\UIMacros::callBlock($_l, 'additional', $template->getParameters()) ;endif ?>
        
								<script type="text/javascript">
												$(function () {
																$.nette.init();
												});
								</script>
        
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
<?php if ($user->isLoggedIn()): ?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Simple admin</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav log-info">
            <li><a class="user-info" href="#"><i class="glyphicon glyphicon-user"></i><?php echo Nette\Templating\Helpers::escapeHtml($user->identity->data['username'], ENT_NOQUOTES) ?></a></li>
            <li><a href="<?php echo htmlSpecialChars($_control->link("User:password")) ?>
">Změna hesla</a></li>
            <li><a href="<?php echo htmlSpecialChars($_control->link("signOut!")) ?>
">Odhlásit se</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<?php endif ?>
  <div class="container pt-70">
<?php $iterations = 0; foreach ($flashes as $flash): ?>      <div class="alert alert-<?php echo htmlSpecialChars($flash->type) ?>
 alelrt-dismisable"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?>

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
<?php $iterations++; endforeach ;if ($user->isLoggedIn()): ?>
              <ul class="nav nav-tabs">
                  <li <?php try { $_presenter->link("Homepage:default"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>>
                      <a href="<?php echo htmlSpecialChars($_control->link("HomePage:default", array('lang'=>$lang))) ?>
">Admin</a>
                  </li>
                  <li <?php try { $_presenter->link("Homepagelist:default"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>>
                      <a href="<?php echo htmlSpecialChars($_control->link("Homepagelist:default", array('lang'=>$lang))) ?>
">Homepage</a>
                  </li>
                  <li <?php try { $_presenter->link("Pages:default"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>

                      <?php try { $_presenter->link("Pages:edit"); } catch (Nette\Application\UI\InvalidLinkException $e) {}; if ($_presenter->getLastCreatedRequestFlag("current")): ?>
class="active"<?php endif ?>>
                      <a href="<?php echo htmlSpecialChars($_control->link("Pages:default")) ?>
">Pages</a>
                  </li>
                  <li<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Reference:*') ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
                      <a href="<?php echo htmlSpecialChars($_control->link("Reference:default")) ?>
">Reference</a>
                  </li>
																		<li<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Categories:*') ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
																						<a href="<?php echo htmlSpecialChars($_control->link("Categories:default")) ?>
">Categories</a>
																		</li>
<?php if ($user->isInRole('superadmin')): ?>
																				<li<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Users:*') ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
																								<a href="<?php echo htmlSpecialChars($_control->link("Users:default")) ?>
">Users</a>
																				</li>
<?php endif ?>
                  
              </ul>
<?php endif ?>



           

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>


<div class="footer-main-admin">
    <div class="fma-left">
        Simple CMS catalog. Vydán dne 17.12. 2013
    </div>
    <div class="fma-right">
        <a href="http://nette.org" target="_blank" title="Nette Framework - The Most Innovative PHP Framework"><img src="data:image/gif;base64,R0lGODlhUAAPAJEAAGZmZjSE0v///4qDcCH5BAAAAAAALAAAAABQAA8AAAKthI+py+0Pj5i02ouz3rwbEYTiSJZmKAzqyrbuC8fCd9a2mMb6zqszALoJS7me8Tj4BYOB5QT1bEYpuBWFNbFqk1lu8erF0qSo8ojZxJG+vnayncoV3/S53DoG6aFMdD/aZNVVB1fXBRZG6JMHZab2mHa2tXUX51Z4qZjEaEblGCnVNymIRZd4dzq4CTTUWoUEu6Pk6joXeyvGSjtki4ur1BEsPEyMEXGMnKysUAAAOw==" alt="Powered by Nette Framework" width="80" height="15" /></a>
        <a href="http://dibiphp.com" target="_blank" title="dibi - tiny 'n' smart database abstraction layer"><img src="data:image/gif;base64,R0lGODlhUAAPALMAAGqt3JzI597t9+72+zqS0Hu24M3k80qb1CmJzGZmZv///4mOeQAAAAAAAAAAAAAAACH5BAAAAAAALAAAAABQAA8AAATZMMlJq704682n+mAojmRpnmgqKUjrvnAMK0tt33iu7/ytrLIPQiicsVq0nnLJrP0SRyPCMBhGXQKBK9nsep3AFmCgCBSRZcUAEMSBfNy48zOP0xdvd7gAIrOIaiAFVltuTod4hzRJXImOjYx6UGgBBACAVgAEZn9RjXh3j4qPd3mgkY42TywHZ5iunYU+hqKLiKO3oj5hH5VmVYC+mEi0cLN2qIyloaphlyFsQs8g0Z5f102rLgACCgJshAjc3uCu2Oc92jLr7EPo7zmrKfP09fYkHfn6+/wWEQA7" width="80" height="15" alt="dibi powered" /></a>
    </div>
</div>
              
    </div>
</body>
</html>
