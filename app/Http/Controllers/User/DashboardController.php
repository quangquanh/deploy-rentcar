<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Models\Admin\BasicSettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = __("Dashboard");
        return view('user.dashboard',compact("page_title"));
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('frontend.index');
    }
}
