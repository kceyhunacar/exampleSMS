<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Sms;
use Illuminate\Http\Request;
use DataTables;

class SmsController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Sms::with('user')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $updateBtn = '    <a class="btn btn-primary btn-xs text-white" href="' . route('admin.sms.edit', $row->id) . '">Edit
                                                            </a>';

                    $deleteBtn = ' <button class="btn btn-danger btn-xs text-white delete-button" data-toggle="modal" data-target="#deleteModal"
                                                            data-id="' . $row->id . '">
                                                            Delete
                                                        </button>';

                    $btn = $updateBtn . $deleteBtn;

                    return $btn;
                })
                ->addColumn('user', function ($row) {
                    $user = $row->user->name;

                    return $user;
                })

                ->rawColumns(['action', 'user'])
                ->make(true);
        }

        return view('backend.pages.sms.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.sms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sms = new Sms();

        $sms->fill([
            'title' => $request->title
        ]);
        $sms->save();

        session()->flash('success', 'Sms has been created.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Sms $sms)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sms $sms)
    {
        return view('backend.pages.sms.edit', ['sms' => $sms]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sms $sms)
    {

        $sms->fill([
            'title' => $request->title
        ]);
        $sms->save();

        session()->flash('success', 'Sms has been updated.');
        return back();
    }


    public function delete($id)
    {


        $sms = Sms::findOrFail($id);
        $sms->delete();
        session()->flash('success', 'Sms has been deleted.');

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
