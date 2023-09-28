<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since      1.8.0
 *
 * @package    Qrc_composer
 * @subpackage Qrc_composer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Qrc_composer
 * @subpackage Qrc_composer/public
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class Qrc_composer_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.8.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.8.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.8.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = plugin_basename(__FILE__);
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.8.0
     */
    public function enqueue_styles()
    {


    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.8.0
     */
    public function enqueue_scripts()
    {


         wp_enqueue_script('kjua', QRC_COMPOSER_URL . 'admin/js/kjua.js', array(
            'jquery'
        ) , $this->version, true);

        wp_enqueue_script('qrccreateqr', QRC_COMPOSER_URL . 'public/js/createqr.js', array(
        'jquery','kjua'
        ) , $this->version, true);

        wp_register_script('qrcvcardcontent', QRC_COMPOSER_URL . 'public/js/ajaxqr.js', array(
        'jquery','kjua'
        ) , $this->version, true);
        global $wp;
        $current_id_link = home_url(add_query_arg(array() , $wp->request));
    $options1 = get_option('qrc_composer_settings');
    $qrc_size = isset($options1['qr_code_picture_size_width']) ? $options1['qr_code_picture_size_width'] : 200;
    $btnti = isset($options1['qr_download_text']) ? $options1['qr_download_text'] : esc_html__('Download QR','qr-code-composer');
        $qr_download_hide = isset($options1['qr_download_hide']) ? $options1['qr_download_hide'] : 'no';
        $mSize = isset($options1['mSize']) ? $options1['mSize'] : '20';
        $minVersion = isset($options1['minVersion']) ? $options1['minVersion'] : '1';
        $rounded = isset($options1['rounded']) ? $options1['rounded'] : '100';
        $quiet = isset($options1['quiet']) ? $options1['quiet'] : '0';
        $ecLevel = isset($options1['ecLevel']) ? $options1['ecLevel'] : 'L';
    $btnclr = isset($options1['qr_dwnbtn_color']) ? $options1['qr_dwnbtn_color'] : '#000';
    $btnbg = isset($options1['qr_dwnbtnbg_color']) ? $options1['qr_dwnbtnbg_color'] : '#c8fd8c';
    $cuttenttitlr = get_the_title();


        $qrcomspoer_options = array(
            'qrc_options' => array(
            "qr_code_picture_size_width"=> $qrc_size,
            "mSize"=>$mSize,
            "minVersion"=>$minVersion,
            "rounded"=>$rounded,
            "quiet"=>$quiet,
            "ecLevel"=>$ecLevel,
            ),
            'hides' => $qr_download_hide,
            'titles' => $cuttenttitlr,
            'btnti' => $btnti,
            'btnbg' => $btnbg,
            'btnclr' => $btnclr,
            'size' => $qrc_size,
        );
        wp_localize_script( 'qrccreateqr', 'qrcomspoer_options', $qrcomspoer_options );

            $data = array(
            "mSize"=> $mSize,
            "minVersion"=> $minVersion,
            "rounded"=> $rounded,
            "quiet"=> $quiet,
            "ecLevel"=> $ecLevel,
            'hides' => $qr_download_hide,
            'titles' => $cuttenttitlr,
            'btnti' => $btnti,
            'btnbg' => $btnbg,
            'btnclr' => $btnclr,
            'size' => $qrc_size,
        );

        wp_localize_script( 'qrcvcardcontent', 'datas', $data );


    }

    /**
     * This function is display Qr code on frontend.
     */

    public function qcr_code_element($content)
    {

        $current_id = get_the_ID();
        $current_title = get_the_title($current_id);
        $current_id_link = get_the_permalink($current_id);
        $qrc_meta_display = get_post_meta($current_id, 'qrc_metabox', true) ? get_post_meta($current_id, 'qrc_metabox', true) : 1;

        $qrc_qr_image = '';
        $post_types = get_post_types();
        $options = get_option('qrc_composer_settings');

        if (!empty($options))
        {
            $singlular_exclude = is_singular($options);
            $single_exclude = is_page($options);
        }
        else
        {
            $singlular_exclude = '';
            $single_exclude = '';  
        }

        $qrc_alignment = isset($options['qrc_select_alignment']) ? $options['qrc_select_alignment'] : 'left';

        if (($qrc_meta_display == '2') or ($singlular_exclude) or is_singular('product') or ($single_exclude))
        {     
            $content .= '';
        }
        else
        {

            $content .= '<div class="qrcprowrapper" style="text-align:'.$qrc_alignment.';" id="qrcwraaerfileds"><div class="qrc_qrcode" style="display:inline-block" data-text="' . $current_id_link . '"></div></div>';
            }


            return $content;



    }

    /**
     * This function is Provide for Createing Woocomerce custom product tab for Qr Code
     */

    public function woo_custom_product_tabs($tabs)
    {

        $options = get_option('qrc_composer_settings');

        $qrc_wc_ptab_name = isset($options['qrc_wc_ptab_name']) ? $options['qrc_wc_ptab_name'] : esc_html__('QR Code','qr-code-composer');

        $tabs['qty_pricing_tab'] = array(
            'title' => $qrc_wc_ptab_name ,
            'priority' => 100,
            'callback' => array(
                $this,
                'woo_qrc_tab_content'
            )
        );

        $qrc_meta_display = get_post_meta(get_the_ID() , 'qrc_metabox', true);
      
        if (!empty($options))
        {
            $singlular_wc_exclude = is_singular($options);
        }
        else
        {
            $singlular_wc_exclude = '';
        }

        if (($qrc_meta_display == '2') or ($singlular_wc_exclude))
        {
            return false;
        }
        else
        {
            return $tabs;

        }

    }

    /**
     *  Woocomerce custom product tab Call Back function
     */

    public function woo_qrc_tab_content()
    {

        $current_title = get_the_title(get_the_id());
        $current_id_link = get_the_permalink(get_the_id());

        $options = get_option('qrc_composer_settings');

        $qrc_wc_alignment = isset($options['qrc_wc_select_alignment']) ? $options['qrc_wc_select_alignment'] : 'left';
        $qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width'] : 200;
        $download_qr = isset($options['qr_download_text']) ? $options['qr_download_text'] : esc_html__('Download QR Code','qr-code-composer');
        $qr_download_hide = isset($options['qr_download_hide']) ? $options['qr_download_hide'] : 'no';
        $qr_dwnbtn_color = isset($options['qr_dwnbtn_color']) ? $options['qr_dwnbtn_color'] : '#000';
        $qr_dwnbtnbg_color = isset($options['qr_dwnbtnbg_color']) ? $options['qr_dwnbtnbg_color'] : '#c8fd8c';

        if($qr_download_hide == 'no'){
         $qr_download_ = '<div><a id="QRCdownload" download="' . $current_title . '.png">
            <button type="button" onClick="QRCdownload()" style="min-width:' . $qrc_size . 'px;color:'.$qr_dwnbtn_color.';background:'.$qr_dwnbtnbg_color.';font-weight: 600;border: 1px solid transparent;padding: 6px 0;margin-top: 12px;" class="uqr_code_btn">' . $download_qr . '</button>
            </a></div>';
        }else{
            $qr_download_ = '';
        }
        $qrc_qr_image = '<div class="qrcprowrapper" style="text-align:'.$qrc_wc_alignment.';"><div id="qrc_qrcode_' . get_the_ID() . '" class="qrc_qrcode" style="display:inline-block" data-text="' . $current_id_link . '"></div>'.$qr_download_.'</div>';

        return printf('%s', $qrc_qr_image);
    }

}

