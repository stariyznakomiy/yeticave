<main>
  <nav class="nav">
    <ul class="nav__list container">
      <li class="nav__item nav__item--current">
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
  <div class="container">
    <section class="lots">
      <h2>История просмотров</span></h2>
      <ul class="lots__list">
      <?php if (!empty($history_values)) :?>
        <?php foreach ($history_values as $value) :?>
        <li class="lots__item lot">
          <div class="lot__image">
            <img src="<?= $lots[$value]['Изображение']?>" width="350" height="260" alt="Сноуборд">
          </div>
          <div class="lot__info">
            <span class="lot__category"><?= $lots[$value]['Категория']?></span>
            <h3 class="lot__title"><a class="text-link" href="lot.php?lot_id=<?= $value ?>"><?= $lots[$value]['Название']?></a></h3>
            <div class="lot__state">
              <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?= $lots[$value]['Цена']?><b class="rub">р</b></span>
              </div>
              <div class="lot__timer timer">
                <?= timer("26.07.2023") ?>
              </div>
            </div>
          </div>
        </li>
        <?php endforeach;?>
      <?php endif;?>
      </ul>
    </section>
    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <li class="pagination-item pagination-item-active"><a>1</a></li>
      <li class="pagination-item"><a href="#">2</a></li>
      <li class="pagination-item"><a href="#">3</a></li>
      <li class="pagination-item"><a href="#">4</a></li>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
  </div>
</main>