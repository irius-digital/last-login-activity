<?php

namespace IriusDigital\LastLoginActivity;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use IriusDigital\LastLoginActivity\Commands\LastLoginActivityCommand;

class LastLoginActivityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('last-login-activity')
            ->hasConfigFile()
            ->hasMigration('create_last_login_activity_table')
            ->hasMigration('create_login_activities_table');
    }
}
