<b  style="border:4px solid #3279fc; width:100%; display:block; overflow: hidden;"></b>
<footer id="footer" class="footer" >

    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info" style="color:<?=$get->footer_text_color?>">
                        <img src="<?= $get->assets_url.'/'.$get->logo ?>" alt="" style="max-height:70px">

                 <?= $get->footer_text ?>
    
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links  d-none d-sm-block d-sm-none d-md-block">
                    <h4>Quick Links</h4>
                    <ul>
                    <?php
                            foreach ($menus as $menu) {
                                echo '<li class="footer-txt">
                                        <a href=".' . $menu->url . '" target="' . $menu->target . '"  class="footer-link">' . $menu->title . '</a>
                                    </li>';
                            }
                            ?>
                    </ul>
                </div>

            
                <div class="col-lg-2 col-md-6 footer-links   d-none d-sm-block d-sm-none d-md-block">
                     
                    <ul>
                    <?php foreach ($extra_menus as $extra_bottom) { ?>
                                <?php if($extra_bottom->status  && $extra_bottom->show  && $extra_bottom->location === 'bottom') { ?>
                              <li>  <a href="<?= $extra_bottom->url ?>" class="p-2" style="width: 50%;
    text-align: center; background-color:<?= $extra_bottom->bg_color ?>; color:<?= $extra_bottom->text_color  ?>"> <?=$extra_bottom->title ?></a> </li>
                                <?php } ?>
        <?php } ?>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter" style="color:<?=$get->footer_text_color?>">
                    <h4>Contact Us


                    </h4>
                    <ul class="list-unstyled menu">
                       <?= isset($get->phone) ? ' <li><i class="bi bi-telephone mt-2 px-1"> </i> '. $get->phone  .'</li>' : null ?>
                       <?= isset($get->email) ? ' <li><i class="bi bi-envelope mt-2 px-1"> </i>'. $get->email .'</li>' : null ?>
                       <?= isset($get->address) ? ' <li><i class="bi bi-geo-alt mt-2 px-1"></i>'. $get->address .'</li>' : null ?>
                    </ul>

                </div>

            </div>
            <hr>
                        <!-- <div style="color:<?=$get->footer_text_color?>; font-size:13px; line-height:1.5; margin-bottom:10px; text-align: center">
                            © 2025 Amber Rock Trade Ltd, registered at Level 5, Alexander House, 
                            35 Cybercity, 72201 Ebene, Mauritius, Company No: 222594.<br>
                            This website is operated by Amber Rock Trade Ltd.<br>
                            Payment processing is handled by our authorized payment agent B-tech Ltd,
                            registered in Cyprus, Company No: HE 414065.
                        </div> -->

                        <div class="row">
  <div class="col-12">
    <div style="color:<?=$get->footer_text_color?>; font-size:13px; line-height:1.5; padding-bottom:10px; text-align:center;">
      © 2025 Amber Rock Trade Ltd, registered at Level 5, Alexander House, 
      35 Cybercity, 72201 Ebene, Mauritius, Company No: 222594.<br>
      This website is operated by Amber Rock Trade Ltd.<br>
      Payment processing is handled by our authorized payment agent B-tech Ltd,
      registered in Cyprus, Company No: HE 414065.
    </div>

    <div style="color: white !important; font-size:13px;  padding-bottom:10px; text-align:center;">
      <b>Risk Warning:</b> Trading derivative financial products with TraderTok <br/>involves a high level of risk
      and may not be suitable for all investors. You could lose all your invested <br/>capital and should
      only trade with funds you can afford to lose. Before opening any position, ensure you
      understand the risks, your investment objectives, <br/>and your level of experience. Please
      consult our full Risk Disclosure Statement for more information.
    </div>
  </div>
</div>

            <div class="row">
                <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                    <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                        <?= isset($get->facebook_url) ? '<a href="' . $get->facebook_url . '" target="_blank" class="footer-link"><i class="bi bi-facebook"></i></a>' : null ?>
                <?= isset($get->instagram_url) ? '<a href="' . $get->instagram_url . '" target="_blank" class="footer-link"><i class="bi bi-instagram"></i></a>' : null ?>
                <?= isset($get->twitter_url) ? '<a href="' . $get->twitter_url . '" target="_blank" class="footer-link"><i class="bi bi-twitter"></i></a>' : null ?>
                    </div>
                    <!-- <div class="d-flex flex-column align-items-center align-items-lg-start">
                        <div class="copyright" style="color:<?=$get->footer_text_color?>">
                            &copy; Copyright <strong><span><?= $get->title ?></span></strong>. All Rights Reserved
                        </div>

                    </div> -->

                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>
<?= $theme->js_files ?>

<script>
    $(document).ready(function() {
        <?= $theme->custom_js ?>
    });
</script>

<style>
    
    section {
        padding: 101px 0; 
    }



    :root {
    --color-primary: <?=$get->bg_color ?>;
    }
    .registerform .container {
        background:<?=$get->bg_color ?> ;
    }
    .block-title {
        color:<?=$get->text_color ?>  ;
    }
    .testimonials p {      
        color:<?=$get->text_color ?>  ;
    }
    .bg-light-orange {
        background-color:<?=$get->bg_color ?>  ;
        color:<?=$get->footer_text_color ?>;
    }
    .footer .footer-content {
        background:<?=$get->footer_bg_color ?> ;
    }
    .btnregister {
        background:<?=$get->btn1_bg_color ?> ;
        border:<?=$get->btn1_text_color ?>  ;
        color:<?=$get->btn1_text_color?>;
    }
    .header.sticked {
        background:<?=$get->navbar_bg_hover_color ?> ;
    }

    .header {
        background:<?= $page ? $get->navbar_bg_hover_color : $get->navbar_bg_color ?> ;
        
    }


    .footer .footer-content .footer-links ul a {
        color:<?=$get->footer_text_color ?> ;
    }
    .color-black {
        color:<?=$get->text_color ?> !important ;
    }
    .hero p {
        color:<?=$get->footer_text_color ?> !important ;
    }
    .contactus .btn-get-started:hover { 

        background: <?=$get->bg_color?>;

    }
    .contactus .btn-get-started {
        background: <?=$get->btn2_bg_color?>;
        color:<?=$get->btn2_text_color?>; 
    }

     .navbar .dropdown a:hover, .navbar .dropdown .active, .navbar .dropdown .active:focus, .navbar .dropdown:hover>a {
        background:<?=$get->menu_bg_hover_color ?> ;
        color:<?=$get->menu_text_hover_color?>
    } 
 


    .navbar .dropdown ul a:hover, .navbar .dropdown ul .active, .navbar .dropdown ul .active:hover, .navbar .dropdown ul li:hover>a {
        background: <?=$get->menu_bg_hover_color?>;
        color:<?=$get->menu_text_hover_color?>; 
    }

    .navbar .dropdown ul a {
        background: <?=$get->menu_bg_color?>;
        color:<?=$get->menu_text_color?>!important; 
    }

    .header.sticked .navbar a {
        color:<?=$get->navbar_text_hover_color?>!important;
    }
    .list-group-item.active{
                background-color: <?= $get->bg_color ?>;
                border-color: <?= $get->bg_color ?>;
            }
            
.btn-primary {
    color:<?=$get->btn1_text_color?>;
    background-color: <?=$get->btn1_bg_color?>;
    border-color: <?=$get->btn1_bg_color?> ;
    
}

.btn-primary:hover {
    color:<?=$get->btn1_text_color?>;
    background-color: <?=$get->btn1_bg_color?>;
    border-color: <?=$get->btn1_bg_color?> ;
    
}
    <?= $theme->custom_css ?>

</style>

<?= $get->footer_code ?>
<?php 
            if(isset($popups) && count($popups) ){
                $popup = $popups[0];
        ?>
            <script type="text/javascript">
                $(window).on('load',function(){
                    setTimeout(() => {
                        $('#exampleModal').modal('show');
                    }, <?= ($popup->acilma_suresi*1000) ?>);
                });
            </script>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $popup->title ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <?= $popup->content ?>
                            <img src="<?= $get->assets_url.'/'.$popup->image ?>" alt="<?= $popup->title ?>" class="img-fluid">
                        </div>
                        
                        </div>
                    </div>
                </div>
        <?php } ?>
</body>

</html>