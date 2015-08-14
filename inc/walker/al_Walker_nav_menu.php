<?php

class al_Walker_nav_menu extends Walker
{

    protected static $count = 0;

    protected $showArchive;
    protected $pos;

    public $db_fields = [
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    ];

    public function __construct($pos = 3, $showArchive = true)
    {
        $this->showArchive = $showArchive;
        $this->pos = $pos;
    }

    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {

        self::$count++;
        $currentClass = ($item->object_id === get_the_ID()) ? ' class="current"' : '';

        if ($this->showArchive && self::$count == $this->pos) {
            $url = get_post_type_archive_link('portfolio');
            $title = 'Voir les portfolios';
            $output .= $this->add($url, $currentClass, $title); // refactor
        }

        $url = $item->url;
        $title = $item->title;

        $output .= $this->add($url, $currentClass, $title);
    }

    private function add($url, $currentClass, $title)
    {
        return sprintf("\n<li class=\"nav\"><a href='%s'%s>%s</a></li>\n",
            $url,
            $currentClass,
            $title
        );
    }

}