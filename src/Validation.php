<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 02/03/2015
 * Time: 23:16
 */



class Validation {





























    public function yahoo_spell_check ($query)
{
// Substitute this application ID with your own application ID provided by Yahoo!.
    $appID = "w2SMyX7e";
    $request = "http://search.yahooapis.com/WebSearchService/V1/spellingSuggestion?appid=".$appID."&query=".urlencode($query);
    $session = curl_init($request);
    curl_setopt($session, CURLOPT_HEADER, true);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($session);
    curl_close($session);

    if (!($xml = strstr($response, '<?xml'))) {
        $xml = null;
    }

    $simple_xml = simplexml_load_string($xml);
    $data = $simple_xml->Result;
    return $data;
}


    /**
     * @param $query
     * @return string
     */
    public function google_spell_check($query) {
    // The request also includes the userip parameter which provides the end
    // user's IP address. Doing so will help distinguish this legitimate
    // server-side traffic from traffic which doesn't come from an end-user.
        $url = "https://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
            . "q=" . urlencode($query) . "&userip=186.203.245.246";

        echo $url;
// sendRequest
// note how referer is set manually
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, "http://danilogripa.com");
        $body = curl_exec($ch);
        curl_close($ch);

// now, process the JSON string
        $json = json_decode($body);
        return $json;
    }


}