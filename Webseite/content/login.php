<!--<form method="post">
	Username <br>
	<input name="username" type="text" class="inputs"> <br>
	Passwort <br>
	<input name="password" type="password" class="inputs"> <br>
	<input type="submit" value="Login" class="submit" name="submit">
</form>-->
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
			  // LDAP search (Suche am gebundenen Knoten)
			  /*$filter="(uid=$loginname)";
			  $justthese = array("ou", "sn", "givenname", "mail"); // nur nach diesen Einträgen suchen
			  $sr=ldap_search($ds, $dn, $filter, $justthese); // Suche wird durchgeführt
			  $info = ldap_get_entries($ds, $sr);             // gefundene Einträge werden ausgelesen
			  echo $info["count"]." entries returned\n<br>";
			  $ii=0;
			  for ($i=0; $ii<$info[$i]["count"]; $ii++)
			  {
				$data = $info[$i][$ii];
				echo $data.":  ".$info[$i][$data][0]."\n<br>";
			  }*/
				echo "<script>window.location = 'Main_Page.php'</script>";
		  }
		  ldap_close($ds);
	   if(!$ldapbind)
		  echo "(Connection ERROR)\n";
   }
	 
?>