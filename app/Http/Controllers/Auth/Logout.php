<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        $userSession = UserSession::where('user_id', Auth::user()->id)->first();
        $userSession->delete();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();



        return redirect('/');
    }
}
