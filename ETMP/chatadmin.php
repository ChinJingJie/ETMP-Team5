<!-- Author: Chin Jing Jie -->
<script>
    //open and close chat window with user list
    $(function(){
      $("#openChat").click(function () {
        $('#chatWindow').addClass('chat-box-on');
      });

      $("#closeChat").click(function () {
        $('#chatWindow').removeClass('chat-box-on');
      });
    })
    
    //close private chat window(dynamic)
    $(function(){
      $("#closeChat2").click(function () {
        $('#chatWindow2').removeClass('chat-box-on');
      });
    })
    
    
    //navigate from private chat window to chat window with user list(dynamic)
    $(function(){
      $("#backToChat2").click(function () {
        $('#chatWindow2').removeClass('chat-box-on');
        $('#chatWindow').addClass('chat-box-on');
      });
    })
</script>

<?php 
  $conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
  $admins = $_SESSION['name'];
  $sql = mysqli_query($conn, "SELECT * FROM admins WHERE name = '$admins'");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }
  $sql1 = mysqli_query($conn, "SELECT * FROM users");
?>

<div class="sticky">
   <a href="#" id="openChat">
	   <i class="fa fa-comment"></i>
   </a>
</div>

<!--chat window with user list-->
<div class="chat-box" id="chatWindow">
  <div class="chat-head">
    <div class="popup-head-left pull-left size">
        <input type="text" placeholder="Search..." name="userSearch" id="userSearch" class="search">
        <div class="find-msg">
          <label for="search-icon">
            <i class="fa fa-search"></i>
          </label>
        </div>
    </div>
    <div class="pull-right">
      <a href="#" id="minimizeChat">
          <i class="fa fa-window-minimize"></i>
        </a>
        <a href="#" id="closeChat">
          <i class="fa fa-window-close"></i>
        </a>
    </div>
  </div>
  <div class="chat-messages card_body">
      <div class="chat-body">
		<!--body of the chat list-->
        <div class="contacts_body">
            <ui class="contacts">
                <div id="result0">
                    <?php
                    if(mysqli_num_rows($sql1) > 0)
                    {
                        while($row1 = mysqli_fetch_array($sql1))
                        {
                            ?>
                            <li class="chatCardDisplay1 contacts_body" onclick="storeUser('<?php echo $row1['name'];?>')">
                                <input type="text" class="receiver_name" name="receiver_name" value="<?php echo $row1['name'];?>" hidden>
                                <div class="d-flex bd-highlight chatCard">                    
                                    <div class="chatUser">
                                        <span><?php echo $row1['name'];?></span>
                                        <p id="chatHistoryDisplay">Start a new chat now</p>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }
                        }
                     ?>
                </div>
                <div id="result"></div>
            </ui>
          </div>  
      </div>
      <div class="chat-footer listfooter">
          <?php echo $row['name'];?>'s Chat Box
      </div>
    </div>
</div>

<!--private chat window for user stored in database-->
<div class="chat-box" id="chatWindow2">
  <div class="chat-head">
    <div class="popup-head-left pull-left picBg">
        <a href="#" id="backToChat2">
          <i class="fa fa-chevron-circle-left"></i>
        </a>
        <span id="displayName2"></span>
    </div>
    <div class="pull-right">
        <a href="#" id="minimizeChat2">
          <i class="fa fa-window-minimize"></i>
        </a>
        <a href="#" id="closeChat2">
          <i class="fa fa-window-close"></i>
        </a>
    </div>
  </div>
  <div class="chat-messages">
      <div class="chat-body" id="chat-body">
		<!--body of the chat-->
          <div class="card-body msg_card_body">
            <div class="d-flex justify-content-start mb-4">
              <div class="msg_cotainer">
                Hi, how are you samim?
                <span class="msg_time">8:40 AM, Today</span>
              </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
              <div class="msg_cotainer_send">
                Hi Khalid i am good tnx how about you?
                <span class="msg_time_send">8:55 AM, Today</span>
              </div>
            </div>
          </div>
        </div>
      <div class="chat-file-msg" id="fileSlt">Nothing selected</div>
      <div class="chat-footer">
          <div class="image-upload">
              <label for="file-icon">
                <i class="fa fa-paperclip"></i>
              </label>

              <input id="file-icon" type="file" onclick="fileSelectionMsg('upload')"/>
          </div>
          <!-- identify reeiver in the following input -->
          <textarea id="status_message" placeholder="Type a message..." rows="10" cols="20" name="message"></textarea>
          <input type="text" id="receiver" name="receiver" value="" hidden/>
          <div class="msg-send">
              <label for="send-icon">
                <i class="fa fa-send"></i>
              </label>

              <input id="send-icon" type="submit" />
          </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    //print name of file selected to upload and restric size to 25MB
    const input = document.getElementById('file-icon')
    input.addEventListener('change', (event) => {
      const target = event.target
        if (target.files && target.files[0]) {
          const maxAllowedSize = 25 * 1024 * 1024;
          if (target.files[0].size > maxAllowedSize) {
            target.value = '';
            document.getElementById("fileSlt").textContent="Failed: File size exceed 25MB";
          }else{
            document.getElementById("fileSlt").textContent="Selected: " + target.value.split("\\").pop();
          }
      }
    })
    
    //live data search
    $(document).ready(function(){

         load_data();

         function load_data(query)
         {
             $.ajax({
                 url:"fetch.php",
                 method:"POST",
                 data:{query:query},
                 success:function(data)
                {
                $('#result').html(data);
                }
            });
         }
         $('#userSearch').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                $('#result0').css("display", "none");
                load_data(search);
            }
            else
            {
                load_data();
                $('#result0').css("display", "block");
            }
          });
    });
    
    //send message
    $(document).ready(function(){
        $(document).on('click', '#send-icon', function(){
          var receiver_name = $('#displayName2').text(sessionStorage.receiver);
          var msg = $('#status_message'+receiver_name).val();
          $.ajax({
           url:"insertMessage.php",
           method:"POST",
           data:{receiver_name:receiver_name, msg:msg},
           success:function(data)
           {
            //clear text area field value
            $('#status_message'+receiver_name).val('');
            $('#chat-body'+receiver_name).html(data);
           }
          })
         });
     });
</script>