<?php

//include auth_session.php file on all user panel pages
include("auth_session.php");
$con = mysqli_connect("localhost","root","","student_id");

?>
<html>
   <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
     <body>
     	 <div class="jumbotron" style="width:70%; margin:0 auto;">
            <h2 class="text-primary text-center" style=" padding: 20px;"><span><a class="btn btn-warning" href="admindash.php" type="button" style="position: relative; right:25%;">Go Back</a></span> STUDENT DETAILS </h2>
            <div class="well well-lg bg-info" style="text-align: center;">
                <p><strong> Informations </strong></p>
            </div>
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" >
                <div class="form-group">
                        <label class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="E.g Godfrey Samuel">
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Matric No:</label>
                    <div class="col-sm-8">
                        <input type="text" name="matric_no" class="form-control" id="inputEmail3" placeholder="E.g 878/9979">
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-2 control-label">Faculty:</label>
                        <div class="col-sm-8">
                            <input type="text" name="f_name" class="form-control" id="inputEmail3" placeholder="e.g Science & Technology">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Department:</label>
                        <div class="col-sm-8">
                            <input type="text" name="m_name" class="form-control" id="matric_no" placeholder=" Computer Science">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Date Of Birth.:</label>
                        <div class="col-sm-8">
                            <input type="date" name="dob" class="form-control" id="matric_no" placeholder="08/31/1995">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Level:</label>
                        <div class="col-sm-2">
                            <select class="form-control" name="level">
							<option value="100">100</option>
							<option value="200">200</option>
							<option value="300">300</option>
							<option value="400">400</option>
                            <option value="500">500</option>
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contact No.:</label>
                        <div class="col-sm-8">
                            <input type="text" name="mob" class="form-control" id="inputEmail3" placeholder="E.g 09056253890">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Picture.:</label>
                        <div class="col-sm-8">
                            <input type="File" name="pic" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" style="position: relative; left:420px;">Submit</button>
            </form>
        </div>
	 <!--  <div align="center" class="register_form">
       <table class="table table-hover">
	    <form>
	    <h1>Registration Form</h1>
		<tr><td>Profile Pic:</td><td><input type="File" name="pic"></td></tr>
		<tr><td>Name:</td><td><input type="text" name="name"></td></tr>
		<tr><td>Faculty:</td><td><input type="text" name="f_name"></td></tr>
		<tr><td>Department:</td><td><input type="text" name="m_name"></td></tr>
		<tr><td>Matric Number:</td><td><input type="text" name="matric_no"></td></tr>
		<tr><td>Date Of Birth.:</td><td><input type="date" name="dob"></td></tr>
		<tr>
		<td>Level</td>
		<td>
		<select name="level">
		<option value="100">100</option>
		<option value="200">200</option>
		<option value="300">300</option>
		<option value="400">400</option>
		</select>
		</td>
		</tr>
		<tr><td>Contact No.:</td><td><input type="text" name="mob"></td></tr>
		<tr><td colspan="2"align="center"><input type="submit" name="submit" value="Submit"></td></tr>
	   </form>
	 </table>
    </div> -->

    </body>
</html>
<?php
  if(isset($_POST['submit'])){
	  //text data variables
	  $name=$_POST['name'];
	  $f_name=$_POST['f_name'];
	  $m_name=$_POST['m_name'];
	  $dob=$_POST['dob'];
	  $level=$_POST['level'];
	  $mob=$_POST['mob'];
	 $matric_no=$_POST['matric_no'];
	 
	  //image names
	   $st_pic=$_FILES['pic']['name'];
	  
	  //image temp names
	  
	   $temp_name=$_FILES['pic']['tmp_name'];
	   
	  $f_extension1 = explode('.',$st_pic);
	  
	  $f_extension1 = strtolower(end($f_extension1));
	   
	   $f_newfile1 = uniqid().'.'.$f_extension1;
	  
	   if($f_newfile1==''OR $name=='' OR $f_name=='' OR $m_name=='' OR $mob=='' OR $dob=='' OR $level=='' OR $matric_no==''){
		  
		  echo"<script>alert('please fill all the fields !')</script>";
		  exit();
		   }
	  
	  else{
	   // uploading images to ist folder
	   
	   move_uploaded_file($temp_name,"student_images/$f_newfile1");

	  $insert_clint="insert into students (profile,name,f_name,m_name,dob,level,mobile,matric_no)values('$f_newfile1','$name','$f_name','$m_name','$dob','$level','$mob','$matric_no')";
	  
	  $run_costumer = mysqli_query($con, $insert_clint);
	  if($run_costumer){
		                echo"<script>alert('costumer inserted successfully')</script>";
	                    }
	  else{
		   echo"<script>alert('somethig went rong !')</script>";
	     }
    }
  }
?>
 