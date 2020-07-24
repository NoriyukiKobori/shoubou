<?php
    if($_GET){
        $id = $_GET['id'];

        global $wpdb;

        $sql = $wpdb->prepare("SELECT * FROM $wpdb->kaikeis WHERE id = $id");
        $kaikei = $wpdb->get_row($sql);

        $nendo = $kaikei->nendo;
        $date = $kaikei->date;
        $kubun = $kaikei->kubun;
        $title = $kaikei->title;
        $torihikisaki = $kaikei->torihikisaki;
        $type = $kaikei->type;
        $amount = $kaikei->amount;
        $shori = $kaikei->shori;
        $bikou = $kaikei->bikou;
        //$created = $kaikei->created_at;
        $update = $kaikei->updated_at;
    }
    if($_POST){
        $id = $_POST['id'];
        $nendo = $_POST['nendo'];
        $date = $_POST['date'];
        $kubun = $_POST['kubun'];
        $title = $_POST['title'];
        $torihikisaki = $_POST['torihikisaki'];
        $amount = $_POST['amount'];
        $type = $_POST['type'];  
        $shori = $_POST['shori'];
        $bikou = $_POST['bikou'];
        $user = wp_get_current_user();
        $udname = $user->display_name;
    
        global $wpdb;
        $sql_up = $wpdb->prepare("UPDATE $wpdb->kaikeis SET nendo = %s , date = %s , kubun = %s , title = %s , torihikisaki = %s , amount = %d , type = %d , shori = %s , bikou = %s , updated_at = now() , updated_name = %s WHERE id = %d" , $nendo , $date , $kubun , $title , $torihikisaki , $amount , $type , $shori , $bikou , $udname , $id);
        $result = $wpdb->query($sql_up);
    
        wp_redirect( esc_url(home_url('/kaikeis/')) );
        exit; 
      }

    

?>

<?php get_header(); ?>
<main>
    <form class="p-form" action="./" method="post">
      <p class="p-form__title">収支 編集フォーム</p>
      <div class="p-form__group">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label for="nendo">年　度</label>
        <select type="text"  size="1" class="" id="nendo" name="nendo">
            <option value="2019年度" <?= $nendo == "2019年度" ? 'selected' : ''; ?>>2019年度</option>
            <option value="2020年度" <?= $nendo == "2020年度" ? 'selected' : ''; ?>>2020年度</option>
            <option value="2021年度" <?= $nendo == "2021年度" ? 'selected' : ''; ?>>2021年度</option>
        </select>
      </div>
      <div class="p-form__group">
        <label for="date">日　付</label>
        <input type="date" class="" id="date" name="date" value=<?= $date; ?>>
      </div>
      <div class="p-form__group">
        <label for="kubun">区　分</label>
        <select type="text"  size="1" class="" id="kubun" name="kubun">
        <option value="飲食費" <?= $nendo == "飲食費" ? 'selected' : ''; ?>>飲食費</option>
        <option value="会議費" <?= $nendo == "会議費" ? 'selected' : ''; ?>>会議費</option>
        <option value="交際費" <?= $nendo == "交際費" ? 'selected' : ''; ?>>交際費</option>
        <option value="交通費" <?= $nendo == "交通費" ? 'selected' : ''; ?>>交通費</option>
        <option value="道具類" <?= $nendo == "道具類" ? 'selected' : ''; ?>>道具類</option>
        <option value="車両関係" <?= $nendo == "車両関係" ? 'selected' : ''; ?>>車両関係</option>
        <option value="その他" <?= $nendo == "その他" ? 'selected' : ''; ?>>その他</option>
        <option value="収入" <?= $nendo == "収入" ? 'selected' : ''; ?>>収入</option>
        <option value="繰越金" <?= $nendo == "繰越金" ? 'selected' : ''; ?>>繰越金</option>
        </select>
      </div>
      <div class="p-form__group">
        <label for="title">摘　要</label>
        <input type="text" class="" id="title" name="title" value="<?= $title; ?>">
      </div>
      <div class="p-form__group">
        <label for="torihikisaki">取引先</label>
        <input type="text" class="" id="torihikisaki" name="torihikisaki" value="<?= $torihikisaki; ?>">
      </div>
      <div class="p-form__group">
        <label for="amount">金　額</label>
        <input type="number" class="" id="amount" name="amount" value="<?= $amount; ?>">
      </div>
      <div class="p-form__group">
        <label for="shori">処　理</label>
        <select type="text"  size="1" class="" id="shori" name="shori">
        <option value="済" <?= $shori == "済" ? 'selected' : ''; ?>>済</option>
        <option value="未" <?= $shori == "未" ? 'selected' : ''; ?>>未</option>
        </select>
      </div>
      <div class="p-form__group">
        <div class="p-form__check">
          <input class="form-check-input" type="radio" name="type" id="income" value="0" <?= $type == 0 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="income">収　入</label>
        </div>
        <div class="p-form__check">
          <input class="form-check-input" type="radio" name="type" id="spending" value="1" <?= $type == 1 ? 'checked' : ''; ?>>
          <label class="form-check-label" for="spending">支　出</label>
        </div>
      </div>
      <div class="p-form__group">
        <label for="bikou">備考（精算先等）</label>
        <textarea class="" id="bikou" name="bikou"><?= $bikou; ?></textarea>
      </div>
      <div class="p-form__submit">
        <button type="submit" class="">編　集</button>
      </div>
      
    </form>
    

</main>


<?php get_footer(); ?>
<?php get_sidebar(); ?>