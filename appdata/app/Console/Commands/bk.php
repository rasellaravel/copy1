<?php

// namespace App\Console\Commands;

// use App\Helpers\ImageHelper;
// use App\Product;
// use App\ProductPrice;
// use App\ProductSize;
// use App\Slug;
// use Illuminate\Console\Command;
// use Illuminate\Support\Str;

// class GetProduct extends Command
// {
//     /**
//      * The name and signature of the console command.
//      *
//      * @var string
//      */
//     protected $signature = 'product:get';

//     /**
//      * The console command description.
//      *
//      * @var string
//      */
//     protected $description = 'Command description';

//     /**
//      * Create a new command instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         parent::__construct();
//     }

//     /**
//      * Execute the console command.
//      *
//      * @return mixed
//      */
//     public function handle()
//     {
//         // $menu_match = [
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom accessories' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/TV Cabinets CAMA' => 'baldu-kolekcijos',
//         //     'Collection GREY/Beds|Collection VARIO' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Hallway units VARIO' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system TENUS II' => 'baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system TENUS' => 'baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system TENUS|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofa sets PREMIUM' => 'lovos',
//         //     'Collection BIG|Collection BIG/Modular system TENUS|Upholstery/Collection PREMIUM' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/VARIO - Other elements' => 'baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture DREAM' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture DREAM|Collection BATHROOM/Bathroom furniture DUO|Collection BATHROOM/Bathroom furniture LUPO|Collection BATHROOM/Bathroom furniture LUPO MAX|Collection BATHROOM/Bathroom furniture LUPO MINI|Collection BATHROOM/Bathroom furniture SOLO|Collection BATHROOM/Bathroom furniture TIPO|Collection BATHROOM/Bathroom furniture TIPO MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM/Bathroom furniture DREAM|Collection BATHROOM/Bathroom furniture DUO|Collection BATHROOM/Bathroom furniture LUPO|Collection BATHROOM/Bathroom furniture LUPO MAX|Collection BATHROOM/Bathroom furniture LUPO MINI|Collection BATHROOM/Bathroom furniture SOLO|Collection BATHROOM/Bathroom furniture TIPO|Collection BATHROOM/Bathroom furniture TIPO MINI|Collection BATHROOM/Bathroom accessories' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture LUMIA|Collection BATHROOM/Bathroom furniture NICO|Collection BATHROOM/Bathroom furniture NICO MAX|Collection BATHROOM/Bathroom furniture NICO MINI|Collection BATHROOM/Bathroom furniture NICO LONG|Collection BATHROOM/Bathroom furniture SLIM|Collection BATHROOM/Bathroom furniture SLIM MAX|Collection BATHROOM/Bathroom furniture SLIM MINI|Collection BATHROOM/Bathroom accessories' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture NICO|Collection BATHROOM/Bathroom furniture NICO MAX|Collection BATHROOM/Bathroom furniture NICO MINI|Collection BATHROOM/Bathroom furniture NICO LONG|Collection BATHROOM/Bathroom furniture SLIM|Collection BATHROOM/Bathroom furniture SLIM MAX|Collection BATHROOM/Bathroom furniture SLIM MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture LUMIA|Collection BATHROOM/Bathroom furniture NICO|Collection BATHROOM/Bathroom furniture NICO MAX|Collection BATHROOM/Bathroom furniture NICO MINI|Collection BATHROOM/Bathroom furniture NICO LONG|Collection BATHROOM/Bathroom furniture SLIM|Collection BATHROOM/Bathroom furniture SLIM MAX|Collection BATHROOM/Bathroom furniture SLIM MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection TOLEDO' => 'baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture LUMIA' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Modular System SAMBA' => 'baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection SARAH' => 'baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture NICO' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture NICO LONG' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture NICO MAX' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture NICO MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection ELEGANCE/BEDROOM VERA' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection TOGO' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection BETA' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection FRESH/Modular System MIA|Collection GREAT/Kitchen accessories|Collection GREEN' => 'virtuves-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection SILKE' => 'virtuves-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection SILKE LIGHT' => 'virtuves-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection TALINA' => 'virtuves-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection MOVE' => 'virtuves-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Living room system BOTA' => 'baldu-kolekcijos',
//         //     'Collection ELEGANCE/BEDROOM MONTREAL' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection VENTO' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/BEDROOM GALAXY' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection FRESH/Wardrobes FRESH|Collection GREY/Dining room tables' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection QUARTZ' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection HEKTOR' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Living room system BAROS' => 'baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection TULSA' => 'baldu-kolekcijos',
//         //     'Collection ELEGANCE/BEDROOM HEKTOR' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection TAMPA' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection MADISON' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection HALLE' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection LASLO' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/Collection AMY' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection ELEGANCE/BEDROOM INDIRA' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Wall units FRESH' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection GREEN' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection BIG|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofas and sofa beds PREMIUM' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system BJORN|Upholstery|Upholstery/Collection BJORN/OVIEDO' => 'baldu-kolekcijos',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofas and sofa beds PREMIUM|Upholstery/Collection LANCO' => 'baldu-kolekcijos',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Armchairs PREMIUM' => 'virtuves-ir-valgomojo-kedes',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Armchairs PREMIUM|Upholstery/Collection LANCO' => 'virtuves-ir-valgomojo-kedes',
//         //     'Collection BIG|Collection BIG/Modular system MEMONE' => 'baldu-kolekcijos',
//         //     'Collection BIG/Modular system GORDIA|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofas and sofa beds PREMIUM' => 'baldu-kolekcijos',
//         //     'Collection BIG|Upholstery|Upholstery/Collection SZAFIR' => 'baldu-kolekcijos',
//         //     'Collection BIG' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 1' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 2' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 3' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 4' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 5' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 6' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 7' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 8' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 9' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 10' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Living room system SOHO 11' => 'baldu-kolekcijos',
//         //     'Collection/Wooden bed|Collection KIDSIMO' => 'lovos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture SLIM' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture SLIM MAX' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture SLIM MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system BJORN' => 'baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture SOLO' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture TIPO' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture TIPO MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system BJORN|Upholstery/Collection BJORN/OVIEDO' => 'baldu-kolekcijos',
//         //     'Mattresses|Mattresses/Mattresses 100x200' => 'ciuziniai',
//         //     'Mattresses|Mattresses/Mattresses 120x200' => 'ciuziniai',
//         //     'Mattresses|Mattresses/Mattresses 140x200' => 'ciuziniai',
//         //     'Mattresses|Mattresses/Mattresses 160x200' => 'ciuziniai',
//         //     'Mattresses|Mattresses/Mattresses 180x200' => 'ciuziniai',
//         //     'Mattresses|Mattresses/Mattresses 200x200' => 'ciuziniai',
//         //     'Mattresses|Mattresses/Mattresses 80x200' => 'ciuziniai',
//         //     'Mattresses|Mattresses/Mattresses 90x200' => 'ciuziniai',
//         //     'Collection BIG|Collection BIG/Collection BONO' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Modular System BRUNO' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system CALABRIA' => 'miegamojo-baldu-kolekcijos',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Armchairs PREMIUM|Upholstery/Collection calabria' => 'miegamojo-baldu-kolekcijos',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofas and sofa beds PREMIUM|Upholstery/Collection calabria' => 'miegamojo-baldu-kolekcijos',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Corner sofas PREMIUM|Upholstery/Collection calabria' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Modular System CEZAR' => 'miegamojo-baldu-kolekcijos',
//         //     'Collection CAMA|Collection GREY/Benches' => 'miegamojo-baldu-kolekcijos',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Corner sofas PREMIUM' => 'sofos',
//         //     'Collection VARIO|Collection VARIO/Modular System DIONE' => 'baldu-kolekcijos',
//         //     'Collection TRENDY|Collection TRENDY/Living Room Systems TRENDY|Collection TRENDY/Living Room Systems TRENDY/Wall units LOFT/VERO/DECO' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Elements of VIGO System' => 'baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system DENVER' => 'baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture DUO|Collection BATHROOM/Bathroom furniture SOLO' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture DUO' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection CAMA' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/TV Cabinets CAMA' => 'baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Collection DOMINO' => 'baldu-kolekcijos',
//         //     'Collection GREEN|Collection GREEN/Dining room sets GREEN' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System LATIKA' => 'baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Modular System FILL' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular system FINEZJA' => 'baldu-kolekcijos',
//         //     'Collection CAMA/Living room system VIGO|Collection VARIO/Modular system FINEZJA' => 'baldu-kolekcijos',
//         //     'Collection BIG|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Armchairs PREMIUM' => 'baldu-kolekcijos',
//         //     'Collection BIG/Modular system GORDIA|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Armchairs PREMIUM' => 'baldu-kolekcijos',
//         //     'Collection TRENDY|Collection TRENDY/Hallway units TRENDY' => 'baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular system GORDIA' => 'baldu-kolekcijos',
//         //     'Collection TRENDY|Collection TRENDY/Living Room Systems TRENDY/Living Room System ONYX' => 'baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Modular System INEZ PLUS|Collection FRESH/Hallway units FRESH' => 'baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Modular System INES' => 'baldu-kolekcijos',
//         //     'Collection PRESTIVIO' => 'baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Modular System INEZ PLUS' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System LUX STRIPES' => 'baldu-kolekcijos',
//         //     'Collection TRENDY|Collection TRENDY/Wardrobes TRENDY' => 'spintos-1',
//         //     'Collection TRENDY|Collection TRENDY/Sliding door wardrobes TRENDY' => 'spintos-1',
//         //     'Collection VARIO|Collection VARIO/Wardrobes VARIO' => 'spintos-1',
//         //     'Collection VARIO|Collection VARIO/Coffee tables VARIO' => 'kavos-staliukai',
//         //     'Collection FRESH|Collection FRESH/Wardrobes FRESH' => 'spintos-1',
//         //     'Collection BIG|Collection BIG/Collection IWA' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System LUX STRIPES|Collection VARIO/Wardrobes VARIO' => 'baldu-kolekcijos',
//         //     'Collection FRESH/Collection JOHN' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Chests of drawers CAMA' => 'komodos',
//         //     'Collection TRENDY|Collection TRENDY/Chests of drawers TRENDY|Collection TRENDY/Collection BLUES' => 'komodos',
//         //     'Collection TRENDY|Collection TRENDY/Collection RUMBA' => 'komodos',
//         //     'Collection TRENDY|Collection TRENDY/Chests of drawers TRENDY|Collection TRENDY/Living Room Systems TRENDY/Living room furniture system SALSA' => 'komodos',
//         //     'Collection TRENDY|Collection TRENDY/Chests of drawers TRENDY|Collection TRENDY/Collection TANGO' => 'komodos',
//         //     'Collection BIG|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Corner sofas PREMIUM' => 'sofos',
//         //     'Collection BIG|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofa sets PREMIUM' => 'sofos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/Living room system SOHO/Elements of SOHO System' => 'baldu-kolekcijos',
//         //     'Collection BIG|Collection BIG/Collection LANCO' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SOHO|Collection CAMA/TV Cabinets CAMA|Collection CAMA/Living room system SOHO/Elements of SOHO System' => 'baldu-kolekcijos',
//         //     'Collection BIG|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofa sets PREMIUM|Upholstery/Collection LANCO' => 'sofos',
//         //     'Collection BIG|Collection BIG/Modular system LIDO' => 'baldu-kolekcijos',
//         //     'Lighting|Lighting/Shelf LED Lighting' => 'imontuojami-sviestuvai-led-paneles',
//         //     'Lighting|Lighting/LED Lighting QUATRO' => 'imontuojami-sviestuvai-led-paneles',
//         //     'Lighting|Lighting/LED Lighting SABI' => 'imontuojami-sviestuvai-led-paneles',
//         //     'Collection BIG/Modular system LIDO|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Corner sofas PREMIUM' => 'sofos',
//         //     'Collection BIG|Collection BIG/Modular system LIDO|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Armchairs PREMIUM' => 'baldu-kolekcijos',
//         //     'Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofas and sofa beds PREMIUM' => 'sofos',
//         //     'Collection TRENDY|Collection TRENDY/Living Room Systems TRENDY' => 'baldu-kolekcijos',
//         //     'Collection LOFT' => 'baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture LUPO|Collection BATHROOM/Bathroom furniture LUPO MAX|Collection BATHROOM/Bathroom furniture LUPO MINI|Collection BATHROOM/Bathroom furniture TIPO|Collection BATHROOM/Bathroom furniture TIPO MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM/Bathroom furniture DREAM|Collection BATHROOM/Bathroom furniture LUMIA' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System LUX' => 'baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture LUPO' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture LUPO MAX' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture LUPO MINI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection BATHROOM|Collection BATHROOM/Bathroom furniture MEGI' => 'vonios-kambario-baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System MAXIMUS' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Wall units CAMA' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 2' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 1' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 10' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 11' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 12' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 13' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 14' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 15' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 17' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 18' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 19' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 20' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 21' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 3' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 4' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 5' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 6' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 7' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 8' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 9' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 23' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 22' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO 24' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 1' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 2' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 3' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 4' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 5' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 6' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room set VIGO NEW 7' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room set VIGO NEW 8' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room set VIGO NEW 9' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 10' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system VIGO|Collection CAMA/Living room system VIGO/Living room system VIGO NEW 11' => 'baldu-kolekcijos',
//         //     'Collection FRESH|Collection FRESH/Modular System SILVER' => 'baldu-kolekcijos',
//         //     'Collection FRESH/Collection MIX' => 'baldu-kolekcijos',
//         //     'Collection BIG/Modular system TENUS' => 'baldu-kolekcijos',
//         //     'Collection BIG/Modular system TENUS|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofas and sofa beds PREMIUM' => 'sofos',
//         //     'Collection BIG|Upholstery/Collection PREMIUM/Corner sofas PREMIUM' => 'sofos',
//         //     'Collection BIG|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Corner sofas PREMIUM' => 'sofos',
//         //     'Collection BIG|Collection BIG/Modular system GORDIA|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Corner sofas PREMIUM' => 'sofos',
//         //     'Collection BIG/Modular system GORDIA|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Corner sofas PREMIUM' => 'sofos',
//         //     'Collection BIG|Upholstery/Collection PREMIUM' => 'baldu-kolekcijos',
//         //     'Collection TRENDY/Living Room Systems TRENDY/Living Room System ONLY' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System PENELOPA' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System PENELOPA|Collection VARIO/Wardrobes VARIO' => 'spintos-1',
//         //     'Collection VARIO|Collection VARIO/Modular System PENELOPA|Collection VARIO/Sliding Door Wardrobes PENELOPA with graphics' => 'spintos-1',
//         //     'Collection SMART/Mattresses|Mattresses/Mattresses 80x200' => 'ciuziniai',
//         //     'Collection SMART|Mattresses/Mattresses 90x200' => 'ciuziniai',
//         //     'Collection BIG|Collection BIG/Modular system GORDIA|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Armchairs PREMIUM' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System REST' => 'baldu-kolekcijos',
//         //     'Collection TRENDY|Collection TRENDY/Collection Bookcase KAROL' => 'baldu-kolekcijos',
//         //     'Collection TRENDY|Collection TRENDY/Living Room Systems TRENDY|Collection TRENDY/Living Room Systems TRENDY/Wall units RICO/ROCO' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system LOTTA|Collection CAMA/TV Cabinets CAMA' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system LOTTA|Collection CAMA/Chests of drawers CAMA' => 'komodos',
//         //     'Collection TRENDY|Collection TRENDY/Living Room Systems TRENDY|Collection TRENDY/Living Room Systems TRENDY/Living room furniture system SALSA' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SAMBA' => 'baldu-kolekcijos',
//         //     'Collection BIG|Upholstery|Upholstery/Collection PREMIUM|Upholstery/Collection PREMIUM/Sofa sets PREMIUM|Upholstery/Collection LANCO' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system SAMBA|Collection CAMA/TV Cabinets CAMA' => 'baldu-kolekcijos',
//         //     'Collection CAMA|Collection CAMA/Living room system LOTTA' => 'baldu-kolekcijos',
//         //     'Collection VARIO|Collection VARIO/Modular System ZONDA' => 'baldu-kolekcijos',
//         // ];

//         // $xml_categories = [];
//         // $xml = simplexml_load_file('http://servisas.freeshop.lt/modules/export/varle/service.php?storeid=02096701&modid=1&password=&method=xml&fbclid=IwAR12vFkswEogWeUi5MTTdOt4h2NJin19cUqCqB7z1-Kb1U7eScTB-Bi3wjE', 'SimpleXMLElement', LIBXML_NOCDATA);
//         // $objJsonDocument = json_encode($xml);
//         // $arrOutput = json_decode($objJsonDocument, true);
//         // $n = 1;
//         // foreach ($arrOutput['categories']['category'] as $category) {
//         //     $xml_categories[$category['id']] = (str_replace(' ', '_', $category['name']));
//         // }
//         // // dd($xml_categories);
//         // $product_tmp = 0;
//         // $ttt = 0;
//         // foreach ($arrOutput['products']['product'] as $product) {
//         //     if (array_key_exists('categories', $product)) {
//         //         if (array_key_exists('category', $product['categories'])) {
//         //             if (is_array($product['categories']['category'])) {
//         //                 $category_id = end($product['categories']['category']);
//         //             } else {
//         //                 $category_id = $product['categories']['category'];
//         //             }
//         //             if (array_key_exists($category_id, $xml_categories)) {
//         //                 if (array_key_exists($xml_categories[$category_id], $menu_match)) {
//         //                     $slug = Slug::where('slug_lt', $menu_match[$xml_categories[$category_id]])->with('slugable')->first();
//         //                     if ($slug) {
//         //                         $products = [];
//         //                         $products['menu_id'] = '';
//         //                         $products['sub_menu_id'] = '';
//         //                         $products['inner_menu_id'] = '';
//         //                         if (class_basename($slug->slugable) == 'InnerMenu') {
//         //                             $products['menu_id'] = $slug->slugable->menu_id;
//         //                             $products['sub_menu_id'] = $slug->slugable->sub_menu_id;
//         //                             $products['inner_menu_id'] = $slug->slugable->id;
//         //                         } elseif (class_basename($slug->slugable) == 'SubMenu') {
//         //                             $products['menu_id'] = $slug->slugable->menu_id;
//         //                             $products['sub_menu_id'] = $slug->slugable->id;
//         //                         } else {
//         //                             $products['menu_id'] = $slug->slugable->id;
//         //                         }
//         //                         $products['vendor_id'] = 4;
//         //                         $products['code'] = $product['barcode'];
//         //                         $products['shipping_category_id'] = 1;
//         //                         $products['title_lt'] = $product['title'];
//         //                         $products['title_en'] = $product['title'];
//         //                         $products['title_rus'] = $product['title'];
//         //                         $products['title_pt'] = $product['title'];
//         //                         $products['title_es'] = $product['title'];
//         //                         $products['description_lt'] = is_array($product['description']) ? '' : $product['description'];
//         //                         $products['description_en'] = is_array($product['description']) ? '' : $product['description'];
//         //                         $products['description_rus'] = is_array($product['description']) ? '' : $product['description'];
//         //                         $products['description_pt'] = is_array($product['description']) ? '' : $product['description'];
//         //                         $products['description_es'] = is_array($product['description']) ? '' : $product['description'];
//         //                         $products['delivery_lt'] = $product['delivery_text'];
//         //                         $products['delivery_en'] = $product['delivery_text'];
//         //                         $products['delivery_rus'] = $product['delivery_text'];
//         //                         $products['delivery_pt'] = $product['delivery_text'];
//         //                         $products['delivery_es'] = $product['delivery_text'];
//         //                         $products['weight'] = $product['weight'];
//         //                         $checkProduct = Product::where('menu_id', $products['menu_id'])
//         //                             ->where('sub_menu_id', $products['sub_menu_id'])
//         //                             ->where('inner_menu_id', $products['inner_menu_id'])
//         //                             ->where(function ($query) use ($products) {
//         //                                 return $query->where('title_lt', $products['title_lt'])
//         //                                     ->orWhere('title_en', $products['title_en'])
//         //                                     ->orWhere('title_rus', $products['title_rus'])
//         //                                     ->orWhere('title_pt', $products['title_pt'])
//         //                                     ->orWhere('title_es', $products['title_es']);
//         //                             })
//         //                             ->exists();
//         //                         if (!$checkProduct) {
//         //                             // dd($product);
//         //                             $main_img = '';
//         //                             if (array_key_exists('images', $product)) {
//         //                                 $file = is_array($product['images']['image']) ? $product['images']['image'][0] : $product['images']['image'];
//         //                                 if ($file) {
//         //                                     $ex = explode('.', $file);
//         //                                     if (end($ex) != 'gif') {
//         //                                         $dimensions = ['xs' => 100, 'sm' => 300, 'md' => 600, 'lg' => 1000];
//         //                                         $name = 'product_main-' . $product_tmp . '-' . time();
//         //                                         $main_img = $name . '.webp';
//         //                                         ImageHelper::save(str_replace(' ', '%20', $file), $name, 'webp', '/var/www/ciupkim/uploads/product/alt/', $dimensions);
//         //                                     }
//         //                                 }
//         //                             }
//         //                             $productU = new Product;
//         //                             $productU->code = $products['code'];
//         //                             $productU->vendor_id = $products['vendor_id'];
//         //                             $productU->shipping_category_id = $products['shipping_category_id'];
//         //                             $productU->menu_id = $products['menu_id'];
//         //                             $productU->sub_menu_id = $products['sub_menu_id'];
//         //                             $productU->inner_menu_id = $products['inner_menu_id'];
//         //                             $productU->title_en = $products['title_en'];
//         //                             $productU->title_lt = $products['title_lt'];
//         //                             $productU->title_rus = $products['title_rus'];
//         //                             $productU->title_pt = $products['title_pt'];
//         //                             $productU->title_es = $products['title_es'];
//         //                             $productU->description_en = $products['description_en'];
//         //                             $productU->description_lt = $products['description_lt'];
//         //                             $productU->description_rus = $products['description_rus'];
//         //                             $productU->description_pt = $products['description_pt'];
//         //                             $productU->description_es = $products['description_es'];
//         //                             $productU->delivery_en = $products['delivery_en'];
//         //                             $productU->delivery_lt = $products['delivery_lt'];
//         //                             $productU->delivery_rus = $products['delivery_rus'];
//         //                             $productU->delivery_pt = $products['delivery_pt'];
//         //                             $productU->delivery_es = $products['delivery_es'];
//         //                             $productU->weight = $products['weight'];
//         //                             if (@$main_img) {
//         //                                 $productU->product_img = $main_img;
//         //                             }
//         //                             $productU->save();
//         //                             $pro_id = $productU->id;
//         //                             $product_colors = new ProductSize;
//         //                             $product_colors->product_id = $pro_id;
//         //                             $product_colors->price = $product['price'];
//         //                             $product_colors->save();
//         //                             $product_price = new ProductPrice;
//         //                             $product_price->pro_id = $pro_id;
//         //                             $product_price->price = $product['price'];
//         //                             $product_price->save();
//         //                             if (array_key_exists('images', $product)) {
//         //                                 if (is_array($product['images']['image'])) {
//         //                                     $alt_img = $product['images']['image'];
//         //                                     array_shift($alt_img);
//         //                                     foreach ($alt_img as $key => $img) {
//         //                                         $oldPath = $img;
//         //                                         $dimensions = ['sm' => 300, 'md' => 600, 'lg' => 1000];
//         //                                         $name = 'product_alt-' . $product_tmp . '-' . $key . '-' . time();
//         //                                         $alt_img = $name . '.webp';
//         //                                         ImageHelper::save(str_replace(' ', '%20', $oldPath), $name, 'webp', '/var/www/ciupkim/uploads/product/alt/', $dimensions);

//         //                                         $product_image = new ProductImage;
//         //                                         $product_image->pro_id = $pro_id;
//         //                                         $product_image->img = $alt_img;
//         //                                         $product_image->save();
//         //                                     }
//         //                                 }
//         //                             }
//         //                             $product_tmp++;
//         //                             echo $product_tmp . PHP_EOL;
//         //                         }
//         //                     }
//         //                 } else {
//         //                     // dd($product);
//         //                     // echo $xml_categories[$category_id] . PHP_EOL;
//         //                 }
//         //             }
//         //         }
//         //     }
//         // }
//         $headers = [
//             'Content-Type' => 'application/json',
//             'X-ACV-RequestId' => 'c67b55a2-540c-4008-ac1d-20557d027ecf',
//         ];
//         $client = new \GuzzleHttp\Client([
//             'headers' => $headers,
//         ]);
//         $url = 'http://api.accdistribution.net/v1/GetProducts';
//         $myBody = [
//             "request" => [
//                 "LicenseKey" => "c67b55a2-540c-4008-ac1d-20557d027ecf",
//                 "Locale" => "en",
//                 "Currency" => "EUR",
//                 "CompanyId" => "_al",
//                 "Offset" => "0",
//                 "Limit" => "100",
//             ],
//         ];

//         try {
//             $response = $client->post($url, ['json' => $myBody]);
//         } catch (Exception $e) {
//             dd($e);
//         }

//         $data = json_decode($response->getBody()->getContents());
//         dd($data);

//         $path = '/var/www/ciupkim/csv.csv';
//         $header = null;
//         $delimiter = ',';
//         $data = [];
//         if (($handle = fopen($path, 'r')) !== false) {
//             while (($row = fgetcsv($handle, 10000, $delimiter)) !== false) {
//                 if (!$header) {
//                     $header = $row;
//                 } else {
//                     $data[] = array_combine($header, $row);
//                 }

//             }
//             fclose($handle);
//         }

//         $product_tmp = 0;
//         $ttt = 0;
//         $triger = false;
//         $triger_menu = null;
//         foreach ($data as $product) {
//             if ($product['category_path'] == '' || $product['category_path'] == null) {
//                 $triger = true;
//                 $triger_menu = 'baldu-kolekcijos';
//             } else {
//                 $triger = false;
//             }
//             if (array_key_exists($product['category_path'], $menu_match) || $triger) {
//                 $slug = Slug::where('slug_lt', $triger ? $triger_menu : $menu_match[$product['category_path']])->with('slugable')->first();
//                 if ($slug) {
//                     $products = [];
//                     $products['menu_id'] = '';
//                     $products['sub_menu_id'] = '';
//                     $products['inner_menu_id'] = '';
//                     if (class_basename($slug->slugable) == 'InnerMenu') {
//                         $products['menu_id'] = $slug->slugable->menu_id;
//                         $products['sub_menu_id'] = $slug->slugable->sub_menu_id;
//                         $products['inner_menu_id'] = $slug->slugable->id;
//                     } elseif (class_basename($slug->slugable) == 'SubMenu') {
//                         $products['menu_id'] = $slug->slugable->menu_id;
//                         $products['sub_menu_id'] = $slug->slugable->id;
//                     } else {
//                         $products['menu_id'] = $slug->slugable->id;
//                     }
//                     $products['vendor_id'] = 8;
//                     // $products['code'] = $product['id'];
//                     $products['new_s'] = 1;
//                     $products['weight'] = $product['product_weight'];
//                     $products['shipping_category_id'] = 1;
//                     $products['title_lt'] = $product['product_name'];
//                     $products['title_en'] = $product['product_name'];
//                     $products['title_rus'] = $product['product_name'];
//                     $products['title_pt'] = $product['product_name'];
//                     $products['title_es'] = $product['product_name'];
//                     $products['description_lt'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
//                     $products['description_en'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
//                     $products['description_rus'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
//                     $products['description_pt'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
//                     $products['description_es'] = is_array($product['product_desc']) ? '' : $product['product_desc'];
//                     $checkProduct = Product::where('menu_id', $products['menu_id'])
//                         ->where('sub_menu_id', $products['sub_menu_id'])
//                         ->where('inner_menu_id', $products['inner_menu_id'])
//                         ->where(function ($query) use ($products) {
//                             return $query->where('title_lt', $products['title_lt'])
//                                 ->orWhere('title_en', $products['title_en'])
//                                 ->orWhere('title_rus', $products['title_rus'])
//                                 ->orWhere('title_pt', $products['title_pt'])
//                                 ->orWhere('title_es', $products['title_es']);
//                         })
//                         ->exists();
//                     if (!$checkProduct) {
//                         $main_img = '';
//                         $file = $product['file_url'];
//                         if ($file) {
//                             if ($this->remote_file_exists($file)) {
//                                 $ex = explode('.', $file);
//                                 if (end($ex) != 'gif') {
//                                     $dimensions = ['xs' => 100, 'sm' => 300, 'md' => 600, 'lg' => 1000];
//                                     $name = 'product_main-' . $product_tmp . '-' . time();
//                                     $main_img = $name . '.webp';
//                                     ImageHelper::save(str_replace(' ', '%20', $file), $name, 'webp', '/var/www/ciupkim/uploads/product/alt/mobalt/', $dimensions);
//                                 }
//                             }
//                         }
//                         $productU = new Product;
//                         // $productU->code = $products['code'];
//                         $productU->weight = $products['weight'];
//                         $productU->vendor_id = $products['vendor_id'];
//                         $productU->shipping_category_id = $products['shipping_category_id'];
//                         $productU->menu_id = $products['menu_id'];
//                         $productU->sub_menu_id = $products['sub_menu_id'];
//                         $productU->inner_menu_id = $products['inner_menu_id'];
//                         $productU->title_en = $products['title_en'];
//                         $productU->title_lt = $products['title_lt'];
//                         $productU->title_rus = $products['title_rus'];
//                         $productU->title_pt = $products['title_pt'];
//                         $productU->title_es = $products['title_es'];
//                         $productU->description_en = $products['description_en'];
//                         $productU->description_lt = $products['description_lt'];
//                         $productU->description_rus = $products['description_rus'];
//                         $productU->description_pt = $products['description_pt'];
//                         $productU->description_es = $products['description_es'];
//                         $productU->new_s = $products['new_s'];
//                         if (@$main_img) {
//                             $productU->product_img = $main_img;
//                         }
//                         $productU->save();
//                         $pro_id = $productU->id;
//                         $product_colors = new ProductSize;
//                         $product_colors->product_id = $pro_id;
//                         $product_colors->price = number_format((float) $product['product_price'], 2, '.', '');
//                         $product_colors->save();
//                         $product_price = new ProductPrice;
//                         $product_price->pro_id = $pro_id;
//                         $product_price->price = number_format((float) $product['product_price'], 2, '.', '');
//                         $product_price->save();

//                         $product_tmp++;
//                         echo $product_tmp . PHP_EOL;
//                     }
//                 }
//             }
//         }
//     }
//     public function remote_file_exists($url)
//     {
//         $ch = curl_init($url);
//         curl_setopt($ch, CURLOPT_NOBODY, true);
//         curl_exec($ch);
//         $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//         curl_close($ch);
//         if ($httpCode == 200) {return true;}
//     }

// }
