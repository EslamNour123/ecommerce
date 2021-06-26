<?php

namespace App\Traits;



Trait ImageTraits{

    function ImageTraits($image,$folder){

        if(isset($image)){
            $file_extension =$image->getClientOriginalExtension();
            $file_name = rand(000,99999).'.'.$file_extension;
            $image->move($folder,$file_name);
            return $file_name;
        }
        else{
            return 'default.png';
        }
        
    }

}