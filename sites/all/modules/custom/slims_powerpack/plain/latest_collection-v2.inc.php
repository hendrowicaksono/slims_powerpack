<?php
#echo 'latest collection version 2';
$base_url = variable_get('slims_url');
$current_collection_max = variable_get('current_collection_max');
$xml_url = $base_url.'index.php?resultXML=true&search=search&keywords=';
#echo $xml_url;
$d_arr = simplexml_load_file($xml_url);
#var_dump($d_arr);
$i = 0;
?>
<div class="item-list">
<ul>
<?php
foreach ($d_arr->mods as $k_01 => $v_01) {
  if ($i < $current_collection_max) {
    #echo '<li style="margin-bottom: 10px;">'.$v_01->attributes()->ID.'-<a href="?q=slims/recdetail/'.$v_01->attributes()->ID.'">'.$v_01->titleInfo->title.'</a></li>';
    echo '<li style="margin-bottom: 10px;">';

    echo '<div>';

    echo '<div style="width: 40px; float: left; padding-right: 5px; padding-top: 5px;">';
    if (!empty($v_01->children('slims', TRUE)->image)) {
      echo '<img src="'.$base_url.'/lib/phpthumb/phpThumb.php?src=../../images/docs/'.$v_01->children('slims', TRUE)->image.'&w=50" alt="" />';
    } else {
      echo '<img src="'.$base_url.'template/default/img/nobook.png'.'" alt="" />';
    }
    echo '</div>';

    echo '<div style="margin-top: 0px; padding-top: 0px;">';
    echo '<a href="?q=slims/recdetail/'.$v_01->attributes()->ID.'">'.$v_01->titleInfo->title.' '.$v_01->titleInfo->subTitle.'</a>';
    echo '</div>';

    echo '<div style="clear: both;"></div>';

    echo '</div>';

    echo '</li>';
  }
  $i++;
}
?>
</ul>
</div>