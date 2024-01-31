<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewregisterRequest;
use App\Http\Requests\UpdateNewregisterRequest;
use App\Models\Newregister;

class NewregisterController extends Controller
{

    public function lang($id)
    {
        $lang_id = $id;
        $user_id = user_id();
        $newregister = Newregister::where('user_id', '=', $user_id)
            ->where('lang_id', '=', $id)
            ->get();

        return view('newregister.index', compact('newregister', 'lang_id'));
        return view('livewire.search-pagination', compact('newregister'));
    }

    public function create($lang_id)
    {
        $searchTerm = request()->query('searchTerm');
        return view('newregister.create', compact('lang_id', 'searchTerm'));
    }

    public function store(StoreNewregisterRequest $request, $lang_id)
    {
        $userId = user_id();
        $id = $lang_id;
        $data = array_merge($request->validated(), [
            'user_id' => $userId,
            'lang_id' => $id
        ]);

        Newregister::create($data);

        return redirect()->route('newregister', compact('id'));
    }


    public function show(Newregister $newregister)
    {
        return view('newregister.show', compact('newregister'));
    }

    public function edit($lang_id, $register_id)
    {
        $lang_id = $lang_id;
        $user_id = user_id();
        $newregister = Newregister::where('user_id', $user_id)
            ->where('id', $register_id)
            ->first();

        if (!$newregister) {
            return redirect()->route('error.page');
        }

        return view('newregister.edit', compact('newregister', 'register_id', 'lang_id'));
    }

    public function update(UpdateNewregisterRequest $request, Newregister $newregister, $lang_id, $register_id)
    {
        $userId = user_id();
        $id = $lang_id;
        $newregister = Newregister::where('user_id', $userId)
            ->where('lang_id', $lang_id)
            ->where('id', $register_id)
            ->firstOrFail();

        $data = array_merge($request->validated(), [
            'user_id' => $userId,
            'lang_id' => $lang_id,
        ]);

        $newregister->update($data);
        return redirect()->route('newregister', compact('id'));
    }


    public function destroy(Newregister $newregister, $lang_id, $destroy_id)
    {
        $id = $lang_id;
        $user_id = user_id();
        $newregister = Newregister::where('lang_id', $lang_id)
            ->where('user_id', $user_id)
            ->where('id', $destroy_id)
            ->firstOrFail();

        $newregister->delete();
        return redirect()->route('newregister', compact('id'));
    }
}
