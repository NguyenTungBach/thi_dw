<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body, html {height: 100%}
    .bgimg {
        background-image: url('https://www.w3schools.com/w3images/onepage_restaurant.jpg');
        min-height: 100%;
        background-position: center;
        background-size: cover;
    }
</style>
<body class="bgimg w3-text-white">
<h3 style="text-align:center;">Manage City</h3>
<!-- Content -->
<div class="w3-container w3-padding-64">
    <div id="error" class="w3-pink"></div>
    <form action="http://127.0.0.1:8000/form" method="post" name="formCity">
        <span class="w3-text-red w3-white errorName"></span>
<!--        <input class="w3-input w3-padding-16" type="text" name="product_code" placeholder="product_code">-->
        <input class="w3-input w3-padding-16" type="text" name="name" placeholder="Name..">
        <input class="w3-input w3-padding-16" type="number" name="price" placeholder="price">
        <input class="w3-input w3-padding-16" type="text" name="avatar" placeholder="avatar.">

        <div class="w3-margin-top">
            <input type="submit" value="Submit">
            <button type="button" id="listCity">List</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        // const inputProduct_code = $('input[name=product_code]');
        const inputName = $('input[name=name]');
        const inputPrice = $('input[name=price]');
        const inputAvatar = $('input[name=avatar]');

        $('form[name=formCity]').submit(function (event) {
            let message = [];
            errorElement.html("");
            event.preventDefault(); // đảm bảo dữ liệu sẽ gửi đi nhưng sẽ không chạy đến đường dẫn, tức là ở nguyên tại chỗ
            let data = {
                // product_code: inputProduct_code.val(),
                name: inputName.val(),
                price: inputPrice.val(),
                avatar: inputAvatar.val(),
            };
            // alert(JSON.stringify(data));

            $.ajax({
                url:'http://127.0.0.1:8000/form',
                method: 'POST',
                data: JSON.stringify(data),
                success : function (responseData) {
                    alert(responseData.message);
                    // loadData();
                    // $('form[name=formCity]').trigger("reset");
                    // window.location.href = "http://localhost:8080/AssignmentDW/listCity.php";
                },
                error:function () {
                    alert('something error');

                }
            });
        });

        $('#reload').click(loadData);
        $('#listCity').click(function () {
            window.location.href = "http://localhost:8080/AssignmentDW/listClient.php";
        });
    });


</script>

</body>
</html>