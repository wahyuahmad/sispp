const flashdata = $(".pesan").data("flashdata");
if (flashdata) {
	Swal.fire({
		title: "Data Berhasil",
		text: flashdata,
		icon: "success",
	});
}
