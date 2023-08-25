<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Utils\FileProcessor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    private UserService $userservice;

    public function __construct()
    {
        $this->userservice = new UserService;
    }

    public function index()
    {
        $this->authorize('view-users', Auth::user() );
        $data = $this->userservice->index();

        return view('adminuser.index',compact('data'));
    }
    
    public function storeAdmin(UserRequest $request)
    {
        $this->authorize('manage-users', Auth::user() );

        $data = $request->validated();
        $user = $this->userservice->storeAdmin($data);

        Alert::success('Success', 'User Added Successfully');
        
        return redirect('/admin-list');
    }

    public function updateAdmin(UserRequest $request , $id)
    {
        $this->authorize('manage-users', Auth::user() );

        $data = $request->validated();
        $user = $this->userservice->updateAdmin($data,$id);

        Alert::success('Success', 'User Updated Successfully');
        return redirect('/admin-list');
    }

}
