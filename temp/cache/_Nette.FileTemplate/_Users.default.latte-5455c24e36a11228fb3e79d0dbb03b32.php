<?php //netteCache[01]000431a:2:{s:4:"time";s:21:"0.10338300 1397142399";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:108:"C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Users\default.latte";i:2;i:1397058226;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Users\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'twrzwo86qw')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block additional
//
if (!function_exists($_l->blocks['additional'][] = '_lbd3588ca0b3_additional')) { function _lbd3588ca0b3_additional($_l, $_args) { extract($_args)
?>  <script rel="javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/underscore.js"></script>
		<script rel="javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/modal-users-template.js"></script>
		<script rel="javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/form-users.js"></script>
		<script rel="javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/make-modal.js"></script>
		<script rel="javascript" src="<?php echo htmlSpecialChars($basePath) ?>/js/formwithresponse.js"></script>
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6270e45eda_content')) { function _lb6270e45eda_content($_l, $_args) { extract($_args)
?>				<div class="under-tabs">
				<div class="nav-box build clearfix">
          <a id="addUser" class="add-page-ico" href="<?php echo htmlSpecialChars($_control->link("add!")) ?>
">
              <span class="glyphicon glyphicon-plus">
              </span>
               Přidat usera
          </a>
     </div>								
<div id="<?php echo $_control->getSnippetId('users') ?>"><?php call_user_func(reset($_l->blocks['_users']), $_l, $template->getParameters()) ?>
</div>				</div><?php
}}

//
// block _users
//
if (!function_exists($_l->blocks['_users'][] = '_lb03d71d5e37__users')) { function _lb03d71d5e37__users($_l, $_args) { extract($_args); $_control->validateControl('users')
?>												<table class="users">
																<thead>
																				<tr>
																								<th><?php echo Nette\Templating\Helpers::escapeHtml(gettext('Username'), ENT_NOQUOTES) ?></th>
																								<th><?php echo Nette\Templating\Helpers::escapeHtml(gettext('Role'), ENT_NOQUOTES) ?></th>
																								<th><?php echo Nette\Templating\Helpers::escapeHtml(gettext('Edit password'), ENT_NOQUOTES) ?></th>
																								<th><?php echo Nette\Templating\Helpers::escapeHtml(gettext('Remove'), ENT_NOQUOTES) ?></th>
																				</tr>
																</thead>
																<tbody id="usersid">
<?php $iterations = 0; foreach ($users as $user): ?>
																								<tr>
																												<td><?php echo Nette\Templating\Helpers::escapeHtml($user['username'], ENT_NOQUOTES) ?></td>
																												<td><?php echo Nette\Templating\Helpers::escapeHtml($user['role'], ENT_NOQUOTES) ?></td>
																												<td>
																																<a class="updatepass" data-userid=<?php echo htmlSpecialChars($user['id'])  ?>
 href="<?php echo htmlSpecialChars($_control->link("edit!", array('userid'=>$user["id"]))) ?>
"><i class="glyphicon glyphicon-pencil"></i>
																																</a>
																												</td>
																												<td>
																																<a class="removeuser" href="<?php echo htmlSpecialChars($_control->link("remove!", array('userid'=>$user["id"]))) ?>
">
																																				<i class="glyphicon glyphicon-remove-circle"></i>
																																</a>
																												</td>
																								</tr>
<?php $iterations++; endforeach ?>
																</tbody>
																<script rel="javascript">
																				$('#usersid .updatepass').each(function(i,obj){
																				$(obj).makemodal({ title:<?php echo Nette\Templating\Helpers::escapeJs(gettext('Upravte heslo')) ?>, modalbody:'formusers'});
								});
																			$('#usersid .removeuser').makemodal02({ title:<?php echo Nette\Templating\Helpers::escapeJs(gettext('Opravdu odstranit?')) ?>, modalbody:'formtemplate'});																				
																			$('#addUser').makemodal03({ title:<?php echo Nette\Templating\Helpers::escapeJs(gettext('Přidejte usera?')) ?>, modalbody:'adduser'});																				
																</script>
												</table>
<?php
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['additional']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 