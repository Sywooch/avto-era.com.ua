/*
 *imagecms frontend plugins
 ** @author Domovoj
 * @copyright ImageCMS (c) 2013, Avgustus <domovoj1@gmail.com>
 */
var isTouch = 'ontouchstart' in document.documentElement,
activeClass = 'active',
disabledClass = 'disabled',
clonedC = 'cloned';
wnd = $(window),
    body = $('body');
$.expr[':'].regex = function(elem, index, match) {
    var matchParams = match[3].split(','),
    validLabels = /^(data|css):/,
    attr = {
        method: matchParams[0].match(validLabels) ?
        matchParams[0].split(':')[0] : 'attr',
        property: matchParams.shift().replace(validLabels, '')
    },
    regexFlags = 'ig',
    regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g, ''), regexFlags);
    return regex.test($(elem)[attr.method](attr.property));
}

String.prototype.trimMiddle = function()
{
    var r = /\s\s+/g;
    return $.trim(this).replace(r, ' ');
}
String.prototype.pasteSAcomm = function() {
    var r = /\s,/g;
    return this.replace(r, ',');
}

$.exists = function(selector) {
    return ($(selector).length > 0);
}
$.existsN = function(nabir) {
    return (nabir.length > 0);
}
$.testNumber = function(e) {
    if (!e)
        var e = window.event;
    var key = e.keyCode;
    if (key == null || key == 0 || key == 8 || key == 13 || key == 9 || key == 46 || key == 37 || key == 39)
        return true;
    if ((key >= 48 && key <= 57) || (key >= 96 && key <= 105)) {
        return true;
    }
    else
        return false;
}
$.onlyNumber = function(el) {
    body.on('keydown', el, function(e) {
        if (!$.testNumber(e)) {
            $(this).tooltip();
            return false;
        }
        else{
            $(this).tooltip('remove');
        }
    });
}
$.fn.pricetext = function(e, rank) {
    var $this = $(this);
    rank != undefined ? rank = rank : rank = true;
    $(document).trigger({
        type: 'textanimatechange', 
        el: $this, 
        ovalue: parseFloat($this.text().replace(/\s+/g, '')), 
        nvalue: e, 
        rank: rank
    })
    return $this;
}
$.fn.setCursorPosition = function(pos) {
    this.each(function() {
        this.select();
        try{
            this.setSelectionRange(pos, pos);
        }catch(err){}
    });
    return this;
};
$(document).on('textanimatechange', function(e) {
    var $this = e.el,
    nv = e.nvalue,
    ov = e.ovalue,
    rank = e.rank,
    dif = nv - ov,
    temp = ov;
    if (dif > 0) {
        var ndif = dif,
        step = Math.floor(dif / 100);
    }
    else
    {
        ndif = Math.abs(dif),
        step = -Math.floor(ndif / 100);
    }
    var cond = '',
    numb = setInterval(function() {
        temp += step;
        cond = temp < nv;
        if (dif < 0)
            cond = temp > nv;
        if (cond && step != 0)
            $this.text(rank ? temp.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ') : temp)
        else {
            $this.text(rank ? nv.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ') : nv)
            clearInterval(numb)
            temp = nv;
        }
    }, 1)

})
function setcookie(name, value, expires, path, domain, secure)
{
    var today = new Date();
    today.setTime(today.getTime());
    if (expires)
    {
        expires = expires * 1000 * 60 * 60 * 24;
    }
    var expiresDate = new Date(today.getTime() + (expires));
    document.cookie = name + "=" + encodeURIComponent(value) +
    ((expires) ? ";expires=" + expiresDate.toGMTString() : "") + ((path) ? ";path=" + path : "") +
    ((domain) ? ";domain=" + domain : "") +
    ((secure) ? ";secure" : "");
}
function getCookie(c_name)
{
    var c_value = document.cookie,
    c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1)
        c_start = c_value.indexOf(c_name + "=");
    if (c_start == -1)
        c_value = null;
    else
    {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1)
            c_end = c_value.length;
        c_value = unescape(c_value.substring(c_start,c_end));
    }
    return c_value;
}

(function($) {
    var methods = {
        init: function(options) {
            if ($.existsN($(this))) {
                var settings = $.extend({
                    wrapper: $(".frame-label:has(.niceCheck)"),
                    elCheckWrap: '.niceCheck',
                    evCond: false,
                    classRemove: null,
                    before: function() {
                    },
                    after: function() {
                    }
                }, options);
                var frameChecks = $(this),
                wrapper = settings.wrapper,
                elCheckWrap = settings.elCheckWrap,
                evCond = settings.evCond,
                classRemove = settings.classRemove,
                frameChecks = frameChecks.selector.split(','),
                after = settings.after;
                $.map(frameChecks, function(i, n) {
                    var frameChecks = $(i.replace(' ', ''));
                    frameChecks.each(function() {
                        var thisFrameChecks = $(this);
                        thisFrameChecks.find(elCheckWrap).each(function() {
                            var $this = $(this).removeClass(classRemove),
                            $thisInput = $this.find('input');
                            methods.changeCheckStart($this);
                            if ($thisInput.is('[disabled="disabled"]')) {
                                methods.CheckallDisabled($this);
                            }
                        })
                    }).find(wrapper).off('click.nstcheck').on('click.nstcheck', function(e) {
                        var $this = $(this),
                        $thisD = $this.is('.disabled'),
                        nstcheck = $this.find(elCheckWrap);
                        if (nstcheck.length == 0)
                            nstcheck = $this
                        if (!$thisD) {
                            if (!evCond) {
                                methods.changeCheck(nstcheck);
                                after(frameChecks, $this, nstcheck, e);
                            }
                            else {
                                settings.before(frameChecks, $this, nstcheck, e);
                            }
                        }
                    });
                    var form = frameChecks.closest('form');
                    form.find('[type="reset"]').off('click.nstcheck').on('click.nstcheck', function() {
                        methods.changeCheckallreset(form.find(elCheckWrap));
                    });
                });
                wrapper.find('input').off('change.nstCheck mousedown.nstCheck click.nstCheck keyup.nstCheck').on('change.nstCheck mousedown.nstCheck click.nstCheck', function(e) {
                    $(this).closest(wrapper).trigger('click.nstcheck');
                    return false;
                }).on('keyup.nstCheck', function(e) {
                    if (e.keyCode == 32)
                        $(this).closest(wrapper).trigger('click.nstcheck');
                })
            }
        },
        changeCheckStart: function(el) {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            if (input.attr("checked") != undefined) {
                methods.checkChecked(el);
            }
            else {
                methods.checkUnChecked(el);
            }
        },
        checkChecked: function(el) {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            if (input == undefined)
                input = $(this).find("input");
            el.addClass(activeClass).parent().addClass(activeClass);
            input.attr("checked", 'checked');
            $(document).trigger({
                'type': 'nstCheck.CC', 
                'el': el, 
                'input': input
            });
        },
        checkUnChecked: function(el) {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            if (input == undefined)
                input = $(this).find("input");
            el.removeClass(activeClass).parent().removeClass(activeClass);
            input.removeAttr("checked");
            $(document).trigger({
                'type': 'nstCheck.CUC', 
                'el': el, 
                'input': input
            });
        },
        changeCheck: function(el)
        {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            if (input.attr("checked") == undefined) {
                methods.checkChecked(el);
            }
            else {
                methods.checkUnChecked(el);
            }
        },
        changeCheckallchecks: function(el)
        {
            if (el == undefined)
                el = this;
            el.each(function() {
                var input = el.find("input");
                el.addClass(activeClass).parent().addClass(activeClass);
                input.attr("checked", "checked");
            })
        },
        changeCheckallreset: function(el)
        {
            if (el == undefined)
                el = this;
            el.each(function() {
                var input = el.find("input");
                el.removeClass(activeClass).parent().removeClass(activeClass);
                input.removeAttr("checked");
            });
        },
        CheckallDisabled: function(el)
        {
            var el = el;
            if (el == undefined)
                el = this;
            el.each(function() {
                var input = el.find("input");
                el.addClass('disabled').parent().addClass('disabled');
                input.attr('disabled', 'disabled');
            });
        },
        CheckallEnabled: function(el)
        {
            if (el == undefined)
                el = this;
            el.each(function() {
                var input = el.find("input");
                el.removeClass('disabled').parent().removeClass('disabled');
                input.removeAttr('disabled');
            });
        }
    };
    $.fn.nStCheck = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.nStCheck');
        }
    };
    $.nStCheck = function(m) {
        return methods[m];
    };
})(jQuery);
(function($) {
    var methods = {
        init: function(options) {
            var optionsRadio = $.extend({
                wrapper: $(".frame-label:has(.niceRadio)"),
                elCheckWrap: '.niceRadio',
                classRemove: null,
                before: function() {
                },
                after: function() {
                }
            }, options),
            settings = optionsRadio;
            var $this = $(this);
            if ($.existsN($this)) {
                $this.each(function() {
                    var $this = $(this),
                    after = settings.after,
                    before = settings.before,
                    classRemove = settings.classRemove,
                    wrapper = settings.wrapper,
                    elCheckWrap = settings.elCheckWrap,
                    input = $this.find(elCheckWrap).find('input');
                    $this.find(elCheckWrap).each(function() {
                        methods.changeRadioStart($(this), classRemove, after, true);
                    });
                    input.each(function() {
                        var input = $(this);
                        $(input.data('link')).focus(function(e) {
                            if (e.which == 0)
                                methods.radioCheck(input.parent(), after, false);
                        })
                    })
                    $this.find(wrapper).off('click.radio').on('click.radio', function(e) {
                        if (!$(this).find('input').is(':disabled')) {
                            before($(this));
                            methods.changeRadio($(this).find(elCheckWrap), after, false);
                        }
                    });
                    input.on('mousedown change', function(e) {
                        return false;
                    })
                })
            }
        },
        changeRadioStart: function(el, classRemove, after, start)
        {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            if (input.is(":checked")) {
                methods.radioCheck(el, after, start);
            }
            if (input.is(":disabled")) {
                methods.radioDisabled(el);
            }
            el.removeClass(classRemove);
            return false;
        },
        changeRadio: function(el, after, start)
        {
            if (el == undefined)
                el = this;
            methods.radioCheck(el, after, start);
        },
        radioCheck: function(el, after, start) {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            el.addClass(activeClass).removeClass(disabledClass);
            el.parent().addClass(activeClass).removeClass(disabledClass);
            input.attr("checked", true);
            $(input.data('link')).focus();
            input.closest('form').find('[name=' + input.attr('name') + ']').not(input).each(function() {
                methods.radioUnCheck($(this).parent())
            });
            after(el, start);
            $(document).trigger({
                'type': 'nStRadio.RC', 
                'el': el, 
                'input': input
            });
        },
        radioUnCheck: function(el) {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            el.removeClass(activeClass);
            el.parent().removeClass(activeClass);
            input.attr("checked", false);
            $(document).trigger({
                'type': 'nStRadio.RUC', 
                'el': el, 
                'input': input
            });
        },
        radioDisabled: function(el) {
            if (el == undefined)
                el = this;
            var input = el.find("input");
            input.attr('disabled', 'disabled');
            el.removeClass(activeClass).addClass(disabledClass);
            el.parent().removeClass(activeClass).addClass(disabledClass);
        },
        radioUnDisabled: function(el) {
            if (el == undefined)
                el = this;
            var input = el.find("input");            
            input.removeAttr('disabled');
            el.removeClass(activeClass + ' ' + disabledClass);
            el.parent().removeClass(activeClass + ' ' + disabledClass);
        }
    };
    $.fn.nStRadio = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.nStRadio');
        }
    };
    $.nStRadio = function(m) {
        return methods[m];
    };
})(jQuery);
(function($) {
    var methods = {
        init: function(options) {
            var settings = $.extend({
                item: 'ul > li',
                duration: 300,
                searchPath: siteUrl+locale+"shop/search/ac",
                inputString: $('#inputString'),
                minValue: 3,
                blockEnter: true
            }, options);
            function postSearch() {
                $(document).trigger({
                    'type': 'autocomplete.before', 
                    'el': inputString
                });
                $.post(searchPath, {
                    queryString: inputString.val()
                }, function(data) {
                    try {
                        var dataObj = JSON.parse(data),
                        html = _.template($('#searchResultsTemplate').html(), {
                            'items': dataObj
                        });
                    } catch (e) {
                        var html = e.toString();
                    }
                    $thisS.html(html);
                    $thisS.fadeIn(durationA, function() {
                        $(document).trigger({
                            'type': 'autocomplete.after', 
                            'el': $thisS, 
                            'input': inputString
                        });
                        $thisS.off('click.autocomplete').on('click.autocomplete', function(e) {
                            e.stopImmediatePropagation();
                        })
                        body.off('click.autocomplete').on('click.autocomplete', function(event) {
                            closeFrame();
                        }).off('keydown.autocomplete').on('keydown.autocomplete', function(e) {
                            if (!e)
                                var e = window.event;
                            if (e.keyCode == 27) {
                                closeFrame();
                            }
                        });
                    });
                    if (inputString.val().length == 0)
                        closeFrame();
                    selectorPosition = -1;
                    var itemserch = $thisS.find(itemA);
                    itemserch.mouseover(function() {
                        var $this = $(this);
                        $this.addClass('selected');
                        selectorPosition = $this.index();
                        lookup(itemserch, selectorPosition);
                    }).mouseleave(function() {
                        $(this).removeClass('selected');
                    });
                    lookup(itemserch, selectorPosition);
                });
            }
            function lookup(itemserch, selectorPosition) {
                inputString.keyup(function(event) {
                    if (!event)
                        var event = window.event;
                    var code = event.keyCode;
                    if (code == 38 || code == 40)
                    {
                        if (code == 38)
                        {
                            selectorPosition -= 1;
                        }
                        if (code == 40)
                        {
                            selectorPosition += 1;
                        }
                        
                        if (selectorPosition < 0)
                        {
                            selectorPosition = itemserch.length - 1;
                        }
                        if (selectorPosition > itemserch.length - 1)
                        {
                            selectorPosition = 0;
                        }
                        itemserch.removeClass('selected');
                        itemserch.eq(selectorPosition).addClass('selected');
                        return false;
                    }
                    
                    // Enter pressed
                    if (code == 13)
                    {
                        var itemserchS = itemserch.filter('.selected');
                        if ($.existsN(itemserchS))
                            itemserchS.each(function(i, el) {
                                window.location = $(el).attr('href');
                                window.location = $(el).find('a').attr('href');
                            });
                        else {
                            $thisS.closest('form').submit();
                        }
                    }
                    return false;
                })
            }
            
            function closeFrame() {
                $(document).trigger({
                    'type': 'autocomplete.close', 
                    'el': $thisS
                });
                $thisS.stop(true, false).fadeOut(durationA);
                $thisS.off('click.autocomplete');
                body.off('click.autocomplete').off('keydown.autocomplete');
            }
            
            var $thisS = $(this),
            blockEnter = settings.blockEnter,
            itemA = settings.item,
            durationA = settings.duration,
            searchPath = settings.searchPath,
            selectorPosition = -1,
            inputString = settings.inputString,
            minValue = settings.minValue;
            var submit = inputString.closest('form').find('[type="submit"]');
            if (blockEnter)
                submit.on('click.autocomplete', function(e) {
                    e.preventDefault();
                    inputString.focus();
                    $(document).trigger({
                        type: 'autocomplete.fewLength', 
                        el: inputString, 
                        value: minValue
                    });
                });
            inputString.keyup(function(event) {
                var $this = $(this);
                var inputValL = $this.val().length;
                if (!event)
                    var event = window.event;
                var code = event.keyCode;
                if (inputValL > minValue) {
                    $this.tooltip('remove');
                    if (code != 27 && code != 40 && code != 38 && code != 39 && code != 37 && code != 13 && inputValL != 0 && $.trim($this.val()) != "")
                        postSearch();
                    else if (inputValL == 0)
                        closeFrame();
                }
                else{
                    if (code == 13 && !blockEnter)
                        submit.closest('form').submit();
                    else
                        $(document).trigger({
                            type: 'autocomplete.fewLength', 
                            el: $this, 
                            value: minValue
                        });
                }
                if (inputString.val().length <= minValue && blockEnter)
                    submit.off('click.autocomplete').on('click.autocomplete', function(e) {
                        e.preventDefault();
                        inputString.focus();
                        $(document).trigger({
                            type: 'autocomplete.fewLength', 
                            el: inputString, 
                            value: minValue
                        });
                    })
                else {
                    submit.off('click.autocomplete');
                }
            }).blur(function() {
                closeFrame();
            });
            inputString.keypress(function(event) {
                if (!event)
                    var event = window.event;
                var code = event.keyCode;
                if (code == 13 && $(this).val().length <= minValue)
                    return false;
            })
        }
    }
    $.fn.autocomplete = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.autocomplete');
        }
    };
    $.autocomplete = function(m) {
        return methods[m];
    };
})(jQuery);
(function($) {
    var methods = {
        init: function(options) {
            var tooltip = $('.tooltip').not('.' + clonedC),
            settings = $.extend({
                title: this.attr('data-title'),
                otherClass: false,
                effect: 'notalways',
                textEl: '.text-el'
            }, options);
            var $this = $(this), textEl = $this.find(settings.textEl);
            if (textEl.is(':visible') && $.existsN(textEl))
                return false;
            tooltip.text(settings.title);
            if (settings.otherClass !== false)
                tooltip.addClass(settings.otherClass);
            if (settings.effect == 'always' && !$.exists('.' + settings.otherClass + 'tooltip')) {
                tooltip = tooltip.clone();
                tooltip.addClass(settings.otherClass + 'tooltip').appendTo(body);
            }
            var tempeff = false;
            if (settings.effect == 'notalways') {
                tooltip.hide();
                tempeff = 'stop';
            }
            if (tempeff) {
                tooltip.css({
                    'left': Math.ceil(this.offset().left - (tooltip.actual('outerWidth') - this.outerWidth()) / 2),
                    'top': this.offset().top - tooltip.actual('outerHeight')
                }).stop(true, false).fadeIn(300, function() {
                    $(document).trigger({
                        'type': 'tooltip.show', 
                        'el': $(this)
                    });
                });
            }
            else {
                tooltip.css({
                    'left': Math.ceil(this.offset().left - (tooltip.actual('outerWidth') - this.outerWidth()) / 2),
                    'top': this.offset().top - tooltip.actual('outerHeight')
                }).fadeIn(300, function() {
                    $(document).trigger({
                        'type': 'tooltip.show', 
                        'el': $(this)
                    });
                });
            }
            $this.off('mouseout.tooltip').on('mouseout.tooltip', function() {
                $(this).tooltip('remove');
            })
            $this.filter(':input').off('blur.tooltip').on('blur.tooltip', function() {
                $(this).tooltip('remove');
            })
        
        },
        remove: function() {
            $('.tooltip').stop(true, false).fadeOut(300, function() {
                $(document).trigger({
                    'type': 'tooltip.hide', 
                    'el': $(this)
                });
            });
        }
    };
    $.fn.tooltip = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.tooltip');
        }
    };
    $.tooltip = function(m) {
        return methods[m];
    };
    body.on('mouseover', '[data-rel="tooltip"]', function() {
        $(this).tooltip();
    }).on('mouseout', '[data-rel="tooltip"]', function() {
        $(this).tooltip('remove');
    }).on('click', function(){
        $.tooltip('remove');
    })
})(jQuery);
/*plugin menuImageCms for main menu shop*/
(function($) {
    var methods = {
        _position: function(menuW, $thisL, dropW, drop, $thisW, countColumn, sub2, direction) {
            if ((menuW - $thisL < dropW && dropW < menuW && direction != 'left') || direction == 'right') {
                drop.removeClass('left-drop')
                if (drop.children().children().length >= countColumn && !sub2)
                    drop.css('right', 0).addClass('right-drop');
                else {
                    var right = menuW - $thisW - $thisL;
                    if ($thisL + $thisW < dropW){
                        right = menuW - dropW;
                    }
                    drop.css('right', right).addClass('right-drop');
                }
            } else if (direction != 'right' || direction == 'left') {
                drop.removeClass('right-drop')
                if (sub2 && dropW > menuW)
                    drop.css('left', $thisL).addClass('left-drop');
                else if (drop.children().children().length >= countColumn || dropW >= menuW)
                    drop.css('left', 0).addClass('left-drop');
                else
                    drop.css('left', $thisL).addClass('left-drop');
            }
        },
        init: function(options) {
            $(this).each(function(){
                var menu = $(this);
                if ($.existsN(menu)) {
                    var sH = 0,
                    optionsMenu = $.extend({
                        item: 'li:first',
                        direction: null,
                        effectOn: 'fadeIn',
                        effectOff: 'fadeOut',
                        effectOnS: 'fadeIn',
                        effectOffS: 'fadeOut',
                        duration: 0,
                        drop: 'li > ul',
                        countColumn: 'none',
                        columnPart: false,
                        columnPart2: false,
                        maxC: 10,
                        sub3Frame: 'ul ul',
                        columnClassPref: 'column_',
                        columnClassPref2: 'column2_',
                        durationOn: 0,
                        durationOff: 0,
                        durationOnS: 0,
                        durationOffS: 0,
                        animatesub3: false,
                        dropWidth: null,
                        sub2Frame: null,
                        evLF: 'hover',
                        evLS: 'hover',
                        hM: 'hoverM',
                        menuCache: false,
                        activeFl: activeClass,
                        parentTl: 'li',
                        refresh: false,
                        otherPage: undefined,
                        vertical: false
                    }, options);
                    menu.data('options', optionsMenu);
                    var settings = optionsMenu,
                    menuW = menu.width(),
                    menuItem = menu.find(settings.item),
                    direction = settings.direction,
                    drop = settings.drop,
                    dropOJ = $(drop),
                    effOn = settings.effectOn,
                    effOff = settings.effectOff,
                    effOnS = settings.effectOnS,
                    effOffS = settings.effectOffS,
                    countColumn = settings.countColumn,
                    columnPart = settings.columnPart,
                    columnPart2 = settings.columnPart2,
                    maxC = settings.maxC,
                    sub3Frame = settings.sub3Frame,
                    columnClassPref = settings.columnClassPref,
                    columnClassPref2 = settings.columnClassPref2,
                    itemMenuL = menuItem.length,
                    dropW = settings.dropWidth,
                    sub2Frame = settings.sub2Frame,
                    duration = timeDurM = settings.duration,
                    durationOn = settings.durationOn,
                    durationOff = settings.durationOff,
                    durationOnS = settings.durationOnS,
                    durationOffS = settings.durationOffS,
                    animatesub3 = settings.animatesub3,
                    evLF = settings.evLF,
                    evLS = settings.evLS,
                    hM = settings.frAClass,
                    refresh = settings.refresh,
                    menuCache = settings.menuCache,
                    activeFl = settings.activeFl,
                    parentTl = settings.parentTl,
                    otherPage = settings.otherPage,
                    vertical = settings.vertical;
                    if (menuCache && !refresh) {
                        menu.find('a').each(function() {//if start without cache and remove active item
                            var $this = $(this);
                            $this.closest(activeFl.split(' ')[0]).removeClass(activeClass);
                            $this.removeClass(activeClass);
                        });
                        var locHref = location.href;
                        var locationHref = otherPage != undefined ? otherPage : locHref
                        menu.find('a[href="' + locationHref + '"]').each(function() {
                            var $this = $(this);
                            $this.closest(activeFl.split(' ')[0]).addClass(activeClass);
                            $this.closest(parentTl.split(' ')[0]).addClass(activeClass).prev().addClass(activeClass);
                            $this.addClass(activeClass);
                        })
                    }
                    if (isTouch) {
                        evLF = 'toggle';
                        evLS = 'toggle';
                    }
                    if (!refresh) {
                        if (columnPart2) {
                            dropOJ.find(sub3Frame).each(function() {
                                var $this = $(this),
                                columnsObj = $this.find(':regex(class,' + columnClassPref2 + '([0-9]+))'),
                                numbColumn = [];
                                columnsObj.each(function(i) {
                                    numbColumn[i] = $(this).attr('class').match(new RegExp(columnClassPref2 + '([0-9]+)'))[0];
                                })
                                numbColumn = _.uniq(numbColumn).sort();
                                var numbColumnL = numbColumn.length;
                                if (numbColumnL > 1) {
                                    if ($.inArray('0', numbColumn) == 0){
                                        numbColumn.shift();
                                        numbColumn.push('0');
                                    }
                                    $.map(numbColumn, function(n, i) {
                                        var currC = columnsObj.filter('.' + n),
                                        classCuurC = currC.first().attr('class');
                                        $this.children().append('<li class="' + classCuurC + '" data-column="' + n + '"><ul></ul></li>');
                                        $this.find('[data-column="' + n + '"]').children().append(currC.clone());
                                        numbColumnL = numbColumnL > maxC ? maxC : numbColumnL;
                                        if (sub2Frame)
                                            $this.addClass('x' + numbColumnL);
                                        else{
                                            $this.closest('li').addClass('x' + numbColumnL).attr('data-x', numbColumnL);
                                        }
                                
                                    })
                                    columnsObj.remove();
                                }
                            })
                        }
                        if (columnPart && !sub2Frame)
                            dropOJ.each(function() {
                                var $this = $(this),
                                columnsObj = $this.find(':regex(class,' + columnClassPref + '([0-9]+))'),
                                numbColumn = [];
                                columnsObj.each(function(i) {
                                    numbColumn[i] = $(this).attr('class').match(/([0-9]+)/)[0];
                                })
                                numbColumn = _.uniq(numbColumn).sort();
                                var numbColumnL = numbColumn.length;
                                if (numbColumnL == 1 && $.inArray('0', numbColumn) == -1 || numbColumnL > 1) {
                                    if ($.inArray('0', numbColumn) == 0){
                                        numbColumn.shift();
                                        numbColumn.push('0');
                                    }
                                    $.map(numbColumn, function(n, i) {
                                        var $thisLi = columnsObj.filter('.' + columnClassPref + n),
                                        sumx = 0;
                                        $thisLi.each(function() {
                                            var datax = $(this).attr('data-x');
                                            sumx = parseInt(datax == 0 || datax == undefined ? 1 : datax) > sumx ? parseInt(datax == 0 || datax == undefined ? 1 : datax) : sumx;
                                        })
                                        $this.children().append('<li class="x' + sumx + '" data-column="' + n + '" data-x="'+sumx+'"><ul></ul></li>');
                                        $this.find('[data-column="' + n + '"]').children().append($thisLi.clone());
                                    })
                                    columnsObj.remove();
                                }
                                var sumx = 0;
                                $this.children().children().each(function() {
                                    var datax = $(this).attr('data-x');
                                    sumx = sumx + parseInt(datax == 0 || datax == undefined ? 1 : datax);
                                });
                                sumx = sumx > maxC ? maxC : sumx;
                                $this.addClass('x' + sumx);
                            })
                        $(document).trigger({
                            type: 'columnRenderComplete', 
                            el: dropOJ
                        })
                    }
                    var k = [];
                    if (!vertical)
                        menuItem.add(menuItem.find('.helper:first')).css('height', '');
                
                    menuItem.each(function(index) {
                        var $this = $(this),
                        $thisW = $this.width(),
                        $thisL = $this.position().left,
                        $thisH = $this.height(),
                        $thisDrop = $this.find(drop);
                        k[index] = false;
                        if ($thisH > sH)
                            sH = $thisH;
                        if ($.existsN($thisDrop)) {
                            if (!dropW) {
                                menu.css('overflow', 'hidden');
                                var dropW2 = $thisDrop.show().width();
                                $thisDrop.hide();
                                menu.css('overflow', '');
                            }
                            else
                                var dropW2 = dropW;
                            methods._position(menuW, $thisL, dropW2, $thisDrop, $thisW, countColumn, sub2Frame, direction);
                        }
                        $this.data('kk', 0);
                    }).css('height', sH);
                
                    if (!vertical)
                        menuItem.find('.helper:first').css('height', sH);
                
                    menu.removeClass('not-js');
                    var hoverTO = '';
                    function closeMenu() {
                        var $thisDrop = menu.find(drop);
                        if ($thisDrop.length != 0)
                            menu.removeClass(hM);
                    
                        if (evLS == 'toggle' || evLF == 'toggle'){
                            menu.find('.' + hM).click()
                            dropOJ.hide();
                        }
                    
                        $('.firstH, .lastH').removeClass('firstH lastH');
                    
                        clearTimeout(hoverTO);
                    }
                    menuItem.off(evLF)[evLF](
                        function(e) {
                            clearTimeout(hoverTO);
                            closeMenu();
                            var $this = $(this),
                            $thisI = $this.index();
                            $this = $(this).addClass(hM),
                            $thisDrop = $this.find(drop);
                        
                            if ($thisI == 0)
                                $this.addClass('firstH');
                            if ($thisI == itemMenuL - 1)
                                $this.addClass('lastH');
                            if ($(e.relatedTarget).is(menuItem) || $.existsN($(e.relatedTarget).parents(menuItem)) || $this.data('kk') == 0)
                                k[$thisI] = true;
                            if (k[$thisI]) {
                                hoverTO = setTimeout(function() {
                                    $thisDrop[effOn](durationOn, function() {
                                        $this.data('kk', $this.data('kk') + 1);
                                        $(document).trigger({
                                            type: 'menu.showDrop', 
                                            el: $thisDrop
                                        })
                                        if ($thisDrop.length != 0)
                                            menu.addClass(hM);
                                        if (sub2Frame) {
                                            var listDrop = $thisDrop.children();
                                            $thisDrop.find(sub2Frame).addClass('is-side');
                                        
                                            listDrop.children().off(evLS)[evLS](function(e) {
                                                var $this = $(this),
                                                subFrame = $this.find(sub2Frame);
                                                if (e.type != 'click' && evLS != 'toggle') {
                                                    $this.siblings().removeClass(hM);
                                                }
                                                if ($.existsN(subFrame)) {
                                                    if (e.type == 'click' && evLS == 'toggle') {
                                                        e.stopPropagation();
                                                        $this.siblings().filter('.' + hM).click();
                                                        $this.addClass(hM);
                                                    }
                                                    else{
                                                        $this.has(sub2Frame).addClass(hM);
                                                    }
                                                
                                                    $thisDrop.css('width', '');
                                                    listDrop.add(subFrame).css('height', '');
                                                    var dropW = $thisDrop.width(),
                                                    sumW = dropW + subFrame.width(),
                                                    subHL2 = subFrame.outerHeight(),
                                                    dropDH = listDrop.height();

                                                    var addH = listDrop.outerHeight() - dropDH;
                                                    if (subHL2 < dropDH)
                                                        subHL2 = dropDH;
                                                
                                                    if (animatesub3){
                                                        listDrop.animate({
                                                            'height': subHL2
                                                        }, {
                                                            queue: false,
                                                            duration: durationOnS,
                                                            complete: function(){
                                                                $thisDrop.animate({
                                                                    'width': sumW,
                                                                    'height': subHL2 + addH
                                                                }, {
                                                                    queue: false,
                                                                    duration:durationOnS
                                                                });
                                                            }
                                                        });
                                                    }
                                                    else{
                                                        listDrop.css('height', subHL2);
                                                        $thisDrop.css({
                                                            'height': subHL2 + addH,
                                                            'width': sumW
                                                        });
                                                    }   
                                                    subFrame[effOnS](durationOnS, function(){
                                                        subFrame.css('height', subHL2);
                                                    });
                                                }
                                                else return true;
                                            }, function(e){
                                                if (e.type == 'click' && evLS == 'toggle') {
                                                    e.stopPropagation();
                                                }
                                                var $this = $(this),
                                                subFrame = $this.find(sub2Frame);
                                                if ($.existsN(subFrame)) {
                                                    subFrame.hide();
                                                    $thisDrop.stop().css({
                                                        'width': '', 
                                                        'height': ''
                                                    })
                                                    listDrop.add(subFrame).stop().css('height', '')
                                                    $this.removeClass(hM)
                                                }
                                            });
                                        }
                                    });
                                }, timeDurM);
                            }
                        }, function(e) {
                            var $this = $(this),
                            $thisI = $this.index();
                            k[$thisI] = true;
                            if ($this.index() == 0)
                                $this.removeClass('firstH');
                            if ($this.index() == itemMenuL - 1)
                                $this.removeClass('lastH');
                            var $thisDrop = $this.find(drop);
                            if ($.existsN($thisDrop)) {
                                $thisDrop.stop(true, false)[effOff](durationOff);
                            }
                            $this.removeClass(hM);
                        });
                    menu.off('hover')['hover'](
                        function(e) {
                            menuItem.each(function() {
                                $(this).data('kk', 0);
                            })
                            timeDurM = 0;
                        },
                        function(e) {
                            closeMenu();
                            menuItem.each(function() {
                                $(this).data('kk', -1);
                            })
                            timeDurM = duration;
                        });
                    body.off('click.menu').on('click.menu', function(e) {
                        closeMenu();
                    }).off('keydown.menu').on('keydown.menu', function(e) {
                        if (!e)
                            var e = window.event;
                        if (e.keyCode == 27) {
                            closeMenu();
                        }
                    });
                    dropOJ.find('a').off('click.menuref').on('click.menuref', function(e) {
                        if (evLS == 'toggle') {
                            if ($.existsN($(this).next()) && sub2Frame) {
                                e.preventDefault();
                                return true;
                            }
                            e.stopPropagation();
                            return true;
                        }
                        else
                            e.stopPropagation();
                    });
                    menuItem.find('a:first').off('click.menuref').on('click.menuref', function(e) {
                        if (!$.existsN($(this).closest(menuItem).find(drop)))
                            e.stopPropagation();
                    });
                }
            });
            return $(this);
        },
        refresh: function() {
            methods.init.call($(this), $.extend({}, $(this).data('options'), {
                refresh: true
            }));
            return $(this);
        }
    };
    $.fn.menuImageCms = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.menuImageCms');
        }
    };
    $.menuImageCms = function(m) {
        return methods[m];
    };
})(jQuery);
/*plugin menuImageCms end*/
/*plugin tabs*/
(function($) {
    var methods = {
        init: function(options) {
            var $this = $(this);
            if ($.existsN($this)) {
                var settings = $.extend({
                    effectOn: 'show',
                    effectOff: 'hide',
                    durationOn: 0,
                    durationOff: 0,
                    before: function() {
                    },
                    after: function() {
                    }
                }, options);
                var tabsDiv = [],
                tabsId = [],
                navTabsLi = [],
                regRefs = [],
                thisL = this.length,
                k = true,
                refs = [],
                attrOrdata = [];
                $this.each(function(index) {
                    var $thiss = $(this),
                    effectOn = settings.effectOn,
                    effectOff = settings.effectOff,
                    durationOn = settings.durationOn,
                    durationOff = settings.durationOff;
                    navTabsLi[index] = $thiss.children();
                    refs[index] = navTabsLi[index].children();
                    attrOrdata[index] = refs[index].attr('href') != undefined ? 'attr' : 'data';
                    var tempO = $([]),
                    tempO2 = $([]),
                    tempRefs = [];
                    refs[index].each(function(ind) {
                        var tHref = $(this)[attrOrdata[index]]('href');
                        tempO = tempO.add($(tHref));
                        tempO2 = tempO2.add('[data-id=' + tHref + ']');
                        tempRefs.push(tHref);
                    })
                    tabsDiv[index] = tempO;
                    tabsId[index] = tempO2;
                    regRefs[index] = tempRefs;
                    refs[index].off('click.tabs').on('click.tabs', function(e) {
                        wST = wnd.scrollTop();
                        var $this = $(this);
                        var resB = settings.before($this);
                        if (resB == undefined || resB == true) {
                            if ($this.is('a'))
                                e.preventDefault();
                            var condRadio = $thiss.data('type') == 'radio',
                            condStart = e.start;
                            if (!$this.parent().hasClass('disabled')) {
                                var $thisA = $this[attrOrdata[index]]('href'),
                                $thisAOld = navTabsLi[index].filter('.' + activeClass).children()[attrOrdata[index]]('href'),
                                $thisAO = $($thisA),
                                $thisS = $this.data('source'),
                                $thisData = $this.data('data'),
                                $thisSel = $this.data('selector'),
                                $thisDD = $this.data('drop') != undefined;
                                function tabsDivT() {
                                    tabsDiv[index].add(tabsId[index])[effectOff](durationOff).removeClass(activeClass);
                                    $thisAO.add('[data-id=' + $thisA + ']')[effectOn](durationOn, function() {
                                        settings.after($thiss, $thisA, $thisAO.add('[data-id=' + $thisA + ']'));
                                    }).addClass(activeClass);
                                }
                                if (!$thisDD) {
                                    if (!condRadio || e.button == 0) {
                                        navTabsLi[index].removeClass(activeClass);
                                        $this.parent().addClass(activeClass);
                                        if (!condRadio) {
                                            if (!condStart && $thisS != undefined)
                                                tabsDivT()
                                            if ($thisS != undefined && !$thisAO.hasClass('visited')) {
                                                $thisAO.addClass('visited');
                                                $(document).trigger({
                                                    'type': 'tabs.beforeload', 
                                                    "els": tabsDiv[index], 
                                                    "el": $thisAO
                                                });
                                                if ($thisData != undefined)
                                                    $.ajax({
                                                        type: 'post',
                                                        url: $thisS,
                                                        data: $thisData,
                                                        success: function(data) {
                                                            tabsDivT();
                                                            $thisAO.find($thisSel).html(data)
                                                            $(document).trigger({
                                                                'type': 'tabs.afterload', 
                                                                "els": tabsDiv[index], 
                                                                "el": $thisAO
                                                            })
                                                        }
                                                    })
                                                else
                                                    $thisAO.load($thisS, function() {
                                                        $(document).trigger({
                                                            'type': 'tabs.afterload', 
                                                            "els": tabsDiv[index], 
                                                            "el": $thisAO
                                                        })
                                                        tabsDivT()
                                                    })
                                            }
                                            else {
                                                tabsDivT()
                                            }
                                            
                                            if (e.scroll)
                                                wnd.scrollTop($this.offset().top);
                                            $(document).trigger({
                                                'type': 'tabs.showtabs', 
                                                'el': $thisAO
                                            })
                                        }
                                        else {
                                            setcookie($thiss.data('cookie') == undefined ? 'cookie'+index : $thiss.data('cookie'), $this[attrOrdata[index]]('href'), 0, '/');
                                            settings.after($thiss, $thisA, $thisAO.add('[data-id=' + $thisA + ']'));
                                        }
                                    }
                                }
                                var wLH = window.location.hash;
                                var reg = null;
                                try {
                                    reg = wLH.match($thisAOld)[0];
                                } catch (err) {
                                    reg = null;
                                }
                                if ((!condRadio && attrOrdata[index] != 'data') || (($.inArray($thisA, regRefs[index]) > -1 && reg != null))) {
                                    if (!condStart) {
                                        var reg = null,
                                        temp = wLH;
                                        try {
                                            reg = wLH.match(new RegExp(_.without(regRefs[index], undefined).join('|').toString()));
                                        } catch (err) {
                                            reg = null;
                                        }
                                        if (reg != null) {
                                            if (wLH.indexOf($thisA) == -1) {
                                                temp = temp.replace(reg, $thisA)
                                            }
                                            else if ($thisA != reg) {
                                                temp += $thisA;
                                            }
                                        }
                                        else {
                                            temp += $thisA;
                                        }
                                        window.location.hash = temp;
                                    }
                                    else if (!$thisDD && k) {
                                        window.location.hash = _.uniq(tabs.hashs[0]).join('');
                                        k = false;
                                    }
                                    if ($thisDD && condStart)
                                        $this.trigger('click.drop')
                                }
                                
                                else if (e.button == 0 && $thiss.data('elchange') != undefined) {
                                    refs[index].each(function() {
                                        var $thisDH = $(this).data('href');
                                        if ($thisDH == $thisA)
                                            $($thiss.data('elchange')).addClass($thisA)
                                        else
                                            $($thiss.data('elchange')).removeClass($thisDH)
                                    })
                                }
                            }
                            return false;
                        }
                    })
                    if (thisL - 1 == index)
                        methods.location(regRefs, refs);
                });
                wnd.on('hashchange', function(e) {
                    function scrollTop(wST) {
                        if (e.scroll || e.scroll == undefined)
                            wnd.scrollTop(wST);
                        wST = wnd.scrollTop();
                    }
                    
                    //chrome bug
                    if ($.browser.webkit)
                        scrollTop(wST - 100);
                    scrollTop(wST);
                    return false;
                })
            }
            return $this;
        },
        location: function(regrefs, refs) {
            var hashs1 = [],
            hashs2 = [];
            if (location.hash == '')
            {
                var i = 0,
                j = 0;
                _.map(refs, function(n, i) {
                    var $this = n.first(),
                    attrOrdataL = $this.attr('href') != undefined ? 'attr' : 'data';
                    if ($this.data('drop') == undefined && attrOrdataL != 'data') {
                        hashs1[i] = $this[attrOrdataL]('href');
                        i++;
                    }
                    else if (attrOrdataL == 'data') {
                        hashs2[j] = $this[attrOrdataL]('href');
                        j++;
                    }
                })
                var hashs = [hashs1, hashs2];
            }
            else {
                _.map(refs, function(n, i) {
                    var j = 0,
                    $this = n.first(),
                    attrOrdataL = $this.attr('href') != undefined ? 'attr' : 'data';
                    if (attrOrdataL == 'data') {
                        hashs2[j] = $this[attrOrdataL]('href');
                        j++;
                    }
                });
                var t = location.hash,
                s = '#',
                m = s.length, res = 0,
                i = 0, pos = [];
                while (i < t.length - 1)
                {
                    var ch = t.substr(i, m)
                    if (ch == s) {
                        res += 1;
                        i = i + m
                        pos[res - 1] = t.indexOf(s, i - m)
                    } else
                        i++
                }
                var i = 0;
                while (i < pos.length) {
                    hashs1[i] = t.substring(pos[i], pos[i + 1]);
                    i++;
                }
                var hashs = [hashs1, hashs2];
            }
            tabs = new Object();
            tabs.hashs = hashs;
            methods.startCheck(regrefs, tabs.hashs);
        },
        startCheck: function(regrefs, hashs) {
            var hashs = hashs[0].concat(hashs[1]),
            regrefsL = regrefs.length,
            sim = 0;
            $.map(regrefs, function(n, k) {
                var i = 0,
                hashs2 = [].concat(hashs);
                $.map(hashs, function(n, j) {
                    if ($.inArray(n, regrefs[k]) >= 0)
                        i++;
                    if ($.inArray(n, regrefs[k]) >= 0 && i > 1) {
                        hashs2.splice(hashs2.indexOf(n), 1)
                    }
                })
                if (hashs2.join() == hashs.join())
                    sim++;
                if (hashs2.join() != hashs.join() || sim == regrefsL)
                    $.map(hashs2, function(n, i) {
                        var attrOrdataNew = "";
                        $('[href=' + n + ']').length == 0 ? attrOrdataNew = 'data-href' : attrOrdataNew = 'href';
                        $('[' + attrOrdataNew + '=' + n + ']').trigger({
                            'type': 'click.tabs', 
                            'start': true
                        });
                    });
            });
        }
    }
    $.fn.tabs = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.tabs');
        }
    }
    $.tabs = function(m) {
        return methods[m];
    };
})(jQuery);
/*/plugin tabs end*/
(function($) {
    $.fn.actual = function() {
        if (arguments.length && typeof arguments[0] == 'string') {
            var dim = arguments[0];
            clone = $(this).clone().addClass(clonedC);
            if (arguments[1] == undefined)
                clone.css({
                    position: 'absolute',
                    top: '-9999px'
                }).show().appendTo(body).find('*:not([style*="display:none"])').show();
            var dimS = clone[dim]();
            clone.remove();
            return dimS;
        }
        return undefined;
    };
})(jQuery);
(function($) {
    var methods = {
        init: function(options) {
            var optionsDrop = $.extend({
                exit: '[data-closed = "closed-js"]',
                effon: 'show',
                effoff: 'hide',
                durationOn: 200,
                durationOff: 100,
                place: 'center',
                dropContent: null,
                placement: 'noinherit',
                modal: false,
                confirm: false,
                confirmSel: '#confirm',
                overlayOpacity: '0',
                overlayColor: '#fff',
                always: false,
                animate: false,
                timeclosemodal: 2000,
                size: true,
                placeBeforeShow: 'center center',
                placeAfterClose: 'center center',
                moreOne: false,
                before: function() {
                },
                after: function() {
                },
                close: function() {
                },
                closed: function() {
                }
            }, options);
            var settings = optionsDrop,
            modal = settings.modal,
            moreOne = settings.moreOne,
            confirm = settings.confirm,
            confirmSel = settings.confirmSel,
            always = settings.always,
            arrDrop = [];
            $(this).add($('[data-drop]')).off('click.drop').on('click.drop', function(e) {
                $(document).trigger({
                    'type': 'drop.click', 
                    'el': $this
                })
                methods.closeModal();
                function confirmF() {
                    if ($.inArray(elSet.source, arrDrop) != 0 || newModal || newAlways) {
                        arrDrop.push(elSet.source);
                        if (!newModal)
                            drop.remove();
                        $.ajax({
                            type: "post",
                            data: elSet.data,
                            url: elSet.source,
                            beforeSend: function(){
                                $(document).trigger({
                                    'type': 'showActivity'
                                })  
                            },
                            dataType: elSet.type ? elSet.type : 'html',
                            success: function(data) {
                                var drop = $(elSet.drop);
                                if (elSet.type != 'html' && elSet.type != undefined && newModal) {
                                    $(document).trigger({
                                        type: 'drop.successJson', 
                                        el: drop, 
                                        datas: data
                                    })
                                    methods._pasteDrop($.extend({}, settings, elSet), drop);
                                }
                                else {
                                    $(document).trigger({
                                        type: 'drop.successHtml', 
                                        el: drop, 
                                        datas: data
                                    })
                                    methods._pasteDrop($.extend({}, settings, elSet), data);
                                }
                                methods.init.call(drop.find('[data-drop]'), $.extend({}, optionsDrop));
                                methods.showDrop($this, e, optionsDrop, true, data);
                            }
                        })
                    }
                }
                var $this = $(this),
                elSet = $this.data(),
                drop = $(elSet.drop);
                
                if (!(elSet.moreOne || moreOne)){
                    if ($.existsN($this.closest('[data-elrun]')) && elSet.start == undefined && !elSet.modal && !($.existsN($('[data-elrun].center:visible')) && elSet.start == undefined))
                        methods.closeDrop($this.closest('[data-elrun]'));
                    if ($.existsN($('[data-elrun].center:visible, [data-elrun].noinherit:visible')) && elSet.start == undefined)
                        methods.closeDrop($('[data-elrun].center:visible, [data-elrun].noinherit:visible'));
                }

                if (!$this.is('[disabled]')) {
                    e.stopPropagation();
                    e.preventDefault();
                    newModal = elSet.modal || modal,
                    newConfirm = elSet.confirm || confirm,
                    newAlways = elSet.always || always;

                    if (elSet.start != undefined)
                        var res = eval(elSet.start)($this, drop);
                    if (elSet.start != undefined && !res)
                        return false;
                    if (elSet.start == undefined || (elSet.start != undefined && res)) {
                        if ($.existsN(drop) && !newModal && !newAlways) {
                            methods._pasteDrop($.extend({}, settings, elSet), drop);
                            methods.showDrop($this, e, optionsDrop, false);
                        }
                        else if ((elSet.source || newAlways)) {
                            if (!newConfirm)
                                confirmF();
                            else {
                                methods._pasteDrop($.extend({}, settings, $('[data-drop="' + confirmSel + '"]').data()), $(confirmSel));
                                methods.showDrop($('[data-drop="' + confirmSel + '"]').data({
                                    'callback': elSet.after
                                }), e, optionsDrop, false);
                                $('[data-button-confirm]').focus().on('click.drop', function() {
                                    methods.closeDrop($(confirmSel));
                                    $this.data('confirm', false);
                                    confirmF();
                                })
                            }

                        }
                        else {
                            methods._pasteDrop($.extend({}, settings, elSet), drop);
                            methods.showDrop($this, e, optionsDrop, false);
                        }
                    }
                    return false;
                }
            })
            return $(this);
        },
        _pasteDrop: function(elSet, drop){
            if (elSet.place != 'inherit') {
                if (typeof drop != 'string'){
                    if (!$.existsN(drop.parent('.for-center')) && elSet.place != 'noinherit'){
                        if (drop.data('forCenter') == undefined) {
                            body.append('<div class="for-center" rel="'+elSet.drop+'" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;dispaly:none;overflow: hidden;"></div>');
                            drop.data().forCenter = $('[rel="'+elSet.drop+'"].for-center');
                        }
                        drop.data().forCenter.append(drop)
                    }
                    else if (elSet.place == 'noinherit')
                        body.append(drop);
                }
                else{
                    if (elSet.place == 'center'){
                        body.append('<div class="for-center" rel="'+elSet.drop+'" style="position: absolute;left: 0;top: 0;width: 100%;height: 100%;dispaly:none;overflow: hidden;"></div>');
                        var forCenter = $('[rel="'+elSet.drop+'"].for-center');
                        forCenter.append(drop);
                        $(elSet.drop).data().forCenter = forCenter;
                    }
                    else
                        body.append(drop);
                }
            }
        },
        closeModal: function() {
            $('[data-elrun]:visible').each(function() {
                if ($(this).data('modal'))
                    methods.closeDrop($(this))
            })
        },
        showDrop: function($this, e, set, isajax, data) {
            if ($this == undefined)
                $this = $(this);
            if (!e)
                var e = window.event;
            var set = !set ? optionsDrop : set,
            isajax = !isajax ? false : true,
            elSet = $this.data(),
            place = elSet.place || set.place,
            start = elSet.start,
            callback = elSet.after,
            placement = elSet.placement || set.placement,
            $thisEOff = elSet.effectOff || set.effoff,
            $thisD = elSet.durationOn != undefined ? elSet.durationOn.toString() : elSet.durationOn || set.durationOn,
            $thisDOff = elSet.durationOff != undefined ? elSet.durationOff.toString() : elSet.durationOff || set.durationOff,
            $thisA = elSet.animate != undefined ? elSet.animate : set.animate,
            $thisEOn = elSet.effectOn || set.effon,
            overlayColor = elSet.overlaycolor || set.overlayColor,
            overlayOpacity = elSet.overlayopacity != undefined ? elSet.overlayopacity.toString() : elSet.overlayopacity || set.overlayOpacity,
            modal = elSet.modal || set.modal,
            timeclosemodal = elSet.timeclosemodal || set.timeclosemodal,
            confirm = elSet.confirm || set.confirm,
            dropContent = elSet.dropContent || set.dropContent,
            size = elSet.size != undefined ? elSet.size : set.size,
            placeBeforeShow =  elSet.placeBeforeShow || set.placeBeforeShow,
            placeAfterClose =  elSet.placeAfterClose || set.placeAfterClose,
            moreOne = elSet.moreOne || set.moreOne,
            before = set.before,
            after = set.after,
            close = set.close,
            closed = set.closed,
            elClose = elSet.close,
            elClosed = elSet.closed,
            $thisSource = elSet.drop,
            drop = $($thisSource);

            $this.attr('data-drop', $this.data('drop')).parent().addClass(activeClass);
            optionsDrop.durationOff = $thisDOff;
            drop.data({
                'effectOn': $thisEOn,
                'size': size,
                'placeBeforeShow': placeBeforeShow,
                'placeAfterClose': placeAfterClose,
                'effectOff': $thisEOff,
                'elrun': $this,
                'place': place,
                'before': before,
                'after': after,
                'placement': placement,
                'durationOn': $thisD,
                'durationOff': $thisDOff,
                'dropContent': dropContent,
                'animate': $thisA,
                'close': close,
                'closed': closed,
                'elclose': elClose,
                'elClosed': elClosed,
                'overlayOpacity': overlayOpacity,
                'overlayColor': overlayColor,
                'modal': modal,
                'confirm': confirm,
                'timeclosemodal': timeclosemodal,
                'moreOne': moreOne,
                'callback': callback
            }).attr('data-elrun', $thisSource);
            drop.off('click.drop', set.exit).on('click.drop', set.exit, function() {
                methods.closeDrop($(this).closest('[data-elrun]'));
            })
            
            var condOverlay = (overlayOpacity != undefined ? overlayOpacity.toString() : overlayOpacity) != '0';
            if (condOverlay){
                if (!$.exists('[rel="'+$thisSource+'"].overlayDrop')) {
                    body.append('<div class="overlayDrop" rel="'+$thisSource+'" style="display:none;position:fixed;width:100%;height:100%;left:0;top:0;"></div>')
                }
                var overlays = $('.overlayDrop');
                overlays.css('z-index', 1103);
                drop.data().dropOver = $('[rel="'+$thisSource+'"].overlayDrop').css({
                    'background-color': overlayColor,
                    'opacity': overlayOpacity,
                    'z-index': overlays.length + 1103
                });
                if (drop.data('forCenter')){
                    $('.for-center').css('z-index', 1104);
                    drop.data('forCenter').css('z-index', overlays.length + 1104);
                }
            }
            if (drop.hasClass(activeClass) && e.button != undefined) {
                methods.closeDrop(drop);
            }
            else {
                before($this, drop, isajax, data, elSet);
                var bS = elSet.before;
                if (bS != undefined)
                    eval(bS)($this, drop, isajax, data, elSet);
                
                if (drop.data('modal')) {
                    var objJ = $([]);
                    $('[data-elrun]:visible').each(function() {
                        if (($(this).data('overlayOpacity') != '0'))
                            objJ = objJ.add($(this));
                    })
                    if ($.existsN(objJ))
                        methods.closeDrop(objJ);
                }

                if (e.button == undefined && place != "center")
                    wnd.scrollTop($this.offset().top);
        
                var dropTimeout = '';
                wnd.off('resize.drop').on('resize.drop', function() {
                    clearTimeout(dropTimeout);
                    dropTimeout = setTimeout(function() {
                        methods.positionDrop(drop);
                        methods.dropCenter(drop);
                    }, 300)
                });
                if (condOverlay){
                    drop.data('dropOver').fadeIn($thisEOn/2).add(drop.data('forCenter')).off('click.drop').on('click.drop', function(e) {
                        if ($(e.target).is(drop.data('dropOver')) || $(e.target).is('.for-center')) {
                            methods.closeDrop($($(e.target).attr('rel')));
                        }
                    })
                    if (isTouch)
                        drop.data('dropOver').on('touchmove.drop', function(e) {
                            return false;
                        });
                }
                
                drop.addClass(place);
                
                function _forCenterTop(){
                    if (drop.data('forCenter')){
                        drop.data('forCenter').css('top', optionsDrop.wST);
                    }
                }
                function _show() {
                    if (place != 'inherit'){
                        var $thisPMT = placeBeforeShow.toLowerCase().split(' ');
                        drop.css({
                            'top': -drop.actual('outerHeight'), 
                            'left':  -drop.actual('outerWidth')
                        });
                        if ($thisPMT[0] == 'bottom' || $thisPMT[1] == 'bottom')
                            drop.css('top', wnd.height());
                        if ($thisPMT[0] == 'right' || $thisPMT[1] == 'right')
                            drop.css('left', wnd.width());
                        if ($thisPMT[0] == 'center' && $thisPMT[1] == 'center')
                            methods.dropCenter(drop);
                        if ($thisPMT[0] == 'inherit')
                            drop.css({
                                'left': $this.offset().left + wnd.scrollLeft(), 
                                'top': $this.offset().top + wnd.scrollTop()
                            });
                    }
                    drop.delay(1)[$thisEOn]($thisD, function(e) {
                        var drop = $(this);
                        drop.addClass(activeClass);
                        if (!confirm && modal)
                            optionsDrop.closeDropTime= setTimeout(function() {
                                methods.closeDrop(drop)
                            }, timeclosemodal)
                        methods.positionDrop(drop);
                        methods.limitSize(drop);
                        after($this, drop, isajax, data, elSet);
                        $(document).trigger({
                            type: 'drop.after', 
                            el: $this, 
                            drop: drop,
                            isajax: isajax,
                            data: data,
                            elSet: elSet
                        });
                        var cB = callback;
                        if (cB != undefined){
                            eval(cB)($this, drop, isajax, data, elSet);
                            _forCenterTop();
                        }
                    });
                }
                optionsDrop.wST = wnd.scrollTop();
                if (drop.data('forCenter')){
                    drop.data('forCenter').fadeIn();
                }
                _forCenterTop();
                
                if (condOverlay) {
                    if ($(document).height() - wnd.height() > 0) {
                        methods.scrollEmulate();
                    }
                }
                methods.positionType(size, drop);
                _show();
            }
            body.off('click.drop').off('keydown.drop').on('click.drop', function(e) {
                if (((e.which || e.button == 0) && e.relatedTarget == null) && !$.existsN($(e.target).closest('[data-elrun]')) && $(e.target).data('drop') == undefined) {
                    methods.closeDrop(false);
                }
                else
                    return true;
            }).on('keydown.drop', function(e) {
                if (!e)
                    var e = window.event;
                key = e.keyCode;
                if (key == 27) {
                    methods.closeDrop(false);
                }
            });
        },
        limitSize: function(drop){
            if (drop == undefined)
                drop = $(this);
            drop.css({
                'width': '', 
                'height': ''
            });
            if (drop.data('place') == 'center'){
                var wndW = wnd.width(),
                wndH = wnd.height();
                
                var dropV = drop.is(':visible'),
                w = dropV ? drop.width() : drop.actual('width'),
                h = dropV ? drop.height() : drop.actual('height');
                
                if (w > wndW)
                    drop.css('width', wndW - 40);
                if (h > wndH)
                    drop.css('height', wndH - 40);
                methods.dropCenter(drop);
            }
        },
        positionType: function(size, drop){
            var data = drop.data();
            if (data.place != 'inherit'){
                if (!size || data.modal || data.place == 'noinherit') 
                    drop.css({
                        'position': 'absolute'
                    });
                else
                    drop.css({
                        'position': 'relative'
                    });
            }
        },
        closeDrop: function(sel) {
            if (sel == undefined)
                sel = $(this);
            clearTimeout(optionsDrop.closeDropTime);
            $('[data-button-confirm]').off('click.drop');
            var drop = sel == undefined || !sel ? $('[data-elrun].' + activeClass) : sel;
            if ($.existsN(drop)) {
                drop.each(function() {
                    var drop = $(this),
                    data = drop.data(),
                    condOverlay = (data.overlayOpacity != undefined ? data.overlayOpacity.toString() : data.overlayOpacity) != '0';
                    if (data.modal || sel || condOverlay || data.place == 'noinherit') {
                        $thisB = drop.data('elrun');
                        if ($thisB != undefined){
                            var $thisEOff = data.effectOff,
                            durOff = data.durationOff;                            
                            methods.scrollEmulateRemove();
                            
                            function _hide(){
                                $thisB.parent().removeClass(activeClass);
                                var $thisHref = $thisB.attr('href');
                                if ($thisHref != undefined) {
                                    var $thisHrefL = $thisHref.length,
                                    wLH = location.hash,
                                    wLHL = wLH.length;
                                    try {
                                        var indH = wLH.match($thisHref + '(?![a-z])').index;
                                        location.hash = wLH.substring(0, indH) + wLH.substring(indH + $thisHrefL, wLHL)
                                    } catch (err) {
                                    }
                                }
                            
                                drop.removeClass(activeClass);
                                var method = data.animate ? 'animate' : 'css';
                                var $thisPMT = data.placeAfterClose.toLowerCase().split(' ');
                
                                var l = 0, t = 0;
                                if ($thisPMT[0] == 'bottom' || $thisPMT[1] == 'bottom')
                                    t = wnd.height();
                                if ($thisPMT[0] == 'right' || $thisPMT[1] == 'right')
                                    l = wnd.width();
                                if ($thisPMT[0] != 'center' && $thisPMT[1] != 'center')
                                    drop.stop()[method]({
                                        'top': t,
                                        'left': l
                                    }, {
                                        queue: false
                                    })
                                if ($thisPMT[0] == 'inherit')
                                    drop.stop()[method]({
                                        'left': $thisB.offset().left + wnd.scrollLeft(), 
                                        'top': $thisB.offset().top + wnd.scrollTop()
                                    }, {
                                        queue: false
                                    });
                                    
                                if (drop.data('forCenter'))
                                    drop.data('forCenter').stop(true, false).fadeOut(durOff).css('text-align', '');
                                if (drop.data('dropOver'))
                                    drop.data('dropOver').fadeOut(durOff/2);
                                drop[$thisEOff](durOff, function() {
                                    var $this = $(this).css({
                                        'width': '', 
                                        'height': '', 
                                        'top': '', 
                                        'left': '', 
                                        'bottom': '', 
                                        'right': '', 
                                        'position': ''
                                    });
                                    $this.removeClass(data.place);
                                    if (data.closed != undefined)
                                        data.closed($thisB, $this);
                                    if (data.elClosed != undefined)
                                        eval(data.elClosed)($thisB, $this);
                                    
                                    if (isTouch)
                                        drop.data('dropOver').off('touchmove.drop');
                        
                                    $(document).trigger({
                                        'type': 'drop.closed', 
                                        el: $thisB,
                                        drop: $this
                                    })
                                });
                            }
                            $(document).trigger({
                                'type': 'drop.close', 
                                el: $thisB,
                                drop: drop
                            });
                            var close = data.elClose != undefined ? data.elClose : data.close;
                            if (close != undefined){
                                var res = close($thisB, $(this));
                                if (res == false){
                                    if (window.console)
                                        console.log(res);
                                }
                                else
                                    _hide()
                            }
                            else
                                _hide()
                            
                            wnd.off('resize.drop');
                        }
                    }
                })
            }
        },
        dropCenter: function(drop) {
            if (drop == undefined)
                drop = $(this);
            if (drop.data('place') == 'center') {
                var method = drop.data('animate') ? 'animate' : 'css',
                dropV = drop.is(':visible'),
                w = dropV ? drop.outerWidth() : drop.actual('outerWidth'),
                h = dropV ? drop.outerHeight() : drop.actual('outerHeight');

                drop.stop()[method]({
                    'top': (body.height() - h) / 2,
                    'left': (body.width() - w) / 2
                }, {
                    queue: false
                });
            }
            return drop;
        },
        positionDrop: function(drop) {
            if (drop == undefined)
                drop = $(this);
            
            var place = drop.data('place'),
            method = drop.data('animate') ? 'animate' : 'css';
            if (place == 'noinherit') {
                var placement = drop.data('placement');
                $this = drop.data().elrun,
                dataSourceH = 0,
                dataSourceW = 0,
                $thisW = $this.width(),
                $thisH = $this.height();
                var $thisPMT = placement.toLowerCase().split(' ');
                if ($thisPMT[0] == 'bottom' || $thisPMT[1] == 'bottom')
                    dataSourceH = drop.actual('height');
                if ($thisPMT[0] == 'top' || $thisPMT[1] == 'top')
                    dataSourceH = $thisH;
                if ($thisPMT[0] == 'left' || $thisPMT[1] == 'left')
                    dataSourceW = 0;
                if ($thisPMT[0] == 'right' || $thisPMT[1] == 'right')
                    dataSourceW = -drop.actual('width') + $thisW;
                $thisT = $this.offset().top + dataSourceH;
                $thisL = $this.offset().left + dataSourceW;
                if ($thisL < 0)
                    $thisL = 0;
                drop[method]({
                    'bottom': 'auto',
                    'top': $thisT,
                    'left': $thisL
                }, {
                    queue: false
                });
                if ($thisPMT[0] == 'bottom' || $thisPMT[1] == 'bottom')
                    drop[method]({
                        'top': 'auto',
                        'bottom': body.height() - $thisT + dataSourceH + $thisH
                    }, {
                        queue: false
                    });
            }
        },
        scrollEmulate: function() {
            var dur = optionsDrop.durationOn;
            try {
                clearInterval(optionsDrop.scrollemulatetimeout);
            } catch (err) {
            }
            setTimeout(function(){
                if (!isTouch){
                    body.addClass('isScroll');
                    body.prepend('<div class="scrollEmulation" style="position: absolute;right: 0;top: ' + wnd.scrollTop() + 'px;height: 100%;width: 17px;overflow-y: scroll;z-index:10000;"></div>');
                }                    
                if (isTouch)
                    $('.for-center').on('touchmove.drop', function(e) {
                        return false;
                    });
            }, dur)
        },
        scrollEmulateRemove: function() {
            var dur = optionsDrop.durationOff;
            
            optionsDrop.scrollemulatetimeout = setTimeout(function() {
                body.removeClass('isScroll');
                wnd.scrollTop(optionsDrop.wST);
                $('.scrollEmulation').remove();
                if (isTouch)
                    $('.for-center').off('touchmove.drop');
            }, dur)
        }
    };
    $.fn.drop = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.drop');
        }
    };
    $.drop = function(m) {
        return methods[m];
    };
})(jQuery);
(function($) {
    var methods = {
        init: function(options) {
            var settings = $.extend({
                prev: 'prev',
                next: 'next',
                ajax: false,
                checkProdStock: false,
                after: function() {
                },
                before: function() {
                }
            }, options);
            if (this.length > 0) {
                return this.each(function() {
                    var $this = $(this),
                    prev = settings.prev.split('.'),
                    next = settings.next.split('.'),
                    ajax = settings.ajax,
                    checkProdStock = settings.checkProdStock,
                    $thisPrev = $this,
                    $thisNext = $this,
                    regS = '', regM = '';
                    $.each(prev, function(i, v) {
                        regS = v.match(/\(.*\)/);
                        if (regS != null) {
                            regM = regS['input'].replace(regS[0], '');
                            regS = regS[0].substring(1, regS[0].length - 1)
                        }
                        if (regS == null)
                            regM = v;
                        $thisPrev = $thisPrev[regM](regS);
                    })
                    $.each(next, function(i, v) {
                        regS = v.match(/\(.*\)/);
                        if (regS != null) {
                            regM = regS['input'].replace(regS[0], '');
                            regS = regS[0].substring(1, regS[0].length - 1)
                        }
                        if (regS == null)
                            regM = v;
                        $thisNext = $thisNext[regM](regS);
                    })
                    $thisNext.unbind('click.pM').on('click.pM', function(e) {
                        var el = $(this);
                        $thisPrev.removeAttr('disabled', 'disabled')
                        if (!el.is(':disabled')) {
                            var input = $this,
                            inputVal = parseInt(input.val());
                            if (!isTouch)
                                input.focus();
                            if (!input.is(':disabled')) {
                                settings.before(e, el, input);
                                if (isNaN(inputVal))
                                    input.val(1);
                                else
                                    input.val(inputVal + 1);
                                if (ajax && !checkProdStock)
                                    $(document).trigger({
                                        'type': 'showActivity'
                                    })

                                if (ajax && inputVal + 1 <= input.data('max') && checkProdStock)
                                    $(document).trigger({
                                        'type': 'showActivity'
                                    })
                                if (ajax && inputVal + 1 == input.data('max'))
                                    $thisNext.attr('disabled', 'disabled')

                                if (checkProdStock)
                                    input.maxminValue(e);
                                settings.after(e, el, input);
                            }
                        }
                    })
                    $thisPrev.unbind('click.pM').on('click.pM', function(e) {
                        var el = $(this);
                        $thisNext.removeAttr('disabled', 'disabled')
                        if (!el.is(':disabled')) {
                            var input = $this,
                            inputVal = parseInt(input.val());
                            if (!isTouch)
                                input.focus();
                            if (!input.is(':disabled')) {
                                settings.before(e, el, input);
                                if (isNaN(inputVal))
                                    input.val(1)
                                else if (inputVal > 1) {
                                    if (ajax) {
                                        $(document).trigger({
                                            'type': 'showActivity'
                                        })
                                    }
                                    input.val(inputVal - 1)
                                    if (ajax && inputVal - 1 == input.data('min'))
                                        $thisPrev.attr('disabled', 'disabled')
                                }

                                settings.after(e, el, input);
                            }
                        }
                    })
                })
            }
        }
    };
    $.fn.plusminus = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.plusminus');
        }
    };
    $.plusminus = function(m) {
        return methods[m];
    };
})($);
(function($) {
    var methods = {
        init: function(e, f) {
            var $this = $(this), $thisVal = $this.val(),
            set = $.maxminValue.settings;
            $max = parseInt($this.attr('data-max'));
            if ($thisVal > $max && set.addCond) {
                $this.val($max);
                if (typeof f == 'function')
                    f();
                return $max;
            }
            else
                return false;
        }
    };
    $.fn.maxminValue = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.maxminValue');
        }
    };
    $.maxminValue = {
        settings: {
            addCond: false
        }
    };
    $.maxminValue = function(m) {
        return methods[m];
    };
    body.off('keyup.max', '[data-max]').on('keyup.max', '[data-max]', function(e) {
        $(this).trigger({
            'type': 'maxminValue', 
            'event': e
        });
        $(this).maxminValue(e);
    })
    body.off('blur.max', '[data-max]').on('blur.max', '[data-max]', function(e) {
        var $this = $(this);
        if ($this.val() == '')
            $this.val($this.data('min'));
        $this.trigger({
            'type': 'maxminValue', 
            'event': e
        });
        $(this).maxminValue(e);
    });
})(jQuery);
body.off('keypress', '[data-min]').on('keypress', '[data-min]', function(e) {
    var key = e.keyCode,
    keyChar = parseInt(String.fromCharCode(key));
    var $this = $(this),
    $min = $this.attr('data-min');
    if ($this.val() == "" && keyChar == 0) {
        $this.val($min);
        return false;
    }
});

/*plugin myCarousel use jQarousel with correction behavior prev and next buttons*/
(function($) {
    var methods = {
        init: function(options) {
            if ($.existsN($(this))) {
                var $jsCarousel = $(this);
                var settings = $.extend({
                    prev: '.prev',
                    next: '.next',
                    content: '.c-carousel',
                    groupButtons: '.b-carousel',
                    vCarousel: '.v-carousel',
                    hCarousel: '.h-carousel',
                    adding: {},
                    before: function() {
                    },
                    after: function() {
                    }
                }, options);
                var prev = settings.prev,
                next = settings.next,
                content = settings.content,
                groupButtons = settings.groupButtons,
                hCarousel = settings.hCarousel,
                vCarousel = settings.vCarousel,
                addO = settings.adding,
                nS = '.mycarousel';
                $jsCarousel.each(function() {
                    var $this = $(this);
                    settings.before($this);
                    m = 'show';
                    if (addO.refresh && $this.hasClass('iscarousel'))
                        m = 'children';
                    var $content = $this.find(content),
                    $item = $content.children()[m]().children(),
                    $itemL = $item.filter('li:visible').length,
                    $itemW = $item.last().outerWidth(true),
                    $itemH = $item.last().outerHeight(true),
                    $thisPrev = $this.find(prev),
                    $thisNext = $this.find(next),
                    $marginR = $itemW - $item.last().outerWidth(),
                    $marginB = $itemH - $item.last().outerHeight(),
                    contW = $content.width(),
                    contH = $content.height(),
                    groupButton = $this.find(groupButtons);
                    var $countV = (contW / $itemW).toFixed(1);
                    var k = false, isVert = $.existsN($this.closest(vCarousel)),
                    isHorz = $.existsN($this.closest(hCarousel)),
                    condH = $itemW * $itemL - $marginR > contW && isHorz,
                    condV = ($itemH * $itemL - $marginB > contH) && isVert;
                    var vertical = condV ? true : false;
                    if (condH || condV)
                        k = true;
                    if (k) {
                        var mainO = {
                            buttonNextHTML: $thisNext,
                            buttonPrevHTML: $thisPrev,
                            visible: $countV,
                            scroll: 1,
                            vertical: vertical,
                            itemVisibleInCallback: function(){
                                wnd.scroll();
                            }
                        }
                        $this.jcarousel($.extend(
                            mainO
                            , addO)).addClass('iscarousel');
                        $thisNext.add($thisPrev).css('display', 'inline-block');
                        groupButton.append($thisNext.add($thisPrev));
                        groupButton.append($thisNext.add($thisPrev));
                        if (isTouch && isHorz) {
                            $this.off('touchstart' + nS).on('touchstart' + nS, function(e) {
                                sP = e.originalEvent.touches[0];
                                sP = sP.pageX;
                            });
                            $this.off('touchmove' + nS).on('touchmove' + nS, function(e) {
                                e.stopPropagation();
                                e.preventDefault();
                                eP = e.originalEvent.touches[0];
                                eP = eP.pageX;
                            });
                            $this.off('touchend' + nS).on('touchend' + nS, function(e) {
                                e.stopPropagation();
                                if (Math.abs(eP - sP) > 200) {
                                    if (eP - sP > 0)
                                        $thisPrev.click();
                                    else
                                        $thisNext.click();
                                }
                            });
                        }
                        if (isTouch && isVert) {
                            $this.off('touchstart' + nS).on('touchstart' + nS, function(e) {
                                sP = e.originalEvent.touches[0];
                                sP = sP.pageY;
                            });
                            $this.off('touchmove' + nS).on('touchmove' + nS, function(e) {
                                e.stopPropagation();
                                e.preventDefault();
                                eP = e.originalEvent.touches[0];
                                eP = eP.pageY;
                            });
                            $this.off('touchend' + nS).on('touchend' + nS, function(e) {
                                e.stopPropagation();
                                if (Math.abs(eP - sP) > 200) {
                                    if (eP - sP > 0)
                                        $thisPrev.click();
                                    else
                                        $thisNext.click();
                                }
                            });
                        }
                    }
                    else {
                        if (isHorz){
                            $item.parent().css('width', $itemW * $itemL);
                        }
                        if (isVert) {
                            $item.parent().css('height', $itemH * $itemL);
                            $content.css('height', 'auto');
                        }
                        $thisNext.add($thisPrev).hide();
                    }
                    settings.after($this);
                });
            }
            return $jsCarousel;
        }
    };
    $.fn.myCarousel = function(method) {
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on $.myCarousel');
        }
    }
    $.myCarousel = function(m) {
        return methods[m];
    };
})(jQuery);