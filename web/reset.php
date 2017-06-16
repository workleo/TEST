<?php

require_once('../Core.php');

$repository = new Core();
$repository->resetDatabase();

echo 'Database has been reset.';

$file = fopen(__DIR__ . '/../logs/production.log', 'w');
fclose($file);

echo 'Log file has been reset.';
