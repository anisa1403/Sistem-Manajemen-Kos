<?php 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use App\Models\Sewa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $passwordRahasia = "admin123";

    public function showLoginForm() {
        return view('admin.login-admin');
    }

    public function login(Request $request) {
        $request->validate([
            'password_admin' => 'required'
        ]);

        if ($request->password_admin === $this->passwordRahasia) {
            session(['is_admin' => true]);
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Password Admin Salah!');
    }

    public function dashboard() {
        $totalUsers = User::count();
        $totalKamar = Kamar::count();
        $totalSewa = Sewa::count();
        $pendingPayments = Pembayaran::count();
        $validRevenue = Pembayaran::sum('jumlah');

        return view('admin.dashboard', compact('totalUsers', 'totalKamar', 'totalSewa', 'pendingPayments', 'validRevenue'));
    }

    public function logout() {
        session()->forget('is_admin');
        return redirect('/admin-login');
    }
}
?>