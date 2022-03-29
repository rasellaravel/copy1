<?php

namespace App\Console\Commands;

use App\Helpers\ImageHelper;
use App\Product;
use App\ProductPrice;
use App\ProductSize;
use App\Slug;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GetProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = [
            'Content-Type' => 'application/json',
            'X-ACV-RequestId' => 'c67b55a2-540c-4008-ac1d-20557d027ecf',
        ];
        $client = new \GuzzleHttp\Client([
            'headers' => $headers,
        ]);
        $url = 'http://api.accdistribution.net/v1/GetProducts';
        $myBody = [
            "request" => [
                "LicenseKey" => "c67b55a2-540c-4008-ac1d-20557d027ecf",
                "Locale" => "en",
                "Currency" => "EUR",
                "CompanyId" => "_al",
                "Offset" => "0",
                "Limit" => "9",
            ],
        ];

        try {
            $response = $client->post($url, ['json' => $myBody]);
        } catch (Exception $e) {
            dd($e);
        }

        $data = json_decode($response->getBody()->getContents());
        $product_tmp = 0;
        $ttt = 0;
        $triger = false;
        $triger_menu = null;
        foreach ($data->Products as $product) {
            // if ($product['category_path'] == '' || $product['category_path'] == null) {
            //     $triger = true;
            $triger_menu = 'baldu-kolekcijos';
            // } else {
            //     $triger = false;
            // }
            // if (array_key_exists($product['category_path'], $menu_match) || $triger) {
            $slug = Slug::where('slug_lt', $triger_menu)->with('slugable')->first();
            if ($slug) {
                $products = [];
                $products['menu_id'] = '';
                $products['sub_menu_id'] = '';
                $products['inner_menu_id'] = '';
                if (class_basename($slug->slugable) == 'InnerMenu') {
                    $products['menu_id'] = $slug->slugable->menu_id;
                    $products['sub_menu_id'] = $slug->slugable->sub_menu_id;
                    $products['inner_menu_id'] = $slug->slugable->id;
                } elseif (class_basename($slug->slugable) == 'SubMenu') {
                    $products['menu_id'] = $slug->slugable->menu_id;
                    $products['sub_menu_id'] = $slug->slugable->id;
                } else {
                    $products['menu_id'] = $slug->slugable->id;
                }
                $products['vendor_id'] = 8;
                // $products['code'] = $product['id'];
                $products['new_s'] = 1;
                // $products['weight'] = $product['product_weight'];
                $products['shipping_category_id'] = 1;
                $products['title_lt'] = $product->Name;
                $products['title_en'] = $product->Name;
                $products['title_rus'] = $product->Name;
                $products['title_pt'] = $product->Name;
                $products['title_es'] = $product->Name;
                // $products['description_lt'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
                // $products['description_en'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
                // $products['description_rus'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
                // $products['description_pt'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
                // $products['description_es'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
                $checkProduct = Product::where('menu_id', $products['menu_id'])
                    ->where('sub_menu_id', $products['sub_menu_id'])
                    ->where('inner_menu_id', $products['inner_menu_id'])
                    ->where(function ($query) use ($products) {
                        return $query->where('title_lt', $products['title_lt'])
                            ->orWhere('title_en', $products['title_en'])
                            ->orWhere('title_rus', $products['title_rus'])
                            ->orWhere('title_pt', $products['title_pt'])
                            ->orWhere('title_es', $products['title_es']);
                    })
                    ->exists();
                if (!$checkProduct) {
                    $main_img = '';
                    $file = $product->Picture;
                    if ($file) {
                        // if ($this->remote_file_exists($file)) {
                        $ex = explode('.', $file);
                        if (end($ex) != 'gif') {
                            $dimensions = ['xs' => 100, 'sm' => 300, 'md' => 600, 'lg' => 1000];
                            $name = 'product_main-' . $product_tmp . '-' . time();
                            $main_img = $name . '.webp';
                            ImageHelper::save(str_replace(' ', '%20', $file), $name, 'webp', '/var/www/ciupkim/uploads/product/alt/mobalt/', $dimensions);
                        }
                        // }
                    }
                    dd($file);
                    $productU = new Product;
                    // $productU->code = $products['code'];
                    $productU->weight = $products['weight'];
                    $productU->vendor_id = $products['vendor_id'];
                    $productU->shipping_category_id = $products['shipping_category_id'];
                    $productU->menu_id = $products['menu_id'];
                    $productU->sub_menu_id = $products['sub_menu_id'];
                    $productU->inner_menu_id = $products['inner_menu_id'];
                    $productU->title_en = $products['title_en'];
                    $productU->title_lt = $products['title_lt'];
                    $productU->title_rus = $products['title_rus'];
                    $productU->title_pt = $products['title_pt'];
                    $productU->title_es = $products['title_es'];
                    $productU->description_en = $products['description_en'];
                    $productU->description_lt = $products['description_lt'];
                    $productU->description_rus = $products['description_rus'];
                    $productU->description_pt = $products['description_pt'];
                    $productU->description_es = $products['description_es'];
                    $productU->new_s = $products['new_s'];
                    if (@$main_img) {
                        $productU->product_img = $main_img;
                    }
                    $productU->save();
                    $pro_id = $productU->id;
                    $product_colors = new ProductSize;
                    $product_colors->product_id = $pro_id;
                    $product_colors->price = number_format((float) $product['product_price'], 2, '.', '');
                    $product_colors->save();
                    $product_price = new ProductPrice;
                    $product_price->pro_id = $pro_id;
                    $product_price->price = number_format((float) $product['product_price'], 2, '.', '');
                    $product_price->save();

                    $product_tmp++;
                    echo $product_tmp . PHP_EOL;
                }
            }
        }
        // }
    }
    public function remote_file_exists($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpCode == 200) {return true;}
    }

}
