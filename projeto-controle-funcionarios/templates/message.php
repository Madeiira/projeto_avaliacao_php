<?php if (isset($_SESSION['msg'])): ?>
    <div class="message">
        <?= $_SESSION['msg']; ?>
        <?php unset($_SESSION['msg']); ?>
    </div>
<?php endif; ?>