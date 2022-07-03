<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('paypalIPN');
        $this->load->model('product_model');
    }

    public function index() {
        $data['page'] = "PayPal Payment";
        $data['page_header'] = "page-header2";
        $data['data'] = $this->product_model->get_all_product();
        $this->load->view('web/payment/product_view', $data);
    }

    function add_to_cart() {

        if (count($this->cart->contents()) > 0) {
            $content = $this->cart->contents();
            foreach ($this->cart->contents() as $items) {
                $data = array(
                    'rowid' => $items["rowid"],
                    'qty' => 0,
                );
                $this->cart->update($data);
            }
        }
        $data = array(
            'id' => $this->input->post('product_id'),
            'name' => $this->input->post('product_name'),
            'price' => $this->input->post('product_price'),
            'qty' => $this->input->post('quantity'),
            'type' => $this->input->post('product_license'),
        );
        $this->cart->insert($data);
        echo $this->show_cart();
    }

    function show_cart() {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                <tr>
                    <td data-title="Product Title" class="borderLeftNone pTitle">' .'<a href="'.base_url().'report/'. $items['id'].'">'.$items['name'] . '</td>
                    <td  data-title="Quantity" class="numeric">' . $items['qty'] . '</td>
                    <td data-title="SubTotal" class="numeric">' . $items['type'] . '</td>
                    <td data-title="Price" class="numeric color-green">' . '$' . number_format($items['price']) . '</td>
                </tr>
            ';

//             $output .= '
//                <tr>
//                    <td data-title="Product Title" class="borderLeftNone pTitle">' . $items['name'] . '</td>
//                    <td  data-title="Quantity Title" class="numeric">' . $items['qty'] . '</td>
//                    <td data-title="SubTotal" class="numeric">' . '$' . number_format($items['price']) . '</td>
//                    <td data-title="Total" class="numeric color-green">' . '$' . number_format($this->cart->total()) . '</td>
//                    <td data-title="Action" class="numeric borderRightNone color-green"><button type="button" id="' . $items['rowid'] . '" class="romove_cart btn btn-danger btn-sm">X</button></td>
//                </tr>
//            ';
        }
//        $output .= '
//            <tr>
//             . '$' . number_format($this->cart->total()) . 
//                <th colspan="3">Total</th>
//                <th colspan="2">' . '$' . number_format($this->cart->total()) . '</th>
//            </tr>
//        ';
        return $output;
    }

    function show_cart_total() {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                  <li>
                            <span class="stValue1">Subtotal :</span>
                            <span class="stValue2">' . '$' . number_format($items['subtotal']) . '</span>
                        </li>
                        <li>
                            <span class="stValue1">Discount :</span>
                            <span class="stValue2"> 0 %</span>
                        </li>
                        <li class="pt-15 subtotalValue">
                            <span class="stValue1">Total :</span>
                            <span class="stValue2"> ' . '$' . number_format($this->cart->total()) . '</span>
                        </li>
            ';
        }
//        $output .= '
//            <tr>
//             . '$' . number_format($this->cart->total()) . 
//                <th colspan="3">Total</th>
//                <th colspan="2">' . '$' . number_format($this->cart->total()) . '</th>
//            </tr>
//        ';
        return $output;
    }

    function load_cart() {
        echo $this->show_cart();
    }

    function show_cart_details() {
        echo $this->show_cart_total();
    }

    function delete_cart() {
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function buyNow($id) {
        if ($_POST) {
            $ip = $this->input->ip_address();
            if ($_POST['optionsRadios'] == "wireTransfer") {
                $to = $_POST['email'];
                $subject = 'Order_useto.in :' . $_POST['reportTitle'];
                $message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
                $message .= 'Our sales representative will reach out to you shortly with the Bank Details for wire transfer!</p><br/><br/>';
                $message .= '<p><b>Warm Regards,</b><br/>';
                $message .= 'Jay Matthews | Corporate Sales Specialist<br/>';
                $message .= 'E-mail: sales@useto.in | Web: www.strabayassociates.com</p>';

//                $this->data_model->sendMail($to, $subject, $message);

                $to = 'sales@useto.in';
                $subject = 'Buy Now- Wire Transfer:' . $_POST['reportTitle'];
                $message = '<b>Dear Admin,</b><br/>';
                $message .= '<table border = "1">';
                $message .= '<tr><td>Report ID</td>';
                $message .= '<td>' . $_POST['reportid'] . '</td></tr>';
                $message .= '<tr><td>Report Title</td>';
                $message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
                $message .= '<tr><td>Report Amount</td>';
                $message .= '<td>' . $_POST['price'] . '</td></tr>';
                $message .= '<tr><td>Name</td>';
                $message .= '<td>' . $_POST['name'] . '</td></tr>';
                $message .= '<tr><td>Email</td>';
                $message .= '<td>' . $_POST['email'] . '</td></tr>';
                $message .= '<tr><td>Phone</td>';
                $message .= '<td>' . $_POST['contact'] . '</td></tr>';
                $message .= '<tr><td>Company</td>';
                $message .= '<td>' . $_POST['company'] . '</td></tr>';
                $message .= '<tr><td>Designation</td>';
                $message .= '<td>' . $_POST['title'] . '</td></tr>';
                $message .= '<tr><td>Address</td>';
                $message .= '<td>' . $_POST['address'] . '</td></tr>';
                $message .= '<tr><td>City</td>';
                $message .= '<td>' . $_POST['city'] . '</td></tr>';
                $message .= '<tr><td>State</td>';
                $message .= '<td>' . $_POST['state'] . '</td></tr>';
                $message .= '<tr><td>Country</td>';
                $message .= '<td>' . $_POST['country'] . '</td></tr>';
                $message .= '<tr><td>Zip</td>';
                $message .= '<td>' . $_POST['zip'] . '</td></tr>';
                $message .= '<tr><td>IP</td>';
                $message .= '<td>' . $ip . '</td></tr>';
                $message .= '</table></p>';
                $this->data_model->sendMail($to, $subject, $message);

                redirect(base_url() . 'thankYou');
            } else {
                $oid = $this->data_model->getLast('order_id', array('field' => 'tid', 'type' => 'desc'), 'transactions')['order_id'];

                if ($oid) {
                    $Array['order_id'] = $oid + 1;
                } else {
                    $Array['order_id'] = 1201;
                }
                $Array['name'] = $_POST['name'];
                $Array['methord'] = $_POST['optionsRadios'];
                $Array['mail'] = $_POST['email'];
                $Array['contact'] = $_POST['contact'];
                $Array['company'] = $_POST['company'];
                $Array['title'] = $_POST['title'];
                $Array['report'] = $_POST['reportTitle'];
                $Array['address'] = $_POST['address'];
                $Array['city'] = $_POST['city'];
                $Array['state'] = $_POST['state'];
                $Array['country'] = $_POST['country'];
                $Array['zip'] = $_POST['zip'];


                $id = $this->data_model->add($Array, 'transactions');

                $Record = $this->data_model->get(array('tid' => $id), NULL, array('tid', 'order_id', 'methord', 'name', 'mail', 'contact', 'city', 'state', 'address', 'country', 'zip'), NULL, 'transactions')[0];

                if ($_POST['optionsRadios'] == 'ccAvenue') {

                    $to = $_POST['email'];
                    $subject = 'Order_useto.in :' . $_POST['reportTitle'];
                    $message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
                    $message .= 'Our sales representative will reach out to you shortly for further communication.</p><br/><br/>';
                    $message .= '<p><b>Warm Regards,</b><br/>';
                    $message .= 'Jay Matthews | Corporate Sales Specialist<br/>';
                    $message .= 'E-mail: sales@useto.in | Web: www.strabayassociates.com</p>';

//                    $this->data_model->sendMail($to, $subject, $message);

                    $to = 'sales@useto.in';
                    $subject = 'Buy Now- CCAvenue:' . $_POST['reportTitle'];
                    $message = '<b>Dear Admin,</b><br/>';
                    $message .= '<table border = "1">';
                    $message .= '<tr><td>Report ID</td>';
                    $message .= '<td>' . $_POST['reportid'] . '</td></tr>';
                    $message .= '<tr><td>Report Title</td>';
                    $message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
                    $message .= '<tr><td>Report Amount</td>';
                    $message .= '<td>' . $_POST['price'] . '</td></tr>';
                    $message .= '<tr><td>Name</td>';
                    $message .= '<td>' . $_POST['name'] . '</td></tr>';
                    $message .= '<tr><td>Email</td>';
                    $message .= '<td>' . $_POST['email'] . '</td></tr>';
                    $message .= '<tr><td>Phone</td>';
                    $message .= '<td>' . $_POST['contact'] . '</td></tr>';
                    $message .= '<tr><td>Company</td>';
                    $message .= '<td>' . $_POST['company'] . '</td></tr>';
                    $message .= '<tr><td>Designation</td>';
                    $message .= '<td>' . $_POST['title'] . '</td></tr>';
                    $message .= '<tr><td>Address</td>';
                    $message .= '<td>' . $_POST['address'] . '</td></tr>';
                    $message .= '<tr><td>City</td>';
                    $message .= '<td>' . $_POST['city'] . '</td></tr>';
                    $message .= '<tr><td>State</td>';
                    $message .= '<td>' . $_POST['state'] . '</td></tr>';
                    $message .= '<tr><td>Country</td>';
                    $message .= '<td>' . $_POST['country'] . '</td></tr>';
                    $message .= '<tr><td>Zip</td>';
                    $message .= '<td>' . $_POST['zip'] . '</td></tr>';
                    $message .= '<tr><td>IP</td>';
                    $message .= '<td>' . $ip . '</td></tr>';
                    $message .= '</table></p>';
                    $this->data_model->sendMail($to, $subject, $message);

                    $Array1['tid'] = $Record['tid'];
                    $Array1['merchant_id'] = '142405';
                    $Array1['order_id'] = $Record['order_id'];
                    $Array1['amount'] = $_POST['price'];
                    $Array1['currency'] = 'USD';
                    $Array1['redirect_url'] = base_url() . 'paymentResponce';
                    $Array1['cancel_url'] = base_url() . 'paymentResponce';
                    $Array1['language'] = 'EN';
                    $Array1['billing_name'] = $Record['name'];
                    $Array1['billing_email'] = $Record['mail'];
                    $Array1['billing_tel'] = $Record['contact'];
                    $Array1['billing_city'] = $Record['city'];
                    $Array1['billing_state'] = $Record['state'];
                    $Array1['billing_address'] = $Record['address'];
                    $Array1['billing_country'] = $Record['country'];
                    $Array1['billing_zip'] = $Record['zip'];

                    $this->data_model->makePayment($Array1);
                } elseif ($_POST['optionsRadios'] == 'payPal') { {
                        // print_r($_POST);
                        $to = $_POST['email'];
                        $subject = 'Order_useto.in :' . $_POST['reportTitle'];
                        $message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
                        $message .= 'Our sales representative will reach out to you shortly for further communication.</p><br/><br/>';
                        $message .= '<p><b>Warm Regards,</b><br/>';
                        $message .= 'Jay Matthews | Corporate Sales Specialist<br/>';
                        $message .= 'E-mail:�sales@useto.in�| Web:�www.strabayassociates.com</p>';

//                        $this->data_model->sendMail($to, $subject, $message);

                        $to = 'sales@useto.in';
//                        $to = 'sales@strabayassociates.com';
                        $subject = 'Buy Now- PayPal:' . $_POST['reportTitle'];
                        $message = '<table border = "1">';
                        $message .= '<tr><td>Report ID</td>';
                        $message .= '<td>' . $_POST['reportid'] . '</td></tr>';
                        $message .= '<tr><td>Report Title</td>';
                        $message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
                        $message .= '<tr><td>Report Amount</td>';
                        $message .= '<td>' . $_POST['price'] . '</td></tr>';
                        $message .= '<tr><td>Name</td>';
                        $message .= '<td>' . $_POST['name'] . '</td></tr>';
                        $message .= '<tr><td>Email</td>';
                        $message .= '<td>' . $_POST['email'] . '</td></tr>';
                        $message .= '<tr><td>Phone</td>';
                        $message .= '<td>' . $_POST['contact'] . '</td></tr>';
                        $message .= '<tr><td>Company</td>';
                        $message .= '<td>' . $_POST['company'] . '</td></tr>';
                        $message .= '<tr><td>Designation</td>';
                        $message .= '<td>' . $_POST['title'] . '</td></tr>';
                        $message .= '<tr><td>Address</td>';
                        $message .= '<td>' . $_POST['address'] . '</td></tr>';
                        $message .= '<tr><td>City</td>';
                        $message .= '<td>' . $_POST['city'] . '</td></tr>';
                        $message .= '<tr><td>State</td>';
                        $message .= '<td>' . $_POST['state'] . '</td></tr>';
                        $message .= '<tr><td>Country</td>';
                        $message .= '<td>' . $_POST['country'] . '</td></tr>';
                        $message .= '<tr><td>Zip</td>';
                        $message .= '<td>' . $_POST['zip'] . '</td></tr>';
                        $message .= '<tr><td>IP</td>';
                        $message .= '<td>' . $ip . '</td></tr>';
                        $message .= '</table></p>';
                        $this->data_model->sendMail($to, $subject, $message);
                        $data['title'] = $_POST['reportTitle'];
                        $data['id'] = $_POST['reportid'];
                        $data['amount'] = $_POST['price'];
                        $data['cancel'] = base_url() . 'paypalResp';
                        $data['return'] = base_url() . 'paypalResp';


                        $data['page'] = "PayPal Payment";
                        $data['page_header'] = "page-header2";

                        $this->load->view('web/payPalForm', $data);
                    }
                } elseif ($_POST['optionsRadios'] == 'razorPay') {

                    $to = $_POST['email'];
                    $subject = 'Order_useto.in :' . $_POST['reportTitle'];
                    $message = '<p>Thank you for ordering ' . $_POST['reportTitle'] . '<br/>';
                    $message .= 'Our sales representative will reach out to you shortly for further communication.</p><br/><br/>';
                    $message .= '<p><b>Warm Regards,</b><br/>';
                    $message .= 'Jay Matthews | Corporate Sales Specialist<br/>';
                    $message .= 'E-mail:�sales@useto.in�| Web:�www.strabayassociates.com</p>';

//                    $this->data_model->sendMail($to, $subject, $message);

                    $to = 'sales@useto.in';
                    $subject = 'Buy Now- razorPay:' . $_POST['reportTitle'];
                    $message = '<table border = "1">';
                    $message .= '<tr><td>Report ID</td>';
                    $message .= '<td>' . $_POST['reportid'] . '</td></tr>';
                    $message .= '<tr><td>Report Title</td>';
                    $message .= '<td>' . $_POST['reportTitle'] . '</td></tr>';
                    $message .= '<tr><td>Report Amount</td>';
                    $message .= '<td>' . $_POST['price'] . '</td></tr>';
                    $message .= '<tr><td>Name</td>';
                    $message .= '<td>' . $_POST['name'] . '</td></tr>';
                    $message .= '<tr><td>Email</td>';
                    $message .= '<td>' . $_POST['email'] . '</td></tr>';
                    $message .= '<tr><td>Phone</td>';
                    $message .= '<td>' . $_POST['contact'] . '</td></tr>';
                    $message .= '<tr><td>Company</td>';
                    $message .= '<td>' . $_POST['company'] . '</td></tr>';
                    $message .= '<tr><td>Designation</td>';
                    $message .= '<td>' . $_POST['title'] . '</td></tr>';
                    $message .= '<tr><td>Address</td>';
                    $message .= '<td>' . $_POST['address'] . '</td></tr>';
                    $message .= '<tr><td>City</td>';
                    $message .= '<td>' . $_POST['city'] . '</td></tr>';
                    $message .= '<tr><td>State</td>';
                    $message .= '<td>' . $_POST['state'] . '</td></tr>';
                    $message .= '<tr><td>Country</td>';
                    $message .= '<td>' . $_POST['country'] . '</td></tr>';
                    $message .= '<tr><td>Zip</td>';
                    $message .= '<td>' . $_POST['zip'] . '</td></tr>';
                    $message .= '<tr><td>IP</td>';
                    $message .= '<td>' . $ip . '</td></tr>';
                    $message .= '</table></p>';
                    $this->data_model->sendMail($to, $subject, $message);
                    $data['title'] = $_POST['reportTitle'];
                    $data['id'] = $_POST['reportid'];
                    $data['amount'] = $_POST['price'];
                    $data['cancel'] = base_url() . 'paypalResp';
                    $data['return'] = base_url() . 'paypalResp';


                    $data['page'] = "Razor Pay Payment";
                    $data['page_header'] = "page-header2";


                    $data['itemInfo'] = [
                        "key" => RAZOR_KEY_ID,
                        "price" => round($_POST['price']),
                        "name" => $_POST['name'],
                        "currency" => "USD",
                        "description" => $_POST['reportTitle'],
                        "image" => "https://www.strabayassociates.com/web_assets/images/logo.png",
                        "prefill" => [
                            "name" => $_POST['name'],
                            "email" => $_POST['email'],
                            "contact" => $_POST['contact'],
                        ],
                        "notes" => [
                            "address" => "INIDA",
                            "merchant_order_id" => $_POST['reportid'],
                        ],
                        "theme" => [
                            "color" => "#F37254"
                        ],
                        "order_id" => $_POST['reportid'],
                    ];
                    $data['return_url'] = site_url() . 'razorpay/callback';
                    $data['surl'] = site_url();
                    ;
                    $data['furl'] = site_url();
                    ;
                    $data['currency_code'] = 'USD';
                    $this->load->view('razorpay/checkout', $data);

//                    $this->load->view('web/payPalForm', $data);
                }
            }
        } else {
            $cond = array('report.id' => $id);
            $tbls[0] = array('name' => 'report_details', 'condi' => 'report.id = report_details.id');
            $fields = array('report.id', 'title', 'single_price', 'multi_price', 'ent_price', 'meta_title', 'meta_keyword');
            $data['Report'] = $this->data_model->get($cond, $tbls, $fields, NULL, 'report')[0];
            $data['price'] = @$_GET['price'] != "" ? @$_GET['price'] : "single_price";
            $data['mode'] = @$_GET['mode'] != "" ? @$_GET['mode'] : "";
            $data['type'] = @$_GET['type'] != "" ? @$_GET['type'] : "";
            $data['page'] = 'Buy Now';
            $data['page_header'] = "page-header2";
            $this->load->view('web/buyNow', $data);
        }
    }

}
