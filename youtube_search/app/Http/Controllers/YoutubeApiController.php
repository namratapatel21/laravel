<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 

class YoutubeApiController extends Controller
{
   public function index(){
    $client = new Client();
    $res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyDbax81dP4GYXo9CRzE3_PWtXEHrfG5HXE&q=laravel tutorial');
    $res->getStatusCode();
    //echo $res;
 
    $res->getHeader('content-type')[0];
    
    $result = $res->getBody();
    //echo $result;
    //$jsondata = json_decode($result,true);
    //dd($jsondata);
    
    return view('youtubesearch')->with('response', $result);
   }
}
