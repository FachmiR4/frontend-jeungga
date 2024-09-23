@props(['title', 'src', 'desc'])
<div class="list-feature-iot">
    <div class="iot-img">
        <img src="{{$src}}" alt="">
    </div>
    <div class="iot-feature-text">
        <div class="iot-feature-title">{{$title}}</div>
        <div class="iot-feature-desc">{{$desc}}</div>
    </div>
</div>