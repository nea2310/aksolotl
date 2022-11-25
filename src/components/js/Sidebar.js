/* eslint-disable no-console */
class Sidebar {
  constructor(element, elementName = 'sidebar') {
    this.elementName = elementName;
    this.wrapper = element;
    this._bindEventListeners();
    this._render();
  }

  _render() {
    this.burger = this.wrapper.querySelector(`.${this.elementName}-button`);
    this.content = this.wrapper.querySelector('.topmenu');
    this._addEventListeners();
  }

  _bindEventListeners() {
    this._handleHeaderClickBurger = this._handleHeaderClickBurger.bind(this);
  }

  _addEventListeners() {
    this.burger.addEventListener('click', this._handleHeaderClickBurger);
  }

  _handleHeaderClickBurger() {
    this.wrapper.classList.toggle(`${this.elementName}_active`);
  }
}

const sidebar = document.querySelector('.sidebar');
if (sidebar) {
  // eslint-disable-next-line no-new
  new Sidebar(sidebar);
}
