<?php $moveLine = get_field('move_line', 'options') ;?>

<section class="move-line move-line-ask" id="move-line-ask">
   
        <div class="move-line__box move-line-ask__box">
          
            <?php for ($i = 0; $i < 18; $i++) { ?>
              <?php if ($moveLine) : ?>
                <span class="move-line__item move-line-ask__item">
                  <?= $moveLine ;?>
                </span> 
                <?php endif?>
               
            <?php } ?>
           
        </div>
    
</section>