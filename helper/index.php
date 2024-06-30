<?php function customFilter($input)
{
    if (!empty($input)):
        $input = htmlspecialchars($input);
        $input = stripcslashes($input);
        $input = trim($input);
//        preg_match('/\d+/', $input, $matches);
//        $input = $matches[0];
        return $input;
    endif;
}


