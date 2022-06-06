/* $('.js-appealBtnOpen').on('click', function (e) {
    e.preventDefault();

    $(".substrate-appeal").removeClass("substrate_disabled");
    $('.jsBody').addClass("noscroll");
    $(".substrate-appeal").find("#formCalc").removeClass("substrate__box_disabled");
})

$(document).ready(function() {
    const LIMIT_IMPRESSION = 1;
    const POPUP_COUNTER_KEY = 'popupCounter';

    function checkDiscountPopupCounter() {
        let currentCounter = +sessionStorage.getItem(POPUP_COUNTER_KEY);
        if (!currentCounter) {
            setTimeout(function () {
                if (!$(".substrate-appeal").is(".substrate_disabled")) {return false;}
                if (!$(".substrate-write").is(".substrate_disabled")) {
                    let intervalID = setInterval(function () {
                        if ($(".substrate-write").is(".substrate_disabled")) {
                            $('.js-appealBtnOpen').click();
                            clearInterval(intervalID);
                        }
                    }, 10000)
                    return false;
                }
                $('.js-appealBtnOpen').click();
            }, 20000);
            sessionStorage.setItem(POPUP_COUNTER_KEY, 1);
            return;
        }

        if (currentCounter < LIMIT_IMPRESSION) {
            sessionStorage.setItem(POPUP_COUNTER_KEY, currentCounter++);
        }

        return;
    }

    window.onload = function () {
        checkDiscountPopupCounter();
    };

    $('.js-appealBtnOpen').on('click', function (e) {
        e.preventDefault();

        $(".substrate-appeal").removeClass("substrate_disabled");
        $('.jsBody').addClass("noscroll");
        $(".substrate-appeal").find("#formCalc").removeClass("substrate__box_disabled");
    })
})

function sendMsgAppeal( obj ) {
    if ($("#formCalc .appeal__textarea").val().length > 0) {
        sendMail_2( obj );
    };
    return false;
}

$("#formCalc").submit(function (e) {
    if (!$("#formCalc .appeal__textarea").val().length > 0) {
        return false;
    }
    $("#formCalc").addClass("substrate__box_disabled");
    $("#formSuccess_appeal").removeClass("substrate__box_disabled");
    e.preventDefault();
});

// FORM-HANDLER
function sendMail_2( el ) {
    var el = $(el),
        data = el.serialize(),
        url = '/mail_send.php';

    window.wstd_ga.setData( data, handlerSendForm_2, url);
    window.wstd_ga.send();

    return false;
}

function handlerSendForm_2( d ) {
    var obj = JSON.parse(d);

    console.log(obj);

    if( obj.status === 'success' ) {
        $("#formCalc").addClass("substrate__box_disabled");
        $("#formSuccess_appeal").removeClass("substrate__box_disabled");
        $('#formCalc form').trigger('reset');
        $('.form-box form').trigger('reset');
        
    }else {
        //error
    }

}
*/



// jQuery Mask Plugin v1.14.16
// github.com/igorescobar/jQuery-Mask-Plugin
var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.findInternal=function(a,n,f){a instanceof String&&(a=String(a));for(var p=a.length,k=0;k<p;k++){var b=a[k];if(n.call(f,b,k,a))return{i:k,v:b}}return{i:-1,v:void 0}};$jscomp.ASSUME_ES5=!1;$jscomp.ASSUME_NO_NATIVE_MAP=!1;$jscomp.ASSUME_NO_NATIVE_SET=!1;$jscomp.SIMPLE_FROUND_POLYFILL=!1;
$jscomp.defineProperty=$jscomp.ASSUME_ES5||"function"==typeof Object.defineProperties?Object.defineProperty:function(a,n,f){a!=Array.prototype&&a!=Object.prototype&&(a[n]=f.value)};$jscomp.getGlobal=function(a){return"undefined"!=typeof window&&window===a?a:"undefined"!=typeof global&&null!=global?global:a};$jscomp.global=$jscomp.getGlobal(this);
$jscomp.polyfill=function(a,n,f,p){if(n){f=$jscomp.global;a=a.split(".");for(p=0;p<a.length-1;p++){var k=a[p];k in f||(f[k]={});f=f[k]}a=a[a.length-1];p=f[a];n=n(p);n!=p&&null!=n&&$jscomp.defineProperty(f,a,{configurable:!0,writable:!0,value:n})}};$jscomp.polyfill("Array.prototype.find",function(a){return a?a:function(a,f){return $jscomp.findInternal(this,a,f).v}},"es6","es3");
(function(a,n,f){"function"===typeof define&&define.amd?define(["jquery"],a):"object"===typeof exports&&"undefined"===typeof Meteor?module.exports=a(require("jquery")):a(n||f)})(function(a){var n=function(b,d,e){var c={invalid:[],getCaret:function(){try{var a=0,r=b.get(0),h=document.selection,d=r.selectionStart;if(h&&-1===navigator.appVersion.indexOf("MSIE 10")){var e=h.createRange();e.moveStart("character",-c.val().length);a=e.text.length}else if(d||"0"===d)a=d;return a}catch(C){}},setCaret:function(a){try{if(b.is(":focus")){var c=
        b.get(0);if(c.setSelectionRange)c.setSelectionRange(a,a);else{var g=c.createTextRange();g.collapse(!0);g.moveEnd("character",a);g.moveStart("character",a);g.select()}}}catch(B){}},events:function(){b.on("keydown.mask",function(a){b.data("mask-keycode",a.keyCode||a.which);b.data("mask-previus-value",b.val());b.data("mask-previus-caret-pos",c.getCaret());c.maskDigitPosMapOld=c.maskDigitPosMap}).on(a.jMaskGlobals.useInput?"input.mask":"keyup.mask",c.behaviour).on("paste.mask drop.mask",function(){setTimeout(function(){b.keydown().keyup()},
        100)}).on("change.mask",function(){b.data("changed",!0)}).on("blur.mask",function(){f===c.val()||b.data("changed")||b.trigger("change");b.data("changed",!1)}).on("blur.mask",function(){f=c.val()}).on("focus.mask",function(b){!0===e.selectOnFocus&&a(b.target).select()}).on("focusout.mask",function(){e.clearIfNotMatch&&!k.test(c.val())&&c.val("")})},getRegexMask:function(){for(var a=[],b,c,e,t,f=0;f<d.length;f++)(b=l.translation[d.charAt(f)])?(c=b.pattern.toString().replace(/.{1}$|^.{1}/g,""),e=b.optional,
        (b=b.recursive)?(a.push(d.charAt(f)),t={digit:d.charAt(f),pattern:c}):a.push(e||b?c+"?":c)):a.push(d.charAt(f).replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"));a=a.join("");t&&(a=a.replace(new RegExp("("+t.digit+"(.*"+t.digit+")?)"),"($1)?").replace(new RegExp(t.digit,"g"),t.pattern));return new RegExp(a)},destroyEvents:function(){b.off("input keydown keyup paste drop blur focusout ".split(" ").join(".mask "))},val:function(a){var c=b.is("input")?"val":"text";if(0<arguments.length){if(b[c]()!==a)b[c](a);
        c=b}else c=b[c]();return c},calculateCaretPosition:function(a){var d=c.getMasked(),h=c.getCaret();if(a!==d){var e=b.data("mask-previus-caret-pos")||0;d=d.length;var g=a.length,f=a=0,l=0,k=0,m;for(m=h;m<d&&c.maskDigitPosMap[m];m++)f++;for(m=h-1;0<=m&&c.maskDigitPosMap[m];m--)a++;for(m=h-1;0<=m;m--)c.maskDigitPosMap[m]&&l++;for(m=e-1;0<=m;m--)c.maskDigitPosMapOld[m]&&k++;h>g?h=10*d:e>=h&&e!==g?c.maskDigitPosMapOld[h]||(e=h,h=h-(k-l)-a,c.maskDigitPosMap[h]&&(h=e)):h>e&&(h=h+(l-k)+f)}return h},behaviour:function(d){d=
        d||window.event;c.invalid=[];var e=b.data("mask-keycode");if(-1===a.inArray(e,l.byPassKeys)){e=c.getMasked();var h=c.getCaret(),g=b.data("mask-previus-value")||"";setTimeout(function(){c.setCaret(c.calculateCaretPosition(g))},a.jMaskGlobals.keyStrokeCompensation);c.val(e);c.setCaret(h);return c.callbacks(d)}},getMasked:function(a,b){var h=[],f=void 0===b?c.val():b+"",g=0,k=d.length,n=0,p=f.length,m=1,r="push",u=-1,w=0;b=[];if(e.reverse){r="unshift";m=-1;var x=0;g=k-1;n=p-1;var A=function(){return-1<
        g&&-1<n}}else x=k-1,A=function(){return g<k&&n<p};for(var z;A();){var y=d.charAt(g),v=f.charAt(n),q=l.translation[y];if(q)v.match(q.pattern)?(h[r](v),q.recursive&&(-1===u?u=g:g===x&&g!==u&&(g=u-m),x===u&&(g-=m)),g+=m):v===z?(w--,z=void 0):q.optional?(g+=m,n-=m):q.fallback?(h[r](q.fallback),g+=m,n-=m):c.invalid.push({p:n,v:v,e:q.pattern}),n+=m;else{if(!a)h[r](y);v===y?(b.push(n),n+=m):(z=y,b.push(n+w),w++);g+=m}}a=d.charAt(x);k!==p+1||l.translation[a]||h.push(a);h=h.join("");c.mapMaskdigitPositions(h,
        b,p);return h},mapMaskdigitPositions:function(a,b,d){a=e.reverse?a.length-d:0;c.maskDigitPosMap={};for(d=0;d<b.length;d++)c.maskDigitPosMap[b[d]+a]=1},callbacks:function(a){var g=c.val(),h=g!==f,k=[g,a,b,e],l=function(a,b,c){"function"===typeof e[a]&&b&&e[a].apply(this,c)};l("onChange",!0===h,k);l("onKeyPress",!0===h,k);l("onComplete",g.length===d.length,k);l("onInvalid",0<c.invalid.length,[g,a,b,c.invalid,e])}};b=a(b);var l=this,f=c.val(),k;d="function"===typeof d?d(c.val(),void 0,b,e):d;l.mask=
    d;l.options=e;l.remove=function(){var a=c.getCaret();l.options.placeholder&&b.removeAttr("placeholder");b.data("mask-maxlength")&&b.removeAttr("maxlength");c.destroyEvents();c.val(l.getCleanVal());c.setCaret(a);return b};l.getCleanVal=function(){return c.getMasked(!0)};l.getMaskedVal=function(a){return c.getMasked(!1,a)};l.init=function(g){g=g||!1;e=e||{};l.clearIfNotMatch=a.jMaskGlobals.clearIfNotMatch;l.byPassKeys=a.jMaskGlobals.byPassKeys;l.translation=a.extend({},a.jMaskGlobals.translation,e.translation);
    l=a.extend(!0,{},l,e);k=c.getRegexMask();if(g)c.events(),c.val(c.getMasked());else{e.placeholder&&b.attr("placeholder",e.placeholder);b.data("mask")&&b.attr("autocomplete","off");g=0;for(var f=!0;g<d.length;g++){var h=l.translation[d.charAt(g)];if(h&&h.recursive){f=!1;break}}f&&b.attr("maxlength",d.length).data("mask-maxlength",!0);c.destroyEvents();c.events();g=c.getCaret();c.val(c.getMasked());c.setCaret(g)}};l.init(!b.is("input"))};a.maskWatchers={};var f=function(){var b=a(this),d={},e=b.attr("data-mask");
    b.attr("data-mask-reverse")&&(d.reverse=!0);b.attr("data-mask-clearifnotmatch")&&(d.clearIfNotMatch=!0);"true"===b.attr("data-mask-selectonfocus")&&(d.selectOnFocus=!0);if(p(b,e,d))return b.data("mask",new n(this,e,d))},p=function(b,d,e){e=e||{};var c=a(b).data("mask"),f=JSON.stringify;b=a(b).val()||a(b).text();try{return"function"===typeof d&&(d=d(b)),"object"!==typeof c||f(c.options)!==f(e)||c.mask!==d}catch(w){}},k=function(a){var b=document.createElement("div");a="on"+a;var e=a in b;e||(b.setAttribute(a,
    "return;"),e="function"===typeof b[a]);return e};a.fn.mask=function(b,d){d=d||{};var e=this.selector,c=a.jMaskGlobals,f=c.watchInterval;c=d.watchInputs||c.watchInputs;var k=function(){if(p(this,b,d))return a(this).data("mask",new n(this,b,d))};a(this).each(k);e&&""!==e&&c&&(clearInterval(a.maskWatchers[e]),a.maskWatchers[e]=setInterval(function(){a(document).find(e).each(k)},f));return this};a.fn.masked=function(a){return this.data("mask").getMaskedVal(a)};a.fn.unmask=function(){clearInterval(a.maskWatchers[this.selector]);
    delete a.maskWatchers[this.selector];return this.each(function(){var b=a(this).data("mask");b&&b.remove().removeData("mask")})};a.fn.cleanVal=function(){return this.data("mask").getCleanVal()};a.applyDataMask=function(b){b=b||a.jMaskGlobals.maskElements;(b instanceof a?b:a(b)).filter(a.jMaskGlobals.dataMaskAttr).each(f)};k={maskElements:"input,td,span,div",dataMaskAttr:"*[data-mask]",dataMask:!0,watchInterval:300,watchInputs:!0,keyStrokeCompensation:10,useInput:!/Chrome\/[2-4][0-9]|SamsungBrowser/.test(window.navigator.userAgent)&&
        k("input"),watchDataMask:!1,byPassKeys:[9,16,17,18,36,37,38,39,40,91],translation:{0:{pattern:/\d/},9:{pattern:/\d/,optional:!0},"#":{pattern:/\d/,recursive:!0},A:{pattern:/[a-zA-Z0-9]/},S:{pattern:/[a-zA-Z]/}}};a.jMaskGlobals=a.jMaskGlobals||{};k=a.jMaskGlobals=a.extend(!0,{},k,a.jMaskGlobals);k.dataMask&&a.applyDataMask();setInterval(function(){a.jMaskGlobals.watchDataMask&&a.applyDataMask()},k.watchInterval)},window.jQuery,window.Zepto);

// CALLBACK FORM ACTIVATOR START
// $('.asteriskcallback-widget-img_circle, .header-middle__writed').on('click', function () {
//     $('.callback-wstd__row').addClass('callback-wstd__row_active');
//
//     setTimeout(function () {
//         $('.callback-wstd__row').removeClass('callback-wstd__row_active');
//     }, 20000)
// });
//
// $('.callback-wstd__access-wrap').hide();
//
// $(document).ready(function(){
//     if (document.location.hash == "#call") {
//         $('.callback-wstd__access-wrap').fadeIn(300).delay(3000).fadeOut(300);
//         unhash();
//     }
//     $(function(){
//
//         $('.asteriskcallback-widget-input').attr('type', 'hidden' ).after("<input type='tel' class='asteriskcallback-widget-input-wstd'name='dop' placeholder='8(___)___-__-__' onkeypress='hidecall();' />");
//         // $("input.asteriskcallback-widget-input").removeAttr('pattern');
//         // $("input.asteriskcallback-widget-input").attr('minlength', '11');
//         $('.asteriskcallback-widget-input-wstd').mask("8(999)999-99-99");
//         $('.asteriskcallback-widget-input-wstd').keyup(function () {
//             var msg = $(this).val();
//             // console.log(msg);
//             msg = msg.replace(/[^\w\+]|_/g, "");
//             // console.log(msg);
//             if(msg.length == 11){
//                 $('input.asteriskcallback-widget-input').val(msg);
//                 console.log($('input.asteriskcallback-widget-input').val());
//             } else {
//                 // console.log('Упс');
//                 $('input.asteriskcallback-widget-input').val('');
//             }
//         });
//     });
// });
//
// function unhash () {
//     let sy, sx;
//     if ("pushState" in history)
//         history.pushState(
//             "", document.title,
//             window.location.pathname + window.location.search
//         );
//     else {
//         // сохраняем позицию прокрутки страницы в переменные
//         sy = document.body.scrollTop;
//         sx = document.body.scrollLeft;
//
//         window.location.hash = "";
//
//         // восстанавливаем позицию, если страница прокрутилась
//         document.body.scrollTop = sy;
//         document.body.scrollLeft = sx;
//     }
// }

// CALLBACK FORM ACTIVATOR END

//CUSTOM CALLBACK
let wd_timeoutCallback;
$('#wd-phoneCallback').mask('8 (000) 000-00-00');

$(document).mousedown(function (e){
    let div = $(".wd-popup");
    if (div.is(e.target)
        && div.has(e.target).length === 0) {
        wd_closePopup()
    }
});

function wd_closePopup() {
    $(".wd-popup").addClass('is-hidden')
    $(".wd-popup__modal").addClass('is-hidden')
}
function wd_openPopup(className) {
    if (!className) return false;
    $(".wd-popup").removeClass('is-hidden');
    $(className).removeClass('is-hidden');
}
$(document).on('click', '.wd-popup__close', wd_closePopup)
$(document).on('click','.js-wdCallbackOpen', function() {
    wd_openPopup(".js-wd-callback")
})
$(document).on('keyup', function(e) {
    if (e.keyCode === 27) {
        wd_closePopup()
    }
})

$('.wd-popup__input').blur(function() {
    clearInterval(wd_timeoutCallback)
    if ($(this).val() !== '') {
        $(this).nextAll('.wd-popup__label').css('opacity', 0)
    } else {
        $(this).nextAll('.wd-popup__label').css('opacity', 1)
    }

    setTimeout(function() {
        $('.wd-popup__field-line').css('background', '#ccc')
    }, 1000)
})

$('.wd-popup__input').focus(function() {
    wd_timeoutCallback = setInterval(function() {
        let phone = $('#wd-phoneCallback').val().replace(/[^\d;]/g, '')
        if ( phone.length >  10) {
            $('.wd-popup__field-line').css('background', 'green')
            $('.wd-popup__btn-form').removeClass('disabled')
        } else {
            $('.wd-popup__field-line').css('background', 'red')
            $('.wd-popup__btn-form').addClass('disabled')
        }
    }, 100)
})

$('.wd-popup__btn-form').on('click', function() {
    if ($(this).hasClass('disabled')) {
        return false
    } else {
        $("input.asteriskcallback-widget-input").removeAttr('pattern');
        let  msg = $('.wd-popup__input').val().replace(/[^\d;]/g, '')
        $('input.asteriskcallback-widget-input').val(msg);
        $('#asteriskcallback-widget-button').click();
        // $('.wd-popup__input').val('').blur()
        // $(this).addClass('disabled')
    }
})

$(document).ready(function() {
    if (document.location.hash == "#call") {
        console.log('ok ok ok')
        $('.wd-popup__access').addClass('is-access');
        wd_openPopup(".js-wd-callback")
        setTimeout(function() {
            $('.wd-popup__access').removeClass('is-access');
            wd_closePopup()
        }, 5000)
        unhash();
    }

    function unhash () {
        let sy, sx;
        if ("pushState" in history)
            history.pushState(
                "", document.title,
                window.location.pathname + window.location.search
            );
        else {
            // сохраняем позицию прокрутки страницы в переменные
            sy = document.body.scrollTop;
            sx = document.body.scrollLeft;

            window.location.hash = "";

            // восстанавливаем позицию, если страница прокрутилась
            document.body.scrollTop = sy;
            document.body.scrollLeft = sx;
        }
    }
});
//CUSTOM CALLBACK


// SOCIAL
var classSocialBtn = 'social__box-button';
var classSocialActive = 'is-active';

Array.prototype.forEach.call(
  document.querySelectorAll('.'+ classSocialBtn),
  function (btn) {
    var btnParent = btn.parentNode;
    btn.addEventListener('click', function() {
      if (btnParent.classList.contains(classSocialActive)) {
        btnParent.classList.remove(classSocialActive)
      }
      else {
        btnParent.classList.add(classSocialActive)
      }
    })
    btn.addEventListener('blur', function() {
      btnParent.classList.remove(classSocialActive)
    })
  }
)
// SOCIAL end

