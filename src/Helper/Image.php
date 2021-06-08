<?php

namespace Tasks\Helper\Image;

define('PNG_FORMAT', 3);
define('BANNER_WIDTH', 200);
define('BANNER_HEIGHT', 100);
define('COMPACT_BANNER_PREFIX', 'mini_');

/**
 * Создает баннер на основе изображения PNG формата
 */
function makePngBanner(string $filename): string
{
    if (!file_exists($filename)) {
        return $filename;
    }

    //Конвертируем изображение в баннер
    $bannerPath = addFilePrefix($filename, COMPACT_BANNER_PREFIX);
    if (!file_exists($bannerPath)) {
        $banner = reduceImagePng($filename, BANNER_WIDTH, BANNER_HEIGHT);
        imagePng($banner, $bannerPath);
    }
    return $bannerPath;
}

/**
 * Уменьшает размер изобрвжения до указанного формата
 */
function reduceImagePng(string $filename, int $width, int $height)
{
    //Получаем размеры и формат изобрадения
    $imageInfo = getimagesize($filename);
    $oldWidth  = $imageInfo[0];
    $oldHeight = $imageInfo[1];
    $type = $imageInfo[2];

    //Получаем исходное изображение
    if ($type === PNG_FORMAT) {
        $img = imageCreateFromPng($filename);
        imageSaveAlpha($img, true);

        //Создаем пустой холст
        $tmp = makeClearPngCanvas($width, $height);

        //Вычисляем соотношение сторон
        $tw = ceil($height / ($oldHeight / $oldWidth));
        $th = ceil($width / ($oldWidth / $oldHeight));

        //Копируем исходное изображение на холст
        if ($tw < $width) {
            imageCopyResampled($tmp, $img, ceil(($width - $tw) / 2), 0, 0, 0, $tw, $height, $oldWidth, $oldHeight);
        } else {
            imageCopyResampled($tmp, $img, 0, ceil(($height - $th) / 2), 0, 0, $width, $th, $oldWidth, $oldHeight);
        }
        return $tmp;
    }
    return false;
}

/**
 * Создает чистый холст PNG формата
 */
function makeClearPngCanvas(int $width, int $height)
{
    if ($width === 0 || $height === 0) {
        return false;
    }

    $tmp = imageCreateTrueColor($width, $height);
    imagealphablending($tmp, true);
    imageSaveAlpha($tmp, true);
    $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
    imagefill($tmp, 0, 0, $transparent);
    imagecolortransparent($tmp, $transparent);
    return $tmp;
}

/**
 * Добавляет префикс к имени файла
 */
function addFilePrefix(string $name, string $prefix): string
{
    $baseName = basename($name);
    $baseDir = pathinfo($name, PATHINFO_DIRNAME);
    return $baseDir . DIRECTORY_SEPARATOR . $prefix . $baseName;
}
