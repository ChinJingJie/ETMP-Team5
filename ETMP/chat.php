<!-- Author: Chin Jing Jie -->
<script>
    //open and close chat window
    $(function(){
      $("#openChat").click(function () {
        $('#chatWindow1').addClass('chat-box-on');
      });

      $("#closeChat1").click(function () {
        $('#chatWindow1').removeClass('chat-box-on');
      });
    })
    
    //navigate from personal chat screen to list of chat screen
    $(function(){
      $("#backToChat1").click(function () {
        $('#chatWindow1').removeClass('chat-box-on');
        $('#chatWindow').addClass('chat-box-on');
      });
    })
    
    //navigate from list of chat screen to personal chat screen
    $(function(){
      $(".chatCardDisplay").click(function () {
        $('#chatWindow').removeClass('chat-box-on');
        $('#chatWindow1').addClass('chat-box-on');
      });
    })
    
    //generate profile pic with initial
    $(document).ready(function(){
      var profileName = $('#profileName').text();
      var intials = $('#profileName').text().charAt(0) + $('#profileName').text().charAt(1);
      //use in chat lists
      var profileImage0 = $('.profileImage0').text(intials);
      //use in header
      var profileImage = $('#profileImage').text(intials);
      //use during conversation
      var profileImage1 = $('.profileImage1').text(intials);
    });
</script>

<div class="sticky">
   <a href="#" id="openChat">
	   <i class="fa fa-comment"></i>
   </a>
</div>

<div class="chat-box" id="chatWindow">
  <div class="chat-head">
    <div class="popup-head-left pull-left size">
        <form action="" method="POST" class="search-form">
            <input type="text" placeholder="Search..." name="search" class="search">
            <div class="find-msg">
              <label for="search-icon">
                <i class="fa fa-search"></i>
              </label>

              <input id="search-icon" type="submit" />
            </div>
        </form>
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
				<li class="chatCardDisplay">
				    <div class="d-flex bd-highlight chatCard">
				        <div class="profileImage0"></div>
				        <div class="chatUser">
				            <span>Khalid</span>
				            <p id="chatHistoryDisplay">Start a new chat now</p>
				        </div>
				    </div>
				</li>
            </ui>
          </div>  
      </div>
      <div class="chat-file-msg" id="fileSlt">Nothing selected</div>
      <div class="chat-footer">
      </div>
    </div>
</div>

<div class="chat-box" id="chatWindow1">
  <div class="chat-head">
    <div class="popup-head-left pull-left picBg">
        <a href="#" id="backToChat1">
          <i class="fa fa-chevron-circle-left"></i>
        </a>
        <span id="profileName" style="display:none;">Kalpesh</span>
        <div id="profileImage"></div>
        <span id="displayName">Kalpesh</span>
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
              <div class="profileImage1"></div>
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
            <div class="d-flex justify-content-start mb-4">
              <div class="profileImage1"></div>
              <div class="msg_cotainer">
                I am good too, thank you for your chat template
                <span class="msg_time">9:00 AM, Today</span>
              </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
              <div class="msg_cotainer_send">
                You are welcome
                <span class="msg_time_send">9:05 AM, Today</span>
              </div>
            </div>
            <div class="d-flex justify-content-start mb-4">
              <div class="profileImage1"></div>
              <div class="msg_cotainer">
                I am looking for your next templates
                <span class="msg_time">9:07 AM, Today</span>
              </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
              <div class="msg_cotainer_send">
                Ok, thank you have a good day
                <span class="msg_time_send">9:10 AM, Today</span>
              </div>
            </div>
            <div class="d-flex justify-content-start mb-4">
              <div class="profileImage1"></div>
              <div class="msg_cotainer">
                Bye, see you
                <span class="msg_time">9:12 AM, Today</span>
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
</script>