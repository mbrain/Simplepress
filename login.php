<?php

/**
 * Login script triple-alpha
 *
 * @author Manuel Zarat
 *
 */

session_start();

include "load.php";

$formpass=NULL;
$formlogin=NULL;
?>
<?php require ("config.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Login</title>
  <link href="../content/themes/simplepress/css/menu.css" rel="stylesheet" type="text/css" />
  <link href="../content/themes/simplepress/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="sp-main-wrapper">

<!-- HTML Header -->
    <div class="sp-main-header"> 

        <div class="sp-main-header-logo">

            <h1>SimplePress</h1>
            <h4>Einfaches, kostenloses Blog CMS</h4>
    
        </div>
    
    </div>
<!-- HTML Header Ende -->

<?php
$nav = new menu();
$nav->config(array("id" => 1));
$nav->html();
?>


<div class="sp-main-body">
<div class='sp-content'>

<!-- Hier kommt der Login -->

<?php if(!isset($_POST['formlogin'])) { ?>

<form action="login.php" method="post" name="frm">
<center>
<table cellspacing="4" cellpadding="4" style="">
	<tr>
		<td>Username</td>
		<td><input type="text" name="formlogin" class="cssborder" autofocus></td>

		<td>Passwort</td>
		<td><input type="password" name="formpass" class="cssborder"></td>
    <td><input type="submit" value="login" class="cssborder"></td>
	</tr>
</table>
</center> 	 
</form>

<?php } else { ?>

<?php
	$formpass = $_POST['formpass'];
	$formlogin = $_POST['formlogin'];
  
if ($formpass == $adminpass && $formlogin == $adminlogin) {

	$_SESSION["loggedin"] = 1;
	//session_register("loggedin");
	//$loggedin = "1";
	//logged in so run a javascript redirect to admin page.
?>
<script language="javascript">
<!-- 
location.replace("admin");
-->
</script>
	<h4><a href='admin'>Du bist jetzt angemeldet</a></h4>
<?php
}
}
?>

</div>

<!-- Sidebar -->
<div class='sp-sidebar'>

<div class="sp-sidebar-item-box">
<div class="sp-sidebar-item-box-head">Hinweis</div>
<div class="sp-sidebar-item-box-body">Achte immer darauf, das dir keiner beim anmelden zusieht!</div>
</div>

</div>
<!-- Sidebar Ende -->

<div style='clear:both;'></div><!-- Der Footer -->
<div class="sp-footer" style="padding:10px;"></div>

<!-- Der Wrapper aus dem Header wird geschlossen -->
</div>

</div>

</div> 

</body>
</html>
