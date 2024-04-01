<?php
require 'conn.php';
session_start();
if (!$_SESSION['emp_name']) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>EMS - View</title>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="overflow-x-auto">
        <table class="min-w-80% divide-y-2 divide-gray-200 bg-white text-sm" style="margin: 0 auto; margin-top: 50px;">
            <thead>
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                        style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                        Employee ID
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-gray-700"
                        style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                        Employee Name
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-gray-700"
                        style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                        View
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-gray-700"
                        style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                        Update
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-gray-700"
                        style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                        Delete
                    </th>
                </tr>
            </thead>

            <?php

            $sql = "SELECT * FROM emp_data";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                                style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                                <?php echo $row['emp_id']; ?>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"
                                style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                                <?php echo $row['emp_name']; ?>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"
                                style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                                <a href="empdetails.php?emp_id=<?php echo $row['emp_id']; ?>"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    View
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"
                                style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                                <a href="updateemp.php?emp_id=<?php echo $row['emp_id']; ?>"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    Update
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"
                                style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; text-align: center;">
                                <a href="delete.php?emp_id=<?php echo $row['emp_id']; ?>"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>

                <?php }
            } else {
                echo "<script>alert('Seems like it didn't go through')</script>";
            }
            ?>


        </table>
    </div>

    <div class="items-center justify-center gap-x-3 space-y-3 sm:flex sm:space-y-0" style="margin-top: 100px;">
        <a href="addemp.php"
            class="block py-2 px-4 text-white font-medium bg-indigo-600 duration-150 hover:bg-indigo-500 active:bg-indigo-700 rounded-lg shadow-lg hover:shadow-none">
            Add employees
        </a>
        <a href="dash.php"
            class="block py-2 px-4 text-gray-700 hover:text-gray-500 font-medium duration-150 active:bg-gray-100 border rounded-lg"
            style="width: 150px; text-align: center">
            Back
        </a>
    </div>
</body>

</html>