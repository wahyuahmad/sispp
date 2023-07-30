<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SISPP | SMK MANUWANGSA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?php base_url() ?>/asset/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="<?php base_url() ?>/asset/fontawesome5/css/all.min.css">
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    <script src=https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5 ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-10 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <?= $this->rendersection("content"); ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

</html>