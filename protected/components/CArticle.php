<?php

/**
 * Created by PhpStorm.
 * User: CF
 * Date: 2016/10/24
 * Time: 14:23
 */
class CArticle extends CComponent
{
    public function Generate_Brief($text, $length)
    {
        if (strlen($text) <= $length) return $text;
        $Foremost = substr($text, 0, $length);
        $Foremost = preg_replace('/<[^>]*$/i', '', $Foremost).' ...';
        $re = "/<(\/?)(STRONG|PRE|DIV|H1|H2|H3|H4|H5|H6|ADDRESS|CODE|TABLE|TR|TD|TH|SELECT|TEXTAREA|OBJECT|UL|OL|SPAN|LI|A|P)[^>]*(>?)/i";
        $Stack = array();
        preg_match_all($re, $Foremost, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);
        for ($i = 0; $i < count($matches); $i++) {
            if ($matches[$i][1][0] == "") {
                array_push($Stack, strtoupper($matches[$i][2][0]));
            } else {
                $StackTop = $Stack[count($Stack) - 1];
                $End = strtoupper($matches[$i][2][0]);
                if (strcasecmp($StackTop, $End) == 0) {
                    array_pop($Stack);
                }
            }
        }

        foreach (array_reverse($Stack) as $v) {
            $Foremost .= '</' . strtolower($v) . '>';
        }

        return $Foremost;
    }
}