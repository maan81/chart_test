$(function(){

    // $('form').submit(function(e){
    $('#submit_form').validator().on('submit', function (e) {

        if(e.isDefaultPrevented()){
            console.log('invalid')
            return false;
        }

        e.preventDefault();

        var post_url = 'http://localhost:8080/';
        var post_data = $(this).serialize();

        $.post(post_url,post_data)
            .done(function(data){
                data = JSON.parse(data)
                // console.log(data);
                console.log(data.number)

                var barChartData = {
                    labels : data.number,
                    datasets : [
                        {
                            fillColor   : "rgba(151,187,205,0.5)",
                            strokeColor : "rgba(151,187,205,0.8)",
                            highlightFill : "rgba(151,187,205,0.75)",
                            highlightStroke : "rgba(151,187,205,1)",
                            data : data.count
                        }
                    ]
                };

                var ctx = document.getElementById("canvas").getContext("2d");

                $('#result').removeClass('hide');
                $('#canvas').width($('#result').width());

                new Chart(ctx).Bar(barChartData);

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

