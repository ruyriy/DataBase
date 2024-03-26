<?php
// Подключаемся к базе данных MDB
$dbFile = 'database.mdb'; // Путь к файлу базы данных MDB
$conn = new COM('ADODB.Connection');
$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0; Data Source=$dbFile");

// Выполняем запрос на выборку данных из таблицы
$sql = "SELECT * FROM TableName";
$rs = $conn->Execute($sql);

// Проверяем, есть ли результаты запроса
if ($rs && !$rs->EOF) {
    // Если есть результаты, выводим их
    while (!$rs->EOF) {
        // Получаем данные из текущей строки результата запроса
        $data = $rs->Fields('ColumnName')->Value;
        // Выводим данные на экран
        echo 'Значение из базы данных: ' . $data . '<br>';
        // Переходим к следующей строке результата запроса
        $rs->MoveNext();
    }
} else {
    // Если нет результатов, выводим сообщение об отсутствии данных
    echo 'Нет данных в базе данных.';
}

// Закрываем соединение с базой данных
$conn->Close();
?>

﻿
