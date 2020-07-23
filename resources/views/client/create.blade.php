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

@section('content')
<div class="links">
    <a href="{{route('client.index')}}">Peržiūrėti sąskaitų sąrašą</a>
</div>


<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Įveskite duomenis</div>
               <div class="card-body">

               <form action="{{route('client.store')}}" enctype="multipart/form-data" method="post">
                <div class = "input">
                    <label for="name"> Vardas: <br>
                        <input type="text" name="client_name" required> <br>
                    </label> 
                </div>
                <div class = "input">
                    <label for="surname"> Pavardė: <br>
                        <input type="text" name="client_surname" required> <br>
                    </label>
                </div>  
                <div class = "input">
                    <label for="personal_code"> Asmens kodas:  <br>
                        <input type="number" name="client_personal_code" required><br>
                    </label>
                </div>  
            
                @csrf
                <button class="btn btn-primary" type="submit" name = "action">Sukurti saskaitą</button>
            </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
 