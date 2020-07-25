<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 

class YoutubeApiController extends Controller
{
   public function index(){
    $client = new Client();
    $res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyA32NJw6dEnGzrVaz9917CeiY3u7ljKlc8&q=laravel tutorial');
    $res->getStatusCode();
    //echo $res;
 
    $res->getHeader('content-type')[0];
    
    $result = $res->getBody();
   echo $result;
    
    //return view('Youtube')->with('response', $result);
   }
}
