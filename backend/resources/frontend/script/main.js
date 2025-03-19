/**
 * --------------------------------------------
 * Main script
 * --------------------------------------------
 */

import jQuery from 'jquery';

(function ($) {
  $(document).on('click', '.hamburger', function () {
    $(this).toggleClass('is-opened');
    $('.navbar01__menu').toggleClass('is-opened');
  });

  // dipindahkan ke frontend/js/Component/HeadingAbout
  // var $woa = $('#headingVideo')[0];
  // $(document).on('click', '#btn-headingVideo', function () {
  //   $woa.paused ? $woa.play() : $woa.pause();
  // });

  if (
    $('.fellowhip-program-page, .apply-form-page, .fellowship-apply-page')
      .length
  ) {
    $('body').addClass('fellow-page');
  }

  if ($('.apply-fellow').length) {
    $('.subscription__backtop').addClass('bg-primary-05');
  }

  // $(document).on('click', '#headingVideo', function () {
  //   this.paused ? this.play() : this.pause();
  // });

  // var lastScrollTop = 0;
  // $(window).scroll(function () {
  //   var st = $(this).scrollTop();
  //   var banner = $('.navbar01');
  //   setTimeout(function () {
  //     if (st > lastScrollTop) {
  //       banner.addClass('hide');
  //       console.log('hide');
  //     } else {
  //       banner.removeClass('hide');
  //       console.log('asd');
  //     }
  //     lastScrollTop = st;
  //   }, 100);
  // });
})(jQuery);
