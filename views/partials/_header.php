<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MVC / OOP / PDO based CRUD operation.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .left-menu li a.active {
            background-color: #ca8a04;
            border-radius: 5px;
            padding: 6px 3px;
            color: #fff;
        }

        .extra-prod {
            list-style: none;
            margin: 20px 0 0 0;
        }

        .extra-prod li {
            padding: 0 0 16px 0;
        }

        .extra-prod-title {
            margin: 0 0 0 5px;
            font-size: 13px;
        }

        .extra-prod li img {
            max-width: 50px;
        }

        .extra-prod-price {
            font-weight: bold;
            margin: 6px 0 0 0;
            display: block;
        }

        .get-me button {
            border: 1px solid #ccc;
            font-size: 13px;
            font-weight: normal;
            border-radius: 3px;
            background-color: transparent;
            font-style: italic;
            margin: 4px 0 0 0;
        }
    </style>
</head>

<body class="bg-gray-500 h-full w-full">
    <main>
        <div class="py-12">