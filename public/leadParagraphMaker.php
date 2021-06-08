<?php

include_once '../src/Helper/News.php';

use function Tasks\Helper\News\makeLeadParagraph;

$link = '<a href="https://www.example.ru/news/245634">Новость</a>';

$a = 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов,
но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года
н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни
из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в
Lorem Ipsum, "consectetur", и занялся его поисками в классической латинской
литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах
1.10.32 и 1.10.33 книги "de Finibus Bonorum et Malorum" ("О пределах добра и зла"),
написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен
в эпоху Возрождения. Первая строка Lorem Ipsum, "Lorem ipsum dolor sit amet..",
происходит от одной из строк в разделе 1.10.32';

$b = makeLeadParagraph($a, $link);

?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Banner maker</title>
  </head>
  <body>
      <p>
          <?php echo $b; ?>
      </p>
  </body>
</html>