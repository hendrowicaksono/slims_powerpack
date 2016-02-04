<?php
#echo 'latest collection version 2';
$base_url = variable_get('slims_url');
$current_collection_max = variable_get('current_collection_max');
$xml_url = $base_url.'index.php?resultXML=true&search=search&';
if (isset($_GET['keywords'])) {
  $xml_url .= 'keywords='.$_GET['keywords'];
} else {
  $xml_url .= 'keywords=';
}
#echo $xml_url;
$d_arr = simplexml_load_file($xml_url);
#var_dump($d_arr);
$i = 0;
?>
<div class="item-list">
<ul>
<?php
foreach ($d_arr->mods as $k_01 => $v_01) {
    #echo '<li style="margin-bottom: 10px;">'.$v_01->attributes()->ID.'-<a href="?q=slims/recdetail/'.$v_01->attributes()->ID.'">'.$v_01->titleInfo->title.'</a></li>';
    #echo '<li style="margin-bottom: 10px;"><a href="?q=slims/recdetail/'.$v_01->attributes()->ID.'">'.$v_01->titleInfo->title.'</a></li>';

    echo '<div style="padding-bottom: 10px;">';

    echo '<div style="width: 60px; float: left; padding-right: 10px;">';
    if (!empty($v_01->children('slims', TRUE)->image)) {
      echo '<img src="'.$base_url.'lib/phpthumb/phpThumb.php?src=../../images/docs/'.$v_01->children('slims', TRUE)->image.'&w=300" alt="" />';
    } else {
      echo '<img src="'.$base_url.'template/default/img/nobook.png'.'" alt="" />';
    }
    echo '</div>';

    echo '<div>';
    echo '<div class="single_title">';
    echo '<i class="icon-document-edit mi"></i>';
    echo '<a title="'.$v_01->titleInfo->title.'" href="?q=slims/recdetail/'.$v_01->attributes()->ID.'">'.$v_01->titleInfo->title.' '.$v_01->titleInfo->subTitle.'</a>';
    echo '</div>';
    echo '<div class="meta mb">';
    #echo 'Informasi <a href="#">pengarang 1</a> dan <a href="#">pengarang 2</a> disini';
    echo $v_01->name->namePart;
    echo '</div>';
    echo '</div>';

    echo '<div style="clear: both;">';
    echo '</div>';


    echo '</div>';

}
?>
</ul>
</div>