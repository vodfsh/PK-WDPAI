<?php
/**
 * @var string $profileUser
 */
?>
<section class="card profile-section">
  <h2 class="sr-only">Profile</h2>
  <img alt="profile picture" />
  <span class="username"><?= $profileUser; ?></span>
  <div class="grow"></div>
  <span>member since [date]</span>
</section>

<section class="stats-section">
  <h2 class="sr-only">Statistics</h2>
  <div class="card">
    <h3>top speed</h3>
    <span>[123]</span>
  </div>
  <div class="card">
    <h3>avg accuracy</h3>
    <span>[123]</span><span class="constant">%</span>
  </div>
  <div class="card">
    <h3>sessions completed</h3>
    <span>[123]</span>
  </div>
  <div class="card">
    <h3>keys pressed</h3>
    <span>[123]</span>
  </div>
  <div class="card">
    <h3>practice time</h3>
    <span>[12]</span><span class="constant">h</span><span>[12]</span><span class="constant">m</span>
  </div>
</section>

<section class="card">
  <h2>Speed and Accuracy</h2>
</section>

<section class="card">
  <h2>Calendar</h2>
</section>

<section class="card">
  <h2>Practice History</h2>
  <table>
    <thead>
      <tr>
        <th>date</th>
        <th>duration</th>
        <th>npm</th>
        <th>accuracy</th>
        <th>score</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>date</td>
        <td>duration</td>
        <td>npm</td>
        <td>accuracy</td>
        <td>score</td>
      </tr>
      <tr>
        <td>date</td>
        <td>duration</td>
        <td>npm</td>
        <td>accuracy</td>
        <td>score</td>
      </tr>
    </tbody>
  </table>

  <div class="flex">
    <span class="grow"></span>
    <div>
      <button class="small btn-outline">Prev</button>
      <span class="small">Page [1] / [12]</span>
      <button class="small btn-outline">Next</button>
    </div>
  </div>
</section>
