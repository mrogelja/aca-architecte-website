<?php $this->inc('elements/header.php'); ?>

<div class="row collapse">
    <div class="columns medium-6 small-12">
        <?php
        $a = new Area('Zone haut gauche');
        $a->display($c);
        ?>
    </div>

    <div class="columns medium-6 small-12">
        <?php
        $a = new Area('Zone haut droite');
        $a->display($c);
        ?>
    </div>
</div>


<div class="row collapse">
    <?php
    $a = new Area('Zone principale');
    $a->display($c);
    ?>
</div>

<?php $this->inc('elements/footer.php'); ?>
