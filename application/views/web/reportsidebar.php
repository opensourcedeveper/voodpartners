<div class="col-md-3 col-sm-12 col-xs-12 mt-20">
    <div class="row">
        <div class="col-sm-12 head-area mb-20">
            <h4 class="text-center">Choose License Type</h4>
            <div class="headttl">
                <form action="<?= base_url() . 'buyNow/' . $Record['slug'] ?>" method="get">
                    <div class="radio-area mt-3 px-3">
                        <?php if ($Record['single_price'] != NULL): ?>
                            <label class="radio-label">
                                <div class="tooltip1"> 
                                    <i class="fa fa-question-circle" style="float:right;font-size: 22px;"></i>
                                    <span class="tooltiptext1">
                                        <p class="px-3"><b style="color: #06d4d2">Single User - </b>This is a single user license, allowing one specific user access to the product.</p>
                                    </span>
                                </div>
                                <b>Single User - $ <?= $Record['single_price'] ?></b>
                                <input type="radio" checked="checked" name="price" value="single_price" >
                                <span class="checkmark"></span>

                            </label>
                        <?php endif ?>

                        <?php if ($Record['multi_price'] != NULL): ?>
                            <label class="radio-label">
                                <div class="tooltip1"> 
                                    <i class="fa fa-question-circle" style="float:right;font-size: 22px;"></i>
                                    <span class="tooltiptext1">
                                        <p class="px-3"><b style="color: #06d4d2">Multi User - </b>This is a 1-5 user licence, allowing up to five users have access to the product.</p>
                                    </span>
                                </div>

                                <b>Multi User - $<?= $Record['multi_price'] ?></b>
                                <input type="radio" name="price" value="multi_price">
                                <span class="checkmark"></span>
                            </label>
                            

                        <?php endif ?>

                        <?php if ($Record['ent_price'] != NULL): ?>
                            <label class="radio-label">
                                <div class="tooltip1"> 
                                    <i class="fa fa-question-circle" style="float:right;font-size: 22px;"></i>
                                    <span class="tooltiptext1">
                                        <p class="px-3"><b style="color: #06d4d2">Enterprise User - </b>This is an enterprise license, allowing all employees within your organisation access to the product. The report will be emailed to you.</p>
                                    </span>
                                </div>
                                <b>Enterprise User - $<?= $Record['ent_price'] ?></b>
                                <input type="radio" name="price" value="ent_price">
                                <span class="checkmark"></span>
                            </label>
                        <?php endif ?>
                    </div>

                    <div class="text-center" style="margin: 0px; padding: 0px;">

                        <button type="submit" style="border-radius: 10px; line-height: 0px;font-weight: bold;" class="btn buy-now" value="Buy Now">
                            Buy Now 
                            <i class="fa fa-shopping-cart" style="margin-left:10px ;"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 head-area mb-10 mt-3">
            <h4 class="text-center">Our Clients</h4>
            <div class="headttl px-3">
                <marquee>

                    <?php if ($clients): ?>
                        <?php foreach ($clients as $client): ?>
                            <img src="<?php echo base_url().'uploads/' ?>clients/<?=$client['img']?>" class="client-img" alt="<?=$client['name']?>">
                        <?php endforeach ?>
                    <?php endif ?>
                </marquee>
            </div>
        </div>
        <div class="col-sm-12 head-area mb-10 mt5">
            <h4 class="text-center">Testimonials</h4>
            <div class="headttl">

                <div class="w3-content w3-section" style="max-width:400px">
                    <div style="margin-bottom: 20px;">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p class="font-12"> 
                            Well structured, the insights they shared with us were very helpful and reliable. Their timely assistance make their services invaluable to us. I would highly recommend them and would definitely use them again in the future if needed. 
                            <br>
                            <b>VP of a Automotive division in Germany</b>
                        </p>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p class="font-12">
                            The report sent to us was on the point, and its information was quite extensive, well structured, and well researched. More importantly what we valued was your response time and professionalism. As a leading global consulting firm, our clients expect high quality deliverables in short periods of time, so a reliable research partner is essential. For the price that you have charged the quality of your services were exceptional. We look forward to continue our relationship with your team on future engagements <br>
                            <b>Product Manager at US based Manufacturer</b>
                        </p>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p class="font-12">
                            Coherent, high-quality, thoroughly-researched reports. We received a very quick response to all our queries which eventually expedited the entire process <br>
                            <b>Marketing Manager at a pharma company in Belgium</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div><!--row ends here-->
</div>