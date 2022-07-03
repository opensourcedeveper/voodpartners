<?php $this->load->view('templates/web_header') ?>
<?php
$a = mt_rand(0, 9);
$b = mt_rand(0, 9);
$c = $a + $b;
?>
<div class="container">
    <?php if ($this->session->flashdata('msg')): ?>
        <br/>
        <div class="alert alert-warning">
            <strong>Info!</strong> <?php echo $this->session->flashdata('msg') ?>
        </div>
    <?php endif ?>
    <div class="row mt-5 min-mr">
        <form method="post">
            <div class="col-md-12 col-xs-12 mb-10">
                <h4 class="licencetitle mb-20">User Registration</h4> 
            </div>	
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="First Name" id="f_name" name="f_name" class="" required>
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="Last Name" id="l_name" name="l_name" class="" required>
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="form-group  inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="Contact Number" id="phone" name="phone" class="" required>
                    <i class="fa fa-phone" aria-hidden="true"></i> 
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <textarea  value="" placeholder="Address" class="byNowTextArea" id="address" name="address" rows="4" style="width: 100%;"></textarea>
                    <i class="fa fa-address-card byNowTextAreaIcon" aria-hidden="true"></i> 
                </div>
                <div class="form-group  inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="Zip Code" id="zip_code" name="zip_code" class="">
                    <i class="fa fa-pencil" aria-hidden="true"></i> 
                </div>   
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="Country" id="country" name="country" class="">
                    <i class="fa fa-pencil" aria-hidden="true"></i> 
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group  inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="Title / Designation" id="job_title" name="job_title" class="">
                    <i class="fa fa-briefcase envelopIcon" aria-hidden="true"></i> 
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="Company" id="company" name="company" class="">
                    <i class="fa fa-building-o" aria-hidden="true"></i> 
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="text" value="<?php echo set_value('email'); ?>" placeholder="Email" id="email" name="email" class="" >
                    <i class="fa fa-envelope envelopIcon" aria-hidden="true"></i> 
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="password" value="" placeholder="Password (Min length 6 Characters)" id="password" name="password" class="" >
                    <i class="fa fa-lock envelopIcon" aria-hidden="true"></i> 
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="password" value="" placeholder="Re Enter Password" id="confirmpassword" name="confirmpassword" class="" >
                    <i class="fa fa-lock envelopIcon" aria-hidden="true"></i> 
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <strong>  <?= $a ?> + <?= $b ?> =</strong>
                        </span>
                        <input type="text" class="" id="security" placeholder="Security Code" required>
                    </div>
                </div>                                         	
            </div> 
            <div class="col-md-12 col-xs-12 text-center">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="terms">
                        <strong> I agree to have read and accept the Terms and Conditions  And <a href="http://strabayassociates.com/privacypolicy" target="_blank"> privacy</a> of strabayassociates.com</strong>
                    </label>
                </div>
            </div>

            <div class="col-md-12 col-xs-12 mt-20 text-center">
                <input type="submit" id="submit" class="btn btn-info add_user" value="Submit" disabled>
            </div>

        </form>
    </div>
</div>
<?php $this->load->view('templates/web_footer') ?>
<script type="text/javascript">
    $(document).ready(function () {
        var res = <?= $c ?>;
        var v = 0;
        var checked_status = 0;
        $("#security").focusout(function () {
            v = this.value;
        });
        $("#terms").click(function () {
            checked_status = this.checked;

            if (checked_status == true && v == res)
            {
                $("#submit").removeAttr("disabled");
            } else
            {
                $("#submit").attr("disabled", "disabled");
            }
        });
        $("#security").keyup(function ()
        {
            v = this.value;

            if (v == res && checked_status == true)
            {
                $("#submit").removeAttr("disabled");
            } else
            {
                $("#submit").attr("disabled", "disabled");
            }
        });
    });


</script>