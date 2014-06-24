<?php
defined('C5_EXECUTE') or die("Access Denied.");

$th = Loader::helper('text');
$ih = Loader::helper('image');

if (count($pages) < 8) {
    for ($i = count($pages); $i < 8; $i++) {
        $pages[] = $pages[0];
    }
}

?>

<div class="row projets-list">
    <?php foreach ($pages as $page):

        // Prepare data for each page being listed...
        $title = $th->entities($page->getCollectionName());
        $url = $nh->getLinkToCollection($page);
        $target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
        $target = empty($target) ? '_self' : $target;


        $img = $page->getAttribute('image_handle');
        ?>

        <div class="columns large-3 medium-4 small-12">
            <div class="projet" style="background-image: url('<?php echo $img->getRelativePath(); ?>')">
                <a href="<?php echo $url ?>" target="<?php echo $target ?>">
                    <div class="title">
                        <?php echo $title ?>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
