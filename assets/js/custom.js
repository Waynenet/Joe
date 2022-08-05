document.addEventListener('DOMContentLoaded', () => {
    // 编辑器 start
    // 版权
    var copyright = '<div class="cm-tools-item" title="版权"><svg t="1622610141615" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2895" width="20" height="20"><path d="M515.52 722.259c-109.945 0-199.476-89.467-199.476-199.476s89.467-199.475 199.476-199.475 199.475 89.466 199.475 199.475S625.465 722.26 515.52 722.26z m0-339.883c-77.435 0-140.407 62.972-140.407 140.471 0 77.435 62.972 140.408 140.407 140.408s140.407-62.973 140.407-140.408c0-77.499-62.972-140.47-140.407-140.47z m29.054 229.874h-18.687c-49.34 0-89.466-40.126-89.466-89.403 0-49.34 40.125-89.466 89.466-89.466h18.751c16.319 0 29.502 13.183 29.502 29.502s-13.183 29.502-29.502 29.502h-18.75c-16.768 0-30.399 13.631-30.399 30.462 0 16.767 13.631 30.398 30.398 30.398h18.751c16.319 0 29.502 13.184 29.502 29.503s-13.247 29.502-29.566 29.502z m-29.054 411.686c-4.16 0-8.32-0.896-12.223-2.688L302.22 929.606c-137.08-62.46-222.194-181.109-222.194-309.549v-434.66c0-8.832 3.968-17.152 10.751-22.783 6.784-5.632 15.743-7.872 24.383-6.208 26.11 5.12 52.924 7.68 79.739 7.68 88.634 0 175.093-28.67 237.297-78.587l64.764-52.03c10.815-8.703 26.174-8.703 36.926 0L598.65 85.5c62.204 49.98 148.662 78.587 237.297 78.587 26.814 0 53.628-2.56 79.739-7.68 8.64-1.728 17.599 0.576 24.382 6.208 6.784 5.631 10.752 13.951 10.752 22.782v434.661c0 128.44-85.115 247.089-222.195 309.549l-201.075 91.642c-3.712 1.792-7.871 2.688-12.031 2.688zM139.03 219.89v400.167c0 105.082 71.932 203.124 187.637 255.856l188.788 86.075 188.788-86.075C820.013 823.117 891.88 725.075 891.88 620.057V219.89a478.563 478.563 0 0 1-55.868 3.264c-103.29 0-200.692-32.51-274.287-91.642L515.52 94.33l-46.333 37.182c-73.532 59.068-170.934 91.642-274.223 91.642-18.751 0-37.438-1.088-55.933-3.264z" fill="" p-id="2896"></path></svg></div>';
    $(".cm-tools").append(copyright);
    // 字体颜色
    var fond_color = '<div class="cm-tools-item" title="字体颜色"><svg t="1623636038753" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="670" width="20" height="20"><path d="M792.864 922.112l103.584-2.176L572.576 110.24h-89.184L161.696 919.936H264l66.944-167.936h394.112l67.808 170.112zM369.216 656L528 257.632 686.784 656h-317.568z" p-id="671" fill="#bfbfbf"></path></svg></div>';
    $(".cm-tools").append(fond_color);
    
    // 插入编辑器图标
    
    
    var custom_button = '<div class="cm-modal__wrapper-footer--confirm custom_button">确定</div>';
    $(".cm-tools .cm-tools-item").click(function(){
        if($(this).attr("title") == '版权') {
            var copyright_txt = '插入版权';
            var copyright_body = '<div class="fitem"><label>版权名称</label><input autocomplete="off" name="copyright_title" placeholder="请输入版权名称"></div>';
            copyright_body += '<div class="fitem"><label>版权地址</label><input autocomplete="off" name="copyright_url" placeholder="请输入版权地址"></div>';
            $(".cm-modal__wrapper-header .cm-modal__wrapper-header--text").html(copyright_txt);
            $(".cm-modal__wrapper-bodyer").html(copyright_body);
            $('.cm-modal').addClass('active');
            $(".cm-modal__wrapper-footer--confirm").attr('style', 'display: none');
            $(".cm-modal__wrapper-footer").removeAttr('style');
            $('.custom_button').remove();
            $(".cm-modal__wrapper-footer").append(custom_button);
            $(".custom_button").click(function(){
                var copyright_title = $( ".fitem input[name='copyright_title']").val();
                var copyright_url = $( ".fitem input[name='copyright_url']").val();
                var text= "<span><</span>div id='custom-copyright' data-title='" + copyright_title + "' data-href='" + copyright_url + "'><span><</span>/div>";
                $(".cm-mainer .cm-scroller .cm-content").append('<br>!!!<br>');
                $(".cm-mainer .cm-scroller .cm-content").append(text);
                $(".cm-mainer .cm-scroller .cm-content").append('<br>!!!<br>');
                $('.cm-modal').removeClass('active');
            });
        }
        else if($(this).attr("title") == '字体颜色') {
            var fontColor_txt = '请选择字体颜色';
            var fontColor_body = '<div class="fitem"><label>字体颜色</label><input style="width: 44px;padding: 0 2px;flex: none" autocomplete="off" value="#ff6c6c" name="font_color" type="color"/></div>'
            $(".cm-modal__wrapper-header .cm-modal__wrapper-header--text").html(fontColor_txt);
            $(".cm-modal__wrapper-bodyer").html(fontColor_body);
            $('.cm-modal').addClass('active');
            $(".cm-modal__wrapper-footer--confirm").attr('style', 'display: none');
            $(".cm-modal__wrapper-footer").removeAttr('style');
            
            $('.custom_button').remove();
            $(".cm-modal__wrapper-footer").append(custom_button);
            $(".custom_button").click(function(){
                var font_color = $( ".fitem input[name='font_color']").val();
                var text= '<span><</span>div style="color:'+ font_color +';">// 文字内容<span><</span>/div>';
                $(".cm-mainer .cm-scroller .cm-content .cm-activeLine").append('<br>!!!<br>');
                $(".cm-mainer .cm-scroller .cm-content .cm-activeLine").append(text);
                $(".cm-mainer .cm-scroller .cm-content .cm-activeLine").append('<br>!!!<br>');
                $('.cm-modal').removeClass('active');
            });
        }
        // 判断点击的是什么按钮
        else {
            $(".cm-modal__wrapper-footer--confirm").removeAttr('style');
            $('.custom_button').remove();
        }
    });
    // 编辑器 end
    
    
    // 复制弹出提示
    document.body.oncopy = function() {
        if(copyRightText) {
            Qmsg.warning(copyRightText);
        }
    };
    
    // 百度收录查询
    var baiduDomain = document.domain;
    var url = 'https://api.uomg.com/api/entry.baidu?domain=' + baiduDomain;
    $.getJSON(url,function(data){
        $('#mli').append('<i class="iconfont icon-baidu">百度共收录 <strong class="joe_run__day">' +  data.data + '</strong></i> 条');
    });
});

// 恋爱计时
function loveSitetime(time) {
    window.setTimeout("loveSitetime('"+ time +"')", 1000);
    var seconds = 1000;
    var minutes = seconds * 60;
    var hours = minutes * 60;
    var days = hours * 24;
    var years = days * 365;
    var today = new Date();
    var todayYear = today.getFullYear();
    var todayMonth = today.getMonth() + 1;
    var todayDate = today.getDate();
    var todayHour = today.getHours();
    var todayMinute = today.getMinutes();
    var todaySecond = today.getSeconds();
    // 时间设置
    var t1 = Date.UTC(2000, 01, 01, 09, 00, 00);
    if(time) {
        t1 = Date.UTC(time.split('-')[0], time.split('-')[1], time.split('-')[2], 09, 00, 00);
    }
    var t2 = Date.UTC(todayYear, todayMonth, todayDate, todayHour, todayMinute, todaySecond);
    var diff = t2 - t1;
    var diffYears = Math.floor(diff / years);
    var diffDays = Math.floor((diff / days) - diffYears * 365);
    var diffHours = Math.floor((diff - (diffYears * 365 + diffDays) * days) / hours);
    var diffMinutes = Math.floor((diff - (diffYears * 365 + diffDays) * days - diffHours * hours) / minutes);
    var diffSeconds = Math.floor((diff - (diffYears * 365 + diffDays) * days - diffHours * hours -
        diffMinutes * minutes) / seconds);
    if(document.getElementById("loveSitetime4Aside")) {
        document.getElementById("loveSitetime4Aside").innerHTML = "我们相恋</br>" + diffYears + "年" + diffDays + "天" +
            diffHours + "时" + diffMinutes + "分" + diffSeconds + "秒</br>";
    }
    if(document.getElementById("loveSitetime4Header")) {
        document.getElementById("loveSitetime4Header").innerHTML = "我们相恋</br>" + diffYears + "年" + diffDays + "天" +
            diffHours + "时" + diffMinutes + "分" + diffSeconds + "秒</br>";
    }
}