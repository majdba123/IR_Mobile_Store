<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail as FacadesMail;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // print('fdfs');
        $token_id = auth()->user()->id;
        $user = User::where('id', $token_id)->first();

        if ($user->Type_of_user == '1') {
            $user = User::all();
            // var_dump(User::all());
            return response()->json($user);
        } else {
            return response()->json(['message' => 'You are not allowed to view this page']);
        }
    }

    public function show(Request $request)
    {
        $token_id = auth()->user()->id;
        $user = User::where('id', $token_id)->first();
        if (!$user) {
            $response = ['message' => 'id incorrect'];
        } else {
            $response =  $user;
        }
        return response()->json($response);
        return response()->json($response);
    }
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'Nationality' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'Nationality' => $request->Nationality,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'type_of_user' => $user->Type_of_user,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $user = User::find($request->input('id'));
        if (!$user) {
            return response()->json(['error' => 'user not found'], 404);
        }
        $this->validate($request, [
            'name' => 'required',
            'Nationality' => 'required',
            'phone' => 'required',
            'email' => 'required'
            // Add validation rules for other fields
        ]);
        $user->update($request->all());
        return response()->json($user, 200);
    }
    public function destroy(Request $request)
    {

        $token_id = auth()->user()->id;
        $user = User::where('id', $token_id)->first();

        if ($user->Type_of_user == '1') {
            $user_del = User::find($request->input('id_user_to_delete'));

            if ($user_del) {
                $user_del->delete();
                return response()->json(['message' => 'user deleted successfully'], 200);
            } else {
                return response()->json(['message' => ' not found user in store']);
            }
        } else {
            return response()->json(['message' => 'You are not allowed to view this page']);
        }
    }



    public function sendVerfication($email)
    {
        if (auth()->user()) {
            $user = User::where('email', $email)->get();
            if (count($user) > 0) {

                $random = Str::random(40);
                $domain = URL::to('/');
                $url = $domain . '/verfiy-mail/' . $random;
                $data['url'] = $url;
                $data['email'] = $email;
                $data['title'] = "Email Verification";
                $data['body'] = "please check here to below to vefiy your mail";

                FacadesMail::send('vefiyEmail', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });

                $user = User::find($user[0]['id']);
                $user->remember_token = $random;
                $user->save();
                return response()->json(['success' => true, 'msg' => 'mail send successful']);
            } else {
                return response()->json(['success' => false, 'msg' => 'user is not found']);
            }
        } else {
            return response()->json(['success' => false, 'msg' => 'user is not Auth']);
        }
    }

    public function verficationMail($token)
    {
        $user = User::where('remember_token', $token)->get();
        if (count($user) > 0) {

            $user = User::find($user[0]['id']);
            $user->remember_token = $token;
            $user->email_verified_at = carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            return "<h1>Email verfied seccsfuly </h1>";
        } else {
            return view('404');
        }
    }
}
