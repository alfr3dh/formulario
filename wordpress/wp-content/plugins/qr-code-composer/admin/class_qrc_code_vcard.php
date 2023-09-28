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

class QRC_VcardLight{

    public function __construct()
    {

    add_action('admin_init', array($this ,'qrc_vcard_generator_page'));

}



public function qrc_vcard_generator_page()
{
    register_setting("qrc_vcard_generator", "qrc_vcard_generator", array($this ,'qr_log_option_page_sanitize'));
        

        add_settings_section("qrc_vacrd_admin__section", " ", array($this ,'settting_log_sec_func'), 'qrc_vacrd_admin_sec');

        add_settings_field("qrcvacr_vcard", esc_html__("Shortcode vCard", "qr-code-composer") , array($this ,"qr_code_vcard"), 'qrc_vacrd_admin_sec', "qrc_vacrd_admin__section");
        add_settings_field("qr_checkbox_vcrad", esc_html__("Enable the vCard metabox (Premium)", "qr-code-composer") ,array($this , "qr_checkboxsdsd"), 'qrc_vacrd_admin_sec', "qrc_vacrd_admin__section",array('class'=>'vacrdmeta'));

        add_settings_field("qrc_metavcard_display", esc_html__("Auto Display After The Content(Premium)", "qr-code-composer") ,array($this , "qrc_metavcard_display"), 'qrc_vacrd_admin_sec', "qrc_vacrd_admin__section", array('class'=>'vacrdmeauto'));



}


/**
 * This function is a callback function of  add seeting field
 */

public function qr_code_vcard()
{
 echo '<div class="QRautodisplayMetas">'.esc_html("This is a single vCard, which is displayed by the below shortcode", "qr-code-composer").'</div>';

    $options = get_option('qrc_vcard_generator');

    $qrcvcardsingle_name = isset($options['qrcvcardsingle_name']) ? $options['qrcvcardsingle_name'] : '';    
    $qrcvcardsingle_company = isset($options['qrcvcardsingle_company']) ? $options['qrcvcardsingle_company'] : '';
    $qrcvcardsingle_subtitle = isset($options['qrcvcardsingle_subtitle']) ? $options['qrcvcardsingle_subtitle'] : '';
    $qrcvcardsingle_mbunber = isset($options['qrcvcardsingle_mbunber']) ? $options['qrcvcardsingle_mbunber'] : '';
    $qrcvcardsingle_pbunber = isset($options['qrcvcardsingle_pbunber']) ? $options['qrcvcardsingle_pbunber'] : '';
    $qrcvcardsingle_email = isset($options['qrcvcardsingle_email']) ? $options['qrcvcardsingle_email'] : '';
    $qrcvcardsingle_address = isset($options['qrcvcardsingle_address']) ? $options['qrcvcardsingle_address'] : '';
    $qrcvcardsingle_note = isset($options['qrcvcardsingle_note']) ? $options['qrcvcardsingle_note'] : '';
    $qrcvcardsingle_website = isset($options['qrcvcardsingle_website']) ? $options['qrcvcardsingle_website'] : '';


    printf('<p><label class="mqrc_label">Name:</label>
        <input type="text" name="qrc_vcard_generator[qrcvcardsingle_name]"   value="%s" placeholder="Enter Name" id="mrc_wifi_p"></p><p>
        <label  class="mqrc_label">Company / Title:</label> 
            <input type="text"  name="qrc_vcard_generator[qrcvcardsingle_company]"   value="%s" placeholder="Enter Title" id="mrc_wifi_p" > </p><p>
            <label  class="mqrc_label">Sub Title:</label>    
            <input type="text"  name="qrc_vcard_generator[qrcvcardsingle_subtitle]"   value="%s" placeholder="Enter Subtitle" id="mrc_wifi_p"> </p><p>
            <label class="mqrc_label">Mobile Number:</label>    
            <input type="text"  name="qrc_vcard_generator[qrcvcardsingle_mbunber]"   value="%s" placeholder="Enter Mobile Number" id="mrc_wifi_p" > </p><p>
            <label  class="mqrc_label">Phone Number:</label>    
            <input type="text"  name="qrc_vcard_generator[qrcvcardsingle_pbunber]"   value="%s" placeholder="Enter Phone Number" id="mrc_wifi_p" ></p><p>
            <label class="mqrc_label">Email:</label>    
            <input type="text"  name="qrc_vcard_generator[qrcvcardsingle_email]"   value="%s" placeholder="Enter email" id="mrc_wifi_p" ></p><p>
            <label class="mqrc_label">Website:</label>    
            <input type="text"  name="qrc_vcard_generator[qrcvcardsingle_website]"   value="%s" placeholder="Enter website" id="mrc_wifi_p" ></p><p>
            <label class="mqrc_label">Address:</label>   
           <textarea name="qrc_vcard_generator[qrcvcardsingle_address]" placeholder="Enter Addess" id="mrc_wifi_p" >%s</textarea></p><p>
            <label class="mqrc_label">Note:</label>   
           <textarea name="qrc_vcard_generator[qrcvcardsingle_note]" placeholder="Enter Note" id="mrc_wifi_p" >%s</textarea></p>
            <p class="qr_st_val">
            <input id="qrcvacrdsingle" type="text" value="[qrc_vcard_single]" readonly>
            <button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qrcvacrdsingle">Copy</button></p><p><em>In premium version, this shortcode Attribute features is available</em></p>', $qrcvcardsingle_name, $qrcvcardsingle_company, $qrcvcardsingle_subtitle,$qrcvcardsingle_mbunber,$qrcvcardsingle_pbunber,$qrcvcardsingle_email, $qrcvcardsingle_website,$qrcvcardsingle_address,$qrcvcardsingle_note);



}


function qr_checkboxsdsd()
{
    echo '<div class="QRautodisplay">'.esc_html("These vCard QR codes are generated and displayed based on the post type (Premium)", "qr-code-composer").'<a id="pbrvcard" video-url="https://www.youtube.com/watch?v=xgdf97_GYWw"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a></div><p>';
    $args = array(
        'public' => true,
    );

        $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','wp_template','wp_template_part','wp_navigation','wp_global_styles');

    $types = get_post_types( $args);
    $post_types = array_diff($types, $excluded_posttypes);

    foreach ($post_types as $post_type)
    {
        $post_type_title = get_post_type_object($post_type);

        $options = get_option('qrc_vcard_generator');

        $checked = isset($options[$post_type]) ? 'checked' : '';

        printf('<input type="checkbox" id="ee%s" value="%s" name="qrc_vcard_generator[%s]" %s>
            <label for ="ee%s"><strong>' . $post_type_title->labels->name . '</strong></label></br>', $post_type, $post_type, $post_type, $checked, $post_type);



    }
    printf('</p><div><em>'.esc_html('Clicking this switcher button will automatically display the QR code after the content','qr-code-composer').' <a href="https://qrcode-composer.dipashi.com/docs/automatically-display-vcard/"> Need Help?</a></<em></div>');
}
function qrc_metavcard_display()
{

        printf('<input type="checkbox" class="apple-switch" ><div><em>'.esc_html('Auto Display After The Content(Premium','qr-code-composer').'</<em></div>');

    }

/**
 * This function is a callback function of  add seeting section
 */

public function settting_log_sec_func()
{
    return true;

}


/**
 * admin form field validation
 */

public function qr_log_option_page_sanitize($input)
{
    $sanitary_values = array();

    
    if (isset($input['qrcvcardsingle_name']))
    {
        $sanitary_values['qrcvcardsingle_name'] = sanitize_text_field($input['qrcvcardsingle_name']);
    }
    
    if (isset($input['qrcvcardsingle_company']))
    {
        $sanitary_values['qrcvcardsingle_company'] = sanitize_text_field($input['qrcvcardsingle_company']);
    }
    
    if (isset($input['qrcvcardsingle_subtitle']))
    {
        $sanitary_values['qrcvcardsingle_subtitle'] = sanitize_text_field($input['qrcvcardsingle_subtitle']);
    }
    
    if (isset($input['qrcvcardsingle_mbunber']))
    {
        $sanitary_values['qrcvcardsingle_mbunber'] = sanitize_text_field($input['qrcvcardsingle_mbunber']);
    }
    
    if (isset($input['qrcvcardsingle_pbunber']))
    {
        $sanitary_values['qrcvcardsingle_pbunber'] = sanitize_text_field($input['qrcvcardsingle_pbunber']);
    }
    
    if (isset($input['qrcvcardsingle_email']))
    {
        $sanitary_values['qrcvcardsingle_email'] = sanitize_text_field($input['qrcvcardsingle_email']);
    }
    
    if (isset($input['qrcvcardsingle_address']))
    {
        $sanitary_values['qrcvcardsingle_address'] = sanitize_text_field($input['qrcvcardsingle_address']);
    }
    
    if (isset($input['qrcvcardsingle_note']))
    {
        $sanitary_values['qrcvcardsingle_note'] = sanitize_text_field($input['qrcvcardsingle_note']);
    }
    
    if (isset($input['qrcvcardsingle_website']))
    {
        $sanitary_values['qrcvcardsingle_website'] = sanitize_text_field($input['qrcvcardsingle_website']);
    }


    $post_types = get_post_types();

    foreach ($post_types as $post_type)
    {

        if (isset($input[$post_type]))
        {
            $sanitary_values[$post_type] = $input[$post_type];
        }
    }

    return $sanitary_values;
}

}