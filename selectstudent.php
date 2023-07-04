<?php  
 $connect = mysqli_connect("localhost", "root", "", "store");  
 $output = '';  
 $sql = "SELECT * FROM orders  ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="2%">OrderID</th>  
                     <th width="10%">ProductID</th>  
                     <th width="7%">name</th> 
			   		<th width="10%">email</th>
					<th width="7%">phone</th>
					<th width="7%">address</th>					
                     <th width="10%">Delete</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  

      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["OrderID"].'</td>  
                     <td class="ProductID" data-id1="'.$row["OrderID"].'" contenteditable>'.$row["ProductID"].'</td>  
                     <td class="name" data-id2="'.$row["OrderID"].'" contenteditable>'.$row["name"].'</td>  
					 <td class="email" data-id1="'.$row["OrderID"].'" contenteditable>'.$row["email"].'</td> 
					 <td class="phone" data-id1="'.$row["OrderID"].'" contenteditable>'.$row["phone"].'</td> 
					 <td class="address" data-id1="'.$row["OrderID"].'" contenteditable>'.$row["address"].'</td> 
                     <td><button type="button" name="delete_btn" data-id3="'.$row["OrderID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
				<td id="ProductID" contenteditable></td>  
                <td id="name" contenteditable></td>  
                <td id="email" contenteditable></td>
				<td id="phone" contenteditable></td>
				<td id="address" contenteditable></td>				
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				 <tr>  
                <td></td>  
				<td id="ProductID" contenteditable></td>  
                <td id="name" contenteditable></td>  
                <td id="email" contenteditable></td>
				<td id="phone" contenteditable></td>
				<td id="address" contenteditable></td>				
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  ;  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>