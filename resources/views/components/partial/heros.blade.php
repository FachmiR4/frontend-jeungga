@props(['title', 'imageSrc', 'bgColor', 'imgSrcMobile'])
<?php $class = ""; ?>
@if ($bgColor != "")
    <?php $class = "background-color: $bgColor;" ?>
@endif
<div class="container-fluid why-jeungga-heros d-flex justify-content-center align-items-center {{$class}}" style="background: url('{{$imageSrc}}') no-repeat center center; background-size:cover;">
    <div class="bg-blur-heros">

    </div>
    <div class="h-auto text-heros">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="head-title-jeungga"><span>®</span>Jeungga</div>
            <div>
                <h1 class="title-jeungga">{{$title}}</h1>
            </div>
        </div>
    </div>
</div>

<script>
    // var med = window.matchMedia("(max-width: 768px)")
    // function matchingMedia(e) {
    //     if (e.matches) {

    //     }
    // }
    // x.addEventListener('change', function (e) {
    //     if (e.mathes) {

    //     }
    // })
</script>
