<?php

namespace App\Http\Controllers;

use App\Models\Assistence;
use App\Models\Logistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssistenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->id_roles == 1) {
            $logistic = Logistic::where('id_users', $user->id)->first();
            $assistences = Assistence::where('id_logistics', $logistic->id)->where('status','!=','4')->get();
        }else{
            $assistences = Assistence::all();
        }
        return view('assistences.index', compact('assistences', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('assistences.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->id_logistics;
        $logistic = Logistic::where('id_users','=',$request->id_logistics)->first();
        $request['id_logistics'] = $logistic->id;
        $validatedData = $request->validate([
            'id_events' => 'required|integer|exists:events,id',
            'id_logistics' => 'required|integer|exists:logistics,id',
        ]);



        $assistence = new Assistence();
        $assistence->hour = Carbon::now();
        $assistence->status = 1;
        $assistence->id_events = $request->id_events;
        $assistence->id_logistics = $request->id_logistics;
        $assistence->save();

        return redirect(route('assistences.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        if ($user->id_roles == 1) {
            $logistic = Logistic::where('id_users', $user->id)->first();
            $assistences = Assistence::where('id_logistics', $logistic->id)->where('status', '4')->get();
        }else{
            $assistences = Assistence::all();
        }
        return view('assistences.show', compact('assistences', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assistence = Assistence::find($id);
        $user = Auth::user();
        return view('assistences.edit', compact('assistence', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assistence = Assistence::find($id);
        $assistence->name = $request->name;
        $assistence->save();

        return redirect(route('assistences.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assistence = Assistence::find($id);
        $assistence->delete();

        return redirect(route('assistences.index'));
    }
}
