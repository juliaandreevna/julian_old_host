<div class="mob-menu">
    <a href="#mob-menu" data-uk-offcanvas><img src="/img/menu1.svg"></a>
</div>
<div id="mob-menu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <div class="logo">
            <a href="/">
                <img src="/img/logo.svg">
                <span class="navigation-primary-copy">JULIAN RADIO</span>
            </a>
        </div>
        <ul>
            <li><a class="active" href="/news.php.php">Новости</a></li>
            <li data-uk-dropdown><a href="/biography.php">Юлиан</a>
                <ul class="submenu uk-dropdown">
                    <li class="uk-animation-slide-top uk-animation-2"><a href="/concerts.php">Организация концертов</a></li>
                    <li class="uk-animation-slide-top uk-animation-2"><a href="/video-gallery.php">Видео</a></li>
                    <li class="uk-animation-slide-top uk-animation-2"><a href="/gallery.php">Фото</a></li>
                    <li class="uk-animation-slide-top uk-animation-2"><a href="/blog.php">Блог</a></li>
                </ul>
            </li>
            <li><a href="/program.php">Программа</a></li>
            <li><a href="/contacts.php">Контакты</a></li>
        </ul>
    </div>
</div>
<div class="social uk-flex-column uk-dotnav">
    <a href="skype:<?php echo $skype; ?>"><img src="/img/skype2.svg"></a>
    <a href="<?php echo $social["inst"]; ?>" target="_blank"><img src="/img/inst.svg"></a>
    <a href="<?php echo $social["mailru"]; ?>" target="_blank"><img src="/img/mailru.svg"></a>
    <a href="<?php echo $social["tw"]; ?>" target="_blank"><img src="/img/tw.svg"></a>
    <a href="<?php echo $social["vk"]; ?>" target="_blank"><img src="/img/vk.svg"></a>
    <a href="<?php echo $social["fb"]; ?>" target="_blank"><img src="/img/fb.svg"></a>
    <a href="<?php echo $social["yt"]; ?>" target="_blank"><img src="/img/youtube.svg"></a>
</div>
<?php if($page_id != "index"){ ?>
<div class="order-2">
    <p>Организация концертов</p>
    <p>Юлиана:
        <span>
            <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
        </span>
    </p>
</div>
<?php }; ?>