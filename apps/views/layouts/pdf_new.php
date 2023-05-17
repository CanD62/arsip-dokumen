<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $template['title']; ?> - ARUNA KOSMETIK</title>
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #3772bf;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3> ARUNA KOSMETIK</h3>
            <b>Alamat: perumahan griya sembung baru no 8A </b><br>
            <b>Cepiring - Kendal 51352 </b>
        </div><hr><br>
        <?php echo $template['body']; ?>
        <br>
        <p  style="text-align:right">Kendal, <?=date('d/m/Y');?></p>
        <center><p  style="text-align:right">Admin</p></center>
        <br>
        <hr align="right" width="10%">

    </body>
</html>