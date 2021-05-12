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
    
    //close private chat window(default)
    $(function(){
      $("#closeChat1").click(function () {
        $('#chatWindow1').removeClass('chat-box-on');
      });
    })
    
    //close private chat window(dynamic)
    $(function(){
      $("#closeChat2").click(function () {
        $('#chatWindow2').removeClass('chat-box-on');
      });
    })
    
    //navigate from private chat window to chat window with user list(default)
    $(function(){
      $("#backToChat1").click(function () {
        $('#chatWindow1').removeClass('chat-box-on');
        $('#chatWindow').addClass('chat-box-on');
      });
    })
    
    //navigate from private chat window to chat window with user list(dynamic)
    $(function(){
      $("#backToChat2").click(function () {
        $('#chatWindow2').removeClass('chat-box-on');
        $('#chatWindow').addClass('chat-box-on');
      });
    })
    
    //navigate from chat window with user list to private chat window
    $(function(){
      $(".chatCardDisplay").click(function () {
        $('#chatWindow').removeClass('chat-box-on');
        $('#chatWindow1').addClass('chat-box-on');
      });
    })
    
    $(function(){
      $(".chatCardDisplay1").click(function () {
        $('#chatWindow').removeClass('chat-box-on');
        $('#chatWindow2').addClass('chat-box-on');
        $('#displayName2').text(sessionStorage.receiver);
      });
    })
</script>

<?php 
  $conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
  $client = $_SESSION['name'];
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE name = '$client'");
  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  }
?>

<div class="sticky">
   <a href="#" id="openChat">
	   <i class="fa fa-comment"></i>
   </a>
</div>

<!--chat window with user list-->
<div class="chat-box" id="chatWindow">
  <div class="chat-head">
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
                <li class="chatCardDisplay">
                    <div class="d-flex bd-highlight chatCard">
                        <div class="chatUser">
                            <span>ETMP Official</span>
                            <p id="chatHistoryDisplay">Start a new chat now</p>
                        </div>
                    </div>
                </li>
                <li class="chatCardDisplay1 contacts_body" onclick="storeUser('Sample Admin')">
                    <div class="d-flex bd-highlight chatCard">
                        <div class="chatUser">
                            <span>Sample Admin</span>
                            <p id="chatHistoryDisplay">Start a new chat now</p>
                        </div>
                    </div>
                </li>
            </ui>
          </div>  
      </div>
      <div class="chat-footer listfooter">
          <?php echo $row['name'];?>'s Chat Box
      </div>
    </div>
</div>
<!--private chat window for default user-->
<div class="chat-box" id="chatWindow1">
  <div class="chat-head">
    <div class="popup-head-left pull-left picBg">
        <a href="#" id="backToChat1">
          <i class="fa fa-chevron-circle-left"></i>
        </a>
        <span id="displayName">ETMP Official</span>
    </div>
    <div class="pull-right">
        <a href="#" id="minimizeChat1">
          <i class="fa fa-window-minimize"></i>
        </a>
        <a href="#" id="closeChat1">
          <i class="fa fa-window-close"></i>
        </a>
    </div>
  </div>
  <div class="chat-messages">
      <div class="chat-body">
		<!--body of the chat-->
          <div class="card-body msg_card_body">
            <div class="d-flex justify-content-start mb-4">
              <div class="msg_cotainer">
                Welcome to ETMP, Press 1 to get FAQ.
              </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
              <div class="msg_cotainer_send">
                1
              </div>
            </div>
          </div>
        </div>
      <div class="chat-footer">
          <textarea id="status_message0" placeholder="Type a message..." rows="10" cols="20" name="message"></textarea>
          <div class="msg-send">
              <label for="send-icon0">
                <i class="fa fa-send"></i>
              </label>

              <input id="send-icon0" type="submit" />
          </div>
      </div>
    </div>
</div>
<!--private chat window for user stored in database-->
<!--the content is not properly structured yet-->
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
      <div class="chat-body">
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
          <!--<input type="text" class="incoming_id" name="incoming_id" value="<?php //echo $user_id; ?>" hidden>-->
          <textarea id="status_message" placeholder="Type a message..." rows="10" cols="20" name="message"></textarea>
          <div class="msg-send">
              <label for="send-icon">
                <i class="fa fa-send"></i>
              </label>

              <input id="send-icon" type="submit" />
          </div>
      </div>
    </div>
</div>

<script>
    //print name of file selected to upload and restric size to 25MB (dynamic)
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
</script>