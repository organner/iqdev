<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="normalize.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>
  <script src="jquery-rus.js"></script>
  <link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/sunny/jquery-ui.css">
  <title></title>
</head>
<body>
<header>
  <div class="top__menu">
    <div>
      <img src="image/logo-light.svg">
      <span class="top__menu_text">Deposit Calculator</span>
      <div class="top__menu_logo"></div>
    </div>
</header>
<main>
  <div class="deposit">
    <h1>Депозитный калькулятор</h1>
    <p class="deposit__text">Калькулятор депозитов позволяет рассчитать ваши доходы после внесения суммы на счет в банке
      по опредленному тарифу.</p>
    <form>
      <div class="container">
        <p class="child_container">
          <label for="datein">Дата открытия</label>
          <input id="datep" type="datep" name="Дата открытия">
        </p>
        <p class="child_container child_container_with_selector">
          <label for="Number">срок вклада</label>
          <input id="term" type="Number" name="Срок вклада" min="0">
          <select class="deposit__year_month">
            <option value="year">Год</option>
            <option value="month">Месяц</option>
          </select>
        </p>
        <p class="child_container">
          <label for="Number">Сумма вклада</label>
          <input id="sum" type="Number" name="Сумма вклада" min="0">
        </p>
        <p class="child_container">
          <label for="Number">Процентная ставка, % годовых</label>
          <input id="percent" type="Number" name="Сумма вклада" min="0">
        </p>
        <p class="child_container">
          <input class="deposit_checkbox" type="checkbox" name="checkbox" placeholder="рассчитать">
          <span class="deposit__triple_line_text">Ежемесячное пополнение вклада</span>
        </p>
        <p class="child_container">
          <label for="Number"></label>
          <input class="deposit__model_show" id="sumAdd" type="Number" name="value"
                 placeholder="Сумма пополнения вклада" min="0">
        </p>
        <p>
          <input class="deposit__button" type="submit" name="Рассчитать" value="Рассчитать">
        </p>
      </div>
    </form>



  </div>
</main>
<footer></footer>
<script src="script.js"></script>
</body>
</html>
