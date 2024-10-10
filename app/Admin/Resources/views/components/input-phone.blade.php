@php
$id = $id ?: 'phone'
@endphp
<input id="{{ $id }}" name="{{ $name ?? $id }}_dummy" type="text"
       class="form-control {{ $class ?? '' }}"
       placeholder="{{ $placeholder ?? '' }}" value="{{ $slot }}"
       autocomplete="off">

{{--<input id="{{ $id }}-hidden" name="{{ $name ?? $id }}" type="hidden"
       value="{{ $slot }}"
       autocomplete="off">--}}

@push('scripts')
<script>
    $(function () {
        'use strict';

        $('#{{ $id }}').intlTelInput({
            customContainer: 'd-block',
            hiddenInput: '{{ $name ?? $id }}',
            separateDialCode: false,
            preferredCountries: ['in', 'sa', 'ae'],
            utilsScript: "{{ asset('/vendor/jquery-intlTelInput/js/utils.js?1549804213570', config('app.asset_secure')) }}"
        });
    });
</script>
@endpush