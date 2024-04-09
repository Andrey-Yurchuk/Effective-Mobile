<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['name'])) {
        $name = $_POST['name'];

        $contacts = json_decode(file_get_contents('contacts.json'), true);

        foreach ($contacts as $key => $contact) {
            if ($contact['name'] === $name) {
                unset($contacts[$key]);
                break;
            }
        }

        file_put_contents('contacts.json', json_encode(array_values($contacts)));

        header('Location: index.php');
        exit;
    }
}