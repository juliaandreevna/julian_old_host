<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
require_once($home_dir."/includes/translit.php");
$page_id = "news";
$page_title = "Блог";
$page_suffix = "Julian Radio - ";

$entrys = collection("Новости")->find(["public" => true])->sort(["date" => -1])->toArray();

?>
<!DOCTYPE html>
<html>

    <head>
        <?php require($home_dir."/includes/top-scripts.php"); ?>
        <link rel="stylesheet" href="/css/components/dotnav.min.css">
        <link rel="stylesheet" href="/css/components/slidenav.min.css">
        <script src="/js/components/lightbox.min.js"></script>
        <script src="/js/components/slideset.min.js"></script>
        <link rel="stylesheet" href="/css/jquery.custom-scrollbar.css">
        <script src="/js/jquery.custom-scrollbar.js"></script>
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
                            <h2>Новости</h2>
                            <div class="news-content">
                                <div class="uk-grid" data-uk-grid-margin="{cls: 'uk-margin-top'}" data-uk-grid-match="{target: 'h3'}">
                                    <?php foreach($entrys as $entry){ ?>
                                    <div class="uk-width-large-1-1 uk-row-first">
                                        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
                                            <div class="uk-width-medium-1-3 uk-text-center uk-row-first">
                                                <h3><?php echo date("d.m.Y", strtotime($entry["date"])); ?></h3>
                                                <img src="<?php echo thumbnail_url($entry["photos"][0]["path"], 350, 250, ["mode" => "best_fit"]); ?>">
                                            </div>
                                            <div class="uk-width-medium-2-3">
                                                <h3><?php echo $entry["name"]; ?></h3>
                                                <div class="blog-txt">
                                                    <p><?php echo $entry["short_description"]; ?></p>
                                                    <a href="/news-content.php?name=<?php echo $entry["name_slug"]; ?>&id=<?php echo $entry["_id"]; ?>" class="my-button">Подробнее</a>
                                                    <div class="uk-clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <a href="/biography.php" class="scroll"></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(window).load(function () {
                $(".news-content").customScrollbar();
            });
        </script>
    </body>

</html>