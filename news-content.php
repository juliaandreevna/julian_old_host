<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
require_once($home_dir."/includes/translit.php");
$page_id = "news content";
$page_suffix = "Julian Radio - ";

$entry_blog = collection("Новости")->findOne(["_id" => $_REQUEST["id"], "name_slug" => $_REQUEST["name"]]);
if(!isset($entry_blog) || empty($entry_blog)){
    header("Location:/");
    die;
}
$entrys = collection("Новости")->find(["public" => true])->sort(["date" => -1])->toArray();
$page_title = $entry_blog["name"];

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
                    <h1>Интересные материалы</h1>
                    <div class="main-content">
                        <div class="content">
                            <h2>Новости</h2>
                            <a class="back" href="/news.php">Вернуться обратно</a>
                            <h3><?php echo $entry_blog["name"]; ?></h3>
                            <div class="uk-grid uk-grid-width-1-1">
                                <div>
                                    <div class="blog-content">
                                        <img src="<?php echo thumbnail_url($entry_blog["photos"][0]["path"], 300, 250, ["mode" => "best_fit"]); ?>">
                                        <?php echo $entry_blog["description"]; ?>
                                        <div class="uk-clearfix"></div>
                                    </div>
                                    <div class="link">
                                       <?php 
                                        foreach($entrys as $key => $entry){ 
                                            if($entry["_id"] != $entry_blog["_id"]) continue;
                                        ?>
                                        <?php if(isset($entrys[$key - 1])){ ?>
                                        <a href="/news-content.php?name=<?php echo $entrys[$key - 1]["name_slug"]; ?>&id=<?php echo $entrys[$key - 1]["_id"]; ?>"><span><img src="/img/arrow-left.svg">Назад</span></a>
                                        <?php }; ?>
                                        <?php if(isset($entrys[$key + 1])){ ?>
                                        <a href="/news-content.php?name=<?php echo $entrys[$key + 1]["name_slug"]; ?>&id=<?php echo $entrys[$key + 1]["_id"]; ?>"><span>Вперед<img src="/img/arrow-right.svg"></span></a>
                                        <?php }; ?>
                                        <?php }; ?>
                                        

                                    </div>
                                </div>
                            </div>
                            <div class="uk-clearfix"></div>
                        </div>
                    </div>
                    <a href="/biography.php" class="scroll"></a>
                </div>
            </div>
        </div>
    </body>
</html>