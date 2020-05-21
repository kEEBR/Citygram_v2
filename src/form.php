<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="form" method="post">
        <input type="text" name="name" required="required"/>
        <input type="text" name="phone" required="required"/>
        <input type="submit" value="Заказать звонок"/>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#form").submit(function(e) {
    e.preventDefault() //устанавливаем событие отправки для формы с id=form
                var form_data = $(this).serialize(); //собираем все данные из формы
                $.ajax({
                type: 'POST', //Метод отправки
                url: 'vendor/form.php', //путь до php фаила отправителя
                data: form_data,
                        success: function(data){ // сoбытиe пoслe удaчнoгo oбрaщeния к сeрвeру и пoлучeния oтвeтa
                        alert('все ок'); // пoкaжeм eё тeкст
                        }
                });
        });
    });    
    </script>
</body>
</html>