 <?php
	
	session_start();

	require "database_connect.php";
	
	$email=$_SESSION["email"];
     //$email="ramansudhanshu150@gmail.com"

	$queryForName="select * from main where email='$email';";
	$qry_name=mysql_query($queryForName) or die(mysql_error());
	$data_name=mysql_fetch_assoc($qry_name);
	echo "".$data_name['name']."<br>";	
	echo "".$data_name['id'];
	$id=$data_name['id'];
	$value=$data_name['value'];

	$amount=$_POST["amount"];
   	
   	echo "  ".$value."    ".$amount;

       $curr_date=date("Y-m-d");
      echo $curr_date;
        
	$queryForTaken="insert into loan_info values ('',$amount,$value,$id,'','','$curr_date');";
	echo $queryForTaken;
	if(mysql_query($queryForTaken))
 	{
 		echo "Success fully posted ";
 		
 	}
 	else
 	{
 		echo "sorry enable to process please try again";
 		die(mysql_error());
 	}

 ?>

