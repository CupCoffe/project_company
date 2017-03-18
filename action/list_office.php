<?php
require_once 'header.php';
require_once'../classes/db.class.php';
require_once '../functions/functions.php';

$id_company = $_GET['id_company'];

$db = new Database();
$result = select_adr($db,$id_company);
$length = $db->records;

if ($result) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Адреса</th>';
    echo '<th>Котактна особа</th>';
    echo '<th>Телефон</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $rows = $result;
    if ($length == 1) {
        $rows = array($result);
    }

        for ($i = 0; $i < count($rows); $i++) {
            echo '<tr>';
            echo '<td>' . $rows[$i]['address'] . '</td>';
            echo '<td>' . $rows[$i]['name_person'] . '</td>';
            echo '<td>' . $rows[$i]['phone_number'] . '</td>';
            echo '<td><a href="edit.php?id_address=' . $rows[$i]['id_address'] . '"><img src="../img/edit.png" ></a></td>';
            echo '<td><a href="delete.php?id_address=' . $rows[$i]['id_address'] . '"><img src="../img/delete.png" ></a></td>';
            echo '</tr>';
        }
}

echo '</tbody>';
echo '</table>';

?>
<form class="contact_form" action="add_address.php" method="post" name="contact_form">
    <ul>
        <li>
            <label for="address">Адреса:</label>
            <input type="text" name="address"  placeholder="Адрес офісу" value="<?php echo $data['address']; ?>" required />
        </li>
        <li>
            <label for="person_name">Контактна особа:</label>
            <input type="text" name="name_person" placeholder="Іванов Іван" value="<?php echo $data['name_person']; ?>" required />
            <input type="number" name="phone_number" placeholder="+380 95 648521" value="<?php echo $data['phone_number']; ?>" required />
        </li>
        <input type="hidden" name="id_company" value="<?php echo $id_company; ?>"/>
        <li>
            <button class="submit" type="submit">Додати офіс</button>
        </li>
    </ul>
</form>

</body>
</html>
