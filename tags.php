<div class='col-lg-12 col-md-12 col-xs-12' style="min-height: 50px;margin-left: 13px;">
    

    <?php
    $alltags=$con->prepare("SELECT  wp_term_relationships.object_id as post_id,wp_posts.post_name,wp_terms.name,wp_terms.slug

        from 
        wp_term_relationships,wp_posts,wp_terms,wp_term_taxonomy
        
        where 
        wp_term_taxonomy.taxonomy='post_tag' 
        and 
        wp_term_taxonomy.term_id=wp_terms.term_id 
        and 
        wp_term_relationships.term_taxonomy_id=wp_term_taxonomy.term_taxonomy_id 
        and 
        wp_term_relationships.object_id=wp_posts.ID
        and 
        wp_terms.name LIKE '%$item%'");

    $alltags->execute();

    $tagscount=$alltags->rowcount();

    if($tagscount>0)
    {
        ?>
        <em>Tags</em>
        <?
        while ($tagsrow=$alltags->fetch()) 
        {
            ?>
            <a href="./blog/index.php/tag/<?php echo $tagsrow['slug'];?>/"><?php echo $tagsrow['name'];?> </a>
            &nbsp;
            &nbsp;
            <?php

        }
    }
    else
    {

    }

    ?>

</div>