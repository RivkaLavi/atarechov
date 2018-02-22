/**
 * Javo-Footer
 */
!function(t){"use strict";t("body").on("click",".javo-fileupload",function(e){e.preventDefault();var i,a=t(this);return i?void i.open():(i=wp.media.frames.file_frame=wp.media({title:a.data("title"),multiple:a.data("multiple")}),i.on("select",function(){var e;if(a.data("multiple")){var s=i.state().get("selection");s.map(function(e){var i="";e=e.toJSON(),a.hasClass("other")?(i+='<li class="list-group-item jvbpd_dim_div">',i+=e.filename,i+="<input type='hidden' name='jvbpd_attach_other[]' value='"+e.id+"'>",i+="<input type='button' value='Delete' class='btn btn-danger btn-sm jvbpd_detail_image_del'>",i+="</li>",t(a.data("preview")).append(i)):(i+="<div class='col-md-3 jvbpd_dim_div'>",i+="		<div class='col-md-12' style='overflow:hidden;'><img src='"+e.url+"' style='height:120px;'></div>",i+="		<div class='row'><div class='col-md-12' align='center'>",i+="			<input type='hidden' name='jvbpd_dim_detail[]' value='"+e.id+"'>",i+="			<input type='button' value='Delete' class='btn btn-danger btn-xs jvbpd_detail_image_del'>",i+="		</div>",i+="</div>",t(a.data("preview")).append(i))}),t(window).trigger("update_detail_image")}else e=i.state().get("selection").first().toJSON(),t(a.data("input")).val(e.id),t(a.data("preview")).prop("src",e.url),t(window).trigger("update_featured_image")}),void i.open())}).on("click",".javo-fileupload-cancel",function(){t(t(this).data("preview")).prop("src",""),t(t(this).data("input")).prop("value","")}).on("click",".jvbpd_detail_image_del",function(){var e=t(this).data("id");t(this).parents(".jvbpd_dim_div").remove(),t("input[name^='jvbpd_dim_detail'][value='"+e+"']").remove(),t(window).trigger("update_detail_image")}),jQuery(".javo-color-picker").each(function(e,i){t(this).spectrum({clickoutFiresChange:!0,showInitial:!0,preferredFormat:"hex",showInput:!0,chooseText:"Select"})});var e=function(t){this.selector=t,this.init()};e.prototype={constructor:e,init:function(){var e=this;t(document).on("jvbpd_sns:init",function(){t(e.selector).off("click",e.share()),t(e.selector).on("click",e.share())}).trigger("jvbpd_sns:init")},share:function(){return function(e){e.preventDefault();var i=new Array;t(this).hasClass("sns-twitter")&&(i.push("http://twitter.com/share"),i.push("?url="+t(this).data("url")),i.push("&text="+t(this).data("title"))),t(this).hasClass("sns-facebook")&&(i.push("http://www.facebook.com/sharer.php"),i.push("?u="+t(this).data("url")),i.push("&t="+t(this).data("title"))),t(this).hasClass("sns-google")&&(i.push("https://plus.google.com/share"),i.push("?url="+t(this).data("url"))),window.open(i.join(""),"")}}},new e("i.sns-facebook, i.sns-twitter, i.sns-google, .javo-share"),"undefined"!=typeof t.fn.tooltip&&t(".javo-tooltip").each(function(e,i){var a={};"undefined"!=typeof t(this).data("direction")&&(a.placement=t(this).data("direction")),t(this).tooltip(a)}),t(window).load(function(){t(this).trigger("resize")})}(jQuery);

/**
 * Javo-Widget
 */
(function($)
{"use strict";var anchor=$("#javo-doc-top-level-menu li.javo-wg-menu-button-login-wrap a");var original_str=anchor.html();var mobile_str=anchor.data('mobile-icon');$(window).on('resize',function()
{if($("body").hasClass("mobile"))
{anchor.html("<i class='"+ mobile_str+"'></i>");}else{anchor.html(original_str);}});var dropdown_element=$("#javo-wpml-switcher");dropdown_element.on('mouseenter',function(){$('div > ul',this).clearQueue().slideDown('fast');}).on('mouseleave',function(){$('div > ul',this).clearQueue().slideUp('fast');});})(jQuery);

/**
 * Javo-MessageBox
 */
;(function($){"use strict";var jvbpd_message_box_func={init:function(attr,callback)
{this.DEFAULT={content:'No Message',delay:500000,close:true,button:"OK",classes:'',blur_close:false}
this.attr=$.extend(true,{},this.DEFAULT,attr);this.callback=callback;this.button='<div class="text-center">';this.button+='<input type="button" id="javo-alert-box-close" class="btn btn-dark btn-sm" value="'+ this.attr.button+'">'
this.button+='</div>';this.el='#javo-alert-box'
this.el_bg='#javo-alert-box-bg';this.el_button='#javo-alert-box-close';if(typeof window.jvbpd_mbf_TimeID!="undefined")
{$(this.el_bg+", "+ this.el).remove();clearInterval(window.jvbpd_mbf_TimeID);window.jvbpd_mbf_TimeID=null;}
this.open(this.attr);$(document).on('click',this.el_button,this.close);if(typeof this.attr.close_trigger!="undefined")
$(document).on('click',this.attr.close_trigger,this.close);if(this.attr.blur_close)
$(document).on('click',this.el_bg,this.close);},open:function(attr)
{var obj=lynk_message_box_func;$(document).find('body').prepend('<div id="javo-alert-box" class="'+ attr.classes+'" tabindex="-1"></div><div id="javo-alert-box-bg"></div>');$(this.el).html('<h5>'+ attr.content+'</h5>').css({marginLeft:-($(this.el).outerWidth(true))/ 2 })
.animate({marginTop:-($(this.el).outerHeight(true))/ 2 }, 300, function(){
window.jvbpd_mbf_TimeID=setInterval(obj.close,attr.delay);});if(attr.close){$(this.el).append(this.button);}},close:function(e)
{if(typeof e!='undefined'){e.preventDefault();}
var obj=lynk_message_box_func;if(typeof window.jvbpd_mbf_TimeID!='undefined')
{clearInterval(window.jvbpd_mbf_TimeID);obj.nTimeID==null;}
$(obj.el_bg).fadeOut('fast',function(){$(this).remove();});$(obj.el).fadeOut('fast',function(){$(this).remove();});if(typeof obj.callback=='function'){obj.callback();};}};$.jvbpd_msg=function(attr,callback){lynk_message_box_func.init(attr,callback);}})(jQuery);