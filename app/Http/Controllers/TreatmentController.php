<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\TreatmentTask;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatments = Treatment::all('id', 'image_path', 'title', 'views');
        return response()->json(['treatments' => $treatments], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatment = Treatment::find($id);
        $treatment->tasks = TreatmentTask::where('treatment_id', $id)->get();

        return response()->json(['treatment' => $treatment], Response::HTTP_OK);
    }

    public function read(Treatment $treatment)
    {
        $treatment->increment('views', 1);

        return response()->json(['success' => true], Response::HTTP_OK);
    }
}
