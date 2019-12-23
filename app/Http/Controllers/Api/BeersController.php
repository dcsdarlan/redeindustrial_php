<?php


namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class BeersController extends BaseController{

    protected function listAll(Request $request) {
        $ch = curl_init('https://api.punkapi.com/v2/beers');
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => 1,
        ]);
        $response = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);
    }

}
