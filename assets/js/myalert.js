let flashdata = $(".flashdata").data("flashdata");
let halaman = $(".flashdata").data("halaman");
if (flashdata) {
	swal.fire({
		title: "Data " + halaman,
		text: "Data Berhasil " + flashdata,
		icon: "success",
	});
}

$(".btn-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin ?",
		text: "Data akan dihapus permanen",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus!",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
