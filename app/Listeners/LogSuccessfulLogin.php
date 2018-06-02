<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\UserSignMonitor;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $usermonitor = New UserSignMonitor;
        $usermonitor->user_id = Auth::user()->id;
        $usermonitor->signin_at = Carbon::now();
        $usermonitor->save();
    }
}
