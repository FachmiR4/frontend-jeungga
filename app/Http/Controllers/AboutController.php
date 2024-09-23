<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\API\APIController;
use App\Utility\HttpHandler;
use Illuminate\Http\Request;

class AboutController extends APIController
{
    public function aboutUs(Request $request){
        $cookielang = 'en';
        $response_data = HttpHandler::postJson("module/about-us/list",[
            'lang' => $cookielang
        ]);
        $response_data = $response_data->getData();
        $data = isset($response_data->data) ? $response_data->data : [];
        return view('pages.about-us.page-about-us', [
            'Data' => $data
        ]);
    }
}
