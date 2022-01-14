<!DOCTYPE html>
<html><body>

<?= $this->element('head') ?>



<sidebar>
</sidebar>
<?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>


    <?= $this->element('foot')    ?>

</body>
</html>

