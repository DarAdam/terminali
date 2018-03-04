<?php 
	include 'includes/header.php';
    include 'functions/funkcije.php';
?>
    <div class="main_right" >
        <div class="main_head">
            <h2>Pregled istorije pojedinačnog uređaja</h2>
        </div>
        <div id="izveštaj">
            <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                <div>
                    <select name ="tip">
                        <option value="terminal">Terminal</option>
                        <option value="q prox">Qprox</option>
                    </select>
                    <label for="serijski_broj">Serijski broj uređaja:</label>
                    <input type="text" name="serijski_broj">
                </div>
            </form>
            <div>
                <?php 
                    if (isset($_POST['serijski_broj'])) {
                        $tip = $_POST['tip'];
                        $serijski_broj = $_POST['serijski_broj'];
                        istorija_uređaja($tip, $serijski_broj);
                    }
                 ?>
            </div>
        </div>
<?php include 'includes/footer.php' ?>


 