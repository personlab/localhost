<?php

$arrayName = array('name' => 'Afrodita',
                    'surNamt' => 'Tugelar',
                    'age' => 20,
                    'byear' => 1996,
                    'aducation' => array('shcool in 2001', 'college in 2005'),
                    'married' => false,
                    'smoking' => false,
                    'geek' => true

);
// многомерный массив - array
$j = false; // true булево истина или ложь
print_r($arrayName['aducation'][1]);

$line = "<br>";
print_r($line);

$a = 100;
// разница между апострофами и кавычками
print_r('test $a'); // php понимаем тект заключенный в апостроф, как обычный текст
print_r($line);
print_r("test $a");

$name = ' Abraham';
$surName = 'Tugalov';
print_r($line);
print_r($name . ' ' . $surName); // конкотинация, слияние текста
for($i =1; $i <= 100; $i++) {
  print_r($i);

  if ($i % 2 === 0) {
    print_r(" - Четное число");
  } else {
    print_r(" - не четно число");
  }
  print_r("<br>");
}

print_r($line);

$test = 10;
while ($test <= 100) {
  print_r("test" .$test. "<br>");
  $test++;
}

print_r($line);

$names = array(
  'Jonny',
  'Marty',
  'Nastasiya',
  'Margo',
  'Alex'
);
foreach ($names as $value) {
  print_r($value . "<br />");
}

print_r($line);

$numbers = array(5, 10, 25, 50);

foreach ($numbers as $num) {
  print_r('Куб числа ' . $num . ': ' . ($num * $num) . '<br />');
}
print_r($line);

// function get_bigger($a, $b)
// {
//   if ($a > $b) {
//     print_r($a);
//   } else {
//     print_r($b);
//   }
//   print_r("<br />");
// }
// get_bigger(10, 20);
// get_bigger(60, 20);

function get_bigger($a, $b)
{
  if ($a > $b) {
    return $a;
  } else {
    return $b;
  }
}
$bigger = get_bigger(10, 20);
$bigger = get_bigger(60, 20);
print_r($bigger);
print_r($bigger);
