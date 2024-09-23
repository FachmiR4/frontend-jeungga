<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\APIController;
use App\Utility\HttpHandler;
use Illuminate\Http\Request;

class ContactusController extends APIController
{
    function contactus() {
        $cookielang = 'en';
        $response_data_banner = HttpHandler::postJson("module/slider/list", [
            'lang' => $cookielang,
            'page' => 'Contact Us'
        ]);
        $response_data = HttpHandler::postJson("module/contacts/list",[
            'lang' => $cookielang
        ]);

        $response_data = $response_data->getData();
        $response_data_banner = $response_data_banner->getData();
        $data = isset($response_data->data) ? $response_data->data : [];
        $data_banner = isset($response_data_banner->data) ? $response_data_banner->data : [];
        return view('pages.contactus.page-contactus', [
            'Data' => $data,
            'DataBanner' => $data_banner,
            // 'DataVideo' => $data_video
        ]);
    }
}
