<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

use App\Mail\OrderShipped;
use GeoIp2\Database\Reader;
use App\Models\User;
use App\Notifications\InvoicePaid;

// include 'console/faker-tested.php';

Artisan::command('testt', function () {


    $ip = '176.105.255.64';

    dd(get_city_by_ip($ip) . ' - ' . get_country_by_ip($ip));


    return;
    $start = microtime(true);

    $cityDbReader = new Reader(public_path('data/GeoLite2-City.mmdb'));
    // $cityDbReader = new Reader(public_path('data/GeoLite2-Country.mmdb'));

    // Replace "city" with the appropriate method for your database, e.g.,
    // "country".
    $record = $cityDbReader->city('37.229.9.69');

    // dump($record);


    // echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
    // return;
    print($record->country->isoCode . "\n"); // 'US'
    echo 'ff - '.get_lang_by_country($record->country->name) . "\n";
    print($record->country->name . "\n"); // 'United States'
    print($record->country->names['zh-CN'] . "\n"); // '美国'

    print($record->mostSpecificSubdivision->name . "\n"); // 'Minnesota'
    print($record->mostSpecificSubdivision->isoCode . "\n"); // 'MN'

    print($record->city->name . "\n"); // 'Minneapolis'

    print($record->postal->code . "\n"); // '55455'

    print($record->location->latitude . "\n"); // 44.9733
    print($record->location->longitude . "\n"); // -93.2323

    print($record->traits->network . "\n"); // '128.101.101.101/32'

    dump($record->subdivisions[0]->name);

    echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';

    return;
    $str = str()->slug('! d@d # $ % ^ & * ( ) . - _asd./asd.', '-', 'uk', ['@' => '@']);

    dd($str);


    return;
    dd(@$_SERVER['REMOTE_ADDRs']);

    return;
    $companies = \App\Models\Company::all();

    foreach ($companies as $company) {
        $owner = \App\Models\User::where('company_id', $company->id)->orderBy('id')->first();
        $company->update(['owner_id' => $owner->id]);
    }

    return;
    $iframe = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1510.866189075673!2d30.62359005283181!3d50.44177261627694!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c531b575c6a7%3A0x7c73670df622d21f!2z8J2XlvCdl67wnZe98J2YhvCdl6_wnZeu8J2Xv_Cdl64g8J2XpvCdl73wnZeu8J2XsPCdl7I!5e0!3m2!1sru!2sua!4v1698266554678!5m2!1sru!2sua" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

    $res = tpl_google_map_src($iframe);

    dd($res);

    return;
    dd(session()->getSessionConfig());

    $object = session();

    $status = get_class_methods($object);

    dd($status);

    $status = get_object_vars($object);

    dd($status);

    return;
    $productsJson = file_get_contents(storage_path('products.json'));

    $categories = json_decode($productsJson);

    // dump($categories);

    foreach ($categories as $category) {
        dump([
            'cat' => $category->category,
            'prods' => $category->products,
        ]);

        foreach ($category->products as $product) {

            if(empty($product->img)) continue;

            $originalUrl = $product->img;

            $originalName = preg_replace('/^.+(dish-\d+\.jpg).+$/', '$1', $originalUrl);

            copy($originalUrl, public_path('images/demo/' . $originalName));
        }
    }

    return;
    $dir = scandir(lang_path('en'));

    for ($i=2; $i < count($dir); $i++) { 
        // dump($dir[$i]);
        if ($dir[$i] === 'validation.php') {
            continue;
        }
        $file = include lang_path('en/' . $dir[$i]);
        // dump($file);
        foreach ($file as $key => $string) {
            echo str_replace('.php', '', $dir[$i]) . '|' .
             $key . '|' .
              (is_array($string) ?
                implode('.', $string) :
                $string);
            echo PHP_EOL;
        }
        
    }

    dd($dir);


    return;

    $translationKey = 'admin_nav.categories';

    $res = \App\Services\TranslationsService::getTranslation($translationKey);

    dd($res);

    $res = _t('admin_nav.categories');

    dd($res);

    return;
        $excelUrl = config('app.translations_excel_url');

        // dd($excelUrl);

        $json = file_get_contents($excelUrl);

        dd(json_decode($json));

    return;
    $url = 'https://www.youtube.com/watch?v=ymKqxXasS_M';

    $url = 'https://www.youtube.com/watch?v=iaCNqiciwno';

    $url = 'https://youtu.be/G4zNRKD7kWE';

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
            $id = $match[1];

            dd($id);

    return;
    $strings = file(__DIR__.'/faker-test.php');

    $result = '';

    foreach ($strings as $key => $string) {
        $result .= $string;
        if (str_contains($string, 'fake()->')) {
            // dump($string);
            $methodName = preg_replace('/.+->(\w+)\(.+/', '$1', $string);
            // dump($methodName);
            $result .= 'echo(\'--------- '.trim($methodName).' ----------------------------------------- \');'.PHP_EOL;
            $result .= 'echo PHP_EOL;'.PHP_EOL;
            $result .= 'dump($res);'.PHP_EOL;
            $result .= 'echo PHP_EOL;'.PHP_EOL;
        }
        // if ($key > 10) break;
    }

    file_put_contents(__DIR__.'/faker-tested.php', $result);

    return;
    $user = User::find(1);

    $user->notify(new InvoicePaid);

    return;
    try {
        $asd[4];
    } catch (\Exception $e) {
        telegram_bot_job_error($e);
    }

    return;
    $json = '[["Abkhazian","ab"],["Afar","aa"],["Afrikaans","af"],["Akan","ak"],["Albanian","sq"],["Amharic","am"],["Arabic","ar"],["Aragonese","an"],["Armenian","hy"],["Assamese","as"],["Avaric","av"],["Avestan","ae"],["Aymara","ay"],["Azerbaijani","az"],["Bambara","bm"],["Bashkir","ba"],["Basque","eu"],["Belarusian","be"],["Bengali","bn"],["Bislama","bi"],["Bosnian","bs"],["Breton","br"],["Bulgarian","bg"],["Burmese","my"],["Catalan, Valencian","ca"],["Chamorro","ch"],["Chechen","ce"],["Chichewa, Chewa, Nyanja","ny"],["Chinese","zh"],["Church Slavonic, Old Slavonic, Old Church Slavonic","cu"],["Chuvash","cv"],["Cornish","kw"],["Corsican","co"],["Cree","cr"],["Croatian","hr"],["Czech","cs"],["Danish","da"],["Divehi, Dhivehi, Maldivian","dv"],["Dutch, Flemish","nl"],["Dzongkha","dz"],["English","en"],["Esperanto","eo"],["Estonian","et"],["Ewe","ee"],["Faroese","fo"],["Fijian","fj"],["Finnish","fi"],["French","fr"],["Western Frisian","fy"],["Fulah","ff"],["Gaelic, Scottish Gaelic","gd"],["Galician","gl"],["Ganda","lg"],["Georgian","ka"],["German","de"],["Greek, Modern (1453–)","el"],["Kalaallisut, Greenlandic","kl"],["Guarani","gn"],["Gujarati","gu"],["Haitian, Haitian Creole","ht"],["Hausa","ha"],["Hebrew","he"],["Herero","hz"],["Hindi","hi"],["Hiri Motu","ho"],["Hungarian","hu"],["Icelandic","is"],["Ido","io"],["Igbo","ig"],["Indonesian","id"],["Interlingua (International Auxiliary Language Association)","ia"],["Interlingue, Occidental","ie"],["Inuktitut","iu"],["Inupiaq","ik"],["Irish","ga"],["Italian","it"],["Japanese","ja"],["Javanese","jv"],["Kannada","kn"],["Kanuri","kr"],["Kashmiri","ks"],["Kazakh","kk"],["Central Khmer","km"],["Kikuyu, Gikuyu","ki"],["Kinyarwanda","rw"],["Kirghiz, Kyrgyz","ky"],["Komi","kv"],["Kongo","kg"],["Korean","ko"],["Kuanyama, Kwanyama","kj"],["Kurdish","ku"],["Lao","lo"],["Latin","la"],["Latvian","lv"],["Limburgan, Limburger, Limburgish","li"],["Lingala","ln"],["Lithuanian","lt"],["Luba-Katanga","lu"],["Luxembourgish, Letzeburgesch","lb"],["Macedonian","mk"],["Malagasy","mg"],["Malay","ms"],["Malayalam","ml"],["Maltese","mt"],["Manx","gv"],["Maori","mi"],["Marathi","mr"],["Marshallese","mh"],["Mongolian","mn"],["Nauru","na"],["Navajo, Navaho","nv"],["North Ndebele","nd"],["South Ndebele","nr"],["Ndonga","ng"],["Nepali","ne"],["Norwegian","no"],["Norwegian Bokmål","nb"],["Norwegian Nynorsk","nn"],["Sichuan Yi, Nuosu","ii"],["Occitan","oc"],["Ojibwa","oj"],["Oriya","or"],["Oromo","om"],["Ossetian, Ossetic","os"],["Pali","pi"],["Pashto, Pushto","ps"],["Persian","fa"],["Polish","pl"],["Portuguese","pt"],["Punjabi, Panjabi","pa"],["Quechua","qu"],["Romanian, Moldavian, Moldovan","ro"],["Romansh","rm"],["Rundi","rn"],["Russian","ru"],["Northern Sami","se"],["Samoan","sm"],["Sango","sg"],["Sanskrit","sa"],["Sardinian","sc"],["Serbian","sr"],["Shona","sn"],["Sindhi","sd"],["Sinhala, Sinhalese","si"],["Slovak","sk"],["Slovenian","sl"],["Somali","so"],["Southern Sotho","st"],["Spanish, Castilian","es"],["Sundanese","su"],["Swahili","sw"],["Swati","ss"],["Swedish","sv"],["Tagalog","tl"],["Tahitian","ty"],["Tajik","tg"],["Tamil","ta"],["Tatar","tt"],["Telugu","te"],["Thai","th"],["Tibetan","bo"],["Tigrinya","ti"],["Tonga (Tonga Islands)","to"],["Tsonga","ts"],["Tswana","tn"],["Turkish","tr"],["Turkmen","tk"],["Twi","tw"],["Uighur, Uyghur","ug"],["Ukrainian","uk"],["Urdu","ur"],["Uzbek","uz"],["Venda","ve"],["Vietnamese","vi"],["Volapük","vo"],["Walloon","wa"],["Welsh","cy"],["Wolof","wo"],["Xhosa","xh"],["Yiddish","yi"],["Yoruba","yo"],["Zhuang, Chuang","za"],["Zulu","zu"]]';

    $array = json_decode($json);

    $res = [];

    foreach ($array as $arr) {
        $res[$arr[0]] = $arr[1];
    }

    varexport($res);

    return;
    $json = '{"hide_validation":false,"button_orientation":"left","fields":[{"id":"name","name":"What is your name?","type":"field","field":{"type":"text","placeholder":"Name","default_value":"Bob Smith"}},{"id":"color","name":"What is your favorite color?","type":"field","field":{"type":"color","placeholder":"Color"}},{"id":"canttouchthis","name":"You can\'t touch this","type":"field","field":{"type":"text","readonly":true,"placeholder":"I\'m a placeholder"}},{"id":"notcheckedanddisabled","name":"Can\'t check me","type":"field","field":{"type":"checkbox","readonly":true}},{"id":"checked","name":"Uncheck me","type":"field","field":{"type":"checkbox","default_value":"true"}},{"id":"abcradio","name":"A, B, or C?","type":"field","field":{"type":"radio","options":["Option A","Option B","Option C"]}},{"id":"switchon","name":"Switch that is on by default","type":"field","field":{"type":"switch","default_value":"true"}},{"id":"select","name":"Pick a direction","type":"field","field":{"type":"select","default_value":"Top","options":["Left","Right","Top","Bottom"]}}]}';

    var_export(json_decode($json, 1));

    return;
    dd(config('mail.mailers.smtp.username'));

    return;
    Mail::to('aniq.dev@gmail.com')->send(new OrderShipped());

    return;
    $company = \App\Models\Category::all()->random();

    dd($company->getTable());
});

// function varexport($expression, $return=FALSE) {
//     if (!is_array($expression)) return var_export($expression, $return);
//     $export = var_export($expression, TRUE);
//     $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
//     $array = preg_split("/\r\n|\n|\r/", $export);
//     $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $array);
//     $export = join(PHP_EOL, array_filter(["["] + $array));
//     if ((bool)$return) return $export; else echo $export;
// }