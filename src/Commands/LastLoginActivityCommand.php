<?php

namespace IriusDigital\LastLoginActivity\Commands;

use Illuminate\Console\Command;

class LastLoginActivityCommand extends Command
{
    public $signature = 'last-login-activity';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
