<?php

declare(strict_types=1);

return Rector\Config\RectorConfig::configure()
    ->withPaths([
        __DIR__.'/database/factories',
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
    ->withImportNames(
        removeUnusedImports: \true,
    )
    ->withRules([
        RectorLaravel\Rector\Class_\AddExtendsAnnotationToModelFactoriesRector::class,
        RectorLaravel\Rector\Class_\RemoveModelPropertyFromFactoriesRector::class,
        RectorLaravel\Rector\PropertyFetch\ReplaceFakerInstanceWithHelperRector::class,
        RectorLaravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector::class,
    ]);
