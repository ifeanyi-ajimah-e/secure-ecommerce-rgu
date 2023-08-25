<?php 

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use App\Utils\AdminType;
use App\Utils\FileProcessor;
use Illuminate\Support\Facades\Hash;

class UserService{

    public function index()
    {
        $data['users'] = User::where('type',AdminType::ADMIN )->get();
        $data['roles'] = Role::get();
        return $data;
    }

    public function storeAdmin($data)
    {

        $rawpassword = $data['password'];
        $data['password'] = Hash::make($data['password']);
        $data['status'] = 1;
        $data['type'] = 'admin';
        $data['email_verified_at'] = now();
        if(isset($data['image'])){
         $idImage = FileProcessor::storeImage($data['image'], "images", "userimage" );
         $data['image'] = $idImage;
        }
        User::create($data);

        $theRoleName = Role::find($data['role_id'])->name;
        
        if (isset($data['is_emailuser'])) {
            // Mail::to($data['email'])->send(new NewUserMail($data, $theRoleName, $rawpassword ));
        }


        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'phone' => 'required|string|max:15|unique:users',
        //     'password' => ['required', 'confirmed', Password::defaults()],
        // ]);
        // $verification_token = Str::random(64);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'is_active' => 1,
        //     'type' => "outletmanager",
        //     'verification_token' => $verification_token,
        //     'password' => Hash::make($request->password),
        // ]);

        // // event(new Registered($user)); 
        // UserEmailVerificationController::sendEmailVerificationMail($user, $verification_token );

        // $token = $user->createToken('authtoken');
        // return response()->json(
        //     [
        //         'message'=>'Registration Successful. Kindly check your email for email verification.',
        //         'data'=> ['token' => $token->plainTextToken, 'user' => $user]
        //     ]
        // );
    }

    public function updateAdmin($data,$id)
    {
        
        $user = User::find($id);
        // $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['status'] = 1;
        $data['type'] = 'admin';
        if(isset($data['image'])){
         $idImage = FileProcessor::updateImage($data['image'], $user->image, "images", "userimage" );

         $data['image'] = $idImage;
        }
        $user->update($data);
    }
}



