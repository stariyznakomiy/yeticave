<?php 
  $lot_name    = $lot['Название'] ?? '';
  $message     = $lot['Описание'] ?? '';
  $category    = $lot['Категория'] ?? '';
  $lot_rate    = $lot['Цена'] ?? '';
  $lot_step    = $lot['Шаг_ставки'] ?? '';
  $lot_date    = $lot['Дата_окончания'] ?? '';
?>

<main>
  <nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="all-lots.html">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Разное</a>
      </li>
    </ul>
  </nav>
  <form class="form form--add-lot container <?php if(isset($errors) && count($errors)) { echo 'form--invalid'; } ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item <?php if(isset($errors['Название'])) { echo 'form__item--invalid'; } ?>">
        <label for="lot-name">Наименование</label>
        <!-- <input id="lot-name" type="text" name="lot-name" value="<?= $lot_name ?>" placeholder="Введите наименование лота" required> -->
        <input id="lot-name" type="text" name="Название" value="<?= $lot_name ?>" placeholder="Введите наименование лота">
        <span class="form__error">Введите наименование лота</span>
      </div>
      <div class="form__item <?php if(isset($errors) && $lot['Категория'] == 'Выберите категорию') { echo 'form__item--invalid'; } ?>">
        <label for="category">Категория</label>
        <!-- <select id="category" name="category" required> -->
        <select id="category" name="Категория">
          <option value='Выберите категорию' <?php if(isset($lot) && $lot['Категория'] == 'Выберите категорию') {echo "selected";}?>>Выберите категорию</option>
          <option value='Доски и лыжи' <?php if(isset($lot) && $lot['Категория'] == 'Доски и лыжи') {echo "selected";}?>>Доски и лыжи</option>
          <option value='Крепления' <?php if(isset($lot) && $lot['Категория'] == 'Крепления') {echo "selected";}?>>Крепления</option>
          <option value='Ботинки' <?php if(isset($lot) && $lot['Категория'] == 'Ботинки') {echo "selected";}?>>Ботинки</option>
          <option value='Одежда' <?php if(isset($lot) && $lot['Категория'] == 'Одежда') {echo "selected";}?>>Одежда</option>
          <option value='Инструменты' <?php if(isset($lot) && $lot['Категория'] == 'Инструменты') {echo "selected";}?>>Инструменты</option>
          <option value='Разное' <?php if(isset($lot) && $lot['Категория'] == 'Разное') {echo "selected";}?>>Разное</option>
        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>
    <div class="form__item form__item--wide <?php if(isset($errors['Описание'])) { echo 'form__item--invalid'; } ?>">
      <label for="message">Описание</label>
      <textarea id="message" name="Описание" value="<?= $message ?>" placeholder="Напишите описание лота"><?= $message ?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file <?php if(isset($errors['file'])) { echo 'form__item--invalid'; } ?>"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" name="Изображение" id="photo2" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <span class="form__error">Загрузите изображение</span>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small <?php if(isset($errors['Цена'])) { echo 'form__item--invalid'; } ?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="Цена" value="<?= $lot_rate ?>" placeholder="0">
        <span class="form__error">Введите начальную цену</span>
      </div>
      <div class="form__item form__item--small <?php if(isset($errors['Шаг_ставки'])) { echo 'form__item--invalid'; } ?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="Шаг_ставки" value="<?= $lot_step ?>" placeholder="0">
        <span class="form__error">Введите шаг ставки</span>
      </div>
      <div class="form__item <?php if(isset($errors['Дата_окончания'])) { echo 'form__item--invalid'; } ?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="Дата_окончания" value="<?= $lot_date ?>">
        <span class="form__error">Введите дату завершения торгов</span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>