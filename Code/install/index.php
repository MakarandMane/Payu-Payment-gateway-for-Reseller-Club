<?PHP
ob_start();
$step=$_GET["step"];
$directory= dirname(__DIR__).'/' ;
if( $step !=1 && $step !=2 && $step !=3 && $step !=4&& $step !=5&& $step !=6)
{
	
// Check if config.php has been created
if ( file_exists( $directory . "config.php" ) )
{
	$step =3;
}
	else
	{
	$step =1;
	if ( !file_exists( $directory . 'config-sample.php' ) )
{
	$step =2;
	
}
	}
	
}
//echo "<br/>Directory ".$directory;// . 'config-sample.php' ;
//echo "<br/>Directory1 ".$filename;
//echo "<br/>Directory2 ".$directory2;
//echo "<br/>Directory3 ".$directory3;
//echo "<br/>Directory4 ".$directory4;
//echo "<br/>Directory5 ".$directory5;
//echo "<br/>Step= ".$step;
  
	?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Setup File</title>
<link rel="stylesheet" href="../css/install.css" type="text/css" />
<link rel="stylesheet" href="../css/buttons.css" type="text/css" />
</head>
<body id="wp-core-ui">
<h1 id="logo"><a href="http://www.ladybirdweb.com/">Ladybird</a></h1>
<?php 
switch($step) {
		case 5:
		?>
		<p>Welcome to Payu Payment Gateway for Reseller Club. Before getting started, we need some information on the Keys. You will need to know the following items before proceeding.</p>
<ol>
	<li>Payu Merchant ID or Key</li>
	<li>Payu Salt</li>
	<li>Reseller Club Key</li>
	<li>Installation URL</li>
</ol>
<p><strong>If for any reason this automatic file creation doesn&#8217;t work, don&#8217;t worry. All this does is fill in the above information to a configuration file. You may also simply open <code>config-sample.php</code> in a text editor, fill in your information, and save it as <code>config.php</code>.</strong></p>
<p>In all likelihood, these items were supplied to you by Reseller Club & Payu. If you do not have this information, then you will need to contact them before you can continue. If you&#8217;re all ready&hellip;</p>

<p class="step"><a href="index.php?step=4" class="button button-large">Let&#8217;s go!</a></p>
<?php
break;
	// config.php files doesn't exist
	case 1: 
	?>
    <p>There doesn't seem to be a <code>config.php</code> file. I need this before we can get started.</p><p>You can create a <code>config.php</code> file through a web interface, but this doesn't work for all server setups. The safest way is to manually create the file.</p><p><a class="button button-large" href="index.php?step=5">Create a Configuration File</a></p>
    <?php
	break;
	  //config-sample.php files doesn't exist
	case 2:
	?>
  
	 <p>Sorry, I need a config-sample.php file to work from. Please re-upload this file from your installation.</p>
     <?php
	  break;
	  //config.php files exists
	case 3:
	?>
     <p>The file 'config.php' already exists. If you need to reset any of the configuration items in this file, please delete it first. </p>
     <?php
break;
case 4:

?>
<form method="post" action="index.php?step=6">
	<p> Below you should enter your Payu & Reseller Club details. If you&#8217;re not sure about these, contact Payu Money & Reseller Club.</p>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="key">Payu Merchant ID or Key</label></th>
			<td><input name="merchant_id" id="merchant_id" type="text" size="25" value="" /></td>
			<td>Shared by Payu</td>
		</tr>
		<tr>
			<th scope="row"><label for="merchant_id">Payu Salt</label></th>
			<td><input name="salt" id="salt" type="text" size="25" value="" /></td>
			<td>Shared by Payu</td>
		</tr>
		<tr>
			<th scope="row"><label for="working_key">Reseller Club Key</label></th>
			<td><input name="rckey" id="rckey" type="text" size="25" value="" /></td>
			<td>Get your secure key from your Reseller Control panel</td>
		</tr>
		<tr>
			<th scope="row"><label for="access_code">Currency</label></th>
			<td><select name="currency" id="currency">
	   
        <option value="INR">Indian Rupee</option>
        
        </select> </td>
			<td>Currency in which transcation will take place</td>
		</tr>
		<tr>
			<th scope="row"><label for="directory">Directory</label></th>
			<td><input name="directory" id="directory" type="text" value="<?PHP echo "http://".$_SERVER['HTTP_HOST']."/".basename(dirname(dirname(__FILE__))) ;; ?>" size="25" /></td>
			<td>Directory where these files are be installed</td>
		</tr>
	</table>
	<input name="noapi" type="hidden" value="1" />
	<p class="step"><input name="submit" type="submit" value="Submit" class="button button-large" /></p>
</form>

   
	 <?php
break;
case 6:

//Rename config-sample.php to config.php
$old = '..' . DIRECTORY_SEPARATOR . 'config-sample.php';
$new = '..' . DIRECTORY_SEPARATOR . 'config.php';
$renameResult=rename($old , $new);

// Save config data to config.php

$file = $directory."config.php";
$content = file_get_contents($file);
$replacemenCurrency = $_POST["currency"];
$replacementPayuKey = $_POST["merchant_id"];
$replacementPayuSalt = $_POST["salt"];
$replacementrRCkey = $_POST["rckey"];
$replacementDirectoryUrl = $_POST["directory"];
$replacementRedirectUrl = $_POST["directory"]."/responsehandler.php";
$replacementActionUrl =$_POST["directory"]."/checkout.php";

$content = preg_replace('/merchant_id_here/', $replacementPayuKey, $content);
$content = preg_replace('/salt_here/', $replacementPayuSalt, $content);
$content = preg_replace('/key_here/', $replacementrRCkey, $content);
$content = preg_replace('/currency_here/', $replacemenCurrency, $content);
$content = preg_replace('/directory_url_here/', $replacementDirectoryUrl, $content);
$content = preg_replace('/redirect_url_here/', $replacementRedirectUrl, $content);
$content = preg_replace('/action_url_here/', $replacementActionUrl, $content);



file_put_contents($file, $content);
// change config file permision
chmod( $directory."config.php", 0666 );
//echo"l=".$_SERVER['REQUEST_URI']."index.php?step=2";
//$parent = dirname($_SERVER['REQUEST_URI']);
//echo $parent;
header("Location: ../index.php?step=1");


//header("Location: " .$_SERVER['REQUEST_URI']."index.php?step=2");
exit;




?>

<p>All right, sparky! You&#8217;ve made it through the installation. </p>
<?
break;
}
?>
</body>
</html>