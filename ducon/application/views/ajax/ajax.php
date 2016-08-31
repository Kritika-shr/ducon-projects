<?php
public function get_news($slug = FALSE)
{

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
}

?>