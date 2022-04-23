<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $complaints = Complaint::orderBy('created_at', 'DESC');
        $complaints = $complaints->simplePaginate(99)->toArray()['data'];
        foreach ($complaints as $key => $val) {
            $complaints[$key]['created_at'] = Carbon::create($complaints[$key]['created_at'])->locale('in_ID')->isoFormat('DD MMMM Y');
        }

        return view('complaint.dashboard', compact('user', 'complaints'));
    }
    
    public function index()
    {
        $complaints = Complaint::orderBy('created_at', 'DESC');
        $complaints = $complaints->simplePaginate(99)->toArray()['data'];

        foreach ($complaints as $key => $val) {
            $complaints[$key]['created_at'] = Carbon::create($complaints[$key]['created_at'])->toDayDateTimeString();
        }

        return view('public.detail', compact('complaints'));
    }

    public function create_form()
    {
        return view('public.create');
    }

    public function create(Request $request)
    {
        $complaint = new Complaint;

        $complaint->nik = $request->nik;
        $complaint->name = $request->name;
        $complaint->address = $request->address;
        $complaint->phone_number = $request->phone_number;
        $complaint->report = $request->report;
        $complaint->status = $request->status;

        if (isset($request->photo)) {
            $request->photo = $request->photo->store('public/foto');
            $request->photo = str_replace('public/', '', $request->photo);
            $complaint->photo = $request->photo;
        }

        $request->validate([
            'nik' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'report' => 'required|string',
            'status' => ['required', Rule::in(config('constant.complaint.status'))]
        ]);

        $complaint->save();

        return redirect()->back()->with('success', 'Berhasil mendaftar');
    }

    public function detail($id)
    {
        $user = Auth::user();

        $complaint = Complaint::findOrFail($id);

        return view('complaint.edit', compact('complaint','user'));
    }

    public function update($id, Request $request)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->status = $request->status;

        $request->validate([
            'status' => ['required', Rule::in(config('constant.complaint.status'))],
        ]);

        $complaint->save();

        return redirect()->back()->with('success', 'Berhasil memperbarui status!');
    }

    public function delete($id)
    {
        $complaint = Complaint::findOrFail($id);
        Storage::delete('public/'.$complaint->photo);
        $complaint->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus pengaduan!');
    }

    public function print($id)
    {
        $complaint = Complaint::findOrFail($id);

        return view('complaint.print', compact('complaint'));
    }

}
