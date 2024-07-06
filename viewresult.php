<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULT</title>
    <body>
        <center><h1 id="topic">RESULT</h1></center>
    </body>
    <style>
        #topic
        {
            color:brown;
            margin-top:20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr.winner {
            background-color: #ffff99; /* Highlight color for the winner */
        }
        #candidate-chart {
            width: 50%; /* Adjust the width as needed */
            height: 200px; /* Adjust the height as needed */
        }
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        #candidate-table {
            animation: fade-in 0.5s ease-in-out;
        }
    </style>
</head>
<body>

<?php
include("db1.php"); // Include your database connection file

// Query to fetch candidate data ordered by total votes in descending order
$query = "SELECT * FROM candidate ORDER BY total DESC";
$result = mysqli_query($conn, $query);

// Check if there are any candidates
if(mysqli_num_rows($result) > 0) {
    // Start building the table markup
    echo "<table id='candidate-table'>";
    echo "<tr><th>Candidate ID</th><th>Name</th><th>Total Votes</th></tr>";

    // Fetch data for each candidate and display in rows
    $firstRow = true; // Flag to track the first row (winner)
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr";
        if ($firstRow) {
            echo " class='winner'"; // Add 'winner' class to the first row (winner)
            $firstRow = false; // Set the flag to false after the first row
        }
        echo ">";
        echo "<td>" . $row['cand_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['total'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    // Handle the case where no candidates are found
    echo "No candidates found.";
}
?>

<canvas id="candidate-chart"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Add animation to candidate table
    var tableRows = document.querySelectorAll("#candidate-table tr");
    tableRows.forEach(function(row, index) {
        row.style.animationDelay = index * 0.1 + "s";
        row.classList.add("fade-in");
    });

    // Create a basic bar chart
    var candidateNames = [];
    var candidateVotes = [];
    <?php
    // Reset data pointer
    mysqli_data_seek($result, 0);
    // Fetch data for each candidate and push to arrays
    while($row = mysqli_fetch_assoc($result)) {
        echo "candidateNames.push('" . $row['name'] . "');";
        echo "candidateVotes.push(" . $row['total'] . ");";
    }
    ?>

    var ctx = document.getElementById("candidate-chart").getContext("2d");
    var candidateChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: candidateNames,
            datasets: [{
                label: 'Total Votes',
                data: candidateVotes,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            layout: {
                padding: {
                    top: 10,
                    bottom: 10
                }
            },
            responsive: false // Ensure the chart doesn't resize to fit its container
        },
        // Set width and height directly here
        width: 400,
        height: 200
    });
});
</script>

</body>
</html>
