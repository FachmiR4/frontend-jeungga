<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\APIController;
use App\Utility\HttpHandler;
use Illuminate\Http\Request;

class ProductController extends APIController
{
    function products() {
        $cookielang = 'en';
        $response_data = HttpHandler::postJson("module/products/list",[
            'lang' => $cookielang
        ]);
        $response_data_video = HttpHandler::postJson("module/products/video/list", [
            'lang' => $cookielang,
        ]);
        $response_data = $response_data->getData();
        $response_data_video = $response_data_video->getData();
        $data = isset($response_data->data) ? $response_data->data : [];
        $data_video = isset($response_data_video->data) ? $response_data_video->data : [];
        return view('pages.product.page-product', [
            'Data' => $data,
            'DataVideo' => $data_video
        ]);
    }
}
