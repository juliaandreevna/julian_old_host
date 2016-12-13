<?php
$entrys2 = collection("Блог")->find(["public" => true])->toArray();
$tags = [];
$topics = [];
$dates[0] = date("d.m.Y");
foreach($entrys2 as $entry){
    if(isset($entry["tags"]) && !empty($entry["tags"])){
        foreach($entry["tags"] as $tag){
            if(array_search($tag, $tags) === false) $tags[translit($tag)] = $tag;
        }
    }

    if(isset($entry["topic"]) && $entry["topic"] != ""){
        if(array_search($entry["topic"], $topics) === false) $topics[translit($entry["topic"])] = $entry["topic"];
    }
    
    if(isset($entry["date"]) && $entry["date"] != ""){
        if(array_search(date("d.m.Y", strtotime($entry["date"])), $dates) === false) $dates[] = date("d.m.Y", strtotime($entry["date"]));
    }
};

//var_dump($dates);
?>
<link rel="stylesheet" href="/css/jquery-ui/jquery-ui.min.css">
<script src="/js/jquery-ui/jquery-ui.min.js"></script>
<script src="/js/jquery-ui/datepicker-ru.js"></script>
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
            <?php if($page_id == "blog content"){ ?> defaultDate: '<?php echo date("d.m.Y", strtotime($entry_blog["date"])); ?>',<?php }; ?>
            onSelect: function(date) {
                $(location).attr("href", "/blog.php?date=" + date);
            },
            firstDay: 1
        });
    });
</script>
<div class="blog-right">
    <p>Темы</p>
    <div class="thems">
        <ul>
            <?php foreach($topics as $key => $topic){ ?>
            <li <?php if(isset($_REQUEST["topic"]) && $_REQUEST["topic"] == $key) echo "class='active'"; ?>><a href="/blog.php?topic=<?php echo $key; ?>"><?php echo $topic; ?></a></li>
            <?php }; ?>
        </ul>
    </div>
    <p class="archive">Архив</p>
    <div id="datepicker"></div>
    <p>Теги</p>
    <ul class="tags">
        <?php foreach($tags as $key => $tag){ ?>
        <li <?php if(isset($_REQUEST["tag"]) && $_REQUEST["tag"] == $key) echo "class='active'"; ?>><a href="/blog.php?tag=<?php echo $key; ?>"><?php echo $tag; ?></a></li>
        <?php }; ?>
    </ul>
</div>