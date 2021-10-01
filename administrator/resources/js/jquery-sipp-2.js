function progressHandlingFunction(e) {
    e.lengthComputable && $("progress").attr({
        value: e.loaded,
        max: e.total
    })
}

function isDateValid(e) {
    var t = e.substring(0, 2),
        n = e.substring(3, 5),
        o = e.substring(e.length - 4);
    return t > 31 ? (message_error_show("Periksa Kembali Tanggal Yang anda Masukan"), !1) : n > 12 ? (message_error_show("Periksa Kembali Bulan Yang anda Masukan"), !1) : "02" == n && t > 29 ? (message_error_show("Periksa Kembali Tanggal dan Bulan Yang anda Masukan"), !1) : 1915 > o || o > 2115 ? (message_error_show("Periksa Kembali Tahun Yang anda Masukan"), !1) : !0
}

function message_error_show(e) {
    $('<div id="popup_message" style="overflow=hidden" class="popup"><div class="centering"><table class="pesan"><tr style="background-color: #008C4B;"><td align="center" style="padding:5px;" id="test">Pesan</td><td id="close_error_windows" class="tutup_windows tutups" align="center" style="padding:5px;" width="50">Tutup</td></tr><tr><td style="padding:5px;background-color:yellow;" colspan="2"><div id="popup-container"></div></td></tr></table></div></div>').appendTo("body"), $("#popup-container").html(e), $("#close_error_windows").closingErrorWin(), $("body").css({
        overflow: "hidden"
    }), $("#popup_message").show()
}

function message_error_show_parent(e) {
    $('<div id="popup_message" class="popup"><div class="centering"><table class="pesan"><tr style="background-color: #008C4B;"><td align="center" style="padding:5px;color:#fff" id="test">Pesan</td><td id="close_error_windows" class="tutup_windows tutups" align="center" style="padding:5px;" width="50">Tutup</td></tr><tr><td style="padding:5px;background-color:yellow;" colspan="2"><div id="popup-container"></div></td></tr></table></div></div>').appendTo("body"), $("#popup-container").html(e), $("#close_error_windows").closingErrorWinParent(), $("body").css({
        overflow: "hidden"
    }), $("#popup_message").show()
}

function message_show(e) {
    $('<div id="popup_message" class="popup"><div class="centering"><table class="pesan"><tr style="background-color: #008C4B;"><td align="center" style="padding:5px;" id="test">Pesan</td><td id="close_msg_windows" class="tutup_windows tutups" align="center" style="padding:5px;" width="20">Tutup</td></tr><tr><td style="padding:5px;" colspan="2"><div id="popup-container"></div></td></tr></table></div></div>').appendTo("body"), $("#popup-container").html(e), $("#close_msg_windows").closingWin(), $("body").css({
        overflow: "hidden"
    }), $("#popup_message").show()
}

function message_show_then_back(e, t) {
    $('<div id="popup_message" class="popup"><div class="centering"><table class="pesan"><tr style="background-color: #008C4B;"><td align="center" style="padding:5px;" id="test">Pesan</td><td id="close_msg_windows" class="tutup_windows tutups" align="center" style="padding:5px;" width="20">Tutup</td></tr><tr><td style="padding:5px;" colspan="2"><div id="popup-container"></div></td></tr></table></div></div>').appendTo("body"), $("#popup-container").html(e), $("#close_msg_windows").closingWinThenBack({
        divBack: t
    }), $("body").css({
        overflow: "hidden"
    }), $("#popup_message").show()
}

function loadDiv(e, t) {
    $("#" + e).load(t)
}

function popup_form(e) {
    openLoadingDialog(), $('<div id="popup_form" class="popup"><div id="form_pop"></div></div>').appendTo("body"), $("#form_pop").load(e), closeLoading(), $("body").css({
        overflow: "hidden"
    }), $("#popup_form").show()
}

function popup_form2nd(e) {
    $('<div id="popup_form_2nd" class="popup"><div id="form_pop_2nd"></div></div>').appendTo("body"), $("#form_pop_2nd").load(e), $("#popup_form").hide(), $("body").css({
        overflow: "hidden"
    }), $("#popup_form_2nd").show()
}

function popup_form3rd(e) {
    $('<div id="popup_form_3rd" class="popup"><div id="form_pop_3rd"></div></div>').appendTo("body"), $("#form_pop_3rd").load(e), $("#form_pop_2nd").hide(), $("body").css({
        overflow: "hidden"
    }), $("#form_pop_3rd").show()
}

function popup_form4th(e) {
    $('<div id="popup_form_4th" class="popup"><div id="form_pop_4th"></div></div>').appendTo("body"), $("#form_pop_4th").load(e), $("#popup_form_3rd").hide(), $("#popup_form_4th").show(), $("body").css({
        overflow: "hidden"
    }), $("#form_pop_4th").show()
}

function popup_form5th(e) {
    $('<div id="popup_form_5th" class="popup"><div id="form_pop_5th"></div></div>').appendTo("body"), $("#form_pop_5th").load(e), $("#popup_form_4th").hide(), $("#popup_form_5th").show(), $("body").css({
        overflow: "hidden"
    }), $("#form_pop_5th").show()
}

function notifyMe(msg_body,redirect_onclick){if (granted == 1) {var notification = new Notification('Sistem Informasi Penelusuran Perkara', {body: msg_body, icon: '48.png'}); if (redirect_onclick) {notification.onclick = function() {window.location.href = redirect_onclick; } } } }

function closeLoading(){
    $("body").css({ overflow: 'inherit' })
    $('#loading').hide();
}
function popup_form6th(e) {}

function popup_form7th(e) {}

function fetch_month(e) {
    return 1 == e ? mnth = "Januari" : 2 == e ? mnth = "Februari" : 3 == e ? mnth = "Maret" : 4 == e ? mnth = "April" : 5 == e ? mnth = "Mei" : 6 == e ? mnth = "Juni" : 7 == e ? mnth = "Juli" : 8 == e ? mnth = "Agustus" : 9 == e ? mnth = "September" : 10 == e ? mnth = "Oktober" : 11 == e ? mnth = "November" : 12 == e ? mnth = "Desember" : mnth = "error, contact admin", mnth
}
jQuery.fn.ForceNumericOnly = function() {
    return this.each(function() {
        $(this).keydown(function(e) {
            var t = e.charCode || e.keyCode || 0;
            return 8 == t || 188 == t || 9 == t || 13 == t || 46 == t || 110 == t || 190 == t || t >= 35 && 40 >= t || t >= 48 && 57 >= t || t >= 96 && 105 >= t
        })
    })
}, jQuery.fn.ValidateDateInput = function() {
    $(this).keyup(function(e) {
        if (!(e.keyCode < 8 || e.keyCode > 57) && "8" != e.keyCode) {
            if (1 == e.target.value.length && e.target.value > 3 && (message_error_show("Input Tidak Benar Format, Tanggal tidak boleh lebih dari 30"), e.target.value = ""), 4 == e.target.value.length && "13" != e.keyCode && 49 != e.keyCode && 48 != e.keyCode) {
                message_error_show("Input Tidak Benar Format, Bulan Tidak Boleh dari 12");
                var t = e.target.value;
                t = t.substring(0, t.length - 1), e.target.value = t
            }
            if (5 == e.target.value.length) {
                var t = e.target.value,
                    n = t.substr(t.length - 2);
                n > 12 && (message_error_show("Input Tidak Benar Format, Bulan Tidak Boleh dari 12"), t = t.substring(0, t.length - 1), e.target.value = t)
            }
            if (7 == e.target.value.length && "13" != e.keyCode && e.keyCode > 50 && 48 != e.keyCode) {
                message_error_show("Anda Yakin dengan Tahun yang anda masukan?");
                var t = e.target.value;
                t = t.substring(0, t.length - 1), e.target.value = t
            }
            if (10 == e.target.value.length && 0 == isDateValid(e.target.value)) {
                var t = e.target.value;
                t = t.substring(0, t.length - 1), e.target.value = t
            }
            2 == e.target.value.length && (e.target.value = e.target.value + "/"), 5 == e.target.value.length && (e.target.value = e.target.value + "/")
        }
    })
}, jQuery.fn.SubmitHandling = function(e) {
    var t = $.extend({
        refresh: 0,
        setRefresh: 0,
        divRef: "body",
        clicked: 0,
        btnClicked: "",
        whenStatus: 1,
        isCKEdit: 0,
        tdID: "",
        textID: "",
        upload: 0,
        urlUpload: "",
        istemplate: 0,
        next_step: 0
    }, e);
    this.submit(function(e) {
        if (1 == t.istemplate) var n = !0;
        else var n = confirm("Apakah Anda Yakin Akan Menyimpan Data");
        if (1 == n) {
            var o = 1;
            openLoadingDialog();
            $('<div id="popup_msg" class="popup"><div class="centering"><table class="pesan"><tr style="background-color: #008C4B;"><td align="center" style="padding:5px;" id="test">Pesan</td><td id="tutup_windows" class="tutup_windows tutups" align="center" style="padding:5px;" width="50">Tutup</td></tr><tr><td style="padding:5px;" colspan="2"><div id="pesan-container"></div></td></tr></table></div></div>').appendTo("body");
            var a = $(this).serializeArray();
            if (1 == t.upload) {
                var s = new FormData($(this)[0]);
                $(":file")[0].files[0]
            }
            if (1 == t.isCKEdit) {
                var d = t.textID.split(","),
                    r = t.tdID.split(","),
                    p = "";
                for (i = 0; i < d.length; i++) p = CKEDITOR.instances[d[i]].getData(), a.push({
                    name: r[i],
                    value: p
                })
            }
            a = jQuery.param(a), $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: a,
                success: function(n) {
                    if (json = n, 0 == json.st) {
                        $("#pesan-container").html(json.msg);
                        1 == t.clicked ? $("#tutup_windows").closingDiv({
                                clicked: 1,
                                setRefresh: t.setRefresh,
                                divRef: t.divRef + " #refresh",
                                btnClicked: t.btnClicked,
                                whenStatus: 1,
                                st: json.st
                            }) : $("#tutup_windows").closingDiv(), closeLoading(), $("#popup_msg").show()
                    }else {
                        if (1 == t.upload) {
                            var ada=false,xx=0;
                            $(":file").each(function(){
                                if($(this).val()!=''){
                                    ada=true;
                                    var a = $(":file")[xx].files[0];
                                    if ("application/x-zip-compressed" != a.type && "application/x-rar-compressed" != a.type && "application/pdf" != a.type && "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" != a.type && "application/vnd.openxmlformats-officedocument.wordprocessingml.document" != a.type && "text/rtf" != a.type && "application/rtf" != a.type && "application/msword" != a.type && "image/png" != a.type && "image/jpg" != a.type && "image/jpeg" != a.type && "application/x-download" != a.type && "application/vnd.ms-word" != a.type) return closeLoading(), message_error_show(" File Format E-Document Tidak Diizinkan. System Hanya Mengizinkan File dengan Format: Ms. Word, PDF, ZIP, RAR, RTF, PNG"), void e.preventDefault();
                                }
                                xx++;
                            })
                                
                            if (ada) {
                                $.ajax({
                                    url: t.urlUpload,
                                    type: "POST",
                                    dataType: "json",
                                    xhr: function() {
                                        var e = $.ajaxSettings.xhr();
                                        return e.upload && e.upload.addEventListener("progress", progressHandlingFunction, !1), e
                                    },
                                    success: function(t) {
                                        return 0 == t.st ? (o = 0, message_error_show(t.msg), void e.preventDefault()) : void $("#pesan-container").html(t.msg)
                                    },
                                    data: s,
                                    cache: !1,
                                    contentType: !1,
                                    processData: !1
                                })
                            } 
                        } 
                        // else $("#pesan-container").html(json.msg);
                        // 1 == t.refresh && 0 == t.setRefresh && ($("#refresh").remove(), $('<input type="hidden" id="refresh" value="1">').appendTo(t.divRef))
                        openLoadingDialog();
                        if($('.selected').length){
                            if($('.selected').attr('href')=='#tabs1'){    
                                $("#pesan-container").html(json.msg);
                                1 == t.clicked ? $("#tutup_windows").closingDiv({
                                    clicked: 1,
                                    setRefresh: t.setRefresh,
                                    divRef: t.divRef + " #refresh",
                                    btnClicked: t.btnClicked,
                                    whenStatus: 1,
                                    st: json.st
                                }) : $("#tutup_windows").closingDiv(), closeLoading(),$("#popup_msg").show();
                                $('#popup_msg').hide()
                                if (1 == t.upload) {
                                    setTimeout(function(){ $("#tutup_windows").click(); }, 1000);
                                }else{
                                    $("#tutup_windows").click();
                                }
                            }else{
                                if(t.next_step==1){
                                    if (json = n, 1 == json.st) $("#pesan-container").html(json.msg);
                                    1 == t.clicked ? $("#tutup_windows").closingDiv({
                                        clicked: 1,
                                        setRefresh: t.setRefresh,
                                        divRef: t.divRef + " #refresh",
                                        btnClicked: t.btnClicked,
                                        whenStatus: 1,
                                        st: json.st
                                    }) : $("#tutup_windows").closingDiv(), closeLoading();
                                    if (1 == t.upload) {
                                        setTimeout(function(){ $("#tutup_windows").click(); }, 1000);
                                    }else{
                                        $("#tutup_windows").click();
                                    }
                                }else{
                                    $('.selected').removeClass('loaded');
                                    $('.popup').remove();
                                    if (1 == t.upload) {
                                        setTimeout(function(){ $('.selected').click(); }, 1000);
                                    }else{
                                        $('.selected').click();
                                    }
                                    closeLoading();
                                }
                            }
                        }else{
                            $("#pesan-container").html(json.msg);
                            $("#tutup_windows").closingDiv({
                                clicked: 1,
                                setRefresh: t.setRefresh,
                                divRef: t.divRef + " #refresh",
                                btnClicked: t.btnClicked,
                                whenStatus: 1,
                                st: json.st
                            });
                            if (1 == t.upload) {
                                setTimeout(function(){ $("#tutup_windows").click(); }, 1000);
                            }else{
                                $("#tutup_windows").click();
                            }
                            closeLoading();
                        }
                    }
                },
                error: function(n, a, i) {
                    var d = jQuery.parseJSON(n.responseText);
                    if (0 == d.st){ 
                        $("#pesan-container").html(d.msg);
                    }else {
                        if (1 == t.upload) {
                            var r = $(":file")[0].files[0];
                            if ("" != $(":file").val()) {
                                if ("application/pdf" != r.type && "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" != r.type && "application/vnd.openxmlformats-officedocument.wordprocessingml.document" != r.type && "text/rtf" != r.type && "application/msword" != r.type && "image/png" != r.type) return closeLoading(), message_error_show("File Format E-Document Tidak Diizinkan. System Hanya Mengizinkan File dengan Format: Ms. Word, PDF, RTF, PNG"), void e.preventDefault();
                                $.ajax({
                                    url: t.urlUpload,
                                    type: "POST",
                                    dataType: "json",
                                    xhr: function() {
                                        var e = $.ajaxSettings.xhr();
                                        return e.upload && e.upload.addEventListener("progress", progressHandlingFunction, !1), e
                                    },
                                    success: function(t) {
                                        return 0 == t.st ? (o = 0, message_error_show(t.msg), void e.preventDefault()) : void 0
                                    },
                                    data: s,
                                    cache: !1,
                                    contentType: !1,
                                    processData: !1
                                })
                            }
                        }
                        $("#pesan-container").html(d.msg), 1 == t.refresh && 0 == t.setRefresh && ($("#refresh").remove(), $('<input type="hidden" id="refresh" value="1">').appendTo(t.divRef))
                    }
                    1 == t.clicked ? $("#tutup_windows").closingDiv({
                        clicked: 1,
                        setRefresh: t.setRefresh,
                        divRef: t.divRef + " #refresh",
                        btnClicked: t.btnClicked,
                        whenStatus: 1,
                        st: d.st
                    }) : $("#tutup_windows").closingDiv(), closeLoading(), $("#popup_msg").show()
                },
                dataType: "json"
            }), $("body").css({
                overflow: "hidden"
            }), e.preventDefault()
        }
        e.preventDefault()
    })
}, jQuery.fn.closingDiv = function(e) {
    var t = $.extend({
        clicked: 0,
        setRefresh: 0,
        divRef: "body",
        btnClicked: "",
        whenStatus: 1,
        st: 0
    }, e);
    this.click(function() {
        return $("body").css({
            overflow: "inherit"
        }), $("#popup_msg").hide(), $("#popup_msg").remove(), closeLoading(), 1 == t.clicked && t.st == t.whenStatus && (1 == t.setRefresh && $(t.divRef).val(1).trigger("change"), $(t.btnClicked).click()), !1
    })
}, jQuery.fn.ButtonClickHandling = function(e) {
    var t = $.extend({
        refresh: 0,
        setRefresh: 0,
        divRef: "body",
        clicked: 0,
        btnClicked: "",
        whenStatus: 1,
        actions: "",
        formName: "",
        actionName: ""
    }, e);
    this.click(function(e) {
        if ("" == t.actions || "" == t.formName) return void message_error_show("Form and Action Not Initiated correctly.");
        var n = confirm("Apakah Anda Yakin Akan " + t.actionName);
        1 == n && (openLoadingDialog(), $('<div id="popup_msg" class="popup"><div class="centering"><table class="pesan"><tr style="background-color: #5FB85C;"><td align="center" style="padding:5px;" id="test">Pesan</td><td id="tutup_windows" class="tutup_windows tutups" align="center" style="padding:5px;" width="50">tutup</td></tr><tr><td style="padding:5px;" id="td_pesan-container" colspan="2"><div id="pesan-container"></div></td></tr></table></div></div>').appendTo("body"), $.post(t.actions, $(t.formName).serialize(), function(e) {
            0 == e.st ? ($("#td_pesan-container").css("background:yellow;"), $("#pesan-container").css("background:yellow;"), $("#pesan-container").html(e.msg)) : ($("#pesan-container").html(e.msg), 1 == t.refresh && 0 == t.setRefresh && ($("#refresh").remove(), $('<input type="hidden" id="refresh" value="1">').appendTo(t.divRef))), 1 == t.clicked ? $("#tutup_windows").closingDiv({
                clicked: 1,
                setRefresh: t.setRefresh,
                divRef: t.divRef + " #refresh",
                btnClicked: t.btnClicked,
                whenStatus: 1,
                st: e.st
            }) : $("#tutup_windows").closingDiv(), closeLoading(), $("#popup_msg").show()
        }, "json"), $("body").css({
            overflow: "hidden"
        }), e.preventDefault()), e.preventDefault()
    })
}, jQuery.fn.closingWin = function() {
    this.click(function() {
        return $("body").css({
            overflow: "inherit"
        }), $("#popup_message").fadeOut(), $("#popup_message").remove(), closeLoading(), !1
    })
}, jQuery.fn.closingWinThenBack = function(e) {
    var t = $.extend({
        divBack: 1
    }, e);
    this.click(function() {
        return $("body").css({
            overflow: "inherit"
        }), $("#popup_message").fadeOut(), $("#popup_message").remove(), 1 != t.divBack && $("#" + t.divBack).click(), closeLoading(), !1
    })
}, jQuery.fn.closingErrorWin = function() {
    this.click(function() {
        return $("#popup_message").fadeOut(), $("#popup_message").remove(), !1
    })
}, jQuery.fn.closingErrorWinParent = function() {
    this.click(function() {
        return $("body").css({
            overflow: "inherit"
        }), $("#popup_message").fadeOut(), $("#popup_message").remove(), !1
    })
}, jQuery.fn.closingFormWin = function() {
    this.click(function() {
        return $("#popup_form").hide(), $("#popup_form").remove(), closeLoading(), !1
    })
}, jQuery.fn.closingForm2ndWin = function() {
    this.click(function() {
        return $("#popup_form_2nd").hide(), $("#popup_form_2nd").remove(), $("#popup_form").show(), closeLoading(), $("body").css({
            overflow: "hidden"
        }), !1
    })
}, jQuery.fn.closingForm3rdWin = function() {
    this.click(function() {
        return $("#popup_form_3rd").hide(), $("#popup_form_3rd").remove(), $("#popup_form_2nd").show(), closeLoading(), $("body").css({
            overflow: "hidden"
        }), !1
    })
}, jQuery.fn.closingForm4thWin = function() {
    this.click(function() {
        return $("#popup_form_4th").hide(), $("#popup_form_4th").remove(), $("#popup_form_3rd").show(), closeLoading(), $("body").css({
            overflow: "hidden"
        }), !1
    })
}, jQuery.fn.closingForm5thWin = function() {
    this.click(function() {
        return $("#popup_form_5th").hide(), $("#popup_form_5th").remove(), $("#popup_form_4th").show(), closeLoading(), $("body").css({
            overflow: "hidden"
        }), !1
    })
};
var weekday = new Array(7);
weekday[0] = "Sunday", weekday[1] = "Monday", weekday[2] = "Tuesday", weekday[3] = "Wednesday", weekday[4] = "Thursday", weekday[5] = "Friday", weekday[6] = "Saturday";