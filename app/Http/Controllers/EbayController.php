<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class EbayController extends Controller
{
    public function index()
    {
        $client = new Client([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            ]
        ]);
        $url = 'https://www.ebay.com/sch/i.html?_nkw=plumbing+fixtures'; 
        $response = $client->request('GET', $url);
        $crawler = new Crawler($response->getBody()->getContents());
        $products = [];
        $crawler->filter('li.s-item')->each(function (Crawler $data) use (&$products) {
            $title= $data->filter('div.s-item__title');
            $price = $data->filter('span.s-item__price');
             $shipping = $data->filter('div.s-item__details span.s-item__shipping');

            if ($title->count() && $price->count() && $shipping->count()) {
                $products[] = [
                    'title' => $title->text(),
                    'price' => $price->text(),
                    'shipping' => $shipping->text(),
                 ];
            }
        });
        return view('ebay', ['products' => $products]);
    }
}
