import { MySegmentedRadio } from "./components/segmented-radio.js";
import { MyToggle } from "./components/toggle.js";

declare module "*.css" {
  const content: CSSStyleSheet;
  export default content;
}

declare global {
  interface HTMLElementTagNameMap {
    "my-segmented-radio": MySegmentedRadio;
    "my-toggle": MyToggle;
  }
}
