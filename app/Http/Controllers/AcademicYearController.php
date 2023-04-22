<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears =  AcademicYear::all()->where('deleted', false)->values();
        if($academicYears) {
            return response()->json($academicYears, 200);
        } else {
            return response()->json(['message' => 'No academic years found'], 404);
        }
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'start_year' => 'required|string|unique:academic_years,start_year',
            'end_year' => 'required|string|unique:academic_years,end_year',
        ]);

        $academicYear = AcademicYear::create($fields);

        if($academicYear) {
            return response()->json(['message' => 'Academic year created successfully', 'data' => $academicYear], 200);
        } else {
            return response()->json(['message' => 'Academic year not created'], 500);
        }
    }

    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $fields = $request->validate([
            'start_year' => 'required|string|unique:academic_years,start_year',
            'end_year' => 'required|string|unique:academic_years,end_year',
        ]);

        $academicYear = AcademicYear::where('id', $request->id);
        if($academicYear) {
            $academicYear->update($fields);
            return response()->json(['message' => 'Academic year updated successfully', 'data' => $academicYear], 200);
        } else {
            return response()->json(['message' => 'Academic year not found'], 404);
        }
    }

    public function destroy(Request $request)
    {
        $academicYear = AcademicYear::where('id', $request->id);
        if($academicYear->count() > 0) {
            $academicYear->update(['deleted' => true]);
            return response()->json(['message' => 'Academic year deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Academic year not found'], 404);
        }
    }
}
