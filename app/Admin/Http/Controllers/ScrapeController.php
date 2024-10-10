<?php

namespace App\Admin\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Imports\OrderImport;
use App\Models\Admin;
use App\Models\Order;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Html\Builder;
use Illuminate\Validation\Rule;

class ScrapeController extends Controller
{
    public function scrape()
    {
        return view('admin::pages.scrape');
    }

    public function proxy(Request $request)
    {
        $url = $request->url ?? 'https://www.amazon.com/s?k=graphics+card&crid=3GW7DYRQKYZP2&sprefix=gra%2Caps%2C261&ref=nb_sb_ss_ts-doa-p_1_3';
            $client = new Client();

        try {
            $response = $client->request('GET', $url, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
                ]
            ]);
            return response($response->getBody(), 200)
                ->header('Content-Type', 'text/html');
        } catch (\Exception $e) {
            return response('Error: Unable to fetch data.', 503);
        }
    }

}
