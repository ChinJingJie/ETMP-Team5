<?php include ('userdata.php');?>
<?php
    $conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
    $sender = $_SESSION['name'];
    $receiver = $_POST['receiver_name'];

    $data = array(
        ':receiver_name' => $receiver,
        ':sender_name' => $sender,
    );

    //display message
    $query_display = "SELECT * FROM messages WHERE (sender_name = '".$sender."' AND receiver_name = '".$receiver."') OR (sender_name = '".$receiver."' AND receiver_name = '".$sender."') ORDER BY msg_id ASC";
    $result = mysqli_query($conn,$query_display);
    ?>     
    <div class="card-body msg_card_body">
    <?php
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
    {
        if($row["sender_name"] == $sender)
        {
            ?>
            <div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send"><?php echo $row['msg'];?></div>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="d-flex justify-content-start mb-4">
                <div class="msg_cotainer"><?php echo $row['msg'];?></div>
            </div>
        <?php
        }
        ?>
    <?php
        }
    }
    ?>
    <button type="button" class="loadchat">Update Chat</button>
    </div>

<script>
 //display message
    $(document).ready(function(){
        $(document).on('click', '.loadchat', function(){
          var receiver_name = sessionStorage.receiver;
          $.ajax({
           url:"fetchChatHistory.php",
           method:"POST",
           data:{receiver_name:receiver_name},
           success:function(data)
           {
            $('#chat-body').html(data);
           }
          })
         });
     });
</script>