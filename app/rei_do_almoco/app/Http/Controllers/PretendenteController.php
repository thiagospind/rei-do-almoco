<?php

namespace App\Http\Controllers;

use App\Pretendente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PretendenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pretendente = Pretendente::paginate(10);
        return view('listaPretendente',compact('pretendente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pretendente');
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

        $pretendente = new Pretendente();

        try {
            DB::beginTransaction();

            $pretendente->name = $request->input('name');
            $pretendente->email = $request->input('email');
            $timestamp = Carbon::now()->timestamp;
            $ext = $request->picture->getClientOriginalExtension();
            $picture = $timestamp.'.'.$ext;
            $request->picture->storeAs('pictures',$picture);
            $pretendente->picture = $picture;
            $pretendente->save();
            DB::commit();
            return redirect('/pretendentes');
        } catch(\Exception $exception){
            if(is_file('/storage/app/picture/$picture')) {
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
            'email' => 'required|email',
            'picture' => 'image|mimes:jpeg,bmp,png|max:2048'
        ];
    }
}
