<?php

declare(strict_types=1);

return Rector\Config\RectorConfig::configure()
    ->withPaths([
        __DIR__.'/database/migrations',
    ])
    ->withCache(
        cacheDirectory: '/tmp/rector',
        cacheClass: Rector\Caching\ValueObject\Storage\FileCacheStorage::class
    )
    ->withParallel()
    ->withPhpSets()
    ->withAttributesSets(
        symfony: \true,
    )
    ->withImportNames(
        removeUnusedImports: \true,
    )
    ->withPreparedSets(
        codeQuality: \true,
        codingStyle: \true,
        typeDeclarations: \true,
        earlyReturn: \true,
        strictBooleans: \true,
    )
    ->withRules([
        RectorLaravel\Rector\Class_\AnonymousMigrationsRector::class,
        Rector\CodingStyle\Rector\ArrowFunction\StaticArrowFunctionRector::class,
        Rector\CodingStyle\Rector\Closure\StaticClosureRector::class,
        RectorLaravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector::class,
    ]);
