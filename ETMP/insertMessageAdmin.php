<?php include('admindata.php')?>
<?php
    $conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
    $sender = $_SESSION['name'];
    $receiver = $_POST['receiver_name'];
    $message = $_POST['msg'];

    $data = array(
        ':receiver_name' => $receiver,
        ':sender_name' => $sender,
        ':msg' => $message
    );

    $query = "INSERT INTO messages(sender_name,receiver_name,msg)VALUES('$sender','$receiver','$message')";
    mysqli_query($conn,$query);

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
    </div>