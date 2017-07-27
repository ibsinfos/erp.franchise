<style>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
* CometChat 
* Copyright (c) 2014 Inscripts - support@cometchat.com | http://www.cometchat.com | http://www.inscripts.com
*/

html {
	overflow-y: -moz-scrollbars-vertical;
}

body {
	padding-bottom: 30px;
}

#cometchat {
	font-size: normal;
	font-size-adjust: none;
	font-style: normal;
	font-variant: normal;
	font-weight: normal;
	line-height: normal;
	z-index: 100000;	
	direction: <?php echo $dir;?>;
}

#cometchat_base, #cometchat_base *, .cometchat_chatboxmessage {
	overflow: visible;
}

#cometchat * {
        box-sizing: content-box !important;
        -moz-box-sizing: content-box !important;
        -o-box-sizing: content-box !important;
}

#cometchat_hidden * {
        box-sizing: content-box !important;
        -moz-box-sizing: content-box !important;
        -o-box-sizing: content-box !important;
}

#cometchat *:after, #cometchat *:before { 
        content: none !important;
}

#cometchat_base {
        margin-left: 1px;
	bottom: 0px;        
	display: block;
	font-family: <?php echo $themeSettings['bar_font_family'];?>;
	font-size: <?php echo $themeSettings['bar_font_size'];?>;
	height: 28px;
	left: 15px;
	position: fixed;
	z-index: 100000;
}

#cometchat_chatboxes, #cometchat_chatboxes_popup {
	float: right;
	height: 100%;
	overflow: hidden;
}

#cometchat_chatboxes_wide {
	height: 100%;
	width: 0px;
	overflow: hidden;       
}

#cometchat_chatbox_left {
		width: 40px;
        margin-right: 5px;
        background: <?php echo $themeSettings['bar_background'];?>;
        background: -moz-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%, ,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $themeSettings['bar_gradient_start'];?>), color-stop(44%,<?php echo $themeSettings['bar_gradient_center'];?>), color-stop(100%,<?php echo $themeSettings['bar_gradient_end'];?>));
        background: -webkit-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -o-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -ms-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: linear-gradient(to bottom,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $themeSettings["bar_gradient_start"];?>', endColorstr='<?php echo $themeSettings["bar_gradient_end"];?>',GradientType=0 );
        border: 1px solid <?php echo $themeSettings['bar_border'];?> !important;
        -webkit-border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom: 0 !important;
        -webkit-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        -moz-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        color: #333;
        display: none;
        font-weight: bold;
        outline: none;
        padding: 5px;
        cursor: pointer;
        position: relative;
        z-index: 10001;
}

.cometchat_chatbox_lr_mouseover {
	background: #fafbfb !important;
}

/* Add display:none for below to hide options and whos online tab */

#cometchat_optionsbutton {
	float: right;
        width: 20px;
        height: auto;
        line-height: normal;
        padding: 0 !important;
        border: 0;
        border-top: 1px solid #D1D2D4;
        background-color: #FFF !important;
}

#cometchat_optionsbutton.cometchat_tabclick {
        border-top-color: #E9EAED !important;
        background: #E9EAED !important;
        border-bottom: none !important;
        width: 20px;
        padding-left: 7px !important;
        padding-top: 1px !important;
}

#cometchat_userstab {
	bottom: 0;
        direction: ltr;
        position: fixed;
        right: 0;
        z-index: 3000;
        margin: 0 15px 0 0;
        background: <?php echo $themeSettings['bar_background'];?>;
        background: -moz-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%, ,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $themeSettings['bar_gradient_start'];?>), color-stop(44%,<?php echo $themeSettings['bar_gradient_center'];?>), color-stop(100%,<?php echo $themeSettings['bar_gradient_end'];?>));
        background: -webkit-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -o-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -ms-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: linear-gradient(to bottom,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $themeSettings["bar_gradient_start"];?>', endColorstr='<?php echo $themeSettings["bar_gradient_end"];?>',GradientType=0 );
        border: 1px solid #AAB1C0 !important;
        -webkit-border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom: 0 !important;
        color: #333 !important;
        display: block;
        font-weight: bold;
        height: 16px;
        outline: none;
        padding: 6px 4px 5px !important;
        width: 200px !important;
}

.cometchat_userstabclick {
	display: none !important;
}

.cometchat_closebox {
	font-size: 21px;
	float: <?php echo $right;?>;
	height: 16px;
        line-height: 17px;
	width: 13px;
	cursor: pointer;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
	filter: alpha(opacity=70);
	-moz-opacity: 0.7;
	-khtml-opacity: 0.7;
	opacity: 0.7;
}

.cometchat_maxwindow {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: -3px  -1175px;
	float: <?php echo $right;?>;
	height: 16px;
        width: 16px;
	cursor: pointer;
        margin-right: 2px;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
	filter: alpha(opacity=50);
	-moz-opacity: 0.5;
	-khtml-opacity: 0.5;
	opacity: 0.5;
}

.cometchat_popwindow {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: -1px -1112px;
	float: <?php echo $right;?>;	
	cursor: pointer;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
	filter: alpha(opacity=50);
	-moz-opacity: 0.5;
	-khtml-opacity: 0.5;
	opacity: 0.5;
        height: 16px;
        width: 16px;
        margin-right: 2px;
}

.cometchat_closebox:hover , .cometchat_maxwindow:hover , .cometchat_popwindow:hover{
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	-moz-opacity: 1;
	-khtml-opacity: 1;
	opacity: 1;
}

.cometchat_closebox_bottom {
	float: right;
	height: 15px;	
	width: 15px;
        font-size: 20px;
        margin-top: 2px;
        color: #8D919A;
        visibility: hidden;
}

.cometchat_closebox_bottomhover {
	color: #6E7077 !important;
}

.cometchat_name {
	cursor: pointer;
	color: <?php echo $themeSettings['tab_title_color'];?>;
	float: <?php echo $left;?>;
	font-family: inherit;
	font-size: inherit;
        font-weight: bold;
        padding-left: 2px;
        line-height: 15px;
}

.cometchat_name:hover {
    text-decoration: underline;
}

#cometchat_chatbox_buttons {
	float: right;
}

.cometchat_tabmouseover {
	color: <?php echo $themeSettings['tab_title_color'];?> !important;
	background-color: <?php echo $themeSettings['tab_title_background'];?> !important;
}

.cometchat_tabmouseovertext {
	text-decoration: none;
}

.cometchat_statusinputs {
	border-top: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	margin-top: 10px;
	padding-left: 5px;
	padding-top: 4px;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
}

#cometchat_chatboxes_wide .cometchat_tab {
  	margin-right: 7px;
        background: <?php echo $themeSettings['bar_background'];?>;
        background: -moz-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%, ,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $themeSettings['bar_gradient_start'];?>), color-stop(44%,<?php echo $themeSettings['bar_gradient_center'];?>), color-stop(100%,<?php echo $themeSettings['bar_gradient_end'];?>));
        background: -webkit-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -o-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: -ms-linear-gradient(top,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        background: linear-gradient(to bottom,  <?php echo $themeSettings['bar_gradient_start'];?> 0%,<?php echo $themeSettings['bar_gradient_center'];?> 44%,<?php echo $themeSettings['bar_gradient_end'];?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $themeSettings["bar_gradient_start"];?>', endColorstr='<?php echo $themeSettings["bar_gradient_end"];?>',GradientType=0 );
        border: 1px solid #AAB1C0 !important;
        -webkit-border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom: 0 !important;
        -webkit-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        -moz-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        color: #333;
        display: block;
        font-weight: bold;
        height: 167px;
        outline: none;
        padding: 5px;
}

#cometchat_chatboxes_wide .cometchat_tab:hover {
    background-color: #F6F7F8 !important;
    color: #333 !important;
}

#cometchat_chatboxes_wide .cometchat_tab:hover .cometchat_closebox_bottom {
    visibility: visible;
}

.cometchat_tab {
	background-color: <?php echo $themeSettings['tab_title_background'];?>;
	border-top: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
	border-left: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
	color: <?php echo $themeSettings['tab_title_color'];?>;
	cursor: pointer;
	float: right;
	font-weight: normal;
	height: 35px;
	line-height: 1.2em;
	padding-left: 10px;
	padding-top: 10px;	
	font-family: <?php echo $themeSettings['bar_font_family'];?>;
	font-size: <?php echo $themeSettings['bar_font_size'];?>;
	width: 148px;
}

.cometchat_tabclick {
	background-color: <?php echo $themeSettings['tab_background'];?> !important;
	border-top: 0px !important;
	border-bottom: 1px solid <?php echo $themeSettings['tab_border'];?> !important;
	border-left: 1px solid <?php echo $themeSettings['tab_border'];?> !important;
	border-right: 0 !important;
	color: <?php echo $themeSettings['tab_color'];?> !important;
	padding-bottom: 1px;
	padding-top: 10px !important;	
	text-decoration: none;
}

.cometchat_usertabclick {
	padding-left: 9px !important;	
	width: <?php echo ($chatboxWidth-17).'px';?> !important;
}

.cometchat_tabpopup {
	background-color: <?php echo $themeSettings['tab_background'];?>;
	font-family: <?php echo $themeSettings['tab_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size'];?>;
	position: fixed;	
	width: <?php echo $chatboxWidth.'px';?>;
	z-index: 100001;
	bottom: 35px;
        -webkit-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        -moz-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
        box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>; 
}

#cometchat_userstab_popup {
	width: 100%;
        position: absolute;
        top: 0px;
        bottom: 25px;
        background-color: #E9EAED;
        overflow: hidden;
        -webkit-box-shadow: none !important;
	-moz-box-shadow: none !important;
	box-shadow: none !important;
}

#cometchat_userstab_popup:after {
        content: '';
        display: block;
        height: 2px;
        position: absolute;
        width: 100%;
        z-index: 99;
        background-color: rgba(0, 0, 0, 0.07);
}
#cometchat_optionsbutton_popup {
	width: 205px;
        bottom: 25px;
        -webkit-box-shadow: none !important;
	-moz-box-shadow: none !important;
	box-shadow: none !important;
        right: <?php echo $barPadding.'px';?>;
}

.cometchat_tabopen {
	display: block !important;
}

.cometchat_tabtitle {
	background-color: <?php echo $themeSettings['tab_title_background'];?>;
        background: -moz-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%, <?php echo $themeSettings['tab_title_gradient_center'];?> 44%, <?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $themeSettings['tab_title_gradient_start'];?>), color-stop(44%,<?php echo $themeSettings['tab_title_gradient_center'];?>), color-stop(100%,<?php echo $themeSettings['tab_title_gradient_end'];?>));
        background: -webkit-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -o-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -ms-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: linear-gradient(to bottom, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $themeSettings["tab_title_gradient_start"];?>', endColorstr='<?php echo $themeSettings["tab_title_gradient_end"];?>',GradientType=0 );
        border: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
        -webkit-border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        cursor: pointer;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size'];?>;
	font-weight: normal;
	color: <?php echo $themeSettings['tab_title_color'];?>;
        padding: 6px 7px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        line-height: 16px;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=90)";
	filter: alpha(opacity=90);
	-moz-opacity: 0.9;
	-khtml-opacity: 0.9;
	opacity: 0.9;
}

.cometchat_tabtitle:hover, .cometchat_userstabtitle:hover, .cometchat_new_message_titlebar {
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	-moz-opacity: 1;
	-khtml-opacity: 1;
	opacity: 1;
}

.cometchat_userstabtitle {
	color: <?php echo $themeSettings['tab_title_color'];?>;
	cursor: pointer;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size'];?>;
	font-weight: normal;
	padding: 6px 8px;
        background: <?php echo $themeSettings['tab_title_background'];?>;
        background: -moz-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%, <?php echo $themeSettings['tab_title_gradient_center'];?> 44%, <?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $themeSettings['tab_title_gradient_start'];?>), color-stop(44%,<?php echo $themeSettings['tab_title_gradient_center'];?>), color-stop(100%,<?php echo $themeSettings['tab_title_gradient_end'];?>));
        background: -webkit-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -o-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -ms-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: linear-gradient(to bottom, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $themeSettings["tab_title_gradient_start"];?>', endColorstr='<?php echo $themeSettings["tab_title_gradient_end"];?>',GradientType=0 );
        border: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
         -webkit-border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=90)";
	filter: alpha(opacity=90);
	-moz-opacity: 0.9;
	-khtml-opacity: 0.9;
	opacity: 0.9;
}

.cometchat_userstabtitle div {
	color: <?php echo $themeSettings['tab_title_color'];?>;
}

.cometchat_userstabtitletext {
	float: <?php echo $left;?>;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
        font-weight: bold;
}

.cometchat_tabsubtitle {
	background-color: <?php echo $themeSettings['tab_sub_background'];?>;
	border-bottom: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	border-left: 1px solid <?php echo $themeSettings['tab_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['tab_border'];?>;
	color: <?php echo $themeSettings['tab_sub_color'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
	line-height: 1.3em !important;
	padding: 5px 0;	
        text-align: center;
}

.cometchat_pluginsicon {
        background: url(themes/<?php echo $theme;?>/images/cometchat_plugin_icon.png) no-repeat top left;
	cursor: pointer;
	float: <?php echo $left;?>;
        margin-right: 6px;
        height: 16px;
        width: 16px;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
	filter: alpha(opacity=70);
	-moz-opacity: 0.7;
	-khtml-opacity: 0.7;
	opacity: 0.7;
}

.cometchat_pluginsicon:hover {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	-moz-opacity: 1;
	-khtml-opacity: 1;
	opacity: 1;
}

.cometchat_pluginsicon_divider {
	margin-<?php echo $right;?>: 5px;	
}

.cometchat_tabcontent {
	color: <?php echo $themeSettings['tab_color'];?>;
        border: 1px solid <?php echo $themeSettings['tab_border'];?>;
        border-width: 0 1px;
        background-color: #E9EAED;
	line-height: 1.3em !important;
	overflow: hidden;
	padding-bottom: 1px;
	font-family: inherit;
	font-size: inherit;
        padding: 0;
}

.cometchat_tabcontenttext {
	white-space: pre-wrap;
	white-space: -moz-pre-wrap !important;
	white-space: -pre-wrap;
	white-space: -o-pre-wrap;
	word-wrap: break-word;
	white-space: pre;
	white-space: -hp-pre-wrap;
	white-space: pre-line;
	height: <?php echo ($chatboxHeight+10).'px';?> !important;
	overflow-x: hidden;
	overflow-y: auto;
	padding: 0px;
        color: inherit;
	font-family: <?php echo $themeSettings['tab_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size'];?>;
	text-align: <?php echo $left;?>;
	width: <?php echo ($chatboxWidth).'px';?> !important;
        background: <?php echo $themeSettings['tab_background'];?>;
}

#cometchat_userscontent {
	height: 100%;
	line-height: 100% !important;
	width: 100% !important;
	overflow-x: hidden;
	overflow-y: auto;
}

.cometchat_tabcontentinput {
	border: 0px;
	border-top: 1px solid <?php echo $themeSettings['tab_border_lighter'];?>;
        outline: none;
	padding: 4px 5px 3px 4px;
        overflow: hidden;
        background: #FFF;
}

.cometchat_textarea {
	border: none !important;
	color: <?php echo $themeSettings['tab_color_self'];?> !important;
	float: <?php echo $left;?>;
	font-family: <?php echo $themeSettings['tab_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size'];?>;
	height: 16px;
	outline: none;
	overflow: hidden;
	padding: 0px;
	resize: none;	
        width: <?php echo($chatboxWidth-30).'px';?>;    
        padding-top: 2px;
        line-height:normal !important;
}

.cometchat_textarea:focus {
	border: none !important;
}

.cometchat_userlist_hover {
	background-color: <?php echo $themeSettings['tab_title_backgroud_light'];?> !important;
	border-color: #D5D6D9 !important;
        text-decoration: none;
        -webkit-box-shadow: inset 2px 0 2px -2px #B2B9C9;
        -moz-box-shadow: inset 2px 0 2px -2px #B2B9C9;
        box-shadow: inset 2px 0 2px -2px #B2B9C9;
}

.cometchat_tooltip_content {
	background-color: <?php echo $themeSettings['tooltip_background'];?>;
        color: <?php echo $themeSettings['tooltip_color'];?>;
	font-family: <?php echo $themeSettings['tooltip_font_family'];?>;
	font-size: <?php echo $themeSettings['tooltip_font_size'];?>;
	padding: 5px;	
	white-space: nowrap;
	word-wrap: break-word;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
}

#cometchat_tooltip:after {
        border-left: 5px solid rgba(0, 0, 0, 0);
        border-right: 5px solid rgba(0, 0, 0, 0);
        border-top: 5px solid <?php echo $themeSettings['tooltip_background'];?>;
        bottom: 0;
        content: "";
        height: 0;
        position: absolute;
        right: 14px;
        width: 0;
}

.cometchat_userlist {
	cursor: pointer;
	height: 32px;
	line-height: 100%;	
	padding: 2px 8px 2px 5px;
        border-bottom: 1px solid rgba(0, 0, 0, 0);
        border-top: 1px solid rgba(0, 0, 0, 0);
        clear: both;
}

.cometchat_userscontentname {
	float: <?php echo $left;?>;
        line-height: 32px;
        padding-<?php echo $left;?>: 8px;
}

.cometchat_userscontentdot {
	background-position: 0px 2px;
	background-repeat: no-repeat;
	float: <?php echo $right;?>;
	height: 7px;
	margin: 5px 4px 4px 4px;
	width: 7px;
	-webkit-border-bottom-left-radius: 7px;
    -moz-border-radius-bottomleft: 7px;
    border-radius: 7px;
}

.cometchat_available {
  	background: #0F9D28 !important;
}

.cometchat_away {
	background: #FF921C !important;
}

.cometchat_busy {
	background: #FF1B29 !important;
}

.cometchat_offline {
	background: #8D8D8D !important;
}

#cometchat_tooltip {	
	display: none;
    padding-bottom: 4px;
	position: fixed;	
	z-index: 900001;
}

.cometchat_tooltip_left {
	background-position: left bottom !important;	
}

.cometchat_closebox_bottom_status {
	background-position: 0 -1px;
	background-repeat: no-repeat;
	float: left;
	height: 16px;	
	width: 16px;
}

.cometchat_icon {
        background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
        background-position: 0 -536px;
        height: 16px;
        width: 16px;
        float: <?php echo $left;?>;
}
.cometchat_tabalert {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0 -532px;
	background-repeat: no-repeat;
	background-size: auto auto;
	color: #ffffff;
	font-size: 8px;
	font-weight: bold;
	height: 18px;
	padding-top: 4px;
	position: absolute;
	text-align: center;
	width: 16px;
	text-shadow: none;
	top: -8px !important;
}


.cometchat_tabalertlr {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0 -28px;
        height: 18px;
        width: 20px;
        margin-right: 5px;
        float: left;
}

.cometchat_tabtext {
        margin-top: 2px;
        color: #333;
        font-weight: bold;
}
.cometchat_chatboxmessage {
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	word-break: break-word;
	overflow: hidden;
	position: relative;
        margin: 5px;
}

.cometchat_chatboxmessagefrom {
	font-weight: bold;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
        width:32px;
        float:left;
}

.cometchat_self {
        padding: 5px 4px;
        position: relative;
        text-align: right;
}

.cometchat_chatboxmessage a , .cometchat_chatboxmessage a > img {
        height: 32px;
        width: 32px;
}

.cometchat_self_avatar {
        margin-left: 0;
        margin-right: -1px !important;
}

.cometchat_chatboxmessagecontent {
        border: 1px solid rgba(0, 0, 0, 0.18);
        border-bottom-color: rgba(0, 0, 0, 0.29);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 0 #DCE0E6;
        -moz-box-shadow: 0 1px 0 #DCE0E6;
        box-shadow: 0 1px 0 #DCE0E6;
        color: <?php echo $themeSettings['tab_color_self'];?>;
        line-height: 1.28;
        margin: 5px 12px 5px 8px;
        min-height: 14px;
        padding: 4px 5px 3px 6px;
        position: relative;
        text-align: left;
        text-shadow: rgba(255, 255, 255, 0.5) 0 1px 0;
        white-space: pre-wrap;
        word-wrap: break-word;
        background-color: #F7F7F7;
        background-image: -webkit-gradient(linear, center bottom, center top, from(#F2F2F2), to(#FFF));
        background-image: -o-linear-gradient(bottom, #F2F2F2 0%, #FFF 100%);
        background-image: -moz-linear-gradient(bottom, #F2F2F2 0%, #FFF 100%);
        background-image: -webkit-linear-gradient(bottom, #F2F2F2 0%, #FFF 100%);
        background-image: -ms-linear-gradient(bottom, #F2F2F2 0%, #FFF 100%);
        background-image: linear-gradient(to bottom, #F2F2F2 0%, #FFF 100%);
        font-size: 12px;
        max-width: <?php echo ($chatboxWidth - 75).'px';?>;
}

.cometchat_statustextarea {
	border: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	color: <?php echo $themeSettings['tab_color'];?>;
	background: <?php echo $themeSettings['tab_background'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
	height: 42px;
	margin-bottom: 3px;
	margin-top: 3px;
	outline: none;
	overflow-x: hidden;
	overflow-y: auto;
	padding: 4px;
	resize: none;	
	width: 184px;
}

.cometchat_search {
	border: 1px solid <?php echo $themeSettings['tab_border_lighter'];?>;
	color: <?php echo $themeSettings['tab_color'];?>;
	background: <?php echo $themeSettings['tab_background'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size'];?>;
	outline: none;
	overflow-x: hidden;
	overflow-y: auto;
	padding: 4px;
	width: 100%;
}

.cometchat_search_light {
	color: <?php echo $themeSettings['tab_color_self'];?> !important;
}

.cometchat_optionsstatus {
	cursor: pointer;
	float: <?php echo $left;?>;
	padding-<?php echo $left;?>: 6px;
	padding-top: 1px;
	width: 67px;
}

.cometchat_optionsstatus2 {
	float: <?php echo $left;?>;
	padding-left: 10px;
}

.cometchat_tabsubtitle a {
	color: <?php echo $themeSettings['tab_sub_color'];?> !important;
}

.cometchat_tabcontent a {
	color: <?php echo $themeSettings['tab_link_color'];?> !important;
}

.cometchat_user_invisible {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 10px -890px !important;
	height: 16px;	
	width: 16px;
}

.cometchat_user_available {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0px -752px !important;
	height: 16px;	
	width: 16px;
	float: <?php echo $left;?>;
}

#cometchat_userstab_icon {
        background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0px -753px;
	float: <?php echo $left;?>;
	height: 16px;
	width: 16px;
        margin: 0px 5px;
}

.cometchat_user_invisible2 {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0px -891px !important;
}

.cometchat_user_available2 {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0px -753px !important;
}

.cometchat_user_busy2 {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0px -799px !important;
}

.cometchat_user_away2 {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0px -845px !important;	
}

.cometchat_optionsimages {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: -3px -309px !important;		
        height: 24px;
        width: 16px;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
        filter: alpha(opacity=70);
        -moz-opacity: 0.7;
        -khtml-opacity: 0.7;
        opacity: 0.7;
        display: block;
}

.cometchat_optionsimages_exclamation {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 9px -261px !important;
        background-color: <?php echo $themeSettings['tab_title_background'];?>;
}

.cometchat_smiley {	
	vertical-align: -3px;
	display: inline-block; 
}

.cometchat_traypopup {
	background-color: <?php echo $themeSettings['tab_background'];?>;
	font-family: <?php echo $themeSettings['tab_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size'];?>;
	position: fixed;	
	z-index: 100001;
	bottom: 25px;
}

.cometchat_traytitle {
	background-color: <?php echo $themeSettings['tab_title_background'];?> !important;
	border-left: 1px solid <?php echo $themeSettings['tab_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['tab_border'];?>;
	border-top: 1px solid <?php echo $themeSettings['tab_border'];?>;
	color: <?php echo $themeSettings['tab_title_color'];?>;
	font-family: <?php echo $themeSettings['tab_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size'];?>;
	font-weight: bold;
	padding: 5px;
	padding-<?php echo $right;?>: 0px;
}

.cometchat_traycontent {
	background-color: <?php $themeSettings['tab_background'];?>;
	background-image: url(themes/<?php echo $theme;?>/images/tabbottom_tray.gif);
	background-position: left bottom;
	background-repeat: no-repeat;
	border-left: 1px solid <?php echo $themeSettings['tab_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['tab_border'];?>;
	color: <?php echo $themeSettings['tab_color'];?>;
	overflow-x: hidden;
	overflow-y: auto;
	padding-bottom: 1px;	
}

.cometchat_traycontenttext {
	overflow-x: hidden;
	overflow-y: hidden;
	padding: 0px;
	position: relative;
}

.cometchat_trayclick {
	background-color: <?php echo $themeSettings['tab_background'];?> !important;
	border-bottom: 1px solid <?php echo $themeSettings['tab_border'];?> !important;
	border-left: 1px solid <?php echo $themeSettings['tab_border'];?> !important;
	border-right: 1px solid <?php echo $themeSettings['tab_border'];?> !important;
	color: <?php echo $themeSettings['tab_color'];?> !important;
	margin-left: 0px;
	padding-bottom: 1px;
	padding-top: 4px !important;	
	text-decoration: underline;
}

.cometchat_traytitle .cometchat_minimizebox {
	margin-right: 6px;
}

.cometchat_userstabtitle .cometchat_minimizebox {
	margin-right: 2px;
}

.cometchat_minimizebox {
	cursor: pointer;
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 2px -462px;
	float: <?php echo $right;?>;
	height: 12px;	
	width: 14px;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
	filter: alpha(opacity=50);
	-moz-opacity: 0.5;
	-khtml-opacity: 0.5;
	opacity: 0.5;
}

.cometchat_popout {
	cursor: pointer;
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 1px -1114px;
	float: <?php echo $right;?>;
	height: 16px;
	width: 16px;
	cursor: pointer;
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
	filter: alpha(opacity=50);
	-moz-opacity: 0.5;
	-khtml-opacity: 0.5;
	opacity: 0.5;
}

.cometchat_minimizebox:hover, .cometchat_popout:hover {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	-moz-opacity: 1;
	-khtml-opacity: 1;
	opacity: 1;
}

.cometchat_chatboxtraytitlemouseover {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	-moz-opacity: 1;
	-khtml-opacity: 1;
	opacity: 1;
}

.cometchat_star {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 4px -1068px;
	height: 16px;	
	width: 16px;
}

.cometchat_star_empty {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0 -1150px;
	height: 16px;	
	width: 16px;
}

.cometchat_star_half {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0 -1196px;
	height: 16px;	
	width: 16px;
}

.cometchat_name a, .cometchat_name a:link, .cometchat_name a:visited {
	color: <?php echo $themeSettings['tab_title_color'];?>;
	float: <?php echo $left;?>;
	color: <?php echo $themeSettings['tab_title_color'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size'];?>;
	text-decoration: none;
        text-transform:capitalize;
}

.cometchat_name a:hover {
	color: <?php echo $themeSettings['tab_title_color'];?>;	
	text-decoration: none;
        text-transform:capitalize;
}

.cometchat_avatar {
	border: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	height: 28px;	
}

.cometchat_avatarbox {
	float: <?php echo $left;?>;
	padding-<?php echo $right;?>: 5px;	
}

.cometchat_ts {
	color: <?php echo $themeSettings['tab_border_light'];?>;
	cursor: default;
	font-size: 10px;
	padding-left: 5px;
	padding-top: 2px;	
}

.cometchat_message_name {
        color: <?php echo $themeSettings['tab_border_light'];?>;
        cursor: default;
        font-size: 10px;
        padding-left: 5px;
        padding-top: 2px;
        text-transform: capitalize;
}

.cometchat_ts_date {
	display: none;	
}

.cometchat_optionstyle {
	padding: 5px;
	padding-bottom: 10px;	
}

.cometchat_tabstyle {
	height: 100%;
	padding-bottom: 5px;
	padding-top: 3px;
        background-color: #E9EAED;
        border: 0;
        box-sizing: border-box !important;
        -webkit-box-sizing: border-box !important;
        -moz-box-sizing: border-box !important;
        -o-box-sizing: border-box !important;
}

.cometchat_self {
	background-color: #DBEDFE !important;
        background-image: -webkit-gradient(linear, center bottom, center top, from(#C7DEFE), to(#E7F1FE)) !important;
        background-image: -o-linear-gradient(bottom, #C7DEFE 0%, #E7F1FE 100%) !important;
        background-image: -moz-linear-gradient(bottom, #C7DEFE 0%, #E7F1FE 100%) !important;
        background-image: -webkit-linear-gradient(bottom, #C7DEFE 0%, #E7F1FE 100%) !important;
        background-image: -ms-linear-gradient(bottom, #C7DEFE 0%, #E7F1FE 100%) !important;
        background-image: linear-gradient(to bottom, #C7DEFE 0%, #E7F1FE 100%) !important; 
        max-width: 195px;
}

.selfMsgArrow {
        position: absolute;
        right: 5px;
        top: 10px;
        width: 8px;
        background-color: transparent;
        height: 13px;
        overflow: hidden;
}

.msgArrow{
        left: 33px;
        top: 10px;
        position: absolute;
        width: 8px;
        background-color: transparent;
        height: 13px; 
        overflow: hidden;
}

.selfMsgArrow .after{
    position: absolute;
    width: 9px;
    height: 9px;
    background: #D6E7FE;
    -moz-transform:rotate(45deg);
    -webkit-transform:rotate(45deg);
    -o-transform:rotate(45deg);
    -ms-transform:rotate(45deg);
    transform:rotate(45deg);
    filter: progid:DXImageTransform.Microsoft.Matrix(sizingMethod='auto expand', M11=0.7071067811865476, M12=-0.7071067811865475, M21=0.7071067811865475, M22=0.7071067811865476);
    -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(SizingMethod='auto expand', M11=0.7071067811865476, M12=-0.7071067811865475, M21=0.7071067811865475, M22=0.7071067811865476)"; 
    top: 2px;
    left: -5px;
    -webkit-box-shadow:0px 0px 1px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:0px 0px 1px 0px rgba(50, 50, 50, 0.75);
    box-shadow:0px 0px 1px 0px rgba(50, 50, 50, 0.75);
}

.msgArrow .after{
    position: absolute;
    width: 9px;
    height: 9px;
    background: #F7F7F7;
    -moz-transform:rotate(45deg);
    -webkit-transform:rotate(45deg);
    -o-transform:rotate(45deg);
    -ms-transform:rotate(45deg);
    transform:rotate(45deg);
    filter: progid:DXImageTransform.Microsoft.Matrix(sizingMethod='auto expand', M11=0.7071067811865476, M12=-0.7071067811865475, M21=0.7071067811865475, M22=0.7071067811865476);
    -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(SizingMethod='auto expand', M11=0.7071067811865476, M12=-0.7071067811865475, M21=0.7071067811865475, M22=0.7071067811865476)"; 
    top: 2px;
    left: 4px;
    -webkit-box-shadow:0px 0px 1px 0px rgba(50, 50, 50, 0.75);
    -moz-box-shadow:0px 0px 1px 0px rgba(50, 50, 50, 0.75);
    box-shadow:0px 0px 1px 0px rgba(50, 50, 50, 0.75);
}

.cometchat_typing {
	background-image: url(themes/<?php echo $theme;?>/images/pencil.png);
	display: none;
	float: <?php echo $left;?>;
	height: 13px;
	width: 16px;
}

.cometchat_userscontentavatar {
	display: block;
	float: <?php echo $left;?>;
        height: 32px;
	width: 32px;
}

.cometchat_userscontentavatarimage {
	height: 30px;
	width: 30px;
        border: 1px solid #C6C7C9;
}

.cometchat_notification_avatar_image {
	height: 25px;
	width: 25px;
}

.cometchat_notification {
	border-top: 1px dotted <?php echo $themeSettings['tooltip_break'];?>;
	cursor: pointer;
	margin-top: 6px;
	padding-top: 4px;
	width: 176px;
}

.cometchat_notification:first-child {
	border-top: 0px !important;
	margin-top: 0px !important;
	padding-top: 0px !important;
	width: 176px;
}

.cometchat_notification_avatar {
	float: <?php echo $left;?>;
	padding-right: 6px;
	padding-top: 2px;
	width: 25px;
}

.cometchat_notification_message {
	float: <?php echo $left;?>;
	white-space: normal;
	width: 144px;
}

.cometchat_notification_status {
	color: <?php echo $themeSettings['tooltip_color_light'];?>;
	display: none;
	font-size: 10px;
}

.cometchat_statusbutton {
	background-color: #F6F7F8 !important;
	border: 1px solid #AAB1C0 !important;
	color: #333;
	cursor: pointer;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
	font-weight: bold;
	-webkit-border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px;
	-webkit-border-bottom-left-radius: 3px;
	-webkit-border-bottom-right-radius: 3px;
	-moz-border-radius-topleft: 3px;
	-moz-border-radius-topright: 3px;	
	-moz-border-radius-bottomleft: 3px;
	-moz-border-radius-bottomright: 3px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
	width: 85px;
	height: 18px;
    text-align: center;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    line-height: 18px;
}

.cometchat_guestnamebutton {
	background-color: <?php echo $themeSettings['tab_title_background'];?> !important;
	border: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
	color: <?php echo $themeSettings['tab_title_color'];?>;
	cursor: pointer;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
	font-weight: bold;
	margin-left: 7px;
	padding: 3px 4px;
	-webkit-border-top-left-radius: 3px;
	-webkit-border-top-right-radius: 3px;
	-webkit-border-bottom-left-radius: 3px;
	-webkit-border-bottom-right-radius: 3px;
	-moz-border-radius-topleft: 3px;
	-moz-border-radius-topright: 3px;	
	-moz-border-radius-bottomleft: 3px;
	-moz-border-radius-bottomright: 3px;
    border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
	width: 68px;
	display: inline-block;
    position: fixed;
    margin-top: 3px;
    height: 14px;
}

.cometchat_guestnametextbox {
	border: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	color: <?php echo $themeSettings['tab_color'];?>;
	background: <?php echo $themeSettings['tab_background'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
	margin-bottom: 3px;
	margin-top: 3px;
	outline: none;
	overflow-x: hidden;
	overflow-y: auto;
	padding: 4px;
	resize: none;	
	width: 100px;
}

.cometchat_user_busy {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 0px -798px !important;
	height: 16px;
	padding-left: 0px !important;	
	width: 16px;
}

.cometchat_announcement {
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	white-space: normal;
	width: 200px;
        padding: 6px;
        text-align: <?php echo $left;?>;
}

.cometchat_tooltip_content a {
	border-bottom: 1px dotted <?php echo $themeSettings['tab_link_color'];?>;
	color: <?php echo $themeSettings['tab_link_color'];?>;
	text-decoration: none;
}

.cometchat_user_shortname {
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	float: <?php echo $left;?>;
        padding-left: 2px;
}

#cometchat_hidden {
	background-image: url(themes/<?php echo $theme;?>/images/bgrepeat.png);
	bottom: 0px;
	cursor: pointer;
	display: none;
	position: fixed;
	right: <?php echo $barPadding.'px';?>;
	z-index: 100000;
}

#guestsname {
	display: none;
	border-bottom: 1px solid #CCCCCC;   
	padding-bottom: 5px;
	margin-bottom: 5px;
}

#cometchat_hidden_content {
	background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 7px -24px;
	border-left: 1px solid <?php echo $themeSettings['bar_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['bar_border'];?>;
	height: 25px;
	padding-left: 7px;
	padding-right: 7px;
	width: 16px;
}

.cometchat_xtc {
	background: transparent url(themes/<?php echo $theme;?>/images/xgtc.png) repeat scroll 0 0;
	height: 10px;
}

.cometchat_xcl {
	background: transparent url(themes/<?php echo $theme;?>/images/xgcr.png) repeat scroll 0 0;
	width: 16px;
}

.cometchat_xcr {
	background: transparent url(themes/<?php echo $theme;?>/images/xgcl.png) repeat scroll 0 0;
	width: 10px;
}

.cometchat_xcc {
	background: transparent url(themes/<?php echo $theme;?>/images/xgcc.png) repeat scroll 0 0;
	font-size: 10px;
}

.cometchat_xbc {
	background: transparent url(themes/<?php echo $theme;?>/images/xgbc.png) repeat scroll 0 0;
	height: 8px;
}

.cometchat_tc {
	background: transparent url(themes/<?php echo $theme;?>/images/gtc.png) repeat-x scroll 0 0;
	height: 10px;
}

.cometchat_cl {
	background: transparent url(themes/<?php echo $theme;?>/images/gcl.png) repeat scroll 0 0;
	width: 10px;
}

.cometchat_cr {
	background: transparent url(themes/<?php echo $theme;?>/images/gcr.png) repeat scroll 0 0;
	width: 16px;
}

.cometchat_cc {
	background: transparent url(themes/<?php echo $theme;?>/images/gcc.png) repeat scroll 0 0;
	font-size: 10px;
}

.cometchat_bc {
	background: transparent url(themes/<?php echo $theme;?>/images/gbc.png) repeat-x scroll 0 0;
	height: 8px;
}

.cometchat_iphone .cometchat_chatboxmessage {
	margin-left: 0px;
}

.cometchat_iphone .cometchat_chatboxmessagefrom {
	display: none;
}

.cometchat_iphone {
	margin-bottom: 4px;
}

.cometchat_bl {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -59px;
	height: 9px;
	width: 10px;
}

.cometchat_br {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -118px;
	height: 9px;
	width: 16px;
}

.cometchat_tl {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -393px;
	height: 10px;
	width: 10px;
}

.cometchat_tr {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -453px;
	height: 10px;
	width: 16px;
}

.cometchat_xbr {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -572px;
	height: 9px;
	width: 10px;
}

.cometchat_xbl {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -631px;
	height: 9px;
	width: 16px;
}

.cometchat_xtr {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -906px;
	height: 10px;
	width: 10px;
}

.cometchat_xtl {
	background: url(themes/<?php echo $theme;?>/images/iphone.png) no-repeat top left;
	background-position: 0 -966px;
	height: 10px;
	width: 16px;
}

#cometchat_hide {
	background: url(themes/<?php echo $theme;?>/images/hide.png) no-repeat top left;
	background-position: 8px;
	border-right: 1px solid <?php echo $themeSettings['bar_border'];?>;
	cursor: pointer;
	float: right;
	height: 18px;
	margin-left: 1px;
	margin-top: 1px;
	padding-left: 7px;
	padding-right: 7px;
	padding-top: 6px;	
	width: 16px;
}

#cometchat_flashcontent {
	position: absolute;
	top: -1000px;
}

#cometchat_userstab_text {
	float: <?php echo $left;?>;
        <?php if ($rtl):?>
	  padding-<?php echo $left;?>: 5px;
	<?php endif;?>
      
}

.untranslatedtext {
	color: <?php echo $themeSettings['tab_color_self'];?>;;
}

.cometchat_trayicontext {
	float: <?php echo $left;?>;
	color: <?php echo $themeSettings['bar_color'];?>;
	font-family: <?php echo $themeSettings['bar_font_family'];?>;
	font-size: <?php echo $themeSettings['bar_font_size'];?>;
	width: auto;
	padding-top: 1px;
	padding-<?php echo $left;?>: 5px;
	text-shadow: 1px 1px 0px <?php echo $themeSettings['bar_text_background'];?>;
}

.cometchat_trayiconimage {
        cursor: pointer;
        margin-<?php echo $right;?>: 2px;
		margin-top: 1px;
}

.cometchat_trayiconimage:hover {
	-moz-opacity: 0.6;
	opacity: 0.6;
}

#cometchat_userstab_popup .cometchat_tabsubtitle {
        padding-bottom: 5px;
        padding-left: 4px;
        overflow: hidden;
		height: 19px;
}

.cometchat_subsubtitle {
	color: <?php echo $themeSettings['tab_sub_color'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size'];?>;
	line-height: 1.3em;
	padding: 5px 0;
	cursor: default;
	margin-top: 5px;
	margin-bottom: 5px;
	overflow: hidden;
	white-space: nowrap;
}

.cometchat_subsubtitle_top {
	margin-top: 0px;
	padding-top: 0px;
}

.cometchat_subsubtitle .hrleft {
	display: inline-block;
	width: 5px;
	border: 0;
	background-color: <?php echo $themeSettings['tab_border_light'];?>;
	height: 1px;
	margin-right: 5px;
	margin-bottom: 3px;
}

.cometchat_subsubtitle .hrright {
	display: inline-block;
	width: 200px;
	border: 0;
	background-color: <?php echo $themeSettings['tab_border_light'];?>;
	height: 1px;
	margin-left: 5px;
	margin-bottom: 3px;
}

.cometchat_nofriends {
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size'];?>;
	line-height: 1.3em;
	padding: 0px 10px;	
	color: <?php echo $themeSettings['tab_sub_color'];?>;
}

.cometchat_ad {
	background: <?php echo $themeSettings['tab_background'];?>;
}

.cometchat_message {
	width: 100%;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        color: #666;
        font-family: inherit;
        font-size: inherit;
        border-bottom: 1px solid #ccc;
        background-color: #fff;
        padding: 5px;
}

.cometchat_container {
	z-index: 100001;
	position: absolute;
}

.cometchat_container_title {
	cursor: default;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_title_font_size_large'];?>;	
	line-height: 16px;
	font-weight: bold;
	<?php if($rtl) :?>
        padding-right: 5px;
        <?php else :?>
        padding-right: 0px;
        <?php endif;?>
        background: <?php echo $themeSettings['tab_title_background'];?>;
        background: -moz-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%, <?php echo $themeSettings['tab_title_gradient_center'];?> 44%, <?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $themeSettings['tab_title_gradient_start'];?>), color-stop(44%,<?php echo $themeSettings['tab_title_gradient_center'];?>), color-stop(100%,<?php echo $themeSettings['tab_title_gradient_end'];?>));
        background: -webkit-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -o-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: -ms-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        background: linear-gradient(to bottom, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $themeSettings["tab_title_gradient_start"];?>', endColorstr='<?php echo $themeSettings["tab_title_gradient_end"];?>',GradientType=0 );
        border: 1px solid <?php echo $themeSettings['tab_title_border'];?>;
        padding: 6px 8px;
        color: #FFF;
        webkit-border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
}

.cometchat_container_title span {
    float: <?php echo $left;?>;
}

.cometchat_container_body {
	border-left: 1px solid <?php echo $themeSettings['tab_border'];?>;
	border-bottom: 1px solid <?php echo $themeSettings['tab_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['tab_border'];?>;
	background-color: <?php echo $themeSettings['tab_background'];?>;
	position: relative;
        overflow:hidden;
}

.cometchat_iframe {
	position: absolute;
	top: 0px;
	left: 0px;
}

.cometchat_loading {
	position: absolute;
	background: url(themes/<?php echo $theme;?>/images/loader.gif);
	right: 10px;
	top: 10px;
	background-repeat: no-repeat;
	width: 20px;
	height: 20px;
}

.cometchat_overlay {
	position: absolute;
	top: 0px;
	left: 0px;
	display: none;
}

.cometchat_options_disable {
	border-top: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	border-bottom: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	margin-top: 10px;
	margin-bottom: 4px;
	padding-top: 4px;
	padding-bottom: 4px;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
}

#cometchat_userstab_popup_available, #cometchat_userstab_popup_busy, #cometchat_userstab_popup_invisible, #cometchat_userstab_popup_offline {
	cursor: pointer;
}

.cometchat_tabsubtitle2 {
	cursor: pointer;
	background-color: <?php echo $themeSettings['tab_sub_background'];?>;
	<?php if($lang == 'en'):?>
	background-image: url(extensions/jabber/jabber_dark.png);
        background-repeat: no-repeat;
        background-position: 5px;
	<?php endif;?>	
	border-bottom: 1px solid <?php echo $themeSettings['tab_border_light'];?>;
	border-left: 1px solid <?php echo $themeSettings['tab_border'];?>;
	border-right: 1px solid <?php echo $themeSettings['tab_border'];?>;
	color: <?php echo $themeSettings['tab_sub_color'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
	font-family: <?php echo $themeSettings['tab_title_font_family'];?>;
	font-size: 11px;
	<?php if($lang == 'en'):?>
	padding: 10px 4px 10px 50px;
	<?php else:?>
	padding: 10px 8px;
	<?php endif;?>
	line-height: 1.3em !important;
	font-weight: bold;
	text-decoration: none;
}

.cometchat_unblock {
	float: right; 
	cursor: pointer;
	background: url('plugins/block/unblock.png') no-repeat scroll 0px 0px transparent;
	height: 16px; 
	width: 16px; 
	margin-top: -1.5px;
        line-height: 15px;
}
.cometchat_userlist .cometchat_userscontentname {
	text-overflow: ellipsis;
	max-width: 115px;
	white-space: nowrap;
	overflow: hidden !important;
}

.cometchat_tab .cometchat_user_shortname {
	text-overflow: ellipsis;
	max-width: 105px;
	white-space: nowrap;
	overflow: hidden !important;
        line-height: 1.5;
}

.cometchat_tabtitle .cometchat_name a {
	text-overflow: ellipsis;
	max-width: 160px;
	white-space: nowrap;
	overflow: hidden !important;
}

.cometchat_tabtitle .cometchat_name  {
	text-overflow: ellipsis;
	max-width: 160px;
	white-space: nowrap;
	overflow: hidden !important;
}

.invite_name{
	text-overflow: ellipsis;
	overflow: hidden;
	white-space: nowrap;
	width: 100px;
	float: <?php echo $left;?>;
}

#statusupdate_div,#guestnameupdate_div {
        font-size: <?php echo $themeSettings['tab_font_size_small'];?>;
        padding: 2px;
}

.cometchat_statusbutton > img , .cometchat_guestnamebutton > img {
        margin: 1px 35%;
        opacity: 0.5;
}

.cometchat_extra_width {
        width: 214px !important;
}

.cometchat_tabopen_bottom {
        bottom: 0 !important;
}

#cometchat_chatboxes_wide .cometchat_new_message {
        background: <?php echo $themeSettings['tab_title_background'];?> !important;
        background: -moz-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%, <?php echo $themeSettings['tab_title_gradient_center'];?> 44%, <?php echo $themeSettings['tab_title_gradient_end'];?> 100%) !important;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $themeSettings['tab_title_gradient_start'];?>), color-stop(44%,<?php echo $themeSettings['tab_title_gradient_center'];?>), color-stop(100%,<?php echo $themeSettings['tab_title_gradient_end'];?>)) !important;
        background: -webkit-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%) !important;
        background: -o-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%) !important;
        background: -ms-linear-gradient(top, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%) !important;
        background: linear-gradient(to bottom, <?php echo $themeSettings['tab_title_gradient_start'];?> 0%,<?php echo $themeSettings['tab_title_gradient_center'];?> 44%,<?php echo $themeSettings['tab_title_gradient_end'];?> 100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $themeSettings["tab_title_gradient_start"];?>', endColorstr='<?php echo $themeSettings["tab_title_gradient_end"];?>',GradientType=0 ) !important;
        border: 1px solid <?php echo $themeSettings['tab_title_border'];?> !important;
        color: <?php echo $themeSettings['tab_title_color'];?> !important;
}

#cometchat_chatboxes_wide .cometchat_new_message:hover {
        color: #FFF !important;
}

.cometchat_new_message .cometchat_closebox_bottom {
        color: #FFF !important;
         -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
        filter: alpha(opacity=70);
        -moz-opacity: 0.7;
        -khtml-opacity: 0.7;
        opacity: 0.7;
}

.cometchat_new_message .cometchat_closebox_bottom:hover {
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        filter: alpha(opacity=100);
        -moz-opacity: 1;
        -khtml-opacity: 1;
        opacity: 1;
}

.cometchat_plugins_dropdownlist {
    clear: both !important;
    height: 20px;
    line-height: 20px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden !important;
    color: #111;
    font-size: 12px;
    font-weight: normal;
    border: solid #FFF;
    border-width: 1px 0;
    padding-right: 5px;
}

.cometchat_avchat{ width: 16px;height: 16px;float: right;background-position: -3px 1px;} 
.cometchat_block{ background-position: 0 -66px;} 
.cometchat_broadcast{ background-position: 1px -132px;} 
.cometchat_chathistory{ background-position: 0 -198px;} 
.cometchat_chattime{ background-position: 0 -264px;} 
.cometchat_clearconversation{ background-position: 2px -330px;} 
.cometchat_style{ background-position: 0 -396px;} 
.cometchat_filetransfer{ background-position: 0 -462px;} 
.cometchat_games{ background-position: 0 -528px;} 
.cometchat_handwrite{ background-position: 0 -594px;} 
.cometchat_report{ background-position: 0 -660px;} 
.cometchat_save{ background-position: 0 -726px;} 
.cometchat_screenshare{ background-position: 0 -792px;} 
.cometchat_smilies{ background-position: 0 -858px; width: 16px; height: 16px; margin: 0; margin-top: 1px;} 
.cometchat_transliterate{ background-position: 0 -924px;} 
.cometchat_whiteboard{ background-position: 0 -990px;} 
.cometchat_writeboard{ background-position: 0 -1056px;}

.cometchat_plugins_dropdownlist:hover .cometchat_block{ background-position: 0 -101px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_broadcast{ background-position: 1px -167px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_chathistory{ background-position: 0 -233px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_clearconversation{ background-position: 2px -365px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_style{ background-position: 0 -396px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_filetransfer{ background-position: 0 -498px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_games{ background-position: 0 -563px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_handwrite{ background-position: 0 -629px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_report{ background-position: 0 -691px;}
.cometchat_plugins_dropdownlist:hover .cometchat_save{ background-position: 0 -761px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_screenshare{ background-position: 0 -826px;}  
.cometchat_plugins_dropdownlist:hover .cometchat_transliterate{ background-position: 0 -959px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_whiteboard{ background-position: 0 -990px;} 
.cometchat_plugins_dropdownlist:hover .cometchat_writeboard{ background-position: 0 -1091px;}

.cometchat_new_message_unread {
        background: none repeat scroll 0 0 #FFFFFF;
        bottom: 0;
        margin-left: -5px;
        position: absolute;
        width: 218px;
        z-index: 1000;
        display:none;
        padding: 5px;
        text-align: center;
        cursor: pointer;
        border-top: 1px dotted <?php echo $themeSettings['tab_link_color'];?>;
}

.cometchat_new_message_unread a:hover {
        text-decoration:underline;
}

.ui-icon,.ui-widget-content .ui-icon {
    background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
    background-position: 1px  -1141px;
}

.ui-icon-gripsmall-diagonal-se { background-position: 0px -74px; }

.ui-icon {
	width: 16px;
	height: 16px;
}

.ui-resizable-se {
	cursor: se-resize;
	right: 1px;
	bottom: 1px;
}
.ui-resizable-handle {
        background: url(themes/<?php echo $theme;?>/images/cometchat.png) no-repeat top left;
	background-position: 1px  -1141px;
	position: absolute;
	font-size: 0.1px;
	display: block;
}
.ui-icon {
	text-indent: -99999px;
	overflow: hidden;
	background-repeat: no-repeat;
}

.file_image {
	max-width:110px;
	padding-left: 6%;
	height: 170px;
	width: auto !important;
	vertical-align: inherit;
}

.file_video {
	max-width:125px;
	height:120px;
}

.imagemessage {
	display: inline-block;
	margin-bottom: 3px;
	margin-top: 3px;
}

#cometchat_sidebar {
    height: <?php echo ($showModules ? 318 : 326).'px';?>;
    position: fixed !important;
    bottom: 0;
    right: <?php echo $barPadding.'px';?>;
    width: 205px;
    z-index: 300;
    display: none;
}

#cometchat_bottomBar {
    border: 1px solid <?php echo $themeSettings['tab_border'];?>;
    border-width: 0 1px;
    position: absolute;
    bottom: 0;
    width: 203px;
    height: 25px;
    overflow: hidden;
}

#cometchat_searchbar {
        border-top: 1px solid #D1D2D4;
}

#cometchat_search {
    -webkit-box-sizing: border-box !important;
    -moz-box-sizing: border-box !important;
    box-sizing: border-box !important;
    background-color: #FFF;
    color: #555;
    height: 24px;
    padding-left: 28px;
    padding-right: <?php echo ($showSettingsTab ? 25 : 5).'px';?>;
    border: 0;
    outline: 0;
    width: <?php echo ($showSettingsTab ? 183 : 203).'px';?>;
}

#cometchat_searchbar_icon {
    width: 6px;
    height: 6px;
    border: 3px solid #B2B3B5;
    background: rgba(0, 0, 0, 0);
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    pointer-events: none;
    position: absolute;
    top: 6px;
    left: 7px;
}

#cometchat_searchbar_icon .after {
    position: absolute;
    left: 7px;
    top: 5px;
    height: 7px;
    width: 3px;
    background: #B2B3B5;
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    transform: rotate(-45deg);
}

#cometchat_search:focus {
    color: #000 !important;
    width: 205px;
}

#cometchat_optionsbutton_icon:hover{
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    -moz-opacity: 1;
    -khtml-opacity: 1;
    opacity: 1;
}

#cometchat_userstab:hover {
    background: #fafbfb !important;
}

.cometchat_floatL {
    float: left !important;
}

.cometchat_floatR {
    float: right !important;
}

.cometchat_clearFloat {
    clear: both !important;
}

#cometchat_chatboxes_wide .cometchat_available {
    background: #65A830 !important;
}

#cometchat_userstab_popup .cometchat_tabcontent {
    padding: 0px !important;
    font-size: 12px !important;
    border: 1px solid <?php echo $themeSettings['tab_border'];?>;
    border-width: 0 1px;
    height: <?php echo ($showModules ? 234 : 272).'px';?>;
}

#cometchat_userslist {
    padding-bottom: 3px;
    padding-top: 3px;
}

#cometchat_userslist .cometchat_userscontentdot {
	margin-top: 12px;
}

.cometchat_deviceType {
    color: #63A924;
    font-weight: 500;
    font-size: 9px;
    line-height: 32px;
    height: 32px
}

@-moz-document url-prefix() {
    .cometchat_deviceType{
        line-height: 27px;
    }
}

.cometchat_popup_plugins {
    overflow: hidden;
    position: absolute;
    top: 30px;
    right: 20px;
    z-index: 101;
    border: 1px solid #777;
    border-top: none; 
    display: none;
    background: #FFF;
    padding: 0;
    max-height: 179px;
    max-width: <?php echo ($sleekScroller ? 210 : 215).'px';?>;
    min-width: 150px;
}

.cometchat_plugins_dropdown {
    width: 16px;
    height: 16px;
    font-size: 15px;
    font-weight: bold;
    margin-right: 2px;
}

.cometchat_plugins_dropdown_icon{
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
    -khtml-opacity: 0.7;
    opacity: 0.7;
    background: url(themes/facebook/images/cometchat.png) no-repeat top left;
    background-position: -3px -333px !important;
    height: 16px;
    width: 16px;
}

.cometchat_plugins_dropdown_active, .cometchat_plugins_dropdown:hover .cometchat_plugins_dropdown_icon {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    -moz-opacity: 1;
    -khtml-opacity: 1;
    opacity: 1;
}

.cometchat_unreadCount {
    background-color: #DC0D17;
    background-image: -webkit-gradient(linear, center top, center bottom, from(#FA3C45), to(#DC0D17));
    background-image: -o-linear-gradient(top, #FA3C45 0%, #DC0D17 100%);
    background-image: -moz-linear-gradient(top, #FA3C45 0%, #DC0D17 100%);
    background-image: -webkit-linear-gradient(top, #FA3C45 0%, #DC0D17 100%);
    background-image: -ms-linear-gradient(top, #FA3C45 0%, #DC0D17 100%);
    background-image: linear-gradient(to top, #FA3C45 0%, #DC0D17 100%);
    color: #FFF;
    min-height: 13px;
    margin: 0 4px;
    padding: 1px 3px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-border-radius: 2px 2px 3px 3px;
    -moz-border-radius: 2px 2px 3px 3px;
    border-radius: 2px 2px 3px 3px;
    display: none;
}

#cometchat_unseenUsers {
    position: absolute;
    left: -85px;
    bottom: 27px;
    background-color: #FFF;
    padding: 3px 0 4px; 
    border: 1px solid <?php echo $themeSettings['bar_border'];?>;
    -webkit-border-top-left-radius: 3px;
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topleft: 3px;
    -moz-border-radius-topright: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    -webkit-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
    -moz-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
    box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
    z-index: 1000;
    display: none;
}

#cometchat_chatbox_left_border_fix {
	width: 1px;
	height: 1px;
	top: -1px;
	position: absolute;
	right: -1px;
	background: <?php echo $themeSettings['bar_border'];?>;
	display: none;
}

.cometchat_unseenUserList{
    text-overflow: ellipsis;
    white-space: nowrap;
    padding-left: 5px;
    padding-right: 10px;
    border: solid #FFF;
    border-width: 1px 0;
    color: #111;
    display: block;
    font-weight: normal;
    line-height: 16px;
    width: 120px;
    clear: both;
    overflow: hidden !important;
    cursor: pointer;
}

.cometchat_unseenUserList:hover, .cometchat_plugins_dropdownlist:hover {
    background-color: <?php echo $themeSettings['tab_title_background'];?>;
    border-color: <?php echo $themeSettings['tab_title_border'];?>;
    color: #FFF;
    outline: none;
}

.cometchat_userName {
    text-overflow: ellipsis;
    max-width: 85px;
    white-space: nowrap;
    overflow: hidden !important;
}

.cometchat_unseenClose {
    font-size: 15px;
    color: #9CB3D8;
    font-weight: bold;
    height: 11px;
    width: 11px;
    margin-top: 2px;
    cursor: pointer;
    text-align: center;
    line-height: 12px;
}

.cometchat_unseenClose:hover {
    color: #FFF;
    background: #40659F;
}

#cometchat_unseenUsers .cometchat_unreadCount {
    padding: 0px 4px;
    display: block !important;
    visibility: hidden;
    background: #D8DFEA;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    color: #3B5998;
    font-size: 11px;
    font-weight: bold;
    height: 14px;
    line-height: 14px;
    margin-top: 1px;
}

#cometchat_chatbox_left.cometchat_unseenList_open {
    background: #FFF !important;
    border-top-color: #FFF !important;
    -webkit-border-radius: 0px !important;
    -moz-border-radius: 0px !important;
    border-radius: 0px !important;
}

#cometchat_unseenUserCount {
    position: absolute;
    right: 2px;
    top: -8px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.16);
    -webkit-border-radius: 2px 2px 3px 3px;
    -moz-border-radius: 2px 2px 3px 3px;
    border-radius: 2px 2px 3px 3px;
    background-color: #DC0D17;
    background-image: -webkit-gradient(linear, center top, center bottom, from(#FA3C45), to(#DC0D17));
    background-image: -webkit-linear-gradient(top, #FA3C45 0%, #DC0D17 100%);
    color: #FFF;
    height: 13px;
    line-height: 13px;
    padding: 1px 3px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    display: none;
}

.cometchat_unseenUsers_unread {
    visibility: visible !important;
}

.cometchat_unseenList_open #cometchat_unseenUserCount {
    display: none !important;
}

.cometchat_isMobile {
    border-color: #FFF;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    border-style: solid;
    border-width: 2px 1px 4px;
    height: 8px !important;
    width: 6px !important;
    position: relative;
    margin-top: 1px;
    margin-right: 4px;
}

#cometchat_chatboxes_wide .cometchat_isMobile {
	margin-top: 2px !important;
}

.cometchat_mobileDot {
    border: 1px solid #4966A7;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    height: 0;
    left: 2px;
    position: absolute;
    top: 9px;
}

.cometchat_isMobile + .cometchat_userscontentdot {
    display: none !important;
}

#cometchat_chatboxes_wide .cometchat_isMobile {
     border-color: #A9A9A9;
}

#cometchat_chatboxes_wide .cometchat_mobileDot {
     border-color: #FFF;
}

#cometchat_nousers_found {
    text-overflow: ellipsis;
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden !important;
    text-align: center;
    padding: 5px;
}

.cometchat_noUser_optionBar {
    border-left: 1px solid <?php echo $themeSettings['tab_border_light'];?> !important;
    width: 25px !important;
}

#cometchat_userstab_popup .slimScrollRail {
    display: none !important;
}

#cometchat .cometchat_plugins {
    padding-top: 3px;
    padding-bottom: 3px;
    width: 100% !important;
    height: 100%;
    overflow-y: auto;
    overflow-x: hidden;
    box-sizing: border-box !important;
    -webkit-box-sbox-sizizing: border-box !important;
    -moz-box-sizing: border-box !important;
    -o-box-sizing: border-box !important;
}

.cometchat_fullOpacity {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)" !important;
    filter: alpha(opacity=100) !important;
    -moz-opacity: 1 !important;
    -khtml-opacity: 1 !important;
    opacity: 1 !important;
}

.cometchat_option_active_serach {
    width : 175px !important;
}

.cometchat_plugins_dropdownlist .cometchat_pluginsicon {
    margin-left: 5px;
    margin-top: 1px;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)" !important;
    filter: alpha(opacity=100) !important;
    -moz-opacity: 1 !important;
    -khtml-opacity: 1 !important;
    opacity: 1 !important;
}

#loggedout {
	margin-right: 7px;
    background-color: <?php echo $themeSettings['bar_background'];?>;
    border: 1px solid #AAB1C0 !important;
    -webkit-border-top-left-radius: 3px;
    -webkit-border-top-right-radius: 3px;
    -moz-border-radius-topleft: 3px;
    -moz-border-radius-topright: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom: 0 !important;
    -webkit-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
    -moz-box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
    box-shadow: 0 1px 1px <?php echo $themeSettings['tab_border'];?>;
   	color: #333;
   	font-weight: bold;
   	height: 17px;
   	width: 24px;
   	outline: none;
   	padding: 5px;
   	position: fixed;
   	right: <?php echo $barPadding.'px';?>;
   	display: none;
}

</style>