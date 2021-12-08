<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @page {
        margin: 0cm 0cm;
    }

    /** Define now the real margins of every page in the PDF **/
    body {
        margin-top: 2cm;
        margin-left: 2cm;
        margin-right: 2cm;
        margin-bottom: 2cm;
    }

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        padding: 0px 3cm;
        text-align: center;
        /** Extra personal styles **/
        color: white;
        line-height: 35px;
        font-family: Arial, Helvetica, sans-serif;
    }

    header .content {
        padding: 20px 0px;
        border-bottom: 1px solid #1E3A8A;
    }

    header .content .content-center{
        color:#111827;
        font-size:12px;
        padding:10px;
        text-align: center;
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 1cm;
        padding: 0cm 2cm;
        /** Extra personal styles **/
        background-color: #1E3A8A;
        color: white;
        text-align: center;
        justify-content: center;
        line-height: 30px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
    }

    header .logos {
       
    }

    main {
        font-family: Arial, Helvetica, sans-serif;
        padding-left: 1cm;
        padding-right: 1cm;
        margin-top: 150px;
    }

    .table-info {
        border-collapse: collapse;
        font-size: 12px;
        width: 100%;
    }

    .table-info tbody tr td {
        padding: 10px 10px;
        border-bottom: 1px solid #D1D5DB;
    }

    .table-info tbody tr .passport-img {
        text-align: center;
        padding: 30px 0px;

    }

</style>

<body>
    <header>
        <div class="content">
            <table width="100%">
                <tr>
                    <td>
                        <div class="logos">
                            <img src="{{ public_path('img/baseapp/logo-sws-b.png') }}" height="40px">
                        </div>
                    </td>
                    <td class="content-center">
                            <p style="margin:-20px;">SWS CONSULTANT</p>
                            93377 Hattie Valley Apt. 734 , Panama
                    </td>
                    <td style="text-align: right;">
                        <div class="logos">
                            <img src="{{ public_path('img/baseapp/logo-sws-b.png') }}" height="40px">
                        </div>
                    </td>
                </tr>
            </table>

        </div>
    </header>
    <footer>
        ©<?php echo date('Y'); ?> | Ditjen Imigrasi Republik Indonesia all rights reserved
    </footer>
    <main>
        <h3 style="padding:10px;">Residence Permit</h3>
        <p style="padding:10px;font-size:11px;text-align: justify;">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book.
        </p>
        <table width="100%" class="table-info">
            <tbody>
                <tr>
                    <td>Number</td>
                    <td>: {{ $data->req_id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>: {{ $data->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {{ $data->email }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>: {{ $data->phone }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td style="text-transform: capitalize;">: {{ $data->gender }}</td>
                </tr>
                <tr>
                    <td>Nationality</td>
                    <td style="text-transform: capitalize;">: {{ $data->nationality }}</td>
                </tr>
                <tr>
                    <td>Passport ID</td>
                    <td style="text-transform: capitalize;">: {{ $data->passport_id }}</td>
                </tr>
                <tr>
                    <td>Address In Indonesia</td>
                    <td style="text-transform: capitalize;">: {{ $data->address_indonesia }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="passport-img">
                        Passport Image <br><br>
                        <img src="{{ public_path('storage/requests/passport/' . $data->passport_img) }}"
                            height="250px">
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
