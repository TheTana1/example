<?php

$quiz = 
    [
        ['text' => 'Собачка говорит...',
        'answers' => 
        [
            'Муу', 
            'Мяу', 
            'Гав', 
            'Ку-ка-ре-ку'
        ],
        'correctAnswer' => 'Гав'],

        ['text' => 'В каком праздничном фильме  снялся Дональд Трамп?',
        'answers' => 
        [
            'Один дома',
            'Один дома 2: Затерянный в Нью-Йорке',
            'Ричи Рич',
            'Маленькие негодяи'
        ],
        'correctAnswer' => 'Один дома 2: Затерянный в Нью-Йорке'],

        ['text' => 'Что является национальным животным Шотландии?',
        'answers' => 
        [
            'Лошадь',
            'Единорог',
            'Волк',
            'Корова'
        ],
        'correctAnswer' => 'Единорог'],

        ['text' => 'Что такое квадрат?',
        'answers' => 
        [
            'Четырёхугольник -1 угол',
            'Окружность',
            'Четырёхугольник',
            'Треугольник'
        ],
        'correctAnswer' => 'Четырёхугольник'],

        ['text' => 'Кто сыграл Нео в "Матрице"?',
        'answers' => 
        [
            'Бред Питт',
            'Том Круз',
            'Киану Ривз',
            'Мэттью Макконахи'
        ],
        'correctAnswer' => 'Киану Ривз'],
    ];
    

foreach ($quiz as $question)
{
    $correct = 0;
    shuffle($question['answers']);
    ShowQuestion($question) ? $correct++ : $correct;
}
CheckCorrects($correct);



function ShowQuestion($question):bool
{

        echo "\033[2J";
        echo '=============================' . PHP_EOL;
        echo $question['text'] . PHP_EOL;
        echo '=============================' . PHP_EOL;
        for ($i=0; $i < count($question['answers']); $i++) { 
            print_r($i+1 . "=> " . $question['answers'][$i] . PHP_EOL); 
        }
        echo '=============================' . PHP_EOL;

    do
    {   
        $input = (int)readline('Enter number: ');
    }while(!isset($question['answers'][$input-1]));

    if($question['answers'][$input-1] === $question['correctAnswer'])
    {
        return true;
    }
    return false;
    
}


function CheckCorrects($correct)
{
    if($correct > 2)
    {
        echo 'Test Done. Very Well!';
        return;
    }
    echo 'Test Done. Not Good...';
}

