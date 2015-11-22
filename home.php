<?php if(!defined('ENTRY')) die('Invalid URL');?>
<!doctype html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
            integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
            crossorigin="anonymous"> -->

    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<div class="container">
    <form role="form" class="submit_form" data-toggle="validator" role="form">

        <div class="form-group">
            <label for='total'>Numbers in Pool</label>
            <input type='number' name='total' id='total' class='form-control'
                    placeholder="Integers, 1 to 100 only" required min='1' max='100'>
        </div>

        <div class="form-group">
            <label for='per_draw'>Drawn Numbers</label>
            <input type='number' name='per_draw' id='per_draw' class='form-control'
                    placeholder="Integers, 1 to 10 only" required min='1' max='10'>
        </div>

        <div class="form-group">
            <label for='repeat_draws'>Number of Draws</label>
            <input type='number' name='repeat_draws' id='repeat_draws' class='form-control'
                    placeholder="Integers, 1 to 9999 only" required min='1' max='9999'>
        </div>

        <button id='submit' class='btn btn-primary'>Submit</button>

    </form>


    <div class='result hide'></div>
</div>


<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js">
</script> -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
        integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
        crossorigin="anonymous"></script> -->

<script type="text/javascript" src='js/validator.min.js'></script>
<!-- <script type="text/javascript" 
        src='http://1000hz.github.io/bootstrap-validator/dist/validator.min.js'></script> -->


<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>