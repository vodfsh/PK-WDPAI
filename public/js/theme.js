const stored = localStorage.getItem("theme");
const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
const theme = stored || (prefersDark ? "dark" : "light");

document.documentElement.setAttribute("data-theme", theme);

document.addEventListener("DOMContentLoaded", () => {
  // Set the initial checked state of the toggle right away
  const toggle = document.getElementById("theme-toggle");
  if (theme === "dark") {
    toggle.setAttribute("checked", "");
  }
  toggle.addEventListener("change", () => {
    const currentTheme = document.documentElement.getAttribute("data-theme");
    const newTheme = currentTheme === "dark" ? "light" : "dark";

    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
  });
});
