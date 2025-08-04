<?php

namespace App\Http\Controllers;

use App\Models\SkincareTip;
use Illuminate\Http\Request;

class SkincareTipController extends Controller
{
    public function index()
    {
        $tips = SkincareTip::all();
        return view('admin.skincare-tip.index', compact('tips'));
    }

    public function create()
    {
        return view('admin.skincare-tip.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:skincare_tips,title',
            'tip_content' => 'required',
        ]);

        SkincareTip::create($request->all());

        return redirect()->route('admin.skincaretips.index')->with('success', 'Skincare tip created successfully.');
    }

    public function show($id)
    {
        $tip = SkincareTip::findOrFail($id);
        return view('admin.skincare-tip.show', compact('tip'));
    }

    public function edit($id)
    {
        $tip = SkincareTip::findOrFail($id);
        return view('admin.skincare-tip.edit', compact('tip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:skincare_tips,title,' . $id,
            'tip_content' => 'required',
        ]);

        $tip = SkincareTip::findOrFail($id);
        $tip->update($request->all());

        return redirect()->route('admin.skincaretips.index')->with('success', 'Skincare tip updated successfully.');
    }

    public function destroy($id)
    {
        $tip = SkincareTip::findOrFail($id);
        $tip->delete();

        return redirect()->route('admin.skincaretips.index')->with('success', 'Skincare tip deleted successfully.');
    }
}
