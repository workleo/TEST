<?php
require_once('../../Core.php');

if (!empty($_POST["idReview"])) {
    $id = $_POST["idReview"];
    $repository = new Core();
    $prodLog = $repository->getReviewInfo($id);

    if (!empty($prodLog)) {
        $res = $repository->deleteReviewById($id);
        error_log(prepareMessage($prodLog), 3, __DIR__ . '/../../logs/deleted.log');
    }
    echo "success";
}

function prepareMessage($prodLog)
{
    $a[]=array(
        'dateTime' => @date('[d/M/Y:H:i:s]'),
        'user' => $prodLog['user'],
        'email' => $prodLog['email'],
        'content' => $prodLog['content'],
        'product' => $prodLog['name'],
        'price' => $prodLog['price']
    );
    $m= json_encode(serialize($a));
    return $m;
}