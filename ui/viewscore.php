<!DOCTYPE html>

<html>

<head>
        <title>import csv</title>
        <meta charset="utf-8" />
        <style>
            #container{
                margin:0 auto;
                width:80%;
                overflow:auto;
            }
            table.gridtable {
                margin:0 auto;
                width:95%;
                overflow:auto;
                font-family: helvetica,arial,sans-serif;
                font-size:14px;
                color:#333333;
                border-width: 1px;
                border-color: #666666;
                border-collapse: collapse;
                text-align: center;
            }
            table.gridtable th {
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #666666;
                background-color: #F6B4A5;
            }
            table.gridtable td {
                border-width: 1px;
                padding: 8px;
                border-style: solid;
                border-color: #666666;
            }
            .error {
                color: white;
                background-color: red;
            }
        </style>
</head>

<body>

    <div class="container" id="container">
        <table class="gridtable">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>Essay Set</th>
                    <th>Your essay </th>
                    <th>Score</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    if (($csvfile = fopen("out.csv", "r")) !== FALSE) {
                        while (($csvdata = fgetcsv($csvfile, 1000, ",")) !== FALSE) {
                            $error='';
                            $colcount = count($csvdata);
                            echo '<tr>';
                            switch($error) {
                                case "Column count incorrect":
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td class="error" >'.$error.'</td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    break;
                                case "error":
                                    echo '<td class="error">'.$csvdata[0].'</td>';
                                    echo '<td class="error">'.$csvdata[1].'</td>';
                                    echo '<td class="error">'.$csvdata[2].'</td>';
                                    echo '<td class="error">'.$csvdata[3].'</td>';


                                    break;
                                default:
                                    echo '<td>'.$csvdata[0].'</td>';
                                    echo '<td>'.$csvdata[1].'</td>';
                                    echo '<td>'.$csvdata[2].'</td>';
                                    echo '<td>'.$csvdata[3].'</td>';

                          }
                            echo '</tr>';
                        }
                        fclose($csvfile);
                    }
                ?>
            </tbody>
           </table>
    </div>

</body>
</html>
