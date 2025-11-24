<?php

namespace Laravel\Nova\Tests\Controller;

use Laravel\Nova\Tests\MySqlIntegrationTest;

class MySqlSearchControllerTest extends MySqlIntegrationTest
{
    use SearchControllerTests;

    protected function setUp(): void
    {
        $this->skipIfNotRunning();

        parent::setUp();

        $this->authenticate();
    }
}
