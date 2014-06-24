<?php $this->inc('elements/header.php'); ?>

<div class="row">
    <div class="columns medium-3">
        <?php
        $a = new Area('Zone colonne droite');
        $a->display($c);
        ?>
    </div>
    <div class="columns medium-9">
        <?php
        $a = new Area('Zone principale');
        $a->display($c);
        ?>
    </div>
</div>

<?php $this->inc('elements/footer.php'); ?>
