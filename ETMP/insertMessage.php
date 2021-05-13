<?php
    $conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
/*
    function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
    {
     $query = "
     SELECT * FROM chat_message 
     WHERE (from_user_id = '".$from_user_id."' 
     AND to_user_id = '".$to_user_id."') 
     OR (from_user_id = '".$to_user_id."' 
     AND to_user_id = '".$from_user_id."') 
     ORDER BY timestamp DESC
     ";
     $statement = $connect->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     $output = '<ul class="list-unstyled">';
     foreach($result as $row)
     {
      $user_name = '';
      if($row["from_user_id"] == $from_user_id)
      {
       $user_name = '<b class="text-success">You</b>';
      }
      else
      {
       $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
      }
      $output .= '
      <li style="border-bottom:1px dotted #ccc">
       <p>'.$user_name.' - '.$row["chat_message"].'
        <div align="right">
         - <small><em>'.$row['timestamp'].'</em></small>
        </div>
       </p>
      </li>
      ';
     }
     $output .= '</ul>';
     return $output;
    }

    $data = array(
        ':receiver_name' => $_POST['receiver'],
        ':sender_name' => $_SESSION['name'],
        ':msg' => $_POST['status_message']
    );
    $data = array(
        ':sender_name' => "Sample Admin",
        ':receiver_name' => "Sample Client",
        ':msg' => "Hi Sample Client"
    );*/

    $query = "INSERT INTO messages(sender_name,receiver_name,msg)VALUES('Sample Client','Sample Admin','Hi Admin')";
    mysqli_query($conn,$query);

    //$statement = $connect->prepare($query);
    
if($statement->execute($data)){
    echo "Hi!";
    //echo fetch_user_chat_history($_SESSION['name'], $_POST['receiver'], $conn);
}
?>