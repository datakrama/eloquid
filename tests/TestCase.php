<?php

namespace Datakrama\Eloquid\Test;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->artisan('migrate')->run();
        $this->withFactories(__DIR__.'/database/factories');
    }

    /**
     * Determine if a given string is a valid UUID.
     *
     * @param  string  $value
     * @return bool
     */
    public function isUuid($value)
    {
        if (! is_string($value)) {
            return false;
        }

        return preg_match('/^[\da-f]{8}-[\da-f]{4}-[\da-f]{4}-[\da-f]{4}-[\da-f]{12}$/iD', $value) > 0;
    }
}