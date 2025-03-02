<?php


// session_start();

// if(!isset($_SESSION['name']))
// {
//  header("Location: index.php");
// }
// else
// {


// include("include/dbconn.php");
// }
$con = new mysqli("localhost","root","","library");
if($con->connect_error)
{
  die("Connection failed: " . $con->connect_error);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <head>
        <meta http-equiv="Content-Language" content="en-us" />
        <title>Gudlavalleru Engineering College</title>
        <link rel="stylesheet" href="index1.css" type="text/css" />
        
        <!--<link href="css/styles.css" rel="stylesheet" type="text/css" />
        	<link rel="stylesheet" type="text/css" href="css/wt-rotator.css"/>
        	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
            <script type="text/javascript" src="js/jquery.easing.1.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>    
        	<script type="text/javascript" src="js/preview.js"></script>-->
 	      
        <script type="text/javascript" src="js/jquery-menu.js"> </script>
     </head>
<body style="background-color:#C0C0C0; width:100%;" >
  <script type="text/javascript" src="index1.js"></script><br>
  <div align="center">
    <div  align="center" id="wrapper" style=" ba-moz-border-radius: 15px; border: medium     #E0E0E0 solid; background-color:black; -webkit-border-radius: 15px;">
    
       <div id="sam3" style="     left: 0px; top: 0px; width: 820px; height: 100px">
       	 <br><img  align="left" src="images/clg.png" height="135" width="750"  /></div>
    
       <div align="center" id="sam1" style="font-family:Arial, Helvetica, sans-serif;        font-size:30px; font-weight:bold; ">GUDLAVALLERU ENGINEERING COLLEGE</div>
       	<div id="simple">Automatic Library Visitors Counter</div><br>
       </div>

    </div>
  </div><br>

<div class="panel">
<div class="container">
        <div class="wt-rotator" style="left: 0px; top: 0px; width: 860px; height: 247px">
<input type="button" id="sam" value="Admin">
<div  align="left" id="sam2" style=" ba-moz-border-radius: 15px; -webkit-border-radius: 15px;">
	
	<div id="hidingone">
<!-- start student insertion part-->
		<div id="stdadd" >
			<input type="button" align="left" value="Student Insertion" id="b1">
		</div>
		<center><div id="stddetailspage">
			
		<div class="login">
    <a href="convert.php" > <h1>Student Details Insertion</h1> </a>
    <form method="post" action="" name="studentinsertion">
      <p><input type="text" name="stno" value="" placeholder="Roll No" required></p>
      <p><input type="text" name="stname" value="" placeholder="Name" required></p>
      <p> <select name="styear" style="width: 175px">
            <option value="0">Select Year</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
      </p> 
     <p> <select name="stbranch" style="width: 175px">
      <option value="0">Select Branch</option>
        <!-- <?php
        $query= $con->query("SELECT upper(`ug`) FROM `branches`");
        while($res = $query->fetch_array())
        {
        ?>
           <option value="<?php echo strtolower($res[0]); ?>"><?php echo $res[0]; ?></option>
        <?php
        }
        ?>
        
        <?php
        $query=$con->query("SELECT upper(`pg`) FROM `branches`",$conn);
        while($res=$query->fetch_assoc()($query))
        {
          if($res[0]!='')
          {
        ?>
          <option value="<?php echo strtolower($res[0]); ?>"><?php echo $res[0]; ?></option>
        <?php
          }
        }
        ?> -->
    </select></p>     
      <p class="submit"><input type="submit" name="ssubmit" value="Submit"></p>
    </form>

<!-- student submision part-->
    <!-- <?php
    if(isset($_POST['ssubmit']))
    {
     $roll=$_POST['stno'];
     $name=$_POST['stname'];
     $year=$_POST['styear'];
     $branch=$_POST['stbranch'];
     
	  $rem=$con->query("SELECT 'rollnum' FROM 'student' WHERE 'rollnum'='$roll'",$conn);
	  if(!$rem){
      		 $query=$con->query("INSERT INTO `student` VALUES('$roll','$name','$year','$branch')",$conn);
              }
	  else{
      		$query=$con->query("UPDATE 'student' SET 'name'='$name','year'='$year','branch'='$branch' WHERE 'rollnum'='$roll'",$conn);}
           #$query=$con->query("INSERT INTO `student` VALUES('$roll','$name','$year','$branch')",$conn);
        if(!$query)
          {
            die("Error in adding Student".$con->connect_error);
          }
        else
          {
    ?>       
           <script type="text/javascript">
           
           alert("Student added successfully");
           </script>
    <?php
            } 
    }
    ?> -->
<!-- student excel file upload part-->
    <p>Upload File</p>
    <form method="post" action="upload_file.php" enctype="multipart/form-data">
      <p><input type="file" name="file" id="file">&nbsp;</p>     
      <p class="submit"><input type="submit" name="sttsubmit" value="Submit"></p>
    </form>

  </div>
			
			
			</div>
			</center>
		<br>
<!-- end student insertion part-->

<!-- start faculty insertion part-->
		<div id="facadd">
			<input id="b1" type="button" align="left" value="Faculty Insertion">
		</div>
	
		<center><div id="facdetailspage">
			
			<div class="login">
    <h1>Faculty Details Insertion</h1>
    <form method="post" action="" name="facultyinsertion">
      <p><input type="text" name="facno" value="" placeholder="Faculty No" required></p>
      <p><input type="text" name="facname" value="" placeholder="Faculty Name" required></p>
      <p><input type="text" name="facbranch" value="" placeholder="Branch" required></p>     
      <p class="submit"><input type="submit" name="fsubmit" value="Submit"></p>
    </form>
    
    
    <?php
    
    if(isset($_POST['fsubmit']))
    {
     $roll=$_POST['facno'];
     $name=$_POST['facname'];
     $branch=$_POST['facbranch'];
     
     
     $query=$con->query("INSERT INTO `staff` VALUES('$roll','$name','$branch')",$conn);
     if(!$query)
     {
      die("Error in adding Faculty".$con->connect_error);
     }
     else
     {
     ?>
     <script type="text/javascript">
       alert("Faculty added successfully");
     </script>
     <?php
      }
    }
    ?>

    <p>Upload File</p>
    <form method="post" action="upload_file1.php" enctype="multipart/form-data">
      <p><input type="file" name="file0" id="file0"></p>
           
      <p class="submit"><input type="submit" name="fttsubmit" value="Submit"></p>
    </form>

  </div>
		</div></center>
		<br>
		
		<div id="stddel">
			<input id="b1" type="button" align="left" value="Student Deletion">
		</div>
			<script type="text/javascript">
				
			</script>
		<center><div id="stddelspage">
					
			<div class="login" style="left: 0px; top: 0px; height: 300px">
  <h1>Student Deletion</h1>
<form name="stddelete" method="post" action="index1.php">
<p><input type="Text" name="stddel" value="" placeholder="Enter Roll No"><br>
<p class="submit"><input type="submit" name="delstusubmit" value="Submit"></p>
<center>&nbsp;<br>
<br>
<div id="mainselection">
Year:&nbsp;<select name="ugyear">
<option value="0">Select</option>
 
   <option>1</option>
   <option>2</option>
   <option>3</option>
   <option>4</option>
</select>
<br>

      <p class="submit"><input type="submit" name="studentsdel" value="Submit"></p>


</div></form>





 <?php  
     if(isset($_POST['delstusubmit']))
    {
     $num=$_POST['stddel'];
     
     $query=$con->query("DELETE FROM `student` WHERE `rollnum` LIKE '$num'",$conn);
     
    $query1=$con->query("DELETE FROM `main` WHERE `rollnum` LIKE '$num'",$conn);

     if(!$query)
     {
      die("Errorr in deleting value".$con->connect_error);
     }
     
     else if(!$query1)
     {
      die("Error in deleting value".$con->connect_error);
     }

     else
     {
     ?>
     
     <script type="text/javascript">
     
     alert("Student Deleted successfully");
     </script>
     <?php
       
     }  
   }
  
    ?>



 <?php  
     if(isset($_POST['studentsdel']))
    {
     $num=$_POST['ugyear'];
     
     
     if($num!=0)
     {
     
     	$query=$con->query("DELETE FROM `student` WHERE `year` LIKE '$num'",$conn);
     
    	 $query1=$con->query("DELETE FROM `main` WHERE `year` LIKE '$num'",$conn);

    	 if(!$query)
    	 {
    	  die("Errorr in deleting value".$con->connect_error);
    	 }
     
    	 else if(!$query1)
    	 {
    	  die("Error in deleting value".$con->connect_error);
    	 }

    	 else
    	 {
    	 ?>
     
    	 <script type="text/javascript">
    	 
   		  alert("Students Deleted successfully");
    	 </script>
   	  <?php
       }
   	  }  
   	}
  
    ?>







</div>

			
		</div></center>
		
		<br>
		
		<div id="facdel">
			<input id="b1" type="button" align="left" value="Faculty Deletion">
		</div>		<center><div id="facdelspage">
			
			
			<div class="login">
    <h1>Faculty Details Deletion</h1>
    <form method="post" action="" name="facultydelete">
      <p><input type="text" name="facno" value="" placeholder="Faculty No"></p>
      <p class="submit"><input type="submit" name="facdeletion" value="Submit"></p>
    </form>
    
  <?php  
     if(isset($_POST['facdeletion']))
    {
     $num=$_POST['facno'];
     
     $query=$con->query("DELETE FROM `staff` WHERE `number` LIKE '$num'",$conn);
     
     $query1=$con->query("DELETE FROM `main` WHERE `rollnum` LIKE '$num'",$conn);

     if(!$query)
     {
      die("Error in deleting value".$con->connect_error);
     }
     
     else if(!$query1)
     {
      die("Error in deleting value".$con->connect_error);
     }

     else
     {
     ?>
     
     <script type="text/javascript">
     
     alert("Faculty Deleted successfully");
     </script>
     <?php
       
     }  
   }
  
    ?>
    
    
  </div>
			
		</div></center>
		
		<br>
		
		<div id="addbranch">
			<input id="b1" type="button" align="left" value="Add branch">
		</div>		<center><div id="addbranchpage">
			
			<div class="login">
    <h1>Add Branch</h1>
    <form method="post" action="">

      <p><input type="text" name="ugbranch" value="" placeholder="UG branch"></p>
      <p class="submit"><input type="submit" name="ugsubmit" value="submit"></p>
      <p><input type="text" name="pgbranch" value="" placeholder="PG Branch"></p>
      
      <p class="submit"><input type="submit" name="pgsubmit" value="submit"></p>
    </form>
    
    
     <?php
    
    if(isset($_POST['ugsubmit']))
    {
     $branch=$_POST['ugbranch'];
     
     $query=$con->query("INSERT INTO `branches`(`ug`,`pg`) VALUES('$branch','--')",$conn);
     if(!$query)
     {
      die("Error in adding Branch".$con->connect_error);
     }
     else
     {
     ?>
     
     <script type="text/javascript">
     
     alert("UG-Branch added successfully");
     </script>
     <?php
       
     }
     
    }
    
    
    
     if(isset($_POST['pgsubmit']))
    {
     $branch=$_POST['pgbranch'];
     
     $query=$con->query("INSERT INTO `branches`(`ug`,`pg`) VALUES('--','$branch')",$conn);
     if(!$query)
     {
      die("Error in adding Branch".$con->connect_error);
     }
     else
     {
     ?>
     
     <script type="text/javascript">
     
     alert("PG-Branch added successfully");
     </script>
     <?php
       
     }
     
     
    }

    ?>

    
    
  </div>
			
		</div></center>
	
	<br>	
	<div id="viewstu">
			<input id="b1" type="button" align="left" value="View Students">
		</div>		<center><div id="students">
			
			<div class="login">
    <h1>View Students</h1>
    <form method="post" action="">
      <p> <select name="year" style="width: 175px">
   <option value="0">Select Year</option>
   <option>1</option>
   <option>2</option>
   <option>3</option>
   <option>4</option>
</select></p>
       <p class="submit"><input type="submit" name="viewstud" value="submit"></p>
    </form>


	</div>
	
	
	<?php
	if(isset($_POST['viewstud']))
	{
	?>
	<br>
	<table style="color:#FFFFFF; border-color:#FFFFFF; border:medium;" border="1" cellspacing="0" cellpadding="5px">
	<tr><th>Sno</th><th>Rollno</th><th>Name</th><th>Year</th><th>Branch</th></tr>
	
	<tr>
	<?php
	   $year=$_POST['year'];
		$query=$con->query("SELECT * FROM `student` WHERE `year` LIKE '$year'",$conn);
		$i=1;
		while($res=$query->fetch_assoc()($query))
		{
	
		?>
		<tr>
		<td><?php echo $i; $i++; ?></td>
		<td><?php	echo $res[0]; ?></td>
		<td><?php 	echo $res[1]; ?></td>
		<td><?php	echo $res[2]; ?></td>
		<td><?php	echo strtoupper($res[3]); ?></td>
		</tr>
		<?php
		 
		}
	}
	?>
	
		</table>
	

	
</div>

<div id="student_update" >
			<a href="mantual_upd.php"><input type="button" align="left" value="Student Update" id="new"></a>
		</div>	

<div id="student_update_main" >
			<a href="update_new.php"><input type="button" align="left" value="Batch Update" id="new"></a>
		</div>	

<div id="student_delete" >
			<a href="manual_del.php"><input type="button" align="left" value="Student Deletion" id="new"></a>
		</div>	

<form align="right" action="logout.php">
<input align="right" type="submit" value="Logout">
</form>

</body>

</html>
