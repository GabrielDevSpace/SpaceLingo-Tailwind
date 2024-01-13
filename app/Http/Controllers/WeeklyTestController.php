<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lang;
use App\Models\CourseOrStudyPlan;
use App\Models\Topic;
use App\Models\Newregister;
use App\Models\Notes;
use App\Models\WeeklyTest;


class WeeklyTestController extends Controller
{

    public function index($id)
    {
        $lang_id = $id;
        $user_id = user_id();
        $vocabulary = Newregister::where('lang_id', '=', $lang_id)
        ->where('user_id', '=', $user_id)
            ->get();

           //dd($vocabulary);

        return view('weeklytest.index', compact('lang_id', 'vocabulary'));
    }

}
