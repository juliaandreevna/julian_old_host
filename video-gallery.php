<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
$page_id = "gallery video";
$page_title = "Видео";
$page_suffix = "Julian Radio - ";

$videos = collection("Видеогалерея")->find(["public" => true])->toArray();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require($home_dir."/includes/top-scripts.php"); ?>
        <link rel="stylesheet" href="/css/components/dotnav.min.css">
        <link rel="stylesheet" href="/css/components/slidenav.min.css">
        <script src="/js/components/lightbox.min.js"></script>
        <script src="/js/components/slideset.min.js"></script>
    </head>
    <body class="<?php echo $page_id; ?>">
        <div class="wrap">
            <?php require($home_dir."/includes/main-menu.php"); ?>
            <div class="all-content">
                <div class="uk-container uk-container-center">
                    <?php require($home_dir."/includes/mob-menu.php"); ?>
                    <h1 class="h1-order">Интересные материалы</h1>
                    <div class="uk-clearfix"></div>
                    <div class="main-content">
                        <div class="content">
                            <h2>Видео</h2>
                            <div class="uk-text-center" data-uk-slideset="{default: 8}">
                                <div class="uk-slidenav-position">
                                    <ul class="uk-grid uk-slideset uk-grid-width-large-1-4 uk-grid-width-medium-1-3 uk-grid-width-small-1-2" data-uk-grid-margin="{cls: 'mt15'}">
                                        <?php 
                                        foreach($videos as $video){ 
                                        $pieces = explode("/", $video["video"]);
                                        ?>
                                        <li>
                                            <a href="<?php echo $video["video"]; ?>" data-uk-lightbox data-lightbox-type="iframe">
                                                <p><?php echo $video["name"]; ?></p>
                                                <img src="http://img.youtube.com/vi/<?php echo end($pieces); ?>/0.jpg">
                                            </a>
                                        </li>
                                        <?php }; ?>
                                    </ul>
                                    <ul class="uk-slideset-nav uk-dotnav uk-flex-column uk-flex-center"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/gallery.php" class="scroll"></a>
                </div>
            </div>
        </div>
    </body>
</html>