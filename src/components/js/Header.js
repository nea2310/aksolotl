class Header {
  constructor(element, elementName = 'header') {
    this.elementName = elementName;
    this.wrapper = element;

    this._bindEventListeners();
    this._render();
  }

  _render() {
    this.burger = this.wrapper.querySelector(`.${this.elementName}__burger-button`);
    this.content = this.wrapper.querySelector('.topmenu');
    this.links = this.wrapper.querySelectorAll('a');
    this.setTabIndex();
    this._addEventListeners();
  }

  _bindEventListeners() {
    this._handleHeaderClickBurger = this._handleHeaderClickBurger.bind(this);
    this._handleHeaderResizeWindow = this._handleHeaderResizeWindow.bind(this);
    this._handleWindowLoadResize = this._handleWindowLoadResize.bind(this);
  }

  _addEventListeners() {
    this.burger.addEventListener('click', this._handleHeaderClickBurger);
    window.addEventListener('resize', this._handleHeaderResizeWindow);
    window.addEventListener('load', this._handleWindowLoadResize);
    window.addEventListener('resize', this._handleWindowLoadResize);
  }

  _handleHeaderResizeWindow() {
    if (this.burger.classList
      .contains(`${this.elementName}__burger-button_active`)) {
      this._handleHeaderClickBurger();
    }
  }

  _handleHeaderClickBurger() {
    this.burger.classList.toggle(`${this.elementName}__burger-button_active`);
    this.content.classList.toggle('topmenu_active');

    if (this.content.classList.contains('topmenu_active')) {
      this.setTabIndex('0');
      const focusLink = () => this.links[1].focus();
      setTimeout(focusLink, 300);
      return;
    }
    this.setTabIndex();
  }

  _handleWindowLoadResize() {
    const breakPoint = 767;
    if (window.innerWidth > breakPoint) {
      this.setTabIndex('0');
      return;
    }
    this.setTabIndex('-1');
  }

  setTabIndex(tabindex = '-1') {
    this.links.forEach((link) => link.setAttribute('tabindex', tabindex));
  }
}

const header = document.querySelector('.header');
// eslint-disable-next-line no-new
new Header(header);
