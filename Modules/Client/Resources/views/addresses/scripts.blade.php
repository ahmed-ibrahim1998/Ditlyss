<script>
    function searchClient() {
        let search_query = $("#client_name_or_email").val();
        let url = "{{ route('client-search.email', ':param') }}";
        url = url.replace(':param', search_query);
        $.ajax({
            method : "GET",
            url : url,
            success: function(response) {
                $("#clientsData").empty();
                if(response.clients) {
                    for(let i = 0 ; i < response.clients.length ; i++) {
                        $("#clientsData").append(`
                            <div class="col-md-3">
                                <div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">
                                    <!--begin::Icon-->
                                    <span class="svg-icon svg-icon-success mr-5">
                                        <span class="svg-icon svg-icon-lg">
                                            <div class="text-center">
                                                <img width="50" src="/${response.clients[i].profile_photo_path == null ? 'media/images/profile-pictures/user.png' : response.clients[i].profile_photo_path}" alt="Client Picture" class="mx-auto">
                                            </div>
                                        </span>
                                    </span>
                                    <div class="d-flex text-center flex-column flex-grow-1 mr-2">
                                        <span class="text-dark mt-3 fw-bolder">
                                            ${response.clients[i].name}
                                        </span>
                                    </div>
                                    <button onclick="selectClient(${response.clients[i].id}, '${response.clients[i].name}')" type="button" class="btn btn-sm mt-2 btn-icon btn-light-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        `);
                    }
                }else {
                    $("#clientsData").html(`
                        <h3 class="text-center text-danger">${response.error}</h3>
                    `);
                }
            }
        })
    }

    function selectClient(client_id,client_name) {
        $("#client_id").val(client_id);
        $("#clientsData").empty();
        $("#client_name_or_email").val(client_name);
        Swal.fire("@lang('client::messages.done')", "@lang('client::messages.client-selected')", "success");
    }

    $("#country").change(function() {

        let country_id = $(this).val();
        let request_uri = "{{ route('country-cities.get', ':param') }}";
        request_uri = request_uri.replace(':param', country_id);
        $.ajax({
            method: "GET",
            url : request_uri,
            success: function(response) {
                $("#city").html(`
                    <option disabled hidden selected>@lang('client::cruds.select-city')</option>
                `);
                for(let i = 0 ; i < response.cities.length ; i++) {
                    $("#city").append(`
                        <option value="${response.cities[i].id}">
                            ${response.cities[i].name.en}
                        </option>
                    `);
                }
            }
        })

    })


    
    $("#city").change(function() {

        let city_id = $(this).val();
        let request_uri = "{{ route('city-areas.get', ':param') }}";
        request_uri = request_uri.replace(':param', city_id);
        $.ajax({
            method: "GET",
            url : request_uri,
            success: function(response) {
                $("#area").html(`
                    <option disabled hidden selected>@lang('client::cruds.select-area')</option>
                `);
                for(let i = 0 ; i < response.areas.length ; i++) {
                    $("#area").append(`
                        <option value="${response.areas[i].id}">
                            ${response.areas[i].name.en}
                        </option>
                    `);
                }
            }
        })

    })
</script>