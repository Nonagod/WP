'use strict';

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

function _slicedToArray(arr, i) {
  return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();
}

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

function _iterableToArrayLimit(arr, i) {
  if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return;
  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
}

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];

  return arr2;
}

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

function initHitSliderAll(sliders) {
  Array.prototype.forEach.call(document.querySelectorAll('.js-hit-slider'), function (sliderWrap) {
    var item = new Swiper(sliderWrap.querySelector('.swiper-container'), {
      spaceBetween: 8,
      slidesPerView: 1.5,
      freeMode: true,
      navigation: {
        nextEl: sliderWrap.querySelector('.navs__item_next'),
        prevEl: sliderWrap.querySelector('.navs__item_prev')
      },
      breakpoints: {
        768: {
          spaceBetween: 24,
          slidesPerView: 3.5
        },
        480: {
          slidesPerView: 2.5
        }
      },
      preloadImages: false,
      lazy: true
    });
    if (sliders) sliders.add(item);
  });
}
function initHitSliderOnMobileAll(sliders) {
  var breakpoint = window.matchMedia('(max-width:768px)');
  Array.prototype.forEach.call(document.querySelectorAll('.js-hit-slider-on-mobile'), function (sliderWrap) {
    var swiperInstance;

    var breakpointChecker = function breakpointChecker() {
      if (breakpoint.matches === true) {
        if (swiperInstance !== undefined) swiperInstance.destroy(true, true);
        return;
      } else if (breakpoint.matches === false) {
        return setTimeout(function () {
          enableSwiper();
        }, 0);
      }
    };

    var enableSwiper = function enableSwiper() {
      swiperInstance = new Swiper(sliderWrap.querySelector('.swiper-container'), {
        spaceBetween: 8,
        slidesPerView: 1.5,
        freeMode: true,
        breakpoints: {
          768: {
            spaceBetween: 24,
            slidesPerView: 3.5
          },
//           480: {
//             slidesPerView: 2.5
//           }
        },
        preloadImages: false,
        lazy: true
      });
      if (sliders) sliders.add(swiperInstance);
    };

    breakpoint.addListener(breakpointChecker);
    breakpointChecker();
  });
}

function initReviewSliderAll() {
  Array.prototype.forEach.call(document.querySelectorAll('.js-review-slider'), function (sliderWrap) {
    new Swiper(sliderWrap.querySelector('.swiper-container'), {
      spaceBetween: 0,
      slidesPerView: 1,
      navigation: {
        nextEl: sliderWrap.querySelector('.navs__item_next'),
        prevEl: sliderWrap.querySelector('.navs__item_prev')
      },
      pagination: {
        el: sliderWrap.querySelector('.reviews__pagination'),
        type: 'fraction'
      }
    });
  });
}

function initVideoAll() {
  var videos = document.querySelectorAll('.video');
  Array.prototype.forEach.call(document.querySelectorAll('.js-video'), function (item) {
    setupVideo(item);
  });
}

function setupVideo(video) {
  var link = video.querySelector('.video__link');
  var media = video.querySelector('.video__media');
  var button = video.querySelector('.video__button');
  var id = parseMediaURL(media);
  video.addEventListener('click', function () {
    var iframe = createIframe(id);
    link.remove();
    button.remove();
    video.appendChild(iframe);
  });
  link.removeAttribute('href');
  video.classList.add('video--enabled');
}

function parseMediaURL(media) {
  var regexp = /https:\/\/i\.ytimg\.com\/vi\/([a-zA-Z0-9_-]+)\/maxresdefault\.jpg/i;
  var url = media.src;
  var match = url.match(regexp);
  return match[1];
}

function createIframe(id) {
  var iframe = document.createElement('iframe');
  iframe.setAttribute('allowfullscreen', '');
  iframe.setAttribute('src', generateURL(id));
  iframe.classList.add('video__media');
  return iframe;
}

function generateURL(id) {
  var query = '?rel=0&showinfo=0&autoplay=1';
  return 'https://www.youtube.com/embed/' + id + query;
}

var Faq = /*#__PURE__*/function () {
  function Faq(element, options) {
    _classCallCheck(this, Faq);

    if (!element) return;
    this.$el = element;
    this.$head = this.$el.querySelector('[data-faq-head]');
    this.$body = this.$el.querySelector('[data-faq-body]');
    this.options = options;
    this.isShow = this.$el.dataset['faq'] == 'true' ? true : false;
    this.setup();
  }

  _createClass(Faq, [{
    key: "setup",
    value: function setup() {
      this.$el.addEventListener('click', this.handleClick.bind(this));
      this.updateShow();
    }
  }, {
    key: "updateShow",
    value: function updateShow() {
      if (this.isShow) {
        this.$el.classList.add('is-active');
      } else {
        this.$el.classList.remove('is-active');
      }
    }
  }, {
    key: "setShow",
    value: function setShow() {
      this.isShow = true;
      this.updateShow();
    }
  }, {
    key: "setHide",
    value: function setHide() {
      this.isShow = false;
      this.updateShow();
    }
  }, {
    key: "handleClick",
    value: function handleClick(e) {
      this.isShow ? this.setHide() : this.setShow();
      if (this.options.onUpdate) this.options.onUpdate(this);
    }
  }]);

  return Faq;
}();
function initAllFaq() {
  window.faqs = [];
  Array.prototype.forEach.call(document.querySelectorAll('[data-faq]'), function (item) {
    window.faqs.push(new Faq(item, {
      onUpdate: function onUpdate(faq) {
        window.faqs.forEach(function (f) {
          if (f !== faq) f.setHide();
        });
      }
    }));
  });
}

var Tabs = /*#__PURE__*/function () {
  function Tabs(element) {
    var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

    _classCallCheck(this, Tabs);

    if (!element) return;
    this.$el = element;
    this.$head = this.$el.querySelector('[data-tabs-head]');
    this.$body = this.$el.querySelector('[data-tabs-body]');
    this.$tabs = this.$el.querySelectorAll('[data-tabs-tab]');
    this.$panels = this.$el.querySelectorAll('[data-tabs-panel]');
    this.options = options;
    this.current = this.$el.dataset['tabs'] || this.$tabs[0].dataset['tab'] || 0;
    console.log(this.current);
    this.setup();
  }

  _createClass(Tabs, [{
    key: "setup",
    value: function setup() {
      var _this = this;

      this.$panels = Array.from(this.$panels).reduce(function (acc, el) {
        var id = el.dataset['tabsPanel'];
        acc[id] = el;
        return acc;
      }, {});
      this.$tabs = Array.from(this.$tabs).reduce(function (acc, el) {
        var id = el.dataset['tabsTab'];
        acc[id] = el;
        return acc;
      }, {});
      Object.values(this.$tabs).forEach(function (el) {
        el.addEventListener('click', _this.handleHover.bind(_this, el));
      });
      this.updateCurrent();
    }
  }, {
    key: "updateCurrent",
    value: function updateCurrent() {
      Object.values(this.$tabs).forEach(function (el) {
        return el.classList.remove('is-active');
      });
      Object.values(this.$panels).forEach(function (el) {
        return el.classList.remove('is-active');
      });
      if (this.$tabs[this.current]) this.$tabs[this.current].classList.add('is-active');
      if (this.$panels[this.current]) this.$panels[this.current].classList.add('is-active');
      if (this.options.update) this.options.update();
    }
  }, {
    key: "handleHover",
    value: function handleHover(el, e) {
      var id = el.dataset['tabsTab'];
      if (!id) return;
      this.current = id;
      this.updateCurrent();
    }
  }]);

  return Tabs;
}();
function initTabs() {
  Array.prototype.forEach.call(document.querySelectorAll('[data-tabs]'), function (item) {
    var opt = {};

    if (item.classList.contains('tabs_magazine')) {
      opt.update = function () {
        if (window.slidersArr) window.slidersArr.update();
      };
    }

    new Tabs(item, opt);
  });
}

function initAllGallery() {
  Array.prototype.forEach.call(document.querySelectorAll('.js-lightgallery'), function (item) {
    lightGallery(item);
  });
}

function initArticleSliderAll() {
  Array.prototype.forEach.call(document.querySelectorAll('.js-article-slider'), function (slider) {
    new Swiper(slider, {
      spaceBetween: 8,
      slidesPerView: 1.5,
      freeMode: true,
      navigation: {
        nextEl: slider.querySelector('.navs__item_next'),
        prevEl: slider.querySelector('.navs__item_prev')
      },
      breakpoints: {
        768: {
          spaceBetween: 24,
          slidesPerView: 3.5
        },
        480: {
          slidesPerView: 2.5
        }
      }
    });
  });
}

var ModalBox = /*#__PURE__*/function () {
  function ModalBox(btnsTrigger, options) {
    _classCallCheck(this, ModalBox);

    this.opts = _objectSpread2({
      classActive: "show",
      extraClassHide: "hide",
      timeoutClose: 100,
      widthScrollbar: 0
    }, options);
    this.btns = document.querySelectorAll(btnsTrigger);
    this.modals = document.querySelectorAll("[data-modal]");
    this.btnsClose = document.querySelectorAll("[data-modal-close]");
    this.lastElementBeforeModal = null;
    this.init();
  }

  _createClass(ModalBox, [{
    key: "init",
    value: function init() {
      // console.log(this);
      this.events();
      this.opts.widthScrollbar = this.widthScrollbar();
    }
  }, {
    key: "events",
    value: function events() {
      var _this = this;

      [].forEach.call(this.btns, function (btn) {
        btn.addEventListener("click", function (e) {
          return _this.openModal(btn.dataset.modalTarget, e);
        });
      });
      [].forEach.call(this.btnsClose, function (btn) {
        btn.addEventListener("click", function (e) {
          return _this.closeModal(btn.closest("[data-modal]"), e);
        });
      });
      [].forEach.call(this.modals, function (modal) {
        modal.addEventListener("click", function (e) {
          return _this.backDrop(modal, e);
        });
      });
      document.addEventListener("keydown", this.handlerKeyDownModal);
    }
  }, {
    key: "openModal",
    value: function openModal(modalTarget, event) {
      var modal = document.querySelector("[data-modal='".concat(modalTarget, "']"));
      if (!modal) return;
      this.lastElementBeforeModal = document.activeElement;
      modal.classList.add(this.opts.classActive);
      modal.setAttribute("tabindex", 0);
      modal.focus();
      document.body.style.overflow = "hidden";
      document.body.style.marginRight = "".concat(this.opts.widthScrollbar, "px");
      return modal;
    }
  }, {
    key: "closeModal",
    value: function closeModal(modal, event) {
      var _this2 = this;

      modal.classList.add(this.opts.extraClassHide);
      this.lastElementBeforeModal.focus();
      setTimeout(function () {
        modal.classList.remove(_this2.opts.classActive, _this2.opts.extraClassHide);
        document.body.style.overflow = "initial";
        document.body.style.marginRight = "0";
        modal.removeAttribute("tabindex");
      }, this.opts.timeoutClose);
      if (this.opts.hasOwnProperty('onClose')) this.opts.onClose();
    }
  }, {
    key: "closeModalAll",
    value: function closeModalAll() {
      var _this3 = this;

      [].forEach.call(this.modals, function (modal) {
        _this3.closeModal(modal);
      });
    }
  }, {
    key: "backDrop",
    value: function backDrop(modal, event) {
      if (event.target === event.currentTarget) {
        this.closeModal(modal);
      }
    }
  }, {
    key: "handlerKeyDownModal",
    value: function handlerKeyDownModal(event) {
      if (event.keyCode === 27) {
        this.closeModalAll();
      }
    }
  }, {
    key: "widthScrollbar",
    value: function widthScrollbar() {
      var div = document.createElement("div");
      div.style.overflowY = "scroll";
      div.style.width = "50px";
      div.style.height = "50px"; // мы должны вставить элемент в документ, иначе размеры будут равны 0

      document.body.append(div);
      var scrollWidth = div.offsetWidth - div.clientWidth;
      div.remove();
      return scrollWidth;
    }
  }]);

  return ModalBox;
}();
function initModal() {
  window.modalBox = new ModalBox("[data-modal-target]");
}

var slidersArrClass = /*#__PURE__*/function () {
  function slidersArrClass() {
    _classCallCheck(this, slidersArrClass);

    this.sliders = [];
  }

  _createClass(slidersArrClass, [{
    key: "get",
    value: function get() {
      return this.sliders;
    }
  }, {
    key: "add",
    value: function add(s) {
      this.sliders.push(s);
    }
  }, {
    key: "update",
    value: function update() {
      this.sliders.forEach(function (s) {
        return s.update();
      });
    }
  }]);

  return slidersArrClass;
}();

function initForm(sendMail) {
  window.flatpickrArr = [];

  window.resetFlatpickrArr = function () {
    flatpickrArr.forEach(function (el) {
      el.destroyPickers();
      el.initPickers();
    });
  };

  Array.prototype.forEach.call(document.querySelectorAll('.js-form-order'), function (form) {
    var intervalUpdateTimeFlatpickr = null;
    var dayContainer = form.querySelector('[data-form="day-container"]');
    var weekday = form.querySelector('[data-form="weekday"]');
    var month = form.querySelector('[data-form="month"]');
    var dayInput = form.querySelector('[data-form="day-input"]');
    var dayInputHidden = form.querySelector('[data-form="day-input-hidden"]');
    var daySpan = form.querySelector('[data-form="day-span"]');
    var timeContainer = form.querySelector('[data-form="time-container"]');
    var timeInput = form.querySelector('[data-form="time-input"]');
    var timeInputHidden = form.querySelector('[data-form="time-input-hidden"]');
    var timeHoursSpan = form.querySelector('[data-form="time-hours-span"]');
    var timeMinutesSpan = form.querySelector('[data-form="time-minutes-span"]');
    var guestInput = form.querySelector('[data-form="guest-input"]');
    var nameContainer = form.querySelector('[data-form="name-container"]');
    var nameInput = form.querySelector('[data-form="name-input"]');
    var commentTextArea = form.querySelector('[name="comment"]');
    var phoneContainer = form.querySelector('[data-form="phone-container"]'); // const phoneInput = form.querySelector('[data-form="phone-input"]')

    var phoneInput1 = form.querySelector('[data-form="phone-input-p1"]');
    var phoneInput2 = form.querySelector('[data-form="phone-input-p2"]');
    var phoneInput3 = form.querySelector('[data-form="phone-input-p3"]');
    var phoneInput4 = form.querySelector('[data-form="phone-input-p4"]');
    var errorContainer = form.querySelector('[data-form="error-container"]');
    var state = {
      day: dayInputHidden.value,
      time: timeInputHidden.value,
      guests: guestInput.value,
      name: nameInput.value,
      phone: '',
      comment: commentTextArea.value,
    };
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      grecaptcha.ready(function() {
        grecaptcha.execute('6LdUdTgbAAAAAIB8DQ0uV4gjctPmWAlHhsoHTPVs', {action: 'mail_send'}).then(function(token) {
          // data.append('g-captcha-token', token );
          state.comment = commentTextArea.value;
          state['g-captcha-token'] = token;

          if (checkAll()) {
            console.log(true);
            sendMail(form, state);
          } else {
            console.log(false);
          }
        });
      });
      
    }); // guest inputs

    guestInput.addEventListener('change', function (_ref) {
      console.log(_ref);
      var target = _ref.target;
      var min = +target.getAttribute('data-min');
      var max = +target.getAttribute('data-max');

      if (target.value < min) {
        target.value = min;
      } else if (target.value > max) {
        target.value = max;
      }

      state.guests = target.value;
    }); // guest inputs end
    // guest inputs

    nameInput.addEventListener('change', function (_ref2) {
      var target = _ref2.target;
      state.name = target.value;
      checkAll();
    }); // guest inputs end
    // phone inputs

    phoneInput1.addEventListener('input', function (_ref3) {
      var target = _ref3.target;
      var reg = /^[0-9]{1,3}$/;

      if (!reg.test(target.value)) {
        target.value = target.value.slice(0, 3);
      }

      if (target.value.length > 2) {
        phoneInput2.focus();
      }
    });
    phoneInput1.addEventListener('change', function (_ref4) {
      var target = _ref4.target;
      var length = target.value.length;

      if (length > 0 && length < 3) {
        target.value = '';
      }

      setPhone(target.value, null, null, null);
    });
    phoneInput2.addEventListener('input', function (_ref5) {
      var target = _ref5.target;
      var reg = /^[0-9]{1,3}$/;

      if (!reg.test(target.value)) {
        target.value = target.value.slice(0, 3);
      }

      if (target.value.length > 2) {
        phoneInput3.focus();
      }

      if (target.value.length < 1) {
        phoneInput1.focus();
      }
    });
    phoneInput2.addEventListener('change', function (_ref6) {
      var target = _ref6.target;
      var length = target.value.length;

      if (length > 0 && length < 3) {
        target.value = '';
      }

      setPhone(null, target.value, null, null);
    });
    phoneInput3.addEventListener('input', function (_ref7) {
      var target = _ref7.target;
      var reg = /^[0-9]{1,2}$/;

      if (!reg.test(target.value)) {
        target.value = target.value.slice(0, 2);
      }

      if (target.value.length > 1) {
        phoneInput4.focus();
      }

      if (target.value.length < 1) {
        phoneInput2.focus();
      }
    });
    phoneInput3.addEventListener('change', function (_ref8) {
      var target = _ref8.target;
      var length = target.value.length;

      if (length > 0 && length < 2) {
        target.value = '';
      }

      setPhone(null, null, target.value, null);
    });
    phoneInput4.addEventListener('input', function (_ref9) {
      var target = _ref9.target;
      var reg = /^[0-9]{1,2}$/;

      if (!reg.test(target.value)) {
        target.value = target.value.slice(0, 2);
      }

      if (target.value.length < 1) {
        phoneInput3.focus();
      }
    });
    phoneInput4.addEventListener('change', function (_ref10) {
      var target = _ref10.target;
      var length = target.value.length;

      if (length > 0 && length < 2) {
        target.value = '';
      }

      setPhone(null, null, null, target.value);
    });

    function setPhone(p1, p2, p3, p4) {
      state.phone = "+7".concat(p1 ? p1 : phoneInput1.value).concat(p2 ? p2 : phoneInput2.value).concat(p3 ? p3 : phoneInput3.value).concat(p4 ? p4 : phoneInput4.value);
      checkAll();
    } // phone inputs end
    // flatpickrs

    var flatpickrObj = {
      dEl: dayInput,
      tEl: timeInput,
      dOpt: {
        defaultDate: new Date(),
        // minDate: "today",
        // maxDate: new Date().fp_incr(30),
        // 30 days from now,
        disable: blocked_form_dates || [],
        dateFormat: "F:l:d",
        "locale": CURRENT_LANG,
        onReady: function onReady(selectedDates, dateStr, instance) {
          // console.log(selectedDates, dateStr, instance);
          parseDateAndSetupSpans(dateStr);
          dayInputHidden.value = dateStr;
          state.day = dateStr;
        },
        onClose: function onClose(selectedDates, dateStr, instance) {
          // console.log(selectedDates, dateStr, instance);
          parseDateAndSetupSpans(dateStr);
        },
        onChange: function onChange(selectedDates, dateStr, instance) {
          // console.log(selectedDates, dateStr, instance);
          dayInputHidden.value = dateStr;
          state.day = dateStr;
          checkAll();
        }
      },
      tOpt: {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultDate: getTime(),//"13:45",//new Date(),
        // minTime: new Date(),
        "locale": CURRENT_LANG,
        onReady: function onReady(selectedDates, dateStr, instance) {
          // console.log(selectedDates, dateStr, instance);
          parseTimeAndSetupSpans(dateStr);
        },
        onClose: function onClose(selectedDates, dateStr, instance) {
          // console.log(selectedDates, dateStr, instance);
          parseTimeAndSetupSpans(dateStr);
        },
        onChange: function onChange(selectedDates, dateStr, instance) {
          // console.log(selectedDates, dateStr, instance);
          clearInterval(intervalUpdateTimeFlatpickr);
          timeInputHidden.value = dateStr;
          state.time = dateStr;
          checkAll();
        }
      }
    };

    flatpickrObj.initDPicker = function () {
      return flatpickr(flatpickrObj.dEl, flatpickrObj.dOpt);
    };

    flatpickrObj.initTPicker = function () {
      return flatpickr(flatpickrObj.tEl, flatpickrObj.tOpt);
    };

    var dayFlatpickr = flatpickrObj.dInstance = flatpickrObj.initDPicker();
    var timeFlatpickr = flatpickrObj.tInstance = flatpickrObj.initTPicker();

    flatpickrObj.destroyPickers = function () {
      flatpickrObj.dInstance.destroy();
      flatpickrObj.tInstance.destroy();
    };

    flatpickrObj.initPickers = function () {
      flatpickrObj.dInstance = flatpickrObj.initDPicker();
      flatpickrObj.tInstance = flatpickrObj.initTPicker();
    };

    flatpickrArr.push(flatpickrObj);
    window.timeFlatpickr = timeFlatpickr;

    function parseDateAndSetupSpans(d) {
      var data = d.split(':');
      weekday.textContent = data[1];
      month.textContent = data[0];
      daySpan.textContent = data[2];
    }

    function parseTimeAndSetupSpans(t) {
      var time = t.split(':');
      timeHoursSpan.textContent = time[0];
      timeMinutesSpan.textContent = time[1];
    }
    function getTime() {
      var t = new Date();
      var h = t.getHours();
      var m = t.getMinutes();
      // console.log("".concat(h < 10 ? '0' + h : h, ":").concat(m < 10 ? '0' + m : m), t);
      return  "".concat(h < 10 ? '0' + h : h, ":").concat(m < 10 ? '0' + m : m);
    }
    intervalUpdateTimeFlatpickr = setInterval(function () {
      // console.log('intervalUpdateTimeFlatpickr');
      parseTimeAndSetupSpans(getTime());
    }, 60000); // flatpickrs end
    // checks

    function checkDay() {
      if (!state.day) {
        dayContainer.classList.add('error');
        return false;
      } else {
        dayContainer.classList.remove('error');
        return true;
      }
    }

    function checkTime() {
      if (!state.time) {
        timeContainer.classList.add('error');
        return false;
      } else {
        timeContainer.classList.remove('error');
        return true;
      }
    }

    function checkName() {
      if (!state.name) {
        nameContainer.classList.add('error');
        return false;
      } else {
        nameContainer.classList.remove('error');
        return true;
      }
    }

    function checkPhone() {
      var reg = /^[+]7\d{10}$/;

      if (!reg.test(state.phone)) {
        phoneContainer.classList.add('error');
        return false;
      } else {
        phoneContainer.classList.remove('error');
        return true;
      }
    }

    function checkAll() {
      var checks = [checkDay, checkTime, checkName, checkPhone];
      var status = true;
      var checksBool = checks.forEach(function (fn) {
        var s = fn();
        if (!s) status = s;
      });

      if (status) {
        errorContainer.classList.remove('is-error');
      } else {
        errorContainer.classList.add('is-error');
      }

      return status;
    } // checks end

  });
}

var slidersArr = new slidersArrClass();
var lazyLoadInstance = new LazyLoad({});
document.addEventListener('DOMContentLoaded', function () {
  initHitSliderAll(slidersArr);
  initHitSliderOnMobileAll(slidersArr);
  initReviewSliderAll(slidersArr);
  initVideoAll();
  initAllFaq();
  initTabs();
  initAllGallery();
  initArticleSliderAll(slidersArr);
  initModal();
  initForm(sendMail);
  pagePaddingBody();
  smoothScroll();
  setTimeEndDate();
});
var page = document.querySelector('.page');
var header = document.querySelector('.header');
var humburger = document.querySelector('.js-humburger');
document.addEventListener('scroll', function () {
  stickyHeaderScroll();
});
document.addEventListener('resize', function () {});
if (humburger) humburger.addEventListener('click', toggleHumburger);

function pagePaddingBody() {
  if (!page && !header) return;
  page.style.paddingTop = header.clientHeight + 'px';
}

function stickyHeaderScroll() {
  if (!header) return;

  if (window.pageYOffset > 100) {
    header.classList.add("is-sticky");
  } else {
    header.classList.remove("is-sticky");
  }
}

function toggleHumburger() {
  if (humburger.classList.contains('is-active')) {
    humburger.classList.remove('is-active');
    header.classList.remove('is-humburger');
    document.body.style.overflow = "initial";
  } else {
    humburger.classList.add('is-active');
    header.classList.add('is-humburger');
    document.body.style.overflow = "hidden";
  }
}

function smoothScroll() {
  Array.prototype.forEach.call(document.querySelectorAll('.js-smooth-scroll'), function (item) {
    item.addEventListener('click', function (e) {
      e.preventDefault();
      var href = item.getAttribute('href');
      if (!href) return;
      href = href.split('#');
      href = href[href.length - 1];
      var anchor = document.querySelector("[id=\"".concat(href, "\""));
      if (!anchor) return;
      anchor.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
      });
    });
  });
}

function sendMail(form, obj) {
  var url = '/mailer.php';
  var FD;

  if (obj) {
    // Отправка object data
    FD = new FormData();
    Object.entries(obj).forEach(function (_ref) {
      var _ref2 = _slicedToArray(_ref, 2),
          key = _ref2[0],
          value = _ref2[1];

      FD.append(key, value);
    });
  } else {
    // Отправка самой формы
    FD = new FormData(form);
  }

  fetch(url, {
    method: "POST",
    body: FD,
  }).then(function (res) {
    console.log(res);

    if (res.ok) {
      return res.json();
    }

    return {
      status: res.ok
    };
  }).then(function (d) {
    console.log(d);

    if (d.hasOwnProperty('status') && d.status) {
      resSendMail(null, d);
      form.reset();
      resetFlatpickrArr();
    } else {
      throw new Error('Status - false');
    }
  })["catch"](function (err) {
    resSendMail(err, null);
  });
  return false;
}

function resSendMail(err, data) {
  var modal = null;
  var timeout = 8000;

  if (err) {
    console.warn(err);
    modal = modalBox.openModal('error');
  } else {
    console.log(data);
    modal = modalBox.openModal('success');
  }

  setTimeout(function () {
    modalBox.closeModal(modal);
  }, timeout);
} // Зависимы друг от друга


function checkTime(beg, end) {
  var s = 60,
      d = ':',
      b = beg.split(d),
      e = end.split(d),
      t = new Date();
  var btime = b[0] * Math.pow(s, 2) + b[1] * s + +b[2];
  var etime = e[0] * Math.pow(s, 2) + e[1] * s + +e[2];
  t = t.getHours() * Math.pow(s, 2) + t.getMinutes() * s + t.getSeconds();

  if (+b[0] > +e[0]) {
    return [t >= btime || t <= etime, beg, end];
  }

  return [!(t >= btime && t <= etime), beg, end];
}

function checkTimeDate() {
  var t = new Date();
  var day = t.getDay();

  switch (day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
    case 0:
    default:
      return checkTime('12:00:00', '05:00:00');
  }
}

function setTimeEndDate() {
  var endTimeHours = document.querySelector('[data-end-time="hours"]');
  var endTimeMinutes = document.querySelector('[data-end-time="minutes"]');
  var endTimeTitle = document.querySelector('[data-end-time="title"]');
  var time = checkTimeDate();
  var start = time[1].split(':');
  var end = time[2].split(':');
  var title = {
    "ru": ['Открыты до', 'Закрыты до'],
    "en": ['Open until', 'Closed until']
  }[CURRENT_LANG];
  if (!endTimeHours && !endTimeMinutes) return;
  endTimeTitle.textContent = time[0] ? title[0] : title[1];
  endTimeHours.textContent = time[0] ? end[0] : start[0];
  endTimeMinutes.textContent = time[0] ? end[1] : start[1];
} // Зависимы друг от друга end

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoibWFpbi5qcyIsInNvdXJjZXMiOlsiLi4vY29tcG9uZW50cy9oaXQtc2xpZGVyL2luZGV4LmpzIiwiLi4vY29tcG9uZW50cy9yZXZpZXdzL2luZGV4LmpzIiwiLi4vY29tcG9uZW50cy92aWRlby9pbmRleC5qcyIsIi4uL2NvbXBvbmVudHMvZmFxL2luZGV4LmpzIiwiLi4vY29tcG9uZW50cy90YWJzL2luZGV4LmpzIiwiLi4vY29tcG9uZW50cy9nYWxsZXJ5L2luZGV4LmpzIiwiLi4vY29tcG9uZW50cy9hcnRpY2xlL2luZGV4LmpzIiwiLi4vY29tcG9uZW50cy9tb2RhbC9pbmRleC5qcyIsInNsaWRlcnNBcnIuanMiLCJmb3JtLmpzIl0sInNvdXJjZXNDb250ZW50IjpbImV4cG9ydCBmdW5jdGlvbiBpbml0SGl0U2xpZGVyQWxsKHNsaWRlcnMpIHtcbiAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuanMtaGl0LXNsaWRlcicpLFxuICAgIHNsaWRlcldyYXAgPT4ge1xuXG4gICAgICBjb25zdCBpdGVtID0gbmV3IFN3aXBlcihzbGlkZXJXcmFwLnF1ZXJ5U2VsZWN0b3IoJy5zd2lwZXItY29udGFpbmVyJyksIHtcbiAgICAgICAgc3BhY2VCZXR3ZWVuOiA4LFxuICAgICAgICBzbGlkZXNQZXJWaWV3OiAxLjUsXG4gICAgICAgIGZyZWVNb2RlOiB0cnVlLFxuICAgICAgICBuYXZpZ2F0aW9uOiB7XG4gICAgICAgICAgbmV4dEVsOiBzbGlkZXJXcmFwLnF1ZXJ5U2VsZWN0b3IoJy5uYXZzX19pdGVtX25leHQnKSxcbiAgICAgICAgICBwcmV2RWw6IHNsaWRlcldyYXAucXVlcnlTZWxlY3RvcignLm5hdnNfX2l0ZW1fcHJldicpXG4gICAgICAgIH0sXG4gICAgICAgIGJyZWFrcG9pbnRzOiB7XG4gICAgICAgICAgNzY4OiB7XG4gICAgICAgICAgICBzcGFjZUJldHdlZW46IDI0LFxuICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogMy41LFxuICAgICAgICAgIH0sXG4gICAgICAgICAgNDgwOiB7XG4gICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiAyLjUsXG4gICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBwcmVsb2FkSW1hZ2VzOiBmYWxzZSxcbiAgICAgICAgbGF6eTogdHJ1ZVxuICAgICAgfSlcblxuICAgICAgaWYgKHNsaWRlcnMpIHNsaWRlcnMuYWRkKGl0ZW0pXG4gICAgfVxuICApXG59XG5cbmV4cG9ydCBmdW5jdGlvbiBpbml0SGl0U2xpZGVyT25Nb2JpbGVBbGwoc2xpZGVycykge1xuICBjb25zdCBicmVha3BvaW50ID0gd2luZG93Lm1hdGNoTWVkaWEoICcobWluLXdpZHRoOjc2OHB4KScgKVxuXG4gIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwoXG4gICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmpzLWhpdC1zbGlkZXItb24tbW9iaWxlJyksXG4gICAgc2xpZGVyV3JhcCA9PiB7XG5cbiAgICAgIGxldCBzd2lwZXJJbnN0YW5jZVxuICAgICAgY29uc3QgYnJlYWtwb2ludENoZWNrZXIgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgaWYgKGJyZWFrcG9pbnQubWF0Y2hlcyA9PT0gdHJ1ZSkge1xuXG4gICAgICAgICAgaWYgKHN3aXBlckluc3RhbmNlICE9PSB1bmRlZmluZWQpIHN3aXBlckluc3RhbmNlLmRlc3Ryb3kodHJ1ZSwgdHJ1ZSlcblxuICAgICAgICAgIHJldHVybjtcblxuICAgICAgICB9IGVsc2UgaWYgKGJyZWFrcG9pbnQubWF0Y2hlcyA9PT0gZmFsc2UpIHtcbiAgICAgICAgICByZXR1cm4gc2V0VGltZW91dCgoKSA9PiB7ZW5hYmxlU3dpcGVyKCl9LCAwKVxuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIGNvbnN0IGVuYWJsZVN3aXBlciA9IGZ1bmN0aW9uKCkge1xuXG4gICAgICAgIHN3aXBlckluc3RhbmNlID0gbmV3IFN3aXBlcihzbGlkZXJXcmFwLnF1ZXJ5U2VsZWN0b3IoJy5zd2lwZXItY29udGFpbmVyJyksIHtcbiAgICAgICAgICBzcGFjZUJldHdlZW46IDgsXG4gICAgICAgICAgc2xpZGVzUGVyVmlldzogMS41LFxuICAgICAgICAgIGZyZWVNb2RlOiB0cnVlLFxuICAgICAgICAgIGJyZWFrcG9pbnRzOiB7XG4gICAgICAgICAgICA3Njg6IHtcbiAgICAgICAgICAgICAgc3BhY2VCZXR3ZWVuOiAyNCxcbiAgICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogMy41LFxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIDQ4MDoge1xuICAgICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiAyLjUsXG4gICAgICAgICAgICB9XG4gICAgICAgICAgfSxcbiAgICAgICAgICBwcmVsb2FkSW1hZ2VzOiBmYWxzZSxcbiAgICAgICAgICBsYXp5OiB0cnVlXG4gICAgICAgIH0pXG5cbiAgICAgICAgaWYgKHNsaWRlcnMpIHNsaWRlcnMuYWRkKHN3aXBlckluc3RhbmNlKVxuXG4gICAgICB9XG5cbiAgICAgIGJyZWFrcG9pbnQuYWRkTGlzdGVuZXIoYnJlYWtwb2ludENoZWNrZXIpO1xuXG4gICAgICBicmVha3BvaW50Q2hlY2tlcigpO1xuXG4gICAgfVxuICApXG59XG4iLCJleHBvcnQgZnVuY3Rpb24gaW5pdFJldmlld1NsaWRlckFsbCgpIHtcbiAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuanMtcmV2aWV3LXNsaWRlcicpLFxuICAgIHNsaWRlcldyYXAgPT4ge1xuICAgICAgbmV3IFN3aXBlcihzbGlkZXJXcmFwLnF1ZXJ5U2VsZWN0b3IoJy5zd2lwZXItY29udGFpbmVyJyksIHtcbiAgICAgICAgc3BhY2VCZXR3ZWVuOiAwLFxuICAgICAgICBzbGlkZXNQZXJWaWV3OiAxLFxuICAgICAgICBuYXZpZ2F0aW9uOiB7XG4gICAgICAgICAgbmV4dEVsOiBzbGlkZXJXcmFwLnF1ZXJ5U2VsZWN0b3IoJy5uYXZzX19pdGVtX25leHQnKSxcbiAgICAgICAgICBwcmV2RWw6IHNsaWRlcldyYXAucXVlcnlTZWxlY3RvcignLm5hdnNfX2l0ZW1fcHJldicpXG4gICAgICAgIH0sXG4gICAgICAgIHBhZ2luYXRpb246IHtcbiAgICAgICAgICBlbDogc2xpZGVyV3JhcC5xdWVyeVNlbGVjdG9yKCcucmV2aWV3c19fcGFnaW5hdGlvbicpLFxuICAgICAgICAgIHR5cGU6ICdmcmFjdGlvbicsXG4gICAgICAgIH1cbiAgICAgIH0pXG4gICAgfVxuICApXG59XG4iLCJleHBvcnQgZnVuY3Rpb24gaW5pdFZpZGVvQWxsKCkge1xuICBsZXQgdmlkZW9zID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLnZpZGVvJyk7XG5cbiAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuanMtdmlkZW8nKSxcbiAgICBpdGVtID0+IHtcbiAgICAgIHNldHVwVmlkZW8oaXRlbSlcbiAgICB9XG4gIClcbn1cblxuZnVuY3Rpb24gc2V0dXBWaWRlbyh2aWRlbykge1xuICBsZXQgbGluayA9IHZpZGVvLnF1ZXJ5U2VsZWN0b3IoJy52aWRlb19fbGluaycpO1xuICBsZXQgbWVkaWEgPSB2aWRlby5xdWVyeVNlbGVjdG9yKCcudmlkZW9fX21lZGlhJyk7XG4gIGxldCBidXR0b24gPSB2aWRlby5xdWVyeVNlbGVjdG9yKCcudmlkZW9fX2J1dHRvbicpO1xuICBsZXQgaWQgPSBwYXJzZU1lZGlhVVJMKG1lZGlhKTtcblxuICB2aWRlby5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHtcbiAgICAgIGxldCBpZnJhbWUgPSBjcmVhdGVJZnJhbWUoaWQpO1xuXG4gICAgICBsaW5rLnJlbW92ZSgpO1xuICAgICAgYnV0dG9uLnJlbW92ZSgpO1xuICAgICAgdmlkZW8uYXBwZW5kQ2hpbGQoaWZyYW1lKTtcbiAgfSk7XG5cbiAgbGluay5yZW1vdmVBdHRyaWJ1dGUoJ2hyZWYnKTtcbiAgdmlkZW8uY2xhc3NMaXN0LmFkZCgndmlkZW8tLWVuYWJsZWQnKTtcbn1cblxuZnVuY3Rpb24gcGFyc2VNZWRpYVVSTChtZWRpYSkge1xuICBsZXQgcmVnZXhwID0gL2h0dHBzOlxcL1xcL2lcXC55dGltZ1xcLmNvbVxcL3ZpXFwvKFthLXpBLVowLTlfLV0rKVxcL21heHJlc2RlZmF1bHRcXC5qcGcvaTtcbiAgbGV0IHVybCA9IG1lZGlhLnNyYztcbiAgbGV0IG1hdGNoID0gdXJsLm1hdGNoKHJlZ2V4cCk7XG5cbiAgcmV0dXJuIG1hdGNoWzFdO1xufVxuXG5mdW5jdGlvbiBjcmVhdGVJZnJhbWUoaWQpIHtcbiAgbGV0IGlmcmFtZSA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2lmcmFtZScpO1xuXG4gIGlmcmFtZS5zZXRBdHRyaWJ1dGUoJ2FsbG93ZnVsbHNjcmVlbicsICcnKTtcbiAgaWZyYW1lLnNldEF0dHJpYnV0ZSgnc3JjJywgZ2VuZXJhdGVVUkwoaWQpKTtcbiAgaWZyYW1lLmNsYXNzTGlzdC5hZGQoJ3ZpZGVvX19tZWRpYScpO1xuXG4gIHJldHVybiBpZnJhbWU7XG59XG5cbmZ1bmN0aW9uIGdlbmVyYXRlVVJMKGlkKSB7XG4gIGxldCBxdWVyeSA9ICc/cmVsPTAmc2hvd2luZm89MCZhdXRvcGxheT0xJztcblxuICByZXR1cm4gJ2h0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2VtYmVkLycgKyBpZCArIHF1ZXJ5O1xufVxuIiwiZXhwb3J0IGNsYXNzIEZhcSB7XG4gIGNvbnN0cnVjdG9yKGVsZW1lbnQsIG9wdGlvbnMpIHtcbiAgICBpZiAoIWVsZW1lbnQpIHJldHVyblxuICAgIHRoaXMuJGVsID0gZWxlbWVudFxuICAgIHRoaXMuJGhlYWQgPSB0aGlzLiRlbC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1mYXEtaGVhZF0nKVxuICAgIHRoaXMuJGJvZHkgPSB0aGlzLiRlbC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1mYXEtYm9keV0nKVxuXG4gICAgdGhpcy5vcHRpb25zID0gb3B0aW9uc1xuXG4gICAgdGhpcy5pc1Nob3cgPSB0aGlzLiRlbC5kYXRhc2V0WydmYXEnXSA9PSAndHJ1ZScgPyB0cnVlIDogZmFsc2VcblxuICAgIHRoaXMuc2V0dXAoKVxuICB9XG5cbiAgc2V0dXAoKSB7XG4gICAgdGhpcy4kZWwuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0aGlzLmhhbmRsZUNsaWNrLmJpbmQodGhpcykpXG4gICAgdGhpcy51cGRhdGVTaG93KClcbiAgfVxuXG4gIHVwZGF0ZVNob3coKSB7XG4gICAgaWYgKHRoaXMuaXNTaG93KSB7XG4gICAgICB0aGlzLiRlbC5jbGFzc0xpc3QuYWRkKCdpcy1hY3RpdmUnKVxuICAgIH0gZWxzZSB7XG4gICAgICB0aGlzLiRlbC5jbGFzc0xpc3QucmVtb3ZlKCdpcy1hY3RpdmUnKVxuICAgIH1cbiAgfVxuXG4gIHNldFNob3coKSB7XG4gICAgdGhpcy5pc1Nob3cgPSB0cnVlXG4gICAgdGhpcy51cGRhdGVTaG93KClcbiAgfVxuXG4gIHNldEhpZGUoKSB7XG4gICAgdGhpcy5pc1Nob3cgPSBmYWxzZVxuICAgIHRoaXMudXBkYXRlU2hvdygpXG4gIH1cblxuICBoYW5kbGVDbGljayhlKSB7XG4gICAgdGhpcy5pc1Nob3cgPyB0aGlzLnNldEhpZGUoKSA6IHRoaXMuc2V0U2hvdygpXG4gICAgaWYgKHRoaXMub3B0aW9ucy5vblVwZGF0ZSkgdGhpcy5vcHRpb25zLm9uVXBkYXRlKHRoaXMpXG4gIH1cbn1cblxuZXhwb3J0IGZ1bmN0aW9uIGluaXRBbGxGYXEoKSB7XG4gIHdpbmRvdy5mYXFzID0gW11cbiAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCdbZGF0YS1mYXFdJyksXG4gICAgaXRlbSA9PiB7XG4gICAgICB3aW5kb3cuZmFxcy5wdXNoKG5ldyBGYXEoaXRlbSwge1xuICAgICAgICBvblVwZGF0ZTogKGZhcSkgPT4ge1xuICAgICAgICAgIHdpbmRvdy5mYXFzLmZvckVhY2goZiA9PiB7XG4gICAgICAgICAgICBpZiAoZiAhPT0gZmFxKSBmLnNldEhpZGUoKVxuICAgICAgICAgIH0pXG4gICAgICAgIH1cbiAgICAgIH0pKVxuICAgIH1cbiAgKVxufVxuIiwiZXhwb3J0IGNsYXNzIFRhYnMge1xuICBjb25zdHJ1Y3RvcihlbGVtZW50LCBvcHRpb25zID0ge30pIHtcbiAgICBpZiAoIWVsZW1lbnQpIHJldHVyblxuICAgIHRoaXMuJGVsID0gZWxlbWVudFxuICAgIHRoaXMuJGhlYWQgPSB0aGlzLiRlbC5xdWVyeVNlbGVjdG9yKCdbZGF0YS10YWJzLWhlYWRdJylcbiAgICB0aGlzLiRib2R5ID0gdGhpcy4kZWwucXVlcnlTZWxlY3RvcignW2RhdGEtdGFicy1ib2R5XScpXG4gICAgdGhpcy4kdGFicyA9IHRoaXMuJGVsLnF1ZXJ5U2VsZWN0b3JBbGwoJ1tkYXRhLXRhYnMtdGFiXScpXG4gICAgdGhpcy4kcGFuZWxzID0gdGhpcy4kZWwucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtdGFicy1wYW5lbF0nKVxuICAgIHRoaXMub3B0aW9ucyA9IG9wdGlvbnNcblxuICAgIHRoaXMuY3VycmVudCA9IHRoaXMuJGVsLmRhdGFzZXRbJ3RhYnMnXSB8fCB0aGlzLiR0YWJzWzBdLmRhdGFzZXRbJ3RhYiddIHx8IDBcblxuICAgIGNvbnNvbGUubG9nKHRoaXMuY3VycmVudCk7XG4gICAgdGhpcy5zZXR1cCgpXG4gIH1cblxuICBzZXR1cCgpIHtcbiAgICB0aGlzLiRwYW5lbHMgPSBBcnJheS5mcm9tKHRoaXMuJHBhbmVscykucmVkdWNlKChhY2MsIGVsKSA9PiB7XG4gICAgICBjb25zdCBpZCA9IGVsLmRhdGFzZXRbJ3RhYnNQYW5lbCddXG4gICAgICBhY2NbaWRdID0gZWxcbiAgICAgIHJldHVybiBhY2NcbiAgICB9LCB7fSlcbiAgICB0aGlzLiR0YWJzID0gQXJyYXkuZnJvbSh0aGlzLiR0YWJzKS5yZWR1Y2UoKGFjYywgZWwpID0+IHtcbiAgICAgIGNvbnN0IGlkID0gZWwuZGF0YXNldFsndGFic1RhYiddXG4gICAgICBhY2NbaWRdID0gZWxcbiAgICAgIHJldHVybiBhY2NcbiAgICB9LCB7fSlcbiAgICBPYmplY3QudmFsdWVzKHRoaXMuJHRhYnMpLmZvckVhY2goZWwgPT4ge1xuICAgICAgZWwuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCB0aGlzLmhhbmRsZUhvdmVyLmJpbmQodGhpcywgZWwpKVxuICAgIH0pXG4gICAgdGhpcy51cGRhdGVDdXJyZW50KClcbiAgfVxuXG4gIHVwZGF0ZUN1cnJlbnQoKSB7XG4gICAgT2JqZWN0LnZhbHVlcyh0aGlzLiR0YWJzKS5mb3JFYWNoKGVsID0+IGVsLmNsYXNzTGlzdC5yZW1vdmUoJ2lzLWFjdGl2ZScpKVxuICAgIE9iamVjdC52YWx1ZXModGhpcy4kcGFuZWxzKS5mb3JFYWNoKGVsID0+IGVsLmNsYXNzTGlzdC5yZW1vdmUoJ2lzLWFjdGl2ZScpKVxuICAgIGlmICh0aGlzLiR0YWJzW3RoaXMuY3VycmVudF0pIHRoaXMuJHRhYnNbdGhpcy5jdXJyZW50XS5jbGFzc0xpc3QuYWRkKCdpcy1hY3RpdmUnKVxuICAgIGlmICh0aGlzLiRwYW5lbHNbdGhpcy5jdXJyZW50XSkgdGhpcy4kcGFuZWxzW3RoaXMuY3VycmVudF0uY2xhc3NMaXN0LmFkZCgnaXMtYWN0aXZlJylcbiAgICBpZiAodGhpcy5vcHRpb25zLnVwZGF0ZSkgdGhpcy5vcHRpb25zLnVwZGF0ZSgpXG4gIH1cblxuICBoYW5kbGVIb3ZlcihlbCwgZSkge1xuICAgIGNvbnN0IGlkID0gZWwuZGF0YXNldFsndGFic1RhYiddXG4gICAgaWYgKCFpZCkgcmV0dXJuO1xuICAgIHRoaXMuY3VycmVudCA9IGlkXG4gICAgdGhpcy51cGRhdGVDdXJyZW50KClcbiAgfVxufVxuXG5leHBvcnQgZnVuY3Rpb24gaW5pdFRhYnMoKSB7XG4gIEFycmF5LnByb3RvdHlwZS5mb3JFYWNoLmNhbGwoXG4gICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtdGFic10nKSxcbiAgICBpdGVtID0+IHtcbiAgICAgIGNvbnN0IG9wdCA9IHt9XG4gICAgICBpZiAoaXRlbS5jbGFzc0xpc3QuY29udGFpbnMoJ3RhYnNfbWFnYXppbmUnKSkge1xuICAgICAgICBvcHQudXBkYXRlID0gZnVuY3Rpb24gKCkge1xuICAgICAgICAgIGlmICh3aW5kb3cuc2xpZGVyc0Fycikgd2luZG93LnNsaWRlcnNBcnIudXBkYXRlKClcbiAgICAgICAgfVxuICAgICAgfVxuICAgICAgbmV3IFRhYnMoaXRlbSwgb3B0KVxuICAgIH1cbiAgKVxufVxuIiwiZXhwb3J0IGZ1bmN0aW9uIGluaXRBbGxHYWxsZXJ5KCkge1xuICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKFxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5qcy1saWdodGdhbGxlcnknKSxcbiAgICBpdGVtID0+IHtcbiAgICAgIGxpZ2h0R2FsbGVyeShpdGVtKVxuICAgIH1cbiAgKVxufVxuIiwiZXhwb3J0IGZ1bmN0aW9uIGluaXRBcnRpY2xlU2xpZGVyQWxsKCkge1xuICBBcnJheS5wcm90b3R5cGUuZm9yRWFjaC5jYWxsKFxuICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5qcy1hcnRpY2xlLXNsaWRlcicpLFxuICAgIHNsaWRlciA9PiB7XG4gICAgICBuZXcgU3dpcGVyKHNsaWRlciwge1xuICAgICAgICBzcGFjZUJldHdlZW46IDgsXG4gICAgICAgIHNsaWRlc1BlclZpZXc6IDEuNSxcbiAgICAgICAgZnJlZU1vZGU6IHRydWUsXG4gICAgICAgIG5hdmlnYXRpb246IHtcbiAgICAgICAgICBuZXh0RWw6IHNsaWRlci5xdWVyeVNlbGVjdG9yKCcubmF2c19faXRlbV9uZXh0JyksXG4gICAgICAgICAgcHJldkVsOiBzbGlkZXIucXVlcnlTZWxlY3RvcignLm5hdnNfX2l0ZW1fcHJldicpXG4gICAgICAgIH0sXG4gICAgICAgIGJyZWFrcG9pbnRzOiB7XG4gICAgICAgICAgNzY4OiB7XG4gICAgICAgICAgICBzcGFjZUJldHdlZW46IDI0LFxuICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogMy41LFxuICAgICAgICAgIH0sXG4gICAgICAgICAgNDgwOiB7XG4gICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiAyLjVcbiAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgfSlcbiAgICB9XG4gIClcbn1cbiIsImV4cG9ydCBjbGFzcyBNb2RhbEJveCB7XG4gIGNvbnN0cnVjdG9yKGJ0bnNUcmlnZ2VyLCBvcHRpb25zKSB7XG4gICAgdGhpcy5vcHRzID0ge1xuICAgICAgY2xhc3NBY3RpdmU6IFwic2hvd1wiLFxuICAgICAgZXh0cmFDbGFzc0hpZGU6IFwiaGlkZVwiLFxuICAgICAgdGltZW91dENsb3NlOiAyMDAsXG4gICAgICB3aWR0aFNjcm9sbGJhcjogMCxcbiAgICAgIC4uLm9wdGlvbnNcbiAgICB9O1xuICAgIHRoaXMuYnRucyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoYnRuc1RyaWdnZXIpO1xuICAgIHRoaXMubW9kYWxzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIltkYXRhLW1vZGFsXVwiKTtcbiAgICB0aGlzLmJ0bnNDbG9zZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCJbZGF0YS1tb2RhbC1jbG9zZV1cIik7XG4gICAgdGhpcy5sYXN0RWxlbWVudEJlZm9yZU1vZGFsID0gbnVsbDtcblxuICAgIHRoaXMuaW5pdCgpO1xuICB9XG5cbiAgaW5pdCgpIHtcbiAgICAvLyBjb25zb2xlLmxvZyh0aGlzKTtcbiAgICB0aGlzLmV2ZW50cygpO1xuICAgIHRoaXMub3B0cy53aWR0aFNjcm9sbGJhciA9IHRoaXMud2lkdGhTY3JvbGxiYXIoKTtcbiAgfTtcblxuICBldmVudHMoKSB7XG4gICAgW10uZm9yRWFjaC5jYWxsKHRoaXMuYnRucywgKGJ0bikgPT4ge1xuICAgICAgYnRuLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT5cbiAgICAgICAgdGhpcy5vcGVuTW9kYWwoYnRuLmRhdGFzZXQubW9kYWxUYXJnZXQsIGUpXG4gICAgICApO1xuICAgIH0pO1xuXG4gICAgW10uZm9yRWFjaC5jYWxsKHRoaXMuYnRuc0Nsb3NlLCAoYnRuKSA9PiB7XG4gICAgICBidG4uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIChlKSA9PlxuICAgICAgICB0aGlzLmNsb3NlTW9kYWwoYnRuLmNsb3Nlc3QoXCJbZGF0YS1tb2RhbF1cIiksIGUpXG4gICAgICApO1xuICAgIH0pO1xuXG4gICAgW10uZm9yRWFjaC5jYWxsKHRoaXMubW9kYWxzLCAobW9kYWwpID0+IHtcbiAgICAgIG1vZGFsLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoZSkgPT4gdGhpcy5iYWNrRHJvcChtb2RhbCwgZSkpO1xuICAgIH0pO1xuICAgIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJrZXlkb3duXCIsIHRoaXMuaGFuZGxlcktleURvd25Nb2RhbCk7XG4gIH07XG5cbiAgb3Blbk1vZGFsKG1vZGFsVGFyZ2V0LCBldmVudCkge1xuICAgIGNvbnN0IG1vZGFsID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihgW2RhdGEtbW9kYWw9JyR7bW9kYWxUYXJnZXR9J11gKTtcbiAgICBpZiAoIW1vZGFsKSByZXR1cm47XG4gICAgdGhpcy5sYXN0RWxlbWVudEJlZm9yZU1vZGFsID0gZG9jdW1lbnQuYWN0aXZlRWxlbWVudDtcbiAgICBtb2RhbC5jbGFzc0xpc3QuYWRkKHRoaXMub3B0cy5jbGFzc0FjdGl2ZSk7XG4gICAgbW9kYWwuc2V0QXR0cmlidXRlKFwidGFiaW5kZXhcIiwgMCk7XG4gICAgbW9kYWwuZm9jdXMoKTtcbiAgICBkb2N1bWVudC5ib2R5LnN0eWxlLm92ZXJmbG93ID0gXCJoaWRkZW5cIjtcbiAgICBkb2N1bWVudC5ib2R5LnN0eWxlLm1hcmdpblJpZ2h0ID0gYCR7dGhpcy5vcHRzLndpZHRoU2Nyb2xsYmFyfXB4YDtcblxuICAgIHJldHVybiBtb2RhbFxuICB9O1xuXG4gIGNsb3NlTW9kYWwobW9kYWwsIGV2ZW50KSB7XG4gICAgbW9kYWwuY2xhc3NMaXN0LmFkZCh0aGlzLm9wdHMuZXh0cmFDbGFzc0hpZGUpO1xuICAgIHRoaXMubGFzdEVsZW1lbnRCZWZvcmVNb2RhbC5mb2N1cygpO1xuICAgIHNldFRpbWVvdXQoKCkgPT4ge1xuICAgICAgbW9kYWwuY2xhc3NMaXN0LnJlbW92ZSh0aGlzLm9wdHMuY2xhc3NBY3RpdmUsIHRoaXMub3B0cy5leHRyYUNsYXNzSGlkZSk7XG4gICAgICBkb2N1bWVudC5ib2R5LnN0eWxlLm92ZXJmbG93ID0gXCJpbml0aWFsXCI7XG4gICAgICBkb2N1bWVudC5ib2R5LnN0eWxlLm1hcmdpblJpZ2h0ID0gXCIwXCI7XG4gICAgICBtb2RhbC5yZW1vdmVBdHRyaWJ1dGUoXCJ0YWJpbmRleFwiKTtcbiAgICB9LCB0aGlzLm9wdHMudGltZW91dENsb3NlKTtcbiAgICBpZiAodGhpcy5vcHRzLmhhc093blByb3BlcnR5KCdvbkNsb3NlJykpIHRoaXMub3B0cy5vbkNsb3NlKClcbiAgfTtcblxuICBjbG9zZU1vZGFsQWxsKCkge1xuICAgIFtdLmZvckVhY2guY2FsbCh0aGlzLm1vZGFscywgKG1vZGFsKSA9PiB7XG4gICAgICB0aGlzLmNsb3NlTW9kYWwobW9kYWwpO1xuICAgIH0pO1xuICB9O1xuXG4gIGJhY2tEcm9wKG1vZGFsLCBldmVudCkge1xuICAgIGlmIChldmVudC50YXJnZXQgPT09IGV2ZW50LmN1cnJlbnRUYXJnZXQpIHtcbiAgICAgIHRoaXMuY2xvc2VNb2RhbChtb2RhbCk7XG4gICAgfVxuICB9O1xuXG4gIGhhbmRsZXJLZXlEb3duTW9kYWwoZXZlbnQpIHtcbiAgICBpZiAoZXZlbnQua2V5Q29kZSA9PT0gMjcpIHtcbiAgICAgIHRoaXMuY2xvc2VNb2RhbEFsbCgpO1xuICAgIH1cbiAgfTtcblxuICB3aWR0aFNjcm9sbGJhcigpIHtcbiAgICBsZXQgZGl2ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImRpdlwiKTtcblxuICAgIGRpdi5zdHlsZS5vdmVyZmxvd1kgPSBcInNjcm9sbFwiO1xuICAgIGRpdi5zdHlsZS53aWR0aCA9IFwiNTBweFwiO1xuICAgIGRpdi5zdHlsZS5oZWlnaHQgPSBcIjUwcHhcIjtcblxuICAgIC8vINC80Ysg0LTQvtC70LbQvdGLINCy0YHRgtCw0LLQuNGC0Ywg0Y3Qu9C10LzQtdC90YIg0LIg0LTQvtC60YPQvNC10L3Rgiwg0LjQvdCw0YfQtSDRgNCw0LfQvNC10YDRiyDQsdGD0LTRg9GCINGA0LDQstC90YsgMFxuICAgIGRvY3VtZW50LmJvZHkuYXBwZW5kKGRpdik7XG4gICAgbGV0IHNjcm9sbFdpZHRoID0gZGl2Lm9mZnNldFdpZHRoIC0gZGl2LmNsaWVudFdpZHRoO1xuXG4gICAgZGl2LnJlbW92ZSgpO1xuXG4gICAgcmV0dXJuIHNjcm9sbFdpZHRoO1xuICB9O1xufVxuXG5cbmV4cG9ydCBmdW5jdGlvbiBpbml0TW9kYWwoKSB7XG4gIHdpbmRvdy5tb2RhbEJveCA9IG5ldyBNb2RhbEJveChcIltkYXRhLW1vZGFsLXRhcmdldF1cIilcbn1cbiIsImV4cG9ydCBjbGFzcyBzbGlkZXJzQXJyQ2xhc3Mge1xuICBjb25zdHJ1Y3RvcigpIHtcbiAgICB0aGlzLnNsaWRlcnMgPSBbXVxuICB9XG5cbiAgZ2V0KCkge1xuICAgIHJldHVybiB0aGlzLnNsaWRlcnNcbiAgfVxuICBhZGQocykge1xuICAgIHRoaXMuc2xpZGVycy5wdXNoKHMpXG4gIH1cbiAgdXBkYXRlKCkge1xuICAgIHRoaXMuc2xpZGVycy5mb3JFYWNoKHMgPT4gcy51cGRhdGUoKSlcbiAgfVxufVxuIiwiZXhwb3J0IGZ1bmN0aW9uIGluaXRGb3JtKHNlbmRNYWlsKSB7XG4gIHdpbmRvdy5mbGF0cGlja3JBcnIgPSBbXVxuXG4gIHdpbmRvdy5yZXNldEZsYXRwaWNrckFyciA9IGZ1bmN0aW9uKCkge1xuICAgIGZsYXRwaWNrckFyci5mb3JFYWNoKGVsID0+IHtcbiAgICAgIGVsLmRlc3Ryb3lQaWNrZXJzKClcbiAgICAgIGVsLmluaXRQaWNrZXJzKClcbiAgICB9KVxuICB9XG5cbiAgQXJyYXkucHJvdG90eXBlLmZvckVhY2guY2FsbChcbiAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuanMtZm9ybS1vcmRlcicpLFxuICAgIChmb3JtKSA9PiB7XG5cbiAgICAgIGxldCBpbnRlcnZhbFVwZGF0ZVRpbWVGbGF0cGlja3IgPSBudWxsXG5cbiAgICAgIGNvbnN0IGRheUNvbnRhaW5lciA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cImRheS1jb250YWluZXJcIl0nKVxuICAgICAgY29uc3Qgd2Vla2RheSA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cIndlZWtkYXlcIl0nKVxuICAgICAgY29uc3QgbW9udGggPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWZvcm09XCJtb250aFwiXScpXG4gICAgICBjb25zdCBkYXlJbnB1dCA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cImRheS1pbnB1dFwiXScpXG4gICAgICBjb25zdCBkYXlJbnB1dEhpZGRlbiA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cImRheS1pbnB1dC1oaWRkZW5cIl0nKVxuICAgICAgY29uc3QgZGF5U3BhbiA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cImRheS1zcGFuXCJdJylcblxuICAgICAgY29uc3QgdGltZUNvbnRhaW5lciA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cInRpbWUtY29udGFpbmVyXCJdJylcbiAgICAgIGNvbnN0IHRpbWVJbnB1dCA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cInRpbWUtaW5wdXRcIl0nKVxuICAgICAgY29uc3QgdGltZUlucHV0SGlkZGVuID0gZm9ybS5xdWVyeVNlbGVjdG9yKCdbZGF0YS1mb3JtPVwidGltZS1pbnB1dC1oaWRkZW5cIl0nKVxuICAgICAgY29uc3QgdGltZUhvdXJzU3BhbiA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cInRpbWUtaG91cnMtc3BhblwiXScpXG4gICAgICBjb25zdCB0aW1lTWludXRlc1NwYW4gPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWZvcm09XCJ0aW1lLW1pbnV0ZXMtc3BhblwiXScpXG5cbiAgICAgIGNvbnN0IGd1ZXN0SW5wdXQgPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWZvcm09XCJndWVzdC1pbnB1dFwiXScpXG5cbiAgICAgIGNvbnN0IG5hbWVDb250YWluZXIgPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWZvcm09XCJuYW1lLWNvbnRhaW5lclwiXScpXG4gICAgICBjb25zdCBuYW1lSW5wdXQgPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWZvcm09XCJuYW1lLWlucHV0XCJdJylcblxuICAgICAgY29uc3QgcGhvbmVDb250YWluZXIgPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWZvcm09XCJwaG9uZS1jb250YWluZXJcIl0nKVxuICAgICAgLy8gY29uc3QgcGhvbmVJbnB1dCA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cInBob25lLWlucHV0XCJdJylcbiAgICAgIGNvbnN0IHBob25lSW5wdXQxID0gZm9ybS5xdWVyeVNlbGVjdG9yKCdbZGF0YS1mb3JtPVwicGhvbmUtaW5wdXQtcDFcIl0nKVxuICAgICAgY29uc3QgcGhvbmVJbnB1dDIgPSBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWZvcm09XCJwaG9uZS1pbnB1dC1wMlwiXScpXG4gICAgICBjb25zdCBwaG9uZUlucHV0MyA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cInBob25lLWlucHV0LXAzXCJdJylcbiAgICAgIGNvbnN0IHBob25lSW5wdXQ0ID0gZm9ybS5xdWVyeVNlbGVjdG9yKCdbZGF0YS1mb3JtPVwicGhvbmUtaW5wdXQtcDRcIl0nKVxuXG4gICAgICBjb25zdCBlcnJvckNvbnRhaW5lciA9IGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEtZm9ybT1cImVycm9yLWNvbnRhaW5lclwiXScpXG5cbiAgICAgIGNvbnN0IHN0YXRlID0ge1xuICAgICAgICBkYXk6IGRheUlucHV0SGlkZGVuLnZhbHVlLFxuICAgICAgICB0aW1lOiB0aW1lSW5wdXRIaWRkZW4udmFsdWUsXG4gICAgICAgIGd1ZXN0czogZ3Vlc3RJbnB1dC52YWx1ZSxcbiAgICAgICAgbmFtZTogbmFtZUlucHV0LnZhbHVlLFxuICAgICAgICBwaG9uZTogJydcbiAgICAgIH1cblxuXG4gICAgICBmb3JtLmFkZEV2ZW50TGlzdGVuZXIoJ3N1Ym1pdCcsIGUgPT4ge1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KClcblxuICAgICAgICBpZiAoY2hlY2tBbGwoKSkge1xuICAgICAgICAgIGNvbnNvbGUubG9nKHRydWUpO1xuICAgICAgICAgIHNlbmRNYWlsKGZvcm0sIHN0YXRlKVxuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIGNvbnNvbGUubG9nKGZhbHNlKTtcbiAgICAgICAgfVxuXG4gICAgICB9KVxuXG4gICAgICAvLyBndWVzdCBpbnB1dHNcbiAgICAgIGd1ZXN0SW5wdXQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgKHt0YXJnZXR9KSA9PiB7XG4gICAgICAgIGNvbnN0IG1pbiA9ICt0YXJnZXQuZ2V0QXR0cmlidXRlKCdkYXRhLW1pbicpXG4gICAgICAgIGNvbnN0IG1heCA9ICt0YXJnZXQuZ2V0QXR0cmlidXRlKCdkYXRhLW1heCcpXG5cbiAgICAgICAgaWYgKHRhcmdldC52YWx1ZSA8IG1pbikge1xuICAgICAgICAgIHRhcmdldC52YWx1ZSA9IG1pblxuICAgICAgICB9IGVsc2UgaWYgKHRhcmdldC52YWx1ZSA+IG1heCkge1xuICAgICAgICAgIHRhcmdldC52YWx1ZSA9IG1heFxuICAgICAgICB9XG4gICAgICB9KVxuICAgICAgLy8gZ3Vlc3QgaW5wdXRzIGVuZFxuXG4gICAgICAvLyBndWVzdCBpbnB1dHNcbiAgICAgIG5hbWVJbnB1dC5hZGRFdmVudExpc3RlbmVyKCdjaGFuZ2UnLCAoe3RhcmdldH0pID0+IHtcbiAgICAgICAgc3RhdGUubmFtZSA9IHRhcmdldC52YWx1ZVxuICAgICAgICBjaGVja0FsbCgpXG4gICAgICB9KVxuICAgICAgLy8gZ3Vlc3QgaW5wdXRzIGVuZFxuXG4gICAgICAvLyBwaG9uZSBpbnB1dHNcbiAgICAgIHBob25lSW5wdXQxLmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgKHt0YXJnZXR9KSA9PiB7XG4gICAgICAgIGNvbnN0IHJlZyA9IC9eWzAtOV17MSwzfSQvXG4gICAgICAgIGlmICghcmVnLnRlc3QodGFyZ2V0LnZhbHVlKSkge1xuICAgICAgICAgIHRhcmdldC52YWx1ZSA9IHRhcmdldC52YWx1ZS5zbGljZSgwLCAzKVxuICAgICAgICB9XG4gICAgICAgIGlmICh0YXJnZXQudmFsdWUubGVuZ3RoID4gMikge1xuICAgICAgICAgIHBob25lSW5wdXQyLmZvY3VzKClcbiAgICAgICAgfVxuICAgICAgfSlcbiAgICAgIHBob25lSW5wdXQxLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsICh7dGFyZ2V0fSkgPT4ge1xuICAgICAgICBjb25zdCBsZW5ndGggPSB0YXJnZXQudmFsdWUubGVuZ3RoXG4gICAgICAgIGlmIChsZW5ndGg+IDAgJiYgbGVuZ3RoIDwgMykge1xuICAgICAgICAgIHRhcmdldC52YWx1ZSA9ICcnXG4gICAgICAgIH1cbiAgICAgICAgc2V0UGhvbmUodGFyZ2V0LnZhbHVlLCBudWxsLCBudWxsLCBudWxsKVxuICAgICAgfSlcblxuICAgICAgcGhvbmVJbnB1dDIuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCAoe3RhcmdldH0pID0+IHtcbiAgICAgICAgY29uc3QgcmVnID0gL15bMC05XXsxLDN9JC9cbiAgICAgICAgaWYgKCFyZWcudGVzdCh0YXJnZXQudmFsdWUpKSB7XG4gICAgICAgICAgdGFyZ2V0LnZhbHVlID0gdGFyZ2V0LnZhbHVlLnNsaWNlKDAsIDMpXG4gICAgICAgIH1cbiAgICAgICAgaWYgKHRhcmdldC52YWx1ZS5sZW5ndGggPiAyKSB7XG4gICAgICAgICAgcGhvbmVJbnB1dDMuZm9jdXMoKVxuICAgICAgICB9XG4gICAgICAgIGlmICh0YXJnZXQudmFsdWUubGVuZ3RoIDwgMSkge1xuICAgICAgICAgIHBob25lSW5wdXQxLmZvY3VzKClcbiAgICAgICAgfVxuICAgICAgfSlcbiAgICAgIHBob25lSW5wdXQyLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsICh7dGFyZ2V0fSkgPT4ge1xuICAgICAgICBjb25zdCBsZW5ndGggPSB0YXJnZXQudmFsdWUubGVuZ3RoXG4gICAgICAgIGlmIChsZW5ndGg+IDAgJiYgbGVuZ3RoIDwgMykge1xuICAgICAgICAgIHRhcmdldC52YWx1ZSA9ICcnXG4gICAgICAgIH1cbiAgICAgICAgc2V0UGhvbmUobnVsbCwgdGFyZ2V0LnZhbHVlLCBudWxsLCBudWxsKVxuICAgICAgfSlcblxuICAgICAgcGhvbmVJbnB1dDMuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCAoe3RhcmdldH0pID0+IHtcbiAgICAgICAgY29uc3QgcmVnID0gL15bMC05XXsxLDJ9JC9cbiAgICAgICAgaWYgKCFyZWcudGVzdCh0YXJnZXQudmFsdWUpKSB7XG4gICAgICAgICAgdGFyZ2V0LnZhbHVlID0gdGFyZ2V0LnZhbHVlLnNsaWNlKDAsIDIpXG4gICAgICAgIH1cbiAgICAgICAgaWYgKHRhcmdldC52YWx1ZS5sZW5ndGggPiAxKSB7XG4gICAgICAgICAgcGhvbmVJbnB1dDQuZm9jdXMoKVxuICAgICAgICB9XG4gICAgICAgIGlmICh0YXJnZXQudmFsdWUubGVuZ3RoIDwgMSkge1xuICAgICAgICAgIHBob25lSW5wdXQyLmZvY3VzKClcbiAgICAgICAgfVxuICAgICAgfSlcbiAgICAgIHBob25lSW5wdXQzLmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsICh7dGFyZ2V0fSkgPT4ge1xuICAgICAgICBjb25zdCBsZW5ndGggPSB0YXJnZXQudmFsdWUubGVuZ3RoXG4gICAgICAgIGlmIChsZW5ndGg+IDAgJiYgbGVuZ3RoIDwgMikge1xuICAgICAgICAgIHRhcmdldC52YWx1ZSA9ICcnXG4gICAgICAgIH1cbiAgICAgICAgc2V0UGhvbmUobnVsbCwgbnVsbCwgdGFyZ2V0LnZhbHVlLCBudWxsKVxuICAgICAgfSlcblxuICAgICAgcGhvbmVJbnB1dDQuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCAoe3RhcmdldH0pID0+IHtcbiAgICAgICAgY29uc3QgcmVnID0gL15bMC05XXsxLDJ9JC9cbiAgICAgICAgaWYgKCFyZWcudGVzdCh0YXJnZXQudmFsdWUpKSB7XG4gICAgICAgICAgdGFyZ2V0LnZhbHVlID0gdGFyZ2V0LnZhbHVlLnNsaWNlKDAsIDIpXG4gICAgICAgIH1cbiAgICAgICAgaWYgKHRhcmdldC52YWx1ZS5sZW5ndGggPCAxKSB7XG4gICAgICAgICAgcGhvbmVJbnB1dDMuZm9jdXMoKVxuICAgICAgICB9XG4gICAgICB9KVxuICAgICAgcGhvbmVJbnB1dDQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgKHt0YXJnZXR9KSA9PiB7XG4gICAgICAgIGNvbnN0IGxlbmd0aCA9IHRhcmdldC52YWx1ZS5sZW5ndGhcbiAgICAgICAgaWYgKGxlbmd0aD4gMCAmJiBsZW5ndGggPCAyKSB7XG4gICAgICAgICAgdGFyZ2V0LnZhbHVlID0gJydcbiAgICAgICAgfVxuICAgICAgICBzZXRQaG9uZShudWxsLCBudWxsLCBudWxsLCB0YXJnZXQudmFsdWUpXG4gICAgICB9KVxuXG4gICAgICBmdW5jdGlvbiBzZXRQaG9uZShwMSwgcDIsIHAzLCBwNCkge1xuICAgICAgICBzdGF0ZS5waG9uZSA9IGArNyR7cDEgPyBwMSA6IHBob25lSW5wdXQxLnZhbHVlfSR7cDIgPyBwMiA6IHBob25lSW5wdXQyLnZhbHVlfSR7cDMgPyBwMyA6IHBob25lSW5wdXQzLnZhbHVlfSR7cDQgPyBwNCA6IHBob25lSW5wdXQ0LnZhbHVlfWBcbiAgICAgICAgY2hlY2tBbGwoKVxuICAgICAgfVxuICAgICAgLy8gcGhvbmUgaW5wdXRzIGVuZFxuXG4gICAgICAvLyBmbGF0cGlja3JzXG4gICAgICBjb25zdCBmbGF0cGlja3JPYmogPSB7XG4gICAgICAgIGRFbDogZGF5SW5wdXQsXG4gICAgICAgIHRFbDogdGltZUlucHV0LFxuICAgICAgICBkT3B0OiB7XG4gICAgICAgICAgZGVmYXVsdERhdGU6IG5ldyBEYXRlKCksXG4gICAgICAgICAgbWluRGF0ZTogXCJ0b2RheVwiLFxuICAgICAgICAgIG1heERhdGU6IG5ldyBEYXRlKCkuZnBfaW5jcigzMCksIC8vIDMwIGRheXMgZnJvbSBub3csXG4gICAgICAgICAgZGlzYWJsZTogW10sXG4gICAgICAgICAgZGF0ZUZvcm1hdDogXCJGOmw6ZFwiLFxuICAgICAgICAgIFwibG9jYWxlXCI6IFwicnVcIixcbiAgICAgICAgICBvblJlYWR5OiAoc2VsZWN0ZWREYXRlcywgZGF0ZVN0ciwgaW5zdGFuY2UpID0+IHtcbiAgICAgICAgICAgIC8vIGNvbnNvbGUubG9nKHNlbGVjdGVkRGF0ZXMsIGRhdGVTdHIsIGluc3RhbmNlKTtcbiAgICAgICAgICAgIHBhcnNlRGF0ZUFuZFNldHVwU3BhbnMoZGF0ZVN0cilcbiAgICAgICAgICB9LFxuICAgICAgICAgIG9uQ2xvc2U6IChzZWxlY3RlZERhdGVzLCBkYXRlU3RyLCBpbnN0YW5jZSkgPT4ge1xuICAgICAgICAgICAgLy8gY29uc29sZS5sb2coc2VsZWN0ZWREYXRlcywgZGF0ZVN0ciwgaW5zdGFuY2UpO1xuICAgICAgICAgICAgcGFyc2VEYXRlQW5kU2V0dXBTcGFucyhkYXRlU3RyKVxuICAgICAgICAgIH0sXG4gICAgICAgICAgb25DaGFuZ2U6IChzZWxlY3RlZERhdGVzLCBkYXRlU3RyLCBpbnN0YW5jZSkgPT4ge1xuICAgICAgICAgICAgZGF5SW5wdXRIaWRkZW4udmFsdWUgPSBkYXRlU3RyXG4gICAgICAgICAgICBzdGF0ZS5kYXkgPSBkYXRlU3RyXG4gICAgICAgICAgICBjaGVja0FsbCgpXG4gICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICB0T3B0OiB7XG4gICAgICAgICAgZW5hYmxlVGltZTogdHJ1ZSxcbiAgICAgICAgICBub0NhbGVuZGFyOiB0cnVlLFxuICAgICAgICAgIGRhdGVGb3JtYXQ6IFwiSDppXCIsXG4gICAgICAgICAgdGltZV8yNGhyOiB0cnVlLFxuICAgICAgICAgIGRlZmF1bHREYXRlOiBuZXcgRGF0ZSgpLFxuICAgICAgICAgIG1pblRpbWU6IG5ldyBEYXRlKCksXG4gICAgICAgICAgXCJsb2NhbGVcIjogXCJydVwiLFxuICAgICAgICAgIG9uUmVhZHk6IChzZWxlY3RlZERhdGVzLCBkYXRlU3RyLCBpbnN0YW5jZSkgPT4ge1xuICAgICAgICAgICAgLy8gY29uc29sZS5sb2coc2VsZWN0ZWREYXRlcywgZGF0ZVN0ciwgaW5zdGFuY2UpO1xuICAgICAgICAgICAgcGFyc2VUaW1lQW5kU2V0dXBTcGFucyhkYXRlU3RyKVxuICAgICAgICAgIH0sXG4gICAgICAgICAgb25DbG9zZTogKHNlbGVjdGVkRGF0ZXMsIGRhdGVTdHIsIGluc3RhbmNlKSA9PiB7XG4gICAgICAgICAgICAvLyBjb25zb2xlLmxvZyhzZWxlY3RlZERhdGVzLCBkYXRlU3RyLCBpbnN0YW5jZSk7XG4gICAgICAgICAgICBwYXJzZVRpbWVBbmRTZXR1cFNwYW5zKGRhdGVTdHIpXG4gICAgICAgICAgfSxcbiAgICAgICAgICBvbkNoYW5nZTogKHNlbGVjdGVkRGF0ZXMsIGRhdGVTdHIsIGluc3RhbmNlKSA9PiB7XG4gICAgICAgICAgICBjbGVhckludGVydmFsKGludGVydmFsVXBkYXRlVGltZUZsYXRwaWNrcilcbiAgICAgICAgICAgIHRpbWVJbnB1dEhpZGRlbi52YWx1ZSA9IGRhdGVTdHJcbiAgICAgICAgICAgIHN0YXRlLnRpbWUgPSBkYXRlU3RyXG4gICAgICAgICAgICBjaGVja0FsbCgpXG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIGZsYXRwaWNrck9iai5pbml0RFBpY2tlciA9ICgpID0+IHtcbiAgICAgICAgcmV0dXJuIGZsYXRwaWNrcihmbGF0cGlja3JPYmouZEVsLCBmbGF0cGlja3JPYmouZE9wdClcbiAgICAgIH1cbiAgICAgIGZsYXRwaWNrck9iai5pbml0VFBpY2tlciA9ICgpID0+IHtcbiAgICAgICAgcmV0dXJuIGZsYXRwaWNrcihmbGF0cGlja3JPYmoudEVsLCBmbGF0cGlja3JPYmoudE9wdClcbiAgICAgIH1cblxuICAgICAgY29uc3QgZGF5RmxhdHBpY2tyID0gZmxhdHBpY2tyT2JqLmRJbnN0YW5jZSA9IGZsYXRwaWNrck9iai5pbml0RFBpY2tlcigpXG4gICAgICBjb25zdCB0aW1lRmxhdHBpY2tyID0gZmxhdHBpY2tyT2JqLnRJbnN0YW5jZSA9IGZsYXRwaWNrck9iai5pbml0VFBpY2tlcigpXG5cbiAgICAgIGZsYXRwaWNrck9iai5kZXN0cm95UGlja2VycyA9ICgpID0+IHtcbiAgICAgICAgZmxhdHBpY2tyT2JqLmRJbnN0YW5jZS5kZXN0cm95KClcbiAgICAgICAgZmxhdHBpY2tyT2JqLnRJbnN0YW5jZS5kZXN0cm95KClcbiAgICAgIH1cblxuICAgICAgZmxhdHBpY2tyT2JqLmluaXRQaWNrZXJzID0gKCkgPT4ge1xuICAgICAgICBmbGF0cGlja3JPYmouZEluc3RhbmNlID0gZmxhdHBpY2tyT2JqLmluaXREUGlja2VyKClcbiAgICAgICAgZmxhdHBpY2tyT2JqLnRJbnN0YW5jZSA9IGZsYXRwaWNrck9iai5pbml0VFBpY2tlcigpXG4gICAgICB9XG5cbiAgICAgIGZsYXRwaWNrckFyci5wdXNoKGZsYXRwaWNrck9iailcbiAgICAgIHdpbmRvdy50aW1lRmxhdHBpY2tyID0gdGltZUZsYXRwaWNrclxuXG4gICAgICBmdW5jdGlvbiBwYXJzZURhdGVBbmRTZXR1cFNwYW5zKGQpIHtcbiAgICAgICAgY29uc3QgZGF0YSA9IGQuc3BsaXQoJzonKVxuXG4gICAgICAgIHdlZWtkYXkudGV4dENvbnRlbnQgPSBkYXRhWzFdXG4gICAgICAgIG1vbnRoLnRleHRDb250ZW50ID0gZGF0YVswXVxuICAgICAgICBkYXlTcGFuLnRleHRDb250ZW50ID0gZGF0YVsyXVxuICAgICAgfVxuXG4gICAgICBmdW5jdGlvbiBwYXJzZVRpbWVBbmRTZXR1cFNwYW5zKHQpIHtcbiAgICAgICAgY29uc3QgdGltZSA9IHQuc3BsaXQoJzonKVxuXG4gICAgICAgIHRpbWVIb3Vyc1NwYW4udGV4dENvbnRlbnQgPSB0aW1lWzBdXG4gICAgICAgIHRpbWVNaW51dGVzU3Bhbi50ZXh0Q29udGVudCA9IHRpbWVbMV1cbiAgICAgIH1cblxuICAgICAgaW50ZXJ2YWxVcGRhdGVUaW1lRmxhdHBpY2tyID0gc2V0SW50ZXJ2YWwoKCkgPT4ge1xuICAgICAgICAvLyBjb25zb2xlLmxvZygnaW50ZXJ2YWxVcGRhdGVUaW1lRmxhdHBpY2tyJyk7XG4gICAgICAgIGNvbnN0IHQgPSBuZXcgRGF0ZSgpXG4gICAgICAgIGNvbnN0IGggPSB0LmdldEhvdXJzKClcbiAgICAgICAgY29uc3QgbSA9IHQuZ2V0TWludXRlcygpXG4gICAgICAgIGNvbnN0IGRhdGVTdHIgPSBgJHtoIDwgMTAgPyAnMCcraCA6IGh9OiR7bSA8IDEwID8gJzAnK20gOiBtfWBcbiAgICAgICAgcGFyc2VUaW1lQW5kU2V0dXBTcGFucyhkYXRlU3RyKVxuICAgICAgfSwgNjAwMDApXG4gICAgICAvLyBmbGF0cGlja3JzIGVuZFxuXG4gICAgICAvLyBjaGVja3NcbiAgICAgIGZ1bmN0aW9uIGNoZWNrRGF5KCkge1xuICAgICAgICBpZiAoIXN0YXRlLmRheSkge1xuICAgICAgICAgIGRheUNvbnRhaW5lci5jbGFzc0xpc3QuYWRkKCdlcnJvcicpXG4gICAgICAgICAgcmV0dXJuIGZhbHNlXG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgZGF5Q29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoJ2Vycm9yJylcbiAgICAgICAgICByZXR1cm4gdHJ1ZVxuICAgICAgICB9XG4gICAgICB9XG4gICAgICBmdW5jdGlvbiBjaGVja1RpbWUoKSB7XG4gICAgICAgIGlmICghc3RhdGUudGltZSkge1xuICAgICAgICAgIHRpbWVDb250YWluZXIuY2xhc3NMaXN0LmFkZCgnZXJyb3InKVxuICAgICAgICAgIHJldHVybiBmYWxzZVxuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIHRpbWVDb250YWluZXIuY2xhc3NMaXN0LnJlbW92ZSgnZXJyb3InKVxuICAgICAgICAgIHJldHVybiB0cnVlXG4gICAgICAgIH1cbiAgICAgIH1cbiAgICAgIGZ1bmN0aW9uIGNoZWNrTmFtZSgpIHtcbiAgICAgICAgaWYgKCFzdGF0ZS5uYW1lKSB7XG4gICAgICAgICAgbmFtZUNvbnRhaW5lci5jbGFzc0xpc3QuYWRkKCdlcnJvcicpXG4gICAgICAgICAgcmV0dXJuIGZhbHNlXG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgbmFtZUNvbnRhaW5lci5jbGFzc0xpc3QucmVtb3ZlKCdlcnJvcicpXG4gICAgICAgICAgcmV0dXJuIHRydWVcbiAgICAgICAgfVxuICAgICAgfVxuICAgICAgZnVuY3Rpb24gY2hlY2tQaG9uZSgpIHtcbiAgICAgICAgY29uc3QgcmVnID0gL15bK103XFxkezEwfSQvXG4gICAgICAgIGlmICghcmVnLnRlc3Qoc3RhdGUucGhvbmUpKSB7XG4gICAgICAgICAgcGhvbmVDb250YWluZXIuY2xhc3NMaXN0LmFkZCgnZXJyb3InKVxuICAgICAgICAgIHJldHVybiBmYWxzZVxuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgIHBob25lQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoJ2Vycm9yJylcbiAgICAgICAgICByZXR1cm4gdHJ1ZVxuICAgICAgICB9XG4gICAgICB9XG5cbiAgICAgIGZ1bmN0aW9uIGNoZWNrQWxsKCkge1xuICAgICAgICBjb25zdCBjaGVja3MgPSBbY2hlY2tEYXksIGNoZWNrVGltZSwgY2hlY2tOYW1lLCBjaGVja1Bob25lXVxuICAgICAgICBsZXQgc3RhdHVzID0gdHJ1ZVxuICAgICAgICBjb25zdCBjaGVja3NCb29sID0gY2hlY2tzLmZvckVhY2goZm4gPT4ge1xuICAgICAgICAgIGNvbnN0IHMgPSBmbigpXG4gICAgICAgICAgaWYgKCFzKSBzdGF0dXMgPSBzXG4gICAgICAgIH0pXG5cbiAgICAgICAgaWYgKHN0YXR1cykge1xuICAgICAgICAgIGVycm9yQ29udGFpbmVyLmNsYXNzTGlzdC5yZW1vdmUoJ2lzLWVycm9yJylcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICBlcnJvckNvbnRhaW5lci5jbGFzc0xpc3QuYWRkKCdpcy1lcnJvcicpXG4gICAgICAgIH1cblxuICAgICAgICByZXR1cm4gc3RhdHVzXG4gICAgICB9XG4gICAgICAvLyBjaGVja3MgZW5kXG4gICAgfVxuICApXG59XG4iXSwibmFtZXMiOlsiaW5pdEhpdFNsaWRlckFsbCIsInNsaWRlcnMiLCJBcnJheSIsInByb3RvdHlwZSIsImZvckVhY2giLCJjYWxsIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwic2xpZGVyV3JhcCIsIml0ZW0iLCJTd2lwZXIiLCJxdWVyeVNlbGVjdG9yIiwic3BhY2VCZXR3ZWVuIiwic2xpZGVzUGVyVmlldyIsImZyZWVNb2RlIiwibmF2aWdhdGlvbiIsIm5leHRFbCIsInByZXZFbCIsImJyZWFrcG9pbnRzIiwicHJlbG9hZEltYWdlcyIsImxhenkiLCJhZGQiLCJpbml0SGl0U2xpZGVyT25Nb2JpbGVBbGwiLCJicmVha3BvaW50Iiwid2luZG93IiwibWF0Y2hNZWRpYSIsInN3aXBlckluc3RhbmNlIiwiYnJlYWtwb2ludENoZWNrZXIiLCJtYXRjaGVzIiwidW5kZWZpbmVkIiwiZGVzdHJveSIsInNldFRpbWVvdXQiLCJlbmFibGVTd2lwZXIiLCJhZGRMaXN0ZW5lciIsImluaXRSZXZpZXdTbGlkZXJBbGwiLCJwYWdpbmF0aW9uIiwiZWwiLCJ0eXBlIiwiaW5pdFZpZGVvQWxsIiwidmlkZW9zIiwic2V0dXBWaWRlbyIsInZpZGVvIiwibGluayIsIm1lZGlhIiwiYnV0dG9uIiwiaWQiLCJwYXJzZU1lZGlhVVJMIiwiYWRkRXZlbnRMaXN0ZW5lciIsImlmcmFtZSIsImNyZWF0ZUlmcmFtZSIsInJlbW92ZSIsImFwcGVuZENoaWxkIiwicmVtb3ZlQXR0cmlidXRlIiwiY2xhc3NMaXN0IiwicmVnZXhwIiwidXJsIiwic3JjIiwibWF0Y2giLCJjcmVhdGVFbGVtZW50Iiwic2V0QXR0cmlidXRlIiwiZ2VuZXJhdGVVUkwiLCJxdWVyeSIsIkZhcSIsImVsZW1lbnQiLCJvcHRpb25zIiwiJGVsIiwiJGhlYWQiLCIkYm9keSIsImlzU2hvdyIsImRhdGFzZXQiLCJzZXR1cCIsImhhbmRsZUNsaWNrIiwiYmluZCIsInVwZGF0ZVNob3ciLCJlIiwic2V0SGlkZSIsInNldFNob3ciLCJvblVwZGF0ZSIsImluaXRBbGxGYXEiLCJmYXFzIiwicHVzaCIsImZhcSIsImYiLCJUYWJzIiwiJHRhYnMiLCIkcGFuZWxzIiwiY3VycmVudCIsImNvbnNvbGUiLCJsb2ciLCJmcm9tIiwicmVkdWNlIiwiYWNjIiwiT2JqZWN0IiwidmFsdWVzIiwiaGFuZGxlSG92ZXIiLCJ1cGRhdGVDdXJyZW50IiwidXBkYXRlIiwiaW5pdFRhYnMiLCJvcHQiLCJjb250YWlucyIsInNsaWRlcnNBcnIiLCJpbml0QWxsR2FsbGVyeSIsImxpZ2h0R2FsbGVyeSIsImluaXRBcnRpY2xlU2xpZGVyQWxsIiwic2xpZGVyIiwiTW9kYWxCb3giLCJidG5zVHJpZ2dlciIsIm9wdHMiLCJjbGFzc0FjdGl2ZSIsImV4dHJhQ2xhc3NIaWRlIiwidGltZW91dENsb3NlIiwid2lkdGhTY3JvbGxiYXIiLCJidG5zIiwibW9kYWxzIiwiYnRuc0Nsb3NlIiwibGFzdEVsZW1lbnRCZWZvcmVNb2RhbCIsImluaXQiLCJldmVudHMiLCJidG4iLCJvcGVuTW9kYWwiLCJtb2RhbFRhcmdldCIsImNsb3NlTW9kYWwiLCJjbG9zZXN0IiwibW9kYWwiLCJiYWNrRHJvcCIsImhhbmRsZXJLZXlEb3duTW9kYWwiLCJldmVudCIsImFjdGl2ZUVsZW1lbnQiLCJmb2N1cyIsImJvZHkiLCJzdHlsZSIsIm92ZXJmbG93IiwibWFyZ2luUmlnaHQiLCJoYXNPd25Qcm9wZXJ0eSIsIm9uQ2xvc2UiLCJ0YXJnZXQiLCJjdXJyZW50VGFyZ2V0Iiwia2V5Q29kZSIsImNsb3NlTW9kYWxBbGwiLCJkaXYiLCJvdmVyZmxvd1kiLCJ3aWR0aCIsImhlaWdodCIsImFwcGVuZCIsInNjcm9sbFdpZHRoIiwib2Zmc2V0V2lkdGgiLCJjbGllbnRXaWR0aCIsImluaXRNb2RhbCIsIm1vZGFsQm94Iiwic2xpZGVyc0FyckNsYXNzIiwicyIsImluaXRGb3JtIiwic2VuZE1haWwiLCJmbGF0cGlja3JBcnIiLCJyZXNldEZsYXRwaWNrckFyciIsImRlc3Ryb3lQaWNrZXJzIiwiaW5pdFBpY2tlcnMiLCJmb3JtIiwiaW50ZXJ2YWxVcGRhdGVUaW1lRmxhdHBpY2tyIiwiZGF5Q29udGFpbmVyIiwid2Vla2RheSIsIm1vbnRoIiwiZGF5SW5wdXQiLCJkYXlJbnB1dEhpZGRlbiIsImRheVNwYW4iLCJ0aW1lQ29udGFpbmVyIiwidGltZUlucHV0IiwidGltZUlucHV0SGlkZGVuIiwidGltZUhvdXJzU3BhbiIsInRpbWVNaW51dGVzU3BhbiIsImd1ZXN0SW5wdXQiLCJuYW1lQ29udGFpbmVyIiwibmFtZUlucHV0IiwicGhvbmVDb250YWluZXIiLCJwaG9uZUlucHV0MSIsInBob25lSW5wdXQyIiwicGhvbmVJbnB1dDMiLCJwaG9uZUlucHV0NCIsImVycm9yQ29udGFpbmVyIiwic3RhdGUiLCJkYXkiLCJ2YWx1ZSIsInRpbWUiLCJndWVzdHMiLCJuYW1lIiwicGhvbmUiLCJwcmV2ZW50RGVmYXVsdCIsImNoZWNrQWxsIiwibWluIiwiZ2V0QXR0cmlidXRlIiwibWF4IiwicmVnIiwidGVzdCIsInNsaWNlIiwibGVuZ3RoIiwic2V0UGhvbmUiLCJwMSIsInAyIiwicDMiLCJwNCIsImZsYXRwaWNrck9iaiIsImRFbCIsInRFbCIsImRPcHQiLCJkZWZhdWx0RGF0ZSIsIkRhdGUiLCJtaW5EYXRlIiwibWF4RGF0ZSIsImZwX2luY3IiLCJkaXNhYmxlIiwiZGF0ZUZvcm1hdCIsIm9uUmVhZHkiLCJzZWxlY3RlZERhdGVzIiwiZGF0ZVN0ciIsImluc3RhbmNlIiwicGFyc2VEYXRlQW5kU2V0dXBTcGFucyIsIm9uQ2hhbmdlIiwidE9wdCIsImVuYWJsZVRpbWUiLCJub0NhbGVuZGFyIiwidGltZV8yNGhyIiwibWluVGltZSIsInBhcnNlVGltZUFuZFNldHVwU3BhbnMiLCJjbGVhckludGVydmFsIiwiaW5pdERQaWNrZXIiLCJmbGF0cGlja3IiLCJpbml0VFBpY2tlciIsImRheUZsYXRwaWNrciIsImRJbnN0YW5jZSIsInRpbWVGbGF0cGlja3IiLCJ0SW5zdGFuY2UiLCJkIiwiZGF0YSIsInNwbGl0IiwidGV4dENvbnRlbnQiLCJ0Iiwic2V0SW50ZXJ2YWwiLCJoIiwiZ2V0SG91cnMiLCJtIiwiZ2V0TWludXRlcyIsImNoZWNrRGF5IiwiY2hlY2tUaW1lIiwiY2hlY2tOYW1lIiwiY2hlY2tQaG9uZSIsImNoZWNrcyIsInN0YXR1cyIsImNoZWNrc0Jvb2wiLCJmbiJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQU8sU0FBU0EsZ0JBQVQsQ0FBMEJDLE9BQTFCLEVBQW1DO0VBQ3hDQyxLQUFLLENBQUNDLFNBQU4sQ0FBZ0JDLE9BQWhCLENBQXdCQyxJQUF4QixDQUNFQyxRQUFRLENBQUNDLGdCQUFULENBQTBCLGdCQUExQixDQURGLEVBRUUsVUFBQUMsVUFBVSxFQUFJO1FBRU5DLElBQUksR0FBRyxJQUFJQyxNQUFKLENBQVdGLFVBQVUsQ0FBQ0csYUFBWCxDQUF5QixtQkFBekIsQ0FBWCxFQUEwRDtNQUNyRUMsWUFBWSxFQUFFLENBRHVEO01BRXJFQyxhQUFhLEVBQUUsR0FGc0Q7TUFHckVDLFFBQVEsRUFBRSxJQUgyRDtNQUlyRUMsVUFBVSxFQUFF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
