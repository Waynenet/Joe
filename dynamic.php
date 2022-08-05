<?php

/**
 * 动态
 * 
 * @package custom 
 * 
 **/

?>

<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php $this->need('public/include.php'); ?>
    <!-- 动态页面需要用到的CSS及JS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/joe.dynamic.min.css'); ?>">
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/prismjs@1.23.0/themes/prism-tomorrow.min.css">
    <script src="https://fastly.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>
    <script src="https://fastly.jsdelivr.net/npm/typecho-joe-next@6.2.4/plugin/prism/prism.min.js"></script>
    <script src="<?php $this->options->themeUrl('assets/js/joe.post_page.min.js'); ?>"></script>
</head>

<body>
    <div id="Joe">
        <?php $this->need('public/header.php'); ?>
        <div class="joe_container">
            <div class="joe_main">
                <?php $this->comments()->to($comments); ?>

                <div class="joe_dynamic">
                    <input type="hidden" class="joe_comment-url" value="<?php $this->commentUrl() ?>">
                    <?php if ($this->user->hasLogin()) : ?>
                        <div class="respond" id="comments">
                            <div class="title">有什么新鲜事想告诉大家？</div>
                            <form method="post" id="joe_dynamic-form" action="<?php $this->commentUrl() ?>">
                                <textarea name="text" id="joe_dynamic-form-text" class="OwO-textarea" autocomplete="off" rows="3" placeholder="发表您的新鲜事儿..."></textarea>
                                <input type="hidden" value="<?php $this->user->screenName(); ?>" name="author" />
                                <input type="hidden" value="<?php $this->user->mail(); ?>" name="mail" />
                                <input type="hidden" value="<?php $this->options->siteUrl(); ?>" name="url" />
                                <input type="hidden" name="_" value="<?php Typecho_Widget::widget('Widget_Security')->to($security);
                                                                        echo $security->getToken(Typecho_Request::getInstance()->getRequestUrl()); ?>">
                                <div class="form-foot">
                                    <div class="owo joe_owo__contain"></div>
                                    <button type="submit">立即发表</button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>

                    <?php $comments->listComments(['commentUrl' => $this->commentUrl, 'class' => $this]); ?>

                    <?php
                    $comments->pageNav(
                        '<svg class="icon icon-prev" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
                        '<svg class="icon icon-next" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="12" height="12"><path d="M822.272 146.944l-396.8 396.8c-19.456 19.456-51.2 19.456-70.656 0-18.944-19.456-18.944-51.2 0-70.656l396.8-396.8c19.456-19.456 51.2-19.456 70.656 0 18.944 19.456 18.944 45.056 0 70.656z"/><path d="M745.472 940.544l-396.8-396.8c-19.456-19.456-19.456-51.2 0-70.656 19.456-19.456 51.2-19.456 70.656 0l403.456 390.144c19.456 25.6 19.456 51.2 0 76.8-26.112 19.968-51.712 19.968-77.312.512zm-564.224-63.488c0-3.584 0-7.68.512-11.264h-.512v-714.24h.512c-.512-3.584-.512-7.168-.512-11.264 0-43.008 21.504-78.336 48.128-78.336s48.128 34.816 48.128 78.336c0 3.584 0 7.68-.512 11.264h.512v714.24h-.512c.512 3.584.512 7.168.512 11.264 0 43.008-21.504 78.336-48.128 78.336s-48.128-35.328-48.128-78.336z"/></svg>',
                        1,
                        '...',
                        array(
                            'wrapTag' => 'ul',
                            'wrapClass' => 'joe_pagination',
                            'itemTag' => 'li',
                            'textTag' => 'a',
                            'currentClass' => 'active',
                            'prevClass' => 'prev',
                            'nextClass' => 'next'
                        )
                    );
                    ?>

                    <?php
                    if ($this->user->hasLogin()) {
                        $GLOBALS['isLogin'] = true;
                    } else {
                        $GLOBALS['isLogin'] = false;
                    }
                    function threadedComments($comments, $options)
                    {
                        if ($comments->authorId) {
                            if ($comments->authorId == $comments->ownerId) {
                                $commentClass = 'comment-by-author';
                            }
                        }
                        $db = Typecho_Db::get();

                        $enable_comment = $options->class->fields->enable_comment ? true : false;
                        if (empty($options->class->fields->enable_comment)) $enable_comment = true;
                        if ($options->class->fields->enable_comment == '0') {
                            $enable_comment = false;
                        }
                    ?>
                        <li id="li-<?php $comments->theId(); ?>">
                            <div class="comment-parent">
                                <div class="title">
                                    <img class="avatar" src="<?php echo getavatar($comments->mail, $comments->authorId); ?>" alt="">
                                    <div class="desc">
                                        <div class="author"><?php $comments->author(); ?></div>
                                        <div class="time"><?php $comments->date('Y年m月d日 H:i:s A'); ?></div>
                                    </div>
                                </div>
                                <div class="content">
                                    <?php echo $comments->content; ?>
                                </div>
                                <div class="foot">
                                    <div class="count">
                                        <?php _getAgentOS($comments->agent); ?> · <?php _getAgentBrowser($comments->agent); ?>
                                    </div>
                                    <div class="action">
                                        <?php if ($enable_comment) : ?>
                                            <div class="item joe_comment-reply">
                                                <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M192.20044 889.784182c-5.7694 0-11.499915-1.948375-16.166191-5.752004-8.058536-6.568602-11.341303-17.36039-8.30413-27.303856l44.953841-147.1852c-32.112372-28.16855-57.808614-60.332087-76.510558-95.801926-22.242584-42.187845-33.520441-87.091544-33.520441-133.465734 0-46.033429 11.086499-91.113137 32.95046-133.983527 20.954241-41.085744 50.736545-78.111009 88.518033-110.047372 37.7293-31.891338 81.390705-56.961316 129.772622-74.516134 50.316989-18.256806 103.511515-27.513634 158.103878-27.513634s107.786888 9.256828 158.103878 27.513634c48.381917 17.554818 92.043323 42.624796 129.772622 74.516134 37.782511 31.936363 67.563792 68.961628 88.519056 110.047372 21.86396 42.87039 32.95046 87.949075 32.95046 133.983527 0 46.054919-11.127432 90.674139-33.072233 132.620483-20.960381 40.062438-50.846038 75.94467-88.829118 106.649995-77.020164 62.266136-179.103144 96.556103-287.444665 96.556103-48.505737 0-95.844905-6.853082-140.896984-20.384259l-166.652578 90.940199C200.60997 888.753713 196.394972 889.784182 192.20044 889.784182zM512 185.381128c-48.624441 0-95.946212 8.224312-140.652414 24.445762-42.679032 15.484669-81.099063 37.520545-114.194832 65.494667-32.56058 27.522844-58.119699 59.2218-75.968206 94.217848-18.158568 35.602869-27.365254 72.860425-27.365254 110.73708 0 75.558883 37.027311 146.786111 104.259552 200.562898 8.185426 6.547113 11.549034 17.425881 8.487302 27.451212l-31.588439 103.422488 121.153314-66.110697c6.187933-3.374864 13.493316-4.049223 20.193925-1.862417 43.084261 14.065344 88.731904 21.197788 135.676076 21.197788 197.501166 0 358.180705-127.69838 358.180705-284.661272 0-37.876656-9.206686-75.133188-27.365254-110.73708-17.847483-34.996049-43.407626-66.695005-75.968206-94.216825-33.095769-27.974122-71.516824-50.009997-114.194832-65.494667C607.946212 193.60544 560.623417 185.381128 512 185.381128z" p-id="22639"></path>
                                                    <path d="M704.922894 419.906535l-385.847835 0c-14.128789 0-25.582655-11.453866-25.582655-25.582655s11.453866-25.582655 25.582655-25.582655l385.847835 0c14.128789 0 25.582655 11.453866 25.582655 25.582655S719.051683 419.906535 704.922894 419.906535z" p-id="22640"></path>
                                                    <path d="M646.703935 603.093694 377.295042 603.093694c-14.128789 0-25.582655-11.453866-25.582655-25.582655s11.453866-25.582655 25.582655-25.582655l269.407869 0c14.128789 0 25.582655 11.453866 25.582655 25.582655S660.8317 603.093694 646.703935 603.093694z" p-id="22641"></path>
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php if ($comments->children) { ?>
                                <div class="list">
                                    <?php
                                    $arr = $comments->children;
                                    foreach ($arr as &$val) { ?>
                                        <div class="item" id="comment-<?php echo $val['coid']; ?>">
                                            <span class="name"><?php echo $val['author'] ?>：</span>
                                            <?php echo $val['text'] ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <?php if ($enable_comment) : ?>
                                <form no-pjax class="reply joe_dynamic-reply" action="<?php _e($options->commentUrl); ?>" method="post">
                                    <input type="hidden" name="parent" value="<?php $comments->coid(); ?>">
                                    <div class="head">
                                        <div class="list">
                                            <input autocomplete="off" placeholder="昵称（必填）" type="text" name="author" value="<?php $options->class->remember('author'); ?>">
                                        </div>
                                        <div class="list">
                                            <input autocomplete="off" placeholder="邮箱（必填）" type="text" name="mail" value="<?php $options->class->remember('mail'); ?>">
                                        </div>
                                        <div class="list"><input autocomplete="off" placeholder="网址（选填）" type="text" name="url" value="<?php $options->class->remember('url'); ?>"></div>
                                        <input type="hidden" name="_" value="<?php Typecho_Widget::widget('Widget_Security')->to($security);
                                                                                echo $security->getToken(Typecho_Request::getInstance()->getRequestUrl()); ?>">
                                    </div>
                                    <textarea name="text" placeholder="请输入回复内容..."></textarea>
                                    <div class="foot">
                                        <div></div>
                                        <button type="submit">发送</button>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </li>
                    <?php } ?>
                </div>
            </div>
            <?php $this->need('public/aside.php'); ?>
        </div>
        <?php $this->need('public/footer.php'); ?>
    </div>
</body>
<script>
    function changeURLArg(url, arg, arg_val) {
        let pattern = arg + '=([^&]*)';
        let replaceText = arg + '=' + arg_val;
        if (url.match(pattern)) {
            let tmp = '/(' + arg + '=)([^&]*)/gi';
            tmp = url.replace(eval(tmp), replaceText);
            return tmp;
        } else {
            if (url.match('[\?]')) {
                return url + '&' + replaceText;
            } else {
                return url + '?' + replaceText;
            }
        }
    }
    let dynamic = {
        init_dynamic_verify() {
            let isSubmit = false;
            $('#joe_dynamic-form').off('submit').on('submit', function(e) {
                e.preventDefault();
                let btn = $("#joe_dynamic-form .form-foot button")
                if ($('#joe_dynamic-form-text').val().trim() === '') {
                    return Qmsg.info('请输入发表内容！');
                }
                if ($(this).attr('data-disabled')) return;
                $(this).attr('data-disabled', true);
                if (isSubmit) return;
                isSubmit = true;
                btn.html('发送中...');
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serializeArray(),
                    dataType: 'text',
                    success(res) {
                        let arr = [],
                            str = '';
                        arr = $(res).contents();
                        Array.from(arr).forEach(_ => {
                            if (_.parentNode.className === 'container') str = _;
                        });
                        if (!/Joe/.test(res)) {
                            Qmsg.warning(str.textContent.trim() || '');
                            isSubmit = false;
                            btn.html('发表评论');
                        } else {
                            window.location.href = changeURLArg(location.href, 'scroll', 'dynamic');
                            window.location.reload();
                            Qmsg.success('发送成功，即将刷新本页！');
                        }
                    }
                });
            });
        }
    }
    $(document).ready(function() {
        /* 点击评论按钮显示隐藏评论区域 */
        $('.joe_comment-reply').unbind('click').bind('click', function(e) {
            e.stopPropagation();
            $(this).parents('li').find('.joe_dynamic-reply').toggle();

            /* 阻止事件传播 */
            $('.joe_dynamic-reply').on('click', e => e.stopPropagation())
            $('.joe_dynamic-reply').on('submit', function(e) {
                e.preventDefault()
                if ($(this).find("input[name='author']").val().trim() === '') {
                    return Qmsg.warning('请输入您的昵称！');
                }
                if (!/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test($(this).find("input[name='mail']").val())) {
                    return Qmsg.warning('请输入正确的邮箱！');
                }
                if ($(this).find("textarea[name='text']").val().trim() === '') {
                    return Qmsg.warning('请输入回复内容！');
                }
                if ($(this).attr('data-disabled')) return
                $(this).attr('data-disabled', true)
                $.ajax({
                    url: $('.joe_comment-url').val(),
                    type: 'POST',
                    data: $(this).serializeArray(),
                    dataType: 'text',
                    success(res) {
                        let arr = [],
                            str = '';
                        arr = $(res).contents();
                        Array.from(arr).forEach(_ => {
                            if (_.parentNode.className === 'container') str = _;
                        });
                        if (!/Joe/.test(res)) {
                            Qmsg.warning(str.textContent.trim() || '');
                            $(this).removeAttr('data-disabled')
                        } else {
                            window.location.href = changeURLArg(location.href, 'scroll', 'dynamic');
                            window.location.reload();
                            Qmsg.success('回复成功，即将刷新本页！');
                        }
                    }
                });
            })
        });
        dynamic.init_dynamic_verify()
    })
</script>

</html>