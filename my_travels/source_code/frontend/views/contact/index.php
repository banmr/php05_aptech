<?php require('frontend/views/common/header.php'); ?>

	<div class="page-top" id="templatemo_events">
    </div> <!-- /.page-header -->
    <div class="middle-content">
		<div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-6 map-wrapper">
                        <h3 class="widget-title">Our Location</h3>
                        <div class="map-holder">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7668.149391365058!2d108.18437569999998!3d16.061613200000007!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1486658392507" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="contact-infos">
                            <ul>
                                <li>987 Nay Yar Street, Analog Estate</li>
                                <li>Yangon 10440, Myanmar</li>
                                <li>Tel: 090-090-0880</li>
                                <li>Email: <a href="mailto:info@company.com">info@company.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="contact-form">
                            <form name="contactform" id="contactform" action="index.php?controller=contact" method="post">
                                <p>
                                    <input name="name" type="text" id="name" placeholder="Your Name">
                                    <?php if(isset($errors) && in_array('errors name', $errors) ) {?>
                                        <span class="help-inline"><strong>Error!</strong> Please fill in the name.</span>
                                    <?php } ?>
                                </p>
                                <p>
                                    <input name="email" type="text" id="email" placeholder="Your Email"> 
                                    <?php if(isset($errors) && in_array('errors email', $errors) ) {?>
                                        <span class="help-inline"><strong>Error!</strong> Please enter a valid email format.</span>
                                    <?php } ?>
                                </p>
                                <p>
                                    <input name="subject" type="text" id="subject" placeholder="Subject"> 
                                </p>
                                <p>
                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                     <?php if(isset($errors) && in_array('errors message', $errors) ) {?>
                                        <span class="help-inline"><strong>Error!</strong> Please fill in the message.</span>
                                    <?php } ?>    
                                </p>
                                <?php if(!empty($messages)) { echo $messages; } ?>
                                <input type="submit" class="mainBtn" id="submit" value="Send Message">
                            </form>
                        </div> <!-- /.contact-form -->
                    </div>
                </div>
            </div>
	</div>
<?php require('frontend/views/common/footer.php'); ?>