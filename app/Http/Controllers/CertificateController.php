<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::all();

        return view('Homes.certificates' , compact("certificates"));
    }

    public function adminindex()
    {
        $certificates = Certificate::latest()->paginate(10);
        return view('admin.certificates.index', ['certificates' => $certificates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required', 
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate_url' => 'required|url',
            'issuer' => 'nullable', // اضافه کن
            'duration' => 'nullable', // اضافه کن
        ]);

        // آپلود تصویر
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
            $validated['image'] = $imagePath; // مسیر رو ذخیره کن
        }

        Certificate::create($validated);


        return redirect()->route('admin.dashboard')->with('success' , 'ثبت انجام شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificates.edit' , compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'issuer' => 'required',
            'duration' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // nullable باشه
            'certificate_url' => 'required',
        ]);

        $certificate = Certificate::findOrFail($id);
        
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'issuer' => $request->issuer,
            'duration' => $request->duration,
            'certificate_url' => $request->certificate_url,
        ];

        // فقط اگر عکس جدید آپلود شده، آپلود کن
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
            $data['image'] = $imagePath;
            
            // حذف عکس قدیمی (اختیاری)
            // Storage::disk('public')->delete($certificate->image);
        }

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')->with('success', 'بروزرسانی شد'); // successs => success
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);

        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success' , 'حذف شد');
    }
}
