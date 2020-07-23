<?php

namespace App\Http\Controllers;

use App\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $clients = Client::orderBy('surname')->get();

        return view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
       
            $client->name = $request->client_name;
            $client->surname = $request->client_surname;
            $client->personal_code = $request->client_personal_code;
            $client->IBAN = Client::generateIBAN();
            $client->lesos = 0;
            $client->USD = 0;
            $client->save();
        return redirect()->route('client.index')->with('success_message', 'Sąskaita sėkmingai sukurta.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->personal_code = $request->client_personal_code;
        $client->IBAN = Client::generateIBAN();
        $client->lesos = 0;
        $client->USD = 0;
        $client->save();
        return redirect()->route('client.index');
    }

    public function updateAdd(Request $request, Client $client)
    {
        if ($request->client_prideti > 0){
        $client->lesos += $request->client_prideti;
        $client->save();
        return redirect()->route('client.index')->with('success_message', 'Pinigai pridėti į sąskaitą.');
        }else {
            return redirect()->route('client.index')->with('alert_message', 'Įveskite sumą, didesnę už nulį.');
        }
    }

    public function updateMinus(Request $request, Client $client)
    {
        if ($request->client_nuimti <= $client->lesos && $request->client_nuimti > 0 ){
             $client->lesos -= $request->client_nuimti;
             $client->save();
            return redirect()->route('client.index')->with('success_message', 'Pinigai nurašyti nuo sąskaitos.');
        }else{
            return redirect()->route('client.index')->with('alert_message', 'Likutis negali būti mažesnis už nulį!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if($client->lesos > 0){
            return redirect()->route('client.index')->with('alert_message', 'Sąskaitos, kurioje yra pinigų, ištrinti negalima.');
            
        }
        $client->delete();
        return redirect()->route('client.index')->with('success_message', 'Sąskaita sėkmingai ištrinta.');
    }

    public function add(Client $client)
    {
        return view('client.add', ['client' => $client]);
    }

    public function minus(Client $client)
    {
        return view('client.minus', ['client' => $client]);
    }
}