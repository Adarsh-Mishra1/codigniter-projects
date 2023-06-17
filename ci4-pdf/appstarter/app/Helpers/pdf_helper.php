<?php

function htmlToPDF($data,$view,$folderName = null){
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view($view,$data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $output = $dompdf->output();

        //Giving File Name
        $file_name='print_out-'.date('dmy');
        //Checking if save to specific folder        
        if($folderName!==''){
                //$target_dir="././media/profile/".date('my')."/";
                $target_dir=WRITEPATH . 'uploads/'.$folderName;
                if(!file_exists($target_dir)){
                        mkdir($target_dir,0777);
                }             
                $filepath = WRITEPATH . 'uploads/'.$folderName.'/'.$file_name.'.pdf';
        }else{
                $filepath = WRITEPATH . 'uploads/'.$file_name.'.pdf';
        }

        //$filepath = WRITEPATH . 'uploads/doctors/'.$file_name.'.pdf';
        file_put_contents($filepath,$output);
        //file_put_contents('writable/uploads/doctors/Brochure.pdf',$output);
         $dompdf->stream('Print'); //Parameter to name the export pdf
}

?>