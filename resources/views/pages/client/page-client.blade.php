@php
use App\Utility\HttpHandler;

$cookielang = 'en';
$response_banner = HttpHandler::postJson("module/slider/list",[
    'lang' => $cookielang
])->getData();
if(isset($response_banner->data)) {
    $idToFind = '/clients';
    $result = array_filter($response_banner->data, function($item) use ($idToFind) {
        return $item->link === $idToFind;
    });

    $foundItem = reset($result);
}

@endphp
<style>
    .why-jeungga-heros{
        background: url('{{ config('services.api_domain.base_api_image_url').$foundItem->image_path }}') no-repeat !important;
        min-height:290px;
        background-position-x: 70% !important;
    }
</style>
@if(isset($foundItem->title))
<x-partial.heros title="{{ $foundItem->title }}" imageSrc="{{config('services.api_domain.base_api_image_url').$foundItem->image_path}}" bgColor="#22333C80;" />

<section class="section section-center background-section-1 pt-0">
    <div class="container-fluid custom-bg position-relative p-4">
        <div class="group-wrapper52 w-100">
            <img class="frame-child96" alt="" src="{{ asset('assets/file/group-13213145055@2x.png') }}">
        </div>
        <div class="row" >
            <div class="col-md-12">
                <div style="margin-top: 200px " class="d-flex justify-content-center align-items-center pb-5">
                    <div class="card blur-card p-3">
                        <div class="card-body ">
                            <div class="row mb-3">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="74" height="56" viewBox="0 0 74 56" fill="none">
                                        <path d="M58.5975 0.520243C62.9975 0.520244 66.5975 1.98691 69.3975 4.92024C72.0641 7.85357 73.3975 11.7869 73.3975 16.7202C73.3975 25.3869 70.5308 32.9202 64.7975 39.3202C58.9308 45.7202 51.9308 50.9869 43.7975 55.1202L41.7975 51.7202C45.1308 49.5869 48.2641 46.8536 51.1975 43.5202C53.9975 40.1869 56.1975 36.5869 57.7975 32.7202L52.1975 28.5202C49.9308 27.0536 48.0641 25.0536 46.5975 22.5202C45.1308 20.1202 44.3975 17.7869 44.3975 15.5202C44.3975 11.2536 45.7308 7.65357 48.3975 4.72024C50.9308 1.92024 54.3308 0.520243 58.5975 0.520243ZM17.3975 0.52024C21.7975 0.52024 25.3975 1.9869 28.1975 4.92023C30.8641 7.85357 32.1975 11.7869 32.1975 16.7202C32.1975 25.3869 29.3308 32.9202 23.5975 39.3202C17.7308 45.7202 10.7308 50.9869 2.59746 55.1202L0.597458 51.7202C3.93079 49.5869 7.06413 46.8536 9.99746 43.5202C12.7975 40.1869 14.9975 36.5869 16.5975 32.7202L10.9975 28.5202C8.73079 27.0536 6.86412 25.0536 5.39746 22.5202C3.93079 20.1202 3.19747 17.7869 3.19747 15.5202C3.19747 11.2536 4.5308 7.65357 7.19746 4.72024C9.7308 1.92024 13.1308 0.520239 17.3975 0.52024Z" fill="url(#paint0_linear_1_8958)"/>
                                        <defs>
                                        <linearGradient id="paint0_linear_1_8958" x1="66.7694" y1="55.1202" x2="-4.48899" y2="16.4819" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#ECE5D3" stop-opacity="0.7"/>
                                        <stop offset="1" stop-color="#D4A11C" stop-opacity="0.6"/>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="card-text text-center">
                                        "{{$Data[0]->description}}"
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <img class="logo-lulupng-icon1" alt="" src="{{ config('services.api_domain.base_api_image_url').$Data[0]->logo }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <p class="medan-indonesia1">{{$Data[0]->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="background-color: #F9F7F1;">
    <div class="client-gal-parent">
        <div class="spotlight">
            <div class="spotlight-text-parent">
                Client Spotlight
                <div class="spotlight-before"></div>
                <div class="spotlight-after"></div>
            </div>
            <img src="{{config('services.api_domain.base_api_image_url').$Datas[0]->image_1}}" alt="">
        </div>
        <div class="client-gal-right">
            <div class="research">
                <img class="first-research" src="{{config('services.api_domain.base_api_image_url').$Datas[0]->image_2}}" alt="">
                <img class="last-research" src="{{config('services.api_domain.base_api_image_url').$Datas[0]->image_3}}" alt="">
            </div>
            <div class="client-gal-text">
                <h3>Lulu Clinic's Experience</h3>
                <p style="">Lulu Clinic utilizes ®Jeungga machines to enhance their beauty treatment offerings, leading to increased client satisfaction and retention.</p>
            </div>
            <div class="client-gal-review">
                <img class="gal-review-people" src="{{config('services.api_domain.base_api_image_url').$Datas[0]->image_testimoni}}" alt="">
                <div class="client-gal-review-text">
                    <p class="responsive-text">"{{$Datas[0]->testimoni}}"</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
