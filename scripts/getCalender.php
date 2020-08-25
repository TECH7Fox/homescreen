<?php

$week = date("W");

if (isset($_GET["week"])) {
    switch($_GET["week"]) {
        case "previous": $week--; break;
        case "next"    : $week++; break;
        default: break;
    }    
}

$week = sprintf("%02d", $week);

for ($num = 1; $num <= 50; $num++) {
    $num_padded = sprintf("%02d", $num);

    date_default_timezone_set("Europe/Amsterdam");

    $url='http://rooster.horizoncollege.nl/rstr/ECO/HRN/Roosters/' . $week . '/c/c000' . $num_padded .'.htm';
    $site = file_get_contents($url);

    if (strpos($site, 'HEITO19AO-B') !== false) {
        $dom = new DOMDocument();
        @$dom->loadHTML($site, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $xpath = new DOMXPath($dom);
        $tags = $xpath->evaluate("//table");
    
        foreach ($tags as $tag) {        
            $tag->setAttribute("class", "table table-bordered table-active");
        }

        $tags = $xpath->evaluate("//td/table");
        foreach ($tags as $tag) {        
            $value = $tag->nodeValue;
            $tag->parentNode->nodeValue = $value;
        }

        $tags = $xpath->evaluate('//table');
        $tags[1]->parentNode->removeChild($tags[1]);

        $tags = $xpath->evaluate('//center/font[4]');
        $tags[0]->parentNode->removeChild($tags[0]);

        $tags = $xpath->evaluate('//center/font[2]/b');
        $value = $tags[0]->nodeValue;
        
        $tags[0]->parentNode->setAttribute("class", "text-info");
        $tags[0]->parentNode->nodeValue = $value;

        $tags = $xpath->evaluate('//center/font[3]');
        $tags[0]->parentNode->removeChild($tags[0]);

        $tags = $xpath->evaluate('//td');

        foreach ($tags as $tag) {
            if (strpos($tag->nodeValue, ':')) {
                $times = explode(" ", $tag->nodeValue);
            
                $tag->nodeValue = ($times[1] . " - " . $times[2]);

                if (strtotime($times[1]) <= strtotime(date("H:i")) && strtotime($times[2]) > strtotime(date("H:i"))) {
                    $tag->parentNode->setAttribute("class", "table-primary");
                }
            } elseif (!strpos($tag->nodeValue, '-') && !empty($tag->nodeValue)) {
                $tag->setAttribute("class", "table-primary");
            }
        }

        $site = $dom->saveHTML();
        echo $site;
        break;
    }
}

?>