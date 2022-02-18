<?php

namespace App\Http\Controllers;

use App\Models\Corretor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CorretorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Corretor::firstOrCreate(['users_id' => Auth::user()->id]);
        return Inertia::render('Admin/Corretor/Index', ['corretor' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        Validator::make(array(
            'corretor_creci' => $request['corretor_creci'],
            'corretor_contato' => $request['corretor_contato'],
            'corretor_bio' => $request['corretor_bio'],
        ), [
            'corretor_creci' => ['required'],
            'corretor_contato' => ['required'],
            'corretor_bio' => ['nullable']
        ])->validateWithBag('updateProfileExtraInformation');

        $message = 'Dados extra do perfil do Corretor Atualizado';
        $error = false;
        try {
            Corretor::where('users_id', $id)->update(array(
                'corretor_creci' => $request['corretor_creci'],
                'corretor_contato' => $request['corretor_contato'],
                'corretor_bio' => $request['corretor_bio']
            ));
        } catch (Exception $e) {
            $error = true;
            $message = $e->getMessage();
        }
        
        return redirect()->route('dashboard')->with($error ? 'error' : 'message', $message);
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
}
