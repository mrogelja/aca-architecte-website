<?php $this->inc('elements/header.php'); ?>

        <div class="columns large-5 medium-6 small-12">
            <?php
            $a = new Area('Zone description');
            $a->display($c);
            ?>
        </div>

        <div class="columns large-7 medium-6 small-12">
            <?php
            $a = new Area('Zone carrousel');
            $a->display($c);
            ?>
        </div>
<?php $this->inc('elements/footer.php'); ?>
