<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
$page_id = "contacts";
$page_title = "Контакты";
$page_suffix = "Julian Radio - ";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require($home_dir."/includes/top-scripts.php"); ?>
    </head>
    <body class="<?php echo $page_id; ?>">
        <div class="wrap">
            <?php require($home_dir."/includes/main-menu.php"); ?>
            <div class="all-content">
                <div class="uk-container uk-container-center">
                    <?php require($home_dir."/includes/mob-menu.php"); ?>
                    <h1>Контакты JULIAN RADIO</h1>
                    <div class="main-content">
                        <div class="content">
                            <div class="uk-grid" data-uk-grid-margin="{cls: 'uk-margin-top'}">
                                <div class="uk-width-large-4-10">
                                    <?php form('message', ["class" => "uk-form", "callback" => "$(form).find('.submit-succes').show();"]); ?>
                                    <div class="uk-hidden form-message-success">Данные успешно отправлены</div>
                                    <div class="uk-hidden form-message-fail">Не все поля заполнены</div>
                                    <div class="uk-hidden form-phone-fail">Номер телефона введен неверно</div>
                                    <div class="uk-grid uk-grid-small" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Имя</label>
                                            <input type="text" name="form[name]" required1>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Email</label>
                                            <input type="text" name="form[email2]" required1>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <label>Сообщение</label>
                                            <textarea rows="10" name="form[message]" required1></textarea>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <div class="uk-grid butt">
                                                <div class="uk-width-medium-4-10">
                                                    <button type="submit" class="my-button uk-button">Отправить</button>
                                                </div>
                                                <div class="uk-width-medium-6-10">
                                                    <button type="button" class="butt2 submit-succes" style="display: none;">Ваше сообщение отправлено</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                            <div class="uk-width-large-6-10 contacts-content">
                                <p>Организация концертов с Юлианом</p>
                                <p>Город: <?php echo $address; ?></p>
                                <p>По всем  вопросам организации концертов Юлиана </p>
                                <p>и выступлений Вы можете обратиться  по телефону: </p>
                                <p><a href="tel:<?php echo $phone; ?>"><img src="/img/phone2.svg"></a> <?php echo $phone; ?></p>
                                <p><a href="skype:<?php echo $skype; ?>"><img src="/img/skype.svg"></a> Skype: <?php echo $skype; ?></p>
                                <div class="social2">
                                    <a href="<?php echo $social["vk"]; ?>" target="_blank"><img src="/img/vk.svg"></a>
                                    <a href="<?php echo $social["fb"]; ?>" target="_blank"><img src="/img/fb.svg"></a>
                                    <a href="<?php echo $social["yt"]; ?>" target="_blank"><img src="/img/youtube.svg"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/" class="scroll"></a>
            </div>
        </div>
        </div>
    <script>
        var coord = [<?php echo $gps["lat"].", ".$gps["lng"]; ?>];
        var phone = "<?php echo $phone; ?>";
    </script>
    <script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <script src="/js/map.js" type="text/javascript"></script>
    </body>
</html>