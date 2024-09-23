@php
use App\Utility\HttpHandler;
$cookielang = 'en';
$response_banner = HttpHandler::postJson("module/slider/list",[
    'lang' => $cookielang
])->getData();
if(isset($response_banner->data)) {
    $idToFind = 'technology';
    $result = array_filter($response_banner->data, function($item) use ($idToFind) {
        return $item->link === $idToFind;
    });

    $foundItem = reset($result);
}
@endphp
<style>
    .why-jeungga-heros{
        background-position: 50% 50% !important;
        @media (min-width:992px) {
            background-position: 20% 50% !important;
        }
    }
</style>
@if(isset($foundItem->title))
    <x-partial.heros title="{{ $foundItem->title }}" imageSrc="{{config('services.api_domain.base_api_image_url').$foundItem->image_path}}" bgColor=""/>
    <div>
        <div class="position-relative">
            <div class="p-5 header-tech">
                <div class="sparkling-dots-group">
                    <div class="glow-1-video"></div>
                    <div class="glow-2-video"></div>
                    <div class="sparkles-middle">
                        <img src="" alt="">
                    </div>
                    <div class="sparkles-last">
                        <img src="" alt="">
                    </div>
                </div>
                <h1>
                    Important Traits Of Our System
                </h1>
                <x-partial.list_feature_tech title="IoT Integration" desc="® Jeungga machines incorporate advanced IoT technology, allowing for real-time monitoring of treatment parameters and patient responses." iteration='1' />
                <x-partial.list_feature_tech title="Medical Records Integration" desc="Seamless integration of patient medical records enhances treatment precision and safety." iteration='2' />
                <x-partial.list_feature_tech title="RF (Radiofrequency) Technology" desc="Utilizing RF technology, ® Jeungga machines deliver controlled energy deep into the skin layers." iteration='3' />
                <x-partial.list_feature_tech title="Vacuum Therapy" desc="Integrated vacuum therapy enhances lymphatic drainage and circulation, aiding in the removal of toxins and excess fluids." iteration='4' />
                <div class="glow-1" style="width:100%;height:100%;">
                    <svg style="width:50%;height:100%;" viewBox="0 0 786 878" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_1_7690)">
                        <circle cx="-214.55" cy="787.561" r="500.188" fill="#ECE5D3" fill-opacity="0.4"/>
                        </g>
                        <defs>
                        <filter id="filter0_f_1_7690" x="-1214.93" y="-212.815" width="2000.75" height="2000.75" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="250.094" result="effect1_foregroundBlur_1_7690"/>
                        </filter>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="phone-section">
        <div class="phone-header-left">
            <div class="phone-text phone-text-left">
                <div class="phone-title-left">eCRM</div>
                <div class="phone-desc-left">
                    <p>eCRM streamlines client interactions through digital platforms, optimizing communication and scheduling for enhanced satisfaction and loyalty.</p>
                </div>
            </div>
            <div class="phone-img-left p-4">
                <img class="img-phone-left" src="{{asset('assets/img/mobile-left.png')}}" alt="">
                {{-- <img class="cloud-top-phone" src="{{asset('assets/file/cloud-top.png')}}" alt="">
                <img class="cloud-bottom-phone" src="{{asset('assets/file/cloud-bottom.png')}}" alt=""> --}}
            </div>
        </div>
        <div class="phone-header-right">
            <div class="" style="width: 100%;">
                <div class="phone-text phone-text-right">
                    <div class="phone-title-right">Medical Record Integration</div>
                    <div class="phone-desc-right">Medical record integration centralizes patient data, improving treatment accuracy and efficiency with personalized care plans based on comprehensive health histories.</div>
                </div>
            </div>
            <div class="pb-5" style="padding-left: 3rem;">
                <img src="{{asset('assets/file/image-405.png')}}" alt="">
            </div>
        </div>
    </div>
@endif
