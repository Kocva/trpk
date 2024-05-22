<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
use App\Models\weightstat;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $userInfo = UserInfo::where('userID', $userId)->first();
        if ($userInfo) {
            return view('profile', compact('userInfo'));
        } else {
            $defaultValues = [
                'weight' => 0,
                'height' => 0,
                'gender' => 'male',
                'age' => 0,
                'activity' => 'medium',
            ];

            $userInfo = new UserInfo();
            $userInfo->userID = Auth::user()->id;
            $userInfo->fill(array_merge($defaultValues, $request->only(['weight', 'height', 'gender', 'age', 'activity'])));
            $userInfo->save();
            return view('profile', compact('userInfo'));
        }
    }

    public function updateProfile(Request $request)
    {
        
        $userId = Auth::user()->id;
           
        $userInfo = UserInfo::where('userID', $userId)->first();
        

        $currentDate = Carbon::now()->toDateString();

        $weightstat = weightstat::where('userID', $userId)
            ->whereDate('created_at', $currentDate)
            ->first();
        if ($weightstat) {
            $weightstat->weight = $request->input('weight');
            $weightstat->save();
        }
        else {
            $weightstat = new weightstat;
            $weightstat->userID = $userId;
            $weightstat->weight = $request->input('weight');
            $weightstat->save();
        }
        
        

        if ($userInfo) {
            $userInfo->update([
                'weight' => $request->input('weight'),
                'height' => $request->input('height'),
                'gender' => $request->input('gender'),
                'age' => $request->input('age'),
                'activity' => $request->input('activity'),
            ]);
        } else {
            $userInfo = new UserInfo;
            $userInfo->userID = Auth::user()->id;
            $userInfo->weight = $request->input('weight');
            $userInfo->height = $request->input('height');
            $userInfo->gender = $request->input('gender');
            $userInfo->age = $request->input('age');
            $userInfo->activity = $request->input('activity');
            $userInfo->save();
        }

        return redirect('/user-profile')->with('success', 'Profile updated successfully!');
    }
}
