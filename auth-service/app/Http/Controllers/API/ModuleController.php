<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        return response()->json(['modules' => Module::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:modules,name',
            'description' => 'nullable|string'
        ]);

        $module = Module::create($data);
        return response()->json(['module' => $module]);
    }

    public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|unique:modules,name,'.$id,
            'description' => 'nullable|string'
        ]);

        $module->update($data);
        return response()->json(['module' => $module]);
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return response()->json(['message' => 'Module deleted successfully']);
    }
}
