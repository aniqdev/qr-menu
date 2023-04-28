<?php

header('Content-Type: application/javascript');

$files = scandir(__DIR__.'/js/assets');

include __DIR__.'/js/globals.js';

echo ';';
echo PHP_EOL;
for ($i=2; $i < count($files); $i++) { 
	include __DIR__.'/js/assets/'.$files[$i];
	echo ';';
	echo PHP_EOL;
}

include __DIR__.'/js/main.js';
