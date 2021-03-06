<?php


namespace Ramos\HttpRequest\DraftSearch;


class Functions
{
    public function showFeaturedMatches($listTeams, $listInfo){
        $count = (count($listTeams) / 2) - 1;

        $odd = array();
        $even = array();


        foreach ($listTeams as $k => $v) {
            if ($k % 2 == 0) {
                $even[] = $v;
            } else {
                $odd[] = $v;
            }
        }


        for ($i = 0; $i <= $count; $i++) {
            echo "$listInfo[$i]" . PHP_EOL;
            echo "$even[$i] vs $odd[$i]" . PHP_EOL;
            echo PHP_EOL;
        }

    }

}