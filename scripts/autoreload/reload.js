/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 

// <![CDATA[
$(document).ready(function() {
$.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
setInterval(function() {
$('#pjax_total').load('http://reserv.solusi-integral.co.id/index.php/pajax/pjax_total');
$('#pjax_green').load('http://reserv.solusi-integral.co.id/index.php/pajax/pjax_green');
$('#pjax_status').load('http://reserv.solusi-integral.co.id/index.php/pajax/pjax_status');
//$('#pjax_chart').load('http://reserv.solusi-integral.co.id/index.php/pajax/pjax_chart');
$('#pjax_person').load('http://reserv.solusi-integral.co.id/index.php/pajax/pjax_person');
}, 3230); // the "3000" here refers to the time to refresh the div. it is in milliseconds.
});
// ]]>
