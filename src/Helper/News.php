<?php

namespace Tasks\Helper\News;

define('NEWS_VIEW_LENGTH', 180);
define('REGEXP_URL', '/https?:\/\/[!#$&-;=?-[\]_a-z~]*/');

/**
 * Преобразовать новость в оглавление
 */
function makeLeadParagraph(string $rowText, string $link): string
{
    $textWords = explode(' ', cutText($rowText));

    //Подготавливаем все элементы новости
    $lastTwoWords = getLastTwoElements($textWords);
    $mainText = array_diff_key($textWords, $lastTwoWords);
    $newLink = replaceLink($link, implode(' ', $lastTwoWords) . '...');

    //Добавляем ссылку в текст
    $mainText[] = $newLink;

    return implode(' ', $mainText);
}

/**
 * Отделить часть текста
 */
function cutText(string $text): string
{
    return mb_substr($text, 0, NEWS_VIEW_LENGTH);
}

/**
 * Получить последнии два элемента массива
 */
function getLastTwoElements(array $list): array
{
    return array_slice($list, -2, 2, true);
}

/**
 * Заменяет имя ссылки
 */
function replaceLink(string $oldLink, string $linkName): string
{
    $url = getUrl($oldLink);
    return makeLink($url, $linkName);
}

/**
 * Получить url из ссылки
 */
function getUrl(string $string): string
{
    $result = [];
    preg_match(REGEXP_URL, $string, $result);
    return $result[0];
}

/**
 * Создать ссылку
 */
function makeLink(string $url, string $name): string
{
    return "<a href=\"{$url}\">{$name}</a>";
}