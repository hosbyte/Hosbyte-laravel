<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();

        return view('Homes.portfolio' , compact("portfolios"));
    }

    public function adminindex()
    {
        // $portfolio = Portfolio::latest()->get();

        // return view('admin.portfolio.index' , compact("portfolio"));

        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', ['portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolios.create');
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
            'title' => 'required', // name => title
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // image_path => image
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable',
            'featured' => 'nullable'
        ]);

        // آپلود تصویر
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
            $validated['image'] = $imagePath;
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'نمونه کار با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit' , compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required', // name => title
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // image_path => image
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable',
            'featured' => 'nullable'
        ]);

        $portfolio = Portfolio::findOrFail($id);
        
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $request->image,
            'project_url' => $request->project_url,
            'github_url' => $request->github_url,
            'technologies' => $request->technologies,
            'featured' => $request->featured,
        ];

        // فقط اگر عکس جدید آپلود شده، آپلود کن
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
            $data['image'] = $imagePath;
            
            // حذف عکس قدیمی (اختیاری)
            // Storage::disk('public')->delete($certificate->image);
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success' , 'حذف شد');
    }
}
