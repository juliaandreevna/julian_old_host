<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
$page_id = "about-channel";
$page_title = "О канале";
$page_suffix = "Julian Radio - ";
$entrys = collection("О канале")->find(["public" => true])->sort(["sort" => 1])->toArray();

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
                    <h1>О канале  JULIAN RADIO</h1>
                    <div class="main-content">
                        <div class="content">
                            <div class="uk-grid" data-uk-grid-margin="{cls: 'uk-margin-top'}">
                                <?php $i = 1; foreach($entrys as $entry){ ?>
                                <div class="uk-width-medium-3-10 <?php if(count($entrys) % $i == 1) echo "uk-push-7-10"; ?> uk-text-center">
                                    <h2><?php echo $entry["name"]; ?></h2>
                                    <img src="<?php echo thumbnail_url($entry["photos"][0]["path"], 350, 250, ["mode" => "best_fit"]); ?>">
                                </div>
                                <div class="uk-width-medium-7-10 <?php if(count($entrys) % $i == 1) echo "uk-pull-3-10"; ?> p-marg">
                                    <p><?php echo $entry["text"]; ?></p>
                                </div>
                                <?php $i += 1; }; ?>
                            </div>
                        </div>
                    </div>
                    <a href="/concerts.php" class="scroll"></a>
                </div>
            </div>
        </div>
    </body>
</html>