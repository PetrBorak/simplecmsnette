<?php //netteCache[01]000434a:2:{s:4:"time";s:21:"0.22598100 1397135346";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:111:"C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Homepage\default.latte";i:2;i:1387911349;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'm2tzusykbq')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe7c4d0adf4_content')) { function _lbe7c4d0adf4_content($_l, $_args) { extract($_args)
?><div class="under-tabs">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Víteje!</h3>
        </div>
        <div class="panel-body">
            <?php echo Nette\Templating\Helpers::escapeHtml(gettext("Vítejte na stránkách redakčního systému Simple."), ENT_NOQUOTES) ?>

        </div>
    </div>
    <div class="ut-row clearfix">
        <div class="ut-half">
            <div class="panel panel-info h232">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Technická podpora
                    </h3>
                 </div>
                 <div class="panel-body">
                     V případě, že budete mít jakékoliv dotazy k tomuto systému, kontaktujte nás prosím na e-mailové adrese podpora@egen.cz nebo na telefonu 777 33 66 00. Kontaktovat nás můžete také prostřednictvím tohoto <a href="#">formuláře pro podporu</a>.
                 </div>
              </div>
          </div>

            <div class="ut-half last">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Informace o katalogu
                        </h3>
                     </div>
                     <div class="panel-body">
                         <table>
                             <tbody>
                                 <tr>
                                     <td>Typ katalogu:</td>
                                     <td><?php echo Nette\Templating\Helpers::escapeHtml($config->application->type, ENT_NOQUOTES) ?></td>
                                 </tr>
                                 <tr>
                                     <td>Verze katalogu:</td>
                                     <td><?php echo Nette\Templating\Helpers::escapeHtml($config->application->version, ENT_NOQUOTES) ?></td>
                                 </tr>
                                <tr>
                                     <td>Verze katalogu:</td>
                                     <td><?php echo Nette\Templating\Helpers::escapeHtml($config->application->compiled, ENT_NOQUOTES) ?></td>
                                 </tr> 
                                <tr>
                                     <td>Vaše oprávnění:</td>
                                     <td>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($user->getIdentity()->getRoles()) as $item): ?>
                                            <?php echo Nette\Templating\Helpers::escapeHtml($item, ENT_NOQUOTES) ?>

<?php if (!$iterator->isLast()): ?>
                                            ,&nbsp;
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
                                     </td>
                                 </tr>                              
                             </tbody>
                         </table>
                     </div>
                  </div>
            </div> 
        </div>
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