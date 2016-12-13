<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
require_once($home_dir."/includes/translit.php");
$page_id = "blog";
$page_title = "Блог";
$page_suffix = "Julian Radio - ";

$entrys = collection("Блог")->find(["public" => true])->sort(["date" => -1])->toArray();

foreach($entrys as $key => $entry){
    if(isset($_REQUEST["date"]) && $_REQUEST["date"] != date("d.m.Y", strtotime($entry["date"]))) unset($entrys[$key]);
    if(isset($_REQUEST["topic"]) && $_REQUEST["topic"] != translit($entry["topic"])) unset($entrys[$key]);
    if(isset($_REQUEST["tag"]) && array_search(translit($_REQUEST["tag"], true), $entry["tags"]) === false) unset($entrys[$key]);
};

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
                            <h2>Блог</h2>
                            <?php require($home_dir."/includes/blog-right.php"); ?>
                            <?php if(empty($entrys)){ ?><h2 class="uk-text-danger">Записи отсутствуют</h2><?php }; ?>
                            <div class="uk-grid" data-uk-grid-margin="{cls: 'uk-margin-top'}"  data-uk-grid-match="{target: 'h3'}">
                                <?php foreach($entrys as $entry){ ?>
                                <div class="uk-width-large-1-1">
                                    <div class="uk-grid uk-grid-small" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3 uk-text-center">
                                            <h3><?php echo date("d.m.Y", strtotime($entry["date"])); ?></h3>
                                            <img src="<?php echo thumbnail_url($entry["photos"][0]["path"], 350, 250, ["mode" => "best_fit"]); ?>">
                                        </div>
                                        <div class="uk-width-medium-2-3">
                                            <h3><?php echo $entry["name"]; ?></h3>
                                            <div class="blog-txt">
                                                <p><?php echo $entry["short_description"]; ?></p>
                                                <a href="/blog-content.php?name=<?php echo $entry["name_slug"]; ?>&id=<?php echo $entry["_id"]; ?>" class="my-button">Подробнее</a>
                                                <div class="uk-clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }; ?>
                            </div>
                            <div class="uk-clearfix"></div>
                        </div>
                    </div>
                    <a href="/program.php" class="scroll"></a>
                </div>
            </div>
        </div>
    </body>
</html>