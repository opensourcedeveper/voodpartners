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
                "@id": "/press-releases",
                "name": "Press Release"
            }
        }]
    }
</script>
      <!--  -->
        <!-- BREADCRUMB -->
        <div class="mwidth pt-3">
        <nav aria-label="breadcrumb pl-0">
            <ol class="breadcrumb pl-0" style="background: transparent;">
            <li class="breadcrumb-item"><a href="/" class="prime-color">Home</a></li>
            <li class="breadcrumb-item"><a href="#" class="prime-color"><?= $page ?></a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, ullam.</li> -->
            </ol>
        </nav>
        </div>
        <!--  -->
        <!-- Blog Listing -->
      <hr>
       <section>
            <div class="mwidth pb-5">
            <h1 class="heading-center mb-30 mt-50"><span class="heading-center-span"><strong><?= $page ?></strong></span></h1>

            <?php if ($Records): ?>
                <div class="row">
                    <?php foreach ($Records as $Rec): ?>

                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <img src="<?= base_url() ?>uploads/pressrelease/<?= $Rec['image'] ?>"  alt="<?= str_replace(' ', '-', $Rec['metakeyword']) ?>" class="feature-img">
                                    <div class="card-body">
                                      <h2 class="card-title f20 prime-color"><?= substr(strip_tags($Rec['title']), 0, 100) . ' ...' ?></h2>
                                      <p class="card-text">     
                                        <?= substr(strip_tags($Rec['description']), 0, 150) . ' ...' ?>
                                       <a href="<?= base_url() ?>press-release/<?= strtolower($Rec['slug'])  ?>" class="label label-info">read more</a> 
                                     </p>
                                        <!-- <p class="pb-1 mb-0 f11 op05"> Author : <span class="prime-color">By Admin</span></p> -->
                                        <p class="pt-0 mt-0 f11 op05"> Uploaded at : <span class="prime-color"><?= date('M d Y', strtotime($Rec['created_at'])) ?></span></p>
                                    </div>
                               <!--      <div class=" pb-3 text-center">
                                      <a ref="<?= base_url() . 'press-release/' . strtolower($Rec['slug']) ?>" class="label label-info">Read more </a>
                                    </div> -->
                                  </div>
                            </div>
               
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
</section>

    <nav aria-label="..." class="listPagination  pb-3">
        <!-- <?php echo $links; ?></p> -->
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
    <p style="font-size: 20px;">           
</div></section>
<?php $this->load->view('templates/web_footer') ?>