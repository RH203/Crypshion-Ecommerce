<?php

namespace App\Livewire\Pages\App;

use App\Models\app\Product;
use App\Models\Order;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
#[Layout('layouts.app_admin')]

class Dashboard extends Component
{


    public $totalIncome = 0;

    public function render()
    {
        $user = Auth::user();
        $totalSales = Order::where('status', 'Confirmed')->sum('quantity');
        $totalOrders = Order::where('status', '!=', 'Confirmed')->count();
        $totalSubscribe = Subscribe::all()->count();

        $this->totalIncome = Order::where('status', 'Confirmed')
            ->sum(DB::raw('quantity * price'));

        // Mengambil pengguna yang sedang login
        $loggedInUsers = UserSession::orderBy('login_at', 'DESC')->get();

        return view('livewire.pages.app.dashboard', [
            'loggedInUsers' => $loggedInUsers,

            'totalSales' => $totalSales,
            'totalOrders' => $totalOrders,
            'totalSubscribe' => $totalSubscribe,

            'totalIncome' => $this->totalIncome,
        ]);
    }
}
