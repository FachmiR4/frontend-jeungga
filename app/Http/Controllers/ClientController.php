<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\APIController;
use App\Utility\HttpHandler;
use Illuminate\Http\Request;

class ClientController extends APIController
{
    function client() {
        $cookielang = 'en';
        $response_data = HttpHandler::postJson("module/clients/testimonials/list", [
            'lang' => $cookielang,
        ]);
        $response_datas = HttpHandler::postJson("module/clients/spotlight/list", [
            'lang' => $cookielang,
        ]);

        $response_data          = $response_data->getData();
        $response_datas          = $response_datas->getData();
        $data                   = isset($response_data->data) ? $response_data->data : [];
        $datas                   = isset($response_datas->data) ? $response_datas->data : [];

        return view('pages.client.page-client', [
            'Data' => $data,
            'Datas' => $datas,
            // 'DataVideo' => $data_video
        ]);
    }
}
