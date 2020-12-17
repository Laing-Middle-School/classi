<?php

#          __                _
#    _____/ /___ ___________(_)
#   / ___/ / __ `/ ___/ ___/ /
#  / /__/ / /_/ (__  |__  ) /
#  \___/_/\__,_/____/____/_/
#
#   Root Configuration File
#



class classiConfig {



public function get() {
    return [

        'important' => [
            'install-loc' => 'https://example.com',  # This should be set to where you go to access classi
        ],

        'customization' => [
            'name' => 'classi',  # The name classi shows and uses to refer to itself (not properly connected at this point in time)
        ],

    ];
}



}



 ###############################################################################################################
 ###############################################################################################################
 ## DO NOT GO PAST THIS POINT YOU COULD DESTROY AN INTERNAL CLASS REQUIRED FOR CLASSI TO FUNCTION PROPERLY!!! ##
 ###############################################################################################################
 ###############################################################################################################

    # P.S. No, it's not the type of class you're thinking of :)







class test extends classiConfig {



    public function config() {

        return parent::get()['important']['install-loc'];

    }



}
