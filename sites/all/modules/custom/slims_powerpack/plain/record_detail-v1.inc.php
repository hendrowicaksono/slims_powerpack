<?php
#echo 'latest collection version 2';
$base_url = variable_get('slims_url');
#$current_collection_max = variable_get('current_collection_max');
$xml_url = $base_url.'index.php?p=show_detail&inXML=true&id='.arg(2);
#echo $xml_url;
$d_arr = simplexml_load_file($xml_url);
#var_dump($d_arr);
$ns = $d_arr->getNamespaces(true);

$res = '';
#$res .= '<table class="table">';
#$res .= '<tr>';
#$res .= '<td width="70">';
#$res .= $d_arr->mods->children('slims', TRUE)->image;

#if (!empty($d_arr->mods->children('slims', TRUE)->image)) {
#  $res .= '<img src="'.$base_url.'lib/phpthumb/phpThumb.php?src=../../images/docs/'.$d_arr->mods->children('slims', TRUE)->image.'&w=70" alt="" style="padding-top: 0px; margin-top: 0px;" />';
#} else {
#  $res .= '<img src="'.$base_url.'template/default/images/nobook.png'.'" alt="" style="width:70px;" />';
#}

#$res .= '</td>';
#$res .= '<td>';
$res .= '<div class="title colordefault" style="clear: both; text-align: left; padding-top: 0px; margin-top: 0px; height: 160px;">';
#$res .= '<h4 style="padding-top: 0px; margin-top: 0px;">'.$d_arr->mods->titleInfo->title.' '.$d_arr->mods->titleInfo->subTitle.'</h4>';

#$res .= '<h4 style="padding-top: 0px; margin-top: 0px;"><div style="width: 100px;"><img src="'.$base_url.'lib/phpthumb/phpThumb.php?src=../../images/docs/'.$d_arr->mods->children('slims', TRUE)->image.'&w=100" alt="" style="padding-top: 15px; padding-bottom: 7px; float: left; padding-right: 15px;" /></div>'.$d_arr->mods->titleInfo->title.' '.$d_arr->mods->titleInfo->subTitle.'</h4>';

  $res .= '<div style="width: 150px;">';
if (!empty($d_arr->mods->children('slims', TRUE)->image)) {
  $res .= '<img src="'.$base_url.'lib/phpthumb/phpThumb.php?src=../../images/docs/'.$d_arr->mods->children('slims', TRUE)->image.'&w=150" alt="" style="padding-top: 15px; padding-bottom: 7px; float: left; padding-right: 15px;" />';
} else {
  $res .= '<img src="'.$base_url.'template/default/img/nobook.png" alt="" style="padding-top: 15px; padding-bottom: 7px; float: left; padding-right: 15px;" />';
  #$res .= '<img src="'.$base_url.'template/default/images/nobook.png'.'" alt="" />';
}
  $res .= '</div><div style="padding-top: 20px; margin-top: 0px; font-size: x-large;">'.$d_arr->mods->titleInfo->title.' '.$d_arr->mods->titleInfo->subTitle.'</div>';



$res .= '</div>';
#$res .= '</td>';
#$res .= '</tr>';
#$res .= '</table>';
$res .= '<table class="table">';

#if (!empty($d_arr->mods->titleInfo->title)) {
#  $res .= '<tr>';
#  $res .= '<td><strong>Title</strong></td>';
#  $res .= '<td style="text-align: left;">'.$d_arr->mods->titleInfo->title.'</td>';
#  $res .= '</tr>';
#}

if (!empty($d_arr->mods->name)) {
  $res .= '<tr>';
  $res .= '<td><strong>Authors</strong></td>';
  $res .= '<td style="text-align: left;">';
  $i = 0;
  foreach ($d_arr->mods->name as $key => $value) {
    $res .= $d_arr->mods->name[$i]->namePart.'; ';
    $i++;
  }
  $res .= '</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->originInfo->edition)) {
  $res .= '<tr>';
  $res .= '<td><strong>Edition</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->originInfo->edition.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->originInfo->publisher)) {
  $res .= '<tr>';
  $res .= '<td><strong>Publisher</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->originInfo->publisher.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->originInfo->dateIssued)) {
  $res .= '<tr>';
  $res .= '<td><strong>Published Year</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->originInfo->dateIssued.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->language->languageTerm[1])) {
  $res .= '<tr>';
  $res .= '<td><strong>Language</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->language->languageTerm[1].'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->location->shelfLocator)) {
  $res .= '<tr>';
  $res .= '<td><strong>Nomor Panggil</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->location->shelfLocator.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->physicalDescription->form)) {
  $res .= '<tr>';
  $res .= '<td><strong>GMD</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->physicalDescription->form.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->physicalDescription->extent)) {
  $res .= '<tr>';
  $res .= '<td><strong>Deskripsi Fisik</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->physicalDescription->extent.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->relatedItem->titleInfo->title)) {
  $res .= '<tr>';
  $res .= '<td><strong>Judul Seri</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->relatedItem->titleInfo->title.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->note)) {
  $res .= '<tr>';
  $res .= '<td><strong>Abstrak</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->note.'</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->classification)) {
  $res .= '<tr>';
  $res .= '<td><strong>Klasifikasi</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->classification.'</td>';
  $res .= '</tr>';
}

if (array($d_arr->mods->subject)) {
  $res .= '<tr>';
  $res .= '<td><strong>Subyek</strong></td>';
  $res .= '<td style="text-align: left;">';
  foreach ($d_arr->mods->subject as $key => $v_subject) {
    #$res .= $data_arr->mods->subject[$key]->topic;
    #$res .= $key;
    #echo '<hr />';
    #var_dump($v_subject);
    $res .= $v_subject->topic.'; ';
  }
  $res .= '</td>';
  $res .= '</tr>';
}

if (!empty($d_arr->mods->identifier)) {
  $res .= '<tr>';
  $res .= '<td><strong>ISBN / ISSN</strong></td>';
  $res .= '<td style="text-align: left;">'.$d_arr->mods->identifier.'</td>';
  $res .= '</tr>';
}


if (!empty($d_arr['image'])) {
  $res .= '<tr>';
  $_image = explode('/', $d_arr['image']);
  $_image_url = $base_url.'lib/minigalnano/createthumb.php?filename=../../images/docs/'.end($_image).'&width=400';
  $res .= '<td colspan="2"><img src="'.$_image_url.'" /></td>';
  $res .= '</tr>';
}



$res .= '</table>';

echo $res;

?>
