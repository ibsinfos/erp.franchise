
function login_gtalk(session,username){var currenttime=new Date();currenttime=parseInt(currenttime.getTime()/1000);$.getJSON("//j.chatforyoursite.com/j?json_callback=?",{action:'login',username:username,password:session,session_key:session,server:'talk2.google.com',port:'5222',id:'',key:''},function(data){if(data[0].error=='0'){$.cookie('cc_jabber','true',{path:'/'});$.cookie('cc_jabber_id',data[0].msg,{path:'/'});$.cookie('cc_jabber_type','gtalk',{path:'/'});$('.container_body_2').remove();$('#gtalk_box').html('<span>Procesando ingreso..</span>');setTimeout(function(){try{if(before=="parent"){parent.jqcc.ccjabber.process();parent.closeCCPopup('jabber');}else{parentSandboxBridge.jqcc.ccjabber.process();parentSandboxBridge.closeCCPopup('jabber');}}catch(e){crossDomain();}},4000);}else{alert('Datos de ingreso incorrectos. Intenta de nuevo.');$('#gtalk').css('display','block');$('#loader').css('display','none');}});return false;}
function login_facebook(session){var currenttime=new Date();currenttime=parseInt(currenttime.getTime()/1000);$.getJSON("//j.chatforyoursite.com/j?json_callback=?",{action:'login',username:'dummy'+currenttime,password:'dummy'+currenttime,session_key:session,server:'chat.facebook.com',port:'5222',id:'',key:''},function(data){if(data[0].error=='0'){$.cookie('cc_jabber','true',{path:'/'});$.cookie('cc_jabber_id',data[0].msg,{path:'/'});$.cookie('cc_jabber_type','facebook',{path:'/'});setTimeout(function(){try{if(before=="parent"){parent.jqcc.ccjabber.process();parent.closeCCPopup('jabber');}else{parentSandboxBridge.jqcc.ccjabber.process();parentSandboxBridge.closeCCPopup('jabber');}}catch(e){crossDomain();}},4000);}else{alert('Datos de ingreso incorrectos. Intenta de nuevo.');}});return false;}
function crossDomain(){var ts=Math.round((new Date()).getTime()/1000);var baseUrl='/cometchat/';baseUrl=(baseUrl.indexOf('http://')>=0||baseUrl.indexOf('https://')>=0)?'':baseUrl+'/extensions/jabber';location.href='//'+domain+baseUrl+'/chat.htm?ts='+ts+'&jabber='+$.cookie('cc_jabber')+'&jabber_type='+$.cookie('cc_jabber_type')+'&jabber_id='+$.cookie('cc_jabber_id');}
$.cookie=function(a,b,c){if(typeof b!='undefined'){c=c||{};if(b===null){b='';c.expires=-1}var d='';if(c.expires&&(typeof c.expires=='number'||c.expires.toUTCString)){var e;if(typeof c.expires=='number'){e=new Date();e.setTime(e.getTime()+(c.expires*24*60*60*1000))}else{e=c.expires}d='; expires='+e.toUTCString()}var f=c.path?'; path='+(c.path):'';var g=c.domain?'; domain='+(c.domain):'';var h=c.secure?'; secure':'';document.cookie=[a,'=',encodeURIComponent(b),d,f,g,h].join('')}else{var j=null;if(document.cookie&&document.cookie!=''){var k=document.cookie.split(';');for(var i=0;i<k.length;i++){var l=$.trim(k[i]);if(l.substring(0,a.length+1)==(a+'=')){j=decodeURIComponent(l.substring(a.length+1));break}}}return j}};if(typeof(jqcc)==='undefined'){jqcc=jQuery;};(function($){var ccjabber=[];jqcc.extend(jqcc.standard,{jabberInit:function(){ccjabber=jqcc.ccjabber.getCcjabberVariable();$('<div class="cometchat_tabsubtitle2" id="jabber_login">'+ccjabber.login+'</div>').insertAfter('#cometchat_userstab_popup .cometchat_userstabtitle');$('#jabber_login').unbind('click');$('#jabber_login').bind('click',function(){jqcc.ccjabber.login();});var list='<div id="cometchat_userslist_jabber"></div>';$(list).insertAfter('#cometchat_userslist');if(jqcc.cookie('cc_jabber')&&jqcc.cookie('cc_jabber')=='true'){jqcc.ccjabber.process();}},jabberLogout:function(){$.cometchat.updateJabberOnlineNumber(0);$('.cometchat_subsubtitle_siteusers').remove();$('.cometchat_subsubtitle_jabber').remove();hash='';$('#jabber_login').html(ccjabber.login);$('#cometchat_userslist_jabber').html('');ccjabber.heartbeatCount=1;clearTimeout(ccjabber.messageTimer);ccjabber.heartbeatTime=ccjabber.minHeartbeat;jqcc.ccjabber.jabberLogout();$('#jabber_login').unbind('click');$('#jabber_login').bind('click',function(){jqcc.ccjabber.login();});},jabberProcess:function(){if($('.cometchat_subsubtitle').first().length==0){var head='<div class="cometchat_subsubtitle cometchat_subsubtitle_top cometchat_subsubtitle_siteusers"><hr class="hrleft">Usuarios del sitio<hr class="hrright"></div>';$(head).insertBefore('#cometchat_userslist');}
var head='<div class="cometchat_subsubtitle cometchat_subsubtitle_jabber"><hr class="hrleft">Amigos de Facebook<hr class="hrright"></div>';if(jqcc.cookie('cc_jabber_type')=='gtalk'){head='<div class="cometchat_subsubtitle cometchat_subsubtitle_jabber"><hr class="hrleft">Gtalk Amigos<hr class="hrright"></div>';}
$(head).insertBefore('#cometchat_userslist_jabber');$('#cometchat_searchbar').css('display','block');hash='';$('#jabber_login').html(jqcc.ccjabber.getJabberVariableLogout(jqcc.cookie('cc_jabber_type')));$('#jabber_login').unbind('click');$('#jabber_login').bind('click',function(){jqcc.ccjabber.logout();});jqcc.ccjabber.getFriendsList(1);},getRecentDataAjaxSuccess:function(data,id,originalid){var temp='';$.each(data,function(id,message){var sent=0;if(message.type=='sent'){sent=1;}
var selfstyle='';if(message.type=='sent'){fromname='Yo';selfstyle=' cometchat_self';}else{fromname=$.cometchat.getName(jqcc.ccjabber.encodeName(message.from));}
if(fromname.indexOf(" ")!=-1){fromname=fromname.slice(0,fromname.indexOf(" "));}
fromname=fromname.split("@")[0];message.from=jqcc.ccjabber.encodeName(message.from);message.msg=message.msg.replace(/</g,'&lt;').replace(/>/g,'&gt;');temp+=($[ccjabber.theme].processMessage('<div class="cometchat_chatboxmessage" id="cometchat_message_'+message.time+'"><span class="cometchat_chatboxmessagefrom'+selfstyle+'"><strong>'+fromname+'</strong>:&nbsp;&nbsp;</span><span class="cometchat_chatboxmessagecontent'+selfstyle+'">'+message.msg+'</span></div>',selfstyle));});if(temp!=''){$.cometchat.updateHtml(originalid,temp);}},jabberGetFriendsList:function(first){if($('#cometchat_userslist_jabber').html()==''){$('#cometchat_userslist_jabber').html('<div class="cometchat_subsubtitle" style="margin-left:10px;" >Loading...</div>');}
jqcc.ccjabber.getFriendsListAjax(first);},getFriendsListAjaxSuccess:function(data,first){if(data[0]&&data[0].error=='1'){jqcc.ccjabber.logout();}else{var buddylisttemp='';var buddylisttempavatar='';var md5updated=0;var onlineNumber=0;var type=0;$.each(data,function(id,user){if(user.id){var numericid=((user.id).split('@')[0]).split('-')[1];var found=user.id.indexOf('facebook');++onlineNumber;user.id=jqcc.ccjabber.encodeName(user.id);shortname=$.cometchat.getName(user.id);if(found>0){type=1;}
if(typeof(user.n)==="undefined"&&type==1){$.ajax({url:"//graph.facebook.com/"+numericid,dataType:"json",type:"GET",async:false,success:function(output){user.n=output.name;}});}
if(user.n!=''){var pattern=new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);var test='';test=pattern.test(user.n);if(test){user.n=user.n.split("@")[0];}
if(typeof(shortname)==="undefined"){shortname=user.n;}}
user.a=(user.a).replace('http://',window.location.protocol+'//').replace('https://',window.location.protocol+'//');buddylisttemp+='<div id="cometchat_userlist_'+user.id+'" class="cometchat_userlist" onmouseover="jqcc(this).addClass(\'cometchat_userlist_hover\');" onmouseout="jqcc(this).removeClass(\'cometchat_userlist_hover\');"><span class="cometchat_userscontentname">'+shortname+'</span><span class="cometchat_userscontentdot cometchat_'+user.s+'"></span></div>';buddylisttempavatar+='<div id="cometchat_userlist_'+user.id+'" class="cometchat_userlist" onmouseover="jqcc(this).addClass(\'cometchat_userlist_hover\');" onmouseout="jqcc(this).removeClass(\'cometchat_userlist_hover\');"><span class="cometchat_userscontentavatar"><img class="cometchat_userscontentavatarimage" original="'+user.a+'"></span><span class="cometchat_userscontentname">'+shortname+'</span><span class="cometchat_userscontentdot cometchat_'+user.s+'"></span></div>';$.cometchat.userAdd(user.id,user.s,user.m,user.n,user.a,'');}
if(user.md5){hash=user.md5;md5updated=1;}});if(onlineNumber==0){buddylisttempavatar=("<div class='cometchat_nofriends' style='margin-bottom:10px'>De momento no hay usuarios en línea.</div>");}
if(md5updated){if(jqcc.cookie('cc_jabber')&&jqcc.cookie('cc_jabber')=='true'){$.cometchat.updateJabberOnlineNumber(onlineNumber);$.cometchat.replaceHtml('cometchat_userslist_jabber','<div>'+buddylisttempavatar+'</div>');$('.cometchat_userlist').unbind('click');$('.cometchat_userlist').bind('click',function(e){$.cometchat.userClick(e.target);});if($.cometchat.getSessionVariable('buddylist')==1){$(".cometchat_userscontentavatar img").each(function(){if($(this).attr('original')){$(this).attr("src",$(this).attr('original'));$(this).removeAttr('original');}});}
$('#cometchat_search').keyup();}}
clearTimeout(ccjabber.friendsTimer);ccjabber.friendsTimer=setTimeout(function(){jqcc.ccjabber.getFriendsList();},60000);if(first){jqcc.ccjabber.getMessages();}}}});})(jqcc);