<script>


    $("#country_select").change(function() {

        let country_id = $(this).val();
        let request_uri = "{{ route('order-country-cities.get', ':param') }}";
        request_uri = request_uri.replace(':param', country_id);
        $.ajax({
            method: "GET",
            url : request_uri,
            success: function(response) {
                $("#city_select").html(`
                    <option disabled hidden selected>@lang('client::cruds.select-city')</option>
                `);
                for(let i = 0 ; i < response.cities.length ; i++) {
                    $("#city_select").append(`
                        <option value="${response.cities[i].id}">
                            ${response.cities[i].name.en}
                        </option>
                    `);
                }
            }
        })
    })


    
    $("#city_select").change(function() {
        let city_id = $(this).val();
        let request_uri = "{{ route('order-city-areas.get', ':param') }}";
        request_uri = request_uri.replace(':param', city_id);
        $.ajax({
            method: "GET",
            url : request_uri,
            success: function(response) {
                $("#area_select").html(`
                    <option disabled hidden selected>@lang('client::cruds.select-area')</option>
                `);
                for(let i = 0 ; i < response.areas.length ; i++) {
                    $("#area_select").append(`
                        <option value="${response.areas[i].id}">
                            ${response.areas[i].name.en}
                        </option>
                    `);
                }
            }
        })
    })
</script>