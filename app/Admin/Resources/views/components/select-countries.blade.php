@php
$id = $id ?: 'country_id'
@endphp
<select id="{{ $id }}" name="{{ $name ?? $id }}"  data-placeholder="{{ $placeholder ?? 'Choose country' }}"
        class="form-control select2 {{ $class ?? '' }}">
    {{ $slot }}
</select>
<input id="{{ $id }}-hidden" name="{{ $name ?? $id }}_text" type="hidden">

@push('scripts')
<script>
    $(function() {
        'use strict';

        var id = '{{ $id }}';
        var placeholder = '{{ $placeholder ?? 'Choose Country' }}';

        var $el = $('#'+ id);

        $el.select2({
            placeholder: placeholder,
            ajax: {
                url: '{{ route('admin.api.countries.index') }}',
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