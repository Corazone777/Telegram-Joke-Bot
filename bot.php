<?php

const JOKE_URL = "https://v2.jokeapi.dev/joke/Any";
const TELEGRAM_URL = "https://api.telegram.org/bot";
const TELEGRAM_KEY = "";
const METHOD_NAME = ['/getMe', '/getUpdates', '/sendMessage'];


//Joke API part
$joke = json_decode(file_get_contents(JOKE_URL));

function tell_jokes($joke)
{
    if($joke->type=='single')
    {
        return $joke->joke;
    }
    else
    {
        $two_part_joke = [$joke->setup, $joke->delivery];
        foreach ($two_part_joke as $joke)
        {
            echo $joke . "\n";
        }
        return $two_part_joke;
    }
}


$joke_message = implode(tell_jokes($joke));
////////Telegram Bot\\\\\\\\\
$telegram_updates = TELEGRAM_URL . TELEGRAM_KEY . METHOD_NAME[1];
$update = json_decode(file_get_contents($telegram_updates));
$chat_id = ;

$telegram_send_message = TELEGRAM_URL . TELEGRAM_KEY . METHOD_NAME[2] . "?chat_id={$chat_id}" . "&text=$joke_message";
$joke = json_decode(file_get_contents($telegram_send_message));


?>
