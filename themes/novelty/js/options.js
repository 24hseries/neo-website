(function($){

    $(function(){

        // Layout switcher for carousel sections
        $('.front-posts').each(function(){

            var t = $(this);

            var t_views = t.find('ul.display-metod>li[class^="view-"]>a');

            var t_state = 0;

            var t_layout_0;

            var t_layout_1;

            var t_layout_0_action;

            var t_layout_1_action;

            if(2===t_views.length){

                t_layout_0 = t.find('.front-posts-layout-0').clone();

                t_layout_1 = t.find('.front-posts-layout-1').clone();

                t.find('.front-posts-layout-1').hide();

                t.find('.front-posts-layout-0>[data-tesla-plugin="carousel-pre"]').tesla_carousel();

                t_layout_0_action = function(){

                    t.find('.front-posts-layout-1>[data-tesla-plugin="carousel-pre"]').tesla_remove();

                    t.find('.front-posts-layout-1').hide();

                    t.find('.front-posts-layout-0').each(function(i, e){

                        $(e).replaceWith(t_layout_0.eq(i).clone());

                    });

                    t.find('.front-posts-layout-0').show();

                    t.find('.front-posts-layout-0>[data-tesla-plugin="carousel-pre"]').tesla_carousel();

                }

                t_layout_1_action = function(){

                    t.find('.front-posts-layout-0>[data-tesla-plugin="carousel-pre"]').tesla_remove();

                    t.find('.front-posts-layout-0').hide();

                    t.find('.front-posts-layout-1').each(function(i, e){

                        $(e).replaceWith(t_layout_1.eq(i).clone());

                    });

                    t.find('.front-posts-layout-1').show();

                    t.find('.front-posts-layout-1>[data-tesla-plugin="carousel-pre"]').tesla_carousel();
                    
                }

                t_views.eq(0).click(function(ev){

                    if(0!==t_state){

                        t_state = 0;

                        t_layout_0_action();

                    }

                    ev.stopPropagation();

                    if(ev.preventDefault)
                        ev.preventDefault();

                    return false;

                });

                t_views.eq(1).click(function(ev){

                    if(1!==t_state){

                        t_state = 1;

                        t_layout_1_action();

                    }

                    ev.stopPropagation();

                    if(ev.preventDefault)
                        ev.preventDefault();

                    return false;

                });

            }

        });

        // Subscription
        jQuery('.subscription').tt_subscription({
            success : function(result,config,form){
                jQuery(form).find('[name="email"]').val('').attr('placeholder', result);
            },
            error: function(error,config,form){
                jQuery(form).find('[name="email"]').val('').attr('placeholder', error);
            },
            required: function(config,form){
                jQuery(form).find('[name="email"]').val('').attr('placeholder', config.required_msg);
            },
            invalid_email: function(config,form){
                jQuery(form).find('[name="email"]').val('').attr('placeholder', config.invalid_email_msg);
            }
        });

    });

})(jQuery);

jQuery(document).ready(function () {
    "use strict";
    jQuery(".responsive-menu").click(function (e) {
        jQuery(".menu .responsive-menu+div>ul").css({display: "block"});
        e.stopPropagation();
        if (e.preventDefault)
            e.preventDefault();
        return false;
    });
    jQuery("body").click(function () {
        jQuery(".menu .responsive-menu+div>ul").css({display: "none"});
    });
});

jQuery(document).ready(function () {
    "use strict";
    jQuery(".search-top-form-button").click(function (e) {
        e.stopPropagation();

        jQuery(".search-form-location").css({
            display: "block"
        });

    });
    jQuery('.search-top-form').click(function (e) {
        e.stopPropagation();

        jQuery(".search-form-location").css({
            display: "block"
        });

    });
    jQuery("body").click(function () {
        jQuery(".search-form-location").css({
            display: "none"
        });
    });
});


var tesla_responsive = function (options) {
    "use strict";
    var $window;

    var length;

    var previous;

    var resize;

    if (jQuery.isArray(options)) {

        $window = jQuery(window);

        length = options.length - 1;

        resize = function () {

            var width = $window.width();

            var i;

            for (i = 0; i < length && width > options[i].resolution; i++)
            ;

            if (previous !== i) {

                previous = i;

                options[i].action();

            }

        };

        $window.resize(resize);

        resize();

    }

};

// Limit scope pollution from any deprecated API                     height: 50px;  
(function () {

    "use strict";

    var matched, browser;

    // Use of jQuery.browser is frowned upon.
    // More details: http://api.jquery.com/jQuery.browser
    // jQuery.uaMatch maintained for back-compat
    jQuery.uaMatch = function (ua) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
            /(webkit)[ \/]([\w.]+)/.exec(ua) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
            /(msie) ([\w.]+)/.exec(ua) ||
            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) || [];

        return {
            browser: match[1] || "",
            version: match[2] || "0"
        };
    };

    matched = jQuery.uaMatch(navigator.userAgent);
    browser = {};

    if (matched.browser) {
        browser[matched.browser] = true;
        browser.version = matched.version;
    }

    // Chrome is Webkit, but Webkit is also Safari.
    if (browser.chrome) {
        browser.webkit = true;
    } else if (browser.webkit) {
        browser.safari = true;
    }

    jQuery.browser = browser;

    jQuery.sub = function () {
        function jQuerySub(selector, context) {
            return new jQuerySub.fn.init(selector, context);
        }
        jQuery.extend(true, jQuerySub, this);
        jQuerySub.superclass = this;
        jQuerySub.fn = jQuerySub.prototype = this();
        jQuerySub.fn.constructor = jQuerySub;
        jQuerySub.sub = this.sub;
        jQuerySub.fn.init = function init(selector, context) {
            if (context && context instanceof jQuery && !(context instanceof jQuerySub)) {
                context = jQuerySub(context);
            }

            return jQuery.fn.init.call(this, selector, context, rootjQuerySub);
        };
        jQuerySub.fn.init.prototype = jQuerySub.fn;
        var rootjQuerySub = jQuerySub(document);
        return jQuerySub;
    };

})();

// Instantiate theme collapse element object
$theme_accordion = {};
$theme_accordion.collapse = {};

/* ACCORDION */
jQuery(".accordion-toggle").click(function () {
    "use strict";
    if (jQuery(this).parent().hasClass('active')) {
        $theme_accordion.collapse.close(jQuery(this).parent().parent());
        return;
    }
    jQuery('.accordion-group').each(function (i, elem) {
        $theme_accordion.collapse.close(elem);
    });
    $theme_accordion.collapse.open(this);
});


/* ACCORDION STATE MANAGER */
$theme_accordion.collapse.close = function close(element) {
    "use strict";
    jQuery(element).children('.accordion-heading').removeClass('active');
    jQuery(element).children('.accordion-heading').find('.plus').html('+');
};
$theme_accordion.collapse.open = function open(element) {
    "use strict";
    jQuery(element).parent().toggleClass('active');
    jQuery(element).find('.plus').html('-');
};
/* --------------------------- */



/* ================= SCROOL TOP ================= */
jQuery(document).ready(function () {
    "use strict";
    jQuery('.backtotop').click(function () {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 1200, 'swing');
        return false;
    });
});


/* ================= IE fix ================= */
jQuery(document).ready(function () {
    "use strict";
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function (obj, start) {
            for (var i = (start || 0), j = this.length; i < j; i++) {
                if (this[i] === obj) {
                    return i;
                }
            }
            return -1;
        };
    }
});

/* ================= START PLACE HOLDER ================= */
jQuery(document).ready(function ($) {
    "use strict";
    jQuery('input[placeholder], textarea[placeholder]').placeholder();
});
/* ================= END PLACE HOLDER ================= */

//=============Subscription =======================================
function validateEmail(sEmail) {
    "use strict";
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}

jQuery("#subscribe").submit(function (event) {
    "use strict";
    //preventing from normal submition
    event.preventDefault();
    //validating email
    var sEmail = jQuery('#subscribe .subscribe_line').val();
    if (jQuery.trim(sEmail).length === 0) {
        jQuery('.subscribe_info').html('Email is missing').fadeIn('fast', function () {
            setTimeout(function () {
                jQuery('.subscribe_info').fadeOut('slow');
            }, 3000);
        });
        event.preventDefault(); //stops script execution
        return false;
    }
    //if valid email send info to php
    if (validateEmail(sEmail)) {
        jQuery.post("php/subscribes.php", jQuery("#subscribe").serialize(), function (result) {
            jQuery('.subscribe_info').html(result).fadeIn('fast', function () {
                setTimeout(function () {
                    jQuery('.subscribe_info').fadeOut('slow');
                }, 3000);
            });
        });
    } else {
        jQuery('.subscribe_info').html('Invalid Email').fadeIn('fast', function () {
            setTimeout(function () {
                jQuery('.subscribe_info').fadeOut('slow');
            }, 3000);
        });
        event.preventDefault();
        return false;
    }
});

/* ================= CONTACTS FORM ================= */
jQuery('#contact_form').each(function () {
    "use strict";
    var t = jQuery(this);
    var t_result = jQuery('#contact_send');
    var t_result_init_val = t_result.val();
    var validate_email = function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };
    t.submit(function (event) {
        //t_result.val('');
        event.preventDefault();
        var t_values = {};
        var t_values_items = t.find('input[name],textarea[name]');
        t_values_items.each(function () {
            t_values[this.name] = jQuery(this).val();
        });
        if (t_values['novelty-name'] === '' || t_values['novelty-email'] === '' || t_values['novelty-message'] === '') {
            t_result.val(novelty.contact_fill);
        } else
        if (!validate_email(t_values['novelty-email']))
            t_result.val(novelty.contact_email);
        else
            jQuery.post(novelty.ajaxurl, t.serialize(), function (result) {
                t_result.val(result);
            });
        setTimeout(function () {
            t_result.val(t_result_init_val);
        }, 3000);
    });

});

/* ================= Project FORM ================= */

jQuery('.project_form, .project-form').each(function () {
    "use strict";
    var t = jQuery(this);
    var t_result = jQuery('.project_send');
    var t_result_init_val = t_result.html();
    var validate_email = function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };
    t.submit(function (event) {
        //t_result.html('');
        event.preventDefault();
        var t_values = {};
        var t_values_items = t.find('input[name],textarea[name]');
        t_values_items.each(function () {
            t_values[this.name] = jQuery(this).val();
        });
        if (t_values.name === '' || t_values.email === '' || t_values.message === '') {
            t_result.html('Fill in all fields.');
            setTimeout(function () {
                t_result.html(t_result_init_val);
            }, 3000);
        } else
        if (!validate_email(t_values.email)) {
            t_result.html('Please provide a valid e-mail.');
            setTimeout(function () {
                t_result.html(t_result_init_val);
            }, 3000);
        } else {
            t_result.html('Sending project details...');
            jQuery.post("php/project.php", t.serialize(), function (result) {
                t_result.html(result);
                setTimeout(function () {
                    t_result.html(t_result_init_val);
                }, 3000);
            });
        }
    });

});

function scrollbarWidth() {
    "use strict";
    var div = jQuery('<div style="width:50px;height:50px;overflow:hidden;position:absolute;top:-200px;left:-200px;"><div style="height:100px;"></div>');
    // Append our div, do our calculation and then remove it 
    jQuery('body').append(div);
    var w1 = jQuery('div', div).innerWidth();
    div.css('overflow-y', 'scroll');
    var w2 = jQuery('div', div).innerWidth();
    jQuery(div).remove();
    return (w1 - w2);
}



/* ================= START SLIDER ================= */
var t_browser_has_css3;
var t_css3_array = ['transition', '-webkit-transition', '-moz-transition', '-o-transition', '-ms-transition'];
var t_css3_index;
jQuery(document).ready(function () {
    "use strict";
    var t_css3_test = jQuery('body');
    for (t_css3_index = 0, t_css3_test.css(t_css3_array[t_css3_index], ''); t_css3_index < t_css3_array.length && null === t_css3_test.css(t_css3_array[t_css3_index]); t_css3_test.css(t_css3_array[++t_css3_index], ''))
    ;
    if (t_css3_index < t_css3_array.length)
        t_browser_has_css3 = true;
    else
        t_browser_has_css3 = false;
});

/* ================= Project FORM ================= */



/* AS JavaScript [START] */
$Electra = {};

// Email object
$Electra.email = {};

// Forms
$Electra.form = {};
$Electra.form.errorClass = 's_error';

$Electra.form.subscribe = {};
$Electra.form.subscribe.id = '#newsletter';

jQuery(document).ready(function ($) {

    "use strict";

    /* TESTIMONIALS */
    jQuery('.testimonials a.arrow').click(function (e) {
        e.preventDefault();
        var trigger = jQuery(this).attr('data-trigger');
        var list = jQuery(this).closest('ul.testimonials');
        var total_items = list.children().length - 2;
        var index = list.find('li.testimonial-item.active').index() - 2;

        var next;
        if (trigger === 'next')
            next = ((index + 1) >= total_items) ? 0 : index + 1;
        else if (trigger === 'prev')
            next = ((index - 1) < 0) ? total_items - 1 : index - 1;

        list.children('li.testimonial-item').eq(index).toggleClass('active');
        list.children('li.testimonial-item').eq(next).toggleClass('active');

        return false;
    });

    /* COUNTDOWN */
    var cd_duedate = jQuery('#electra_countdown').attr('data-duedate');
    var cd_start = new Date(jQuery('#electra_countdown').attr('data-startdate')).getTime();
    var cd_end = new Date(cd_duedate).getTime();
    $Electra.countdown = (jQuery().countdown) ? jQuery('#electra_countdown').countdown(cd_duedate, function (event) {
        var $this = jQuery(this);
        // Total days
        var days = Math.round(Math.abs((cd_start - cd_end)) / (24 * 60 * 60 * 1000));
        var divider = {
            'seconds': 60,
            'minutes': 60,
            'hours': 24
        };
        var progress = null;
        switch (event.type) {
        case "seconds":
        case "minutes":
        case "hours":
        case "days":
        case "weeks":
        case "daysLeft":
            $this.find('b#' + event.type).html(event.value);
            if (event.type === 'days') {
                progress = ((days - event.value) * 100) / (days);
            } else {
                progress = (100 / divider[event.type]) * (divider[event.type] - event.value);
            }
            $this.find('.countdown_progress.' + event.type + ' .filled')
                .css('width', progress + '%');
            break;
        case "finished":
            $this.hide();
            break;
        }
    }) : null;

    /* GALLERY IMAGE ZOOM */
    $Electra.swipebox = (jQuery().swipebox) ? jQuery(".swipebox").swipebox() : null;
});

/*  EMAIL VALIDATION FUNCTION */
$Electra.email.validate = function (email) {
    "use strict";
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};
/* --------------------------- */

/*  FORM ELEMENT VALIDATION FUNCTION */
$Electra.form.validate = function validate(form) {
    "use strict";
    var valid = true;
    jQuery.each(form.find(':input:not(:input[type="submit"])'), function (index, input) {
        var val = jQuery(input).val();
        if (jQuery.trim(val) === '') {
            $Electra.form.inputError(input);
            valid = false;
            return false;
        }
        if (jQuery(input).attr('name') === 'email') {
            if (!$Electra.email.validate(val)) {
                $Electra.form.inputError(input);
                valid = false;
                return false;
            }
        }
    });
    return valid;
};

/* TOGGLE INPUT ERROR CLASS */
$Electra.form.inputError = function inputError(input) {
    "use strict";
    if (!jQuery(input).hasClass($Electra.form.errorClass))
        jQuery(input).addClass($Electra.form.errorClass);
    jQuery(input).focus();
};
/* AS JavaScript [END] */


/*========== Flickr Widget ==========*/

/* ================= PHOTOSTREAM ================= */

var load_photostream = function () {
    "use strict";
    jQuery('.flickr_widget').each(function () {
        var stream = jQuery(this);
        var stream_userid = stream.attr('data-userid');
        var stream_items = parseInt(stream.attr('data-items'), 10);
        jQuery.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?lang=en-us&format=json&id=" + stream_userid + "&jsoncallback=?", function (stream_feed) {
            var i;
            var stream_function = function (i) {
                if (stream_feed.items[i].media.m) {
                    var stream_a = jQuery('<a>').addClass('PhotostreamLink').attr('href', stream_feed.items[i].link).attr('target', '_blank');
                    var stream_img = jQuery('<img>').addClass('PhotostreamImage').attr('src', stream_feed.items[i].media.m).attr('alt', '').each(function () {
                        var t_this = this;
                        var j_this = jQuery(this);
                        var t_loaded_function = function () {
                            stream_a.append(t_this);
                        };
                        var t_loaded_ready = false;
                        var t_loaded_check = function () {
                            if (!t_loaded_ready) {
                                t_loaded_ready = true;
                                t_loaded_function();
                            }
                        };
                        var t_loaded_status = function () {
                            if (t_this.complete && j_this.height() !== 0)
                                t_loaded_check();
                        };
                        t_loaded_status();
                        jQuery(this).load(function () {
                            t_loaded_check();
                        });
                    });
                    stream.append(jQuery('<li>').append(stream_a));
                }
            };
            for (i = 0; i < stream_items && i < stream_feed.items.length; i++) {
                stream_function(i);
            }
        });
    });
};

load_photostream();

