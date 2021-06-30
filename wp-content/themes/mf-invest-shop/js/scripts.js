var $ = jQuery;
var isoCountries = {
    'AF': 'Afghanistan',
    'AX': 'Aland Islands',
    'AL': 'Albania',
    'DZ': 'Algeria',
    'AS': 'American Samoa',
    'AD': 'Andorra',
    'AO': 'Angola',
    'AI': 'Anguilla',
    'AQ': 'Antarctica',
    'AG': 'Antigua And Barbuda',
    'AR': 'Argentina',
    'AM': 'Armenia',
    'AW': 'Aruba',
    'AU': 'Australia',
    'AT': 'Austria',
    'AZ': 'Azerbaijan',
    'BS': 'Bahamas',
    'BH': 'Bahrain',
    'BD': 'Bangladesh',
    'BB': 'Barbados',
    'BY': 'Belarus',
    'BE': 'Belgium',
    'BZ': 'Belize',
    'BJ': 'Benin',
    'BM': 'Bermuda',
    'BT': 'Bhutan',
    'BO': 'Bolivia',
    'BA': 'Bosnia And Herzegovina',
    'BW': 'Botswana',
    'BV': 'Bouvet Island',
    'BR': 'Brazil',
    'IO': 'British Indian Ocean Territory',
    'BN': 'Brunei Darussalam',
    'BG': 'Bulgaria',
    'BF': 'Burkina Faso',
    'BI': 'Burundi',
    'KH': 'Cambodia',
    'CM': 'Cameroon',
    'CA': 'Canada',
    'CV': 'Cape Verde',
    'KY': 'Cayman Islands',
    'CF': 'Central African Republic',
    'TD': 'Chad',
    'CL': 'Chile',
    'CN': 'China',
    'CX': 'Christmas Island',
    'CC': 'Cocos (Keeling) Islands',
    'CO': 'Colombia',
    'KM': 'Comoros',
    'CG': 'Congo',
    'CD': 'Congo, Democratic Republic',
    'CK': 'Cook Islands',
    'CR': 'Costa Rica',
    'CI': 'Cote D\'Ivoire',
    'HR': 'Croatia',
    'CU': 'Cuba',
    'CY': 'Cyprus',
    'CZ': 'Czech Republic',
    'DK': 'Denmark',
    'DJ': 'Djibouti',
    'DM': 'Dominica',
    'DO': 'Dominican Republic',
    'EC': 'Ecuador',
    'EG': 'Egypt',
    'SV': 'El Salvador',
    'GQ': 'Equatorial Guinea',
    'ER': 'Eritrea',
    'EE': 'Estonia',
    'ET': 'Ethiopia',
    'FK': 'Falkland Islands (Malvinas)',
    'FO': 'Faroe Islands',
    'FJ': 'Fiji',
    'FI': 'Finland',
    'FR': 'France',
    'GF': 'French Guiana',
    'PF': 'French Polynesia',
    'TF': 'French Southern Territories',
    'GA': 'Gabon',
    'GM': 'Gambia',
    'GE': 'Georgia',
    'DE': 'Germany',
    'GH': 'Ghana',
    'GI': 'Gibraltar',
    'GR': 'Greece',
    'GL': 'Greenland',
    'GD': 'Grenada',
    'GP': 'Guadeloupe',
    'GU': 'Guam',
    'GT': 'Guatemala',
    'GG': 'Guernsey',
    'GN': 'Guinea',
    'GW': 'Guinea-Bissau',
    'GY': 'Guyana',
    'HT': 'Haiti',
    'HM': 'Heard Island & Mcdonald Islands',
    'VA': 'Holy See (Vatican City State)',
    'HN': 'Honduras',
    'HK': 'Hong Kong',
    'HU': 'Hungary',
    'IS': 'Iceland',
    'IN': 'India',
    'ID': 'Indonesia',
    'IR': 'Iran, Islamic Republic Of',
    'IQ': 'Iraq',
    'IE': 'Ireland',
    'IM': 'Isle Of Man',
    'IL': 'Israel',
    'IT': 'Italy',
    'JM': 'Jamaica',
    'JP': 'Japan',
    'JE': 'Jersey',
    'JO': 'Jordan',
    'KZ': 'Kazakhstan',
    'KE': 'Kenya',
    'KI': 'Kiribati',
    'KR': 'Korea',
    'KW': 'Kuwait',
    'KG': 'Kyrgyzstan',
    'LA': 'Lao People\'s Democratic Republic',
    'LV': 'Latvia',
    'LB': 'Lebanon',
    'LS': 'Lesotho',
    'LR': 'Liberia',
    'LY': 'Libyan Arab Jamahiriya',
    'LI': 'Liechtenstein',
    'LT': 'Lithuania',
    'LU': 'Luxembourg',
    'MO': 'Macao',
    'MK': 'Macedonia',
    'MG': 'Madagascar',
    'MW': 'Malawi',
    'MY': 'Malaysia',
    'MV': 'Maldives',
    'ML': 'Mali',
    'MT': 'Malta',
    'MH': 'Marshall Islands',
    'MQ': 'Martinique',
    'MR': 'Mauritania',
    'MU': 'Mauritius',
    'YT': 'Mayotte',
    'MX': 'Mexico',
    'FM': 'Micronesia, Federated States Of',
    'MD': 'Moldova',
    'MC': 'Monaco',
    'MN': 'Mongolia',
    'ME': 'Montenegro',
    'MS': 'Montserrat',
    'MA': 'Morocco',
    'MZ': 'Mozambique',
    'MM': 'Myanmar',
    'NA': 'Namibia',
    'NR': 'Nauru',
    'NP': 'Nepal',
    'NL': 'Netherlands',
    'AN': 'Netherlands Antilles',
    'NC': 'New Caledonia',
    'NZ': 'New Zealand',
    'NI': 'Nicaragua',
    'NE': 'Niger',
    'NG': 'Nigeria',
    'NU': 'Niue',
    'NF': 'Norfolk Island',
    'MP': 'Northern Mariana Islands',
    'NO': 'Norway',
    'OM': 'Oman',
    'PK': 'Pakistan',
    'PW': 'Palau',
    'PS': 'Palestinian Territory, Occupied',
    'PA': 'Panama',
    'PG': 'Papua New Guinea',
    'PY': 'Paraguay',
    'PE': 'Peru',
    'PH': 'Philippines',
    'PN': 'Pitcairn',
    'PL': 'Poland',
    'PT': 'Portugal',
    'PR': 'Puerto Rico',
    'QA': 'Qatar',
    'RE': 'Reunion',
    'RO': 'Romania',
    'RU': 'Russian Federation',
    'RW': 'Rwanda',
    'BL': 'Saint Barthelemy',
    'SH': 'Saint Helena',
    'KN': 'Saint Kitts And Nevis',
    'LC': 'Saint Lucia',
    'MF': 'Saint Martin',
    'PM': 'Saint Pierre And Miquelon',
    'VC': 'Saint Vincent And Grenadines',
    'WS': 'Samoa',
    'SM': 'San Marino',
    'ST': 'Sao Tome And Principe',
    'SA': 'Saudi Arabia',
    'SN': 'Senegal',
    'RS': 'Serbia',
    'SC': 'Seychelles',
    'SL': 'Sierra Leone',
    'SG': 'Singapore',
    'SK': 'Slovakia',
    'SI': 'Slovenia',
    'SB': 'Solomon Islands',
    'SO': 'Somalia',
    'ZA': 'South Africa',
    'GS': 'South Georgia And Sandwich Isl.',
    'ES': 'Spain',
    'LK': 'Sri Lanka',
    'SD': 'Sudan',
    'SR': 'Suriname',
    'SJ': 'Svalbard And Jan Mayen',
    'SZ': 'Swaziland',
    'SE': 'Sweden',
    'CH': 'Switzerland',
    'SY': 'Syrian Arab Republic',
    'TW': 'Taiwan',
    'TJ': 'Tajikistan',
    'TZ': 'Tanzania',
    'TH': 'Thailand',
    'TL': 'Timor-Leste',
    'TG': 'Togo',
    'TK': 'Tokelau',
    'TO': 'Tonga',
    'TT': 'Trinidad And Tobago',
    'TN': 'Tunisia',
    'TR': 'Turkey',
    'TM': 'Turkmenistan',
    'TC': 'Turks And Caicos Islands',
    'TV': 'Tuvalu',
    'UG': 'Uganda',
    'UA': 'Ukraine',
    'AE': 'United Arab Emirates',
    'GB': 'United Kingdom',
    'US': 'United States',
    'UM': 'United States Outlying Islands',
    'UY': 'Uruguay',
    'UZ': 'Uzbekistan',
    'VU': 'Vanuatu',
    'VE': 'Venezuela',
    'VN': 'Viet Nam',
    'VG': 'Virgin Islands, British',
    'VI': 'Virgin Islands, U.S.',
    'WF': 'Wallis And Futuna',
    'EH': 'Western Sahara',
    'YE': 'Yemen',
    'ZM': 'Zambia',
    'ZW': 'Zimbabwe'
};

function getCountryName(countryCode) {
    if (isoCountries.hasOwnProperty(countryCode)) {
        return isoCountries[countryCode];
    } else {
        return countryCode;
    }
}

// jQuery Mask Plugin v1.14.16
// github.com/igorescobar/jQuery-Mask-Plugin
var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.findInternal = function (a, n, f) {
    a instanceof String && (a = String(a));
    for (var p = a.length, k = 0; k < p; k++) {
        var b = a[k];
        if (n.call(f, b, k, a)) return {i: k, v: b}
    }
    return {i: -1, v: void 0}
};
$jscomp.ASSUME_ES5 = !1;
$jscomp.ASSUME_NO_NATIVE_MAP = !1;
$jscomp.ASSUME_NO_NATIVE_SET = !1;
$jscomp.SIMPLE_FROUND_POLYFILL = !1;
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function (a, n, f) {
    a != Array.prototype && a != Object.prototype && (a[n] = f.value)
};
$jscomp.getGlobal = function (a) {
    return "undefined" != typeof window && window === a ? a : "undefined" != typeof global && null != global ? global : a
};
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.polyfill = function (a, n, f, p) {
    if (n) {
        f = $jscomp.global;
        a = a.split(".");
        for (p = 0; p < a.length - 1; p++) {
            var k = a[p];
            k in f || (f[k] = {});
            f = f[k]
        }
        a = a[a.length - 1];
        p = f[a];
        n = n(p);
        n != p && null != n && $jscomp.defineProperty(f, a, {configurable: !0, writable: !0, value: n})
    }
};
$jscomp.polyfill("Array.prototype.find", function (a) {
    return a ? a : function (a, f) {
        return $jscomp.findInternal(this, a, f).v
    }
}, "es6", "es3");
(function (a, n, f) {
    "function" === typeof define && define.amd ? define(["jquery"], a) : "object" === typeof exports && "undefined" === typeof Meteor ? module.exports = a(require("jquery")) : a(n || f)
})(function (a) {
    var n = function (b, d, e) {
        var c = {
            invalid: [], getCaret: function () {
                try {
                    var a = 0, r = b.get(0), h = document.selection, d = r.selectionStart;
                    if (h && -1 === navigator.appVersion.indexOf("MSIE 10")) {
                        var e = h.createRange();
                        e.moveStart("character", -c.val().length);
                        a = e.text.length
                    } else if (d || "0" === d) a = d;
                    return a
                } catch (C) {
                }
            }, setCaret: function (a) {
                try {
                    if (b.is(":focus")) {
                        var c =
                            b.get(0);
                        if (c.setSelectionRange) c.setSelectionRange(a, a); else {
                            var g = c.createTextRange();
                            g.collapse(!0);
                            g.moveEnd("character", a);
                            g.moveStart("character", a);
                            g.select()
                        }
                    }
                } catch (B) {
                }
            }, events: function () {
                b.on("keydown.mask", function (a) {
                    b.data("mask-keycode", a.keyCode || a.which);
                    b.data("mask-previus-value", b.val());
                    b.data("mask-previus-caret-pos", c.getCaret());
                    c.maskDigitPosMapOld = c.maskDigitPosMap
                }).on(a.jMaskGlobals.useInput ? "input.mask" : "keyup.mask", c.behaviour).on("paste.mask drop.mask", function () {
                    setTimeout(function () {
                            b.keydown().keyup()
                        },
                        100)
                }).on("change.mask", function () {
                    b.data("changed", !0)
                }).on("blur.mask", function () {
                    f === c.val() || b.data("changed") || b.trigger("change");
                    b.data("changed", !1)
                }).on("blur.mask", function () {
                    f = c.val()
                }).on("focus.mask", function (b) {
                    !0 === e.selectOnFocus && a(b.target).select()
                }).on("focusout.mask", function () {
                    e.clearIfNotMatch && !k.test(c.val()) && c.val("")
                })
            }, getRegexMask: function () {
                for (var a = [], b, c, e, t, f = 0; f < d.length; f++) (b = l.translation[d.charAt(f)]) ? (c = b.pattern.toString().replace(/.{1}$|^.{1}/g, ""), e = b.optional,
                    (b = b.recursive) ? (a.push(d.charAt(f)), t = {
                        digit: d.charAt(f),
                        pattern: c
                    }) : a.push(e || b ? c + "?" : c)) : a.push(d.charAt(f).replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&"));
                a = a.join("");
                t && (a = a.replace(new RegExp("(" + t.digit + "(.*" + t.digit + ")?)"), "($1)?").replace(new RegExp(t.digit, "g"), t.pattern));
                return new RegExp(a)
            }, destroyEvents: function () {
                b.off("input keydown keyup paste drop blur focusout ".split(" ").join(".mask "))
            }, val: function (a) {
                var c = b.is("input") ? "val" : "text";
                if (0 < arguments.length) {
                    if (b[c]() !== a) b[c](a);
                    c = b
                } else c = b[c]();
                return c
            }, calculateCaretPosition: function (a) {
                var d = c.getMasked(), h = c.getCaret();
                if (a !== d) {
                    var e = b.data("mask-previus-caret-pos") || 0;
                    d = d.length;
                    var g = a.length, f = a = 0, l = 0, k = 0, m;
                    for (m = h; m < d && c.maskDigitPosMap[m]; m++) f++;
                    for (m = h - 1; 0 <= m && c.maskDigitPosMap[m]; m--) a++;
                    for (m = h - 1; 0 <= m; m--) c.maskDigitPosMap[m] && l++;
                    for (m = e - 1; 0 <= m; m--) c.maskDigitPosMapOld[m] && k++;
                    h > g ? h = 10 * d : e >= h && e !== g ? c.maskDigitPosMapOld[h] || (e = h, h = h - (k - l) - a, c.maskDigitPosMap[h] && (h = e)) : h > e && (h = h + (l - k) + f)
                }
                return h
            }, behaviour: function (d) {
                d =
                    d || window.event;
                c.invalid = [];
                var e = b.data("mask-keycode");
                if (-1 === a.inArray(e, l.byPassKeys)) {
                    e = c.getMasked();
                    var h = c.getCaret(), g = b.data("mask-previus-value") || "";
                    setTimeout(function () {
                        c.setCaret(c.calculateCaretPosition(g))
                    }, a.jMaskGlobals.keyStrokeCompensation);
                    c.val(e);
                    c.setCaret(h);
                    return c.callbacks(d)
                }
            }, getMasked: function (a, b) {
                var h = [], f = void 0 === b ? c.val() : b + "", g = 0, k = d.length, n = 0, p = f.length, m = 1,
                    r = "push", u = -1, w = 0;
                b = [];
                if (e.reverse) {
                    r = "unshift";
                    m = -1;
                    var x = 0;
                    g = k - 1;
                    n = p - 1;
                    var A = function () {
                        return -1 <
                            g && -1 < n
                    }
                } else x = k - 1, A = function () {
                    return g < k && n < p
                };
                for (var z; A();) {
                    var y = d.charAt(g), v = f.charAt(n), q = l.translation[y];
                    if (q) v.match(q.pattern) ? (h[r](v), q.recursive && (-1 === u ? u = g : g === x && g !== u && (g = u - m), x === u && (g -= m)), g += m) : v === z ? (w--, z = void 0) : q.optional ? (g += m, n -= m) : q.fallback ? (h[r](q.fallback), g += m, n -= m) : c.invalid.push({
                        p: n,
                        v: v,
                        e: q.pattern
                    }), n += m; else {
                        if (!a) h[r](y);
                        v === y ? (b.push(n), n += m) : (z = y, b.push(n + w), w++);
                        g += m
                    }
                }
                a = d.charAt(x);
                k !== p + 1 || l.translation[a] || h.push(a);
                h = h.join("");
                c.mapMaskdigitPositions(h,
                    b, p);
                return h
            }, mapMaskdigitPositions: function (a, b, d) {
                a = e.reverse ? a.length - d : 0;
                c.maskDigitPosMap = {};
                for (d = 0; d < b.length; d++) c.maskDigitPosMap[b[d] + a] = 1
            }, callbacks: function (a) {
                var g = c.val(), h = g !== f, k = [g, a, b, e], l = function (a, b, c) {
                    "function" === typeof e[a] && b && e[a].apply(this, c)
                };
                l("onChange", !0 === h, k);
                l("onKeyPress", !0 === h, k);
                l("onComplete", g.length === d.length, k);
                l("onInvalid", 0 < c.invalid.length, [g, a, b, c.invalid, e])
            }
        };
        b = a(b);
        var l = this, f = c.val(), k;
        d = "function" === typeof d ? d(c.val(), void 0, b, e) : d;
        l.mask =
            d;
        l.options = e;
        l.remove = function () {
            var a = c.getCaret();
            l.options.placeholder && b.removeAttr("placeholder");
            b.data("mask-maxlength") && b.removeAttr("maxlength");
            c.destroyEvents();
            c.val(l.getCleanVal());
            c.setCaret(a);
            return b
        };
        l.getCleanVal = function () {
            return c.getMasked(!0)
        };
        l.getMaskedVal = function (a) {
            return c.getMasked(!1, a)
        };
        l.init = function (g) {
            g = g || !1;
            e = e || {};
            l.clearIfNotMatch = a.jMaskGlobals.clearIfNotMatch;
            l.byPassKeys = a.jMaskGlobals.byPassKeys;
            l.translation = a.extend({}, a.jMaskGlobals.translation, e.translation);
            l = a.extend(!0, {}, l, e);
            k = c.getRegexMask();
            if (g) c.events(), c.val(c.getMasked()); else {
                e.placeholder && b.attr("placeholder", e.placeholder);
                b.data("mask") && b.attr("autocomplete", "off");
                g = 0;
                for (var f = !0; g < d.length; g++) {
                    var h = l.translation[d.charAt(g)];
                    if (h && h.recursive) {
                        f = !1;
                        break
                    }
                }
                f && b.attr("maxlength", d.length).data("mask-maxlength", !0);
                c.destroyEvents();
                c.events();
                g = c.getCaret();
                c.val(c.getMasked());
                c.setCaret(g)
            }
        };
        l.init(!b.is("input"))
    };
    a.maskWatchers = {};
    var f = function () {
        var b = a(this), d = {}, e = b.attr("data-mask");
        b.attr("data-mask-reverse") && (d.reverse = !0);
        b.attr("data-mask-clearifnotmatch") && (d.clearIfNotMatch = !0);
        "true" === b.attr("data-mask-selectonfocus") && (d.selectOnFocus = !0);
        if (p(b, e, d)) return b.data("mask", new n(this, e, d))
    }, p = function (b, d, e) {
        e = e || {};
        var c = a(b).data("mask"), f = JSON.stringify;
        b = a(b).val() || a(b).text();
        try {
            return "function" === typeof d && (d = d(b)), "object" !== typeof c || f(c.options) !== f(e) || c.mask !== d
        } catch (w) {
        }
    }, k = function (a) {
        var b = document.createElement("div");
        a = "on" + a;
        var e = a in b;
        e || (b.setAttribute(a,
            "return;"), e = "function" === typeof b[a]);
        return e
    };
    a.fn.mask = function (b, d) {
        d = d || {};
        var e = this.selector, c = a.jMaskGlobals, f = c.watchInterval;
        c = d.watchInputs || c.watchInputs;
        var k = function () {
            if (p(this, b, d)) return a(this).data("mask", new n(this, b, d))
        };
        a(this).each(k);
        e && "" !== e && c && (clearInterval(a.maskWatchers[e]), a.maskWatchers[e] = setInterval(function () {
            a(document).find(e).each(k)
        }, f));
        return this
    };
    a.fn.masked = function (a) {
        return this.data("mask").getMaskedVal(a)
    };
    a.fn.unmask = function () {
        clearInterval(a.maskWatchers[this.selector]);
        delete a.maskWatchers[this.selector];
        return this.each(function () {
            var b = a(this).data("mask");
            b && b.remove().removeData("mask")
        })
    };
    a.fn.cleanVal = function () {
        return this.data("mask").getCleanVal()
    };
    a.applyDataMask = function (b) {
        b = b || a.jMaskGlobals.maskElements;
        (b instanceof a ? b : a(b)).filter(a.jMaskGlobals.dataMaskAttr).each(f)
    };
    k = {
        maskElements: "input,td,span,div",
        dataMaskAttr: "*[data-mask]",
        dataMask: !0,
        watchInterval: 300,
        watchInputs: !0,
        keyStrokeCompensation: 10,
        useInput: !/Chrome\/[2-4][0-9]|SamsungBrowser/.test(window.navigator.userAgent) &&
            k("input"),
        watchDataMask: !1,
        byPassKeys: [9, 16, 17, 18, 36, 37, 38, 39, 40, 91],
        translation: {
            0: {pattern: /\d/},
            9: {pattern: /\d/, optional: !0},
            "#": {pattern: /\d/, recursive: !0},
            A: {pattern: /[a-zA-Z0-9]/},
            S: {pattern: /[a-zA-Z]/}
        }
    };
    a.jMaskGlobals = a.jMaskGlobals || {};
    k = a.jMaskGlobals = a.extend(!0, {}, k, a.jMaskGlobals);
    k.dataMask && a.applyDataMask();
    setInterval(function () {
        a.jMaskGlobals.watchDataMask && a.applyDataMask()
    }, k.watchInterval)
}, window.jQuery, window.Zepto);

var repeaterAdd = '.addrepeaterfield';
var containerRepeater = $('.repeater-cont');
var containerYoutubeRepeater = $('.repeater-youtube-cont');
var id22 = $('#id22');

/* Set up repeater for publication of post */
if (containerRepeater.length) {
    var copiedRepeater = $('.repeater-cont .repeater-single').clone();
    var clicker = 1;
    containerRepeater.click(function (e) {
        if ($(e.target).is(repeaterAdd)) {
            clicker++;
            console.log('clicked');
            let tempcopy = copiedRepeater.clone();
            let inputname = "repeaterdata[]repeater[" + clicker + "][]";
            tempcopy.find('input[type=hidden]').attr('name', inputname);
            tempcopy.find('input[type=hidden]').attr('id', 'repeater' + clicker);
            tempcopy.find('input[type=text]').attr('name', inputname);
            $(tempcopy).insertAfter($(e.target).closest('.repeater-single'));
        }
    })
}

/* Set up repeater for youtube videos of post */
if (containerYoutubeRepeater.length) {
    var copiedYoutubeRepeater = $('.repeater-youtube-cont .repeater-single').clone();
    var clickery = 0;
    containerYoutubeRepeater.click(function (e) {
        if ($(e.target).is(repeaterAdd)) {
            let tempcopy = copiedYoutubeRepeater.clone();
            let inputname = copiedYoutubeRepeater.find('input').attr('name').slice(0, -2);
            tempcopy.find('input[type=hidden]').attr('name', inputname);
            tempcopy.find('input[type=hidden]').attr('id', inputname + clickery);
            tempcopy.find('input[type=text]').attr('name', inputname);
            $(tempcopy).insertAfter($(e.target).closest('.repeater-single'));
        }
    })
}
addEventListener('DOMContentLoaded', function () {
    if (id22.length) {
        id22.find('input[type=checkbox]').attr('checked', '');
    }
})
if ($('.tel-field').length) {
    if ($('.tel-field').val().length == 0) $('.tel-field').val('+');
}
$('.tel-field').on('keypress', function (evt) {
    if ($(this).val().length > 13) return false;
    let charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
});

function isNumm(evt, tthis) {
    let thisval = $(tthis).val().replace(/\s/g, '');
    const minval = $(tthis).attr('min');
    const maxval = $(tthis).attr('max');

    let int = Number(thisval);

    if (thisval.length >= maxval.length) return false;

    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) || (int > maxval || int < minval))
        return false;

    return true;
}

function isNumberKey(evt, tthis) {
    return true;
}

$('.num-beautify').each(function () {
    let thisval = $(this).text().replace(/\s/g, '');
    let int = Number(thisval);
    let newval = (int).toLocaleString('ru');
    $(this).text(newval);
})

// function tolocaleNum (num) {
//     return (num).toLocaleString('ru')
// }
function yourProfileFields() {
    console.log('called');
    if ($('#your-profile').length) {
        let socials = ['facebook', 'linkedin', 'instagram', 'telegram'];
        socials.forEach(function (e) {
            if (!$('#profile-field-social_' + e).find('input').val()) {
                $(`#profile-field-social_` + e).find('.rcl-field-input').hide();
                $(`#profile-field-social_${e} .rcl-table__cell-w-70`).append('<a class="addsocials" href="javascript;">Привязать</a>');
            }
            console.log($('.profile-field-social_' + e).find('input[type=text]').val());
        });
    }
    $('.addsocials').on('click', function (e) {
        e.preventDefault();
        var socialcureent = $(this).closest('.rcl-table__row-must-sort').attr('id');
        popupDisplay(socialcureent);
        return false
    })

    function popupDisplay(social) {
        $('.popup-addsocial input').val('');
        $('.popup-addsocial').addClass('show');
        $('.popup-addsocial').addClass(social);
    }

    $('.popup-addsocial').on('click', function (e) {
        if ($(e.target).is('.popup-addsocial')) {
            $(this).removeClass();
            $(this).addClass('popup-addsocial');
        }
    })
    $('.popup-addsocial button.submit').on('click', function () {
        if ($('input[name=social-name]').val() !== '') {
            let inputval = $('input[name=social-name]').val();
            $('.popup-addsocial').removeClass('show');
            let id = document.querySelector('.popup-addsocial').classList[1];
            var socialfull;
            if (id.includes('facebook')) {
                if (inputval.includes('https:')) {
                    socialfull = inputval
                } else {
                    socialfull = 'https://www.facebook.com/' + inputval;
                }
                pasterInsideInput('facebook', socialfull)
            } else if (id.includes('instagram')) {
                if (inputval.startsWith('@')) {
                    inputval = inputval.slice(1);
                    socialfull = 'https://www.instagram.com/' + inputval;
                } else if (inputval.includes('https:')) {
                    socialfull = inputval
                } else {
                    socialfull = 'https://www.instagram.com/' + inputval;
                }
                pasterInsideInput('instagram', socialfull)
            } else if (id.includes('linkedin')) {
                if (inputval.includes('https:')) {
                    socialfull = inputval
                } else {
                    socialfull = 'https://www.linkedin.com/in/' + inputval;
                }
                pasterInsideInput('linkedin', socialfull)
            } else if (id.includes('telegram')) {
                if (inputval.includes('https:')) {
                    socialfull = inputval;
                } else {
                    socialfull = 'https://t.me/' + inputval;
                }
                pasterInsideInput('telegram', socialfull)
            }
            let popupsocial = $('.popup-addsocial');
            popupsocial.removeClass();
            popupsocial.addClass('popup-addsocial');
        }
    })

    function pasterInsideInput(social, inputval) {
        $(`input[name=social_${social}]`).attr('value', inputval);
        $(`#profile-field-social_` + social).find('.rcl-field-input').show();
        $(`#rcl-field-social_` + social).next().remove();
    }

    $('#tab-profile').on('click', function (e) {
        if ($(e.target).is('input[id^=social_]')) {
            popupDisplay('profile-field-social_' + $(e.target).attr('id').slice(7))
        }
    })
    $('.user-tel').one('click', function (e) {
        e.preventDefault();
        $('#user-tel').text($(this).attr('href').slice(3));
        return false
    })
}

yourProfileFields();
$('#lk-menu').on('click', function () {
    console.log('clicked on menu');
    setTimeout(yourProfileFields, 800)
});
$(window).ready(function () {

})
if (!$('body').hasClass('logged-in')) {
    $('.user-cabinet .rcl-table__cell-w-70, .user-contacts .rcl-table__cell-w-70').on('click', function (e) {
        e.preventDefault();
        $('.rcl-login').click();
        return false
    })
} else {
    $('.show-hidden').on('click', function (e) {
        e.preventDefault();
        let closest = $(this).closest('a');
        let data_content = closest.attr('data-content');
        closest.text(data_content);
        closest.attr('href', data_content);
        return false;
    })
}
$('.btn-open-filter').on('click', function () {
    $('.filter-cont').slideToggle();
})
$('.rcl-form-field.field-select').on('click', function (e) {
    if ($(e.target).closest('.parent-category').length) {
        if ($(e.target).closest('.parent-category').find('input[type=checkbox]:checked').length) {
            $(e.target).closest('.parent-category').next().find('input[type=checkbox]').prop("checked", true);
            console.log('true', $(e.target).closest('.parent-category').next().find('input[type=checkbox]').length)
        } else {
            $(e.target).closest('.parent-category').next().find('input[type=checkbox]').prop("checked", false);
            console.log('false', $(e.target).closest('.parent-category').next().find('input[type=checkbox]'))
        }
    }
})
$(window).ready(function () {
    if ($('.type-uploadgoogledoc-input').length) {
        $('.type-uploadgoogledoc-input').each(function () {
            if ($(this).find('input[type=hidden]').val() !== '' && $(this).find('input[type=hidden]').val() !== false) {
                $(this).find('input[type=hidden]').parent().prev().text('Изменить файл');
                $(this).find('input[type=hidden]').parent().prev().after('<span>Файл успешно добавлен</span>');
                $(this).find('input[type=hidden]').parent().parent().find('.button-upload_google').first().addClass('success-btn-added');
            }

        })
    }

})
$('#rcl-office .rcl-form-field label').on('click', function () {
    $(this).next().slideToggle();
})

// window.addEventListener('load', function () {
//     console.log('loaded')
//     $('.taxonomy-countries select, .taxonomy-uchrediteli_countries select, .taxonomy-country_of_registration select').select2({
//         placeholder: 'Выберите страну из списка',
//         multiple: true,
//         minimumResultsForSearch: 1
//     });
// })

/* Set local storage lidgen */
var cityresponse, countryresponse;

if (!Date.now) {
    Date.now = function () {
        return new Date().getTime();
    }
}

function sender(action) {
    jQuery.get("https://ipinfo.io", function (response) {
        cityresponse = response.city;
        countryresponse = getCountryName(response.country);

        let formdata = {};
        formdata.action = action ? action : 'setlocalstorage';
        localStorage.referrer ? formdata.lidgenid = localStorage.referrer : null;
        cityresponse ? formdata.city = cityresponse : null;
        countryresponse ? formdata.country = countryresponse : null;
        formdata.link = window.location.href
        JSON.stringify(formdata);
        console.log(formdata)
        jQuery.ajax({
            enctype: 'multipart/form-data',
            type: 'GET',
            url: '/wp-admin/admin-ajax.php',
            data: formdata,
            processData: true,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                console.log(response);
            },
            error: function (response) {
                console.log('error')
                console.log(response.responseText)
            }
        });

    }, "jsonp");
}

function checkFormPageValidity(target, index, formpage) {
    let myRclForm = new RclForm();
    myRclForm.form = formpage;

    if(target.hasClass('done')) return true;

    if (!myRclForm.validate()) {
        return false;
    }

    return true;
}

document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('referrer') !== null && sessionStorage.getItem('repeat_visit') == null) {
        sender('repeat_visit');
        console.log('repeat visit');
        sessionStorage.setItem('repeat_visit', true);
    } else if (document.referrer.includes('mentorsflow.com') == false && localStorage.getItem('referrer') == null && jQuery('body').hasClass('logged-in') == false) {
        var docreferer, referer;
        console.log('first visit')
        if (jQuery('body').hasClass('logged-in') == false) {
            if (jQuery('#lidgenname').length) {
                referer = jQuery('#lidgenname').text();
            } else {
                referer = 1;
            }
            localStorage.setItem('referrer', referer);
            sender('setlocalstorage');
        } else {
            docreferer = document.referrer;
        }
    }
})

function stepDecider(e) {
    // let target = $(e.currentTarget);
    //
    // if(checkFormPageValidity(target)) {
    //
    // }
    // console.log($(e.currentTarget))
    // if($(e.currentTarget).hasClass('done')) {
    //     return $(e.currentTarget).index() + 1;
    // }
    // else if($(e.currentTarget).hasClass('wrong')) {
    //     if(!checkFormPageValidity(e)) return false;
    //         return $(e.currentTarget).index() + 1;
    // }
    // else if($(e.currentTarget).hasClass('active')) {
    //     return false;
    // }
    // else if($(e.currentTarget).prev().hasClass('active')) {
    //     if(!checkFormPageValidity(e)) return false;
    //     return $(e.currentTarget).index() + 1;
    // }else {
    //     if(!) return false;
    // }
}

function swiperClick(e, direction = true) {
    let target;
    if(direction) {
        target = $('.swiper-slide-next');
    }else {
        target = $('.swiper-slide-prev');
    }

    let targetindex = target.index() + 1;

    let formpage = $(`.form-page.active`);

    if(sessionStorage.getItem('maxpublishstep')) {
        if(parseInt(sessionStorage.getItem('maxpublishstep')) < targetindex) {
            sessionStorage.setItem('maxpublishstep', targetindex);
        }
    }else {
        sessionStorage.setItem('maxpublishstep', targetindex);
    }

    if(targetindex == 8) $('#rcl-publish-post').removeAttr('disabled')

    $(`.top-publish-pagination .swiper-slide:nth-child(${targetindex})`).nextAll().each((index, elem)=>{
        if($(elem).hasClass('done')) {
            direction = false;
        }
    })

    if(target.hasClass('swiper-slide-active')) return false;

    if(!checkFormPageValidity(target, targetindex, formpage)) {
        $('body').trigger('personalfailure', {target, targetindex, formpage, direction})
        return false;
    }else {
        $('body').trigger('personalsuccess', {target, targetindex, formpage, direction})
    }

    return true;
}

jQuery(function($) {
    // $('.top-publish-pagination .swiper-slide').on('click', swiperClick)

    $('body').on('personalfailure', function (event, elements) {
        console.log('personalfailure')
        let target = elements['target'];
        let targetindex = elements['targetindex'];
        let formpage = elements['formpage'];

        $('.top-publish-pagination .swiper-slide-active').removeClass('done').addClass('wrong');

        $('body').trigger('formpage_changed');
    })

    $('body').on('personalsuccess', function (event, elements) {
        let target = elements['target'];
        let targetindex = parseInt(elements['targetindex']);
        let formpage = $('.form-page.active');
        let formpageindex = formpage.index() + 1;
        let maxpublishstep = parseInt(sessionStorage.getItem('maxpublishstep'));
        let direction;

        console.log('personalsuccess')

        if(maxpublishstep > targetindex) {
            direction = 'negative';
        }else {
            direction = 'positive';
        }

        console.log('personalsuccess', formpageindex, direction)

        target.closest('.swiper-slide-active').prevAll().addClass('done');
        target.closest('.swiper-slide-active').siblings().removeClass('wrong');
        // target.addClass('active');

        console.log(formpageindex, 'formpageindex')
        if(direction == 'negative') {
            console.log('negative branch', targetindex)
            $(`.top-publish-pagination .swiper-slide`).removeClass('wrong');
            $(`.top-publish-pagination .swiper-slide:nth-child(${targetindex})`).removeClass('active wrong').addClass('done');
            $(`#formpage${targetindex}`).addClass('active').siblings().removeClass('active');
        }else {
            console.log('positive branch', targetindex);
            $(`.top-publish-pagination .swiper-slide:nth-child(${formpageindex})`).removeClass('active wrong').addClass('done');
            $(`#formpage${targetindex}`).addClass('active').siblings().removeClass('active');
        }

        $('body').trigger('formpage_changed');
    })

    $('.next-step').on('click', function (e) {
        e.preventDefault();
        if($('.top-publish-pagination .swiper-slide-next').length) {
            if(!swiperClick()) return;
            $('.swiper-slide-active').addClass('done');
            publishslider.allowSlideNext = true;
            publishslider.slideNext();
            // $('.swiper-slide-active').prevAll().removeClass('wrong').addClass('done');
            publishslider.allowSlideNext = false;
        }
    })

    $('.previous-step').on('click', function (e) {
        e.preventDefault();
        if($('.top-publish-pagination .swiper-slide-prev').length) {
            // if(!swiperClick()) return;
            // $('.swiper-slide-active').addClass('done');
            $(`.form-page.active`).removeClass('active').prev().addClass('active');
            publishslider.allowSlidePrev = true;
            publishslider.slidePrev();
            // $('.swiper-slide-active').prevAll().removeClass('wrong').addClass('done');
            publishslider.allowSlidePrev = false;
        }
        $('body').trigger('formpage_changed');
    })

    $('body').on('formpage_changed', function () {
        let index = $('.top-publish-pagination .swiper-slide-active').index() + 1;

        if(index < 2) {
            $('.previous-step').hide();
        }else {
            $('.previous-step').show();
            $('.next-step').next();
        }
        if(index == 8) {
            $('.next-step').hide();
        }else {
            $('.next-step').show();
        }

    })

    $('#modal-previewfile').on('hidden.bs.modal', function () {
        $(this).find('iframe').remove();
    })

    if($('.top-publish-pagination').length) {
        var publishslider = new Swiper('.top-publish-pagination', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            centeredSlides: true,
            slidesPerView: 5.5,
            allowSlideNext: false,
            allowSlidePrev: false,
            allowTouchMove: false,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 2.5,
                    spaceBetween: 15
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 3.5,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 4.5,
                    spaceBetween: 40
                },
                1000: {
                    slidesPerView: 5.5,
                    spaceBetween: 20
                }
            }
        });
    }
})