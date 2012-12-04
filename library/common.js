var css = (env == 'production') ? library_path + '/min/?f=' + client_css : client_css;
var library = (env == 'production') ? library_path + '/min/?f=' + library_path : library_path;

$(document).ready(function(){
    Modernizr.load([
        {
          load: '/.config/i18n/messages.'+ locale + '.js'
        },
        {
            load: [library + '/chosen/chosen.css', library + '/chosen/chosen.min.js'],
            complete: function() {
                $('select').chosen({disable_search_threshold: 10});
            }
        },
        {
            test: $.browser.mozilla,
            yep: css + '/mozilla_reset.css'
        },
        {
            test: $.browser.msie,
            yep: library + '/classList.js'
        },
        {
            test: $("textarea").is("[id^='cked-']"),
            yep: library + '/ckeditor/ckeditor.js',
            callback: function() {
                for(i=0;i<$("textarea[id^='cked-']").length;i++) {
                    if (CKEDITOR.instances[$("textarea[id^='cked-']")[i].id]){
                        delete CKEDITOR.instances[$("textarea[id^='cked-']")[i].id]
                    };
                    CKEDITOR.replace(
                        $("textarea[id^='cked-']")[i].id,
                                {
                                    toolbar : $("textarea[id^='cked-']")[i].classList[0]
                                }
                    );
                }
            }
        },
        {
            test: $("input").is("[id^=datepicker-]") || $("div").is("[id^=window-]"),
            yep: [library + '/jquery-ui/jquery-ui-1.8.23.custom.min.js',library + '/jquery-ui/jquery-ui-1.8.23.custom.css'],
            callback: function() {
                $("input[type='text'][id^=datepicker-]").datepicker({yearRange:'-65:+15' });

                $("div[id^=window-]").dialog({
                    autoOpen: false,
                    modal: true
                });
                $("a[id^=window-]").on('click',function() {
                    $("div[id^=" + this.id + "]").dialog("open");
                    return false;
                });
                $("button[id^=window-]").on('click',function() {
                    $("div[id^=" + this.id + "]").dialog("open");
                    return false;
                });
            }
        },
        {
            test: $('.confirm').length > 0,
            yep: [library + '/confirm/confirm.js', library + '/confirm/confirm.css'],
            callback: function() {
                $('.confirm').live('click', function(){
                    $.confirm({
                        'buttons': {
                            'Yes': {
                                'href'  : $(this).children("label.confirm-text").text(),
                                'class' : $(this).hasClass('submit') ? 'click-submit' : ''
                            },
                            'No': {
                                'href'	: '#',
                                'class' : 'confirm-no'
                            }
                        }
                    });
                    return false;
                });
            }
        },
        {
            test: $("div").is("[id^=fancybox-]") || $('a').is("[class^=fancybox-]"),
            yep: [library + '/fancybox/jquery.fancybox.js', library + '/fancybox/jquery.fancybox.css'],
            callback: function() {
                $("div[id^=fancybox-] a").fancybox({
                    nextEffect: 'elastic',
                    prevEffect: 'elastic',
                    openEffect	: 'elastic',
                    closeEffect	: 'elastic'
                });
                $("a.fancybox-video").on('click',function() {
                    $.fancybox({
                        'padding' : 0,
                        'href' : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                        'type' : 'swf',
                        'swf' : {
                            'wmode': 'transparent',
                            'allowfullscreen': 'true'
                        }
                    });
                    return false;
                });
                $("a.fancybox-map, a.fancybox-iframe").on('click',function() {
                    $.fancybox({
                        'href' : this.href,
                        'type' : 'iframe'
                    });
                    return false;
                });
                $("a.fancybox-ajax").on('click',function() {
                    $.fancybox({
                        'href' : this.href,
                        'type' : 'ajax'
                    });
                    return false;
                });
            }
        },
        {
            test: $('form').length > 0,
            yep: library + '/jquery.h5validate.js',
            callback: function() {
                $('form').h5Validate();
            }
        },
        {
            test: $.browser.msie && $.browser.version==9.0,
            yep: [css + '/ie9.css', library + '/PIE.js'],
            callback: function() {
                if (window.PIE) {
                    $('*').each(function() {
                        PIE.attach(this);
                    });
                }
            }
        },
        {
            test: $('.qtip-tooltip').length > 0,
            yep: [library + '/qTip2/jquery.qtip.min.js', library + '/qTip2/jquery.qtip.min.css'],
            callback: function() {
                $(document).ready(function(){
                    $('a.qtip-tooltip[title]').qtip({
                        position: {
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'ui-tooltip-shadow ui-tooltip-bootstrap'
                        }
                    });
                });
            }
        },
        {
            test: $('.wrapper #file').length > 0,
            yep: [library + '/jquery.form.js'],
            callback: function() {
                $('.wrapper #file').live('change', function(){
                    $('#content').addClass('loading');
                    $('.files_wrapper, #content p.h2_title').remove();
                    $('input[name=files]').val($.map($(this).get(0).files, function(file) {
                        return ' ' + file.name;
                    }));
                    if($(this).val().length > 0) {
                        $('.multi').ajaxSubmit({
                            target:'.multi',
                            success : function() {
                                $(document).ready(function() {
                                    $('#content').removeClass('loading');
                                    $('div.upload .drm-success').delay(5000).slideUp(600);
                                    $('div.upload .drm-error').delay(5000).slideUp(600);
                                    $('input[name=files]').val('');
                                });
                            }
                        });
                    };
                    return false;
                });
            }
        },
        {
            test: $.browser.msie && $.browser.version<9,
            yep: library + '/ie_blocker/warning.js'
        }
    ]);
});

$(document).ready(function(){
   $('.detach').remove();
});