Swal.fire({
    title: "Sorry! The product has already been purchased",
    icon: "error",
}).then(function () {
    window.location = "index.php";
});