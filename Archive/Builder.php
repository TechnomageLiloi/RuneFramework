<?php

$fnDumper = __DIR__ . '/RuneFramework.phar';

try
{
    if(file_exists($fnDumper)) {
        unlink($fnDumper);
    }

    $oPhar = new Phar($fnDumper);
    $oPhar->startBuffering();

    $oPhar->setStub(Phar::createDefaultStub('Backside/Main.php'));
    $oPhar->buildFromDirectory(dirname(__DIR__));

    $oPhar->stopBuffering();

    chmod($fnDumper, 0777);

} catch (Exception $e) {
    echo $e->getMessage();
}