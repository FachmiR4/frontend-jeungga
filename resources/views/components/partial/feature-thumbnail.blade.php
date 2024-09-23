@props(['icon', 'title', 'subtitle', 'text', 'subdesc'])
<div class="feature-thumbnail-header" style="position: relative;">
    <div style="width: 100%; height: 100%;position:absolute;top:0;left:0;">
        <img src="{{asset('assets/file/background-feature.png')}}" style="height: 100%; width: 100%" alt="">
    </div>
    <div class="feature-thumbnail-circle">
        <div class="icon-head-bg">
            {!!$icon!!}
        </div>
    </div>
    <div class="feature-thumbnail-title">
        <h3>{{$title}}</h3>
    </div>
    <div class="feature-thumbnail-desc">
        <p>{{$text}}</o>
    </div>
</div>