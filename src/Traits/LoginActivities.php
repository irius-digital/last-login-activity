<?php

namespace IriusDigital\LastLoginActivity\Traits;

use IriusDigital\LastLoginActivity\Models\LoginActivity;

trait LoginActivities {

    /**
     * Fetches latest login ip address of user
     */
    public function latestLoggedIp()
    {
        return $this->hasOne(LoginActivity::class)->latestOfMany();
    }

    /**
     * Fetches all login activities of user
     */
    public function loginActivities()
    {
        return $this->hasMany(LoginActivity::class);
    }
}