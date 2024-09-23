@push('after-script')
<script>
    // function getData(url, params, page, section) {
    //     $.ajax({
    //             url: url,
    //             headers: {
    //                 url: {{config('app.base_api_url')}}
    //             },
    //             method: "GET",
    //             data: {

    //             },

    //             // dataType: 'json',
    //             beforeSend: () => {
    //             },
    //             success: (data) => {
    //                 //
    //                 window.localStorage.setItem(page + '-' + section, data)
    //             },
    //             complete: (data) => {
    //                 //
    //             },
    //             error: (xhr, ajaxOptions, thrownError) => {
    //                 //
    //             }
    //         });
    // }
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.forEach(classes => {
                    // if (classes == "content-pricing-2") {
                    //     entry.target.classList.add('animating')
                    // }
                    // if (classes == "content-pricing-1") {
                    //     entry.target.classList.add('animating')
                    // }
                });
            }

        })
    },{ threshold: .1});
    //
    // for (let i = 0; i < the_animation.length; i++) {
    //     const elements = the_animation[i];

    //     observer.observe(elements);
    // }

    function createCookie(name, value, minutes) {
        var expires;

        if (minutes) {
            var date = new Date();
            date.setTime(date.getTime() + (minutes * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = encodeURIComponent(name) + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ')
                c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0)
                return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
        return null;
    }


</script>
@endpush
