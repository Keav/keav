var cookie_domain='youtube.com';
var cookie_prefix='';
function _gel(id)
{
return document.getElementById(id);
}
function _pick(){
for(var i=0;i<arguments.length;i++){
if(arguments[i]!==undefined&&arguments[i]!=null){
return arguments[i];
}
}
return null;
}
function _chop(str){
if(str==null||typeof str!='string')return null;
if(str=="")return "";
return str.substring(0,str.length-1);
}
function showSheet(content)
{
var sheet=document.getElementById('sheet');
var sheetContent=document.getElementById('sheetContent');
sheetContent.innerHTML=content;
sheet.style.visibility='visible';
return false;
}
var EventManager=new function(){
var handlerTable=new Object();
this.fireEvent=function(name,arg){
if(handlerTable[name]==null)return;
var handlers=handlerTable[name];
for(var i=0;i<handlers.length;i++){
handlers[i](arg);
}
}
this.addHandler=function(name,fn){
if(handlerTable[name]==null)handlerTable[name]=new Array();
handlerTable[name].push(fn);
return fn;
}
this.removeHandler=function(name,fn){
if(handlerTable[name]==null)return false;
var index=handlerTable[name].indexOf(fn);
if(index==-1)return false;
handlerTable[name].splice(index,1);
return true;
}
};
function toggleClass(element,className){
var e=ref(element);
if(hasClass(e,className)){
removeClass(e,className);
}else{
addClass(e,className);
}
}
function toggleVisibility(whichForm,setVisible)
{
var newstate="none"
if(setVisible==true)
newstate=""
if(document.getElementById)
{
var style2=document.getElementById(whichForm).style;
style2.display=newstate;
}
else if(document.all)
{
var style2=document.all[whichForm].style;
style2.display=newstate;
}
else if(document.layers)
{
var style2=document.layers[whichForm].style;
style2.display=newstate;
}
}
function setInnerHTML(div_id,value)
{
var dstDiv=document.getElementById(div_id);
dstDiv.innerHTML=value;
}
function openPopup(url,name,height,width)
{
var newwindow=window.open(url,name,'height='+height+',width='+width);
if(window.focus){newwindow.focus()}
return false;
}
function openDiv(elName){
var theElemenet=document.getElementById(elName);
if(theElemenet){
theElemenet.style.display="block";
}
}
function closeDiv(elName){
var theElemenet=document.getElementById(elName);
if(theElemenet){
theElemenet.style.display="none";
}
}
function showInline(elName){
var theElemenet=document.getElementById(elName);
if(theElemenet){
theElemenet.style.display="inline";
}
}
function hideInline(elName){
var theElemenet=document.getElementById(elName);
if(theElemenet){
theElemenet.style.display="none";
}
}
function blurElement(elName){
var theElement=document.getElementById(elName);
if(theElement){
theElement.blur();
}
}
function selectLink(elName){
var theElement=document.getElementById(elName);
if(theElement){
theElement.className="selectedNavLink";
}
}
function unSelectLink(elName){
var theElement=document.getElementById(elName);
if(theElement){
theElement.className="unSelectedNavLink";
}
}
function toggleDisplay(divName){
var tempDiv=document.getElementById(divName);
if(!tempDiv){
return false;
}
if((tempDiv.style.display=="block")||(tempDiv.style.display==""&&tempDiv.className.indexOf("hid")==0)){
tempDiv.style.display="none";
return false;
}else if((tempDiv.style.display=="none")||(tempDiv.className.indexOf("hid")!=0)){
tempDiv.style.display="block";
return true;
}
}
function toggleDisplay2(){
var elements=Array.prototype.slice.call(arguments);
arrayEach(elements,function(arg){
var element=ref(arg);
if(element){
element.style.display=(element.style.display!="none"?"none":"");
}
});
}
function setVisible(divName,onOrOff){
var tempDiv=document.getElementById(divName);
if(!tempDiv){
return;
}
if(onOrOff){
tempDiv.style.visibility="visible";
}else{
tempDiv.style.visibility="hidden";
}
}
function hasClass(element,_className){
if(!element){
return;
}
var upperClass=_className.toUpperCase();
if(element.className){
var classes=element.className.split(' ');
for(var i=0;i<classes.length;i++){
if(classes[i].toUpperCase()==upperClass){
return true;
}
}
}
return false;
}
function addClass(element,_class){
if(!hasClass(element,_class)){
element.className+=element.className?(" "+_class):_class;
}
}
function getClassList(element){
if(element.className){
return element.className.split(' ');
}else{
return[];
}
}
function removeClass(element,_class){
var upperClass=_class.toUpperCase();
var remainingClasses=[];
if(element.className){
var classes=element.className.split(' ');
for(var i=0;i<classes.length;i++){
if(classes[i].toUpperCase()!=upperClass){
remainingClasses[remainingClasses.length]=classes[i];
}
}
element.className=remainingClasses.join(' ');
}
}
function toggleClass(element,className){
var el=ref(element);
if(el){
if(hasClass(el,className)){
removeClass(el,className);
}else{
addClass(el,className);
}
}
}
function getDisplayStyleByTagName(o){
var n=o.nodeName.toLowerCase();
return(n=="span"||n=="img"||n=="a")?"inline":"block";
}
function hideDiv(divName){
var tempDiv=document.getElementById(divName);
if(!tempDiv){
return;
}
if(tempDiv.style.display=="inline"){
addClass(tempDiv,"wasinline");
}else if(tempDiv.style.display=="block"){
addClass(tempDiv,"wasblock");
}
tempDiv.style.display="none";
}
function showDiv(divName){
var tempDiv=document.getElementById(divName);
if(!tempDiv){
return;
}
if(hasClass(tempDiv,"wasinline")){
tempDiv.style.display="inline";
removeClass(tempDiv,"wasinline");
}else if(hasClass(tempDiv,"wasblock")){
tempDiv.style.display="block";
removeClass(tempDiv,"block");
}else{
tempDiv.style.display=getDisplayStyleByTagName(tempDiv);
}
}
function toggleShowDiv(divId){
var tempDiv=document.getElementById(divId);
if(tempDiv&&tempDiv.style.display=="none"){
showDiv(divId);
}else{
hideDiv(divId);
}
}
function changeBGcolor(tempDiv,onOrOff){
if(onOrOff==1){tempDiv.style.backgroundColor='#DDD';tempDiv.style.cursor='pointer';tempDiv.style.cursor='hand';}
else{tempDiv.style.backgroundColor='#FFF'}
}
function imgRollover(imgIdArr)
{
if(navigator.userAgent.match(/Opera(\S+)/)){
var operaVersion=parseInt(navigator.userAgent.match(/Opera(\S+)/)[1]);
}
if(!document.getElementById||operaVersion<7)return;
var i=0;
var imgId='';
var imgEle='';
var imgArr=new Array;
for(i=0;i<imgIdArr.length;i++)
{
if(document.getElementById(imgIdArr[i]))
{
imgArr.push(document.getElementById(imgIdArr[i]));
}
}
var imgPreload=new Array();
var imgSrc=new Array();
var imgClass=new Array();
for(i=0;i<imgArr.length;i++)
{
if(imgArr[i].className.indexOf('rollover')>-1)
{
imgSrc[i]=imgArr[i].getAttribute('src');
imgClass[i]=imgArr[i].className;
imgPreload[i]=new Image();
if(imgClass[i].match(/rollover(\S+)/))
{
imgPreload[i].src='/img/'+imgClass[i].match(/rollover(\S+)/)[1];
}
imgArr[i].setAttribute('rsrc',imgSrc[i]);
imgArr[i].onmouseover=function()
{
this.setAttribute('src','/img/'+this.className.match(/rollover(\S+)/)[1])
}
imgArr[i].onmouseout=function()
{
this.setAttribute('src',this.getAttribute('rsrc'))
}
}
else if(imgArr[i].tagName=='A')
{
imgArr[i].onmouseover=function()
{
var imgObj=document.getElementById(this.id.match(/_(\S+)/)[1]);
imgObj.setAttribute('src','/img/'+imgObj.className.match(/rollover(\S+)/)[1])
}
imgArr[i].onmouseout=function()
{
var imgObj=document.getElementById(this.id.match(/_(\S+)/)[1]);
imgObj.setAttribute('src',imgObj.getAttribute('rsrc'))
}
}
}
}
function validateURL(inputField){
if(inputField.value.indexOf("http://")==0){
return false;
}else{
inputField.value="http://"+inputField.value;
return true;
}
}
function getDivHeight(div){
if(div.clientHeight){
return div.clientHeight;
}else if(div.offsetHeight){
return div.offsetHeight;
}
}
var addListener=function(){
if(window.addEventListener){
return function(el,type,fn){
el.addEventListener(type,fn,false);
};
}
else if(window.attachEvent){
return function(el,type,fn){
var f=function(){
fn.call(el,window.event);
};
el.attachEvent('on'+type,f);
};
}
else{
return function(el,type,fn){
el['on'+type]=fn;
}
}
}();
function ref(instance_or_id){
return(typeof(instance_or_id)=="string")?document.getElementById(instance_or_id):instance_or_id;
}
function extendInputSelect(select)
{
if(select!=null&&select._isExtended===undefined){
select.maxItems=-1;
select.setMaxItems=function(count){this.maxItems=(count>=0)?count:-1;}
select.moveSelectedTo=function(list){
while(this.selectedIndex>=0)
{
if(!list.addWithCheck(this.options[this.selectedIndex]))break;
this.options[this.selectedIndex]=null;
}
}
select.moveAllTo=function(list){
while(this.options.length>0)
{
if(!list.addWithCheck(this.options[0]))break;
this.options[0]=null;
}
}
select.addWithCheck=function(option){
if(this.maxItems==-1||this.options.length<this.maxItems){
var newOption=new Option();
newOption.text=option.text;
newOption.value=option.value;
newOption.selected=option.selected;
if(this.isSorted){
this.addSorted(newOption);
}
else{
this.addAppend(newOption);
}
return true;
}
return false;
}
select.addAppend=function(option){
this.addInsert(option,this.options.length);
}
select.addInsert=function(option,index){
if(index>=0&&index<=this.options.length){;
for(var i=this.options.length;i>index;i--){
this.options[i]=new Option();
this.options[i].text=this.options[i-1].text;
this.options[i].value=this.options[i-1].value;
this.options[i].selected=this.options[i-1].selected;
}
this.options[index]=option;
}
}
select.addSorted=function(option){
if(!this.isSorted)this.setSorted(true);
var index=this.options.length;
for(var i=0;i<this.options.length;i++){
if(this.options[i].text>option.text){
index=i;
break;
}
}
this.addInsert(option,index);
}
select.importOption=function(option){
var newOption=new Option();
newOption.text=option.text;
newOption.value=option.value;
newOption.selected=option.selected;
return newOption();
}
select.sort=function(){
if(this.options.length<2)return;
for(var i=0;i<this.options.length-1;i++){
if(this.options[i].text>this.options[i+1].text){
var swap=new Option();
swap.text=this.options[i].text;
swap.value=this.options[i].value;
swap.selected=this.options[i].selected;
this.options[i].text=this.options[i+1].text;
this.options[i].value=this.options[i+1].value;
this.options[i].selected=this.options[i+1].selected;
this.options[i+1].text=swap.text;
this.options[i+1].value=swap.value;
this.options[i+1].selected=swap.selected;
i=-1;
}
}
}
select.isSorted=false;
select.setSorted=function(bit){
this.isSorted=bit;
if(this.isSorted){
this.sort();
}
}
select.getSelectedValue=function(){
if(this.selectedIndex<0)return null;
return this.options[this.selectedIndex].value;
}
select._isExtended=true;
}
}
function DualListBoxController(left,right)
{
this.left=ref(left);
this.right=ref(right);
extendInputSelect(this.left);
extendInputSelect(this.right);
this.moveAllRight=function(){this.left.moveAllTo(this.right);}
this.moveSelectedRight=function(){this.left.moveSelectedTo(this.right);}
this.moveAllLeft=function(){this.right.moveAllTo(this.left);}
this.moveSelectedLeft=function(){this.right.moveSelectedTo(this.left);}
}
function each(array,func){
for(var i=0;i<array.length;i++)func(array[i]);
}
var arrayEach=each;
function focusSearchField(){
if(document.searchForm.search_query){
document.searchForm.search_query.focus();
}
}
function showLoadingIcon(div_id){
var temp_HTML="<img src=/img/icn_loading_animated.gif>";
document.getElementById(div_id).innerHTML=temp_HTML;
}
function showLoading(div_id){
var temp_HTML="<br><br><br><br><br><center><img src=/img/icn_loading_animated.gif></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
document.getElementById(div_id).innerHTML=temp_HTML;
document.body.focus();
}
function displayHideCommentLink(comm_id){
var header_div="comment_header_"+comm_id;
var icn_up_div="comment_up_"+comm_id;
var icn_down_div="comment_down_"+comm_id;
var comment_body_div="comment_body_"+comm_id;
var span_hide_id="hide_link_"+comm_id;
var span_show_id="show_link_"+comm_id;
showDiv(comment_body_div);
document.getElementById(span_show_id).style.visibility='hidden';
hideDiv(span_show_id);
showDiv(span_hide_id);
document.getElementById(span_hide_id).style.visibility='visible';
if(document.getElementById(header_div)){
document.getElementById(header_div).className="commentHead";
}
if(document.getElementById(icn_up_div))document.getElementById(icn_up_div).className="opacity80";
if(document.getElementById(icn_down_div))document.getElementById(icn_down_div).className="opacity80";
}
function displayShowCommentLink(comm_id){
var header_div="comment_header_"+comm_id;
var icn_up_div="comment_up_"+comm_id;
var icn_down_div="comment_down_"+comm_id;
var comment_body_div="comment_body_"+comm_id;
var span_hide_id="hide_link_"+comm_id;
var span_show_id="show_link_"+comm_id;
hideDiv(comment_body_div);
document.getElementById(span_hide_id).style.visibility='hidden';
hideDiv(span_hide_id);
showDiv(span_show_id);
document.getElementById(span_show_id).style.visibility='visible';
if(document.getElementById(header_div)){
document.getElementById(header_div).className="commentHeadHidden opacity80";
}
if(document.getElementById(icn_up_div))document.getElementById(icn_up_div).className="opacity30";
if(document.getElementById(icn_down_div))document.getElementById(icn_down_div).className="opacity30";
}
function showMsg(msg){
return overlib(msg,WIDTH,300);
}
function voteComment(comment_id,vid_id,comment_ref_id,increment){
var url_string="/comment_voting?a="+increment+"&id="+comment_id+"&video_id="+vid_id+"&old_vote="+comment_ref_id;
var vote_div_id="CommentVote"+comment_id;
var comment_body="comment_body_"+comment_id;
var hide_link_id="hide_link_"+comment_id;
var show_link_id="show_link_"+comment_id;
getUrlXMLResponseAndFillDiv(url_string,vote_div_id);
if(increment<0){
hideDiv(comment_body);
displayShowCommentLink(comment_id);
}
showLoadingIcon(vote_div_id);
}
function voteCommentHidden(comment_id,vid_id,comment_ref_id,increment){
var comment_body_div="comment_body_"+comment_id;
var hide_link_id="hide_link_"+comment_id;
var show_link_id="show_link_"+comment_id;
if(document.getElementById(comment_body_div).style.display=='none'){
displayHideCommentLink(comment_id);
}
else{
voteComment(comment_id,vid_id,comment_ref_id,increment);
}
}
function spam(comment_id,vid_id){
var url_string="&mark_comment_as_spam="+comment_id+"&entity_id="+vid_id;
postUrlXMLResponse('/comment_servlet',url_string,null);
displayShowCommentLink(comment_id);
hideSpam(comment_id);
}
function hasAncestor(element,ancestor){
var el=ref(element);
var an=ref(ancestor);
while(el!=document&&el!=null){
if(el==an)return true;
el=el.parentNode;
}
return false;
}
var gMenuTimer=0;
var gMenuTimer2=0;
function showHiddenMenu(e,el,now){
cancelCloseHiddenMenu();
if(now){
showHiddenMenu2(e,el);
}else{
showHiddenMenu2(e,el);
}
}
function showHiddenMenu2(e,el){
if(el!='videoTime'&&_gel('videoTime')){
addClass(_gel('videoTime'),'hid');
}
if(el!='videoLists'&&_gel('videoLists')){
addClass(_gel('videoLists'),'hid');
}
if(el!='videoCategories'&&_gel('videoCategories')){
addClass(_gel('videoCategories'),'hid');
}
removeClass(_gel(el),'hid');
if(!e)var e=window.event;
e.cancelBubble=true;
if(e.stopPropagation)e.stopPropagation();
}
function cancelCloseHiddenMenu(){
if(gMenuTimer){
window.clearTimeout(gMenuTimer);
gMenuTimer=null;
}
}
function closeHiddenMenu(el){
addClass(_gel(el),'hid');
}
function callOnChangeClick(){
var inputs=document.getElementsByTagName('input');
var selects=document.getElementsByTagName('select');
for(var i=0;i<inputs.length;++i){
if(inputs[i].type!='submit'&&inputs[i].type!='button'&&inputs[i].onclick)
inputs[i].onclick();
}
for(var i=0;i<selects.length;++i){
if(selects[i].onchange)
selects[i].onchange();
}
}
function getBodyScrollTop(){
if(window.innerHeight){
return window.pageYOffset;
}else if(document&&document.documentElement&&document.documentElement.scrollTop){
return document.documentElement.scrollTop;
}else if(document&&document.body){
return document.body.scrollTop;
}
}
var scrollStep=100;
var scrollStepDelay=50;
function smoothScrollIntoView(node,padding){
if(!padding)
padding=0;
smoothScrollIntoViewWorker(node,padding,null);
}
function smoothScrollIntoViewWorker(node,padding,lastTop){
var nodeTop=getPageOffsetTop(node);
var currentTop=getBodyScrollTop();
var deltaTop=Math.min(nodeTop-currentTop-padding,scrollStep);
window.scrollBy(0,deltaTop);
if(currentTop!=lastTop){
setTimeout(function(){smoothScrollIntoViewWorker(node,padding,currentTop)},scrollStepDelay);
}
}
function getPageOffsetTop(element){
var curtop=0;
if(element.offsetParent){
curtop=element.offsetTop
while(element=element.offsetParent){
curtop+=element.offsetTop
}
}
return curtop;
}
function getAncestorWithClass(node,className){
while(node&&!hasClass(node,className)){
node=node.parentNode;
}
return node;
}
function isPanelMutex(panel){
return hasClass(panel,'mutex');
}
function isPanelExpanded(panel){
return hasClass(panel,'expanded');
}
function isPanelHidden(panel){
return hasClass(panel,'hidden');
}
function expandPanel(panel){
if(!isPanelExpanded(panel)){
if(isPanelMutex(panel)){
each(panel.parentNode.childNodes,function(item){
if(panel!=item&&isPanelMutex(item)){
collapsePanel(item);
}
});
}
addClass(panel,'expanded');
fireInlineEvent(panel,'expanded');
}
}
function collapsePanel(panel){
if(isPanelExpanded(panel)){
removeClass(panel,'expanded');
fireInlineEvent(panel,'collapsed');
}
}
function togglePanel(panel){
if(isPanelExpanded(panel)){
collapsePanel(panel);
}else{
expandPanel(panel);
}
}
function fireInlineEvent(element,eventName){
var target=ref(element);
if(target[eventName]==null){
var attributeName='on'+eventName.toLowerCase();
var attribute=target.attributes.getNamedItem(attributeName);
if(attribute){
target[eventName]=function(){
eval(attribute.value);
}
}
}
if(target[eventName])target[eventName]();
}
function findAncestorByClass(element,className){
var temp=element;
while(temp!=document){
if(hasClass(temp,className))return temp;
temp=temp.parentNode;
}
return null;
}
function findChildByClass(element,className){
for(var i=0;i<element.childNodes.length;i++){
if(hasClass(element.childNodes[i],className))return element.childNodes[i];
}
return null;
}
function findChildrenByClass(element,className){
var result=new Array();
for(var i=0;i<element.childNodes.length;i++){
if(hasClass(element.childNodes[i],className))result.push(element.childNodes[i]);
}
return result;
}
function onBladeClick(trigger){
var blade=findAncestorByClass(trigger,'blade');
if(blade){
toggleBlade(blade);
saveAccordionState(blade.parentNode);
}
return false;
}
function removeAccQuicklistItem(video,node){
getUrlXMLResponse('/watch_queue_ajax?action_remove_from_queue&video_id='+video);
if(node)node.parentNode.removeChild(node);
EventManager.fireEvent("QLItemRemoved",video);
}
function playAllAccQuicklistItems(){
var videosNode=_gel("acc-quicklist-videos");
var firstVideo=findChildByClass(videosNode,"video");
if(firstVideo){
var state=new StateBag(firstVideo.attributes['state']);
location.href="/watch?v="+escape(state.getValue("video_id"))+"&playnext=1";
}
}
function closeLoginPicker(){
var loginBox=_gel('loginBoxZ');
if(loginBox){
if(loginBox.style.display!='none')
loginBox.style.display='none';
}
}
addListener(document,'click',function(e){
var element=e.target||e.srcElement;
if(!hasAncestor(element,'loginBoxZ')&&element.className.indexOf('loginBoxZ')==-1){
closeLoginPicker();
}
});
function openLoginBox(){
toggleDisplay('loginBoxZ');
if(_gel('loginNextZ').value=='/signup'){
_gel('loginNextZ').value="/index";
}else if(_gel('loginNextZ').value.indexOf('/signup')==0){
_gel('loginNextZ').value=_gel('loginNextZ').value.substring(13);
}
if(_gel('loginBoxZ').style.display!='none'){
_gel('loginUserZ').focus();
}
_hbLink('LogIn','UtilityLinks');
return false;
}
onLoadFunctionList=new Array();
function performOnLoadFunctions()
{
for(var i=0;i<onLoadFunctionList.length;i++)
{
onLoadFunctionList[i]();
}
}
function readCookie(name,fallback){
var nameEQ=name+"=";
var ca=document.cookie.split(';');
for(var i=0;i<ca.length;i++){
var c=ca[i];
while(c.charAt(0)==' ')c=c.substring(1,c.length);
if(c.indexOf(nameEQ)==0)return c.substring(nameEQ.length,c.length);
}
if(fallback){
return fallback;
}else{
return null;
}
}
function readIntCookie(name){
val=readCookie(name);
if(val){
return parseInt(val);
}else{
return 0;
}
}
function createCookie(name,value,days){
var cookie="";
var domain=cookie_domain;
var path="/";
cookie+=name+"="+value+";";
cookie+="domain=."+domain+";";
cookie+="path="+path+";";
if(days){
var date=new Date();
date.setTime(date.getTime()+(days*24*60*60*1000));
cookie+="expires="+date.toGMTString()+";";
}
document.cookie=cookie;
}
function eraseCookie(name){
createCookie(name,"",-1);
}
function selectLocale(loc){
var current_url,next_url;
current_url=location.href;
if(current_url.indexOf('?locale=')!=-1){
url_array=current_url.split("?locale=");
current_url=url_array[0];
}else if(current_url.indexOf('&locale=')!=-1){
url_array=current_url.split("&locale=");
current_url=url_array[0];
}
next_url=current_url+(current_url.indexOf('?')==-1?"?":"&")+"locale="+loc+"&persist_locale=1";
window.location=next_url;
}
flagImgsLoaded=false;
function loadFlagImgs(){
if(flagImgsLoaded){
return;
}
var flags=_gel('flagDiv').getElementsByTagName('img');
for(var x=0;x<flags.length;++x){
addClass(flags[x],"flag_"+flags[x].getAttribute('locale'));
}
flagImgsLoaded=true;
}
function closeLocalePicker(){
var localePickerBox=document.getElementById('localePickerBox');
if(!localePickerBox){
localePickerBox=document.getElementById('localePickerBoxProfile');
}
if(localePickerBox){
if(localePickerBox.style.display!='none'){
localePickerBox.style.display='none';
}
}
}
addListener(document,'click',function(e){
var element=e.target||e.srcElement;
if(element.className.indexOf('localePickerLink')==-1&&element.className.indexOf('currentFlag')==-1){
closeLocalePicker();
}
});
var yt=new function(){
var _throwOnNull=function(value){if(value==null)throw "ExpectedNotNull";};
var _throwOnInvalidType=function(obj,type){if(typeof(obj)!=type)throw "InvalidType";};
var _throwOnRegexMatch=function(str,regex){if(regex.test(str))throw "ExpectedRegexMismatch";};
var _throwOnRegexMismatch=function(str,regex){if(!regex.test(str))throw "ExpectedRegexMatch";};
this.UserPrefs=new function(){
var USER_PREFS_COOKIE=cookie_prefix+"PREF";
var prefs=new Object();
var _throwOnInvalidKey=function(value){
_throwOnRegexMismatch(value,/^\w+$/);
_throwOnRegexMatch(value,/^f([1-9][0-9]*)$/);
};
var _setValue=function(key,value){
prefs[key]=value.toString();
};
var _getNumber=function(key){
var value=_getString(key);
return((value!=null&&/^[A-Fa-f0-9]+$/.test(value))?parseInt(value,16):null);
};
var _getString=function(key,def){
var value=(prefs[key]!==undefined?prefs[key].toString():null);
return value;
};
var _setFlag=function(key,flag,bit){
var vector=_getNumber(key);vector=(vector!=null?vector:0);
var value=(bit?vector|flag:vector&~flag);
if(value==0){
_deleteValue(key);
}else{
_setValue(key,value.toString(16));
}
};
var _getFlag=function(key,flag){
var vector=_getNumber(key);
vector=(vector!=null?vector:0);
return((vector&flag)>0);
};
var _deleteValue=function(key){
delete prefs[key];
};
var _parse=function(string){
var pairs=unescape(string).split("&");
for(var i=0;i<pairs.length;i++){
var pair=pairs[i].split("=");
var key=pair[0];
var value=pair[1];
if(value)_setValue(key,value);
}
};
this.get=function(key,def){
_throwOnInvalidKey(key);
var value=_getString(key);
return(value!=null?value:(def?def:""));
};
this.set=function(key,value){
_throwOnInvalidKey(key);
_throwOnNull(value);
_setValue(key,value);
};
this.getFlag=function(flag){return _getFlag('f1',flag);};
this.setFlag=function(flag,bit){return _setFlag('f1',flag,bit);};
this.remove=function(key){
_throwOnInvalidKey(key);
_deleteValue(key);
};
this.save=function(days){
var pairs=new Array();
for(prop in prefs){
pairs.push(prop+"="+escape(prefs[prop]));
}
if(days==null)days=7;
createCookie(USER_PREFS_COOKIE,pairs.join("&"),days);
};
this.clear=function(){
prefs=new Object();
};
this.dump=function(){
var pairs=new Array();
for(prop in prefs){
pairs.push(prop+"="+escape(prefs[prop]));
}
return pairs.join('&');
};
var data=readCookie(USER_PREFS_COOKIE);
if(data){
_parse(data);
}
}
};
function StateBag(){
var state={};
this.setValue=function(key,value){
if(value==null){
delete state[key];
return;
}
state[key]=value.toString();
}
this.getValue=function(key,def){
if(state[key]===undefined)return def||null;
return state[key];
}
this.toString=function(){
var result="";
for(prop in state){
result+=prop;
result+="=";
result+=escape(state[prop]);
result+="&";
}
result=_chop(result);
return result;
}
this.parse=function(str){
var pairs=str.split(/&/g);
for(var i=0;i<pairs.length;i++){
var pair=pairs[i].split(/=/);
this.setValue(pair[0],unescape(pair[1]));
}
}
if(arguments.length>0){
var arg=arguments[0];
if(typeof arg.value=="string"){
this.parse(arg.value);
}
}
}
function mouseOverQuickAdd(img){
if(!img.className.match('Done')){
removeClass(img,'QLIconImg');
removeClass(img,'QLIconImgDone');
addClass(img,'QLIconImgOver');
}
}
function mouseOutQuickAdd(img){
if(!img.className.match('Done')){
removeClass(img,'QLIconImgOver');
removeClass(img,'QLIconImgDone');
addClass(img,'QLIconImg');
}
}
function addQLIcons(el){
var img=(el?el:document).getElementsByTagName('img');
for(var x=0;x<img.length;++x){
var vId=img[x].getAttribute("qlicon");
var vId2=img[x].getAttribute("qliconalt");
if(!vId&&!vId2){
continue;
}
img[x].parentNode.parentNode.innerHTML+=
'<div class="addtoQL90">'
+'<a href="#" rel="nofollow">'
+'<img id="add_button_'+(vId?vId:vId2)+'" class="QLIconImg" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif" border="0" '
+(vId?'onclick="return onQuickAddClick(this, \''+vId+'\')" '
:'onclick="clicked_add_icon(\''+vId2+'\', 0);_hbLink(\'QuickList+AddTo\',\'na\');return false;" ')
+'onmouseover="return mouseOverQuickAdd(this)" '
+'onmouseout="return mouseOutQuickAdd(this)">'
+'</a>'
+'</div>';
img[x].removeAttribute("qlicon");
img[x].removeAttribute("qliconalt");
}
}
onLoadFunctionList.push(addQLIcons);
function setDisabled(objects,disabled){
for(var i in objects){
objects[i].disabled=disabled;
if(disabled){
document.getElementById(objects[i].id+"_label").style.color="#CCC";
}else{
document.getElementById(objects[i].id+"_label").style.color="";
}
}
}
function browseViewType(viewType){
hideInline(viewType=='L'?"relatedNotList":"relatedList");
showInline(viewType=='L'?"relatedList":"relatedNotList");
hideInline(viewType=='L'?"relatedGrid":"relatedNotGrid");
showInline(viewType=='L'?"relatedNotGrid":"relatedGrid");
if(_gel('video_grid')){
removeClass(_gel('video_grid'),viewType=='L'?'browseGridView':'browseListView');
addClass(_gel('video_grid'),viewType=='L'?'browseListView':'browseGridView');
}
yt.UserPrefs.setFlag(yt.UserPrefs.Flags.FLAG_GRID_VIEW_VIDEOS_AND_CHANNELS,viewType=='L');
yt.UserPrefs.save();
return false;
}
function membersViewType(viewType){
hideInline(viewType=='L'?"relatedNotList":"relatedList");
showInline(viewType=='L'?"relatedList":"relatedNotList");
hideInline(viewType=='L'?"relatedGrid":"relatedNotGrid");
showInline(viewType=='L'?"relatedNotGrid":"relatedGrid");
if(_gel('video_grid')){
removeClass(_gel('video_grid'),viewType=='L'?'membersGridView':'membersListView');
addClass(_gel('video_grid'),viewType=='L'?'membersListView':'membersGridView');
}
yt.UserPrefs.setFlag(yt.UserPrefs.Flags.FLAG_GRID_VIEW_VIDEOS_AND_CHANNELS,viewType=='L');
yt.UserPrefs.save();
return false;
}
function searchViewType(viewType){
hideInline(viewType=='L'?"relatedNotList":"relatedList");
showInline(viewType=='L'?"relatedList":"relatedNotList");
hideInline(viewType=='L'?"relatedGrid":"relatedNotGrid");
showInline(viewType=='L'?"relatedNotGrid":"relatedGrid");
if(_gel('video_grid')){
var type=_gel('video_grid').className.indexOf('browse')!=-1?'browse':'members';
removeClass(_gel('video_grid'),viewType=='L'?type+'GridView':type+'ListView');
addClass(_gel('video_grid'),viewType=='L'?type+'ListView':type+'GridView');
}
yt.UserPrefs.setFlag(yt.UserPrefs.Flags.FLAG_GRID_VIEW_SEARCH_RESULTS,viewType=='G');
yt.UserPrefs.save();
return false;
}
function getXmlHttpRequest()
{
var httpRequest=null;
try
{
httpRequest=new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e)
{
try
{
httpRequest=new ActiveXObject("Microsoft.XMLHTTP");
}
catch(e)
{
httpRequest=null;
}
}
if(!httpRequest&&typeof XMLHttpRequest!="undefined")
{
httpRequest=new XMLHttpRequest();
}
return httpRequest;
}
function getUrlSync(url)
{
return getUrl(url,false,null);
}
function getUrlAsync(url,handleStateChange)
{
return getUrl(url,true,handleStateChange);
}
function getUrl(url,async,handleStateChange){
var xmlHttpReq=getXmlHttpRequest();
if(!xmlHttpReq)
return;
if(handleStateChange)
{
xmlHttpReq.onreadystatechange=function()
{
handleStateChange(xmlHttpReq);
};
}
else
{
xmlHttpReq.onreadystatechange=function(){;}
}
xmlHttpReq.open("GET",url,async);
xmlHttpReq.send(null);
}
function postUrl(url,data,async,stateChangeCallback)
{
var xmlHttpReq=getXmlHttpRequest();
if(!xmlHttpReq)
return;
xmlHttpReq.open("POST",url,async);
xmlHttpReq.onreadystatechange=function()
{
stateChangeCallback(xmlHttpReq);
};
xmlHttpReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
xmlHttpReq.send(data);
}
function urlEncodeDict(dict)
{
var result="";
for(var i=0;i<dict.length;i++){
result+="&"+encodeURIComponent(dict[i].name)+"="+encodeURIComponent(dict[i].value);
}
return result;
}
function execOnSuccess(stateChangeCallback,successCallback,div_id)
{
return function(xmlHttpReq)
{
if(xmlHttpReq.readyState==4&&
xmlHttpReq.status==200){
if(div_id){
stateChangeCallback(xmlHttpReq,successCallback,div_id);
}else{
stateChangeCallback(xmlHttpReq,successCallback);
}
}
};
}
function postFormByForm(form,async,successCallback){
var formVars=new Array();
for(var i=0;i<form.elements.length;i++)
{
var formElement=form.elements[i];
if(formElement.type=='checkbox'&&!formElement.checked){
continue;
}
var v=new Object;
v.name=formElement.name;
v.value=formElement.value;
formVars.push(v);
}
postUrl(form.action,urlEncodeDict(formVars),async,execOnSuccess(successCallback));
}
function postForm(formName,async,successCallback)
{
var form=document.forms[formName];
return postFormByForm(form,async,successCallback);
}
function replaceDivContents(xmlHttpRequest,dstDivId)
{
var dstDiv=document.getElementById(dstDivId);
dstDiv.innerHTML=xmlHttpRequest.responseText;
}
function getUrlXMLResponseCallback(xmlHttpReq,successCallback){
if(xmlHttpReq.responseXML==null){
alert("Error while processing your request.");
return;
}
var root_node=getRootNode(xmlHttpReq);
var return_code=getNodeValue(root_node,'return_code');
if(return_code==0){
redirect_val=getNodeValue(root_node,'redirect_on_success');
if(redirect_val!=null){
window.location=redirect_val;
}else{
success_message=getNodeValue(root_node,'success_message');
if(success_message!=null){
alert(success_message);
}
if(successCallback!=null){
successCallback(xmlHttpReq);
}
}
}else{
var error_msg=getNodeValue(root_node,'error_message');
if(error_msg==null||error_msg.length==0){
error_msg="An error occured while performing this operation.";
}
alert(error_msg)
}
}
function getUrlXMLResponseCallbackFillDiv(xmlHttpReq,successCallback,div_id){
getUrlXMLResponseCallback(xmlHttpReq);
document.getElementById(div_id).innerHTML=getNodeValue(xmlHttpReq.responseXML,
"html_content");
successCallback(xmlHttpReq);
}
function getUrlXMLResponseCallbackJSON(xmlHttpReq,successCallback){
getUrlXMLResponseCallback(xmlHttpReq);
successCallback(eval(getNodeValue(getRootNode(xmlHttpReq),"html_content")));
}
function getNodeValue(obj,tag)
{
node=obj.getElementsByTagName(tag);
if(node!=null&&node.length>0){
return node[0].firstChild.nodeValue;
}else{
return null;
}
}
function getRootNode(xmlHttpReq){
return xmlHttpReq.responseXML.getElementsByTagName('root')[0];
}
function getUrlXMLResponse(url,successCallback){
getUrl(url,true,execOnSuccess(getUrlXMLResponseCallback,successCallback))
}
function getUrlXMLResponseAndFillDiv(url,div_id,successCallback){
getUrl(url,true,execOnSuccess(getUrlXMLResponseCallbackFillDiv,successCallback,div_id))
}
function getUrlXMLResponseJSON(url,successCallback){
getUrl(url,true,execOnSuccess(getUrlXMLResponseCallbackJSON,successCallback))
}
getUrlXMLResponseJSON.prototype.getUrlXMLResponseCallbackJSON=getUrlXMLResponseCallbackJSON;
getUrlXMLResponseJSON.prototype.getUrlXMLResponseCallback=getUrlXMLResponseCallback;
function postUrlXMLResponse(url,data,successCallback){
postUrl(url,data,true,execOnSuccess(getUrlXMLResponseCallback,successCallback))
}
function confirmAndPostUrlXMLResponse(url,confirmMessage,data,successCallback){
if(confirm(confirmMessage)){
postUrlXMLResponse(url,data,successCallback);
}
}
function postFormXMLResponse(formName,successCallback){
postForm(formName,true,execOnSuccess(getUrlXMLResponseCallback,successCallback))
}
function toogleWatcher(token,current_video_id,stringOn,stringOff)
{
if(!self.sharing_active)
{
enableWatcherShare(token,current_video_id,stringOn);
}
else
{
disableWatcherShare(token,current_video_id,stringOff);
}
}
function enableWatcherShare(token,current_video_id,stringOn)
{
fadein();
var varg="";
if(current_video_id)
varg="&v="+current_video_id;
getUrlXMLResponse("/watcher?action_start_share=1"+varg+"&t="+token,showEnabledWatcher(stringOn));
}
function disableWatcherShare(token,current_video_id,stringOff)
{
var varg="";
if(current_video_id)
varg="&v="+current_video_id;
getUrlXMLResponse("/watcher?action_stop_share=1"+varg+"&t="+token,showDisabledWatcher(stringOff));
}
function showEnabledWatcher(newString)
{
self.sharing_active=true;
var img=document.getElementById("sharingImg");
removeClass(img,'activeSharingRed');
addClass(img,'activeSharingGreen');
alert(newString);
img.title=newString;
fadeout();
if(document.getElementById("activesharing_start_button")){
hideDiv('activesharing_start_button');
showDiv('activesharing_stop_button');
}
}
function showDisabledWatcher(newString)
{
self.sharing_active=false;
var img=document.getElementById("sharingImg");
removeClass(img,'activeSharingGreen');
addClass(img,'activeSharingRed');
alert(newString);
img.title=newString;
if(document.getElementById("activesharing_start_button")){
showDiv('activesharing_start_button');
hideDiv('activesharing_stop_button');
}
}
function makearray(n){
this.length=n;
for(var i=1;i<=n;i++)
this[i]=0;
return this;
}
hexa=new makearray(16);
for(var i=0;i<10;i++)
hexa[i]=i;
hexa[10]="a";hexa[11]="b";hexa[12]="c";
hexa[13]="d";hexa[14]="e";hexa[15]="f";
function hex(i){
if(i<0)
return "00";
else if(i>255)
return "ff";
else
return ""+hexa[Math.floor(i/16)]+hexa[i%16];
}
function setbgColor(r,g,b){
var hr=hex(r);var hg=hex(g);var hb=hex(b);
document.getElementById('shareSpan').style.backgroundColor="#"+hr+hg+hb;
}
function fade(sr,sg,sb,er,eg,eb,step){
for(var i=0;i<=step;i++){
setbgColor(
Math.floor(sr*((step-i)/step)+er*(i/step)),
Math.floor(sg*((step-i)/step)+eg*(i/step)),
Math.floor(sb*((step-i)/step)+eb*(i/step)));
}
}
function fadein(){
fade(255,255,255,102,204,0,825);
}
function fadeout(){
setTimeout("fade(102,204,0, 255,255,255,2025)",800)
}
function stripNonNumber(val){
return val.replace(/[^\d]/g,'')
}
var videolist=new Array();
var removelist=new Array();
function clear_watch_queue()
{
postUrlXMLResponse("/watch_queue_ajax","&action_clear_queue",self.queueClearedReloadPage);
}
function clear_watch_queue_watch_page()
{
postUrlXMLResponse("/watch_queue_ajax","&action_clear_queue",self.queueCleared);
var watchqueue_div=document.getElementById('watchqueue');
var watchqueue_new_div=document.getElementById('watchqueueStartNew');
if(watchqueue_div){
closeDiv('watchqueue');
}
if(watchqueue_new_div){
closeDiv('watchqueueStartNew');
}
var wt=document.getElementById("watchlist_table").tBodies[0];
if(wt){
for(var i=wt.rows.length-1;i>=0;i--){
var row_id=wt.rows[i].getAttribute('id');
if(row_id!=null&&row_id!=''&&row_id.match('^vid_row_')){
wt.removeChild(document.getElementById(row_id));
}
}
}
quicklist_count=0;
document.getElementById('play_all_numb').innerHTML=quicklist_count+" ";
}
function add_to_watch_queue(video_id)
{
videolist.push(video_id);
post_videos_to_server();
EventManager.fireEvent("QuicklistItemAdded",video_id);
return false;
}
function remove_from_watch_queue(video_id)
{
removelist.push(video_id);
delete_videos_from_server();
EventManager.fireEvent("QuicklistItemRemoved",video_id);
return false;
}
function set_pop_status(pop_status)
{
postUrlXMLResponse("/watch_queue_ajax","action_set_pop_status&pop_videos="+pop_status,self.popStatusSet)
}
function popStatusSet(){
}
function post_videos_to_server(){
if(videolist.length>0){
postUrlXMLResponse("/watch_queue_ajax","&action_add_to_queue&video_id="+videolist[videolist.length-1],self.videoQueued);
videolist.pop();
}
}
function delete_videos_from_server(){
if(removelist.length>0){
postUrlXMLResponse("/watch_queue_ajax","&action_remove_from_queue&video_id="+removelist[removelist.length-1],self.videoRemoved);
removelist.pop();
}
}
function queueCleared(xmlHttpRequest)
{
window.location=window.location.href;
}
function queueClearedReloadPage(xmlHttpRequest)
{
window.location="watch_queue?all";
}
function videoQueued(xmlHttpRequest)
{
xmlObj=xmlHttpRequest.responseXML;
if(xmlObj!=null&&getNodeValue(xmlObj,"msg")!="exists"){
post_videos_to_server();
}
}
function videoRemoved(xmlHttpRequest)
{
delete_videos_from_server();
}
function clicked_add_icon(video_ID,fromRelated){
if(video_exists_in_quickList(video_ID))return;
add_to_watch_queue(video_ID);
quicklist_count++;
if(fromRelated==1){
showQuickList_first_add();
document.getElementById('play_all_numb').innerHTML=quicklist_count+'&nbsp;';
if(document.getElementById('show_all_video_number')){
document.getElementById('show_all_video_number').innerHTML=quicklist_count;
}
}
var button_name='add_button_'+video_ID;
removeClass(document.getElementById(button_name),'QLIconImg');
removeClass(document.getElementById(button_name),'QLIconImgOver');
addClass(document.getElementById(button_name),'QLIconImgDone');
document.getElementById(button_name).blur();
}
function mouse_over_add_icon(video_ID){
mouse_over_add_icon_element(_gel('add_button_'+video_ID));
}
function mouse_over_add_icon_element(el){
if(el.className.match('Done')){
removeClass(el,'QLIconImg');
removeClass(el,'QLIconImgOver');
addClass(el,'QLIconImgDone');
}else{
removeClass(el,'QLIconImg');
removeClass(el,'QLIconImgDone');
addClass(el,'QLIconImgOver');
}
}
function mouse_out_add_icon(video_ID){
mouse_out_add_icon_element(_gel('add_button_'+video_ID));
}
function mouse_out_add_icon_element(el){
if(el.className.match('Done')){
removeClass(el,'QLIconImg');
removeClass(el,'QLIconImgOver');
addClass(el,'QLIconImgDone');
}else{
removeClass(el,'QLIconImgDone');
removeClass(el,'QLIconImgOver');
addClass(el,'QLIconImg');
}
}
function showQuickList_first_add(){
if(document.getElementById('watchqueueStartNew')){
openDiv('watchqueueStartNew');
}
if(getQuickCookie()=='yes'){
openDiv('watchlist_container');
openDiv('save_row');
}
if(document.getElementById('quicklist_intro')){
closeDiv('quicklist_intro');
}
}
function removeVideo(video_id){
var row_id="vid_row_"+video_id;
remove_from_watch_queue(video_id);
var tbody=document.getElementById("watchlist_table").tBodies[0];
var total_rows=tbody.rows.length-1;
var current_row=tbody.rows[row_id].cells[0].innerHTML;
var current_row_in_table=tbody.rows[row_id].rowIndex-1;
for(i=total_rows;i>current_row_in_table;i--){
tbody.rows[i].cells[0].innerHTML=tbody.rows[i].cells[0].innerHTML-1;
}
tbody.removeChild(document.getElementById(row_id));
quicklist_count--;
document.getElementById('play_all_numb').innerHTML=quicklist_count+" ";
if(document.getElementById('show_all_video_number')){
document.getElementById('show_all_video_number').innerHTML=quicklist_count;
}
}
var first_video_id;
var first_video_url;
var first_video_image_url;
var first_video_title;
function video_exists_in_quickList(video_id){
return document.getElementById("vid_row_"+video_id)?true:false;
}
function print_quicklist_video(img_url,vid_title,username,vid_id,runtime){
if(video_exists_in_quickList(vid_id))return;
var vid_number=document.getElementById('watchlist_table').rows.length;
if(document.getElementById('watchlist_table').rows.length<2){
showQuickList_first_add();
}
var new_video_number=quicklist_count;
var temp_vid_title=unescape(vid_title);
var div_id_1="1_"+vid_id;
var div_id_2="2_"+vid_id;
var div_id_3="3_"+vid_id;
var div_id_4="4_"+vid_id;
var div_content_1=new_video_number;
var div_content_2='<a href="/watch?v='+vid_id+'"><img src="'+img_url+'" width="43" height="33" border="0" style="padding:3px;" align="middle"></a>';
var div_content_3='<div onClick=\'window.location="/watch?v='+vid_id+'";\' style="cursor:hand;cursor:pointer;"><div class="vtitle"><a href="/watch?v='+vid_id+'" >'+temp_vid_title+'</a></div><div class="vfacets"><span class="grayText">From: '+username+'</span></div></div>';
var div_content_4='<span class="grayText smallText">'+runtime+'</span> &nbsp;<span class="grayText"><a href="#" onClick="removeVideo(\''+vid_id+'\');return false;" title="Remove Video From QuickList"><img src="http://s.ytimg.com/yt/img/icn_trash_10x12-vfl11600.gif" valign="middle" alt="Remove Video" border="0" /></a>&nbsp;';
var tbody=document.getElementById("watchlist_table").tBodies[0];
var row=document.createElement("TR");
row.setAttribute("id","vid_row_"+vid_id);
var cell1=document.createElement("TD");
cell1.setAttribute("id","1_"+vid_id);
cell1.setAttribute("width","8");
cell1.setAttribute("class","grayText");
var cell2=document.createElement("TD");
var tempDiv_2=document.createElement("DIV");
tempDiv_2.setAttribute("id","2_"+vid_id);
tempDiv_2.setAttribute("width","55");
var cell3=document.createElement("TD");
var tempDiv_3=document.createElement("DIV");
tempDiv_3.setAttribute("id","3_"+vid_id);
tempDiv_3.setAttribute("align","left");
tempDiv_3.setAttribute("width","313");
var cell4=document.createElement("TD");
cell4.setAttribute("align","right");
var tempDiv_4=document.createElement("DIV");
tempDiv_4.setAttribute("id","4_"+vid_id);
tempDiv_4.setAttribute("width","50");
cell2.appendChild(tempDiv_2);
cell3.appendChild(tempDiv_3);
cell4.appendChild(tempDiv_4);
row.appendChild(cell1);
row.appendChild(cell2);
row.appendChild(cell3);
row.appendChild(cell4);
tbody.appendChild(row);
if(document.getElementById('now_playing_end')){
if(document.getElementById('watchlist_table').rows.length>6){
setTimeout("jumpToNowPlaying(1);",200);
}
else{
if(quicklist_count>5){
jumpToNowPlaying(1);
}
}
}
document.getElementById(div_id_1).innerHTML=div_content_1;
document.getElementById(div_id_2).innerHTML=div_content_2;
document.getElementById(div_id_3).innerHTML=div_content_3;
document.getElementById(div_id_4).innerHTML=div_content_4;
if(document.getElementById('watchlist_table').rows.length<3){
first_video_id=vid_id;
first_video_url="/watch?v="+vid_id;
first_video_image_url=img_url;
first_video_title=temp_vid_title.substring(0,30);
document.getElementById('next_video_url_1').href=first_video_url;
document.getElementById('next_video_url_2').href=first_video_url;
document.getElementById('next_video_title').innerHTML=first_video_title;
document.getElementById('next_video_image_url').src=first_video_image_url;
document.getElementById('play_all_buttton').src="http://s.ytimg.com/yt/img/btn_play_quicklist_33x25-vfl11985.gif";
}
}
function play_all_start_new(){
tempURL='/watch?v='+first_video_id+'&playnext=1';
window.location=tempURL;
document.getElementById('play_all_buttton').blur();
}
function showQuickList(){
if(getQuickCookie()=='no'){
closeDiv('watchlist_container');
closeDiv('save_row');
document.getElementById('watch_queue_show_hide').src='http://s.ytimg.com/yt/img/btn_watchqueue_show_33x25-vfl11985.gif';
}
}
function jumpToNowPlaying(endOfList){
if(navigator.appName=='Microsoft Internet Explorer'){
pixelsFromTop=document.documentElement.scrollTop;
}
else{
pixelsFromTop=window.pageYOffset;
}
if(navigator.userAgent.indexOf('Safari')==-1){
if(endOfList==1){
if(document.getElementById('now_playing_end')){
location.href='#now_playing_end';
}
}
else{
if(document.getElementById('now_playing')){
location.href='#now_playing';
}
}
window.scrollTo(0,pixelsFromTop);
}
}
function clickedHideShowButton(){
if(document.getElementById('watch_queue_show_hide').src.match('show')){
document.getElementById('watch_queue_show_hide').src='http://s.ytimg.com/yt/img/btn_watchqueue_hide_33x25-vfl11985.gif';
openDiv('watchlist_container');
openDiv('save_row');
setQuickCookie('yes');
}
else{
document.getElementById('watch_queue_show_hide').src='http://s.ytimg.com/yt/img/btn_watchqueue_show_33x25-vfl11985.gif';
closeDiv('watchlist_container');
closeDiv('save_row');
setQuickCookie('no');
}
document.getElementById('watch_queue_show_hide').blur();
}
function setQuickCookie(yesNo)
{
var today=new Date();
var expire=new Date();
expire.setTime(today.getTime()+7*24*3600000);
document.cookie="quicklist="+yesNo+";expires="+expire.toGMTString()+";domain=youtube.com";
}
function getQuickCookie()
{
if(document.cookie.length>0)
{
var cookiename="quicklist";
var quickStart=document.cookie.indexOf(cookiename+"=");
if(quickStart!=-1)
{
quickStart+=cookiename.length+1;
quickEnd=document.cookie.indexOf(";",quickStart);
if(quickEnd==-1)quickEnd=document.cookie.length;
return document.cookie.substring(quickStart,quickEnd);
}
}
return null;
}
function redirectToQuicklist(){
alert(getQuickCookie());
}
EventManager.addHandler('QuicklistItemAdded',function(arg){
var node=_gel('quicklist-summary-count');
if(node){
var count=0;
if(/^[\d+]$/.test(node.innerHTML)){
count=parseInt(node.innerHTML);
}
if(count==0){
addClass(_gel('quicklist-summary'),'has-videos');
if(quicklistNextQueuedVideoId!==undefined){
quicklistNextQueuedVideoId=arg;
}
}
node.innerHTML=(count+1).toString();
}
});
EventManager.addHandler('QuicklistItemRemoved',function(arg){
var node=_gel('quicklist-summary-count');
if(node){
var count=0;
if(/^[\d+]$/.test(node.innerHTML)){
count=parseInt(node.innerHTML);
}
if(count-1==0)removeClass(_gel('quicklist-summary'),'has-videos');
node.innerHTML=(count-1).toString();
}
});
EventManager.addHandler('QuicklistCleared',function(arg){
var node=_gel('quicklist-summary-count');
if(node){
removeClass(_gel('quicklist-summary'),'has-videos');
node.innerHTML="0";
}
});
(function(){
YTHovercard=function(){
this.html_=
"<div id='hovercard'>"+
"  <iframe id='hovercard_iframe' width='350' height='150' frameborder='0' allowtransparency='true' scrolling='no'>"+
"  </iframe>"+
"</div>";
this.container=document.createElement("div");
this.container.innerHTML=this.html_;
this.container.style.overflow="hidden";
this.container.style.zIndex=100;
this.container.id="hvcd";
this.container.style.display="none";
this.container.style.position="absolute";
this.container.style.zIndex="100";
this.timer=null;
this.show_delay_ms=250;
this.htimer=null;
this.hide_delay_ms=250;
};
YTHovercard.prototype.setShowDelayMs=function(delay){
this.show_delay_ms=delay;
};
YTHovercard.prototype.setHideDelayMs=function(delay){
this.hide_delay_ms=delay;
};
YTHovercard.prototype.hideContainer=function(){
this.container.style.display="none";
};
function getObjectCoordinates(currentElem){
var offsetLeft=0;
var offsetTop=0;
while(currentElem){
offsetLeft+=currentElem.offsetLeft;
offsetTop+=currentElem.offsetTop;
currentElem=currentElem.offsetParent;
}
if(navigator.userAgent.indexOf("Mac")!=-1&&
typeof document.body.leftMargin!="undefined"){
offsetLeft+=document.body.leftMargin;
offsetTop+=document.body.topMargin;
}
return{left:offsetLeft,top:offsetTop};
}
var YTHovercard_singleton=null;
function pop_hovercard(){
try{
var hovercard=YTHovercard_singleton.container;
hovercard.style.display="";
}catch(e){
}
}
function hide_hovercard(){
try{
var hovercard=YTHovercard_singleton.container;
hovercard.style.display="none";
}catch(e){
}
}
window._popup_hovercard=function(element,username){
return;
if(YTHovercard_singleton==null){
YTHovercard_singleton=new YTHovercard();
document.body.appendChild(YTHovercard_singleton.container);
}
var hovercard=YTHovercard_singleton.container;
try{
var position=getObjectCoordinates(element);
var browserWidth=document.body.scrollWidth;
var overSize=position.left+350-browserWidth+4;
if(overSize>0){
position.left-=overSize;
}
hovercard.style.display="none";
var internal_iframe=document.getElementById("hovercard_iframe");
internal_iframe.src="/hovercard?user="+username;
internal_iframe.style.height="0px";
hovercard.style.top=(position.top+10)+"px";
hovercard.style.left=position.left+"px";
hovercard.style.position="absolute";
}catch(e){
}
YTHovercard_singleton.timer=
setTimeout(pop_hovercard,YTHovercard_singleton.show_delay_ms);
element.onmouseout=function(){
YTHovercard_singleton.htimer=
setTimeout(hide_hovercard,YTHovercard_singleton.hide_delay_ms);
};
hovercard.onmouseout=function(){
YTHovercard_singleton.htimer=
setTimeout(hide_hovercard,YTHovercard_singleton.hide_delay_ms);
}
hovercard.onmouseover=function(){
clearTimeout(YTHovercard_singleton.htimer);
}
};
})();
bind=function(fn,self,var_args){
var boundArgs=fn.boundArgs_;
if(arguments.length>2){
var args=Array.prototype.slice.call(arguments,2);
if(boundArgs){
args.unshift.apply(args,boundArgs);
}
boundArgs=args;
}
self=fn.boundSelf_||self;
fn=fn.boundFn_||fn;
var newfn;
if(boundArgs){
newfn=function(){
var args=Array.prototype.slice.call(arguments);
args.unshift.apply(args,boundArgs);
return fn.apply(self,args);
}
}else{
newfn=function(){
return fn.apply(self,arguments);
}
}
newfn.boundArgs_=boundArgs;
newfn.boundSelf_=self;
newfn.boundFn_=fn;
return newfn;
};
Function.prototype.bind=function(self,var_args){
if(arguments.length>1){
var args=Array.prototype.slice.call(arguments,1);
args.unshift(this,self);
return bind.apply(null,args);
}else{
return bind(this,self);
}
};
(function(){
YT_single_tabpane=function(tab,content,opt_url,opt_loading_page){
this.tab_=tab;
this.content_=content;
if(opt_url){
this.url_=opt_url;
}
if(opt_loading_page){
this.loading_page_=opt_loading_page;
}
this.retrieved_url_=false;
this.selected_=false;
}
YT_tabpane=function(element,class_name_base){
this.element_=_gel(element);
this.tabpanes_=new Array();
this.class_name_base_=class_name_base;
this.num_retries_=0
this.max_retries_=4
this.retry_interval_=5
};
YT_tabpane.prototype.addPage=function(tab,contents,opt_url,opt_left){
var single_tabpane=new YT_single_tabpane(tab,contents,opt_url);
this.tabpanes_[tab]=single_tabpane;
var tab_element=_gel(tab);
tab_element.onclick=function(){this.handleClick(tab);}.bind(this);
if(opt_left){
this.left_=tab;
}
};
YT_tabpane.prototype.getNewContent=function(tab_id,new_url){
var tab=this.tabpanes_[tab_id];
var url=tab.url_+new_url;
this.retrieveUrl(tab,url);
}
YT_tabpane.prototype.retrieveUrl=function(dest,opt_override_url){
var url=dest.url_;
if(opt_override_url){
url=opt_override_url;
}
hideDiv(dest.content_);
hideDiv(this.retry_msg_);
showDiv(this.loading_page_);
getUrl(url,true,function(xmlHttpRequest){
this.handleAjaxResponse(xmlHttpRequest,dest,url);
}.bind(this)
);
}
YT_tabpane.prototype.handleAjaxResponse=function(xmlHttpRequest,dest,url){
if(dest.selected_==false)
return;
if(xmlHttpRequest.readyState==4){
if(xmlHttpRequest.status==200){
var content=_gel(dest.content_);
content.innerHTML=xmlHttpRequest.responseText;
dest.retrieved_url_=true;
this.num_retries_=0;
hideDiv(this.loading_page_);
hideDiv(this.error_page_);
showDiv(dest.content_);
}else{
dest.retrieved_url_=false;
if(this.num_retries_<this.max_retries_){
this.retry_timer_=setTimeout(function(){this.retrieveUrl(dest,url);}.bind(this),this.retry_interval_*1000);
this.num_retries_++;
if(this.num_retries_>1){
showDiv(this.retry_msg_);
}
}else{
hideDiv(this.loading_page_);
showDiv(this.error_page_);
}
}
}
}
YT_tabpane.prototype.setRetrieved=function(target,true_or_false){
for(var i in this.tabpanes_){
var tab=_gel(i);
var dest=this.tabpanes_[i];
if(i==target){
dest.retrieved_url_=true_or_false;
break;
}
}
}
YT_tabpane.prototype.handleClick=function(target){
hideDiv(this.loading_page_);
hideDiv(this.retry_msg_);
hideDiv(this.error_page_);
clearTimeout(this.retry_timer_);
this.num_retries_=0;
for(var i in this.tabpanes_){
var tab=_gel(i);
var dest=this.tabpanes_[i];
var content=_gel(dest.content_);
if(i==target){
content.style.display="block";
removeClass(tab,this.class_name_base_+"-unsel");
addClass(tab,this.class_name_base_+"-sel");
dest.selected_=true;
if(dest.url_&&!dest.retrieved_url_){
this.retrieveUrl(dest);
}
}else{
content.style.display="none";
removeClass(tab,this.class_name_base_+"-sel");
addClass(tab,this.class_name_base_+"-unsel");
dest.selected_=false;
}
}
if(this.left_){
var tab=_gel(this.left_);
addClass(tab,this.class_name_base_+"-left");
}
}
YT_tabpane.prototype.setSelected=function(tab){
this.handleClick(tab);
}
YT_tabpane.prototype.setLoadingPage=function(page){
this.loading_page_=page;
}
YT_tabpane.prototype.setErrorPage=function(error_page){
this.error_page_=error_page;
}
YT_tabpane.prototype.setRetryMsg=function(retry_msg){
this.retry_msg_=retry_msg;
}
})();
window.YT_stats_zippy=function(id,ajaxUrl,loginUrl){
this.id_=id;
this.url_=ajaxUrl;
this.loginUrl_=loginUrl;
this.div_content_=_gel(id+"-content");
this.div_contentClosed_=_gel(id+"-content-closed");
this.div_arrowRight_=_gel(id+"-arrowRight");
this.div_arrowDown_=_gel(id+"-arrowDown");
this.div_arrowRight_.onclick=function(){this.expand();}.bind(this);
this.div_arrowDown_.onclick=function(){this.minimize();}.bind(this);
var saved_state=yt.UserPrefs.get(this.get_state_cookie_name());
if(saved_state=="1"){
this.expand();
}else if(saved_state=="0"){
this.minimize();
}
};
YT_stats_zippy.prototype.get_state_cookie_name=function(){
return "zippy"+this.id_.replace(/-/g,"_");
};
YT_stats_zippy.prototype.save_state=function(state){
yt.UserPrefs.set(this.get_state_cookie_name(),state);
yt.UserPrefs.save();
};
YT_stats_zippy.prototype.expand=function(){
this.save_state("1");
this.div_arrowRight_.style.display="none";
this.div_arrowDown_.style.display="inline";
this.div_content_.style.display="block";
if(this.div_contentClosed_){
this.div_contentClosed_.style.display="none";
}
if(this.div_content_.innerHTML.match(/^\s*$/)&&this.url_){
this.ajax_fetch();
}
};
YT_stats_zippy.prototype.ajax_fetch=function(){
this.div_content_.innerHTML='<div style="text-align: center; margin: 35px;"><img src="http://s.ytimg.com/yt/img/LoadingGraphic-vfl3869.gif"></div>';
getUrl(this.url_,true,function(xmlHttpRequest){
this.handleAjaxResponse(xmlHttpRequest,
this.div_content_,
this.loginUrl_)
}.bind(this));
};
YT_stats_zippy.prototype.minimize=function(){
this.save_state("0");
this.div_arrowRight_.style.display="inline";
this.div_arrowDown_.style.display="none";
this.div_content_.style.display="none";
if(this.div_contentClosed_){
this.div_contentClosed_.style.display="";
}
};
YT_stats_zippy.prototype.handleAjaxResponse=function(xmlHttpRequest,content,loginUrl){
if(xmlHttpRequest.readyState==4){
if(xmlHttpRequest.status==200){
content.innerHTML=xmlHttpRequest.responseText;
}else if(xmlHttpRequest.status==401){
window.location.pathname=loginUrl;
}else{
if(this.error_page_){
var error_page=_gel(this.error_page_);
content.innerHTML=error_page.innerHTML;
}
}
}
}
var feed_module_index=Array()
function next_feed_module_item(tab_id,module_id,num_items){
if(feed_module_index[module_id]==undefined)
feed_module_index[module_id]=0;
addClass(_gel('feed-module-'+tab_id+'-'+module_id+'-item-'+feed_module_index[module_id]),'hide');
feed_module_index[module_id]+=1;
feed_module_index[module_id]=feed_module_index[module_id]%num_items;
removeClass(_gel('feed-module-'+tab_id+'-'+module_id+'-item-'+feed_module_index[module_id]),'hide');
}
function previous_feed_module_item(tab_id,module_id,num_items){
if(feed_module_index[module_id]==undefined)
feed_module_index[module_id]=0;
addClass(_gel('feed-module-'+tab_id+'-'+module_id+'-item-'+feed_module_index[module_id]),'hide');
feed_module_index[module_id]+=num_items-1;
feed_module_index[module_id]=feed_module_index[module_id]%num_items;
removeClass(_gel('feed-module-'+tab_id+'-'+module_id+'-item-'+feed_module_index[module_id]),'hide');
}
function select_feed_module_item(tab_id,module_id,new_index,num_items){
if(feed_module_index[module_id]==undefined)
feed_module_index[module_id]=0;
addClass(_gel('feed-module-'+tab_id+'-'+module_id+'-item-'+feed_module_index[module_id]),'hide');
feed_module_index[module_id]=new_index%num_items;
removeClass(_gel('feed-module-'+tab_id+'-'+module_id+'-item-'+feed_module_index[module_id]),'hide');
}
if(typeof deconcept=="undefined"){var deconcept={};}if(typeof deconcept.util=="undefined"){deconcept.util={};}if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil={};}deconcept.SWFObject=function(_1,id,w,h,_5,c,_7,_8,_9,_a){if(!document.getElementById){return;}this.DETECT_KEY=_a?_a:"detectflash";this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);this.params={};this.variables={};this.attributes=[];if(_1){this.setAttribute("swf",_1);}if(id){this.setAttribute("id",id);}if(w){this.setAttribute("width",w);}if(h){this.setAttribute("height",h);}if(_5){this.setAttribute("version",new deconcept.PlayerVersion(_5.toString().split(".")));}this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){if(!deconcept.unloadSet){deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",deconcept.SWFObjectUtil.prepUnload);deconcept.unloadSet=true;}}if(c){this.addParam("bgcolor",c);}var q=_7?_7:"high";this.addParam("quality",q);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var _c=(_8)?_8:window.location;this.setAttribute("xiRedirectUrl",_c);this.setAttribute("redirectUrl","");if(_9){this.setAttribute("redirectUrl",_9);}};deconcept.SWFObject.prototype={useExpressInstall:function(_d){this.xiSWFPath=!_d?"expressinstall.swf":_d;this.setAttribute("useExpressInstall",true);},setAttribute:function(_e,_f){this.attributes[_e]=_f;},getAttribute:function(_10){return this.attributes[_10]||"";},addParam:function(_11,_12){this.params[_11]=_12;},getParams:function(){return this.params;},addVariable:function(_13,_14){this.variables[_13]=_14;},getVariable:function(_15){return this.variables[_15]||"";},getVariables:function(){return this.variables;},getVariablePairs:function(){var _16=[];var key;var _18=this.getVariables();for(key in _18){_16[_16.length]=key+"="+_18[key];}return _16;},getSWFHTML:function(){var _19="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}_19="<embed type=\"application/x-shockwave-flash\" src=\""+this.getAttribute("swf")+"\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+(this.getAttribute("style")||"")+"\"";_19+=" id=\""+this.getAttribute("id")+"\" name=\""+this.getAttribute("id")+"\" ";var _1a=this.getParams();for(var key in _1a){_19+=[key]+"=\""+_1a[key]+"\" ";}var _1c=this.getVariablePairs().join("&");if(_1c.length>0){_19+="flashvars=\""+_1c+"\"";}_19+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}_19="<object id=\""+this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+(this.getAttribute("style")||"")+"\">";_19+="<param name=\"movie\" value=\""+this.getAttribute("swf")+"\" />";var _1d=this.getParams();for(var key in _1d){_19+="<param name=\""+key+"\" value=\""+_1d[key]+"\" />";}var _1f=this.getVariablePairs().join("&");if(_1f.length>0){_19+="<param name=\"flashvars\" value=\""+_1f+"\" />";}_19+="</object>";}return _19;},write:function(_20){if(this.getAttribute("useExpressInstall")){var _21=new deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(_21)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var n=(typeof _20=="string")?document.getElementById(_20):_20;n.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};deconcept.SWFObjectUtil.getPlayerVersion=function(){var _23=new deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var x=navigator.plugins["Shockwave Flash"];if(x&&x.description){_23=new deconcept.PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var axo=1;var _26=3;while(axo){try{_26++;axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+_26);_23=new deconcept.PlayerVersion([_26,0,0]);}catch(e){axo=null;}}}else{try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(e){try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");_23=new deconcept.PlayerVersion([6,0,21]);axo.AllowScriptAccess="always";}catch(e){if(_23.major==6){return _23;}}try{axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(e){}}if(axo!=null){_23=new deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));}}}return _23;};deconcept.PlayerVersion=function(_29){this.major=_29[0]!=null?parseInt(_29[0]):0;this.minor=_29[1]!=null?parseInt(_29[1]):0;this.rev=_29[2]!=null?parseInt(_29[2]):0;};deconcept.PlayerVersion.prototype.versionIsValid=function(fv){if(this.major<fv.major){return false;}if(this.major>fv.major){return true;}if(this.minor<fv.minor){return false;}if(this.minor>fv.minor){return true;}if(this.rev<fv.rev){return false;}return true;};deconcept.util={getRequestParameter:function(_2b){var q=document.location.search||document.location.hash;if(_2b==null){return q;}if(q){var _2d=q.substring(1).split("&");for(var i=0;i<_2d.length;i++){if(_2d[i].substring(0,_2d[i].indexOf("="))==_2b){return _2d[i].substring((_2d[i].indexOf("=")+1));}}}return "";}};deconcept.SWFObjectUtil.cleanupSWFs=function(){var _2f=document.getElementsByTagName("OBJECT");for(var i=_2f.length-1;i>=0;i--){_2f[i].style.display="none";for(var x in _2f[i]){if(typeof _2f[i][x]=="function"){_2f[i][x]=function(){};}}}};if(!document.getElementById&&document.all){document.getElementById=function(id){return document.all[id];};}var getQueryParamValue=deconcept.util.getRequestParameter;var FlashObject=deconcept.SWFObject;var SWFObject=deconcept.SWFObject;
if((navigator.appVersion.indexOf('MSIE')>-1)&&(typeof window.XMLHttpRequest=='undefined')){
imgExt='gif';
}
else
{
imgExt='png';
}
var UT_RATING_IMG='icn_star_full_19x20'+imgExt;
var UT_RATING_IMG_HOVER='http://s.ytimg.com/yt/img/star_hover-vfl2056.gif';
var UT_RATING_IMG_HALF='icn_star_half_19x20'+imgExt;
var UT_RATING_IMG_BG='icn_star_empty_19x20'+imgExt;
var UT_RATING_IMG_REMOVED='http://s.ytimg.com/yt/img/star_removed-vfl2028.gif';
function UTRating(ratingElementId,maxStars,objectName,formName,ratingMessageId,componentSuffix,size,messages,starCount,callback)
{
this.ratingElementId=ratingElementId;
this.maxStars=maxStars;
this.objectName=objectName;
this.formName=formName;
this.ratingMessageId=ratingMessageId
this.componentSuffix=componentSuffix
this.messages=messages;
this.callback=callback;
this.starTimer=null;
this.starCount=0;
if(starCount){
this.starCount=starCount;
that=this;
onLoadFunctionList.push(function(){that.drawStars(that.starCount,true);});
}
if(size=='S'){
UT_RATING_IMG='icn_star_full_11x11gif'
UT_RATING_IMG_HALF='icn_star_half_11x11gif'
UT_RATING_IMG_BG='icn_star_empty_11x11gif'
}
function showStars(starNum,skipMessageUpdate){
this.clearStarTimer();
this.greyStars();
this.colorStars(starNum);
if(!skipMessageUpdate)
this.setMessage(starNum,messages);
}
function setMessage(starNum){
if(starNum>0){
if(!this.savedMessage){
this.savedMessage=document.getElementById(this.ratingMessageId).innerHTML;
}
document.getElementById(this.ratingMessageId).innerHTML=this.messages[starNum-1];
}else if(this.savedMessage){
document.getElementById(this.ratingMessageId).innerHTML=this.savedMessage;
}
}
function colorStars(starNum){
for(var i=0;i<starNum;i++){
removeClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG_HALF);
removeClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG_BG);
addClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG);
}
}
function greyStars(){
for(var i=0;i<this.maxStars;i++)
if(i<=this.starCount){
removeClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG);
removeClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG_HALF);
addClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG_BG);
}
else
{
removeClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG);
removeClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG_HALF);
addClass(document.getElementById('star_'+this.componentSuffix+"_"+(i+1)),UT_RATING_IMG_BG);
}
}
function setStars(starNum){
this.starCount=starNum;
this.drawStars(starNum);
document.forms[this.formName]['rating'].value=this.starCount;
var ratingElementId=this.ratingElementId;
that=this;
postForm(this.formName,true,function(req){
replaceDivContents(req,ratingElementId);
if(that.callback){
that.callback();
}
});
}
function drawStars(starNum,skipMessageUpdate){
this.starCount=starNum;
this.showStars(starNum,skipMessageUpdate);
}
function clearStars(){
this.starTimer=setTimeout(this.objectName+".resetStars()",300);
}
function resetStars(){
this.clearStarTimer();
if(this.starCount)
this.drawStars(this.starCount);
else
this.greyStars();
this.setMessage(0);
}
function clearStarTimer(){
if(this.starTimer){
clearTimeout(this.starTimer);
this.starTimer=null;
}
}
this.clearStars=clearStars;
this.clearStarTimer=clearStarTimer;
this.greyStars=greyStars;
this.colorStars=colorStars;
this.resetStars=resetStars;
this.setStars=setStars;
this.drawStars=drawStars;
this.showStars=showStars;
this.setMessage=setMessage;
}
ratingHoverTimers=[]
function ratingHoverOver(componentSuffix){
if(componentSuffix==""){
componentSuffix=="reserved"
}
_clearHoverTimer(componentSuffix);
hideDiv('defaultRatingMessage'+componentSuffix);
showDiv('hoverMessage'+componentSuffix);
}
function ratingHoverOut(componentSuffix){
if(componentSuffix==""){
componentSuffix=="reserved"
}
ratingHoverTimers[componentSuffix]=setTimeout(function(){_ratingHoverClear(componentSuffix);},300);
}
function _ratingHoverClear(componentSuffix){
if(componentSuffix==""){
componentSuffix=="reserved"
}
_clearHoverTimer();
hideDiv('hoverMessage');
showDiv('defaultRatingMessage');
}
function _clearHoverTimer(componentSuffix){
if(componentSuffix==""){
componentSuffix=="reserved"
}
if(ratingHoverTimers[componentSuffix]){
clearTimeout(ratingHoverTimers[componentSuffix]);
ratingHoverTimers[componentSuffix]=null;
}
}
function newRoadBlock(adTag){
a=adTag.split(';');
if(a.length>0){
for(x=0;x<=a.length-1;x++){
if(a[x].indexOf('sz=')==0){
size=a[x].substring(3);
dims=size.split('x');
height=dims[0];
width=dims[1];
loadRBs('myAd_banner',height,width,adTag);
}
}
}
}
function loadRBs(s,w,h,adTag){
document.getElementById(s).innerHTML=
'<iframe src="'+adTag+'" id="ifr_companion" width="'+w+'" height="'+h+
'" marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no>'+
'</iframe>';
}
function setFlashVars(myObjName){
var pvaTag=document.getElementById("pvaTag").value;
document.getElementById("FLASH_"+myObjName).SetVariable("myAdTag",pvaTag);
var canv=document.getElementById("canv").value;
document.getElementById("FLASH_"+myObjName).SetVariable("canv",canv);
var burl=document.getElementById("burl").value;
document.getElementById("FLASH_"+myObjName).SetVariable("dc_PVAurl",burl);
var hl=document.getElementById("pvaHl").value
document.getElementById("FLASH_"+myObjName).SetVariable("hl",hl);
document.getElementById("FLASH_"+myObjName).SetVariable("rtg","1");
}
function showPVA(){
var banner=document.getElementById("myAd_banner");
if(banner){
banner.style.visibility="visible";
banner.style.height=35;
}
}
function approveComment(comment_id,comment_type,entity_id,token)
{
if(CheckLogin()==false)
return false;
postUrlXMLResponse("/comment_servlet","&field_approve_comment=1&comment_id="+comment_id+"&comment_type="+comment_type+"&entity_id="+entity_id+"&"+token,self.commentApproved);
return false;
}
function removeComment(div_id,deleter_user_id,comment_id,comment_type,entity_id,token)
{
self.div_id=div_id
self.commentRemoved=commentRemoved
if(CheckLogin()==false)
return;
postUrlXMLResponse("/comment_servlet","deleter_user_id="+deleter_user_id+"&remove_comment&comment_id="+comment_id+"&comment_type="+comment_type+"&entity_id="+entity_id+"&"+token,self.commentRemoved);
return false;
}
function commentRemoved(xmlHttpRequest)
{
toggleVisibility(self.div_id,false);
return;
}
function hideCommentReplyForm(form_id){
var div_id="div_"+form_id;
var reply_id="reply_"+form_id;
toggleVisibility(reply_id,true);
toggleVisibility(div_id,false);
}
function handleStateChange(xmlHttpReq){
document.getElementById("all_comments_content").innerHTML=getNodeValue(xmlHttpReq.responseXML,"html_content");
style2=document.getElementById("recent_comments").style;
style2.display="none";
var style2=document.getElementById("all_comments").style;
style2.display="";
}
function showAjaxDivLoggedIn(divName,url,callback){
getUrlXMLResponse(url,showAjaxDivResponseLater(divName,callback));
}
function showAjaxPostDivLoggedIn(divName,url,data,callback){
postUrlXMLResponse(url,data,showAjaxDivResponseLater(divName,callback));
}
function showAjaxDiv(divName,url){
if(isLoggedIn){
showAjaxDivLoggedIn(divName,url)
}else{
alert(MSG_Login);
}
}
function showAjaxPostDiv(divName,url,data){
if(isLoggedIn){
showAjaxPostDivLoggedIn(divName,url,data)
}else{
alert(MSG_Login);
}
}
function showAjaxDivResponseLater(divName,callback){
return function(req){
_gel(divName).innerHTML=getNodeValue(req.responseXML,"html_content");
if(callback&&typeof callback=="function"){
callback();
}
};
}
function showAjaxDivResponse(req,divName){
_gel(divName).innerHTML=getNodeValue(req.responseXML,"html_content");
openDiv(divName);
}
function postAjaxForm(divName,formName,successCallback){
postFormXMLResponse(formName,closeAjaxDivLater(divName,successCallback));
}
function closeAjaxDivLater(divName,successCallback){
return function(req){
closeDiv(divName);
if(successCallback){
successCallback();
}
}
}
var first_time=1;
function changeBanner(img_url,ref_url,is_flash){
var e=_gel("gad_leaderboardAd");
if(first_time)
{
e.style.height="90px";
first_time=0;
}
var url="";
if(is_flash=="true")
{
url+="<object width='72"+"8' height='9"+"0'>";
url+="<"+"param value='clickTAG="+encodeURIComponent(ref_url)+"' /"+">";
url+="<"+"embed src='"+img_url+"'";
url+=" type='application/x-shockwave-flash' wmode='transparent'";
url+=" flashvars='clickTAG="+encodeURIComponent(ref_url)+"'";
url+=" width='72"+"8' height='9"+"0' /"+">";
url+="</object>";
}
else
{
url="<"+"a href='"+ref_url+"' target='_blank'>";
url+="<img src='"+img_url+"'>";
url+="</a>";
}
e.innerHTML=url;
}
function actionOver(div){
div.className='actionOver';
}
function actionOut(div){
div.className='actionRow';
}
function actionClick(div){
div.className='actionClicked';
}
function actionOverBottom(div){
div.className='actionOverBottom';
}
function actionOutBottom(div){
div.className='actionRowBottom';
}
function actionClickBottom(div){
div.className='actionClickedBottom';
}
function closeDisplay(div){
if(_gel(div)){
_gel(div).style.display="none";
}
}
function shareVideoFromFlash(){
shareVideo(pageVideoId);
smoothScrollIntoView(_gel("shareVideoDiv"),20);
}
function closeAll(except){
var divs=['addToFavesDiv','addToPlaylistDiv','shareVideoDiv','inappropriateVidDiv','customizeEmbedDiv','shareVideoEmailDiv','loginPleaseDiv','reportConcernResult1','reportConcernResult2','reportConcernResult3','reportConcernResult4','reportConcernResult5'];
for(var i=0;i<divs.length;i++){
if((divs[i]!=except)&&(_gel(divs[i]))){
var theDiv=_gel(divs[i]);
if(theDiv){
theDiv.style.display="none";
}
}
}
}
function postResponse(){
if(isLoggedIn){
closeAll('postResponseDiv');
toggleDisplay('postResponseDiv');
}
else
{
alert(MSG_LoginPostResponse);
}
}
function closeAfter(divName,delay){
setTimeout(function(){
closeDisplay(divName)
},delay);
}
function postResponseClose(){
toggleDisplay('postResponseDiv');
toggleDisplay('postResponseResult');
closeAfter('postResponseResult',3000);
}
function customizeEmbed(){
closeAll('customizeEmbedDiv');
toggleDisplay('customizeEmbedDiv');
}
function loginPlease(){
closeAll('loginPleaseDiv');
toggleDisplay('loginPleaseDiv');
if(_gel('loginPleaseDiv').style.display=="block"){
_gel('loginPleaseUser').focus();
}
}
function addToFaves(formName){
if(isLoggedIn){
closeAll('addToFavesResult');
toggleDisplay('addToFavesResult');
postAjaxForm('addToFavesDiv',formName);
_hbLink('Save+To+Favorites','Watch3');
addClass(_gel('a2_i2'),'disabled');
setTimeout("closeDisplay('addToFavesResult')",3000);
}
else{
loginPlease();
}
}
var gWatchLoading='';
function addToPlaylist(videoId){
if(isLoggedIn){
if(!gWatchLoading){
gWatchLoading=_gel('addToPlaylistDiv').innerHTML;
}else{
_gel('addToPlaylistDiv').innerHTML=gWatchLoading;
}
closeAll('addToPlaylistDiv');
if(toggleDisplay('addToPlaylistDiv')){
showAjaxDivLoggedIn('addToPlaylistDiv','/watch_ajax?video_id='+videoId+'&action_get_playlists_component=1',true);
_hbLink('Add+To+Playlists','Watch3');
}
}
else{
loginPlease();
}
}
function submitToBlog(self){
_gel('submitToBlogBtn').disabled=true;
postAjaxForm('shareVideoDiv',self.name,addToBlogClose);
}
function addToBlogClose(){
toggleDisplay('addToBlogResult');
closeAfter('addToBlogResult',3000);
_gel('submitToBlogBtn').disabled=false;
}
function submitToPlaylist(self){
if(!self.form.playlist_id.value){
return;
}
self.disabled=true;
postAjaxForm('addToPlaylistDiv',self.form.name,addToPlaylistClose);
}
function addToPlaylistClose(){
toggleDisplay('addToPlaylistResult');
closeAfter('addToPlaylistResult',3000);
}
function reportConcern(videoId){
if(isLoggedIn){
closeAll('inappropriateVidDiv');
if(toggleDisplay('inappropriateVidDiv')){
if(_gel('inappropriateVidDiv').innerHTML.indexOf('<div')!=-1){
return;
}
showAjaxDivLoggedIn('inappropriateVidDiv','/watch_ajax?video_id='+videoId+'&action_get_flag_video_component=1',true);
_hbLink('Flag+Inappropriate','Watch3');
}
}
else{
loginPlease();
}
}
function reportConcernClose(){
toggleDisplay('inappropriateVidDiv');
toggleDisplay('reportConcernResult');
closeAfter('reportConcernResult',3000);
}
function shareVideo(videoId){
closeAll('shareVideoDiv');
toggleDisplay('shareVideoDiv');
if(_gel('shareVideoDiv').style.display!="none"){
if(this.loaded===undefined){
showAjaxDivLoggedIn('shareVideoDiv','/watch_ajax?video_id='+videoId+'&action_get_share_video_component=1',true);
this.loaded=true;
}
_hbLink('Share+Video','Watch3');
}
}
function shareVideoEmail(videoId){
toggleDisplay('shareVideoEmailDiv');
}
function shareVideoClose(){
toggleDisplay('shareVideoDiv');
toggleDisplay('shareVideoResult');
closeAfter('shareVideoResult',3000);
}
function shareWorld(){
closeAll('shareWorldDiv');
toggleDisplay('shareVideoDiv');
toggleDisplay('shareWorldDiv');
}
function shareWorldClose(){
toggleDisplay('shareWorldDiv');
toggleDisplay('shareWorldResult');
setTimeout("closeDisplay('shareWorldResult')",3000);
}
function embedIt(){
closeAll('embedItDiv');
toggleDisplay('embedItDiv');
}
function showHonorsContent(){
getAndShowNavContent('honors',honorsLink);
}
function writeAcdcMoviePlayer(div,state){
var s=_pick(state,new Object());
var p=null;
var swfUrl=_pick(s.swfUrl);
var force=_pick(s.forceSwfVersion,false);
var fo=new SWFObject(swfUrl,"movie_player","480","395",(force?"7":"0"),"#FFFFFF");
fo.addParam("allowFullScreen","true");
var swfArgs=_pick(s.swfArgs,new Object());
for(var swfArg in swfArgs){fo.addVariable(swfArg,swfArgs[swfArg]);}
p=_pick(s.gamUrl);
if(p!=null)fo.addVariable("gam",p);
p=_pick(s.dcUrl);
if(p!=null)fo.addVariable("ad_tag",p);
p=_pick(s.playAll);
if(p!=null)fo.addVariable("playnext",p);
p=_pick(s.border);
fo.addVariable("border",(!!p?1:0));
p=_pick(s.videoId);
if(p!=null)fo.addVariable("video_id",p);
p=_pick(s.videoQuery);
if(p!=null)fo.addVariable("video_query",p);
p=_pick(s.docKey);
if(p!=null)fo.addVariable("doc_key",p);
p=_pick(s.autoplay);
if(p!=null)fo.addVariable("autoplay",p);
p=_pick(s.rel);
if(p!=null)fo.addVariable("rel",p);
p=_pick(s.videoPubId);
if(p!=null)fo.addVariable("video_pub_id",p);
p=_pick(s.channelId);
if(p!=null)fo.addVariable("channel_id",p);
p=_pick(s.wmode);
if(p!=null)fo.addParam("wmode",p);
p=_pick(s.allowScriptAccess);
if(p!=null)fo.addParam("allowscriptaccess",p);
fo.write(div);
}
function writeMoviePlayer(player_div,force){
var v="7";
if(force)
v="0";
var fo=new SWFObject(swfUrl,"movie_player","480","395",v,"#FFFFFF");
fo.addParam("allowFullscreen","true");
for(var x in swfArgs){
fo.addVariable(x,swfArgs[x]);
}
if(watchGamUrl!=null){
fo.addVariable("gam",watchGamUrl);
}
if(watchDCUrl!=null){
fo.addVariable("ad_tag",watchDCUrl);
}
if(!watchIsPlayingAll){
fo.addVariable("playnext",0);
}
if(watchSetWmode){
fo.addParam("wmode","opaque");
}
player_written=fo.write(player_div);
}
function setSWFVersion(version_from_swf)
{
if(watchTrackWithHitbox){
_hbPageView("WatchSWFTracker/"+player_written,"FlashTracker3");
}
if(!player_written)
writeMoviePlayer("playerDiv",true);
}
function closeFullStats(){
toggleDisplay('fullStats');
if(_gel('showhide')){
_gel('showhide').innerHTML='Show';
}
}
function toggleLinkStats(){
if(_gel('fullStats').style.display!='none'&&_gel('fullStats').style.display){
toggleDisplay('fullStats');
}
toggleDisplay('linkStats');
}
function toggleFullStats(statsContent){
if(statsContent===undefined){
statsContent='honors';
ajaxUrl=additionalStatsHonorsUrl;
_gel('referDiv').style.display='block';
}
else if(statsContent=='audio'){
ajaxUrl=additionalStatsAudioUrl;
_gel('referDiv').style.display='none';
}
var fsd=_gel('fullStats').style.display;
if(fsd=='none'||fsd==''){
showAjaxDivLoggedIn('additionalStatsDiv',ajaxUrl,false);
if(statsContent=='audio'){
_gel('showhide').innerHTML=MSG_Hide;
}
if(_gel('linkStats').style.display!='none'&&_gel('linkStats').style.display){
toggleDisplay('linkStats');
}
toggleDisplay('fullStats');
}
else
{
if(((statsContent=='honors'&&_gel('audioStatHead'))||(statsContent=='audio'&&_gel('honorStatHead'))))
{
showAjaxDivLoggedIn('additionalStatsDiv',ajaxUrl,false);
if(statsContent=='honors'){
_gel('showhide').innerHTML=MSG_Show;
}
else if(statsContent=='audio'){
_gel('showhide').innerHTML=MSG_Hide;
}
}
else
{
toggleDisplay('fullStats');
if(statsContent=='audio'){
_gel('showhide').innerHTML=MSG_Show;
}
}
}
}
function showAllQueuedVideos(){
setInnerHTML('show_all_queued_videos_div',MSG_Loading);
getAndShowNavContent('watchlist_container',watchlistContainerUrl,postShowAllQueuedVideos);
}
function postShowAllQueuedVideos(){
setInnerHTML('show_all_queued_videos_div',MSG_ShowingAll);
jumpToNowPlaying();
}
function openFull(){
var fs=window.open(fullscreenUrl,
"FullScreenVideo","toolbar=no,width="+screen.availWidth+",height="+screen.availHeight
+",status=no,resizable=yes,fullscreen=yes,scrollbars=no");
fs.focus();
}
function isCurrentlyPlayingVideoInPlaylist(component){
var videosInPlaylist=getPlaylistVideoCount(component);
for(i=0;i<videosInPlaylist;i++){
var currentRow=_gel(getId('playlistRow',playnextFrom,i));
if(hasClass(currentRow,'playlistRowPlaying')){
return true;
}
}
}
function gotoNext(){
if(playnextFrom){
var nextRow=_gel(getId("playlistRow",playnextFrom,0));
var videosInPlaylist=getPlaylistVideoCount(playnextFrom);
for(i=0;i<videosInPlaylist;i++){
var currentRow=_gel(getId('playlistRow',playnextFrom,i));
if(hasClass(currentRow,'playlistRowPlaying')){
if(i+1<videosInPlaylist){
nextRow=_gel(getId('playlistRow',playnextFrom,i+1));
}else{
nextRow=null;
}
break;
}
}
if(nextRow){
window.location=getUrlFromPlaylistRow(nextRow)+"&playnext="+(parseInt(playnextCount)+1)+"&playnext_from="+playnextFrom;
}
}
}
var autoNextComponents=['PL','QL'];
function autoNext(suffix){
playnextFrom=suffix;
for(var i=0;i<autoNextComponents.length;i++){
if(autoNextComponents[i]==suffix){
showDiv(getId("playingall",autoNextComponents[i]));
hideDiv(getId("playall",autoNextComponents[i]));
}else{
hideDiv(getId("playingall",autoNextComponents[i]));
showDiv(getId("playall",autoNextComponents[i]));
}
}
var p=_gel("movie_player");
if(p.GetVariable("movie.is_playing")=="false"&&p.GetVariable("movie.restart")=="true"){
gotoNext();
}else if(!isCurrentlyPlayingVideoInPlaylist(suffix)){
gotoNext();
}else{
p.SetVariable("playnext","1");
}
return false;
}
function autoNextOff(suffix){
playnextFrom="";
_gel("movie_player").SetVariable("playnext","0");
showDiv(getId("playall",suffix));
hideDiv(getId("playingall",suffix));
return false;
}
function CheckLogin(){
return isLoggedIn;
}
function getId(baseId,component,index){
var id=baseId;
if(component!=null)
id+="_"+component;
if(index!=null)
id+="_"+index;
return id;
}
function onQuickAddClick(imgClicked,encryptedId){
imgClicked.blur();
var suffix='QL';
var videosInPlaylist=getPlaylistVideoCount(suffix);
var alreadyInList=false;
for(var i=0;i<videosInPlaylist;i++){
var videoRow=_gel(getId("playlistRow",suffix,i));
if(encryptedId==getNodeVideoId(videoRow)){
alreadyInList=true;
break;
}
}
if(!alreadyInList){
var newRow=_gel("playlistRow_placeholder_QL").cloneNode(true);
var videoCount=getPlaylistVideoCount("QL");
fillQuicklistRow(newRow,videoCount,"","http://s.ytimg.com/yt/img/pixel-vfl73.gif",MSG_Loading,"","");
removeClass(newRow,"hide");
setNodeVideoId(newRow,encryptedId);
addClass(newRow,"loading");
var rows=_gel("playlistRows_QL");
var lastRow=_gel(getId('playlistRow','QL',videoCount-1));
if(lastRow){
rows.insertBefore(newRow,lastRow.nextSibling);
}else{
rows.insertBefore(newRow,rows.firstChild);
}
scrollPlaylistToVideo('QL',videoCount);
if(incrementPlaylistVideoCount('QL',1)>4){
var containerNode=_gel(getId("playlistContainer",'QL'));
removeClass(containerNode,"autoHeight");
addClass(containerNode,"fixedHeight175");
}
EventManager.fireEvent('QuicklistItemAdded',encryptedId);
}
clickedQuickAdd(imgClicked,encryptedId,alreadyInList);
_hbLink('QuickList+AddTo','Watch3');
showDiv('quicklistDiv');
return false;
}
function showPlaylist(component){
showDiv(getId("playlistOpen",component));
hideDiv(getId("playlistClosed",component));
return false;
}
function hidePlaylist(component){
showDiv(getId("playlistClosed",component));
hideDiv(getId("playlistOpen",component));
return false;
}
var delayLoadRegistry=[];
var delayLoadCompleted=[];
function delayLoad(id,img,src){
delayLoadRegistry[delayLoadRegistry.length]=[id,img,src];
delayLoadCompleted[id]=false;
}
function performDelayLoad(id){
if(!delayLoadCompleted[id]){
delayLoadCompleted[id]=true;
for(var i=0;i<delayLoadRegistry.length;i++){
if(delayLoadRegistry[i][0]==id){
delayLoadRegistry[i][1].onload="";
delayLoadRegistry[i][1].src=delayLoadRegistry[i][2];
}
}
}
}
var showAjaxDivNotLoggedIn=showAjaxDivLoggedIn;
function hideLinkingSitesCallback(){
hideDiv('referersList');
hideInline('hideLinkingSites');
showInline('showLinkingSites');
showInline('linkingSitesDisabled');
}
function hideLinkingSites(){
postUrlXMLResponse('/watch_ajax','action_hide_linking_sites=1&video_id='+pageVideoId+'&'+axc,hideLinkingSitesCallback);
return false;
}
function showLinkingSites(){
hideInline('linkingSitesDisabled');
showInline('hideLinkingSites');
hideInline('showLinkingSites');
showAjaxPostDivLoggedIn('referersList','/watch_ajax','action_show_linking_sites=1&video_id='+pageVideoId+'&'+axc);
return false;
}
function toggleChannelVideos(username){
if(!_gel('more_channel_videos')){
var callback=function(){addQLIcons(_gel('channel_videos_full'));};
showAjaxDivLoggedIn('channel_videos_full','/watch_ajax?user='+username+'&video_id='+pageVideoId+'&action_channel_videos',callback);
}
return false;
}
function showRelatedAsList(doAjaxCall){
if(doAjaxCall){
setInnerHTML('relatedVidsBody',MSG_Loading);
var callback=function(){addQLIcons(_gel('relatedVidsBody'));};
showAjaxDivLoggedIn('relatedVidsBody',relatedVideoListUrl,callback);
}
removeClass(_gel('relatedVidsBody'),'relatedGridView');
addClass(_gel('relatedVidsBody'),'relatedListView');
showInline("relatedList");
hideInline("relatedNotList");
showInline("relatedNotGrid");
hideInline("relatedGrid");
return false;
}
function showRelatedAsGrid(){
removeClass(_gel('relatedVidsBody'),'relatedListView');
addClass(_gel('relatedVidsBody'),'relatedGridView');
performDelayLoad('related');
hideInline("relatedList");
showInline("relatedNotList");
hideInline("relatedNotGrid");
showInline("relatedGrid");
return false;
}
var defaultRecipientFieldCount=2;
var recipientFieldNamePrefix="recipient";
var recipientFieldCount=defaultRecipientFieldCount;
var lastRecipientFieldId=recipientFieldNamePrefix+recipientFieldCount;
var maxRecipients=10;
function addRecipientFieldIfNeeded(field){
if(field.id==lastRecipientFieldId&&recipientFieldCount<maxRecipients){
newField=field.cloneNode(true);
recipientFieldCount++;
lastRecipientFieldId=recipientFieldNamePrefix+recipientFieldCount;
newField.id=lastRecipientFieldId;
newField.name=lastRecipientFieldId;
_gel('recipients').appendChild(newField);
}
}
function resetRecipients(){
recipientFieldCount=defaultRecipientFieldCount;
lastRecipientFieldId=recipientFieldNamePrefix+recipientFieldCount;
}
function consolidateRecipients(){
hiddenRecipientsField=_gel('recipients');
for(var i=1;i<=recipientFieldCount;i++){
hiddenRecipientsField.value+=(_gel(recipientFieldNamePrefix+""+i).value+",");
}
}
SHARED_RATINGS_INVITE_SHOW_MAX=5
SHARED_RATINGS_INVITE_REJECT_MAX=2
function displayRecentRatingsInvite(){
if(!readCookie("stop_shared_ratings_invite")){
showDiv("recentRatingsInvite");
var timesShown=parseInt(readCookie("shared_ratings_invite_shown","0"));
timesShown=timesShown+1;
createCookie("shared_ratings_invite_shown",timesShown);
if(timesShown>=SHARED_RATINGS_INVITE_SHOW_MAX){
createCookie("stop_shared_ratings_invite","1");
}
}
}
SHARED_RATINGS_INVITE_SHOW_MAX=5
function rejectRecentRatings(){
var timesRejected=parseInt(readCookie("shared_ratings_invite_rejected","0"));
timesRejected=timesRejected+1;
createCookie("shared_ratings_invite_rejected",timesRejected);
if(timesRejected>=SHARED_RATINGS_INVITE_REJECT_MAX){
createCookie("stop_shared_ratings_invite","1");
}
}
function subscribe(username,token){
postUrlXMLResponse('/ajax_subscriptions','subscribe_to_user='+username+'&session_token='+token,function(result){removeClass(_gel('unsubscribeDiv'),'hid');addClass(_gel('subscribeDiv'),'hid');});
}
function unsubscribe(username,token){
postUrlXMLResponse('/ajax_subscriptions','unsubscribe_from_user='+username+'&session_token='+token,function(){removeClass(_gel('subscribeDiv'),'hid');addClass(_gel('unsubscribeDiv'),'hid');});
}
function flagError(elName,errorText){
if(elName){
_gel(elName).innerHTML=errorText;
toggleDisplay(elName);
}
}
function clearSelectionStyles(elName){
if(elName){
elName.style.backgroundColor='';
elName.style.color='';
}
}
function setSelectionStyles(elName){
if(elName){
elName.style.backgroundColor='#6681ba';
elName.style.color='#fff';
}
}
function flagReasonSelection(selID,reason,subreason){
var selCurrent=_gel('selectedFlagReason')
var selNew=_gel(selID);
if(_gel('flag_id').value){
clearSelectionStyles(_gel(_gel('flag_id').value));
clearSelectionStyles(_gel((_gel('flag_id').value).substring(0,2)));
}
setSelectionStyles(selNew);
if(selID.length==5){
setSelectionStyles(_gel(selID.substring(0,2)));
}
_gel('flag_reason').value=reason;
_gel('flag_sub_reason').value=subreason;
_gel('flag_id').value=selID;
selCurrent.innerHTML=_gel(selID).innerHTML;
setVisible('flag_'+selID.substring(0,2),false);
setVisible('flag_main',false);
closeAllFlagMoreInfo();
}
function closeAllFlagMoreInfo(){
var divs=['flagMoreInfo1','flagMoreInfo2','flagMoreInfo3','flagMoreInfo4','flagMoreInfo5','flagMoreInfo6','flagError'];
for(var i=0;i<divs.length;i++){
var theDiv=_gel(divs[i]);
if(theDiv){
theDiv.style.display='none';
}
}
}
function processFlagForm(elForm){
var formElement=elForm;
if(formElement){
var sel=formElement.flag_id.value;
if(sel){
if(sel=='hc_hv'){
if(formElement.protected_group.options[formElement.protected_group.selectedIndex].value!=''){
toggleDisplay('reportConcernResult3');
}
else{
toggleDisplay('flagError');
return;
}
}
else if(sel=='vc_af'||sel=='sc_su'){
toggleDisplay('reportConcernResult2');
}
else{
toggleDisplay('reportConcernResult1');
}
postAjaxForm('inappropriateVidDiv',elForm.name);
_gel('selectedFlagReason').innerHTML='- '+MSG_FlagDefault+' -';
if(_gel('flag_id').value){
clearSelectionStyles(_gel(_gel('flag_id').value));
clearSelectionStyles(_gel((_gel('flag_id').value).substring(0,2)));
_gel('flag_id').value='';
}
closeAllFlagMoreInfo();
toggleDisplay('inappropriateVidDiv');
addClass(_gel('a4_i4'),'disabled');
}
else{
toggleDisplay('flagError');
}
}
}
function hideLinkingSiteCallback(){
hideInline('referersList');
showInline('referersList');
}
function hideLinkingSite(video_id,site){
showAjaxPostDivLoggedIn('referersList','/watch_ajax','action_hide_linking_site=1&video_id='+video_id+'&url='+site+'&'+axc,hideLinkingSiteCallback);
return false;
}
function showLinkingSite(video_id,site){
showAjaxPostDivLoggedIn('referersList','/watch_ajax','action_show_linking_site=1&video_id='+video_id+'&url='+site+'&'+axc,hideLinkingSiteCallback);
return false;
}
function checkCurrentVideo(videoId)
{
if(pageVideoId!=videoId){
window.location.href="/watch?v="+videoId;
}
}
var selectedThemeColor='blank';
function onChangeColor(color){
var oldTheme=document.getElementById('theme_color_'+selectedThemeColor+'_img');
var newTheme=document.getElementById('theme_color_'+color+'_img');
yt.UserPrefs.set('emt',color);
yt.UserPrefs.save();
removeClass(oldTheme,'radio_selected');
addClass(newTheme,'radio_selected');
selectedThemeColor=color;
onUpdatePreviewImage();
return false;
}
function onUpdatePreviewImage(){
var previewImage=document.getElementById('customizeEmbedThemePreview');
var showBorderCheckBox=document.getElementById('show_border_checkbox');
var border=(!showBorderCheckBox.checked?'_nb':'');
previewImage.src='img/preview_embed_'+selectedThemeColor+'_sm'+border+'.gif';
}
function applyUserPrefs(){
if(_gel('customizeEmbedDiv')){
var showBorderCheckBox=_gel('show_border_checkbox');
showBorderCheckBox.checked=yt.UserPrefs.getFlag(yt.UserPrefs.Flags.FLAG_EMBED_SHOW_BORDER);
if(yt.UserPrefs.getFlag(yt.UserPrefs.Flags.FLAG_EMBED_INCLUDE_RELATED_VIDEOS)){
_gel('embedCustomization1').checked=true;
}else{
_gel('embedCustomization0').checked=true;
}
var color=yt.UserPrefs.get('emt');
if(color!='blank'&&color!=''){
onChangeColor(color);
}
}
}
function onChangeBorder(border){
yt.UserPrefs.setFlag(yt.UserPrefs.Flags.FLAG_EMBED_SHOW_BORDER,(!!border));
yt.UserPrefs.save();
onUpdatePreviewImage();
}
function onChangeRelated(related){
yt.UserPrefs.setFlag(yt.UserPrefs.Flags.FLAG_EMBED_INCLUDE_RELATED_VIDEOS,related);
yt.UserPrefs.save();
}
function signup(){
window.location="/signup?next_url="+escape(window.location);
}
var qlUIEnabled=false;
function initWatchQueue(isUIEnabled){
qlUIEnabled=isUIEnabled;
}
function clearWatchQueue(){
postUrlXMLResponse("/watch_queue_ajax","&action_clear_queue",watchQueueCleared);
var suffix="QL";
var videosInPlaylist=getPlaylistVideoCount(suffix);
decrementPlaylistVideoCount(suffix,videosInPlaylist);
for(var i=videosInPlaylist-1;i>=0;i--){
var videoRow=_gel(getId("playlistRow",suffix,i));
videoRow.parentNode.removeChild(videoRow);
}
var container=_gel(getId("playlistContainer",suffix));
addClass(container,"autoHeight");
removeClass(container,"fixedHeight175");
videolist=new Array();
removelist=new Array();
for(var i=0;i<quickAddDoneList.length;i++){
removeClass(quickAddDoneList[i],'QLIconImgOver');
removeClass(quickAddDoneList[i],'QLIconImgDone');
addClass(quickAddDoneList[i],'QLIconImg');
}
quickAddDoneList=new Array();
hideDiv("quicklistDiv");
EventManager.fireEvent("QuicklistCleared");
}
function watch_remove_from_watch_queue(video_id){
removelist.push(video_id);
watch_delete_videos_from_server();
return false;
}
var qlIsEditing=false;
function watch_post_videos_to_server(){
if(videolist.length>0&&!qlIsEditing){
qlIsEditing=true;
var queryParams="&action_add_to_queue&video_id="+videolist.shift();
if(qlUIEnabled){
queryParams+="&ui=1"
}
var request=new getUrlXMLResponseJSON("/watch_queue_ajax?"+queryParams,watchVideoQueued);
}
}
var isRemoving=false;
function watch_delete_videos_from_server(){
if(removelist.length>0){
isRemoving=true;
postUrlXMLResponse("/watch_queue_ajax","&action_remove_from_queue&video_id="+removelist[removelist.length-1],self.watchVideoRemoved);
removelist.pop();
}
isRemoving=false;
if(delayedCompletePlaylistLoad){
completePlaylistLoad();
}
}
function watchQueueCleared(xmlHttpRequest){
}
function watchVideoQueued(videos){
qlIsEditing=false;
if(qlUIEnabled){
if(videos){
handleWatchQueueGet(videos);
}
}
watch_post_videos_to_server();
}
function watchVideoRemoved(xmlHttpRequest){
watch_delete_videos_from_server();
}
function watch_clicked_add_icon(video_ID,fromRelated){
if(fromRelated==1){
showQuickList_first_add();
_gel('play_all_numb').innerHTML=quicklist_count+'&nbsp;';
if(_gel('show_all_video_number')){
_gel('show_all_video_number').innerHTML=quicklist_count;
}
}
_gel(button_name).blur();
}
var autoScrolledTo=null;
function scrollPlaylistToVideo(suffix,index){
var videoRow=_gel(getId('playlistRow',suffix,index));
_gel(getId("playlistContainer",suffix)).scrollTop=videoRow.offsetTop;
autoScrolledTo=_gel(getId("playlistContainer",suffix)).scrollTop;
}
function registerPlaylistAutoload(component){
if(component=='QL'&&qlAutoscrollDestination>0){
scrollPlaylistToVideo(component,qlAutoscrollDestination);
}
_gel(getId('playlistContainer',component)).onscroll=completePlaylistLoad;
if(autoScrolledTo&&autoScrolledTo!=_gel(getId("playlistContainer",'QL')).scrollTop){
completePlaylistLoad();
}
}
function clickedQuickAdd(img,videoId,alreadyInList){
quickAddDoneList[quickAddDoneList.length]=img;
removeClass(img,'QLIconImg');
removeClass(img,'QLIconImgOver');
addClass(img,'QLIconImgDone');
if(!alreadyInList){
videolist.push(videoId);
watch_post_videos_to_server();
}
}
var quickAddDoneList=new Array();
function getUrlFromPlaylistRow(rowNode){
var links=rowNode.getElementsByTagName('a');
return links[0].href;
}
function watchRemoveVideo(suffix,playlistRow){
var playlistRow=getAncestorWithClass(playlistRow,"playlistRow");
var vid=getNodeVideoId(playlistRow);
playlistRow.parentNode.removeChild(playlistRow);
var newIndex=0;
var videos=getPlaylistVideoCount(suffix);
for(var i=0;i<videos;i++){
var row=_gel(getId("playlistRow",suffix,i));
var index=_gel(getId("playlistRowIndex",suffix,i));
if(row){
row.id=getId("playlistRow",suffix,newIndex);
index.id=getId("playlistRowIndex",suffix,newIndex);
index.innerHTML=newIndex+1;
newIndex++;
}
}
var newCount=decrementPlaylistVideoCount(suffix,1);
watch_remove_from_watch_queue(vid);
var containerNode=_gel(getId("playlistContainer",'QL'));
if(newCount==0){
hidePlaylist(suffix);
}else if(newCount<4){
addClass(containerNode,"autoHeight");
removeClass(containerNode,"fixedHeight175");
}
if(containerNode.onscroll){
containerNode.onscroll();
}
}
var delayedCompletePlaylistLoad=false;
function completePlaylistLoad(){
if(!isRemoving){
suffix="QL";
_gel('playlistContainer_'+suffix).onscroll="";
request=new getUrlXMLResponseJSON("/watch_queue_ajax?v="+pageVideoId+"&action_get_all_queue_videos_component=1&all=1&watch3=1",handleWatchQueueGet);
}else{
delayedCompletePlaylistLoad=true;
}
}
function handleWatchQueueGet(videos){
for(var i=0;i<videos.length;i++){
if(videos[i]){
var newRow=_gel("playlistRow_placeholder_QL").cloneNode(true);
removeClass(newRow,"hide");
videos[i].unshift(newRow);
fillQuicklistRow.apply(this,videos[i]);
newRow.id=getId("playlistRow","QL",videos[i][1]);
var oldNode=_gel(newRow.id);
if(hasClass(oldNode,"loading")){
oldNode.parentNode.replaceChild(newRow,oldNode);
}
}
}
}
function getPlaylistVideoCount(component){
return parseInt(_gel('playlistVideoCount_'+component).innerHTML);
}
function incrementPlaylistVideoCount(component,increment_by){
var node=_gel('playlistVideoCount_'+component);
node.innerHTML=parseInt(node.innerHTML)+increment_by;
return parseInt(node.innerHTML);
}
function decrementPlaylistVideoCount(component,decrement_by){
return incrementPlaylistVideoCount(component,-1*decrement_by);
}
function getNodeVideoId(node){
return getStoredValue(node,"v")
}
function setNodeVideoId(node,id){
return setStoredValue(node,"v",id)
}
function getStoredValue(node,name){
var classes=getClassList(node);
var pattern=classNameForNameValue(name,'');
var found=false;
for(var i=0;i<classes.length;i++){
if(classes[i].substr(0,pattern.length)==pattern){
return classes[i].substr(pattern.length,classes[i].length-pattern.length);
}
}
return '';
}
function setStoredValue(node,name,value){
var classes=getClassList(node);
var pattern=classNameForNameValue(name,'');
var found=false;
for(var i=0;i<classes.length;i++){
if(classes[i].substr(0,pattern.length)==pattern){
classes[i]=classNameForNameValue(name,value);
found=true;
}
}
if(!found){
classes.push(classNameForNameValue(name,value));
}
node.className=classes.join(' ');
}
function classNameForNameValue(name,value){
return name+"*"+value;
}
function TemplateParameters(params){
this.addParameter=addParameter;
this.applyToNode=applyToNode;
this.fill=fill;
this.parameters=new Object();
for(var i=0;i<params.length;i++){
this.addParameter(params[i][0],params[i][1],params[i][2]);
}
function Parameter(attrName,value){
this.attrName=attrName;
this.value=value;
}
function addParameter(className,attrName,value){
if(!this.parameters[className]){
this.parameters[className]=new Array();
}
this.parameters[className].push(new Parameter(attrName,value));
}
function applyToNode(node){
var classList=getClassList(node);
for(var i=0;i<classList.length;i++){
var applyList=this.parameters[classList[i]];
if(applyList){
for(var j=0;j<applyList.length;j++){
if(typeof(applyList[j].value)=="function"){
node[applyList[j].attrName]=applyList[j].value();
}else{
node[applyList[j].attrName]=applyList[j].value;
}
}
}
}
}
function fill(node){
for(var i=0;i<node.childNodes.length;i++){
this.fill(node.childNodes[i]);
}
this.applyToNode(node);
}
}
function fillQuicklistRow(rowDiv,index,videoUrl,imgSrc,title,username,duration,videoId){
var params=new TemplateParameters(
[['playlistRow','id',getId("playlistRow","QL",index)],
['playlistRow','class',function(node){setNodeVideoId(rowDiv,videoId)}],
['phIndex','id',getId("playlistRowIndex","QL",index)],
['phIndex','innerHTML',index+1],
['playlistRowLink','href',videoUrl],
['vimg50','src',imgSrc],
['vtitle','innerHTML',title],
['phUsername','innerHTML',username],
['playlistItemDuration','innerHTML',duration]]);
params.fill(rowDiv);
}
function quickListShowRelated(node){
getUrlXMLResponseAndFillDiv('/related_ajax?view_type=L&watch3=1&video_id='+
getNodeVideoId(getAncestorWithClass(node,"playlistRow")),
'relatedVidsBody',
function(){addQLIcons(_gel('relatedVidsBody'));});
}
var imageBrowsers=new Object();
var images_loaded=false;
function shiftLeft(bar_id){
if(images_loaded==false){
return;
}
imageBrowsers[bar_id].shiftPageLeft();
imageBrowsers[bar_id].showImages();
}
function shiftRight(bar_id){
if(images_loaded==false){
return;
}
imageBrowsers[bar_id].shiftPageRight();
imageBrowsers[bar_id].showImages();
}
function ImageBrowser(display_count,step_size,root_div_id){
this.display_count=display_count;
this.step_size=step_size;
this.root_div_id=root_div_id;
this.display_array=new Array();
this.addImage=imageBrowserAddImage;
this.initDisplay=imageBrowserInitDisplay;
this.shiftPageLeft=imageBrowserShiftPageLeft;
this.shiftPageRight=imageBrowserShiftPageRight;
this.shiftLeft=imageBrowserShiftLeft;
this.shiftRight=imageBrowserShiftRight;
this.showImages=imageBrowserShowImages;
this.prefetchNextPrevImages=imageBrowserPrefetchNextPrevImages;
this.printPageNumbers=imageBrowserPrintPageNumbers;
this.incrementIndex=imageBrowserIncrementIndex;
this.decrementIndex=imageBrowserDecrementIndex;
}
function imageBrowserAddImage(ytImg){
if(!this.images){
var images=new Array();
this.images=images;
}
this.images.push(ytImg);
}
function imageBrowserInitDisplay(){
this.real_images_count=this.images.length;
var empty_slots=this.display_count-(this.images.length%this.display_count);
if(empty_slots!=this.display_count){
for(var i=0;i<empty_slots;i++){
this.addImage(new ytImage("http://s.ytimg.com/yt/img/pixel-vfl73.gif","","&nbsp;","","&nbsp;","",true));
}
}
for(var i=0;i<this.display_count;i++){
this.display_array[i]=this.images[i];
}
this.head_index=0;
this.tail_index=this.display_array.length-1;
}
function imageBrowserIncrementIndex(index){
index=index+1;
if(index>this.images.length-1){
index=0;
}
return index;
}
function imageBrowserDecrementIndex(index){
index=index-1;
if(index<0){
index=this.images.length-1;
}
return index;
}
function imageBrowserShiftPageRight(){
for(var i=0;i<this.display_array.length;i++){
this.shiftRight();
}
}
function imageBrowserShiftPageLeft(){
for(var i=0;i<this.display_array.length;i++){
this.shiftLeft();
}
}
function imageBrowserShiftRight(){
for(var i=0;i<this.display_array.length;i++){
this.display_array[i]=this.display_array[i+1];
}
this.head_index=this.incrementIndex(this.head_index);
this.tail_index=this.incrementIndex(this.tail_index);
this.display_array[this.display_array.length-1]=this.images[this.tail_index];
}
function imageBrowserShiftLeft(){
for(var i=this.display_array.length-1;i>0;i--){
this.display_array[i]=this.display_array[i-1];
}
this.head_index=this.decrementIndex(this.head_index);
this.tail_index=this.decrementIndex(this.tail_index);
this.display_array[0]=this.images[this.head_index];
}
function imageBrowserShowImages(){
for(var i=0;i<this.display_array.length;i++){
tempDivId="img_"+this.root_div_id+"_"+i;
block=document.getElementById("img_"+this.root_div_id+"_"+i);
title1=document.getElementById("title1_"+this.root_div_id+"_"+i);
title2=document.getElementById("title2_"+this.root_div_id+"_"+i);
title3=document.getElementById("title3_"+this.root_div_id+"_"+i);
block.src=this.display_array[i].getImage();
title1.innerHTML=this.display_array[i].title1;
title2.innerHTML="<span style='color: #333'>"+this.display_array[i].title2+"</span>";
if(title3!=null){
title3.innerHTML="<span style='color: #666'>"+this.display_array[i].title3+"</span>";
}
imgUrl=document.getElementById("href_"+this.root_div_id+"_"+i);
imgUrl.href=this.display_array[i].imageUrl;
maindiv=document.getElementById("div_"+this.root_div_id+"_"+i);
maindiv_alternate=document.getElementById("div_"+this.root_div_id+"_"+i+"_alternate");
if(this.display_array[i].is_dummy!=false){
maindiv.style.display="none";
maindiv_alternate.style.display="";
}else{
maindiv.style.display="";
maindiv_alternate.style.display="none";
}
}
this.printPageNumbers();
}
function imageBrowserPrefetchNextPrevImages(){
prev_index=this.decrementIndex(this.head_index);
this.images[prev_index].loadImage();
next_index=this.incrementIndex(this.tail_index);
this.images[next_index].loadImage();
}
function imageBrowserPrintPageNumbers(){
var counter_index=this.head_index;
for(var i=0;i<this.display_array.length;i++){
counter_index=this.incrementIndex(counter_index);
}
if(counter_index==0){
counter_index=this.real_images_count;
}
counter_div=document.getElementById("counter_"+this.root_div_id);
if(counter_div){
counter_div.innerHTML="["+(this.head_index+1)+" - "+counter_index+" of "+this.real_images_count+"]";
}
}
function ytImage(imgSrc,imgUrl,title1,title1Url,title2,title2Url,title3,is_dummy){
this.smartImage=new smartImageObject(imgSrc,false);
this.imageUrl=imgUrl;
this.is_dummy=is_dummy;
this.title1_full=title1.replace("'","&quot");
this.title2_full=title2.replace("'","&quot");
var max_len=20;
if(title1.length>max_len)
title1=title1.substring(0,max_len-3)+"..."
if(title2.length>max_len)
title2=title2.substring(0,max_len-3)+"..."
if(title3.length>max_len)
title3=title3.substring(0,max_len-3)+"..."
this.title3=title3
if(title1Url.length>0)
this.title1="<a href='"+title1Url+"' title='"+this.title1_full+"'>"+title1+"</a>";
else
this.title1=title1;
if(title2Url.length>0)
this.title2="<a class='dg' href='"+title2Url+"' title='"+this.title2_full+"'>"+title2+"</a>";
else
this.title2=title2;
this.getImage=ytGetImageFromSmartImage;
this.isImageLoaded=ytIsImageLoaded;
this.loadImage=ytLoadImage
}
function customYtImage(imgSrc,imgUrl,title1,title2,title3,is_dummy){
this.smartImage=new smartImageObject(imgSrc,false);
this.imageUrl=imgUrl;
this.is_dummy=is_dummy;
this.title1=title1;
this.title2=title2;
this.title3=title3;
this.getImage=ytGetImageFromSmartImage;
this.isImageLoaded=ytIsImageLoaded;
this.loadImage=ytLoadImage
}
function ytGetImageFromSmartImage(){
return this.smartImage.getImage();
}
function ytIsImageLoaded(){
return this.smartImage.isImageLoaded();
}
function ytLoadImage(){
if(!this.isImageLoaded()){
}
}
function smartImageObject(imgURI,preload){
this.URI=imgURI;
this.imageobj=null;
this.load=smartImageObjectLoad;
this.getImage=smartImageObjectGetImage;
this.isImageLoaded=smartImageIsImageLoaded;
if(preload){
}
}
function smartImageIsImageLoaded(){
if(this.imageobj!=null)
return true;
else
return false;
}
function smartImageObjectLoad(){
this.imageobj=new Image();
this.imageobj.src=this.URI;
}
function smartImageObjectGetImage(){
if(this.imageobj){
return this.imageobj.src;
}else{
return this.URI;
}
}
function opacity(id,opacStart,opacEnd,millisec){
var speed=Math.round(millisec/ 100);
var timer=0;
if(opacStart>opacEnd){
for(i=opacStart;i>=opacEnd;i--){
setTimeout("changeOpac("+i+",'"+id+"')",(timer*speed));
timer++;
}
}else if(opacStart<opacEnd){
for(i=opacStart;i<=opacEnd;i++)
{
setTimeout("changeOpac("+i+",'"+id+"')",(timer*speed));
timer++;
}
}
}
function changeOpac(opacity,id){
var object=document.getElementById(id).style;
object.opacity=(opacity/ 100);
object.MozOpacity=(opacity/ 100);
object.KhtmlOpacity=(opacity/ 100);
object.filter="alpha(opacity="+opacity+")";
}
function fadeOldImage(id,numColumns){
for(i=0;i<numColumns;i++){
tempDiv="img_"+id+"_"+i;
changeOpac(25,tempDiv);
}
}
function checkRef(ref){
var a=ref.split('/',3);
if(a.length>=3&&a[0]=='http:'&&a[1]==''){
a=a[2].split('.').reverse();
if(a.length<2)return false;
var d0=a[0];
var d1=a[1];
if(d1=='youtube'&&d0=='com')return true;
if(d1=='google')return true;
if(a.length<3)return false;
if(a[2]=='google'&&((d1=='co'&&d0=='uk')||(d1=='com'&&d0=='au')))return true;
}
return false;
}
if(window!=window.top){
var ref=document.referrer;
if(!checkRef(ref)){
var data='location='+encodeURIComponent(ref)+'&self='+encodeURIComponent(window.location.href);
postUrl('/roger_rabbit',data,true,processReqChange);
}
}
function processReqChange(req){
if(req.readyState==4){
if(req.status==200){
if(req.responseText=='block'){
window.top.location.href='/';
}
}
}
}
if(yt&&yt.UserPrefs){
yt.UserPrefs.Flags={
FLAG_SAFE_SEARCH:0x1,
FLAG_GRID_VIEW_SEARCH_RESULTS:0x2,
FLAG_EMBED_INCLUDE_RELATED_VIDEOS:0x4,
FLAG_EMBED_SHOW_BORDER:0x8,
FLAG_GRID_VIEW_VIDEOS_AND_CHANNELS:0x10,
FLAG_WATCH_EXPAND_ABOUT_PANEL:0x20,
FLAG_WATCH_EXPAND_MOREFROM_PANEL:0x40,
FLAG_WATCH_COLLAPSE_RELATED_PANEL:0x80,
FLAG_WATCH_COLLAPSE_PLAYLIST_PANEL:0x100,
FLAG_WATCH_COLLAPSE_QUICKLIST_PANEL:0x200,
FLAG_WATCH_EXPAND_ALSOWATCHING_PANEL:0x400,
FLAG_WATCH_EXPAND_RESERVED:0x800,
FLAG_STATMODULES_INBOX_EXPANDED:0x1000,
FLAG_STATMODULES_ABOUTYOU_EXPANDED:0x2000,
FLAG_STATMODULES_ABOUTVIDEOS_EXPANDED:0x4000
}
}
function dynamic_append_session_token(form_obj,session_token)
{
var token=undefined;
if(session_token==null)
{
token=gXSRF_token;
}
else
{
token=session_token;
}
var token_elem=document.createElement('input');
token_elem.setAttribute('name',gXSRF_field_name);
token_elem.setAttribute('type','hidden');
token_elem.setAttribute('value',token);
form_obj.appendChild(token_elem);
}
session_excluded_forms=new Array();
function populate_session_token()
{
for(var form_pos=0;form_pos<document.forms.length;form_pos++)
{
var skip=false;
for(var exclude_pos=0;
exclude_pos<session_excluded_forms.length;
exclude_pos++)
{
if(document.forms[form_pos].name
==session_excluded_forms[exclude_pos])
{
skip=true;
}
}
var aform=document.forms[form_pos];
if((aform.method.toLowerCase()=='post')&&(skip==false))
{
var found=false;
for(var elem_pos=0;elem_pos<aform.elements.length;
elem_pos++)
{
var form_field=aform.elements[elem_pos];
if(form_field.name==gXSRF_field_name)
{
found=true;
}
}
if(!found)
{
dynamic_append_session_token(aform);
}
}
}
}
