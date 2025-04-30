<?php

declare(strict_types=1);

return Rector\Config\RectorConfig::configure()
    ->withPaths([
        __DIR__.'/app',
        __DIR__.'/resources',
        __DIR__.'/routes',
    ])
    ->withSkip([
        Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector::class,
        Rector\CodingStyle\Rector\Catch_\CatchExceptionNameMatchingTypeRector::class,
    ])
    ->withCache(
        cacheDirectory: '/tmp/rector',
        cacheClass: Rector\Caching\ValueObject\Storage\FileCacheStorage::class,
    )
    ->withParallel()
    ->withPhpSets()
    ->withAttributesSets(
        symfony: \true,
    )
    ->withPreparedSets(
        deadCode: \true,
        codeQuality: \true,
        codingStyle: \true,
        typeDeclarations: \true,
        instanceOf: \true,
        earlyReturn: \true,
        strictBooleans: \true,
        carbon: \true,
    )
    ->withImportNames(
        removeUnusedImports: \true,
    )
    ->withSets([
        RectorLaravel\Set\LaravelSetList::LARAVEL_100,
        RectorLaravel\Set\LaravelSetList::LARAVEL_110,
        RectorLaravel\Set\LaravelSetList::LARAVEL_120,
        RectorLaravel\Set\LaravelSetList::LARAVEL_CODE_QUALITY,
        RectorLaravel\Set\LaravelSetList::LARAVEL_COLLECTION,
        RectorLaravel\Set\LaravelSetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
        RectorLaravel\Set\LaravelSetList::LARAVEL_FACADE_ALIASES_TO_FULL_NAMES,
        RectorLaravel\Set\LaravelSetList::LARAVEL_ELOQUENT_MAGIC_METHOD_TO_QUERY_BUILDER,
        __DIR__.'/vendor/driftingly/rector-laravel/config/sets/laravel-if-helpers.php',
        __DIR__.'/vendor/driftingly/rector-laravel/config/sets/laravel-container-string-to-fully-qualified-name.php',
    ]);
