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
        $created = $kaikei->created_at;
        $crname = $kaikei->created_name;
        $update = $kaikei->updated_at;
        $upname = $kaikei->updated_name;
    }
    if($_POST){
        $id = $_POST['id'];

        $alert = "<script type='text/javascript'>alert('ほんとうに削除してもよろしいですか？');</scrit>";

        global $wpdb;

        $sql_del = $wpdb->prepare("DELETE FROM $wpdb->kaikeis WHERE id = %d" , $id);
        $result = $wpdb->query($sql_del);
    
        wp_redirect( esc_url(home_url('/kaikeis/')) );
        exit; 
      }
?>

<?php get_header(); ?>
    <main>
        <div class="p-articles__kaikei-shousai">
            <h2>詳細</h2>
            <p>年　　度 ： <?= $nendo?></p>
            <p>日　　付 ： <?= $date?></p>
            <p>区　　分 ： <?= $kubun?></p>
            <p>摘　　要 ： <?= $title?></p>
            <p>取　　先 ： <?= $torihikisaki?></p>
            <p>取　　扱 ： <?= $type == 0 ? '収入' : '支出'; ?></p>
            <p>金　　額 ： <?= $amount?>円</p>
            <p>処　　理 ： <?= $shori?></p>
            <p>備　　考 ： </p>
            <p><textarea><?= $bikou?></textarea></p>
            <p>登録日時 ： <?= $created?></p>
            <p>登録者名 ： <?= $crname?></p>
            <p>更新日時 ： <?= $update?></p>
            <p>更新者名 ： <?= $upname?></p>
            <p><button><a href = "<?= esc_url(home_url('/kaikeis/')); ?>">戻る</a></button></p>
            <p><button><a href = "<?= esc_url(home_url("/kaikei/updateform?id=$id")); ?>">編集</a></button></p>
            <form action="./" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <p><button id="delete-button" type='submit' onClick="disp();return false;">削除</button></p>
            </form>   
        </div> 
    </main>


<?php get_footer(); ?>
<?php get_sidebar(); ?>