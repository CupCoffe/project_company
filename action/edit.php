<?php
require_once 'header.php';
require_once '../classes/db.class.php';
require_once '../functions/functions.php';

if ($_GET['id_company']){
    $id_company = $_GET['id_company'];

    $db = new Database();
    $stmt = edit_comp($db,$id_company);

    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Назва</th>';
    echo '<th>Рік заснування</th>';
    echo '<th>Діяльність</th>';
    echo '<th>Website</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    echo '<tr>';
    echo '<td>' . $stmt['name_company'] . '</td>';
    echo '<td>' . $stmt['year'] . '</td>';
    echo '<td>' . $stmt['activity'] . '</td>';
    echo '<td>' . $stmt['website'] . '<br>' . $stmt['email'] . '</td>';
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';

    ?>

    <form class="contact_form" action="update.php" method="post" name="contact_form">
        <ul>
            <li>
                <h2>Введіть дані про компанію</h2>
                <span class="required_notification">* Поля обов'язкові до заповнення</span>
            </li>
            <li>
                <label for="name">Назва і рік заснування:</label>
                <input type="text" name="name_company" placeholder="SOFTGROUP" value="<?php echo $stmt['name_company']; ?>"  required />
                <input type="number" name="year" placeholder="2005" value="<?php echo $stmt['year']; ?>" required />
            </li>
            <li>
                <label for="website">Website:</label>
                <input type="text" name="website" placeholder="www.softgroup.ua" value="<?php echo $stmt['website']; ?>" required />
                <span class="form_hint">Proper format "http://someaddress.com"</span>
            </li>
            <li>
                <label for="message">Опис діяльності компанії:</label>
                <textarea name="activity" cols="40" rows="6" required ><?php echo $stmt['activity']; ?></textarea>
            </li>
            <input type="hidden" name="id_company" value="<?php echo $stmt['id_company']; ?>"/>
            <li>
                <button class="submit" type="submit">Submit Form</button>
            </li>
        </ul>
    </form>
    </div>
    <?php
}

if ($_GET['id_address']){
    $id_address = $_GET['id_address'];

    $db = new Database();
    $stmt = edit_adr($db,$id_address);


    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Адреса</th>';
    echo '<th>Котактна особа</th>';
    echo '<th>Телефон</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    echo '<tr>';
    echo '<td>' . $stmt['address'] . '</td>';
    echo '<td>' . $stmt['name_person'] . '</td>';
    echo '<td>' . $stmt['phone_number'] . '</td>';
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';

    ?>

    <form class="contact_form" action="update.php" method="post" name="contact_form">
        <ul>
            <li>
                <label for="address">Адреса:</label>
                <input type="text" name="address"  placeholder="Адрес офісу" value="<?php echo $stmt['address']; ?>" required />
            </li>
            <li>
                <label for="person_name">Контактна особа:</label>
                <input type="text" name="name_person" placeholder="Іванов Іван" value="<?php echo $stmt['name_person']; ?>" required />
                <input type="number" name="phone_number" placeholder="+380 95 648521" value="<?php echo $stmt['phone_number']; ?>" required />
            </li>
            <input type="hidden" name="id_address" value="<?php echo $stmt['id_address']; ?>"/>
            <input type="hidden" name="id_person" value="<?php echo $stmt['id_person']; ?>"/>
            <li>
                <button class="submit" type="submit">Підтвердити</button>
            </li>
        </ul>
    </form>

<?php }

?>

