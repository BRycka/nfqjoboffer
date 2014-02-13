<ul>
    <li><a href="?test=1">1</a></li> 
    <li><a href="?test=2">2</a></li>
</ul>
<hr>
<?php
$iTest = (int) $_GET['test'];
$sXML = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
switch ($iTest) {
    case 1:
        $sXML .= '<request>
  <action>getCategories</action> 
  <params />
</request>';
        break;
    case 2:
        $sXML .= '<request>
  <action>getProducts</action>
  <params>
    <catid>1</catid>
    <page>1</page>
  </params> 
</request>';
        break;
    default:
        exit();
        break;
}

$oCurl = curl_init();
curl_setopt($oCurl, CURLOPT_URL, 'http://localhost/joboffer/input.php');
curl_setopt($oCurl, CURLOPT_POST, true); 
curl_setopt($oCurl, CURLOPT_POSTFIELDS, $sXML);
curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER,false); 
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($oCurl, CURLOPT_FRESH_CONNECT, true);
curl_setopt($oCurl, CURLOPT_HTTPHEADER, 
    array(
        'Content-type: text/xml; charset=UTF-8', 
        'Expect: '
    )
);
        
$sRespond = curl_exec($oCurl);
$iRespondCode = curl_getinfo($oCurl, CURLINFO_HTTP_CODE);
curl_close($oCurl);

echo '<pre>RESPOND  ', $iRespondCode, "\n\n", htmlentities($sRespond);
