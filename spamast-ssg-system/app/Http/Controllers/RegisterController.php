<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Show the registration form
    public function index()
    {
        return view('register');
    }

    // Handle form submission and save student
    public function store(Request $request)
    {
        // Validate the inputs
        $validated = $request->validate([
            'student_id'     => 'required|string|max:50|unique:students,student_id',
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:students,email',
            'password'       => 'required|string|min:8|confirmed',
            'course'         => 'nullable|string|max:100',
            'year_level'     => 'nullable|string|max:50',
            'contact_number' => 'nullable|string|max:20',
        ]);

        // Save the student to the database
        Student::create([
            'student_id'     => $validated['student_id'],
            'name'           => $validated['name'],
            'email'          => $validated['email'],
            'password'       => $validated['password'],
            'course'         => $validated['course'] ?? null,
            'year_level'     => $validated['year_level'] ?? null,
            'contact_number' => $validated['contact_number'] ?? null,
        ]);

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
