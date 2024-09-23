@php
use App\Utility\HttpHandler;
$cookielang = 'en';
$response_banner = HttpHandler::postJson("module/slider/list",[
    'lang' => $cookielang
])->getData();
if(isset($response_banner->data)) {
    $idToFind = '/contact-us';
    $result = array_filter($response_banner->data, function($item) use ($idToFind) {
        return $item->link === $idToFind;
    });

    $foundItem = reset($result);
}
@endphp
@if(isset($foundItem->title))
    <x-partial.heros title="{{ $foundItem->title }} " imageSrc="{{config('services.api_domain.base_api_image_url').$foundItem->image_path}}" bgColor="#22333C80;" />
    <style>
        .why-jeungga-heros{
            background-position: 90% top !important;
            /* background-size: 250% 250% !important; */
            background-size: cover;
            object-fit: 1;
            @media (min-width:992px) {
                background-position: center top !important;
            }
        }
    </style>
    <div class="header-tech container-fluid thumbnail-jeunggas pb-5 overflow-hidden parent-top-contact-us-section">
        <div class="position-absolute d-flex" style="left: 0;right:0;display:flex;justify-content:center;z-index:0;">
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
        <div class="gap-5 justify-content-center p-md-4 p-0 mt-3" style="position: relative;z-index: 1;">
            <div class="parent-content-contact-us">
                <div class="content-contact-us-left">
                    <div class="contact-us-content-title">
                        <h1>Get In Touch</h1>
                        <p>
                            Get in touch with ®Jeungga for any inquiries or additional information. Our offices in Korea, Indonesia, and Saudi Arabia are ready to assist you.
                        </p>
                    </div>
                    <div class="form-format">
                        <form action="#" class="form-parent-contact">
                            <div class="form-child-contact">
                                <input type="text" class="form-double" id="name" placeholder="Name">
                                <input type="text" class="form-double" id="email" placeholder="Email">
                            </div>
                            <div class="form-child-contact">
                                <input type="text" class="form-single" id="address" placeholder="Address">
                                <input type="text" class="form-single" id="phone" placeholder="Phone Number">
                            </div>
                            <div class="form-child-contact">
                                <input type="text" class="form-single" id="country" placeholder="Country">
                            </div>
                            <div class="form-child-contact">
                                <input type="text" class="form-single" id="subject" placeholder="Subject">
                            </div>
                            <div class="form-child-contact">
                                <textarea name="" id="message" cols="30" rows="10" class="textarea-contact" placeholder="Message"></textarea>
                            </div>
                            <div class="form-child-contact">
                                <button type="button" id="btn-save-contact-us" onclick="saveContactUs()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="images-contact-us">
                    <img src="{{asset('assets/file/contact-us-image.png')}}" alt="" class="img-contact" style="margin-top: 12px;">
                    <div class="contact-me-group">
                        <div class="contact-us-email">
                            <div>
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.04688 11.2957V23.4832C4.04688 23.7318 4.14565 23.9703 4.32146 24.1461C4.49728 24.3219 4.73573 24.4207 4.98438 24.4207H25.6094C25.858 24.4207 26.0965 24.3219 26.2723 24.1461C26.4481 23.9703 26.5469 23.7318 26.5469 23.4832V11.2957L15.2969 3.79565L4.04688 11.2957Z" stroke="#ECE5D3" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M26.5469 11.2957L17.343 17.8582H13.252L4.04688 11.2957" stroke="#ECE5D3" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="title-contact-email">
                                <div class="minml-14" style="margin-left: -59px;">Email Address</div>
                                <div>{{$Data[0]->email}}</div>
                            </div>
                        </div>
                        <div class="contact-us-email">
                            <div>
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.5613 17.1691C19.6912 17.0827 19.8405 17.0301 19.9958 17.016C20.1511 17.0019 20.3075 17.0267 20.4508 17.0883L25.9773 19.5644C26.1636 19.644 26.3191 19.7818 26.4205 19.9572C26.5219 20.1325 26.5637 20.336 26.5398 20.5371C26.3578 21.8977 25.6878 23.1459 24.6544 24.0495C23.621 24.9531 22.2946 25.4506 20.9219 25.4496C16.695 25.4496 12.6412 23.7705 9.65236 20.7816C6.6635 17.7927 4.98438 13.739 4.98438 9.51209C4.98333 8.13936 5.48087 6.81297 6.38449 5.77959C7.2881 4.74621 8.53627 4.07619 9.89688 3.89412C10.098 3.87023 10.3015 3.91211 10.4768 4.01351C10.6521 4.11491 10.7899 4.27037 10.8695 4.45662L13.3457 9.98787C13.4065 10.1299 13.4313 10.2848 13.4178 10.4388C13.4043 10.5927 13.353 10.741 13.2684 10.8703L10.7641 13.848C10.6752 13.9821 10.6227 14.1369 10.6116 14.2973C10.6005 14.4577 10.6312 14.6183 10.7008 14.7633C11.6699 16.7472 13.7207 18.7734 15.7105 19.7332C15.8563 19.8024 16.0176 19.8325 16.1785 19.8203C16.3394 19.8082 16.4944 19.7543 16.6281 19.664L19.5613 17.1691Z" stroke="#ECE5D3" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="title-contact-email">
                                <div class="minml-15">Phone Number</div>
                                <div>{{$Data[0]->phone}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
