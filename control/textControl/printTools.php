<?php
/**
 * Created by PhpStorm.
 * User: ziadelsarrih
 * Date: 2019-05-15
 * Time: 14:48
 */

class Printer
{
    private $words;
    private $color = array('#3a6070', 'gold');

    /**
     * Printer constructor.
     * @param $words
     * @param $length
     */
    public function __construct()
    {

    }

    public function setWords($words)
    {

        $this->words = preg_split('/\s+/ ', trim($words));
    }

    /**
     * @return mixed
     */
    public function getWords()
    {
        return $this->words;
    }


    public function printDbResult($result)
    {
        $data = '';
        if (isset($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data .= '<h4 style=" width: 800px ; text-align: justify">' . $row['name'] . '</h4>' .
                    ' <img src="' . $row['img'] . '"  class="responsive-img">' .
                    ' <p style=" width: 600px ; text-align: justify">' . $row['contents'] . '</p>' .
                    ' <p>' . $row['author'] . '</p>';
            }
        }

        return $data;
    }

    public function printDbResultWithSOneWord($result, $word)
    {
        trim($word);
        $data = '';
        if (isset($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data .= '<h4 style=" width: 800px ; text-align: justify">' . str_replace($word, "<span style='color: #57b846'>{$word}</span>", $row['name']) . '</h4>' .
                    ' <img src="' . $row['img'] . '"  class="responsive-img">' .
                    ' <p style=" width: 600px ; text-align: justify">' . str_replace($word, "<span style='color: #57b846'>{$word}</span>", $row['contents']) . '</p>' .
                    ' <p>' . str_replace($word, "<span style='color: #57b846'>{$word}</span>", $row['author']) . '</p>';
            }
        }

        return str_ireplace($word, "<span class='hilight'>{$word}</span>", $data);
    }

    public function printDbResultWithSWord($result, $word)
    {
        trim($word);
        $data = '';
        if (isset($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = str_ireplace($word, "<span style='background-color: yellow'>{$word}</span>", $row['name']);
                $contents = str_ireplace($word, "<span style='background-color: yellow'>{$word}</span>", $row['contents']);
                $author = str_ireplace($word, "<span style='background-color: yellow'>{$word}</span>", $row['author']);
                $data .= '<h4 style=" width: 800px ; text-align: justify">' . $this->mapSubString($name) . '</h4>' .
                    ' <img src="' . $row['img'] . '"  class="responsive-img">' .
                    ' <p style=" width: 600px ; text-align: justify">' . $this->mapSubString($contents) . '</p>' .
                    ' <p>' . $this->mapSubString($author) . '</p>';
            }
        }

        return str_ireplace($word, "<span class='hilight'>{$word}</span>", $data);
    }


    public function mapSubString($string)
    {


        $data = $this->regenerateString($string, $this->words[0], 'green');
        $data = $this->regenerateString($data, $this->words[1], 'red');
        return $data;
    }

    public function regenerateString($string, $word, $color)
    {
        return str_ireplace($word, "<span style='color: $color'> {$word} </span>", $string);
    }


}