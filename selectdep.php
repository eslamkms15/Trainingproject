<?php  
 $connect = mysqli_connect("localhost", "root", "", "trainning");  
 $output = '';  
 $sql = "SELECT * FROM department  ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="2%">الرقم</th>  
                     <th width="10%">اقصي عدد</th>  
                     <th width="7%">اسم القسم</th> 
			   		<th width="10%">عدد المسجلين</th>
					<th width="7%">رقم الشركة</th>					
                     <th width="10%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  

      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["DID"].'</td>  
                     <td class="Max" data-id1="'.$row["DID"].'" contenteditable>'.$row["Max"].'</td>  
                     <td class="DName" data-id2="'.$row["DID"].'" contenteditable>'.$row["DName"].'</td>  
					 <td class="number" data-id1="'.$row["DID"].'" contenteditable>'.$row["number"].'</td> 
					 <td class="ID" data-id1="'.$row["DID"].'" contenteditable>'.$row["ID"].'</td> 
                     <td><button type="button" name="delete_btn" data-id3="'.$row["DID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="Max" contenteditable></td>  
                <td id="DName" contenteditable></td>
				<td id="number" contenteditable></td>
				<td id="ID" contenteditable></td>				
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td id="Max" contenteditable></td>  
					<td id="DName" contenteditable></td>
					<td id="number" contenteditable></td>
					<td id="ID" contenteditable></td>					
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>