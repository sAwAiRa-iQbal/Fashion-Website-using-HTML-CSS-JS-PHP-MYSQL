<script>
  document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.querySelector(".menu-icon");
    const categoryPanel = document.getElementById("category-panel");

    // Toggle dropdown panel
    if (menuBtn && categoryPanel) {
      menuBtn.addEventListener("click", function (e) {
        e.stopPropagation(); // prevent bubbling to window click
        categoryPanel.classList.toggle("hidden");
      });
    }

    // Toggle submenus
    window.toggleSub = function (id) {
      const submenu = document.getElementById(id);
      if (submenu) {
        submenu.classList.toggle("hidden");
      }
    };

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
      if (
        !categoryPanel.contains(event.target) &&
        !menuBtn.contains(event.target)
      ) {
        categoryPanel.classList.add("hidden");
      }
    });
  });
</script>
