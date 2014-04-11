var formtemplates = {
								addcategory: _.template('<form class="ajaxwithresponseform" method="post" action="<%= action%>" class="ajax"><%_.each(langs, function(lang){%><span class="formrow"><span class=<%=lang%>flag></span><label class="dib w200 mr10" for="name"><%=preklad.nazevKategorie%></label><input type="text" id="name" name="<%=lang%>-nameofcategory"></span><%})%><button type="submit" id="submitmainmodal" class="btn btn-primary">Submit</button></form>'),
								
				removecategory: _.template('<div class="formrow"><%=preklad.opravdu%></div><a id="removeuserbtn" href="<%=action%>" class="btn btn-danger"><%=preklad.odstranit%></a>'),
								
				formusers: _.template('<form class="ajaxwithresponseform" method="post" action="<%= action%>" class="ajax"><span class="formrow"><label class="dib w200 mr10" for="password01">Nové heslo</label><input type="password" id="password01" name="password01"></span><span class="formrow"><label class="dib w200 mr10" for="password02">Nové heslo znovu</label><input type="password" id="password02" name="password02"></span><input type="hidden" name="userid" id="userid" value="<%= userid%>"><button type="submit" id="submitmainmodal" class="btn btn-primary">Submit</button></form>'),

removeuser: _.template('<div class="formrow">Opravdu si přejete tohoto usera odstranit?</div><a id="removeuserbtn" href="#" class="btn btn-danger">Odstranit usera</a>'),

adduser: _.template('<form class="ajaxwithresponseform" action="<%= action%>"><span class="formrow"><label class="dib w200 mr10">Username</label><input name="username" type="text"></span><span class="formrow"><label class="dib w200 mr10">Jméno uživatele</label><input name="name" type="text"></span><span class="formrow"><label class="dib w200 mr10">Heslo pro usera</label><input name="password" type="password"></span><span class="formrow"><label class="dib w200 mr10">Heslo znovu</label><input name="password02" type="password"></span><span class="formrow"><label class="dib w200 mr10">Role usera</label><select name="roleuser"><option value="superadmin">Super admin</option><option value="admin">Admin</option><option value="guest">Guest</option></select></span><span class="formrow"><button type="submit" id="submitmainmodal" class="btn btn-primary">Submit</button></span></form>')

}
