document.addEventListener("DOMContentLoaded", () => {
  // Lấy đường dẫn hiện tại
  const currentPath = window.location.pathname

  // Lấy tất cả các liên kết trong menu
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link")

  // Kiểm tra từng liên kết
  navLinks.forEach((link) => {
    const linkPath = link.getAttribute("href")

    // Nếu đường dẫn hiện tại chứa đường dẫn của liên kết (trừ trang chủ)
    if (linkPath !== "/" && currentPath.includes(linkPath)) {
      link.classList.add("active")
    }
    // Trường hợp đặc biệt cho trang chủ
    else if (linkPath === "/" && (currentPath === "/" || currentPath === "")) {
      link.classList.add("active")
    }
  })
})
