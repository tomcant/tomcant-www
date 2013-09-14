<ul>
  <?php foreach ($pages as $page): ?>
    <li<?php if ($page == $current_page): ?> class="active"<?php endif; ?>>
      <a href="/<?php echo $page ?>"><?php echo $page ?></a>
    </li>
  <?php endforeach; ?>
</ul>
