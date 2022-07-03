<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/sidemenu') ?>
<div class="content-wrapper">
    <section class="content">
        <!-- Default card -->
        <div class="card">
            <div class="card-header with-border">
                <h3 class="card-title"><?php echo $pagetitle ?></h3>
                <div class="pull-right">
                    
                    <a class="btn btn-primary" href="<?php echo base_url() . 'email-template/add' ?>"> <i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="alert alert-info">
                        <?php echo $this->session->flashdata('msg') ?>
                    </div>
                <?php endif ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <?php foreach ($cols as $col): ?>
                                <th><?php echo $col ?></th>
                            <?php endforeach ?>
                            <?php if ($Actions): ?>
                                <th>Action</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($Records): ?>
                            <!-- <?php print_r($Records) ?> -->
                            <?php foreach ($Records as $Record): ?>
                                <tr>
                                    <?php foreach ($Record as $key => $value): ?>
                                        
                                        <?php if ($key == "created_at"): ?>
                                            <td><?php echo date('d M Y h:i a', strtotime($value)) ?></td>
                                        <?php else: ?>
                                            <td><?php echo $value ?></td>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    
                                    <?php if ($Actions): ?>
                                        <td class="text-center">
                                            <?php foreach ($Actions as $Action): ?>
                                                <?php if ($Action == 'edit'): ?>
                                                    <a href="<?php echo base_url(). "email-template/" . $Action . "/"  . $Record['id'] ?>" data-toggle="tooltip" data-placement="top" title="<?php ucfirst($Action) ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if ($Action == 'delete'): ?>
                                                    <a class="delete" href="javascript:void(0);" data-id="<?php echo($Record['id']) ?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                <?php endif ?>
                                                
                                            <?php endforeach ?>
                                        </td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td class="text-center" colspan="7"><b>No Records Found</b></td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<div id="myModal1" class="modal fade" role="dialog">
</div>
<script type="text/javascript">
    $(document).ready(function ()
    {
        var url = "<?php echo base_url(); ?>";
        var task = "email-template";
        $('.delete').click(function ()
        {
            var id = $(this).attr('data-id');
            // alert(id);
            if (confirm("Do you want to delete this Record?") == true)
                window.location = url + task + "/delete/" + id;
            else
                return false;
        })

        $('.enable').click(function ()
        {
            var id = $(this).attr('data-id');
            // alert(id);
            if (confirm("Do you want to enable this Record?") == true)
                window.location = url + "enable/" + task + '/' + id;
            else
                return false;
        })

        $('.disable').click(function ()
        {
            var id = $(this).attr('data-id');
            // alert(id);
            if (confirm("Do you want to disable this Record?") == true)
                window.location = url + "disable/" + task + '/' + id;
            else
                return false;
        })
    });
</script>
<?php $this->load->view('templates/footer') ?>
