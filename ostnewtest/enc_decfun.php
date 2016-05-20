<?php  
function encrypt($decval)
{
$letters = '==32@@/3?42===3/?42f?=4dfg/fgg/000/gf?4fg===/121/009/43/5?4356/pqr111===/ddf?4ddf/4lkjlkl';
$encrpt=substr(str_shuffle($letters), 10,10);
$secletters = '====3=@@/32323?3/2fg?4fg/f?==g/000/g==f?3fg/121/009?/334/5656/pqr1113/ddfddf/==lkjlkl';
$encrpttwo=substr(str_shuffle($secletters), 10,10);
$n=decbin("$decval");
$decval=$encrpttwo.$n.$encrpt;
return ($decval);
}
function dlchar($value)
{
$value=substr_replace($value ,"",-10);
$value=substr($value, 10);
$value=bindec($value);
return ($value);
}










function clrs($stri)
{
	return(mysql_real_escape_string(trim($stri)));
}

?>