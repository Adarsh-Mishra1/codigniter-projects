<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {    
        $data = array(
            'title' => 'Adarsh',
            'profile' => 'Developer',
            'city' => 'Bengluru'
        );
        return view('pdf_view',$data);
    }

    function test(){
        helper('custom_helper');

        $data = array(
            'title' => 'Rahul',
            'profile' => 'Developer',
            'city' => 'Bengluru'
        );
        //Parameter(our array data,view_name,folder_name->optional)
        $output=htmlToPDF($data,'pdf_view');
    }

    function htmlToPDF(){
        $dompdf = new \Dompdf\Dompdf(); 
        $data = array(
            'title' => 'My Title',
            'heading' => 'My Heading',
            'message' => 'My Message'
        );
       
        $dompdf->loadHtml(view('pdf_view',$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('billing_report'); //Parameter to name the export pdf
    }
}
