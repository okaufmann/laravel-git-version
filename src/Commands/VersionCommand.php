<?php

namespace Tremby\LaravelGitVersion\Commands;

use Illuminate\Console\Command;
use Tremby\LaravelGitVersion\GitVersionHelper;

class VersionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'version:bump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a file `version` in project root with version.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        GitVersionHelper::bumpVersion();
    }
}
