@php
use App\Utility\HttpHandler;
$cookielang = 'en';
$response_banner = HttpHandler::postJson("module/slider/list",[
    'lang' => $cookielang
])->getData();
if(isset($response_banner->data)) {
    $idToFind = '/newsroom';
    $result = array_filter($response_banner->data, function($item) use ($idToFind) {
        return $item->link === $idToFind;
    });

    $foundItem = reset($result);
}
@endphp
@if(isset($foundItem->title))
    <x-partial.heros title="{{$foundItem->title}}" imageSrc="{{config('services.api_domain.base_api_image_url').$foundItem->image_path}}" bgColor=""/>
    <style>

        @media (max-width: 375px) {

            .why-jeungga-heros{
                background-position: 37% 100% !important;
            }
        }
        .head-desc-video-section{
            color: #ECE5D3;
            @media (min-width: 768px;) {
                color: white !important;
            }
        }
    </style>
    <div>
        <div class="position-relative">
            <div class="bg-technology">
                <div class="header-tech pb-5">
                    <div class="px-5 pt-5 newsroom-header">
                        <h1>
                            Our Gallery
                        </h1>
                        <p>
                            Explore our Gallery, where technology enhances beauty. Discover advanced innovations and personalized treatments revolutionizing the industry.
                        </p>
                    </div>
                    <div class="overflow-hidden px-5">
                        <div class="gallery-parent">
                            @foreach ($Data as $item)
                                <div class="gal-child">
                                    @foreach ($item as $list)
                                        @if($list->flag == 'medium')
                                            <div class="gal-two-one-sec" style="background: url('{{config('services.api_domain.base_api_image_url').$list->image_path}}') no-repeat center center;background-size:cover;"></div>
                                        @endif
                                        @if ($list->flag == 'small')
                                            <div class="gal-two-two-sec" style="background: url('{{config('services.api_domain.base_api_image_url').$list->image_path}}') no-repeat center center;background-size:cover;"></div>
                                        @endif
                                        @if ($list->flag == 'big')
                                            <div class="big-gal-one" style="background: url('{{config('services.api_domain.base_api_image_url').$list->image_path}}') no-repeat center center;background-size:cover;"></div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="arrows-group">
                        <div class="arrows arrow-left">
                            <svg viewBox="0 0 46 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M44.4121 10L1.58855 10" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.6074 19L1.58827 10L12.6074 1" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="arrows arrow-right">
                            <svg viewBox="0 0 46 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M44.4121 10L1.58855 10" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.6074 19L1.58827 10L12.6074 1" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <script>
                        galChild = document.querySelectorAll('.gal-child')

                        galParent = document.querySelector('.gallery-parent')
                        var x = window.matchMedia("(max-width: 768px)")
                        galParent.style.width = galChild.length * 100 + '%'
                        if (x.matches) {
                            for (let index = 0; index < galChild.length; index++) {
                                galChild[index].style.width = (100 / galChild.length) + '%'
                            }
                        }else{
                            for (let index = 0; index < galChild.length; index++) {
                                galChild[index].style.width = (100 / galChild.length) / 2 + '%'
                            }
                        }
                        x.addEventListener("change", (event) => {
                            if (x.matches) {
                                for (let index = 0; index < galChild.length; index++) {
                                    galChild[index].style.width = (100 / galChild.length) + '%'
                                }
                            }else{
                                for (let index = 0; index < galChild.length; index++) {
                                    galChild[index].style.width = (100 / galChild.length) / 2 + '%'
                                }
                            }
                        });
                        itemActive = 1
                        arrowRight = document.querySelector(".arrow-right")
                        arrowLeft = document.querySelector(".arrow-left")

                        if (itemActive == 1) {
                            minus = 0
                            arrowLeft.style.opacity = ".4"
                        }
                        if (itemActive == galChild.length) {
                            arrowRight.style.opacity = ".4"
                        }
                        arrowRight.addEventListener('click', function () {
                            let minus = 1
                            if (!x.matches) {
                                if (itemActive == Math.ceil(galChild.length / 2)) {
                                    arrowRight.style.opacity = ".4"
                                    return
                                }
                            }else{
                                if (itemActive == galChild.length) {
                                    arrowRight.style.opacity = ".4"
                                    return
                                }
                            }
                            arrowLeft.style.opacity = 1
                            itemActive++;
                            if (!x.matches) {
                                if (itemActive == Math.ceil(galChild.length / 2)) {
                                    arrowRight.style.opacity = ".4"
                                }
                            }else{
                                if (itemActive == galChild.length) {
                                    arrowRight.style.opacity = ".4"
                                }
                            }
                            // let px = 60
                            px = 0
                            if (!x.matches) {
                                px = (60 * (itemActive - minus))
                                // px = 0
                            }
                            galParent.style.marginLeft =  "calc(" + (itemActive - minus) * -100 + "% - " + px +"px)"
                        })
                        arrowLeft.addEventListener('click', function () {
                            let minus = 1
                            if (itemActive == 1) {
                                minus = 0
                                arrowLeft.style.opacity = ".4"
                                return
                            }
                            arrowRight.style.opacity = 1
                            itemActive--;
                            if (itemActive == 1) {
                                arrowLeft.style.opacity = ".4"
                            }
                            // let px = 60
                            px = 0
                            if (!x.matches) {
                                px = (60 * (itemActive - minus))
                                // px = 0
                            }
                            galParent.style.marginLeft = "calc(" + (itemActive - minus) * -100 + "% - " + px + "px)"
                            // galParent.style.marginLeft = 'unset'
                        })
                    </script>
                </div>
            </div>
        </div>
        <div class="newsroom-video-parent">
            <div class="section-video">
                <div class="video-detail backgrond-detail-newsroom-video">
                    <div class="row gap-5 justify-content-center">
                        <div class="col-12 py-5">
                            <div class="d-flex justify-content-center align-items-center flex-column gap-3 head-desc">
                                <div class="head-text-video-section" style="font-size: 26px;">
                                    Our Documents
                                </div>
                                <div class="head-desc-video-section">
                                    <p>{{$Datas[0]->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="change-video">
                <div class="arrows-settings px-5">
                    <div class="arrows-group">
                        <div class="arrows-bg arrow-left" style="scale: .8" onclick="backBg()">
                            <svg class="arrow-inside" viewBox="0 0 46 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M44.4121 10L1.58855 10" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.6074 19L1.58827 10L12.6074 1" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="arrows-bg arrow-right" style="scale: .8" onclick="nextBg()">
                            <svg class="arrow-inside" viewBox="0 0 46 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M44.4121 10L1.58855 10" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.6074 19L1.58827 10L12.6074 1" stroke="#ECE5D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-video-overflow">
                    <div class="bg-video-newsroom">
                        @foreach ($Datas as $item => $value)
                            <video class="video-newsroom" autoplay muted onclick="changebgNewsRoom(this, {{$item}}, false)">
                                <source src="{{config('services.api_domain.base_api_image_url').$value->video_path}}">
                            </video>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let stateVideo = false
            let videonews = document.querySelectorAll('.video-newsroom')
            for (let index = 0; index < videonews.length; index++) {
                videonews[index].style.width = 100/videonews.length + "%"
                videonews[index].style.height = (174 / 4 * 3) + "px"
            }
            document.querySelector(".bg-video-newsroom").style.width = (document.querySelectorAll(".video-newsroom").length * 25) + "%"
            document.querySelector(".bg-video-newsroom").style.paddingLeft = 5 + "%"
            let play = `<div class="playbutton">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="white"  class="icon icon-tabler icons-tabler-filled icon-tabler-player-play"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" /></svg>
            </div>`
            let pause = `
            <div class="pausebutton">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="white"  class="icon icon-tabler icons-tabler-filled icon-tabler-player-pause"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z" /><path d="M17 4h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2z" /></svg>
            </div>`
            let arrayNews =
            [
                @foreach ($Datas as $item)
                    @php
                        $width = 100 / count($Datas);
                    @endphp
                    {
                        videoSrc : '{{config('services.api_domain.base_api_image_url').$item->video_path}}',
                        description: '{{$item->description}}',
                        styleisActive : 'opacity:1;width:{{$width}}%;object-fit:cover;',
                        style : 'opacity:.6;width:{{$width}}%;object-fit:cover;'
                    },
                @endforeach
            ]
            changebgNewsRoom(null, 0)
            function changebgNewsRoom(el = null, i, firstLoad = true) {
                document.querySelector(".bg-video-newsroom").style.width = (document.querySelectorAll(".video-newsroom").length * 25) + "%"
                document.querySelector(".bg-video-newsroom").style.paddingLeft = 5 + "%"
                document.querySelector(".bg-video-newsroom").style.paddingRight = 5 + "%"
                isActive = i
                let vidnewsroom = document.querySelectorAll(".video-newsroom")
                for (let index = 0; index < vidnewsroom.length; index++) {
                    vidnewsroom[index].style.cssText = arrayNews[index].style
                }
                if (el == null) {
                    vidnewsroom[i].style.cssText = arrayNews[i].styleisActive
                }else{
                    el.style.cssText = arrayNews[i].styleisActive
                }
                if (firstLoad) {
                    html = `<video class="video-autoplay">
                        <source src="${arrayNews[i].videoSrc}">
                    </video>`
                    $(".newsroom-video-parent").prepend(html)
                }

                $('.video-autoplay source').attr('src', arrayNews[i].videoSrc)
                document.querySelector('.video-autoplay').pause()
                document.querySelector('.video-autoplay').load()
                // $(".video-autoplay").remove()
                stateVideo = false
                // appendPausePlay()
                _this = arrayNews;
                this_index = i;
                if (firstLoad) {
                    document.querySelector('.video-autoplay').pause()
                    $(".pausebutton").remove()
                    $(".newsroom-video-parent").prepend(play);
                    $(".newsroom-video-parent").click(function (e,) {
                        $(".head-desc-video-section p").html(_this[this_index].description)
                        if($(e.target).hasClass('video-newsroom') || $(e.target).hasClass("arrows-bg") || $(e.target).hasClass('arrow-inside')) {
                            $(".newsroom-video-parent").prepend(play)
                            $(".pausebutton").remove()
                            return
                        }
                        stateVideo = !stateVideo
                        // stateVideo = true
                        appendPausePlay()
                        // $(".playbutton").click(function () {
                        //     // stateVideo = !stateVideo
                        //     appendPausePlay()
                        // })
                    })
                }
            }
            function appendPausePlay() {
                if (!stateVideo) {
                    document.querySelector('.video-autoplay').pause()
                    $(".pausebutton").remove()
                    $(".newsroom-video-parent").prepend(play)
                }else{
                    document.querySelector('.video-autoplay').play()
                    $(".newsroom-video-parent").prepend(pause)
                    $(".playbutton").remove()
                    setTimeout(() => {
                        $(".pausebutton").addClass('removing')
                    }, 200);
                    setTimeout(() => {
                        $(".pausebutton").remove()
                    }, 700)
                }
            }
            function backBg(){
                if ((isActive - 1) < 0) {
                    return
                }
                isActive = isActive - 1
                changebgNewsRoom(null, isActive, false)
            }
            function nextBg(){
                let vidnewsroom = document.querySelectorAll(".video-newsroom")

                if ((isActive + 1) >= vidnewsroom.length) {
                    return
                }
                isActive = isActive + 1
                changebgNewsRoom(null, isActive, false)
            }
        </script>
    </div>
    <div class="section-last-newsroom overflow-hidden">
        <div class="images-last-newsroom" style="background: url('{{asset('assets/file/alat-obat.jpeg')}}') no-repeat center center; background-size:cover;">
        </div>
        <div class="section-last-list-newsroom">
            <div class="parent-list-newsroom">
                <div class="section-list-newsroom">
                    <h3>Smart Skincare Analyzer</h3>
                    <p>The Smart Skincare Analyzer uses advanced sensors and AI to assess skin health. It provides personalized skincare recommendations based on real-time data.</p>
                </div>
                <div class="section-list-newsroom isActive">
                    <h3>IoT-Enhanced Beauty Mirror</h3>
                    <p>The IoT-Enhanced Beauty Mirror offers real-time skin analysis and personalized beauty tips. It connects to various smart beauty devices to enhance daily routines.</p>
                </div>
                <div class="section-list-newsroom">
                    <h3>Automated Facial Treatment System</h3>
                    <p>The Automated Facial Treatment System delivers professional-grade facials at home. It uses IoT technology to customize treatments based on individual skin needs.</p>
                </div>
            </div>
        </div>
        <script>
            let touchstartX = 0
            let touchendX = 0
            let newsRoomActive = 1;
            function checkDirection() {
                if (touchendX < touchstartX) return "left"
                if (touchendX > touchstartX) return "right"
            }

            document.querySelector('.parent-list-newsroom').addEventListener('touchstart', e => {
                touchstartX = e.changedTouches[0].screenX
            })
            parent = document.querySelector('.parent-list-newsroom')
            parent.style.marginLeft = 0
            parent.addEventListener('touchend', e => {
                if (window.matchMedia("(min-width:992px)").matches) {
                    return
                }
                touchendX = e.changedTouches[0].screenX

                if (newsRoomActive == 0 && checkDirection() == "right") {
                    console.log('cant go to more left')
                    return
                }
                if (newsRoomActive == (document.querySelectorAll('.section-list-newsroom').length - 1) && checkDirection() == "left") {
                    console.log('cant go to more right')
                    return
                }
                foreveryswipe = 105
                for (let index = 0; index < document.querySelectorAll('.section-list-newsroom').length; index++) {
                    document.querySelectorAll('.section-list-newsroom')[newsRoomActive].classList.remove('isActive')
                }
                if (checkDirection() == "left") {
                    newsRoomActive++
                    document.querySelectorAll('.section-list-newsroom')[newsRoomActive].classList.add('isActive')
                    parent.style.marginLeft = parseInt(parent.style.marginLeft) + (-1 * foreveryswipe - 2) + "%";
                }else{
                    newsRoomActive--
                    document.querySelectorAll('.section-list-newsroom')[newsRoomActive].classList.add('isActive')
                    parent.style.marginLeft = (parseInt(parent.style.marginLeft) + (foreveryswipe + 2)) + "%";
                }
            })

            function initSlides() {
                if (window.matchMedia("(min-width:992px)").matches) {
                    return
                }
                foreveryswipe = 102

                parent = document.querySelector('.parent-list-newsroom')
                for (let index = 0; index < document.querySelectorAll('.section-list-newsroom').length; index++) {
                    document.querySelectorAll('.section-list-newsroom')[newsRoomActive].classList.remove('isActive')
                }

                parent.style.marginLeft = parseInt(parent.style.marginLeft) + (-1 * foreveryswipe - 2) + "%";
                document.querySelectorAll('.section-list-newsroom')[newsRoomActive].classList.add('isActive')
            }
            initSlides()
        </script>
    </div>
@endif
