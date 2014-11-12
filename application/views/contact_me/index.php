            <!--All Content Start-->
            <div class="content-wrapper">
                
                <!--Body Content Start-->
                <section class="stripe">
                	
                    <!--Contact Area-->
                    <div class="contact-area">
                    	
                        <!--Send Message-->
                        <div class="send-message">
                        	<div class="section-title-area">
                                <h2><span class="section-title">Send a message</span></h2>
                            </div>
                            <div class="comment-fieldbox">
                            	<form id="form_contact">
                                    <input id="name" class="input-name" type="text" name="name" placeholder="Your name *" required maxlength="256" /><br>
                                    <input id="email" class="input-email" type="text" name="email" placeholder="Your email *" required maxlength="80" /><br>
                                    <input id="subject" class="input-subject" type="text" name="subject" placeholder="Subject *" required maxlength="256" />
                                    <textarea id="message" class="input-textarea" name="message" placeholder="Your message *" required></textarea>
                                    <div class="comment-active">
                                        <span>All fields are mandatory.</span>
                                        <input type="button" id="email_submit" class="submit-button" value="Send Message"/>
                                    </div>
                                    <div id="reply_message" style="text-align: right;"></div>
                                </form>
                            </div>
                        </div>
                        <!--Send Message End-->
                        
                        <!--Contact Info-->
                        <div class="contact-info">
                            <div class="section-title-area">
                                <h2><span class="section-title">Contact Information</span></h2>
                            </div>
                            <ul class="contact-status fa-ul">
                                <li>
                                    <i class="fa-li fa fa-home"></i>xxx
                                </li>
                                <li>
                                    <i class="fa-li fa fa-tablet"></i>(+xx) xxx-xxxx-xxx
                                </li>
                                <li>
                                    <i class="fa-li fa fa-envelope"></i>xxx@gmail.com
                                </li>
                            </ul>
                        </di>
                        <!--Contact Info End-->
                    </div>
                    
                </section>
                <!--Body Content End-->
                
            </div>
            <!--All Content End-->

<script type="text/javascript">
    $(document).ready(function(){
            // EMAIL SUBMIT SETTING
    $("#email_submit").click(function() {
                                    
        $('#reply_message').removeClass();
        $('#reply_message').html('');
        var regEx = "";
                                
        // validate Name                
        var name = $("input#name").val();
        if (name == "" || name == "Name") { 
            $("input#name").val(''); 
            $("input#name").focus();  
            return false;  
        }
                
        // validate Email                         
        var email = $("input#email").val();  
        regEx=/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;                                           
        if (email == "" || email == "Email") { 
            $("input#email").val(''); 
            $("input#email").focus();  
            return false;  
        }  
                
        // validate Subject             
        var subject = $("input#subject").val();
        if (subject == "" || subject == "subject") { 
            $("input#subject").val(''); 
            $("input#subject").focus();  
            return false;  
        }
                
        // validate Message         
        var message = $("textarea#message").val(); 
        if (message == "" || message == "message..." || message.length < 2) { 
            $("textarea#message").val(''); 
            $("textarea#message").focus();  
            return false;  
        }  
                                    
        var dataString = 'name='+ $("input#name").val() + '&email=' + $("input#email").val() + '&subject='+ $("input#subject").val() + '&message=' + $("textarea#message").val();                                   
        $('#reply_message').val('');
        $('#email_submit').val('Sending...');
        $('#email_submit').attr('disabled', '');
                
            // Send form data to mailer
            $.ajax({
                type: "POST",
                url: "contact_me/send_email",
                data: dataString,
                success: function() {
                    $('#email_submit').val('Send Message');
                    $('#email_submit').removeAttr('disabled');
                    $('#reply_message').html("Mail sent successfully.")
                    .hide()
                    .fadeIn(1500);
                    $('#form_contact')[0].reset();
                },
                error: function() {
                    $('#email_submit').val('Send Message');
                    $('#email_submit').removeAttr('disabled');
                    $('#reply_message').html("Mail sent fail. Please try again later.")
                }
            });
            return false;
        });
    });
</script>