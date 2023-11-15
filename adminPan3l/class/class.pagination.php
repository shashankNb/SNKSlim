<?php
class Pagination
{
    public $output = '';
    public $limit = array();

    function __construct($per_page, $results, $link)
    {
        $total_pages 	= ceil($results / $per_page);

        $current_page 	= (isset($_GET["page"]) && $_GET["page"] > 1) ? $_GET["page"] : 1;

        $current_page 	= ($current_page > $total_pages) ? $total_pages : $current_page;

        $previous 	= $current_page - 1;

        $next 		= $current_page + 1;

        $this->limit["first"] 	= $previous * $per_page;

        $this->limit["second"] 	= $per_page;

        $this->output .= '<ul class=\'pagination float-left\'>';

        if ($current_page != 1)
        {
            $this->output .= '<li class="page-item"><a href=\''.$link.'&page='.$previous.'\' class=\'page-link active\'> <span aria-hidden="true">Previous</span></a></li>';
        }
        else
        {
            $this->output .= '<li class="page-item previous disabled"><a class="page-link" aria-controls="Prev">Previous</a></li>';
        }

        if ($total_pages <= 7)
        {
            $loop_start = 1;
            $loop_range = $total_pages;
        }
        else
        {
            $loop_start = $current_page - 3;

            $loop_range = $current_page + 3;

            $loop_start = ($loop_start < 1) ? 1 : $loop_start;

            while ($loop_range - $loop_start < 6) { $loop_range++; }

            $loop_range = ($loop_range > $total_pages) ? $total_pages : $loop_range;

            while ($loop_range - $loop_start < 6) { $loop_start--; }
        }

        if ($loop_start != 1)
        {
            $this->output .= '<li class="page-item active"><a href=\''.$link.'&page=1\' class=\'page-link\'>1</a><a class="page-link">...</a></li>';
        }

        for ($p = $loop_start; $p <= $loop_range; $p++)
        {
            if ($p != $current_page)
            {
                $this->output .= '<li class="page-item"><a href=\''.$link.'&page='.$p.'\' class=\' page-link active\'>'.$p.'</a></li>';
            }
            else
            {
                $this->output .= '<li class="page-item active"><a href="#" class="page-link">'.$p.'<span class=\'sr-only\'>current</span></a></li>';
            }
        }

        if ($loop_range != $total_pages)
        {
            $this->output .= '<li class="page-item"><a class="page-link">...</a></li><li><a href=\''.$link.'&page='.$total_pages.'\' class=\'page-link active\'>'.$total_pages.'</a></li>';
        }

        if ($current_page != $total_pages)
        {
            $this->output .= '<li class="page-item"><a href=\''.$link.'&page='.$next.'\' class=\'page-link active\'>Next</a></li>';
        }
        else
        {
            $this->output .= '<li class="next disabled"><a aria-controls="Next" class="page-link">Next</a></li>';
        }

        $this->output .= '</ul>';
    }
}
