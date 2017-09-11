<?php
$zip = new ZipArchive;
if(true === ($zip->open('../geophoto/test.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE))){
    $zip->addFile('../geophoto/geotag_28_site_ggg_170911_050344.jpg', 'text1.jpg');
    $zip->addFile('../geophoto/geotag_28_site_ggg_170911_050329.jpg', 'text2.jpg');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}
?>