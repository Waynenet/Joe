<?php 

    // 收款设置
    $ZNPaySet = new Typecho_Widget_Helper_Form_Element_Select(
        'ZNPaySet',
        array(
            'on' => '开启（默认）',
            'off' => '关闭',
        ),
        'on',
        '是否启用打赏功能',
        '介绍：开启后，文章底部展示打赏功能。'
    );
    $ZNPaySet->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZNPaySet->multiMode());
    
    
	$ZNAlipay = new Typecho_Widget_Helper_Form_Element_Text(
        'ZNAlipay',
        NULL,
        NULL,
        '支付宝收款码',
        '介绍：填写此处，打赏界面展示支付宝收款码，图片地址 <br />'
    );
    $ZNAlipay->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZNAlipay->multiMode());
    
    $ZNWeChat = new Typecho_Widget_Helper_Form_Element_Text(
        'ZNWeChat',
        NULL,
        NULL,
        '微信收款码',
        '介绍：填写此处，微信界面展示微信收款码，图片地址 <br />'
    );
    $ZNWeChat->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ZNWeChat->multiMode());



    $JBarragerStatus = new Typecho_Widget_Helper_Form_Element_Select(
        'JBarragerStatus',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启弹幕功能（仅限PC）',
        '介绍：开启后，网站将会显示评论弹幕功能，该功能采用CSS动画引擎，并非传统JS操作DOM，无任何性能消耗。'
    );
    $JBarragerStatus->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JBarragerStatus->multiMode());
    
    // 在线人数设置
    $onlinePersion = new Typecho_Widget_Helper_Form_Element_Select(
        'onlinePersion',
        array(
            'on' => '开启（默认）',
            'off' => '关闭',
        ),
        'on',
        '是否启用在线人数统计',
        '介绍：开启后，文章底部展示当前在线人数'
    );
    $onlinePersion->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($onlinePersion->multiMode());
    
    // 文章阅读时长设置
    $onlineTime = new Typecho_Widget_Helper_Form_Element_Select(
        'onlineTime',
        array(
            'off' => '关闭（默认）',
            'on' => '开启',
        ),
        'off',
        '是否启用文章阅读时长统计',
        '介绍：开启后，文章底部展示文章字数，预计阅读时长和已阅读时长'
    );
    $onlineTime->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($onlineTime->multiMode());
    
    // 手机端登录
    $login4Phone = new Typecho_Widget_Helper_Form_Element_Select(
        'login4Phone',
        array(
            'off' => '关闭（默认）',
            'on' => '开启',
        ),
        'off',
        '是否启用手机端登录功能',
        '介绍：开启后，手机端侧边栏将展示登录功能和登录后的操作'
    );
    $login4Phone->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($login4Phone->multiMode());
    
    // 全站置灰
    $websiteChgGray = new Typecho_Widget_Helper_Form_Element_Select(
        'websiteChgGray',
        array(
            'off' => '关闭（默认）',
            'on' => '开启',
        ),
        'off',
        '是否启用全站置灰',
        '介绍：开启后，网站所有信息全部变成黑白'
    );
    $websiteChgGray->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($websiteChgGray->multiMode());
    
    $JPrevent = new Typecho_Widget_Helper_Form_Element_Select(
        'JPrevent',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '请选择是否开启QQ跳转浏览器功能',
        '介绍：开启后，如果在QQ里打开网站，则会提示跳转浏览器打开'
    );
    $JPrevent->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JPrevent->multiMode());
    
    // 互动读者
    $JactiveUsers = new Typecho_Widget_Helper_Form_Element_Select(
        'JactiveUsers',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启互动读者',
        '介绍：显示评论相关用户'
    );
    $JactiveUsers->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($JactiveUsers);
    
    // 纯数字评论无需审核
    $CommentPass4Num = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentPass4Num',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启纯数字评论无需审核',
        '介绍：开启后，如果评论都是数字则无需审核'
    );
    $CommentPass4Num->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentPass4Num);
    
    
    $CnzzId = new Typecho_Widget_Helper_Form_Element_Text(
        'CnzzId',
        NULL,
        NULL,
        'cnzz站点ID',
        '介绍：填写此处用于展示cnzz统计，申请地址 https://www.umeng.com/web'
    );
    $CnzzId->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CnzzId->multiMode());
    
    $CnzzType = new Typecho_Widget_Helper_Form_Element_Select(
        'CnzzType',
        array(
            'off' => '关闭（默认）',
            'https://s4.cnzz.com/z_stat.php?id=CnzzId&web_id=CnzzId' => '文字形式',
            'https://s4.cnzz.com/z_stat.php?id=CnzzId&show=pic' => '图片样式1',
            'https://s4.cnzz.com/z_stat.php?id=CnzzId&show=pic1' => '图片样式2',
            'https://s4.cnzz.com/z_stat.php?id=CnzzId&show=pic2' => '图片样式3',
            'https://s4.cnzz.com/z_stat.php?id=CnzzId&online=2' => '在线人数',
            'https://s4.cnzz.com/z_stat.php?id=CnzzId&online=1&show=line' => '横排数据显示',
        ),
        'off',
        '选择cnzz样式',
        '介绍：开启时请填写cnzz站点ID'
    );
    $CnzzType->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CnzzType->multiMode());
    
    // 海报
    $Haibao = new Typecho_Widget_Helper_Form_Element_Select(
        'Haibao',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启底部海报功能',
        '介绍：开启后，文章底部展示生成海报按钮'
    );
    $Haibao->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($Haibao);
    
    // 今日文章
    $TodayArchive4Phone = new Typecho_Widget_Helper_Form_Element_Select(
        'TodayArchive4Phone',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启手机侧边栏今日文章',
        '介绍：开启后，手机端侧边栏展示今日文章数量'
    );
    $TodayArchive4Phone->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($TodayArchive4Phone);
    
    // 评论楼层
    $CommentFloor = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentFloor',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启评论楼层',
        '介绍：开启后，评论右侧展示该评论所属楼层'
    );
    $CommentFloor->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentFloor);
    
    // 评论等级
    $CommentLevel = new Typecho_Widget_Helper_Form_Element_Select(
        'CommentLevel',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启评论等级',
        '介绍：开启后，评论部分展示评论者的等级'
    );
    $CommentLevel->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CommentLevel);
    
    // 复制内容弹窗提醒
    $CopyRightText = new Typecho_Widget_Helper_Form_Element_Text(
        'CopyRightText',
        NULL,
        NULL,
        '网站复制时提醒内容',
        '介绍：填写此处，有人复制网站内容则弹出该提示 <br />'
    );
    $CopyRightText->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CopyRightText->multiMode());

   // 自定义公告
    $gonggao_set = new Typecho_Widget_Helper_Form_Element_Select('gonggao_set',
        array('1' => '关闭（默认）', '0' => '开启'),
    '1', _t('是否在首页显示公告内容'), _t('开启则会在打开首页时弹窗'));
    $gonggao_set->setAttribute('class', 'joe_content joe_custom');
    $form -> addInput($gonggao_set);  

     // 自定义公告内容
    $gonggao = new Typecho_Widget_Helper_Form_Element_Text('gonggao', null, null, _t('公告内容'), _t('在这里填入你的公告，不填则不输出。'));
    $gonggao->setAttribute('class', 'joe_content joe_custom');
    $form -> addInput($gonggao);

    // 版权声明
    $CopyRightContent = new Typecho_Widget_Helper_Form_Element_Select(
        'CopyRightContent',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启文章底部版权声明',
        '介绍：开启后，文章底部展示版权声明及转载提示'
    );
    $CopyRightContent->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($CopyRightContent);
    
    // 百度收录
    $BaiduDomain = new Typecho_Widget_Helper_Form_Element_Select(
        'BaiduDomain',
        array('off' => '关闭（默认）', 'on' => '开启'),
        'off',
        '是否开启百度收录查询',
        '介绍：开启后，底部展示百度收录条数'
    );
    $BaiduDomain->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($BaiduDomain);

    // 最新文章
    $ShowNewArticle = new Typecho_Widget_Helper_Form_Element_Select(
        'ShowNewArticle',
        array(
            'off' => '关闭',
            '1' => '一天内',
            '2' => '二天内',
            '3' => '三天内',
            '4' => '四天内',
            '5' => '五天内',
        ),
        'off',
        '选择最新文章标记天数',
        '介绍：最新文章在标题左侧显示最新文章标志，选择显示最近几天的最新文章'
    );
    $ShowNewArticle->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($ShowNewArticle->multiMode());
        
    // 恋爱计时
    $LoveTime = new Typecho_Widget_Helper_Form_Element_Textarea(
        'LoveTime',
        NULL,
        NULL,
        '侧边栏恋爱计时',
        '格式：你的QQ号 || 你对象的QQ号 || 恋爱时间<br/>
            例如：123456 || 45678 || 2021-01-04'
    );
    $LoveTime->setAttribute('class', 'joe_content joe_custom');
    $form->addInput($LoveTime);
?>