<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Encryption\DecryptException;


class LoginUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'login:user {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Login user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument("email");
        $password = $this->argument("password");

        //Get some user from somewhere
        if(!User::where("email", $email)->count()){
            $this->info("User not faund");
        }
        elseif($user = User::firstOrNew(['email' => $email],['password' => $password])){
            // Get the token
            if (Hash::check($password, $user['password'])) {
                $token = auth()->login($user);
                $auth_factory = auth()->factory()->getTTL() * 10;

                $this->info("access_token :".$token);
                $this->info("experies_is : ".$auth_factory);
                $this->info( "token_type :"." bearer");
            }
            else{
            $this->info("Password not faund");
            }
        }
           
    }

}
