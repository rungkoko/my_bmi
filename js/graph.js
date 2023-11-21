function calculateBMIAndAge() {
            var height = parseFloat(document.getElementById("height").value);
            var weight = parseFloat(document.getElementById("weight").value);
            var age = parseInt(document.getElementById("age").value);
    
            if (isNaN(height) || isNaN(weight) || isNaN(age)) {
                document.getElementById("bmiResult").textContent = "Please enter valid height, weight, and age.";
                return;
            }
    
            var bmi = weight / ((height / 100) * (height / 100));
            var bmiFormatted = bmi.toFixed(2);
    
            document.getElementById("bmiResult").textContent = "Your BMI is: " + bmiFormatted;
    
            var formData = new FormData();
            formData.append("height", height);
            formData.append("weight", weight);
            formData.append("bmi_result", bmiFormatted);
            formData.append("age", age);
    
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/bmi_data.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                }
            };
            
            xhr.send(formData);
        }

        let myChart; // Declare the myChart variable in a wider scope

        // Function to format timestamp into date
        function formatDate(timestamp) {
            const date = new Date(timestamp);
            const day = date.getDate();
            const month = date.getMonth() + 1; // Months are 0-indexed
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        }
        
        // Fetch and show chart function
        function fetchAndShowChart() {
            fetch('php/getData.php')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(entry => formatDate(entry.timestamp));
                    const weights = data.map(entry => entry.weight);
                    const heights = data.map(entry => entry.height);
                    const bmiResults = data.map(entry => entry.bmi_result);
                    const ages = data.map(entry => entry.age);
        
                    // Update the existing chart if it exists
                    if (typeof myChart !== 'undefined') {
                        myChart.data.labels = labels;
                        myChart.data.datasets[0].data = weights;
                        myChart.data.datasets[1].data = heights;
                        myChart.data.datasets[2].data = bmiResults;
                        myChart.data.datasets[3].data = ages;
                        myChart.update();
                    } else {
                        // Create the chart if it doesn't exist
                        const ctx = document.getElementById('myChart').getContext('2d');
                        myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: 'Weight',
                                        data: weights,
                                        borderColor: 'rgb(75, 192, 192)',
                                        tension: 0.1
                                    },
                                    {
                                        label: 'Height',
                                        data: heights,
                                        borderColor: 'rgb(137, 137, 137)',
                                        tension: 0.1
                                    },
                                    {
                                        label: 'BMI Result',
                                        data: bmiResults,
                                        borderColor: 'rgb(192, 75, 192)',
                                        tension: 0.1
                                    },
                                    {
                                        label: 'Age',
                                        data: ages,
                                        borderColor: 'rgb(75, 75, 192)',
                                        tension: 0.1
                                    }
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                animation: {
                                    duration: 1000,
                                    easing: 'easeInOutQuart'
                                }
                            }
                        });
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
        }
        
        // Assume you have a way to trigger this function when new data arrives
        function onDataArrival() {
            fetchAndShowChart();
        }
        
        