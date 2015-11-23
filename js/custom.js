$(function(){


    $('#submit_form').validator().on('submit', function (e) {

        if(e.isDefaultPrevented()){
            console.log('invalid')
            return false;
        }

        e.preventDefault();

        var post_url  = 'http://localhost:8080/',
            post_data = $(this).serialize(),
            $canvas   = $('#canvas');


        function reset_chart(){
            $canvas.data('chart').destroy();
            $canvas.removeData('chart');
        }

        $.post(post_url,post_data)
            .done(function(data){
                data = JSON.parse(data)
                // console.log(data);
                console.log(data.number)

                var barChartData = {
                    labels : data.number,
                    datasets : [
                        {
                            fillColor   :   "rgba(151,187,205,0.5)",
                            strokeColor :   "rgba(151,187,205,0.8)",
                            highlightFill : "rgba(151,187,205,0.75)",
                            highlightStroke:"rgba(151,187,205,1)",

                            data : data.count
                        }
                    ]
                };

                var result = $('#result'),
                    new_chart,
                    ctx;

                if(typeof($canvas.data('chart')) !== 'undefined' ){
                    $canvas.data('chart').destroy();
                    $canvas.removeData('chart');
                }

                ctx = document.getElementById("canvas").getContext("2d");

                result.removeClass('hide');
                $('hr').removeClass('hide');
                $canvas.width(result.width());

                new_chart = new Chart(ctx).Bar(barChartData);
                $canvas.data('chart',new_chart);

            })
            .fail(function(data){
                console.log('!!!???!!');

                if(typeof($canvas.data('chart')) !== 'undefined' ){
                    $canvas.data('chart').destroy();
                    $canvas.removeData('chart');
                }
            });

    });

})

