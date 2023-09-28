(function($) {
    $(document).ready(function() {
        "use strict";
		$("#qrcauto").videoPopup();
		$("#qrccustom").videoPopup();
		$("#qrchone").videoPopup();
		$("#qrcwhatapp").videoPopup();
		$("#qrcwifi").videoPopup();
		$("#qrcmap").videoPopup();
		$("#qrcevent").videoPopup();
		$("#pbrvcard").videoPopup();
		$("#qrcbbpress").videoPopup();
		$("#qrcbdypress").videoPopup();
		$("#qrcdokan").videoPopup();
        $('.qrcdesings').submit(function() {
            $('.qrcs_desingcrt').addClass("fancyLoaderCss");
            $('.qrcsdhicr_dsigns').hide();
            var b = $(this).serialize();
            $.post('options.php', b).error(function() {
                alert('error')
            }).success(function() {
                $(".qrcs_desingcrt").removeClass("fancyLoaderCss");
                $('.qrcsdhicr_dsigns').show();
                $('.qrcsdhicr_dsigns').html('<span class="dashicons dashicons-saved"></span>')
            });
            return !1
        });
        $('.qrccurrentqrcs').submit(function() {
            $('.qrcs_sdhicrt').addClass("fancyLoaderCss");
            $('.qrcsdhicr_djkfhjhj').hide();
            var b = $(this).serialize();
            $.post('options.php', b).error(function() {
                alert('error')
            }).success(function() {
                $(".qrcs_sdhicrt").removeClass("fancyLoaderCss");
                $('.qrcsdhicr_djkfhjhj').show();
                $('.qrcsdhicr_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
            });
            return !1
        });

        $('.qrcpro_vacradsubmits').submit(function() {
            $('.qrcvcard_sdhi').addClass("fancyLoaderCss");
            $('.qrcvcard_djkfhjhj').hide();
            var b = $(this).serialize();
            $.post('options.php', b).error(function() {
                alert('error')
            }).success(function() {
                $(".qrcvcard_sdhi").removeClass("fancyLoaderCss");
                $('.qrcvcard_djkfhjhj').show();
                $('.qrcvcard_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
            });
            return !1
        });
        $('.qrcpro_integration').submit(function() {
            $('.qrcintegrates').addClass("fancyLoaderCss");
            $('.qrcintegrates_djkfhjhj').hide();
            var b = $(this).serialize();
            $.post('options.php', b).error(function() {
                alert('error')
            }).success(function() {
                $(".qrcintegrates").removeClass("fancyLoaderCss");
                $('.qrcintegrates_djkfhjhj').show();
                $('.qrcintegrates_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
            });
            return !1
        });
		
		
		

        $('.qrcprodemo').datetimepicker({
            timepicker: false,
            format: 'Y/m/d'
        });
        $('.qrcprodemo1').datetimepicker({
            datepicker: false,
            format: 'H:i'
        });
        $('.qrcprodemo2').datetimepicker({
            timepicker: false,
            format: 'Y/m/d'
        });
        $('.qrcprodemo3').datetimepicker({
            datepicker: false,
            format: 'H:i'
        });

        function bbpressoptions() {
            $('.bbpressoptions').on('change', function() {
                if ($(this).val() == 'none' || $(this).val() == 'url') {
                    $('.bbpressremovefiled').hide();

                } else {
                    $('.bbpressremovefiled').show()
                }

                if ($(this).val() == 'shortcode') {
                    $('.shortcodes').show();
                } else {
                    $('.shortcodes').hide();

                }
            });

            if ($('.bbpressoptions').val() == 'none' || $('.bbpressoptions').val() == 'url') {
                $('.bbpressremovefiled').hide();

            } else {
                $('.bbpressremovefiled').show()
            }
            if ($('.bbpressoptions').val() == 'shortcode') {
                $('.shortcodes').show();
            } else {
                $('.shortcodes').hide();

            }
        }
        bbpressoptions();

        function qrbudypressoptions() {


            $('.qrbudypressoptions').on('change', function() {
                if ($(this).val() == 'none' || $(this).val() == 'url') {
                    $('.budypressremovefiled').hide();

                } else {
                    $('.budypressremovefiled').show()
                }

                if ($(this).val() == 'shortcode') {
                    $('.shortcodesr').show();
                } else {
                    $('.shortcodesr').hide();

                }
            });

            if ($('.qrbudypressoptions').val() == 'none' || $('.qrbudypressoptions').val() == 'url') {
                $('.budypressremovefiled').hide();

            } else {
                $('.budypressremovefiled').show()
            }
            if ($('.qrbudypressoptions').val() == 'shortcode') {
                $('.shortcodesr').show();
            } else {
                $('.shortcodesr').hide();

            }

        }
        qrbudypressoptions();

        function qrcdokhanoptions() {


            $('.dokanqrc').on('change', function() {
                if ($(this).val() == 'none' || $(this).val() == 'url') {
                    $('.dokanremovefiled').hide();

                } else {
                    $('.dokanremovefiled').show()
                }

                if ($(this).val() == 'shortcode') {
                    $('.shortcodesdokan').show();
                } else {
                    $('.shortcodesdokan').hide();

                }
            });

            if ($('.dokanqrc').val() == 'none' || $('.dokanqrc').val() == 'url') {
                $('.dokanremovefiled').hide();

            } else {
                $('.dokanremovefiled').show()
            }
            if ($('.dokanqrc').val() == 'shortcode') {
                $('.shortcodesdokan').show();
            } else {
                $('.shortcodesdokan').hide();

            }

        }
        qrcdokhanoptions();


    });

    $(document).ready(function() {
        $("#inputetxtas").on("input", function() {
            // Print entered value in a div box
            $("#result").text($(this).val());
        });

        $('.qrcremovedownlaod').on('change', function() {
            if ($(this).val() == 'yes') {
                $('.qrdemodownload').hide();
                $('.removealsscolors').hide();

            } else {
                $('.qrdemodownload').show();
                $('.removealsscolors').show();
            }
        });

        if ($('.qrcremovedownlaod').val() == 'yes') {
            $('.qrdemodownload').hide();
            $('.removealsscolors').hide();

        } else {
            $('.qrdemodownload').show();
            $('.removealsscolors').show();

        }



        $('.qrc-btn-color-picker').wpColorPicker({
            change: function(event, ui) {
                var theColor = ui.color.toString();
                $('#result').css("color", theColor);
            }
        });
        $('.qrc-btn-bg-picker').wpColorPicker({
            change: function(event, ui) {
                var theColor = ui.color.toString();
                $('#result').css("background", theColor);
            }
        });


    });




    $(document).ready(function() {
        $('#qr_print_tzx_ty').on('change', function() {
            $('#qr_print_product_ty').hide();
            if ($(this).val() == 'product_cat') {
                $('#qr_print_product_ty').show();
                $('#qr_print_cat_ty').hide()
            } else {
                $('#qr_print_product_ty').hide();
                $('#qr_print_cat_ty').show()
            }
        })
    })
})(jQuery);
(function($) {

jQuery(document).ready(function($) {

  // Suffix that will be used on the classes of the content divs.
  var tab_suffix = '-tab';

  // Not necessary, just to enable people to choose whatever tab_suffix they want.
  function escape_regexp(str) {
    return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
  }

  // Get the class ending with tab_suffix from an element.
  function get_tab_name_from_class(el) {
    var tab_class_pattern = new RegExp('\\S*' + escape_regexp(tab_suffix));
    if ($(el) && $(el).attr('class')) {
      return $(el).attr('class').match(tab_class_pattern)[0];
    }
  }

  // Update the dom with the selected tab.
  function hash_content_update() {

    var active_section,
      tab_names;

    // Get all classes ending with -tab from div elements directly inside .tab-content.
    tab_names = $('div.tab-content > div').map(function() {
      var tab_name = get_tab_name_from_class($(this));
      if (tab_name) {
        return tab_name.split(tab_suffix)[0];
      }
    }).get();

    if (tab_names.length > 0) {

      // Show first tab initially.
      active_section = tab_names[0];

      // Check if the url hash matches one of the tab names.
      if (document.location.href.split('#')[1] && tab_names.indexOf(document.location.href.split('#')[1]) > -1) {
        active_section = document.location.href.split('#')[1];
      }
      // Handle tab contents.
      $('div.tab-content div.active').removeClass('active');
      $('div.tab-content div.' + active_section + tab_suffix).addClass('active');

      // Handle tab menu.
      $('div.tab-nav ul li.active').removeClass('active');
      $('div.tab-nav ul li a[href="#' + active_section + '"]').closest('li').addClass('active');

    }

  }

  // Set listener for hashchange
  $(window).bind('hashchange', function() {
    hash_content_update();
  });

  // Run the initial content update.
  hash_content_update();

});

}(jQuery));

(function($) {
    $(document).ready(function() {
        "use strict";
		$("#qrc-vides").videoPopup();
		$("#qrc-prints").videoPopup();
		$("#qrc-shortcoe").videoPopup();
		$("#qrc-find").videoPopup();
		$("#qrc-oder").videoPopup();
		$("#qrc-pdf").videoPopup();
		$("#qrc-downl").videoPopup();
		});

}(jQuery));