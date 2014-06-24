<!DOCTYPE html>

<?php
$p = Page::getCurrentPage();
$isHome = $p instanceof Page && !$p->isError() && $p->getCollectionID() == HOME_CID;
?>

<html lang="<?= LANGUAGE ?>">
<head>
    <? Loader::element('header_required'); ?>

    <link rel="stylesheet" href="<?= $this->getThemePath(); ?>/css/foundation.css"/>
    <link rel="stylesheet" href="<?= $this->getThemePath(); ?>/css/fontello.css"/>
    <link rel="stylesheet" href="<?= $this->getThemePath(); ?>/css/typography.css"/>
    <link rel="stylesheet" href="<?= $this->getThemePath(); ?>/css/main.css"/>

    <script src="<?= $this->getThemePath(); ?>/js/modernizr.js"></script>
</head>

<body>

<div id="loader" class="pageload-overlay <? if (!$isHome): ?>force show pageload-loading<? endif ?>" data-opening="m 40,-80 190,0 -305,290 C -100,140 0,0 40,-80 z">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 80 60" preserveAspectRatio="none">
        <path d="m 75,-80 155,0 0,225 C 90,85 100,30 75,-80 z"/>
    </svg>
</div>

<section id="intro" class="container <? if ($isHome): ?>show<? endif ?>">
    <div class="center">
        <img src="<?= $this->getThemePath(); ?>/images/logos/aca-logo-white.png">

        <h2>AUDREY CERFONTAINE ARCHITECTE</h2>

        <div>
            <span>ARCHITECTURE</span><span>RENOVATION</span><span>SUIVI</span>
        </div>

        <div id="button-pass-intro" class="button medium">Entrer</div>
    </div>
</section>

<script>
    $(function () {
        var loader = new SVGLoader(document.getElementById('loader'), { speedIn: 200, easingIn: mina.linear });

        function passIntro(timing, jumpToUrl) {
            loader.show();

            setTimeout(function () {
                if (jumpToUrl) {
                    window.location.href = "<?php echo $this->url("projets") ?>";
                } else {
                    $("#loader").removeClass('force');
                    loader.hide();
                    $("#site").addClass('show');
                }
            }, timing);
        }

        $("#button-pass-intro").click($.proxy(passIntro, this, 400));

        <? if (!$isHome) : ?>
            passIntro(300);
        <? endif ?>
    });
</script>

<section id="site" class="container">
    <header>
        <nav class="top-bar" data-topbar>
            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="154.28571" height="74.285713"
                 style="left: 193px;">
                <g transform="translate(-0.04927173,-0.7806015)">
                    <path d="M 0.04927173,0.7806015 60.049268,75.066315 154.33498,0.7806015 z"
                          style="fill:#aeaeae;stroke:none"/>
                </g>
            </svg>

            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48.571423" height="74.285721"
                 style="left: 0; top: 120px;">
                <g transform="translate(137.38074,-296.20994)">
                    <path d="m -137.38074,296.20994 48.571423,74.28572 -48.333753,-0.75761 z"
                          style="fill:#aeaeae;stroke:none"/>
                </g>
            </svg>

            <ul class="title-area">
                <li class="name">
                    <a href="<?= $this->url('/') ?>">
                        <img height="100px" src="<?= $this->getThemePath(); ?>/images/logos/aca-logo.png"/>

                        <h1>AUDREY CERFONTAINE ARCHITECTE</h1>
                    </a>
                </li>
            </ul>

            <section class="top-bar-section">
                <?
                $nav = BlockType::getByHandle('autonav');
                $nav->controller->orderBy = 'display_asc';
                $nav->controller->displayPages = 'top';
                $nav->controller->displaySubPages = 'none';
                $nav->render('view');
                ?>
            </section>
            </div>
        </nav>
    </header>

    <section id="main">