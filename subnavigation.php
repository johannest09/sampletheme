
<nav class="sub-navigation">
    <?php
        if ($post->post_parent) {
            $ancestors=get_post_ancestors($post->ID);
            $root=count($ancestors)-1;
            $parent = $ancestors[$root];
        } else {
            $parent = $post->ID;
        }

        //$children = wp_list_pages("title_li=&child_of=". $parent ."&echo=0");
        $children = wp_list_pages("title_li=&child_of=". $parent ."&exclude=218&echo=0");

        if ($children) { ?>
            <ul id="subnav">
            <?php echo $children; ?>
            </ul>
    <?php } ?>
</nav>
