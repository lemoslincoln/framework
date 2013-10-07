<?php

/**
 * Limitar o número de caracteres baseado na $tamanho
 *
 * @since Bigo 1.0
 */
function limitarString($string, $tamanho, $encode = 'UTF-8') {
    if( strlen($string) > $tamanho )
        $string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
    else
        $string = mb_substr($string, 0, $tamanho, $encode);
    return $string;
}

