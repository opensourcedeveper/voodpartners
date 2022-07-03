<?php $this->load->view('templates/web_header') ?>
<div class="container">
    <?php if ($this->session->flashdata('msg')): ?>
        <br/>
        <div class="alert alert-danger">
            <strong>Info!</strong> <?php echo $this->session->flashdata('msg') ?>
        </div>
    <?php endif ?>
    <div class="row col-md-12">
        <div class="col-md-4">
            <br>
            <img src="<?php echo base_url() . 'web_assets/' ?>images/Subscription.png" class="" alt="Tryangle ">
        </div>
        <div class="col-md-4">
            <h2>Login</h2>
            <form method="post">

                <div class="form-group inputWithIcon inputIconBg">
                    <input type="text" value="" placeholder="Email" name="email" class="" >
                    <i class="fa fa-envelope envelopIcon" aria-hidden="true"></i> 
                </div>
                <div class="form-group inputWithIcon inputIconBg">
                    <input type="password" value="" class="pm-input-pw" placeholder="Password" name="password" class="">
                    <i class="fa fa-eye envelopIcon" aria-hidden="true"></i> 
                </div>

                <button type="submit" class="btn btn-info">Login</button>
            </form>
            <div> 
                <a href="<?= base_url(); ?>register/user" class="existedCustomerText">Create Account</a> 
            </div>
        </div>

    </div>
</div>
<?php $this->load->view('templates/web_footer') ?>
