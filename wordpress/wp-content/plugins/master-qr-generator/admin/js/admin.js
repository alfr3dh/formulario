
;(function($) {

    function MASTERQRPost() {
        $(document).ready(function() {

            "use strict";
			$('.qrc-color-picker').wpColorPicker();
            $('#downloadbuton2').click(function() {

                var image = document.querySelector(".masteqr-post canvas").toDataURL("image/png").replace("image/png", "image/octet-stream");
                this.setAttribute("href", image);

            });

        });
    }
    MASTERQRPost();
})


(jQuery);



;(function($) {
$(document).ready(function(){$('#qr_print_tzx_ty').on('change',function(){$('#qr_print_product_ty').hide();if($(this).val()=='product_cat'){$('#qr_print_product_ty').show();$('#qr_print_cat_ty').hide()}else{$('#qr_print_product_ty').hide();$('#qr_print_cat_ty').show()}})})})(jQuery);


