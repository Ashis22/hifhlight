

      <?php
      $conn= mysqli_connect("localhost","root","","tutorial");
      $res = array();

      if (isset($_GET['term'])) {
        // $value ="";
         $value = $_GET['term'];
         // function checkstr($value){
         //     if(strpos($value,',')==TRUE){
         //         return trim(substr(strrchr($value, ','), 1 ));  
         //     }else{
         //         return trim(substr($value, strpos($value,',')),',');
         //     }
         // }

         // $value= checkstr($value);
           
         $query = "SELECT * FROM tut WHERE title LIKE '$value%' LIMIT 25";
          $result = mysqli_query($conn, $query);
       
          if (mysqli_num_rows($result) > 0) {
            
           while ($user = mysqli_fetch_array($result)) {
            $res[] = $user['title'].",".$user['cat'].",".$user['id'];
            
           }
          } else {
            $res = array();
          }
          //return json res
          echo json_encode($res);
      }
      ?>
      