<?php
	//Dr. Mark E. Lehr
	//Straight out of W3Schools

        /*WE WANT TO PUT THIS OUTSIDE OF public_html or else ppl can
        see your server and see your username and password*/
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	// echo "Connected successfully";
        
//        $sql = "SELECT `entity_product`.`name`, `entity_product`.`price`, "
//                . "`entity_product`.`stock`, `entity_product`.`description`, "
//                . "`entity_product`.`image` FROM `test`.`entity_album` "
//                . "`entity_album`, `test`.`enum_media` `enum_media`, "
//                . "`test`.`enum_artist` `enum_artist`, "
//                . "`test`.`xref_album_product` `xref_album_product`, "
//                . "`test`.`entity_product` `entity_product` WHERE `entity_album`."
//                . "`id_media` = `enum_media`.`id_type` AND `entity_album`."
//                . "`id_artist` = `enum_artist`.`id_artist` AND `xref_album_product`."
//                . "`id_product` = `entity_product`.`id_product` AND `xref_album_product`."
//                . "`id_album` = `entity_album`.`id_album`";
//        
//        $result=$conn->query($sql);
//        
//        
//        //$query="SELECT * FROM inventory;";
//
//        
//        //$result = mysqli_query($conn, $query);
//        $data = array(); 
//         
//        if (!$result) {
//            die("Error executing query: " . mysqli_error($conn));
//	}
//        
//          if ($result->num_rows > 0) {
//        // Output data of each row
//            while($row = $result->fetch_assoc()) {
//                echo "Album: " . $row["name"]. " - Price: " 
//                        . $row["price"]. " - Stock: " . $row["stock"]. " - Description: " 
//                        . $row["description"]. " - Image: " . $row["image"]. "<br>";
//     
//            }
//        } else {
//            echo "0 results";
//        }
//        
        
        
      
        /*
        echo "<br>";
        $json_data = json_encode($data);
        $file_path = 'products.json';
        
        
        if (file_exists($file_path)) {
            echo "The file $file_path exists <br>";
        } else {
            echo "The file $file_path does not exist";
        }
        
       
      
        echo "About to write JSON data to file: ". $file_path. "<br>";
        var_dump($json_data); 
        

        if (!file_put_contents($file_path, $json_data)) {
            die("Error writing JSON data to file: " . $file_path);
        } else {
            echo "JSON data saved to file: " . $file_path;
        }

        echo $json_data;
        
        echo "JSON data saved to file: " . $file_path; */
        
        
        //$rows = mysqli_num_rows($result);
        
//        while($row = mysqli_fetch_assoc($result)) {
//            echo "this is running";
//            echo 'Album: ' . $row['name'] . '<br>'; 
//            
//        }
        
 
        
//        $stmt=$conn->prepare($query);
//        
//         
//        $stmt->execute();
//        $stmt->bind_result($name, $price, $stock, $description, $image);
//        
//        while($stmt->fetch()) {
//            $temp=[
//                'name'=>$name,
//                'price'=>$price,
//                'stock'=>$stock,
//                'description'=>$description,
//                'image'=>$image
//            ];
//            array_push($items, $temp);
//        }
//        echo json_encode($items);
        
 ?>      
        

       
