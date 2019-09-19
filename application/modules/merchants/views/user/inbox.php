<?php
$user_id = $this->session->userdata("user_login");
$user_id = $user_id['id'];
// echo "<pre>";
// print_r($conversations);
// exit();
?>
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content" style="padding: 4px 0 90px;"> 
            <!-- HEADLINE -->
            <div class="headline buttons two primary col-sm-12 latest-item-main" style="margin-bottom: 4px;">
                <h4>Your Inbox (<?=count($conversations)?>)</h4>
                <?php if ($user_roles == "is_admin") { ?>
                <form method="post" action="<?=base_url()?>inbox">
                    <select style="width: fit-content;margin-top: 16px;margin-left: 50px;" name="user_convo">
                        <option>Select User</option>
                        <?php foreach ($all_users as $key => $value) { ?>
                        <option value="<?=$value['user_id']?>" <?=(isset($selected_id) && $selected_id == $value['user_id']) ? 'selected' : '' ?> ><?=$value['first_name'].' '.$value['last_name']?></option>
                        <?php } ?>
                    </select>
                <button type="submit"> Get Convo</button>    
                </form>
                
                <?php } ?>
				<a href="" class="button mid-short secondary open-new-message" data-toggle="modal" data-target="#myModal">New Message</a>    
				<a href="#" class="button mid-short primary">Delete Selected</a>
            </div>
            <!-- /HEADLINE -->
            <input id="myInput" type="text" placeholder="Search..">  
            <!-- INBOX MESSAGES PREVIEW -->
            <div class="inbox-messages-preview inbox-cs">
                <!-- INBOX MESSAGES -->
                <div class="col-xs-12 col-lg-5 no-padding f-left">
                    <div class="inbox-messages " id="myDIV">
                        <?php foreach (array_reverse($conversations) as $key => $value) {
                            
                          ?>

                        <!-- INBOX MESSAGE -->
                        <div class="inbox-message v2" style="height: auto; overflow: auto;">
                            <div class="aa">
                                <div class="inbox-message-actions">
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="msg_<?php //echo $value['id']?>" name="msg1[]">
                                <label for="msg_<?php //echo $value['id']?>" class="label-check">
                                    <span class="checkbox primary"><span></span></span>
                                </label>
                                <!-- /CHECKBOX -->

                                </div>
                                
                                <div class="inbox-message-author">
                                    <figure class="user-avatar">
                                        <?php if (isset($value['image']) && !empty($value['image'])) { ?>
                                            <img src="<?=$base_resources_url_auction?><?=$value['image']?>" class="img-circle" alt="Cinque Terre" width="104" height="43"> 
                                          
                                       <?php  } else {?>
                                            <img src="<?base_url()?>assets_u/images/avatars/avatar_06.jpg" alt="user-img">
                                       <?php } ?>
                                        
                                    </figure>
                                   <p class="text-header">
                                       
                                        
                                    </p>                                
                                </div>
                                 <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo_<?=$value['auction_id']?>" style="width: 180px;margin-bottom: 20px;background-color: white;color: black;text-align: left"><?=$value['name']?></button>
                                 <div class="inbox-message-date">
                                    <p></p>
                                </div>
                            </div>
                            
                              <div id="demo_<?=$value['auction_id']?>" class="collapse">
                               <?php foreach ($value['result'] as $key => $value) { ?>
                                <div class="chats t_edit_cont" data-id="<?=$value['auction_id']?>">    
                                    <a href="javascript:get_messages(<?=$value['id']?>);">
                                        <div class="inbox-message-content" style="margin-left: 15px;border-bottom: 1px solid;">
                                            <p class="text-header"><?php if ($value['sent_by_user'] == $user_id) { ?>
                                                <?=$value['auctioneer_name']?>
                                            <?php } else {?>
                                                <?=$value['user_name']?>
                                            <?php } ?></p>
                                        </div>
                                        <p style="font-size: 0.65em;float: right;margin: 5px;margin-top: 15px;"><?php echo date("M d,Y - h:mA ", strtotime($value['created_at']));?></p>
                                    </a>
                                </div>
                             <?php } ?>
                            </div>                           
                        </div>
                        <!-- INBOX MESSAGE -->
                    <?php } ?>


                    </div>
                </div>
                <!-- /INBOX MESSAGES -->

                <!-- INBOX MESSAGE PREVIEW -->
                <div class="col-xs-12 col-lg-7 no-padding f-left">
                    <div class="inbox-message-preview" style="
    min-width: 100%;
">
                        <div class="inbox-message-preview-header">
                            <p class="text-header">
                                Product Question
                                <img src="<?=base_url();?>assets_u/images/dashboard/star-filled.png" alt="star-icon">
                            </p>
                            <a href="#" class="report">Report this Conversation</a>
                        </div>

                        <div class="inbox-message-preview-body info_messages">
                            

                        </div>

                        <div class="inbox-reply-form">
                            
                                <input type="text" id="reply" name="message_box" placeholder="Write your message here...">
                                <button type="submit" class="button secondary" message_type="" id="reply_button" convo_id="" style="width: 92px;margin-right: 82px;">Send Message</button>

                                <button class="button secondary" id="reply_button_attachment" convo_id="" style="width: 79px;"><label class="btn btn-default" style="height: 30px;color: white;background: #37c9ff;font-family: 'Titillium Web', sans-serif;font-size: 0.99em;font-weight: 700;">Attachment<input id="fileupload" type="file" name="files" data-url="message_attach/" multiple hidden style="display: none;"> </label></button>
                            
                        </div>
                    </div>
                </div>
                <!-- /INBOX MESSAGE PREVIEW -->
            </div>
            <!-- /INBOX MESSAGES PREVIEW -->
        </div>
        <!-- DASHBOARD CONTENT -->
        <!-- FORM POPUP -->
    <div class="form-popup new-message modal" id="myModal">
        <!-- FORM POPUP CONTENT -->
        <div class="inner-wrapper-modal">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="form-popup-content modal-dialog">
                <div class="modal-header">
                    <h4 class="popup-title">Write a New Message</h4>
                    
                </div>
                <!-- LINE SEPARATOR -->
                <hr class="line-separator">
                <!-- /LINE SEPARATOR -->
                <form class="new-message-form">
                    <!-- INPUT CONTAINER -->
                    <div class="input-container field-add col-sm-12 no-padding">
                        <label for="mailto" class="rl-label b-label required">To:</label>
                        <label for="mailto" class="select-block">
                                <select name="mailto" id="mailto">
                                    <option value="0">Select from the authors you follow...</option>
                                    <option value="1">Vynil Brush</option>
                                    <option value="2">Jenny_Block</option>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                        </label>
                        <div class="button dark-light add-field">
                            <!-- SVG PLUS -->
                            <svg class="svg-plus">
                                <use xlink:href="#svg-plus"></use>
                            </svg>
                            <!-- /SVG PLUS -->
                        </div>
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container col-sm-12 no-padding">
                        <label for="subject" class="rl-label b-label">Subject:</label>
                        <input type="text" id="subject" name="subject" placeholder="Enter your subject here...">
                    </div>
                    <!-- INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container col-sm-12 no-padding">
                        <label for="message" class="rl-label b-label required">Your Message:</label>
                        <textarea id="message" name="message" placeholder="Write your message here..."></textarea>
                    </div>
                    <!-- INPUT CONTAINER -->
                    <div class="col-sm-12 no-padding">
                        <button class="button mid dark">Send <span class="primary">Message</span></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /FORM POPUP CONTENT -->
        <div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>
    </div>
    <!-- /FORM POPUP -->
   