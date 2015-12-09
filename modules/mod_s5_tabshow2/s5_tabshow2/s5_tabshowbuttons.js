/*
@version 1.0: shape 5 Javascript
Author: Shape5.com
Available for download at www.shape5.com
Copyright Shape 5 LLC
*/

/* Left and Right thumbnail scroller */

var sa_left1 = 0;
var sa_right1 = 0;
var sa_mainleftright = 0;

/*  Left functions */
function s5_goleft_sa() {
	if (sa_left1 == 0)
	{window.setTimeout('s5_thumbnailleft_sa()',5);
	} else {}}
function s5_thumbnailleft_sa() {
if (sa_left1 == 1){	sa_left1 = 0; 
} else {
	if (sa_mainleftright >= 3) {  } else {
	document.getElementById("s5_itemsinner").style.left = sa_mainleftright +'px';
	sa_mainleftright = sa_mainleftright + 5;
	s5_goleft_sa();}}}
function s5_goleftstop_sa() {
	sa_left1 = 1;
	window.setTimeout('resetleft()',10);}
function resetleft() {	sa_left1 = 0;}

/*  Right functions */
function s5_goright_sa() {
	if (sa_mainleftright <= -s5_javascriptleft) {  } else {if (sa_right1 == 0)
	{ window.setTimeout('s5_thumbnailright_sa()',5);} else {} }}
function s5_thumbnailright_sa() {
if (sa_right1 == 1)
{ sa_right1 = 0; } else { if (sa_mainleftright <= -s5_javascriptleft) {  } else {
	document.getElementById("s5_itemsinner").style.left = sa_mainleftright +'px';
	sa_mainleftright = sa_mainleftright - 5;
	s5_goright_sa();}}}
function s5_gorightstop_sa() {
	sa_right1 = 1;
	window.setTimeout('resetright()',10);}
function resetright() {	sa_right1 = 0;}
/* End Left and Right thumbnail scroller */

	
	
