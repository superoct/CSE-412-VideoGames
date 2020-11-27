<?php
if(isset($_POST['submitLogin']))
{
  $db = new PDO('pgsql:host=database-412.cizjli6h3heh.us-west-2.rds.amazonaws.com;dbname=myDB', 'root', 'videogames');
  echo "Connected to PostgreSQL";

}
?>
