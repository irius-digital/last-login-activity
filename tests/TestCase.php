<?php

namespace IriusDigital\LastLoginActivity\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use IriusDigital\LastLoginActivity\LastLoginActivityServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'IriusDigital\\LastLoginActivity\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LastLoginActivityServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_last-login-activity_table.php.stub';
        $migration->up();
        */
    }
}
