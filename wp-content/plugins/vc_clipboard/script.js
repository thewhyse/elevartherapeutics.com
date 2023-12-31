"use strict";

window.vc_clipboard_fe = false;

(function (m) {
    m(document).on("mouseover", "#visual_composer_content, #wpbakery_content", function () {
        m(".wpb_vc_section > div.controls_row").on("mouseenter", function (c) {
            if (m(this).find(".vc_clipboard").length == 0) {
                window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
                if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
                var t = '<div class="vc_clipboard" style="font-size:13px !important;"><span class="vc_clipboard_copy" title="' + window.vc_clipboard_text.copy_this_section + '">' + window.vc_clipboard_text.copy + '</span> | <span class="vc_clipboard_copy_plus" title="' + window.vc_clipboard_text.copy_to_clipboard_stack + '">' + window.vc_clipboard_text.copy_plus + "</span> | ";
                if (!localStorage.getItem("vcc_prefs_cut") || localStorage.getItem("vcc_prefs_cut") == 0) {
                    t += '<span class="vc_clipboard_cut" title="' + window.vc_clipboard_text.cut_this_section + '">' + window.vc_clipboard_text.cut + '</span> | <span class="vc_clipboard_cut_plus" title="' + window.vc_clipboard_text.move_to_clipboard_stack + '">' + window.vc_clipboard_text.cut_plus + "</span> | ";
                }
                t += '<span class="vc_clipboard_paste" title="' + window.vc_clipboard_text.paste_inside_after_this_section + '">' + window.vc_clipboard_text.paste + "</span></div>";
                m(this).append(t);
                var e = m(this).height();
                if (e > 22) {
                    m("div.vc_clipboard").css("line-height", e + "px");
                }
            }
        });
        m(".wpb_vc_section > div.controls_row").on("mouseleave", function () {
            m(this).find(".vc_clipboard").remove();
        });
        m("div.controls_row").on("mouseenter", function (c) {
            if (m(this).find(".vc_clipboard").length == 0) {
                window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
                if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
                var t = '<div class="vc_clipboard" style="font-size:13px !important;"><span class="vc_clipboard_copy" title="' + window.vc_clipboard_text.copy_this_row + '">' + window.vc_clipboard_text.copy + '</span> | <span class="vc_clipboard_copy_plus" title="' + window.vc_clipboard_text.copy_to_clipboard_stack + '">' + window.vc_clipboard_text.copy_plus + "</span> | ";
                if (!localStorage.getItem("vcc_prefs_cut") || localStorage.getItem("vcc_prefs_cut") == 0) {
                    t += '<span class="vc_clipboard_cut" title="' + window.vc_clipboard_text.cut_this_row + '">' + window.vc_clipboard_text.cut + '</span> | <span class="vc_clipboard_cut_plus" title="' + window.vc_clipboard_text.move_to_clipboard_stack + '">' + window.vc_clipboard_text.cut_plus + "</span> | ";
                }
                t += '<span class="vc_clipboard_paste" title="' + window.vc_clipboard_text.paste_after_this_row + '">' + window.vc_clipboard_text.paste + "</span></div>";
                m(this).append(t);
                var e = m(this).height();
                if (e > 22) {
                    m("div.vc_clipboard").css("line-height", e + "px");
                }
            }
        });
        m("div.controls_row").on("mouseleave", function () {
            m(this).find(".vc_clipboard").remove();
        });
        m(".wpb_vc_column > .controls:first-child, .wpb_vc_column > .vc_controls:first-child, .wpb_vc_column_inner > .controls:first-child, .wpb_vc_column_inner > .vc_controls:first-child").on("mouseenter", function () {
            if (m(this).find(".vc_clipboard_col").length == 0) {
                window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
                if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
                var c = '<span class="vc_clipboard_col"><span class="vc_clipboard_copy" title="' + window.vc_clipboard_text.copy_content_this_column + '">' + window.vc_clipboard_text.copy + "</span> | ";
                if (!localStorage.getItem("vcc_prefs_cut") || localStorage.getItem("vcc_prefs_cut") == 0) {
                    c += '<span class="vc_clipboard_cut" title="' + window.vc_clipboard_text.cut_content_this_column + '">' + window.vc_clipboard_text.cut + "</span> | ";
                }
                c += '<span class="vc_clipboard_paste" title="' + window.vc_clipboard_text.paste_inside_this_column + '">' + window.vc_clipboard_text.paste + "</span></span>";
                m(this).append(c);
            }
        });
        m(".wpb_vc_column .controls, .wpb_vc_column .vc_controls, .wpb_vc_column_inner .controls, .wpb_vc_column_inner .vc_controls").on("mouseleave", function () {
            m(this).find(".vc_clipboard_col").remove();
        });
        m("#visual_composer_content, #wpbakery_content").on("mouseenter", ".vc_controls", function () {
            if (!m(this).hasClass("vc_controls-row") && !m(this).hasClass("vc_control-column")) {
                c(m(this).find("div").first());
            }
        });
        m("#visual_composer_content, #wpbakery_content").on("mouseenter", ".wpb_vc_column", function () {
            m(this).find(".vc_controls").each(function () {
                if (!m(this).hasClass("vc_controls-row") && !m(this).hasClass("vc_control-column")) {
                    c(m(this).find("div").first());
                }
            });
        });
        m("#visual_composer_content, #wpbakery_content").on("mouseleave", ".wpb_vc_column", function () {
            m(this).find(".vc_clipboard_element_root").remove();
        });
    });
    var c = function (c) {
        var t = m(c).closest("div[data-element_type]").attr("data-element_type");
        if (m(c).find(".vc_clipboard_copy").length == 0 && m(c).closest("div[data-element_type]").attr("data-model-id") != undefined && t != "vc_tta_section" && t != "vc_tab") {
            window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
            if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
            var e = '<span class="vc_element-name vc_clipboard_element_root"><span class="vc_btn-content vc_clipboard_element"><span class="vc_clipboard_copy" title="' + window.vc_clipboard_text.copy_this_element + '">' + window.vc_clipboard_text.copy_s + '</span> | <span class="vc_clipboard_copy_plus" title="' + window.vc_clipboard_text.copy_to_clipboard_stack + '">' + window.vc_clipboard_text.copy_plus_s + "</span> | ";
            if (!localStorage.getItem("vcc_prefs_cut") || localStorage.getItem("vcc_prefs_cut") == 0) {
                e += '<span class="vc_clipboard_cut" title="' + window.vc_clipboard_text.cut_this_element + '">' + window.vc_clipboard_text.cut_s + '</span> | <span class="vc_clipboard_cut_plus" title="' + window.vc_clipboard_text.move_to_clipboard_stack + '">' + window.vc_clipboard_text.cut_plus_s + "</span> | ";
            }
            e += '<span class="vc_clipboard_paste" title="' + window.vc_clipboard_text.paste_after_this_element + '">' + window.vc_clipboard_text.paste_s + "</span></span></span>";
            m(c).append(e);
        } else if (m(c).find(".vc_clipboard_copy").length == 0 && m(c).closest("div[data-element_type]").attr("data-model-id") != undefined && (t == "vc_tta_section" || t == "vc_tab")) {
            window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
            if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
            var e = '<span class="vc_element-name vc_clipboard_element_root"><span class="vc_btn-content vc_clipboard_element"><span class="vc_clipboard_copy" title="' + window.vc_clipboard_text.copy_content_this_section + '">' + window.vc_clipboard_text.copy_s + "</span> | ";
            if (!localStorage.getItem("vcc_prefs_cut") || localStorage.getItem("vcc_prefs_cut") == 0) {
                e += '<span class="vc_clipboard_cut" title="' + window.vc_clipboard_text.cut_content_this_section + '">' + window.vc_clipboard_text.cut_s + "</span> | ";
            }
            e += '<span class="vc_clipboard_paste" title="' + window.vc_clipboard_text.paste_inside_this_section + '">' + window.vc_clipboard_text.paste_s + "</span></span></span>";
            m(c).append(e);
        }
    };
    var t = function (c, t) {
        if (t === undefined) {
            t = m(c).closest("div[data-tag]").attr("data-tag");
        }
        if (m(c).find(".vc_clipboard_copy").length == 0 && t != "vc_tta_section" && t != "vc_tab" && t != "vc_column" && t != "vc_column_inner") {
            var e = window.vc_clipboard_text.copy_this_element;
            var o = window.vc_clipboard_text.copy_to_clipboard_stack;
            var i = window.vc_clipboard_text.cut_this_element;
            var _ = window.vc_clipboard_text.move_to_clipboard_stack;
            var a = window.vc_clipboard_text.paste_after_this_element;
            if (t == "vc_section") {
                e = window.vc_clipboard_text.copy_this_section;
                i = window.vc_clipboard_text.cut_this_section;
                a = window.vc_clipboard_text.paste_inside_after_this_section;
            } else if (t == "vc_row") {
                e = window.vc_clipboard_text.copy_this_row;
                i = window.vc_clipboard_text.cut_this_row;
                a = window.vc_clipboard_text.paste_after_this_row;
            }
            window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
            if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
            var l = '<span class="vc_element-name vc_clipboard_element_root"><span class="vc_btn-content vc_clipboard_element"><span class="vc_clipboard_copy" title="' + e + '">' + window.vc_clipboard_text.copy_s + '</span> | <span class="vc_clipboard_copy_plus" title="' + o + '">' + window.vc_clipboard_text.copy_plus_s + "</span> | ";
            if (!localStorage.getItem("vcc_prefs_cut") || localStorage.getItem("vcc_prefs_cut") == 0) {
                l += '<span class="vc_clipboard_cut" title="' + i + '">' + window.vc_clipboard_text.cut_s + '</span> | <span class="vc_clipboard_cut_plus" title="' + _ + '">' + window.vc_clipboard_text.cut_plus_s + "</span> | ";
            }
            l += '<span class="vc_clipboard_paste" title="' + a + '">' + window.vc_clipboard_text.paste_s + "</span></span></span>";
            m(c).append(l);
        } else if (m(c).find(".vc_clipboard_copy").length == 0 && (t == "vc_tta_section" || t == "vc_tab" || t == "vc_column" || t == "vc_column_inner")) {
            var e = window.vc_clipboard_text.copy_content_this_section;
            var i = window.vc_clipboard_text.cut_content_this_section;
            var a = window.vc_clipboard_text.paste_inside_this_section;
            if (t == "vc_column" || t == "vc_column_inner") {
                e = window.vc_clipboard_text.copy_content_this_column;
                i = window.vc_clipboard_text.cut_content_this_column;
                a = window.vc_clipboard_text.paste_inside_this_column;
            }
            window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
            if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
            var l = '<span class="vc_element-name vc_clipboard_element_root"><span class="vc_btn-content vc_clipboard_element"><span class="vc_clipboard_copy" title="' + e + '">' + window.vc_clipboard_text.copy_s + "</span> | ";
            if (!localStorage.getItem("vcc_prefs_cut") || localStorage.getItem("vcc_prefs_cut") == 0) {
                l += '<span class="vc_clipboard_cut" title="' + i + '">' + window.vc_clipboard_text.cut_s + "</span> | ";
            }
            l += '<span class="vc_clipboard_paste" title="' + a + '">' + window.vc_clipboard_text.paste_s + "</span></span></span>";
            m(c).append(l);
        }
    };
    m(document).ready(function () {
        e();
        setTimeout(function () {
            if (m("#vc_clipboard_toolbar_paste").length == 0) {
                r();
            }
        }, 200);
    });
    m(window).on("load", function () {
        setTimeout(function () {
            if (m("#vc_clipboard_toolbar_paste").length == 0) {
                r();
            }
        }, 200);
    });
    m(window).on("focus", function () {
        window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
        if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
        m(".vc_clipboard_number_reset_top").html(window.vc_clipboard_cb_count);
    });
    var e = function () {
        m("#post-body").on("click", ".vc_clipboard_copy", function () {
            var c = m(this).closest("div[data-element_type]").attr("data-model-id");
            var t = window.vc.shortcodes.get(c);
            var e = t.get("shortcode");
            o(c, t, e);
        });
        m("#post-body").on("click", ".vc_clipboard_cut", function () {
            var c = m(this).closest("div[data-element_type]").attr("data-model-id");
            var t = window.vc.shortcodes.get(c);
            var e = t.get("shortcode");
            i(c, t, e);
        });
        m("#post-body").on("click", ".vc_clipboard_copy_plus", function () {
            a(m(this));
        });
        m("#post-body").on("click", ".vc_clipboard_cut_plus", function () {
            l(m(this));
        });
        m("#post-body").on("click", ".vc_clipboard_paste", function () {
            u(this);
        });
    };
    var o = function (c, t, e) {
        window.vc_clipboard_elements = [];
        _.each(window.vc.shortcodes.where({
            parent_id: t.id
        }), function (c) {
            w(c, 0);
        });
        if ((e == "vc_column" || e == "vc_column_inner") && window.vc_clipboard_elements.length == 0) {
            alert(window.vc_clipboard_text.column_empty);
            return;
        } else if (e == "vc_tta_section" && window.vc_clipboard_elements.length == 0) {
            alert(window.vc_clipboard_text.section_empty);
            return;
        } else if (e == "vc_tab" && window.vc_clipboard_elements.length == 0) {
            alert(window.vc_clipboard_text.tab_empty);
            return;
        }
        b();
        if (e == "vc_column" || e == "vc_column_inner" || e == "vc_tta_section" || e == "vc_tab") {
            var o = [];
            _.each(window.vc.shortcodes.where({
                parent_id: t.id
            }), function (c) {
                o.push(c);
            });
            o.sort(function (c, t) {
                return c.attributes.order - t.attributes.order;
            });
            o.forEach(function (c) {
                if (window.vc_clipboard_fe) {
                    var t = m("#vc_inline-frame");
                    var e = t.contents().find("[data-model-id=" + c.attributes.id + "]");
                } else {
                    var e = m("[data-model-id=" + c.attributes.id + "]");
                }
                a(e);
            });
        } else {
            localStorage.setItem("vcc_element_sc1", e);
            localStorage.setItem("vcc_element_params1", JSON.stringify(t.get("params")));
            localStorage.setItem("vcc_elements1", JSON.stringify(window.vc_clipboard_elements));
            localStorage.setItem("vcc_cb_count", "1");
            m(".vc_clipboard_number_reset_top").html("1");
            window.vc_clipboard_cb_count = 1;
        }
    };
    var i = function (c, t, e) {
        window.vc_clipboard_elements = [];
        _.each(window.vc.shortcodes.where({
            parent_id: t.id
        }), function (c) {
            w(c, 0);
        });
        if ((e == "vc_column" || e == "vc_column_inner") && window.vc_clipboard_elements.length == 0) {
            alert(window.vc_clipboard_text.column_empty);
            return;
        } else if (e == "vc_tta_section" && window.vc_clipboard_elements.length == 0) {
            alert(window.vc_clipboard_text.section_empty);
            return;
        } else if (e == "vc_tab" && window.vc_clipboard_elements.length == 0) {
            alert(window.vc_clipboard_text.tab_empty);
            return;
        }
        b();
        if (e == "vc_column" || e == "vc_column_inner" || e == "vc_tta_section" || e == "vc_tab") {
            var o = [];
            _.each(window.vc.shortcodes.where({
                parent_id: t.id
            }), function (c) {
                o.push(c);
            });
            o.sort(function (c, t) {
                return c.attributes.order - t.attributes.order;
            });
            o.forEach(function (c) {
                if (window.vc_clipboard_fe) {
                    var t = m("#vc_inline-frame");
                    var e = t.contents().find("[data-model-id=" + c.attributes.id + "]");
                } else {
                    var e = m("[data-model-id=" + c.attributes.id + "]");
                }
                l(e);
            });
        } else {
            localStorage.setItem("vcc_element_sc1", e);
            localStorage.setItem("vcc_element_params1", JSON.stringify(t.get("params")));
            localStorage.setItem("vcc_elements1", JSON.stringify(window.vc_clipboard_elements));
            localStorage.setItem("vcc_cb_count", "1");
            m(".vc_clipboard_number_reset_top").html("1");
            window.vc_clipboard_cb_count = 1;
            if (e != "vc_column" && e != "vc_column_inner" && e != "vc_tta_section" && e != "vc_tab") {
                t.destroy();
            }
        }
    };
    var a = function (c) {
        var t = parseInt(window.vc_clipboard_cb_count);
        var e = t + 1;
        if (window.vc_clipboard_fe) {
            if (c.closest(".parent-vc_row").length == 1) {
                var o = c.closest('div[data-tag="vc_row"]').attr("data-model-id");
            } else if (c.closest(".parent-vc_tta_tabs").length == 1) {
                var o = c.closest('div[data-tag="vc_tta_tabs"]').attr("data-model-id");
            } else if (c.closest(".parent-vc_tta_accordion").length == 1) {
                var o = c.closest('div[data-tag="vc_tta_accordion"]').attr("data-model-id");
            } else {
                var o = c.closest("div[data-tag]").attr("data-model-id");
            }
        } else {
            if (c.closest(".parent-vc_row").length == 1) {
                var o = c.closest('div[data-element_type="vc_row"]').attr("data-model-id");
            } else {
                var o = c.closest("div[data-element_type]").attr("data-model-id");
            }
        }
        var i = window.vc.shortcodes.get(o);
        var a = i.get("shortcode");
        var l = localStorage.getItem("vcc_element_sc" + t);
        if (l !== null) {
            if ((a == "vc_section" || a == "vc_row") && l != "vc_section" && l != "vc_row" || a != "vc_section" && a != "vc_row" && (l == "vc_section" || l == "vc_row")) {
                alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_mix + a + window.vc_clipboard_text.with_text + l + window.vc_clipboard_text.exclamation_mark_end);
                return;
            }
        }
        window.vc_clipboard_elements = [];
        localStorage.setItem("vcc_element_sc" + e, a);
        localStorage.setItem("vcc_element_params" + e, JSON.stringify(i.get("params")));
        _.each(window.vc.shortcodes.where({
            parent_id: i.id
        }), function (c) {
            w(c, 0);
        });
        localStorage.setItem("vcc_elements" + e, JSON.stringify(window.vc_clipboard_elements));
        window.vc_clipboard_cb_count++;
        localStorage.setItem("vcc_cb_count", "" + window.vc_clipboard_cb_count);
        m(".vc_clipboard_number_reset_top").html(window.vc_clipboard_cb_count);
    };
    var l = function (c) {
        var t = parseInt(window.vc_clipboard_cb_count);
        var e = t + 1;
        if (window.vc_clipboard_fe) {
            if (c.closest(".parent-vc_row").length == 1) {
                var o = c.closest('div[data-tag="vc_row"]').attr("data-model-id");
            } else if (c.closest(".parent-vc_tta_tabs").length == 1) {
                var o = c.closest('div[data-tag="vc_tta_tabs"]').attr("data-model-id");
            } else if (c.closest(".parent-vc_tta_accordion").length == 1) {
                var o = c.closest('div[data-tag="vc_tta_accordion"]').attr("data-model-id");
            } else {
                var o = c.closest("div[data-tag]").attr("data-model-id");
            }
        } else {
            if (c.closest(".parent-vc_row").length == 1) {
                var o = c.closest('div[data-element_type="vc_row"]').attr("data-model-id");
            } else {
                var o = c.closest("div[data-element_type]").attr("data-model-id");
            }
        }
        var i = window.vc.shortcodes.get(o);
        var a = i.get("shortcode");
        var l = localStorage.getItem("vcc_element_sc" + t);
        if (l !== null) {
            if ((a == "vc_section" || a == "vc_row") && l != "vc_section" && l != "vc_row" || a != "vc_section" && a != "vc_row" && (l == "vc_section" || l == "vc_row")) {
                alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_mix + a + window.vc_clipboard_text.with_text + l + window.vc_clipboard_text.exclamation_mark_end);
                return;
            }
        }
        window.vc_clipboard_elements = [];
        localStorage.setItem("vcc_element_sc" + e, a);
        localStorage.setItem("vcc_element_params" + e, JSON.stringify(i.get("params")));
        _.each(window.vc.shortcodes.where({
            parent_id: i.id
        }), function (c) {
            w(c, 0);
        });
        localStorage.setItem("vcc_elements" + e, JSON.stringify(window.vc_clipboard_elements));
        window.vc_clipboard_cb_count++;
        localStorage.setItem("vcc_cb_count", "" + window.vc_clipboard_cb_count);
        m(".vc_clipboard_number_reset_top").html(window.vc_clipboard_cb_count);
        i.destroy();
    };
    var n = function () {
        if (window.vc_clipboard_sub_paste_finished && window.vc_clipboard_current_count >= window.vc_clipboard_cb_count && !m(".vc_navbar-brand").hasClass("vc_ui-wp-spinner")) {
            m(".vc_clipboard_message").fadeOut(300, function () {
                m(this).remove();
            });
            return;
        }
        setTimeout(function () {
            n();
        }, 100);
    };
    var r = function () {
        if (m(".composer-switch").length == 0 && m("#wpb_visual_composer").length > 0 && m("#wpb_visual_composer").is(":visible")) {
            m("#titlediv").after('<div class="composer-switch"></div>');
        }
        window.vc_clipboard_cb_count = localStorage.getItem("vcc_cb_count");
        if (window.vc_clipboard_cb_count === null) window.vc_clipboard_cb_count = 0;
        var c = '<li id="vc_clipboard_toolbar_paste"><a href="#" class="vc_clipboard_copy_all" title="' + window.vc_clipboard_text.copy_all + '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"/></svg></a><a href="#" class="vc_clipboard_number_reset_top" title="' + window.vc_clipboard_text.click_to_clear_clipboard + '">' + window.vc_clipboard_cb_count + '</a><a href="#" class="vc_clipboard_paste_top" title="' + window.vc_clipboard_text.paste + '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M128 184c0-30.879 25.122-56 56-56h136V56c0-13.255-10.745-24-24-24h-80.61C204.306 12.89 183.637 0 160 0s-44.306 12.89-55.39 32H24C10.745 32 0 42.745 0 56v336c0 13.255 10.745 24 24 24h104V184zm32-144c13.255 0 24 10.745 24 24s-10.745 24-24 24-24-10.745-24-24 10.745-24 24-24zm184 248h104v200c0 13.255-10.745 24-24 24H184c-13.255 0-24-10.745-24-24V184c0-13.255 10.745-24 24-24h136v104c0 13.2 10.8 24 24 24zm104-38.059V256h-96v-96h6.059a24 24 0 0 1 16.97 7.029l65.941 65.941a24.002 24.002 0 0 1 7.03 16.971z"/></svg></a></li>';
        m(".vc_navbar-nav").append(c);
        m(".vc_clipboard_copy_all").on("click", function (c) {
            c.preventDefault();
            b();
            if (window.vc_clipboard_fe) {
                var t = m("#vc_inline-frame");
                if (t.contents().find(".vc-main-sortable-container > .vc_element").length > 0) {
                    t.contents().find(".vc-main-sortable-container > .vc_element").each(function () {
                        a(m(this));
                    });
                } else if (t.contents().find(".vc-main-sortable-container > section > .vc_element").length > 0) {
                    t.contents().find(".vc-main-sortable-container > section > .vc_element").each(function () {
                        a(m(this));
                    });
                }
            } else {
                m("#visual_composer_content > div").each(function () {
                    a(m(this));
                });
                m("#wpbakery_content > div").each(function () {
                    a(m(this));
                });
            }
        });
        m(".vc_clipboard_paste_top").on("click", function (c) {
            c.preventDefault();
            var e = -1;
            if (f(null)) {
                window.vc_clipboard_current_count = 0;
                if (window.vc_clipboard_fe) {
                    if (m(".vc_clipboard_message").length == 0) {
                        m(".vc_message").remove();
                        m("body").prepend('<div class="vc_message success vc_clipboard_message" style="z-index: 999; display: block;">' + window.vc_clipboard_text.pasting + "</div>");
                    }
                    var t = function () {
                        if (window.vc_clipboard_current_count >= window.vc_clipboard_cb_count) {
                            return;
                        }
                        setTimeout(function () {
                            t();
                        }, 50);
                        if ((window.vc_clipboard_builder === undefined || window.vc_clipboard_builder.is_build_complete === true) && (window.vc_clipboard_sub_paste_finished === undefined || window.vc_clipboard_sub_paste_finished === true)) {
                            e = h(null, window.vc_clipboard_current_count + 1, e);
                        }
                    };
                    t();
                    n();
                } else {
                    m("#vc_clipboard_paste_indicator").show();
                    setTimeout(function () {
                        var c;
                        for (var t = 1; t <= window.vc_clipboard_cb_count; t++) {
                            c = JSON.parse(localStorage.getItem("vcc_elements" + t));
                        }
                        for (var t = 1; t <= window.vc_clipboard_cb_count; t++) {
                            e = h(null, t, e);
                        }
                        m("#vc_clipboard_paste_indicator").hide();
                    }, 100);
                }
            }
        });
        m(".vc_clipboard_number_reset_top").on("click", function (c) {
            c.preventDefault();
            p();
        });
        if (!m(".composer-switch").length || m(".composer-switch").closest(".block-editor").length) {
            return;
        }
        if (window.vc_clipboard_license_key) {
            var t = '<div class="vc_clipboard_activate_dialog vc_clipboard_dialog"><div>' + window.vc_clipboard_text.license_text + '<a href="//codecanyon.net/item/visual-composer-clipboard/8897711" class="vc_clipboard_obtain" target="_blank">' + window.vc_clipboard_text.license_text1 + "</a>" + window.vc_clipboard_text.license_text2 + "</div>" + window.vc_clipboard_text.purchase_code + '<br><input type="text" id="vc_clipboard_license_key" disabled><br>' + window.vc_clipboard_text.email + '<br><input type="email" id="vc_clipboard_email" name="email" autocomplete="email" disabled><br><span class="vc_clipboard_dialog_buttons"><a href="#" class="vc_clipboard_gc_settings_deactivate" title="' + window.vc_clipboard_text.deactivate + '">' + window.vc_clipboard_text.deactivate + '</a> <a href="#" class="vc_clipboard_gc_settings_cancel" title="' + window.vc_clipboard_text.cancel + '">' + window.vc_clipboard_text.cancel + '</a><img class="vc_clipboard_loader" src="' + window.vc_clipboard_plugins_url + '/vc_clipboard/ajax-loader.gif"></span></div></span> ';
        } else {
            var t = '<div class="vc_clipboard_activate_dialog vc_clipboard_dialog"><div>' + window.vc_clipboard_text.license_text + "</div>" + window.vc_clipboard_text.purchase_code + '<br><input type="text" id="vc_clipboard_license_key"><br>' + window.vc_clipboard_text.email + '<br><input type="email" id="vc_clipboard_email" name="email" autocomplete="email"><br><span class="vc_clipboard_dialog_buttons"><a href="#" class="vc_clipboard_gc_settings_submit" title="' + window.vc_clipboard_text.submit + '">' + window.vc_clipboard_text.submit + '</a> <a href="#" class="vc_clipboard_gc_settings_cancel" title="' + window.vc_clipboard_text.cancel + '">' + window.vc_clipboard_text.cancel + '</a><img class="vc_clipboard_loader" src="' + window.vc_clipboard_plugins_url + '/vc_clipboard/ajax-loader.gif"></span></div></span> ';
        }
        var e = '<span id="vc_clipboard_toolbar"> <span id="vc_clipboard_toolbar_impex"><a href="#" class="vc_clipboard_export" title="' + window.vc_clipboard_text.exp + '">' + window.vc_clipboard_text.exp + '</a> <input type="text" class="vc_clipboard_input"> <a href="#" class="vc_clipboard_import" title="' + window.vc_clipboard_text.imp + '">' + window.vc_clipboard_text.imp + "</a></span> " + '<span id="vc_clipboard_toolbar_gc_load" class="vc_clipboard_container"><a href="#" class="vc_clipboard_gc_load" title="' + window.vc_clipboard_text.load_from_google_cloud + '">' + window.vc_clipboard_text.gc_load + "</a>" + '<div class="vc_clipboard_load_dialog vc_clipboard_dialog"><div class="vc_clipboard_list"></div>' + '<img class="vc_clipboard_loader" src="' + window.vc_clipboard_plugins_url + '/vc_clipboard/ajax-loader.gif"></span></div></span> ' + '<span id="vc_clipboard_toolbar_gc_save" class="vc_clipboard_container"><a href="#" class="vc_clipboard_gc_save" title="' + window.vc_clipboard_text.save_to_google_cloud + '">' + window.vc_clipboard_text.gc_save + "</a>" + '<div class="vc_clipboard_save_dialog vc_clipboard_dialog">' + window.vc_clipboard_text.name + '<br><input type="text" id="vc_clipboard_name"><br><span class="vc_clipboard_dialog_buttons"><a href="#" class="vc_clipboard_save_submit" title="' + window.vc_clipboard_text.submit + '">' + window.vc_clipboard_text.submit + '</a> <a href="#" class="vc_clipboard_save_cancel" title="' + window.vc_clipboard_text.cancel + '">' + window.vc_clipboard_text.cancel + '</a><img class="vc_clipboard_loader" src="' + window.vc_clipboard_plugins_url + '/vc_clipboard/ajax-loader.gif"></span></div></span> ';
        if (window.vc_clipboard_current_user_can_install_plugins) e += '<span id="vc_clipboard_toolbar_license" class="vc_clipboard_container"><a href="#" class="vc_clipboard_gc_settings" title="' + window.vc_clipboard_text.activate_product_license + '">' + window.vc_clipboard_text.license + "</a>" + t;
        e += '<span class="vc_clipboard_container"><a href="#" class="vc_clipboard_prefs" title="' + window.vc_clipboard_text.preferences + '">' + window.vc_clipboard_text.prefs + "</a>" + '<div class="vc_clipboard_prefs_dialog vc_clipboard_dialog"><input id="vc_clipboard_prefs_short" type="checkbox"><label for="vc_clipboard_prefs_short">' + window.vc_clipboard_text.short_commands + '</label><br><input id="vc_clipboard_prefs_toolbar" type="checkbox"><label for="vc_clipboard_prefs_toolbar">' + window.vc_clipboard_text.toolbar_initially_closed + '</label><br><input id="vc_clipboard_prefs_cut" type="checkbox"><label for="vc_clipboard_prefs_cut">' + window.vc_clipboard_text.hide_cut_buttons + '</label><br><input id="vc_clipboard_prefs_paste" type="checkbox"><label for="vc_clipboard_prefs_paste">' + window.vc_clipboard_text.hide_paste_button + '</label><br><input id="vc_clipboard_prefs_impex" type="checkbox"><label for="vc_clipboard_prefs_impex">' + window.vc_clipboard_text.hide_export_import + '</label><br><input id="vc_clipboard_prefs_gc" type="checkbox"><label for="vc_clipboard_prefs_gc">' + window.vc_clipboard_text.hide_gc_buttons + "</label>";
        if (window.vc_clipboard_current_user_can_install_plugins) e += '<br><input id="vc_clipboard_prefs_license" type="checkbox"><label for="vc_clipboard_prefs_license">' + window.vc_clipboard_text.hide_license_button + "</label>";
        e += "</div></span>" + '</span><span class="vc_clipboard_oc_button o"></span><div id="vc_clipboard_paste_indicator">' + window.vc_clipboard_text.pasting + "</span></div>";
        m(".composer-switch").append(e);
        if (localStorage.getItem("vcc_prefs_short") == "1" && m("#vc_clipboard_prefs_short").length > 0) {
            m("#vc_clipboard_prefs_short")[0].checked = true;
            window.vc_clipboard_text.copy = window.vc_clipboard_text.copy_s;
            window.vc_clipboard_text.copy_plus = window.vc_clipboard_text.copy_plus_s;
            window.vc_clipboard_text.cut = window.vc_clipboard_text.cut_s;
            window.vc_clipboard_text.cut_plus = window.vc_clipboard_text.cut_plus_s;
            window.vc_clipboard_text.paste = window.vc_clipboard_text.paste_s;
        }
        if (localStorage.getItem("vcc_prefs_toolbar") == "1" && m("#vc_clipboard_prefs_toolbar").length > 0) {
            m("#vc_clipboard_prefs_toolbar")[0].checked = true;
            m(".vc_clipboard_oc_button").removeClass("o");
            m(".vc_clipboard_oc_button").addClass("c");
            m("#vc_clipboard_toolbar").hide();
        }
        if (localStorage.getItem("vcc_prefs_cut") == "1" && m("#vc_clipboard_prefs_cut").length > 0) {
            m("#vc_clipboard_prefs_cut")[0].checked = true;
        }
        if (localStorage.getItem("vcc_prefs_paste") == "1" && m("#vc_clipboard_prefs_paste").length > 0) {
            m("#vc_clipboard_prefs_paste")[0].checked = true;
            m("#vc_clipboard_toolbar_paste").hide();
        }
        if (localStorage.getItem("vcc_prefs_impex") == "1" && m("#vc_clipboard_prefs_impex").length > 0) {
            m("#vc_clipboard_prefs_impex")[0].checked = true;
            m("#vc_clipboard_toolbar_impex").hide();
        }
        if (localStorage.getItem("vcc_prefs_gc") == "1" && m("#vc_clipboard_prefs_gc").length > 0) {
            m("#vc_clipboard_prefs_gc")[0].checked = true;
            m("#vc_clipboard_toolbar_gc_load").hide();
            m("#vc_clipboard_toolbar_gc_save").hide();
        }
        if (localStorage.getItem("vcc_prefs_license") == "1" && m("#vc_clipboard_prefs_license").length > 0) {
            m("#vc_clipboard_prefs_license")[0].checked = true;
            m("#vc_clipboard_toolbar_license").hide();
        }
        m("#vc_clipboard_prefs_short").on("change", function (c) {
            if (this.checked) {
                localStorage.setItem("vcc_prefs_short", "1");
                window.vc_clipboard_text.copy = window.vc_clipboard_text.copy_s;
                window.vc_clipboard_text.copy_plus = window.vc_clipboard_text.copy_plus_s;
                window.vc_clipboard_text.cut = window.vc_clipboard_text.cut_s;
                window.vc_clipboard_text.cut_plus = window.vc_clipboard_text.cut_plus_s;
                window.vc_clipboard_text.paste = window.vc_clipboard_text.paste_s;
            } else {
                localStorage.setItem("vcc_prefs_short", "0");
                window.vc_clipboard_text.copy = window.vc_clipboard_text.copy_l;
                window.vc_clipboard_text.copy_plus = window.vc_clipboard_text.copy_plus_l;
                window.vc_clipboard_text.cut = window.vc_clipboard_text.cut_l;
                window.vc_clipboard_text.cut_plus = window.vc_clipboard_text.cut_plus_l;
                window.vc_clipboard_text.paste = window.vc_clipboard_text.paste_l;
            }
        });
        m("#vc_clipboard_prefs_toolbar").on("change", function (c) {
            if (this.checked) {
                localStorage.setItem("vcc_prefs_toolbar", "1");
            } else {
                localStorage.setItem("vcc_prefs_toolbar", "0");
            }
        });
        m("#vc_clipboard_prefs_cut").on("change", function (c) {
            if (this.checked) {
                localStorage.setItem("vcc_prefs_cut", "1");
            } else {
                localStorage.setItem("vcc_prefs_cut", "0");
            }
        });
        m("#vc_clipboard_prefs_paste").on("change", function (c) {
            if (this.checked) {
                localStorage.setItem("vcc_prefs_paste", "1");
                m("#vc_clipboard_toolbar_paste").hide();
            } else {
                localStorage.setItem("vcc_prefs_paste", "0");
                m("#vc_clipboard_toolbar_paste").show();
            }
        });
        m("#vc_clipboard_prefs_impex").on("change", function (c) {
            if (this.checked) {
                localStorage.setItem("vcc_prefs_impex", "1");
                m("#vc_clipboard_toolbar_impex").hide();
            } else {
                localStorage.setItem("vcc_prefs_impex", "0");
                m("#vc_clipboard_toolbar_impex").show();
            }
        });
        m("#vc_clipboard_prefs_gc").on("change", function (c) {
            if (this.checked) {
                localStorage.setItem("vcc_prefs_gc", "1");
                m("#vc_clipboard_toolbar_gc_load").hide();
                m("#vc_clipboard_toolbar_gc_save").hide();
            } else {
                localStorage.setItem("vcc_prefs_gc", "0");
                m("#vc_clipboard_toolbar_gc_load").show();
                m("#vc_clipboard_toolbar_gc_save").show();
            }
        });
        m("#vc_clipboard_prefs_license").on("change", function (c) {
            if (this.checked) {
                localStorage.setItem("vcc_prefs_license", "1");
                m("#vc_clipboard_toolbar_license").hide();
            } else {
                localStorage.setItem("vcc_prefs_license", "0");
                m("#vc_clipboard_toolbar_license").show();
            }
        });
        m(".vc_clipboard_oc_button").on("click", function (c) {
            if (m(this).hasClass("o")) {
                m(this).removeClass("o");
                m(this).addClass("c");
                m("#vc_clipboard_toolbar").hide();
            } else {
                m(this).removeClass("c");
                m(this).addClass("o");
                m("#vc_clipboard_toolbar").show();
            }
        });
        m(".vc_clipboard_input, #vc_clipboard_name, #vc_clipboard_username, #vc_clipboard_api_key, #vc_clipboard_license_key").keypress(function (c) {
            if (c && c.which === m.ui.keyCode.ENTER) {
                c.preventDefault();
            }
        });
        m(".vc_clipboard_import").on("click", function (c) {
            c.preventDefault();
            if (m(".vc_clipboard_input").val()) {
                v(m(".vc_clipboard_input").val());
            }
        });
        m(".vc_clipboard_export").on("click", function (c) {
            c.preventDefault();
            if (window.vc_clipboard_cb_count > 0) {
                var t = "[";
                for (var e = 1; e <= window.vc_clipboard_cb_count; e++) {
                    t += '{"vcc_element_sc":"' + window.btoa(encodeURIComponent(localStorage.getItem("vcc_element_sc" + e))) + '",';
                    t += '"vcc_element_params":"' + window.btoa(encodeURIComponent(localStorage.getItem("vcc_element_params" + e))) + '",';
                    t += '"vcc_elements":"' + window.btoa(encodeURIComponent(localStorage.getItem("vcc_elements" + e))) + '"},';
                }
                t = t.substring(0, t.length - 1);
                t += "]";
                m(".vc_clipboard_input").val(window.btoa(encodeURIComponent(t)));
                m(".vc_clipboard_input").select();
            }
        });
        m(".vc_clipboard_gc_load").on("click", function (c) {
            c.preventDefault();
            if (m(".vc_clipboard_load_dialog").css("visibility") == "visible") {
                m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                return false;
            }
            var t = window.vc_clipboard_license_key;
            if (t !== false) {
                m(".vc_clipboard_dialog").css("visibility", "hidden");
                m(".vc_clipboard_load_dialog").css("visibility", "visible");
                m(".vc_clipboard_load_dialog .vc_clipboard_list").html("");
                m(".vc_clipboard_load_dialog .vc_clipboard_loader").show();
                m.ajax({
                    url: "//focal-legacy-814.appspot.com/load_list",
                    data: {
                        license_key: t
                    },
                    error: function () {
                        m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                        alert(window.vc_clipboard_text.error_01);
                    },
                    dataType: "jsonp",
                    success: function (c) {
                        m(".vc_clipboard_load_dialog .vc_clipboard_loader").hide();
                        if (c == "error") {
                            m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                            alert(window.vc_clipboard_text.error_02);
                        } else {
                            if (c.length == 0) {
                                m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                                alert(window.vc_clipboard_text.no_saved_templates);
                            } else {
                                for (var t = 0; t < c.length; t++) {
                                    m(".vc_clipboard_load_dialog .vc_clipboard_list").append('<div class="vc_clipboard_list_item_container"><div class="vc_clipboard_list_item" title="' + window.vc_clipboard_text.load + c[t].name + ' "data-item="' + c[t].name + '">' + c[t].name + '</div><div class="vc_clipboard_list_item_delete" title="' + window.vc_clipboard_text.delete_text + c[t].name + '" data-item="' + c[t].name + '"></div></div>');
                                }
                                s();
                            }
                        }
                    },
                    type: "GET"
                });
            } else {
                d();
                m(".vc_clipboard_dialog").css("visibility", "hidden");
                m("#vc_clipboard_toolbar_license").show();
                m(".vc_clipboard_activate_dialog").css("visibility", "visible");
            }
        });
        m(".vc_clipboard_gc_save").on("click", function (c) {
            c.preventDefault();
            if (m(".vc_clipboard_save_dialog").css("visibility") == "visible") {
                m(".vc_clipboard_save_dialog").css("visibility", "hidden");
                return false;
            }
            var t = window.vc_clipboard_license_key;
            if (t !== false) {
                m(".vc_clipboard_dialog").css("visibility", "hidden");
                m(".vc_clipboard_save_dialog").css("visibility", "visible");
            } else {
                d();
                m(".vc_clipboard_dialog").css("visibility", "hidden");
                m("#vc_clipboard_toolbar_license").show();
                m(".vc_clipboard_activate_dialog").css("visibility", "visible");
            }
        });
        m(".vc_clipboard_save_submit").on("click", function (c) {
            c.preventDefault();
            var t = window.vc_clipboard_license_key;
            var e = m("#vc_clipboard_name").val();
            if (e == "") {
                alert(window.vc_clipboard_text.enter_template_name);
                return false;
            }
            if (window.vc_clipboard_cb_count > 0) {
                var o = "[";
                for (var i = 1; i <= window.vc_clipboard_cb_count; i++) {
                    o += '{"vcc_element_sc":"' + window.btoa(encodeURIComponent(localStorage.getItem("vcc_element_sc" + i))) + '",';
                    o += '"vcc_element_params":"' + window.btoa(encodeURIComponent(localStorage.getItem("vcc_element_params" + i))) + '",';
                    o += '"vcc_elements":"' + window.btoa(encodeURIComponent(localStorage.getItem("vcc_elements" + i))) + '"},';
                }
                o = o.substring(0, o.length - 1);
                o += "]";
                var _ = window.btoa(encodeURIComponent(o));
                if (t !== false) {
                    m(".vc_clipboard_save_submit").hide();
                    m(".vc_clipboard_save_cancel").hide();
                    m(".vc_clipboard_save_dialog .vc_clipboard_loader").show();
                    m.ajax({
                        url: "//focal-legacy-814.appspot.com/save",
                        data: {
                            license_key: t,
                            clipboard: _,
                            name: e
                        },
                        error: function () {
                            m(".vc_clipboard_save_submit").show();
                            m(".vc_clipboard_save_cancel").show();
                            m(".vc_clipboard_save_dialog .vc_clipboard_loader").hide();
                            alert(window.vc_clipboard_text.error_03);
                        },
                        dataType: "json",
                        success: function (c) {
                            m(".vc_clipboard_save_submit").show();
                            m(".vc_clipboard_save_cancel").show();
                            m(".vc_clipboard_save_dialog .vc_clipboard_loader").hide();
                            if (c == "ok") {
                                m("#vc_clipboard_name").val("");
                                m(".vc_clipboard_save_dialog").css("visibility", "hidden");
                                alert(window.vc_clipboard_text.clipboard_template_saved);
                            } else if (c == "exists") {
                                alert(window.vc_clipboard_text.name_already_taken);
                            } else {
                                alert(window.vc_clipboard_text.error_04);
                            }
                        },
                        type: "POST"
                    });
                } else {
                    d();
                    m(".vc_clipboard_activate_dialog").css("visibility", "visible");
                }
            } else {
                alert(window.vc_clipboard_text.nothing_to_save);
            }
        });
        m(".vc_clipboard_save_cancel").on("click", function (c) {
            c.preventDefault();
            m(".vc_clipboard_save_dialog").css("visibility", "hidden");
        });
        m(".vc_clipboard_gc_settings").on("click", function (c) {
            c.preventDefault();
            if (m(".vc_clipboard_activate_dialog").css("visibility") == "visible") {
                m(".vc_clipboard_activate_dialog").css("visibility", "hidden");
                return false;
            }
            d();
            m(".vc_clipboard_dialog").css("visibility", "hidden");
            m(".vc_clipboard_activate_dialog").css("visibility", "visible");
        });
        m("#vc_clipboard_toolbar").on("click", ".vc_clipboard_gc_settings_submit", function (c) {
            c.preventDefault();
            var e = m("#vc_clipboard_license_key").val();
            var o = m("#vc_clipboard_email").val();
            if (e !== false) {
                m(".vc_clipboard_gc_settings_submit").hide();
                m(".vc_clipboard_gc_settings_cancel").hide();
                m(".vc_clipboard_activate_dialog .vc_clipboard_loader").show();
                m.ajax({
                    url: "//focal-legacy-814.appspot.com/activate",
                    data: {
                        license_key: e,
                        email: o,
                        domain: window.vc_clipboard_site
                    },
                    error: function (c, t, e) {
                        m(".vc_clipboard_gc_settings_submit").show();
                        m(".vc_clipboard_gc_settings_cancel").show();
                        m(".vc_clipboard_activate_dialog .vc_clipboard_loader").hide();
                        alert(window.vc_clipboard_text.error_05);
                    },
                    dataType: "jsonp",
                    success: function (c) {
                        if (c == "ok") {
                            var t = {
                                action: "vc_clipboard_activate",
                                license_key: e,
                                email: o,
                                nonce: window.vc_clipboard_nonce
                            };
                            jQuery.post(window.ajaxurl, t, function (c) {
                                if (c == "ok") {
                                    m(".vc_clipboard_gc_settings_submit").show();
                                    m(".vc_clipboard_gc_settings_cancel").show();
                                    m(".vc_clipboard_activate_dialog .vc_clipboard_loader").hide();
                                    m(".vc_clipboard_gc_settings_submit").replaceWith('<a href="#" class="vc_clipboard_gc_settings_deactivate" title="' + window.vc_clipboard_text.deactivate + '">' + window.vc_clipboard_text.deactivate + "</a>");
                                    window.vc_clipboard_license_key = e;
                                    window.vc_clipboard_email = o;
                                    m("#vc_clipboard_license_key").prop("disabled", true);
                                    m(".vc_clipboard_activate_dialog").css("visibility", "hidden");
                                    alert(window.vc_clipboard_text.now_activated);
                                }
                            });
                        } else if (c == "error") {
                            alert(window.vc_clipboard_text.error_06);
                            m(".vc_clipboard_gc_settings_submit").show();
                            m(".vc_clipboard_gc_settings_cancel").show();
                            m(".vc_clipboard_activate_dialog .vc_clipboard_loader").hide();
                        } else {
                            alert(window.vc_clipboard_text.license_already_activated_on + c);
                            m(".vc_clipboard_gc_settings_submit").show();
                            m(".vc_clipboard_gc_settings_cancel").show();
                            m(".vc_clipboard_activate_dialog .vc_clipboard_loader").hide();
                        }
                    },
                    type: "GET"
                });
            } else {
                d();
                m(".vc_clipboard_activate_dialog").css("visibility", "visible");
            }
        });
        m("#vc_clipboard_toolbar").on("click", ".vc_clipboard_gc_settings_deactivate", function (c) {
            c.preventDefault();
            var t = m("#vc_clipboard_license_key").val();
            if (t !== false) {
                m(".vc_clipboard_gc_settings_deactivate").hide();
                m(".vc_clipboard_gc_settings_cancel").hide();
                m(".vc_clipboard_activate_dialog .vc_clipboard_loader").show();
                m.ajax({
                    url: "//focal-legacy-814.appspot.com/deactivate",
                    data: {
                        license_key: t
                    },
                    error: function (c, t, e) {
                        m(".vc_clipboard_gc_settings_deactivate").show();
                        m(".vc_clipboard_gc_settings_cancel").show();
                        m(".vc_clipboard_activate_dialog .vc_clipboard_loader").hide();
                        alert(window.vc_clipboard_text.error_05);
                    },
                    dataType: "jsonp",
                    success: function (c) {
                        if (c == "ok") {
                            var t = {
                                action: "vc_clipboard_deactivate",
                                nonce: window.vc_clipboard_nonce
                            };
                            jQuery.post(window.ajaxurl, t, function (c) {
                                if (c == "ok") {
                                    m(".vc_clipboard_gc_settings_deactivate").show();
                                    m(".vc_clipboard_gc_settings_cancel").show();
                                    m(".vc_clipboard_activate_dialog .vc_clipboard_loader").hide();
                                    m("#vc_clipboard_license_key").val("");
                                    m("#vc_clipboard_email").val("");
                                    m("#vc_clipboard_license_key").prop("disabled", false);
                                    m("#vc_clipboard_email").prop("disabled", false);
                                    m(".vc_clipboard_gc_settings_deactivate").replaceWith('<a href="#" class="vc_clipboard_gc_settings_submit" title="' + window.vc_clipboard_text.submit + '">' + window.vc_clipboard_text.submit + "</a>");
                                    window.vc_clipboard_license_key = false;
                                    window.vc_clipboard_email = "";
                                    m(".vc_clipboard_activate_dialog").css("visibility", "hidden");
                                    alert(window.vc_clipboard_text.now_deactivated);
                                }
                            });
                        } else {
                            alert(window.vc_clipboard_text.error_06_d);
                            m(".vc_clipboard_gc_settings_deactivate").show();
                            m(".vc_clipboard_gc_settings_cancel").show();
                            m(".vc_clipboard_activate_dialog .vc_clipboard_loader").hide();
                        }
                    },
                    type: "GET"
                });
            } else {
                d();
                m(".vc_clipboard_activate_dialog").css("visibility", "visible");
            }
        });
        m(".vc_clipboard_gc_settings_cancel").on("click", function (c) {
            c.preventDefault();
            m(".vc_clipboard_activate_dialog").css("visibility", "hidden");
        });
        m(".vc_clipboard_prefs").on("click", function (c) {
            c.preventDefault();
            if (m(".vc_clipboard_prefs_dialog").css("visibility") == "visible") {
                m(".vc_clipboard_prefs_dialog").css("visibility", "hidden");
                return false;
            }
            d();
            m(".vc_clipboard_dialog").css("visibility", "hidden");
            m(".vc_clipboard_prefs_dialog").css("visibility", "visible");
        });
    };
    var d = function () {
        var c = window.vc_clipboard_license_key !== false ? window.vc_clipboard_license_key : "";
        var t = window.vc_clipboard_email !== false ? window.vc_clipboard_email : "";
        m("#vc_clipboard_license_key").val(c);
        m("#vc_clipboard_email").val(t);
    };
    var s = function () {
        m(".vc_clipboard_list_item").on("click", function (c) {
            var t = m(this).data("item");
            m(".vc_clipboard_dialog").css("visibility", "hidden");
            m(".vc_clipboard_load_dialog").css("visibility", "visible");
            m(".vc_clipboard_load_dialog .vc_clipboard_list").html("");
            m(".vc_clipboard_load_dialog .vc_clipboard_loader").show();
            m.ajax({
                url: "//focal-legacy-814.appspot.com/load_item",
                data: {
                    license_key: window.vc_clipboard_license_key,
                    item_to_load: t
                },
                error: function () {
                    m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                    alert(window.vc_clipboard_text.error_07);
                },
                dataType: "jsonp",
                success: function (c) {
                    m(".vc_clipboard_load_dialog .vc_clipboard_loader").hide();
                    m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                    if (c == "error") {
                        alert(window.vc_clipboard_text.error_08);
                    } else {
                        v(c);
                    }
                },
                type: "GET"
            });
        });
        m(".vc_clipboard_list_item_delete").on("click", function (c) {
            var t = m(this).data("item");
            m(".vc_clipboard_dialog").css("visibility", "hidden");
            m(".vc_clipboard_load_dialog").css("visibility", "visible");
            m(".vc_clipboard_load_dialog .vc_clipboard_list").html("");
            m(".vc_clipboard_load_dialog .vc_clipboard_loader").show();
            m.ajax({
                url: "//focal-legacy-814.appspot.com/load_list",
                data: {
                    license_key: window.vc_clipboard_license_key,
                    item_to_delete: t
                },
                error: function () {
                    m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                    alert(window.vc_clipboard_text.error_09);
                },
                dataType: "jsonp",
                success: function (c) {
                    m(".vc_clipboard_load_dialog .vc_clipboard_loader").hide();
                    if (c == "error") {
                        m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                        alert(window.vc_clipboard_text.error_10);
                    } else {
                        if (c.length == 0) {
                            m(".vc_clipboard_load_dialog").css("visibility", "hidden");
                        } else {
                            for (var t = 0; t < c.length; t++) {
                                m(".vc_clipboard_load_dialog .vc_clipboard_list").append('<div class="vc_clipboard_list_item_container"><div class="vc_clipboard_list_item" title="Load ' + c[t].name + ' "data-item="' + c[t].name + '">' + c[t].name + '</div><div class="vc_clipboard_list_item_delete" title="Delete ' + c[t].name + '" data-item="' + c[t].name + '"></div></div>');
                            }
                            s();
                        }
                    }
                },
                type: "GET"
            });
        });
    };
    var v = function (c) {
        var t = decodeURIComponent(window.atob(c));
        var e = JSON.parse(t);
        for (var o = 1; o <= e.length; o++) {
            localStorage.setItem("vcc_element_sc" + o, decodeURIComponent(window.atob(e[o - 1].vcc_element_sc)));
            localStorage.setItem("vcc_element_params" + o, decodeURIComponent(window.atob(e[o - 1].vcc_element_params)));
            localStorage.setItem("vcc_elements" + o, decodeURIComponent(window.atob(e[o - 1].vcc_elements)));
            window.vc_clipboard_cb_count = e.length;
            localStorage.setItem("vcc_cb_count", "" + window.vc_clipboard_cb_count);
            m(".vc_clipboard_number_reset_top").html(window.vc_clipboard_cb_count);
        }
    };
    var p = function () {
        var c = confirm(window.vc_clipboard_text.clear_clipboard);
        if (c == true) {
            b();
        }
    };
    var b = function () {
        if (window.vc_clipboard_cb_count > 0) {
            for (var c = 1; c <= window.vc_clipboard_cb_count; c++) {
                localStorage.removeItem("vcc_element_sc" + c);
                localStorage.removeItem("vcc_element_params" + c);
                localStorage.removeItem("vcc_elements" + c);
            }
        }
        localStorage.setItem("vcc_cb_count", "0");
        m(".vc_clipboard_number_reset_top").html("0");
        window.vc_clipboard_cb_count = 0;
    };
    var w = function (c, t) {
        var e = c.attributes.parent_id;
        if (t == 0) {
            e = 0;
        }
        window.vc_clipboard_elements.push({
            sc: c.get("shortcode"),
            params: JSON.stringify(c.get("params")),
            parent_id: e,
            id: c.id,
            order: c.get("order")
        });
        _.each(window.vc.shortcodes.where({
            parent_id: c.id
        }), function (c) {
            w(c, -1);
        });
    };
    var u = function (c) {
        if (window.vc_clipboard_cb_count == 0) {
            alert(window.vc_clipboard_text.clipboard_empty);
            return;
        }
        if (window.vc_clipboard_fe) {
            if (m(c).closest(".parent-vc_row").length == 1) {
                var t = m(c).closest('div[data-tag="vc_row"]');
            } else if (m(c).closest(".parent-vc_tta_tabs").length == 1) {
                var t = m(c).closest('div[data-tag="vc_tta_tabs"]');
            } else if (m(c).closest(".parent-vc_tta_accordion").length == 1) {
                var t = m(c).closest('div[data-tag="vc_tta_accordion"]');
            } else {
                var t = m(c).closest("div[data-tag]");
            }
        } else {
            if (m(c).closest(".parent-vc_row").length == 1) {
                var t = m(c).closest('div[data-element_type="vc_row"]');
            } else {
                var t = m(c).closest("div[data-element_type]");
            }
        }
        var e = -1;
        if (f(t[0])) {
            window.vc_clipboard_current_count = 0;
            if (window.vc_clipboard_fe) {
                if (m(".vc_clipboard_message").length == 0) {
                    m(".vc_message").remove();
                    m("body").prepend('<div class="vc_message success vc_clipboard_message" style="z-index: 999; display: block;">' + window.vc_clipboard_text.pasting + "</div>");
                }
                var o = function () {
                    if (window.vc_clipboard_current_count >= window.vc_clipboard_cb_count) {
                        return;
                    }
                    setTimeout(function () {
                        o();
                    }, 50);
                    if ((window.vc_clipboard_builder === undefined || window.vc_clipboard_builder.is_build_complete === true) && (window.vc_clipboard_sub_paste_finished === undefined || window.vc_clipboard_sub_paste_finished === true)) {
                        e = h(t, window.vc_clipboard_current_count + 1, e);
                    }
                };
                o();
                n();
            } else {
                m("#vc_clipboard_paste_indicator").show();
                setTimeout(function () {
                    for (var c = 1; c <= window.vc_clipboard_cb_count; c++) {
                        e = h(t, c, e);
                    }
                    m("#vc_clipboard_paste_indicator").hide();
                }, 100);
            }
        }
    };
    var f = function (c) {
        var t;
        if (window.vc_clipboard_fe) {
            var e = "data-tag";
        } else {
            var e = "data-element_type";
        }
        if (c != null) {
            if (m(c).closest(".parent-vc_row").length == 1) {
                var o = m(c).closest("div[" + e + '="vc_row"]').attr("data-model-id");
            } else {
                var o = m(c).closest("div[" + e + "]").attr("data-model-id");
            }
            var i = window.vc.shortcodes.get(o);
            t = i.get("shortcode");
        } else {
            t = "";
        }
        var _ = null;
        if (t == "vc_row") {
            _ = true;
            if (m(c).closest("div[" + e + '="vc_section"]').length > 0) {
                _ = false;
            }
        }
        window.vc_clipboard_cb_has_section = false;
        for (var a = 1; a <= window.vc_clipboard_cb_count; a++) {
            var l = localStorage.getItem("vcc_element_sc" + a);
            if (l == "vc_section") {
                window.vc_clipboard_cb_has_section = true;
                break;
            }
        }
        window.vc_clipboard_cb_has_row = false;
        for (var a = 1; a <= window.vc_clipboard_cb_count; a++) {
            var l = localStorage.getItem("vcc_element_sc" + a);
            if (l == "vc_row") {
                window.vc_clipboard_cb_has_row = true;
                break;
            }
        }
        var l = localStorage.getItem("vcc_element_sc1");
        if (t != "" && t != "vc_section" && t != "vc_row" && window.vc_clipboard_cb_has_row) {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + "vc_row" + window.vc_clipboard_text.after + t);
            return false;
        } else if (t == "vc_section" && l != "vc_section" && l != "vc_row") {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.inside_after_vc_section);
            return false;
        } else if (t == "vc_row" && _ === true && l != "vc_row" && l != "vc_section") {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.after_vc_row);
            return false;
        } else if (t == "vc_row" && _ === false && (l != "vc_row" || window.vc_clipboard_cb_has_section)) {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.after_vc_row);
            return false;
        } else if (t == "vc_row_inner" && l != "vc_row_inner") {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.after_vc_row_inner);
            return false;
        } else if ((t == "vc_column" || t == "vc_column_inner") && (l == "vc_section" || l == "vc_row")) {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.inside + t + window.vc_clipboard_text.exclamation_mark_end);
            return false;
        } else if (t == "" && l == "vc_row_inner") {
            alert(window.vc_clipboard_text.cant_paste_vc_row_inner_as_root + "\n\n" + window.vc_clipboard_text.you_can_only);
            return false;
        } else if (t == "" && l == "vc_column") {
            alert(window.vc_clipboard_text.cant_paste_vc_column_content_to_root + "\n\n" + window.vc_clipboard_text.you_can_only);
            return false;
        } else if (t == "" && l == "vc_column_inner") {
            alert(window.vc_clipboard_text.cant_paste_vc_column_inner_content_to_root + "\n\n" + window.vc_clipboard_text.you_can_only);
            return false;
        } else if (t == "vc_column_inner" && l == "vc_column") {
            alert(window.vc_clipboard_text.cant_paste_vc_column_content_to_vc_column_inner + "\n\n" + window.vc_clipboard_text.you_can_only);
            return false;
        } else if (t == "vc_column_inner" && l == "vc_row_inner") {
            alert(window.vc_clipboard_text.cant_paste_vc_row_inner_to_vc_column_inner + "\n\n" + window.vc_clipboard_text.you_can_only);
            return false;
        } else if (t == "" && l != "vc_section" && l != "vc_row") {
            alert(window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.to_root + "\n\n" + window.vc_clipboard_text.you_can_only);
            return false;
        } else if ((t == "vc_row" || t == "vc_row_inner") && (l == "vc_column" || l == "vc_column_inner")) {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.content_after + t + window.vc_clipboard_text.exclamation_mark_end + "\n\n" + window.vc_clipboard_text.you_can_only);
            return false;
        } else if ((t == "vc_tta_section" || t == "vc_tab") && (l == "vc_section" || l == "vc_row" || l == "vc_row_inner" || l == "vc_column" || l == "vc_column_inner")) {
            alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.inside + t + window.vc_clipboard_text.exclamation_mark_end);
            return false;
        } else if (t == "vc_tta_section" || t == "vc_tab") {
            for (var a = 1; a <= window.vc_clipboard_cb_count; a++) {
                l = localStorage.getItem("vcc_element_sc" + a);
                if ((t == "vc_tta_section" || t == "vc_tab") && (l == "vc_tta_accordion" || l == "vc_tta_pageable" || l == "vc_tta_tabs" || l == "vc_tta_tour")) {
                    alert(window.vc_clipboard_text.exclamation_mark_start + window.vc_clipboard_text.cant_paste + l + window.vc_clipboard_text.inside + t + window.vc_clipboard_text.exclamation_mark_end);
                    return false;
                }
            }
        }
        return true;
    };
    var h = function (c, t, e) {
        var o = false;
        var i;
        if (window.vc_clipboard_fe) {
            var a = "data-tag";
        } else {
            var a = "data-element_type";
        }
        if (c != null) {
            var l = c.attr("data-model-id");
            var n = window.vc.shortcodes.get(l);
            i = n.get("shortcode");
        } else {
            i = "";
        }
        if (i != "vc_row" && i != "vc_section") {
            o = m(c).closest("div[" + a + '="vc_column_inner"], div[' + a + '="vc_column"], div[' + a + '="vc_tta_section"], div[' + a + '="vc_tab"]').attr("data-model-id");
        }
        if (c != null && i != "vc_column" && i != "vc_column_inner" && i != "vc_tta_section" && i != "vc_tab") {
            window.vc.clone_index = window.vc.clone_index / 10;
            if (e === -1) e = m(c).closest("div[" + a + '="' + i + '"]').attr("data-model-id");
            var r = window.vc.shortcodes.get(e);
            var d = parseFloat(r.get("order")) + window.vc.clone_index;
        } else {
            var d = -1;
        }
        var s = localStorage.getItem("vcc_element_sc" + t);
        if (s == "vc_row") {
            if (i == "vc_section") {
                if (!window.vc_clipboard_cb_has_section) {
                    o = l;
                }
            } else {
                var v = m(c).closest("div[" + a + '="vc_section"]').attr("data-model-id");
                if (v !== undefined) {
                    o = v;
                }
            }
        }
        var p = false;
        if ((i == "vc_column" || i == "vc_column_inner" || i == "vc_tta_section" || s == "vc_tab") && (s == "vc_column" || s == "vc_column_inner" || s == "vc_tta_section" || s == "vc_tab")) {
            var b = o;
            p = true;
        } else {
            var w = JSON.parse(localStorage.getItem("vcc_element_params" + t));
            b = window.vc_guid();
            if (d == -1) {
                var u = {
                    shortcode: s,
                    id: b,
                    parent_id: o,
                    cloned: false,
                    params: w
                };
                if (window.vc_clipboard_fe) {
                    window.vc_clipboard_builder = new window.vc.ShortcodesBuilder();
                    window.vc_clipboard_builder.create(u).render();
                } else {
                    window.vc.shortcodes.create(u);
                }
            } else {
                var u = {
                    shortcode: s,
                    id: b,
                    parent_id: o,
                    order: d,
                    cloned: false,
                    place_after_id: e,
                    params: w
                };
                if (window.vc_clipboard_fe) {
                    window.vc_clipboard_builder = new window.vc.ShortcodesBuilder();
                    window.vc_clipboard_builder.create(u).render();
                } else {
                    window.vc.shortcodes.create(u);
                }
            }
            window.vc_clipboard_current_count++;
            if (s != "vc_row" && s != "vc_column" && s != "vc_column_inner" && s != "vc_row_inner" && s != "vc_tta_section" && s != "vc_tab") {
                _.each(window.vc.shortcodes.where({
                    parent_id: b
                }), function (c) {
                    window.vc.shortcodes.get(c.id).destroy();
                    if (c.attributes.shortcode == "vc_tab") {
                        m("[data-model-id=" + b + "] [href=#tab-" + c.attributes.params.tab_id + "]").parent().remove();
                    }
                });
            }
        }
        g(b, t, p);
        return b;
    };
    var g = function (t, c, e) {
        var o = JSON.parse(localStorage.getItem("vcc_elements" + c));
        var i = o.length;
        window.vc_clipboard_current_count1 = 0;
        window.vc_clipboard_sub_paste_finished = false;
        var a = new Date().getTime() + c;
        if (window.vc_clipboard_fe) {
            var l = function () {
                if (window.vc_clipboard_current_count1 >= i) {
                    window.vc_clipboard_sub_paste_finished = true;
                    return;
                }
                setTimeout(function () {
                    l();
                }, 50);
                if ((window.vc_clipboard_builder1 === undefined || window.vc_clipboard_builder1.is_build_complete === true) && window.vc_clipboard_builder.is_build_complete === true) {
                    x(o[window.vc_clipboard_current_count1], a, t, e);
                }
            };
            l();
        } else {
            _.each(o, function (c) {
                x(c, a, t, e);
            });
        }
    };
    var x = function (c, t, e, o) {
        c.id = c.id + t;
        if (c.parent_id == 0) {
            c.parent_id = e;
        } else {
            c.parent_id = c.parent_id + t;
        }
        var i = JSON.parse(c.params);
        if (i.tab_id != undefined) {
            i.tab_id = i.tab_id + t;
        }
        if (o) {
            var a = {
                shortcode: c.sc,
                id: c.id,
                parent_id: c.parent_id,
                cloned: false,
                params: i
            };
            if (window.vc_clipboard_fe) {
                window.vc_clipboard_builder1 = new window.vc.ShortcodesBuilder();
                window.vc_clipboard_builder1.create(a).render();
            } else {
                window.vc.shortcodes.create(a);
            }
        } else {
            var a = {
                shortcode: c.sc,
                id: c.id,
                parent_id: c.parent_id,
                order: c.order,
                cloned: false,
                params: i
            };
            if (window.vc_clipboard_fe) {
                window.vc_clipboard_builder1 = new window.vc.ShortcodesBuilder();
                window.vc_clipboard_builder1.create(a).render();
            } else {
                window.vc.shortcodes.create(a);
            }
        }
        _.each(window.vc.shortcodes.where({
            parent_id: c.id
        }), function (c) {
            window.vc.shortcodes.get(c.id).destroy();
            if (c.attributes.shortcode == "vc_tab") {
                m("[data-model-id=" + e + "] [href=#tab-" + c.attributes.params.tab_id + "]").parent().remove();
            }
        });
        window.vc_clipboard_current_count1++;
    };
    m(document).ready(function () {
        if (m("#vc_inline-frame").length == 1) {
            window.vc_clipboard_fe = true;
        }
        m("#vc_inline-frame").on("load", function () {
            var c = m("#vc_inline-frame");
            c.contents().on("mouseenter", "div.vc-main-sortable-container", function () {
                m(this).find('div[data-tag="vc_section"] > .vc_controls > div > .vc_element').each(function () {
                    t(m(this), "vc_section");
                });
            });
            c.contents().on("mouseenter", 'div.vc-main-sortable-container div[data-tag="vc_section"] > .vc_controls > div > .vc_element', function () {
                t(m(this), "vc_section");
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container", function () {
                m(this).find(".vc_controls-column .parent-vc_row .vc_advanced").each(function () {
                    t(m(this), "vc_row");
                });
                m(this).find(".vc_controls-column .parent-vc_row_inner .vc_advanced").each(function () {
                    t(m(this), "vc_row_inner");
                });
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container .vc_controls-column .parent-vc_row .vc_advanced", function () {
                t(m(this), "vc_row");
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container .vc_controls-column .parent-vc_row_inner .vc_advanced", function () {
                t(m(this), "vc_row_inner");
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container", function () {
                m(this).find(".vc_controls-column .element-vc_column .vc_advanced").each(function () {
                    t(m(this), "vc_column");
                });
                m(this).find(".vc_controls-column .element-vc_column_inner .vc_advanced").each(function () {
                    t(m(this), "vc_column_inner");
                });
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container", function () {
                m(this).find(".vc_controls-container .vc_parent .vc_advanced").each(function () {
                    var c = m(this).parents("[data-tag]").eq(1).data("tag");
                    t(m(this), c);
                });
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container .vc_controls-container .vc_parent .vc_advanced", function () {
                var c = m(this).parents("[data-tag]").eq(1).data("tag");
                t(m(this), c);
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container", function () {
                m(this).find(".vc_controls-container .vc_element .vc_advanced").each(function () {
                    t(m(this));
                });
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container .vc_controls-container .vc_element .vc_advanced", function () {
                t(m(this));
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container .wpb_column", function () {
                m(this).find(".vc_controls").each(function () {
                    if (!m(this).hasClass("vc_controls-container") && !m(this).hasClass("vc_controls-column")) {
                        t(m(this).find("div").first());
                    }
                });
            });
            c.contents().on("mouseenter", "div.vc-main-sortable-container .wpb_column .vc_controls", function () {
                if (!m(this).hasClass("vc_controls-container") && !m(this).hasClass("vc_controls-column")) {
                    t(m(this).find("div").first());
                }
            });
            c.contents().on("click", ".vc_clipboard_copy", function () {
                if (m(this).closest(".parent-vc_row").length == 1) {
                    var c = m(this).closest('div[data-tag="vc_row"]').attr("data-model-id");
                } else if (m(this).closest(".parent-vc_row_inner").length == 1) {
                    var c = m(this).closest('div[data-tag="vc_row_inner"]').attr("data-model-id");
                } else if (m(this).closest(".parent-vc_tta_tabs").length == 1) {
                    var c = m(this).closest('div[data-tag="vc_tta_tabs"]').attr("data-model-id");
                } else if (m(this).closest(".parent-vc_tta_accordion").length == 1) {
                    var c = m(this).closest('div[data-tag="vc_tta_accordion"]').attr("data-model-id");
                } else {
                    var c = m(this).closest("div[data-tag]").attr("data-model-id");
                }
                var t = window.vc.shortcodes.get(c);
                var e = t.get("shortcode");
                o(c, t, e);
            });
            c.contents().on("click", ".vc_clipboard_cut", function () {
                if (m(this).closest(".parent-vc_row").length == 1) {
                    var c = m(this).closest('div[data-tag="vc_row"]').attr("data-model-id");
                } else if (m(this).closest(".parent-vc_tta_tabs").length == 1) {
                    var c = m(this).closest('div[data-tag="vc_tta_tabs"]').attr("data-model-id");
                } else if (m(this).closest(".parent-vc_tta_accordion").length == 1) {
                    var c = m(this).closest('div[data-tag="vc_tta_accordion"]').attr("data-model-id");
                } else {
                    var c = m(this).closest("div[data-tag]").attr("data-model-id");
                }
                var t = window.vc.shortcodes.get(c);
                var e = t.get("shortcode");
                i(c, t, e);
            });
            c.contents().on("click", ".vc_clipboard_copy_plus", function () {
                a(m(this));
            });
            c.contents().on("click", ".vc_clipboard_cut_plus", function () {
                l(m(this));
            });
            c.contents().on("click", ".vc_clipboard_paste", function () {
                u(this);
            });
        });
    });
})(jQuery);