<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysql_query("select imie_nazwisko_instruktora,id from instruktorzy where specjalizacja='".$_POST['specilizationid']."'");?>
 <option selected="selected">Wybierz instruktora </option>
 <?php
 while($row=mysql_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['imie_nazwisko_instruktora']); ?></option>
  <?php
}
}


if(!empty($_POST["id_instruktora"])) 
{

 $sql=mysql_query("select cena from instruktorzy where id='".$_POST['id_instruktora']."'");
 while($row=mysql_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['cena']); ?>"><?php echo htmlentities($row['cena']); ?></option>
  <?php
}
}

?>

