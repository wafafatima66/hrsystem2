<?php 

$counter = '';
$adjacents = 1;
$lpm1 = $totalPage - 1;
$prev = $page_no - 1;                          //previous page is page - 1
$next = $page_no + 1;                          //next page is page + 1

if ($totalPage > 1) {
    if ($page_no > 1) {
        $output .= '<li class="page-item" id="' . $prev . '"><span class="page-link">previous</span></li>';
    } else {
        $output .= '<li class="page-item disabled"><span class="page-link">previous</span></li>';
    }

    if ($totalPage < 3 + ($adjacents * 2))   //not enough pages to bother breaking it up
    {
        for ($counter = 1; $counter <= $totalPage; $counter++) {
            if ($counter == $page_no) {

                $output .= '<li class="page-item active" id="' . $counter . '"><span class="page-link">' . $counter . '</span></li>';
            } else {

                $output .= '<li class="page-item" id="' . $counter . '"><span class="page-link">' . $counter . '</span></li>';
            }
        }
    } elseif ($totalPage > 3 + ($adjacents * 2))    //enough pages to hide some
    {

        if ($page_no < 1 + ($adjacents * 2)) {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {

                if ($counter == $page_no) {

                    $output .= '<li class="page-item active"><span class="page-link">' . $counter . '</span></li>';
                } else {
                    $output .= '<li class="page-item" id="' . $counter . '"><span class="page-link">' . $counter . '</span></li>';
                }
            }

            $output .= '<li class=""><span class="page-link">...</span></li>';
            $output .= '<li class="page-item" id="' . $lpm1 . '"><span class="page-link">' . $lpm1 . '</span></li>';
            $output .= '<li class="page-item" id="' . $totalPage . '"><span class="page-link">Last Page</span></li>';
        }


        //in middle; hide some front and some back
        elseif ($totalPage - ($adjacents * 2) > $page_no && $page_no > ($adjacents * 2)) {
            $output .= '<li class="page-item" id="1"><span class="page-link">1</span></li>';
            $output .= '<li class="page-item" id="2"><span class="page-link">2</span></li>';
            $output .= '<li class=""><span class="page-link">...</span></li>';

            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                if ($counter == $page_no) {
                    $output .= '<li class="page-item active"><span class="page-link">' . $counter . '</span></li>';
                } else {
                    $output .= '<li class="page-item" id="' . $counter . '"><span class="page-link">' . $counter . '</span></li>';
                }
            }
            $output .= '<li class=""><span class="page-link">...</span></li>';
            $output .= '<li class="page-item" id="' . $lpm1 . '"><span class="page-link">' . $lpm1 . '</span></li>';
            $output .= '<li class="page-item" id="' . $totalPage . '"><span class="page-link">Last Page</span></li>';
        }
        //close to end; only hide early pages
        else {
            $output .= '<li class="page-item" id="1"><span class="page-link">1</span></li>';
            $output .= '<li class="page-item" id="2"><span class="page-link">2</span></li>';
            $output .= '<li class=""><span class="page-link">...</span></li>';
            for ($counter = $totalPage - (2 + ($adjacents * 2)); $counter <= $totalPage; $counter++) {
                if ($counter == $page_no) {
                    $output .= '<li class="page-item active"><span class="page-link">' . $counter . '</span></li>';
                } else {
                    $output .= '<li class="page-item" id="' . $counter . '"><span class="page-link">' . $counter . '</span></li>';
                }
            }
        }
    }
    //next button
    if ($page_no < $counter - 1) {
        $output .= '<li class="page-item" id="' . $next . '"><span class="page-link">Next</span></li>';
    } else {
        $output .= '<li class="page-item disabled"><span class="page-link">Next</span></li>';
    }
}
?>