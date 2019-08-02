<?php

namespace App\Http\Controllers;

use App\Candidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidate = Candidate::paginate(10);
        return view('listCandidate',compact('candidate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        $candidate = new Candidate();

        try {
            DB::beginTransaction();

            $candidate->name = $request->input('name');
            $candidate->email = $request->input('email');
            $timestamp = Carbon::now()->timestamp;
            $ext = $request->picture->getClientOriginalExtension();
            $picture = $timestamp.'.'.$ext;
            $request->picture->storeAs('public/pictures',$picture);
            $candidate->picture = $picture;
            $candidate->save();
            DB::commit();
            return redirect('/candidato');
        } catch(\Exception $exception){
            if(is_file('/storage/app/public/picture/$picture')) {
                Storage::delete($picture);
            }
            echo $exception;
            DB::rollBack();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rules(){
        return [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:candidate',
            'picture' => 'image|mimes:jpeg,bmp,png|max:2048'
        ];
    }
}
