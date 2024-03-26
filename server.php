<?php
// Подключаемся к базе данных MDB
$dbFile = 'database.mdb'; // Путь к файлу базы данных MDB
$conn = new COM('ADODB.Connection');
$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0; Data Source=$dbFile");

// Получаем данные из POST запроса
$data = $_POST['data'];

// Выполняем запрос к базе данных (пример)
$sql = "INSERT INTO TableName (ColumnName) VALUES ('$data')";
$rs = $conn->Execute($sql);

// Проверяем успешность выполнения запроса
if ($rs) {
    echo 'Data inserted successfully!';
} else {
    echo 'Error inserting data!';
}

// Закрываем соединение с базой данных
$conn->Close();
?>
﻿
