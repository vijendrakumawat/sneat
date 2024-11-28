<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }
    public function index()
    {
        $data = User::all();
        
        return view('admins.profile.profile-index' ,compact('data'));
    }
    public function edit(Request $request,$id)
    {
        $userDataEdit = User::find($id);
        
        return view('admins.profile.profile-edit' ,compact('userDataEdit'));
    }
    public function updateUser(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'last_name' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:50',
            'currency' => 'nullable|string|max:10',
            'time_zones' => 'nullable|string|max:50',
            'password' => 'required|string|max:255|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $userDataUpdate = User::find($id);
        $userDataUpdate->name = $request->name;
        $userDataUpdate->email = $request->email;
        $userDataUpdate->password = Hash::make($request->password);
        $userDataUpdate->last_name = $request->last_name;
        $userDataUpdate->organization = $request->organization;
        $userDataUpdate->phone_number = $request->phone_number;
        $userDataUpdate->address = $request->address;
        $userDataUpdate->state = $request->state;
        $userDataUpdate->zip_code = $request->zip_code;
        $userDataUpdate->country = $request->country;
        $userDataUpdate->language = $request->language;
        $userDataUpdate->currency = $request->currency;
        $userDataUpdate->time_zones = $request->time_zones;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $userDataUpdate->image = 'images/' . $imageName;
        }
        $userDataUpdate->save(); 
        return response()->json([
            'message' => 'Users Has been updated successfully',
            'redirect_url' => route('profile-index')
        ]);
        
    }
    public function userDestroy(Request $request)
{
    try {
        // Fetch and delete the record
        $record = User::findOrFail($request->id);
        $record->delete();

        return response()->json(['message' => ' User has been  deleted successfully!']);
    } catch (Exception $e) {
        return response()->json(['message' => 'Failed to delete the record!'], 500);
    }
}

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();
        return response()->json([
            'message' => 'Login has been  submitted successfully!',
            'redirect_url' => route('dashboard') // optional redirect URL
        ]);
        
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return response()->json([
            'message' => 'Logout has been successfully!',
            'redirect_url' => route('login') // optional redirect URL
        ]);
       
    }
    public function show()
{
    $userData = Auth::guard('web')->user();
    $id = $userData->id;
    $data = User::find($id);
    return view('account-setting', compact('data'));
}
     

public function update(Request $request) {

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'last_name' => 'nullable|string|max:255',
        'organization' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'zip_code' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:255',
        'language' => 'nullable|string|max:50',
        'currency' => 'nullable|string|max:10',
        'time_zones' => 'nullable|string|max:50',
        'password' => 'required|string|max:255|min:8',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $user = Auth::user(); 
    $id = $user->id;

    $userUpdates = User::find($id); 

    if (!$userUpdates) {
        return response()->json([
            'message' => 'User not found.',
        ], 404);
    }
    $userUpdates->name = $request->name;
    $userUpdates->email = $request->email;
    $userUpdates->password = Hash::make($request->password);
    $userUpdates->last_name = $request->last_name;
    $userUpdates->organization = $request->organization;
    $userUpdates->phone_number = $request->phone_number;
    $userUpdates->address = $request->address;
    $userUpdates->state = $request->state;
    $userUpdates->zip_code = $request->zip_code;
    $userUpdates->country = $request->country;
    $userUpdates->language = $request->language;
    $userUpdates->currency = $request->currency;
    $userUpdates->time_zones = $request->time_zones;
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $userUpdates->image = 'images/' . $imageName;
    }
    $userUpdates->save(); 
    return response()->json([
        'message' => 'Users Profile Has been updated successfully',
        'redirect_url' => route('profile')
    ]);
}


public function status(Request $request) {
    $user = Auth::user(); 
    $id = $user->id;

    $statusUpdates = User::find($id); 
    $statusUpdates->status = $request->has('status') ? 1 : 0; // Set status based on checkbox
    $statusUpdates->save(); 
    return response()->json([
        'message' => 'Status Has been updated successfully',
        'redirect_url' => route('profile'),
        'statusUpdates' =>$statusUpdates
    ]);
}

}
