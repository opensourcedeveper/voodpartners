<?php $this->load->view('templates/web_header') ?>
<?php
$a = mt_rand(0, 9);
$b = mt_rand(0, 9);
$c = $a + $b;
?>
<div class="container">
    <div class="row min-mr">
        <form method="post" action="<?= base_url() . 'ragister-user' ?>">
            <div class="col-md-12 col-xs-12 mb-10">
                <h1 class="licencetitle mb-20">Buy Now</h1> 
                <h1 class="licencetitle borderBottomNone f-17">Order details</h1> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                        <div id="projectDetailsBuyNow">
                            <table class="col-md-12 table-bordered table-condensed cf">
                                <thead class="cf">
                                    <tr>
                                        <th class="borderLeftNone">Product Title</th>
                                        <th class="numeric">Quantity</th>
                                        <th class="numeric">Subscription</th>
                                        <th class="numeric">Price</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_cart">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>	
            <hr>
            <div class="col-md-12">
                <div class="pm-d-flex">
                    <div> 
                        <p class="existedCustomerText">Already a customer ?</p> 
                    </div>
                    <div id="tab" class="btn-group pm-btn-group" data-toggle="buttons">
                        <a href="#existed-user" class="btn btn-default pd-radio pd-radio-1 " data-toggle="tab">
                            <input type="radio" name="account" value="1" />Yes
                        </a>
                        <a href="#new-user" class="btn btn-default pd-radio pd-radio-2 active " data-toggle="tab">
                            <input type="radio" name="account" value="0"/>NO
                        </a>  
                    </div> 
                </div>


                <div class="tab-content">
                    <div class="tab-pane active" id="new-user">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="reportid" value="<?= $Report['id'] ?>">
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="First Name" name="f_name" class="" required>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Last Name" name="l_name" class="" required>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="form-group  inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Contact Number" name="phone" class="" required>
                                <i class="fa fa-phone" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <textarea  value="" placeholder="Address" class="byNowTextArea" name="address" rows="4" style="width: 100%;"></textarea>
                                <i class="fa fa-address-card byNowTextAreaIcon" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group  inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Zip Code" name="zip_code" class="">
                                <i class="fa fa-pencil" aria-hidden="true"></i> 
                            </div>   
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Country" name="country" class="">
                                <i class="fa fa-pencil" aria-hidden="true"></i> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group  inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Title / Designation" name="job_title" class="">
                                <i class="fa fa-briefcase envelopIcon" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Company" name="company" class="">
                                <i class="fa fa-building-o" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Email" name="email" class="" >
                                <i class="fa fa-envelope envelopIcon" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="password" value="" placeholder="Password" name="password" class="" >
                                <i class="fa fa-lock envelopIcon" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="password" value="" placeholder="Re Enter Password" name="confirmpassword" class="" >
                                <i class="fa fa-lock envelopIcon" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <strong>  <?= $a ?> + <?= $b ?> =</strong>
                                    </span>
                                    <input type="text" class="" id="security" placeholder="Security Code" required>
                                </div>
                            </div>                                         	
                        </div> 
                    </div>
                    <div class="tab-pane" id="existed-user">
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="text" value="" placeholder="Email" name="loginemail" class="" >
                                <i class="fa fa-envelope envelopIcon" aria-hidden="true"></i> 
                            </div>
                            <div class="form-group inputWithIcon inputIconBg">
                                <input type="password" value="" class="pm-input-pw" placeholder="Password" name="loginpassword" class="">
                                <i class="fa fa-eye envelopIcon" aria-hidden="true"></i> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-20" style="margin-bottom: -10px"> 
                <hr>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-20">
                <div class="salespDiv">
                    <div>
                        <img src="<?php echo base_url() . 'web_assets/' ?>images/profile.png" alt="">
                    </div>
                    <div>
                        <ul class="list-unstyled salesProfessional">
                            <li class="sp-li-1">Reach out to our most Senior</li>
                            <li class="sp-li-2">Jay Mathews</li>
                            <li class="sp-li-3">Sales Professional</li>
                            <li class="sp-li-4">+1 513 549 5911 (U.S.) </li>
                            <li class="sp-li-5"> +44 203 318 2846 (U.K.) </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mb-20"> 
                <div class="mb-20"><label class="label label-default newSubLabels">Payment Type</label></div>
                <div class=" pb-20 pymntDiv">   
                    <div class="paymnt">
                        <div class="radio pymntRadio">
                            <label>
                                <input type="radio" name="optionsRadios" value="razorPay"  checked=""><span class="circle"></span><span class="check"></span>
                                <img src="<?php echo base_url() . 'web_assets/' ?>images/rp.png" alt="" class="img-responsive payment-img">
                            </label>
                        </div>
                    </div>
                    <div class="paymnt">
                        <div class="radio pymntRadio">
                            <label>
                                <input type="radio" name="optionsRadios" value="payPal" checked=""><span class="circle"></span><span class="check"></span>
                                <img src="<?php echo base_url() . 'web_assets/' ?>images/pp.png" alt="" class="img-responsive payment-img">
                            </label>
                        </div>
                    </div>
                    <div class="paymnt">
                        <div class="radio pymntRadio">
                            <label>
                                <input type="radio" name="optionsRadios" value="wireTransfer"><span class="circle"></span><span class="check"></span>
                                <img src="<?php echo base_url() . 'web_assets/' ?>images/wt.png" alt="" class="img-responsive payment-img">
                            </label>
                        </div>  
                    </div>   
                </div>
                <hr>
                <div>
                    <label class="label label-default newSubLabels">Summary</label>
                    <ul class="list-unstyled subtotalValueUl">
                        <span id="tataldetails"></span>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 mb-20 ">
                <div class="mb-20 ">
                    <label class="label label-default newSubLabels">Terms & Conditions</label>
                </div> 
                <div class="bdrd pb-10">                    
                    <div class="scrollbar4" id="style-42">
                        <div class="force-overflow4">
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
                <input type="submit" id="submit" class="btn btn-info " value="Buy Now" disabled>
            </div>
            <hr>

        </form>
    </div>
</div>
<?php $this->load->view('templates/web_footer') ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#detail_cart').load("<?php echo site_url('product/load_cart'); ?>");
        $('#tataldetails').load("<?php echo site_url('product/show_cart_details'); ?>");

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