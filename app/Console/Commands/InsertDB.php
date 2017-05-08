<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class InsertDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:user {name} {email=Unknown@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'just for test :)';

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
        $name = $this->argument('name');
        $email = $this->argument('email');
        DB::table('users')->insert(['username'=> $name,'email'=>$email,'password'=>123456]);
        $this->info('user added to database correctlly');

    }
}
