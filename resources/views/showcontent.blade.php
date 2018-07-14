

<?php
foreach($contents as $content)
{
    echo '<hr>';
    print_r('Title: ')."\x20".print_r($content->title);
    echo '<br>';
    print_r('Content is: ')."\x20".print_r($content->content);
    echo '<br>';

}



?>





