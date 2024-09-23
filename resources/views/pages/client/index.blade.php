@push('after-script')
    <script>
        function getData() {
            $.ajax({
                url: '{{route('client')}}',
                headers: {
                },
                method: "GET",
                data: {

                },

                // dataType: 'json',
                beforeSend: () => {
                },
                success: (data) => {
                    //
                    $("main").html(data)
                    $("#preloader").remove()
                },
                complete: (data) => {
                    //
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    //
                }
            });
        }
        getData()

        $(document).ready(function() {
            var clientIP = "{{ \Illuminate\Support\Facades\Request::getClientIp(true) }}";

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var geocodeUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

                    $.getJSON(geocodeUrl, data => {
                        if (data && data.address) {
                            var city = data.address.county || data.address.city;
                            var country = data.address.country;

                            if (city && country) {
                                var device = '';
                                const userAgent = navigator.userAgent;

                                if (userAgent.includes("Chrome")) {
                                    device = "Chrome";
                                } else if (userAgent.includes("Firefox")) {
                                    device = "Firefox";
                                } else if (userAgent.includes("Safari")) {
                                    device = "Safari";
                                } else if (userAgent.includes("Edge")) {
                                    device = "Edge";
                                } else if (userAgent.includes("Trident")) {
                                    device = "Trident";
                                } else {
                                    device = "Unknown";
                                }

                                var headers = {
                                    'url': 'module/visitor/store'
                                };
                                var params = {
                                    page             : 'Clients',
                                    location_country : country,
                                    location_city    : city,
                                    device           : device,
                                    ip_addr          : clientIP,
                                };

                                $.ajax({
                                    url: "{{ route('api.post') }}",
                                    type: 'POST',
                                    data: params,
                                    headers: headers,
                                    beforeSend: function() {
                                    },
                                    success: function(response) {
                                        console.log(response);
                                    },
                                    error: function(xhr, ajaxOptions, thrownError) {
                                        console.log('error');
                                    }
                                });
                            } else {
                                console.log("City and country not found in the location data.");
                            }
                        }
                    }).fail(() => {
                        console.log("Error in retrieving geocoding data.");
                    });
                }, error => {
                    if (error.code === error.PERMISSION_DENIED) {
                        console.log("Location access denied by the user.");
                    } else {
                        console.log("Error in retrieving location.");
                    }
                });
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        });
    </script>
@endpush
