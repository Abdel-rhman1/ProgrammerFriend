<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;
use App\Mail\NotifyEmail;
use Illuminate\Support\Facades\Mail;
class Adding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Item:Adding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $members = Member::get();
        foreach($members as $member){
            $id = $member['id'];
            Member::update(['Name'=>'Hassan Syed'])->where('id' , $id);
        }
        return 0;
    }
}
