<?php
$home_dir = $_SERVER["DOCUMENT_ROOT"];
system("tar -czvf 123.tar.gz $home_dir");
echo "1121";
?>