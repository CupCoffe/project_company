<?php
require_once 'header.php';
require_once '../functions/functions.php';

        $db = new Database();
        $result = select_comp($db);
        $length = $db->records;

        if ($result) {
            echo '<table>';    // виводимо заголовки таблиці
            echo '<thead>';
            echo '<tr>';
            echo '<th>Назва / Рік заснування</th>';
            echo '<th>Діяльність</th>';
            echo '<th>Website</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $row = $result;
            if ($length == 1) {
                $row = array($result);
            }

        for ($i = 0; $i < count($row); $i++) {
            echo '<tr>';
            echo '<td><h4>' . $row[$i]['name_company'] . '<br>' . $row[$i]['year'] . '<h4></td>';
            echo '<td>' . $row[$i]['activity'] . '</td>';
            echo '<td>' . $row[$i]['website'] . '</td>';
            echo '</tr>';
            echo '<tr><td><a href="../action/edit.php?id_company=' . $row[$i]['id_company'] . '"><img src="../img/edit.png" ></a>&#160
            <a href="../action/list_office.php?id_company=' . $row[$i]['id_company'] . '"><img src="../img/office.png"></a>&#160<a href="../action/delete.php?id_company=' . $row[$i]['id_company'] . '"><img src="../img/delete.png" ></a></td></tr>';
        }
            echo '</tbody>';
            echo '</table>';
        }?>

</body>
</html>
