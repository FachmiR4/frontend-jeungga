@props(['icon', 'title', 'subtitle', 'text', 'subdesc'])
<div class="feature-header">
    <div class="line-home"></div>
    <div class="feature-circle">
        <div>
            {!!$icon!!}
        </div>
    </div>
    <div class="feature-title">
        <h3>{!!$title!!}</h3>
        <h4>{{$subtitle}}</h4>
    </div>
    <div class="feature-desc">
        <p>{{$text}}</o>
        @if ($subdesc != "")
        <div class="mt-auto">
            <span class="feature-sub-desc">{!!$subdesc!!}</span>
        </div>
        @endif
    </div>
</div>
