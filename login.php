<?php
$db = new PDO('pgsql:host=database-412.cizjli6h3heh.us-west-2.rds.amazonaws.com;dbname=myDB', 'root', 'videogames');

if(isset($_POST['submitAdd']))
{
  try{
    $query = "INSERT INTO public.\"Game_Title\" VALUES('$_POST[vgName]', '$_POST[vgEngine]', '$_POST[vgFranchise]', '$_POST[vgDescription]', '$_POST[vgID]')";
    $db->query($query);
    echo "Added";
  } catch(PDOException $e){
    echo $e->getMessage();
  }
}
?>
