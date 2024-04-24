<?php 
    /*
    Page Template: 404
    */ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body id="<?php the_ID();?>" <?php post_class();?>>
    <?php get_header( ); ?> 
    <div class="container">
            <h1>404 - Page Not Found</h1>
        <main>
            <p>Sorry, the page you're looking for could not be found.</p>
            <p>Perhaps you mistyped the URL, or the page has been removed.</p>
            <p>Try checking the URL for errors, or navigate back to our <a href="/">homepage</a>.</p>
        </main>
    </div>
    <?php get_footer( ); ?>
</body>
</html>
