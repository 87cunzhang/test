<?php

// 读取 font.json 文件
$fontJsonContent = file_get_contents('font.json');
$fontJsonData = json_decode($fontJsonContent, true);

// 读取 fontMap.text 文件
$fontMapTextContent = file_get_contents('fontMap.text');
$fontMapLines = explode("\n", $fontMapTextContent);

// 构建 fontMap 数组
$fontMap = [];
foreach ($fontMapLines as $line) {
    if (empty($line)) {
        continue;
    }
    $parts = explode(':', $line, 2);
    $fontPath = trim($parts[0]);
    $fontPath = ltrim($parts[0],"/usr/share/fonts/");
    $fontNames = trim($parts[1]);
    $fontNames = explode(':', $fontNames);
    $fontNames = $fontNames[0];
    $fontMap[$fontPath] = $fontNames;
}

// 构建最终的字体映射数组
$finalFontMap = [];
foreach ($fontJsonData['unzip'] as $font) {
    $fontUrl = $font['fontUrl']; // Assuming all files are .otf for matching
    $name = $font['name'];

    // 从 fontMap 中查找对应的字体名称
    foreach ($fontMap as $fontPath => $fontNames) {
        if (strpos( $fontUrl,$fontPath) !== false) {
            $finalFontMap[$name] = $fontNames;
            break;
        }
    }
}

var_dump($finalFontMap);

// 将最终的字体映射数组转换为 JSON 并保存到文件
file_put_contents('unzipFontMap.json', json_encode($finalFontMap, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

echo "Font mapping JSON has been generated.\n";
