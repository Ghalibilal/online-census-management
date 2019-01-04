<?php

$conn = mysqli_connect("localhost", "root", "","CENSUS");

$l_id=$_GET['l_id'];
$sql = "SELECT * FROM people WHERE serial_no='$l_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $religion=$row['religion'];
        $tongue=$row['tongue'];

        $emp_id=$row['emp_id'];

    }
}



if (isset($_POST['submited']))
 {
 	$number=$_POST['number'];
    for($i=0;$i<$number;$i++)
    {



 	
 		$sql="INSERT INTO people (name,fatherName,cnic,gender,age,martial_status,religion,tongue,qualification,job,education_status,emp_id ) VALUES('".$_POST['name'][$i]."','".$_POST['father_name'][$i]."','".$_POST['cnic'][$i]."','".$_POST['gender'][$i]."','".$_POST['birthday'][$i]."','".$_POST['martial_status'][$i]."',
 			'$religion','$tongue','".$_POST['qualification'][$i]."','".$_POST['job'][$i]."','".$_POST['education'][$i]."','$emp_id')";


 	
 	
 		if(!mysqli_query($conn,$sql))
 		{
 			echo mysqli_error($conn);
 		}
 		else
 		{
            $las_id = mysqli_insert_id($conn);
            $sql="INSERT INTO family(family_id,head_id,relation_head) VALUES('$las_id','$l_id','".$_POST['relation'][$i]."')";
            mysqli_query($conn,$sql);
            $a=$i+1;
 			echo " record $a saved";


 		
 		}
    }

    header("refresh:1;url='../family_view.php?h_id=$l_id'");
 	}
	


	

		
	
	










?>