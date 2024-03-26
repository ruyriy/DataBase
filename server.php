<?php
// Подключаемся к базе данных MDB
$dbFile = 'database.mdb'; // Путь к файлу базы данных MDB
$conn = new COM('ADODB.Connection');
$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0; Data Source=$dbFile");

// Выполняем запрос на выборку данных из таблицы
$sql = "SELECT * FROM TableName";
$rs = $conn->Execute($sql);

// Формируем HTML-разметку с данными из таблицы
$html = '<ul>';
while (!$rs->EOF) {
    $data = $rs->Fields('ColumnName')->Value;
    $html .= '<li>' . $data . '</li>';
    $rs->MoveNext();
}
$html .= '</ul>';

// Отправляем HTML-разметку на клиентскую сторону
echo $html;

// Закрываем соединение с базой данных
$conn->Close();
?>

﻿
