(function($) {
    'use strict';

    function masteqrPost() {
        jQuery(".masteqr-post").each(function() {

            var $sliderDynamicId = '#' + $(this).attr('id');

            new QRCode($($sliderDynamicId).get(0), {
                text: datas.linksas,
                width: $(this).data('size'),
                height: $(this).data('size'),
                dotScale: datas.scale,

            });
        });

    }
    masteqrPost();




})(jQuery);