<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job_request</title>
</head>

<body>
    <?php
    include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-20px;">
                    <?php
                    include("sidenav.php")
                        ?>
                </div>
                <div class="col-md-10">
                    <div class="text-center">Job Request</div>
                    <div id="show"></div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            show();

            function show() {
                $.ajax({
                    url: "ajax_job_request.php",
                    method: "POST",
                    success: function (data) {
                        $('#show').html(data);
                    }
                });
            }
            $(document).on('click', '.approve', function () {
                var id = $(this).attr("id");
                alert(id);
                $.ajax({
                    url: "ajax_approve.php",
                    method: "POST",
                    data: { id: id },
                    success: function (data) {
                        show();
                    }
                });
            });
        });

        $(document).on('click', '.reject', function () {
            var id = $(this).attr("id");
            alert(id);
            $.ajax({
                url: "ajax_reject.php",
                method: "POST",
                data: { id: id },
                success: function (data) {
                    show();
                }
            });
        });

    </script>
</body>

</html>