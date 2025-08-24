document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("light-dark-mode");

    if (!themeToggle) return;

    themeToggle.addEventListener("click", function(e) {
        e.preventDefault(); // keep <a> from navigating

        const currentTheme = document.body.getAttribute("data-theme") || "light";
        const newTheme = currentTheme === "light" ? "dark" : "light";

        // Update UI immediately
        document.body.setAttribute("data-theme", newTheme);

        // Save to backend (session)
        const url = document.querySelector('meta[name="theme-set-url"]').content;
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ theme: newTheme }),
            credentials: 'same-origin' // send session cookie
        })
        .then(res => res.json())
        .then(data => console.log("Theme saved in session:", data))
        .catch(err => console.error("Theme save failed", err));
    });
});
