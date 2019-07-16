<script>
    function isInAspectRatio(nA, nB) {
        if (nB > nA) {
            // "Bilder im Hochformat werden nicht unterstützt.";
            return false;
        } else if (nA < nB * 2.5) {
            return true;
        } else {
            // "Das Bild ist in einem zu breiten Seitenverhältnis.";
            return false;
        }
    }

    //Quellen:
    //-https://stackoverflow.com/questions/14791247/how-to-create-image-uploader-with-preview
    //-https://stackoverflow.com/questions/15491193/getting-width-height-of-an-image-with-filereader
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);

                var image = new Image();

                image.src = e.target.result;

                image.onload = function() {
                    var width = image.width;
                    var height = image.height;
                        $('#imageError').empty();
                    var correctAspectRatio = isInAspectRatio(width, height);
                    var correctSize = (width <= 4000 && height <= 3000);
                    if (correctAspectRatio && correctSize) {
                        $('#imageError').append(" ");
                    } else {
                        if(!correctAspectRatio){
                        $('#imageError').append("Ungültiges Seitenverhältnis <br>");
                        }
                        if(!correctSize){
                           $('#imageError').append("Zu große Bildatei");
                        }
                    }
                }

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
