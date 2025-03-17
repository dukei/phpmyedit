<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\CompleteDynamicPropertiesRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\Block\ReplaceBlockToItsStmtsRector;
use Rector\DeadCode\Rector\StaticCall\RemoveParentCallWithoutParentRector;
use Rector\Php71\Rector\FuncCall\RemoveExtraParametersRector;
use Rector\Php73\Rector\ConstFetch\SensitiveConstantNameRector;
use Rector\Php81\Rector\FuncCall\NullToStrictStringFuncCallArgRector;

return RectorConfig::configure()
    ->withSkip([
        __DIR__ . '/vendor/*',
        __DIR__ . '/rector.php',
        SensitiveConstantNameRector::class, //Меняет константы в местах использования, но не в местах объявления
        RemoveExtraParametersRector::class, //Удаляет параметры у одноименных функций в разных файлах
        RemoveParentCallWithoutParentRector::class, //Неправильно работает в HtmlSax
        ReplaceBlockToItsStmtsRector::class, //Часто используется для форматирования кода
    ])
    ->withPaths([
        __DIR__ . '/*',
    ])
    ->withRules([
        CompleteDynamicPropertiesRector::class,
    ])
    // uncomment to reach your current PHP version
    ->withPhpSets(php83: true)
    ->withTypeCoverageLevel(10)
    ->withDeadCodeLevel(10)
    ->withCodeQualityLevel(10);
