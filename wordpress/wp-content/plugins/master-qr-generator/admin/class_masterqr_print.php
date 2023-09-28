<?php
/**
 * The file that defines the bulk print admin area
 *
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com/plugins/master-qr-generator/
 * @since      2.1.5
 *
 * @package    masterqr
 * @subpackage masterqr/admin
 */

    class MASTER_QR_LitePrint{

        public function __construct()
        {
            add_action('admin_init', array($this ,'qcr__print_setting'));

        }


        function qcr__print_setting()
        {
            register_setting("masterqr_print_option", "masterqr_print_option",array($this , 'masterqr_print_option_page_sanitize'));

            add_settings_section("master_section_setting", " ", array(), 'masterqr_print_setting');

            add_settings_section("master_print_secv", " ", array($this ,'master_master_print_secv_func'), 'masterqr_print_section');

            add_settings_field("master_priprint_size", esc_html__("QR Code Size", "master-qr-generator") , array($this ,"master_priprint_size"), 'masterqr_print_setting', "master_section_setting");

            add_settings_field("qr_print_post_type", esc_html__("Post Type", "master-qr-generator") , array($this ,"qr_print_post_type"), 'masterqr_print_setting', "master_section_setting");

            add_settings_field("masterqr_print_taxony_type", esc_html__("Taxonomy", "master-qr-generator") , array($this ,"masterqr_print_taxony_type"), 'masterqr_print_setting', "master_section_setting");

            add_settings_field("masterqr_print_cat_type", esc_html__("Category Type", "master-qr-generator") , array($this ,"masterqr_print_cat_type"), 'masterqr_print_setting', "master_section_setting");


            add_settings_field("qr_print_per_page", esc_html__("Qr Print Per Page", "master-qr-generator") , array($this ,"qr_print_per_page"), 'masterqr_print_setting', "master_section_setting");

            add_settings_field("qr_print_title_display", esc_html__("Display Title?", "master-qr-generator") , array($this ,"qr_print_title_display"), 'masterqr_print_setting', "master_section_setting");

            if (class_exists("WooCommerce"))
            {
                add_settings_field("qr_print_price_display", esc_html__("Display Product Price?", "master-qr-generator") , array($this ,"qr_print_price_display"), 'masterqr_print_setting', "master_section_setting");

            }

            add_settings_field("masterprint_display_frontend", esc_html__("Enable Shortcode For Frontend?", "master-qr-generator") , array($this ,"masterprint_display_frontend"), 'masterqr_print_setting', "master_section_setting");
        }




        function masterqr_print_cat_type()
        {
            $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','page','product');

            $types = get_post_types();
            $post_types = array_diff($types, $excluded_posttypes);
            $options = get_option('masterqr_print_option');
            $masterqr_print_cat_type = isset($options['masterqr_print_cat_type']) ? $options['masterqr_print_cat_type'] : '--';


            $master_print_cat_type_product = isset($options['master_print_cat_type_product']) ? $options['master_print_cat_type_product'] : '';


            $masterqr_print_taxony_type = isset($options['masterqr_print_taxony_type']) ? $options['masterqr_print_taxony_type'] : ' ';
            if($masterqr_print_taxony_type == 'product_cat'){ 
                $class="block";
                $classU="none";

            }else{
             $class="none";
             $classU="block"; 
         }

         ?>
         <select id="qr_print_product_ty" style="display:<?php echo $class; ?>">

             <?php   $terms = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
            )); 


             foreach ( $terms as $el_category) { 


                ?>

                <option value="<?php echo $el_category->term_id ?>"><?php echo $el_category->name; ?></option>

            <?php } ?>
        </select>


        <select style="display:<?php echo $classU; ?>" id="qr_print_cat_ty">
            <option value="0">---</option>
            <?php 

            foreach ($post_types as $post_type) {

                $post_type_title = get_post_type_object($post_type);
                $post_type_title->labels->name; 
                $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
                foreach( $taxonomies as $taxonomy ) {

                   $terms = get_terms(array(
                    'taxonomy' => array( $taxonomy),
                    'hide_empty' => true,
                )); 


                   foreach ( $terms as $el_category) { 


                    ?>

                    <option value="<?php echo $el_category->term_id ?>"><?php echo $el_category->name .' - ('. $post_type_title->labels->name .')'; ?></option>

                <?php  }


            }
        }

        ?>
    </select>

    <p class="description"> <?php echo esc_html("Select the Category based on the Taxonomy type above, if this field is empty or not selected correctly, the filter will not work, then the QR code will be displayed as the selected Post type",'master-qr-generator') ?>
    </p>


    <?php
    }






    function masterqr_print_taxony_type()
    {
        $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','page','post','product');
        $types = get_post_types();
        $post_types = array_diff($types, $excluded_posttypes);
        ?>

        <select id="qr_print_tzx_ty">
            <option value="0">---</option>

            <option value="category">Post Category</option>
            <option value="post_tag"  >Post Tags</option>
            <?php if(class_exists("WooCommerce")){
                ?>
                <option value="product_cat">Product Category</option>
                <?php 
            }
            foreach ($post_types as $post_type) {

                $post_type_title = get_post_type_object($post_type);
                $post_type_title->labels->name;

                $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );


                foreach( $taxonomies as $taxonomy ) {
                  ?>


                  <option value="<?php echo $taxonomy ?>" ><?php echo $taxonomy .' - ('. $post_type_title->labels->name .')'; ?></option>

                  <?php  


              }
          }



          ?>
      </select>



      <p  class="description"> <?php echo esc_html("Select the Taxonomy based on the post type above, if this field is empty or or not selected correctly the filter will not work, then the QR code will be displayed as the selected post type above",'master-qr-generator') ?>
    </p>
    <?php
    }

    function master_master_print_secv_func()
    {
        echo '<section id="sect_5451"><img src="'.MASTER_QR_LITE_URL .'/admin/img/printqr.png'.'"></section>';
               
    }
    function qr_print_post_type()
    {
        $excluded_posttypes = array(
            'attachment',
            'revision',
            'nav_menu_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'user_request',
            'wp_block'
        );
        $types = get_post_types();
        $post_types = array_diff($types, $excluded_posttypes);

        ?>

        <select id="master_QR_POsttype">
           <?php foreach ($post_types as $post_type)
           {

            ?>       
            <option value="<?php echo esc_attr($post_type);?>"><?php echo esc_attr(ucfirst($post_type))?></option>

            <?php
        } ?>

    </select>

    <?php
    }

    function qr_print_per_page()
    {
        $placeholder = esc_html('Qr Code Image Per Page,Display all: -1 ', 'master-qr-generator');
        printf('<input type="text" class="regular-text"  value="4" placeholder="Qr Code Per Page"><p class="description">%s</p>', $placeholder);
    }
    function qr_print_title_display()
    {
        ?>
        <select>

            <option value="yes"><?php esc_html_e('Yes', 'master-qr-generator'); ?></option>
            <option value="no"><?php esc_html_e('No', 'master-qr-generator'); ?></option>   

        </select>

        <?php
    }
    function qr_print_price_display()
    {
        ?>
        <select>

            <option value="yes"><?php esc_html_e('Yes', 'master-qr-generator'); ?></option>
            <option value="no"><?php esc_html_e('No', 'master-qr-generator'); ?></option>   

        </select>
        <p class="description"><?php echo esc_html('If Post Type "product" ', 'master-qr-generator') ?></p>
        <?php
    }

    function master_priprint_size()
    {
        $placeholder = esc_html('Enter a numeric value, e.g: 254, Here the value of QR size will different for the Count block. So you will not get the same size Image for all QR ', 'master-qr-generator');
        printf('<input type="text"  class="regular-text"  value="300" placeholder="Enter a numeric value">
            <p class="description" >%s</p>', $placeholder);
    }
    function masterprint_display_frontend(){


        printf('<input type="checkbox"  class="master-apple-switch"   value="masterqr_enable_print_shtco" style="margin-bottom:0"><span style="display:inline-block;    margin-left: 30px;margin-bottom: 20px;">[masterqr-print]</span> || <a href="https://masterqr.sharabindu.com/qr-code-print/">View Live demo</a><p class="description"><em>'.esc_html('Click to enable shortcodes for frontend', 'master-qr').'</em></p>');

    }


    function masterqr_print_option_page_sanitize($input)
    {
return;
    }
}
    if(class_exists('MASTER_QR_LitePrint')){

        new MASTER_QR_LitePrint();
    }

