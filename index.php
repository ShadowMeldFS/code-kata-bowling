<html>
<head>
    <meta charset="UTF-8">
    <title>Bowling | Code Kata | Cleveland PHP User Group</title>
</head>
<body>
<?php

    require_once 'game.php';

    // First PBA Career Millionaire
    $bowler = new game( 'Earl Anthony' );

    $bowler->bowl( [ 10, 0 ] );	//19
    $bowler->bowl( [ 5, 4 ] );	//28
    $bowler->bowl( [ 5, 4 ] );	//37
    $bowler->bowl( [ 10, 0 ] );	//47

    echo $bowler->score();

?>
</body>
</html>