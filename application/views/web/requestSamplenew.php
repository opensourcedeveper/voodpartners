<?php $this->load->view('templates/web_header') ?>
<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement":
        [
        {
            "@type": "ListItem",
            "position": 1,
            "item":
            {
                "type":"Website",
                "@id": "/",
                "name": "Home"
            }
        },
        {
            "@type": "ListItem",
            "position": 2,
            "item":
            {
                "type":"WebPage",
                "@id": "/request-sample/<?= strtolower($Record['slug']) ?>",
                "name": "<?= $Record['title'] ?>"
            }
        }]
    }
</script>

<!-- Banner -->
<div class="aboutBannerList">
    <div class="mxrcwidth">
        <div class="row">
            <div class="bannerText text-center">
                <!-- <img src="./img/home-page/Frame-3.png" alt=""> -->
                <h1 class="heading pt-3 f30">Lorem ipsum dolor sit consectetur adipisicing.</h1>
                <!-- <p class="pt-4">Get Inpired by These Feedback!</p> -->
            </div>
        </div>
    </div>

</div>
<!--  -->



     <!-- Our Solutions -->
   <section class="ourSolutions ourSolutionsBg" > 
            <div class="mxrcwidth pt-5 pb-5">
                <div class="row">
                    <div class="col-md-6 col-sm-12 ">
                        <div class="pb-5">
                            <h2 class="ffRegular prime-color f20"><a href="<?= base_url() ?>report/<?=  strtolower( $Record['slug']) ?>"><?= $Record['title'] ?></a>
                            </h2> 
                        </div>
                        <div>
                            <img src="<?= base_url() ?>web_assets/img/banner1.png" alt="" class="w-100" height="500px">
                        </div>
                    </div> 

                      <div class="col-md-6 col-sm-12">
                        <div class="contactForm">
                            <h1 class="text-center">Sample Request</h1>
                            <p class="mt-4 font-16 font-weight-bold clr-grey">
                                We value your investment and offer free customization with every report to fulfil your exact research needs.
                            </p>
                            <div>
                              <form method="POST" class="req-formnew">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 input-container" >      
                                    <input type="hidden" name="report" value="<?= $Record['title'] ?>">
                                    <i class="fa fa-user form-icon"></i>
                                    <input type="text" value="" placeholder="Type Your Name Here" name="name" class="form-control" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                    <div class="row">
                                        <div class="col-md-6 input-container mt-4">
                                            <i class="fa fa-envelope form-icon"></i>
                                            <input type="email" value="" placeholder="Business Email Id" name="email" class="form-control" required>
                                        </div>
                                        <div class="col-md-6 input-container mt-4">
                                            <i class="fa fa-phone form-icon"></i>
                                            <input type="text" value="" placeholder="Phone Number" name="contact" id="contact" class="form-control" required>
                                            <p class="error" id="error" style="color: red;"></p>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 input-container" >  
                                    <i class="fa fa-building form-icon"></i>
                                    <input type="text" value="" placeholder="Company" name="company" class="form-control" id="company" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4 input-container">      
                                    <i class="fa fa-comment form-icon"></i>
                                    <textarea value="" placeholder="Share With us any information that might help us better respond to your request." class="form-control" name="message" rows="3"></textarea>
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
                                            <input type="text" class="form-control" id="cpatchaTextBox" placeholder="Please enter the numbers displayed" autocomplete="off" required>
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


