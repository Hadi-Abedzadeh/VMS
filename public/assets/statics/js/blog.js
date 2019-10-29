/*
 * ================================================
 * Kavimo.com
 * Designer : WonderCo Team
 * Programing : WonderCo Team
 * URL : http://WonderCo.ir
 * ================================================
 ** Blog Module - JS
 * ================================================
*/

$(function(){

    Kavimo.modules.blog = {

        vars : {
            list_comments : $('.list-comments'),
        },

        init : function()
        {
            Kavimo.modules.public.responsiveHeaderPages();
            Kavimo.modules.public.newsletterForm(this);
            this.sendCommnetForm();
            this.replyComment();
            this.fixMailerLite();
        },
        fixMailerLite : function()
        {
            var form = $('.ml-block-form .subscribe-form');

            form.find('h4,p,input,button[type="submit"]').each(function(){
                $(this).css('cssText','font-family: "iransans" !important; direction:rtl !important;text-align:center !important');
            });
        },
        replyComment : function()
        {
            var _instance = this,
                textarea = $('textarea[name=message]');

            _instance.vars.list_comments.on('click','ul li a.actions[data-reply]',function(e){

                var _this = $(this);
                textarea.val(_this.data('reply') + ' ').focus();
                $('html,body').animate({
                    scrollTop : $('.blog-comments').offset().top - 100
                },200);

                e.preventDefault();
            });
        },
        sendCommnetForm : function()
        {
            var _instance = this;

            var _form = $('form#send-comment'),
                messageField = _form.find('textarea[name=message]'),
                submitButton = _form.find('button[type=submit]');

            _form.on('submit',function(e){
                if(messageField.val())
                {
                    Kavimo.core.ajax.post({
                        to : 'blog/send-comment',
                        data : {'text': messageField.val(),'blog_id': _instance.vars.blog_id },
                        before : function()
                        {
                            submitButton.attr('disabled','disabled');
                        },
                        done : function(response)
                        {
                            if(response.success)
                            {
                                submitButton.removeAttr('disabled');
                                messageField.val('');

                                var new_comment = '<li class="fadeInDown">'+
                                    '<div class="avatar"><img src="'+Kavimo.user_identity.avatar+'"></div>'+
                                    '<div class="message">'+
                                    '<div class="head-message">'+
                                    '<div class="row">'+
                                    '<div class="col-xl-2 col-xs-2">'+
                                    '<a href="#reply" class="actions" data-reply="'+response.data.mention+'"><i class="md-reply"></i></a>'+
                                    '</div>'+
                                    '<div class="col-xl-10 col-xs-10">'+
                                    '<a href="#cm-'+response.data.anchor_id+'" name="cm-'+response.data.anchor_id+'" class="name">'+Kavimo.user_identity.full_name+'</a>'+
                                    '<span class="date">'+_instance.i18n['accept-after-active']+'</span>'+
                                    '</div>'+
                                    '</div>'+
                                    '</div>'+ response.data.message +
                                    '</div>'+
                                    '</li>';

                                _instance.vars.list_comments.find('ul').prepend(new_comment);
                            }
                        }
                    });
                }
                else
                {
                    messageField.focus();
                }

                e.preventDefault();
            })
        },
    }

    //

    $(function(){

        Kavimo.modules.public = {

            // varibale
            vars : {
                header : $('header'),
                responsive : {
                    button_menu : $('header .button-menu'),
                    overlay : $('header .overlay-responsive'),
                },

                plansCost : {
                    percent_six_monthly_off : 10, // 10 Percent
                    percent_yearly_off : 15, // 10 Percent
                    OneTB_bandwidth : 700000,
                    OneTB_storage   : 600000,
                }
            },
            responsiveHeaderPages : function()
            {
                var _instance = this;

                _instance.vars.responsive.button_menu.bind('click',function(){
                    $('body').addClass('active_responsive_layout');
                });
                _instance.vars.responsive.overlay.bind('click',function(){
                    $('body').removeClass('active_responsive_layout');
                });

            },
            calcPricing : function(options)
            {
                var _instance = this;

                var total = 0;
                var total_extra = 0;
                var price_off = 0;
                var percent_off = 0;
                var default_price_by_values = 41000;

                var totalPriceBandwidth = (_instance.vars.plansCost.OneTB_bandwidth * options.bandwidth) / 1000;
                var totalPriceStorage = (_instance.vars.plansCost.OneTB_storage * (options.video_numbers * options.max_size_upload)) / 1000;

                options.only_plan_cost = parseInt(options.only_plan_cost);

                total_extra = parseInt(totalPriceBandwidth + totalPriceStorage) - default_price_by_values;

                total = total_extra + options.only_plan_cost;

                if(options.payment_time == "six-monthly")
                {
                    total = (total * 6);
                    price_off = parseInt(total * _instance.vars.plansCost.percent_six_monthly_off / 100);
                    total = total - price_off;
                    percent_off = _instance.vars.plansCost.percent_six_monthly_off;
                }
                else if(options.payment_time == "yearly")
                {
                    total = (total * 12);
                    price_off = parseInt(total * _instance.vars.plansCost.percent_yearly_off / 100);
                    total = total - price_off;
                    percent_off = _instance.vars.plansCost.percent_yearly_off;
                }


                return {
                    total : total,
                    total_plan_only : options.only_plan_cost,
                    total_extra : total_extra,
                    off :  {
                        price : price_off,
                        percent : percent_off,
                    },
                    totalWitoutOff : total + price_off
                };
            },

            newsletterForm : function(module)
            {
                var _instance = module;

                var _form = $('form#newsletter-form'),
                    emailField = _form.find('input[name=email]'),
                    nameField = _form.find('input[name=name]'),
                    submitButton = _form.find('button[type=submit]'),
                    patternEmail = /^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/;

                $(nameField).add(emailField).on('focus',function(){
                    $(this).removeClass('error');
                })

                _form.on('submit',function(e){
                    if(nameField.val() && emailField.val() && patternEmail.test(emailField.val()))
                    {
                        Kavimo.core.ajax.post({
                            to : 'site/newsletter',
                            data : {'email': emailField.val(),'name' : nameField.val()},
                            before : function()
                            {
                                submitButton.attr('disabled','disabled');
                            },
                            done : function(response)
                            {
                                if(response.success)
                                {
                                    _form.parent('div').html('<div class="newsletter-success">'+__t('newsletter-landing-success-message')+'</div>');
                                }
                            }
                        });
                    }
                    else
                    {
                        (
                            (!nameField.val() && nameField.addClass('error')),
                                (!emailField.val() && emailField.addClass('error')),
                                (!patternEmail.test(emailField.val()) && emailField.addClass('error'))
                        )
                    }

                    e.preventDefault();
                })
            },


            init : function()
            {
                // run all pages
            },

        }

        Kavimo.modules.public.init();
        Kavimo.modules.blog.init();

    });
});
