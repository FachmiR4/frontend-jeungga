<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\APIController;
use App\Utility\HttpHandler;
use Illuminate\Http\Request;

class PartnershipController extends APIController
{
    function partnership() {
        $cookielang = 'en';
        $response_data = HttpHandler::postJson("module/partnership/current-partner/list",[
            'lang' => $cookielang
        ]);
        $response_datas = HttpHandler::postJson("module/partnership/distributor-network/list",[
            'lang' => $cookielang
        ]);
        // $response_data_video = HttpHandler::postJson("module/products/video/list", [
        //     'lang' => $cookielang,
        // ]);
        $response_data = $response_data->getData();
        $response_datas = $response_datas->getData();
        // $response_data_video = $response_data_video->getData();
        $data = isset($response_data->data) ? $response_data->data : [];
        $datas = isset($response_datas->data) ? $response_datas->data : [];
        // $data_video = isset($response_data_video->data) ? $response_data_video->data : [];
        return view('pages.partnership.page-partnership', [
            'Data' => $data,
            'Datas' => $datas,
            // 'DataVideo' => $data_video
        ]);
    }
}
