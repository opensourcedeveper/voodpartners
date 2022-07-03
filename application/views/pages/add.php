<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidemenu') ?>
<div class="content-wrapper">
    <section class="content">
        <!-- Default card -->
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title"><?php echo $pagetitle ?></h3>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-info">
                        <strong>Info!</strong> <?php echo $this->session->flashdata('msg') ?>
                    </div>
                <?php endif ?>
                <br />
                <form class="form-horizontal form-label-left" enctype="multipart/form-data" id="demo-form2" data-parsley-validate method="post">
                    <?php foreach ($fields as $key => $value): ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="<?= $key ?>">
                                <!-- <?php echo ucfirst($key) ?> -->
                                <?php if ($key == 'toc'): ?>
                                    Table of Content
                                <?php elseif ($key == 'report_desc'): ?>
                                    Report Description
                                <?php elseif ($key == 'list_tbl_fig'): ?>
                                    List of Tables And Figures
                                <?php elseif ($key == 'cat_id'): ?>
                                    Category
                                <?php elseif ($key == 'publisher_id'): ?>
                                    Publisher
                                <?php elseif ($key == 'region_id'): ?>
                                    Region
                                <?php elseif ($key == 'published_date'): ?>
                                    Published Date
                                <?php elseif ($key == 'single_price'): ?>
                                    Single User Price
                                <?php elseif ($key == 'multi_price'): ?>
                                    Multi User Price
                                <?php elseif ($key == 'ent_price'): ?>
                                    Enterprise User Price
                                <?php elseif ($key == 'published_status'): ?>
                                    Published Status
                                <?php elseif ($key == 'meta_keyword'): ?>
                                    Meta Keyword
                                <?php elseif ($key == 'meta_desc'): ?>
                                    Meta Description
                                <?php elseif ($key == 'meta_title'): ?>
                                    Meta Title
                                <?php else: ?>
                                    <?= ucfirst($key) ?>
                                <?php endif ?>
                            </label>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <?php if ($value == 'select'): ?>
                                    <?php $var = $key . 'Opt' ?>
                                    <select id="<?= ucfirst($key) ?>" name="<?= $key ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <option value="">Select Option</option>
                                        <?php foreach ($$var as $key => $value): ?>
                                            <option value="<?= $value ?>"><?= $key ?></option>
                                        <?php endforeach ?>
                                    </select>
                                <?php elseif ($value == "textarea"): ?>
                                    <?php  if ($key == 'report_desc') {?> 




<textarea rows="10" cols="80" id="editor1" name="report_desc" required="required" class="form-control col-md-7 col-xs-12"></textarea>








<?php }elseif ($key == 'toc') {?>

    <textarea rows="10" cols="80" id="editor1" name="toc" class="form-control col-md-7 col-xs-12"></textarea>
   
<?php }elseif ($key == 'list_tbl_fig') {?> 


<textarea rows="10" cols="80" id="editor1" name="list_tbl_fig" class="form-control col-md-7 col-xs-12"></textarea>



<?php }else {  ?>
                                    <textarea rows="10" cols="80" id="<?= ucfirst($key) ?>" name="<?= $key ?>" <?php if ($key == 'report_desc') echo 'required="required"' ?> class="form-control col-md-7 col-xs-12"></textarea>
                                <?php }  else: ?>
                                    <span id="<?= $key ?>-valid" class="hidden mob">
                                        <i class="fa fa-check pwd-valid"></i>Valid Email ID
                                    </span>
                                    <span id="<?= $key ?>-invalid" class="hidden mob-helpers">
                                        <i class="fa fa-times email-invalid"></i>Invalid Email ID
                                    </span>
                                    <!-- <span >Please enter valid <?= $key ?></span> -->
                                    <input type="<?= $value ?>" id="<?= ucfirst($key) ?>" name="<?= $key ?>" <?php if ($key != 'pages' && $key != 'multi_price' && $key != 'ent_price' && $key != 'published_status' && $key != 'meta_title' && $key != 'meta_desc') echo 'required="required"' ?> class="form-control col-md-7 col-xs-12">
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="<?php echo base_url() . 'list/' . $for ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" id="submit" class="btn btn-success" <?php if (array_key_exists('email', $fields)) echo 'disabled="true"' ?>>Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('templates/footer') ?>