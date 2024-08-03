<?php

                $movies = "SELECT * FROM `movie` WHERE `type` IN ('Anime') ORDER BY `id`";
                $query_movies = mysqli_query($conn, $movies);

                // ตรวจสอบคำสั่ง SQL
                // if (!$query_movies) {
                //     die("Query failed: " . mysqli_error($conn));
                // }
                // แสดงข้อมูลทั้งหมด
                // echo "<pre>";
                // while ($result_movies = mysqli_fetch_assoc($query_movies)) {
                //     print_r($result_movies);
                // }
                // echo "</pre>";

                while ($result_movies = mysqli_fetch_assoc($query_movies)) {

                    $title = $result_movies['movie_name'];
                    $image_id = $result_movies['id']; // ID ของรูปภาพ
                    $image_filename = $result_movies['img']; // ชื่อไฟล์ของรูปภาพ
                    $src_img = "img/$image_id/$image_filename";
                    $movie_link = $result_movies['details_link'];

                    echo "<div class='slide-movie'>";
                    echo "<div class='movie-list'>";

                    echo "<div class='movie-name'>";
                    echo "<img src='$src_img' alt='$title'><br>";
                    echo "</div>";

                    echo "<div class='movie-info'>";
                    echo "<a href='$movie_link'>$title</a>";
               
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                }

                ?>