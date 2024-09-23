@props(['dataImages'])
<div class="change-color-header"></div>

@php
    $dataImages = json_decode($dataImages);
@endphp

<script>
    var color = [
        @foreach ($dataImages as $key => $row)
        {
            name: '{{$row->name}}',
            style: "width:20px;height:20px;",
            element: '{{str_replace(" ","",$row->name).$key}}',
            color: '{{$row->color}}',
            isActive: {{ $key === 0 ? 'true' : 'false' }},
            imageSrc: '{{config('services.api_domain.base_api_image_url').$row->image_path}}'
        },
        @endforeach
    ];

    function colorInit() {
        let el = document.querySelector(".change-color-header");
        color.forEach((col, index) => {
            let div = document.createElement('div');
            div.style.cssText = col.style;
            div.style.backgroundColor = col.color;
            div.style.outline = col.isActive ? "2px solid " + col.color : "1px solid " + col.color;

            if (col.isActive) {
                div.classList.add('isActive');
                document.querySelector('.thing-img .img-thingg').setAttribute('src', col.imageSrc);
                document.querySelector('.thing-img .img-thingg-shadow').setAttribute('src', col.imageSrc);
            }

            div.classList.add(col.element, 'rounded-color');
            div.setAttribute("onclick", `changeColor(this, ${index})`);
            el.appendChild(div);
        });
    }

    colorInit();

    let events = null;

    function changeColor(el, index) {
        if (events != null) {
            return;
        }

        // Deselect the currently active color
        let currentActive = color.find(c => c.isActive);
        if (currentActive) {
            currentActive.isActive = false;
            document.querySelector("." + currentActive.element).classList.remove('isActive');
        }

        // Activate the selected color
        color[index].isActive = true;
        el.classList.add('isActive');

        // Update image sources for the selected color
        document.querySelector('.thing-img .img-thingg').setAttribute('src', color[index].imageSrc);
        document.querySelector('.thing-img .img-thingg-shadow').setAttribute('src', color[index].imageSrc);

        // Rebuild the color elements, keeping active one at the start
        rebuildColors();
    }

    function rebuildColors() {
        let elParent = document.querySelector(".change-color-header");
        elParent.innerHTML = ''; // Clear the container

        color.forEach((col, index) => {
            let div = document.createElement('div');
            div.style.cssText = col.style;
            div.style.backgroundColor = col.color;
            div.style.outline = col.isActive ? "2px solid " + col.color : "1px solid " + col.color;

            if (col.isActive) {
                div.classList.add('isActive');
            }

            div.classList.add(col.element, 'rounded-color');
            div.setAttribute("onclick", `changeColor(this, ${index})`);
            elParent.appendChild(div);
        });
    }
</script>
