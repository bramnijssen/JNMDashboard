<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function index()
    {
        $url = 'https://feeds.nos.nl/nosnieuwsalgemeen';
        $xml = simplexml_load_file($url, null, LIBXML_NOCDATA);
        $news = json_decode(json_encode($xml), true);

        return response()->json($news['channel']['item']);
    }
}
