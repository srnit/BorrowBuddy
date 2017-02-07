<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">
        .row-pad{
            margin: 20px;
            text-align: center;
            color: lightblue;
        }
        body{
            background: lightblue;
        }
        .col-extra{
            border-radius: 40px;
            height: 400px;
            text-align: center;
            overflow: scroll;

        }
        .row-inner{
            background: grey;
            border-color: black;
            border-width: 2px;
            margin: 10px;
            border-radius: 2px;
            color:white;
        }
    </style>

</head>

<body>

 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="welcom2.php">BorrowBuddy</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>logout</a></li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
   <div class="jumbotron" style="background: black;">
       
       <div class="row">
            <div class="col-sm-3">
                <img src="get.php" id="image" class="img-circle img-responsive" width="160" height="160" align="middle">
            </div>
            <div class="col-sm-9">
                  <div class="row row-pad">
                      <div class="col-sm-6" id="name">
                          Name:Milindra
                      </div>
                      <div class="col-sm-6" id="dob">
                          DOB:22/06/1996
                      </div>
                  </div>

                  <div class="row row-pad">
                      <div class="col-sm-6" id="gender">
                          Name:Milindra
                      </div>
                      <div class="col-sm-6" id="value">
                          DOB:22/06/1996
                      </div>
                  </div>
            </div>
        </div>
   </div>

</div>

<div class="container-fluid" style="padding:10px;"">
    <div class="row" style="margin:10px;">
        <div class="col-sm-4 col-extra" style="background: red;" id="request">
            <div class="row row-extra">
                <h3>LOAN REQUEST</h3>
            </div>
            <div class="row row-inner">
                <div class='col-lg-6 back' style='color:blue'>Loan Id</div>
		<div class='col-lg-6 back' style='color:blue'>Amount</div>
            </div>
            
        </div>
        <div class="col-sm-4 col-extra" style="background: blue;" id="accepte">
            <div class="row"> 
                <h3>REQUEST ACCEPTED</h3>
            </div>
            <div class="row row-inner">
                <div class='col-lg-3 back' style='color:blue'>Loan Id</div>
                <div class='col-lg-3 back' style='color:blue'>interest</div>
                <div class='col-lg-4 back' style='color:blue'>Name</div>
                <div class='col-lg-2 back' style='color:blue'>accept</div>
            </div>
        </div>
        <div class="col-sm-4 col-extra" style="background: green;" id="payment">
            <div class="row">
                <h3>PAYMENT GIVEN BY YOU</h3>
            </div>
            <div class="row row-inner">
                <div class='col-lg-6 back' style='color:blue'>Loan Id</div>
		<div class='col-lg-6 back' style='color:blue'>Amount</div>
            </div>
            <div class="row row-inner">
                <a href="#"><CENTER></CENTER></a>
            </div>
        </div>
    </div>
</div>
<script>

  function extractInfo(image,name,dob,gender,value)
  {
  //document.getElementById('image').src="abc.gif";
  document.getElementById('image').src=""+image;
  document.getElementById('name').innerHTML="Name:"+name;
  document.getElementById('dob').innerHTML="DOB:"+dob;
  document.getElementById('gender').innerHTML="Gender:"+gender;
  document.getElementById('value').innerHTML="Value:"+value;
  }
  //extractInfo('get.php','milindra','22/06/1996','male','3');
  function requestFun(loan_no,amount)
{

document.getElementById('request').innerHTML=document.getElementById('request').innerHTML+"<div class='row row-inner'><div class='col-lg-6 back'>"+loan_no+"</div><div class='col-lg-6 back'>   "+amount+"</div></div>";
}
  function pay(loan_no,amount)
{

document.getElementById('payment').innerHTML=document.getElementById('payment').innerHTML+"<div class='row row-inner'><div class='col-lg-6 back'>"+loan_no+"</div><div class='col-lg-6 back'>   "+amount+"</div></div>";
}

 function accepted(loan_no,amount,name,loan_no,idpay)
{
document.getElementById('accepte').innerHTML=document.getElementById('accepte').innerHTML+"<div class='row row-inner'><div class='col-lg-3 back'>"+loan_no+"</div><div class='col-lg-3 back'>"+amount+"</div><div class='col-lg-4 back'>"+name+"</div><div class='col-lg-2 back'><a href='payAccepted.php?loan_no="+loan_no+"&idpay="+idpay+"'>accept</a></div></div>";
}
//pay(3,4);
//requestFun(1,4);
//accepted(4,4,"sdf",2,2);
</script>

<?php
    session_start();
    
    //connect to database
    require "database_connect.php";
    
    $email=$_SESSION["email"];
    //echo "".$email;
    $query="select * from main where email='$email';";
    $qry=mysql_query($query) or die(mysql_error());
    

    if($data=mysql_fetch_assoc($qry))
    {
       // echo "<script>addInfo('$name',$amount,$id,$loanNo);</script>";
    //  echo "<script>extractInfo('".."','".milindra."','22/06/1996','male','".3."');</script>";
	echo "<script>extractInfo('get.php','".$data['name']."','22/06/1996','male','".$data['value']."');</script>";
	$query="select * from loan_info where id=".$data['id'].";";
	$query1="select * from loan_info where paid_by=".$data['id'].";";
	
	//echo $query;
	//echo $query1;
	$qry=mysql_query($query) or die(mysql_error());
	while($data=mysql_fetch_assoc($qry))
    	{
		//echo "".$data['loan_no']."  ".$data['amount']."<br>";
		echo "<script>requestFun(".$data['loan_no'].",".$data['amount'].");</script>";
		$query2="select * from loan_info_extended where loan_id=".$data['loan_no']." and state=0 ;";
		//echo $query2;
		$qry2=mysql_query($query2) or die(mysql_error());
		while($data2=mysql_fetch_assoc($qry2))
    		{
			//echo "<script>pay(".$data2['loan_no'].",".$data2['interest_rate'].");</script>";
			//echo "".$data2['loan_id']."  ".$data2['interest_rate']."  ".$data2['pay_id']."<br>";

      $query4="select * from main where id=".$data2['pay_id'].";";
      //echo $query4;Loan Id
      $qry4=mysql_query($query4) or die(mysql_error());
      $data4=mysql_fetch_assoc($qry4);
      echo "".$data4['name'];
			echo "<script>accepted(".$data2['loan_id'].",".$data2['interest_rate'].",'".$data4['name']."',".$data2['loan_id'].",".$data2['pay_id'].");</script>";
		}
	}
	/*$query="select * from loan_info where paid_by=".$data['id'].";";
	echo $query;
	*/
	$qry1=mysql_query($query1) or die(mysql_error());
	while($data=mysql_fetch_assoc($qry1))
    	{
		//echo "".$data['loan_no']."  ".$data['amount']."<br>";
		echo "<script>pay(".$data['loan_no'].",".$data['amount'].");</script>";
	}
    }



?>

</body>
</html>
