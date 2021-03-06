<!--profile pic is not generated when live search should use php not jQuery for this-->
<script>
    //navigate from chat window with user list to private chat window
    $(function(){
      $(".chatCardDisplay1").click(function () {
        $('#chatWindow').removeClass('chat-box-on');
        $('#chatWindow2').addClass('chat-box-on');
        $('#displayName2').text(sessionStorage.receiver);
        var private_content = '<button type="button" class="loadchat">Previous Chat</button>';
        $('#chat-body').html(private_content);
      });
    })
</script>
<?php
    //connection or link to database
    $connect = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
    
    if(isset($_POST['query'])) {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "SELECT name FROM users WHERE name LIKE '%".$search."%'";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <li class="chatCardDisplay1 contacts_body" onclick="storeUser('<?php echo $row['name'];?>')">
                    <input type="text" class="receiver_name" name="receiver_name" value="<?php echo $row['name'];?>" hidden>
                    <div class="d-flex bd-highlight chatCard">                    
                        <div class="chatUser">
                            <span><?php echo $row['name'];?></span>
                            <p id="chatHistoryDisplay">Start a new chat now</p>
                        </div>
                    </div>
                </li>
            <?php
            }
        }
        else
        {
            echo 'Data Not Found';
        }
    }
?>