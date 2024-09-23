<?php
    use App\Utility\HttpHandler;

    $cookielang = 'en';
    $response_banner = HttpHandler::postJson("module/slider/list",[
        'lang' => $cookielang
    ])->getData();

    if(isset($response_banner->data)) {
        $idToFind = 'why-jeungga';
        $result = array_filter($response_banner->data, function($item) use ($idToFind) {
            return $item->link === $idToFind;
        });

        $foundItem = reset($result);
    }

    $svg1 = '
        <svg style="width:75%;height:75%" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.042 15.9424H15.9658V23.0186H23.042V15.9424Z" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M30.1183 7.68689H8.88981C8.23847 7.68689 7.71045 8.21491 7.71045 8.86625V30.0948C7.71045 30.7461 8.23847 31.2741 8.88981 31.2741H30.1183C30.7697 31.2741 31.2977 30.7461 31.2977 30.0948V8.86625C31.2977 8.21491 30.7697 7.68689 30.1183 7.68689Z" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M31.2979 15.9424H34.8359" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M31.2979 23.0186H34.8359" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4.17236 15.9424H7.71045" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4.17236 23.0186H7.71045" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M23.042 31.2742V34.8123" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.9658 31.2742V34.8123" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M23.042 4.1488V7.68689" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M15.9658 4.1488V7.68689" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    ';

    $svg2='
        <svg style="width:75%;height:75%" viewBox="0 0 38 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.7636 26.1808C15.0225 27.6241 12.7552 29.0201 10.2933 28.9051C7.83063 28.7899 5.51088 27.7154 3.83048 25.9114C2.15008 24.1074 1.24254 21.7174 1.30207 19.2527C1.3616 16.7881 2.38348 14.4446 4.14901 12.7239C5.91454 11.0032 8.28347 10.0418 10.7488 10.0457H27.1198C32.3046 10.0457 36.627 14.1734 36.6933 19.3553C36.7099 20.6046 36.4782 21.8449 36.0116 23.004C35.5449 24.1631 34.8527 25.218 33.9751 26.1074C33.0975 26.9968 32.052 27.703 30.8992 28.185C29.7464 28.6671 28.5094 28.9154 27.2599 28.9155C24.9778 28.9155 22.8845 27.5371 21.2525 26.1882C20.6217 25.6655 19.8286 25.3789 19.0094 25.3775C18.1902 25.3762 17.3961 25.6602 16.7636 26.1808Z" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M11.9277 14.7631H26.0801" stroke="#ECE5D3" stroke-width="2.35872" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    ';

    $svg3 = '
        <div style="color:white;width: 60px;height: 60px;display: flex;align-items: center; justify-content: center;font-family: Raleway;
            font-size: 20px;
            font-weight: 800;
            line-height: 23.48px;
            letter-spacing: 0.2563777267932892px;
            text-align: center;
            ">
            eCRM
        </div>
    ';
?>
@if(isset($foundItem->title))
    <x-partial.heros title="{{ $foundItem->title }}" imageSrc="{{config('services.api_domain.base_api_image_url').$foundItem->image_path}}" bgColor=""/>
    <div class="container-fluid thumbnail-jeungga pb-5">
        <div class="position-absolute d-flex" style="left: 0;right:0;display:flex;justify-content:center;">
            <svg class="" style="left: 0;right:0;" width="502" height="668" viewBox="0 0 502 668" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_f_1_7215)">
                <path d="M223.311 18.3906H287.789L342.343 637.445H168.75L223.311 18.3906Z" fill="url(#paint0_linear_1_7215)" fill-opacity="0.1"></path>
                </g>
                <g filter="url(#filter1_f_1_7215)">
                <path d="M301.372 13.7804L350.569 7.45515L471.136 616.104L338.684 633.133L301.372 13.7804Z" fill="url(#paint1_linear_1_7215)" fill-opacity="0.1"></path>
                </g>
                <g filter="url(#filter2_f_1_7215)">
                <path d="M147 5.3786L206.779 11.7347L191.906 632.697L30.961 615.585L147 5.3786Z" fill="url(#paint2_linear_1_7215)" fill-opacity="0.1"></path>
                </g>
                <defs>
                <filter id="filter0_f_1_7215" x="138.75" y="-11.6094" width="233.594" height="679.055" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                <feGaussianBlur stdDeviation="15" result="effect1_foregroundBlur_1_7215"></feGaussianBlur>
                </filter>
                <filter id="filter1_f_1_7215" x="271.372" y="-22.5448" width="229.764" height="685.678" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                <feGaussianBlur stdDeviation="15" result="effect1_foregroundBlur_1_7215"></feGaussianBlur>
                </filter>
                <filter id="filter2_f_1_7215" x="0.960938" y="-24.6215" width="235.818" height="687.319" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                <feGaussianBlur stdDeviation="15" result="effect1_foregroundBlur_1_7215"></feGaussianBlur>
                </filter>
                <linearGradient id="paint0_linear_1_7215" x1="255.546" y1="18.3906" x2="255.546" y2="637.445" gradientUnits="userSpaceOnUse">
                <stop stop-color="white"></stop>
                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                </linearGradient>
                <linearGradient id="paint1_linear_1_7215" x1="325.968" y1="10.6181" x2="404.91" y2="624.619" gradientUnits="userSpaceOnUse">
                <stop stop-color="white"></stop>
                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                </linearGradient>
                <linearGradient id="paint2_linear_1_7215" x1="176.886" y1="8.5563" x2="111.433" y2="624.141" gradientUnits="userSpaceOnUse">
                <stop stop-color="white"></stop>
                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="row gap-5 justify-content-center">
            <div class="col-12 py-5">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <div class="head-title-whyjeungga">Why <span>®</span> Jeungga</div>
                    <div>
                        <h1 class="title-whyjeungga">Jeungga's Unique Value</h1>
                    </div>
                </div>
            </div>
            <div class="feature-thumbnail-group">
                <x-partial.feature-thumbnail icon="{!!$svg1!!}" title="IoT Technology" text="Utilize state-of-the-art IoT innovations for precise and customized beauty solutions."/>
                <x-partial.feature-thumbnail icon="{!!$svg2!!}" title="Medical Records Integration" text="Seamlessly integrate patient records for efficient and personalized treatments."/>
                <x-partial.feature-thumbnail icon="{!!$svg3!!}" title="eCRM Excellence" text="Enhance client relationships with advanced eCRM solutions for superior customer satisfaction."/>
            </div>
        </div>
    </div>
    <div class="parent-discover-section">
        <div class="discover-section section"  style="width:90%;margin:auto;">
            <div class="discover-header">
                <div class="discover-title">
                    <h3>Discover how <span style="font-size: 0.4em;vertical-align: super; letter-spacing:-5px;line-height: 45px;">®</span>Jeungga <img class="txt-inline" src="{{asset('assets/img/machine-3x.png')}}" alt="">differentiate themselves in the market with advanced <img class="txt-inline" src="{{asset('assets/img/tech-3x.png')}}" alt=""></h3>
                </div>
                <div class="discover-desc">
                    <div class="discover-text">
                        <p style="margin-left: auto">These competitive advantages establish ® Jeungga as a prominent player in the beauty technology industry</p>
                    </div>
                </div>
            </div>
            <div class="discover-peneliti" style="background: url('{{asset('assets/file/peneliti.jpeg')}}');background-position:50% 50%;background-size:cover;border-radius:60px;"> {{-- min height 417.19 --}}</div>
        </div>
        <div class="overflow-hidden slider-parent-top">
            <div class="discover-slider-header">
                <div class="discover-slider-endstart">
                    <x-partial.slider-after />
                </div>
                {{-- <div class="discover-slider"> --}}
                    <div class="card-to" onclick="slider(1)">
                        <div class="card-to-text">
                            <h4>Advance</h4>
                            <p>Technology Integration</p>
                        </div>
                        <div class="card-to-img" style="background: url({{asset('assets/file/card-slider.jpeg')}});background-position:50% 50%;background-size:cover;" ></div>
                    </div>
                    <div class="card-to-double" onclick="slider(2)">
                        <div class="slider-main-top" style="background: url('{{asset('assets/file/slider-main.jpeg')}}');background-position:40% 0%;background-size:150%;">
                            <div class="slider-title">Inovative</div>
                            <div class="slider-desc">Industry leadership</div>
                        </div>
                        <div class="slider-main-bottom" style="background: url('{{asset('assets/file/slider-main.jpeg')}}');background-position:40% 120%;background-size:150%;;">
                            <div class="slider-title">Client</div>
                            <div class="slider-desc">Centric Approach</div>
                        </div>
                    </div>
                    <div class="card-to"  onclick="slider(3)">
                        <div class="card-to-img" style="background: url({{asset('assets/file/card-slider.jpeg')}});background-position:50% 50%;background-size:cover;" ></div>
                        <div class="card-to-text">
                            <h4>Inovative</h4>
                            <p>Industry Leadership</p>
                        </div>
                    </div>

                {{-- </div> --}}
                <div class="discover-slider-endstart">
                    <x-partial.slider-before />
                </div>
            </div>
            <div class="dot-header">
                <div class="dot" onclick="slider(1)"></div>
                <div class="dot" onclick="slider(2)"></div>
                <div class="dot" onclick="slider(3)"></div>
            </div>
        </div>
    </div>
    <script>
        function slider(elnth) {
            // console.log(elnth)
            el = document.querySelector(`.dot:nth-child(${elnth})`)
            allel = document.querySelectorAll(`.dot`)
            if (el != null) {
                let calc = 50 * elnth - 50
                for (let index = 0; index < allel.length; index++) {
                    allel[index].classList.remove('isActive')
                }
                // el.addEventListener('click', function () {
                    el.classList.add('isActive')
                    document.querySelector(".discover-slider-header").style.marginLeft = '-' +calc + '%'
                // })
            }
        }
        slider(2)

        // document.querySelector(".dot:nth-child(1)").addEventListener('click', function () {
        //     header = document.querySelector(".discover-slider-header").style.marginLeft = '0%';
        // })

        // document.querySelector(".dot:nth-child(2)").addEventListener('click', function () {
        //     header = document.querySelector(".discover-slider-header").style.marginLeft = '-50%';
        // })
        // document.querySelector(".dot:nth-child(3)").addEventListener('click', function () {
        //     header = document.querySelector(".discover-slider-header").style.marginLeft = '-100%';
        // })
    </script>
@endif
