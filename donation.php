<?php
$name=$_POST["name"];
$email=$_POST["email"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$cardno=$_POST["cardno"];
$cvv=$_POST["cvv"];


$mysql=mysqli_connect("localhost","root")
or die("can't connect");
mysqli_select_db($mysql,"rev")
or die("can't select");
mysqli_query($mysql,"insert into donation values('$name','$email','$age','$gender','$cardno','$cvv')")
or die("query failed to insert");
$result=mysqli_query($mysql,"select * from donation");
?>

<html>  
<head><title>PHP and MYSQL</title></head>
  <body bgcolor="aabbcc">
     <h3>Page to display the Stored data</h3>
        <table border="1">
             <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>AGE</th>
                <th>GENDER</th>
                <th>CARDNO</th>
                <th>CVV</th>
                           <?php while($array=mysqli_fetch_row($result)):
              echo
               "<tr>
                  <td>$array[0]</td>
    			      <td>$array[1]</td>
    			      <td>$array[2]</td>
    			      <td>$array[3]</td>
    			      <td>$array[4]</td>
                  <td>$array[5]</td>
    			      
    			      
 		         </tr>";
           endwhile; ?>
           <?mysqli_free_result($result);?>
           <?mysqli_close($mysql);?>
        </table>
     </body>
</html>
