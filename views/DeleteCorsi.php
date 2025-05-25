<form method="post" id="form" action="index.php?action=delete">
    <?php if (isset($corsi)): ?>
        <label>Corsi
            <select id="corso" name="id">
                <?php /** @var Corsi $corso */
                foreach ($corsi as $corso): ?>
                    <option value="<?= $corso->getId() ?>"> <?= $corso->getTitolo() ?></option>
                <?php endforeach ?>
            </select>
        </label> <br>
        <input type="submit" value="Eliminar corsi">
    <?php endif ?>

</form>