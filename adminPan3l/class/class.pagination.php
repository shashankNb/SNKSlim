<?php
class Pagination
{
    var $output 		= '';
    var $limit 			= array();

    function Pagination($per_page, $results, $link)
    {
        $total_pages 	= ceil($results / $per_page);

        $current_page 	= (isset($_GET["page"]) && $_GET["page"] > 1) ? $_GET["page"] : 1;

        $current_page 	= ($current_page > $total_pages) ? $total_pages : $current_page;

        $previous 	= $current_page - 1;

        $next 		= $current_page + 1;

        $this->limit["first"] 	= $previous * $per_page;

        $this->limit["second"] 	= $per_page;

        $this->output .= '<div class=\'pagination\'>';

        if ($current_page != 1)
        {
            $this->output .= '<a href=\''.$link.'&page='.$previous.'\' class=\'active\'>Prev</a>';
        }
        else
        {
            $this->output .= '<span class=\'inactive\'>Prev</span>';
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
            $this->output .= '<a href=\''.$link.'&page=1\' class=\'active\'>1</a>...';
        }

        for ($p = $loop_start; $p <= $loop_range; $p++)
        {
            if ($p != $current_page)
            {
                $this->output .= '<a href=\''.$link.'&page='.$p.'\' class=\'active\'>'.$p.'</a>';
            }
            else
            {
                $this->output .= '<span class=\'current\'>'.$p.'</span>';
            }
        }

        if ($loop_range != $total_pages)
        {
            $this->output .= '...<a href=\''.$link.'&page='.$total_pages.'\' class=\'active\'>'.$total_pages.'</a>';
        }

        if ($current_page != $total_pages)
        {
            $this->output .= '<a href=\''.$link.'&page='.$next.'\' class=\'active\'>Next</a>';
        }
        else
        {
            $this->output .= '<span class=\'inactive\'>Next</span>';
        }

        $this->output .= '</div>';
    }
}
