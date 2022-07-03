<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.4.0
    </div>
    <strong>Copyright &copy; 2018-2020 <a href="#">Tryangle </a>.</strong> All rights reserved.
</footer>
<div class="control-sidebar-bg"></div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
</div>


</div>
<!-- ./wrapper -->










<!-- Select2 -->
<script src="<?php echo base_url().'assets/' ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistcard -->
<script src="<?php echo base_url().'assets/' ?>plugins/bootstrap4-duallistcard/jquery.bootstrap-duallistcard.min.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url().'assets/' ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url().'assets/' ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url().'assets/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url().'assets/' ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/' ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url().'assets/' ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url().'assets/' ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url().'assets/' ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url().'assets/' ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url().'assets/' ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url().'assets/' ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url().'assets/' ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url().'assets/' ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/' ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/' ?>dist/js/demo.js"></script>


  
<script src="<?php echo base_url().'assets/' ?>plugins/inputmask/jquery.inputmask.min.js"></script> 
<!-- bootstrap color picker -->
<script src="<?php echo base_url().'assets/' ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>  
<!-- BS-Stepper -->
<script src="<?php echo base_url().'assets/' ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url().'assets/' ?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/' ?>dist/js/adminlte.min.js"></script>

<script>
    $(function () {
        $('#example1').DataTable({
            aoColumnDefs: [{
                bSortable: false,
                aTargets: [-1]
            }]
        })
        $('#example2').DataTable({
            "aaSorting": [],
            aoColumnDefs: [{
                bSortable: false,
                aTargets: [-1]
            }]
        })
        $('#datepicker').datepicker({
            autoclose: true
        })

        $('#myModal').on('hidden.bs.modal', function () {
            location.reload();
        })
        var Report_desc = document.getElementById("Report_desc");
        if (Report_desc)
        {
            // CKEDITOR.replace('Report_desc');
            CKEDITOR.addCss('.cke_editable { font-size: 12px; padding: 0; }');

            CKEDITOR.replace('Report_desc', {
                toolbar: [
                    // { name: 'document', items: [ 'Print' ] },
                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']},
                    {name: 'editing', items: ['Scayt']},
                    {name: 'links', items: ['Link', 'Unlink']},
                    '/',
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    '/',
                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']},
                    {name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
                    {name: 'insert', items: ['Image', 'Table']},
                    {name: 'tools', items: ['Maximize']},
                            // { name: 'editing', items: [ 'Scayt' ] }
                            ],

                            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

                // Adding drag and drop image upload.
                extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                // Configure your file manager integration. This example uses CKFinder 3 for PHP.
//						filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//						filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
//						filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//						filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

filebrowserBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=files',
filebrowserImageBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images',
filebrowserFlashBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=flash',
filebrowserUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=files',
filebrowserImageUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=images',
filebrowserFlashUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=flash',

height: 250,

removeDialogTabs: 'image:advanced;link:advanced'
});
        }

        var Toc = document.getElementById("Toc");
        if (Toc)
        {
            // CKEDITOR.replace('Toc');
            CKEDITOR.addCss('.cke_editable { font-size: 12px; padding: 0; }');

            CKEDITOR.replace('Toc', {
                toolbar: [
                    // { name: 'document', items: [ 'Print' ] },
                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']},
                    {name: 'editing', items: ['Scayt']},
                    {name: 'links', items: ['Link', 'Unlink']},
                    '/',
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    '/',
                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']},
                    {name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
                    {name: 'insert', items: ['Image', 'Table']},
                    {name: 'tools', items: ['Maximize']},
                            // { name: 'editing', items: [ 'Scayt' ] }
                            ],

                            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

                // Adding drag and drop image upload.
                extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                // Configure your file manager integration. This example uses CKFinder 3 for PHP.
//                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//                filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
//                filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=files',
filebrowserImageBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images',
filebrowserFlashBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=flash',
filebrowserUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=files',
filebrowserImageUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=images',
filebrowserFlashUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=flash',

height: 250,

removeDialogTabs: 'image:advanced;link:advanced'
});
        }

        var List_tbl_fig = document.getElementById("List_tbl_fig");
        if (List_tbl_fig)
        {
            // CKEDITOR.replace('List_tbl_fig');
            CKEDITOR.addCss('.cke_editable { font-size: 12px; padding: 0; }');

            CKEDITOR.replace('List_tbl_fig', {
                toolbar: [
                    // { name: 'document', items: [ 'Print' ] },
                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']},
                    {name: 'editing', items: ['Scayt']},
                    {name: 'links', items: ['Link', 'Unlink']},
                    '/',
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    '/',
                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']},
                    {name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
                    {name: 'insert', items: ['Image', 'Table']},
                    {name: 'tools', items: ['Maximize']},
                            // { name: 'editing', items: [ 'Scayt' ] }
                            ],

                            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

                // Adding drag and drop image upload.
                extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                // Configure your file manager integration. This example uses CKFinder 3 for PHP.
//                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//                filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
//                filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=files',
filebrowserImageBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images',
filebrowserFlashBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=flash',
filebrowserUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=files',
filebrowserImageUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=images',
filebrowserFlashUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=flash',

height: 250,

removeDialogTabs: 'image:advanced;link:advanced'
});
        }

        var Desc = document.getElementById("Desc");
        if (Desc)
        {
            // CKEDITOR.replace('Desc');
            CKEDITOR.addCss('.cke_editable { font-size: 12px; padding: 0; }');

            CKEDITOR.replace('Desc', {
                toolbar: [
                    // { name: 'document', items: [ 'Print' ] },
                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']},
                    {name: 'editing', items: ['Scayt']},
                    {name: 'links', items: ['Link', 'Unlink']},
                    '/',
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    '/',
                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']},
                    {name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
                    {name: 'insert', items: ['Image', 'Table']},
                    {name: 'tools', items: ['Maximize']},
                            // { name: 'editing', items: [ 'Scayt' ] }
                            ],

                            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

                // Adding drag and drop image upload.
                extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                // Configure your file manager integration. This example uses CKFinder 3 for PHP.
//                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//                filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
//                filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

filebrowserBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=files',
filebrowserImageBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images',
filebrowserFlashBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=flash',
filebrowserUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=files',
filebrowserImageUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=images',
filebrowserFlashUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=flash',

height: 250,

removeDialogTabs: 'image:advanced;link:advanced'
});
        }

        var Page_content = document.getElementById("Page_content");
        if (Page_content)
        {
            // CKEDITOR.replace('Page_content');
            CKEDITOR.addCss('.cke_editable { font-size: 12px; padding: 0; }');

            CKEDITOR.replace('Page_content', {
                toolbar: [
                    // { name: 'document', items: [ 'Print' ] },
                    {name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']},
                    {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']},
                    {name: 'editing', items: ['Scayt']},
                    {name: 'links', items: ['Link', 'Unlink']},
                    '/',
                    {name: 'colors', items: ['TextColor', 'BGColor']},
                    {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']},
                    '/',
                    {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']},
                    {name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
                    {name: 'insert', items: ['Image', 'Table']},
                    {name: 'tools', items: ['Maximize']},
                            // { name: 'editing', items: [ 'Scayt' ] }
                            ],

                            extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

                // Adding drag and drop image upload.
                extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                // Configure your file manager integration. This example uses CKFinder 3 for PHP.
//                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
//                filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
//                filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
//                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

filebrowserBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=files',
filebrowserImageBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=images',
filebrowserFlashBrowseUrl: '/kcfinder/browse.php?opener=ckeditor&type=flash',
filebrowserUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=files',
filebrowserImageUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=images',
filebrowserFlashUploadUrl: '/kcfinder/upload.php?opener=ckeditor&type=flash',

height: 250,

removeDialogTabs: 'image:advanced;link:advanced'
});
        }


        var date = document.getElementById("Published_date");
        if (date)
        {
            $('#Published_date').datepicker({
                autoclose: true
            })
        }

    })
</script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#Email").on("blur", function ()
        {
            var email = $(this).val();
            var filter = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
            if (filter.test(email))
            {
                $("#email-valid").removeClass("hidden");
                $("#email-invalid").addClass("hidden");
                $("#submit").prop('disabled', false);
                em = true;
            } else
            {
                $("#email-invalid").removeClass("hidden");
                $("#email-valid").addClass("hidden");
                $("#submit").prop('disabled', true);
                em = false;
                return false;
            }
            if (mob && em)
            {
                $("#submit").prop('disabled', false);
            }
        });
    });
</script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(function () {
        CKEDITOR.replace('editor1');
        $(".textarea").wysihtml5();
        CKEDITOR.replace('Report_desc');
        $(".textarea").wysihtml5();
        CKEDITOR.replace('Toc');
        $(".textarea").wysihtml5();
        CKEDITOR.replace('List_tbl_fig'); 
        $(".textarea").wysihtml5();
        CKEDITOR.replace('editor2');
        $(".textarea").wysihtml5();



    });




    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistcard
    $('.duallistcard').bootstrapDualListcard()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>
