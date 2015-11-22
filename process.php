<?php if(!defined('ENTRY')) die('Invalid URL');

// print_r($_POST);

// validate

// process

/*
    - generate empty main data holder

    - repeat for number of draws

        -- generate empty data holder

        -- repeat for every row

            --- generate new set of balls

            --- repeat for every draw

                ---- extract a random ball from the current set of balls

                ---- push it into a row holder

                ---- remove that ball from the current set of balls


            --- push the row holder into the data holder

        -- merge data holder into main data holder




    - generate empty output data

    - from the main data holder, repeat for each row

        -- repeat for each ball

            --- count the numbe of times the ball has been used

            --- add 1 to the count

        -- push ball => count into output data
*/

//---------------------------------
// to be validated

    $numbers_in_pool = $_POST['numbers_in_pool'];
    $drawn_numbers   = $_POST['drawn_numbers'];
    $number_of_draws = $_POST['number_of_draws'];
    $output          = $_POST['output']; 
//---------------------------------


     // generate empty main data holder
    $main_data_holder = [];

    // repeat for number of draws
    for($i=0;$i<$number_of_draws;$i++){

        $row_holder = [];

        // repeat for every row
        for($j=0;$j<$drawn_numbers;$j++){

            // extract a random ball from the current set of balls

            // push it into a row holder

            // remove that ball from the current set of balls

            $row_holder[] = mt_rand(0,$numbers_in_pool);

        }

        // -- merge data holder into main data holder
        $main_data_holder[] = $row_holder;

    }

// print_r($main_data_holder);
// die;


    // generate empty output data
    $output_data = [];

    // from the main data holder, repeat for each row
    foreach($main_data_holder as $row){

        // repeat for each ball
        foreach($row as $ball){

            if(empty($output_data[$ball])){
                $output_data[$ball] = 0;
            }


            // count the numbe of times the ball has been used
            // & add 1 to the count

            $output_data[$ball] += 1;

        }

    }

// print_r($output_data);
// die;



//------------------------------
// tmp data
    //     $output_data = [
    //         1  => 1,
    //         2  => 1,
    //         3  => 1,
    //         8  => 3,
    //         10 => 1,
    //         11 => 2,
    //         12 => 1,
    //         13 => 4,
    //         15 => 1,
    //         21 => 1,
    //         22 => 1,
    //         24 => 1,
    //         25 => 1,
    //         28 => 1,
    //         29 => 1,
    //         31 => 2,
    //         33 => 1,
    //         34 => 1,
    //         35 => 1,
    //         36 => 1,
    //         39 => 1,
    //         42 => 1,
    //         49 => 1,
    //     ];
//------------------------------

    arsort($output_data);

    // print_r($output_data);

    $output_data = array_slice($output_data, 0, $output,true);

    // print_r($output_data);

    echo json_encode(
        [
            'number'=> array_keys($output_data),
            'count' => array_values($output_data)
        ]
    );
