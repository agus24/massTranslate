<?php

require "vendor/autoload.php";
ini_set('max_execution_time', -1);

$kata = json_decode(file_get_contents("kata.json"),true);

use Stichoza\GoogleTranslate\TranslateClient;

$tr = new TranslateClient('id', 'jw');

$myfile = fopen("output.json", "rw");
$output = [];
foreach($kata as $kt) {
    $output[]['kata'] = $tr->translate($kt['kata']);
    $output[]['id'] = $kt['id'];
}

die(json_encode($output));
fwrite($myfile, json_encode($output));
fclose($myfile);

function dd($var){
    die(var_dump($var));
}
