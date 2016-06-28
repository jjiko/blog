<?php

namespace Jiko\Blog\Auth;

use Jiko\Blog\Password\PasswordService;
use Auth;

trait ResetsPasswords
{
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword $user
     * @param  string $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $passwordService = new PasswordService;

        $user->user_pass = $passwordService->wp_hash_password($password);

        $user->save();

        Auth::guard($this->getGuard())->login($user);
    }
}
