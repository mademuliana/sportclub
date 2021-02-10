<?php

namespace App\Http\Controllers;

use App\Traits\RegisterUser;
use App\Http\Requests\RegistrationRequest;
use App\Models\Sport_Club;
use App\Models\User;
class RegistrationController extends Controller
{
    use RegisterUser;

    public function show()
    {
        $sportclubs = Sport_Club::all();
        return view('profile/register',['sportclubs' => $sportclubs]);
    }

    public function register(RegistrationRequest $requestFields)
<<<<<<< HEAD
    {
        if ($requestFields->role!=2) {

=======
    {   
        if ($requestFields->role!=2) {
            
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
            $user = $this->registerUser($requestFields);
            return redirect('/login');
            $j=2;

        }else{
            $user = User::orderBy('id', 'DESC')->first();
            $id_pic= $user->id+1;
            $j=1;
            for ($i=2; $i > 0 ; $i--) {
                if ($j==1) {
                    $user = $this->registerUser($requestFields);
                    $j=2;
                }
                if ($j==2) {

                    Sport_Club::where('id', $requestFields->sport)->update([
                        'pic' => $id_pic,
                     ]);
                }
<<<<<<< HEAD

=======
                
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
            }
            return redirect('/login');
        }

<<<<<<< HEAD

    }
}
=======
        
    }
}
>>>>>>> 8124fa040b4c523c331f8007a2769b0f5498bcae
