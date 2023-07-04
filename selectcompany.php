<?php  
 $connect = mysqli_connect("localhost", "root", "", "trainning");  
 $output = '';  
 $sql = "SELECT * FROM company  ORDER BY ID DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th wIDth="2%">الرقم</th>  
                     <th wIDth="10%">الاسم</th>  
                     <th wIDth="7%">العنوان</th> 
			   						
                     <th wIDth="10%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  

      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["ID"].'</td>  
                     <td class="Name" data-ID1="'.$row["ID"].'" contenteditable>'.$row["Name"].'</td>  
                     <td class="Address" data-ID2="'.$row["ID"].'" contenteditable>'.$row["Address"].'</td>  

                     <td><button type="button" name="delete_btn" data-ID3="'.$row["ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td ID="Name" contenteditable></td>  
                <td ID="Address" contenteditable></td>
				
                <td><button type="button" name="btn_add" ID="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td ID="Name" contenteditable></td>  
					<td ID="Address" contenteditable></td>
				
					<td><button type="button" name="btn_add" ID="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>