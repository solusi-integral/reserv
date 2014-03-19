<?php 
header('Cache-Control: public, max-age=180, must-revalidate');
?>
<ul class="flat medium">
    <?php
    foreach ($last6 as $row){
        echo '<li><a href="data/edit/'. $row->ID .'" target="_blank"><span class="spark_bar small random_number_5 spark_inline"></span>'. $row->Name .' clicked '.$row->Location .' number '. $row->Number .' with '. $row->Results .' as the result.</a></li>';
    }
    ?>
</ul>