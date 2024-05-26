<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the attendance records.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $attendances = Attendance::all();

        return Inertia::render('Attendance/Index', [
            'attendances' => $attendances,
        ]);
    }

    /**
     * Show the form for creating a new attendance record.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Attendance/Create');
    }

    /**
     * Store a newly created attendance record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'status' => 'required|in:present,absent',
            'date' => 'required|date',
        ]);

        Attendance::create([
            'employee_id' => $validatedData['employee_id'],
            'status' => $validatedData['status'],
            'date' => $validatedData['date'],
        ]);

        return Redirect::route('attendances.index');
    }

    /**
     * Show the form for editing the specified attendance record.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);

        return Inertia::render('Attendance/Edit', [
            'attendance' => $attendance,
        ]);
    }

    /**
     * Update the specified attendance record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:present,absent',
            'date' => 'required|date',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->status = $validatedData['status'];
        $attendance->date = $validatedData['date'];
        $attendance->save();

        return Redirect::route('attendances.index');
    }

    /**
     * Remove the specified attendance record from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return Redirect::route('attendances.index');
    }
}
