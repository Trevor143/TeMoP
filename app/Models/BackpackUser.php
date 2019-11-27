<?php

namespace App\Models;

use App\User;
use Backpack\Base\app\Models\Traits\InheritsRelationsFromParentModel;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Laravelista\Comments\Commenter;
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one

class BackpackUser extends User
{
    use CrudTrait, Commenter; // <----- this
    use InheritsRelationsFromParentModel;

    protected $table = 'users';

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    public static function generatePassword()
    {
        // Generate random string and encrypt it.
        return bcrypt(str_random(35));
    }

//    public static function sendWelcomeEmail()
//    {
//        $token = app('auth.password.broker')->createToken($this);;
//
//        DB::table(config('auth.passwords.users.table'))->insert([
//            'email' => $this->email,
//            'token' => $token
//        ]);
//
//        $resetUrl= url(config('app.url').route('password.reset', $token, false));
//
//        Mail::to($this)->send(new Welcome($this, $resetUrl));
//    }
}
