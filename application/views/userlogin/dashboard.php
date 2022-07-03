<?php $this->load->view('templates/web_header') ?>
<div class="container">
    <br>
    <?php if ($this->session->flashdata('msg')): ?>
        <div class="alert alert-info">
            <strong>Info!</strong> <?php echo $this->session->flashdata('msg') ?>
        </div>
    <?php endif ?>
    <ul class="nav nav-tabs" style="border-bottom:1px solid #38a09f; ">
        <li class="active"><a data-toggle="tab" href="#home" style="padding: 10px 26px;">Profile</a></li>
        <li><a data-toggle="tab" href="#menu1" style="padding: 10px 26px;">Change Password</a></li>
        <li><a data-toggle="tab" href="#menu2" style="padding: 10px 26px;">Reports</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <div class="row mt-5 min-mr">
                <form method="post" action="<?= base_url() ?>user/edit-profile">
                    <div class="col-md-12 col-xs-12 mb-10">
                        <h4 class="licencetitle mb-20">Profile Info</h4> 
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="text" value="<?= $user['f_name']; ?>" placeholder="First Name" id="f_name" name="f_name" class="" required>
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="text" value="<?= $user['l_name']; ?>" placeholder="Last Name" id="l_name" name="l_name" class="" required>
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="text" value="<?= $user['phone']; ?>" placeholder="Contact Number" id="phone" name="phone" class="" required>
                            <i class="fa fa-phone" aria-hidden="true"></i> 
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="text" value="<?= $user['job_title']; ?>" placeholder="Title / Designation" id="job_title" name="job_title" class="">
                            <i class="fa fa-briefcase envelopIcon" aria-hidden="true"></i> 
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="text" value="<?= $user['zip_code']; ?>" placeholder="Zip Code" id="zip_code" name="zip_code" class="">
                            <i class="fa fa-pencil" aria-hidden="true"></i> 
                        </div> 
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="text" value="<?= $user['company']; ?>" placeholder="Company" id="company" name="company" class="">
                            <i class="fa fa-building-o" aria-hidden="true"></i> 
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <textarea  value="" placeholder="Address" class="byNowTextArea" id="address" name="address" rows="4" style="width: 100%;"><?= $user['address']; ?></textarea>
                            <i class="fa fa-address-card byNowTextAreaIcon" aria-hidden="true"></i> 
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="text" value="<?= $user['country']; ?>" placeholder="Country" id="country" name="country" class="">
                            <i class="fa fa-pencil" aria-hidden="true"></i> 
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="email" value="<?= $user['email']; ?>" placeholder="Email" id="email" name="email" class="" readonly>
                            <i class="fa fa-envelope envelopIcon" aria-hidden="true"></i> 
                        </div>
                    </div> 

                    <div class="col-md-12 col-xs-12 mt-20 text-center">
                        <input type="submit" id="submit" class="btn btn-info" value="Submit" >
                    </div>

                </form>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="row mt-5 min-mr">
                <form method="post" action="<?= base_url() ?>user/changepassword">
                    <div class="col-md-12 col-xs-12 mb-10">
                        <h4 class="licencetitle mb-20">Change Password</h4> 
                    </div>	
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="password" value="" placeholder="Enter Old Password" id="oldpassword" name="oldpassword" class="" required>
                            <i class="fa fa-lock envelopIcon" aria-hidden="true"></i> 
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="password" value="" placeholder="Enter a New Password" id="newpassword" name="newpassword" class="" required>
                            <i class="fa fa-lock envelopIcon" aria-hidden="true"></i> 
                        </div>
                        <div class="form-group inputWithIcon inputIconBg">
                            <input type="password" value="" placeholder="Re Enter New Password" id="confirmpassword" name="confirmnewpassword" class="" required>
                            <i class="fa fa-lock envelopIcon" aria-hidden="true"></i> 
                        </div>
                    </div> 
                    <div class="col-md-12 col-xs-12  ">
                        <input type="submit" id="submit" class="btn btn-info add_user" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Reports</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
    </div>
</div>
<?php $this->load->view('templates/web_footer') ?>
