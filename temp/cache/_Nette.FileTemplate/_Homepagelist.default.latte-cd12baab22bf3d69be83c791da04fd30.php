<?php //netteCache[01]000438a:2:{s:4:"time";s:21:"0.06278900 1397142039";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:115:"C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Homepagelist\default.latte";i:2;i:1387911460;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Homepagelist\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '2dmz3p8gru')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb9fd5ab5734_content')) { function _lb9fd5ab5734_content($_l, $_args) { extract($_args)
?>    <div class="under-tabs">
<?php $_ctrl = $_control->getComponent("updateform"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ;$iterations = 0; foreach ($langs as $lang): ?>
        <div class="ut-header">
            <div class="flags">
                <span class="<?php echo htmlSpecialChars($lang) ?>flag">
                </span>
            </div>
        </div>

           <div class="formrow clearfix">
              <?php echo Nette\Templating\Helpers::escapeHtml($control["updateform"]["content".$lang]->label, ENT_NOQUOTES) ?>

              <?php echo Nette\Templating\Helpers::escapeHtml($control["updateform"]["content".$lang]->control, ENT_NOQUOTES) ?>

           </div>
<?php $iterations++; endforeach ?>
           <div class="formrow clearfix submitbut">
            <?php echo Nette\Templating\Helpers::escapeHtml($control["updateform"]["submit"]->control, ENT_NOQUOTES) ?>;
            </div>

<?php $_ctrl = $_control->getComponent("updateform"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>

    </div>
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
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 