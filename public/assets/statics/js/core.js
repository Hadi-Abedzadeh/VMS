/*
 * ================================================
 * Kavimo.com
 * Designer : WonderCo Team
 * Programing : WonderCo Team
 * URL : http://WonderCo.ir
 * ================================================
 ** Core System
 * ================================================
*/

Kavimo.core = {

    // init function
    init : function(){

    },

    // Devices
    device : {
        isIphone : (/iphone/gi).test(navigator.appVersion),
        isIpad : (/ipad/gi).test(navigator.appVersion),
        isAndroid : (/android/gi).test(navigator.appVersion),
        isTouch : function() {
            return (this.isIphone || this.isIpad || this.isAndroid);
        }
    },

    // Math methods
    math : {
        random : function(min,max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        },

        unique : function(s)
        {
            return (new Date()).getTime() * this.random(1,999);
        },

    },


    // User Interface Methods
    ui : {
        toggleMenu : function(o) {
            var $toggleMenu = o.toggle,
                $menu = o.menu,
                clickMenu = o.clickOnMenuHide;

            $toggleMenu.on("click", function(e) {

                if(!(!$menu.is(e.target) && $menu.has(e.target).length === 0))
                {
                    if(!clickMenu)
                        return false;
                }

                e.preventDefault();
                $.isFunction(o.toggleFunction) ? o.toggleFunction() : "";
            });

            $toggleMenu.on("mouseup", function(e) {
                e.preventDefault();
                e.stopPropagation();
            });

            $(document).on("mouseup", function (e) {
                if (!$menu.is(e.target) && $menu.has(e.target).length === 0) {
                    $.isFunction(o.hideFunction) ? o.hideFunction() : "";
                }
            });
        },
        blurCanvas : function(element,background)
        {
            var canvas = $(element);
            var base64 = null;

            var c = canvas[0],
                BLUR_RADIUS = 100,
                canvasContext = c.getContext('2d');

            var image = new Image();
            image.src = background;

            var drawBlur = function() {
                var w = c.width;
                var h = c.height;
                canvasContext.drawImage(image, 0, 0, w, h);
                stackBlurCanvasRGBA(element.substring(1), 0, 0, w, h, BLUR_RADIUS);
            };

            image.onload = function() {
                drawBlur();
            }
        },
        getLoaderSvg : function()
        {
            return ('<div class="loader-init"><svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"> <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z"> <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/></path></svg></div>');
        },
    },

    // Require Methods
    require : {
        js : function(arr) {
            var _arr = $.map(arr, function(scr) {
                scr = (scr.indexOf('http') != -1 ? scr : ( scr.indexOf('.js') == -1 ? Kavimo.url.jsDirectory + '/' + scr + '.js' : Kavimo.url.jsDirectory + '/' + scr) );
                return $.getScript( scr );
            });

            _arr.push($.Deferred(function( deferred ){
                $( deferred.resolve );
            }));

            return $.when.apply($, _arr);
        }
    },

    // Ajax
    ajax : {

        post : function(option)
        {
            $.ajax({
                url : Kavimo.url.base + option.to +  ( (typeof option.cache != 'undefined') ? (!option.cache ? "?_=" + (new Date() * 1) : "") : "" ),
                type : 'post',
                data : (option.data) ? option.data : {},
                beforeSend : function() {
                    ($.isFunction(option.before)) ? option.before() : "";
                }
            })
                .done(function(response) {
                    ($.isFunction(option.done)) ? option.done(response) : "";
                })
                .fail(function() {
                    ($.isFunction(option.fail)) ? option.fail() : "";
                })
                .always(function() {
                    ($.isFunction(option.always)) ? option.always() : "";
                });
        },

        get : function(option)
        {
            $.ajax({
                url : Kavimo.url.base + option.to +  ( (typeof option.cache != 'undefined') ? (!option.cache ? "?_=" + (new Date() * 1) : "") : "" ),
                type : 'get',
                beforeSend : function() {
                    ($.isFunction(option.before)) ? option.before() : "";
                }
            })
                .done(function(response) {
                    ($.isFunction(option.done)) ? option.done(response) : "";
                })
                .fail(function() {
                    ($.isFunction(option.fail)) ? option.fail() : "";
                })
                .always(function() {
                    ($.isFunction(option.always)) ? option.always() : "";
                });
        },

        form : function(formName,option)
        {
            $('body').on('beforeSubmit', 'form#'+formName, function() {

                var form = $(this);
                if (!form.find('.has-error').length) {

                    $.ajax({
                        url : form.attr('action'),
                        type : form.attr('method'),
                        data : form.serialize(),
                        beforeSend : function() {
                            ($.isFunction(option.before)) ? option.before(form) : "";
                        }
                    })
                        .done(function(response) {
                            ($.isFunction(option.done)) ? option.done(response,form) : "";
                        })
                        .fail(function() {
                            ($.isFunction(option.fail)) ? option.fail() : "";
                        })
                        .always(function() {
                            ($.isFunction(option.always)) ? option.always() : "";
                        });
                    return false;
                }
                return false;
            });
        }
    },

    // language
    language : {

        digitToPersian : function(number)
        {
            var persianNumber = ['Û°', 'Û±', 'Û²', 'Û³', 'Û´', 'Ûµ', 'Û¶', 'Û·', 'Û¸', 'Û¹'];
            var number = number.toString().split('');

            for (var i = 0; i < number.length; i++) {
                if (/\d/.test(number[i])) {
                    number[i] = persianNumber[number[i]];
                }
            }
            return number.join('');
        },
    },

    // date time
    datetime : {

        gregorian_to_jalali : function(gy, gm, gd) {
            g_d_m = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334];
            jy = (gy <= 1600) ? 0 : 979;
            gy -= (gy <= 1600) ? 621 : 1600;
            gy2 = (gm > 2) ? (gy + 1) : gy;
            days = (365 * gy) + (parseInt((gy2 + 3) / 4)) - (parseInt((gy2 + 99) / 100)) +
                (parseInt((gy2 + 399) / 400)) - 80 + gd + g_d_m[gm - 1];
            jy += 33 * (parseInt(days / 12053));
            days %= 12053;
            jy += 4 * (parseInt(days / 1461));
            days %= 1461;
            jy += parseInt((days - 1) / 365);
            if (days > 365) days = (days - 1) % 365;
            jm = (days < 186) ? 1 + parseInt(days / 31) : 7 + parseInt((days - 186) / 30);
            jd = 1 + ((days < 186) ? (days % 31) : ((days - 186) % 30));
            return [jy, jm, jd];
        },
        jalali_to_gregorian : function(jy, jm, jd) {
            gy = (jy <= 979) ? 621 : 1600;
            jy -= (jy <= 979) ? 0 : 979;
            days = (365 * jy) + ((parseInt(jy / 33)) * 8) + (parseInt(((jy % 33) + 3) / 4)) +
                78 + jd + ((jm < 7) ? (jm - 1) * 31 : ((jm - 7) * 30) + 186);
            gy += 400 * (parseInt(days / 146097));
            days %= 146097;
            if (days > 36524) {
                gy += 100 * (parseInt(--days / 36524));
                days %= 36524;
                if (days >= 365) days++;
            }
            gy += 4 * (parseInt((days) / 1461));
            days %= 1461;
            gy += parseInt((days - 1) / 365);
            if (days > 365) days = (days - 1) % 365;
            gd = days + 1;
            sal_a = [0, 31, ((gy % 4 == 0 && gy % 100 != 0) || (gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            for (gm = 0; gm < 13; gm++) {
                v = sal_a[gm];
                if (gd <= v) break;
                gd -= v;
            }
            return [gy, gm, gd];
        },

        getPack : function()
        {
            return Kavimo.datetime.pack;
        },
        getJalali : function(pack)
        {
            pack = pack ? pack : this.getPack();

            var date = new Date(pack),
                year = date.getFullYear(),
                month = date.getMonth() + 1,
                day = date.getDate();
            return this.gregorian_to_jalali(year,month,day);
        },
        getYear : function(pack)
        {
            pack = pack ? pack : this.getPack();
            return Kavimo.core.language.digitToPersian(this.getJalali(pack)[0]);
        },
        getMonth : function(pack)
        {
            pack = pack ? pack : this.getPack();
            return Kavimo.core.language.digitToPersian(this.getJalali(pack)[1]);
        },
        getMonthString : function(pack)
        {
            pack = pack ? pack : this.getPack();
            var monthNames = ['ÙØ±ÙˆØ±Ø¯ÛŒÙ†','Ø§Ø±Ø¯ÛŒØ¨Ù‡Ø´Øª','Ø®Ø±Ø¯Ø§Ø¯','ØªÛŒØ±','Ù…Ø±Ø¯Ø§Ø¯','Ø´Ù‡Ø±ÛŒÙˆØ±','Ù…Ù‡Ø±','Ø¢Ø¨Ø§Ù†','Ø¢Ø°Ø±','Ø¯ÛŒ','Ø¨Ù‡Ù…Ù†','Ø§Ø³ÙÙ†Ø¯'];
            return monthNames[this.getJalali(pack)[1] - 1];
        },
        getDay : function(pack)
        {
            pack = pack ? pack : this.getPack();
            return Kavimo.core.language.digitToPersian(this.getJalali(pack)[2]);
        },

    },

    // i18n
    i18n : {

        dict : null,

        // load
        load : function(o)
        {
            if (this.dict !== null) {
                $.extend(this.dict, o);
            } else {
                this.dict = o;
            }
        },

        // get
        get : function(str)
        {
            dict = this.dict;
            if (dict && dict.hasOwnProperty(str)) {
                str = dict[str];
            }
            args = Array.prototype.slice.call(arguments);
            args[0] = str;

            return this.printf.apply(this, args);
        },

        printf: function(str, args) {

            if (arguments.length < 2) return str;

            args = $.isArray(args) ? args : Array.prototype.slice.call(arguments, 1);

            return str.replace(/([^%]|^)%(?:(\d+)\$)?s/g, function(p0, p, position) {
                if (position) {
                    return p + args[parseInt(position)-1];
                }
                return p + args.shift();
            }).replace(/%%s/g, '%s');
        }
    },

}

// public i18n
var __t = function(str)
{
    return Kavimo.core.i18n.get(str);
}

Kavimo.modules = Kavimo.modules || {};

Kavimo.core.init();
