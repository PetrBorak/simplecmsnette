<?php //netteCache[01]000432a:2:{s:4:"time";s:21:"0.24313000 1397142342";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:109:"C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Reference\edit.latte";i:2;i:1396106880;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\Users\Petr\Documents\prace\petrborak.cz\simpleRedakcakNette\app\adminModule\templates\Reference\edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'pzowtxaxq4')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbbe5136870e_content')) { function _lbbe5136870e_content($_l, $_args) { extract($_args)
?>    <div id="main-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
            <h4 class="modal-title"><?php echo Nette\Templating\Helpers::escapeHtml(gettext("Zadejte popisek obrázku."), ENT_NOQUOTES) ?></h4>
          <div class="modal-body">
           <form method="post" action="<?php echo htmlSpecialChars($_control->link("saveImageData!")) ?>" class="ajax">
               <span class='flagformen'></span><input type="text" id="englishtitle" name="englishtitle" />
               <span class='flagformcz'></span><input type="text" id="czechtitle" name="czechtitle" />
															<input type="hidden" name="imageid" id="imageidform" value="0" />
               <button type="submit" id="submitmainmodal" class='btn btn-primary'>Submit</button>
           </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <div class="under-tabs">
    <div class="listcontrol clearfix">
       <div class="lc-items">
           <a data-tab="detail" class="active" href="">Detail</a>
           <a data-tab="images" href="">Obrázky</a>
       </div>
    </div>
    <div class="wrapper">
      <div data-tab="detail" class="tabs tabs-reference active">
<div id="<?php echo $_control->getSnippetId('editForm') ?>"><?php call_user_func(reset($_l->blocks['_editForm']), $_l, $template->getParameters()) ?>
</div>        </div>
            <div data-tab="images" class="tabs tabs-image">

<?php $_ctrl = $_control->getComponent("addImage"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ;$iterations = 0; foreach ($langs as $lang): ?>
                        <div class="formrow clearfix flag">
                            <?php echo Nette\Templating\Helpers::escapeHtml($control["addImage"]["title".$lang]->label, ENT_NOQUOTES) ?>

                            <?php echo Nette\Templating\Helpers::escapeHtml($control["addImage"]["title".$lang]->control, ENT_NOQUOTES) ?>

                              <span class="flag <?php echo htmlSpecialChars($lang) ?>flag">
                              </span>
                          </div>

<?php $iterations++; endforeach ?>
                  <div class="formrow clearfix">
                      <?php echo Nette\Templating\Helpers::escapeHtml($control["addImage"]["image"]->label, ENT_NOQUOTES) ?>

                      <?php echo Nette\Templating\Helpers::escapeHtml($control["addImage"]["image"]->control, ENT_NOQUOTES) ?>

                  </div>
                  <div class="formrow clearfix">
                      <?php echo Nette\Templating\Helpers::escapeHtml($control["addImage"]["odeslat"]->control, ENT_NOQUOTES) ?>

                  </div>              
<?php $_ctrl = $_control->getComponent("editForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ?>

                <div class="formrow clearfix build info">
                    <i class="glyphicon glyphicon-warning-sign"></i>&nbsp;První obrázek slouží zároveň jako hlavní obrázek reference.
                </div>
																
<div id="<?php echo $_control->getSnippetId('images') ?>"><?php call_user_func(reset($_l->blocks['_images']), $_l, $template->getParameters()) ?>
</div>
<script type="text/javascript">
                $(document).ready(function(){
																								
																							$('.lc-items a').tabs();
																																														
																							var hash = window.location.hash;
																							switch(hash){
																											case '#images':
																											console.log('hash passed');
																											console.log(hash);
																											$('a[data-tab="images"]').click();
																			        break;
																											default:
																												console.log('hash');
																												console.log(hash);
																											return false;
																			}
																							$.nette.init();

																							$.nette.ext({
																														success: function(){
																														$('#main-modal .modal-body').append('<div id="alertmodalform" class="build">Data byla úspěšně uložena.</div>');
																				$('.images-to-edit').setDimensions('.image-item img');
																														}
																										});
																														
                       $('.images-to-edit .edit-image').bind('click',function(){
                        createModal.init(this);
                        });
                            });
                 setId = function(url,id){
                     console.log(window.location.host);
                    
                     
                     var regexpset = new RegExp("(http:\/\/"+window.location.host+"\/admin\/cs\/reference\/edit\/)2","g");
                    console.log('window.location');
                    console.log(window.location);
                    regexpset = eval(regexpset);
                    console.log('regexpset');
                    console.log(regexpset);
                    
                    var toreturn =  url.replace(regexpset,'$1'+id+'?do=editForm-submit');
                    console.log('to return');
                    console.log(toreturn);
         }
                 createModal = {
																					   id: 0,
																								init:function(element){
                     /*
                    var element = $(element);
                    console.log('element');
                    console.log(element);
                    console.log(element.attr('id'));
                    var id = /\d+/.exec(element.attr('id'));
                    //id = id[1];
                    console.log('id');
                    console.log(id);
                    var linkTosend = setId(window.location.href, id);
                    var action = linkTosend;
                    console.log("action");
                    console.log(action);
                    var modalform = $('#main-modal form');
                    modalform.attr('action',linkTosend);
                    */
																												$('#main-modal #alertmodalform').remove();
																												var modalform = $('#main-modal form');
																												$('.modalsuccessalert').remove();
																												var czechtitle = $('#czechtitle');
																												var englishtitle = $('#englishtitle');
																												var imageidform = $('#imageidform');
																												this.id = /\d+/.exec($(element).attr('id'));
																												var formtosend = $('#main-modal form');
																												var that = this;
																												$.getJSON(<?php echo Nette\Templating\Helpers::escapeJs($_control->link("getformdata!")) ?>,{'imgid':that.id},function(data){
																																console.log('sended data');
																																console.log(data);
																																czechtitle.val(data.items.cs[0].title);
																																englishtitle.val(data.items.en[0].title);
																																console.log(englishtitle);
																																console.log(data.items.en[0].title);
																																imageidform.val(that.id);
																																});
																																
																																console.log($.nette);																		
																												$('#main-modal').modal();
																}
																				
																
																}
						$.fn.tabs = function(){
						  $(this).bind('click', function(event){
																console.log('tabs');
																var dataTab = $(this).attr('data-tab');
																window.location.hash = dataTab;
																$('.tabs').removeClass('active');
																var activetab = $('.tabs[data-tab='+dataTab+']');
																$('.lc-items a').removeClass('active');
																activetab.addClass('active');
																$(this).addClass('active');
																event.preventDefault();
								});
						}
		    $.fn.setDimensions = function(selector){
						   $(this).find(selector).each(function(i,obj){
                            console.log('iteration');
                            var width=$(obj).width();
                            var height = $(obj).height();
                            var dimension = width/height;
                            var dim01 = 200/width;
                            var dim02 = 130/height;
                            var main = dim01 > dim02 ? dim01 : dim02;
                            if(dim01 > dim02){
                              var finalwidth = width * dim01;
                              var finalheight = finalwidth / dimension;
                            }else{
                                var finalheight = height * dim02;
                                var finalwidth = finalheight * dimension;
                          }
                          $(obj).height(finalheight+'px');
                          $(obj).width(finalwidth+'px');
                    });
						}
                $(window).load(function(){
																				$('.images-to-edit').setDimensions('.image-item img');
                            });
																												
                jQuery(function() {
																				


                  jQuery("ul.sortable").livequery(function() {

                      jQuery(this).sortable({
                          update: function(serialize, ui) {
                              jQuery.ajax({
                                  url: <?php echo Nette\Templating\Helpers::escapeJs($_control->link("changeRankImages!")) ?>,
                                  data: jQuery(this).sortable("serialize"),
                                  type: 'post'
                              });
                          }
                      });
                  });
                  jQuery("ul.sortable").disableSelection();
                });
              </script>
            </div>
        </div>
      </div><?php
}}

//
// block _editForm
//
if (!function_exists($_l->blocks['_editForm'][] = '_lb32da59f5a3__editForm')) { function _lb32da59f5a3__editForm($_l, $_args) { extract($_args); $_control->validateControl('editForm')
;$_ctrl = $_control->getComponent("editForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('begin') ;$iterations = 0; foreach ($langs as $lang): ?>
                  <div class="ut-header">
                      <div class="flags">
                          <span class="<?php echo htmlSpecialChars($lang) ?>flag">
                          </span>
                      </div>
                  </div>
                  <div class="formrow clearfix">
                      <?php echo Nette\Templating\Helpers::escapeHtml($control['editForm']['title'.$lang]->label, ENT_NOQUOTES) ?>

                      <?php echo Nette\Templating\Helpers::escapeHtml($control['editForm']['title'.$lang]->control, ENT_NOQUOTES) ?>

                  </div>
                  <div class="formrow clearfix">
                      <?php echo Nette\Templating\Helpers::escapeHtml($control['editForm']['created'.$lang]->label, ENT_NOQUOTES) ?>

                      <?php echo Nette\Templating\Helpers::escapeHtml($control['editForm']['created'.$lang]->control, ENT_NOQUOTES) ?>

                  </div>
                  <div class="formrow clearfix">
                      <?php echo Nette\Templating\Helpers::escapeHtml($control['editForm']['content'.$lang]->label, ENT_NOQUOTES) ?>

                      <?php echo Nette\Templating\Helpers::escapeHtml($control['editForm']['content'.$lang]->control, ENT_NOQUOTES) ?>

                  </div>                
<?php $iterations++; endforeach ?>
																<?php echo Nette\Templating\Helpers::escapeHtml($control['editForm']['rank']->control, ENT_NOQUOTES) ?>

              <div class="formrow clearfix build">
                  <?php echo Nette\Templating\Helpers::escapeHtml($control["editForm"]["categories"]->label, ENT_NOQUOTES) ?>

                  <?php echo Nette\Templating\Helpers::escapeHtml($control["editForm"]["categories"]->control, ENT_NOQUOTES) ?>

              </div>
              <div class="formrow clearfix">              
                <?php echo Nette\Templating\Helpers::escapeHtml($control["editForm"]["submit"]->control, ENT_NOQUOTES) ?>

              </div>
<?php $_ctrl = $_control->getComponent("editForm"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render('end') ;
}}

//
// block _images
//
if (!function_exists($_l->blocks['_images'][] = '_lb9285e0759c__images')) { function _lb9285e0759c__images($_l, $_args) { extract($_args); $_control->validateControl('images')
?>																				<div class="images-to-edit">
																								<ul class="sortable clearfix images-list">
<?php $iterations = 0; foreach ($images as $image): ?>
																																<li class="image-item" id="item-<?php echo htmlSpecialChars($image['id']) ?>">
																																				<a href="#">
																																								<img src="<?php echo htmlSpecialChars($image['path']) ?>" />
																																				</a>
																																				<div class="options-images clearfix">
																																								<span id="edit-img-<?php echo htmlSpecialChars($image['id']) ?>" class="edit-image">
																																												<i class="glyphicon glyphicon-pencil"></i>
																																								</span>
																																								<span id="remove-img-<?php echo htmlSpecialChars($image['id']) ?>" class="edit-image">
																																												<a class="ajax" href="<?php echo htmlSpecialChars($_control->link("removeImage!", array('imageid'=>$image['id']))) ?>
"><i class="glyphicon glyphicon-remove-circle"></i></a>
																																								</span>																																				
																																				</div>
																																</li>
<?php $iterations++; endforeach ?>
																								</ul>
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