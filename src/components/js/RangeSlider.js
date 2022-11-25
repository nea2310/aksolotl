/* eslint-disable fsd/jq-use-js-prefix-in-selector */
// eslint-disable-next-line func-names
(function () {
  const sliderConfig = {
    min: -100,
    max: 100,
    from: -90,
    to: -40,
    tip: false,
    step: 10,
  };

  const slidersVerticalWrapper = document.querySelector('.portfolio-card__slider');

  if (slidersVerticalWrapper) {
    const slidersVertical = slidersVerticalWrapper.querySelectorAll('.js-slider-demo');
    $(slidersVertical[0]).SliderMetaLamp({ ...sliderConfig, vertical: true });
    $(slidersVertical[1]).SliderMetaLamp({
      ...sliderConfig, vertical: true, from: -25, to: 25,
    });
    $(slidersVertical[2]).SliderMetaLamp({
      ...sliderConfig, vertical: true, from: 40, to: 90,
    });
  }

  const slidersHorizontalWrapper = document.querySelector('.portfolio-item__slider');

  if (slidersHorizontalWrapper) {
    const slidersHorizontal = slidersHorizontalWrapper.querySelectorAll('.js-slider-demo');

    $(slidersHorizontal[0]).SliderMetaLamp(sliderConfig);
    $(slidersHorizontal[1]).SliderMetaLamp({ ...sliderConfig, from: -25, to: 25 });
    $(slidersHorizontal[2]).SliderMetaLamp({ ...sliderConfig, from: 40, to: 90 });
  }
}());
