<?php //netteCache[01]000431a:2:{s:4:"time";s:21:"0.68997100 1397142094";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:108:"C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Pages\default.latte";i:2;i:1388595284;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Pages\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'kqweng8bb8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb69b92ea000_content')) { function _lb69b92ea000_content($_l, $_args) { extract($_args)
?>    <div class="under-tabs">
        <div class="nav-box build clearfix">
            <a class="add-page-ico" href="<?php echo htmlSpecialChars($_control->link("Pages:addPage")) ?>
">
                <span class="glyphicon glyphicon-plus">
                </span>
                <?php echo Nette\Templating\Helpers::escapeHtml(gettext("Přidat stránku"), ENT_NOQUOTES) ?>

            </a>
        </div>
<div id="<?php echo $_control->getSnippetId('items') ?>"><?php call_user_func(reset($_l->blocks['_items']), $_l, $template->getParameters()) ?>
</div>     </div>
     
   <script type="text/javascript">
    jQuery(function() {
        
      jQuery("ul.sortable").livequery(function() {
              
          jQuery(this).sortable({
              update: function(serialize, ui) {
                  jQuery.ajax({
                      url: <?php echo Nette\Templating\Helpers::escapeJs($_control->link("changeRank!")) ?>,
                      data: jQuery(this).sortable("serialize"),
                      type: 'post'
                  });
              }
          });
      });
      jQuery("ul.sortable").disableSelection();
    });
  </script>
<?php
}}

//
// block _items
//
if (!function_exists($_l->blocks['_items'][] = '_lb105260014e__items')) { function _lb105260014e__items($_l, $_args) { extract($_args); $_control->validateControl('items')
?>            <ul class="sortable pageitems">
<?php $iterations = 0; foreach ($items as $item): ?>
                  <li class="item" id="item-<?php echo htmlSpecialChars($item->id) ?>">
                    <i class="glyphicon glyphicon-move">&nbsp;</i><?php echo Nette\Templating\Helpers::escapeHtml($item['title'], ENT_NOQUOTES) ?>

                    <span class="toright">
                        <a href="<?php echo htmlSpecialChars($_control->link("Pages:edit", array($item->id, 'lang'=>$lang))) ?>
">
                            <i class="glyphicon glyphicon-pencil">&nbsp;</i>
                        </a>
                        <a href="<?php echo htmlSpecialChars($_control->link("Pages:remove", array($item->id))) ?>
">
                            <i class="glyphicon glyphicon-remove-circle">&nbsp;</i>
                        </a>                            
                    </span>
                  </li>

<?php $iterations++; endforeach ?>
            </ul>
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