<header class="bg-light">
    <h1>Fahrrad Stellplätze</h1>
    <h2>Universität Oldenburg</h2>
    <script>
        window.onload = function() {
            if (<?php echo isset($_SESSION["Message"])?>) {
                $('#myModal').modal();
            }
        }

    </script>
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
</header>
