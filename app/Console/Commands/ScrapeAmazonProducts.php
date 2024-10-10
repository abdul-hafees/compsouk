<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;

class ScrapeAmazonProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:amazon-products';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape product names and prices from Amazon and store in a JSON file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = 'https://www.amazon.com/s?k=graphics+card&crid=3GW7DYRQKYZP2&sprefix=gra%2Caps%2C261&ref=nb_sb_ss_ts-doa-p_1_3';
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $products = [];

        $crawler->filter('.s-main-slot .s-result-item')->each(function ($node) use (&$products) {
            $name = $node->filter('h2 .a-link-normal')->text();
            $price = $node->filter('.a-price .a-offscreen')->text();

            if (!empty($name) && !empty($price)) {
                $products[] = [
                    'name' => trim($name),
                    'price' => trim($price),
                ];
            }
        });

        $jsonData = json_encode($products, JSON_PRETTY_PRINT);

        \Storage::disk('local')->put('amazon_products.json', $jsonData);

        $this->info('Product data has been scraped and stored as amazon_products.json in the storage directory.');
    }
}
