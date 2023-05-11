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

Artisan::command('testt', function () {

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