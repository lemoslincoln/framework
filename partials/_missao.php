<?php // Styles padrões inseridos no angolanos-default-styles.less ?>
<div class="clearfix"></div>
  <table class="angolanos-missao">
    <thead>
      <tr>
        <th>Missão</th>
        <th>Visão</th>
        <th>Valores</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="col-sm-4 angolanos-missao-missao"><?php the_field('missao'); ?></td>
        <td class="col-sm-4 angolanos-missao-visao"><?php the_field('visao'); ?></td>
        <td class="col-sm-4 angolanos-missao-valores"><?php the_field('valores'); ?></td>
      </tr>
    </tbody>
  </table>
<div class="clearfix"></div>