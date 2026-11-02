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

  connectedCallback() {
    this.render();
  }

  render() {
    const options = Array.from(this.querySelectorAll("option")).map((opt) => ({
      value: opt.value || opt.textContent.trim(),
      label: opt.textContent.trim(),
      selected: opt.hasAttribute("selected") || opt.selected,
    }));

    const defaultSelectedOption = options.find((opt) => opt.selected);
    const currentValue = this.getAttribute("value") || defaultSelectedOption?.value || options[0]?.value;
    const name = this.getAttribute("name") || "segmented-group";

    this.shadowRoot.innerHTML = `
      <div part="container" class="my-segmented-radio">
        ${options
          .map((opt, index) => {
            const id = `seg-${name}-${index}`;
            const isChecked = opt.value === currentValue;
            return `
            <input part="input" hidden type="radio" id="${id}" name="${name}" value="${opt.value}" ${isChecked ? "checked" : ""}>
            <label part="button" class="button" for="${id}">${opt.label}</label>
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
        this.setAttribute("value", value);
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
