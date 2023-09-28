<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/includes
 */

function masterqrlite_currentpage($current_id_link,$qrc_size,$dot_scale,$qrc_alignment){

    return sprintf('<div style="text-align:' . $qrc_alignment . '"><div id="masteqr-post"></div></div>
        <script>

    </script>', $current_id_link,$qrc_size, $qrc_size,$dot_scale);




}

function masterqrlite_metaboxs($current_id_link,$qrc_size,$dot_scale,$qr_download){

    return printf('<div id="masteqr-pMet"></div>
        <script>
        function masteqrMetaBoxs(){
       new QRCode(document.getElementById("masteqr-pMet"), {
                text: "%s",
                width: %s,
                height: %s,
                dotScale: "%s",

        });

    }masteqrMetaBoxs();
    </script>%s</li></ul>', $current_id_link,$qrc_size, $qrc_size,$dot_scale,$qr_download);




}

function masterqrlite_currentProduct($current_id_link,$qrc_wc_size,$dot_scale,$qrc_wc_alignment){

    return printf('<div style="text-align:' . $qrc_wc_alignment . '"><div id="masteqr-product"></div></div>
        <script>
        function masteqrProduct(){
       new QRCode(document.getElementById("masteqr-product"), {
                text: "%s",
                width: %s,
                height: %s,
                dotScale: "%s",

        });

    }masteqrProduct();
    </script>', $current_id_link,$qrc_wc_size, $qrc_wc_size,$dot_scale);




}