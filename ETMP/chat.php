<!-- Author: Chin Jing Jie -->
<script>
    //open and close chat window
    $(function(){
      $("#openChat").click(function () {
        $('#chatWindow').addClass('chat-box-on');
      });

      $("#closeChat").click(function () {
        $('#chatWindow').removeClass('chat-box-on');
      });
    })
    
    //generate profile pic with initial
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