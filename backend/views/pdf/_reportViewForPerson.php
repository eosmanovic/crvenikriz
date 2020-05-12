<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

?>
<table class="table">
  <tbody>
    <tr>
      <th scope="row">Crveni Križ, Lukavac</th>
      <th>Ime i Prezime: <?= $user->first_name ?> <?= $user->last_name ?></th>
      <th></th>
      <th>Broj LK: <?= $user->id_card ?></th>
    </tr>
    <tr>
      <th scope="row">Datum: <?= $date ?></th>
      <th>JMBG: <?= $user->zip_code ?></th>
      <th></th>
      <th>Adresa: <?= $user->address ?></th>
    </tr>
    <tr>
      <th scope="row"></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </tbody>
</table>
<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th  style="width: 100px !important;" scope="col">#</th>
      <th  style="width: 200px !important;" scope="col">Naslov</th>
      <th  style="width: 400px !important;" scope="col">Opis</th>
      <th></th>
      <th  style="width: 200px !important;" scope="col">Datum</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($packs as $key => $pack ): ?>
      <tr>
        <th scope="row"><?= $key + 1 ?></th>
        <td style="width: 200px !important;"><?= $pack->title ?></td>
        <td colspan="2" style="width: 400px !important;"><?= $pack->body ?></td>
        <td style="width: 200px !important;"><?= $pack->date ?></td>
      </tr>
      <?php if( $pack->img ): ?>
        <tr>
          <td colspan="5">Slika: <?= $pack->title ?></td>
        </tr>
        <tr>
          <td colspan="5" style="width: 150px !important; text-align: center">
            <?= Html::img( "@web/uploads/".$pack->img, ['style' => 'width: 30px !important;']);?>
          </td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;&nbsp;</td>
        </tr>
      <?php endif ?>
    <?php endforeach ?>
  </tbody>
</table>