<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapController extends Controller
{
    public function index()
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            ]
        ]);

        $url = 'https://www.amazon.in/s?k=laptop'; 
        $response = $client->request('GET', $url);
        $crawler = new Crawler($response->getBody()->getContents());

        $products = [];

        $crawler->filter('div.s-main-slot div.s-result-item')->each(function (Crawler $data) use (&$products) {
            $title = $data->filter('h2.a-size-mini a.a-link-normal');
            $price = $data->filter('span.a-price-whole');

            if ($title->count() && $price->count()) {
                $products[] = [
                    'title' => $title->text(),
                    'price' => $price->text(),
                ];
            }
        });

        return view('web-page', ['products' => $products]);
    }
}
