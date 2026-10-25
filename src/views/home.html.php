<?php
use function App\svg_icon;

?>

<section class="main-app">
  <div class="settings-bar">
    <div class="btn-group">
      <my-toggle variant="ghost">
        <?= svg_icon('notes'); ?>
        notes
      </my-toggle>
      <div class="separator"></div>
      <button class="btn-ghost">
        treble
        <?= svg_icon('dropdown'); ?>
      </button>
    </div>

    <div class="btn-group">
      <my-toggle variant="ghost">
        <?= svg_icon('rhythm'); ?>
        rhythm
      </my-toggle>
      <div class="separator"></div>
      <button class="btn-ghost">
        120 bpm
        <?= svg_icon('dropdown'); ?>
      </button>
      <my-toggle variant="ghost">
        <?= svg_icon('metronome'); ?>
      </my-toggle>
    </div>
  </div>
  <span>b</span>
  <span>c</span>
</section>
