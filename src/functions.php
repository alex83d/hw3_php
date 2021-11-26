<?php
/*
 * Задание #3.1

   * Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:

   * id - уникальный идентификатор, равен номеру эл-та в массиве
   * name - случайное имя из 5-ти возможных (сами придумайте каких)
   * age - случайное число от 18 до 45

   * Преобразуйте массив в json и сохраните в файл users.json
   * Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
   * Посчитайте количество пользователей с каждым именем в массиве
   * Посчитайте средний возраст пользователей
 */
function randomName(): string
{
    $names = array(
        'John',
        'Ivan',
        'Yuri',
        'Elena',
        'Boris'
    );
    return $names[rand(0, count($names) - 1)];
}

function randomAge($min = 18, $max = 45): int
{
    return mt_rand($min, $max);
}

$users = array();
for ($i = 0; $i < 50; $i++) {
    $user = [
        'id' => $i,
        'name' => randomName(),
        'age' => randomAge()
    ];
    $users[] = $user;
}

// var_dump($users);
function createJson($path, $arr): string
{
    $fp = fopen($path, 'w');
    fwrite($fp, json_encode($arr));
    fclose($fp);
    return 'Done!';
}

function jsonToArray($path): array
{
    $data = file_get_contents($path);
    return json_decode($data, true);
}

# Посчитайте количество пользователей с каждым именем в массиве
function countUserNames($array): array
{
    $names = array_column($array, 'name');
    return array_count_values($names);
}


# средний возраст пользователей
function getAverageAge($array): int
{
    $age = array_column($array, 'age');
    $sum = array_sum($age);
    $count = count($array);
    return $sum / $count;
}








