<?php

namespace IriusDigital\LastLoginActivity\Events;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class LastActivityEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Login $event)
    {
        if (config('last-login-activity.save_last_login.enabled')) {
            $event->user->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $this->request->getClientIp(),
            ]);
            $event->user->loginActivities()->create([
               'ip_address' => $this->request->getClientIp(),
            ]);
        }
    }
}
