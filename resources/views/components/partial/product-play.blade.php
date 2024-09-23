@props(['color', 'imgSrc', 'with' => 'true'])
@if (isset($color) && $color != '' && $color = 'orange')
@php $color = 'background: linear-gradient(89.91deg, rgba(255, 255, 255, 0.03) -126.98%, rgba(29, 29, 29, 0.1) 133.52%);' @endphp
@else
@php $color = 'background: #ece5d3;' @endphp
@endif
@php
    if ($imgSrc == null || $imgSrc == '') {
        $imgSrc = asset('assets/file/player-thing.png');
    }else{
        $imgSrc = asset('assets/file/thiing-home-orange-bg.png');
    }
@endphp
<div class="parent-player-thing"  style="{{$color}}">
    <img src="{{$imgSrc}}" alt="">
    @if($with == 'true')
        <div class="play-player" hidden>
            <div class="play">Play</div>
            <div class="play-group">
                <img class="play-icon" alt="" src="{{ asset('assets/file/play.svg') }}">
                <img class="play-icon1" alt="" src="{{ asset('assets/file/play1.svg') }}">
                <img class="play-icon2" alt="" src="{{ asset('assets/file/play2.svg') }}">
            </div>
        </div>
    @endif
</div>
