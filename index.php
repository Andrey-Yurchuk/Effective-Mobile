<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Телефонный справочник</title>
</head>
<body>

<h1>Телефонный справочник</h1>
<form action="add_contact.php" method="POST">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>
    <label for="phone">Телефонный номер:</label>
    <input type="tel" id="phone" name="phone" required>
    <button type="submit">Добавить</button>
</form>

<hr>

<h2>Список контактов:</h2>
<ul>
    <?php
    $contacts = json_decode(file_get_contents('contacts.json'), true);
    foreach ($contacts as $contact) {
        ?>
        <li>
            <?php echo "{$contact['name']}  {$contact['phone']}" ?>
            <form action="delete_contact.php" method="POST" style="display:inline;">
                <input type="hidden" name="name" value="<?php echo $contact['name']; ?>">
                <button type="submit">Удалить</button>
            </form>
        </li>
        <?php
    }
    ?>
</ul>

<hr>

</body>
</html>