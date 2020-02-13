<?php
$categories = array(
    array(
        "id" => 1,
        "title" => "Обувь",
        'children' => array(
            array(
                'id' => 2,
                'title' => 'Ботинки',
                'children' => array(
                    array('id' => 3, 'title' => 'Кожа'),
                    array('id' => 4, 'title' => 'Текстиль'),
                ),
            ),
            array('id' => 5, 'title' => 'Кроссовки',),
        )
    ),
    array(
        "id" => 6,
        "title" => "Спорт",
        'children' => array(
            array(
                'id' => 7,
                'title' => 'Мячи'
            )
        )
    ),
);


function searchCategory(&$categories, $id)
{
    global $result;
    foreach ($categories as $key => $value) {
        if ($value['id'] != $id) {
            if (isset($categories[$key]['children'])) {
                searchCategory($categories[$key]['children'], $id);
            }
        } else {
            $result = $value['title'];
        }
        if ($result) return $result;
    }
    return $result;
}

$res = searchCategory($categories, 4);
echo $res . PHP_EOL;