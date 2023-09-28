( function( $ ) {
'use strict';
    function qrc_pageurl() {
jQuery(".qrc_qrcode").each(function() {
 var hides = qrcomspoer_options.hides;
 var titles = qrcomspoer_options.titles;

 if(hides == 'no'){
jQuery('#qrcwraaerfileds').append('<div><a class="qrcdownload" download="'+ qrcomspoer_options.titles+'.png"><button type="button" style="min-width:'+ qrcomspoer_options.size+'px;color:'+ qrcomspoer_options.btnclr+';background:'+ qrcomspoer_options.btnbg+';font-weight: 600;padding:6px 0;margin-top:12px">'+qrcomspoer_options.btnti +'</button></a></div>');

 }
    qrcomspoer_options['qrc_options'].text = jQuery(this).data('text');
    qrcomspoer_options['qrc_options'].size = qrcomspoer_options['qrc_options']['qr_code_picture_size_width'];
        document.querySelector('.qrc_qrcode').appendChild(kjua(qrcomspoer_options['qrc_options']));
});

	}qrc_pageurl()
	       function qrcomposerdownlaods(){
        jQuery( ".qrcdownload" ).each(function(index) {
            $(this).on("click", function(){
        var qrcFindImages =  $(this).closest('.qrcprowrapper').children('.qrc_qrcode,.qrc_vcardcontent').find('img').attr('src');
        jQuery(this).attr("href",qrcFindImages)
                
            });
        });
    }qrcomposerdownlaods();

}(jQuery) );