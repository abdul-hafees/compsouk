@extends('admin::layouts.app')
@section('title', 'Scrape Webpage')
@php
header("Access-Control-Allow-Origin: *");
@endphp


@section('header')
<h1 class="page-title">Scrape Webpage</h1>
<div class="page-header-actions">
</div>
@endsection

@section('content')
{{--<h2>Admins</h2>--}}
<div class="card">
    <div class="card-body">
    <div class="form-group row">
        <div class="col-md-8">
            <input id="url" name="url" type="text" readonly
                class="form-control"
                value="https://www.amazon.com/s?k=graphics+card&crid=3GW7DYRQKYZP2&sprefix=gra%2Caps%2C261&ref=nb_sb_ss_ts-doa-p_1_3" autocomplete="off">
        </div>
        <div class="col-md-4">
        <button type="button" id="scrape" class="btn btn-primary">Scrape</button>
        </div>
    </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div id="output">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    $(function () {
        $('#scrape').on('click', function (e) {
            e.preventDefault();
            const url = $('#url').val();
            let btn = $(this);
            btn.html('<i class="fas fa-spinner fa-pulse"></i> Please Wait');
            btn.attr('disabled', true);
            $.ajax({
                url: "{{ route('admin.proxy') }}",
                method: 'GET',
                data:{
                    'url': url
                },
                success: function(data) {
                    btn.html('Scrape');
                    btn.attr('disabled', false);

                    const $html = $(data);
                    let products = [];
                    let name = '';
                    let price = '';

                    $html.find('div[data-component-type="s-search-result"]').each(function() {
                        name = $(this).find('h2 .a-text-normal').first().text().trim();
                        price = $(this).find('.a-price-whole').text().trim();
                        products.push({ name, price });
                    });

                    let output = '<h2>Scraped Products:</h2><table class="table table-bordered"><tr><th>Product Name</th><th>Price</th></tr>';
                    products.forEach(product => {
                        output += `<tr><td>${product.name} </td><td> ${product.price}</td></tr>`;
                    });
                    output += '</table>';
                    $('#output').html(output);

                    // download
                    const jsonString = JSON.stringify(products, null, 2);
                    const blob = new Blob([jsonString], { type: 'application/json' });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'products.json'; // Name of the file to be downloaded
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                },
                error: function() {
                    btn.html('Scrape');
                    btn.attr('disabled', false);
                    $('#output').html('Error: Unable to fetch data.');
                }
            });
        });

    });

</script>
@endpush
