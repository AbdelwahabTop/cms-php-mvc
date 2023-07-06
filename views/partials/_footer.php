</div>
</main>

<script>
    <?php if (isset($_SESSION['success'])) { ?>
        toastr.success('<?php echo getSession('success'); ?>')
    <?php
        unsetSession('success');
    } ?>
</script>
</body>

</html>