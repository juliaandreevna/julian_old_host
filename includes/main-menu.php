<div class="navigation-primary">
    <ul class="navigation-primary-list">
        <li class="navigation-primary-item navigation-primary-item--home">
            <a href="/" class="navigation-primary-label">
                <span class="navigation-primary-label-inner">
                    <span class="navigation-primary-label-inner2">
                        <span class="navigation-primary-icon"><img src="/img/logo.svg"></span>
                        <span class="navigation-primary-copy">Julian Radio</span>
                    </span>
                </span>
            </a>
        </li>
        <li class="navigation-primary-item <?php if($page_id == "news") echo "active"; ?>">
            <a href="/news.php" class="navigation-primary-label" <?php// if($page_id == "index") echo 'target="_blank"'; ?>>
                <span class="navigation-primary-label-inner">
                    <span class="navigation-primary-label-inner2">
                        <span class="navigation-primary-icon"><img src="/img/news.svg"></span>
                        <span class="navigation-primary-copy">Новости</span>
                    </span>
                </span>
            </a>
        </li>
        <li class="navigation-primary-item navigation-primary-item--has-children <?php if($page_id == "biography") echo "active"; ?>">
            <a href="/biography.php" class="navigation-primary-label">
                <span class="navigation-primary-label-inner">
                    <span class="navigation-primary-label-inner2">
                        <span class="navigation-primary-icon"><img src="/img/interesting.svg"></span>
                        <span class="navigation-primary-copy">Юлиан</span>
                    </span>
                </span>
            </a>
            <div class="navigation-secondary navigation-secondary--children-2">
                <ul class="navigation-secondary-list">
                    <li class="navigation-secondary-item navigation-secondary-item-1 <?php if($page_id == "gallery video") echo "active"; ?>">
                        <a href="/video-gallery.php" class="navigation-secondary-label" <?php// if($page_id == "index") echo 'target="_blank"'; ?>>
                            <span class="navigation-secondary-label-inner">
                                <span class="navigation-secondary-label-inner2">
                                    <span class="navigation-secondary-icon"><img src="/img/video.svg"></span>
                                    <span class="navigation-secondary-copy">Видео</span>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="navigation-secondary-item navigation-secondary-item-2 <?php if($page_id == "gallery") echo "active"; ?>">
                        <a href="/gallery.php" class="navigation-secondary-label" <?php// if($page_id == "index") echo 'target="_blank"'; ?>>
                            <span class="navigation-secondary-label-inner">
                                <span class="navigation-secondary-label-inner2">
                                    <span class="navigation-secondary-icon"><img src="/img/photo.svg"></span>
                                    <span class="navigation-secondary-copy">Фото</span>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="navigation-secondary-item navigation-secondary-item-3 <?php if($page_id == "blog") echo "active"; ?>">
                        <a href="/blog.php" class="navigation-secondary-label" <?php// if($page_id == "index") echo 'target="_blank"'; ?>>
                            <span class="navigation-secondary-label-inner">
                                <span class="navigation-secondary-label-inner2">
                                    <span class="navigation-secondary-icon"><img src="/img/blog.svg"></span>
                                    <span class="navigation-secondary-copy">Блог</span>
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="navigation-primary-item <?php if($page_id == "concerts") echo "active"; ?>">
            <a href="/concerts.php" class="navigation-primary-label">
                <span class="navigation-primary-label-inner">
                    <span class="navigation-primary-label-inner2">
                        <span class="navigation-primary-icon"><img src="/img/concert.svg"></span>
                        <span class="navigation-primary-copy">Организация концертов</span>
                    </span>
                </span>
            </a>
        </li>
        <li class="navigation-primary-item <?php if($page_id == "contacts") echo "active"; ?>">
            <a href="/contacts.php" class="navigation-primary-label" <?php// if($page_id == "index") echo 'target="_blank"'; ?>>
                <span class="navigation-primary-label-inner">
                    <span class="navigation-primary-label-inner2">
                        <span class="navigation-primary-icon"><img src="/img/contacts.svg"></span>
                        <span class="navigation-primary-copy">Контакты</span>
                    </span>
                </span>
            </a>
        </li>
    </ul>
  
</div>
<script>
    $(document).ready(function () {
        $('ul.navigation-primary-list li.navigation-primary-item.navigation-primary-item--has-children').hover(
            function () {
                $(this).addClass("is-active");
            },
            function () {
                $(this).removeClass("is-active");
            });
    })
</script>