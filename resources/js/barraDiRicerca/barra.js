function Test(){
}



function populate(){
    paroleItaliane.forEach(element => {
        const para = document.createElement("label");
        para.setAttribute("hidden",true);
        const node = document.createTextNode(element);
        para.appendChild(node);
        const div1 = document.getElementById("id1");
        div1.appendChild(para);
        div1.appendChild(document.createElement("br"))
    
    });
}

function matchText(){
    var Barra = document.getElementById('BarraDiRicerca');
    var BarraDiRicerca = Barra.addEventListener('input',function(){
        parolaDaConfrontare = Barra.value.toLowerCase();
        var parolePossibili = paroleItaliane.filter(parola => parola.startsWith(parolaDaConfrontare)) //Controlla se la parola inizia per quello che abbiamo iniziato a scrivere
        if(parolePossibili.length === 0){ //Restituisce un array, se la lunghezza è 0 non ha trovato la parola 
            console.log( "Nessuna parola trovata");
        }else if(parolePossibili === 1){ //Se restituisce 1 vuol dire che la parola è quella che cerchiamo
            console.log("La parola che cerchi è" + parolePossibili[0]);
        }else{ //Qua elenca tutte le parole possibili
            console.log("Le parole possibili sono: " + parolePossibili);
        }
    });
}