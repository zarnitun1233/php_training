<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial 05</title>
</head>

<body>
    <h1>Tutorial 05</h1>
    <h2>1) Content of TEXT File</h2>
    <?php
    /**
     * Open text file from directory
     */
    $myfile = fopen("text.txt", "r") or die("Unable to open file!");
    echo fread($myfile, filesize("text.txt"));
    fclose($myfile);
    ?>
    <h2>2) Content of EXCEL File</h2>
    <table class="excel">
        <?php
        /**
         * Open Excel file from directory
         */
        require 'library/vendor/autoload.php';
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load("list.xlsx");
        $worksheet = $spreadsheet->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterate = $row->getCellIterator();
            $cellIterate->setIterateOnlyExistingCells(false);
            echo "<tr>";
            foreach ($cellIterate as $cell) {
                echo "<td>" . $cell->getValue() . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <h2>3) Content of CSV File</h2>
    <table>
        <?php
        /**
         * Open CSV file from file directory
         */
        $start_row = 1;
        if (($csvFile = fopen("sample.csv", "r")) != FALSE) {
            while (($read_data = fgetcsv($csvFile, 1000, ",")) != FALSE) {
                $column_count = count($read_data);
                echo "<tr>";
                $start_row++;
                for ($start = 0; $start < $column_count; $start++) {
                    echo "<td>" . $read_data[$start] . "</td>";
                }
                echo "</tr>";
            }
            fclose($csvFile);
        }
        ?>
    </table>
    <h2>4) Content of DOC File</h2>
    <?php
    /**
     * Open DOC file from file directory
     */
    $fileName = file_get_contents("hello.doc");
    echo nl2br($fileName);
    ?>
</body>

</html>