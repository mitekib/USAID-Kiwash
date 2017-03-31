<?php


$host='localhost';
$user='root';
$pass='ds@verify_2016';
$name='newiebc2';

$tables = false;
 $backup_name = false;


    $mysqli      = new mysqli($host, $user, $pass, $name);
    $mysqli->select_db($name);
    $mysqli->query("SET NAMES 'utf8'");
    $queryTables = $mysqli->query('SHOW TABLES');
    while ($row         = $queryTables->fetch_row())
    {
        $target_tables[] = $row[0];
    }
    
    if ($tables !== false)
    {
        $target_tables = array_intersect($target_tables, $tables);
    }
    $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--Database: `" . $name . "`\r\n\r\n\r\n";
    foreach ($target_tables as $table)
    {
        $result        = $mysqli->query('SELECT * FROM ' . $table);
        $fields_amount = $result->field_count;
        $rows_num      = $mysqli->affected_rows;
        $res           = $mysqli->query('SHOW CREATE TABLE ' . $table);
        $TableMLine    = $res->fetch_row();
        $content .= "\n\n" . $TableMLine[1] . ";\n\n";
        for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0)
        {
            while ($row = $result->fetch_row())
            { //when started (and every after 100 command cycle):
                if ($st_counter % 100 == 0 || $st_counter == 0)
                {
                    $content .= "\nINSERT INTO " . $table . " VALUES";
                }
                $content .= "\n(";
                for ($j = 0; $j < $fields_amount; $j++)
                {
                    $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                    if (isset($row[$j]))
                    {
                        $content .= '"' . $row[$j] . '"';
                    }
                    else
                    {
                        $content .= '""';
                    } if ($j < ($fields_amount - 1))
                    {
                        $content.= ',';
                    }
                }
                $content .=")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num)
                {
                    $content .= ";";
                }
                else
                {
                    $content .= ",";
                } $st_counter = $st_counter + 1;
            }
        } $content .="\n\n\n";
    }
    $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
    $backup_name = $backup_name ? $backup_name : $name . "___(" . date('H-i-s') . "_" . date('d-m-Y') . ")__rand" . rand(1, 11111111) . ".sql";
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . $backup_name . "\"");
    echo $content;
    exit;


/*
    $day_of_backup = 'Thursday'; //possible values: `Monday` `Tuesday` `Wednesday` `Thursday` `Friday` `Saturday` `Sunday`
    $backup_path = 'databases/'; //make sure it ends with "/"
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'ds@verify_2016';
    $db_name = 'newiebc2';

    //set the correct date for filename
    if (date('l') == $day_of_backup) {
        $date = date("Y-m-d");
    } else {
        //set $date to the date when last backup had to occur
        $datetime1 = date_create($day_of_backup);
        $date = date("Y-m-d", strtotime($day_of_backup.' -7 days'));
    }

    if (!file_exists($backup_path.$date.'-backup'.'.sql')) {

        //connect to db
        $link = mysqli_connect($db_host,$db_user,$db_pass);
        mysqli_set_charset($link,'utf8');
        mysqli_select_db($link,$db_name);

        //get all of the tables
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }

        //print_r($tables);

        //disable foreign keys (to avoid errors)
        $return = 'SET FOREIGN_KEY_CHECKS=0;' . "\r\n";
        $return.= 'SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";' . "\r\n";
        $return.= 'SET AUTOCOMMIT=0;' . "\r\n";
        $return.= 'START TRANSACTION;' . "\r\n";

        //cycle through
        foreach($tables as $table)
        {
            $result = mysqli_query($link, 'SELECT * FROM '.$table);
            $num_fields = mysqli_num_fields($result);
            $num_rows = mysqli_num_rows($result);
            $i_row = 0;

            //$return.= 'DROP TABLE '.$table.';'; 
            $row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
            $return.= "\n\n".$row2[1].";\n\n"; 

            if ($num_rows !== 0) {
                $row3 = mysqli_fetch_fields($result);
                $return.= 'INSERT INTO '.$table.'( ';
                foreach ($row3 as $th) 
                { 
                    $return.= '`'.$th->name.'`, '; 
                }
                $return = substr($return, 0, -2);
                $return.= ' ) VALUES';

                for ($i = 0; $i < $num_fields; $i++) 
                {
                    while($row = mysqli_fetch_row($result))
                    {
                        $return.="\n(";
                        for($j=0; $j<$num_fields; $j++) 
                        {
                            $row[$j] = addslashes($row[$j]);
                            $row[$j] = preg_replace("#\n#","\\n",$row[$j]);
                            if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                            if ($j<($num_fields-1)) { $return.= ','; }
                        }
                        if (++$i_row == $num_rows) {
                            $return.= ");"; // last row
                        } else {
                            $return.= "),"; // not last row
                        }   
                    }
                }
            }
            $return.="\n\n\n";
        }

        // enable foreign keys
        $return .= 'SET FOREIGN_KEY_CHECKS=1;' . "\r\n";
        $return.= 'COMMIT;';

        //set file path
        if (!is_dir($backup_path)) {
            mkdir($backup_path, 0777, true);
        }

        //delete old file
        $old_date = date("Y-m-d", strtotime('-4 weeks', strtotime($date)));
        $old_file = $backup_path.$old_date.'-backup'.'.sql';
        if (file_exists($old_file)) unlink($old_file);

        //save file
        $handle = fopen($backup_path.$date.'-backup'.'.sql','w+');
        fwrite($handle,$return);
        fclose($handle);
    }
echo "Done";
*/
?>
