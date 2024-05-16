<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
   public function index(){

        $viewData = [];
        $viewData['title'] = "Home page sito";
        return view('home.index')->with("viewData",$viewData);
    
    }
    public function browtf() {
        $viewData = [];
        $viewData['title'] = "Un nostalgico eh";
        $viewData['subtitle'] = "Magari";

        return view('home.silkroad')->with("viewData",$viewData);
    }
    public function about() {
        $viewData = [];
        $viewData['title'] = "Siamo una gang criminale";
        $viewData['subtitle'] = "Pagina di copertura per il nuovo silkroad";
        $viewData['description'] = "Questa pagina serve da copertura per il nuovo silkroad, non vediamo piante normali ma sono in realtà droghe sintetiche e non";
        $viewData['author'] = "";

        return view('home.about')->with("viewData",$viewData);
    
    }
}