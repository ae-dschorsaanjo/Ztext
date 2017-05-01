$(function () {

    var iactive = $(".ztext span.iactive");
    var collapseable = $(".ztext span.clickcoll");
    //var download_button_class = "download-buttonz";

	// Clickable block's
    iactive.click(function (e) {

        var dis = $(this);
        var currname = dis.attr('id');
        if (currname[0] != 'a') {
            targ = ".ztext span#a" + currname;
        }
        else {
            currname = currname.substr(1);
            targ = ".ztext span#" + currname;
        }

        $(targ).css('display', dis.css('display'));
        dis.css('display', 'none');
    });

    // Collapseable block's
    collapseable.click(function (e) {

        var dis = $(this);
        var id = dis.attr('id');
        var needed = $(".ztext span.collcontent#" + id + "content");

        if (needed.css('display') == 'none') {
            needed.css('display', 'block');
        }
        else {
            needed.css('display', 'none')
        }
    });
});
