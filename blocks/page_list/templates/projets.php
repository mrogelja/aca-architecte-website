<?php
defined('C5_EXECUTE') or die("Access Denied.");

$th = Loader::helper('text');
$ih = Loader::helper('image');

//if (count($pages) < 8) {
//    for ($i = count($pages); $i < 8; $i++) {
//        $pages[] = $pages[0];
//    }
//}

?>

<div class="projets-list">
    <?php foreach ($pages as $page):
        // Prepare data for each page being listed...
        $title = $th->entities($page->getCollectionName());
        $url = $nh->getLinkToCollection($page);
        $target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
        $target = empty($target) ? '_self' : $target;


        $img = $page->getAttribute('image_handle');
        ?>

        <a class="projet" href="<?php echo $url ?>" target="<?php echo $target ?>">
            <div class="wrapper">
                <div class="thumb" style="background-image: url('<?php echo $img->getRelativePath(); ?>')"></div>
                <figcaption class="title">
                    <div class="text-wrapper">
                        <span>
                            <?php echo $title ?>
                        </span>
                    </div>
                </figcaption>
            </div>
        </a>
    <?php endforeach; ?>
</div>
