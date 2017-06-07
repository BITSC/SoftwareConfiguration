<?php
	header("Content-type: text/html;charset=utf-8;");
	error_reporting(0); 
	
	$con=mysql_connect("localhost","root","new_password");
	mysql_select_db("humanresource");
	mysql_query("set names utf8");