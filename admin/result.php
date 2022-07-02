<?php

$con = mysqli_connect("localhost","root","","student_id");

?>

<html>
    <head>
        <title>school id</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script language="javascript">
        function printpage()
            {
                window.print();
            }
        </script>
    </head>
   <style>
   #card{
	   float:left;
	   width:360px;
	   height:230px;
	   margin:5px;
	   border:1px solid black;
	   background-image: url("images/id.png");
	   background-repeat: no-repeat;
	   background-size: 360px 230px;
	   -webkit-print-color-adjust: exact;
   }
   #c_left{
	   margin-top:65px;
	   margin-left:10px;
	   float:left;
	   width:80px;
	   height:120px;

	   
   }
   #c_box{
	  width:80px; 
	  height:20px;
	  padding:5px;

   }
  #c_right{
	   
	   margin-left:120px;
	   width:220px;
	   height:200px;

   }
   td{
	   font-size:12px;
   }
   .no-id{
		font-size: 29px;
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 10px;
		background: aliceblue;
		height: 11vw;
   }
   </style>
   <?php

       $i=0;
		$get_costumers="select*from students order by 1 DESC;";
		
		$run_costumers=mysqli_query($con, $get_costumers);
		
		if($row_costumers=mysqli_fetch_array($run_costumers)){
			$i=0;
			$get_costumers="select*from students order by 1 DESC;";
			
			$run_costumers=mysqli_query($con, $get_costumers);
			while ($row_costumers=mysqli_fetch_array($run_costumers)){
			
			
				$st_id = $row_costumers['id'];
				$img = $row_costumers['profile'];
				$st_name = $row_costumers['name'];
				$f_name = $row_costumers['f_name'];
				$m_name = $row_costumers['m_name'];
				$mob = $row_costumers['mobile'];
				$dob = $row_costumers['dob'];
				$level = $row_costumers['level'];
				$st_id = $row_costumers['matric_no'];
				$i++;
				
				
				
				
			
			?>
	   
	   
	   
		 <body>
			 <!-- <div class="jumbotron" style="width:70%; margin:0 auto;">
				 <div>
				  <h2 class="text-primary text-center" style=" padding: 20px;"><span><a class="btn btn-warning" href="admindash.php" type="button" style="position: relative; right:25%;">Go Back</a></span> STUDENT DETAILS </h2>
				</div>
			</div> -->
	
		 <div id="card">
		  <div id="c_left">
		  <img src="student_images/<?php echo $img; ?>"width="80px"height="100px"style="border:1px solid black;"><br>
		  <div id="c_box">
		  Level : <?php echo $level; ?>
		  </div>
		  </div>
		  <div id="c_right">
		  
		  <div style="margin-top:29px;margin-left:84px;color:black;"> Matric No: <?php echo $st_id; ?> <br></div>
		  <table style="margin-top:20px;">
		 <tr>
		  <td><b>FullName</b></td><td><b>: <?php echo $st_name; ?></b></td>
		  </tr>
		  <tr>
		  <td><b>Faculty</b></td><td>: <?php echo $f_name; ?></td>
		  </tr>
		  <tr>
		  <td><b>Department</b></td><td>: <?php echo $m_name; ?></td>
		  </tr>
		  <tr>
		  <td><b>Date Of Birth</b></td><td>: <?php echo $dob; ?></td>
		  </tr>
		  <tr>
		  <td><b>Contact No.</b></td><td>: <?php echo $mob; ?></td>
		  </tr>
		  <tr>
		  <td><i>Pirnciple</i></td><td><img src="images/sign.jpg"width="100px"height="30px"></td>
		  </tr>
		  </table>
		  
		  </div>
		   <div style="margin-top:-18px;margin-left:35px;color:black;font-size:12px;">Contact school managment if found</div>
		 </div>
		 <?php } 
		}else{
			echo (
				"<div  class='no-id'><div>No id card available</div>  <div>
				<h2 class='text-primary text-center' style=' padding: 20px;'><span><a class='btn btn-warning' href='admindash.php' type='button style='position: relative; right:25%;'>Go Back</a>
			  </div></div>"
			);
		} ?>
	 </body>
   </head>
</html   