        <div class="clearfix"></div>
        </section>  <!-- <section id="main"> -->

        <footer>
            <div>
            <?php
                $a = new GlobalArea('Pied de page');
                $a->display($c);
                ?>
            </div>
            <div>
                <? $u = new User(); ?>
                <? if (!$u->isRegistered()) : ?>
                    <a href="<?= $this->url('/login') ?>"><?= t('Connexion') ?></a>
                <? endif ?>
            </div>
        </footer>
    </section>   <!-- <section id="site"> -->

    <script src="<?php echo $this->getThemePath(); ?>/js/foundation.min.js"></script>
    <script src="<?php echo $this->getThemePath(); ?>/js/snap.svg-min.js"></script>
    <script src="<?php echo $this->getThemePath(); ?>/js/classie.js"></script>
    <script src="<?php echo $this->getThemePath(); ?>/js/svgLoader.js"></script>

    <script>
        $(document).foundation();
    </script>
    <?php Loader::element('footer_required'); ?>

</body>
</html>
