<?php get_heade(); ?>
    <p>詳細ページ</p>

    <div>
        <p>日　付； <?= h($record['date']); ?></p>
        <p>区　分； <?= h($record['kubun']); ?></p>
        <p>取引先； <?= h($record['torihikisaki']); ?></p>
        <p>金　額； <?= h($record['amount']); ?>円</p>
        <p>取　扱； <?= h($record['type']) == 0 ? '収入' : '支出'; ?></p>
    </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="./assets/js/app.js"></script>
</body>
</html>