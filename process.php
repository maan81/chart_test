<?php if(!defined('ENTRY')) die('Invalid URL');

// print_r($_POST);

// validate ...
// process ...
// return result

/*

    - generate empty main data holder

    - repeat for number of draws

        -- generate empty data holder

        -- repeat for every row

            --- generate new set of balls

            --- repeat for every draw

                ---- extract a random unused ball from the current set of balls

                ---- push the ball into the current set of balls

            --- push the set of balls into the main data holder



    - generate empty output data

    - from the main data holder, repeat for each row

        -- repeat for each ball

            --- count the numbe of times the ball has been used
                & add 1 to the count

    - sort data according to the times it is drawn

    - return data
*/


//---------------------------------
// serverside validation

    // validate fn
    function valid($num,$min,$max){
        if( ($num>=$min) && ($num<=$max) )
            return true;
        return false;
    }

    $numbers_in_pool = (int)$_POST['numbers_in_pool'];
    $drawn_numbers   = (int)$_POST['drawn_numbers'];
    $number_of_draws = (int)$_POST['number_of_draws'];
    $output          = (int)$_POST['output'];

    if( !valid($numbers_in_pool,1,100) ||
        !valid($drawn_numbers,1,10)    ||
        !valid($number_of_draws,1,9999)||
        !valid($output,1,100)
    ){
        echo 'false';
        die;
    }

//---------------------------------


//---------------------------------
// process

    // generate empty main data holder
    $main_data_holder = [];

    // repeat for number of draws
    for($i=0;$i<$number_of_draws;$i++){

        $row_holder = [];

        // repeat for every row
        for($j=0;$j<$drawn_numbers;$j++){

            // extract a random unused ball from the current set of balls
            do{
                $ball = mt_rand(0,$numbers_in_pool);
            }while(in_array($ball, $row_holder));

            // push the ball into a row holder
            $row_holder[] = $ball;
        }

        // push row holder into main data holder
        $main_data_holder[] = $row_holder;

    }


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

    // sort balls according to number of times it is drawn
    arsort($output_data);
    $output_data = array_slice($output_data, 0, $output,true);
//---------------------------------


//---------------------------------
// return array of result

    echo json_encode(
        [
            'number'=> array_keys($output_data),
            'count' => array_values($output_data)
        ]
    );
//---------------------------------
