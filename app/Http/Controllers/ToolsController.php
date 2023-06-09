<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
}
