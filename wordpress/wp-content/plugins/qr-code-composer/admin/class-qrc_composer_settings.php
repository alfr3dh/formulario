<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      1.0.9
 *
 * @package    qrc_composer_pro
 * @subpackage qrc_composer_pro/admin
 */

class QR_code_Admin_settings{

        public function __construct()
        {
        add_action('admin_init', array($this ,'qcr_settings_page'));



    }

    public function qcr_settings_page()
    {

    register_setting("qrc_composer_settings", "qrc_composer_settings", array($this ,'qrc_option_page_sanitize')); 
    
    add_settings_section("qrc_design_section", " ", array($this ,'settting_sec_desfifn'), 'qrc_design_sec');
    
    add_settings_section("qrc_download_section", " ", array($this ,'settting_sec_func'), 'qrc_admin_sec');

    add_settings_field("qrc_ecorenlevel", esc_html__("Error Correction Level", "qr-code-composer") , array($this ,"qrc_ecorenlevel"), 'qrc_design_sec', "qrc_design_section");

    add_settings_field("qrc_minversion", esc_html__("Min Version", "qr-code-composer") , array($this ,"qrc_minversion"), 'qrc_design_sec', "qrc_design_section");

    add_settings_field("qrc_roundcorner", esc_html__("Rounded Corners", "qr-code-composer") , array($this ,"qrc_roundcorner"), 'qrc_design_sec', "qrc_design_section");

    add_settings_field("qrc_quitzone", esc_html__("Margin", "qr-code-composer") , array($this ,"qrc_quitzone"), 'qrc_design_sec', "qrc_design_section");

    add_settings_field("qr_color_management", esc_html__("QR Color (Pro)", "qr-code-composer") ,array($this , "qr_color_management"), 'qrc_design_sec', "qrc_design_section", array('class' =>'premiumversion'));

    add_settings_field("qr_bgcolor_management", esc_html__("QR Background Color (Pro)", "qr-code-composer") , array($this ,"qr_bgcolor_management"), 'qrc_design_sec', "qrc_design_section", array('class' =>'premiumversion'));

    add_settings_field("qrc_logo_image", esc_html__(" Logo Image (Pro)", "qr-code-composer") , array($this ,"qrc_logo_image"), 'qrc_design_sec', "qrc_design_section", array('class' =>'premiumversion'));

    add_settings_field("qrc_imagesize", esc_html__("Image Size", "qr-code-composer") , array($this ,"qrc_imagesize"), 'qrc_design_sec', "qrc_design_section", array('class' =>'premiumversion'));


    add_settings_field("qr_code_size", esc_html__("Front QR Code Size", "qr-code-composer") ,array($this , "qr_input_size"), 'qrc_design_sec', "qrc_design_section");

    add_settings_field("qr_code_dsize", esc_html__("Download QR Code Size(Pro)", "qr-code-composer") ,array($this , "qr_code_dsize"), 'qrc_design_sec', "qrc_design_section", array('class' =>'premiumversion'));

    add_settings_field("qr_download_text", esc_html__("Download QR Button", "qr-code-composer") , array($this ,"qr_download_text"), 'qrc_design_sec', "qrc_design_section");
    add_settings_field("qr_alignment", esc_html__("QR Alignment", "qr-code-composer") , array($this ,"qr_alignment"), 'qrc_admin_sec', "qrc_download_section");

    if (class_exists('WooCommerce'))
    {

        add_settings_field("wc_qr_alignment", esc_html__(" Product Qr Alignment", "qr-code-composer") , array($this ,"wc_qr_alignment"), 'qrc_admin_sec', "qrc_download_section");

        add_settings_field("qrc_wc_ptab_name", esc_html__("Change Text of Product Tab", "qr-code-composer") ,array($this , "qrc_wc_ptab_name"), 'qrc_admin_sec', "qrc_download_section");

    }

    add_settings_field("qr_checkbox", esc_html__("Hide QR code according to post type", "qr-code-composer") ,array($this , "qr_checkbox"), 'qrc_admin_sec', "qrc_download_section");


    add_settings_field("qr_checkbox_page", esc_html__("Hide QR code according to Page", "qr-code-composer") , array(
        $this,
        "qr_checkbox_page"
    ) , 'qrc_admin_sec', "qrc_download_section");




    add_settings_field("qr_stcode_management", esc_html__("Shortcode for Current Page URL(Pro)", "qr-code-composer") ,array($this , "qr_stcode_management"), 'qrc_admin_sec', "qrc_download_section", array('class'=>'vacrdmeauto'));

    }
   /**
     * This function is a callback function of  add seeting section
     */
    function settting_sec_desfifn()
    {   
        return true;
    }
    function settting_sec_func()
    {   
        echo '<div class="QRautodss">'.esc_html("These QR codes are automatically displayed after the content", "qr-code-composer").'<a id="qrcauto" video-url="https://www.youtube.com/watch?v=LyQGEShmhn8"><span title="Video Documentation" id="qrcdocsides" class="dashicons dashicons-video-alt3"></span></a></div>';
    }

    public function qrc_imagesize() {
    $options = get_option('qrc_composer_settings');
    $imagesize = isset($options['mSize']) ? $options['mSize'] : '20';
        printf(
            '<input type="range"  class="qrcrange" min="5" max="40" step="1" name="qrc_composer_settings[mSize]" id="imagesize" value="%s" oninput="this.nextElementSibling.value = this.value"><output class="rangeoutouy">%s</output><p class="qrc_description">'.esc_html__('Please adjust the image size according to the QR code for better scanning','qr-code-composer').'</p>',$imagesize,$imagesize);
    }

    public function qrc_minversion() {
    $options = get_option('qrc_composer_settings');
    $minversion = isset($options['minVersion']) ? $options['minVersion'] : '1';

        printf(
            '<input type="range"  class="qrcrange" min="1" max="10" step="1" name="qrc_composer_settings[minVersion]" id="minversion" value="%s" oninput="this.nextElementSibling.value = this.value"><output class="rangeoutouy">%s</output>',$minversion,$minversion);


    }

    public function qrc_ecorenlevel() {

    $options = get_option('qrc_composer_settings');
    $ecLevel = isset($options['ecLevel']) ? $options['ecLevel'] : 'L';

        ?>
        <select name="qrc_composer_settings[ecLevel]" id="ecLevel">
            <option value="H" <?php echo esc_attr($ecLevel) == 'H' ? 'selected' : '' ?>>H - high (30%)</option>
            <option value="Q" <?php echo esc_attr($ecLevel) == 'Q' ? 'selected' : '' ?>>Q - quartile (25%)</option>

            <option value="M" <?php echo esc_attr($ecLevel) == 'M' ? 'selected' : '' ?>>M - medium (15%)</option>
            <option value="L" <?php echo esc_attr($ecLevel) == 'L' ? 'selected' : '' ?>>L - low (7%)</option>
        </select>
        <?php
    }

 public function qrc_quitzone() {

    $options = get_option('qrc_composer_settings');
    $quiet = isset($options['quiet']) ? $options['quiet'] : '0';

        printf(
            '<input type="range" min="0" max="4" step="1" name="qrc_composer_settings[quiet]" class="qrcrange" id="quiet" value="%s" oninput="this.nextElementSibling.value = this.value"><output class="rangeoutouy">%s</output>',$quiet,$quiet);

    }

    public function qrc_roundcorner() {

    $options = get_option('qrc_composer_settings');
    $rounded = isset($options['rounded']) ? $options['rounded'] : '100';

        printf('<input type="range"  class="qrcrange" min="0" max="100" step="10" name="qrc_composer_settings[rounded]" id="rounded" value="%s" oninput="this.nextElementSibling.value = this.value"><output class="rangeoutouy">%s</output>',$rounded,$rounded);

    }



function qr_checkbox_page(){


        $qrc_type_pages = get_posts(array(
            'post_type' => 'page',
            'posts_per_page' => - 1,
        ));
        if ($qrc_type_pages)
        {
            foreach ($qrc_type_pages as $qrc_type_page){

        $options = get_option('qrc_composer_settings');

        $checked = isset($options[$qrc_type_page->ID]) ? 'checked' : '';

            printf('<div><input type="checkbox" id="%s"  value="%s" name="qrc_composer_settings[%s]" %s><label for ="%s" ><strong>' . $qrc_type_page->post_title . '</strong></label></div>', $qrc_type_page->ID, $qrc_type_page->ID, $qrc_type_page->ID, $checked,$qrc_type_page->ID);


        }


        echo '</div><p class="description">'.esc_html('If you want to remove the QR code from the specified page, click the checkbox. You can also do this from the Meta Box section','qr-code-composer').'</p>';
        }
    }

function qrc_wc_ptab_name()
{

    $options = get_option('qrc_composer_settings');
    $qrc_wc_ptab_name = isset($options['qrc_wc_ptab_name']) ? $options['qrc_wc_ptab_name'] : 'QR Code';

    printf('<input type="text" name="qrc_composer_settings[qrc_wc_ptab_name]" value="%s" placeholder="e:g: QR Code">', $qrc_wc_ptab_name); 

}

function qr_checkbox()
{

    $args = array(
        'public' => true,
    );

        $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','wp_template','wp_template_part','wp_navigation','wp_global_styles');

    $types = get_post_types( $args);
    $post_types = array_diff($types, $excluded_posttypes);

    foreach ($post_types as $post_type)
    {
        $post_type_title = get_post_type_object($post_type);

        $options = get_option('qrc_composer_settings');

        $checked = isset($options[$post_type]) ? 'checked' : '';

        printf('<input type="checkbox" id="%s" value="%s" name="qrc_composer_settings[%s]" %s>
            <label for ="%s"><strong>' . $post_type_title->labels->name . '</strong></label></br>', $post_type, $post_type, $post_type, $checked, $post_type);




    }

    echo '<p class="description">'.esc_html('If you want to remove QR codes from certain post types, click the checkbox','qr-code-composer').'</p>';


}

/**
 * This function is a callback function of  add seeting field
 */

function qr_input_size()
{

    $options = get_option('qrc_composer_settings');
    $options_value = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width'] : 200;
    $placeholder = esc_html('QR code Image frontend size; default 200px', 'qr-code-composer');

    printf('<input type="number" min="50" max="500" step="50" id="qwe_sizw" name="qrc_composer_settings[qr_code_picture_size_width]"   value="%s"  required><p class="qrc_description">%s</p>', $options_value, $placeholder);

}
/**
 * This function is a callback function of  add seeting field
 */

function qr_code_dsize()
{
    $placeholder = esc_html('QR code download image Quality; default 700px', 'qr-code-composer');
    printf('<input type="number" min="500" max="10000" step="100" value="700"><p class="qrc_description">%s  <a href="https://sharabindu.com/plugins/qr-code-composer/" target="_blank">Get Premium</a></p>',$placeholder);

}

/**
 * This function is a callback function of  add seeting field
 */

function qr_alignment()
{

    $options = get_option('qrc_composer_settings');
    $qrc_alignment = isset($options['qrc_select_alignment']) ? $options['qrc_select_alignment'] : '';

    ?>
    <select name="qrc_composer_settings[qrc_select_alignment]" id="live_qr_alignment">
        
    <option value="left" <?php echo esc_attr($qrc_alignment) == 'left' ? 'selected' : '' ?>><?php esc_html_e('Left', 'qr-code-composer'); ?></option>
    <option value="right" <?php echo esc_attr($qrc_alignment) == 'right' ? 'selected' : '' ?>><?php esc_html_e('Right', 'qr-code-composer'); ?></option>   
    <option value="center" <?php echo esc_attr($qrc_alignment) == 'center' ? 'selected' : '' ?>><?php esc_html_e('Center', 'qr-code-composer'); ?></option>

    </select>

    <?php
}

/**
 * This function is a callback function of  add seeting field
 */

function qr_download_text()
{

    $options = get_option('qrc_composer_settings');
    $options_value = isset($options['qr_download_text']) ? $options['qr_download_text'] : 'Download QR';

    $qr_download_hide = isset($options['qr_download_hide']) ? $options['qr_download_hide'] : 'no';

 
  

    ?>
    <div class="qrdownlaodtext">
    <strong>
    <label class="qrc_dwnbtnlabel"><?php esc_html_e('Remove?', 'qr-code-composer'); ?></label></strong>
    <select name="qrc_composer_settings[qr_download_hide]" class="qrcremovedownlaod">
        
    <option value="yes" <?php echo esc_attr($qr_download_hide) == 'yes' ? 'selected' : '' ?>><?php esc_html_e('Remove Download Button', 'qr-code-composer'); ?></option>
    <option value="no" <?php echo esc_attr($qr_download_hide) == 'no' ? 'selected' : '' ?>><?php esc_html_e('Keep Download Button', 'qr-code-composer'); ?></option>    

    </select>
   <div class="removealsscolors">
<?php
   printf('<p><strong>
    <label class="qrc_dwnbtnlabel">'.esc_html("Label", "qr-code-composer").'</label></strong><input type="text" name="qrc_composer_settings[qr_download_text]" value="%s" placeholder="Download Qr" id="inputetxtas"></p>', $options_value); 
    $value = (isset($options['qr_dwnbtn_color'])) ? $options['qr_dwnbtn_color'] : '#000';
    printf('<p class="qrc_dwnbtn"><strong>
    <label class="qrc_dwnbtnlabel">'.esc_html("Color", "qr-code-composer").'</label></strong><input type="text" name="qrc_composer_settings[qr_dwnbtn_color]" value="%s" class="qrc-btn-color-picker"></p>', $value);
    $valuebg = (isset($options['qr_dwnbtnbg_color'])) ? $options['qr_dwnbtnbg_color'] : '#c8fd8c';
    printf('<p><strong>
    <label class="qrc_dwnbtnlabel">'.esc_html(" Background", "qr-code-composer").'</label></strong><input type="text" name="qrc_composer_settings[qr_dwnbtnbg_color]" value="%s" class="qrc-btn-bg-picker"></p></div></div>', $valuebg);

}

/**
 * This function is a callback function of  add seeting field
 */

function wc_qr_alignment()
{

    $options = get_option('qrc_composer_settings');
    $qrc_wc_alignment = isset($options['qrc_wc_select_alignment']) ? $options['qrc_wc_select_alignment'] : '';

    ?>
    <select name="qrc_composer_settings[qrc_wc_select_alignment]">
        
    <option value="left" <?php echo esc_attr($qrc_wc_alignment) == 'left' ? 'selected' : '' ?>><?php esc_html_e('Left', 'qr-code-composer'); ?></option>
    <option value="right" <?php echo esc_attr($qrc_wc_alignment) == 'right' ? 'selected' : '' ?>><?php esc_html_e('Right', 'qr-code-composer'); ?></option>    
    <option value="center" <?php echo esc_attr($qrc_wc_alignment) == 'center' ? 'selected' : '' ?>><?php esc_html_e('Center', 'qr-code-composer'); ?></option>

    </select>

    <?php
}
/**
 * This function is a callback function of  add seeting field
 */

function qrc_logo_image()
{

    $options = get_option('qrc_composer_settings');
    $qrc_logo_image = isset($options['qrc_logo_image']) ? $options['qrc_logo_image'] : '';

    ?>


            <input id="wooqr_upload_image" type="text" name="qrc_composer_settings[qrc_logo_image]" value="<?php echo $qrc_logo_image; ?>"/>
           <input id="wooqr_upload_button" class="button button-primary" type="button" value="Upload image" /> <a href="https://sharabindu.com/plugins/qr-code-composer/"  target="_blank">Get Premium</a>
        <?php

        printf(
            '<img id="wooqrimg-buffer" src="'.$qrc_logo_image.'">');


}

/**
 * Qr background Color field
 */
function qr_bgcolor_management()
{


    $bg_value = (isset($options['background'])) ? $options['background'] : 'transparent';
    printf('<input type="text" value="#fff"  id="qr_bg" class="qrc-color-picker" data-alpha-enabled="true">');

}

/**
 *  Qr Color field
 */

function qr_color_management()
{
    
    printf('<input type="text" value="#000" class="qrc-color-picker" id="fill">');

}

function qr_stcode_management()
{

    printf('<input id="qr_current_url_sc" type="text" value="[qrc_code_composer]" readonly><a href="https://sharabindu.com/plugins/qr-code-composer/">Get Pro</a>');

    printf('<div style="width:%s; padding:10px 0px"><em>'.esc_html__('This is the current page URL shortcode, paste it in the desired location of your site, the URL of the current page will be displayed as QR code value. If you are a developer then this is for you: ','qr-code-composer').'<span style="color:#673ab7"><em ><</em>?php echo do_shortcode["qrc_code_composer"];<em>?</em>></<em></span></div>', '90%');

}

/**
 * admin form field validation
 */

function qrc_option_page_sanitize($input)
{
    $sanitary_values = array();
    if (isset($input['qr_code_picture_size_width']))
    {
        $sanitary_values['qr_code_picture_size_width'] = sanitize_text_field($input['qr_code_picture_size_width']);
    }

    if (isset($input['qr_download_text']))
    {
        $sanitary_values['qr_download_text'] = sanitize_text_field($input['qr_download_text']);
    }
    if (isset($input['mSize']))
    {
        $sanitary_values['mSize'] = sanitize_text_field($input['mSize']);
    }

    if (isset($input['minVersion']))
    {
        $sanitary_values['minVersion'] = sanitize_text_field($input['minVersion']);
    }

    if (isset($input['rounded']))
    {
        $sanitary_values['rounded'] = sanitize_text_field($input['rounded']);
    }

    if (isset($input['quiet']))
    {
        $sanitary_values['quiet'] = sanitize_text_field($input['quiet']);
    }

    if (isset($input['qrc_logo_image']))
    {
        $sanitary_values['qrc_logo_image'] = sanitize_text_field($input['qrc_logo_image']);
    }
    if (isset($input['ecLevel']))
    {
        $sanitary_values['ecLevel'] = sanitize_text_field($input['ecLevel']);
    }

    if (isset($input['qrc_select_alignment']))
    {
        $sanitary_values['qrc_select_alignment'] = $input['qrc_select_alignment'];
    }

    if (isset($input['qrc_wc_select_alignment']))
    {
        $sanitary_values['qrc_wc_select_alignment'] = $input['qrc_wc_select_alignment'];
    }    

    if (isset($input['qr_download_hide']))
    {
        $sanitary_values['qr_download_hide'] = $input['qr_download_hide'];
    }
    if (isset($input['qr_dwnbtn_color']))
    {
        $sanitary_values['qr_dwnbtn_color'] = $input['qr_dwnbtn_color'];
    }
    if (isset($input['qr_dwnbtnbg_color']))
    {
        $sanitary_values['qr_dwnbtnbg_color'] = $input['qr_dwnbtnbg_color'];
    }
    if (isset($input['qrc_wc_ptab_name']))
    {
        $sanitary_values['qrc_wc_ptab_name'] = $input['qrc_wc_ptab_name'];
    }

    $post_types = get_post_types();

    foreach ($post_types as $post_type)
    {

        if (isset($input[$post_type]))
        {
            $sanitary_values[$post_type] = $input[$post_type];
        }
    }
        $qrc_type_pages = get_posts(array(
            'post_type' => 'page',
            'posts_per_page' => - 1,
        ));

            foreach ($qrc_type_pages as $qrc_type_page){

            if (isset($input[$qrc_type_page->ID]))
            {
                $sanitary_values[$qrc_type_page->ID] = $input[$qrc_type_page->ID];
            }
        }
    return $sanitary_values;
}
}

