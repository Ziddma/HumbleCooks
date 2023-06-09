<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolsController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $tools = Tool::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('admin.tools.index', compact('tools', 'search'));
    }

    public function create(): View
    {
        return view('admin.tools.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('tools', 'public');

        Tool::create([
            'name' => $validatedData['name'],
            'image' => $imagePath,
            'description' => $validatedData['description'],
        ]);

        return redirect()
            ->route('dashboard.tools.index')
            ->with('status', 'Tools created successfully.');
    }

    public function edit($id): View
    {
        $tools = Tool::find($id);

        if (!$tools) {
            return redirect()
                ->route('dashboard.tools.index')
                ->with('status', 'Tools not found.');
        }

        return view('admin.tools.form', [
            'tools' => $tools,
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image',
            'description' => 'required|string',
        ]);

        $tools = Tool::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($tools->image);

            $imagePath = $request->file('image')->store('tools', 'public');
            $tools->image = $imagePath;
        }

        $tools->name = $validatedData['name'];
        $tools->description = $validatedData['description'];
        $tools->save();

        return redirect()
            ->route('dashboard.tools.index')
            ->with('status', 'Tools updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $tools = Tool::findOrFail($id);

        Storage::disk('public')->delete($tools->image);

        $tools->delete();

        return redirect()
            ->route('dashboard.tools.index')
            ->with('status', 'Tools deleted successfully.');
    }
}
