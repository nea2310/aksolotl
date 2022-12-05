/* eslint-disable no-console */
class Sidebar {
  constructor(element, elementName = 'sidebar') {
    this.elementName = elementName;
    this.wrapper = element;
    this._bindEventListeners();
    this._render();
  }

  _render() {
    this.button = this.wrapper.querySelector(`.${this.elementName}-button`);
    this.links = this.wrapper.querySelectorAll('a');
    this.setTabIndex();
    this._addEventListeners();
  }

  _bindEventListeners() {
    this._handleHeaderClickBurger = this._handleHeaderClickBurger.bind(this);
    this._handleWindowLoadResize = this._handleWindowLoadResize.bind(this);
  }

  _addEventListeners() {
    this.button.addEventListener('click', this._handleHeaderClickBurger);
    window.addEventListener('load', this._handleWindowLoadResize);
    window.addEventListener('resize', this._handleWindowLoadResize);
  }

  _handleHeaderClickBurger() {
    this.wrapper.classList.toggle(`${this.elementName}_active`);
    if (this.wrapper.classList.contains(`${this.elementName}_active`)) {
      this.setTabIndex('0');
      const focusLink = () => this.links[0].focus();
      setTimeout(focusLink, 500);
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

const sidebar = document.querySelector('.sidebar');
if (sidebar) {
  // eslint-disable-next-line no-new
  new Sidebar(sidebar);
}
