<?php
/**
 * 归档
 * 
 * @package custom 
 * 
 **/
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <?php $this->need('public/include.php'); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('library/guidang/guidang.css'); ?>">
    <script src="<?php $this->options->themeUrl('library/guidang/guidang.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('assets/js/joe.post_page.min.js?v=20210430'); ?>"></script>
</head>
<body>
    <div id="Joe">
       <?php $this->need('public/header.php'); ?>
        <div class="joe_container">
            <div class="joe_main">
                <div class="joe_detail" data-cid="<?php echo $this->cid ?>">
                    <div id="archives">         
                        <div id="archives-content">   
                            <?php  
                                $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
                                $year=0; $mon=0; $i=0; $j=0;   
                                $all = array();   
                                $output = '';   
                                while($archives->next()):   
                                    $year_tmp = date('Y',$archives->created);   
                                    $mon_tmp = date('n',$archives->created);   
                    
                                    $y=$year; $m=$mon;   
                                    if ($mon != $mon_tmp && $mon > 0) $output .= '</div></div>';   
                                    if ($year != $year_tmp) {   
                                        $year = $year_tmp;   
                                        $all[$year] = array();   
                                    }   
                    
                                    if ($mon != $mon_tmp) {   
                                        $mon = $mon_tmp;   
                                        array_push($all[$year], $mon);   
                                        $output .= "<div class='archive-title' id='arti-$year-$mon'><h3 class='archive-title-title'><span class='archive-nva'></span>$year-$mon<span class='to_bottom'></span></h3><div class='archives archives-$mon' data-date='$year-$mon'>";   
                                    }   
                                    $output .= '<div class="brick"><a href="'.$archives->permalink .'"><span class="time">'.date('m-d',$archives->created).'</span>'.$archives->title .'<em>('. $archives->commentsNum.')</em></a></div>';   
                                endwhile;   
                                $output .= '</div></div>';   
                                echo $output;   
                            ?>  
                        </div>         
                    </div>
                    <?php $this->need('public/handle.php'); ?>
                    <?php $this->need('public/copyright.php'); ?>
                </div>
                <?php $this->need('public/comment.php'); ?>
            </div>
            <?php $this->need('public/aside.php'); ?>
        </div>
<?php $this->need('public/footer.php'); ?>
</body>
</html>