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
   
    }
</style>

<div class="links">
    <a href="{{route('client.create')}}">Sukurti naują sąskaitą</a>
    <br>
    <a href="{{route('client.index')}}">Peržiūrėti sąskaitų sąrašą</a>
</div>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>Vardas</th>
        <th>Pavardė</th> 
        <th>Sąskaita</th>
        <th>Lešos</th>
        <th>Veiksmai</th>
    </div>
</tr>
<tr>
    <td>{{$client->name}}</td>
    <td>{{$client->surname}}</td>
    <td>{{$client->IBAN}}</td>
    <td>{{$client->lesos}} €</td>
    <td>
    <form action="{{route('client.updateAdd',[$client->id])}}" method="POST">
        <input type="hidden" name="ID" value="'.$user['ID'].'" readonly>
        <input type="number" step="0.01" name="client_prideti" value="" placeholder="Įveskite norimą sumą">
        @csrf
        <button  class="btn btn-primary" type="submit">Pridėti</button>
    </form>
</td>
    </tr>
</thead>
  
</table>
