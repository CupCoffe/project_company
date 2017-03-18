<?php
require_once '../functions/functions.php';
require_once 'header.php';

$db = new Database();
$result = select_comp($db);

?>

<form class="contact_form" action="../action/add_address.php" method="post" name="contact_form">
    <ul>
        <li>
            <p>Виберіть компанію</p>
            <select name="name_company">
                <?foreach ($result as $data) {
                    echo '<option>' . $data['name_company'] . '</option>';
                }?>
            </select>
        </li>
        <li>
            <label for="address">Адреса:</label>
            <input type="text" name="address"  placeholder="Адрес офісу" value="<?php echo $data['address']; ?>" required />
        </li>
        <li>
            <label for="person_name">Контактна особа:</label>
            <input type="text" name="name_person" placeholder="Іванов Іван" value="<?php echo $data['name_person']; ?>" required />
            <input type="number" name="phone_number" placeholder="+380 95 648521" value="<?php echo $data['phone_number']; ?>" required />
        </li>
        <li>
            <button class="submit" type="submit">Submit Form</button>
        </li>
    </ul>
</form>


</body>
</html>
