<?php  
 $connect = mysqli_connect("localhost", "root", "", "project");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM people WHERE people_name LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["people_name"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>ไม่พบชื่อที่ค้นหา</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  