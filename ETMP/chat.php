<!-- Author: Chin Jing Jie -->
<script>
    $(function(){
      $("#openChat").click(function () {
        $('#chatWindow').addClass('popup-box-on');
      });

      $("#closeWindow").click(function () {
        $('#chatWindow').removeClass('popup-box-on');
      });
    })
</script>

<div class="sticky">
   <a href="#" id="openChat">
	   <i class="fa fa-comment"></i>
   </a>
</div>

<div class="popup-box" id="chatWindow">
  <div class="popup-head">
    <div class="popup-head-left pull-left">
      <p>
        Icon + ReceiverName</p>
    </div>
	<div class="popup-head-right pull-right">
      <button data-widget="remove" id="closeWindow" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
    </div>
  </div>
  <div class="popup-messages">
			<div class="direct-chat-messages">
				<div class="chat-box-single-line">
						<abbr class="timestamp">October 8th, 2015</abbr>
				</div>
<!-- Message. Default to the left -->
        <div class="direct-chat-msg doted-border">
           <div class="direct-chat-info clearfix">
              <span class="direct-chat-name pull-left">Osahan</span>
           </div>
<!-- /.direct-chat-info -->
          <span>Icon</span><!-- /.direct-chat-img -->
           <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
            </div>
					  <div class="direct-chat-info clearfix">
            <span class="direct-chat-timestamp pull-right">3.36 PM</span>
     </div>
<!-- /.direct-chat-text -->
   </div>
<!-- /.direct-chat-msg -->
			</div>
			<div class="popup-messages-footer">
			<textarea id="status_message" placeholder="Type a message..." rows="10" cols="20" name="message"></textarea>
         <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
			</div>
	  </div>