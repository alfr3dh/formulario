<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/master-qr-generator/
 * @since      2.1.5
 *
 * @package    master-qr
 * @subpackage master-qr/admin
 */

    class MasterQR_Listlite_View{

        public function __construct()
        {
            add_action('admin_init', array($this ,'masterqr_list_setting'));

        }


        function masterqr_list_setting()
        {
            register_setting("masterqr_list_view_option", "masterqr_list_view_option",array($this , 'masterqr_list_view_option_page_sanitize')); 

            add_settings_section("masterqr_list_setting", " ", array(), 'masterqr_list_section');

            add_settings_section("masterqr_dowprint_section", " ", array($this ,'masterqr_download_section_func'), 'masterqr_dowlist_section');


            add_settings_field("qr_print_size", esc_html__("QR Code Size", "master-qr-generator") , array($this ,"qr_print_size"), 'masterqr_list_section', "masterqr_list_setting");
            add_settings_field("qr_print_post_type", esc_html__("Post Type", "master-qr-generator") , array($this ,"qr_print_post_type"), 'masterqr_list_section', "masterqr_list_setting");
            add_settings_field("qr_print_per_page", esc_html__("QR Per Page", "master-qr-generator") , array($this ,"qr_print_per_page"), 'masterqr_list_section', "masterqr_list_setting");

            add_settings_field("qrc_print_orderby", esc_html__("Order By", "master-qr-generator") , array($this ,"qrc_print_orderby"), 'masterqr_list_section', "masterqr_list_setting");  


            add_settings_field("qrc_download_order", esc_html__("Order", "master-qr-generator") , array($this ,"qrc_download_order"), 'masterqr_list_section', "masterqr_list_setting");

            add_settings_field("qr_dwn_display_frontend", esc_html__("Enable Shortcode For Frontend?", "master-qr-generator") , array($this ,"qr_dwn_display_frontend"), 'masterqr_list_section', "masterqr_list_setting");

        }

        function qr_dwn_display_frontend(){

            printf('<input type="checkbox" name="masterqr_list_view_option[masterqr_enable_dwn_shtco]" class="master-apple-switch"   value="masterqr_enable_dwn_shtco" style="margin-bottom:0"><span style="display:inline-block;margin-left: 30px;margin-bottom: 20px;">[masterqr-download]</span> || <a href="https://masterqr.sharabindu.com/qr-code-download/">View Live demo</a><p class="description"><em>'.esc_html('Click to enable shortcodes for frontend', 'master-qr-generator').'</em></p>',);

        }

        function qrc_print_orderby(){?>
            <select>
                <option value="none">None</option>
                <option value="ID">ID</option>
                <option value="title">Title</option>
                <option value="date">Date</option>
                <option value="name">Name</option>
            </select>
            <?php
        }

        function qrc_download_order(){?>

            <select>

                <option value="ASC">Ascending </option>
                <option value="DSC">Descending </option>

            </select>
            <?php
        }

        function masterqr_download_section_func()
        {

        echo '<section id="sect_5451"><img src="'.MASTER_QR_LITE_URL .'/admin/img/downloadqr.png'.'"></section>';
        }


    function qr_print_post_type()
    {
        $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page');
        $types = get_post_types();
        $post_types = array_diff($types, $excluded_posttypes);
        ?>
        <select>
           <?php foreach ($post_types as $post_type)
           {
            $post_type_title = get_post_type_object($post_type);
            ?>       
            <option value="<?php echo $post_type ?>"><?php echo $post_type_title
            ->labels->name; ?></option>

            <?php
        } ?>
        

    </select>
    <p>Downoad QR based on Post type</p>
    <?php
    }
    function qr_print_per_page()
    {
        $placeholder = esc_html('QR Code Image Per Page,Display all: -1 ', 'master-qr-generator');
        printf('<input type="text" class="regular-text"  value="6" placeholder="Qr Code Per Page" required><p class="description">%s</p>', $placeholder);
    }


    function qr_print_size()
    {
        $placeholder = esc_html('Input a numeric value, e.g:200', 'master-qr-generator');
        printf('<input type="text" class="regular-text"  value="200" placeholder="Write a Value" required>
            <p class="description">%s</p>', $placeholder);
    }
    function masterqr_list_view_option_page_sanitize($input)
    {
    }
    }if(class_exists('MasterQR_Listlite_View')){

        new MasterQR_Listlite_View();
    }

