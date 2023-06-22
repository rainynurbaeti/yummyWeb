<?php

$conn = mysqli_connect("localhost", "root", "", "tugas1");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
    // Mengambil data dari database menjadi array asosiatif
}

function tambahData($data)
{
    global $conn;
    $email = htmlspecialchars($data["email"]);
    $impression = htmlspecialchars($data["impression"]);

    $query = "INSERT INTO contact (email, impression)
              VALUES ('$email', '$impression')";
    mysqli_query($conn, $query);

    // Apakah ada perubahan dalam database
    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM contact WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubahdata($data)
{
    global $conn;

    $id = $data["id"];
    $email = htmlspecialchars($data["email"]);
    $impression = htmlspecialchars($data["impression"]);

    $query = "UPDATE contact SET
              email = '$email',
              impression = '$impression'
              WHERE id = $id";

    mysqli_query($conn, $query);

    // Apakah ada perubahan dalam database
    return mysqli_affected_rows($conn); // Untuk mengembalikan angka -1 / 1
}

?>


