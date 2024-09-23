@php
use App\Utility\HttpHandler;

$cookielang = 'en';
$card_one   = [];
$card_two   = [];
$card_three = [];

$response_banner = HttpHandler::postJson("module/slider/list",[
    'lang' => $cookielang
])->getData();

$response_prod_spec = HttpHandler::postJson("module/products/spec/group",[
    'lang' => $cookielang
])->getData();

if(isset($response_prod_spec->data->one) || isset($response_prod_spec->data->two) || isset($response_prod_spec->data->three)){
    foreach($response_prod_spec->data->one as $row_one){
        $obj_one                = array();
        $obj_one['menu']        = $row_one->menu;
        $obj_one['description'] = $row_one->description;
        array_push($card_one, $obj_one);
    }

    foreach($response_prod_spec->data->two as $row_two){
        $obj_two                = array();
        $obj_two['menu']        = $row_two->menu;
        $obj_two['description'] = $row_two->description;
        array_push($card_two, $obj_two);
    }

    foreach($response_prod_spec->data->three as $row){
        $obj_three                = array();
        $obj_three['menu']        = $row->menu;
        $obj_three['description'] = $row->description;
        array_push($card_three, $obj_three);
    }
}

// dd($response_prod_spec);
// dd($card_three);
// dd($card_one);

if(isset($response_banner->data)) {
    $idToFind = 'product';
    $result = array_filter($response_banner->data, function($item) use ($idToFind) {
        return $item->link === $idToFind;
    });

    $foundItem = reset($result);
}
@endphp
@if(isset($foundItem->title))
    <x-partial.heros title="{{$foundItem->title}}" imageSrc="{{config('services.api_domain.base_api_image_url').$foundItem->image_path}}" bgColor=""/>
    <div class="section section-thing">
        <div class="section-flex position-relative pb-5">
            <div class="section-products-text">
                <div class="products-first-title">Lyra's Range of Beauty Machines</div>
                <div class="products-first-subtitle">Customizable Design</div>
                <div class="products-first-desc">
                    Slimming machines offer adjustable features to personalize treatments, accommodating individual client needs and enhancing comfort and effectiveness.
                </div>
            </div>
            <div class="parent-change-color">
                <x-partial.change-color dataImages="{!!json_encode($Data)!!}" />
            </div>
            <div class="thing-img">
                <img class="img-thingg" src="{{asset('assets/img/pimage_4.svg')}}" alt="">
                <img class="img-thingg-shadow" src="{{asset('assets/img/pimage_4.svg')}}" alt="">
                <div class="img-cloud">
                    <div class="img-cloud-relative">
                        <img class="cloudss img-cloud-smart" src="{{asset('assets/file/cloud-smart.png')}}" alt="">
                        <img class="cloudss img-cloud-ergonomic" src="{{asset('assets/file/cloud-ergonomic.png')}}" alt="">
                        <img class="cloudss img-cloud-enhance" src="{{asset('assets/file/cloud-enhance.png')}}" alt="">
                        <img class="cloudss img-cloud-effective" src="{{asset('assets/file/cloud-effective.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="parent-thing-clock">
                <div class="thing-clock">
                    <div class="thing-play">
                        <x-partial.product-play imgSrc="" with="false" />
                    </div>
                </div>
            </div>
            <div class="products-first-desc-on-dekstop section px-5 text-center" style="background-color: transparent">
                <div class="products-first-subtitle">Customizable Design</div>
                <div class="products-first-desc">
                    Slimming machines offer adjustable features to personalize treatments, accommodating individual client needs and enhancing comfort and effectiveness.
                </div>
            </div>
        </div>
    </div>
    <div class="section-iot section py-5">
        <div class="iot-text">
            <div class="iot-title">IoT Technology</div>
            <div class="iot-desc">Explore how IoT (Internet of Things) technology enhances the functionality and efficiency of slimming machines, providing advanced capabilities for personalized treatments and streamlined operations.</div>
        </div>
        <div class="iot-feature">
            <x-partial.list-feature-iot title="Remote Monitoring and Control" src="{{asset('assets/file/unsplash5sDRGl2PrNM.png')}}" desc="Enables practitioners to monitor treatments remotely, adjust settings, and ensure consistent, personalized care." />
            <x-partial.list-feature-iot title="Data Analytics for Personalized Treatment" src="{{asset('assets/file/peneliti-cewe.jpeg')}}" desc="Utilizes data analytics to gather treatment metrics, analyze trends, and tailor treatment plans to individual client needs, optimizing results and enhancing client experience" />
            <x-partial.list-feature-iot title="Automated Maintenance and Updates" src="{{asset('assets/file/slider-main.jpeg')}}" desc="IoT integration automates machine maintenance schedules and software updates, minimizing downtime and ensuring machines operate at peak performance levels consistently." />
        </div>
    </div>
    <div class="section specs-products px-3">
        <div class="specs-products-header">
            <div class="specs-products-title">Lyra Slimming Machine Specifications</div>
            <div class="specs-products-text">Delve into the detailed specifications of the Lyra Slimming Machine, showcasing advanced technologies</div>
            <div class="specs-products-button">
                <a class="left-button product-button">Become Distributor</a>
                <a class="right-button product-button">Order Now <img src="{{asset('assets/img/logo danmogot 2.png')}}" alt=""></a>
            </div>
        </div>
        <div class="position-relative section section-thing-two">
            <div class="position-relative thing-img-spec">
                <img class="img-thing-orange" src="{{asset('assets/file/thing-oranges.png')}}" alt="">
                <img class="img-thing-pink" src="{{asset('assets/file/thing-pinks.png')}}" alt="">
                <div class="circle-white-product"></div>
                <div class="circle-white-product2"></div>
            </div>
            <div class="section-specs">
                @if(isset($card_one))
                    <div class="toRight-specs item-first">
                        @foreach ($card_one as $row)
                            <div class="specs-details-text">
                                <div class="specs-details-title">{{ $row['menu'] }}</div>
                                <div class="specs-details-desc">{{  $row['description'] }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(isset($card_three))
                    <div class="toLeft-specs seconds item-second">
                        {{-- <div class="specs-details-text">
                            <div class="specs-details-title">Handpiecer</div>
                            <div class="specs-details-desc">
                                <div>1×Vacuum+RF (56x80.5mm)</div>
                                <div>1×Vacuum+RF (34.5x48mm)</div>
                                <div>1×Vacuum+RF (18x25mm)</div>
                                <div>1×Vacuum+RF (8.5x15mm)</div>
                            </div>
                        </div> --}}
                        @foreach ($card_three as $row)
                        <div class="specs-details-text">
                            <div class="specs-details-title">{{ $row['menu'] }}</div>
                            <div class="specs-details-desc">{{  $row['description'] }}</div>
                        </div>
                        @endforeach
                    </div>
                @endif

                @if(isset($card_two))
                    <div class="toRight-specs seconds item-third">
                        @foreach ($card_two as $row)
                            <div class="specs-details-text">
                                <div class="specs-details-title">{{ $row['menu'] }}</div>
                                <div class="specs-details-desc">{{  $row['description'] }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="dot-header-product mt-3">
                <div class="dot-product" onclick="slider(1)"></div>
                <div class="dot-product" onclick="slider(2)"></div>
                <div class="dot-product" onclick="slider(3)"></div>
            </div>
        </div>
    </div>
    <script>
            function slider(elnth) {
            el = document.querySelector(`.dot-product:nth-child(${elnth})`)
            allel = document.querySelectorAll(`.dot-product`)
            if (el != null) {
                margins = 100
                if (elnth == 3) {
                    margins = 100
                }
                let calc = margins * elnth - margins
                for (let index = 0; index < allel.length; index++) {
                    allel[index].classList.remove('isActive')
                }
                el.classList.add('isActive')
                document.querySelector(".section-specs").style.marginLeft = '-' +calc + '%'
            }
        }
        slider(2)
    </script>
    @if(isset($DataVideo) && !empty($DataVideo))
        <div class="section-video" style="background: url('{{asset('assets/file/bg-product-vid.jpeg')}}') no-repeat center center; bacground-size:cover;">
            <div class="video-detail">
                <div class="row gap-5 justify-content-center">
                    <div class="col-12 py-5">
                        <div class="d-flex justify-content-center align-items-center flex-column gap-3 head-desc">
                            <div class="head-title-video-section">Patents at Jeungga</div>
                            <div class="head-text-video-section">
                                {{ $DataVideo[0]->title ?? '' }}
                            </div>
                            <div class="head-desc-video-section">
                                <p>{{ $DataVideo[0]->description ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="glow-1-video"></div>
                <div class="glow-2-video"></div>
                <div class="line-1" style="position: absolute; top:0%; left: 0%;">
                    <svg viewBox="0 0 74 136" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M36.5 -72.75L38.0073 109.878" stroke="url(#paint0_linear_1_16018)" stroke-opacity="0.5" stroke-width="3.83287"/>
                        <g filter="url(#filter0_f_1_16018)">
                        <path d="M37.9922 -3.74219L36.4922 110.258" stroke="#ECE5D3" stroke-opacity="0.39" stroke-width="21.4442"/>
                        </g>
                        <defs>
                        <filter id="filter0_f_1_16018" x="0.752802" y="-28.9015" width="72.9788" height="164.319" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="12.5091" result="effect1_foregroundBlur_1_16018"/>
                        </filter>
                        <linearGradient id="paint0_linear_1_16018" x1="37" y1="-72.7541" x2="38.4797" y2="106.533" gradientUnits="userSpaceOnUse">
                        <stop offset="0.0250153" stop-color="white"/>
                        <stop offset="1" stop-color="#ECE5D3"/>
                        </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="line-2" style="position: absolute; top:0%; right: 0%;">
                    <svg viewBox="0 0 299 141" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_f_1_16021)">
                        <path d="M265.036 7.104L265.036 124.134" stroke="#ECE5D3" stroke-opacity="0.39" stroke-width="13.9423"/>
                        </g>
                        <path d="M262.527 121.432H529.68" stroke="url(#paint0_linear_1_16021)" stroke-opacity="0.5" stroke-width="3.46952"/>
                        <path d="M263.329 121.168L0.74222 121.168" stroke="url(#paint1_linear_1_16021)" stroke-opacity="0.5" stroke-width="3.46952"/>
                        <path d="M263.329 2.67969L264.309 121.419" stroke="url(#paint2_linear_1_16021)" stroke-opacity="0.5" stroke-width="2.49201"/>
                        <defs>
                        <filter id="filter0_f_1_16021" x="241.799" y="-9.16205" width="46.4745" height="149.562" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="8.13303" result="effect1_foregroundBlur_1_16021"/>
                        </filter>
                        <linearGradient id="paint0_linear_1_16021" x1="262.527" y1="121.432" x2="490.214" y2="121.432" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#ECE5D3"/>
                        <stop offset="1" stop-color="#8E783E" stop-opacity="0"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_1_16021" x1="263.329" y1="121.168" x2="39.5335" y2="121.168" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#ECE5D3"/>
                        <stop offset="1" stop-color="#8E783E" stop-opacity="0"/>
                        </linearGradient>
                        <linearGradient id="paint2_linear_1_16021" x1="263.829" y1="2.67556" x2="264.791" y2="119.243" gradientUnits="userSpaceOnUse">
                        <stop offset="0.0250153" stop-color="white"/>
                        <stop offset="1" stop-color="#ECE5D3"/>
                        </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="play-video">
                <svg width="122" height="123" viewBox="0 0 122 123" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="61.0002" cy="61.3242" r="60.74" fill="white" fill-opacity="0.08"/>
                    <circle cx="61.0002" cy="61.3242" r="60.5728" stroke="white" stroke-opacity="0.42" stroke-width="0.334349"/>
                    <circle cx="60.9986" cy="61.3226" r="48.3134" fill="white" fill-opacity="0.17" stroke="#D0D0D0" stroke-width="0.334349"/>
                    <circle cx="61.0021" cy="61.3261" r="37.3356" fill="white"/>
                    <circle cx="61.0021" cy="61.3261" r="37.3356" fill="url(#paint0_radial_1_6689)"/>
                    <path d="M58.7156 71.4146L74.8717 62.4927C75.1319 62.3489 75.3409 62.1705 75.4841 61.9698C75.6273 61.769 75.7015 61.5507 75.7015 61.3298C75.7015 61.1088 75.6273 60.8905 75.4841 60.6898C75.3409 60.489 75.1319 60.3106 74.8717 60.1668L58.7156 51.2449C57.1735 50.3934 54.7915 51.0994 54.7915 52.4078V70.2542C54.7915 71.5627 57.1735 72.2686 58.7156 71.4146Z" fill="#F5BE32"/>
                    <defs>
                    <radialGradient id="paint0_radial_1_6689" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(61.0021 61.3261) rotate(90) scale(37.3356)">
                    <stop stop-color="#ECE5D3" stop-opacity="0"/>
                    <stop offset="1" stop-color="#ECE5D3"/>
                    </radialGradient>
                    </defs>
                </svg>
            </div>
        </div>

        <script>
            $(".play-video").click(function () {
                htmls = `
                <div class="bg-video-playerss">
                    <div class="video-player">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-close icon icon-tabler icon-tabler-x" style="display:block;margin-buttom:10px; margin-left:auto;" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                        <video class="video-product" alt="{{$DataVideo[0]->description ?? ''}}" title="{{$DataVideo[0]->title ?? ''}}" loop autoplay>
                            <source src="{{config('services.api_domain.base_api_image_url').$DataVideo[0]->video_path ?? ''}}"></source>
                        </video>
                    </div>
                </div>
                `
                $("#video-player").html(htmls)
                $(".icon-close").click(function () {
                    $("#video-player").html('')
                    $("#video-player").removeClass('isActive')
                })
                $("#video-player").addClass('isActive')
            })
        </script>
    @endif

@endif
