<?php 

function calculateBill($units) {
    $totalBill = 0;

    if($units <= 75){
        $totalBill = $units * 5.26;
    }
    elseif($units > 75 && $units <= 200){
        $totalBill = 75 * 5.26 + ($units - 75) * 7.20;
    }
    elseif($units > 200 && $units <= 300){
        $totalBill = 75 * 5.26 + 125 * 7.20 + ($units - 200) * 7.59;
    }
    elseif($units > 300 && $units <= 400){
        $totalBill = 75 * 5.26 + 125 * 7.20 + 100 * 7.59 + ($units - 300) * 8.02;
    }
    elseif($units > 400 && $units <= 600){
        $totalBill = 75 * 5.26 + 125 * 7.20 + 100 * 7.59 + 100 * 8.02 + ($units - 400) * 12.67;
    }
    elseif($units > 600){
        $totalBill = 75 * 5.26 + 125 * 7.20 + 100 * 7.59 + 100 * 8.02 + 200 * 12.67 + ($units - 600) * 14.61;
    }
    return $totalBill;
}
if(isset($_POST['currentbill']) && isset($_POST['Load']) ){
    $currentBill = floatval($_POST['currentbill']);
    $Load = floatval($_POST['Load']);
    if($currentBill > 0){
        $billAmount = calculateBill($currentBill);
        $billAmount2 = $Load*42;
        $vat = ceil(0.05 * ($billAmount + $billAmount2));

     
        $billAmount3 = round($billAmount + $billAmount2) + $vat;
        
        echo "Total Bill is: " . $billAmount;
        echo "<br>";
        echo "Total load bill is: " . $billAmount2;
        echo "<br>";
        echo "Total Bill is: " . round($billAmount + $billAmount2);
        echo "<br>";
        echo "VAT is: " . $vat;
        echo "<br>";
        echo "Total Bill with VAT is: " . $billAmount3;
    } else {
        echo "Invalid Input";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=
"https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" 
          rel="stylesheet">
        <link href="style.css" rel="stylesheet">
    <title>Current Bill</title>
</head>
<body>

    <div class="container mx-auto mt-5 sanny">
        <form action="" method="POST">
            <div class="mb-4">
                <label for="currentbill" class="block text sm font-medium text-gray-700">Enter Current Bill</label>

                <input type="text" name="currentbill" id="currentbill"class="form-input rounded-md shadow-sm mt-1 block w-full"placeholder="Enter Current Bill" required>
            </div>
            <br>
           
            <div class="mb-4">
                <label for="Load" class="block text
sm font-medium text-gray-700">Enter sensation load</label>
                <input type="text" name="Load" id="Load"class="form-input rounded-md shadow-sm mt-1 block w-full"placeholder="Enter Load" required>

            </div>


            <button type="submit" class="inline-flex justify-center
py-2 px-4 border border-transparent shadow-sm text-sm font-medium
rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none
focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Calculate Bill
            </button>
        </form>
        <br>
        <br>
     
    </div>

    
</body>
</html>
