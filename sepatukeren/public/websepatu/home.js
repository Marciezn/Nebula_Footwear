console.log("✅ home.js aktif - mode nonstop & tombol berfungsi");

// Ambil elemen
const slider = document.querySelector(".category-slider");
const leftBtn = document.querySelector(".scroll-btn.left");
const rightBtn = document.querySelector(".scroll-btn.right");

// Gandakan isi kategori agar loop halus
slider.innerHTML += slider.innerHTML;

// Hitung lebar item + jarak antar item
const itemWidth = slider.querySelector(".category-item").offsetWidth + 20;
const visibleCount = 8;
const scrollStep = itemWidth * visibleCount;

// Variabel tracking posisi scroll
let scrollAmount = 0;

// Fungsi scroll kanan (manual)
function scrollRight() {
  scrollAmount += scrollStep;
  if (scrollAmount >= slider.scrollWidth / 2) scrollAmount = 0;
  slider.scrollTo({ left: scrollAmount, behavior: "smooth" });
}

// Fungsi scroll kiri (manual)
function scrollLeft() {
  scrollAmount -= scrollStep;
  if (scrollAmount < 0) scrollAmount = slider.scrollWidth / 2;
  slider.scrollTo({ left: scrollAmount, behavior: "smooth" });
}

// Tombol klik
rightBtn.addEventListener("click", scrollRight);
leftBtn.addEventListener("click", scrollLeft);

// --- ANIMASI NONSTOP TANPA HENTI ---
const scrollSpeed = 0.5; // px per frame, kecil = lambat

function continuousScroll() {
  slider.scrollLeft += scrollSpeed;

  // Kalau udah sampai setengah (karena isi digandakan)
  if (slider.scrollLeft >= slider.scrollWidth / 2) {
    slider.scrollLeft = 0; // reset ke awal, halus
  }

  requestAnimationFrame(continuousScroll); // loop terus
}

// Jalankan animasi
continuousScroll();

// Opsional: berhenti pas hover (hapus kalau nggak mau berhenti)
slider.addEventListener("mouseenter", () => {
  cancelAnimationFrame(continuousScroll);
});
slider.addEventListener("mouseleave", continuousScroll);

// Toggle tombol "Read More" untuk memunculkan tombol aksi
document.querySelectorAll('.btn-readmore').forEach(btn => {
  btn.addEventListener('click', function() {
    const card = this.closest('.product-card');
    card.classList.toggle('active');
  });
});


document.addEventListener("DOMContentLoaded", () => {
    const dropdown = document.getElementById("kategoriDropdown");
    const toggle = dropdown.querySelector(".dropdown-toggle");

    toggle.addEventListener("click", (e) => {
        e.stopPropagation();
        dropdown.classList.toggle("open");
    });

    // Close if click outside
    document.addEventListener("click", () => {
        dropdown.classList.remove("open");
    });
});

