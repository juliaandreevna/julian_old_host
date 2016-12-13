<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
$page_id = "biography";
$page_title = "Биография";
$page_suffix = "Julian Radio - ";
$entrys = collection("Биография")->find(["public" => true])->sort(["sort" => 1])->toArray();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require($home_dir."/includes/top-scripts.php"); ?>
        <script src="/js/jquery.custom-scrollbar.js"></script>
    </head>
    <body class="<?php echo $page_id; ?>">
        <div class="wrap">
            <?php require($home_dir."/includes/main-menu.php"); ?>
            <div class="all-content">
                <div class="uk-container uk-container-center">
                    <?php require($home_dir."/includes/mob-menu.php"); ?>
                    <h1 class="h1-order">Биография Юлиана Васина</h1>
                    <div class="uk-clearfix"></div>
                    <div class="main-content">
                        <div class="content">
                            <div class="uk-grid" data-uk-grid-margin="{cls: 'uk-margin-top'}">
                                <div class="uk-width-large-1-2">
                                    <img src="/img/bio.jpg">
                                </div>
                                <div class="uk-width-large-1-2">
                                    <div class="bio-wrap uk-slidenav-position default-skin scrollable">
                                        <?php foreach($entrys as $entry){ ?>
                                        <?php echo $entry["text"]; ?>
                                        <?php }; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/concerts.php" class="scroll"></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(window).load(function () {
                $(".bio-wrap").customScrollbar();
            });
        </script>
    </body>
</html>