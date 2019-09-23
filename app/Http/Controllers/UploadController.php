<?php

namespace App\Http\Controllers;

use App\upload;
use Illuminate\Http\Request;

use Smalot\PdfParser\Parser;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Upload::all();
        return view('upload', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $input  = $request->except('upload');
    //     $file = $request->upload;
    //     $uniqueFileName = uniqid() . '.pdf';
    //     \File::put(public_path('files'). '/' . $uniqueFileName, $file);
    //     $input['upload'] = $uniqueFileName;
    //     Upload::create($input);
    //     // $success = "File uploaded successfully";
    //     return redirect()->back();
    // }
    public function store(Request $request)
    {
        $input  = $request->except('upload');
        $file = $request->upload;
        $uniqueFileName = $file->getClientOriginalName();
        $path = public_path('files');
        $request->file('upload')->move($path,$uniqueFileName);
        $input['upload'] = $uniqueFileName;
        Upload::create($input);
        // $success = "File uploaded successfully";
        return redirect()->back()->with('success','Image Upload successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(upload $upload)
    {
        $file = public_path('files').'/'.$upload->upload;
        // dd($file);
        // $file = "sample.pdf";
        $PDFParser = new Parser();
        $pdf = $PDFParser->parseFile($file);
        $pages  = $pdf->getPages();
        $totalPages = count($pages);
        $currentPage = 1;
        $text = "";
        foreach ($pages as $page) {
            $text .= "<h3>Page $currentPage/$totalPages</h3> </br>";
            $text .= $page->getText();
            $currentPage++;
        }
        return view('show')->with('text', $text);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(upload $upload)
    {
        $upload->delete();
        return redirect()->back()->with('message', 'You have deleted File successfully');
    }
}
