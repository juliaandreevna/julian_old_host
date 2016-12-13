<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/contacts.php");
$page_id = "concerts";
$page_title = "Концерты";
$page_suffix = "Julian Radio - ";
$entrys = collection("Афиша")->find(["public" => true])->toArray();

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
                    <h1 class="h1-order">Концерты и выступления  с Юлианом</h1>
                    <div class="uk-clearfix"></div>
                    <div class="main-content">
                        <div class="content">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-large-4-10 left">
                                    <h3>Организация концертов с Юлианом</h3>
                                    <p>По всем  вопросам организации концертов и выступлений Вы можете обратиться  по телефону:</p>
                                    <div class="phone"><?php echo $phone; ?></div>
                                    <p>Или задать вопрос  на прямую концертному директору</p>
                                    <?php form('order_concert', ["class" => "uk-form", "callback" => "$(form).find('.submit-succes').show();"]); ?>
                                        <div class="uk-hidden form-message-success">Данные успешно отправлены</div>
                                        <div class="uk-hidden form-message-fail">Не все поля заполнены</div>
                                        <div class="uk-hidden form-phone-fail">Номер телефона введен неверно</div>
                                        <input type="text" placeholder="Как Вас зовут?" name="form[name]" required1>
                                        <input class="uk-margin-top phone_us" type="text" placeholder="Ваш телефон" name="form[phone]" required1>
                                        <textarea contenteditable="true" rows="4" placeholder="Напишите свой вопрос" name="form[message]" required1></textarea>
                                        <button type="submit" class="my-button uk-button">Отправить</button>
                                        <button type="button" class="butt2 submit-succes" style="display: none;">Ваше сообщение отправлено</button>
                                    </form>
                                </div>
                                <div class="uk-width-large-6-10">
                                    <div class="affiche">
                                        <h2>Афиша</h2>
                                        <ul>
                                            <?php
                                                $date = "";
                                                foreach($entrys as $entry){ 
                                            ?>
                                            <li>
                                                <?php if($date != $entry["date"]){ $date = $entry["date"]; ?>
                                                <div class="date"><?php echo date("d.m Y", strtotime($date)); ?></div>
                                                <?php }; ?>
                                                <img src="<?php echo thumbnail_url($entry["photos"][0]["path"], 60, 60, ["mode" => "crop"]); ?>">
                                                <p class="p1"><?php echo $entry["place"]; ?></p>
                                                <p class="p2"><?php echo $entry["name"]; ?></p>
                                                <a href="#my-id2" class="ticket">Заказать Билеты</a>
                                            </li>
                                            <?php }; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="my-id2" class="uk-modal order">
                                <div class="uk-modal-dialog">
                                    <a class="uk-modal-close uk-close"></a>
                                    <?php form('order_event', ["class" => "uk-form"]); ?>
                                        <div class="uk-hidden form-message-success">Данные успешно отправлены</div>
                                        <div class="uk-hidden form-message-fail">Не все поля заполнены</div>
                                        <div class="uk-hidden form-phone-fail">Номер телефона введен неверно</div>
                                        <div class="uk-form-row">
                                            <label class="uk-form-label" for="form-s-it">Ваше имя</label>
                                            <div class="uk-form-controls">
                                                <input type="text" name="form[name]" required1>
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <label class="uk-form-label" for="form-s-it">Укажите телефон</label>
                                            <div class="uk-form-controls">
                                                <input type="text" class="phone_us" placeholder="+7 (ХХХ) ХХХ-ХХ-ХХ" name="form[phone]" required1>
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <label class="uk-form-label star-none" for="form-s-it">Мероприятие</label>
                                            <div class="uk-form-controls">
                                                <input type="text" name="form[event]" readonly>
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <button class="my-button uk-width-100" type="submit">ЗАКАЗАТЬ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/video-gallery.php" class="scroll"></a>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                var modal = UIkit.modal("#my-id2");
                $(".affiche ul li a.ticket").on("click", function(){
                    var p1 = $(this).siblings(".p1").text();
                    var p2 = $(this).siblings(".p2").text();
                    modal.find("input[readonly]").attr("value", p1 + ", " + p2);
                    modal.show();
                    return false;
                })
            });
        </script>
    </body>
</html>