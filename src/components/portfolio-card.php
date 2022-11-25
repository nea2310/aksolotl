     <div class="portfolio-card">
       <div class="portfolio-card__wrapper">
         <div class="portfolio-card__icon"><img src="<?php echo $args['imgIcon'] ?>"></div>

         <h2 class="portfolio-card__title"><?php the_title() ?></h2>
         <span class="portfolio-card__caption">Использованные технологии</span>
         <div class="portfolio-card__stack">
           <?php if ( $args['linkJavascript']):?> <div class="portfolio-card__javascript"><a
               class="portfolio-card__javascript-link" href="https://www.javascript.com/" target="_blank" noopener
               noreferrer></a>
           </div>
           <?php endif; ?>
           <?php if ( $args['linkScss']):?> <div class="portfolio-card__scss"><a class="portfolio-card__scss-link"
               href="https://sass-lang.com/" target="_blank" noopener noreferrer></a> </div>
           <?php endif; ?>
           <?php if ( $args['linkPug']):?> <div class="portfolio-card__pug"><a class="portfolio-card__pug-link"
               href="https://pugjs.org/api/getting-started.html" target="_blank" noopener noreferrer></a></div>
           <?php endif; ?>
           <?php if ( $args['linkWebpack']):?> <div class="portfolio-card__webpack"><a
               class="portfolio-card__webpack-link" href="https://webpack.js.org/" target="_blank" noopener
               noreferrer></a>
           </div><?php endif; ?>
           <?php if ( $args['linkTypescript']):?> <div class="portfolio-card__typescript"><a
               class="portfolio-card__typescript-link" href="https://www.typescriptlang.org/" target="_blank" noopener
               noreferrer></a></div>
           <?php endif; ?>
           <?php if ( $args['linkReact']):?> <div class="portfolio-card__react"><a class="portfolio-card__react-link"
               href="https://reactjs.org/" target="_blank" noopener noreferrer></a> </div>
           <?php endif; ?>
           <?php if ( $args['linkRedux']):?> <div class="portfolio-card__redux"><a class="portfolio-card__redux-link"
               href="https://redux.js.org/" target="_blank" noopener noreferrer></a> </div>
           <?php endif; ?>
           <?php if ( $args['linkJest']):?> <div class="portfolio-card__jest"><a class="portfolio-card__jest-link"
               href="https://jestjs.io/" target="_blank" noopener noreferrer></a> </div>
           <?php endif; ?>
           <?php if ( $args['linkJquery']):?> <div class="portfolio-card__jquery"><a class="portfolio-card__jquery-link"
               href="https://jquery.com/" target="_blank" noopener noreferrer></a> </div>
           <?php endif; ?>
           <?php if ( $args['linkCRA']):?> <div class="portfolio-card__cra"><a class="portfolio-card__cra-link"
               href="https://create-react-app.dev/" target="_blank" noopener noreferrer></a> </div>
           <?php endif; ?>
           <?php if ( $args['linkFirebase']):?> <div class="portfolio-card__firebase"><a
               class="portfolio-card__firebase-link" href="https://firebase.google.com/" target="_blank" noopener
               noreferrer></a> </div>
           <?php endif; ?>
         </div>
         <div class="portfolio-card__links">
           <div class="portfolio-card__link">
             <?php if ( $args['linkDemo']): echo $args['linkDemo']; endif; ?>
           </div>
           <div class="portfolio-card__link">
             <a href="<?php the_permalink() ?>"> Подробнее</a>
           </div>
           <div class="portfolio-card__link">
             <?php if ( $args['linkGithub']): echo $args['linkGithub']; endif; ?>
           </div>
         </div>
       </div>
       <?php if ( $args['imgPreview']): ?>
       <div class="portfolio-card__preview"><img src="<?php echo $args['imgPreview'] ?>"></div>
       <?php endif ?>

       <?php if ( $args['slider']): ?>
       <div class="portfolio-card__slider">
         <?php include 'slider.php'?>
         <?php include 'slider.php'?>
         <?php include 'slider.php'; ?>
       </div>
       <?php endif ?>
     </div>