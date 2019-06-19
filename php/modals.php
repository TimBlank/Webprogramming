<div id="imgModal" class="modal">
    <span class="close" onclick="closeImgModal()">&times;</span>
    <img class="modal-content" id="modalImg">
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <?php echo $_SESSION["Message"];
                    $_SESSION["Message"] = NULL;
                    ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openImgModal(img) {
        var modalImg = document.getElementById("modalImg");
        modalImg.src = img;
        $('#imgModal').modal();
    }

    function closeImgModal() {
        $('#imgModal').modal('hide');
    }

    window.onload = function() {
        if (<?php
                    if (isset($_SESSION["Message"])) {
                        echo isset($_SESSION["Message"]);
                    } else
                        echo 0;
                ?>) {
            $('#myModal').modal();
        }
    }
</script>
