<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Product;


class AdminController extends Controller
{
    public function dashboard(): View
    {
        $totalUsers = User::count();
        return view('admin.dashboard', compact('totalUsers'));
    }

    public function shop(): View
    {
        $totalProducts = Product::count();
        return view('admin.store.index', compact('totalProducts'));
    }

    public function forum(): View
    {
        return view('admin.forum');
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
