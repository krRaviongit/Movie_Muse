<?php
$conn = new mysqli("localhost", "root", "", "themovies_review");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$movie = $_GET['movie'] ?? 'Unknown';

// Fetch reviews sorted by latest
$sql = "SELECT username, rating, review FROM reviews WHERE movie_name = ? ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $movie);
$stmt->execute();
$result = $stmt->get_result();

// Function to convert rating to emoji
function ratingToEmoji($rating) {
    switch ($rating) {
        case 1: return "😠 (1)";
        case 2: return "😞 (2)";
        case 3: return "😐 (3)";
        case 4: return "🙂 (4)";
        case 5: return "🤩 (5)";
        default: return $rating;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Movie Reviews</title>
  <link rel="stylesheet" href="view_review.css">
</head>
<body>

  <h2 style="text-align:center; margin-top: 20px;">Reviews for <?php echo htmlspecialchars($movie); ?></h2>

  <div class="review-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='review-card'>";
            echo "<h3>" . htmlspecialchars($row['username']) . "</h3>";
            echo "<p class='rating'>" . ratingToEmoji($row['rating']) . "</p>";
            echo "<p class='review-text'>" . htmlspecialchars($row['review']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p style='text-align:center;'>No reviews found for this movie.</p>";
    }
    ?>
  </div>

</body>
</html>

<?php
$conn->close();
?>
