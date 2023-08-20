<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.job.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jobtitle' => 'required|string|max:255',
            'jobspesialis' => 'nullable|string|max:255',
            'jobdeskripsion' => 'nullable|string',
            'jobrecuire' => 'nullable|string',
            'jobImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $job = $validatedData;
        $job['jobDateAdd'] = now();

        $jobId = DB::table('jobs')->insertGetId($job);
        $newJob = DB::table('jobs')->where('jobID', $jobId)->first();

        if ($request->hasFile('jobImage')) {
            $file = $request->file('jobImage');
            $path = $file->store('job_images', 'public');
            DB::table('jobs')->where('jobID', $jobId)->update(['jobImage' => $path]);
            $newJob->jobImage = $path;
        }

        return response()->json(['message' => 'Job Inserted Successfully']);
    }

    public function getAll()
    {
        $jobs = DB::table('jobs')->get();
        return response()->json($jobs);
    }

    public function destroy($id)
    {
        $job = DB::table('jobs')->where('jobID', $id)->first();

        if ($job) {
            DB::table('jobs')->where('jobID', $id)->delete();
            return response()->json(['message' => 'Job deleted successfully']);
        } else {
            return response()->json(['message' => 'Job not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $job = DB::table('jobs')->where('jobID', $id)->first();
        if ($job) {
            // Validate the updated data (modify as needed)
            $validatedData = $request->validate([
                'jobtitle' => 'required|string|max:255',
                'jobspesialis' => 'nullable|string|max:255',
                'jobdeskripsion' => 'nullable|string',
                'jobrecuire' => 'nullable|string',
                'jobImage' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            if ($request->hasFile('jobImage')) {
                // Delete the old image if it exists
                if ($job->jobImage) {
                    Storage::delete('public/job_images/' . $job->jobImage);
                }

                // Upload and store the new image
                $imagePath = $request->file('jobImage')->store('public/job_images');
                $validatedData['jobImage'] = 'job_images/'.basename($imagePath);
            }

            // Create an array with the fields to update
            $updateData = [
                'jobtitle' => $validatedData['jobtitle'],
                'jobspesialis' => $validatedData['jobspesialis'],
                'jobdeskripsion' => $validatedData['jobdeskripsion'],
                'jobrecuire' => $validatedData['jobrecuire'],
            ];

            // Add jobImage if it exists in the validated data
            if (isset($validatedData['jobImage'])) {
                // dd('sini');
                $updateData['jobImage'] = $validatedData['jobImage'];
            }

            // Update the record in the database
            DB::table('jobs')->where('jobID', $id)->update($updateData);

            return response()->json(['message' => 'Job Updated Successfully']);
        } else {
            return response()->json(['message' => 'Job not found'], 404);
        }
    }

    public function getOne($id)
    {
        $job = DB::table('jobs')->where('jobID', $id)->first();
        return response()->json($job);
    }

}
