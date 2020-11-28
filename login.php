<?php
$db = new PDO('pgsql:host=database-412.cizjli6h3heh.us-west-2.rds.amazonaws.com;dbname=myDB', 'root', 'videogames');

if (isset($_POST['submitLogin']))
{
  try{
    $query = "SELECT * FROM public.\"Game_Title\"";
    $db->query($query);

    foreach ($db->query($query) as $row) {
      print "<br/>";
      print $row['Game_Title'].'-'.$row['GameID'].'<br/>';
    }
  } catch(PDOException $e){
    echo $e->getMessage();
  }
}elseif (isset($_POST['submitAdd']))
{
  try{
    $query = "INSERT INTO public.\"Game_Title\" VALUES('$_POST[vgName]', '$_POST[vgEngine]', '$_POST[vgFranchise]', '$_POST[vgDescription]', '$_POST[vgID]')";
    $db->query($query);
    echo "Added";
  } catch(PDOException $e){
    echo $e->getMessage();
  }
}elseif(isset($_POST['submitDelete'])){
try{
  $query = "DELETE FROM public.\"Game_Title\" WHERE public.\"Game_Title\".\"GameID\"='$_POST[vgIDDelete]'";
  $db->query($query);
  echo "Deleted";
}catch(PDOException $e){
  echo $e->getMessage();
}
}elseif (isset($_POST['submitSearch']))
{
  try{
    $query = "SELECT * FROM public.\"Game_Title\" WHERE public.\"Game_Title\".\"GameID\"='$_POST[vgIDSearch]'";

    foreach ($db->query($query) as $row) {
      print "<br/>";
      print $row['Game_Title'].'-'.$row['GameID'].'<br/>';
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}
?>
