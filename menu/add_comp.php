<?php
require_once 'header.php';
?>
<form class="contact_form" action="../action/add_comp.php" method="post" name="contact_form">
    <ul>
        <li>
            <h2>Введіть дані про компанію</h2>
            <span class="required_notification">* Поля обов'язкові до заповнення</span>
        </li>
        <li>
            <label for="name">Назва і рік заснування:</label>
            <input type="text" name="name_company" placeholder="SOFTGROUP" value="<?php echo $data['name_company']; ?>"  required />
            <input type="number" name="year" placeholder="2005" value="<?php echo $data['year']; ?>" required />
        </li>
        <li>
            <label for="website">Website:</label>
            <input type="text" name="website" placeholder="www.softgroup.ua" value="<?php echo $data['website']; ?>" required />
            <span class="form_hint">Proper format "http://someaddress.com"</span>
            <input type="email" name="email" placeholder="soft_group@example.com" value="<?php echo $data['email']; ?>" required />
            <span class="form_hint">Proper format "name@something.com"</span>
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
            <label for="message">Опис діяльності компанії:</label>
            <textarea name="activity" cols="40" rows="6" required ><?php echo $data['activity']; ?></textarea>
        </li>
        <li>
            <button class="submit" type="submit">Submit Form</button>
        </li>
    </ul>
</form>


</body>
</html>
