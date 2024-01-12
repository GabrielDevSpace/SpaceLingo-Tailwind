<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lang;
use App\Models\CourseOrStudyPlan;
use App\Models\Topic;
use App\Models\Notes;



class CourseNotesController extends Controller
{

    public function index($id)
    {
        $lang_id = $id;
        $user_id = user_id();
        $courses = CourseOrStudyPlan::where('lang_id', '=', $lang_id)
        ->where('user_id', '=', $user_id)
            ->get();

        return view('coursenotes.index', compact('lang_id', 'courses'));
    }

}
