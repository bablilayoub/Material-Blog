<?php

// get posts
$posts_total = number_posts($conn,$query);
$posts_total_week = number_posts_week($conn,$query);

// get comments
$posts_comments = number_comments($conn,$query);
$posts_comments_week = number_comments_week($conn,$query);

// get views
$views = views($conn,$query);

// get users
$users = number_users($conn,$query);
