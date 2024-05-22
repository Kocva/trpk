<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eated;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function showProgress()
    {

        $userId = Auth::user()->id;
        $userInfo = UserInfo::where('userID', $userId)->first();
        $activity = 1.55;
        switch ($userInfo->activity) {
            case 'minimal':
                $activity = 1.2;
                break;
            case 'small':
                $activity = 1.375;
                break;
            case 'medium':
                $activity = 1.55;
                break;
            case 'high':
                $activity = 1.725;
                break;
            case 'extra':
                $activity = 1.9;
                break;
        }


        if ($userInfo->gender == 'male') {
            $maxCalories = round((10 * $userInfo->weight + 6.25 * $userInfo->height - 5 * $userInfo->age + 5) * $activity);
        } else {
            $maxCalories = round((10 * $userInfo->weight + 6.25 * $userInfo->height - 5 * $userInfo->age - 161) * $activity);
        }

        $A = (($maxCalories / 1000) * 200) / 100;
        $maxProtein = round($A * 36);
        $maxFat = round($A * 16);
        $maxHydrate = round($A * 48);
        $userID = auth()->id(); // Получаем ID текущего пользователя
        //$maxCalories = 2500; // Максимальное количество калорий
        //$maxProtein = 100; // Максимальное количество белков
        //$maxFat = 100;
        //$maxHydrate = 100;

        // Подсчет потребленных калорий и белков для текущего пользователя
        $currentDate = Carbon::now()->toDateString();

        $data = Eated::where('userID', $userID)
             ->whereDate('created_at', $currentDate)
             ->get();
        $totalCalories = $data->sum('calories');
        $totalProtein = $data->sum('protein');
        $totalFat = $data->sum('fat');
        $totalHydrate = $data->sum('hydrate');

        return view('home', compact('totalCalories', 'maxCalories', 'totalProtein', 'maxProtein', 'totalFat', 'maxFat', 'totalHydrate', 'maxHydrate', 'data'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
}
