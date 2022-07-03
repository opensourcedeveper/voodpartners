
     <!-- Footer -->
     <section class="footerSec bg-prime">
        <div class="mxrcwidth">
            <img  src="<?php echo base_url() ?>/img/home-page/logo.png" alt="">
            <div class="row pb-4 pt-5">
                <div class="col-md-6 col-sm-12">
                    <div class="ftLeft">
        
                        <h3 class="clrfff">Subscribe</h4>
                        <p class="clrfff">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        <form id="contact" class="pt-3" method="post" action="/mailer.php">
                    
                            <input name="email" id = "email" type="email" placeholder="Email Address" title="Your e-mail address is required so I can reply" required maxlength="50" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" >
                            <input type="submit" name="submit" class="submit" value="Subscribe!" />
                         
                          </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ftRight">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">FAQs</a>
                            </li>
                            <li>
                                <a href="#">Terms and Conditions</a>
                            </li>
                        </ul>
                        <div class=" pt-5" style="text-align: right;">
                            <ul class="ftSocialIcon si-circle">
                                <li><a href="#" class="icoFb" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="icoLi" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="icoIg" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="icoYt" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#" class="icoSn" title="Snapchat"><i class="fa fa-snapchat"></i></a></li>
                            </ul>   
                        </div>
                        
                    </div>
                </div>
            </div>
            <hr class="bg-fff">
            <p class="pt-3 pb-3 clrfff text-center">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
        </div>
     </section>
     <!--  -->


    <!--  -->
    <script src="<?php echo base_url() ?>/web_assets/js/bootstrap.min.js"></script>
    <script  src="<?php echo base_url() ?>/web_assets/js/popper.min.js"></script>
    <script  src="<?php echo base_url() ?>/web_assets/js/slim.min.js"></script>
    <script src="<?php echo base_url() ?>/web_assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/web_assets/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
    <script  src="<?php echo base_url() ?>/web_assets/js/script.js"></script>


    <script type="text/javascript">
     $( document ).ready(function() {   
var base_url = $("input[name=base_url]").val();


});
    </script>
</body>
</html>