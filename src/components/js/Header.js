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
    this._addEventListeners();
  }

  _bindEventListeners() {
    this._handleHeaderClickBurger = this._handleHeaderClickBurger.bind(this);
    this._handleHeaderResizeWindow = this._handleHeaderResizeWindow.bind(this);
  }

  _addEventListeners() {
    this.burger.addEventListener('click', this._handleHeaderClickBurger);
    window.addEventListener('resize', this._handleHeaderResizeWindow);
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
  }
}

const header = document.querySelector('.header');
// eslint-disable-next-line no-new
new Header(header);
