<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidemenu') ?>
<div class="content-wrapper">
    <section class="content">
        <!-- Default card -->
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title">Add Email Template</h3>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-info">
                        <?php echo $this->session->flashdata('msg') ?>
                    </div>
                <?php endif ?>
                <br />
                <form class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?= base_url('email-template/create') ?>" id="demo-form2" data-parsley-validate method="post">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="template_name">
                            Template Name
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">                                
                            <input type="text" id="template_name" name="template_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="template_code">
                            Template Code
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">                                
                            <input type="text" id="template_code" name="template_code" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="template_html">
                            Template Body
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">                                
                            <textarea rows="10" cols="80" id="Page_content" name="template_html" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?php echo base_url() . 'email-templates' ?>"><button class="btn btn-primary" type="button">Cancel</button></a>								
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" id="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('templates/footer') ?>
