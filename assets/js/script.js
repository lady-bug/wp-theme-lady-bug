(function($) {

    var device ={
        noTouch:!("ontouchstart" in document.documentElement || navigator.msMaxTouchPoints),
        Viewport:function(){
            var e = window, a = 'inner';
            if (!('innerWidth' in window)) {
                a = 'client';
                e = document.documentElement || document.body;
            }
            return { width: e[a + 'Width'], height: e[a + 'Height'] };
        }
    };
    var mobile= {
        burger: null,
        Init:function(){
            burger=$('<div id="mobile-sticky-navigation">\
                    <span class="icon open"><i class="fas fa-expand"></i></span>\
                    <span class="icon close"><i class="fas fa-compress"></i></span>\
                    <em>Menu</em></div>');
            $('body').prepend(burger);
            burger.bind({
                click:function(){
                    $('body').toggleClass('show-mobile-nav');
                }
            });
        }
    };
    var spotlights= {
        items:null,
        Init:function(){
            spotlights.items = $('[data-js=spotlights] .cat-post-item,.category .feature');
            spotlights.items.bind({
                click:function(){
                    var href = $(this).find('.post-title').attr('href');
                    if(href){
                        window.location.assign(href);
                    }else{
                      href = $(this).find('h2 a').attr('href');
                      if(href){
                        window.location.assign(href);
                      }
                    }
                },
                mouseenter:function(){
                  $(this).addClass('hover');
                },
                mouseleave:function(){
                    if(device.noTouch && (device.Viewport().width >= 1024)){
                        //$(this).find('p').stop(true,true).hide(0,function(){
                        //    $(this).css({'display':''});
                        //});
                        $(this).stop(true,true);
                        $(this).removeClass('hover');
                    }
                }
            });
        }
    };
    var categories = {
        items:null,
        Init:function(){
            categories.items = $('.category .feature');
            categories.Resize();
        },
        Resize:function(){
            var h,l=categories.items.length;
            categories.items.each(function(i){
                thisItem = $(this);
                if(device.Viewport().width >= 1024){
                    //over 1024 rows of 3 items
                    console.log(i%3);
                    if(i%3===0){
                        //first item of the row
                        h=thisItem.outerHeight();
                    }else{
                        if(thisItem.outerHeight() > h){
                            h=thisItem.outerHeight();
                        }
                        if(i%3===2 || i===(l-1)){
                            //last item of the row
                            for(var j = i-(3-1);j<=i;j++){
                                categories.items.eq(j).outerHeight(h);
                            }
                        }
                    }
                }else{
                    thisItem.css({'height':''});
                }
            });
        }
    };
    $(document).ready(function(){
        mobile.Init();
        spotlights.Init();
        categories.Init();

        // FILTERING SHOWCASE
        //----------------------------
        /*
        * alm_adv_filter()
        * https://connekthq.com/plugins/ajax-load-more/examples/filtering/advanced-filtering/
        *
        */
$('.advanced-filter-menu').each(function(e){
  var afm = $(this);
  $('input:not(:checked)', afm).each(function(){
    var el = $(this);var lab = el.next();
    $('i',lab).remove();
    lab.prepend('<i class="far fa-square"></i>');
  });
  $('input:checked', afm).each(function(){
    var el = $(this);var lab = el.next();
    $('i',lab).remove();
    lab.prepend('<i class="far fa-check-square"></i>');
  });
});

        var alm_is_animating = false;

        function alm_adv_filter(){
          if(alm_is_animating){
            return false; // Exit if filtering is still active
          }
          alm_is_animating = true;
          var obj= {},
          count = 0;
          // Loop each filter menu
          $('.advanced-filter-menu').each(function(e){
            var menu = $(this),
            type = menu.data('type'), // type of filter elements (checkbox/radio/select)
            parameter = menu.data('parameter'), // category/tag/year
            value = '',
            count = 0;
            // Loop each item in the menu
            if(type === 'checkbox' || type === 'radio'){ // Checkbox or Radio

              $('input:checked', menu).each(function(){
                count++;
                var el = $(this);
                // Build comma separated string of items
                if(count > 1){
                  value += ','+el.val();
                }else{
                  value += el.val();
                }
              });
              if(count==0){
                value='noting';
              }

              $('input:not(:checked)', menu).each(function(){
                var el = $(this);var lab = el.next();
                $('i',lab).remove();
                lab.prepend('<i class="far fa-square"></i>');
              });
              $('input:checked', menu).each(function(){
                var el = $(this);var lab = el.next();
                $('i',lab).remove();
                lab.prepend('<i class="far fa-check-square"></i>');
              });
            }
            if(type === 'select'){ // Select
              var select = $(this);
              value += select.val();
            }
            obj[parameter] = value; // add value(s) to obj
          });

          var data = obj;
          $.fn.almFilter('fade', '300', data); // Send data to Ajax Load More
        }
        $('#apply-filters').on('click', alm_adv_filter); // 'Apply Filter' button click
        $('.advanced-filter-menu input').on('change', alm_adv_filter);
        /*
        * almFilterComplete()
        * Callback function sent from core Ajax Load More
        *
        */
        $.fn.almFilterComplete = function(){
          alm_is_animating = false; // clear animating flag
        };

        $.fn.almComplete = function(alm){
          $('.alm-post').on('click',function(){
                $('a',$(this)).get(0).click();
              }
          );
        };

    });

    // WINDOW RESIZE
    //----------------------------
    var resizeEvent ='resize';
    if (!device.noTouch) {
        resizeEvent='orientationchange';
    }
    $(window).on(resizeEvent, function () {
        categories.Resize();
    });

})(jQuery);
