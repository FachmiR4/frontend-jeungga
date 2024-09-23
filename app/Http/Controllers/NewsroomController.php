<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\APIController;
use App\Utility\HttpHandler;
use Illuminate\Http\Request;

class NewsroomController extends APIController
{
    function newsroom() {
        $cookielang = 'en';
        $response_data = HttpHandler::postJson("module/newsroom/gallery/list",[
            'lang' => $cookielang
        ]);
        $response_datas = HttpHandler::postJson("module/newsroom/document/list", [
            'lang' => $cookielang,
        ]);
        $response_data = $response_data->getData();
        $response_datas = $response_datas->getData();
        // dd($response_data);

        $data = isset($response_data->data) ? $response_data->data : [];
        $datas = isset($response_datas->data) ? $response_datas->data : [];
        // dd($data);
        $data = $this->MapGallery($data);
        // $data_video = isset($response_data_video->data) ? $response_data_video->data : [];
        return view('pages.newsroom.page-newsroom', [
            'Data' => $data,
            'Datas' => $datas
        ]);
    }

    private function MapGallery($data) {
        $datas = [];
        $data = (array) $data;
        $i = 0;
        $j = 0;
        $data = $this->setIsSerached($data);
        $remain = count($data) % 4;
        $remain = $remain > 0 ? 1 : 0;
        $loop = count($data) + $remain;
        // dd($data);
        $medium = false;
        $big = false;
        $small = false;
        foreach ($data as $key => $value) {
            $smallInt = 0;
            // if ($value->id == 36) {
            //     $value->flag = 'big';
            // }
            // if ($value->id == 42) {
            //     $value->flag = 'medium';
            // }
            foreach ($data as $keyInner => $valueInner) {
                if ($valueInner->isSearched) {
                    continue;
                }
                if (!$big) {
                    if ($valueInner->flag == 'big') {
                        $datas[$j][$i] = $data[$keyInner];
                        $valueInner->isSearched = true;
                        $big = true;
                        $i++;
                    }
                    continue;
                }
                if (!$small) {
                    if ($valueInner->flag == 'small') {
                        $datas[$j][$i] = $data[$keyInner];
                        $valueInner->isSearched = true;
                        $i++;
                        $smallInt++;
                    }
                    if ($smallInt > 1) {
                        $smallInt = 0;
                        $small = true;
                    }
                    continue;
                }
                if (!$medium) {
                    if ($valueInner->flag == 'medium') {
                        $datas[$j][$i] = $data[$keyInner];
                        $valueInner->isSearched = true;
                        $medium = true;
                        $i++;
                    }
                    continue;
                }
                if ($small && $medium && $big) {
                    $j++;
                    $i = 0;
                    $medium = false;
                    $big = false;
                    $small = false;
                    break;
                    // continue;
                }
            }
        }
        $i = 1;
        foreach ($datas as $key => $value) {
            if ($i > 1 && $i % 2 == 0) {
                $datas[$key] = array_reverse($datas[$key]);
            }
            $i++;
        }
        return $datas;
    }
    private function setIsSerached($data){
        $datas = [];
        foreach ($data as $key => $value) {
            $datas[$key] = $value;
            $datas[$key]->isSearched = false;
        }
        return $datas;
    }
}
