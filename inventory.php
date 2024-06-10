<?php

    require_once ('DBConnect.php');
    
//     $sql = "SELECT `entity_product`.`name`, `entity_product`.`price`, "
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
        
    //Querying for cd albums only
//    $sql= "SELECT `entity_product`.`name`, `entity_product`.`price`, `entity_product`."
//            . "`stock`, `entity_product`.`description`, `entity_product`.`image`, "
//            . "`entity_product`.`artist` FROM `test`.`entity_album` `entity_album`, "
//            . "`test`.`enum_media` `enum_media`, `test`.`enum_artist` `enum_artist`, "
//            . "`test`.`xref_album_product` `xref_album_product`, `test`.`entity_product` "
//            . "`entity_product` WHERE `entity_album`.`id_media` = `enum_media`.`id_type` "
//            . "AND `entity_album`.`id_artist` = `enum_artist`.`id_artist` AND "
//            . "`xref_album_product`.`id_product` = `entity_product`.`id_product` AND "
//            . "`xref_album_product`.`id_album` = `entity_album`.`id_album` AND "
//            . "`enum_media`.`media` = 'cd'";
    
    $cd_sql="SELECT `entity_product`.`name`, `entity_product`.`price`, `entity_product`.`stock`, `entity_product`.`description`, `entity_product`.`image`, `entity_product`.`artist`, `xref_album_product`.`id_product` FROM `test`.`entity_album` `entity_album`, `test`.`enum_media` `enum_media`, `test`.`enum_artist` `enum_artist`, `test`.`xref_album_product` `xref_album_product`, `test`.`entity_product` `entity_product` WHERE `entity_album`.`id_media` = `enum_media`.`id_type` AND `entity_album`.`id_artist` = `enum_artist`.`id_artist` AND `xref_album_product`.`id_product` = `entity_product`.`id_product` AND `xref_album_product`.`id_album` = `entity_album`.`id_album` AND `enum_media`.`media` = 'CD'";  
    $vinyl_sql="SELECT `entity_product`.`name`, `entity_product`.`price`, `entity_product`.`stock`, `entity_product`.`description`, `entity_product`.`image`, `entity_product`.`artist`, `xref_album_product`.`id_product` FROM `test`.`entity_album` `entity_album`, `test`.`enum_media` `enum_media`, `test`.`enum_artist` `enum_artist`, `test`.`xref_album_product` `xref_album_product`, `test`.`entity_product` `entity_product` WHERE `entity_album`.`id_media` = `enum_media`.`id_type` AND `entity_album`.`id_artist` = `enum_artist`.`id_artist` AND `xref_album_product`.`id_product` = `entity_product`.`id_product` AND `xref_album_product`.`id_album` = `entity_album`.`id_album` AND `enum_media`.`media` = 'Vinyl'";    
    
    //Get result separate results for cd and vinyl-type products
    $result_cd=$conn->query($cd_sql);
    
    $result_v=$conn->query($vinyl_sql);
         
        if (!$result_cd) {
            die("Error executing query: " . mysqli_error($conn));
	}
        
          if ($result_cd->num_rows > 0) {
        // Output data of each row
            while($row = $result_cd->fetch_assoc()) {
                
//                echo "Album: " . $row["name"]. " - Price: " 
//                        . $row["price"]. " - Stock: " . $row["stock"]. " - Description: " 
//                        . $row["description"]. " - Image: " . $row["image"]. "<br>";
                return $row;
     
            }
        } else {
            echo "0 results";
        }
        
        if ($result_v->num_rows > 0) {
        // Output data of each row
            while($row = $result_v->fetch_assoc()) {
                
//                echo "Album: " . $row["name"]. " - Price: " 
//                        . $row["price"]. " - Stock: " . $row["stock"]. " - Description: " 
//                        . $row["description"]. " - Image: " . $row["image"]. "<br>";
                return $row;
     
            }
        } else {
            echo "0 results";
        }
    

