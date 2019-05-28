<?php

/*=============================================================
=            Brians Awesome Header Image Function             =
=============================================================*/

function get__header__image() {
     if(!is_front_page()) { 
        $x = "";
        $rows = get_field('header_sections', 'option');
        if($rows)
        {
            foreach($rows as $row)
            {
                if (is_tree($row['page_parent'])) {
                    $x = $row['header_images'];
                }
            }
        }
        if($x >= 1) {
            echo 'data-parent="' . $row['page_parent'] .'" ';
            $randImage    = '';
            $repeater        = $x;
            $rand                = rand( 0, ( count($repeater) - 1 ) );
            $randImage    = $repeater[$rand]['image'];
            echo 'data-src="' . $randImage . '"';
        }
        else {
            $defaultRandImage    = '';
            if ( !empty( get_field( 'default_images' , 'option' ) ) ) {
                $defaultRepeater        = get_field( 'default_images' , 'option' );
                $defaultRand                = rand( 0, ( count($defaultRepeater) - 1 ) );
                $defaultRandImage    = $defaultRepeater[$defaultRand]['image'];
                
                // $defaultRandName    = $defaultRepeater[$defaultRand]['patient_name'];
                // $defaultRandTag    = $defaultRepeater[$defaultRand]['patient_tag'];

            }
            // echo 'style="background-image:url(' . $defaultRandImage . ')" ';

            // Enable Lazy Loading on Header Images 
            echo 'data-src="'. $defaultRandImage . '"';
            // $directParent = $post->post_parent;
            // echo 'data-ID="' . $directParent . '"';

            // echo 'data-name="' . $defaultRandName . '" ';
            // echo 'data-tag="' . $defaultRandTag . '" ';

        }
    }
}