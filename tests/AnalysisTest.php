<?php

declare(strict_types=1);

namespace Tests;

use GrahamCampbell\Analyzer\AnalysisTrait;

final class AnalysisTest extends TestCase
{
    use AnalysisTrait;

    /**
     * @return array<int, string>
     */
    protected static function getPaths(): array
    {
        return [
            __DIR__.'/../app',
            __DIR__.'/../database',
            __DIR__.'/../resources',
            __DIR__.'/../routes',
        ];
    }

    /**
     * @return array<int, string>
     */
    protected function getIgnored(): array
    {
        return [
            //
        ];
    }
}
