<h5>City</h5>
<select class="selectpicker with-border with-ajax" data-size="7"
        title="Select Your City" data-live-search="true" name="city_id">
</select>
@error('city_id')
<span class="invalid-input">{{ $message }}</span>
@enderror
@section('js-hooks')
    <script src="{{ asset('js/ajax-boostrap-select.js') }}"></script>
    <script>
        var options = {
            ajax: {
                url: '{{ route('cities') }}',
                type: 'POST',
                dataType: 'json',
                {{--// Use "{{{q}}}" as a placeholder and Ajax Bootstrap Select will--}}
                // automatically replace it with the value of the search query.
                data: {
                    q: "@{{{q}}}",
                    _token: '{{ csrf_token() }}'
                }
            },
            locale: {
                emptyTitle: 'Find Your City'
            },
            log: 3,
            preprocessData: function (data) {
                var i, l = data.length, array = [];
                if (l) {
                    for (i = 0; i < l; i++) {
                        array.push($.extend(true, data[i], {
                            text: data[i].name,
                            subtext: data[i].state,
                            value: data[i].id,
                            data: {
                                subtext: data[i].name
                            }
                        }));
                    }
                }
                return array;
            }
        };
        $('.selectpicker').selectpicker().filter('.with-ajax').ajaxSelectPicker(options);
        $('.selectpicker').append('<option value="{{ $cityId ?? '' }}" data-subtext="{{ $state ?? '' }}" selected="selected">{{ $city ?? '' }}</option>').selectpicker('refresh');
        $('select').trigger('load');
    </script>
@endsection
