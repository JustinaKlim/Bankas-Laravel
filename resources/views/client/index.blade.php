@extends('layouts.app')

<style>
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .links{
        padding: 30px;
    }
</style>

<table class = "table">
    <thead class="thead-dark">
    <tr>
        <th>Vardas</th>
        <th>Pavardė</th> 
        <th>Sąskaita</th>
        <th>Asmens kodas</th>
        <th>Lėšos</th>
        <th>Veiksmai</th>
    

         @foreach ($clients as $client)
                <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->surname}}</td>
                    <td>{{$client->IBAN}}</td>
                    <td>{{$client->personal_code}}</td>
                    <td>{{$client->lesos}} €</td>
                    

    
                    <td>
                        <form action="{{route('client.destroy', [$client])}}" method="post"> 
                            @csrf
                        <button class="btn btn-secondary" type="submit" name="delete" value="'.$user['IBAN'].'">Ištrinti sąskaitą</button> 
                        </form>
                        <a href="{{route('client.add', [$client])}}">
                            @csrf
                           <input type="hidden" name="ID" value="'.$user['ID'].'"readonly>    
                            <button  class="btn btn-primary" type="submit" name="inesti">Įnešti lėšų</button>
                        </a>
                        <a href="{{route('client.minus', [$client])}}">
                            @csrf
                           <input type="hidden" name="ID" value="'.$user['ID'].'"readonly>    
                            <button  class="btn btn-primary" type="submit" name="nuimti">Nuimti lėšų</button>
                        </a>
                        
                    </td>
                </tr>
            </thead>
        

    @endforeach

    <div class="links">
        <a href="{{route('client.create')}}">Sukurti naują sąskaitą</a>
    </div>