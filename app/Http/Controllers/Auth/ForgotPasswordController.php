<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;



    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email input using the $request object
        $request->validate([
            'email' => 'required|email|exists:users,email', // Ensure email exists in the users table
        ]);

        // Send password reset link with the token
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Return the appropriate response based on the status
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', trans($status)) // If successful, show status message
            : back()->withErrors(['email' => trans($status)]); // If failed, show error message
    }
}
