<?php
  if($_POST){
    $nendo = $_POST['nendo'];
    $date = $_POST['date'];
    $kubun = $_POST['kubun'];
    $title = $_POST['title'];
    $torihikisaki = $_POST['torihikisaki'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];  
    $shori = $_POST['shori'];
    $bikou = $_POST['bikou'];

    global $wpdb;
    $sql_in = $wpdb->prepare("INSERT INTO $wpdb->kaikeis (nendo, date, kubun, title, torihikisaki, amount, type, shori ,bikou, created_at, updated_at) VALUES(%s , %s , %s , %s , %s , %d , %d , %s ,%s , now() , now())" , $nendo , $date , $kubun , $title , $torihikisaki , $amount , $type , $shori, $bikou);
    $result = $wpdb->query($sql_in);

    wp_redirect( esc_url(home_url('/kaikeis/')) );
    exit;
    
  }
 ?>
<?php get_header(); ?>  
<main>
<form class="p-form" action="./" method="post">
      <p class="p-form__title">収支 新規登録フォーム</p>
      <div class="p-form__group">
        <label for="nendo">年　度</label>
        <select type="text"  size="1" class="" id="nendo" name="nendo">
        <option>     </option>
        <option>2019年度</option>
        <option selected>2020年度</option>
        <option>2021年度</option>
        </select>
      </div>
      <div class="p-form__group">
        <label for="date">日　付</label>
        <input type="date" class="" id="date" name="date">
      </div>
      <div class="p-form__group">
        <label for="kubun">区　分</label>
        <select type="text"  size="1" class="" id="kubun" name="kubun">
        <option>     </option>
        <option>飲食費</option>
        <option>会議費</option>
        <option>交際費</option>
        <option>交通費</option>
        <option>道具類</option>
        <option>車両関係</option>
        <option>その他</option>
        <option>収入</option>
        </select>
      </div>
      <div class="p-form__group">
        <label for="title">摘　要</label>
        <input type="text" class="" id="title" name="title">
      </div>
      <div class="p-form__group">
        <label for="torihikisaki">取引先</label>
        <input type="text" class="" id="torihikisaki" name="torihikisaki">
      </div>
      <div class="p-form__group">
        <label for="amount">金　額</label>
        <input type="number" class="" id="amount" name="amount">
      </div>
      <div class="p-form__group">
        <label for="shori">処　理</label>
        <select type="text"  size="1" class="" id="shori" name="shori">
        <option>     </option>
        <option>済</option>
        <option>未</option>
        </select>
      </div>
      <div class="p-form__group">
        <div class="p-form__check">
          <input class="form-check-input" type="radio" name="type" id="income" value="0">
          <label class="form-check-label" for="income">収　入</label>
        </div>
        <div class="p-form__check">
          <input class="form-check-input" type="radio" name="type" id="spending" value="1">
          <label class="form-check-label" for="spending">支　出</label>
        </div>
      </div>
      <div class="p-form__group">
        <label for="bikou">備考（精算先等）</label>
        <textarea class="" id="bikou" name="bikou"></textarea>
      </div>
      <div class="p-form__submit">
        <button type="submit" class="">追　加</button>
      </div>
      
    </form>
    

  </main>
  <?php get_footer(); ?>
  <?php get_sidebar(); ?>
</body>
</html>