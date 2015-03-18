<?php
error_reporting(-1);

/**
 * Here’s a quick and easy way to get all tweets of a specific usage using the useful cURL library.
 * The following example will retrieve all tweets with the #cat hashtag.
 * */


function getTweet($hash_tag){
    $url = 'http://search.twitter.com/search.atom?q='.urldecode($hash_tag);
    echo "Connecting to: $url ";
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    $xml = curl_exec($ch);
    curl_close($ch);

    //If you want to see the response from Twitter, uncomment this next part out:
    //echo "Response:";
    //echo htmlspecialchars($xml);
    //var_dump($ch);

    $twelement = new SimpleXMLElement($xml);
    foreach ($twelement->entry as $entry) {
        $text = trim($entry->title);
        $author =trim($entry->author->name);
        $time = trim($entry->published);
        $id = $entry->id;
        echo "Tweet from ".$author.": ".$text ."\n Posted: ".date('n/j/y g:i a',$time);

    }

    return true;
}




getTweet('#GoodBoy');



