$(function(){

    // $('form').submit(function(e){
    $('form').validator().on('submit', function (e) {

        if(e.isDefaultPrevented()){
            console.log('invalid')
            return false;
        }

        e.preventDefault();

        var post_url = 'http://localhost:8080/';
        var post_data = $(this).serialize();

        $.post(post_url,post_data)
            .done(function(data){
                console.log(data);
            })
            .fail(function(data){
                console.log('!!!???!!');
            });

    });

})







// var $total = $('#total'),
//     $per_draw = $('#per_draw'),
//     $repeat_draws = $('#repeat_draws'),
//     $submit_form = $('#submit'),

//     validate_total = function(){},
//     validate_per_draw = function(){},
//     validate_repeat_draw = function(){};


// // validate & submit
// $submit_form.validator().on('click',function(e){

//     // e.preventDefault();

//     if (e.isDefaultPrevented()) {

//         // handle the invalid form...

//         console.log('invalid');

//     } else {

//         // everything looks good!

//         var x = $(this).serialize();

//         console.log(x);
//     }



//     // validate_total();
//     // validate_per_draw();
//     // validate_repeat_draw();

//     // if(!validate_total() || !validate_per_draw() || !validate_repeat_draw()){
//     //     return false;
//     // }


//     // $.post(url,data)
//     //     .done(data,function(){

//     //     })
//     //     .fail(function(){

//     //     });
// });



// // // submit
// // $submit_form.click(function(e){

// //     e.preventDefault();

// //     var x = $(this).serialize();

// //     console.log(x);


// //     // validate_total();
// //     // validate_per_draw();
// //     // validate_repeat_draw();

// //     // if(!validate_total() || !validate_per_draw() || !validate_repeat_draw()){
// //     //     return false;
// //     // }


// //     // $.post(url,data)
// //     //     .done(data,function(){

// //     //     })
// //     //     .fail(function(){

// //     //     });
// // });

