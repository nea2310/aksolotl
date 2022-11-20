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

  $('.js-slider-demo1').SliderMetaLamp(sliderConfig);
  $('.js-slider-demo2').SliderMetaLamp({ ...sliderConfig, from: -25, to: 25 });
  $('.js-slider-demo3').SliderMetaLamp({ ...sliderConfig, from: 40, to: 90 });

  $('.js-slider-demo4').SliderMetaLamp({ ...sliderConfig, vertical: true });
  $('.js-slider-demo5').SliderMetaLamp({
    ...sliderConfig, vertical: true, from: -25, to: 25,
  });
  $('.js-slider-demo6').SliderMetaLamp({
    ...sliderConfig, vertical: true, from: 40, to: 90,
  });
}());
