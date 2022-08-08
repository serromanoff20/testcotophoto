<!DOCTYPE html>
<html>
<head>
	<title>kiosk_invoice</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
		.none{
			display: none;
		}
	</style>
</head>
<body>
	<p>Введи номер лицевого счёта пользователя.</p>
	<form action="/model/Address.php" method="GET">
		<input type="text" name="acc" placeholder="Enter your number account">

		<button type="submit">Enter</button>
	</form>
	<br>
	<a href="javascript: void(0);" onclick="show('data')">Развернуть</a>
	<br>
	<div id="data" class="none">
    <p>Введи номер лицевого счёта(который ты вводил в поле выше) и адрес пользователя, тогда тебе откроется pdf-страница</p>

    <form method='get' action="/main.php" name="enter2">
			<input type="text" name="number" placeholder="Enter your number">
			<input type="text" name="address" placeholder="Enter your address">

      <button type="submit">Квитанция</button>
		</form>
    <br>
    <form method='get' action="model/ref.php" name="enter2">
      <input type="date" name="startDate" placeholder="Enter start date">
      <input type="date" name="endDate" placeholder="Enter end date">

      <input type="text" name="number" placeholder="Enter your number">
      <input type="text" name="address" placeholder="Enter your address">

      <button type="submit">Справка</button>
    </form>
	</div>
</body>
</html>

<script type="application/javascript">
  var a=1;
	// function show(none){
  //       var datas = document.getElementById(none);
  //
  //       if(datas.style.display == 'block'){
  //           datas.style.display = 'none';
  //       } else {
  //           datas.style.display = 'block';
  //       }
  // }
  // function func(){
	//   alert(a);
  // }

  prompt();
</script>
