<?php
/**
 * The file that defines the bulk qrc_download admin area
 *
 * -facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      3.2.7
 *
 * @package    qrc_composer_pro
 * @subpackage qrc_composer_pro/admin
 */

class QRC_litentegrations{

    public function __construct()
    {

    add_action('admin_init', array($this ,'qrc_admin_integrate_page'));

}


public function qrc_admin_integrate_page()
{
    register_setting("qrc_admin_integrate", "qrc_admin_integrate", array($this ,'qr_log_option_page_sanitize'));
        
        add_settings_section("qrc_admin_integrate__section", " ", array($this ,'settting_log_sec_func'), 'qrc_admin_integrate_sec');

        add_settings_field("qrc_metavcard_display", esc_html__("Remove QR code from WooComerce", "qr-code-composer") ,array($this , "qrc_metavcard_display"), 'qrc_admin_integrate_sec', "qrc_admin_integrate__section");

        add_settings_field("qrc_userdsiplay", esc_html__("Author Page QR Code (Pro)", "qr-code-composer") ,array($this , "qrc_userdsiplay"), 'qrc_admin_integrate_sec', "qrc_admin_integrate__section", array('class'=>'premiumfe'));

        add_settings_field("qrc_bbpress_display", esc_html__("BB Press Plugin (Premium)", "qr-code-composer") ,array($this , "qrc_bbpress_display"), 'qrc_admin_integrate_sec', "qrc_admin_integrate__section", array('class'=>'premiumfe'));

        add_settings_field("qrc_bdypress_display", esc_html__("Buddy Press Plugin (Premium)", "qr-code-composer") ,array($this , "qrc_bdypress_display"), 'qrc_admin_integrate_sec', "qrc_admin_integrate__section", array('class'=>'premiumfe'));

        add_settings_field("qrc_dokan_display", esc_html__("Dokan Plugin (Premium)", "qr-code-composer") ,array($this , "qrc_dokan_display"), 'qrc_admin_integrate_sec', "qrc_admin_integrate__section", array('class'=>'premiumfe'));

    
}
    public function settting_log_sec_func()
    {
        return true;
    }
    function qrc_userdsiplay()
    {

       echo '[qrc_user]<p>'.esc_html__('This is a Shortcode for author page.', 'qr-code-composer').' <em> <a href=" https://qrcode-composer.dipashi.com/docs/author-page-qr-code">How to use</a></em></p>';
    }
    function qrc_metavcard_display()
    {

        $options = get_option('qrc_admin_integrate');

        $checked = isset($options['qrc_vcard_myacdash']) ? 'checked' : '';
        $addresss = isset($options['qrc_vcard_myacadrs']) ? 'checked' : '';

        printf('<p><input type="checkbox" id="myaccountdasg" value="qrc_vcard_myacdash" name="qrc_admin_integrate[qrc_vcard_myacdash]" %s><label for="myaccountdasg"><strong>'.esc_html__('Remove from My account dashboard' ,'qr-code-composer').'</strong></label> <a href="https://qrcode-composer.dipashi.com/docs/qr-code-for-customer-woocommerce/#0-toc-title" target="_blank">(how to use)</a></p>',$checked);

        printf('<p><input id="myaccountassd" type="checkbox" value="qrc_vcard_myacadrs" name="qrc_admin_integrate[qrc_vcard_myacadrs]" %s><label for="myaccountassd"><strong>'.esc_html__('Remove from My account Address' ,'qr-code-composer').'</strong></label> <a href="https://qrcode-composer.dipashi.com/docs/qr-code-for-customer-woocommerce/#1-toc-title"  target="_blank">(how to use)</a></p>',$addresss);

    }

    function qrc_bbpress_display()
    {
    ?>
    <select class="bbpressoptions">
        
    <option value="none"><?php esc_html_e('None', 'qr-code-composer'); ?></option>

    <option value="url"><?php esc_html_e('Auto Display QR as Memeber URL', 'qr-code-composer'); ?></option>
    <option value="vcard"><?php esc_html_e('Auto Display QR as Memeber vCard', 'qr-code-composer'); ?></option>
    <option value="shortcode"><?php esc_html_e('Shortcode for Memeber vCard', 'qr-code-composer'); ?></option>    

    </select><a id="qrcbbpress" video-url="https://www.youtube.com/watch?v=N_5Hl_qxJZc"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>
    <span class="shortcodes">
    <span>[bbpress-qrc-composer]</span>

<p>Developer tips: You can use this shortcode on BBPress Profile page hooks. <a href="https://qrcode-composer.dipashi.com/docs/qr-code-for-bbpress-plugin/"  target=_blank>Need Help?</a></p>
</span>
<div class="bbpressremovefiled">
    <em><?php echo esc_html__('Remove Field from vCard ', 'qr-code-composer') ?></em>
    <?php

        printf('<p><input id="bbfname" type="checkbox"><label for="bbfname"><strong>'.__('First Name','qr-code-composer').'</strong></label></p>');

        printf('<p><input id="bblname"  type="checkbox"><label for="bblname"><strong>'.__('Last Name','qr-code-composer').'</strong></label></p>');

        printf('<p><input id="bbniname"  type="checkbox"><label for="bbniname"><strong>'.__('Nickname','qr-code-composer').'</strong></label></p>');

        printf('<p><input id="bbmail"  type="checkbox"><label for="bbmail"><strong>'.__('Email','qr-code-composer').'</strong></label></p>');

        printf('<p><input  id="bbwebsite" type="checkbox"><label for="bbwebsite"><strong>'.__('Website','qr-code-composer').'</strong></label></p>'); 

        printf('<p><input id="bbfdes"  type="checkbox"><label for="bbfdes"><strong>'.__('Description','qr-code-composer').'</strong></label></p></div>');


    }

    function qrc_bdypress_display()
    {

    ?>
    <select class="qrbudypressoptions">
        
    <option value="none"><?php esc_html_e('None', 'qr-code-composer'); ?></option>

    <option value="url"><?php esc_html_e('Auto Display QR as Memeber URL', 'qr-code-composer'); ?></option>
    <option value="vcard"><?php esc_html_e('Auto Display QR as Memeber vCard', 'qr-code-composer'); ?></option> 
    <option value="shortcode"><?php esc_html_e('Shortcode for Memeber vCard', 'qr-code-composer'); ?></option>    

    </select><a id="qrcbdypress" video-url="https://www.youtube.com/watch?v=987t9BEmcSw"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>
    <span class="shortcodesr">
    <span>[buddypress-qrc-composer]</span>

    <p>Developer tips: You can use this shortcode in the hooks on the Buddy Press Profile page. <a href="https://qrcode-composer.dipashi.com/docs/qr-code-for-buddypress-plugin/">Need Help?</a></p>
    </span>
<div class="budypressremovefiled">
    <em><?php echo esc_html__('Remove Field from vCard ', 'qr-code-composer') ?></em>
    <?php

        printf('<p><input id="bbpfname"  type="checkbox"><label for="bbpfname"><strong>'.__('First Name','qr-code-composer').'</strong></label></p>');

        printf('<p><input id="bbplname"  type="checkbox"><label for="bbplname"><strong>'.__('Last Name','qr-code-composer').'</strong></label></p>');

        printf('<p><input id="bbplnic"  type="checkbox"><label for="bbplnic"><strong>'.__('Nickname','qr-code-composer').'</strong></label></p>');

        printf('<p><input id="bbpemail"  type="checkbox"><label for="bbpemail"><strong>'.__('Email','qr-code-composer').'</strong></label></p>');

        printf('<p><input id="bbpweb"  type="checkbox"><label for="bbpweb"><strong>'.__('Website','qr-code-composer').'</strong></label></p>'); 

        printf('<p><input id="bbpdes"  type="checkbox"><label for="bbpdes"><strong>'.__('Description','qr-code-composer').'</strong></label></p></div');


    }
    function qrc_dokan_display()
    {

    ?>
    <select class="dokanqrc">
        
    <option value="none"><?php esc_html_e('None', 'qr-code-composer'); ?></option>

    <option value="url"><?php esc_html_e('Auto Display QR as Verdor URL', 'qr-code-composer'); ?></option>
    <option value="vcard"><?php esc_html_e('Auto Display QR as Verdor vCard', 'qr-code-composer'); ?></option>

    <option value="shortcode"><?php esc_html_e('Shortcode for Verdor vCard', 'qr-code-composer'); ?></option>    

    </select><a id="qrcdokan" video-url="https://www.youtube.com/watch?v=7FRu8sE2wKA"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>
    <span class="shortcodesdokan">
    <span>[dokhan-qrc-composer]</span>

    <p>Developer tips: You can use this shortcode in the hooks on the Dokan Vernor Page. <a href="https://qrcode-composer.dipashi.com/docs/qr-code-for-dokan-vendor/" target=_blank>Need Help?</a></p>
    </span>
<div class="dokanremovefiled">
    <em><?php echo esc_html__('Remove Field from vCard ', 'qr-code-composer') ?></em>
    <?php

        printf('<p><input type="checkbox" id="venname"><label for="venname"><strong>'.__('Vendor Name','qr-code-composer').'</strong></label></p>');

        printf('<p><input type="checkbox"  id="venaddre"><label for="venaddre"><strong>'.__('Vendor Address','qr-code-composer').'</strong></label></p>');

        printf('<p><input type="checkbox"  id="venemail"><label for="venemail"><strong>'.__('Vendor email','qr-code-composer').'</strong></label></p>');

        printf('<p><input type="checkbox"  id="venphone"><label for="venphone"><strong>'.__('Vendor Phone','qr-code-composer').'</strong></label></p>');
    }


    /**
     * admin form field validation
     */

    public function qr_log_option_page_sanitize($input)
    {
    $sanitary_values = array();
  if (isset($input['qrc_vcard_myacadrs']))
    {
        $sanitary_values['qrc_vcard_myacadrs'] = sanitize_text_field($input['qrc_vcard_myacadrs']);
    }
      if (isset($input['qrc_vcard_myacdash']))
    {
        $sanitary_values['qrc_vcard_myacdash'] = sanitize_text_field($input['qrc_vcard_myacdash']);
    }

    return $sanitary_values;
    }

    }
    if(class_exists("QRC_litentegrations")){

        new QRC_litentegrations;
    }