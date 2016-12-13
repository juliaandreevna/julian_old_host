<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
$page_id = "program";
$page_title = "Программа";
$page_suffix = "Julian Radio - ";
if(!isset($_REQUEST["date"])){
    $date = date("Y-m-d");
    $curr_day = true;
    $entrys = collection("Программа")->find()->toArray();
} else {
    $date = date("Y-m-d", strtotime($_REQUEST["date"]));
    $entrys = collection("Программа")->find(["date" => $date])->toArray();
    $curr_day = false;
}


$dates[0] = date("d.m.Y");
$entrys2 = collection("Программа")->find()->toArray();
foreach($entrys2 as $entry){
    if(isset($entry["date"]) && $entry["date"] != ""){
        if(array_search(date("d.m.Y", strtotime($entry["date"])), $dates) === false) $dates[] = date("d.m.Y", strtotime($entry["date"]));
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require($home_dir."/includes/top-scripts.php"); ?>
        <link rel="stylesheet" href="/css/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="/css/components/dotnav.min.css">
        <script src="/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="/js/jquery-ui/datepicker-ru.js"></script>
        <script src="/js/components/slideset.min.js"></script>
        <script>
            var availableDates = <?php echo json_encode($dates); ?>;

            function addZero(i) {
                return (i < 10)? "0" + i: i;
            }

            function available(date) {
                dmy = addZero(date.getDate()) + "." + (addZero(date.getMonth()+1)) + "." + date.getFullYear();
                if ($.inArray(dmy, availableDates) != -1) {
                    return [true, ""];
                } else {
                    return [false,"","Записи отсутствуют"];
                }
            }

            $(function() {
                $( "#datepicker" ).datepicker({
                    beforeShowDay: available,
                    <?php if(isset($_REQUEST["date"]) && $_REQUEST["date"] != ""){ ?> defaultDate: '<?php echo $_REQUEST["date"]; ?>',<?php }; ?>
                    onSelect: function(date) {
                        $(location).attr("href", "/program.php?date=" + date);
                    },
                    firstDay: 1
                });
            });
        </script>
    </head>
    <body class="<?php echo $page_id; ?>">
        <div class="wrap">
            <?php require($home_dir."/includes/main-menu.php"); ?>
            <div class="all-content">
                <div class="uk-container uk-container-center">
                    <?php require($home_dir."/includes/mob-menu.php"); ?>
                    <div class="order-2">
                        <p>Организация концертов</p>
                        <p>Юлиана:
                            <span>
                                <a href="#!">+7 (926) 492-67-67</a>
                            </span>
                        </p>
                    </div>
                    <h1 class="h1-order">Программа телерадиоканала JULIAN RADIO</h1>
                    <div class="uk-clearfix"></div>
                    <div class="main-content">
                        <div class="content">
                            <div id="datepicker"></div>
                            <p class="">Здесь вы услышите и панк-рок композиции, и Кобзона, и лучшую поп-музыку, и самые новые «кислотные» новинки. На свои прямые эфиры Юлиан приглашает самых разных, но всегда очень интересных и талантливых людей, часто заставая их врасплох неожиданными и нестандартными вопросами. </p>
                            <div class="uk-clearfix"></div>
                            <?php if(empty($entrys)){ ?>
                            <h2 class="uk-text-danger uk-text-center">На эту дату программа отсутствует</h2>
                            <?php }; ?>
                            <div data-uk-slideset="{default: 8}">
                                <div class="uk-slidenav-position">
                                    <ul class="program-item uk-grid uk-slideset uk-grid-width-medium-1-2" data-uk-grid-margin="{cls: 'uk-margin-top'}">
                                        <?php foreach($entrys as $entry){ 
    if($curr_day && $entry["date"] < date("Y-m-d")) continue;
                                        ?>
                                        <li>
                                            <p class="uk-text-center uk-margin-remove"><?php echo date("d.m.Y", strtotime($entry["date"])); ?>, <?php echo $entry["time"]; ?></p>
                                            <img src="<?php echo thumbnail_url($entry["photos"][0]["path"], 200, 150, ["mode" => "best_fit"]); ?>">
                                            <p><?php echo $entry["text"]; ?></p>
                                        </li>
                                        <?php }; ?>
                                    </ul>
                                    <ul class="uk-slideset-nav uk-flex-column uk-dotnav uk-flex-center"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/contacts.php" class="scroll"></a>
                </div>
            </div>
        </div>
    </body>
</html>