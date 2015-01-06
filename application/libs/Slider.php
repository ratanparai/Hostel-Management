<?php
/**
 * Class file to generate bootstrape slider.
 *
 * @author Ratan
 *
 */
class Slider {

    /**
     * This static function will return the generated slider HTML to show
     * on the website.
     *
     */
    public static function generateSlider() {
        ?>
        <div id="carousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="<?php echo URL;?>public/img/hostel_front_page.jpg" alt="">
              <div class="carousel-caption">
                My hostel
              </div>
            </div>
            <div class="item">
              <img src="<?php echo URL;?>public/img/hostel_front_page.jpg" alt="">
              <div class="carousel-caption">
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <?php
    }
}