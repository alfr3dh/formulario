<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      3.1.0
 *
 * @package    qrc_composer_pro
 * @subpackage qrc_composer_pro/admin
 */
class QRC_Shortcode_lite {
    public function __construct() {
        add_action("init", [$this, "qrc_link_shortcode"]);
        add_action("woocommerce_after_edit_account_address_form", [$this, "qrccomposer_edit_account_address_form", ]);
        add_action("show_user_profile", [$this, "qrc_user_profile_fields"]);
        add_action("edit_user_profile", [$this, "qrc_user_profile_fields"]);
        add_action("woocommerce_account_dashboard", [$this, "qrc_woo_accountdash", ]);
    }
    function qrc_link_shortcode() {
        add_shortcode("qrc_vcard_single", [$this, "qrc_vcard_single_atts"]);
    }
    function qrc_vcard_single_atts($atts) {
            $options1 = get_option("qrc_composer_settings");
            $size = isset($options1["qr_code_picture_size_width"]) ? $options1["qr_code_picture_size_width"] : 200;
            $download_qr = isset($options1["qr_download_text"]) ? $options1["qr_download_text"] : esc_html__("Download QR", "qr-code-composer");

            $qr_dwnbtn_color  = isset($options1["qr_dwnbtn_color"]) ? $options1["qr_dwnbtn_color"] : "#000";

            $qr_dwnbtnbg_color = isset($options1["qr_dwnbtnbg_color"]) ? $options1["qr_dwnbtnbg_color"] : "#c8fd8c";
            $qrcvcrad_wnload_hide = isset($options1["qr_download_hide"]) ? $options1["qr_download_hide"] : "no";
$options = get_option('qrc_vcard_generator');

        $name = isset($options['qrcvcardsingle_name']) ? $options['qrcvcardsingle_name'] : '';    
        $company = isset($options['qrcvcardsingle_company']) ? $options['qrcvcardsingle_company'] : '';
        $subtitle = isset($options['qrcvcardsingle_subtitle']) ? $options['qrcvcardsingle_subtitle'] : '';
        $mobile = isset($options['qrcvcardsingle_mbunber']) ? $options['qrcvcardsingle_mbunber'] : '';
        $phone = isset($options['qrcvcardsingle_pbunber']) ? $options['qrcvcardsingle_pbunber'] : '';
        $email = isset($options['qrcvcardsingle_email']) ? $options['qrcvcardsingle_email'] : '';
        $address = isset($options['qrcvcardsingle_address']) ? $options['qrcvcardsingle_address'] : '';
        $note = isset($options['qrcvcardsingle_note']) ? $options['qrcvcardsingle_note'] : '';
        $website = isset($options['qrcvcardsingle_website']) ? $options['qrcvcardsingle_website'] : '';

        wp_enqueue_script('qrcvcardcontent');
        ob_start();
        if ($qrcvcrad_wnload_hide == "no") {
            $qr_download_ = '<div><a id="QRCdownloads" download="' . $name . '.png">
           <button type="button" style="min-width:' . $size . "px;background:" . $qr_dwnbtnbg_color . ";color:" . $qr_dwnbtn_color . ';font-weight: 600;border: 1px solid transparent;padding: 6px 0;margin-top: 12px;" class="uqr_code_btn">' . esc_html__($download_qr, "qr-code-composer") . '</button>
           </a></div>';
        } else {
            $qr_download_ = "";
        }

    

        $mastervcard = "BEGIN:VCARD\nVERSION:3.0\nN:" . $name . "\nORG:" . $company . "\nTITLE:" . $subtitle . "\nTEL:" . $phone . "\nTEL:" . $mobile . "\nURL:" . $website . "\nEMAIL:" . $email . "\nADR:" . $address . "\nNOTE:" . $note . "\nEND:VCARD";
        return '<div class="qrcprowrapper"><div class="qrc_vcardcontent" data-text="' . $mastervcard . '" id="qrcodeimages"></div>' . $qr_download_ . "</div>" . ob_get_clean();
    }
    function qrc_user_profile_fields($user) {
    ?>
    <h3><?php esc_html_e("QR Code", "qr-code-composer"); ?> <small><?php esc_html_e("(QR code composer)", "qr-code-composer"); ?></small></h3> 
    <?php
        $user_id = $user->ID;
        $options = get_option("qrc_composer_settings");
        $size = isset($options["qr_code_picture_size_width"]) ? $options["qr_code_picture_size_width"] : 200;
        $user_info = get_userdata($user_id);
        $name = $user_info->first_name . " " . $user_info->last_name;
        $user_email = $user_info->user_email;
        $user_url = $user_info->user_url;
        $display_name = $user_info->display_name;
        $description = $user_info->description;
        $qr_download_ = '<a id="QRCdownload" class="djkhfkjhurfg" style="width:' . $size . 'px;">
           <button type="button" class="button button-secondary is-button is-default is-large">' . esc_html__("Download QR", "qr-code-composer") . '</button>
           </a>';
        $mastervcard = "BEGIN:VCARD\nVERSION:3.0\nN:" . $name . "\nTITLE:" . $display_name . "\nTEL:" . $user_url . "\nEMAIL:" . $user_email . "\nNOTE:" . $description . "\nEND:VCARD";
        return printf('<div class="qrcprowrapper"><div class="qrc_qrcode" data-text="' . $mastervcard . '"></div>' . $qr_download_ . "</div>");
    }
    function qrc_woo_accountdash() {
        if (class_exists("WooCommerce")) {

    $options = get_option('qrc_admin_integrate');

    $checked = isset($options['qrc_vcard_myacdash']) ? 'checked' : '';
    if($checked != 'checked'){
     wp_enqueue_script('qrcvcardcontent');

            $options = get_option("qrc_composer_settings");
            $size = isset($options["qr_code_picture_size_width"]) ? $options["qr_code_picture_size_width"] : 200;
            $download_qr = isset($options["qr_download_text"]) ? $options["qr_download_text"] : esc_html__("Download QR", "qr-code-composer");

            $qr_dwnbtn_color  = isset($options["qr_dwnbtn_color"]) ? $options["qr_dwnbtn_color"] : "#000";

            $qr_dwnbtnbg_color = isset($options["qr_dwnbtnbg_color"]) ? $options["qr_dwnbtnbg_color"] : "#c8fd8c";
            $qrcvcrad_wnload_hide = isset($options["qr_download_hide"]) ? $options["qr_download_hide"] : "no";
            $user_meta = get_current_user_id();
            $user_info = get_userdata($user_meta);
            $name = $user_info->first_name . " " . $user_info->last_name;
            $user_email = $user_info->user_email;
            $user_url = $user_info->user_url;
            $display_name = $user_info->display_name;
            $description = $user_info->description;
            if ($qrcvcrad_wnload_hide == "no") {
                $qr_download_ = '<div><a id="QRCdownloads1" download="' . $name . '.png">
           <button type="button" style="min-width:' . $size . "px;background:" . $qr_dwnbtnbg_color . ";color:" . $qr_dwnbtn_color . ';font-weight: 600;border: 1px solid transparent;padding: 6px 0;margin-top: 12px;" class="uqr_code_btn">' . esc_html__($download_qr, "qr-code-composer") . '</button>
           </a></div>';
            } else {
                $qr_download_ = "";
            }
            $mastervcard = "BEGIN:VCARD\nVERSION:3.0\nN:" . $name . "\nTITLE:" . $display_name . "\nTEL:" . $user_url . "\nEMAIL:" . $user_email . "\nNOTE:" . $description . "\nEND:VCARD";
         echo '<div class="qrcprowrapper"><div class="qrc_vcardcontent" data-text="'.$mastervcard.'"></div>'.$qr_download_.'</div>';
        }
        }

    }
        function qrccomposer_edit_account_address_form() {
        if (class_exists("WooCommerce")) {

        $inte = get_option('qrc_admin_integrate');

        $checked = isset($inte['qrc_vcard_myacadrs']) ? 'checked' : '';
        if($checked != 'checked'){

                $options = get_option("qrc_composer_settings");
            $size = isset($options["qr_code_picture_size_width"]) ? $options["qr_code_picture_size_width"] : 200;
            $download_qr = isset($options["qr_download_text"]) ? $options["qr_download_text"] : esc_html__("Download QR", "qr-code-composer");

            $qr_dwnbtn_color  = isset($options["qr_dwnbtn_color"]) ? $options["qr_dwnbtn_color"] : "#000";

            $qr_dwnbtnbg_color = isset($options["qr_dwnbtnbg_color"]) ? $options["qr_dwnbtnbg_color"] : "#c8fd8c";
            $qrcvcrad_wnload_hide = isset($options["qr_download_hide"]) ? $options["qr_download_hide"] : "no";
            $user_meta = get_current_user_id();
            $customer = new WC_Customer($user_meta);
            $user_info = get_userdata($user_meta);
            $user_email = $user_info->user_email;
            $get_url = $user_info->user_url;
            $display_name = $user_info->display_name;
            // Customer billing information details (from account)
            $billing_first_name = $customer->get_billing_first_name();
            $billing_last_name = $customer->get_billing_last_name();
            $billing_company = $customer->get_billing_company();
            $billing_address_1 = $customer->get_billing_address_1();
            $billing_address_2 = $customer->get_billing_address_2();
            $billing_city = $customer->get_billing_city();
$billing_state = isset(WC()->countries->get_states($customer->get_billing_country())[$customer->get_billing_state()])?WC()->countries->get_states($customer->get_billing_country())[$customer->get_billing_state()]:'';
            $billing_postcode = $customer->get_billing_postcode();
            $billing_phone = $customer->get_billing_phone();
$billing_country = isset(WC()->countries->countries[$customer->get_billing_country()])? WC()->countries->countries[$customer->get_billing_country()]:'';

            $name1 = $billing_first_name . " " . $billing_last_name;
            $user_email = $customer->get_email(); // Get account email
            $first_name = $customer->get_first_name();
            $last_name = $customer->get_last_name();
            $display_name = $customer->get_display_name();
            // Customer shipping information details (from account)
            $shipping_first_name = $customer->get_shipping_first_name();
            $shipping_last_name = $customer->get_shipping_last_name();
            $shipping_company = $customer->get_shipping_company();
            $shipping_address_1 = $customer->get_shipping_address_1();
            $shipping_address_2 = $customer->get_shipping_address_2();
            $shipping_city = $customer->get_shipping_city();
 $shipping_state = isset(WC()->countries->get_states($customer->get_shipping_country())[$customer->get_shipping_state()])? WC()->countries->get_states($customer->get_shipping_country())[$customer->get_shipping_state()]: '';
            $shipping_postcode = $customer->get_shipping_postcode();
    $shipping_country = isset(WC()->countries->countries[$customer->get_shipping_country()])? WC()->countries->countries[$customer->get_shipping_country()]: '';


            $name2 = $shipping_first_name . " " . $shipping_last_name;
            echo '<div class="woocommerce"><div class="col2-set">';
            if ($billing_first_name) {
                 wp_enqueue_script('qrcvcardcontent');
                if ($qrcvcrad_wnload_hide == "no") {
        $qr_download_ = '<a id="QRCdownloads" download="' . $name1 . '.png" >
                <button style="min-width:' . $size . 'px;color:'.$qr_dwnbtn_color.';background:'.$qr_dwnbtnbg_color.';font-weight: 600;border: 1px solid transparent;padding: 6px 0;margin-top: 12px;" type="button"  class="uqr_code_btn">' . $download_qr . '</button>
                </a>';
                } else {
                    $qr_download_ = "";
                }
                $address1 = $billing_address_1 . " " . $billing_address_2 . ", " . $billing_city . ", " . $billing_state . ", " . $billing_country . " " . $billing_postcode;
        $mastervcard1 = "BEGIN:VCARD\nVERSION:3.0\nN:" . $name1 . "\nORG:" . $billing_company . "\nTEL:" . $billing_phone . "\nURL:" . $get_url . "\nEMAIL:" . $user_email . "\nADR:" . $address1 . "\nEND:VCARD";
         echo '<div class="col-1"><div class="qrcprowrapper"><div class="qrc_vcardcontent" id="billing" data-text="'.$mastervcard1.'"></div>'.$qr_download_.'</div></div>';
            }
            if ($shipping_first_name) {

            wp_enqueue_script('qrcvcardcontent');     
                if ($qrcvcrad_wnload_hide == "no") {
        $qr_download_ = '<a id="QRCdownloads1" download="' . $name2 . '.png" >
                <button style="min-width:' . $size . 'px;color:'.$qr_dwnbtn_color.';background:'.$qr_dwnbtnbg_color.';font-weight: 600;border: 1px solid transparent;padding: 6px 0;margin-top: 12px;" type="button"  class="uqr_code_btn">' . $download_qr . '</button>
                </a>';
                } else {
                    $qr_download_ = "";
                }
                $address2 = $shipping_address_1 . '\n' . $shipping_address_2 . '\n' . $shipping_city . '\n' . $shipping_state . '\n' . $shipping_postcode . '\n' . $shipping_country;
                $mastervcard2 = "BEGIN:VCARD\nVERSION:3.0\nN:" . $name2 . "\nORG:" . $shipping_company . "\nTEL:" . $billing_phone . "\nURL:" . $get_url . "\nEMAIL:" . $user_email . "\nADR:" . $address2 . "\nEND:VCARD";
        echo '<div class="col-1"><div class="qrcprowrapper"><div class="qrc_vcardcontent" id="shippings" data-text="'.$mastervcard2.'"></div>'.$qr_download_.'</div></div>';
            }
            echo "</div></div>";
        }
        }
    }
}
if (class_exists("QRC_Shortcode_lite")) {
    new QRC_Shortcode_lite();
}
