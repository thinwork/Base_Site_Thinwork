/*
 * FeedEk jQuery RSS/ATOM Feed Plugin v3.0 with YQL API
 * junior altereou tudo
 *   
 */

(function($) {
    $.fn.FeedEk = function(opt) {
        var def = $.extend({
            MaxCount: 5,
            ShowDesc: true,
            ShowPubDate: true,
            DescCharacterLimit: 0,
            TitleLinkTarget: "_blank",
            DateFormat: "",
            DateFormatLang: "en"
        }, opt);

        var id = $(this).attr("id"),
            i, s = "",
            dt;
        $("#" + id).empty();
        if (def.FeedUrl == undefined) return;

        var YQLstr = 'SELECT channel.item FROM feednormalizer WHERE output="rss_2.0" AND url ="' + def.FeedUrl + '" LIMIT ' + def.MaxCount;

        s = '<div class="slick-carousel" id="news" name="news" >';

        $.ajax({
            url: "https://query.yahooapis.com/v1/public/yql?q=" + encodeURIComponent(YQLstr) + "&format=json&diagnostics=false&callback=?",
            dataType: "json",
            success: function(data) {
                $("#" + id).empty();
                if (!(data.query.results.rss instanceof Array)) {
                    data.query.results.rss = [data.query.results.rss];
                }
                $.each(data.query.results.rss, function(e, itm) {

                    /****** Tratar data *****/
                    dt = new Date(itm.channel.item.pubDate);
                    dts = '';
                    if ($.trim(def.DateFormat).length > 0) {
                        try {
                            moment.lang(def.DateFormatLang);
                            dts += moment(dt).format(def.DateFormat);
                        } catch (e) { dts += dt.toLocaleDateString(); }
                    } else {
                        dts += dt.toLocaleDateString();
                    }

                    /****** Tratar data *****/
                    textover = '';
                    if (def.DescCharacterLimit > 0 && itm.channel.item.description.length > def.DescCharacterLimit) {
                        textover += itm.channel.item.description.substring(0, def.DescCharacterLimit) + '...';
                    } else {
                        textover += itm.channel.item.description;
                    }

                    s += '<!-- Post -->';
                    s += '<div>';
                    s += '    <article class="blognews">';
                    s += '        <h4><a href="' + itm.channel.item.link + '" target="' + def.TitleLinkTarget + '">' + itm.channel.item.title + '</a></h4>';
                    s += '        <p>' + textover + '<a href="' + itm.channel.item.link + '" target="' + def.TitleLinkTarget + '"> Leia mais ' + '</a></p>';
                    s += '        <p class="author">';
                    s += '            <i class="fa fa-calendar"></i> ' + dts + ' <span>/</span> by <a href="' + itm.channel.item.link + '"><strong>globo.com</strong></a> <span>/</span>';
                    s += '            <a href="' + itm.channel.item.link + '" data-toggle="tooltip" data-placement="right" title="" data-original-title="Leia Mais" class="corp-tooltip"><i class="fa fa-plus-square"></i></a>';
                    s += '        </p>';
                    s += '    </article>';
                    s += '</div>';
                    s += '<!-- /item - post -->';

                });

            }
        });
        s += '</div>';
        $("#" + id).append(s);
    };
})(jQuery);