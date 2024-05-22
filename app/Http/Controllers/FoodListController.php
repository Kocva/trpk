<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\FoodList;
use App\Models\Eated;
class FoodListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $foodList = FoodList::take(10)->get(); // Получаем все записи из таблицы foodlist

        return view('addFood', ['foodList' => $foodList]);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $foodList = FoodList::where('foodName', 'like', '%'.$search.'%')->get();
        } else {
            $foodList = FoodList::take(10)->get();
        }

        return view('addFood', compact('foodList'));
    }

    public function addFood(Request $request, $food)
    {
        if (is_string($food)) {
            $food = FoodList::find($food); // Assuming Food is the model for food items
        }
        $grams = $request->input('grams');

        $protein = $food->protein * $grams / 100;
        $fat = $food->fat * $grams / 100;
        $hydrate = $food->hydrate * $grams / 100;
        $calories = $food->calories * $grams / 100;
        $foodName = $food->foodName;

        Eated::create([
            'userID' => Auth::user()->id,
            'foodName' => $foodName,
            'calories' => $calories,
            'protein' => $protein,
            'fat' => $fat,
            'hydrate' => $hydrate,
        ]);

        return redirect()->back()->with('success', 'Food added successfully to eated table!');

    }
}
