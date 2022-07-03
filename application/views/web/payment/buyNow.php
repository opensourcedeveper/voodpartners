<?php $this->load->view('templates/web_header') ?>
<?php
$a = mt_rand(0, 9);
$b = mt_rand(0, 9);
$c = $a + $b;
?>
<div class="container">
    <div class="row mt-5 min-mr">
        <form method="POST" action="<?= base_url() . 'buyNow/' . $Report['id'] ?>">
            <div class="col-md-12 col-xs-12 mb-10">
                <h1 class="licencetitle mb-20">Buy Now</h1> 
                <!--<p class="mb-0"><strong>Report Title : <a href="<?= base_url() ?>report/<?= $Report['id'] ?>"><?= $Report['title'] ?></a></strong></p>-->
                <p class="mb-0"><strong>Report Title : <?= $Report['title'] ?></strong></p>
                <div class="row mb-0">
                    <div class="col-md-6 mt-10">
                        <strong>License Type : &nbsp;&nbsp;&nbsp;</strong>

                        <?php if ($price == "single_price"): ?>
                            <b>Single User - $ <?= $Report[$price] ?></b>
                        <?php endif ?>
                        <?php if ($price == "multi_price"): ?>
                            <b>Multi User - $ <?= $Report[$price] ?></b>
                        <?php endif ?>
                        <?php if ($price == "ent_price"): ?>
                            <b>Enterprise User - $ <?= $Report[$price] ?></b>
                        <?php endif ?>
                        <input type="hidden" value="<? echo @$Report[$price]; ?>" name="price" class="form-control" readonly>
                    </div>
                </div>
            </div>	
            <div class="col-md-12">
                <hr class="mt-0">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" name="reportTitle" value="<?= $Report['title'] ?>">
                <input type="hidden" name="reportid" value="<?= $Report['id'] ?>">
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="Name" name="name" class="form-control" required>
                </div>
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="Contact Number" name="contact" class="form-control" required>
                </div>
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="Title / Designation" name="title" class="form-control">
                </div>
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="City" name="city" class="form-control">
                </div>
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="State" name="state" class="form-control">
                </div>
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="Zip Code" name="zip" class="form-control">
                </div>                            	
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12"> 
                <div class="form-group is-empty">
                    <input type="email" value="" placeholder="Email" name="email" class="form-control" required>
                </div>
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="Company" name="company" class="form-control">
                </div>
                <div class="form-group is-empty">
                    <textarea value="" placeholder="Address" class="form-control" name="address" rows="4"></textarea>
                </div>
                <div class="form-group is-empty">
                    <input type="text" value="" placeholder="Country" name="country" class="form-control">
                </div>
                <div class="form-group is-empty">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <?= $a ?> + <?= $b ?> =
                        </span>
                        <input type="text" class="form-control" id="security" placeholder="Security Code" required>
                    </div>
                </div>                                         	
            </div> 

            <div class="col-md-12 mt-20" style="margin-bottom: -10px"> 
                <hr>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 mb-20"> 
                <div class="mb-20"><label class="label label-default">Payment Type</label></div>
                <div class="bdrd pb-20"> 
                    <?php if (($type == "ccAvenue") && ($mode == "self")): ?>
                        <div class="paymnt mt-30">  
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" required value="ccAvenue"  checked=""><span class="circle"></span><span class="check"></span>
                                    <img src="<?= base_url() ?>web_assets/images/payment_01.png" class="img-responsive">
                                </label>
                            </div>
                        </div>      <?php endif; ?>
                    <?php if (($type == "razorPay") && ($mode == "self")): ?>
                        <div class="paymnt">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" value="razorPay"  checked=""><span class="circle"></span><span class="check"></span>
                                    <img src="<?= base_url() ?>web_assets/images/razorpay-logo.png"  class="img-responsive" alt="razorpay">
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if (($type == "payPal") && ($mode == "self")): ?>
                        <div class="paymnt">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" value="payPal" checked=""><span class="circle"></span><span class="check"></span>
                                    <img src="<?= base_url() ?>web_assets/images/payment_02.png" class="img-responsive" alt="payPal">
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($mode != "self"): ?>

                        <div class="paymnt">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" value="razorPay"  checked=""><span class="circle"></span><span class="check"></span>
                                    <img src="<?= base_url() ?>web_assets/images/razorpay-logo.png"  class="img-responsive" alt="razorpay">
                                </label>
                            </div>
                        </div>
                        <div class="paymnt">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" value="payPal" checked=""><span class="circle"></span><span class="check"></span>
                                    <img src="<?= base_url() ?>web_assets/images/payment_02.png" class="img-responsive" alt="payPal">
                                </label>
                            </div>
                        </div>
                        <div class="paymnt">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" value="wireTransfer"><span class="circle"></span><span class="check"></span>
                                    <img src="<?= base_url() ?>web_assets/images/payment_03.png" class="img-responsive" alt="wireTransfer">
                                </label>
                            </div>  
                        </div>   
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-20">
                <div class="mb-20">
                    <label class="label label-default">Terms & Conditions</label>
                </div> 
                <div class="bdrd pb-10">                    
                    <div class="scrollbar3" id="style-42">
                        <div class="force-overflow3">
                            <p>
                                <strong>Acceptance</strong><br>
                                Before using the website you should read and agree to these terms and conditions of use. By using the website you are agreeing to be legally bound by these terms. If you do not agree, you should not use the website.
                            </p>
                            <p>
                                <strong>Ownership</strong><br>
                                This website is owned and operated by SBG and its affiliated companies and subsidiaries (from this point: jointly and individually referred to as "strabayassociates.com".
                            </p>
                            <p>
                                <strong>Place of Operations</strong><br>
                                strabayassociates.com controls and maintains this website from Pune, India and makes no representation that the information provided on or via this website is appropriate or available for use in other locations. Websites of strabayassociates.com that are targeted at specific jurisdictions comply with the requirements of those jurisdictions. No warranty is given in respect of use in other jurisdictions.
                            </p>
                            <p>
                                <strong>Variations</strong><br>
                                strabayassociates.com may change these terms and conditions of use at any time without notice. Changes will be posted under “Legal Notice�?. Your use of the website after any changes have been posted will constitute your agreement to the modified terms and conditions of use and all of the changes. Accordingly, you should read these terms and conditions of use from time to time to ensure you are aware of the latest changes.

                            </p>
                            <p>
                                <strong>About the Agreement</strong><br>

                                Subject to these Terms of Use (this "Agreement"), strabayassociates.com and/or its subsidiaries, as applicable, (collectively and individually, "we", "our" or "us") make available certain on-line information and services on various websites ("Our Service") to registered and/or authorized users ("you" or "your"). Our Service presents information, data, content, news, reports, programs, video, audio and other materials and services, communications, transmissions and other items, tangible or intangible, which are referred to as "Material." Your use of Our Service constitutes your acknowledgment of and assent to be bound by this Agreement. <br>
                                Unless there is another written agreement between you and us that covers your use of part or all of Our Service, this is the entire agreement between you and us. If there is another written agreement between you and us that covers your use of part of Our Service, this Agreement covers all other use of Our Service by you. Whenever new products or services become available, your use of them will be under this Agreement unless we notify you otherwise or another written agreement covers your use of those new products or services. <br>
                                In addition, particular sites or features of Our Service may have different or additional terms ("Special Terms"), which will be disclosed to you when you access those sites or features. Such Special Terms are incorporated into this Agreement with respect to such sites or features. If there is a conflict between the terms of this Agreement and the Special Terms, the Special Terms will govern with respect to such sites or features. <br>
                                In certain cases, additional "passthrough" terms and conditions may apply to the use of third-party content, software or other services (collectively, "Third-Party Content"). Any such additional terms and conditions shall be delivered with applicable Third-Party Content. If upon reading such terms and conditions, you find you are ineligible or unable to comply with them through circumstances outside your control, then you are hereby required to contact strabayassociates.com within twenty-four (24) hours of purchase (in the case of Instant Online Delivery content) or receipt (in the case of other content) to explain your ineligibility. An appropriate solution will worked out at that time. If a call is not received in the allotted time, you are deemed to have approved and to be in compliance with the additional terms and conditions. 
                            </p>
                            <p>
                                <strong>Accuracy</strong><br>
                                strabayassociates.com will use reasonable efforts to provide accurate and up to date information on this website. This information is for general guidance on matters of interest only. The application and impact of this information can vary widely based on the specific facts involved. Given the changing nature of laws, rules and regulations, and the inherent hazards of electronic communication, there may be delays, omissions or inaccuracies in information contained in this website. All information on this website is provided "as is". <br>
                                It is your responsibility to evaluate the accuracy, completeness and usefulness of any opinions, advice, services or other information provided. All information contained on any page set up by an entity of strabayassociates.com is distributed with the understanding that the authors, publishers and distributors are not rendering legal, accounting or other professional advice or opinions on specific facts or matters and accordingly assume no liability whatsoever in connection with its use. You should consult your own advisors with respect to your personal situation.
                            </p>
                            <p>
                                <strong>No Refund Policy</strong><br>
                                No claim of charge back or refund shall be admissible under any circumstances as the product (Market Research Report) falls under intellectual property and contains lot of confidential information. Due to the confidential nature of the information contained in our market research reports, cancellation of orders cannot be accepted after the report has been ordered, purchased or delivered.
                            </p>
                            <p>
                                <strong>Return Policy:</strong><br>
                                Due to the nature of the information being sold, we unfortunately cannot accept returns of products once they have been delivered. 
                                Please be sure to read all available information and clear doubts about a report before you place your order. 
                                If you have any questions about a report's coverage or relevance, simply contact us for expert assistance from a Research Specialist.
                            </p>
                            <p>
                                <strong>Regarding Payments</strong><br>
                                International payments will be accepted only in USD (United States Dollars). For payments done from within India the INR amount should be the equivalent of the USD price quoted for the report plus 18% GST.
                            </p>
                            <p>
                                <strong>Report Delivery:</strong><br>
                                Reports purchased directly through the website or otherwise will be dispatched between 24-72 working hours except purchases done on weekend or public holidays will be delivered the next working day. strabayassociates.com shall not be liable to Buyer for any loss or damage suffered by Buyer directly or indirectly, as a result of Seller's failure to deliver or delay in delivering the product/ report or failure to perform, or delay in performing, any other term or condition hereof, where such failure or delay is caused by fire, flood, natural disaster, labour trouble (including without limitation strike, slowdown and lockout), war, riot, civil disorder, embargo, government regulations or restrictions of any and all kinds, expropriation of plant by federal or state authority, interruption of or delay in transportation, power failure, inability to obtain materials and supplies, accident, explosion, act of God or other causes of like or different character beyond Seller's control and the time for delivery specified herein shall be extended during the continuance of such conditions and for a reasonable time thereafter
                            </p>
                            <p>
                                <strong>Availability</strong><br>
                                Whilst strabayassociates.com takes reasonable steps to ensure its websites are accessible; we make no guarantee of availability will not be held liable for any losses due to their unavailability.
                            </p>
                            <p>
                                <strong>Permitted Use, Limitations on Use</strong><br>
                                You may access and download the Material only as required to view the Material on your web browser for your individual use, keeping all copyright and other notices on the Material. You may print a single copy of Material for your use. You may not republish or distribute any Material or do anything else with the Material, which is not specifically permitted in this Agreement. You agree to comply with all notices and requirements accompanying Third-Party.
                            </p>
                            <p>
                                <strong>Anti-hacking Provision</strong><br>
                                You expressly agree not to:
                                Use or attempt to use any "deep-link", "scraper", "robot", "bot", "spider", "data-mining", "computer code", or any other automated device, program, tool, algorithm, process, or methodology or manual process having similar processes, or functionality, to access, acquire, copy, or monitor any portion of the website, any data or content found on or accessed through the website or any other content without the prior express written consent of strabayassociates.com;<br>

                                Obtain or attempt to obtain through any means any materials or information on the website that have not been intentionally made publicly available, either by their public display on the website or through their accessibility by a visible link;<br>

                                Violate the restrictions in any robot inclusion headers on this website or in any way bypass or circumvent any other measure employed to limit or prevent access to the website or its content;<br>

                                Violate the security of the website or attempt to gain unauthorised access to the website, data, materials, information, computer systems or networks connected to any strabayassociates.com server, through hacking, password mining or any other means;<br>

                                Interfere or attempt to interfere with the proper working of the website or any activities conducted on or through the website, including accessing any data, content or other information prior to the time that it is intended to be available to the public;<br>

                                Take or attempt any action that, in the sole discretion of strabayassociates.com, imposes or may impose an unreasonable or disproportionately large load or burden on the website or strabayassociates.com infrastructure.
                            </p>
                            <p>
                                <strong>No Advice</strong><br>
                                You understand and acknowledge that the reports provided from strabayassociates.com is for informational purposes only and any offering does not constitute to an investment, legal or market research advice. You shall consult with its own advisors concerning such matters and shall be responsible for making its own independent business decisions.
                            </p>
                            <p>
                                <strong>Security</strong><br>
                                strabayassociates.com takes reasonable steps to safeguard the security of any information you input or send to strabayassociates.com in connection with this website by using secure services and encryption technology where strabayassociates.com deems appropriate, such as access to secure areas of the website. However, you acknowledge that transmission of information via the internet (unless encrypted) is inherently insecure and strabayassociates.com makes no warranty that the website is error, bug or virus free. You should take reasonable precautions, such as using up to date antivirus software to protect your device. strabayassociates.com accepts no responsibility for any damages that you may suffer as a result of damage to or the loss of confidentiality of your information. strabayassociates.com excludes all liability for contamination or damage caused by virus or electronic transmission.
                            </p>
                            <p>
                                <strong>Links to Third Party Sites</strong><br>
                                This website may contain hypertext or other computer links to websites operated by persons other than strabayassociates.com. Such hyperlinks are provided for your reference and convenience only, the responsibility for the operation and content of those websites rests solely with the organisation controlling that site which shall be governed by separate terms of use. strabayassociates.com shall have no liability to you or any other person or entity for the use of third party websites. 
                                A hyperlink from this website to another website does not imply or mean that strabayassociates.com endorses the content on that website or the operator or operations of that site. You are solely responsible for determining the extent to which you may use any content at any other websites to which you link from this website. strabayassociates.com assumes no responsibility for the use of third party software on the website and shall have no liability whatsoever to any person or entity for the security, accuracy or completeness of any outcome generated by such software.
                            </p>
                            <p>
                                <strong>Indemnity & injunction</strong><br>
                                You agree to indemnify and hold harmless strabayassociates.com, its licensors and suppliers, all of its affiliated companies and subsidiaries and all of their respective officers, directors, employees, shareholders, legal representatives, agents, successors and assigns, from and against any damages, liabilities, costs and expenses (including reasonable attorneys’ and professionals' fees and court costs) arising out of any third party claims based on or related to your use of the website or any breach by you of these terms and conditions of use. <br>
                                You agree that damages may not be an adequate remedy for the breach of these terms and conditions of use or the infringement of any of our rights and accordingly agree that we are entitled to injunctions, specific performance, and/or orders to deliver up documents.
                            </p>
                            <p>
                                <strong>Limitation of Liability</strong><br>
                                You are entirely liable for activities conducted by you or anyone else in connection with your browsing and use of Our Service. If you are dissatisfied with the Material or Our Service or with these Terms of Use, your sole and exclusive remedy is to stop using the Material and Our Service. We will not pay you any damages.<br>

                                We do not warrant the accuracy, completeness, correctness or other characteristics of any Material available on or through Our Service. We will not be liable for any loss or injury resulting directly or indirectly from Our Service, whether or not caused in whole or in part by our negligence or by contingencies within or beyond our control. Neither we, nor suppliers of Third-Party Content, are responsible or liable, directly or indirectly, for any loss or damage caused by use of or reliance on or inability to use or access Our Service or the Material. <br>

                                strabayassociates.com will not be held responsible for any inaccuracies with the content of the report. strabayassociates.com does not have any control over any content of the report by our partners and is not liable to refund the payment in part or full once report is dispatched.<br>

                                YOUR ACCESS TO AND USE OF OUR SERVICE ARE AT YOUR SOLE RISK. OUR SERVICE IS PROVIDED "AS IS" AND "AS AVAILABLE." OUR SERVICE IS FOR YOUR PERSONAL USE ONLY AND WE MAKE NO REPRESENTATION OR WARRANTY OF ANY KIND, EXPRESS OR IMPLIED. WE EXPRESSLY DISCLAIM ANY WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE OR USE. WE ARE NOT AND WILL NOT BE A PARTY TO ANY TRANSACTION BETWEEN YOU AND ANY THIRD PARTY, WHETHER OR NOT THAT THIRD PARTY'S WEBSITE IS LINKED FROM OUR SERVICE.
                            </p>
                            <p>
                                <strong>Applicable law and place of jurisdiction</strong><br>
                                The laws of the State of Maharashtra (India) govern this Agreement and your use of Our Service. You agree to comply with all laws, regulations, obligations and restrictions, which apply to you. You agree that the courts located in Pune or Mumbai in the state of Maharashtra (India) have exclusive jurisdiction for any claim, action or dispute under this Agreement.<br>

                                You also agree and expressly consent to the exercise of personal jurisdiction in the State of Maharashtra (India). No failure or delay in enforcing any right shall be a waiver of that or any other right. If any term of this Agreement is held invalid, illegal or unenforceable, the remaining portions shall not be affected.
                            </p>
                            <p>
                                <strong>Copyright</strong><br>
                                Unless specifically stated in conjunction with particular Material, all Material is copyrighted by us. You have no rights in or to the Material and you may not use any Material other than as permitted under this Agreement.
                            </p>
                            <p>
                                <strong>Trademark</strong><br>
                                All trade names, trademarks, service marks and other product and service names and logos on Our Service or in the Material are the proprietary trademarks of their respective owners and are used from publically available sources.
                            </p>
                                    <!-- <p>Tryangle  and its affiliates provide their services to you subject to the following conditions. If you visit or shop at strabayassociates.com, you accept these conditions. Please read them carefully. We reserve the right from time to time to make changes to these Terms and Conditions at our absolute discretion. The Terms and Conditions applying to each transaction with us are those which are available on the website at the time that you place your order and it is your responsibility to check the Terms and Conditions before placing an order.</p>
        <p><strong>Electronic Communications</strong><br />
        All content included on this site, such as text, graphics, logos, button icons, images, and audio clips, digital downloads, data compilations, and software, is the property of Tryangle  or its content suppliers and protected by international copyright laws. The compilation of all content on this site is the exclusive property of Tryangle  and protected by international copyright laws. All software used on this site is the property of Tryangle  or its software suppliers and protected by international copyright laws. You agree not to copy, reproduce, duplicate, sell, resell, or exploit for any commercial purposes, any portion of the Site, use of the Site, or access to the Site. You may not re-use and/or extract part of the content of this website without Tryangle &rsquo; express consent in writing. In particular, you may not utilize any data mining, robots or similar search and extraction tools for re-use of any substantial part of this website without Tryangle &rsquo; express consent in writing. You may not use substantial parts of this website (for example product listing and prices) on your own website without our express consent in writing.</p>
        <p><strong>Our Contact</strong><br />
        Once you place an order for a product listed on our website, payment for that product becomes due and owing immediately. Notwithstanding the fact that the product will not be dispatched until payments are received in full, you are liable to pay to Tryangle  all payments due on foot of the order. Once we receive your order we have to purchase the product from the publisher, process the payment and arrange the shipping. Because of this element of work involved, we regret that it is not possible for an order to be cancelled once it is submitted. Tryangle  will not be responsible for any delay or failure to comply with our obligations under our contract with you where such delay or failure arises from any cause which is beyond our reasonable control.</p>
        <p><strong>License &amp; Site Access</strong><br />
        Tryangle  grants you a limited revocable license to create a link to the home page of Tryangle  .Compromised that the link does not portray strabayassociates.com, its associated companies, or its products, in a negative, defamatory, derogatory or misleading way. You may not use any Tryangle  logos, graphics or trademarks as part of the link without our express consent in writing. Access and make personal use of this site but not to download (other than page caching) or modify it, or any portion of it, except with the express written consent of Tryangle . This license does not include any resale or commercial use of this site or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this site or its contents; any downloading or copying of account information for the benefit of another merchant; or any use of data mining, robots, or similar data gathering and extraction tools. This site or any portion of this site may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of Tryangle . You may not frame or utilize framing techniques to enclose any trademark, logo, or other proprietary information (including images, text, page layout, or form) of Tryangle  and our affiliates without express written consent. You may not use any meta tags or any other &ldquo;hidden text&rdquo; utilizing Tryangle  &rsquo; name or trademarks without the express written consent of Tryangle  . Any unauthorized use terminates the permission or license granted by Tryangle .</p>
        <p><strong>Product Description</strong><br />
        Tryangle  and its affiliates attempt to be as accurate as possible. However, Tryangle  does not warrant that product descriptions or other content of this site is accurate, complete, reliable, current, or error-free.</p>
        <p><strong>Product Pricing</strong><br />
        We offer you consistently low prices on all market research, newsletters, directories, training materials, CD-ROMs, and other related products. All prices are listed in Dollars. Despite our best efforts, a small number of the items in our catalogue may be mispriced. Rest assured, however, that we verify prices of products sold and shipped by Tryangle  as part of our shipping procedures. If an item&rsquo;s correct price is lower than our stated price, we charge the lower amount and ship you the item. If an item&rsquo;s correct price is higher than our stated price, we will, at our discretion, either contact you for instructions before shipping or cancel your order and notify you for such cancellation.</p>
        <p><strong>Shipping</strong><br />
        Tryangle  can ship to virtually any address in the world. The majority of our products are dispatched electronically. Hardcopy orders, such as books, binders, newsletters, software or CD-ROMS may be dispatched by mail or courier. Hardcopy orders incur an additional shipping charge.</p>
        <p><strong>Delivery Time</strong><br />
        When you place an order with Tryangle , we endeavor to deliver the product as soon as possible. Electronic delivery is always the fastest option. The Hard copy of products are generally dispatched from the EU or the US, and delivery to some markets may be delayed through local carriers, and local customs. Where possible we encourage clients to order products electronically.</p>
        <p><strong>Delivery Time</strong><br />
        The nature of the information being sold means that Tryangle  cannot accept returns of products once they have been dispatched.</p>
        <p><strong>Links</strong><br />
        This site may contain links to third party Web sites and material from third-party information and content providers. As Tryangle  has no control over such sites and resources, you acknowledge and agree that Tryangle  is not responsible for the availability or otherwise of such external sites or resources, and does not endorse and is not responsible or liable for any content, advertising, products, or other materials on or available from such sites or resources. You further acknowledge and agree that Tryangle  shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be scaused by or in connection with use of or reliance on any such content, goods, or services available on or through any such site or resource.</p>
        <p><strong>Third Party Content</strong><br />
        As a distributor of content published and supplied by third parties, Tryangle  has no editorial control over said content. Such content expresses the opinions, the advice, the services, the offers, the statements, or other information of the authors, and not of Tryangle .</p>
        <p><strong>Indemnity</strong><br />
        You agree to hold Market Research And Report , and its subsidiaries, affiliates, officers, agents, cobrands or other partners, and employees, harmless from any claim or demand, including reasonable legal fees, made by any third party due to or arising out of your use of the Site, your connection to the Site, your violation of the TOS, or your violation of any rights of another.</p>
        <p><strong>Indemnity</strong><br />
        By visiting strabayassociates.com, you agree that the laws of the Republic of Ireland, without regard to principles of conflict of laws, will govern these Conditions of Use and any dispute of any sort that might arise between you and Tryangle  or its affiliates. Going through the terms and conditions will make easier to use the site and access reports. Accessing reports implies that you agreed to terms and conditions mentioned above.</p> -->
                        </div>
                    </div><!--scroll ends here-->
                </div>
            </div>

            <div class="col-md-12 col-xs-12 text-center">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="terms">
                        <strong> I agree to have read and accept the Terms and Conditions  And <a href="https://www.strabayassociates.com/privacypolicy" target="_blank"> privacy</a> of strabayassociates.com</strong>
                    </label>
                </div>


            </div>

            <div class="col-md-12 col-xs-12 mt-20 text-center">
                <input type="submit" id="submit" class="btn btn-info" value="Submit" disabled>
            </div>

        </form>
    </div>
</div>
<?php $this->load->view('templates/web_footer') ?>
<script type="text/javascript">
    $(document).ready(function ()
    {
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