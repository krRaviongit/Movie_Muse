<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "You must be logged in to submit a review.";
    exit();
}

$conn = new mysqli("localhost", "root", "", "themovies_review");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['user'];
$movie = $_POST['movie'];
$rating = $_POST['rating']; // will receive emoji now
$review = $_POST['comment']; // assuming the textarea is named 'comment'

// Insert the review
$stmt = $conn->prepare("INSERT INTO reviews (username, movie_name, rating, review) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $movie, $rating, $review);

if ($stmt->execute()) {
    echo "<div id='successMsg'>Review submitted successfully!</div>
    <script>
      setTimeout(() => {
        const msg = document.getElementById('successMsg');
        if (msg) msg.style.display = 'none';
      }, 3000);
    </script>";
} else {
    echo "Error inserting review: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
