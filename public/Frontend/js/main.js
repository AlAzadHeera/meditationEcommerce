! function (a) {
    "use strict";
    a.fn.equalHeights = function () {
        var b = 0,
            c = a(this);
        return c.each(function () {
            var c = a(this).innerHeight();
            c > b && (b = c)
        }), c.css("height", b)
    }, a("[data-equal]").each(function () {
        var b = a(this),
            c = b.data("equal");
        imagesLoaded(a(this), function () {
            b.find(c).equalHeights()
        })
    })
}(jQuery);
! function (a) {
    "use strict";
    var b = function () {
        var a = window,
            b = "inner";
        return "innerWidth" in window || (b = "client", a = document.documentElement || document.body), {
            width: a[b + "Width"],
            height: a[b + "Height"]
        }
    };
    a.fn.nooLoadmore = function (b, c) {
        var d = {
                contentSelector: null,
                contentWrapper: null,
                nextSelector: "div.navigation a:first",
                navSelector: "div.navigation",
                itemSelector: "div.post",
                dataType: "html",
                finishedMsg: "<em>Congratulations, you've reached the end of the internet.</em>",
                loading: {
                    speed: "fast",
                    start: void 0
                },
                state: {
                    isDuringAjax: !1,
                    isInvalidPage: !1,
                    isDestroyed: !1,
                    isDone: !1,
                    isPaused: !1,
                    isBeyondMaxPage: !1,
                    currPage: 1
                }
            },
            b = a.extend(d, b);
        return this.each(function () {
            var d = this,
                e = a(this),
                f = e.find(".loadmore-wrap"),
                g = e.find(".loadmore-action"),
                h = g.find(".btn-loadmore"),
                i = g.find(".loadmore-loading");
            b.contentWrapper = b.contentWrapper || f;
            var j = function (a) {
                if (a.match(/^(.*?)\b2\b(.*?$)/)) a = a.match(/^(.*?)\b2\b(.*?$)/).slice(1);
                else if (a.match(/^(.*?)2(.*?$)/)) {
                    if (a.match(/^(.*?page=)2(\/.*|$)/)) return a = a.match(/^(.*?page=)2(\/.*|$)/).slice(1);
                    a = a.match(/^(.*?)2(.*?$)/).slice(1)
                } else {
                    if (a.match(/^(.*?page=)1(\/.*|$)/)) return a = a.match(/^(.*?page=)1(\/.*|$)/).slice(1);
                    b.state.isInvalidPage = !0
                }
                return a
            };
            if (a(b.nextSelector).length) {
                b.callback = function (d, e) {
                    c && c.call(a(b.contentSelector)[0], d, b, e)
                }, b.loading.start = b.loading.start || function () {
                    h.hide(), a(b.navSelector).hide(), i.show(b.loading.speed, a.proxy(function () {
                        k(b)
                    }, d))
                };
                var k = function (b) {
                    var c = a(b.nextSelector).attr("href");
                    c = j(c);
                    var e, f, k, l, m;
                    return b.callback, b.state.currPage++, void 0 !== b.maxPage && b.state.currPage > b.maxPage ? (b.state.isBeyondMaxPage = !0, void 0) : (e = c.join(b.state.currPage), k = a("<div/>"), k.load(e + " " + b.itemSelector, void 0, function () {
                        if (l = k.children(), 0 === l.length) return h.hide(), g.append('<div style="margin-top:5px;">' + b.finishedMsg + "</div>").animate({
                            opacity: 1
                        }, 2e3, function () {
                            g.fadeOut(b.loading.speed)
                        }), void 0;
                        for (f = document.createDocumentFragment(); k[0].firstChild;) f.appendChild(k[0].firstChild);
                        a(b.contentWrapper)[0].appendChild(f), m = l.get(), i.hide(), h.show(b.loading.speed), b.callback(m)
                    }), void 0)
                };
                h.on("click", function (c) {
                    c.stopPropagation(), c.preventDefault(), b.loading.start.call(a(b.contentWrapper)[0], b)
                })
            }
        })
    };
    var d = function () {
        function k() {
            a(".modal").each(function () {
                if (a(this).find(".modal-dialog").hasClass("modal-dialog-center")) {
                    a(this).hasClass("in") === !1 && a(this).show();
                    var c = b().height - 60,
                        d = a(this).find(".modal-dialog-center .modal-header").outerHeight() || 2,
                        e = a(this).find(".modal-dialog-center .modal-footer").outerHeight() || 2;
                    a(this).find(".modal-dialog-center .modal-content").css({
                        "max-height": function () {
                            return c
                        }
                    }), a(this).find(".modal-dialog-center .modal-body").css({
                        "max-height": function () {
                            return c - (d + e)
                        }
                    }), a(this).find(".modal-dialog-center").css({
                        "margin-top": function () {
                            return -(a(this).outerHeight() / 2)
                        },
                        "margin-left": function () {
                            return -(a(this).outerWidth() / 2)
                        }
                    }), a(this).hasClass("in") === !1 && a(this).hide()
                }
            })
        }
        var c = "ontouchstart" in window;
        if (c && a(".carousel-inner").swipe({
                swipeLeft: function () {
                    a(this).parent().carousel("prev")
                },
                swipeRight: function () {
                    a(this).parent().carousel("next")
                },
                threshold: 0
            }), a(".navbar").length) {
            var d = a(window),
                e = a("body"),
                f = a(".navbar").offset().top,
                g = 0;
            e.hasClass("admin-bar") && (g = a("#wpadminbar").outerHeight());
            var i = 0,
                j = a(".navbar-nav").outerHeight();
            b().height >= 320 && a(window).resize(k).trigger("resize");
            var l = function () {
                if (b().width > 992) {
                    var c = a(window),
                        d = a(".navbar");
                    if (d.hasClass("fixed-top")) {
                        var g = "navbar-fixed-top";
                        d.hasClass("shrinkable") && !e.hasClass("one-page-layout") && (g += " navbar-shrink");
                        var h = 0;
                        e.hasClass("admin-bar") && (h = a("#wpadminbar").outerHeight());
                        var k = f + j;
                        if (c.scrollTop() + h > k) {
                            if (d.hasClass("navbar-fixed-top")) return;
                            if (!d.hasClass("navbar-fixed-top")) return i = d.hasClass("shrinkable") ? Math.max(Math.round(a(".navbar-nav").outerHeight() - (c.scrollTop() + h) + f), 60) : a(".navbar-nav").outerHeight(), e.hasClass("page-menu-center-vertical") ? (d.closest(".noo-header").css({
                                height: "1px"
                            }), d.closest(".noo-header").css({
                                position: "relative"
                            })) : a(".navbar-wrapper").css({
                                "min-height": i + "px"
                            }), d.closest(".noo-header").css({
                                position: "relative"
                            }), d.css({
                                "min-height": i + "px"
                            }), d.find(".navbar-nav > li > a").css({
                                "line-height": i + "px"
                            }), d.find(".navbar-brand").css({
                                height: i + "px"
                            }), d.find(".navbar-brand img").css({
                                "max-height": i + "px"
                            }), d.find(".navbar-brand").css({
                                "line-height": i + "px"
                            }), d.addClass(g), d.css("top", h), void 0
                        }
                        d.removeClass(g), d.css({
                            top: ""
                        }), e.hasClass("page-menu-center-vertical") ? (d.closest(".noo-header").css({
                            height: ""
                        }), d.closest(".noo-header").css({
                            position: ""
                        })) : a(".navbar-wrapper").css({
                            "min-height": ""
                        }), d.closest(".noo-header").css({
                            position: ""
                        }), d.css({
                            "min-height": ""
                        }), d.find(".navbar-nav > li > a").css({
                            "line-height": ""
                        }), d.find(".navbar-brand").css({
                            height: ""
                        }), d.find(".navbar-brand img").css({
                            "max-height": ""
                        }), d.find(".navbar-brand").css({
                            "line-height": ""
                        })
                    }
                }
            };
            d.bind("scroll", l).resize(l), e.hasClass("one-page-layout") && (a('.navbar-scrollspy > .nav > li > a[href^="#"]').click(function (b) {
                b.preventDefault();
                var c = a(this).attr("href").replace(/.*(?=#[^\s]+$)/, "");
                if (c && a(c).length) {
                    var d = Math.max(0, a(c).offset().top);
                    d = Math.max(0, d - (g + a(".navbar").outerHeight()) + 5), a("html, body").animate({
                        scrollTop: d
                    }, {
                        duration: 800,
                        easing: "easeInOutCubic",
                        complete: window.reflow
                    })
                }
            }), e.scrollspy({
                target: ".navbar-scrollspy",
                offset: g + a(".navbar").outerHeight()
            }), a(window).resize(function () {
                e.scrollspy("refresh")
            }))
        }
        a(".noo-slider-revolution-container .noo-slider-scroll-bottom").click(function (b) {
            b.preventDefault();
            var c = a(".noo-slider-revolution-container").outerHeight();
            a("html, body").animate({
                scrollTop: c
            }, 900, "easeInOutExpo")
        }), a("body").on("mouseenter", ".masonry-style-elevated .masonry-portfolio.no-gap .masonry-item", function () {
            a(this).closest(".masonry-container").find(".masonry-overlay").show(), a(this).addClass("masonry-item-hover")
        }), a("body").on("mouseleave ", ".masonry-style-elevated .masonry-portfolio.no-gap .masonry-item", function () {
            a(this).closest(".masonry-container").find(".masonry-overlay").hide(), a(this).removeClass("masonry-item-hover")
        }), a(".masonry").each(function () {
            var b = a(this),
                c = a(this).find(".masonry-container"),
                d = a(this).find(".masonry-filters a");
            c.isotope({
                itemSelector: ".masonry-item",
                transitionDuration: "0.8s",
                masonry: {
                    gutter: 0
                }
            }), imagesLoaded(b, function () {
                c.isotope("layout")
            }), d.click(function (a) {
                a.stopPropagation(), a.preventDefault();
                var d = jQuery(this);
                if (d.hasClass("selected")) return !1;
                b.find(".masonry-result h3").text(d.text());
                var e = d.closest("ul");
                e.find(".selected").removeClass("selected"), d.addClass("selected");
                var f = {
                        layoutMode: "masonry",
                        transitionDuration: "0.8s",
                        masonry: {
                            gutter: 0
                        }
                    },
                    g = e.attr("data-option-key"),
                    h = d.attr("data-option-value");
                h = "false" === h ? !1 : h, f[g] = h, c.isotope(f)
            })
        });
        var m = {};
        a(".masonry").length && a(".masonry").each(function () {
            var b = a(this);
        }), a(window).scroll(function () {
            a(this).scrollTop() > 500 ? a(".go-to-top").addClass("on") : a(".go-to-top").removeClass("on")
        }), a("body").on("click", ".go-to-top", function () {
            return a("html, body").animate({
                scrollTop: 0
            }, 800), !1
        }), a("body").on("click", ".search-button", function () {
            return a(".searchbar").hasClass("hide") && (a(".searchbar").removeClass("hide").addClass("show"), a(".searchbar #s").focus()), !1
        }), a("body").on("mousedown", a.proxy(function (b) {
            var c = a(b.target);
            c.is(".searchbar") || 0 !== c.parents(".searchbar").length || a(".searchbar").removeClass("show").addClass("hide")
        }, this)), a(document).on("mouseenter", ".noo-menu-item-cart", function () {
            clearTimeout(a(this).data("timeout")), a(".searchbar").removeClass("show").addClass("hide"), a(".noo-minicart").fadeIn(50)
        }), a(document).on("mouseleave", ".noo-menu-item-cart", function () {
            var b = setTimeout(function () {
                a(".noo-minicart").fadeOut(50)
            }, 400);
            a(this).data("timeout", b)
        }), a(".noo-user-navbar-collapse").on("show.bs.collapse", function () {
            a(".noo-navbar-collapse").hasClass("in") && a(".noo-navbar-collapse").collapse("hide")
        }), a(".noo-navbar-collapse").on("show.bs.collapse", function () {
            a(".noo-user-navbar-collapse").hasClass("in") && a(".noo-user-navbar-collapse").collapse("hide")
        })
    };
    a(document).ready(function () {
        d(), a('[data-toggle="tooltip"]').tooltip(), a(".button-social").click(function () {
            a(".content-share").addClass("active")
        }), a("body").on("mousedown", a.proxy(function (b) {
            var c = jQuery(b.target);
            c.is(".content-share") || 0 !== c.parents(".content-share").length || a(".content-share").removeClass("active"), c.is(".tooltip") || 0 !== c.parents(".tooltip").length || c.is('a[data-toggle="tooltip"].tooltip-share-icon') || 0 !== c.parents('a[data-toggle="tooltip"].tooltip-share-icon').length || a('[data-toggle="tooltip"]').tooltip("hide")
        }, this)), a(document).on("click", ".shop-loop-quickview", function (b) {
            var c = a(this);
            c.addClass("loading"), a.post(nooL10n.ajax_url, {
                action: "shop_quickview",
                product_id: a(this).data("product_id")
            }, function (b) {
                c.removeClass("loading");
                var d = a(b);
                a("body").append(d), d.modal("show"), d.on("hidden.bs.modal", function () {
                    d.remove()
                })
            }), b.preventDefault(), b.stopPropagation()
        })
    }), a(document).bind("noo-layout-changed", function () {
        d()
    })
}(jQuery);
jQuery(document).ready(function ($) {
    $('.author-connect .connect-button').on('click', function () {
        $(".author-connect .connect").toggleClass("active");
    });
    jQuery('body').on('mousedown', jQuery.proxy(function (e) {
        var element = jQuery(e.target);
        if (!element.is('.author-connect .connect') && element.parents('.author-connect .connect').length === 0) {
            jQuery('.author-connect .connect').removeClass('active');
        }
    }, this));
});

jQuery(document).ready(function ($) {
    $('audio').audioPlayer();
});

jQuery(document).ready(function ($) {
    $(function () {
        $('#example').datetimepicker({
            format: "dd MM yyyy - HH:ii P",
            showMeridian: true,
            autoclose: true,
            todayBtn: true
        });
    })
});
