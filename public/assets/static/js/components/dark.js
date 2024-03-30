const THEME_KEY = "theme";

function setTheme(theme, persist = false) {
    document.body.classList.toggle("dark", theme === "dark");
    document.documentElement.setAttribute("data-bs-theme", theme);

    const themeIcon = document.getElementById("theme-icon");
    if (theme === "dark") {
        themeIcon.classList.remove("bi-sun");
        themeIcon.classList.add("bi-moon");
    } else {
        themeIcon.classList.remove("bi-moon");
        themeIcon.classList.add("bi-sun");
    }

    if (persist) {
        localStorage.setItem(THEME_KEY, theme);
    }
}

function initTheme() {
    const storedTheme = localStorage.getItem(THEME_KEY);
    if (storedTheme) {
        setTheme(storedTheme);
    } else {
        const mediaQuery = window.matchMedia("(prefers-color-scheme: dark)");
        setTheme(mediaQuery.matches ? "dark" : "light", true);
    }
}

window.addEventListener("DOMContentLoaded", () => {
    const lightThemeLink = document.getElementById("theme-light");
    const darkThemeLink = document.getElementById("theme-dark");

    lightThemeLink.addEventListener("click", () => setTheme("light", true));
    darkThemeLink.addEventListener("click", () => setTheme("dark", true));

    initTheme();
});
