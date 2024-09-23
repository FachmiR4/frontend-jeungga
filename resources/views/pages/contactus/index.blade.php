<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@push('after-script')
    <script>
        function getData() {
            $.ajax({
                url: '{{route('contact-us')}}',
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
                    $("#contact-us").html(data)
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
        getData();

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
                                    page             : 'Contact us',
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

        function saveContactUs(){
            var checked = true;
            toastr.clear();

            // Grab form values
            var name    = $('#name').val();
            var email   = $('#email').val();
            var address = $('#address').val();
            var phone   = $('#phone').val();
            var country = $('#country').val();
            var subject = $('#subject').val();
            var message = $('#message').val();

            // Validation rules
            if (name === '') {
                toastr.error('Name is required');
                checked = false;
                return false;
            }
            if (email === '') {
                toastr.error('Email is required');
                return false;
            }
            if (!validateEmail(email)) {
                toastr.error('Email is invalid');
                checked = false;
                return false;
            }
            if (address === '') {
                toastr.error('Address is required');
                checked = false;
                return false;
            }
            if (phone === '') {
                toastr.error('Phone number is required');
                checked = false;
                return false;
            }
            if (country === '') {
                toastr.error('Country is required');
                checked = false;
                return false;
            }
            if (subject === '') {
                toastr.error('Subject is required');
                checked = false;
                return false;
            }
            if (message === '') {
                toastr.error('Message is required');
                checked = false;
                return false;
            }

            // If all validation passes
            if(checked){
                var headers = {
                    'url': 'module/contacts/sendNotificationEmail'
                };

                var params = {
                    name    : name,
                    phone   : phone,
                    email   : email,
                    address : address,
                    country : country,
                    subject : subject,
                    message : message,
                };

                $.ajax({
                    url: "{{ route('api.post') }}",
                    type: 'POST',
                    data: params,
                    headers: headers,
                    beforeSend: function() {
                        $('#btn-save-contact-us').attr('disabled','disabled').text('Loading...');
                    },
                    success: function(response) {
                        toastr.success('Form submitted successfully!');

                        // Reset form fields
                        $('#name').val('');
                        $('#email').val('');
                        $('#address').val('');
                        $('#phone').val('');
                        $('#country').val('');
                        $('#subject').val('');
                        $('#message').val('');

                        // Re-enable button
                        $('#btn-save-contact-us').removeAttr('disabled').text('Submit');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log('error');
                    }
                });
            }
        }


        // Function to validate email
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()\[\]\\.,;:\s@"]+\.)+[^<>()\[\]\\.,;:\s@"]{2,})$/i;
            return re.test(String(email).toLowerCase());
        }

    </script>
@endpush
