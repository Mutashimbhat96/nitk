
$(document).ready(function() {
            

            
            $('#placed').click(function() {
                barChart.data.datasets[0].backgroundColor = "green";
                barChart.data.datasets[1].backgroundColor = "white";
                for (var i = 0; i < numbers1.length; i++) {
                    console.log(numbers1[i]);
                }
                fillData1(numbers1)
                barChart.update();
            });

            
            function fillData1(params) {
                for (var i = 0; i < params.length; i++) {
                    barChart.data.labels[i] = l[i];
                    barChart.data.datasets[0].data[i] = params[i];
                    barChart.data.datasets[0].backgroundColor[i] = "green";
                    console.log('Data:' + barChart.data.datasets[0].data[i]);
                }

            }

            function fillData2(params) {
                for (var i = 0; i < params.length; i++) {
                    barChart.data.labels[i] = l[i];
                    barChart.data.datasets[1].data[i] = params[i];
                    barChart.data.datasets[0].data[i] = numbers1[i];
                    barChart.data.datasets[1].backgroundColor[i] = "green";
                    console.log('Data:' + barChart.data.datasets[1].data[i]);
                }
            }
           
            $('#higher').click(function() {
                barChart.data.datasets[0].backgroundColor = "green";
                barChart.data.datasets[1].backgroundColor = "red";
                for (var i = 0; i < numbers2.length; i++) {
                    console.log(numbers2[i]);
                }
                fillData2(numbers2)
                barChart.update();
            });


            var ctx = $('#barChart');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["UG 2017", "UG 2018", "UG 2019", "PG 2017", "PG 2018", "PG 2019"],
                    datasets: [{
                        label: 'Placed in companies',
                        data: [86.4, 87.9, 87.9, 79.4, 84.4, 89.3

                        ],
                        backgroundColor: [],
                        borderColor: [],
                        borderWidth: 1
                    }, {
                        label: 'Higher Studies',
                        data: [0, 0, 0, 0, 0],
                        backgroundColor: [],
                        borderColor: [],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });