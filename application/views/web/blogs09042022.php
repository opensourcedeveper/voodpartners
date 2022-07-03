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
                "@id": "/blogs/",
                "name": "Blogs"
            }
        }]
    }
</script>

     <div class="mwidth pt-3">
        <nav aria-label="breadcrumb pl-0">
            <ol class="breadcrumb pl-0" style="background: transparent;">
                     <li class="breadcrumb-item"><a href="#" class="prime-color">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>blogs" class="prime-color">Blogs</a></li>  
            </ol>
        </nav>
        </div>
        <!--  -->
        <!-- Blog Listing -->
      <hr>
   <section>

<div class="container">
       <h1 class="heading-center mb-30 mt-50"><span class="heading-center-span"><strong><?= $page ?></strong></span></h1>
  
   </div>
        <section>

<div class="container">
    <div class="row mt-0">
        <div class="col-md-12 col-sm-12 col-xs-12">
           

            <?php if ($Records): ?>
                <div class="row">
                    <?php foreach ($Records as $Rec): ?>
                        <div class="col-sm-12">
                            <div class="blog-box">
                                <div>
                                    <img src="<?= base_url() ?>uploads/blogs/<?= $Rec['image'] ?>"  alt="<?= str_replace(' ', '-', $Rec['metakeyword']) ?>" class="feature-img w-100 p-3">
                                </div>

                                <div class="title-box">
                                    <p><span class="date-span"><?= $Rec['created_at'] ?></span></p>
                                    <p>
                                        <a href="<?= base_url() . 'blog/' . strtolower($Rec['slug']) ?>" class="list-title"><?= $Rec['title'] ?></a>
                                    </p>
                                    <p>
                                        <?= substr(strip_tags($Rec['description']), 0, 450) . ' ...' ?>
                                        <br/>
                                        <a href="<?= base_url() . 'blog/' . strtolower($Rec['slug']) ?>" class="label label-info">read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
<!--         <div class="col-md-3 col-sm-3 col-xs-12 ovrflw">
            <h3 class="heading-center mb-30 mt-50"><span class="heading-center-span"><strong>Latest Reports</strong></span></h3>
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <div class="latestnews">
                    <div class="item2">
                        <div class="row">
                            <?php if ($Recent): ?>
                                <?php foreach ($Recent as $Recent_report): ?>
                                    <div class="col-sm-12">
                                        <div class="col-item pb-20 pb-xs-10">
                                            <h5>
                                                <a href="<?= base_url() ?>report/<?= strtolower($Recent_report['slug']) ?>">
                                                    <?= substr($Recent_report['title'], 0, 70) ?>
                                                </a>
                                            </h5>
                                            <p>
                                                <?= substr(strip_tags($Recent_report['report_desc']), 0, 70) . ' ...' ?>
                                                <a class="label label-info" href="<?= base_url() ?>report/<?= strtolower($Recent_report['slug']) ?>">read more</a>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>      
            </div>
        </div> -->
    </div>


                    <div class="paper-listing">
                             <!-- Pagination -->
                             <nav aria-label="..." class="listPagination  pb-3">
                                <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                                </ul>
                            </nav>
<!--     -->
</div>
</section>
<?php $this->load->view('templates/web_footer') ?>

