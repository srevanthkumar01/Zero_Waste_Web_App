<?php error_reporting(0);

$email=$_POST["email"];

$mysql=mysqli_connect("localhost","root")
or die("can't connect");
mysqli_select_db($mysql,"rev")
or die("can't select");
mysqli_query($mysql,"insert into subscribe values('$email')")
or die("query failed to insert");
$result=mysqli_query($mysql,"select * from subscribe");
?>

<html>  
<head><title>PHP and MYSQL</title></head>
  <body bgcolor="aabbcc">
     <h3>Page to display the Stored data</h3>
        <table border="1">
               <tr>
                <th>EMAIL</th>
               </tr>
               <?php while($array=mysqli_fetch_row($result)):
              echo
               "<tr>
                  <td>$array[0]</td>
 		         </tr>";
           endwhile; ?>
           <?mysqli_free_result($result);?>
           <?mysqli_close($mysql);?>
        </table>
     </body>
</html>
