import globalStyles from "../../css/main.css" with { type: "css" };

export class MyToggle extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.shadowRoot.adoptedStyleSheets = [globalStyles];
  }

  static get observedAttributes() {
    return ["checked"];
  }

  async connectedCallback() {
    this.render();
    this.shadowRoot.addEventListener("click", () => this.toggle());
  }

  /**
   * @param {string} name
   * @param {any} oldValue
   * @param {any} newValue
   */
  attributeChangedCallback(name, oldValue, newValue) {
    if (name === "checked" && oldValue !== newValue) {
      const btn = this.shadowRoot.querySelector("button");
      if (btn) {
        btn.setAttribute("aria-pressed", String(this.hasAttribute("checked")));
      }
    }
  }

  toggle() {
    const isChecked = this.hasAttribute("checked");

    if (isChecked) {
      this.removeAttribute("checked");
    } else {
      this.setAttribute("checked", "");
    }

    this.dispatchEvent(
      new CustomEvent("toggle-change", {
        detail: { checked: !isChecked },
        bubbles: true,
        composed: true,
      }),
    );
  }

  render() {
    const isChecked = this.hasAttribute("checked");
    const variant = this.getAttribute("variant");

    this.shadowRoot.innerHTML = `
      <button part="button" class="btn-${variant}" type="button" aria-pressed="${isChecked}">
        <slot></slot>
      </button>
    `;
  }
}

customElements.define("my-toggle", MyToggle);
