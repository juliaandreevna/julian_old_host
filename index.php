<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir . "/admin/bootstrap.php");
$page_id = "index";
require_once($home_dir . "/includes/contacts.php");
$page_title = "Главная";
$page_suffix = "Julian Radio - ";
require_once($home_dir . "/includes/ya-news.php");
$notices = collection("Анонсы")->find(["public" => true])->toArray();
?>
<!DOCTYPE html>
<html>
<head>
    <?php require($home_dir . "/includes/top-scripts.php"); ?>
</head>
<body class="<?php echo $page_id; ?>">
<div class="wrap">
    <?php require($home_dir . "/includes/main-menu.php"); ?>
    <div class="all-content">
        <div class="uk-container uk-container-center">
            <?php require($home_dir . "/includes/mob-menu.php"); ?>
            <!--<h1>Julian Radio - 10 лет в эфире</h1>-->
            <div class="main-content">
                <div class="content">
                    <div class="order">
                        <button class="my-button uk-button" data-uk-modal="{target:'#my-id'}">Заказать песню</button>
                        <div id="my-id" class="uk-modal">
                            <div class="uk-modal-dialog">
                                <a class="uk-modal-close uk-close"></a>
                                <?php form('order_song', ["class" => "uk-form"]); ?>
                                <div class="uk-hidden form-message-success">Данные успешно отправлены</div>
                                <div class="uk-hidden form-message-fail">Не все поля заполнены</div>
                                <div class="uk-hidden form-phone-fail">Номер телефона введен неверно</div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label star-none" for="form-s-it">От кого Имя</label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="form[name]">
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="form-s-it">Кому Имя</label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="form[for_name]" required1>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="form-s-it">Название песни</label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="form[song]" required1>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="form-s-it">Название города</label>
                                    <div class="uk-form-controls">
                                        <input type="text" name="form[city]" required1>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-form-controls">
                                        <textarea cols="30" rows="4" placeholder="Напишите пожелание"
                                                  name="form[message]"></textarea>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="form-s-it">Укажите телефон</label>
                                    <div class="uk-form-controls">
                                        <input type="text" class="phone_us" placeholder="+7 (ХХХ) ХХХ-ХХ-ХХ"
                                               name="form[phone]" required1>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <button class="my-button uk-width-100" type="submit">ОТПРАВИТЬ</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <ul class="notices">
                            <li>
                                <?php foreach ($notices as $notice) { ?>
                                    <p><?php echo $notice["text"]; ?></p>
                                <?php }; ?>
                            </li>
                        </ul>
                    </div>

                    <script type="text/javascript" src="/jplayer/jquery.jplayer.min.js"></script>
                    <script type="text/javascript">
                        //<![CDATA[
                        $(document).ready(function () {

                            var stream = {
                                    title: "Julian Radio",
                                    mp3: "http://45.62.245.147:8069/my.mp3"
                                },
                                ready = false;

                            $("#jquery_jplayer_1").jPlayer({
                                ready: function (event) {
                                    ready = true;
                                    $(this).jPlayer("setMedia", stream);
                                },
                                pause: function () {
                                    $(this).jPlayer("clearMedia");
                                },
                                error: function (event) {
                                    if (ready && event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET) {
                                        // Setup the media stream again and play it.
                                        $(this).jPlayer("setMedia", stream).jPlayer("play");
                                    }
                                },
                                swfPath: "/js/jplayer",
                                supplied: "mp3",
                                preload: "none",
                                wmode: "window",
                                useStateClassSkin: true,
                                autoBlur: false,
                                keyEnabled: true
                            });
                        });
                        //]]>
                    </script>

                    <div class="main-player">
                        <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                        <div id="jp_container_1" style="margin: 20px auto;" class="jp-audio-stream" role="application"
                             aria-label="media player">
                            <div class="jp-controls">
                                <div class="player-button">
                                    <button class="jp-play big-button" role="button" tabindex="0">
                                        <img src="/img/triangle.svg" role="button" class="play">
                                        <img src="/img/triangle-pause.svg" role="button" class="pause">
                                    </button>
                                </div>
                            </div>
                            <div class="jp-type-single">
                                <div class="jp-gui jp-interface">
                                    <div class="jp-volume-controls">
                                        <div class="player-line">
                                            <p id="ya-news">
                                                <?php foreach ($ya_news as $ya_new) { ?>
                                                    <span><?php echo $ya_new["name"]; ?> </span>
                                                <?php }; ?>
                                            </p>
                                            <span class="buffering"><span class="loading"></span></span>
                                            <div class="volume">
                                                <button class="jp-mute" role="button" tabindex="0">
                                                    <img src="/img/volume-all.png" class="on" style="width: 25px;">
                                                    <img src="/img/volume-all-off.png" class="off" style="width: 25px;">
                                                </button>
                                                <div class="jp-volume-bar">
                                                    <div class="volume-bar">
                                                        <div class="jp-volume-bar-value"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="music">
                        <div class="online">
                            <h2>Смотреть и слушать <span>онлайн</span></h2>
                            <ul class="browser">
                                <li><img title="Работает во всех браузерах" src="/img/chrome.svg"></li>
                                <li><img title="Работает во всех браузерах" src="/img/mozilla.svg"></li>
                                <li><img title="Работает во всех браузерах" src="/img/explorer.svg"></li>
                            </ul>
                        </div>
                        <div class="open">
                            <ul class="turntable">
                                <li><img title="Работает во всех плеерах" src="/img/vlc.svg"></li>
                                <li><img title="Работает во всех плеерах" src="/img/kmp.svg"></li>
                                <li><img title="Работает во всех плеерах" src="/img/media.svg"></li>
                            </ul>
                            <ul class="speed">
                                <li><a href="mms://wm5.spacialnet.com/Julian_Radio_wma32" class="my-button">32 кб/с</a>
                                </li>
                                <li><a href="mms://wm12.spacialnet.com/Julianradio" class="my-button">128 кб/с</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-order">
                        <p>Организация концертов Юлиана: <span> <a href="tel:+7 (926) 492-67-67">+7 (926) 492-67-67</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <a href="/news.php" class="scroll"></a>
        </div>
    </div>
</div>
<script src="/js/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(function () {
        $("#volume").slider({
            orientation: "horizontal",
            range: "min",
            max: 100,
            value: 80,
            //slide: function1,
            //change: function2
        });
    });
</script>
<script src="/js/jquery.simplemarquee.js"></script>
<script>
    $(document).ready(function () {
        $('#ya-news, ul.notices li').simplemarquee({
            speed: 35,
            cycles: 99,
            space: 50,
            delayBetweenCycles: 1000,
            handleHover: true,
            handleResize: false
        });
    });
</script>
<script src="/js/jquery.custom-scrollbar.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        if ($(window).width() > 500) {
            $(".main-content").customScrollbar();
        }
    });
    $(window).bind('orientationchange', function (event) {
    });
</script>
</body>
</html>