@php
$id = $id ?: 'city_id'
@endphp
<select id="{{ $id }}" name="{{ $name ?? $id }}"  data-placeholder="{{ $placeholder ?? 'Choose city' }}"
        class="form-control select2 {{ $class ?? '' }}">
    {{ $slot }}
</select>
<input id="{{ $id }}-hidden" name="{{ $name ?? $id }}_text" type="hidden">

@push('scripts')
<script>
    $(function() {
        'use strict';

        var id = '{{ $id }}';
        var placeholder = '{{ $placeholder ?? 'Choose City' }}';

        var $el = $('#'+ id);

        $el.select2({
            placeholder: placeholder,
            ajax: {
                url: '{{ route('admin.api.cities.index') }}',
                data: function (params) {
                    @isset($country_selector)
                    var country_id = $('{{ $country_selector }}').val();
                    country_id = country_id ? country_id : 0;
                    params.country_id = country_id;
                    @endunless

                    @isset($state_selector)
                    var state_id = $('{{ $state_selector }}').val();
                    state_id = state_id ? state_id : 0;
                    params.state_id = state_id;
                    @endunless

                    params.q = params.term;
                    return params;
                },
                dataType: 'json',
                delay: 250,
                cache: true,
                processResults: function (response, params) {
                    params.page = params.page || 1;

                    return {
                        results: $.map(response.data.data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        }),
                        pagination: {
                            more: (params.page * response.data.per_page) == response.data.to
                        }
                    };
                }
            }
        });

        var onChange = function () {
            $('#'+ id + '-hidden').val($el.find('option:selected').text());
        };

        $el.change(onChange);

        onChange();
    });
</script>
@endpush