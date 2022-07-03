<?php $this->load->view('templates/web_header') ?>
<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="" style="font-size: 16px; color: #246A9F;line-height: 1.2;">
                    <strong><a href="<?= base_url() ?>report/<?= $Record['id'] . "/" . str_replace(' ', '-', $Record['meta_keyword']) ?>"><?= $Record['title'] ?></a></strong>
                </h1>
            </div>

            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-sm-4 head-area mb-20 mt-4 mob-hide">
                        <h4 class="text-center">Our Clients</h4>
                        <div class="head-bgareas">
                            <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/iqvia.png" alt="iqvia" class="img-responsive img-custom">
                            <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/3m.png" class="img-responsive img-custom" alt="3M">
                            <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/bcg.png" class="img-responsive img-custom" alt="BCG">
                            <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/saint-gobain.png" class="img-responsive img-custom" alt="saint-gobain">
                            <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/McKinsey.png" class="img-responsive img-custom" alt="McKinsey">
                            <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/thyssenkrupp-vector.png" class="img-responsive img-custom" alt="Thyssenkrupp">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 bg-grey form-area mt-4">
                        <div class="col-md-12 col-sm-12 col-xs-12 px-4">
                            <p class="mt-4 font-16 font-weight-bold clr-grey">
                                We value your investment and offer free customization with every report to fulfil your exact research needs.
                            </p>
                            <form method="POST" class="req-formnew">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 input-container" >      
                                    <input type="hidden" name="report" value="<?= $Record['title'] ?>">
                                    <i class="fa fa-user form-icon"></i>
                                    <input type="text" value="" placeholder="Type Your Name Here" name="name" class="custom-form" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                    <div class="row">
                                        <div class="col-md-6 input-container mt-4">
                                            <i class="fa fa-envelope form-icon"></i>
                                            <input type="email" value="" placeholder="Business Email Id" name="email" class="custom-form" required>
                                        </div>
                                        <div class="col-md-6 input-container mt-4">
                                            <i class="fa fa-phone form-icon"></i>
                                            <input type="text" value="" placeholder="Phone Number" name="contact" id="contact" class="custom-form" required>
                                            <p class="error" id="error" style="color: red;"></p>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 input-container" >  
                                    <i class="fa fa-building form-icon"></i>
                                    <input type="text" value="" placeholder="Company" name="company" class="custom-form" id="company" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 input-container">      
                                    <i class="fa fa-comment form-icon"></i>
                                    <textarea value="" placeholder="Share With us any information that might help us better respond to your request." class="custom-form" name="message" rows="3"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4" > 
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12 col-xs-12 mt-4">
                                            <div id="captcha" class="captcha"></div>
                                        </div>
                                        <div class="col-md-1 col-sm-12 col-xs-12 mt-4">
                                            <div>
                                                <a href="javascript:createCaptcha()">
                                                    <i class="fa fa-refresh mt-3 font-22" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mt-4 input-container">
                                            <i class="fa fa-lock form-icon"></i>
                                            <input type="text" class="custom-form" id="cpatchaTextBox" placeholder="Please enter the numbers displayed" autocomplete="off" required>
                                        </div>
                                    </div>     
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                                    <p class="mt-4">Your personal details are safe with us. <a href="https://www.strabayassociates.com/privacypolicy" target="_blank"> privacy</a></p>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 text-right mb-10">
                                    <input type="submit" id="submit" class="btn btn-info" value="Submit" disabled>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 mt-4">
                <div class="col-sm-12 head-area mb-20">
                    <h4 class="text-center">Choose License Type</h4>
                    <div class="head-bgareas">
                        <form action="<?= base_url() . 'buyNow/' . $Record['id'] ?>" method="get">
                            <div class="radio-area mt-3">
                                <?php if ($Record['single_price'] != NULL): ?>
                                    <label class="radio-label">
                                        <div class="tooltip1"> 
                                            <i class="fa fa-question-circle" style="float:right;font-size: 18px;"></i>
                                            <span class="tooltiptext1">
                                                <p class="px-3"><b style="color: #06d4d2">Single User - </b>This is a single user license, allowing one specific user access to the product.</p>
                                            </span>
                                        </div>
                                        <b>Single User - $ <?= $Record['single_price'] ?></b>
                                        <input type="radio" checked="checked" name="price" value="single_price" >
                                        <span class="checkmark"></span>
                                    </label>
                                <?php endif ?>

                                <?php if ($Record['multi_price'] != NULL): ?>
                                    <label class="radio-label">
                                        <div class="tooltip1"> 
                                            <i class="fa fa-question-circle" style="float:right;font-size: 18px;"></i>
                                            <span class="tooltiptext1">
                                                <p class="px-3"><b style="color: #06d4d2">Multi User - </b>This is a 1-5 user licence, allowing up to five users have access to the product.</p>
                                            </span>
                                        </div>

                                        <b>Multi User - $<?= $Record['multi_price'] ?></b>
                                        <input type="radio" name="price" value="multi_price">
                                        <span class="checkmark"></span>
                                    </label>


                                <?php endif ?>

                                <?php if ($Record['ent_price'] != NULL): ?>
                                    <label class="radio-label">
                                        <div class="tooltip1"> 
                                            <i class="fa fa-question-circle" style="float:right;font-size: 18px;"></i>
                                            <span class="tooltiptext1">
                                                <p class="px-3"><b style="color: #06d4d2">Enterprise User - </b>This is an enterprise license, allowing all employees within your organisation access to the product. The report will be emailed to you.</p>
                                            </span>
                                        </div>
                                        <b>Enterprise User - $<?= $Record['ent_price'] ?></b>
                                        <input type="radio" name="price" value="ent_price">
                                        <span class="checkmark"></span>
                                    </label>
                                <?php endif ?>
                            </div>

                            <div class="text-center" style="margin: 0px; padding: 0px;">

                                <button type="submit" class="btn btn-submit" value="Buy Now">
                                    Buy Now 
                                    <i class="fa fa-shopping-cart" style="margin-left:10px ; color: #FFF;"></i>
                                </button>
                                <a href="<?= base_url() ?>request-sample/<?= $Record['id'] ?>" class="btn btn-before-buy">
                                    REQUEST SAMPLE 
                                    <i class="fa fa-long-arrow-right "></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-12 head-area mb-20 mt-4">
                    <h4 class="text-center">Key Topics Covered</h4>
                    <div class="head-bgareas key-topic1">
                        <ul>
                            <li>Market Factors (Including Drivers and Restraint)</li>
                            <li>Market Trends</li>
                            <li>Market Estimates and Forcasts</li>
                            <li>Competitive Analysis</li>
                            <li>Future Market Opportunities</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 head-area mt-4 desktop-hide">
                    <h4 class="text-center">Our Clients</h4>
                    <div class="head-bgareas">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/iqvia.png" alt="iqvia" class="img-responsive">
                            </div>
                            <div class="col-md-6 mt-4">
                                <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/3m.png" class="img-responsive" alt="3M">
                            </div>
                            <div class="col-md-6 mt-4">
                                <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/bcg.png" class="img-responsive" alt="BCG">
                            </div>
                            <div class="col-md-6 mt-4">
                                <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/saint-gobain.png" class="img-responsive" alt="saint-gobain">
                            </div>
                            <div class="col-md-6 mt-4">
                                <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/McKinsey.png" class="img-responsive" alt="McKinsey">
                            </div>
                            <div class="col-md-6 mt-4">
                                <img  src="<?php echo base_url() . 'web_assets/' ?>images/clients/client-logo/thyssenkrupp-vector.png" class="img-responsive" alt="Thyssenkrupp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('templates/web_footer') ?>
    <script type="text/javascript">
        window.onload = (event) => {
            createCaptcha();
        };

        var code;
        var c_len;
        function createCaptcha() {            
            $("#submit").attr("disabled", "disabled");
            document.getElementById('captcha').innerHTML = "";
            $('input[id=cpatchaTextBox').val('');
            var charsArray =
            "0123456789";
            var lengthOtp = 4;
            var captcha = [];
            for (var i = 0; i < lengthOtp; i++) {
                var index = Math.floor(Math.random() * charsArray.length + 1);
                if (captcha.indexOf(charsArray[index]) == -1)
                    captcha.push(charsArray[index]);
                else i--;
            }
            captcha = captcha.filter(function(e){return e}); 
            c_len = captcha.length;
            var canv = document.createElement("canvas");
            canv.id = "captcha";
            canv.class = "captcha";
            canv.width = 100;
            canv.height = 40;
            var ctx = canv.getContext("2d");
            ctx.font = "italic 22px ubuntu";
            ctx.strokeText(captcha.join(""), 0, 25);        
            code = captcha.join("");
            document.getElementById("captcha").appendChild(canv);
        }
        function validateCaptcha() {
            event.preventDefault();
            debugger
            if (document.getElementById("cpatchaTextBox").value == code) {
                $("#submit").removeAttr("disabled");
            }else{
                $("#submit").attr("disabled", "disabled");
                alert("Invalid Captcha. try Again");
                $('input[id=cpatchaTextBox').val('');
                createCaptcha();

            }
        }

        $("#cpatchaTextBox").keyup(function (){
            if( this.value.length == c_len ){
                validateCaptcha();
            }else{
                return;
            }
        });




    </script>

    <script type="text/javascript">
        $(document).ready(function ()
        {
            $("#contact").keyup(function (){
                inputtxt = this.value;
                var phoneno = /^\+?[0-9]*$/;
                if (inputtxt.match(phoneno))
                {
                    $("#error").html("");
                    return true;
                } else
                {
                    $("#error").html("Not a valid Phone Number");
                    $("#submit").attr("disabled", "disabled");
                    return false;
                }

            });
        });

    </script>


