<html>
<head>
<title>3 PHP</title>
</head>
<body>
<form method="post">
<table border="0">
<tr>
<td> <input type="text" name="name" value="" placeholder="Enter string"/> </td>
</tr>
<tr>
<td> <input type="submit" name="submit" value="Submit"/> </td>
</tr>
</table>
</form>
<?php
    if(isset($_POST['submit']))
    {
    $n = $_POST['name'];

    //panjang
    $length = 5;
    $total=0;
    for ( $i = 0 ; $i < $length ; $i++ ){
            for($j = $length; $j>$i; $j--){
                echo(" ");
                echo "&nbsp; ";
                
            }
            for( $j = 0; $j <= $i ; $j++ ){echo( $n[$total]);
                $total++;
                echo "&nbsp; ";
                
            }
            echo "</br>";
        }
        return 0;
    }
?>
</body>
</html>
