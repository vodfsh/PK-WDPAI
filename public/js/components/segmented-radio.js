import globalStyles from "../../css/main.css" with { type: "css" };

export class MySegmentedRadio extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });
    this.shadowRoot.adoptedStyleSheets = [globalStyles];
  }

  static get observedAttributes() {
    return ["value"];
  }

  get value() {
    return this.getAttribute("value");
  }

  set value(newValue) {
    this.setAttribute("value", newValue);
  }

  connectedCallback() {
    this.render();
  }

  attributeChangedCallback(name, oldValue, newValue) {
    if (name === "value" && oldValue !== newValue && this.shadowRoot) {
      const radios = this.shadowRoot.querySelectorAll('input[type="radio"]');
      radios.forEach((radio) => {
        // @ts-ignore
        radio.checked = radio.value === newValue;
      });

      this.dispatchEvent(
        new CustomEvent("change", {
          detail: { value: newValue },
          bubbles: true,
          composed: true,
        }),
      );
    }
  }

  render() {
    const options = Array.from(this.querySelectorAll("option")).map((opt) => ({
      value: opt.value || opt.textContent.trim(),
      label: opt.textContent.trim(),
      selected: opt.hasAttribute("selected") || opt.selected,
      hidden: opt.hasAttribute("hidden") || opt.hidden,
    }));

    const defaultSelectedOption = options.find((opt) => opt.selected);
    const currentValue = this.getAttribute("value") || defaultSelectedOption?.value || options[0]?.value;

    this.setAttribute("value", currentValue);

    const name = this.getAttribute("name") || "segmented-group";

    this.shadowRoot.innerHTML = `
      <div part="container" class="my-segmented-radio">
        ${options
          .map((opt, index) => {
            const id = `seg-${name}-${index}`;
            const isChecked = opt.value === currentValue;
            return `
            <input part="input" style="opacity: 0; position: absolute" type="radio" id="${id}" name="${name}" value="${opt.value}" ${isChecked ? "checked" : ""} ${opt.hidden ? "hidden" : ""}>
            <label part="button" class="btn ${opt.hidden ? "hidden" : ""}" for="${id}">${opt.label}</label>
          `;
          })
          .join("")}
      </div>
    `;

    // Hide original light DOM options so they don't render visually
    this.querySelectorAll("option").forEach((opt) => (opt.style.display = "none"));

    // Handle selection changes and bubble them up cleanly
    this.shadowRoot.querySelectorAll('input[type="radio"]').forEach((radio) => {
      radio.addEventListener("change", (e) => {
        // @ts-ignore
        const value = e.target.value;
        this.value = value;
        this.dispatchEvent(
          new CustomEvent("change", {
            detail: { value: value },
            bubbles: true,
            composed: true,
          }),
        );
      });
    });
  }
}

customElements.define("my-segmented-radio", MySegmentedRadio);
