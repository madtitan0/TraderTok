<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= $get->title ?></title>
    <meta name="description" content="<?= $get->desc ?>" />
    <meta name="keyw" content="<?= $get->keyw ?>" />
    <link rel="icon" href="<?= $get->assets_url.'/'.$get->favicon ?>" />
    <?= $theme->css_files ?>
    <?= $get->head_code ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<header id="header" class="header fixed-top" data-scrollto-offset="0"
     style="<?= !$page ? '' : 'background-color: #0A1F44; !important ' ?>">


<div class="container d-flex align-items-center justify-content-between" style="max-width: 1600px !important;, width: 100%;">

    <a href="./" class="logo d-flex align-items-center scrollto">

        <img src="<?= $get->assets_url.'/'.$get->logo ?>" alt="" style="max-height:100px">
    </a>

    <nav id="navbar" class="navbar navbar2" >
        <ul>

        <?php
                    foreach ($menus as $menu) {
                        echo '
                        <li class="nav-item navi-text ' . (count($menu->children) > 0 ? 'dropdown' : null) . ' ">
                            <a class="nav-link   navi-text  px-2 ' . (count($menu->children) > 0 ? 'dropdown-toggle' : null) . '   " href="' . ($menu->url ? './' . $menu->url : 'javascript:void(0)') . '">' . $menu->title . '</a>
                        ';
                        if ($menu->children) {
                            echo '<ul class="dropdown-menu " style="padding: 0; color: #ffffff !important;">';
                            foreach ($menu->children as $children) {
                                echo '
                                <li>
                                    <a class="dropdown-item" style="color: #ffffff !important;" href="./' . $children->url . '">' . $children->title . '</a>
                                </li>
                                ';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                    ?>
                <?php
                    if(!$get->blog == null){
                   echo  '<li class="nav-item navi-text " ><a style="font-size: 14px !important;" class="nav-link   navi-text  px-2" href="./blog" >Blog</a></li>' ;
                   } ?>
        <li class="nav-item navi-text" >
            <a style="font-size: 16px !important;" class="nav-link   navi-text  px-6" href="./contact-us" > Contact Us</a> 
        </li>

            
        </ul>
        <!-- <?php foreach ($extra_menus as $extra_top) { ?>
                                <?php if($extra_top->status  && $extra_top->show  && $extra_top->location === 'top') { ?>
                                <a href="<?= $extra_top->url ?>" class="p-2" style="background-color:<?= $extra_top->bg_color ?>; color:<?= $extra_top->text_color  ?> !important ; margin-right:7px !important; border-radius:0.25rem"> <?=$extra_top->title ?></a>
                                <?php } ?>
        <?php } ?> -->

                <div class="extra-buttons">
        <?php foreach ($extra_menus as $extra_top) { ?>
                                <?php if($extra_top->status  && $extra_top->show  && $extra_top->location === 'top') { ?>
                                     <a href="<?= $extra_top->url ?>" class="p-2 btn" style=""> <?=$extra_top->title ?></a>
                                <!-- <a href="<?= $extra_top->url ?>" class="p-2 btn" style="background-color:<?= $extra_top->bg_color ?>; color:<?= $extra_top->text_color  ?> !important ; margin-right:7px !important; border-radius:0.25rem"> <?=$extra_top->title ?></a> -->
                                <?php } ?>
        <?php } ?>
        </div>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>


    </nav><!-- .navbar -->

</div>

</header>



