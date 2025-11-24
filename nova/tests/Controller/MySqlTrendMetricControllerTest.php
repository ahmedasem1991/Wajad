<?php

namespace Laravel\Nova\Tests\Controller;

use Laravel\Nova\Tests\MySqlIntegrationTest;

class MySqlTrendMetricControllerTest extends MySqlIntegrationTest
{
    use TrendDateTests;

    protected function setUp(): void
    {
        $this->skipIfNotRunning();

        parent::setUp();

        $this->authenticate();
    }
}
