<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $page_suffix; echo $page_title; ?></title>
<link rel="stylesheet" href="/css/uikit.min.css">
<link rel="stylesheet" href="/css/main.css?v=<?php echo md5_file($home_dir."/css/main.css"); ?>">
<link rel="stylesheet" href="/css/components/notify.gradient.min.css">
<link rel="stylesheet" href="/css/jquery.custom-scrollbar.css">
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/uikit.min.js"></script>
<script src="/js/components/notify.min.js"></script>
<script src="/js/jquery.inputmask.js"></script>
<script>
    $(document).ready(function(){
        $(".phone_us").inputmask("mask", {"mask": "+7 (999) 999-9999"});
        $("[required1]").on("keypress", function () {
            $(this).removeClass("empty");
        });
        $(".submit-succes").on("click", function(){
            $(this).hide();
            return false;
        })
    });
</script>

<link rel="shortcut icon" href="/favicon/favicon.ico">
<link rel="icon" sizes="16x16 32x32 64x64" href="/favicon/favicon.ico">
<link rel="icon" type="image/png" sizes="196x196" href="/favicon/favicon-192.png">
<link rel="icon" type="image/png" sizes="160x160" href="/favicon/favicon-160.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96.png">
<link rel="icon" type="image/png" sizes="64x64" href="/favicon/favicon-64.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16.png">
<link rel="apple-touch-icon" href="/favicon/favicon-57.png">
<link rel="apple-touch-icon" sizes="114x114" href="/favicon/favicon-114.png">
<link rel="apple-touch-icon" sizes="72x72" href="/favicon/favicon-72.png">
<link rel="apple-touch-icon" sizes="144x144" href="/favicon/favicon-144.png">
<link rel="apple-touch-icon" sizes="60x60" href="/favicon/favicon-60.png">
<link rel="apple-touch-icon" sizes="120x120" href="/favicon/favicon-120.png">
<link rel="apple-touch-icon" sizes="76x76" href="/favicon/favicon-76.png">
<link rel="apple-touch-icon" sizes="152x152" href="/favicon/favicon-152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/favicon-180.png">
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="/favicon/favicon-144.png">
<meta name="msapplication-config" content="/favicon/browserconfig.xml">