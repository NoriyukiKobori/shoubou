<?php
      $nendo = isset($_GET['nendo']) ? $_GET['nendo'] : "2020年度";
      
      global $wpdb;

      $sql = $wpdb->prepare("SELECT date, id, kubun, amount, type, shori FROM $wpdb->kaikeis WHERE nendo = %s ORDER BY date ASC", $nendo);
      $kaikeis = $wpdb->get_results($sql);
      
      $shunyu = 0;
      $sishutu = 0;
      $zandaka = 0;
      foreach($kaikeis as $kaikei){
          $a = $kaikei->amount;
          $t = $kaikei->type;
          if($t == 0){
            $shunyu = $shunyu + $a;
            $zandaka = $zandaka + $a;
          }else{
            $sishutu = $sishutu + $a;
            $zandaka = $zandaka - $a;
          }
      }
?>

<?php get_header(); ?>   
    <main>
    <div class="p-container__nendo">
        <form action="./" method="get">
        <label for="search_box">年度選択</label>
        <select class="" id="search_box" type="text" name="nendo" placeholder="" >
            <option value="2019年度" <?= $nendo == "2019年度" ? 'selected' : ''; ?>>2019年度</option>
            <option value="2020年度" <?= $nendo == "2020年度" ? 'selected' : ''; ?>>2020年度</option>
            <option value="2021年度" <?= $nendo == "2021年度" ? 'selected' : ''; ?>>2021年度</option>
        </select>
        <input id="seach-button" class="searchsubmit" type="submit" value="出力" >   
        </form>  
    </div>
    <div class="p-container__zan-new">
        <strong><p>収入；<?= $shunyu ?>円</p></strong>
        <strong><p>支出；<?= $sishutu ?>円</p></strong>
        <strong><p>残高；<?= $zandaka ?>円</p></strong>

        <button class="c-button__new" onclick="location.href = '<?= esc_url(home_url('/kaikeis/createform/')); ?>'">新規登録</button>
    </div>

  <table class="c-table__kaikei">
    <thead>
      <tr>
        <th scope="col" class="col-0">◇</th>
        <th scope="col" class="col-1">日付</th>
        <th scope="col" class="col-2">区分</th>
        <th scope="col" class="col-3">摘要</th>
        <th scope="col" class="col-4">取引先</th>
        <th scope="col" class="col-5">収入</th>
        <th scope="col" class="col-6">支出</th>
        <th scope="col" class="col-7">処理</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($kaikeis as $kaikei): ?>
    <?php $id=$kaikei->id; ?>
      <tr>
          <td class="col-0"><a href = "<?= esc_url(home_url("/kaikei?id=$id")); ?>">詳細</a></td>
          <td class="col-1"><?= date('m/d', strtotime($kaikei->date)); ?></td>
          <td class="col-2"><?= $kaikei->kubun; ?></td>
          <td class="col-3"><?= $kaikei->title; ?></td>
          <td class="col-4"><?= $kaikei->torihikisaki; ?></td>
          <td class="col-5"><?= $kaikei->type == 0 ? $kaikei->amount : ''; ?></td>
          <td class="col-6"><?= $kaikei->type == 1 ? $kaikei->amount : ''; ?></td>
          <td class="col-7"><?= $kaikei->shori; ?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  </main>
  <?php get_footer(); ?>
  <?php get_sidebar(); ?>
</body>
</html>