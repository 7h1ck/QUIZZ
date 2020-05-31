</div>

</body>
<script>
    function prevUpload()
{
    document.getElementById('error_f').innerText="";
    var file = document.getElementById("imgUser").files[0];
    var reader = new FileReader();
    if (file) {
        reader.readAsDataURL(file);
        reader.onloadend = function () {
        document.getElementById("avatar").src = reader.result;
        }
    }
}
</script>

</html>