<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Swimmer;
use Illuminate\Http\Request;
use App\Models\User;

class SwimmerController extends Controller
{
    // Show all swimmers
   public function index(Request $request)
{
    $query = Swimmer::with('user');

    // Filter by name
    if ($request->filled('name')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->name . '%');
        });
    }

    // Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $swimmers = $query->get();

    return view('admin.swimmers.index', compact('swimmers'));
}


    // Edit a specific swimmer
    public function edit($id)
    {
        $swimmer = Swimmer::with('user')->findOrFail($id);
        return view('admin.swimmers.edit', compact('swimmer'));
    }

    // Update swimmer
    public function update(Request $request, $id)
    {
        $request->validate([
            'heart_rate' => 'required|integer|min:0',
            'hydration' => 'required|integer|min:0|max:100',
            'oxygen_level' => 'required|integer|min:0|max:100',
            'temperature' => 'required|numeric',
            'time_in_pool' => 'required|integer|min:0',
            'status' => 'required|in:normal,alert'
        ]);

        $swimmer = Swimmer::findOrFail($id);
        $swimmer->update($request->all());

        return redirect()->route('admin.swimmers.index')->with('success', 'Swimmer data updated successfully.');
    }

    public function create()
{
    $usersWithoutSwimmer = User::doesntHave('swimmer')->get();
    return view('admin.swimmers.create', compact('usersWithoutSwimmer'));
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'heart_rate' => 'required|integer|min:0',
        'hydration' => 'required|integer|min:0|max:100',
        'oxygen_level' => 'required|integer|min:0|max:100',
        'temperature' => 'required|numeric',
        'time_in_pool' => 'required|integer|min:0',
        'status' => 'required|in:normal,alert'
    ]);

    Swimmer::create($request->all());

    return redirect()->route('admin.swimmers.index')->with('success', 'Swimmer created successfully.');
}


public function destroy($id)
{
    $swimmer = Swimmer::findOrFail($id);
    $swimmer->delete();

    return redirect()->route('admin.swimmers.index')->with('success', 'Swimmer deleted successfully.');
}


}
