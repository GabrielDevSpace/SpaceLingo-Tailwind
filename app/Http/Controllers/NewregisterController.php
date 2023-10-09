<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewregisterRequest;
use App\Http\Requests\UpdateNewregisterRequest;
use App\Models\Newregister;

class NewregisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function lang($id)
     {

         $user_id = user_id();
         $newregister = Newregister::where('user_id', '=', $user_id)
                                   ->where('lang_id', '=', $id)
                                   ->get();
     
         return view('newregister.index', compact('newregister'));
         return view('livewire.search-pagination', compact('newregister'));
     }


    public function index()
    {
        $user_id = user_id();
        //$newregister = Newregister::all();
        $newregister = Newregister::where('user_id', '=', $user_id)->get();

        
        //dd($count);

        return view('newregister.index');
        return view('livewire.search-pagination', compact('newregister'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newregister.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewregisterRequest $request)
    {
        $userId = user_id();
        $data = array_merge($request->validated(), ['user_id' => $userId]);

        Newregister::create($data);

        return redirect()->route('newregister.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Newregister $newregister)
    {
        return view('newregister.show', compact('newregister'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newregister $newregister)
    {
        return view('newregister.edit', compact('newregister'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewregisterRequest $request, Newregister $newregister)
    {
        //$newregister->update($request->validated());
        $userId = user_id();
        $data = array_merge($request->validated(), ['user_id' => $userId]);
        $newregister->update($data);
        return redirect()->route('newregister.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newregister $newregister)
    {
        $newregister->delete();

        return redirect()->route('newregister.index');
    }
}
