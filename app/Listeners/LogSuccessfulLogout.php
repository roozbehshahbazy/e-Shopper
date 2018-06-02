<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\UserSignMonitor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        
        $usermonitor = New UserSignMonitor;
        $usermonitor->user_id = Auth::user()->id;
        $usermonitor->signout_at = Carbon::now();
        $usermonitor->save();
    }
}
