<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Utility\HttpHandler;
use Illuminate\Http\Request;
use Session;

class APIController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the list users page.
     *
     * @return view
     */
    public function get(Request $request)
    {
        $url = $request->header('url');

        $body = $request->all();

        return  HttpHandler::get($url, $body);
    }

    /**
     * Show the edit user page.
     *
     * @return view
     */
    public function post(Request $request)
    {
        $url = $request->header('url');
        $body = $request->all();

        return  HttpHandler::post($url, $body);
    }

    public function postJson(Request $request)
    {
        $url = $request->header('url');
        $body = $request->all();

        return  HttpHandler::postJson($url, $body);
    }



    /**
     * Show the edit user page.
     *
     * @return view
     */
    public function put(Request $request)
    {
        $url = $request->header('url');

        $SessionToken = \Session::get('SessionToken');

        if($SessionToken == '') return "session not found";

        $header = [
            'Authorization' => $SessionToken,
        ];
        $body = $request->all();

        if($url == '') return "please provide valid url";

        $response =  \App\Utility\Http::putRequest($url, [
            'header' => $header,
            'body' => $body
        ]);


        if(is_array($response)){
            return response()->json($response, $response['StatusCode']);
        }

        $data = json_decode($response);
        return response()->json($data, $data->result->StatusCode);
    }

    /**
     * Show the edit user page.
     *
     * @return view
     */
    public function delete(Request $request)
    {
        $url = $request->header('url');

        $SessionToken = \Session::get('SessionToken');

        if($SessionToken == '') return "session not found";

        $header = [
            'Authorization' => $SessionToken,
        ];

        $body = $request->all();

        if($url == '') return "please provide valid url";

        $response =  \App\Utility\Http::deleteRequest($url, [
            'header' => $header,
            'body' => $body
        ]);

        if(is_array($response)){
            return response()->json($response, $response['StatusCode']);
        }

        $data = json_decode($response);
        return response()->json($data, $data->result->StatusCode);
    }

    /**
     * Show the edit user page.
     *
     * @return view
     */
    public function postFile(Request $request)
    {
        $url = $request->header('url');

        $SessionToken = \Session::get('SessionToken');

        if($SessionToken == '') return "session not found";

        $header = [
            'Authorization' => $SessionToken,
        ];

        $body = $request->all();

        if($url == '') return "please provide valid url";

        $response =  \App\Utility\Http::postFileRequest($url, [
            'header' => $header,
            'body' => $body
        ]);


        if(is_array($response)){
            return response()->json($response, $response['StatusCode']);
        }

        $data = json_decode($response);
        return response()->json($data, $data->result->StatusCode);

    }

    /**
     * Show the edit user page.
     *
     * @return view
     */
    public function putFile(Request $request)
    {
        $url = $request->header('url');

        $SessionToken = \Session::get('SessionToken');

        if($SessionToken == '') return "session not found";

        $header = [
            'Authorization' => $SessionToken,
        ];

        $body = $request->all();

        if($url == '') return "please provide valid url";

        $response =  \App\Utility\Http::putFileRequest($url, [
            'header' => $header,
            'body' => $body
        ]);


        if(is_array($response)){
            return response()->json($response, $response['StatusCode']);
        }

        $data = json_decode($response);
        return response()->json($data, $data->result->StatusCode);

    }

}
