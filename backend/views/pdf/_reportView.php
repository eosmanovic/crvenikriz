<table class="table">
  <tbody>
    <tr>
      <th scope="row">Crveni Križ, Lukavac</th>
      <th>Adresa:</th>
      <th></th>
    </tr>
    <tr>
      <th scope="row">Datum: <?= $date ?></th>
      <th>Printao:</th>
      <th></th>
    </tr>
    <tr>
      <th scope="row"></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </tbody>
</table>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ime</th>
      <th scope="col">Prezime</th>
      <th scope="col">Telefon</th>
      <th scope="col">Adresa</th>
      <th scope="col">Broj licne karte</th>
      <th scope="col">JMBG</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($users as $key => $user ): ?>
	    <tr>
	      <th scope="row"><?= $key + 1 ?></th>
	      <td><?= $user->first_name ?></td>
	      <td><?= $user->last_name ?></td>
	      <td><?= $user->tel ?></td>
	      <td><?= $user->address ?></td>
	      <td><?= $user->id_card ?></td>
        <td><?= $user->zip_code ?></td>
	    </tr>
    <?php endforeach ?>
  </tbody>
</table>