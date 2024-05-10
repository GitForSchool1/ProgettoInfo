@extends('layouts.app')
@section('title',$viewData['title'])
@section('subtitle',$viewData['subtitle'])
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<div class="row">
    <input type="text" name="search" id="search" placeholder="Inserisci l'oggetto da cercare" class="form-control" onfocus="this.value=''">
</div>
    <script>

        function createFormattedBody(element,divLinkProdotti,lineBreak,prodotti){
            var parolaIndice = items.indexOf(element)+1;
            var newLink = document.createElement("a");
            newLink.href = "products/" + parolaIndice;
            newLink.textContent = element;
            divLinkProdotti.appendChild(prodotti,divLinkProdotti);
            divLinkProdotti.appendChild(newLink);
            divLinkProdotti.appendChild(lineBreak);
        }
        function checkWord(parolePossibili,divLinkProdotti,Barra){
            divLinkProdotti.innerHTML = "";
            const lineBreak = document.createElement('br');
            var prodotti = document.createElement("div");
            parolePossibili.forEach(element => {
                if(element.includes(Barra.value.toLowerCase())){
                    createFormattedBody(element,divLinkProdotti,lineBreak,prodotti);
                }
                if(Barra.value == ""){
                   divLinkProdotti.innerHTML = "";
                }
            });
        }

        /*
        function checkWord(parolePossibili,divLinkProdotti,Barra){
            const lineBreak = document.createElement('br');
            if(parolePossibili.length === 0){ //Restituisce un array, se la lunghezza è 0 non ha trovato la parola 
                
            }else if(parolePossibili === 1){ //Se restituisce 1 vuol dire che la parola è quella che cerchiamo
            
            }else{
                while(divLinkProdotti.firstChild){
                    divLinkProdotti.removeChild(divLinkProdotti.firstChild);
                }
                var prodotti = document.createElement("div");
                parolePossibili.forEach(element => {
                    createFormattedBody(element,divLinkProdotti,lineBreak,prodotti);
                });
            }
            if(Barra.value.length == ""){
                divLinkProdotti.innerHTML = "";
            }
        }
*/
        function initArray(){
            var items = []
            var array = fetch("http://127.0.0.1:8000/api/json/Products").then(response => {
                response.json().then(data=>{
                    data.forEach(element => {
                        items.push(element.name.toLowerCase());
                    });
                });
            })

            return items;
        }
        const items = initArray();
        document.addEventListener("DOMContentLoaded", function() {
            let divLinkProdotti = document.getElementById('linkProdotti');
            let Barra = document.getElementById('search');
            var BarraDiRicerca = Barra.addEventListener('input',function(){
            checkWord(items,divLinkProdotti,Barra);
            });
    });
    </script>


<div class="row">
    <div class="linkProdotti" id="linkProdotti">
    </div>

    @foreach($viewData['products'] as $product)
    <div class = "col-md-4 mb-2">
        <div class = "card">
            <img src = "{{asset('/storage/'.$product->getImage()) }}" class = "card-img-top img-card">
            <div class = "card-body text-center">
                <a href = "{{route('product.show',['id'=>$product["id"]])}}"
                    class = "btn bg-secondary text-white">{{$product->getName()}}</a>
                </div>
            </div>    
        </div>
    @endforeach
</div>
@endsection