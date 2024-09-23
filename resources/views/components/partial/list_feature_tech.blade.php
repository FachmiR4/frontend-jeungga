@props(['title', 'desc', 'iteration'])
@if ($iteration % 2 == 0)
    <?php $class = "toLeft" ?>
@else
    <?php $class = "toRight" ?>
@endif
<?php $marginLeft = 10 * ((int) $iteration) - 10; ?>
<div class="setMargin-{{$iteration}} {{$class}}">
    <h2>
        {{$title}}
    </h2>
    <p>{{$desc}}</p>
</div>