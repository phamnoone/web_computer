/*==============================================================================
================================================================s
================================================================================*/
var Utility={trim:function(str){return str.replace(/^\s+/,'').replace(/\s+$/,'');},isArray:function(value){return value.length!="undefined";},getDataInTagName:function(data,tagName){var result='';if(data!=''){var dataSplit=data.split("[/"+tagName+"]");if(dataSplit.length>1){dataSplit=dataSplit[0].split('['+tagName+']');if(dataSplit.length>1){result=dataSplit[1];if(tagName=="template"){var tmp;var template=result;result=['',''];if(template!=''){template=template.split("[/script]");var len=template.length;for(var i=0;i<len;i++){tmp=template[i].split("[script]");result[0]+=tmp[0];if(tmp[1])result[1]+=tmp[1];};};};};};};return result;},checkEmailAddress:function(field){if(!field)return true;var goodEmail=field.value.search(/^([-\w][-\.\w]*?)?[-\w]@([-!#\$%&*+\\\/=?\w^`{|}~]+\.)+[a-zA-Z]{2,6}$/gi);if(goodEmail!=-1)return true;else{alert("Địa chỉ E-mail không hợp lệ, vui lòng kiểm tra lại.");field.focus();field.select();return false;};},checkConfirm_password:function(f_password,f_confirm_password){if(f_password.value.length<5){alert("Mật khẩu phải nhiều hơn 4 ký tự, vui lòng kiểm tra lại.");f_password.focus();f_password.select();return false;};if(f_confirm_password.value!=f_password.value){alert("Mật khẩu xác nhận không đúng, vui lòng kiểm tra lại.");f_confirm_password.focus();f_confirm_password.select();return false;};return true;},checkAccount:function(f_username,f_password,f_confirm_password){if(f_password.value.indexOf(' ')!=-1||f_password.value.indexOf('\\')!=-1){alert("Mật khẩu không được chứa khoản trắng hoặc ký tự '\\', vui lòng nhập lại.");f_password.focus();f_password.select();return false;};if(f_username.value.indexOf(' ')!=-1||f_username.value.indexOf('\\')!=-1){alert("Tên đăng nhập không được chứa khoản trắng hoặc ký tự '\\', vui lòng nhập lại.");f_username.focus();f_username.select();return false;};if((f_username.value.length<3)&&f_username.type!="hidden"){alert("Tên đăng nhập phải nhiều hơn 2 ký tự, vui lòng kiểm tra lại.");f_username.focus();f_username.select();return false;};return this.checkConfirm_password(f_password,f_confirm_password);},isEmpty:function(field,msg){var str=field.value;if(str!="")while(str.charAt(0)==" ")str=str.substr(1,str.length);field.value=str;if(str==""){if(msg)alert(msg);field.focus();field.select();return true;}else return false;},isNull:function(value){var str=value;if(str!="")while(str.charAt(0)==" ")str=str.substr(1,str.length);return str=="";},inputDate:function(field){var str;this.inputMask(field,'0123456789/');str=field.value;if(event.keyCode!=8&&event.keyCode!=35&&event.keyCode!=36&&event.keyCode!=37&&event.keyCode!=39){if(str.length==2||str.length==5)str=str+"/";field.value=str;};return;},inputMask:function(input,mask){var index=0;var len=input.value.length;while((index<len)&&(len!=0))if(mask.indexOf(input.value.charAt(index))==-1){if(index==len-1)input.value=input.value.substring(0,len-1);else if(index==0)input.value=input.value.substring(1,len);else input.value=input.value.substring(0,index)+input.value.substring(index+1,len);index=0;len=input.value.length;}else index++;},inputNotMask:function(input,mask){var index=0;var len=input.value.length;while((index<len)&&(len!=0))if(mask.indexOf(input.value.charAt(index))!=-1){if(index==len-1)input.value=input.value.substring(0,len-1);else if(index==0)input.value=input.value.substring(1,len);else input.value=input.value.substring(0,index)+input.value.substring(index+1,len);index=0;len=input.value.length;}else index++;},countChars:function(textField,countField,maxLen){if(textField!=null&&textField.value!=null){if(textField.value.length>maxLen)textField.value=textField.value.substring(0,maxLen);else countField.innerHTML=maxLen-textField.value.length;};},checkAll:function(checkboxes,flag){var i;var len=checkboxes.length;if(typeof(len)=="undefined"){if(checkboxes.disabled==false)checkboxes.checked=flag;}else{for(i=0;i<len;i++)if(checkboxes[i].disabled==false)checkboxes[i].checked=flag;};},removeItemFirst:function(objSelect){var opts=objSelect.getElementsByTagName("option");if(objSelect.options[0].value==-1){objSelect.removeChild(opts[0]);objSelect.options[0].selected;};},clearTextbox:function(objTextbox,value){if(objTextbox.value==value)objTextbox.value='';},hasCheck:function(frmname,selectname,fieldaction,action,msg1,msg2){var i=0;var len=document.forms[frmname].elements[selectname].length;if(typeof(len)!='undefined')while(i<len&&!document.forms[frmname].elements[selectname][i].checked)i++;else{if(!document.forms[frmname].elements[selectname].checked)len=0;};if(i==len){alert(msg1);return false;}else{if(msg2!=''){if(confirm(msg2)){if(document.forms[frmname].elements[fieldaction])document.forms[frmname].elements[fieldaction].value=action;return true;}else return false;}else{if(document.forms[frmname].elements[fieldaction])document.forms[frmname].elements[fieldaction].value=action;return true;}};},getTagValue:function(tagName,data){var tag;if(this.isNull(data))return;tag=data.split('[/'+tagName+']');if(tag.length==1)return false;tag=tag[0].split('['+tagName+']');return((tag.length==1)?false:tag[1]);},showAlert:function(errorCode,msg,destID){var icon=document.getElementById?document.getElementById('iconMsg'):(document.all?document.all['iconMsg']:null);var title=document.getElementById?document.getElementById('titleMsg'):(document.all?document.all['titleMsg']:null);errorCode=parseInt(errorCode);switch(errorCode){case 1:case 2:if(icon)icon.src=images_dir+'/msgInfo.gif';if(title)title.innerHTML='Thông báo';break;case 3:case 4:if(icon)icon.src=images_dir+'/msgError.gif';if(title)title.innerHTML='Lỗi';break;default:if(icon)icon.src=images_dir+'/msgWarning.gif';if(title)title.innerHTML='Cảnh báo';break;};destID=document.getElementById?document.getElementById(destID):(document.all?document.all[destID]:null);if(destID){var divMsg=document.getElementById?document.getElementById('contentMsg'):(document.all?document.all['contentMsg']:null);divMsg.innerHTML=msg;destID.style.display='';};},numberFormat:function(number,decimals,dec_point){var m;var p;var tmp;var result='';number=number.toString();p=number.split('.');m=((dec_point==',')?'.':',');number=parseInt(p[0]);if(number>=1000){while(number!=0){tmp=number%1000;number=parseInt(number/1000);if(number>0){if(tmp<10)tmp='00'+tmp;else if(tmp>=10&&tmp<100)tmp='0'+tmp;}result=dec_point+tmp+result;}result=result.substring(1);}else result=number;if(p.length==2){if(p[1].length>decimals)p[1]=p[1].substring(0,decimals);result+=m+p[1];}return result;},convertArrToStr:function(obj){var result='';var element=$(obj);var len=element.length;var _tmp=((typeof(len)!='undefined')?element[0]:element);var isType=_tmp.getAttribute('type');isType=isType.toLowerCase();if(typeof(len)!='undefined'){for(var i=0;i<len;i++)if(isType=='checkbox'){if(element[i].checked)result+='_'+element[i].value;}else result+='_'+element[i].name+':'+element[i].value;}else{if(isType=='checkbox'){if(element.checked)result+='_'+element.value;}else result+='_'+element.name+':'+element.value;};return result.substr(1);},navClick:function(id,b){if(id<0)return;var i=0;var found=false;var len=b.length;if(typeof(len)=='undefined'){if(b.style.display=='')b.style.display='none';else b.style.display='';return;};while((i<len)&&!found){if((b[i].style.display=='')&&(i!=id)){b[i].style.display='none';found=true;}else i++;};if(b[id].style.display=='')b[id].style.display='none';else b[id].style.display='';}};