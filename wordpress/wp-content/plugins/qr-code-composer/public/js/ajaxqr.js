( function( $ ) {
'use strict';
    function qrc_vcardcontent() {	 
	   jQuery(".qrc_vcardcontent").each(function() {

console.log( $(this).data('text'));		   
console.log(datas.size);		   
console.log(datas.mSize);		   
console.log(datas.minVersion);		   
console.log(datas.rounded);		   
console.log(datas.quiet);		   
console.log(datas.ecLevel);		   
    jQuery(this).kjua({
    text: $(this).data('text'),
    size:datas.size,
	mSize:datas.mSize,
	minVersion:datas.minVersion,
	rounded:datas.rounded,
	quiet:datas.quiet,
	ecLevel:datas.ecLevel,
    });	
    });

	}qrc_vcardcontent();

		$( ".qrcdownload" ).each(function(index) {
			$(this).on("click", function(){
		var kdjfk = $(this).parent(".qrc_canvass");
	var imagesa = jQuery(kdjfk+ " img").attr("src");
        download.setAttribute("href", imagesa);
				
			});
		});

		$("#QRCdownloads").click(function(){
        var download = document.getElementById("QRCdownloads");
        var imagesa = jQuery("#billing img").attr("src");
        download.setAttribute("href", imagesa);
        
        });	
		
		jQuery("#QRCdownloads1").click(function(){
        var download = document.getElementById("QRCdownloads1");
    
        var imagesdsd = jQuery("#shippings img").attr("src");
        
        download.setAttribute("href", imagesdsd);
        
        });

}(jQuery) );