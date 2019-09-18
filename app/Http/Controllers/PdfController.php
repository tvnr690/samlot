<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Smalot\PdfParser\Parser;

class PdfController extends Controller
{
    public function index()
    {
        // The relative or absolute path to the PDF file
        // $pdfFilePath = $this->get('kernel')->getRootDir() . '/../web/example.pdf';

        // Create an instance of the PDFParser
        $PDFParser = new Parser();

        // Create an instance of the PDF with the parseFile method of the parser
        // this method expects as first argument the path to the PDF file
        $pdf = $PDFParser->parseFile('test.pdf');

        // Extract ALL text with the getText method
        $text = $pdf->getText();

        // dd($text);
        // Send the text as response in the controller

        return view('pdf')->with('text', $text);
        // return view('pdf')->compact('text', $text);


    }
}
