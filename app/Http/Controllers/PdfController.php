<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Smalot\PdfParser\Parser;

class PdfController extends Controller
{
    public function index()
    {
        $PDFParser = new Parser();
        $pdf = $PDFParser->parseFile('sample.pdf');
        $pages  = $pdf->getPages();
        $totalPages = count($pages);
        $currentPage = 1;
        $text = "";
        foreach ($pages as $page) {
            $text .= "<h3>Page $currentPage/$totalPages</h3> </br>";
            $text .= $page->getText();
            $currentPage++;
        }

        return view('pdf')->with('text', $text);
        // return view('pdf')->compact('text', $text);


    }
}
