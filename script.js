// Dashboard Chart
if (document.getElementById("chartPemesanan")) {
  const ctx = document.getElementById("chartPemesanan");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
      datasets: [{
        label: "Jumlah Pemesanan",
        data: [10, 20, 15, 25, 30, 45, 40, 35, 20, 25, 15, 10],
        backgroundColor: "#00bcd4"
      }]
    },
    options: { responsive: true }
  });
}

// Laporan Chart
if (document.getElementById("chartPenjualan")) {
  const ctx2 = document.getElementById("chartPenjualan");
  new Chart(ctx2, {
    type: "bar",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"],
      datasets: [{
        label: "Penjualan",
        data: [5, 10, 8, 12, 15, 18, 20],
        backgroundColor: "#00bcd4"
      }]
    },
    options: { responsive: true }
  });
}

// Contoh fungsi CRUD Pengguna
document.querySelectorAll(".delete").forEach(btn => {
  btn.addEventListener("click", () => {
    btn.closest("tr").remove();
  });
});
