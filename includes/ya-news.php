<?php
$ya_news = []; $i = 0;
require_once($home_dir."/includes/phpQuery.php");
$news = file_get_contents("https://news.yandex.ru/index.rss");
$document = phpQuery::newDocument($news);
$hentrys = $document->find('item');
foreach ($hentrys as $new) {
    $pq = pq($new);
    $ya_news[$i]["name"] = $pq->find('title')->text();
    $ya_news[$i]["link"] = $pq->find('link')->text();
    $i += 1;
}
?>