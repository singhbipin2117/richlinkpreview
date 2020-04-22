<?php

function file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

$data = [];

$url = $_POST['url'];
$html = file_get_contents_curl($url);

//parsing begins here:
$doc = new DOMDocument();
@$doc->loadHTML($html);
$nodes = $doc->getElementsByTagName('title');

//get and display what you need:
if ($nodes->length>0){
  $data['title'] = $nodes->item(0)->nodeValue;
}


$metas = $doc->getElementsByTagName('meta');

for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
    if($meta->getAttribute('name') == 'description')
        $data['description'] = $meta->getAttribute('content');
    if($meta->getAttribute('name') == 'keywords')
        $data['keywords'] = $meta->getAttribute('content');
    if($meta->getAttribute('property') == 'og:title')
        $data['ogtitle'] = $meta->getAttribute('content');
    if($meta->getAttribute('property') == 'og:description')
        $data['ogdescription'] = $meta->getAttribute('content');
    if($meta->getAttribute('property') == 'og:url')
        $data['ogurl'] = $meta->getAttribute('content');
    if($meta->getAttribute('property') == 'og:image')
        $data['ogimage'] = $meta->getAttribute('content');
    if($meta->getAttribute('type') == 'image/x-icon')
        $data['href'] = $meta->getAttribute('content');
}

echo json_encode($data);

?>