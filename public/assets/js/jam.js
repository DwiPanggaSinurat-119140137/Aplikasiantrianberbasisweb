var prevHour = new Date().getHours();
var prevDay = new Date().getDay();

function updateClock() {
  var currentTime = new Date();
  var hours = currentTime.getHours();
  var day = currentTime.getDay();
  var hours1 = hours - 1;
  // Format waktu dalam string
  var currentTimeString = hours1 + ".00-" + hours + ".00";

  // Periksa apakah jam berubah
  if (hours !== prevHour) {
    // Eksekusi rute atau logika lainnya saat jam berubah
    console.log("Jam berubah! Eksekusi rute atau logika lainnya.");
    console.log(hours);
    console.log(prevHour);
    console.log(currentTimeString);

    // Update waktu sebelumnya
    prevHour = hours;

    // Perbarui juga prevDay jika perlu
    prevDay = day;

    // Panggil URL di CI4
    fetch(`http://localhost:8080/admin/antrian/${currentTimeString}`);
  } else if (day !== prevDay) {
    // Update prevDay jika hari berubah
    prevDay = day;
    fetch(`http://localhost:8080/admin/antrianulang`);
  }
}

// Panggil fungsi updateClock setiap detik (1000 milidetik)
setInterval(updateClock, 1000);

// Panggil fungsi updateClock untuk memperbarui waktu saat halaman dimuat
updateClock();
