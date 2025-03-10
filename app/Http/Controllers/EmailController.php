<?php

namespace App\Http\Controllers;

use App\Mail\RequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function upgradeRoleEmail(Request $request) {
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        try {
            $user_id = Auth::id();
            $name = $request -> name;
            $email = $request -> email;
            $message = $request -> message;
            Mail::to('himmatmagar007@gmail.com') -> send(new RequestMail($user_id, $name, $email, $message));
            return back() -> with('status', 'Request send successfully');
        } catch (\Throwable $th) {
            // Log::error('Email sending failed: ' . $e->getMessage());

            // Set error message
            return back()->withErrors(['error' => 'Failed to send email: ' . $th->getMessage()]);
        }
    }
}
