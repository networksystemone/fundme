            <!--All Content Start-->
            <div class="content-wrapper">
            	<div class="bodypanel">
                    <div class="bodypanel-left">
                        <img id="cover-image" src="<?php echo site_url('assets/images/web-cover.png'); ?>">

                        <!--Mission Start-->
                        <section class="stripe" id="a-story">
                        	<div class="homepanel-title-area">
                                <h1><span class="homepanel-title">A Story</span></h1>
                            </div>
                            <div class="homepanel-content">
                                <?php echo $this->load->view('fundme/a_story'); ?>
                            </div>
                        </section>
                        <!--Mission End-->

                        <!--Project Fundme Start-->
                        <section class="stripe" id="project-fundme">
                            <div class="homepanel-title-area">
                                <h1><span class="homepanel-title">Project Fundme</span></h1>
                            </div>
                            <div class="homepanel-content">
                                <?php echo $this->load->view('fundme/project_fundme'); ?>
                            </div>
                        </section>
                        <!--Project Fundme End-->

                        <!--Study Plan Start-->
                        <section class="stripe" id="study-plan">
                            <div class="homepanel-title-area">
                                <h1><span class="homepanel-title">Study Plan</span></h1>
                            </div>
                            <div class="homepanel-content">
                                <?php echo $this->load->view('fundme/study_plan'); ?>
                            </div>
                        </section>
                        <!--Study Plan End-->

                        <!--Budget Operating Start-->
                        <section class="stripe" id="budget-operating">
                            <div class="homepanel-title-area">
                                <h1><span class="homepanel-title">Budget Operating</span></h1>
                            </div>
                            <div class="homepanel-content">
                                <?php $this->load->view('fundme/budget_operating'); ?>
                            </div>
                        </section>
                        <!--Budget Operating End-->

                        <!--Thank You Start-->
                        <section class="stripe" id="thank-you">
                            <div class="homepanel-title-area">
                                <h1><span class="homepanel-title">Thank You</span></h1>
                            </div>
                            <div class="homepanel-content">
                                <?php $this->load->view('fundme/thank_you'); ?>
                            </div>
                        </section>
                        <!--Thank You End-->

                        <!--Comment Start-->
                        <section class="stripe comments">
                            <!--<div id="disqus_thread"></div>
                            <script type="text/javascript">
                                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                var disqus_shortname = 'projectfundme'; // required: replace example with your forum shortname

                                /* * * DON'T EDIT BELOW THIS LINE * * */
                                (function() {
                                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                })();
                            </script>-->
                            <div class="fb-comments" data-href="http://fundme.phatpham.com" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
                        </section>
                        <!--Comment End-->
                    </div>

                    <div class="bodypanel-right">
                        <!--Donate Start-->
                        <div class="home-block">
                            <div class="home-block-content">
                                <h1><?php echo $num_donations; ?></h1>
                                <p>people</p>
                                <h1>$<?php echo $raised; ?></h1>
                                <p>donated of $<?php echo $goal; ?> goal</p>
                                <h1><?php echo $days_to_go; ?></h1>
                                <p>days to go</p>
                                <a href="<?php echo $my_gofundme_url; ?>" class="button">Donate on GoFundMe</a>
                                <p>I'm Phat Pham. I live in Ho Chi Minh City, Vietnam. <b>Project Fundme</b> is a fundraising campaign for my expenses of MSCS prog. in the US.</p>
                                <div class="button-group">
                                    <a href="https://www.facebook.com/sharer/sharer.php?app_id=1429685730646033&u=http://fundme.phatpham.com/" target="_blank" class="button blue-button">
                                        <i class="fa fa-facebook-square"></i> Share
                                    </a>
                                    <a href="<?php echo site_url('contact_me'); ?>" class="button">
                                        <i class="fa fa-envelope"></i> Contact
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--Donate End-->
                        <div class="post-block">
                            <div class="post-block-title">
                                Alternative Methods
                            </div>
                            <div class="post-block-content">
                                <button type="button" class="button" id="paypal-button" style="margin-top:0;">
                                    Donate via Paypal
                                </button>
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display:none;">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                                    ">
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" id="origin-paypal-button">
                                </form>
                                <br>
                                For more convenient, donations from Vietnam could transfer directly to my bank account with the following information:
                                <ul>
                                    <li>Bank: <b>bank_name</b></li>
                                    <li>Branch: <b>bank_branch</b></li>
                                    <li>Number: <b>acc_number</b></li>
                                    <li>Name: <b>full_name</b></li>
                                </ul>
                            </div>
                        </div>

                        <div class="post-block">
                            <div class="post-block-title">
                                Recent Updates
                            </div>
                            <div class="post-block-content">
                                <div id="posts-list">
                                    <?php if ($num_posts == 0) { ?>
                                    <div class="post">
                                        There's no post.
                                    </div>
                                    <?php
                                    } else {
                                        foreach ($posts_list as $post) { ?>
                                        <div class="post">
                                            <strong>
                                                <i class="fa fa-clock-o"></i>
                                                <?php echo date('H:i:s - m/d/Y', strtotime($post['date_created'])); ?>
                                            </strong>
                                            <div class="post-content">
                                                <?php echo auto_link(nl2br($post['content']), 'both', true); ?>
                                            </div>
                                        </div>
                                        <?php }
                                    } ?>
                                </div>
                                <?php if ($total_posts > 15) { ?>
                                    <button id="load-more" class="button" offset="<?php echo $num_posts; ?>">Load more</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--All Content End-->

            <script type="text/javascript">
                $(document).ready(function(){
                    $("#paypal-button").click(function(){
                        $("#origin-paypal-button").trigger("click");
                    });

                    $('#load-more').click(function(){
                        var offset = $(this).attr('offset');

                        $.post("<?php echo site_url('fundme/load_more_post'); ?>", {offset: offset}, function(data, status){
                            if(status == "error") {
                                alert("Error happens. Please try again.");
                            } else {
                                var result = JSON.parse(data);
                                if (result.code == 1) {
                                    //Remove button if no more post
                                    if (parseInt(offset) + parseInt(result.num_posts) >= parseInt(result.total_posts)) {
                                        $('#load-more').remove();
                                    }
                                    //Else update offset button
                                    else {
                                        $('#load-more').attr('offset', parseInt(offset) + parseInt(result.num_posts));
                                    }

                                    //append posts
                                    $.each(result.posts_list, function(i, item) {
                                        $('#posts-list').append('<div class="post"><strong><i class="fa fa-clock-o"></i> ' + item.datetime +
                                                '</strong><div class="post-content">' + item.post_content +
                                                '</div></div>');
                                    });
                                } else {
                                    alert(result.info);
                                }
                            }
                        });
                    });
                });
            </script>