<?php
	if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
	{
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		exit;
	}


   $ldapserver = "ldap.technikum-wien.at";
   $searchbase = "dc=technikum-wien,dc=at";

   $loginname = (isset($_POST['loginname']))?$_POST['loginname']:NULL;
   $loginpw = (isset($_POST['loginpw']))?$_POST['loginpw']:NULL;
   

   if (!$loginname)
   {
      echo "<form action='".$_SERVER['PHP_SELF']."' enctype=\"multipart/form-data\" method='post'>\n";
      echo "<table>\n";
      echo "<tr><td>Benutzer:</td><td>";
      echo "<input type='text' name='loginname' size=20 value='".$loginname."'></td></tr>\n";
      echo "<tr><td>Kennwort:</td><td>";
      echo "<input type='password' name='loginpw' size=20 value='".$loginpw."'></td></tr>\n";
      echo "<tr><td></td><td><input class='btn btn-md btn-primary' type='submit' name='login' value='Login'></td><td></td></tr>\n";
      echo "</table>\n</form><br>\n";
	  
   } else {
	   // LDAP-Login probieren
	   
	   $loginname = strtolower($loginname);

	   // LDAP connect
	   $ds=ldap_connect($ldapserver);
	   if (!$ds) {echo "Connect-Error"; exit;}
	   
	   // LDAP settings
	   ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
	   ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
	   
	   // LDAP bind
	   $ldapbind=false;
	   if(ldap_start_tls($ds)) // verschlüsselte Verbindung verwenden
		  $dn = "ou=People,".$searchbase;  // wo wird gesucht?
		  $ldapbind = @ldap_bind($ds,"uid=".$loginname.",".$dn,$loginpw);
		  if ($ldapbind) {
		  	$_SESSION["Username"]=$loginname;
		  	header("LOCATION: Main_Page.php");
			//echo "<script>window.location = 'Main_Page.php'</script>";#
			//echo $_SESSION["Username"];
		  }
		  ldap_close($ds);
	   if(!$ldapbind)
		  echo "(Connection ERROR)\n";
   }
	 
?>
