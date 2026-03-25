<?php

namespace App\Helpers;

class TextNormalizer
{
    /**
     * Normalizes a string by removing special characters, emojis, and Unicode variations,
     * converting the text to simple ASCII characters.
     *
     * Example:
     * Input:  "*ᙶ⃢🔥*𝙋𝙖𝙧𝙖í𝙨𝙤 𝙙𝙖𝙨 𝙛𝙞𝙜𝙪𝙧𝙞𝙣𝙝𝙖𝙨ᙶ⃢🔥፝⃟"
     * Output: "paraiso das figurinhas"
     *
     * @param  string $text Original text containing special or stylized characters.
     * @return string Normalized lowercase text containing only letters, numbers, and spaces.
    */
    public static function normalize(string $text): string
    {
        $text = \Normalizer::normalize($text, \Normalizer::FORM_D);

        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text) ?: $text;

        $text = preg_replace('/[^a-zA-Z0-9\s]/u', '', $text);
        $text = preg_replace('/\s+/', ' ', $text);

        return trim(mb_strtolower($text));
    }
}
