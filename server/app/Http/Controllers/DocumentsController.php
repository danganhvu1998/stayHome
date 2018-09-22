<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    //
    public function englishDocs(){
        return view("docsCtrl.eng");
    }

    public function japaneseDocs(){
        return view("docsCtrl.jap");
    }
}
