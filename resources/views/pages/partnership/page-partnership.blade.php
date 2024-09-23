@php
use App\Utility\HttpHandler;
$cookielang = 'en';
$response_banner = HttpHandler::postJson("module/slider/list",[
    'lang' => $cookielang
])->getData();
if(isset($response_banner->data)) {
    $idToFind = '/partnership';
    $result = array_filter($response_banner->data, function($item) use ($idToFind) {
        return $item->link === $idToFind;
    });

    $foundItem = reset($result);
}
@endphp
@if(isset($foundItem->title))
    <x-partial.heros title="{{ $foundItem->title }}" imageSrc="{{config('services.api_domain.base_api_image_url').$foundItem->image_path}}" bgColor=""/>
    <section class="our-current-partner">
        <h1>Our Current Partner</h1>
        <p>Collaborations bolstering ® Jeungga's ability to provide leading-edge beauty technology solutions worldwide</p>
        <div class="partnership-header">
            <div class="slidersss partnership-slider partnership-slider-first">
                <div class="list" style="--item: {!!count($Data)!!}">
                    @php
                        $a = 1;
                    @endphp
                    @foreach ($Data as $item)
                        <img class="item" style="--position: {!!$a++!!}" src="{{config('services.api_domain.base_api_image_url').$item->image_path}}" alt="{{$item->name}}">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="bg-partnership">
        <div class="partnership-text" style="width: {!!(count($Datas) * 90) - (count($Datas) * 10)!!}%">
            @foreach ($Datas as $key => $item)
                <div class="each-section" data-target="{{$key}}">
                    <h2>{{$item->name}}</h2>
                    <p class="c-black">{{$item->description}}</p>
                    <div class="img-distributor-network"style="background: url('{{config('services.api_domain.base_api_image_url').$item->image_path}}') no-repeat center center;"></div>
                </div>
            @endforeach
        </div>
    </section>
        <script>
            let activePartnerShip = 1
            let start = 10;
            function setClassActive() {
                let partnershipSection = document.querySelector(".partnership-text")
                let partnershipSectionChild = document.querySelectorAll(".each-section")
                let start = 10
                // partnershipSection.forEach((element, index) => {
                //     console.log(index)
                // });
                for (let index = 0; index < partnershipSectionChild.length; index++) {
                    if ($(partnershipSectionChild[index]).hasClass('isActive')) {
                        $(partnershipSectionChild[index]).removeClass('isActive')
                    }
                    if (index == activePartnerShip) {
                        partnershipSectionChild[index].classList.add('isActive')
                        let percentage = start - (activePartnerShip * 80)
                        $(partnershipSection).css('margin-left',percentage + '%')
                    }
                }
            }
            setClassActive()
            setLeftRight()
            $(".each-section").click(function (e) {
                activePartnerShip = $(this).data('target')
                setClassActive()
                setLeftRight()
            })

            function setLeftRight() {
                let partnershipSectionChild = document.querySelectorAll(".each-section")
                if (partnershipSectionChild.length == 1) {
                    return
                }
                for (let index = 0; index < partnershipSectionChild.length; index++) {
                    partnershipSectionChild[index].classList.remove('isRight')
                    partnershipSectionChild[index].classList.remove('isLeft')
                }
                let tmp = activePartnerShip
                if (activePartnerShip == 0) {
                    partnershipSectionChild[tmp + 1].classList.add('isRight')
                    return
                }
                if (activePartnerShip == (partnershipSectionChild.length - 1)) {
                    partnershipSectionChild[tmp - 1].classList.add('isLeft')
                    return
                }
                partnershipSectionChild[tmp + 1].classList.add('isRight')
                partnershipSectionChild[tmp - 1].classList.add('isLeft')
            }
        </script>
    <script>
        let isActive = 1
    </script>
    <section class="partnership-form">
        <h3>Become a Distributor</h3>
        <p>Discover how to join ®Jeungga's global network by accessing our distributor application form and detailed information</p>
        <div class="partnership-register">
            <div class="content-contact-us-left">
                <div class="form-format">
                    <h4>Company Information</h4>
                    <form action="#" class="form-parent-contact">
                        <div class="form-child-contact">
                            <input type="text" class="form-double" placeholder="Name">
                            <input type="text" class="form-double" placeholder="Address">
                        </div>
                        <div class="form-child-contact form-child-contact-select-nation">
                            <div class="form-single">
                                <div class="form-select-input">
                                    <div class="select-nation">
                                        <div class="selected-nation"></div>
                                        <div class="selecting-nation">
                                            <div class="each-nation" onclick="selecting(this)" data-id="1">
                                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1_16584)">
                                                    <path d="M8.48188 15.499C12.5773 15.499 15.8832 12.1931 15.8832 8.09766H1.08057C1.08057 12.1931 4.38649 15.499 8.48188 15.499Z" fill="#F9F9F9"/>
                                                    <path d="M8.48188 0.699219C4.38649 0.699219 1.08057 4.00514 1.08057 8.10053H15.8832C15.8832 4.00514 12.5773 0.699219 8.48188 0.699219Z" fill="#ED4C5C"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_1_16584">
                                                    <rect width="15.7895" height="15.7895" fill="white" transform="translate(0.631592 0.207031)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg>
                                                +62
                                            </div>
                                        </div>
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.466 3.97363L4.64645 6.79318L1.8269 3.97363" stroke="#ECE5D3" stroke-width="0.902256" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <input type="hidden" name="number_type" value="1">
                                    <input type="text" placeholder="Phone" value="">
                                </div>
                            </div>
                                <script>
                                    $(".select-nation").on('click', function(){
                                        if($(this).hasClass('isSelected')){
                                            $(this).removeClass('isSelected')
                                        }else{
                                            $(this).addClass('isSelected')
                                        }
                                    })
                                    $(document).on('click', function(event) {
                                        if (!$(event.target).closest('.select-nation').length)  {
                                                $(".select-nation").removeClass("isSelected");
                                        }
                                    });


                                    function selecting(e){
                                        var htmlsNation = $(e).html()
                                        $(".selected-nation").html(htmlsNation)
                                        $("input[name='number_type']").val($(e).data('id'))

                                        getSelected()
                                    }

                                    getSelected(false)

                                    function getSelected(inside = true){
                                        if (typeof $("input[name='number_type']").val() == 'undefined' || $("input[name='number_type']").val() == '') {
                                            return
                                        }
                                        var eachNation = $(".each-nation")
                                        // eachNation.forEach(element => {
                                        //     if ($(element).data('id') == $("input[name='number_type']").val()) {
                                        //         $(element).addClass('Selected')
                                        //     }
                                        // });
                                        for (let index = 0; index < eachNation.length; index++) {
                                            $(eachNation[index]).removeClass('Selected')
                                            if ($(eachNation[index]).data('id') == $("input[name='number_type']").val()) {
                                                $(eachNation[index]).addClass('Selected')
                                                if (!inside) {
                                                    var test = $(eachNation[index]).html()
                                                    $(".selected-nation").html(test)
                                                }
                                            }
                                        }
                                    }
                                    $(window).click(function (event) {
                                        event.stopPropagation();
                                    })
                                </script>
                            <input type="email" class="form-single" placeholder="Email">
                        </div>
                        <div class="form-child-contact">
                            <input type="text" class="form-single" placeholder="Subject : distributors inquiry">
                        </div>
                        <div class="form-child-contact">
                            <input type="text" class="form-single" placeholder="Website">
                        </div>
                        <div class="form-child-contact">
                            <button type="submit" class="submitting" style="
                                box-sizing: border-box;
                                display: flex;
                                flex-direction: row;
                                justify-content: center;
                                align-items: center;
                                padding: 16.5457px 16px;
                                gap: 10.34px;
                                background: linear-gradient(180deg, rgba(34, 51, 60, 0) 0%, rgba(34, 51, 60, 0.2) 100%), #ECE5D3;
                                border-radius: 16px;
                                font-family: 'Gabarito';
                                font-style: normal;
                                font-weight: 400;
                                font-size: 16px;
                                line-height: 19px;
                                letter-spacing: 0.725689px;
                                color: #22333C;
                            ">Submit Application</button>
                        </div>
                    </form>
                </div>
                <style>
                    input::placeholder{
                        color: rgba(236, 229, 211, 0.7) !important;
                    }
                </style>
            </div>
            <div class="grid-partnership">
                <div class="grid-partnership-first partnership-first">
                    <img class="first-first" src="{{asset('assets/file/partnership/grid-img/1-1.png')}}" alt="">
                    <img class="first-second" src="{{asset('assets/file/partnership/grid-img/1-2.png')}}" alt="">
                </div>
                <div class="grid-partnership-first partnership-second">
                    <img class="second-first" src="{{asset('assets/file/partnership/grid-img/2-1.png')}}" alt="">
                    <img class="second-second" src="{{asset('assets/file/partnership/grid-img/2-2.png')}}" alt="">
                </div>
                <div class="grid-partnership-first partnership-third">
                    <img class="third-first" src="{{asset('assets/file/partnership/grid-img/3-1.png')}}" alt="">
                    <img class="third-second" src="{{asset('assets/file/partnership/grid-img/3-2.png')}}" alt="">
                    <img class="third-third" src="{{asset('assets/file/partnership/grid-img/3-3.png')}}" alt="">
                </div>
                <div class="grid-partnership-first partnership-forth">
                    <img class="forth-first" src="{{asset('assets/file/partnership/grid-img/4-1.png')}}" alt="">
                    <img class="forth-second" src="{{asset('assets/file/partnership/grid-img/4-2.png')}}" alt="">
                    <img class="forth-third" src="{{asset('assets/file/partnership/grid-img/4-3.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
@endif
