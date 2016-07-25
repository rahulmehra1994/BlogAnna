<html>
<head>
<title>My Form</title>

</head>
<body >


<?php echo form_open("admin/admin_parser"); ?>




<h5>Username</h5>


<input id="input1" type="text" name="u" value="<?php echo $_POST['username']; ?>" />

<?php echo form_error("username"); ?>

<br/>

<h5>Password</h5>


<input type="password" name="p" value="" size="50" />
<?php echo form_error("password"); ?>
<div>
	<input type="submit" value="Submit" /></div>

<?php echo validation_errors();

?>

</form>

</body>
</html>