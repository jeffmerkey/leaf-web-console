<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

function style_sheet()
{
   global $stylesheet;

   echo '<style type="text/css">';
   if (isset($stylesheet)) {
      switch($stylesheet) {

      default:
      case 0:
         echo '.ui-datepicker-calendar a.ui-state-default { text-shadow:none; }';
         echo 'body { word-wrap: break-word; font-family: Arial, Helvetica, sans-serif;font-size: 18px; }';
         echo '#footer-content {width: 100%; margin: 0px auto;  text-align: center;}';
         echo '#searchurl { color:green; }';
         echo '#matchurl { }';
         echo '#menu-bg { height: 30px; }';
         echo '#menu {width: 100%; margin: 0 auto;}';
         echo '#menu ul {margin: 0;padding: 0;list-style: none;}';
         echo '#menu li {display: inline;}';
         //echo '#menu a { word-wrap: break-word;display: block;float: left;margin: 0 3px 0 0; padding: 12px 15px 10px 15px;'.
         echo '#menu a { word-wrap: break-word;display: block;float: left;margin: 0 3px 0 0; padding: 7px 15px 7px 15px;'.
         //     ' border: none;text-decoration: none;text-transform: uppercase; }';
              ' border: none;text-decoration: none; }';
         echo '#menu a:hover { word-wrap: break-word;margin: 0 3px 0 0; border-bottom: 3px solid;}';
         echo '#menu .current_page_item a {margin: 0 3px 0 0; border-bottom: 3px solid;}';
         echo '#flex { width: 100% }';
         echo '#chartdiv { background-color:white; }';
         echo '#content {float: left; width: 49%; padding-right: 10px; }';
         echo '.logs th {margin: 0 0 10px 0;padding: 10px 15px 10px 15px;font-size: 12px;text-align:center;font-weight: normal; background:rgb(240,240,240); color:black}';
	 echo 'hr { border-color: inherit;}';
         break;

      case 1:
         // S1 
         echo '.ui-datepicker-calendar a.ui-state-default { text-shadow:none; }';
         echo 'body {word-wrap: break-word; margin: 0;padding: 0;width: 100%; background: #616d7e;'.
              ' font-family: Arial, Helvetica, sans-serif;font-size: 16px;color: #FFFFFF; }';
         //echo 'body {word-wrap: break-word; margin: 0;padding: 0;width: 100%; background: #616d7e;'.
         //     ' font-family: Arial, Helvetica, sans-serif;font-size: 13px;color: #FFFFFF; }';
         echo 'h1, h2, h3 {margin-top: 0;color: #FFFFFF;text-shadow: 0 2px 2px #000000;}';
         echo 'h1 {font-size: 2em; text-shadow: 0 2px 2px #000000;}';
         echo 'h2 {font-size: 1.6em;text-shadow: 0 2px 2px #000000;}';
         echo 'h3 {font-size: 1.2em;text-shadow: 0 2px 2px #000000;}';
         echo 'ul {}';
         echo 'a { word-wrap: break-word; text-decoration: none;color: #FFFFFF;text-shadow: 0 2px 2px #000000;}';
         echo 'a:visited {color: #FFFFFF; word-wrap: break-word;border-bottom: none;text-shadow: 0 2px 2px #000000;}';
         echo 'a:hover {color: silver; word-wrap: break-word;border-bottom: none;text-shadow: 0 2px 2px #000000;}';
         echo 'a:hover:visited {color: silver; word-wrap: break-word;border-bottom: none;text-shadow: 0 2px 2px #000000;}';
         echo 'a img { word-wrap: break-word;border: none;}';
         echo 'img.left {float: left;margin: 0 20px 0 0;}';
         echo 'img.right {float: right;margin: 0 0 0 20px;}';
         echo '#header {width: 100%;}';
//         echo '#logo {width: 100%; margin: 0 auto;padding: 0 10px; }';
         echo '#logo {width: 100%; margin: 0 auto; }';
         echo '#logo h1, #logo p {float: left;margin: 0;color: #FFFFFF;}';
         echo '#logo h1 {padding: 10px 0 0 0; font-weight: normal;font-size: 3em;text-shadow: 0 2px 2px #000000;}';
         echo '#logo h1 img {vertical-align: middle}';
         echo '#logo form {float: right;padding: 5px 15px 0 0; font-size: 10px;color: #000000;}';
         echo '#logo p {text-transform: uppercase;padding: 60px 0 0 3px; font-size: 10px;color: #000000;}';
         echo '#logo a { word-wrap: break-word;border: none;text-decoration: none;color: #000000;}';
//         echo '#menu-bg {background: #25383c; height: 39px; }';
         echo '#menu-bg { height: 39px; }';
         echo '#menu {width: 100%; margin: 0 auto;text-shadow: 0 2px 2px #000000;}';
         echo '#menu ul {margin: 0;padding: 0;list-style: none;}';
         echo '#menu li {display: inline;}';
//         echo '#menu a { word-wrap: break-word;display: block;float: left;margin: 0 3px 0 0; padding: 12px 15px 10px 15px;'.
//              ' border: none;text-decoration: none;text-transform: uppercase;font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #DDBB04; }';
         echo '#menu a { word-wrap: break-word;display: block;float: left;margin: 0 3px 0 0; padding: 12px 15px 10px 15px;'.' border: none;text-decoration: none;text-transform: uppercase;font-family: Arial, Helvetica, sans-serif;font-size: 14px; font-weight: bold;}';
//         echo '#menu a:hover { word-wrap: break-word;margin: 0 3px 0 0;background: #191E1A; border-bottom: 3px solid #DDBB04;color: #FFFFFF;}';
         echo '#menu a:hover { word-wrap: break-word;margin: 0 3px 0 0; border-bottom: 3px solid white;color: #FFFFFF;}';
//         echo '#menu .current_page_item a {margin: 0 3px 0 0;background: #191E1A;border-bottom: 3px solid #DDBB04;color: #FFFFFF;}';
         echo '#menu .current_page_item a {margin: 0 3px 0 0; border-bottom: 3px solid white;color: #FFFFFF;}';
         echo '#wrapper { margin-left: 1%; margin-right: 1%;}';
         echo '#page {width: 100%; margin: 0 auto;padding: 15px 0; }';
         echo '#page-bg {padding: 11px 24px;}';
         echo '#content {float: left; width: 49%; padding-right: 10px; }';
         echo '#login {}';
         echo '#login a { word-wrap: break-word;}';
         echo '#login a:hover { word-wrap: break-word;}';
         echo '#login a:visited { word-wrap: break-word;}';
         echo '.contentbar h2 {margin: 0 0 10px 0;  padding: 10px 15px 10px 15px; background: #25383c; font-size: 16px;font-weight: normal;color: #FFFFFF; }';
         //echo '.logs th {margin: 0 0 10px 0;padding: 10px 15px 10px 15px;background: #25383c; font-size: 12px;font-weight: normal;text-align:center;}';
         echo '.logs th {margin: 0 0 10px 0;padding: 10px 15px 10px 15px;font-size:16px;font-weight:normal;text-align:center; background:rgb(204,204,204); color:black;}';
         echo '.message {float: left;width: 65%;}';
         echo '.panel {float: left;width: 75%;}';
         echo '#lhtable {}';
//         echo '#footer {background: #25383c; height: 100px; }';
//         echo '#footer {height: 100px; }';
         echo '#footer {}';
         echo '#footer-content {width: 100%; margin: 0px auto;  text-align: center;}';
         echo '#footer p {margin: 0; padding: 20px 0 0 0; text-align: center;text-transform: uppercase;font-size: 10px;color: #FCFFFD; }';
         echo '#footer a { word-wrap: break-word;}';
         echo '#searchurl { color:lime; }';
         echo '#matchurl { color:lime; }';
         echo '#flex { width: 100% }';
         echo '#chartdiv { background-color:white; }';
	 echo 'hr { border-color: white;}';
         break;

      case 2:
         // S2
         echo '.ui-datepicker-calendar a.ui-state-default { text-shadow:none; }';
         echo 'body{word-wrap: break-word; margin: 30px 0px 0px 0px;padding: 0;width: 100%; background: #E6E6E6;font-family: Arial, Helvetica, sans-serif;font-size: 12px;color: #8F8F8F;}';
         echo 'h1, h2, h3{text-transform: lowercase;font-family: Oswald, sans-serif;font-weight: 400;color: #7D7764;margin: 0;padding: 0;}';
         echo 'h2{font-size: 3em;}';
         echo 'p, ol, ul{margin-top: 0px;padding: 0px; list-style: none;}';
         echo 'p, ol{line-height: 180%;}';
         echo 'strong{}';
         echo 'a{color: #5C5539;}';
         echo 'a:hover{text-decoration: none;}';
         echo 'a img{border: none;}';
         echo 'img.border{}';
         echo 'img.alignleft{float: left;}';
         echo 'img.alignright{float: right;}';
         echo 'img.aligncenter{margin: 0px auto;}';
         echo 'hr{display: none;}';
         echo '#wrapper{ margin-left: 1%; margin-right: 1%;overflow: hidden;width: 100%;background: #FFFFFF;box-shadow: 0px 0px 20px rgba(0,0,0,.3);}';
         echo '.container{width: 1000px;margin: 0px auto;}';
         echo '.clearfix{clear: both;}';
         echo '#header{width: 100%;margin: 0 auto;padding: 0px 0px;}';
         echo '#logo{float: left;text-align: center;}';
         echo '#logo h1{padding: 50px 0px 0px 0px;text-transform: lowercase;letter-spacing: -2px;font-size: 3.6em;font-weight: 700;}';
         echo '#logo h1 a{text-decoration: none;color: #FFFFFF;}';
         echo '#logo p{margin-top: -5px;text-transform: uppercase;color: #44C1FF;}';
         echo '#logo a {color: #44C1FF;}';
         echo '#menu{ margin-left: 1%;float: left;width:100%;height: 80px;}';
         echo '#menu ul{float: left;margin: 0;padding: 40px 0px 0px 0px;list-style: none;line-height: normal;}';
         echo '#menu li{float: left;list-style: none;}';
         echo '#menu a{display: block;padding: 7px 20px 7px 20px;letter-spacing: 1px;text-decoration: none;text-align: center;text-transform: uppercase;font-family: Oswald, sans-serif;font-size: 16px;font-weight: 300;color: #757575;}';
         echo '#menu .current_page_item a{background:#25A6E1;background:-moz-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #25A6E1), color-stop(100%, #188BC0));background:-webkit-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:-o-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:-ms-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:linear-gradient(top, #25A6E1 0%, #188BC0 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#25A6E1, endColorstr=#188BC0, GradientType=0);border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius:4px;border:1px solid #1A87B9;color:#fff;}';
         echo '.panel {float: left;width: 75%;}';
         echo '#page-wrapper{overflow: hidden;}';
         echo '#page{overflow: hidden;width: 100%;margin: 0px auto;padding: 50px 40px;color: #8F8F8F;}';
         echo '#wide-content{}';
         echo '#wide-content h2{padding: 0px 0px 20px 0px;letter-spacing: -1px;font-size: 36px;color: #222222;}';
         echo '#content{float: left;width: 49%;padding: 0px 0px 0px 0px;margin-right: 10px;}';
         echo '#content h2{padding: 0px 0px 20px 0px;letter-spacing: -1px;font-size: 36px;color: #222222;}';
         echo '#content .subtitle{padding: 0px 0px 30px 0px;text-transform: uppercase;font-family: Oswald, sans-serif;font-size: 18px;color: #81AFC5;}';
         echo '.contentbar { margin-left: 1%; margin-right: 1%;}';
         echo '#footer{height: 100px;margin: 0 auto;padding: 50px 0px 15px 0px;}';
         echo '#footer p{text-shadow: 1px 1px 0px #FFFFFF;text-align: center;font-size: 12px;color: #4D565E;}';
         echo '#footer a{color: #4D565E;}';
         echo '#footer-wrapper{background: #F1F2E9;}';
         echo '#footer-content{overflow: hidden;width: 100%;margin: 0px auto;padding: 50px 40px;color: #717171;}';
         echo '#footer-content a{}';
         echo '#footer-content h2{margin: 0px;padding: 0px 0px 30px 0px;letter-spacing: -1px;font-size: 30px;color: #36332E;}';
         echo '#footer-content #fbox1{float: left;width: 280px;margin-right: 30px;}';
         echo '#footer-content #fbox2{float: left;width: 500px;}';
         echo '#footer-content #fbox3{float: right;width: 280px;}';
         echo '#banner-wrapper{}';
         echo '#banner{overflow: hidden;width: 1120px;margin: 40px auto 0px auto;}';
         echo '.button-style{display: inline-block;margin-top: 30px;background:#25A6E1;background:-moz-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #25A6E1), color-stop(100%, #188BC0));background:-webkit-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:-o-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:-ms-linear-gradient(top, #25A6E1 0%, #188BC0 100%);background:linear-gradient(top, #25A6E1 0%, #188BC0 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#25A6E1, endColorstr=#188BC0, GradientType=0);border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius:4px;border:1px solid #1A87B9;color:#fff;}';
         echo '.button-style a{display: inline-block;padding: 10px 20px;letter-spacing: 1px;text-decoration: none;text-transform: uppercase;font-family: Oswald, sans-serif;font-weight: 300;font-size: 16px;color: #FFFFFF;}';
         echo 'ul.style1{margin: 0px;padding: 0px;list-style: none;}';
         echo 'ul.style1 li{padding: 20px 0px 20px 0px;border-top: 1px dashed #E6E7DC;list-style: none;}';
         echo 'ul.style1 a{text-decoration: none;color: #6B6B6B;list-style: none;}';
         echo 'ul.style1 a:hover{text-decoration: underline;color: #6B6B6B;list-style: none;}';
         echo 'ul.style1 .first{padding-top: 0px;border-top: none;list-style: none;}';
         echo 'ul.style2{margin: 0px;padding: 0px;list-style: none;}';
         echo 'ul.style2 li{padding: 15px 0px 15px 0px;border-top: 1px solid #E6E7DC;list-style: none;}';
         echo 'ul.style2 .first{padding-top: 0px;border-top: none;list-style: none;}';
         echo 'ul.style3{margin: 0px;padding: 0px;list-style: none;}';
         echo 'ul.style3 li{padding: 20px 0px 20px 0px;border-top: 1px solid #E6E7DC;list-style: none;}';
         echo 'ul.style3 p{margin: 0px;padding: 0px;list-style: none;}';
         echo 'ul.style3 img{float: left;margin-top: 3px;margin-right: 20px;list-style: none;}';
         echo 'ul.style3 .posted{padding: 10px 0px 10px 0px;font-size: 8pt;color: #A2A2A2;list-style: none;}';
         echo 'ul.style3 .first{padding-top: 0px;border-top: none;list-style: none;}';
         echo '.button-style1{margin-top: 30px;}';
         echo '.button-style1 a{padding: 10px 25px;background: #EBB462;border-radius: 5px;text-decoration: none;text-shadow: 1px 1px 0px #FCE3BB;color: #36332E !important;}';
         echo '#searchurl { color:green; }';
         echo '#matchurl { color:green; }';
         echo '#flex { width: 100% }';
         echo '#chartdiv { background-color:white; }';
	 echo 'hr { border-color: inherit;}';
         break;   

      case 3:
         // S3
         echo '.ui-datepicker-calendar a.ui-state-default { text-shadow:none; }';
         echo 'body {word-wrap: break-word; margin: 0;padding: 0;background: #0048B3 font-family: Tahoma, Geneva, sans-serif;font-size: 13px;color: #626262;}';
         echo 'h1, h2, h3 {margin: 0;padding: 0;text-transform: lowercase;font-family: Oswald, sans-serif;font-weight: 300;color: #7D7764;}';
         echo 'h1 {font-size: 2em;}';
         echo 'h2 {font-size: 1.6em;}';
         echo 'h3 {font-size: 1.2em;}';
         echo 'p, ul, ol {margin-top: 0;line-height: 180%;list-style: none;}';
         echo 'ul, ol {list-style: none;}';
         echo 'a {text-decoration: none;color: #C1002D;}';
         echo 'a:hover {}';
         echo '#wrapper {overflow: hidden;background: #FFFFFF;}';
         echo '.container {width: 1200px;margin: 0px auto;}';
         echo '#header {margin: 0 auto;}';
         echo '#logo {overflow: hidden;font-family: Oswald, sans-serif;}';
         echo '#logo h1, #logo p {text-transform: uppercase;}';
         echo '#logo h1 {letter-spacing: -1px;font-size: 60px;}';
         echo '#logo p {margin-top: -20px;padding: 0px 0px 0px 55px;font-size: 20px;font-weight: 300;color: #B8D1EE;}';
         echo '#logo p a {color: #696969;}';
         echo '#logo a {border: none;background: none;text-decoration: none;color: #FFFFFF;}';
         echo '#menu-wrapper {overflow: hidden;height: 80px;}';
         echo '#menu {overflow: hidden;height: 80px;background: #b2002a;}';
         echo '#menu ul {margin: 0;padding: 0px 0px 0px 0px;list-style: none;line-height: normal;font-family: Oswald, sans-serif;}';
         echo '#menu li {display: inline-block;border-right: 1px solid #fc2c5d;}';
         echo '#menu a {display: block;height: 80px;margin: 0px;padding: 0px 30px;line-height: 80px;text-decoration: none;text-transform: lowercase;text-transform: uppercase;font-size: 20px;font-weight: 300;color: #FFFFFF;border: none;}';
         echo '#menu a:hover, #menu .current_page_item a {background: #d50032;text-decoration: none;color: #FFFFFF;}';
         echo '#menu .current_page_item a {}';
         echo '.panel {float: left;width: 75%;}';
         echo '#page {overflow: hidden;padding: 50px 0px 40px 0px;}';
         echo '#content {float: left;width: 49%;margin-right: 10px;padding: 0px 0px 0px 0px;}';
         echo '#content h2 {padding: 0px 0px 20px 0px;text-transform: uppercase;font-size: 3em;font-weight: 200;color: #262626;}';
         echo '.contentbar { margin-left: 1%; margin-right: 1%;}';
         echo '#footer-bg {overflow: hidden;padding: 50px 0px;}';
         echo '#footer-content {color: #FFB3C5;}';
         echo '#footer-content h2 {margin: 0px;padding: 0px 0px 20px 0px;letter-spacing: 1px;text-transform: uppercase;font-size: 20px;font-weight: 200;color: #FFFFFF;}';
         echo '#footer-content a {color: #FFB3C5;}';
         echo '#footer-content a:hover {text-decoration: underline;}';
         echo '#column1 {float: left;width: 280px;margin-right: 30px;}';
         echo '#column1 p {line-height: 1;}';
         echo '#column2 {float: left;width: 280px;margin-right: 30px;}';
         echo '#column3 {float: left;width: 280px;}';
         echo '#column4 {float: right;width: 260px;}';
         echo '#footer {height: 100px;margin: 0 auto;padding: 50px 0px 0px 0px;}';
         echo '#footer p {margin: 0;padding-top: 10px;line-height: normal;text-align: center;color: #C59C9C;}';
         echo '#footer a {color: #C59C9C;}';
         echo '#marketing {overflow: hidden;margin-bottom: 30px;padding: 20px 0px 10px 0px;border-top: 1px solid #E3E3E3;border-bottom: 1px solid #E3E3E3;}';
         echo '#marketing .text1 {float: left;margin: 0px;padding: 0px;letter-spacing: -2px;text-transform: lowercase;font-size: 34px;color: #345E9B;}';
         echo '#marketing .text2 {float: right;}';
         echo '#marketing .text2 a {display: block;width: 252px;height: 38px;padding: 15px 0px 0px 0px;letter-spacing: -2px;text-align: center;text-transform: lowercase;font-size: 30px;color: #FFFFFF;}';
         echo '.box1 {overflow: hidden;height: 300px;}';
         echo '.list-style1 {margin: 0px;padding: 0px;list-style: none;}';
         echo '.list-style1 li {padding: 7px 0px 7px 0px;border-top: 1px dashed #E7E2DC;}';
         echo '.list-style1 .first {padding-top: 0px;border-top: none;}';
         echo '.list-style2 {margin: 0px;padding: 0px;list-style: none;}';
         echo '.list-style2 li {padding: 5px 0px 5px 0px;border-top: 1px solid #EEEEEE;}';
         echo '.list-style2 a {padding-left: 15px;color: #717171;}';
         echo '.list-style2 a:hover {text-decoration: underline;color: #606060;}';
         echo '.list-style2 .first {padding-top: 0px;border: none;}';
         echo '.list-style3 {margin: 0px;padding: 0px;list-style: none;}';
         echo '.list-style3 li {padding: 5px 0px 5px 0px;border-top: 1px solid #890020;}';
         echo '.list-style3 a {padding-left: 15px;color: #FFB3C5;}';
         echo '.list-style3 a:hover {text-decoration: underline;}';
         echo '.list-style3 .first {padding-top: 0px;background: none;border: none;}';
         echo '#four-column {overflow: hidden;padding: 30px 0px 30px 0px;border-top: 1px solid #EEEEEE;color: #626262;}';
         echo '#four-column #tbox1 {float: left;width: 282px;margin-right: 24px;}';
         echo '#four-column #tbox2 {float: left;width: 282px;margin-right: 24px;}';
         echo '#four-column #tbox3 {float: left;width: 282px;}';
         echo '#four-column #tbox4 {float: right;width: 282px;}';
         echo '.box-style {background: #191919;}';
         echo '.box-style h2 {padding: 10px 0px;letter-spacing: -1px;text-transform: uppercase;font-size: 20px;font-weight: 200;color: #515151;}';
         echo '.box-style .image {width: 320px;}';
         echo '.box-style .arrow {}';
         echo '.box-style .content {overflow: hidden;padding: 30px;}';
         echo '.divider {overflow: hidden;height: 50px;}';
         echo '#searchurl { color:green; }';
         echo '#matchurl { color:green; }';
         echo '#flex { width: 100% }';
         echo '#chartdiv { background-color:white; }';
	 echo 'hr { border-color: inherit;}';
         break;   

      case 4:
         // S4
         echo '.ui-datepicker-calendar a.ui-state-default { text-shadow:none; }';
         echo '* {word-wrap: break-word; margin: 0;padding: 0;}';
         echo 'a {color: #5C5539;text-decoration: none;}';
         echo 'a:hover {text-decoration: none;}';
         echo 'html {}';
         echo 'table.dashboard {line-height: 10pt;color: #6B7C93;font-size: 12pt;}';
         echo 'body {line-height: 1.5em;color: #6B7C93;font-size: 12pt;}';
         echo 'body,input {font-family: Arial, sans-serif;}';
         echo 'br.clearfix {clear: both;}';
         echo 'strong {color: #333333;}';
         echo 'h1,h2,h3,h4 {color: #5C5539;}';
         echo 'h2 {font-size: 1.6em;}';
         echo 'h2,h3,h4 {color: #5C5539;}';
         echo 'h3 {font-size: 1.5em;}';
         echo 'h4 {font-size: 1.25em;}';
         echo 'img.alignleft {margin: 5px 20px 20px 0;float: left;}';
         echo 'img.aligntop {margin: 5px 0 20px 0;}';
         echo 'p {margin-bottom: 1.5em;}';
         echo 'ul {margin-bottom: 1.5em; list-style: none;}';
         echo 'ul h4 {margin-bottom: 0.35em; list-style: none;}';
         echo '.box {overflow: hidden;margin: 0 0 1em 0;}';
         echo '#content {float: left;width: 49%; padding-right: 10px; }';
         echo '#footer {margin: 50px 0 100px 0;text-align: center;color: #626E7F;}';
         echo '#footer a {color: #626E7F;}';
         echo '#header {background: #2C84AF;color: #FFFFFF;height: 140px;position: relative;padding: 40px;'.
              'border-radius: 10px;border-top: solid 1px #96D0F7;border-bottom: solid 1px #0C3459;}';
         echo '#logo {width: 100%; position: absolute;margin: 0 auto;padding: 0 10px; height: 140px;}';
         echo '#logo h1, #logo p {float: left;margin: 0;color: #FFFFFF;}';
         echo '#logo h1 {font-weight: normal;font-size: 3em;text-shadow: 0 2px 2px #0E3E68;}';
         echo '#logo h1 img {vertical-align: -250%;}';
         echo '#logo form {float: right;padding: 0 85px 0 0; font-size: 10px;color: #000000;}';
         echo '#logo p {text-transform: uppercase;padding: 60px 0 0 3px; font-size: 10px;color: #000000;}';
         echo '#logo a { word-wrap: break-word;border: none;text-decoration: none;color: #FFFFFF;}';
         echo '#menu { float: right;height: 62px;right: 30px;line-height: 62px;top: 10px;position: absolute;}';
         echo '#menu a {text-transform: lowercase;text-decoration: none;color: #FFFFFF;font-size: 1.25em;}';
         echo '#menu ul { float: left; padding: 0 25px 0 25px;list-style: none;}';
         echo '#menu ul li {padding: 10px 15px 10px 15px;display: inline;text-shadow: 0 1px 1px #0E3E68; list-style: none;}';
         echo '#menu ul li.current_page_item {background: #56AFD8;border-top: solid 1px #82D9ED;border-bottom: solid 1px #24627C;'.
              'border-radius: 5px; list-style: none;}';
         echo '#menu ul li.last {padding-right: 0; list-style: none;}';
         echo '#page {position: relative;margin: 20px 0 20px 0;padding: 0;width: 100%;}';
         echo '#page .section-list {padding-left: 0;list-style: none;}';
         echo '#page .section-list li {clear: both;padding: 25px 0 25px 0;}';
         echo '#page ul {list-style: none;}';
         echo '#page ul li {padding: 15px 0 15px 0;border-top: dotted 1px #C5CDD8; list-style: none;}';
         echo '#page ul li.first {padding-top: 0;border-top: 0; list-style: none;}';
         echo '#search input.form-submit {background: #B87A23;padding: 5px;color: #FFFFFF;border: 0;margin-left: 1em;}';
         echo '#search input.form-text {padding: 10px;border: dotted 1px #569DBF;}';
         echo '.panel {float: left;width: 75%;}';
         echo '#wrapper {position: relative;margin: 0 auto 0 auto;padding: 10px 0 0 0; margin-left: 1%; margin-right: 1%;}';
         echo '#searchurl { color:green;font-weight:bold; }';
         echo '#matchurl { color:green;font-weight:bold; }';
         echo '#flex { width: 100% }';
         echo '#chartdiv { background-color:white; }';
	 echo 'hr { border-color: inherit;}';
        break;   
      }
   }
   echo '</style>';
}

function top_sparse($page_title)
{
   global $sitename;
   global $keywords;

   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
   echo '<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">';
   echo '<head>';
   echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>';
   echo '<title>'.(isset($page_title) ? $page_title : $sitename).'</title>';
   echo '<meta name="keywords" content="'.$keywords.'"/>';
   echo '<link rel="shortcut icon" href="'.imageURL().'favicon.ico">';
   echo '</head>';
   echo '<body>';
}

function bottom_sparse()
{
   echo '</body>';
   echo '</html>';
}

function top($page_title)
{
   global $sitename;
   global $keywords;

   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
   echo '<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">';
   echo '<head>';
   echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>';
   echo '<title>'.(isset($page_title) ? $page_title : $sitename).'</title>';
   echo '<meta name="keywords" content="'.$keywords.'"/>';
   style_sheet();
   echo '<script type="text/javascript">';
   echo "function gotofind() { document.getElementById('find').focus(); }";
   echo '</script> ';
   echo '<link rel="shortcut icon" href="'.imageURL().'favicon.ico">';
   //echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
   //echo '<title>Datepicker</title>';
   echo '<link rel="stylesheet" href="scripts/jquery-ui.css">';
   echo '<script src="scripts/jquery-3.6.0.js"></script>';
   echo '<script src="scripts/jquery-ui.js"></script>';
   echo '<script>';
   echo '$( function() {';
   echo '  $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd"});';
   echo '  $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd"});';
   echo '  $( "#ipsel1" ).document.getElementsByName("ipsel2")[0].submit();';
   echo '} );';
   echo '</script>';
   echo '</head>';
   echo '<body>';
   logo();
   menu();   
}

function bottom()
{
   global $siteowner, $copyright_years;

   echo '<div id="footer">';
   echo '<div id="footer-content">';
   echo '<a href="'.baseURL().'?page=termsofservice">Copyright &copy;'.$copyright_years.' '.$siteowner.'&trade;.  All Rights Reserved.<br/></a>';
   echo 'This site uses cookie tracking technology. See the ';
   echo '<a href="'.baseURL().'?page=termsofservice">Terms of Service</a> and <a href="'.baseURL().'?page=privacy">Site Privacy Policy<br/></a>';
   echo '<a href="http://www.thelinuxfoundation.org">"<b>Leaf Linux</b>" is an approved trademark sublicense granted by The Linux Foundation</a>';
   echo '</div>';
   echo '</div>';
   echo '<br style="clear:both;"/>';

   echo '</body>';
   echo '</html>';
}

function menu_highlight($item, $home = "")
{
    global $page;

    //foreach ($_GET as $f => $v)
    //   $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

    if (isset($page) and (trim($page) == trim($item)))
       return ' class="current_page_item"';
    return "";
}

function logo()
{
   global $sitename;
   global $logoimage;
   global $logoname;
   global $tagline;
   echo '<div id="header">';
   echo '<div id="logo">';
   echo '<h1><a href="'.baseURL().'"><img src="'.imageURL().$logoimage.'" alt="" title="'.$sitename.'"/></a>  '.
        $logoname.' <span style="font-size:10pt;">'.$tagline.'</span></h1>';
   echo '</div>';
   echo '</div>';
   echo '<br style="clear:both;"/>';
}

function menu()
{
   global $adminuser;

   echo '<div id="menu-bg">';
   echo '<div id="menu">';
   echo '<ul id="main">';
   echo '<li'.(($class = menu_highlight("home") or $class = menu_highlight("login")) ? $class : "").'>';
   echo '<a href="'.baseURL().'?page=home">Home</a></li>';
   echo '<li'.menu_highlight("digest").'>';
   echo '<a href="'.baseURL().'?page=digest">Digest</a></li>';
   echo '<li'.(($class = menu_highlight("all") or $class = menu_highlight("search")) ? $class : "").'>';
   echo '<a href="'.baseURL().'?page=all">Search</a></li>';
   echo '<li'.menu_highlight("alerts").'>';
   echo '<a href="'.baseURL().'?page=alerts">Alerts</a></li>';
   echo '<li'.menu_highlight("graphs").'>';
   echo '<a href="'.baseURL().'?page=graphs">Graphs</a></li>';
   echo '<li'.menu_highlight("cluster").'>';
   echo '<a href="'.baseURL().'?page=cluster">Cluster</a></li>';

   if (check_permissions($adminuser, 0) == 1) {
      echo '<li'.menu_highlight("system").'>';
      echo '<a href="'.baseURL().'?page=system">System</a></li>';
      echo '<li'.menu_highlight("config").'>';
      echo '<a href="'.baseURL().'?page=config">Config</a></li>';
   }

   echo '</ul>';
   echo '</div>';
   echo '</div>';
   echo '<br style="clear:both;"/>';
   usermenu();
}

function usermenu()
{
   global $adminuser, $adminpassword;
   global $db_client;

   if (!isset($_SESSION['activename']))
      return;
   $name = $_SESSION['activename'];

   foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   echo '<fieldset>';
   echo '<div style="margin: 0;padding: 0;list-style: none; font-size: 11pt;"';
   echo '<ul>';

   if ($name)
   {
      echo '<li style="display: inline;">';
      echo '<a href="'.baseURL().'?page=account&amp;username='.$name.'"><b>User:'.$name.'</b></a>';
      echo '   </li>';

      if (!is_admin()) {
              echo '<li style="display: inline;">';
              echo '<a href="'.baseURL().'?page=account&amp;action=myaccount&amp;username='.$name.'">&bull;&nbsp;'.
	           ((isset($action) or isset($page)) ? ((isset($action) and ($action == "myaccount") or 
	          ($page == "account" and (!isset($action) or !$action))) 
	          ? '<b>Account</b>': 'Account') : 'Account').'</a>';
             echo '   </li>';

             echo '<li style="display: inline;">';
             echo '<a href="'.baseURL().'?page=account&amp;action=mypasswd&amp;username='.$name.'">&bull;&nbsp;'.
        	  (isset($action) ? ($action == "mypasswd" ? '<b>Password</b>': 'Password') : 'Password').
	          '</a>';
             echo '   </li>';
      }
   }

   if (is_admin())
   {
      echo '<li style="display: inline;">';
      echo '<a href="'.baseURL().'?page=allaccounts">&bull;&nbsp;'.
           (isset($page) ? ($page == "allaccounts" ? '<b>Accounts</b>': 'Accounts') : 'Accounts').
           '</a>';
      echo '   </li>';

      echo '<li style="display: inline;">';
      echo '<a href="'.baseURL().'?page=newaccount">&bull;&nbsp;'.
           (isset($page) ? ($page == "register" ? '<b>New Account</b>': 'New Account') : 'New Account').
           '</a>';
      echo '   </li>';

      echo '<li style="display: inline;">';
      echo '<a href="'.baseURL().'?page=accesslog">&bull;&nbsp;'.
           (isset($page) ? ($page == "accesslog" ? '<b>Logs</b>': 'Logs') : 'Logs').
           '</a>';
      echo '   </li>';

      if (check_permissions($adminuser, NULL) == 1) {
         echo '<li style="display: inline;">';
         echo '<a href="'.baseURL().'?page=spider">&bull;&nbsp;'.
              (isset($page) ? ($page == "spider" ? '<b>Spider</b>': 'Spider') : 'Spider').
              '</a>';
         echo '   </li>';

         echo '<li style="display: inline;">';
         echo '<a href="'.baseURL().'?page=add">&bull;&nbsp;'.
              (isset($page) ? ($page == "add" ? '<b>Add</b>': 'Add') : 'Add').
              '</a>';
         echo '   </li>';
/*
         echo '<li style="display: inline;">';
         echo '<a href="'.baseURL().'?page=edit">&bull;&nbsp;'.
              (isset($page) ? ($page == "edit" ? '<b>Edit</b>': 'Edit') : 'Edit').
              '</a>';
         echo '   </li>';
*/
         echo '<li style="display: inline;">';
         echo '<a href="'.baseURL().'?page=sql">&bull;&nbsp;'.
              (isset($page) ? ($page == "sql" ? '<b>SQL</b>': 'SQL') : 'SQL').
              '</a>';
         echo '   </li>';
      }

      if (!isset($_SESSION['activename']) or !($_SESSION['activename'])) {
         echo '<li style="display: inline;">&bull;&nbsp;';
         echo '<a href="'.baseURL().'?page=login">Login</a>';
         echo '   </li>';
      } else {
         echo '<li style="display: inline;">&bull;&nbsp;';
         echo '<a href="'.baseURL().'?page=logout">Logout</a>';
         echo '   </li>';
      }
   }
   else
   {
      if (!isset($_SESSION['activename']) or !($_SESSION['activename'])) {
         echo '<li style="display: inline;">&bull;&nbsp;';
         echo '<a href="'.baseURL().'?page=account">Login</a>';
         echo '   </li>';
      } else {
         echo '<li style="display: inline;">&bull;&nbsp;';
         echo '<a href="'.baseURL().'?logout">Logout</a>';
         echo '   </li>';
      }
   }
   echo '</ul>';
   echo '</div>';
   echo '</fieldset>';
   echo '<br style="clear:both;"/>';
}

function tracking()
{
    global $traffic_monitor;

    if ($traffic_monitor)
    {
       file_put_contents($_SERVER['DOCUMENT_ROOT'].'/logs/access_log', 
                          date('Y-m-d H:i:s').','.
                          $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].','.
                          $_SERVER['REMOTE_ADDR'].','.
                          gethostbyaddr($_SERVER['REMOTE_ADDR']).','.
                          str_replace(',', ' ', $_SERVER['HTTP_USER_AGENT']).','.
                          (isset($_SESSION['activename']) ? $_SESSION['activename'] : "")."\n", 
                          FILE_APPEND);
    }
    //block_ip();
    return;
}

function block_message($addrinfo)
{
   global $sitename;

   top_sparse($sitename." | Blocked");
   print '<fieldset>';
   print '<br/><div style="text-align:center; font-size:16pt; font-weight:bold;">';
   print "The IP address ".$addrinfo." is not enabled to access this site.<br/><br>";
   print "</div>";
   print '</fieldset>';
   print '<br style="clear:both;"/>';
   bottom_sparse();
   return;
}

function block_ip_db()
{
    $dbh = new DB();
    if ($dbh)
    {    
       $ip = $_SERVER['REMOTE_ADDR'];
       $ipnum = ip2long($ip);
       $ipv4 = long2ip($ipnum);

       $sql = "SELECT * from block where ip='".$ipnum."' and deleted='0' LIMIT 1";
       $res = $dbh->query($sql);
       $o = $dbh->fetch_object($res);
       if ($o)
       {
          $f = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/block_log', 'a+');
          if ($f) 
          {
             fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']." blocked\n");
             fclose($f);
          }
          $dbh->close();
          return 1;
       }
       $dbh->close();
    }
    return 0;
}

function block_ip()
{
   foreach ($_GET as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($block) and $block and ($block == 'test'))
   {
      $f = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/block_log', 'a+');
      if ($f) 
      {
         fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']." blocked\n");
         fclose($f);
      }
      block_message($_SERVER['REMOTE_ADDR']);
      exit();
   }

   $ip = $_SERVER['REMOTE_ADDR'];
   if (filter_var($ip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) 
   {
      block_message('[IPv6 Address: '.$ip.']');
      exit();
   }
   else if (filter_var($ip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false) 
   {
      $ipnum = ip2long($ip);
      $ipv4 = long2ip($ipnum);

      $blockfile = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/acl/clients-allow.conf');
      $blocklist = explode("\n", $blockfile);
      $lines = array();
      foreach ($blocklist as $key => $v) {
         $text = rtrim(trim($v));
         if (!strstr($text, '#')) 
            $lines[] = $text;
      }
      $lines = array_values(array_filter($lines));

      for ($i = 0; $i < count($blocklist); $i++)
      {
         $addrinfo = explode("/", $blocklist[$i]);
         if (!$addrinfo)
            continue;

         $addrsize = count($addrinfo); 
         if (($addrsize > 1) && ($addrinfo[1] < 32))
         {
            $iplist = (ip2long($addrinfo[0]) >> (32 - $addrinfo[1]));
            $ipremote = ($ipnum >> (32 - $addrinfo[1]));
            if ($iplist == $ipremote)
            {
               $f = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/block_log', 'a+');
               if ($f) 
               {
                  fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']." allow (IPv4)\n");
                  fclose($f);
               }
               return;
            }
         }
         else
         {
            $iplist = ip2long($addrinfo[0]);
            if ($iplist == $ipnum)
            {
               $f = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/block_log', 'a+');
               if ($f) 
               {
                  fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']." allow (IPv4)\n");
                  fclose($f);
               }
               return;
            }
         }
      }

      $blockfile = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/acl/clients-deny.conf');
      $blocklist = explode("\n", $blockfile);
      $lines = array();
      foreach ($blocklist as $key => $v) {
         $text = rtrim(trim($v));
         if (!strstr($text, '#')) 
            $lines[] = $text;
      }
      $lines = array_values(array_filter($lines));
      //print_r($lines);
   
      for ($i = 0; $i < count($blocklist); $i++)
      {
         $addrinfo = explode("/", $blocklist[$i]);
         if (!$addrinfo)
            continue;

         $addrsize = count($addrinfo); 
         if (($addrsize > 1) && ($addrinfo[1] < 32))
         {
            $iplist = (ip2long($addrinfo[0]) >> (32 - $addrinfo[1]));
            $ipremote = ($ipnum >> (32 - $addrinfo[1]));
            if ($iplist == $ipremote)
            {
               $f = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/block_log', 'a+');
               if ($f) 
               {
                  fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']." blocked (IPv4)\n");
                  fclose($f);
               }
   
               block_message($_SERVER['REMOTE_ADDR']);
               exit();
            }
         }
         else
         {
            $iplist = ip2long($addrinfo[0]);
            if ($iplist == $ipnum)
            {
               $f = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/block_log', 'a+');
               if ($f) 
               {
                  fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']." blocked (IPv4)\n");
                  fclose($f);
               }

               block_message($_SERVER['REMOTE_ADDR']);
               exit();
            }
         }
      }
   }
   else
   {
      block_message('[Unknown IP Format: '.$ip.']');
      exit();
   }
   return;
}

/*
function blacklist($body)
{
    $file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/blacklist.conf'); 
    $data = str_ireplace("\n", "", $file);
    $list = explode(",", $data);

    $out = "";
    $words = explode(" ", $body);
    for ($i=0; $i < count($words); $i++)
    {
       if (!strmatch(trim($words[$i]), $list))
          $out .= str_repeat('*', strlen($words[$i])).' ';
       else
          $out .= $words[$i].' ';
    }

    return trim($out);
}
 */

function archive_logs()
{
    global $db_client;

    $ip = '';
    $dns = array();
    $total = 0;

    $dbh = new DB;
    $ret = $dbh->connect($db_client);
    if (!$ret)
    {    
      echo "<big>Could not connect to database</big><br/>";
      return;
    }

    if ($ret)
    {    
       $file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/logs/access_log'); 
       $lines = explode("\n", $file);
       foreach ($lines as $line)
       {
          $fields = explode(",", $line);
          if (isset($fields[2])) {
             $ip = $fields[2];
             $dns = $fields[3];
          }
          $newline = implode(',', $fields);

          $sql = "SELECT * from archive where data='".$newline."' and deleted='0' LIMIT 1";
          $res = $dbh->query($sql);
          $o = $dbh->fetch_object($res);
          if (!$o and isset($ip) and $ip)
          {
             $ins = array(
                'create_date' => date('Y-m-d-H:i:s'),
                'recordtype' => 1,   // web traffic
                'ip' => $ip,
                'dns' => $dns,
                'data' => $newline,
             );

             $cid = $dbh->insert('archive', $ins);
             if (!$cid) {
                echo 'Database insert error<br/>';
                return;  // return on error to prevent access_log overwrite if error
             }
             $total++;
          }
       }
       $dbh->close();

       if ($file) {
	  file_put_contents($_SERVER['DOCUMENT_ROOT'].'/logs/access_log-'.
	                    date('Y-m-d H:i:s'), $file); 
	  $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/access_log', "w+");
          if ($fp) {
             ftruncate($fp, 0); 
             fclose($fp);
          }
       }
    }
    return $total;
}


function show_access_log()
{
   global $adminuser;

   if (!check_permissions($adminuser, 1))
      return;

    display_log_table('archive', 
                      '<th>Date</th> '.
                      '<th>Request</th> '.
                      '<th>IP</th> '.
                      '<th>DNS</th> '.
                      '<th>User Agent</th> ',
                      //'<th>Account</th>',
                      'data',
                      'accesslog', 
                      'archive_logs', 
                      '<b>Importing access_log records ...</b><br/>');
    return;
}

function display_log_table($table, $header, $data, $page, $refresh, $notice)
{ 
   global $db_client;

   $export['header'] = array();
   $rowc = 0;

   if (!isset($table) or !$table)
      return;

   if (!isset($page) or !$page)
      return;

    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   unset($_SESSION['export_array']);

   $nh = strip_tags($header);
   $eh = explode(' ', $nh);
   foreach ($eh as $f => $v)
      $export['header'][] = $v;

   if (isset($sls) and $sls == "Clear")
   {
      unset($search);
      unset($start);
      unset($sls);
      unset($_GET['search']);
      unset($_GET['start']);
   }

   if (isset($action) and $action == "Import Logs")
   {
      unset($action);
      if (isset($notice) and $notice)
         echo $notice;
      $total = $refresh();
   }

   $start = '';
   $q = "";
   if (isset($search))
      $q = $search;

   $query = explode(" ", $q);
   foreach ($query as $i => $v)
     $query[$i] = trim($v);

//   $distinct = '';
//   $sql =  "SELECT id FROM ".$table." A RIGHT JOIN (SELECT DISTINCT ".$distinct." FROM ".$table.") ".
//           "AS TR ON TR.".$distinct." = A.".$distinct;

   if (!$q) 
      $sql = "SELECT * from ".$table." where deleted='0' order by create_date DESC";
   else
   {
      $sql = "SELECT *,MATCH(".$data.") AGAINST('";
      for ($i=0; $i < count($query); $i++)
      {
         if ($i) $sql .= ','.$query[$i];
         else  $sql .= $query[$i];
      }
      $sql .= "' IN BOOLEAN MODE) AS relevance FROM ".$table." WHERE MATCH(".$data.") AGAINST('";
      for ($i=0; $i < count($query); $i++)
      {
         if ($i) $sql .= ','.$query[$i];
         else $sql .= $query[$i];
      }
      $sql .= "' IN BOOLEAN MODE) and deleted='0' order by create_date DESC";
   }

   $dbh = new DB;
   $ret = $dbh->connect($db_client);
   if (!$ret)
   {    
      echo "<big>Could not connect to database</big><br/>";
      return;
   }

   $allurl = array();
   $ids = array();
   $res = $dbh->query($sql);
   while ($o = $dbh->fetch_object($res))
   {
      if (isset($distinct))   
      {
         if (in_array($o->ip, $allurl))
            continue;
         $allurl[] = $o->ip;
      }
      $ids[] = $o->id; 
   }

   $pg = new PG();
   $pg_window = 25;
   $pg_width = 10;
   $pglist = $pg->paginate($start, $ids, $pg_window, $pg_width, $q, 0);

   $x = 0;
   if (isset($entry))
      $x = $entry;

   if(count($export)) 
   {
      $csvdate = date('Y-m-d H:i:s');
      echo '&nbsp;&nbsp;<a href="csv.php?filename='.$csvdate.'_'.$table.
           '"><input type="button" name="export" value="Export as .CSV"/></a>';
   }
   if (isset($pglist[1]))
      echo $pglist[1];

   echo '<div style="margin-left:auto;margin-right:auto">';

   echo '<table class="logs" width="100%" style="font-size:10pt;margin-left:auto;margin-right:auto;" cellspacing="1" cellpadding="0">';

   echo '<tr style="text-align:left">';
   echo '<td colspan="7">';
   echo '<form action="'.baseURL().'" method="get">';
   echo '<fieldset>';
   echo '<input type="hidden" name="page" value="'.$page.'"/>';
   echo '<input id="find" name="search" type="text" value="'.
   (isset($search) ? $search : "").'" style="width:110pt;"/>';
   echo '<input name="start" type="hidden" value="'.(isset($start) ? $start : "0").'"/>';
   echo '&nbsp;<input name="" type="submit" value="Find"/>';
   echo '&nbsp;<input name="sls" type="submit" value="Clear"/>&nbsp;&nbsp;&bull;&nbsp;&nbsp;';
   echo '&nbsp;<input name="action" type="submit" value="Import Logs"/>&nbsp;&nbsp;&nbsp;&nbsp;';

   if (isset($distinct))   
      echo '&nbsp;&nbsp;<a href="'.baseURL().implode_get(explode_get('distinct','')).
           '">Show All Visitors</a>&nbsp;&nbsp;&nbsp;&nbsp;';
   else
      echo '&nbsp;&nbsp;<a href="'.baseURL().implode_get(explode_get('distinct','distinct')).
           '">Show Distinct Visitors</a>&nbsp;&nbsp;&nbsp;&nbsp;';

   if (isset($orderbyip))   
      echo '&nbsp;&nbsp;<a href="'.baseURL().implode_get(explode_get('orderbyip','')).
           '">Clear Order by IP</a>&nbsp;&nbsp;&nbsp;&nbsp;';
   else
      echo '&nbsp;&nbsp;<a href="'.baseURL().implode_get(explode_get('orderbyip','orderbyip')).
           '">Order by IP</a>&nbsp;&nbsp;&nbsp;&nbsp;';

   if (isset($orderbyuser))   
      echo '&nbsp;&nbsp;<a href="'.baseURL().implode_get(explode_get('orderbyuser','')).
           '">Clear Order by User</a>&nbsp;&nbsp;&nbsp;&nbsp;';
   else
      echo '&nbsp;&nbsp;<a href="'.baseURL().implode_get(explode_get('orderbyuser','orderbyuser')).
           '">Order by User</a>&nbsp;&nbsp;&nbsp;&nbsp;';

   if (isset($total))
      echo '&nbsp;&nbsp;<b>'.$total.' records were imported</b>';
   echo '</fieldset>';
   echo '</form>';
   echo '</td>';
   echo '</tr>';

   echo isset($header) ? $header : "";

   for ($y = 0; $y < $pg_window; $y++)
   {
      if (!isset($ids[$x + $y]) or !$ids[$x + $y])
         break;

      $id = $ids[$x + $y];

      if (!$q)
         $sql = "SELECT * from ".$table." WHERE id=".$id." and deleted='0' limit 1";
      else
      {
         $sql = "SELECT *,MATCH(".$data.") AGAINST('";
         for ($i=0; $i < count($query); $i++)
         {
            if ($i) $sql .= ','.$query[$i];
            else $sql .= $query[$i];
         }
         $sql .= "' IN BOOLEAN MODE) AS relevance FROM ".$table." WHERE MATCH(".$data.") AGAINST('";
         for ($i=0; $i < count($query); $i++)
         {
            if ($i) $sql .= ','.$query[$i];
            else $sql .= $query[$i];
         }
         $sql .= "' IN BOOLEAN MODE) and deleted='0' and id=".$id." limit 1";
      }

      $res = $dbh->query($sql);
      if ($o = $dbh->fetch_object($res))
      {
         echo '<tr style="text-align:center;">';
         $fields = explode(",", $o->data);
         $i = 0;
         foreach ($fields as $field)
         {
            if ($i < 5) {
               if ($i == 1)
                  echo '<td style="text-align:left;">&nbsp;&nbsp;'.$field.'</td>';
               else
                  echo '<td>&nbsp;&nbsp;'.$field.'</td>';
	       $export[$rowc][] = $field;
            }
            $i++;
         }
         $rowc++;
         echo '</tr>';
      }
   }

   echo '</table>';
   echo '</div>';
   echo '<br/>';

   if (isset($pglist[2]))
      echo $pglist[2];
   echo '<br style="clear:both;"/>';

   $_SESSION['export_array'] = $export;
   return;
}

function configure()
{
      $data = '';
      $file = fopen($_SERVER['DOCUMENT_ROOT'].'/config.php', "rb");
      if ($file) 
      {
         while(!feof($file)) 
         {
            $data .= fread($file, 1024);
         }
         fclose($file);
         $data = htmlentities($data); 
         $data = str_replace("\n", '<br/>', $data);
         echo $data;
         return $data;
      }
      return false;
}

function format_phone_number($phone) 
{
  $numonly = preg_replace("/[^\d]/", "", $phone);
  return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numonly);
}

function system_message($title, $message)
{
   global $sitename;

   top("$title | ".$sitename);
   print "<br/><div style=\"text-align: center;font-size:12pt;\">";
   print $message."<br/><br>";
   print "</div>";
   print '<br style="clear:both;"/>';
   bottom();
   return;
}

function valid($var)
{
   $var = trim($var);
   if (isset($var) and !empty($var))
      return true;
   else
      return false;
}

function implode_get($get = array())
{
   $j = 0;
   $out = "";

   foreach ($get as $f => $v)
   {
      if ($f)
      {
         if ($j++) $out .= '&amp;';
         else      $out .= '?';
         $out .= $f;
         if (isset($v) and $v)
         {
            $out .= '=';
            $out .= $v;
         }
      }
   }
   return filter_var(strip_tags($out), FILTER_SANITIZE_STRING);
}

function explode_get($exclude = "", $include = "")
{
   $get = array();

   $e = explode(',', $exclude);   
   foreach ($_GET as $f => $v)
   {
      if (!in_array($f, $e))
         $get[$f] = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);
   }

   $i = explode(',', $include);   
   foreach ($i as $inc)
   {
      $j = explode('=', $inc);   
      if (isset($j[0]))
         $get[$j[0]] = ((isset($j[1]) and $j[1]) ? $j[1] : "");
   }   
   return $get;
}

function check_logout()
{
    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

    if (isset($logout)) {
       logout();
       header('Location: '.baseURL().'?page=login');
    }
}

function logout() 
{
    unset($_SESSION['activename']);
    unset($_SESSION['accountname']);
    unset($_SESSION['password']);
    unset($_SESSION);

    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    if (ini_get("session.use_cookies")) 
    {
       $params = session_get_cookie_params();
       setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], 
                 $params["secure"], $params["httponly"]);
    }
    session_destroy();
    return;
}

function permissions($current = "")
{
   print "<br/><div style=\"text-align: center;\">";
   if (isset($current) and $current)
      print "<big>Account  <b>[ ".$current." ]</b>  does not have access this page.</big><br><br>";
   else
      print "<big>You must be logged in and have cookies enabled in your web browser in order to access this page.</big><br><br>";
   print "</div>";
   print '<br style="clear:both;"/>';
   return;
}

// returns 0 if 'activename' not set or account fails to match groups or $account != 'activename' 
// returns 1 if account exactly matches $account value
// returns 2 if account exists in the groups array 
// returns 3 if session 'activename' value is set (which means user is logged in)

function check_permissions($account, $verbose) 
{
    global $adminuser;

    if (isset($_SESSION['activename'])) 
    {
        if (isset($account) and $account) {
           if ($_SESSION['activename'] == $account) {
              return 1;
           } else {

              if (isset($_SESSION[$_SESSION['activename']]['groups'])) {
                 if (in_array($account, explode(':', $_SESSION[$_SESSION['activename']]['groups'])))
                    return 2;
              }
              if ($verbose)
                 permissions($_SESSION['activename']);
              return 0;
           }
        }
        else
           return 3;
    } 
    else 
    {
       if ($verbose)
          permissions();
       return 0;
    }
}

function new_uuid($newuuid)
{
    global $adminuser;
    global $db_client;

    if (isset($newuuid) and $newuuid)
    {
       $dbh = new DB;
       $ret = $dbh->connect($db_client);
       if ($ret)
       {
          $sql = "SELECT * from license where newuuid='".$newuuid."'and deleted='0' LIMIT 1";
          $res = $dbh->query($sql);
          $o = $dbh->fetch_object($res);
          if ($o)
          {
             $username = $o->username;
             if ($o->count)
             {
                $dbh->close();
                return 0;
             }
             else
             {
                unset($_POST);
                $_POST['count'] = 1;
                $cid = $dbh->update('license', $o->id);
                if (!$cid)
                   system_message('Activate Product', 'Product <b>'.$newuuid.'</b> could not be activated.');
                else
                {
                      if ($username)
                      {
                         $_SESSION['activename'] = $username;
                         $dbh->close();
                         return 0;
                      }
                      else
                         system_message('Activate Product', 'Product <b>'.$newuuid.'</b> username could not be verified.');
                }
             }
          }
          else
          {
             system_message('Activate Product', 'Product <b>'.$newuuid.'</b> is invalid.<br/><br/>'.
                            'You can log into an existing account <a href="'.baseURL().'?page=account">'.
                            'here</a> or you can register for a new account '.
                            '<a href="'.baseURL().'?page=register">here.</a>');
          }
          $dbh->close();
          return 1;   
       }
    }
    return 0;
}

function verify_uuid($uuid)
{
    global $adminuser;
    global $db_client;

    if (isset($uuid) and $uuid)
    {
       $dbh = new DB;
       $ret = $dbh->connect($db_client);
       if ($ret)
       {
          $sql = "SELECT * from clients where uuid='".$uuid."'and deleted='0' LIMIT 1";
          $res = $dbh->query($sql);
          $o = $dbh->fetch_object($res);
          if ($o)
          {
             if ($o->active)
             {
                if (isset($_SESSION['activename']) and $_SESSION['activename'] and 
                    $_SESSION['activename'] = $o->username)
                {
                   $dbh->close();
                   return 0;
                }
                else
                   system_message('Activate Account', 'User account <b>'.$uuid.'</b> is already active.  '.
                                  'You can go to <a href="'.baseURL().
                                  '?page=account&amp;action=myaccount"><b>Account</b></a> to login to this account.');
             }
             else
             {
                unset($_POST);
                $_POST['active'] = 1;
                $cid = $dbh->update('clients', $o->id);
                if (!$cid)
                   system_message('Activate Account', 'User account <b>'.$uuid.'</b> could not be activated.');
                else
                {
                   if ($o->username)
                   {
                      system_message('Activate Account', 'User account <b>'.$uuid.'</b> is now active.  '.
                                     'You can go to <a href="'.baseURL().
                                     '?page=account&amp;action=myaccount"><b>Account</b></a> to login to this account '.
                                     'and change your password.');
                   }
                   else
                      system_message('Activate Account', 'User account <b>'.$uuid.'</b> could not be activated.');
                }
             }
          }
          else
          {
             system_message('Activate Account', 'User Account <b>'.$uuid.'</b> is invalid.<br/><br/>'.
                            'You can log into an existing account <a href="'.baseURL().'?page=account">'.
                            'here</a> or you can register for a new account '.
                            '<a href="'.baseURL().'?page=register">here.</a>');
          }
          $dbh->close();
          return 1;   
       }
    }
    return 0;
}

function submit_url() 
{
    global $adminuser, $adminpassword;

    if (!check_permissions($adminuser, 1))
       return;

    $_SESSION['targetname'] = $_SESSION['activename'];

    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="spider"/>';
    echo '<input type="hidden" name="referrer" value="spider"/>';
    echo '<input type="hidden" name="forward" value="spider"/>';

    echo '<table style="border:1px;font-size:10pt;text-align:center;margin-left:auto;margin-right:auto;" cellspacing="8" cellpadding="0">';

    echo '<tr><td style="text-align:center;"><h2>Submit URL</h2></td></tr>';
    echo '<br/>';

    echo '<tr>';
    echo '<td style="text-align:left;">';
    echo 'Enter Target URL: ';
    echo '<br/>';
    input_text('targeturl', $_SESSION, 210);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td style="text-align:left;">';
    echo 'Enter Crawl Depth: ';
    echo '<br/>';
    input_text('targetdepth', $_SESSION, 40);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td style="text-align:center;">';
    input_submit('submit','Submit URL', "font-size:13pt;");
    echo '<input type="hidden" name="_submit_url" value="1"/>';
    echo '</td>';
    echo '</tr>';

    if (isset($_SESSION['errors']))
    {
       echo '<tr><td><br/><b>'.$_SESSION['errors'].'</b></td></tr>';
       unset($_SESSION['errors']);   
    }

    echo '</table>';
    echo '</fieldset>';
    echo '</form>';
    echo '<br/>';

    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="crawl"/>';
    echo '<input type="hidden" name="referrer" value="spider"/>';
    echo '<input type="hidden" name="forward" value="spider"/>';
    echo '<table style="border:1px;font-size:10pt;text-align:center;margin-left:auto;margin-right:auto;" cellspacing="8" cellpadding="0">';
    echo '<tr>';
    echo '<td>';
    input_submit('submit','Activate Spider', "font-size:13pt;");
    echo '</td>';
    echo '</tr>';
    
    if (isset($_SESSION['crawl']))
    {
       echo '<tr><td><br/><b>'.$_SESSION['crawl'].'</b></td></tr>';
       unset($_SESSION['crawl']);   
    }

    echo '</table>';
    echo '</fieldset>';
    echo '</form>';

    echo '<div style="clear: both;">&nbsp;</div>';
}

function password_recovery() 
{
    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="recoverpasswd"/>';
    echo '<input type="hidden" name="referrer" value="findpasswd"/>';
    echo '<input type="hidden" name="forward" value="findpasswd"/>';
    echo '<table style="border:1px;font-size:13pt;text-align:center;margin-left:auto;margin-right:auto;" cellspacing="8" cellpadding="0">';

    echo '<tr><td style="text-align:center;"><h2>Recover Account Password</h2></td></tr>';
    if (isset($_SESSION['errors']))
    {
       echo '<tr><td><big><b>'.$_SESSION['errors'].'</b></big></td></tr>';
       unset($_SESSION['errors']);   
    }

    if (isset($_SESSION['passwd_sent']))
    {
       echo '</table>';
       echo '</fieldset>';
       echo '</form>';
       echo '<br/>';
       echo '<br/>';
       echo '<br/>';
       echo '<br/>';
       echo '<br/>';
       unset($_SESSION['passwd_sent']);
       return;
    }

    echo '<tr>';
    echo '<td>';
    echo 'Enter Username for this Account: ';
    echo '<br/>';
    echo '<br/>';
    input_text('accountusername', $_SESSION, 210);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Please enter the account username to use for password recovery.  An email which '.
         'contains the password will be sent to the email address associated with this account in our '.
         'database.  Once you receive this email please use the recovered password '.
         'to access your account.<br/>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    input_submit('submit','Request Password via Email', "font-size:13pt;");
    echo '<input type="hidden" name="_submit_account_passwd" value="1"/>';
    echo '</td>';
    echo '</tr>';

    echo '</table>';
    echo '</fieldset>';
    echo '</form>';

    echo '<br/>';
}

function account_recovery() 
{
    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="recoveraccount"/>';
    echo '<input type="hidden" name="referrer" value="findname"/>';
    echo '<input type="hidden" name="forward" value="findname"/>';
    echo '<table style="border:1px;font-size:13pt;text-align:center;margin-left:auto;margin-right:auto;" cellspacing="8" cellpadding="0">';

    echo '<tr><td style="text-align:center;"><h2>Request Account Username</h2></td></tr>';
    if (isset($_SESSION['errors']))
    {
       echo '<tr><td><big><b>'.$_SESSION['errors'].'</b></big></td></tr>';
       unset($_SESSION['errors']);
    }

    if (isset($_SESSION['account_sent']))
    {
       echo '</table>';
       echo '</fieldset>';
       echo '</form>';
       echo '<br/>';
       echo '<br/>';
       echo '<br/>';
       echo '<br/>';
       echo '<br/>';
       unset($_SESSION['account_sent']);
       return;
    }

    echo '<tr>';
    echo '<td>';
    echo 'Enter Email Address for User Account: ';
    echo '<br/>';
    echo '<br/>';
    input_text('accountemail', $_SESSION, 210);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Please enter the email address used to create this account.  An email which '.
         'contains the username associated with this account will be sent to this email address.  Once '.
         'you receive this email please use the specified account username to recover your password '.
         'if you have lost or forgotten it.<br/>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    input_submit('submit','Request Username via Email', "font-size:13pt;");
    echo '<input type="hidden" name="_submit_account_email" value="1"/>';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '</td>';
    echo '</tr>';

    echo '</table>';
    echo '</fieldset>';
    echo '</form>';

    echo '<br/>';
}

function login($heading, $referrer = "", $forward = "") 
{
    global $sitename;

    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

    if (!$forward)
       $forward = $page.str_replace('?', '&amp;', implode_get(explode_get('logout,page', '')));

    if (isset($_SESSION['activename']))
       return;

    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="accountlogin"/>';
    echo '<input type="hidden" name="referrer" value="'.$referrer.'"/>';
    echo '<input type="hidden" name="forward" value="'.$forward.'"/>';
    echo '<table style="font-size:12pt;text-align:left;margin-left:auto;margin-right:auto;" cellspacing="2" cellpadding="2">';

    if ($heading)
       echo '<tr><td style="text-align:center;"><h2>'.$heading.'</h2></td></tr>';

    if (isset($_SESSION['errors']))
    {
       echo '<tr><td><b>'.$_SESSION['errors'].'</b></td></tr>';
       unset($_SESSION['errors']);
    }

    echo '<tr>';
    echo '<td style="text-align:left">';
    echo 'Username: ';
    echo '<br/>';
    input_text('accountname', $_SESSION, 115);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td style="text-align:left">';
    echo 'Password: ';
    echo '<br/>';
    input_password('password', $_SESSION, 115);
    echo '</td>';
    echo '</tr>';

    echo '<tr><td></td></tr>';

    echo '<tr>';
    echo '<td>';
    echo '<a href="'.baseURL().'?page=register">Register</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;';
    input_submit('submit','Log In', "font-size:13pt;");
    echo '<input type="hidden" name="_submit_login" value="1"/>';
    echo '</td>';
    echo '</tr>';

    echo '<tr><td></td></tr>';

    echo '<tr>';
    echo '<td>';
    echo '&bull;&nbsp;&nbsp;<a href="'.baseURL().
         '?page=findname">Recover Account</a>&nbsp;&nbsp;&bull;';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '&bull;&nbsp;&nbsp;<a href="'.baseURL().
         '?page=findpasswd">Recover Password</a>&nbsp;&nbsp;&bull;';
    echo '</td>';
    echo '</tr>';

    echo '</table>';
    echo '</fieldset>';
    echo '</form>';

    echo '<br style="clear:both;"/>';
}

function utf_pregmatch($text)
{
   $search = array(
                    '/(#160)/i',                      // Non-breaking space
                    '/(#8220|#8221|#147|#148)/i',     // Double quotes
                    '/(#8216|#8217)/i',               // Single quotes
                    '/(#38)/i',                       // Ampersand
                    '/(#169)/i',                      // Copyright
                    '/(#8482|#153)/i',                // Trademark
                    '/(#174)/i',                      // Registered
                    '/(#151|#8212)/i',                // mdash
                    '/(#8211|#8722)/i',               // ndash
                    '/(#149|#8226)/i',                // Bullet
                    '/(#163)/i',                      // Pound sign
                    '/(#8364)/i',                     // Euro sign
   );

   $replace = array(
                    ' ',                         // Non-breaking space
                    '"',                         // Double quotes
                    "'",                         // Single quotes
                    '>',
                    '<',
                    '&',
                    '(c)',
                    '(tm)',
                    '(R)',
                    '--',
                    '-',
                    '*',
                    '£',
                    'EUR',                       // Euro sign.  ?
   );

   return preg_replace($search, $replace, $text);
}

function utf_table($text)
{
   $search = array(
     '/'.chr(160).'/',     '/'.chr(161).'/',     '/'.chr(162).'/',     '/'.chr(163).'/',
     '/'.chr(164).'/',     '/'.chr(165).'/',     '/'.chr(166).'/',     '/'.chr(167).'/',
     '/'.chr(168).'/',     '/'.chr(169).'/',     '/'.chr(170).'/',     '/'.chr(171).'/',
     '/'.chr(172).'/',     '/'.chr(173).'/',     '/'.chr(174).'/',     '/'.chr(175).'/',
     '/'.chr(176).'/',     '/'.chr(177).'/',     '/'.chr(178).'/',     '/'.chr(179).'/',
     '/'.chr(180).'/',     '/'.chr(181).'/',     '/'.chr(182).'/',     '/'.chr(183).'/',
     '/'.chr(184).'/',     '/'.chr(185).'/',     '/'.chr(186).'/',     '/'.chr(187).'/',
     '/'.chr(188).'/',     '/'.chr(189).'/',     '/'.chr(190).'/',     '/'.chr(191).'/',
     '/'.chr(192).'/',     '/'.chr(193).'/',     '/'.chr(194).'/',     '/'.chr(195).'/',
     '/'.chr(196).'/',     '/'.chr(197).'/',     '/'.chr(198).'/',     '/'.chr(199).'/',
     '/'.chr(200).'/',     '/'.chr(201).'/',     '/'.chr(202).'/',     '/'.chr(203).'/',
     '/'.chr(204).'/',     '/'.chr(205).'/',     '/'.chr(206).'/',     '/'.chr(207).'/',
     '/'.chr(208).'/',     '/'.chr(209).'/',     '/'.chr(210).'/',     '/'.chr(211).'/',
     '/'.chr(212).'/',     '/'.chr(213).'/',     '/'.chr(214).'/',     '/'.chr(215).'/',
     '/'.chr(216).'/',     '/'.chr(217).'/',     '/'.chr(218).'/',     '/'.chr(219).'/',
     '/'.chr(220).'/',     '/'.chr(221).'/',     '/'.chr(222).'/',     '/'.chr(223).'/',
     '/'.chr(224).'/',     '/'.chr(225).'/',     '/'.chr(226).'/',     '/'.chr(227).'/',
     '/'.chr(228).'/',     '/'.chr(229).'/',     '/'.chr(230).'/',     '/'.chr(231).'/',
     '/'.chr(232).'/',     '/'.chr(233).'/',     '/'.chr(234).'/',     '/'.chr(235).'/',
     '/'.chr(236).'/',     '/'.chr(237).'/',     '/'.chr(238).'/',     '/'.chr(239).'/',
     '/'.chr(240).'/',     '/'.chr(241).'/',     '/'.chr(242).'/',     '/'.chr(243).'/',
     '/'.chr(244).'/',     '/'.chr(245).'/',     '/'.chr(246).'/',     '/'.chr(247).'/',
     '/'.chr(248).'/',     '/'.chr(249).'/',     '/'.chr(250).'/',     '/'.chr(251).'/',
     '/'.chr(252).'/',     '/'.chr(253).'/',     '/'.chr(254).'/',     '/'.chr(255).'/',
     '/'.chr(8364).'/'
   );

   $replace = array(
     '&nbsp;',    '&iexcl;',    '&cent;',    '&pound;',    '&curren;',  '&yen;',     '&brvbar;',  '&sect;',
     '&uml;',     '&copy;',     '&ordf;',    '&laquo;',    '&not;',     '&shy;',     '&reg;',     '&macr;',
     '&deg;',     '&plusmn;',   '&sup2;',    '&sup3;',     '&acute;',   '&micro;',   '&para;',    '&middot;',
     '&cedil;',   '&sup1;',     '&ordm;',    '&raquo;',    '&frac14;',  '&frac12;',  '&frac34;',  '&iquest;',
     '&Agrave;',  '&Aacute;',   '&Acirc;',   '&Atilde;',   '&Auml;',    '&Aring;',   '&AElig;',   '&Ccedil;',
     '&Egrave;',  '&Eacute;',   '&Ecirc;',   '&Euml;',     '&Igrave;',  '&Iacute;',  '&Icirc;',   '&Iuml;',
     '&ETH;',     '&Ntilde;',   '&Ograve;',  '&Oacute;',   '&Ocirc;',   '&Otilde;',  '&Ouml;',    '&times;',
     '&Oslash;',  '&Ugrave;',   '&Uacute;',  '&Ucirc;',    '&Uuml;',    '&Yacute;',  '&THORN;',   '&szlig;',
     '&agrave;',  '&aacute;',   '&acirc;',   '&atilde;',   '&auml;',    '&aring;',   '&aelig;',   '&ccedil;',
     '&egrave;',  '&eacute;',   '&ecirc;',   '&euml;',     '&igrave;',  '&iacute;',  '&icirc;',   '&iuml;',
     '&eth;',     '&ntilde;',   '&ograve;',  '&oacute;',   '&ocirc;',   '&otilde;',  '&ouml;',    '&divide;',
     '&oslash;',  '&ugrave;',   '&uacute;',  '&ucirc;',    '&uuml;',    '&yacute;',  '&thorn;',   '&yuml;',
     '&euro;'
   );

   return preg_replace($search, $replace, $text);
}

function encode_ipv4($user_ip) {
    $ip = explode('.', $user_ip);
    return sprintf('%02x%02x%02x%02x', $ip[0], $ip[1], $ip[2], $ip[3]);
}
  
function decode_ipv4($enc_ip) {
    $ip_pop = explode('.', chunk_split($enc_ip, 2, '.'));
    return hexdec($ip_pop[3]).'.'. hexdec($ip_pop[2]).'.'.hexdec($ip_pop[1]).'.'.hexdec($ip_pop[0]);
}

function decode_ipv6($enc_ip) {
    $ip_pop = explode(':', chunk_split($enc_ip, 4, ':'));
    return ($ip_pop[0].':'.$ip_pop[1].':'.$ip_pop[2].':'.$ip_pop[3].':'.$ip_pop[4].':'.$ip_pop[5].':'.$ip_pop[6].':'.$ip_pop[7]);   
}

function input_text_value($element_name, $value, $size = '0') {
    if (!isset($value))
       $value = "";
    print '<input type="text" name="' . $element_name.'"';
    if ($size)
       print ' style="width:'.$size.'pt;"';
    print ' value="';
    print htmlentities($value) . '"/>';
}

function input_password_value($field_name, $value, $size = '0')  {
    if (!isset($value))
       $value = "";
    print '<input type="password" name="' . $field_name .'"';
    if ($size)
       print ' style="width:'.$size.'pt;"';
    print ' value="';
    print htmlentities($value) . '"/>';
}

function input_textarea_value($element_name, $value, $rows, $cols, $wrap, $ro) {
    if (!isset($value))
       $value = "";
    print '<textarea name="' . $element_name .'"';
    if ($rows)
       print ' rows="'.$rows.'"';
    if ($cols)
       print ' cols="'.$cols.'"';
    if ($wrap)
       print ' wrap="hard"';
    if ($ro)
       print ' readonly="readonly"';
    print '>';
    print htmlentities($value) . '</textarea>';
}

function input_text($element_name, $values, $size = '0') {
    if (!isset($values[$element_name]))
       $values[$element_name] = "";
    print '<input type="text" name="' . $element_name.'"';
    if ($size)
       print ' style="width:'.$size.'pt;"';
    print ' value="';
    print htmlentities($values[$element_name]) . '"/>';
}

function input_password($field_name, $values, $size = '0')  {
    if (!isset($values[$field_name]))
       $values[$field_name] = "";
    print '<input type="password" name="' . $field_name .'"';
    if ($size)
       print ' style="width:'.$size.'pt;"';
    print ' value="';
    print htmlentities($values[$field_name]) . '"/>';
}

function input_submit($element_name, $label, $fontsize = "") {
    if (!isset($label))
       $label = "";
    print '<input type="submit" name="' . $element_name .
          '" style="'.$fontsize.'" value="';
    print htmlentities($label) .'"/>';
}

function input_textarea_id($id, $element_name, $values, $rows, $cols, $wrap, $ro) {
    if (!isset($values[$element_name]))
       $values[$element_name] = "";
    print '<textarea name="' . $element_name .'"';
    if ($id)
       print ' id="'.$id.'"';
    if ($rows)
       print ' rows="'.$rows.'"';
    if ($cols)
       print ' cols="'.$cols.'"';
    if ($wrap)
       print ' wrap="hard"';
    if ($ro)
       print ' readonly="readonly"';
    print '>';
    print htmlentities($values[$element_name]) . '</textarea>';
}

function input_textarea($element_name, $values, $rows, $cols, $wrap, $ro) {
    if (!isset($values[$element_name]))
       $values[$element_name] = "";
    print '<textarea name="' . $element_name .'"';
    if ($rows)
       print ' rows="'.$rows.'"';
    if ($cols)
       print ' cols="'.$cols.'"';
    if ($wrap)
       print ' wrap="hard"';
    if ($ro)
       print ' readonly="readonly"';
    print '>';
    print htmlentities($values[$element_name]) . '</textarea>';
}

function input_radiocheck($type, $element_name, $values, $element_value) {
    print '<input type="' . $type . '" name="' . $element_name .'" value="' . $element_value . '" ';
    if ($element_value == $values[$element_name]) {
        print ' checked="checked"';
    }
    print '/>';
}

function input_select($element_name, $selected, $options, $multiple = false) {
    print '<select name="' . $element_name;
    // if multiple choices are permitted, add the multiple attribute
    // and add a [] to the end of the tag name
    if ($multiple) { print '[]" multiple="multiple'; }
    print '">';

    $selected_options = array();
    if ($multiple) {
        foreach ($selected[$element_name] as $val) {
            $selected_options[$val] = true;
        }
    } else {
        $selected_options[ $selected[$element_name] ] = true;
    }

    foreach ($options as $option => $label) {
        print '<option value="' . htmlentities($option) . '"';
        if ($selected_options[$option]) {
            print ' selected="selected"';
        }
        print '>' . htmlentities($label) . '</option>';
    }
    print '</select>';
}

function httpURL() { 
   $s = empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""); 
   $protocol = "http"; 
   $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
 
function httpsURL() { 
   $s = empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""); 
   $protocol = "https"; 
   $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}
 
function baseURL() { 
   $s = empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""); 
   $which = explode("/", $_SERVER["SERVER_PROTOCOL"]); 
   $protocol = strtolower($which[0]).$s; 
   $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.'/';
} 

function imageURL() { 
   global $imagedir;

   $s = empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""); 
   $which = explode("/", $_SERVER["SERVER_PROTOCOL"]); 
   $protocol = strtolower($which[0]).$s; 
   $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.$imagedir;
} 

function selfURL() { 
   $s = empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""); 
   $which = explode("/", $_SERVER["SERVER_PROTOCOL"]); 
   $protocol = strtolower($which[0]).$s; 
   $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['PHP_SELF'];
} 

function selfURI() { 
   return $_SERVER['REQUEST_URI'];
} 

function fullURL() { 
   $s = empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""); 
   $which = explode("/", $_SERVER["SERVER_PROTOCOL"]); 
   $protocol = strtolower($which[0]).$s; 
   $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
   return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
} 

function validateURL($url)
{
   return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url);
}

function validateCreditCard($cc)
{
   return 
     preg_match('/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])'.
                '[0-9]{11}|3[47][0-9]{13})$/', $cc);
}

function validateIP($ipaddress)
{
   return preg_match('/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/',
                     $ipaddress);
}

function validateZip($zipcode)
{
   return preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$zipcode);
}

function validatePhone($phone)
{
   return preg_match('/\(?\d{3}\)?[-\s.]?\d{3}[-\s.]\d{4}/x', $phone);
}

function validateEmail($email)
{
   return preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
                     $email);
}

function validatePassword($email)
{
   // The input must contain at least one uppercase letter, one lowercase letter and one digit.
   return preg_match('A(?=[-_a-zA-Z0-9]*?[A-Z])(?=[-_a-zA-Z0-9]*?[a-z])(?=[-_a-zA-Z0-9]*?[0-9])[-_a-zA-Z0-9]{6,}z', $password);
}

function clear_register_form()
{
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['company_name']);
    unset($_SESSION['address']);
    unset($_SESSION['address2']);
    unset($_SESSION['city']);
    unset($_SESSION['state']);
    unset($_SESSION['zip']);
    unset($_SESSION['country']);
    unset($_SESSION['email']);
    unset($_SESSION['email2']);
    unset($_SESSION['phone']);
    unset($_SESSION['phone2']);
    unset($_SESSION['newusername']);
    unset($_SESSION['newpassword']);
    unset($_SESSION['confirmpassword']);
    unset($_SESSION['verify']);
    return; 
}

function register($heading, $new, $referrer, $forward) {

    global $states, $countries, $sitename, $admin_email;

    unset($_SESSION['verify']);

    if (isset($_SESSION['register_result']))
    {
       echo '<div style="float:left;width:45%">';
       echo '<table style="border:1px;font-size:13pt;text-align:left;margin-left:1%;margin-right:1%;" cellspacing="8" cellpadding="2">';
       echo '<tr><td colspan="2" style="font-size:16pt;"><b>'.$_SESSION['register_result'].'</b></td></tr>';
       unset($_SESSION['register_result']);

       echo '</table>';
       echo '</div>';
       echo '<div style="clear: both;">&nbsp;</div>';
       myaccount($_SESSION['activename']);
       return;
    }

    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="addrecord"/>';
    echo '<input type="hidden" name="referrer" value="'.$referrer.'"/>';
    echo '<input type="hidden" name="forward" value="'.$forward.'"/>';

    echo '<div style="float:left;width:45%">';
    echo '<table style="border:1px;font-size:13pt;text-align:left;margin-left:1%;margin-right:1%;" cellspacing="8" cellpadding="2">';

    if (isset($heading) and $heading)
       echo '<tr><th colspan="2"><h2>'.$heading.'</h2></th></tr>';

    if (isset($_SESSION['errors']))
    {
       echo '<tr><td colspan="2" style="font-size:16pt;"><b>'.$_SESSION['errors'].'</b></td></tr>';
       unset($_SESSION['errors']);
    }

    if (isset($_SESSION['username_errors']))
    {
       echo '<tr><td colspan="2" style="font-size:16pt;"><b>'.$_SESSION['username_errors'].'</b></td></tr>';
       unset($_SESSION['username_errors']);
    }

    echo '<tr>';
    echo '<td><small><strong>*indicates a required field</strong></small></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '*First Name: ';
    echo '<br/>';
    input_text('first_name', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo '*Last Name: ';
    echo '<br/>';
    input_text('last_name', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="2">';
    echo 'Company Name: ';
    echo '<br/>';
    input_text('company_name', $_SESSION, 225);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo 'Address: ';
    echo '<br/>';
    input_text('address', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'Alternate Address: ';
    echo '<br/>';
    input_text('address2', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo 'City: ';
    echo '<br/>';
    input_text('city', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'State: ';
    echo '<br/>';

    echo '<select name="state"><option value=""> --State </option>';
    if (!isset($_SESSION['state']))
       $_SESSION['state'] = "";
    foreach($states as $t => $d){
	$sel = ($_SESSION['state'] == $t) ? ' SELECTED' : '';
	echo "<option value=\"".$t."\" $sel>$d</option>";
    }  
    echo '</select>';

    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '*Zip Code: ';
    echo '<br/>';
    input_text('zip', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'Country: ';
    echo '<br/>';

    echo '<select name="country"><option value=""> --Country </option>';
    if (!isset($_SESSION['country']))
       $_SESSION['country'] = "";
    foreach($countries as $t => $d)
    {
	$sel = ($_SESSION['country'] == $t) ? ' SELECTED' : '';
	echo "<option value=\"".$t."\" $sel>$d</option>";
    }  
    echo '</select>';

    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '*Primary Phone: ';
    echo '<br/>';
    input_text('phone', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'Alternate Phone: ';
    echo '<br/>';
    input_text('phone2', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo '*email: ';
    echo '<br/>';
    input_text('email', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'alternate email: ';
    echo '<br/>';
    input_text('email2', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="2">';
    echo '<br style="clear:both;"/>';
    echo '<hr/>';
    echo '</td>';
    echo '</tr>';

    if ($new)
    {
       echo '<tr>';
       echo '<td>*New Username:';
       echo '<br/>';
       input_text('newusername', $_SESSION, 0);
       echo '</td>';

       echo '<td><br/>';
       input_submit('submit','Check Username Availability', "font-size:13pt;");
       echo '</td>';
       echo '</tr>';
    }

    echo '<tr>';
    echo '<td>*New Password (default is \'pass\'):';
    echo '<br/>';

    if (!isset($_SESSION['newpassword']))
       $_SESSION['newpassword'] = 'pass';
    if (!isset($_SESSION['confirmpassword']))
       $_SESSION['confirmpassword'] = 'pass';

    input_password('newpassword', $_SESSION, NULL);
    echo '</td>';
    echo '<td>*Confirm Password:';
    echo '<br/>';
    input_password('confirmpassword', $_SESSION, NULL);
    echo '</td>';
    echo '</tr>';

    if ($new)
    {

       echo '<tr>';
       echo '<td style="text-align:left;">';
       echo '<br/>';
       echo '<img src="randomimage.php" alt=""/>';
       echo '</td>';
       echo '<td>*Enter Darkened 6-digit Code from Image:';
       echo '<br/>';
       input_text('verify', $_SESSION, 0);
       echo '</td>';
       echo '</tr>';

       echo '<tr style="text-align:center">';
       echo '<td colspan="2"><br/>';
       input_submit('submit','Register', "font-size:13pt;");
       echo '</td>';
       echo '</tr>';
    }
    else
    {
       echo '<tr style="text-align:center">';
       echo '<td colspan="2"><br/>';
       input_submit('submit','Update', "font-size:13pt;");
       echo '</td>';
       echo '</tr>';
    }
    echo '</table>';
    echo '</div>';

    echo '</fieldset>';
    echo '</form>';
    echo '<div style="clear: both;">&nbsp;</div>';
}

function mypassword($username, $referrer, $forward) 
{
    unset($_SESSION['verify']);

    $_SESSION['targetname'] = $username;

    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="newpasswd"/>';
    echo '<input type="hidden" name="user" value="'.$username.'"/>';
    echo '<input type="hidden" name="referrer" value="'.$referrer.'"/>';
    echo '<input type="hidden" name="forward" value="'.$forward.'"/>';

    echo '<table style="border:1px;font-size:12pt;text-align:center;margin-left:auto;margin-right:auto;" cellspacing="8" cellpadding="4">';

    echo '<tr><td colspan="3" style="text-align:center;"><h2>Change Account Password</h2></td></tr>';
    echo '<br/>';

    echo '<tr>';
    echo '<td>Current Password:';
    echo '<br/>';
    input_password('currentpassword', $_SESSION, NULL);
    echo '</td>';

    echo '<td rowspan="2" style="text-align:center;">';
    echo '<br/>';
    echo '<img src="randomimage.php" alt=""/>';
    echo '</td>';


    echo '</tr>';

    echo '<tr>';
    echo '<td>Enter New Password:';
    echo '<br/>';
    input_password('newpassword', $_SESSION, NULL);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Confirm New Password:';
    echo '<br/>';
    input_password('confirmpassword', $_SESSION, NULL);
    echo '</td>';

    echo '<td>';
    echo 'Enter Darkened 6-digit <br/>Code from Image:';
    echo '<br/>';
    input_text('verify', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="3" style="text-align:center;">';
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="3" style="text-align:center;">';
    input_submit('submit','Change Password', "font-size:13pt;");
    echo '<input type="hidden" name="_change_passwd" value="1"/>';
    echo '</td>';
    echo '</tr>';

    echo '</table>';
    echo '</fieldset>';
    echo '</form>';
    if (isset($_SESSION['errors']))
    {
       echo '<div style="text-align:center;"><br/><b>'.$_SESSION['errors'].'</b></div>';
       unset($_SESSION['errors']);   
    }
    echo '<br/>';
    echo '<div style="clear: both;">&nbsp;</div>';

}

function sql()
{
   global $adminuser, $adminpassword;

   if (!check_permissions($adminuser, 1))
      return;

   $_SESSION['targetname'] = $_SESSION['activename'];

   echo '<form method=post action="action.php">';
   echo '<fieldset>';
   echo '<input type="hidden" name="function" value="sqlquery"/>';
   echo '<input type="hidden" name="referrer" value="sql"/>';
   echo '<input type="hidden" name="forward" value="sql"/>';

   echo '<table style="font-size:12pt;text-align:left;margin-left:auto;margin-right:auto;" cellspacing="2" cellpadding="2">';
   echo '<tr>';
   echo '<td><div style="text-align:right"><input type="submit" value="Query" name="_sql_query"/></div></td>';
   echo '</tr>';

   echo '<tr>';
   echo '<td>';
   echo 'SQL Query: ';
   echo '<br/>';
   input_textarea('querytext', $_SESSION, 2, 80, 0, 0);
   echo '</td>';
   echo '</tr>';

   echo '<tr>';
   echo '<td>';
   echo 'Response: ';
   echo '<br/>';
   input_textarea('responsetext', $_SESSION, 18, 80, 0, 1);
   echo '</td>';
   echo '</tr>';

   echo '</table>';
   echo '</fieldset>';
   echo '</form>';

   echo '<br style="clear:both;"/>';
}

function edit_user($username, $heading, $referrer, $forward, $display = 0)
{
    global $states, $countries, $adminuser;

    $_SESSION['targetname'] = $username;

    echo '<form method="post" action="action.php">';
    echo '<fieldset>';
    echo '<input type="hidden" name="function" value="editaccount"/>';
    echo '<input type="hidden" name="referrer" value="'.$referrer.'"/>';
    echo '<input type="hidden" name="forward" value="'.$forward.'"/>';

    echo '<table width="100%" style="font-size:12pt;text-align:left;margin-left:auto;margin-right:auto;" cellspacing="2" cellpadding="4">';
    if (isset($heading) and $heading)
       echo '<th colspan="2"><h1>'.$heading.'</h1></th>';

    if (isset($_SESSION['errors']))
    {
       echo '<tr><td colspan="2" style="text-align:left;font-size:12pt;"><b>'.
            $_SESSION['errors'].'</b></td></tr>';
       unset($_SESSION['errors']);
       echo '<br/>';
    }

    if (!$display)
       echo '<tr><td><small><strong>*indicates a required field</strong></small></td></tr>';

    echo '<tr>';
    echo '<td>';

    if ($display)
       echo 'First Name: ';
    else
       echo '*First Name: ';

    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['first_name'].'</b>';
    else
       input_text('first_name', $_SESSION, 0);
    echo '</td>';
    echo '<td>';

    if ($display)
       echo 'Last Name: ';
    else
       echo '*Last Name: ';

    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['last_name'].'</b>';
    else
       input_text('last_name', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="2">';
    echo 'Company Name: ';
    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['company_name'].'</b>';
    else
       input_text('company_name', $_SESSION, 225);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo 'Address: ';
    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['address'].'</b>';
    else
       input_text('address', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'Alternate Address: ';
    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['address2'].'</b>';
    else
       input_text('address2', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    echo 'City: ';
    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['city'].'</b>';
    else
       input_text('city', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'State: ';
    echo '<br/>';

    if ($display)
       echo '<b>'.$_SESSION['state'].'</b>';
    else
    {
       echo '<select name="state"><option value=""> --State </option>';
       if (!isset($_SESSION['state']))
          $_SESSION['state'] = "";
       foreach($states as $t => $d){
  	  $sel = ($_SESSION['state'] == $t) ? ' SELECTED' : '';
       echo "<option value=\"".$t."\" $sel>$d</option>";
    }  
    echo '</select>';
    }

    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';

    if ($display)
       echo 'Zip Code: ';
    else
       echo '*Zip Code: ';

    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['zip'].'</b>';
    else
       input_text('zip', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'Country: ';
    echo '<br/>';

    if ($display)
       echo '<b>'.$_SESSION['country'].'</b>';
    else
    {
       echo '<select name="country"><option value=""> --Country </option>';
       if (!isset($_SESSION['country']))
          $_SESSION['country'] = "";
       foreach($countries as $t => $d)
       {
 	  $sel = ($_SESSION['country'] == $t) ? ' SELECTED' : '';
	  echo "<option value=\"".$t."\" $sel>$d</option>";
       }  
       echo '</select>';
    }

    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';
    
    if ($display)
       echo 'Primary Phone: ';
    else
       echo '*Primary Phone: ';

    echo '<br/>';
    if ($display)
       echo '<b>'.format_phone_number($_SESSION['phone']).'</b>';
    else
       input_text('phone', $_SESSION, 0);
    echo '</td>';
    echo '<td>';
    echo 'Alternate Phone: ';
    echo '<br/>';
    if ($display)
       echo '<b>'.format_phone_number($_SESSION['phone2']).'</b>';
    else
       input_text('phone2', $_SESSION, 0);
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>';

    if ($display)
       echo 'email: ';
    else
       echo '*email: ';

    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['email'].'</b>';
    else
       input_text('email', $_SESSION, 130);
    echo '</td>';
    echo '<td>';
    echo 'alternate email: ';
    echo '<br/>';
    if ($display)
       echo '<b>'.$_SESSION['email2'].'</b>';
    else
       input_text('email2', $_SESSION, 130);
    echo '</td>';
    echo '</tr>';
    
    if (is_admin())
    {
       echo '<tr>';
       echo '<td colspan="2">';
       echo 'groups: ';
       echo '<br/>';
       if ($display)
          echo '<b>'.trim(str_replace(':',',', $_SESSION['groups']), ',').'</b>';
       else
          input_text('groups', $_SESSION, 225);
       echo '</td>';
       echo '</tr>';
    }
    else
    {
       echo '<tr>';
       echo '<td colspan="2">';
       echo 'groups: ';
       echo '<br/>';
       echo '<b>'.trim(str_replace(':',',', $_SESSION['groups']), ',').'</b>';
       echo '</td>';
       echo '</tr>';
    }
    
    if (!$display)
    {
       echo '<tr style="text-align:center">';
       echo '<td colspan="2"><br/>';
       input_submit('submit','Save', "font-size:13pt;");
       echo '</td>';
       echo '</tr>';
    }
    echo '</table>';

   echo '</fieldset>';
    echo '</form>';
    echo '<br style="clear:both;"/>';

}

function add()
{
   global $adminuser, $adminpassword;
   global $languages;

   if (!check_permissions($adminuser, 1)) {
      return;
   }

   $_SESSION['targetname'] = $_SESSION['activename'];

   echo '<form method=POST action="action.php">';
   echo '<fieldset>';
   echo '<input type="hidden" name="function" value="addpage"/>';
   echo '<input type="hidden" name="referrer" value="add"/>';
   echo '<input type="hidden" name="forward" value="edit"/>';

   echo '<table width="100%" style="font-size:10pt;text-align:left;margin-left:20;margin-right:20;" cellspacing="2" cellpadding="2">';
   echo '<tr>';
   echo '<td><div style="text-align:center"><h1>New Page</h1></div></td>';

   echo '<td>';
   echo '<select name="language"><option value=""> -- Language </option>';
   if (!isset($_SESSION['language']))
       $_SESSION['language'] = "";

   foreach($languages as $t => $d){
	$sel = ($_SESSION['language'] == $t) ? ' SELECTED' : '';
	echo "<option value=\"".$t."\" $sel>$d</option>";
   }  

   echo '</select>&nbsp;&nbsp;';
   echo '</td>';

   echo '<td><div style="text-align:right"><input type="submit" value="Save Changes" name="_add_page"/>&nbsp;&nbsp;<input type="submit" value="Preview" name="_preview"/></div></td>';
   echo '</tr>';
   echo '</table>';

   echo '<table style="font-size:10pt;text-align:left;margin-left:auto;margin-right:auto;" cellspacing="2" cellpadding="2">';

   if (isset($_SESSION['errors']))
   {
      echo '<tr><td><b><big>'.$_SESSION['errors'].'</big></b></td></tr>';
      unset($_SESSION['errors']);
   }

   echo "<tr>";
   echo "<td>";
   echo 'Title: ';
   echo '<br/>';
   input_text('title', $_SESSION, 225);
   echo '</td>';

   echo '<td>';
   echo 'url: ';
   echo '<br/>';
   input_text('url', $_SESSION, 225);
   echo '</td>';

   echo '</tr>';
   echo "<tr>";

   echo "<td>";
   echo 'Name: ';
   echo '<br/>';
   input_text('name', $_SESSION, 225);
   echo '</td>';

   echo '<td>';
   echo 'Meta: ';
   echo '<br/>';
   input_text('meta', $_SESSION, 225);
   echo '</td>';
   echo '</tr>';

   echo '<tr>';
   echo '<td colspan="2">';
   echo 'Content: ';
   echo '<br/>';
   input_textarea('pagedata', $_SESSION, 18, 85, 0, 0);
   echo '</td>';
   echo '</tr>';

   echo '<tr>';
   echo '<td colspan="2">';
   echo 'Extracted Text: ';
   echo '<br/>';
   input_textarea('pagetext', $_SESSION, 8, 85, 0, 1);
   echo '</td>';
   echo '</tr>';

   echo '</table>';
   echo '</fieldset>';
   echo '</form>';

   echo '<br style="clear:both;"/>';
}


function edit()
{
   global $adminuser, $adminpassword;
   global $languages;
   global $db_client;

   foreach ($_GET as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   $dbh = new DB;
   $ret = $dbh->connect($db_client);
   if (!$ret)
   {
      echo "<big>Could not connect to database</big><br/>";
      return;
   }

   $sql = "SELECT * FROM page ";
   $where = "WHERE id=$cache and deleted='0' LIMIT 1";
   $res = $dbh->query($sql.$where);
   if ($o = $dbh->fetch_object($res))
   {
      $_SESSION['targetname'] = $_SESSION['activename'];

      echo '<form method=post action="action.php">';
      echo '<fieldset>';
      echo '<input type="hidden" name="function" value="updatepage"/>';
      echo '<input type="hidden" name="cache" value="'.$o->id.'"/>';
      echo '<input type="hidden" name="referrer" value="edit"/>';
      echo '<input type="hidden" name="forward" value="edit"/>';
      echo '<table width="100%" style="font-size:10pt;text-align:left;margin-left:20;margin-right:20;" cellspacing="2" cellpadding="2">';
      echo '<tr>';
      echo '<td><div style="text-align:center">Editing Page:  '.$o->title.'&nbsp;&nbsp;<br/>id:&nbsp;'.$o->id.'</div></td>';

      echo '<td>';
      echo '<select name="language"><option value=""> -- Language </option>';

      foreach($languages as $t => $d){
	$sel = ($o->language == $t) ? ' SELECTED' : '';
	echo "<option value=\"".$t."\" $sel>$d</option>";
      }  

      echo '</select>&nbsp;&nbsp;';
      echo '</td>';

      echo '<td><div style="text-align:right"><input type="submit" value="Save Changes" name="_update_page"/>&nbsp;&nbsp;<input type="submit" value="Preview" name="_preview"/></div></td>';
      echo '</tr>';
      echo '</table>';

      echo '<table style="font-size:10pt;text-align:left;margin-left:auto;margin-right:auto;" cellspacing="2" cellpadding="2">';

      if (isset($_SESSION['errors']))
      {
         echo '<tr><td><b><big>'.$_SESSION['errors'].'</big></b></td></tr>';
         unset($_SESSION['errors']);
      }

      echo "<tr>";
      echo "<td>";
      echo 'Title: ';
      echo '<br/>';
      input_text_value('title', $o->title, 225);
      echo '</td>';

      echo '<td>';
      echo 'url: ';
      echo '<br/>';
      input_text_value('url', $o->url, 225);
      echo '</td>';
      echo '</tr>';

      echo "<tr>";
      echo "<td>";
      echo 'Name: ';
      echo '<br/>';
      input_text_value('name', $o->name, 225);
      echo '</td>';

      echo '<td>';
      echo 'Meta: ';
      echo '<br/>';
      input_text_value('meta', $o->meta, 225);
      echo '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td colspan="2">';
      echo 'Content: ';
      echo '<br/>';
      input_textarea_value('pagedata', $o->page, 18, 85, 0, 0);
      echo '</td>';
      echo '</tr>';

      echo '<tr>';
      echo '<td colspan="2">';
      echo 'Extracted Text: ';
      echo '<br/>';
      input_textarea_value('pagetext', html_entity_decode($o->pagetext, ENT_COMPAT, 'UTF-8'), 8, 85, 0, 1);
      echo '</td>';
      echo '</tr>';

      echo '</table>';
      echo '</fieldset>';
      echo '</form>';
      echo '<br style="clear:both;"/>';

   }   
   $dbh->close();
}

function extractcache()
{
   global $db_table;
   global $use_netcache;

   foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,page FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
            echo html_entity_decode($o->page, ENT_COMPAT, 'UTF-8');
         $dbh->close();
      }
   }
   return;
}

function extractcondensed()
{
   global $db_table;
   global $use_netcache;

   foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,condensed FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
            echo html_entity_decode($o->condensed, ENT_COMPAT, 'UTF-8');
         $dbh->close();
      }
   }
   return;
}

function mailcache()
{
   global $db_table;
   global $use_netcache;

   $meta = "";
   $allurl = array();

    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,url,page FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
         {
            preg_match_all('/href="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (stristr($result, "mailto:"))
                  $meta .= $result."\n";  
            }
/*
            preg_match_all('/<a\s[^>]*href="(.+?)"/ie', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (stristr($result, "mailto:"))
                  $meta .= $result."\n";  
            }
*/                    
            $links = explode("\n", $meta);
            foreach($links as $f => $v)
            {
               if (in_array($v, $allurl))
                  continue;
               $allurl[] = $v;
              
               $spider = new SPIDER;
               $spider->baseurl = $spider->BASE($o->url);
               if (strncmp($v, "//", 2))
                  $v = $spider->adjust($v);
               if ($v and substr($v, 0, 7) == 'mailto:' ) 
                  echo '<a href="'.$v.'".>'.$v.'</a><br/>';
            }
         }
         $dbh->close();
      }
   }
   return;
}

function linkcache()
{ 
   global $db_table;
   global $use_netcache;

   $meta = "";
   $allurl = array();

    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,url,page FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
         {
            $spider = new SPIDER; 

            preg_match_all('/href="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result)
               $meta .= trim($result)."\n";  
                    
            preg_match_all('/src="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result)
               $meta .= trim($result)."\n";  

            // crawl framesets.  does not crawl iframes. 
            preg_match_all('/<frame\s[^>]*src="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result)
               $meta .= trim($result)."\n";  
/*
            preg_match_all('/<frame\s[^>]*src="(.+?)"/ie', $o->page, $match); 
            foreach ($match[1] as $result)
               $meta .= trim($result)."\n";  
            preg_match_all('/<a\s[^>]*href="(.+?)"/ie', $o->page, $match); 
            foreach ($match[1] as $result)
               $meta .= trim($result)."\n";  
*/
            $links = explode("\n", $meta);
            foreach($links as $f => $v)
            {
               if (in_array($v, $allurl))
                  continue;
               $allurl[] = $v;
              
               $spider = new SPIDER;
               $spider->baseurl = $spider->BASE($o->url);
               if (strncmp($v, "//", 2) && strncmp($v, "#", 1))
                  $v = $spider->adjust($v);

               if ($v and (substr($v, 0, 7) == 'http://' || substr($v, 0, 8) == 'https://' ||
                           substr($v, 0, 2) == '//'      || substr($v, 0, 1) == '#')) {
                  // if html '#' citation, append to raw url
                  if (substr($v, 0, 1) == '#') 
                     $v = $o->url.$v;
                  echo '<a href="'.$v.'".>'.$v.'</a><br/>';
               }
            }
         }
         $dbh->close();
      }
   }
   return;
}

function pdfcache($flags = 0)
{
   global $db_table;
   global $use_netcache;

   $meta = "";
   $allurl = array();
   if ($flags)
      $allpdf = array();

    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,url,page FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
         {
            $spider = new SPIDER; 

            preg_match_all('/href="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (stristr($result, ".pdf"))
                  $meta .= trim($result)."\n"; 
            } 

            preg_match_all('/src="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (stristr($result, ".pdf"))
                  $meta .= trim($result)."\n"; 
            } 

            // crawl framesets.  does not crawl iframes. 
            preg_match_all('/<frame\s[^>]*src="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (stristr($result, ".pdf"))
                  $meta .= trim($result)."\n"; 
            } 
/*
            preg_match_all('/<frame\s[^>]*src="(.+?)"/ie', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (stristr($result, ".pdf"))
                  $meta .= trim($result)."\n"; 
            } 
            preg_match_all('/<a\s[^>]*href="(.+?)"/ie', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (stristr($result, ".pdf"))
                  $meta .= trim($result)."\n"; 
            } 
*/                    
            $pdfs = explode("\n", $meta);
            foreach($pdfs as $f => $v)
            {
	       // strip out ?arguments from pdf filename
	       $vpdf = explode("?", $v);
	       if ($vpdf[0])
                  $v = $vpdf[0];

               if (in_array($v, $allurl))
                  continue;
               $allurl[] = $v;
              
               $spider = new SPIDER;
               $spider->baseurl = $spider->BASE($o->url);
               if (strncmp($v, "//", 2))
                  $v = $spider->adjust($v);
               if ($v and !stristr($v, '?') and !stristr($v, '&amp;') and !stristr($v, '='))
               {
                  if ($flags)
                     $allpdf[] = '<a href="'.$v.'".>'.$v.'</a><br/>';
                  else
                     echo '<a href="'.$v.'".>'.$v.'</a><br/>';
               }
            }
         }
          $dbh->close();
      }
   }
   return ($flags ? $allpdf : "");
}

function imagecache()
{
   global $db_table;
   global $use_netcache;

   $allurl = array();
   $img = "";

   foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,url,page FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
         {
            preg_match_all('/src="(.+?)"/i', $o->page, $match); 
            foreach ($match[1] as $result) {
               if (!stristr($result, ".js")) // remove javascripts
                  $img .= trim($result)."\n"; 
            } 
/*
            preg_match_all('/<img\s[^>]*src="(.+?)"/ie', $o->page, $match); 
            foreach ($match[1] as $result)
               $img .= trim($result)."\n";  
*/

            $images = explode("\n", $img);
            foreach($images as $f => $v)
            {
               if (in_array($v, $allurl))
                  continue;
               $allurl[] = $v;
              
               $spider = new SPIDER;
               $spider->baseurl = $spider->BASE($o->url);
               if (strncmp($v, "//", 2))
                  $v = $spider->adjust($v);
               if ($v)
                  echo '<a href="'.$v.'".>'.$v.'</a><br/>';
            }
         }
         $dbh->close();
      }
   }
   return;
}

function cache($view)
{
   global $db_table;
   global $use_netcache;

    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,url,page FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
         {
	    switch ($view) {
	    case 0: // view as HTML
               echo htmlentities($o->page);
	       break;
	    case 1: // view as cached
               echo html_entity_decode($o->page, ENT_COMPAT, 'UTF-8');
	       break;
	    case 2: // view as live session
               $spider = new SPIDER;
               $spider->baseurl = $spider->BASE($o->url);
               $page = $spider->render_links($o->page);
               echo html_entity_decode($page, ENT_COMPAT, 'UTF-8');
	       break;
            }
         }
         $dbh->close();
      }
   }
   return;
}

function http_headers($which)
{
   global $db_table;
   global $use_netcache;

   foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cache))
   {
      $id = $cache;
      if (valid($id))
      { 
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,request,response FROM ".$db_table." WHERE id='$id' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
         {
	    switch ($which) {
	    case 0:
               $page = str_replace("\n", '<br/>', $o->request);
               echo ($page);
	       break;
	    case 1:
               $page = str_replace("\n", '<br/>', $o->response);
               echo ($page);
	       break;
            }
         }
         $dbh->close();
      }
   }
   return;
}

function view($page)
{ 
   global $db_table;
   global $use_netcache;

   if (isset($page))
   {
      if (valid($page))
      {
         $dbh = new DB;
         $ret = $dbh->connect();
         if (!$ret)
         {
            echo "<big>Could not connect to database</big><br/>";
            return;
         }

         $netcache = 0;
         if (isset($use_netcache) and $use_netcache) {
            $netcache = init_netcache();
         }

         $sql = "SELECT id,url,page FROM ".$db_table." WHERE name='$page' and deleted='0' LIMIT 1";
         if (isset($use_netcache) and $use_netcache and $netcache) {
            $querykey = "KEY".generate_key($sql);
            $o = get_netcache($netcache, $querykey);
            if (!$o) {
               $res = $dbh->query($sql);
   	       $o = $dbh->fetch_object($res);
               if (isset($o) and $o)
                  set_netcache($netcache, $querykey, $o, 600);
            }
         }
         else {
            $res = $dbh->query($sql);
   	    $o = $dbh->fetch_object($res);
         }

         if (isset($o) and $o)
         {
            echo html_entity_decode($o->page, ENT_COMPAT, 'UTF-8');
            $dbh->close();
            return $o->url;
         }
         $dbh->close();
      }
   }
   return "";
}

function set_groups($dbh, $group, $clientid)
{
   $sql = "SELECT * from clients where id='".$clientid."' and deleted='0' ";
   $res = $dbh->query($sql);
   $o = $dbh->fetch_object($res);
   if ($o)
   {
      if (isset($group) and $group)
      {
         $groups = explode(':', $o->groups);
         if (isset($groups) and $groups and !in_array($group, $groups))
         {
            unset($_POST);
            $groups[] = $group;
            $_POST['groups'] = implode(':', $groups);
            $cid = $dbh->update('clients', $o->id);
            unset($_POST);
         }
      }
   } 
}

function strmatch($word, $q)
{
   foreach ($q as $v)
   {
      // strip search control characters ()"~<>-+*%
      $length = strlen(trim(trim($v), "()~<>-+*%\x2A\x22\x27"));
      if ($length)
      {
         if (!strncasecmp(trim(trim($word), "()~<>-+*%\x2A\x22\x27"), 
                          trim(trim($v), "()~<>-+*%\x2A\x22\x27"), 
                          strlen(trim(trim($v), "()~<>-+*%\x2A\x22\x27"))))
            return 1;
      }
   }
   return 0;
}

function highlight($string, $q, $id) 
{
   $out = "";

//   $string = str_replace('-', ' ', $string);
   $words = explode(" ", $string);

   for ($i=0; $i < count($words); $i++)
   {
      if (strmatch(trim($words[$i]), $q)) {
         if (isset($id)) 
            $out .= '<span id="'.$id.'"><b>'.$words[$i].'</b></span> ';
         else
            $out .= '<b>'.$words[$i].'</b> ';
      }
      else
         $out .= $words[$i].' ';
   }
   return trim($out);
}

function _explode($delimiters, $string) 
{
    $ary = explode($delimiters[0],$string);

    array_shift($delimiters);
    if ($delimiters != NULL) 
    {
       if(count($ary) < 2)                      
          $ary = _explode($delimiters, $string);
    }
    return  $ary;
}

function search($page)
{
   global $adminuser, $adminpassword;
   global $languages, $language_detection;
   global $db_table, $use_netcache;

   $start = 0;
   $search_condensed = 0;

   foreach ($_GET as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($cls) and $cls == "Clear")
   {
      unset($search);
      unset($start);
      unset($startdate);
      unset($enddate);
      unset($ip);
      unset($cls);
      unset($hostname);
      unset($tag);
      unset($untag);

      // wipe global _GET array since we are reseting on "Clear"
      unset($_GET['search']);
      unset($_GET['start']);
      unset($_GET['startdate']);
      unset($_GET['enddate']);
      unset($_GET['ip']);
      unset($_GET['cls']);
      unset($_GET['hostname']);
      unset($_GET['tag']);
      unset($_GET['untag']);
   }

   $q = "";
   // query array of sql formatted search strings
   $query = array();
   // array of all individual words for highlighting on match
   $qwordlist = array();
   if (isset($search)) {

      if (isset($search) and $search and $search != "")
         file_put_contents($_SERVER['DOCUMENT_ROOT'].'/logs/search_log', $search."\n", FILE_APPEND);

      $q = $search;
      $string = $search;

      // strip out text between quotations, mysql parses quoted strings
      $num = preg_match_all('/&#34;(.*?)&#34;/', $search, $matches);
      if ($num) {
         // split the string and remove quoted strings then 
         // insert into an array
         $split = preg_split('/&#34;(.*?)&#34;/', $search);

         // remove leading and trailing whitespace
         foreach ($split as $f => $v) {
            $f = trim($v);
         }
         $string = implode(" ", $split);
      } 
      // assemble string in order to strip whitespace
      $string = preg_replace('/\s+/', ' ', $string);

      $words = explode(" ", trim($string));
      $query = array_merge($matches[0], $words);

      // remove empty strings from array
      $query = array_values(array_filter($query));

      // convert to individual words
      $words = implode(" ", $query);
      $words = str_replace('&#34;', '', $words);
      $words = preg_replace('/\s+/', ' ', $words);
      $qwordlist = explode(" ", $words);

   }

   $dbh = new DB;
   $ret = $dbh->connect();
   if (!$ret)
   {
      echo "<big>Could not connect to database</big><br/>";
      return;
   }

   $netcache = 0;
   if (isset($use_netcache) and $use_netcache) {
      $netcache = init_netcache();
   }

   for ($i=0; $i < count($query); $i++)
   {
      $len = strlen($query[$i]);
      if ($len and $len < 4 and substr($query[$i], -1) != '*' and !stristr($query[$i], "*"))
            $query[$i] .= '*';
   }

   if ($page == "all" or $page == "alerts" or !count($query)) {

      $min = array();
      $idcount = array();

      $sql = "SELECT min(id) from ".$db_table;
      $res = $dbh->query($sql);
      $o = $dbh->fetch_object($res); 
      foreach ($o as $f => $v)
         $min[] = $v;

      $sql = "SELECT count(id) from ".$db_table;
      $res = $dbh->query($sql);
      $o = $dbh->fetch_object($res); 
      foreach ($o as $f => $v)
         $idcount[] = $v;

      $ids = array();
      if ($min[0] and $idcount[0]) {
         //for ($i=$min[0]; $i < ($idcount[0] + $min[0]); $i++)
         for ($i=$idcount[0]; $i >= ($min[0]); $i--) {
            $ids[] = array($i, 0); 
         }
      }
   }
   else
   {
      // search on titles only first 
      $sql = "SELECT id,MATCH(title) AGAINST('";
      for ($i=0; $i < count($query); $i++)
      {
         if ($i) $sql .= ','.$query[$i];
         else  $sql .= $query[$i];
      }
      $sql .= "' IN BOOLEAN MODE) AS relevance FROM ".$db_table." WHERE MATCH(title) AGAINST('";
      for ($i=0; $i < count($query); $i++)
      {
         if ($i) $sql .= ','.$query[$i];
         else $sql .= $query[$i];
      }
      //$sql .= "' IN BOOLEAN MODE) order by relevance DESC";
      $sql .= "' IN BOOLEAN MODE) ". ($ip ? " and ip='".$ip."'" : "")
                                   . ($startdate ? " and date(create_date) >= '".$startdate."'" : "")
                                   . ($enddate ? " and date(create_date) <= '".$enddate."'" : "")
                                   ." order by relevance DESC";
 
      if (isset($use_netcache) and $use_netcache and $netcache) {
         $ids = array();
         $querykey = "KEY".generate_key($sql);
         $ids = get_netcache($netcache, $querykey);
         if (!$ids) {
            $ids = array();
            $res = $dbh->query($sql);
            while ($o = $dbh->fetch_object($res)) { 
               $ids[] = array($o->id, $o->relevance); 
            }
            if (count($ids))
   	       set_netcache($netcache, $querykey, $ids, 600);
         }
      }
      else {
         $ids = array();
         $res = $dbh->query($sql);
         while ($o = $dbh->fetch_object($res)) { 
            $ids[] = array($o->id, $o->relevance); 
         }
      }
   }

   // if first search on titles fails then search on condensed 
   if ($search_condensed) {
      if (!isset($ids[0][0]) and isset($search) and $page != "all")
      {
         $sql = "SELECT id,MATCH(condensed) AGAINST('";
         for ($i=0; $i < count($query); $i++)
         {
            if ($i) $sql .= ','.$query[$i];
            else  $sql .= $query[$i];
         }
         $sql .= "' IN BOOLEAN MODE) AS relevance FROM ".$db_table." WHERE MATCH(condensed) AGAINST('";
         for ($i=0; $i < count($query); $i++)
         {
            if ($i) $sql .= ','.$query[$i];
            else $sql .= $query[$i];
         }
         //$sql .= "' IN BOOLEAN MODE) and deleted='0' and userlist='0' and page <> '' ".
         //        "order by relevance DESC, condensed ASC ";
         //$sql .= "' IN BOOLEAN MODE) order by relevance DESC, condensed ASC";
         $sql .= "' IN BOOLEAN MODE) ". ($ip ? " and ip='".$ip."'" : "")
                                      . ($startdate ? " and date(create_date) >= '".$startdate."'" : "")
                                      . ($enddate ? " and date(create_date) <= '".$enddate."'" : "")
                                      ." order by relevance DESC, condensed ASC";
         $ids = array();
         $res = $dbh->query($sql);
         while ($o = $dbh->fetch_object($res)) { 
            $ids[] = array($o->id, $o->relevance); 
         }
      }
   }

   // collapse array columns of ids into single array list
   function procids($id) { return $id[0]; }
   $idscompat = array_map('procids', $ids);

   if (!isset($start))
      $start = 0;

   $pg = new PG;
   $pg_window = 13;
   $pg_width = 10;
   $pglist = $pg->paginate($start, $idscompat, $pg_window, $pg_width, $q, 1, NULL);

   echo '<fieldset>';
   echo '<form action="'.baseURL().'" name="searchpanel" method="get">';
   echo '<input type="hidden" name="page" value="search"/>';
   echo '<input id="find" name="search" type="text" value="'.
                                          (isset($search) ? $search : "").'" style="width:180pt;"/>';
   echo '<input name="start" type="hidden" value="0"/>';
   echo '&nbsp;<input name="action" type="submit" value="Search"/>';
   echo '&nbsp;<input name="cls" type="submit" value="Clear"/>';

   echo '&nbsp;&nbsp;&nbsp;';
   echo '<select onchange="this.form.submit();" name="ip">';
   if (isset($ip) and $ip and ((filter_var($ip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) or
                               (filter_var($ip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false))) 
      echo '<option value=""> Clear User </option>';
   else
      echo '<option value=""> Select User </option>';

   $sql = "SELECT distinct(ip) from ".$db_table;
   $res = $dbh->query($sql);
   while ($o = $dbh->fetch_object($res)) { 
      $ips[] = $o->ip; 
   }

   if (isset($ips)) {
      foreach($ips as $ipaddr) {
	if ($ipaddr) {
	        $host = gethostbyaddr($ipaddr);
                if (isset($ip)) 
	   	   $sel = ($ip == $ipaddr) ? ' SELECTED' : '';
                else
	   	   $sel = '';
		if (isset($host) and $host) {
		   	echo "<option value=\"".$ipaddr."\" $sel>$host</option>";
		}
		else
   			echo "<option value=\"".$ipaddr."\" $sel>$ipaddr</option>";
	}
      }  
   }
   echo '</select>';

   echo '&nbsp;&nbsp;&nbsp;Start Date:&nbsp;';
   echo '<input name="startdate" type="text" value="'.
         (isset($startdate) ? $startdate : "").'" id="datepicker1">';

   echo '&nbsp;&nbsp;&nbsp;End Date:&nbsp;';
   echo '<input name="enddate" type="text" value="'.
         (isset($enddate) ? $enddate : "").'" id="datepicker2">';

   if (isset($hostname))
      echo '<input type="hidden" name="hostname" value="'.$hostname.'"/>';

   if (isset($pglist[1]))
      echo $pglist[1];

   echo '</form>';
   echo '</fieldset>';

   if (isset($pglist[0]))
      echo $pglist[0];

   if (isset($ip) and $ip and 
        ((filter_var($ip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) or
         (filter_var($ip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false))) {
      echo '<br style="clear:both;"/>';
      echo '<div style="font-size:13pt;float:center;margin-left:20px;margin-right:auto;">';
      $host = gethostbyaddr($ip);
      echo 'Records for IP: <b>'.$ip.'</b>';
      if (isset($host) and $host)
	 echo ' Hostname: <b>'.$host.'</b>';
      echo '</div>';
   }
   else 
      echo '<br style="clear:both;"/>';

   echo '<hr/>';
   if (isset($pglist[2]))
      echo $pglist[2];

   if (!isset($ids[0][0])) {
      return;
   }

   echo '<div style="margin-left:20px;margin-right:auto;">';

   $x = 0;
   if (isset($entry))
      $x = $entry;

   for ($y = 0; $y < $pg_window; $y++)
   {
      if (!isset($ids[$x + $y][0]))
         break;

      $id = $ids[$x + $y][0];

      $sql = "SELECT * from ".$db_table." WHERE id=".$id." limit 1";
      $o = array();
      if (isset($use_netcache) and $use_netcache and $netcache) {
         $querykey = "KEY".generate_key($sql);
         $o = get_netcache($netcache, $querykey);
         if (!$o) {
            $res = $dbh->query($sql);
            $o = $dbh->fetch_object($res);
            if (isset($o) and $o)
	       set_netcache($netcache, $querykey, $o, 600);
         }
      }
      else {
         $res = $dbh->query($sql);
         $o = $dbh->fetch_object($res); 
      }

      if ($o)
      {
         // title
         $string = trim($o->title);
         $string = html_entity_decode($string, ENT_COMPAT, 'UTF-8');
         $string = nl2br(strip_tags($string));
         
	 $string = htmlspecialchars_decode($string, ENT_QUOTES);

	 // remove any page breaks from the title text
         global $search_hack;
         $string = preg_replace($search_hack, ' ', $string);

         // check for 40X and 50X error codes
         //  if (substr($string, 0, 2) == '40')
         //     continue;
         //  if (substr($string, 0, 2) == '50')
         //     continue;
/*
         if ((strlen($string) > 64) and (preg_match('/^.{1,61}\b/s', $string, $match)))
         {
            $string = $match[0];
            $string .= ' ...';
         }
         else
*/
         if (strlen($string) > 184)
         {
            $string = substr($string, 0, 181);
            $string .= ' ...';
         }

         // url
         $url = str_replace(" ", "%20", $o->url);
         if (strncasecmp("http", $url, 4))
            $url = 'http://'.$url;

         // chop up the first three page chunks, default case

         $html = $o->condensed;
         $html = html_entity_decode($html, ENT_COMPAT, 'UTF-8');

         // strip out sentences and display search for matching terms
         // break up into sentences
         $out = "";
         $sentences = explode(".", $html);

         $matchlist = array();  
         $baselist = array();  

         for ($i=0; $i < count($sentences); $i++)
         {
            $sentences[$i] = trim($sentences[$i]);
            $sentences[$i] .= '.';

            if ($q and ($search = stristr($sentences[$i], $q)))
            {
               $search = trim($search);
               $matchlist[] = $search." ";
            }
            else
            {
               $search = $sentences[$i];
               if (substr($search, 0, 1) != '.')
                  $baselist[] = $search;
            }
         }

         // return first three lines.  return matches first and if 
         // empty, return filler text
         for ($i=0,$j=0,$k=0; strlen($out) < 185; $j++)
         {
            if (isset($matchlist[$i]) and $matchlist[$i])
            {
               $out .= $matchlist[$i++];
            }
            else
            if (isset($baselist[$k]) and $baselist[$k])
            {
               $out .= $baselist[$k++];
            }
            else
               break;
         }

         if ((strlen($out) > 185) and (preg_match('/^.{1,181}\b/s', $out, $match)))
         {
            $out = $match[0];
            $out = $out.' ...';
         }
         else if (strlen($out) > 185)
         {
            $out = substr($out, 0, 181);
            $out .= '...';
         }
       
         $requrl = $url;
         $reqarr = array_slice(explode("\n", $o->request), 0, 1);
         if (isset($reqarr) and $reqarr and $reqarr[0]) {
            $reqlist = array_slice(explode(' ', $reqarr[0]), 0, 3);
            if ($reqlist and $reqlist[1])
               $requrl = $reqlist[1];
         }

         if (!$string or $string == "")
         {
/*
            $delims = array(0=> ':', 1 => ',', 2 => '.', 3 => ';', 4 => '?', 5 => '|');
            $headline = _explode($delims, $out);
            if ((strlen($headline[0]) > 84) and (preg_match('/^.{1,81}\b/s', $headline[0], $match)))
            {
               $headline[0] = $match[0];
               $headline[0] = $headline[0].' ...';
            }
            else
            if (strlen($headline[0]) > 84)
            {
               $headline[0] = substr($headline[0], 0, 81);
               $headline[0] .= '...';
            }
            $string = highlight($headline[0], $qwordlist, "");
*/
            $string = $requrl;
            if (strlen($string) > 84)
            {
               $string = substr($string, 0, 81);
               $string .= '...';
            }
            echo '<a style="font-size:14pt;" href="'.$requrl.'">'.$string.'</a>';       
	    if ($o->tagged)
               echo '&nbsp;&nbsp;<img src="'.imageURL().'check.png" alt=""/>';
         }
         else {
            $string = highlight($string, $qwordlist, "");
            echo '<a style="font-size:14pt;" href="'.$requrl.'">'.$string.'</a>';     
	    if ($o->tagged)
               echo '&nbsp;&nbsp;<img src="'.imageURL().'check.png" alt=""/>';
         }

         // NOTE:  live language detection is processor intensive
         if (isset($language_detection) and $language_detection) {
            $ld = new LanguageDetector;

            $language_sample = $o->condensed;
            if (strlen($language_sample) > 1024)
               $language_sample = substr($language_sample, 0, 1024);
            $language = $ld->evaluate($language_sample)->getLanguage();
    	    //$scores = $ld->getScores();
            //$supported_languages = $ld->getSupportedLanguages();
            echo ' <b><sub>&nbsp;'.$language.'</sub></b></span>';
         }
	 else
            echo ' <b><sub>  '.$o->language.'</sub></b></span>';

         if (strlen($url) > 85)
         {
            $url = substr($url, 0, 81);
            $url .= ' ...';
         }
         echo '<br/>';
         echo '<span id="searchurl" style="font-size: 13pt;">'.$url.'</span>';

         echo '<div style="width:70%;">';

         if ($out)
            echo highlight($out, $qwordlist, "matchurl")."<br/>";

         $spider = new SPIDER; 
         $target = $o->url;
         $meta = "";

         preg_match_all('/href="(.+?)"/i', $o->page, $match); 
         foreach ($match[1] as $result) {
            if (stristr($result, ".pdf"))
               $meta .= trim($result)."\n"; 
         } 

         preg_match_all('/src="(.+?)"/i', $o->page, $match); 
         foreach ($match[1] as $result) {
            if (stristr($result, ".pdf"))
               $meta .= trim($result)."\n"; 
         } 

         // crawl framesets.  does not crawl iframes. 
         preg_match_all('/<frame\s[^>]*src="(.+?)"/i', $o->page, $match); 
         foreach ($match[1] as $result) {
            if (stristr($result, ".pdf"))
               $meta .= trim($result)."\n"; 
         } 
/*
         preg_match_all('/<frame\s[^>]*src="(.+?)"/ie', $o->page, $match); 
         foreach ($match[1] as $result) {
            if (stristr($result, ".pdf"))
               $meta .= trim($result)."\n"; 
         } 

         preg_match_all('/<a\s[^>]*href="(.+?)"/i', $o->page, $match); 
         foreach ($match[1] as $result)  {
            if (stristr($result, ".pdf"))
               $meta .= trim($result)."\n"; 
         }

         preg_match_all('/<frame\s[^>]*src="(.+?)"/i', $o->page, $match); 
         foreach ($match[1] as $result) {
            if (stristr($result, ".pdf"))
               $meta .= trim($result)."\n";  
         }
*/
         if (stristr($meta, ".pdf"))
         {
            $allurl = array();
            $allpdf = array();
            $pdfs = explode("\n", $meta);
            $i = 0;

            foreach($pdfs as $f => $v)
            {
	       // strip out ?arguments from pdf filename
	       $vpdf = explode("?", $v);
	       if ($vpdf[0])
                  $v = $vpdf[0];
		
               $spider = new SPIDER;
               $spider->baseurl = $spider->BASE($o->url);
               $v = $spider->adjust($v);

               if ($v and !stristr($v, '?') and !stristr($v, '&amp;') and !stristr($v, '='))
               {
                  $tmp = explode('/', $v);
                  $pdffile = array_pop($tmp);

                  if (in_array($pdffile, $allurl))
                     continue;
                  $allurl[] = $pdffile;
              
                  $tmp = explode('/', $v);
                  $allpdf[] = '<a href="'.$v.'">'.str_replace('%20',' ',array_pop($tmp)).'</a>';
                  if (++$i > 2)
                  {
                     $allpdf[] = '  <a href="'.baseURL().'?page=pdfcache&amp;cache='.
                                 $o->id.'">...</a>';
                     break;
                  }
               }
            }

            if (count($allpdf)) {
               echo '<table style="float:left;text-align:left;"><tr>';
               echo '<td><img style="vertical-align:left;padding-right:10px;" src="'.imageURL().
                    'pdf_icon.png" alt=""/></td><td>';

               $i = 0;
	       foreach($allpdf as $pdflink) {
                  if ($i++)
	             echo ', ';
                  echo $pdflink;
               }
               echo '</td></tr></table><br style="clear:both;"/>';
            }
         }
         echo '</div>';

         echo '<span>';
         $url = $o->url;
         if (strlen($url) > 45)
         {
            $url = substr($url,0,42);
            $url .= '...';
         }

         // relevance is returned during initial search then saved and
         // printed here
         if (isset($ids[$x + $y][1]) and $ids[$x + $y][1])
         {
            echo '<span style="font-size:11pt;">';
            echo ' Search Relevance: '.$ids[$x + $y][1];
            echo '</span>';
            echo '<br/>';
         }

         echo $o->create_date.' ';
         $length = strlen($o->page);
         if ($length)
            echo '  '.$length.' bytes';
         echo '</span>';

         $host = gethostbyaddr($o->ip);
         echo ' - <a href="'.baseURL().
              implode_get(explode_get('ip,hostname,cls','ip='.$o->ip)).'">'.$o->ip.
              (($o->account) ? ' / '.$o->account : '').'</a>';

         echo ' - <a href="'.baseURL().'?page=viewcache&amp;cache='.$o->id.
              '">Cached</a>';
         echo ' - <a href="'.baseURL().'?page=viewlive&amp;cache='.$o->id.
              '">Live</a>';
         echo ' - <a href="'.baseURL().'?page=cache&amp;cache='.$o->id.
              '">HTML</a>';
         echo ' - <a href="'.baseURL().'?page=condensed&amp;cache='.$o->id.
              '">Condensed</a>';
         echo ' - <a href="'.baseURL().'?page=linkcache&amp;cache='.$o->id.
              '">Links</a>';
         echo ' - <a href="'.baseURL().'?page=imagecache&amp;cache='.$o->id.
              '">Images</a>';
         echo ' - <a href="'.baseURL().'?page=mailcache&amp;cache='.$o->id.
              '">Email</a>';
         echo ' - <a href="'.baseURL().'?page=pdfcache&amp;cache='.$o->id.
              '">PDF</a>';
         echo ' - <a href="'.baseURL().'?page=viewrequest&amp;cache='.$o->id.
              '">Req</a>';
         echo ' - <a href="'.baseURL().'?page=viewresponse&amp;cache='.$o->id.
              '">Resp</a>';
         if ($o->tagged)
            echo ' - <a href="'.baseURL().implode_get(explode_get('tag','untag='.$o->id.'')).'">Untag</a>';
         else
            echo ' - <a href="'.baseURL().implode_get(explode_get('untag','tag='.$o->id.'')).'">Tag</a>';

/*
         if (is_admin())
         {
            echo ' - <a href="'.baseURL().'?page=edit&amp;cache='.$o->id.'">Edit</a>';
            echo ' - <a href="'.baseURL().'?page=disable&amp;cache='.$o->id.'">Hide</a>';
            echo ' - <a href="'.baseURL().'?page=enable&amp;cache='.$o->id.'">Visible</a>';
         }
*/
         echo '<br/>';
         echo '<br/>';
      }
   }

   $dbh->close();
   echo '</div>';

   echo '<br style="clear:both;"/>';
   if (isset($pglist[2]))
      echo $pglist[2];
   echo '<hr/>';
   echo '<br style="clear:both;"/>';

}

function internal_crawl($lockfile)
{
   global $db_client;

   $ignored = array(
      "1" => "page=all",
      "2" => "page=search",
      "3" => "page=forums",
   );

   if (!file_exists($lockfile)) {
      $fp = fopen($lockfile, 'wb');
      if ($fp)
         fclose($fp);
   }

   $GLOBALS['allurl'] = array();

   $sql = "SELECT * from spider WHERE deleted='0'";
   $dbh = new DB;
   $ret = $dbh->connect($db_client);
   if (!$ret)
   {
      echo "<big>Could not connect to database</big><br/>";
      if (file_exists($lockfile)) 
         unlink($lockfile);
      return;
   }

   $res = $dbh->query($sql);
   while ($o = $dbh->fetch_object($res))
   {
      $spider = new SPIDER;
      $spider->site = $o->url;
      $spider->ignored = $ignored;
      $spider->urllist = $o->url;
      $spider->depth = 2;
      $spider->verbose = 1;
      $spider->dom = 0;
      $GLOBALS['allurl'] = array();
      $spider->CRAWL(1);
   }
   if (file_exists($lockfile)) 
      unlink($lockfile);
   return;
}

function is_admin()
{
   global $adminuser;

   if (isset($_SESSION['activename']))
   {
      $username = $_SESSION['activename'];
      if (isset($_SESSION[$username]['groups']))
         $groups = explode(':', $_SESSION[$username]['groups']);
   
      if ($_SESSION['activename'] == $adminuser or 
         (isset($groups) and $groups and in_array($adminuser, $groups)))
         return 1;
   }
   return 0;
}

function privacy()
{
   global $sitename, $service_email, $admin_email;
   global $supportphone;
   global $siteowner;

   echo '
<div style="text-align:center;margin-right:5%;margin-left:5%;font-size:12pt;">
<div style="text-align:left">

<br/>
<br/>
<div style="text-align:center;">
   <h2>'.$siteowner.' Privacy Policy</h2><br/>
</div>

Thank you for visiting our web site. This privacy policy tells you how we use personal information collected at this site. Please read this privacy policy before using the site or submitting any personal information. By using the site, you are accepting the practices described in this privacy policy. These practices may be changed, but any changes will be posted and changes will only apply to activities and information on a going forward, not retroactive basis. You are encouraged to review the privacy policy whenever you visit the site to make sure that you understand how any personal information you provide will be used.
<br/>
<br/>
Note: the privacy practices set forth in this privacy policy are for this web site only. If you link to other web sites, please review the privacy policies posted at those sites.
<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Collection of Information</span></b>
</div>
<br/>

We collect personally identifiable information, like names, postal addresses, email addresses, etc., when voluntarily submitted by our visitors. The information you provide is used to fulfill your specific request. This information is only used to fulfill your specific request, unless you give us permission to use it in another manner, for example to add you to one of our mailing lists.
<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Cookie/Tracking Technology</span></b>
</div>
<br/>

The Site may use cookie and tracking technology depending on the features offered. Cookie and tracking technology are useful for gathering information such as browser type and operating system, tracking the number of visitors to the Site, and understanding how visitors use the Site. Cookies can also help customize the Site for visitors. Personal information cannot be collected via cookies and other tracking technology, however, if you previously provided personally identifiable information, cookies may be tied to such information. 
<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Distribution of Information</span></b>
</div>
<br/>

We may share information with governmental agencies or other companies assisting us in fraud prevention or investigation. We may do so when: (1) permitted or required by law; or, (2) trying to protect against or prevent actual or potential fraud or unauthorized transactions; or, (3) investigating fraud which has already taken place. The information is not provided to these companies for marketing purposes. 
<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Commitment to Data Security</span></b>
</div>
<br/>

Your personally identifiable information is kept secure. Only authorized employees, agents and contractors (who have agreed to keep information secure and confidential) have access to this information.  
<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Privacy Contact Information</span></b>
</div>
<br/>

If you have any questions, concerns, or comments about our privacy policy you may contact us using the information below:
<br/>
<br/>
By e-mail: <a class="medium" href="mailto:'.$admin_email.'">'.$admin_email.'</a> 
<br/>
By Phone: '.$supportphone.' 
<br/>
<br/>
We reserve the right to make changes to this policy.  Any changes to this policy will be posted.
<br/>
<br/>
<br/>
</div>
</div>
   ';
}

function termsofservice()
{
   global $siteowner;
   global $sitename;
   global $admin_email;
   global $supportphone;

   echo '
<div style="text-align:center;margin-right:5%;margin-left:5%;font-size:12pt;">
<div style="text-align:left">

<br/>
<div style="text-align:center;">
   <h2>'.$siteowner.' Terms of Service</h2><br/>
</div>

<div style="text-align:center;">
   <b><span class="head3">Rules and Regulations</span></b>
</div>
<br/>

Thank you for visiting our website.  The following terms and conditions apply to all visitors or users of this site. By accessing this site, user acknowledges his/her acceptance of these terms and conditions. '.$siteowner.' reserves the right to change these rules and regulations from time to time at its sole discretion. In the case of any violation of these rules and regulations, '.$siteowner.' reserves the right to suspend user account services for a particular account or other remedies available by law and in equity for such violations. These rules and regulations apply to all visits to the '.$siteowner.' Site.<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Compliance with Regional Laws</span></b>
</div>
<br/>

User access to this site is governed by all applicable federal, state and local laws. All information available on the site is subject to U.S. export control laws and may also be subject to the laws of the country where the site is accessed or a user resides.<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Password Protected/Secure Areas of the Site</span></b>
</div>
<br/>

Access to and use of password protected and/or secure areas of the site is restricted to authorized users only. Unauthorized individuals attempting to access these areas of the site through malicious or unlawful means may be subject to prosecution.<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Trademarks</span></b>
</div>
<br/>

All trademarks, logos and service marks ("Marks") displayed on this site are the property of '.$siteowner.' or other third parties. Visitors and site users are not permitted to use these Marks without the prior written consent of '.$siteowner.' or any third party which may own the Mark. "'.$siteowner.'", the '.$siteowner.' logo, are trademarks of '.$siteowner.' and other third parties.<br/>
<br/>

<div style="text-align:center;">
   <b><span class="head3">Third Party Links</span></b>
</div>
<br/>

This site may contain links to other third party sites. Access to any other site linked to this site is at the users own risk and '.$siteowner.' is not responsible for the accuracy or reliability of any information, or statements made on these sites. '.$siteowner.' provides these links as a convenience and the inclusion of such links does not imply an endorsement of any of these sites.<br/>
<br/>
If you have any questions, concerns, or comments about our site you may contact us using the information below:
<br/>
<br/>
By e-mail: <a class="medium" href="mailto:'.$admin_email.'">'.$admin_email.'</a> 
<br/>
By Phone: '.$supportphone.' 
<br/>
</div>
</div>
<br style="clear:both;"/>
';

}

function vertical_text_bar($label, $data, $color)
{
   // total width
    $total_width = 700;

    // base color
    $base_color = 'silver';
    $traffic_color = 'green';

    if ($data > 100)
       $data = 100;

    $trafficlight = $data;
    if ($trafficlight < 34)
       $traffic_color = 'green';
    else
    if ($trafficlight >= 34 && $trafficlight <= 67)
       $traffic_color = 'yellow';
    else
    if ($trafficlight > 67)
       $traffic_color = 'red';

    printf("<table style=\"text-align:center;margin-left:auto;margin-right:auto;\" width=\"$total_width\">\n");
    if ($label)
    {
       //print "<tr><td colspan=2><small><small>".$label." (".$data."%)</small></small></td></tr>\n";
       print "<tr><td colspan=2>".$label." (".$data."%)</td></tr>\n";
    }
    printf("<tr>\n");
    if ($data && ($data > 0))
    {
       if ($color)
          print"<td width=".$data."% bgcolor=".$color.">&nbsp;</td>\n";
       else
          print"<td width=".$data."% bgcolor=".$traffic_color.">&nbsp;</td>\n";

       print"<td width=".(100-$data)."% bgcolor=".$base_color."></td>\n";
    }
    else
    {
       print"<td width=".(100-$data)."% bgcolor=".$base_color.">&nbsp;</td>\n";
    }
    printf("</tr>\n");
    printf("</table>\n");
}

function get_host_and_port($server){
	$values = explode(',', $server);
	if (($values[0] == 'unix') && (!is_numeric( $values[1]))) {
		return array($server, 0);
	}
	else {
		return $values;
	}
}

function get_user_and_pass($user){
	$values = explode(':', $user);
	return $values;
}

function generate_key($sql)
{
	global $db_host, $db_name, $db_table, $db_user, $key_algo, $secure_hash_algo;

        if (isset($_SESSION['activename']) and $_SESSION['activename']) 
           $name = $_SESSION['activename'];
        else $name = '';
          
        if (in_array($key_algo, $secure_hash_algo))
	   return hash($key_algo, $name.$db_host.$db_name.$db_table.$db_user.$sql, false);
        else 
	   return hash("md5", $name.$db_host.$db_name.$db_table.$db_user.$sql, false);
}

// Memcache and Memcached (libmemcache) functions
// echo '('.$memcache->getResultCode().')'; // returns last result
function set_memcache($memcache, $key, $data, $expired)
{
    global $use_libmemcached;

    if ($use_libmemcached) 
       return $memcache->set($key, $data, $expired);   
    else
       return $memcache->set($key, $data, 0, $expired);   
}

function get_memcache($memcache, $key)
{
    return $memcache->get($key);   
}

function init_memcache()
{
   global $MEMCACHE_SERVERS;
   global $MEMCACHE_SASL;
   global $compress_threshold;
   global $use_libmemcached;
   global $use_sasl;

   if ($use_libmemcached)
      $memcache = new Memcached();
   else
      $memcache = new Memcache();

   if (isset($memcache) and $memcache) {
      //cleanup memcache server array and remove empty or malformed servers
      $MEMCACHE_SERVERS = array_values(array_filter($MEMCACHE_SERVERS));

      if ($use_libmemcached) {
         //var_dump($memcache->getServerList());         

         $serverlist = array();
         foreach ($MEMCACHE_SERVERS as $server) {
            $strs = get_host_and_port($server);
	    $host = $strs[0];
	    $port = $strs[1];
            $serverlist[] = array($host, $port, 0);
         }
         $ret = $memcache->addServers($serverlist);
         if (!$ret)
            return NULL;
      }
      else {
         foreach ($MEMCACHE_SERVERS as $server) {
            $strs = get_host_and_port($server);
	    $host = $strs[0];
	    $port = $strs[1];
            $ret = $memcache->addServer($host, $port);
            if (!$ret)
               return NULL;
         }
      }

      $sasl_data = get_user_and_pass($MEMCACHE_SASL);
      $username = $sasl_data[0];
      $password = $sasl_data[1];
      if ($use_libmemcached) {
         $memcache->setOption(Memcached::OPT_SERIALIZER, Memcached::SERIALIZER_IGBINARY);
         $memcache->setOption(Memcached::OPT_BINARY_PROTOCOL,true);
         if ($use_sasl and $username and $password) {
            $memcache->setSaslAuthData($username, $password);
         }
         if ($compress_threshold)
            $memcache->setOption(Memcached::OPT_COMPRESSION, false);
      } 
      else {
         if ($compress_threshold)
            $memcache->setCompressThreshold($compress_threshold);
      }
      return $memcache;
   }
   return NULL;
}

// redis functions
function set_redis($redis, $key, $data, $expired)
{
    return $redis->set($key, serialize($data), [ 'nx', 'ex' => $expired ]);   
}

function get_redis($redis, $key)
{
    return unserialize($redis->get($key));   
}

function init_redis($verbose = 0)
{
   global $REDIS_SERVERS;
   global $REDIS_AUTH;
   global $use_redisauth;

   $redis = '';
   $redistable = array();
   $redisstats = array();
   foreach ($REDIS_SERVERS as $key => $server) {
      $redis = new Redis();
 
      $rchars = array("[", "]");
      $host = str_replace($rchars, '', $server[1]);
      try {
         $redisstats[] = $redis->connect($host, $server[2]); 
      } catch (Exception $e) {
         echo "Cannot connect to redis server($server[1]:$server[2]):".$e->getMessage().'<br/>';
         continue;
      }

      if ($verbose)
         echo "Connected to server($server[1]:$server[2])"."<br/>"; 

      if ($use_redisauth) {
         if ($redis->auth($REDIS_AUTH) == false) {
            if ($verbose)
               echo "Cannot authenticate to server($server[1]:$server[2]):".'<br/>';
            continue;
         } else {
            if ($verbose)
               echo "Authenticated to server($server[1]:$server[2]):".'<br/>';
         }
      }
      $redistable[] = $redis; 
      if ($verbose)
         echo "Server ($server[1]:$server[2]) is running: ".($redis->ping() ? 'online' : 'offline')."<br/>"; 

      break;
   }
   $nums = "0123456789";
   $index = substr(str_shuffle($nums), 0, 2);
   return (count($redistable) ? $redistable[$index % count($redistable)] : NULL);
}

function set_netcache($netcache, $key, $data, $expired)
{
   global $use_memcache, $use_redis;
   return ($use_redis ? set_redis($netcache, $key, $data, $expired) 
                      : set_memcache($netcache, $key, $data, $expired));
}

function get_netcache($netcache, $key)
{
   global $use_memcache, $use_redis;
   return ($use_redis ? get_redis($netcache, $key) : get_memcache($netcache, $key));
}

function init_netcache()
{
   global $use_memcache, $use_redis;
   return ($use_redis ? init_redis() : init_memcache());
}


function charts() {
   global $db_table, $use_netcache;

   $dbh = new DB;
   $ret = $dbh->connect();
   if (!$ret)
   {
      echo "<big>Could not connect to database</big><br/>";
      return;
   }
   printf("<div id=\"chartdiv\">");
   printf("<br/>\n");

   $netcache = 0;
   if (isset($use_netcache) and $use_netcache) {
      $netcache = init_netcache();
   }

   $sql = "SELECT distinct(url),count(id) from ".$db_table." GROUP BY url ORDER BY count(id) DESC";
   if (isset($use_netcache) and $use_netcache and $netcache) {
      $urls = array();
      $querykey = "KEY".generate_key($sql);
      $urls = get_netcache($netcache, $querykey);
      if (!$urls) {
         $urls = array();
         $res = $dbh->query($sql);
         while ($o = $dbh->fetch_object($res)) { 
            $urls[] = $o->url; 
         }
         if (count($urls))
            set_netcache($netcache, $querykey, $urls, 600);
      }
   }
   else {
      $urls = array();
      $res = $dbh->query($sql);
      while ($o = $dbh->fetch_object($res)) { 
         $urls[] = $o->url; 
      }
   }

   $df_output = "Top URLs$";
   $i = 0;
   $addr = "";
   $value = "";
   foreach($urls as $url) {
	if ($i > 30)
		break;
        if ($i++ > 0) {
           $addr .= '*';
           $value .= '*';
        }
        if ($url) $addr .= $url;
        else      $addr .= "localhost";

   	$sql = "SELECT count(id) from ".$db_table." WHERE url='".$url."'";
        if (isset($use_netcache) and $use_netcache and $netcache) {
           $querykey = "KEY".generate_key($sql);
           $row = get_netcache($netcache, $querykey);
           if (!$row) {
              $res = $dbh->query($sql);
   	      $row = $dbh->fetch_row($res);
              if (count($row))
                 set_netcache($netcache, $querykey, $row, 600);
           }
        }
        else {
           $res = $dbh->query($sql);
   	   $row = $dbh->fetch_row($res);
        }
	foreach ($row as $data) 
		$value .= $data;
   }  
   $df_output .= $addr."\n";
   $df_output .= $value."\n";
   $df_lines = explode("\n", $df_output);
   $labels = explode("$", $df_lines[0]);
   $data = $df_lines[1];

   // limit to only top 16 entries
   $label_temp = explode('*', $labels[1]);
   $data_temp = explode('*', $data);
   $label_temp = array_slice($label_temp, 0, 16);
   $data_temp = array_slice($data_temp, 0, 16);
   $labels[1] = implode('*', $label_temp);
   $data = implode('*', $data_temp);

   printf("<img src=\"chart.php?label=$labels[1]&data=$data&heading=$labels[0]\">\n");
   printf("<br/>\n");
   printf("<br/>\n");
   printf("<hr/>\n");

   $sql = "SELECT distinct(ip),count(id) from ".$db_table." GROUP BY ip ORDER BY count(id) DESC";
   if (isset($use_netcache) and $use_netcache and $netcache) {
      $ips = array();
      $querykey = "KEY".generate_key($sql);
      $ips = get_netcache($netcache, $querykey);
      if (!$ips) {
         $ips = array();
         $res = $dbh->query($sql);
         while ($o = $dbh->fetch_object($res)) { 
            $ips[] = $o->ip; 
         }
         if (count($ips))
            set_netcache($netcache, $querykey, $ips, 600);
      }
   }
   else {
      $ips = array();
      $res = $dbh->query($sql);
      while ($o = $dbh->fetch_object($res)) { 
         $ips[] = $o->ip; 
      }
   }

   $df_output = "Active Users$";
   $i = 0;
   $addr = "";
   $host = "";
   $hosts = "";
   $value = "";
   foreach($ips as $d) {
	if ($i > 30)
		break;

        if ($i++ > 0) {
           $host .= '*';
           $addr .= '*';
           $value .= '*';
        }
        if ($d)   $addr .= $d;
        else      $addr .= "127.0.0.1";

   	$sql = "SELECT count(id) from ".$db_table." WHERE ip='".$d."'";
        if (isset($use_netcache) and $use_netcache and $netcache) {
           $querykey = "KEY".generate_key($sql);
           $row = get_netcache($netcache, $querykey);
           if (!$row) {
              $res = $dbh->query($sql);
   	      $row = $dbh->fetch_row($res);
              if (count($row))
                 set_netcache($netcache, $querykey, $row, 600);
           }
        }
        else {
           $res = $dbh->query($sql);
   	   $row = $dbh->fetch_row($res);
        }
	foreach ($row as $data) 
		$value .= $data;

        $hostname = gethostbyaddr($d);
	if ($hostname) 	$hosts .= $hostname;
	else            $hosts .= "localhost";
   }  
   $df_output .= $hostname."\n";
   //$df_output .= $addr."\n";
   $df_output .= $value."\n";
   $df_lines = explode("\n", $df_output);
   $labels = explode("$", $df_lines[0]);
   $data = $df_lines[1];

   // limit to only top 16 entries
   $label_temp = explode('*', $labels[1]);
   $data_temp = explode('*', $data);
   $label_temp = array_slice($label_temp, 0, 16);
   $data_temp = array_slice($data_temp, 0, 16);
   $labels[1] = implode('*', $label_temp);
   $data = implode('*', $data_temp);

   printf("<img src=\"chart.php?label=$labels[1]&data=$data&heading=$labels[0]\">\n");
   printf("<br/>\n");

   printf("</div>");
   printf("<br/>\n");

   $dbh->close();
}

function username_mailto($dbh, $field, $id, $page)
{
   $out = '<td><a href="mailto:'.$field.'">'.$field.'</a></td>';
   return $out;
}

function username_url($dbh, $field, $id, $page)
{
   $out = '<td><a href="'.baseURL().'?page=account&amp;username='.$field.'">'.$field.'</a></td>';
   return $out;
}

function is_deleted($dbh, $field, $id, $page)
{
   $out = '<td>'.($field ? '&nbsp;Deleted&nbsp;' : '&nbsp;Visible&nbsp;').'</td>';
   return $out;
}

function is_active($dbh, $field, $id, $page)
{
   $out = '<td>'.($field ? '&nbsp;Enabled&nbsp;' : '&nbsp;Disabled&nbsp;').'</td>';
   return $out;
}

function all_accounts_menu($dbh, $field, $id, $page)
{
   $out =  '<td><a href="'.baseURL().'?page='.$page.'&amp;action=enable&amp;clientid='.$id.
           '">&nbsp;Enable</a>&nbsp;&nbsp;&bull;&nbsp;&nbsp;';
   $out .= '<a href="'.baseURL().'?page='.$page.'&amp;action=disable&amp;clientid='.$id.
           '">Disable&nbsp;</a></td>';
   return $out;
}

function phone_layout($dbh, $field, $id, $page)
{
   $numonly = preg_replace("/[^\d]/", "", $field);
   $out = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numonly);
   return '<td>'.$out.'</td>';
}


function show_all_accounts($limit = 0, $username = "")
{
   global $adminuser, $adminpassword, $db_client;

   if (!check_permissions($adminuser, 1))
      return;

   if (!$limit)
   {
      unset($_SESSION['aliases']);
      unset($_SESSION['aliasemail']);
   }

   foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (isset($clientid) and $clientid and (is_admin()) and isset($action) and $action)
   {
      switch ($action)
      {
         case "enable":
            $dbh = new DB;
            $ret = $dbh->connect($db_client);
            if (!$ret)
            {
               echo "<big>Could not connect to database</big><br/>";
               break;
            }
            $sql = "SELECT * from clients where id='".$clientid."' LIMIT 1";
            $res = $dbh->query($sql);
            $o = $dbh->fetch_object($res);
            if (!$o)
            {
               $dbh->close();
               break;
            }

            unset($_POST);
            $_POST['active'] = 1;
            $cid = $dbh->update('clients', $o->id);
            if (!$cid)
            {
               $dbh->close();
               break;
            }
            $dbh->close();
            break;

         case "disable":
            $dbh = new DB;
            $ret = $dbh->connect($db_client);
            if (!$ret)
            {
               echo "<big>Could not connect to database</big><br/>";
               break;
            }
            $sql = "SELECT * from clients where id='".$clientid."' LIMIT 1";
            $res = $dbh->query($sql);
            $o = $dbh->fetch_object($res);
            if (!$o)
            {
               $dbh->close();
               break;
            }

            unset($_POST);
            $_POST['active'] = 0;
            $cid = $dbh->update('clients', $o->id);
            if (!$cid)
            {
               $dbh->close();
               break;
            }
            $dbh->close();
            break;
      }
   }

   $function_list = array();
   for ($i=0; $i < 10; $i++)
      $function_list[$i] = NULL;
   $function_list[1] = 'username_url';
   $function_list[2] = 'username_mailto';
   $function_list[5] = 'phone_layout';
   $function_list[8] = 'is_deleted';
   $function_list[9] = 'is_active';
   $function_list[10] = 'all_accounts_menu';

   display_table($username,
                 'clients',  
                 '<th>ID</th> '.
                 '<th>Username</th> '.
                 '<th>Email</th> '.
                 '<th>First</th> '.
                 '<th>Last</th> '.
                 '<th>Phone</th> '.
                 '<th>City</th> '.
                 '<th>State</th> '.
                 '<th>Deleted</th> '.
                 '<th>Active</th> '.
                 '<th>Action</th> ',
                 'username', 
                 $page, 
                 'id,username,email,first_name,last_name,phone,city,state,deleted,active,id',
                 $function_list, 1, 1, $limit, 'last_name', $db_client);
   echo '<br style="clear:both;"/>';
   echo '<br style="clear:both;"/>';
   return;
}

function left_format_title($dbh, $field, $id, $page)
{
   $out = '<td align="left" width="70%">&nbsp;&nbsp;&nbsp;'.$field.'</td>';
   return $out;
}

function digest($limit = 0, $username = "")
{
   global $adminuser, $adminpassword, $db_client, $db_name;

//   if (!check_permissions($adminuser, 1))
//      return;

   if (!$limit)
   {
      unset($_SESSION['aliases']);
      unset($_SESSION['aliasemail']);
   }

   foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);


   $function_list = array();
   for ($i=0; $i < 10; $i++)
      $function_list[$i] = NULL;
   $function_list[3] = 'left_format_title';

   if (!$limit)
      display_table(NULL,
                 'capture',  
                 '<th>ID</th> '.'<th>Date</th> '.'<th>IP</th> '.'<th style="width:70%;">Title</th> '.
                 '<th>User Account</th>',
                 'title', 
                 $page, 
                 'id,create_date,ip,title,account',
                 $function_list, 1, 1, $limit, 'create_date', $db_name);

   echo '<br style="clear:both;"/>';
   return;
}

//
// general purpose sql table display
//

function display_table($username = '', $table, $header, $match, $page, $select, $functions = array(), 
                       $deleted = 0, $find = 1, $limit = 0, $order = '', $db_name) 
{ 
   global $db_client;

   $export['header'] = array();
   $rowc = 0;
   $orderlist = ' order by create_date DESC ';

   if ($order) 
      $orderlist = ' order by '.$order.' ASC ';

   if (!isset($table) or !$table)
      return;

   if (!isset($page) or !$page)
      return;

   foreach ($_GET as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   unset($_SESSION['export_array']);

   $nh = strip_tags($header);
   $eh = explode(' ', $nh);
   foreach ($eh as $f => $v)
      $export['header'][] = $v;

   if (isset($submit) and $submit == "Clear")
   {
      unset($search);
      unset($start);
      unset($_GET['search']);
      unset($_GET['start']);
   }

   $start ='';
   $q = "";
   if (isset($search))
      $q = $search;

   $query = explode(" ", $q);
   foreach ($query as $i => $v)
     $query[$i] = trim($v);
  
   if ($limit == 1 and $username)
   {
      $sql = "SELECT id from ".$table." where username='$username' order by create_date DESC";
      if ($limit)
         $sql .= " LIMIT ".$limit;
   } 
   else
   if (!$q) 
   {   	
      $sql = "SELECT id from ".$table." $orderlist";
      if ($limit)
         $sql .= " LIMIT ".$limit;
   }
   else
   {
      $sql = "SELECT id,MATCH(".$match.") AGAINST('";
      for ($i=0; $i < count($query); $i++)
      {
         if ($i) $sql .= ','.$query[$i];
         else  $sql .= $query[$i];
      }
      $sql .= "' IN BOOLEAN MODE) AS relevance FROM ".$table." WHERE MATCH(".$match.") AGAINST('";
      for ($i=0; $i < count($query); $i++)
      {
         if ($i) $sql .= ','.$query[$i];
         else $sql .= $query[$i];
      }
      $sql .= "' IN BOOLEAN MODE) $orderlist";
      if ($limit)
         $sql .= " LIMIT ".$limit;
   }

   //print_r($sql);

   $dbh = new DB;
   $ret = $dbh->connect($db_name);
   if (!$ret)
   {
      echo "<big>Could not connect to database</big><br/>";
      return;
   }
   $ids = array();
   $res = $dbh->query($sql);
   while ($o = $dbh->fetch_object($res))
      $ids[] = $o->id; 

   $pg = new PG();
   $pg_window = 25;
   $pg_width = 10;
   $pglist = $pg->paginate($start, $ids, $pg_window, $pg_width, $q, 0);

   $x = 0;
   if (isset($entry))
      $x = $entry;

   echo '<div style="margin-left:auto;margin-right:auto">';

   echo '<table width="100%" class="logs" style="float:left;font-size:10pt;text-align:center;margin-left:auto;margin-right:auto;" cellspacing="2" cellpadding="0">';

   echo '<tr style="text-align:left;">';
   echo '<td colspan="12">';
   echo '<form action="'.baseURL().'" method="get">';
   echo '<fieldset>';
   echo '<input type="hidden" name="page" value="'.$page.'"/>';
   echo '<input id="find" name="search" type="text" value="'.
        (isset($search) ? $search : "").'" style="width:110pt;"/>';
   echo '<input name="start" type="hidden" value="'.(isset($start) ? $start : "0").'"/>';
   echo '&nbsp;<input name="" type="submit" value="Find"/>';
   echo '&nbsp;<input name="submit" type="submit" value="Clear"/>';
   if(count($export) and !$limit) 
   {
      $csvdate = date('Y-m-d H:i:s');
      echo '&nbsp;&bull;&nbsp;<a href="csv.php?filename='.$csvdate.'_'.$table.
           '"><input type="button" name="export" value="Export to CSV"/></a>';
   }
   if ($find and isset($pglist[1]))
      echo $pglist[1];

   echo '</fieldset>';
   echo '</form>';
   echo '</td>';
   echo '</tr>';

   echo isset($header) ? $header : "";

   for ($y = 0; $y < $pg_window; $y++)
   {
      if (!isset($ids[$x + $y]))
         break;

      $id = $ids[$x + $y];

      if (!$q)
         $sql = "SELECT ".$select." from ".$table." WHERE id=".$id." limit 1";
      else
      {
         $sql = "SELECT ".$select.",MATCH(".$match.") AGAINST('";
         for ($i=0; $i < count($query); $i++)
         {
            if ($i) $sql .= ','.$query[$i];
            else $sql .= $query[$i];
         }
         $sql .= "' IN BOOLEAN MODE) AS relevance FROM ".$table." WHERE MATCH(".$match.") AGAINST('";
         for ($i=0; $i < count($query); $i++)
         {
            if ($i) $sql .= ','.$query[$i];
            else $sql .= $query[$i];
         }
         $sql .= "' IN BOOLEAN MODE) and id=".$id." limit 1";
      }

      $res = $dbh->query($sql);
      if ($row = $dbh->fetch_array($res))
      {
         echo '<tr>';
         $i = 0;

         foreach ($row as $field)
         {
//            if ($i >= count($select))
//               break;

            if (isset($functions[$i]) and $functions[$i] and function_exists($functions[$i]))
            {
               //echo '<td>'.$functions[$i]($dbh, $field, $id, $page).'</td>';
               echo $functions[$i]($dbh, $field, $id, $page);
	       $export[$rowc][] = html_entity_decode(strip_tags($functions[$i]($dbh, $field, $id, $page)), 
                                                     ENT_COMPAT, 'UTF-8');
            }
            else
            {
               echo '<td>'.$field.'</td>';
	       $export[$rowc][] = html_entity_decode($field, ENT_COMPAT, 'UTF-8');
            }
            $i++;
         }
         echo '</tr>';
         $rowc++;
      }
   }
   echo '</table>';
   echo '</div>';
   echo '<br style="clear:both;"/>';
   echo '<hr/>';
   echo '<br style="clear:both;"/>';

   if ($find and isset($pglist[2]))
      echo $pglist[2];

   if (isset($search) and $search)
      echo '<br style="clear:both;"/>';

   if ($dbh)
      $dbh->close();

   $_SESSION['export_array'] = $export;
   return;
}

function show_accounts()
{
   global $adminuser;

   if (!isset($_SESSION['activename']) or !$_SESSION['activename'])
      return;

   myaccount($_SESSION['activename']);
   return;
}

function myaccount($name)
{
    global $adminuser, $adminpassword, $product_types, $support_types, $service_email;
    global $db_client, $sitename, $siteowner, $supportphone, $smtphost, $proxy_server,
           $db_host, $db_name, $db_client, $db_table, $db_user, $db_pass;

    if (!isset($name) or !$name)
       return;

    echo '<div id="content">';

    foreach ($_GET as $f => $v)
       $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

    if (isset($username) and $username and is_admin()) {
       $name = $username;
    }

    echo '<div>';
    echo '<h2>&nbsp;&nbsp;User Information:&nbsp;&nbsp;&nbsp;<b>'.$name.
         '</b>&nbsp;&nbsp;&nbsp;&nbsp;'.
         '<span>'.'</span></h2>';
    echo '</div>';

    if ($name == $adminuser)
    {
       if (is_admin()) {
	  echo '<hr/>';
          echo '<fieldset>';
          echo '<table width="100%" style="font-size:12pt;text-align:left;margin-left:auto;'.
               'margin-right:auto;" cellspacing="2" cellpadding="4">';
          echo '<tr><td>Account ID:</td><td>Administrator</td></tr>';
          echo '<tr><td>Username:</td><td>admin</td></tr>';
          echo '<tr><td>Email:</td><td>'.$service_email.'</td></tr>';
          echo '<tr><td>First Name:</td><td>'.$sitename.'</td></tr>';
          echo '<tr><td>Last Name:</td><td>'.$siteowner.'</td></tr>';
          echo '<tr><td>Phone:</td><td>'.format_phone_number($supportphone).'</td></tr>';
          echo '<tr><td>SMTP Server:</td><td>'.$smtphost.'</td></tr>';
          echo '<tr><td>Proxy Server:</td><td>'.$proxy_server.'</td></tr>';
          echo '<tr><td>Capture Host:</td><td>'.$db_host.'</td></tr>';
          echo '<tr><td>Capture Database:</td><td>'.$db_name.'</td></tr>';
          echo '<tr><td>Capture Table:</td><td>'.$db_table.'</td></tr>';
          echo '<tr><td>Client Database:</td><td>'.$db_client.'</td></tr>';
          echo '<tr><td>SQL Username:</td><td>'.$db_user.'</td></tr>';
	  for ($i=0, $outpass=''; $i < strlen($db_pass); $i++) 
             $outpass .= '*';
          echo '<tr><td>SQL Password:</td><td>'.($outpass ? $outpass : '').'</td></tr>';
          echo '<tr></tr>';

          if (isset($action) and $action and $action == "mypasswd")
          {
             echo '<tr></tr>';
             echo '<tr><td colspan="2" style="text-align:left;font-size:10pt;"><b>'.
                  "password for account '".$adminuser.
                  "' must be changed from the console".'</b></td></tr>';
          }
          echo '</table>';
          echo '</fieldset>';
       } else {
          echo '<table width="100%" style="font-size:10pt;text-align:left;margin-left:auto;'.
               'margin-right:auto;" cellspacing="2" cellpadding="4">';
          echo '<tr><td colspan="2" style="text-align:left;font-size:12pt;"><b>'.
               "Only an administrator can access records for this account.</b></td></tr>";
          echo '<tr></tr>';
          echo '</table>';
       }
    }
    else
    {
          $dbh = new DB;
          $ret = $dbh->connect($db_client);
          if (!$ret)
          {
             echo "<big>Could not connect to database</big><br/>";
             return;
          }

          $sql = "SELECT * FROM clients WHERE username='".$name."' and deleted='0'";
          $res = $dbh->query($sql);
          $o = $dbh->fetch_object($res);
          if ($o)
          {
		echo '<hr/>';
		echo '<br/>';
		echo '<div style="text-align:right;">';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.baseURL().
		     '?page=account&amp;action=myaccount&amp;username='.$name.'">'.
		       ((isset($action) or isset($page)) ? ((isset($action) and ($action == "myaccount") 
		       or ($page == "account" and (!isset($action) or !$action))) 
		       ? '<b>Account info</b>': 'Account info') : 'Account info').'</a>';
                echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.baseURL().
		     '?page=account&amp;action=edit&amp;username='.$name.'">'.
		      ((isset($action) and $action == "edit") ? '<b>Edit account</b>' : 'Edit account').
		      '</a>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.baseURL().
		     '?page=account&amp;action=mypasswd&amp;username='.$name.'">'.
		      ((isset($action) and $action == "mypasswd") ? '<b>Change password</b>' : 'Change password').
		     '</a>';
		echo '&nbsp;&nbsp;</div>';
		echo '<hr/>';

                $_SESSION['clientid'] = $o->id;
                $_SESSION['groups'] = $o->groups;

                $_SESSION['first_name'] = $o->first_name;
                $_SESSION['last_name'] = $o->last_name;
                $_SESSION['company_name'] = $o->company_name;
                $_SESSION['address'] = $o->address;
                $_SESSION['address2'] = $o->address2;
                $_SESSION['city'] = $o->city;
                $_SESSION['state'] = $o->state;
                $_SESSION['zip'] = $o->zip;
                $_SESSION['country'] = $o->country;
                $_SESSION['email'] = $o->email;
                $_SESSION['email2'] = $o->email2;
                $_SESSION['phone'] = preg_replace('/[^\d]/','',$o->phone);
                $_SESSION['phone2'] = preg_replace('/[^\d]/','',$o->phone2);

                if (isset($action) and $action and $action == "mypasswd")
                  mypassword($name, 
                             "account&amp;action=mypasswd&username=".$name."", 
                             "account&amp;action=myaccount&username=".$name."");
                else
                  edit_user($name, "", 
                             "account&amp;action=edit&username=".$name."", 
                             "account&amp;action=myaccount&username=".$name."", 
                             !(isset($action) and $action and $action == "edit"));
          } else {
             echo '<table width="100%" style="font-size:10pt;text-align:left;margin-left:auto;'.
                  'margin-right:auto;" cellspacing="2" cellpadding="4">';
             echo '<tr><td colspan="2" style="text-align:left;font-size:12pt;"><b>'.
                  "User account (".$name.") not found.</b></td></tr>";
             echo '<tr></tr>';
             echo '</table>';
          }
          $dbh->close();
   }
   echo '</div>';
   echo '<div style="clear: both;">&nbsp;</div>';
   return;
}

?>
