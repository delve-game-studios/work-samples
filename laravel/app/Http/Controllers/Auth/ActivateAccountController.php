<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ActivateAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActivateAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->middleware('guest');
    }

    /**
     * Activate the user
     *
     * @return string
     */
    public function activate(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }

        $user = User::find($request->get('id'))->where('email', $request->get('email'))->first();
        $user->active = true;
        $user->save();

        auth()->login($user);

        return redirect()->route('index');
    }

    public function unactivated()
    {
        return view('auth.unactivated');
    }

    public function requestNewActivationEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);

        try {
            $user = User::unactive()->where('email', $request->get('email'))->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return back()->withErrors([
                'email' => 'This email is not found or is already activated.'
            ]);
        }

        Mail::to($user)->send(new ActivateAccount($user));

        return back();
    }
}
