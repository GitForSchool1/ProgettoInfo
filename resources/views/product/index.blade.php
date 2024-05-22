@extends('layouts.app')
@section('title',$viewData['title'])
@section('subtitle',$viewData['subtitle'])
<link href="{{asset('css/styles.css') }}" rel="stylesheet">
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://kit.fontawesome.com/a1ff8f45a5.js" crossorigin="anonymous"></script>

<script>
    function createFormattedBody(element, divLinkProdotti, prodotti) {
        divLinkProdotti.appendChild(prodotti);
        var parolaIndice = items.indexOf(element) + 1;
        var newLink = document.createElement("a");
        newLink.href = "products/" + parolaIndice;
        newLink.textContent = element;
        divLinkProdotti.appendChild(newLink);
        
        // Aggiungi un linebreak per andare a capo
        var lineBreak = document.createElement('br');
        divLinkProdotti.appendChild(lineBreak); //Questo serve per aggiungere al tag altri tag
    }

    function checkWord(parolePossibili, divLinkProdotti, Barra) {
        divLinkProdotti.innerHTML = "";
        var prodotti = document.createElement("div");
        parolePossibili.forEach(element => {
            if (element.includes(Barra.value.toLowerCase())) {
                createFormattedBody(element, divLinkProdotti, prodotti);
            }
            if (Barra.value == "") {
                divLinkProdotti.innerHTML = "";
            }
        });
    }

    function initArray() { //Questa funzione serve per inizializzare un array facendo una richiesta alle api che abbiamo esposto
        var items = [];
        var array = fetch("http://127.0.0.1:8000/api/json/Products").then(response => {
            response.json().then(data => {
                data.forEach(element => {
                    items.push(element.name.toLowerCase()); //Mette nell'array tutte cose
                });
            });
        });

        return items;
    }

    const items = initArray();
    document.addEventListener("DOMContentLoaded", function() {
        let divLinkProdotti = document.getElementById('linkProdotti');
        let Barra = document.getElementById('search');

        Barra.addEventListener('input', function() { //Quando si sta digitando qualcosa questa funzione prende vita
            checkWord(items, divLinkProdotti, Barra);
        });

        Barra.addEventListener('keydown', function(event) { //Questo serve per controllare se l'utente ha premuto il tasto "ENTER"
            if (event.key === 'Enter') {
                const links = divLinkProdotti.getElementsByTagName('a');
                if (links.length === 1) {
                    window.location.href = links[0].href; //Questo serve per reindirizzare l'utente restando sulla stessa pagina
                }
            }
        });
    });

    function lens(){
        var t = document.getElementById("linkProdotti");
        window.location.href = t.getElementsByTagName('a')[0];
    }

</script>

    <div class="row">
        <div class="col-md-11">
            <input type="text" name="search" id="search" placeholder="Inserisci l'oggetto da cercare" class="form-control" onfocus="this.value=''">
        </div>
        <div class="col-md-1">
            <button class="fa-solid fa-magnifying-glass" onclick="lens()"></button>
        </div>
    </div>


<div class="row">
    <div class="col-md-11">
        <div class="linkProdotti" id="linkProdotti"></div>
        <br>
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