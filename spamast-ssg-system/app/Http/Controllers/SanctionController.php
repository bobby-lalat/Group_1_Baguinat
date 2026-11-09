<?php

namespace App\Http\Controllers;

use App\Models\Sanction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SanctionController extends Controller
{
    public function index()
    {
        $sanctions = Sanction::latest()->paginate(10);

        return view('sanctions.index', compact('sanctions'));
    }

    public function create()
    {
        return view('sanctions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'string', 'max:50'],
            'student_name' => ['required', 'string', 'max:255'],
            'event_name' => ['required', 'string', 'max:255'],
            'sanction_type' => ['required', 'string', 'max:255'],
            'reason' => ['nullable', 'string'],
            'sanction_date' => ['nullable', 'date'],
            'status' => [
                'required',
                Rule::in(['pending', 'in_progress', 'completed']),
            ],
        ]);

        Sanction::create($validated);

        return redirect()
            ->route('sanctions.index')
            ->with('success', 'Sanction record created successfully.');
    }

    public function edit(Sanction $sanction)
    {
        return view('sanctions.edit', compact('sanction'));
    }

    public function update(Request $request, Sanction $sanction)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'string', 'max:50'],
            'student_name' => ['required', 'string', 'max:255'],
            'event_name' => ['required', 'string', 'max:255'],
            'sanction_type' => ['required', 'string', 'max:255'],
            'reason' => ['nullable', 'string'],
            'sanction_date' => ['nullable', 'date'],
            'status' => [
                'required',
                Rule::in(['pending', 'in_progress', 'completed']),
            ],
        ]);

        $sanction->update($validated);

        return redirect()
            ->route('sanctions.index')
            ->with('success', 'Sanction record updated successfully.');
    }
}