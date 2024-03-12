<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ToolController extends Controller
{
    public function index(Request $request)
    {
        $toolsQuery = Tool::query()
            ->with('category')
            ->orderByName()
            ->filter($request->only('search', 'trashed'))
            ->paginate(5)
            ->withQueryString()
            ->through(function ($tool) {
                return [
                    'id' => $tool->id,
                    'name' => $tool->tool_name,
                    'description' => $tool->description,
                    'category_id' => $tool->category_id,
                    'created_at' => $tool->created_at,
                    'updated_at' => $tool->updated_at,
                    'deleted_at' => $tool->deleted_at,
                ];
            });

        return Inertia::render('Tools/Index', [
            'filters' => $request->all('search', 'trashed'),
            'tools' => $toolsQuery,
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get()->map->only('id', 'name');

        return Inertia::render('Tools/Create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tool_name' => ['required', 'max:50'],
            'description' => ['required', 'max:50'],
            'category_id' => [
                'nullable',
                Rule::exists('categories', 'id'),
            ],
        ]);

        $tool = Tool::create($validatedData);

        return redirect()->route('toolspage')->with('success', 'Tool created.');
    }


    public function edit(Tool $tool)
    {
        $categories = Category::orderBy('name')->get()->map->only('id', 'name');

        return Inertia::render('Tools/Edit', [
            'tool' => [
                'id' => $tool->id,
                'tool_name' => $tool->tool_name,
                'description' => $tool->description,
                'category_id' => $tool->category_id,
                'created_at' => $tool->created_at,
                'updated_at' => $tool->updated_at,
                'deleted_at' => $tool->deleted_at,
            ],
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Tool $tool)
    {
        $validatedData = $request->validate([
            'tool_name' => ['required', 'max:50'],
            'description' => ['required', 'max:50'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);
    
        $tool->update($validatedData);
    
        return Redirect::back()->with('success', 'Tool updated.');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();

        return Redirect::back()->with('success', 'Tool deleted.');
    }

    public function restore(Tool $tool)
    {
        $tool->restore();

        return Redirect::back()->with('success', 'Tool restored.');
    }
}
