<!-- Author: Chin Jing Jie -->
<script>
    $(function(){
      $("#openChat").click(function () {
        $('#chatWindow').addClass('chat-box-on');
      });

      $("#closeChat").click(function () {
        $('#chatWindow').removeClass('chat-box-on');
      });
    })
    
    $(document).ready(function(){
      var profileName = $('#profileName').text();
      var intials = $('#profileName').text().charAt(0) + $('#profileName').text().charAt(1);
      var profileImage = $('#profileImage').text(intials);
    });
</script>

<div class="sticky">
   <a href="#" id="openChat">
	   <i class="fa fa-comment"></i>
   </a>
</div>

<div class="chat-box" id="chatWindow">
  <div class="chat-head">
    <div class="popup-head-left pull-left picBg">
        <span id="profileName" style="display:none;">Kalpesh</span>
        <div id="profileImage"></div>
        <span id="displayName">Kalpesh</span>
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
  <div class="chat-messages">
      <div class="chat-body">
		<!--body of the chat-->
      </div>
      
      <div class="chat-footer">
          <div class="image-upload">
              <label for="file-icon">
                <i class="fa fa-paperclip"></i>
              </label>

              <input id="file-icon" type="file" />
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